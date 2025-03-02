<?php

namespace App\Http\Controllers;

use App\Events\AlertEvent;
use App\Events\TestEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function chatForm(User $user){
        $userId = Auth::id();
        $receiverId =$user->id;

        // Get messages between the authenticated user and the receiver
        $messages = Message::where(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        return view("chatForm",compact("user","messages"));
    }

    public function sendMessage($user){

      $message= Message::create([
        "message"=>request("message"),
        "sender_id"=>Auth::user()->id,
        "receiver_id"=>request("receiver_id")
       ]);


       broadcast(new TestEvent($message))->toOthers();
       broadcast(new AlertEvent($message))->toOthers();

       return response()->json(['message' => 'Broadcasted successfully!']);
    }

}
