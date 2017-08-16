<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Activities_Comments;
use App\Model\Activities_Users;
use App\Model\Users;
use Illuminate\Http\Request;

class ActivitiesCommentController extends Controller
{
    //
    public function index(Users $users,Request $request)
    {
        $see_id=$request->get('see_id');
        $activities=$users->user_activities()->with('activities_comments');
        if ($see_id){
            $activities->where('activities.id',$see_id);
        }
        return $activities->paginate(8);
    }

    public function store(Users $users,Request $request)
    {
        $comment = $request->get('comment');
        $activities_id = $request->get('activities_id');
        $activities_users = Activities_Users::where('activities_id', $activities_id)->where('user_id', $users->id)->first();

        if ($activities_users) {
            $activities_comment = Activities_Comments::create([
                'comment' => $comment,
                'user_id' => $users->id,
                'activities_id' => $activities_id
            ]);
        } else {
            $users->activities()->attach($activities_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
            $activities_comment = Activities_Comments::create([
                'comment' => $comment,
                'user_id' => $users->id,
                'activities_id' => $activities_id
            ]);
        }
        if ($activities_comment) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加成功');
        }
    }
    public function destroy(Users $users,$comment_id, Request $request)
    {
        $activities_id=$request->get('activities_id');
        $activities =$users->activities()->where('activities.id', $activities_id)->first();
        $activities_comments=$activities->activities_comments()->where('id',$comment_id)->delete();
        if ($activities_comments) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除成功');
        }
    }
}
