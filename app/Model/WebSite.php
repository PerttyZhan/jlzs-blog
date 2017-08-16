<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebSite extends Model
{
    //
    protected $fillable = ['copyright', 'web_description', 'key_word', 'web_title'];
    protected $table = 'web_sites';
    protected $primarKey = 'id';
}
