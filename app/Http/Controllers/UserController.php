<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AuthorizationRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
    {
        public function reg(RegisterRequest $data) {
            $user = new User();
            $user->name = $data->input('name');
            $user->email = $data->input('email');
            $user->password =password_hash($data->input('pass'), PASSWORD_DEFAULT);
            $user->phone = $data->input('phone');
            if(DB::table('users')->where('email',  $user->email)->exists())
                return redirect()->route('reg_form')->with('err', 'Данный email уже зарегистрирован');
            else{
                $user->save();
                return redirect()->route('reg_form')->with('success', 'Регистрация успешна, выполните вход');
            }
    }

        public function auth(Request $data){
            if(DB::table('users')->where('email', '=', $data->input('loginName'))->exists()){

                $user = DB::table('users')->where('email', '=', $data->input('loginName'))->first();
                $pass = $user->password;
                $email = $user->email;
                $id = $user->id;

                if(password_verify($data->input('loginPassword'), $pass)) {
                    session([
                            'email' => $email,
                            'id' => $id
                        ]);
                    return redirect()->route('main');
                }
                else
                  return redirect()->route('reg_form')->with('auth', 'Неверный пароль');
            }
            else{
                return redirect()->route('reg_form')->with('auth', 'Данный email не зарегистрирован');
            }
        }

        public function exit(){
            session()->invalidate();
            return redirect()->route('reg_form');
        }

        public function test(){

            $data = DB::table('users')->join('accesses', 'users.id_access', '=', 'accesses.id')->get();
            foreach ($data as $el){
                echo $el->email;
                echo ('<hr>');
                echo $el->access;
            }
        }
}
