<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\UserWasCreated;
use App\Listeners\AddUserToInstitute;

use App\Events\NotificationWasCreated;
use App\Listeners\SendPushNotification;

use App\InstituteCategory;
use App\Observers\InstituteCategoryObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserWasCreated::class => [
            AddUserToInstitute::class,
        ],

        NotificationWasCreated::class => [
            SendPushNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        InstituteCategory::observe(InstituteCategoryObserver::class);
    }
}
