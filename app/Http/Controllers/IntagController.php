<?php

namespace App\Http\Controllers;

use App\Model\Information;
use App\Model\InTag;
use Illuminate\Http\Request;

class IntagController extends Controller
{
    //
    public function index()
    {
        return InTag::orderBy('citations','desc')->paginate(8);
    }

    public function store(Request $request)
    {
        $name=$request->get('name');
        $citations=$request->get('citations');
        $intag=InTag::create([
        'name'=>$name,
        'citations'=>$citations
    ]);
        if ($intag){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $resoult=InTag::find($id)->delete();
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

        $intag=InTag::find($id)->update([
            'name'=>$name,
            'citations'=>$citations
        ]);
        if ($intag){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '修改失败');
        }
    }
}
