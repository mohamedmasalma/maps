<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class likesController extends Controller
{
    public function like(Idea $idea){
        $user = Auth::user();
        $user->likes()->attach($idea);
        return redirect()->back();

    }

    public function unlike(Idea $idea){
        $user = Auth::user();
        $user->likes()->detach($idea);
        return redirect()->back();

    }
}
