<?php


namespace App\Subscribers\Models;


use App\Events\Models\Post\PostCreated;
use App\Events\Models\Post\PostDeleted;
use App\Events\Models\Post\PostUpdated;
use App\Listeners\EmailPostCreated;
use App\Listeners\EmailPostDeleted;
use App\Listeners\EmailPostUpdated;
use Illuminate\Events\Dispatcher;

class PostSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(PostCreated::class, EmailPostCreated::class);
        $events->listen(PostUpdated::class, EmailPostUpdated::class);
        $events->listen(PostDeleted::class, EmailPostDeleted::class);
    }
}
