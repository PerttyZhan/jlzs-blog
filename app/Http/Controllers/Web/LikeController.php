<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Model\Activities;
use App\Model\Information;
use App\Model\Report;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function like(Request $request,$id)
    {
        $choice=$request->get('choice');
        if ($choice=='report'){
            $report=Report::where('id',$id)->first();
            $report->like=$report->like+1;
            $report->save();
            return $this->jsonSuccess();
        }
        if ($choice=='activities'){
             $activities=Activities::where('id',$id)->first();
             $activities->like=$activities->like+1;
             $activities->save();
            return $this->jsonSuccess();
        }
        if ($choice=='information'){
             $information=Information::where('id',$id)->first();
             $information->like=$information->like+1;
             $information->save();
            return $this->jsonSuccess();
        }
    }
}
