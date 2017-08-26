<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JSSDK;

class SignatureController extends Controller
{
    public function getSignPackage(Request $request) {
        require_once app_path()."/Tool/php/jssdk.php";
        $jssdk = new JSSDK("yourAppID", "yourAppSecret");
        $signPackage = $jssdk->GetSignPackage();
        return $signPackage;
    }



}

