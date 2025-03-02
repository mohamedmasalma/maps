<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{user1}_{user2}', function ($user, $user1, $user2) {
    return true;
});
Broadcast::channel('notify.{user1}', function ($user, $user1,) {
    return $user->id == $user1;
});

