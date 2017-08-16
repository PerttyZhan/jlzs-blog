<?php

namespace App\Http\Controllers\Web;

use App\Model\Index_Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebIndexCarouselController extends Controller
{
    //
    public function index()
    {
        return Index_Carousel::paginate(8);
    }

}
