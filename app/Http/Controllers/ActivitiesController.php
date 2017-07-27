<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Http\Traits\view;
use App\Model\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    use view;

    public function index(Request $request)
    {
        $activities_id = $request->get('activities_id');
        $activities_two_id = $request->get('activities_two_id');
        $id = $request->get('id');
        $activities = Activities::query();
        if ($activities_id) {
            $activities->where('activities_id', $activities_id);
        }
        if ($activities_two_id) {
            $activities->where('activities_two_id');
        }
        if ($id) {
            $activities->where('id',$id);
            if ($activities_id) {
                $activities_view = Activities::where('activities_id', $activities_id)->where('id', $id)->first();
                $activities_view->view = $activities_view->view+ 1;
                $activities_view->save();
            }
            if ($activities_two_id) {
                $activities_two_view = Activities::where('activities_two_id', $activities_two_id)->where('id', $id)->first();
                $activities_two_view = $activities_two_view->view + 1;
                $activities_two_view->save();
            }

        }
        return $activities->paginate(8);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('src_img') || request()->file('mantle')) {
            $bucket = "photo";
            $folder = "zhu";
            $file = $request->file('src_img');
            $mantle = $request->file('mantle');
            $name=$request->get('name');
            $headline = $request->get('headline');
            $title = $request->get('title');
            $active_content = $request->get('active_content');
            $weight = $request->get('weight');
            $activities_id = $request->get('activities_id');
            $activities_two_id = $request->get('activities_two_id');
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            if ($activities_two_id > 0) {
                $resoult = Activities::create([
                    'name'=>$name,
                    'headline' => $headline,
                    'title' => $title,
                    'weight' => $weight,
                    'mantle' => $mantle,
                    'src_img' => $src_img,
                    'active_content' => $active_content,
                    'activities_id' => $activities_id,
                    'activities_two_id' => $activities_two_id
                ]);
            } else {
                $resoult = Activities::create([
                    'name'=>$name,
                    'headline' => $headline,
                    'title' => $title,
                    'weight' => $weight,
                    'mantle' => $mantle,
                    'src_img' => $src_img,
                    'active_content' => $active_content,
                    'activities_id' => $activities_two_id,
                ]);
            }
            if (!empty($resoult)) {
                return $this->jsonSuccess();
            } else {
                return $this->jsonResponse('1', '添加失败');
            }
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
}
