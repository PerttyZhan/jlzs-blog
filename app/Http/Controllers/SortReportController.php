<?php

namespace App\Http\Controllers;

use App\Model\Sort_Report;
use Illuminate\Http\Request;


class SortReportController extends Controller
{
    //
    public function index()
    {
        return Sort_Report::paginate(8);
    }
    //post
    public function store(Request $request)
    {
        $sort=$request->get('sort');
        $sort_resour=Sort_Report::create([
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
        $resoult=Sort_Report::find($id)->delete();
        if ($resoult){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '删除失败');
        }
    }

}
