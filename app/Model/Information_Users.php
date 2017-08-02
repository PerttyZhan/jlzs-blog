<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Information_Users extends Model
{
    use SoftDeletes,Notifiable;
    protected $table='information_users';
    protected $primarKey='id';
    protected $fillable=['information_id','user_id','create_at','update_at'];
}
