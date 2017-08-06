<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Action extends Model
{
    use Notifiable,SoftDeletes;
    protected $table='actions';
    protected $primarKey='id';
    protected $fillable=['actions_name','created_at','updated_at'];
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role','roles_actions','actions_id','roles_id');
    }
}
