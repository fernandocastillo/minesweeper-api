<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GameFinishedListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        $game = $event->game;
        $grid =$game->json_cells;
        $grid[$event->cell_to_explore] =config('mine.activated');
        $game->json_cells = $grid;
        $game->current_state = 'lost';
        $game->save();
    }
}
