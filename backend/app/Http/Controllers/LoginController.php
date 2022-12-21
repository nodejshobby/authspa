<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                "error" => false,
                "messsage"=> "Authenticated"
            ],200);
        }
        return response()->json([
            "error" => true,
            "messsage"=> "UnAuthenticated"
        ],401);
    }
}
