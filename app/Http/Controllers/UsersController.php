<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userLoginRegister(){
        return view('wayshop.users.login_register');
    }
}
