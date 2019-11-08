<?php

namespace App\Events;

use App\Models\Game;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ExploreCellEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $game, $x, $y;


    /**
     * Create a new event instance.
     * @param $game
     * @param $x
     * @param $y
     * @return void
     */
    public function __construct(Game $game, $x, $y)
    {
        //
        $this->game = $game;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
