<?php

namespace App\Http\Controllers;
use App\Model\Sort_Activities;
use Illuminate\Http\Request;

class SortActivitiesController extends Controller
{
    //get
    public function index()
    {
        return Sort_Activities::paginate(8);
    }
 //post
    public function store(Request $request)
    {
        $sort=$request->get('sort');
        $sort_resour=Sort_Activities::create([
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
        $resoult=Sort_Activities::find($id)->delete();
        if ($resoult){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function update(Request $request,$id)
    {
        $sort=$request->get('sort');

        $sort_activities=Sort_Activities::find($id)->update([
            'sort'=>$sort,
        ]);
        if ($sort_activities){
            return $this->jsonSuccess();
        }else{
            return $this->jsonResponse('1', '修改失败');
        }
    }
}
