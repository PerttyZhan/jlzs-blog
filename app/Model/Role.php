<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    //
    use SoftDeletes,Notifiable;
    protected $table='roles';
    protected $primarKey='id';
    protected $fillable=['role_name','created_at','updated_at'];
    public function users()
    {
        return $this->belongsToMany('App\Model\User','users_roles','roles_id','users_id');
    }
    public function actions()
    {
        return $this->belongsToMany('App\Model\Action','roles_actions','roles_id','actions_id');
    }
}
