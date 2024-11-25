<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {


        return view("user.profile",["user"=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return view("user.edit_user",["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
       $validated= request()->validate(
            [

                "name"=>"required|min:3|max:20",
                "bio"=>"min:3|max:199",
                "image"=>"image"
            ]
            );

            if(request()->has("image")){

                Storage::disk("public")->delete($user->image ?? "");

             $user->image=request()->file("image")->store("user_image","public");
               $user->save;

            }


                $user->update(["name"=>$validated["name"],"bio"=>$validated["bio"]]);


       return view("user.profile",["user"=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
