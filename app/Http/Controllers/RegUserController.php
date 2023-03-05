<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegUserController extends Controller
    {
        public function submit(RegisterRequest $data) {
            $user = new User();
            $user->name = $data->input('name');
            $user->email = $data->input('email');
            $user->password =hash::make($data->input('pass'));
            $user->phone = $data->input('phone');
            if(DB::table('users')->get()->where('email', $user->email)->count()>0)
                return redirect()->route('reg_form')->with('err', 'Данный email уже зарегистрирован');
            else{
                $user->save();
                return redirect()->route('reg_form')->with('success', 'Регистрация успешна, выполните вход');
            }
    }
}
