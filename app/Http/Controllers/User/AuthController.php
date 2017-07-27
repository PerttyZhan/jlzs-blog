<?php

namespace App\Http\Controllers\User;

use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
      return Users::find(1)->comments()->paginate(8);
    }

    public function postLogin(Request $request)
    {
        $phone=$request->get('phone');
        $password=request('password');
        $users=Users::findByphone($phone);
        if (empty($users)){
            return $this->jsonResponse(1000, '用户不存在');
        }else{
            if ($users->checkPassword($password)){
               $api_token=$users->login();
                return $this->jsonSuccess([
                    'api_token' => $api_token
                ]);
            }else{
                return $this->jsonResponse(1422, '密码错误');
            }
        }


    }
}
