<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Recommend extends Model
{
    use SoftDeletes,Notifiable;
    protected $table='recommends';
    protected $primarKey='id';
    protected $fillable=['src_img','created_at','updated_at'];

}
