<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    function welcomFunction(){

        $ideas=Idea::when(request()->has("search"),function($ideas){
            $ideas->search(request("search",""));
        })->orderBy('created_at',"DESC")->paginate(5);

        return view("welcome",["ideas"=>$ideas]);

    }

    public function show_terms(){
        return view("terms");
    }


}
