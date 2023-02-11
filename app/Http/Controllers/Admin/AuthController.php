<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function loginPage()
    {
        return view('Admin.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials))
        {
            return redirect(route('admin.index'));
        }
        else{
            Alert::error('error', 'user not found');
            return redirect()->back();

        }

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('admin.loginPage'));
    }
}
