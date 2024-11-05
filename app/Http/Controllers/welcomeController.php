<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    function welcomFunction(){

        $ideas=idea::orderBy('created_at',"DESC");

        if(request()->has("search")){

            $ideas->where("comment","like","%".request()->get("search")."%");
        }


        return view("welcome",["ideas"=>$ideas->paginate(3)]);

    }


}
