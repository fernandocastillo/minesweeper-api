<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Game;

class MineDiscoveredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $game, $cell_to_explore;
    /**
     * Create a new event instance.
     * @param $game
     * @param $cell_to_explore
     * @return void
     */
    public function __construct(Game $game, $cell_to_explore)
    {
        //
        $this->game = $game;
        $this->cell_to_explore =$cell_to_explore;
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
