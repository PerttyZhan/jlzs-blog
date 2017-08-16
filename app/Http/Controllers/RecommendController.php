<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Recommend;
use App\Model\Reports_Comments;
use Illuminate\Http\Request;

class RecommendController extends Controller
{
    //
    public function index()
    {
        return Recommend::paginate(8);
    }

    public function store(Request $request)
    {
        $src=$request->get('src');
        $link=$request->get('link');

        $resoult = Recommend::create([
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
        $resoult=Recommend::destroy($id);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }
}
