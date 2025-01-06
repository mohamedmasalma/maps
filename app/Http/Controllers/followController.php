<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class followController extends Controller
{
    public function follow(User $user){


        $follower = Auth::user();
        //was followers
        $follower->followings()->attach($user);
        return redirect()->route("users.show",$user->id);

    }

    public function unfollow(User $user){
        $follower = Auth::user();
        $follower->followings()->detach($user);
        return redirect()->route("users.show",$user->id);

    }
}
