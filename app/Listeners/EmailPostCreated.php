<?php

namespace App\Listeners;

use App\Events\Models\Post\PostCreated;
use App\Events\Models\User\UserCreated;
use App\Mail\NewPostNotification;
use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailPostCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to('admin@livepost.local')
            ->send(new NewPostNotification($event->post));
    }
}
