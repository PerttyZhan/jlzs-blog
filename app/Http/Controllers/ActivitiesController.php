<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{

    public function index(Request $request)
    {
        $sort_id = $request->get('sort_id');
        $id = $request->get('id');
        $activities=Activities::with(['sort_activities','actag'])->orderBy('view','desc')->orderBy('weight','desc');
        if ($sort_id) {
            $activities->where('sort_id', $sort_id);
        }
        if ($id) {
            $activities->where('id', $id);

                $activities_view = Activities::where('id', $id)->first();
                $activities_view->view = $activities_view->view + 1;
                $activities_view->save();

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
            $name = $request->get('name');
            $headline = $request->get('headline');
            $title = $request->get('title');
            $active_content = $request->get('active_content');
            $weight = $request->get('weight');
            $sort_id = $request->get('sort_id');
            $actag_id = $request->get('actag_id');

            $json_actag_id = json_encode($actag_id);
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = Activities::create([
                'name' => $name,
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'active_content' => $active_content,
                'sort_id' => $sort_id,
                'actag_id' => $json_actag_id
            ]);
        }
        Activities::find($resoult->id)->actag()->attach($actag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }


    public function update(Request $request, $id)
    {

        if ($request->hasFile('src_img') || request()->file('mantle')) {
            $bucket = "photo";
            $folder = "zhu";
            $file = $request->file('src_img');
            $mantle = $request->file('mantle');
            $name = $request->get('name');
            $headline = $request->get('headline');
            $title = $request->get('title');
            $active_content = $request->get('active_content');
            $weight = $request->get('weight');
            $sort_id = $request->get('sort_id');
            $actag_id = $request->get('actag_id');

            $json_actag_id = json_encode($actag_id);
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = Activities::find($id)->update([
                'name' => $name,
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'active_content' => $active_content,
                'sort_id' => $sort_id,
                'actag_id' => $json_actag_id
            ]);
        }
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
    public function status($id,Request $request)
    {
        $status=Activities::find($id)->update([
            'status'=>1,
        ]);
        if ($status) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改状态失败');
        }
    }
}
