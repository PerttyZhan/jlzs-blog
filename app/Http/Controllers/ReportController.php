<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Report;
use App\Model\ReTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_id = $request->get('sort_id');
        $tag_id = $request->get('tag_id');
        $start_time = request('start_time');
        $end_time = request('end_time');
        $status = $request->get('status');
        $content = $request->get('with');

        $collection = $request->get('collection');
        $view = $request->get('view');
        $weight = $request->get('weight');
        $create = $request->get('creat_at');

        $report = Report::select('id', 'name', 'headline', 'img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'collection', 'created_at', 'updated_at', 'deleted_at')->with(['sort_reports', 'retag']);
        if ($status != null) {
            $report->where('status', $status);
        }
        if ($sort_id) {
            $report->where('sort_id', $sort_id);
        }
        if ($start_time) {
            $report->where('created_at', '>=', $start_time);
        }
        if ($end_time) {
            $report->where('created_at', '<=', $end_time);
        }
        if ($tag_id) {
            $report->where('tag_id', 'like', '%' . $tag_id . '%');
        }

        if ($collection != null) {
            if ($collection == 0) {
                $report->orderBy('collection', 'desc');
            }
            if ($collection == 1) {
                $report->orderBy('collection', 'asc');
            }
        }
        if ($view != null) {
            if ($view == 0) {
                $report->orderBy('view', 'desc');
            }
            if ($weight == 1) {
                $report->orderBy('view', 'asc');
            }
        }
        if ($weight != null) {
            if ($weight == 0) {
                $report->orderBy('weight', 'desc');
            }
            if ($weight == 1) {
                $report->orderBy('weight', 'asc');
            }
        }
        if ($create != null) {
            if ($create == 0) {
                $report->orderBy('created_at', 'desc');
            }
            if ($weight == 1) {
                $report->orderBy('created_at', 'asc');
            }
        }
        if ($content) {
            return $report->addSelect('content')->paginate(8);
        } else {
            return $report->paginate(8);
        }

    }

    public function info($id)
    {
        return Report::where('id', $id)->with('sort_reports', 'retag')->first();
    }

    public function store(Request $request, $id)
    {

        $name = $request->get('name');
        $headline = $request->get('headline');
        $title = $request->get('title');
        $report_content = $request->get('content');
        $weight = $request->get('weight');
        $sort_id = $request->get('sort_id');
        $retag_id = $request->get('tag_id');
        $img_src = $request->get('img_src');
        $json_retag_id = json_encode($retag_id);
        $resoult = Report::create([
            'name' => $name,
            'headline' => $headline,
            'title' => $title,
            'weight' => $weight,
            'content' => $report_content,
            'sort_id' => $sort_id,
            'tag_id' => $json_retag_id,
            'user_id' => $id,
            'img_src' => $img_src
        ]);

        Report::find($resoult->id)->retag()->attach($retag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
        $retag = ReTag::whereIn('id', $retag_id)->get();
        foreach ($retag as $k => $y) {
            $y->citations = $y->citations + 1;
            $y->save();
        }
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }


    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $headline = $request->get('headline');
        $title = $request->get('title');
        $report_content = $request->get('content');
        $weight = $request->get('weight');
        $sort_id = $request->get('sort_id');
        $retag_id = $request->get('tag_id');
        $img_src = $request->get('img_src');
        $json_retag_id = json_encode($retag_id);
        $resoult = Report::find($id)->update([
            'name' => $name,
            'headline' => $headline,
            'title' => $title,
            'weight' => $weight,
            'content' => $report_content,
            'sort_id' => $sort_id,
            'tag_id' => $json_retag_id,
            'img_src' => $img_src
        ]);

        Report::find($id)->retag()->detach();
        Report::find($id)->retag()->attach($retag_id, ['created_at' => date('Y-m-d H-i-s'), 'updated_at' => date('Y-m-d H-i-s')]);
        if (!empty($resoult)) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '添加失败');
        }
    }

    public function destroy($id)
    {
        $report = Report::destroy($id);
        if ($report) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '删除失败');
        }
    }

    public function status($id, Request $request)
    {
        $status_r = $request->get('status');
        $status = Report::find($id)->update([
            'status' => $status_r,
        ]);
        if ($status) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改状态失败');
        }
    }
}
