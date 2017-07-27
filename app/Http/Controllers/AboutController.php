<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {

        return About::paginate(8);
    }

    public function store(Request $request)
    {
        $file_image = $request->file('src_img');
        $about_content = $request->get('about_content');
        $title=$request->get('title');
        if ($file_image == null || $about_content == null) {
        return $this->jsonResponse('999','请填写数据');
        }else {
            if (!empty($file_image)) {
                $bucket = "photo";
                $folder = "zhu";
                $upload=new UploadController($file_image,$bucket,$folder);
                $src_img=$upload->upload();
                $about=About::insert([
                    'title'=>$title,
                    'src_img' => $src_img,
                    'about_content' => $about_content,
                    'created_at'=>date('Y-m-d H-i-s'),
                    'updated_at'=>date('Y-m-d H-i-s')
                ]);
            } else {
                $about=About::insert([
                    'title'=>$title,
                    'about_content' => $about_content,
                    'created_at'=>date('Y-m-d H-i-s'),
                    'updated_at'=>date('Y-m-d H-i-s')
                ]);
            }
        }
       if ($about){
            return $this->jsonSuccess();
       }
    }

    public function destroy($id)
    {
           $about=About::destroy($id);
           if ($about){
               return $this->jsonSuccess();
           }else{
               return $this->jsonResponse('1','删除失败');
           }
    }
}
