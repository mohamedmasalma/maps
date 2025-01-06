<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Idea $idea){

        request()->validate([
            "comment"=>"required"
        ]);
        $comment = new Comment();
        $comment->idea_id=$idea->id;
        $comment->user_id=Auth::id();
        $comment->comment=request()->get("comment");
        $comment->save();

        return redirect()->route("ideas.main")->with("success","comment was addes");

    }
}
