<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.login-app',[

        
            'title'=> 'Login',
            'active'=> 'login'    
        
        ]);

        
}




    public function authenticate(request $request)
{
    $request->validate([
        'email'=> 'required|email:dns',
        'password'=> 'required'
    ]);
    dd('berhasil login!;');
}}