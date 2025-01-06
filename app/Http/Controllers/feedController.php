<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class feedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $followeeIDs = Auth::user()->followings()->pluck("followee_id");

        $ideas = idea::whereIn("user_id",$followeeIDs)->latest();

        if(request()->has("search")){

            $ideas->search(request("search",""));
        }



        return view("feed",["ideas"=>$ideas->paginate(5)]);


    }
}
