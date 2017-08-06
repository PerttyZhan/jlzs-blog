<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use SoftDeletes, Notifiable;
    //
    protected $fillable = ['name', 'phone', 'password', 'api_token'];
    protected $table = 'users';
    protected $primarKey = 'id';

    public function reports()
    {
        return $this->belongsToMany('App\Model\Report','report_users','user_id','report_id');
    }

    public function informations()
    {
        return $this->belongsToMany('App\Model\Information','information_users','user_id','information_id');
    }
    public function activities()
    {
        return $this->belongsToMany('App\Model\Activities','activities_users','user_id','activities_id');
    }
    public function reports_comments()
    {
        return $this->hasMany('App\Model\Reports_Comments','user_id','id');
    }

    public function information_comments()
    {
        return $this->hasMany('App\Model\Information_Comment','user_id','id');
    }

    public function activities_comments()
    {
  return $this->hasMany('App\Model\Activities_Comments','user_id','id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role','users_roles','users_id','roles_id');
    }

    public function login()
    {
        $api_token = md5($this->getAttribute('id') . '_' . time() . rand(0, 9999));
        $this->update([
            'api_token' => $api_token,
        ]);
        return $api_token;
    }

    public function logout()
    {
        return $this->update([
            'api_token' => null
        ]);
    }

    public function checkPassword($password)
    {
        return Hash::check($password, $this->getAttribute('password'));
    }

    public static function findByname($name)
    {
        return Users::where('name', $name)->first();
    }

    public function user_actions($id)
    {
        return Users::find($id)->roles()->first()->actions()->paginate(8);
    }

}