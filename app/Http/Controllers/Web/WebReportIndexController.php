<?php

namespace App\Http\Controllers\Web;

use App\Model\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebReportIndexController extends Controller
{
    public function index(Request $request)
    {
        $sort_id=$request->get('sort_id');
        $pag=$request->get('pag');
        return Report::with(['sort_reports','retag'])->where('sort_id',$sort_id)->orderBy('weight','desc')->orderBy('view','desc')->paginate($pag);
    }
    public function newindex(Request $request)
    {
        $pag=$request->get('pag');
        return Report::with(['sort_reports','retag'])->orderBy('weight','desc')->orderBy('view','desc')->paginate($pag);
    }
}
