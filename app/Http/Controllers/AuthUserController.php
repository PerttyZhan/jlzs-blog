<?php

namespace App\Http\Controllers;

use App\Model\Users;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{

    public function index(Request $request)
    {
        $api_token=$request->get('api_token');

        return Users::where('api_token',$api_token)->with('roles')->first();
    }
}
