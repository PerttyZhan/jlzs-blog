<?php

namespace App\Http\Controllers\Web;

use App\Model\About;
use App\Model\Activities;
use App\Model\Information;
use App\Model\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebIndexController extends Controller
{
    public function index(Request $request)
    {
        $choice=$request->get('choice');

        if ($choice=='report'){
            $sort_id=$request->get('sort_id');
            $report=Report::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_reports','retag'])->orderBy('weight','desc');
            if ($sort_id){
                $report->where('sort_id',$sort_id);
            }
            return $report->take(4)->get();
        }
        if ($choice=='information'){
            $sort_id=$request->get('sort_id');
            $information=Information::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_information','intag'])->orderBy('weight','desc');
            if ($sort_id){
                $information->where('sort_id',$sort_id);
            }
            return $information->take(4)->get();
        }
        if ($choice=='activities'){
            $sort_id=$request->get('sort_id');
            $activities=Activities::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_activities','actag'])->orderBy('weight','desc');
            if ($sort_id){
                $activities->where('sort_id',$sort_id);
            }
            return $activities->take(4)->get();
        }
        if ($choice=='about'){
            $sort_id=$request->get('sort_id');
            $activities=About::select('id', 'name','content', 'headline', 'collection','img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_about','abtag'])->orderBy('weight','desc');
            if ($sort_id){
                $activities->where('sort_id',$sort_id);
            }
            return $activities->take(4)->get();
        }

    }
}
