<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Index_Carousel;
use Illuminate\Http\Request;

class IndexCarouselController extends Controller
{
    //
    public function index()
    {
        return Index_Carousel::paginate(8);
    }

    public function store(Request $request)
    {
        $src=$request->get('src');
        if (!empty($src)){
            $resoult = Index_Carousel::create([
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
                $resoult = Index_Carousel::create([
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
        $resoult=Index_Carousel::destroy($id);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }
}
