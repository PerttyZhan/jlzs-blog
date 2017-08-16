<?php

namespace App\Http\Controllers\Upload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use YueCode\Cos\QCloudCos;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    protected $file;
    protected $scaling;
    function __construct($file,$scaling)
    {
        $this->file = $file;
        $this->scaling = $scaling;
    }
    public function upload()
    {
        $bucket = "photo";
        $folder = "zhu";
        $files=$this->file;

        $srcPath = $files->getRealPath();
        $ClientOriginalName = time() . rand(10000, 9999999) . '.' . $files->getClientOriginalExtension();

        $dstPath = "$folder/$ClientOriginalName";
        $img = Image::make($files);
        $width=$img->width();
        $height=$width/$this->scaling;
        $resoult=$img->resize($width,$height)->save('photo/'.$ClientOriginalName);
        $src='photo/'.$ClientOriginalName;
        $upload = QCloudCos::upload($bucket,$src,$dstPath);
        unlink($src);
        $upload_json=json_decode($upload);
        $data=$upload_json->data;
        if ($upload_json->code==0){
            return [
                'data'=>$data->source_url,
                'ok'=>'true'
            ];
        }else{
            return [
                'ok'=>'false'
            ];
        }

    }
}
