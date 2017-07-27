<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    //
    public function getlogin()
    {
  dd(Admin::all());
    }

    public function postlogin(Request $request)
    {
        $username=request('username');
        $password=request('password');
        $admin=Admin::findByUsername($username);
        if (empty($admin)){
               return $this->jsonResponse(1000,'用户不存在');
        }else{
              if ($admin->checkPassword($password)){
                  $api_token=$admin->login();
                  return $this->jsonSuccess([
                      'api_token' => $api_token
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
