<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateNewGameGridListener
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

        $game = $event->game->refresh();

        $factor = $game->cols * $game->rows;
        $grid =  array_fill(1, $factor, config('mine.empty'));

        $keys = array_rand($grid,$event->game->mines);
        foreach($keys as $key){
            $grid[$key] = config('mine.mine');
        }
        $event->game->json_cells = $grid;
        $event->game->save();
    }
}
