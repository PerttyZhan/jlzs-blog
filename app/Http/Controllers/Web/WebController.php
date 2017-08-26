<?php

namespace App\Http\Controllers\Web;

use App\Model\About;
use App\Model\AbTage;
use App\Model\Activities;
use App\Model\Information;
use App\Model\Report;
use App\Model\ReTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    //

    public function index(Request $request)
    {
        $choice = $request->get('choice');
        if ($choice==null){
            $report = Report::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view', 'weight','like', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at');
            $information = Information::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view','like','weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at');
            return Activities::select('id', 'difference', 'name', 'headline', 'collection', 'img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')
                ->union($report)
                ->union($information)
                ->orderBy('weight', 'desc')
                ->get();
        }
        if ($choice == 'report') {
            $sort_id = $request->get('sort_id');
            $pag = $request->get('pag');
            $report = Report::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_reports', 'retag']);
            if ($sort_id) {
                $report->where('sort_id', $sort_id);
            }
            return $report->orderBy('weight', 'desc')->orderBy('view', 'desc')->paginate(5);
        }
        if ($choice =='information') {
            $sort_id = $request->get('sort_id');
            $pag = $request->get('pag');
            $information = Information::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view', 'like','weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_information', 'intag']);
            if ($sort_id) {
                $information->where('sort_id', $sort_id);
            }
            return $information->orderBy('weight', 'desc')->orderBy('view', 'desc')->paginate(5);
        }
        if ($choice == 'activities') {
            $sort_id = $request->get('sort_id');
            $pag = $request->get('pag');
            $Activities = Activities::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view','like','weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_activities', 'actag']);
            if ($sort_id) {
                $Activities->where('sort_id', $sort_id);
            }
            return $Activities->orderBy('weight', 'desc')->orderBy('view', 'desc')->paginate(5);
        }
        if ($choice == 'about') {
            $sort_id = $request->get('sort_id');
            $pag = $request->get('pag');
            $about = About::select('id', 'name', 'content','headline', 'collection','img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_about', 'abtag']);
            if ($sort_id) {
                $about->where('sort_id', $sort_id);
            }
            return $about->orderBy('weight', 'desc')->orderBy('view', 'desc')->paginate(5);
        }
    }

    public function show($id, Request $request)
    {
        $choice = $request->get('choice');
        if ($choice == 'report') {
            $report = Report::where('id', $id)->with(['sort', 'tag'])->first();
            $report->view = $report->view + 1;
            $report->save();
            return $report;
        }
        if ($choice =='information') {
            $information = Information::where('id', $id)->with(['sort', 'tag'])->first();
            $information->view = $information->view + 1;
            $information->save();
            return $information;
        }
        if ($choice == 'activities') {
            $Activities = Activities::where('id', $id)->with(['sort', 'tag'])->first();
            $Activities->view = $Activities->view + 1;
            $Activities->save();
            return $Activities;
        }
        if ($choice == 'about') {
            $about = About::where('id', $id)->with(['sort', 'tag'])->first();
            $about->view = $about->view + 1;
            $about->save();
            return $about;
        }


    }

    public function about($id, Request $request)
    {
        $choice = $request->get('choice');

        if ($choice == 'report') {
            $report = Report::where('id', $id)->first();
            $jtag_id = $report->tag_id;
            $tag_id = json_decode($jtag_id);
            if ($tag_id==null) {
                return $this->jsonResponse('1', '没有相关文章');
            } else {
                return Report::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_reports', 'retag'])->whereHas('retag', function ($query) use ($tag_id) {
                    $query->whereIn('retag.id', $tag_id);
                })->Where('id','!=',$id)->paginate(6);
            }
        }
        if ($choice =='information') {
            $report = Information::where('id', $id)->first();
            $jtag_id = $report->tag_id;
            $tag_id = json_decode($jtag_id);
            if ($tag_id==null) {
                return $this->jsonResponse('1', '没有相关文章');
            } else {
                return Information::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_information', 'intag'])->whereHas('intag', function ($query) use ($tag_id) {
                    $query->whereIn('intag.id', $tag_id);
                })->Where('id','!=',$id)->paginate(6);
            }
        }
        if ($choice == 'activities') {
            $report = Activities::where('id', $id)->with(['sort_activities', 'actag'])->first();
            $jtag_id = $report->tag_id;
            $tag_id = json_decode($jtag_id);
            if ($tag_id==null) {
                return $this->jsonResponse('1', '没有相关文章');
            } else {
                return Activities::select('id','difference', 'name', 'headline', 'collection','img_src', 'title', 'view','like', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_activities', 'actag'])->whereHas('actag', function ($query) use ($tag_id) {
                    $query->whereIn('actag.id', $tag_id);
                })->Where('id','!=',$id)->paginate(6);
            }
        }
        if ($choice == 'about') {
            $about = About::where('id', $id)->with(['sort_about', 'abtag'])->first();
            $jtag_id = $about->tag_id;
            $tag_id = json_decode($jtag_id);
            if ($tag_id==null) {
                return $this->jsonResponse('1', '没有相关文章');
            } else {
                return About::select('id', 'name', 'headline', 'collection','img_src', 'title', 'view', 'weight', 'status', 'sort_id', 'tag_id', 'user_id', 'created_at', 'updated_at', 'deleted_at')->with(['sort_about', 'abtag'])->whereHas('abtag', function ($query) use ($tag_id) {
                    $query->whereIn('actag.id', $tag_id);
                })->Where('id','!=',$id)->paginate(6);
            }
        }

    }
}
