<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Report;
use App\Model\Report_Users;
use App\Model\Reports_Comments;
use App\Model\Users;
use Illuminate\Http\Request;

class ReportCommentController extends Controller
{

    public function index(Users $users, Request $request)
    {
        $report_id = $request->get('report_id');
        $reports = $users->reports()->with('reports_comments');
        if ($report_id) {
            $reports->where('reports.id', $report_id);
        }
        return $reports->paginate(8);
    }

    public function store(Users $users, Request $request)
    {
        $comment = $request->get('comment');
        $reports_id = $request->get('reports_id');
        $report_users = Report_Users::where('report_id', $reports_id)->where('user_id', $users->id)->first();
        if ($report_users) {
            $report_comment = Reports_Comments::create([
                'comment' => $comment,
                'user_id' => $users->id,
                'reports_id' => $reports_id
            ]);
        } else {
            $users->reports()->attach($reports_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
            $report_comment = Reports_Comments::create([
                'comment' => $comment,
                'user_id' => $users->id,
                'reports_id' => $reports_id
            ]);
        }
        if ($report_comment) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加成功');
        }
    }

    public function destroy(Users $users, $comment_id, Request $request)
    {
        $reports_id = $request->get('report_id');
        $report = $users->reports()->where('reports.id', $reports_id)->first();
        $report_comments = $report->reports_comments()->where('id', $comment_id)->delete();
        if ($report_comments) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除成功');
        }
    }
}
