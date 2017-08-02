<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Activities;
use App\Model\Information;
use App\Model\Report;
use App\Model\Users;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_id = $request->get('sort_id');
        $id = $request->get('id');
        $information=Information::with(['sort_information','intag'])->orderBy('view','desc')->orderBy('weight');
        if ($sort_id) {
            $information->where('sort_id', $sort_id);
        }
        if ($id) {
            $information->where('id', $id);
                $report_view = Information::where('id', $id)->first();
                $report_view->view = $report_view->view + 1;
                $report_view->save();
        }
        return $information->paginate(8);
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
            $information_content = $request->get('information_content');
            $weight = $request->get('weight');
            $sort_id = $request->get('sort_id');
            $intag_id = $request->get('intag_id');

            $json_intag_id = json_encode($intag_id);
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = Information::create([
                'name' => $name,
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'information_content' => $information_content,
                'sort_id' => $sort_id,
                'intag_id' => $json_intag_id
            ]);
        }
        Information::find($resoult->id)->intag()->attach($intag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
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
            $information_content = $request->get('information_content');
            $weight = $request->get('weight');
            $sort_id = $request->get('sort_id');
            $intag_id = $request->get('intag_id');

            $json_intag_id = json_encode($intag_id);
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = Information::find($id)->update([
                'name' => $name,
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'information_content' => $information_content,
                'sort_id' => $sort_id,
                'intag_id' => $json_intag_id
            ]);
        }
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
        $activities = Information::destroy($id);
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
