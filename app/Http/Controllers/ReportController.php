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
        $report_id = $request->get('report_id');
        $report_two_id = $request->get('report_two_id');
        $id=$request->get('id');
        $reports = Report::query();
        if ($report_id) {
            $reports->where('report_id', $report_id);
        }
        if ($report_two_id) {
            $reports->where('report_two_id',$report_two_id);
        }
        if ($id){
            $request->where('id',$id);
            if ($report_id) {
                $report_view = Report::where('report_id', $report_id)->where('id', $id)->first();
                $report_view->view = $report_view->view+ 1;
                $report_view->save();
            }
            if ($report_two_id) {
                $report_two_view = Report::where('report_two_id', $report_two_id)->where('id', $id)->first();
                $report_two_view = $report_two_view->view + 1;
                $report_two_view->save();
            }
        }
        return $reports->paginate(8);
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
            $news_content = $request->get('news_content');
            $weight = $request->get('weight');
            $report_id = $request->get('report_id');
            $report_two_id = $request->get('report_two_id');
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            if ($report_two_id > 0){
                $resoult = Report::create([
                    'name'=>$name,
                    'headline' => $headline,
                    'title' => $title,
                    'weight' => $weight,
                    'mantle' => $mantle,
                    'src_img' => $src_img,
                    'news_content' => $news_content,
                    'report_id' => $report_id,
                    'report_two_id'=>$report_two_id
                ]);
            }else{
                $resoult = Report::create([
                    'name'=>$name,
                    'headline' => $headline,
                    'title' => $title,
                    'weight' => $weight,
                    'mantle' => $mantle,
                    'src_img' => $src_img,
                    'news_content' => $news_content,
                    'report_id' => $report_id,
                ]);
            }
            if (!empty($resoult)) {
                return $this->jsonSuccess();
            }else{
                return $this->jsonResponse('1', '添加失败');
            }
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
}
