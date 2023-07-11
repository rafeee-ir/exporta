<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class LoginSuccessful
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
    public function handle(Login $event): void
    {

        $event->subject = 'login';
        $event->discription = 'Login successful';

        Session::flash('login-success','Hello'.$event->user->name.',wellcome back!');
        activity($event->subject)->by($event->user)->log($event->discription);
    }
}
