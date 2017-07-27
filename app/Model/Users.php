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
        return $this->hasMany('App\Model\Report','user_id','id');
    }

    public function informations()
    {
        return $this->hasMany('App\Model\Information','user_id','id');
    }
    public function activities()
    {
        return $this->hasMany('App\Model\Activities','user_id','id');
    }
    public function reports_comments()
    {
        return $this->hasMany('App\Model\Reports_Comments','reports_id','id');
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

    public static function findByphone($phone)
    {
        return Users::where('phone', $phone)->first();
    }

}