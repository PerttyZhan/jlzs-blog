<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Activities;
use App\Model\Information;
use App\Model\InTag;
use App\Model\Report;
use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_id = $request->get('sort_id');
        $tag_id = $request->get('tag_id');
        $start_time = request('start_time');
        $end_time = request('end_time');
        $status = $request->get('status');
        $content = $request->get('with');

        $collection = $request->get('collection');
        $view = $request->get('view');
        $weight = $request->get('weight');
        $create = $request->get('creat_at');
        $information = Information::select('id', 'name', 'headline', 'img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'collection', 'created_at', 'updated_at', 'deleted_at')->with(['sort_information', 'intag'])->withCount('users');
        if ($status != null) {
            $information->where('status', $status);
        }
        if ($sort_id) {
            $information->where('sort_id', $sort_id);
        }
        if ($start_time) {
            $information->where('created_at', '>=', $start_time);
        }
        if ($end_time) {
            $information->where('created_at', '<=', $end_time);
        }
        if ($tag_id) {
            $information->where('tag_id', 'like', '%' . $tag_id . '%');
        }

        if ($collection != null) {
            if ($collection == 0) {
                $information->orderBy('collection', 'desc');
            }
            if ($collection == 1) {
                $information->orderBy('collection', 'asc');
            }
        }
        if ($view != null) {
            if ($view == 0) {
                $information->orderBy('view', 'desc');
            }
            if ($weight == 1) {
                $information->orderBy('view', 'asc');
            }
        }
        if ($weight != null) {
            if ($weight == 0) {
                $information->orderBy('weight', 'desc');
            }
            if ($weight == 1) {
                $information->orderBy('weight', 'asc');
            }
        }
        if ($create != null) {
            if ($create == 0) {
                $information->orderBy('created_at', 'desc');
            }
            if ($weight == 1) {
                $information->orderBy('created_at', 'asc');
            }
        }
        if ($content) {
            return $information->addSelect('content')->paginate(8);
        } else {
            return $information->paginate(8);
        }
    }

    public function info($id)
    {
        return Information::where('id', $id)->with('sort_information', 'intag')->first();
    }

    public function store(Request $request, $id)
    {
        $name = $request->get('name');
        $headline = $request->get('headline');
        $title = $request->get('title');
        $information_content = $request->get('content');
        $weight = $request->get('weight');
        $sort_id = $request->get('sort_id');
        $intag_id = $request->get('tag_id');
        $img_src = $request->get('img_src');

        $json_intag_id = json_encode($intag_id);
        $resoult = Information::create([
            'name' => $name,
            'headline' => $headline,
            'title' => $title,
            'weight' => $weight,
            'content' => $information_content,
            'sort_id' => $sort_id,
            'tag_id' => $json_intag_id,
            'user_id' => $id,
            'img_src' => $img_src
        ]);
       if($intag_id){
           Information::find($resoult->id)->intag()->attach($intag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
           $intag = InTag::whereIn('id', $intag_id)->get();
           foreach ($intag as $k => $y) {
               $y->citations = $y->citations + 1;
               $y->save();
           }
           if (!empty($resoult)) {
               return $this->jsonSuccess();
           } else {
               return $this->jsonResponse('1', '添加失败');
           }
       }else{
           if (!empty($resoult)) {
               return $this->jsonSuccess();
           } else {
               return $this->jsonResponse('1', '添加失败');
           }
       }

    }


    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $headline = $request->get('headline');
        $title = $request->get('title');
        $information_content = $request->get('content');
        $weight = $request->get('weight');
        $sort_id = $request->get('sort_id');
        $intag_id = $request->get('tag_id');
        $img_src = $request->get('img_src');
        $json_intag_id = json_encode($intag_id);
        $resoult = Information::find($id)->update([
            'name' => $name,
            'headline' => $headline,
            'title' => $title,
            'weight' => $weight,
            'content' => $information_content,
            'sort_id' => $sort_id,
            'tag_id' => $json_intag_id,
            'img_src' => $img_src
        ]);

        Information::find($id)->intag()->detach();
        Information::find($id)->intag()->attach($intag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $information = Information::destroy($id);
        if ($information) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function status($id, Request $request)
    {
        $status_r = $request->get('status');
        $status = Information::find($id)->update([
            'status' => $status_r,
        ]);
        if ($status) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改状态失败');
        }
    }
}
