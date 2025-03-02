<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{


    public function sendDailyReport()
    {
        // Your logic to send the daily report
        Log::info('Sending daily report...');
        // E.g., Send emails, generate reports, etc


    }

}
