<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        $users = User::withCount("ideas")->get();

        return View("admin.users",compact("users"));

    }

    public function show(User $user)
    {

        return view("user.profile", ["user" => $user]);
    }
}
