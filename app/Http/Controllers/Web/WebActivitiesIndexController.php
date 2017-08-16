<?php

namespace App\Http\Controllers\Web;

use App\Model\Activities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebActivitiesIndexController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_id=$request->get('sort_id');
        $pag=$request->get('pag');
        return Activities::with(['sort_activities','actag'])->where('sort_id',$sort_id)->orderBy('weight','desc')->orderBy('view','desc')->paginate($pag);
    }
    public function newindex(Request $request)
    {
        $pag=$request->get('pag');
        return Activities::with(['sort_activities','actag'])->orderBy('weight','desc')->orderBy('view','desc')->paginate($pag);
    }
}
