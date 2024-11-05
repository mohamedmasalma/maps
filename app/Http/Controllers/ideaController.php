<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class ideaController extends Controller
{



    public function show(idea $idea){

    return view("show_card",["idea"=>$idea]);

    }

    public function edit(idea $idea){

        $editing = true;
        return view("show_card",["idea"=>$idea,"editing"=>$editing]);

        }

    public function update(idea $idea){

        request()->validate(
            [

                "idea"=>"required|min:3|max:100"
            ]
             );

             $idea->comment= request()->get("idea");
             $idea->save();
             return redirect(route("ideas.show",["idea"=>$idea]))->with("success","the idea was edited");

             }

    public function store(){


    request()->validate([

        "idea"=>"required|min:3|max:100"
    ]);


     $idea = new idea(["comment"=>request()->get('idea'),"likes"=>2]);
     $idea->save();

     return redirect()->route("ideas.main")->with("success","the idea was created");

     }

 public function destroy(idea $idea){

    $idea->delete();
    return redirect(route("ideas.main"))->with("success","the idea was deleted");

    }



}
