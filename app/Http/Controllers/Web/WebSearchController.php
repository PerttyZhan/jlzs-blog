<?php

namespace App\Http\Controllers\Web;

use App\Model\Activities;
use App\Model\Information;
use App\Model\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class WebSearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $difference = $request->get('difference');
        $tag_id = $request->get('tag_id');
        if ($difference == 'retag') {
            $report = Report::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->orderBy('weight', 'desc')->with(['sort_reports', 'tag']);
            if ($tag_id) {
                $report->where('tag_id', 'like', '%' . $tag_id . '%');
            }
            return $report->paginate(5);
        }
        if ($difference == 'intag') {
            $information = Information::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->orderBy('weight', 'desc')->with(['sort_information', 'tag']);
            if ($tag_id) {
                $information->where('tag_id', 'like', '%' . $tag_id . '%');
            }
            return $information->paginate(5);
        }
        if ($difference == 'actag') {
            $all = Activities::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')
                ->orderBy('weight', 'desc')->with(['sort_activities', 'tag']);
            if ($tag_id) {
                $all->where('tag_id', 'like', '%' . $tag_id . '%');
            }
            return $all->paginate(5);
        }


    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $report = Report::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view','like','weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_reports', 'tag'])->whereHas('tag', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->orWhere(function ($q) use ($search) {
                $q->where('headline', 'like', '%' . $search . '%');
            })->orWhere(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })->get()->toArray();
        $information = Information::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_information', 'tag'])->whereHas('tag', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->orWhere(function ($q) use ($search) {
                $q->where('headline', 'like', '%' . $search . '%');
            })->orWhere(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })->get()->toArray();

        $activities = Activities::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_activities', 'tag'])->whereHas('tag', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->orWhere(function ($q) use ($search) {
                $q->where('headline', 'like', '%' . $search . '%');
            })->orWhere(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })->get()->toArray();
        $list = array_merge($report, $information, $activities);
        $page = 1;
        $perPage = 8;//每页的条数
        $offset = ($page * $perPage) - $perPage;

        $lists = new LengthAwarePaginator(array_slice($list, $offset, $perPage, true), count($list), $perPage,
            $page, ['path' => \Illuminate\Support\Facades\Request::url()]);
        return $lists;
    }
}
