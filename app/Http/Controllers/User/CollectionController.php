<?php

namespace App\Http\Controllers\User;

use App\Model\Activities;
use App\Model\Information;
use App\Model\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    //
    public function reportcollection($report_id)
    {
        $report = Report::find($report_id);
        $report->collection = $report->collection + 1;
        $report_resoult=$report->save();
        if ($report_resoult) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '收藏失败');
        }

    }

    public function activitiescollection($activities_id)
    {
        $activities = Activities::find($activities_id);
        $activities->collection = $activities->collection + 1;
        $activities_resoutl=$activities->save();
        if ($activities_resoutl) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '收藏失败');
        }

    }

    public function informationcollection($information_id)
    {
        $information = Information::find($information_id);
        $information->collection = $information->collection + 1;
       $information_resoult=$information->save();
        if ($information_resoult) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '收藏失败');
        }

    }

}
