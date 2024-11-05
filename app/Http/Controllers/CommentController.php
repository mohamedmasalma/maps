<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(idea $idea){

        $comment = new Comment();
        $comment->idea_id=$idea->id;
        $comment->comment=request()->get("comment");
        $comment->save();

        return redirect()->route("ideas.main")->with("success","comment was addes");

    }
}
