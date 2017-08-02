<?php

namespace App\Http\Controllers;

use App\Model\AbTage;
use Illuminate\Http\Request;

class AbtagController extends Controller
{
    //
    //
    public function index()
    {
        return AbTage::orderBy('citations','desc')->paginate(8);
    }

    public function store(Request $request)
    {
        $name=$request->get('name');
        $citations=$request->get('citations');
        $abtag=AbTage::create([
            'name'=>$name,
            'citations'=>$citations
        ]);
        if ($abtag){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $resoult=AbTage::find($id)->delete();
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

        $abtag=AbTage::find($id)->update([
            'name'=>$name,
            'citations'=>$citations
        ]);
        if ($abtag){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '修改失败');
        }
    }
}
