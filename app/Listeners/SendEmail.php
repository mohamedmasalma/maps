<?php

namespace App\Listeners;

use App\Events\UserLike;
use App\Events\UserVisited;
use App\Mail\VisitEmail;
use App\Mail\welcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
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
    public function handle(UserVisited $event): void
    {

        Mail::to($event->user->email)->send(new VisitEmail($event->user,$event->visitor));
    }
}
