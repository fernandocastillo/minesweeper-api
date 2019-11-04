<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use App\Events\NewGameCreatedEvent;

class GameController extends Controller
{
    //

    public function index(Request $request){
        return GameResource::collection($request->user()->games);
    }

    /**
     * Create new game
     * @param GameRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(GameRequest $request){

        $data = [];

        if($request->rows) $data['rows'] = $request->rows;
        if($request->cols) $data['cols'] = $request->cols;
        if($request->mines) $data['mines'] = $request->mines;

        $game = $request
            ->user()
            ->games()
            ->create($data);

        event(new NewGameCreatedEvent($game));
        return response()->json(['game'=>new GameResource($game->refresh())]);
    }
}
