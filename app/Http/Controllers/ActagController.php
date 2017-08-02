<?php

namespace App\Http\Controllers;

use App\Model\AcTage;
use Illuminate\Http\Request;

class ActagController extends Controller
{
    //
    public function index()
    {
        return AcTage::orderBy('citations','desc')->paginate(8);
    }

    public function store(Request $request)
    {
        $name=$request->get('name');
        $citations=$request->get('citations');
        $actag=AcTage::create([
            'name'=>$name,
            'citations'=>$citations
        ]);
        if ($actag){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $resoult=AcTage::find($id)->delete();
        if ($resoult){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function update(Request $request,$id)
    {
        $name=$request->get('name');
        $citations=$request->get('citations');

        $actag=InTag::find($id)->update([
            'name'=>$name,
            'citations'=>$citations
        ]);
        if ($actag){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '修改失败');
        }
    }
}
