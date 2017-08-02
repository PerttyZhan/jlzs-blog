<?php

namespace App\Http\Controllers;

use App\Model\Sort_About;
use Illuminate\Http\Request;

class SortAboutController extends Controller
{
    //
    public function index()
    {
        return Sort_About::paginate(8);
    }
    //post
    public function store(Request $request)
    {
        $sort=$request->get('sort');
        $sort_resour=Sort_About::create([
                'sort'=>$sort
            ]
        );
        if ($sort_resour){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '添加失败');
        }
    }
    //delete
    public function destroy($id)
    {
        $resoult=Sort_About::find($id)->delete();
        if ($resoult){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '删除失败');
        }
    }
}
