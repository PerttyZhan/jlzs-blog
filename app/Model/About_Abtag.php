<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class About_Abtag extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='about_abtag';
    protected $primarKey='id';
    protected $fillable=['new_id','tag_id','create_at','update_at'];
}
