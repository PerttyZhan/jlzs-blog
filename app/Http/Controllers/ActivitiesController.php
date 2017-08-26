<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\AcTage;
use App\Model\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{

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
        $activities = Activities::select('id', 'name', 'headline', 'img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'collection', 'created_at', 'updated_at', 'deleted_at')->with(['sort_activities', 'actag']);
        if ($status != null) {
            $activities->where('status', $status);
        }
        if ($sort_id) {
            $activities->where('sort_id', $sort_id);
        }
        if ($start_time) {
            $activities->where('created_at', '>=', $start_time);
        }
        if ($end_time) {
            $activities->where('created_at', '<=', $end_time);
        }
        if ($tag_id) {
            $activities->where('tag_id', 'like', '%' . $tag_id . '%');
        }

        if ($collection != null) {
            if ($collection == 0) {
                $activities->orderBy('collection', 'desc');
            }
            if ($collection == 1) {
                $activities->orderBy('collection', 'asc');
            }
        }
        if ($view != null) {
            if ($view == 0) {
                $activities->orderBy('view', 'desc');
            }
            if ($weight == 1) {
                $activities->orderBy('view', 'asc');
            }
        }
        if ($weight != null) {
            if ($weight == 0) {
                $activities->orderBy('weight', 'desc');
            }
            if ($weight == 1) {
                $activities->orderBy('weight', 'asc');
            }
        }
        if ($create != null) {
            if ($create == 0) {
                $activities->orderBy('created_at', 'desc');
            }
            if ($weight == 1) {
                $activities->orderBy('created_at', 'asc');
            }
        }
        if ($content) {
            return $activities->addSelect('content')->paginate(8);
        } else {
            return $activities->paginate(8);
        }

    }

    public function info($id)
    {
        return Activities::where('id', $id)->with('sort_activities', 'actag')->first();
    }

    public function store(Request $request, $id)
    {
        $name = $request->get('name');
        $headline = $request->get('headline');
        $title = $request->get('title');
        $active_content = $request->get('content');
        $weight = $request->get('weight');
        $sort_id = $request->get('sort_id');
        $actag_id = $request->get('tag_id');
        $img_src = $request->get('img_src');

        $json_actag_id = json_encode($actag_id);
        $resoult = Activities::create([
            'name' => $name,
            'headline' => $headline,
            'title' => $title,
            'weight' => $weight,
            'content' => $active_content,
            'sort_id' => $sort_id,
            'tag_id' => $json_actag_id,
            'user_id' => $id,
            'img_src' => $img_src

        ]);
        if (!$actag_id){
            if (!empty($resoult)) {
                return $this->jsonSuccess();
            } else {
                return $this->jsonResponse('1', '添加失败');
            }
        }else{
            Activities::find($resoult->id)->actag()->attach($actag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
            $actag = AcTage::whereIn('id', $actag_id)->get();
            foreach ($actag as $k => $y) {
                $y->citations = $y->citations + 1;
                $y->save();
            }
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
        $active_content = $request->get('content');
        $weight = $request->get('weight');
        $sort_id = $request->get('sort_id');
        $actag_id = $request->get('tag_id');
        $img_src = $request->get('img_src');
        $json_actag_id = json_encode($actag_id);
        $resoult = Activities::find($id)->update([
            'name' => $name,
            'headline' => $headline,
            'title' => $title,
            'weight' => $weight,
            'content' => $active_content,
            'sort_id' => $sort_id,
            'tag_id' => $json_actag_id,
            'img_src' => $img_src
        ]);

        Activities::find($id)->actag()->detach();
        Activities::find($id)->actag()->attach($actag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $activities = Activities::destroy($id);
        if ($activities) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function status($id, Request $request)
    {
        $status_r = $request->get('status');
        $status = Activities::find($id)->update([
            'status' => $status_r,
        ]);
        if ($status) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改状态失败');
        }
    }
}
