<?php

namespace App\Providers;

use App\Events\Models\Post\PostCreated;
use App\Events\Models\Post\PostDeleted;
use App\Events\Models\Post\PostUpdated;
use App\Listeners\EmailPostCreated;
use App\Listeners\EmailPostDeleted;
use App\Listeners\EmailPostUpdated;
use App\Subscribers\Models\PostSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
//        PostCreated::class => [
//            EmailPostCreated::class
//        ],
//        PostUpdated::class => [
//            EmailPostUpdated::class
//        ],
//        PostDeleted::class => [
//            EmailPostDeleted::class
//        ],
    ];

    protected $subscribe = [
        PostSubscriber::class
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
