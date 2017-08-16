<?php

namespace App\Http\Controllers\Web;

use App\Model\AcTage;
use App\Model\Activities;
use App\Model\Information;
use App\Model\InTag;
use App\Model\Report;
use App\Model\ReTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WebNewController extends Controller
{
    //
    public function index(Request $request)
    {
        $report = Report::select('id', 'name', 'headline', 'collection','img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'created_at', 'updated_at', 'deleted_at')->with(['sort_reports', 'retag']);
        $information = Information::select('id', 'name', 'headline','collection' ,'img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'created_at', 'updated_at', 'deleted_at')->with(['sort_information', 'intag']);
        return Activities::select('id', 'name', 'headline','collection', 'img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'created_at', 'updated_at', 'deleted_at')->with(['sort_activities', 'actag'])->orderBy('view', 'desc')
            ->union($report)
            ->union($information)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    public function hot(Request $request)
    {
        $report = Report::select('id', 'name', 'headline', 'collection','img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'created_at', 'updated_at', 'deleted_at')->with(['sort_reports', 'retag']);
        $information = Information::select('id', 'name', 'headline','collection' ,'img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'created_at', 'updated_at', 'deleted_at')->with(['sort_information', 'intag']);
        return Activities::select('id', 'name', 'headline','collection', 'img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'content', 'created_at', 'updated_at', 'deleted_at')->with(['sort_activities', 'actag'])->orderBy('view', 'desc')
            ->union($report)
            ->union($information)
            ->orderBy('weight', 'desc')
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();
    }

    public function hottag(Request $request)
    {
     $retag=ReTag::select('id','name','citations','created_at','updated_at');
        $retag=InTag::select('id','name','citations','created_at','updated_at');
        return AcTage::select('id','name','citations','created_at','updated_at')
            ->union($retag)
            ->union($retag)
            ->orderBy('citations','desc')
            ->take(7)
            ->pluck('name');

    }
}
