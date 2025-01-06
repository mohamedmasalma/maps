<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments=Comment::all();

        return View("admin.comments",compact("comments"));

    }

    public function destroy(Comment $comment){
        $comment->delete();

        return redirect()->back();

    }
}
