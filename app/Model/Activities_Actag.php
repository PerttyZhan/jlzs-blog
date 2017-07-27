<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Activities_Actag extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='activities_actag';
    protected $primarKey='id';
    protected $fillable=['activities_id','tag_id','created_at','updated_at'];
}
