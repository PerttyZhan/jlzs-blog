<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Role_Action extends Model
{
    //
    use SoftDeletes,Notifiable;
    protected $table='roles_actions';
    protected $primarKey='id';
    protected $fillable=['roles_id','actions_id','created_at','updated_at'];
}
