<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class followController extends Controller
{
    public function follow(User $user){


        $follower = Auth::user();
        $follower->followers()->attach($user);
        return redirect()->route("users.show",$user->id);

    }

    public function unfollow(){

    }
}
