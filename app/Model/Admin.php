<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    use SoftDeletes,Notifiable;
    protected $fillable=['username','password','api_token'];
    //
    protected $table='admins';
    protected $primarKey='id';

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
            'api_token' =>null
        ]);
    }

    public function checkPassword($password)
    {
         return Hash::check($password,$this->getAttribute('password'));
    }

    public static function findByUsername($username)
    {
        return Admin::where('username',$username)->first();
    }

}
