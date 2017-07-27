<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Information_Intag extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='information_intag';
    protected $primarKey='id';
    protected $fillable=['information_id','tag_id','create_at','update_at'];

}
