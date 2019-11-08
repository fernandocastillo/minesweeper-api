<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\UserRegisteredEvent;
use App\Listeners\SendEmailWelcomeListener;

use App\Events\NewGameCreatedEvent;
use App\Listeners\ResumeAllCurrentGamesListener;
use App\Listeners\CreateNewGameGridListener;

use App\Events\ExploreCellEvent;
use App\Listeners\DiscoverCellListener;

use App\Events\MineDiscoveredEvent;
use App\Listeners\GameFinishedListener;



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
        UserRegisteredEvent::class  =>[
            SendEmailWelcomeListener::class
        ],
        NewGameCreatedEvent::class  =>[
            ResumeAllCurrentGamesListener::class,
            CreateNewGameGridListener::class
        ],
        ExploreCellEvent::class  =>[
            DiscoverCellListener::class,
        ],
        MineDiscoveredEvent::class  =>[
            GameFinishedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
