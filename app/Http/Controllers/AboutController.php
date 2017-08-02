<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_id = $request->get('sort_id');
        $id=$request->get('id');
        $about=About::with(['sort_about','abtag'])->orderBy('view','desc')->orderBy('weight','desc');
        if ($sort_id) {
            $about->where('sort_id', $sort_id);
        }
        if ($id){
            $about->where('id',$id);
                $about_view = About::where('id', $id)->first();
            $about_view->view = $about_view->view+ 1;
            $about_view->save();

        }
        return $about->paginate(8);
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
            $about_content = $request->get('about_content');
            $weight = $request->get('weight');
            $sort_id = $request->get('sort_id');
            $abtag_id=$request->get('abtag_id');

            $json_abtag_id=json_encode($abtag_id);
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = About::create([
                'name'=>$name,
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'about_content' => $about_content,
                'sort_id'=>$sort_id,
                'retag_id'=>$json_abtag_id
            ]);
        }
        About::find($resoult->id)->abtag()->attach($abtag_id,['created_at'=>date('Y-m-d H-i-s'),'updated_at'=>date('Y-m-d H-i-s')]);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }


    public function update(Request $request,$id)
    {

        if ($request->hasFile('src_img') || request()->file('mantle')) {
            $bucket = "photo";
            $folder = "zhu";
            $file = $request->file('src_img');
            $mantle = $request->file('mantle');
            $name=$request->get('name');
            $headline = $request->get('headline');
            $title = $request->get('title');
            $about_content = $request->get('about_content');
            $weight = $request->get('weight');
            $sort_id = $request->get('sort_id');
            $abtag_id=$request->get('abtag_id');

            $json_abtag_id=json_encode($abtag_id);
            $resoult = new UploadController($file, $bucket, $folder);
            $src_img = $resoult->upload();
            $mantle_resoult = new UploadController($mantle, $bucket, $folder);
            $mantle = $mantle_resoult->upload();
            $resoult = About::find($id)->update([
                'name'=>$name,
                'headline' => $headline,
                'title' => $title,
                'weight' => $weight,
                'mantle' => $mantle,
                'src_img' => $src_img,
                'about_content' => $about_content,
                'sort_id'=>$sort_id,
                'abtag_id'=>$json_abtag_id
            ]);
        }
        About::find($id)->abtag()->detach();
        About::find($id)->abtag()->attach($abtag_id,['created_at'=>date('Y-m-d H-i-s'),'updated_at'=>date('Y-m-d H-i-s')]);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $report = About::destroy($id);
        if ($report) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function status($id,Request $request)
    {
        $status=About::find($id)->update([
            'status'=>1,
        ]);
        if ($status) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改状态失败');
        }
    }
}
