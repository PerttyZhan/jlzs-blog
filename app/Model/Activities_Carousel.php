<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Activities_Carousel extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='activities_carousels';
    protected $primarKey='id';
    protected $fillable=['src_img','created_at','updated_at'];
}
