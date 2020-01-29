<?php

namespace App\Listeners;

use App\Events\Positions;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PositionsListener
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
     * @param  Positions  $event
     * @return void
     */
    public function handle(Positions $event)
    {
        //
    }
}
