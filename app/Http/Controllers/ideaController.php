<?php

namespace App\Http\Controllers;

use App\Events\AlertEvent;
use App\Events\broadCast;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ideaController extends Controller
{



    public function show(Idea $idea)
    {

        return view("show_card", ["idea" => $idea]);
    }

    public function edit(Idea $idea)
    {

        Gate::authorize("update",$idea);

        $editing = true;
        return view("show_card", ["idea" => $idea, "editing" => $editing]);
    }

    public function update(Idea $idea)
    {
        Gate::authorize("update",$idea);
        request()->validate(
            [

                "idea" => "required|min:3|max:100"
            ]
        );

        $idea->comment = request()->get("idea");
        $idea->save();
        return redirect(route("ideas.show", ["idea" => $idea]))->with("success", "the idea was edited");
    }

    public function store()
    {
        request()->validate([

            "idea" => "required|min:3|max:100"
        ]);



        $idea = new idea(["comment" => request()->get('idea'), "user_id" => Auth::id()]);
        $idea->save();

            broadcast(new broadCast($idea->user));

        return redirect()->route("ideas.main")->with("success", "the idea was created");
    }

    public function destroy(idea $idea)
    {
        Gate::authorize('delete', $idea);
        $idea->delete();
        return redirect(route("ideas.main"))->with("success", "the idea was deleted");
    }
}
