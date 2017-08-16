<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use App\Model\Activities;
use App\Model\Information;
use App\Model\Report;
use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountController extends Controller
{
    //
    public function count(Request $request)
    {
        $report_count=Report::count();
        $activities_count=Activities::count();
        $information_count=Information::count();
        $count=[
            'report_count'=>$report_count,
            'activities_count'=>$activities_count,
            'information_count'=>$information_count
        ];
        return $count;
    }
}
