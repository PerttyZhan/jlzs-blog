<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Upload\UploadController;
use Illuminate\Http\Request;

class ApiUploadController extends Controller
{
    //
    public function upload(Request $request)
    {
        $file=$request->file('file');
        $scaling=$request->get('scaling');
        $uploadresoult=new UploadController($file,$scaling);
        $url=$uploadresoult->upload();
         return $url;
    }
}
