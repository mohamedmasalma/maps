<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class adminControllPannelContoller extends Controller
{
   public function index(){
    $usersCount = User::count();
    $ideasCount = Idea::count();
    $commentsCount = Comment::count();

    return View("admin.controllPannel",compact("usersCount","ideasCount","commentsCount"));
    }
}
