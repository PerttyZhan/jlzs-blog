<?php

namespace App\Http\Controllers;

use App\Model\Sort_Information;
use Illuminate\Http\Request;

class SortInformationController extends Controller
{
    //
    public function index()
    {
        return Sort_Information::paginate(8);
    }
    //post
    public function store(Request $request)
    {
        $sort=$request->get('sort');
        $sort_resour=Sort_Information::create([
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
        $resoult=Sort_Information::find($id)->delete();
        if ($resoult){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function update(Request $request,$id)
    {
        $sort=$request->get('sort');

        $sort_information=Sort_Information::find($id)->update([
            'sort'=>$sort,
        ]);
        if ($sort_information){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '修改失败');
        }
    }


}
