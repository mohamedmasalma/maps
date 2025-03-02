<?php

namespace App\Http\Controllers\api;

use Spatie\ArrayToXml\ArrayToXml;
use App\Http\Controllers\Controller;
use App\Http\Resources\IdeaResource;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idea =IdeaResource::collection(Idea::take(5)->get());

        return $idea ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validation = Validator::make($request->all(),
       [
           "comment"=>"required|min:3",
            "email"=>"required|email",
            "password"=>"required"

        ]);

        if($validation->fails()){
            return response()->json(["message"=>$validation->messages()]);
        }
        else{

           $user = User::where("email",$request->email)->first();

           if($user && Hash::check($request->password, $user->password)){

            $idea =new Idea();
            $idea->create(["comment" => $request->comment, "user_id" => $user->id]);

            return response()->json(["message"=>"idea was created","idea"=>new IdeaResource($idea)]);

           }
           else{
            return response()->json(["message"=>"no matched records"]);
           }
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $idea=Idea::where("id",$id)->get();
        $data= IdeaResource::collection($idea);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
