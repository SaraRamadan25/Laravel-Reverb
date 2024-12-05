<?php
namespace App\Providers;

use App\Events\MessageReceived;
use App\Listeners\SaveMessageToDatabase;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        MessageReceived::class => [
            SaveMessageToDatabase::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
