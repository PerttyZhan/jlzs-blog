<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Http\Traits\view;
use App\Model\AcTage;
use App\Model\Activities;
use App\Model\Activities_Actag;
use App\Model\Comments;
use App\Model\Report;
use App\Model\Report_Retag;
use App\Model\ReTag;
use App\Model\Sort_Report;
use App\Model\Users;
use Illuminate\Http\Request;

class testController extends Controller
{

    //
    public function getpost(Request $request)
    {
        dd(Activities::find(2)->actag()->attach([2,3],['created_at'=>date('Y-m-d H-i-s'),'updated_at'=>date('Y-m-d H-i-s')]));
//        return view('home');
    }


    public function testget(Request $request)
    {
        $yi=$request->input('yi');
dd($yi);
        if ($request->hasFile('file') || request()->file('mantle')) {
            $bucket = "photo";
            $folder = "zhu";
            $file = $request->file('file');
            $mantle = $request->file('mantle');
            $headline = $request->get('headline');
            $title = $request->get('title');
            $news_content = $request->get('news_content');
            $weight = 1;
            $report_id = 1;
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = Report::create([
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'news_content' => $news_content,
                'report_id' => $report_id

            ]);
            if (!empty($resoult)) {
                return "成功";
            }
        }
    }

    public function show()
    {

        $report = Report::find(1);
        $report->view = $report->view + 1;
        $report->save();
    }
}
