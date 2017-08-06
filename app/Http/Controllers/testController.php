<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Http\Traits\view;
use App\Model\AcTage;
use App\Model\Activities;
use App\Model\Activities_Actag;
use App\Model\Comments;
use App\Model\Information;
use App\Model\InTag;
use App\Model\Report;
use App\Model\Report_Retag;
use App\Model\ReTag;
use App\Model\Sort_Report;
use App\Model\User;
use App\Model\Users;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use YueCode\Cos\QCloudCos;


class testController extends Controller
{

    //
    public function getpost(Request $request)
    {
//        $a=Users::find(1)->roles()->first()->actions()->paginate(8);
//        foreach ($a as $k=>$y){
//            dump($y);
//        }
//        return view('home');
        $information=Information::query()->paginate(8)->toArray();
        $actions=Activities::query()->paginate(8);
        return $information;

//      return collect($actions,$information);
//     return $information;

    }


    public function testget(Request $request,$id)
    {
           dd($id);
//        if ($request->hasFile('src_img') || request()->file('mantle')) {
//            $bucket = "photo";
//            $folder = "zhu";
//            $file = $request->file('src_img');
//            $mantle = $request->file('mantle');
//            $name = $request->get('name');
//            $headline = $request->get('headline');
//            $title = $request->get('title');
//            $report_content = $request->get('report_content');
//            $weight = $request->get('weight');
//            $sort_id = $request->get('sort_id');
//            $retag_id = $request->get('retag_id');
//            $json_retag_id = json_encode($retag_id);
//            $resoult = new UploadController($file, $bucket, $folder);
//            $src_img = $resoult->upload();
//            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
//            $mantle = $mantle_resoult->upload();
//            $resoult = Report::create([
//                'name' => $name,
//                'headline' => $headline,
//                'title' => $title,
//                'weight' => $weight,
//                'mantle' => $mantle,
//                'src_img' => $src_img,
//                'report_content' => $report_content,
//                'sort_id' => $sort_id,
//                'retag_id' => $json_retag_id
//            ]);
//        }
//        Report::find($resoult->id)->retag()->attach($retag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
//        if (!empty($resoult)) {
//            return $this->jsonSuccess();
//        } else {
//            return $this->jsonResponse('1', '添加失败');
//        }


    }
//        $str=$img->dirname.'/'.$img->filename;
//        $client = $img->mime;
//       $end=explode('/',$client)['1'];
//                $ClientOriginalName = time() . rand(10000, 9999999) . '.' .$end;
//        $dstPath = "zhu/$ClientOriginalName";
//
//            $bucket = "photo";
//            $folder = "zhu";
//        $upload = QCloudCos::upload($bucket, $str, $dstPath);
//        return $upload;
//            $src_img = $resoult->upload();
//             dd($src_img);

}
