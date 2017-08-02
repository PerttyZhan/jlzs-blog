<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Report_Users extends Model
{
    //
    use SoftDeletes,Notifiable;
    //
    protected $table='report_users';
    protected $primarKey='id';
    protected $fillable=['report_id','user_id','create_at','update_at'];
}
