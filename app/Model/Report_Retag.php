<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Report_Retag extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='report_retag';
    protected $primarKey='id';
    protected $fillable=['new_id','tag_id','create_at','update_at'];


}
