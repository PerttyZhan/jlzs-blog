<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Activities_Users extends Model
{
    use SoftDeletes,Notifiable;
    protected $table='activities_users';
    protected $primarKey='id';
    protected $fillable=['activities_id','user_id','create_at','update_at'];
}
