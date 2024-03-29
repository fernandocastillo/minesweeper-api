<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResumeAllCurrentGamesListener
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
        // Pending here I'll resume all current playing games

        foreach(\Auth::user()->games as $temp){
            $temp->current_state='resume';
            $temp->save();
        }

        $game = $event->game->refresh();
        $game->current_state='active';
        $game->save();

    }
}
