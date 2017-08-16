<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Information_Comment;
use App\Model\Users;
use Illuminate\Http\Request;

class InformationCommentController extends Controller
{
    //
    public function index(Users $users,Request $request)
    {
        $see_id=$request->get('see_id');
        $information=$users->user_informations()->with('information_comments');
        if ($see_id){
            $information->where('information.id',$see_id);
        }
        return $information->paginate(8);
    }

    public function store(Users $users,Request $request)
    {
        $comment = $request->get('comment');
        $information_id = $request->get('information_id');
        $information_comment = Information_Comment::where('information_id', $information_id)->where('user_id', $users->id)->first();
        if ($information_comment) {
            $information_comment = Information_Comment::create([
                'comment' => $comment,
                'user_id' => $users->id,
                'information_id' => $information_id
            ]);
        } else {
            $users->informations()->attach($information_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
            $report_comment = Reports_Comments::create([
                'comment' => $comment,
                'user_id' => $users->id,
                'information_id' => $information_id
            ]);
        }
        if ($report_comment) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加成功');
        }
    }
    public function destroy(Users $users,$comment_id, Request $request)
    {
        $information_id=$request->get('information_id');
        $information =$users->informations()->where('information.id', $information_id)->first();
        $information_comments=$information->information_comments()->where('id',$comment_id)->delete();
        if ($information_comments) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除成功');
        }
    }
}
