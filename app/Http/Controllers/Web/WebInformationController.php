<?php

namespace App\Http\Controllers\Web;

use App\Model\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebInformationController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_id=$request->get('sort_id');
        $pag=$request->get('pag');
        return Information::with(['sort_information','intag'])->where('sort_id',$sort_id)->orderBy('weight','desc')->orderBy('view','desc')->paginate($pag);
    }
}
