<?php

namespace App\Listeners;

use App\Events\GetLocation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LocationListener
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
     * @param  GetLocation  $event
     * @return void
     */
    public function handle(GetLocation $event)
    {
        //
    }
}
