<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/7/24
 * Time: 15:26
 */
namespace App\Http\Traits;

use App\Model\Activities;
use App\Model\ActivitiesTwo;
use App\Model\Report;
use App\Model\ReportTwo;
use App\Model\Users;


trait view
{
    public function click_report($id)
    {
        $report = Report::where('report_id',$id)->first();
        $report->view = $report->view + 1;
        $report->save();
    }

    public function click_report_two($id)
    {
        $report_two = ReportTwo::where('report_two_id',$id)->first();
        $report_two->view = $report_two->view + 1;
        $report_two->save();
    }

    public function click_activities($id)
    {
        $activities = Activities::where('activities_id',$id)->first();
        $activities->view = $activities->view + 1;
        $activities->save();
    }

    public function click_activities_two($id)
    {
        $activities_two = ActivitiesTwo::where('activities_two_id',$id)->first();
        $activities_two->view = $activities_two + 1;
        $activities_two->save();
}
}