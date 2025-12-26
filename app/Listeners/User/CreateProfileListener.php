<?php

namespace App\Listeners\User;

use App\Events\User\CreatedUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateProfileListener
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
    public function handle(CreatedUserEvent $event): void
    {
        $event->user->profile()->firstOrCreate([
            'name' => $event->user->name,
            'last_name' => fake()->lastName(),
       ]);
    }
}
