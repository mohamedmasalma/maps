<?php

namespace App\Listeners;

use App\Events\UserLike;
use App\Events\UserVisited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class visitLog
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        if ($event instanceof UserLike) {
            logger("User liked: " . $event->user->email);
        } elseif ($event instanceof UserVisited) {
            logger("User visited" . $event->user->email);
        }
    }
}
