<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signIn(Request $request){ 
        User::create([
            "name"=> $request->name,
            "sobrenome"=> $request->sobrenome,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),

        ]);
    }

    public function login(Request $request){ 
        
    }
}
