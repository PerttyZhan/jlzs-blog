<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_id = $request->get('sort_id');
        $id = $request->get('id');
        $report = Report::with(['sort_reports', 'retag'])->withCount('users')->orderBy('weight', 'desc')->orderBy('view', 'desc');
        if ($sort_id) {
            $report->where('sort_id', $sort_id);
        }
        if ($id) {
            $report->where('id', $id);
            $report_view = Report::where('id', $id)->first();
            $report_view->view = $report_view->view + 1;
            $report_view->save();
        }
        return $report->paginate(8);
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
            $report_content = $request->get('report_content');
            $weight = $request->get('weight');
            $sort_id = $request->get('sort_id');
            $retag_id = $request->get('retag_id');
            $json_retag_id = json_encode($retag_id);
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = Report::create([
                'name' => $name,
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'report_content' => $report_content,
                'sort_id' => $sort_id,
                'retag_id' => $json_retag_id
            ]);
        }
        Report::find($resoult->id)->retag()->attach($retag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
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
            $report_content = $request->get('report_content');
            $weight = $request->get('weight');
            $sort_id = $request->get('sort_id');
            $retag_id = $request->get('retag_id');

            $json_retag_id = json_encode($retag_id);
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = Report::find($id)->update([
                'name' => $name,
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'report_content' => $report_content,
                'sort_id' => $sort_id,
                'retag_id' => $json_retag_id
            ]);
        }
        Report::find($id)->retag()->detach();
        Report::find($id)->retag()->attach($retag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $report = Report::destroy($id);
        if ($report) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function status($id, Request $request)
    {
        $status=$request->get('status');
        $status = Report::find($id)->update([
            'status' =>$status ,
        ]);
        if ($status) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改状态失败');
        }
    }
}
