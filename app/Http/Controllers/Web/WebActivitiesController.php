<?php

namespace App\Http\Controllers\Web;

use App\Model\Activities;
use App\Model\ReTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebActivitiesController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_id=$request->get('sort_id');
        $pag=$request->get('pag');
        return Activities::with(['sort_activities','actag'])->where('sort_id',$sort_id)->orderBy('weight','desc')->orderBy('view','desc')->paginate($pag);
    }
}
