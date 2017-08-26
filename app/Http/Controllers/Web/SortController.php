<?php

namespace App\Http\Controllers\Web;

use App\Model\AbTage;
use App\Model\AcTage;
use App\Model\InTag;
use App\Model\ReTag;
use App\Model\Sort_About;
use App\Model\Sort_Activities;
use App\Model\Sort_Information;
use App\Model\Sort_Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SortController extends Controller
{
    //
    public function index(Request $request)
    {
        $choice=$request->get('choice');

        if ($choice=='report'){
            return Sort_Report::all();
        }
        if ($choice=='information'){
            return Sort_Information::all();
        }
        if ($choice=='activities'){
            return Sort_Activities::all();
        }
        if ($choice=='about'){
            return Sort_About::all();
        }


    }

}
