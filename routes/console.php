<?php

use App\Http\Controllers\TestController;
use App\Jobs\SendEmailJob;
use App\Jobs\sendEmailJob as JobsSendEmailJob;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function(){

    logger("hello from call function");
});

Schedule::call(function(){

  $controller = new TestController();
  $controller->sendDailyReport();
});

Schedule::command("app:test-command");


$user=User::find(1);
Schedule::job(new SendEmailJob($user));
