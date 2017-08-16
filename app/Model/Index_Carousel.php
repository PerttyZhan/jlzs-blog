<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Index_Carousel extends Model
{
    use SoftDeletes,Notifiable;
    protected $table='index_carousels';
    protected $primarKey='id';
    protected $fillable=['src_img','link','created_at','updated_at'];
}
