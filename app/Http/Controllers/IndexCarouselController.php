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
        $link=$request->get('link');

            $resoult = Index_Carousel::create([
                'src_img' => $src,
                'link'=>$link
            ]);
            if (!empty($resoult)) {
                return $this->jsonSuccess();
            } else {
                return $this->jsonResponse('1', '添加失败');
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
