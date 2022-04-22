<?php

namespace App\Listeners;

use App\Events\Linkevent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncrementVisited
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
     * @param  \App\Events\Linkevent  $event
     * @return void
     */
    public function handle(Linkevent $event)
    {
        $event->link->increment('visited');
    }
}
