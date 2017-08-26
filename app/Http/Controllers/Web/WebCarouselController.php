<?php

namespace App\Http\Controllers\Web;

use App\Model\Activities_Carousel;
use App\Model\Index_Carousel;
use App\Model\Recommend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebCarouselController extends Controller
{
    //
    public function index(Request $request)
    {
        $choice = $request->get('choice');
        if ($choice == 'index') {
            return Index_Carousel::paginate(8);
        }
        if ($choice == 'activities') {
            return Activities_Carousel::paginate(8);
        }
        if ($choice == 'recommend') {
            return Recommend::paginate(8);
        }


    }

}
