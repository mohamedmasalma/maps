<?php

namespace App\Jobs;

use App\Mail\welcomeMail;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class sendEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    protected $user;

    public function __construct(User $user)
    {
        $this->user =$user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->user->email)->send(new welcomeMail($this->user));
        logger("email sent");
    }
}
