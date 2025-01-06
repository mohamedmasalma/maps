<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index(){

        $ideas = Idea::get();

        return View("admin.ideas",compact("ideas"));

    }

    public function show(Idea $idea)
    {

        return view("show_card", ["idea" => $idea]);
    }


    public function edit(Idea $idea)
    {

        $editing = true;
        return view("show_card", ["idea" => $idea, "editing" => $editing]);
    }

}
