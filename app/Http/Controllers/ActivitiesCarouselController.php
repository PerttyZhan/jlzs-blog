<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Activities;
use App\Model\Activities_Carousel;
use Illuminate\Http\Request;

class ActivitiesCarouselController extends Controller
{
    //
    public function index()
    {
        return Activities_Carousel::paginate(8);
    }

    public function store(Request $request)
    {
        $src=$request->get('src');
        if (!empty($src)){
            $resoult = Activities_Carousel::create([
                'src_img' => $src,
            ]);
            if (!empty($resoult)) {
                return $this->jsonSuccess();
            } else {
                return $this->jsonResponse('1', '添加失败');
            }
        }else{
            if ($request->hasFile('src_img')) {
                $bucket = "photo";
                $folder = "zhu";
                $file = $request->file('src_img');
                $resoult = new UploadController($file, $bucket, $folder);
                $src_img = $resoult->upload();
                $mantle_resoult = new UploadController($file, $bucket, $folder);
                $mantle = $mantle_resoult->upload();
                $resoult = Activities_Carousel::create([
                    'src_img' => $src_img,
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
        $resoult=Activities_Carousel::destroy($id);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除失败');
        }
    }
}
