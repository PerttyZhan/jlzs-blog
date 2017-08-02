<?php

namespace App\Http\Controllers;

use App\Model\ReTag;
use Illuminate\Http\Request;

class RetagController extends Controller
{
    //
    public function index()
    {
        return ReTag::orderBy('citations','desc')->paginate(8);
    }

    public function store(Request $request)
    {
        $name=$request->get('name');
        $citations=$request->get('citations');
        $retag=ReTag::create([
            'name'=>$name,
            'citations'=>$citations
        ]);
        if ($retag){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $resoult=ReTag::find($id)->delete();
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

        $retag=InTag::find($id)->update([
            'name'=>$name,
            'citations'=>$citations
        ]);
        if ($retag){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '修改失败');
        }
    }
}
