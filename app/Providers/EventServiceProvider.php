<?php

namespace App\Providers;

use App\Events\ProcessAccepted;
use App\Events\ProcessCreated;
use App\Events\ProcessRejected;
use App\Events\StudentProcessCanceling;
use App\Listeners\SendDoctorNotification;
use App\Listeners\SendNewUserNotification;
use App\Listeners\SendProcessAcceptedNotification;
use App\Listeners\SendProcessCancelingNotification;
use App\Listeners\SendProcessRejectedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendNewUserNotification::class,
        ],
        ProcessCreated::class => [
            SendDoctorNotification::class,
        ],
        ProcessAccepted::class =>[
            SendProcessAcceptedNotification::class,
        ],
        ProcessRejected::class=>[
            SendProcessRejectedNotification::class,
        ],
        StudentProcessCanceling::class=>[
            SendProcessCancelingNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
