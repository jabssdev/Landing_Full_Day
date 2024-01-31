<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Mail;

class AuthController extends Controller 
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/home';

    public function showLoginForm()
    {
        return view('auth.login');
    } 

    protected function guard()
    {
        return Auth::guard('admins');
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect('/administrador');
    }
}
