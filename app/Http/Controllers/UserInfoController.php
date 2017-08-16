<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Users;
use Illuminate\Http\Request;


class UserInfoController extends Controller
{
    //
    public function index(Request $request)
    {
        $id=$request->get('id');
        $user=Users::with('roles')
            ->withCount('reports')
            ->withCount('informations')
            ->withCount('activities');
           if ($id){
               $user->where('id',$id);
           }
        return $user->paginate(8);
    }
}
