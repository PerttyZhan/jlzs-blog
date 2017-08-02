<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use phpDocumentor\Reflection\Types\Array_;

class WebsiteController extends Controller
{
    //
    public function index()
    {
        $copyright = Config::get('web.copyright');
        $web_description = Config::get('web.web_description');
        $key_word = Config::get('web.key_word');
        $web_title = Config::get('web.web_title');
        $array = [
            'copyright' => $copyright,
            'web_description' => $web_description,
            'key_word' => $key_word,
            'web_title' => $web_title
        ];
        return $array;
    }

    public function update(Request $request)
    {
        $copyright = $request->get('copyright');
        $web_description = $request->get('web_description');
        $key_word = $request->get('key_word');
        $web_title = $request->get('web_title');
        $web = $this->index();
        $web['copyright'] = $copyright;
        $web['web_description'] = $web_description;
        $web['key_word'] = $key_word;
        $web['web_title'] = $web_title;
        $path = base_path() . '/config/web.php';
        $string = '<?php return ' . var_export($web, true) . ';';
        $config = file_put_contents($path, $string);
        if ($config) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonResponse('1', '修改配置失败');
        }


    }

}
