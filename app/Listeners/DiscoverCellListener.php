<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\MineDiscoveredEvent;

class DiscoverCellListener
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
        $cell_to_explore = ($event->y - 1) * $game->cols + $event->x;
        $grid = $game->json_cells;

        switch ($grid[$cell_to_explore]){
            case config('mine.empty'):
                $mines = 0;

                //Discovering left
                if ($cell_to_explore % $game->cols !== 1) {
                    $mines += $this->has_mine(@$grid[$cell_to_explore - $game->cols - 1]);
                    $mines += $this->has_mine(@$grid[$cell_to_explore - 1]);
                    $mines += $this->has_mine(@$grid[$cell_to_explore + $game->cols - 1]);
                }

                //Discovering top and bottom
                $mines += $this->has_mine(@$grid[$cell_to_explore - $game->cols]);
                $mines += $this->has_mine(@$grid[$cell_to_explore + $game->cols]);

                //Discovering right
                if ($cell_to_explore % $game->cols !== 0) {
                    $mines += $this->has_mine(@$grid[$cell_to_explore - $game->cols + 1]);
                    $mines += $this->has_mine(@$grid[$cell_to_explore + 1]);
                    $mines += $this->has_mine(@$grid[$cell_to_explore + $game->cols + 1]);
                }

                //Saving results
                $grid[$cell_to_explore] = $mines;
                $game->json_cells = $grid;
                $game->save();

                break;
            case config('mine.mine'):
                event(new MineDiscoveredEvent($game, $cell_to_explore));
                break;
        }

    }

    private function has_mine($value){
        if($value===config('mine.mine') || $value===config('mine.flag_mine')) return true;
        return false;
    }
}
