<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }

    public function store(){

        $validated = request()->validate(
            [
                "name"=>"required|min:3|max:20",
                "email"=>"required|email|unique:users,email",
                "password"=>"required|confirmed"
            ]
            );


            User::create([
                "name"=>$validated["name"],
                "email"=>$validated["email"],
                "password"=>Hash::make($validated["password"])
            ]);

      return redirect()->route("login")->with("success",$validated["name"]." your account was created");
    }


    public function login(){
dd("login");
        return view('auth.login');
    }


    public function authenticate(){

         $validated = request()->validate(
            [
                "email"=>"required|email",
                "password"=>"required"
            ]
            );

          if(Auth::attempt($validated))//if matching ==true
          {
            request()->session()->regenerate();
            return redirect()->route("ideas.main")->with("success","you are logged in");

          }
          else
          {
            return redirect()->route("login")->withErrors(
                [
                    "email"=>"no matched records"
                ]
                );

          }
    }




    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
