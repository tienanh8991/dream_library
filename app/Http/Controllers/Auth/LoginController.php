<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Role;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $username = $request->username;
        $password = $request->password;

        $user = [
            'email' => $username,
            'password' => $password
        ];

        if (Auth::attempt($user)){
            if (Auth::user()->role === Role::HIDE) {
                Toastr::Warning('You are not authorized !', '!!!', ["positionClass" => "toast-top-right", "progressBar" => true]);
                return redirect()->route('index');
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            Toastr::Error('Account password is incorrect !', '!!!', ["positionClass" => "toast-top-right", "progressBar" => true]);
            return back();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
