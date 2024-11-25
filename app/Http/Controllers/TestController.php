<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(){
        return view("test");
    }

    public function store(){

       $test= request()->validate([
            "content"=>"required|min:3|max:100"
        ]);


    }

}
