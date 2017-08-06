<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User_Role extends Model
{
    //
    use SoftDeletes,Notifiable;
    protected $table='users_roles';
    protected $primarKey='id';
    protected $fillable=['users_id','roles_id','created_at','updated_at'];
}
