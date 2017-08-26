<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class AuthWeixinLoginController extends Controller
{
    //
    public function weinxinlogin()
    {
        return Socialite::with('weixin')->redirect();
    }

    public function weixin()
    {
        $user = Socialite::driver('weixin')->user();
        dd($user);
    }
}
