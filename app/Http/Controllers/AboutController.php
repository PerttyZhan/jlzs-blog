<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\About;
use App\Model\AbTage;
use Illuminate\Http\Request;

class AboutController extends Controller
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

        $about = About::select('id', 'name', 'headline', 'img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'collection', 'created_at', 'updated_at', 'deleted_at')->with(['sort_about', 'abtag']);
        if ($status != null) {
            $about->where('status', $status);
        }
        if ($sort_id) {
            $about->where('sort_id', $sort_id);
        }
        if ($start_time) {
            $about->where('created_at', '>=', $start_time);
        }
        if ($end_time) {
            $about->where('created_at', '<=', $end_time);
        }
        if ($tag_id) {
            $about->where('tag_id', 'like', '%' . $tag_id . '%');
        }

        if ($collection != null) {
            if ($collection == 0) {
                $about->orderBy('collection', 'desc');
            }
            if ($collection == 1) {
                $about->orderBy('collection', 'asc');
            }
        }
        if ($view != null) {
            if ($view == 0) {
                $about->orderBy('view', 'desc');
            }
            if ($weight == 1) {
                $about->orderBy('view', 'asc');
            }
        }
        if ($weight != null) {
            if ($weight == 0) {
                $about->orderBy('weight', 'desc');
            }
            if ($weight == 1) {
                $about->orderBy('weight', 'asc');
            }
        }
        if ($create != null) {
            if ($create == 0) {
                $about->orderBy('created_at', 'desc');
            }
            if ($weight == 1) {
                $about->orderBy('created_at', 'asc');
            }
        }
        if ($content) {
            return $about->addSelect('content')->paginate(8);
        } else {
            return $about->paginate(8);
        }

    }

    public function info($id)
    {
        return About::where('id', $id)->with('sort_about', 'abtag')->first();
    }

    public function store(Request $request, $id)
    {
        $name = $request->get('name');
        $headline = $request->get('headline');
        $title = $request->get('title');
        $about_content = $request->get('content');
        $weight = $request->get('weight');
        $sort_id = $request->get('sort_id');
        $abtag_id = $request->get('tag_id');
        $img_src = $request->get('img_src');
        $json_abtag_id = json_encode($abtag_id);
        $resoult = About::create([
            'name' => $name,
            'headline' => $headline,
            'title' => $title,
            'weight' => $weight,
            'content' => $about_content,
            'sort_id' => $sort_id,
            'tag_id' => $json_abtag_id,
            'user_id' => $id,
            'img_src' => $img_src

        ]);

        About::find($resoult->id)->abtag()->attach($abtag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
        $abtag = AbTage::whereIn('id', $abtag_id)->get();
        foreach ($abtag as $k => $y) {
            $y->citations = $y->citations + 1;
            $y->save();
        }
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }


    public function update(Request $request, $id)
    {

        $name = $request->get('name');
        $headline = $request->get('headline');
        $title = $request->get('title');
        $about_content = $request->get('content');
        $weight = $request->get('weight');
        $sort_id = $request->get('sort_id');
        $abtag_id = $request->get('tag_id');
        $img_src = $request->get('img_src');

        $json_abtag_id = json_encode($abtag_id);
        $resoult = About::find($id)->update([
            'name' => $name,
            'headline' => $headline,
            'title' => $title,
            'weight' => $weight,
            'content' => $about_content,
            'sort_id' => $sort_id,
            'tag_id' => $json_abtag_id,
            'img_src' => $img_src
        ]);

        About::find($id)->abtag()->detach();
        About::find($id)->abtag()->attach($abtag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $about = About::destroy($id);
        if ($about) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function status($id, Request $request)
    {
        $status_r = $request->get('status');
        $status = About::find($id)->update([
            'status' => $status_r,
        ]);
        if ($status) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改状态失败');
        }
    }
}
