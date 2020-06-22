<?php

namespace App\Http\Controllers;

use App\Jobs\PrepareJob;
use App\Jobs\PublishJob;
use Illuminate\Http\Request;
use App\Jobs\SendMessage;
class QueueController extends Controller
{
    public function __construct()
    {

    }
    public function send_to_log(){
        SendMessage::dispatch('test_message')->delay(now()->addMinutes(5));
    }
    public function send_to_log_many(){
        SendMessage::withChain([
            new PrepareJob('Prepare...'),
            new PublishJob('Publish this...')
        ])->dispatch
        ('test_message');
//        ->delay(now()->addMinutes(5));
    }
}
