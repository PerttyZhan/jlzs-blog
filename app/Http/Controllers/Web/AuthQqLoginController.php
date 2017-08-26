<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class AuthQqLoginController extends Controller
{
    //
    public function qqlogin()
    {
        return Socialite::with('qq')->redirect();
    }

    public function qq()
    {
        $user = Socialite::driver('qq')->user();
        dd($user);
    }
}
