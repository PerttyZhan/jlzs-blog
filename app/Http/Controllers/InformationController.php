<?php

namespace App\Http\Controllers;

use App\Model\Information;
use App\Model\Report;
use App\Model\Users;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    //
    public function index()
    {
        dd(Information::all());
       return Users::find(1)->informations;
    }
}
