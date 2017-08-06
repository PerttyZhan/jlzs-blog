<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use App\Model\Users;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    //
    public function getlogin()
    {
    }

    public function postlogin(Request $request)
    {
        $username=request('username');
        $password=request('password');
        $users=Users::findByname($username);
        if (empty($users)){
               return $this->jsonResponse(1000,'用户不存在');
        }else{
              if ($users->checkPassword($password)){
                  $api_token=$users->login();
                 $user_actions=$users->user_actions($users->id);
                 foreach ($user_actions as $k=>$y){
                     $y->api_token=$api_token;
                 }
                  return $this->jsonSuccess([
                      'auth_resoult' => $user_actions
                  ]);
              }else{
                  return $this->jsonResponse(1422, '密码错误');
              }

        }
    }

    public function logout(AuthManager $auth)
    {
        $admin = $auth->guard('api')->user();
        $username = $admin->username;
        Admin::where('username', $username)->update([
            'api_token' => null
        ]);

        return $this->jsonSuccess();
    }
}
