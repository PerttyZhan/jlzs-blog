<?php

namespace App\Http\Controllers;

use App\Model\Users;
use App\Model\WebSite;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use League\Flysystem\Exception;
use phpDocumentor\Reflection\Types\Array_;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search == null) {
            return WebSite::get();
        } else {
            $resoult = explode(',', $search);
            return WebSite::whereIn('name', $resoult)->paginate(8);
        }

    }

    public function update(Request $request)
    {
        $copyright = $request->get('copyright');
        $web_description = $request->get('web_description');
        $key_word = $request->get('key_word');
        $web_title = $request->get('web_title');
        if ($copyright) {
            $resoult = WebSite::where('name', 'copyright')->update(['values' => $copyright]);
        }
        if ($web_description) {
            $resoult = WebSite::where('name', 'web_description')->update(['values', $web_description]);
        }
        if ($key_word) {
            $resoult = WebSite::where('name', 'key_word')->update(['values', $key_word]);
        }
        if ($web_title) {
            $resoult = WebSite::where('name', 'web_title')->update(['values', $web_title]);
        }
        if ($resoult) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改失败');
        }


    }
}

