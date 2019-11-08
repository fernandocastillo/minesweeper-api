<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Http\Requests\ExploreRequest;
use App\Http\Resources\GameResource;
use App\Events\NewGameCreatedEvent;
use App\Events\ExploreCellEvent;

class GameController extends Controller
{
    //

    /**
     * List all games from user
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
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

    public function explore(ExploreRequest $request){
        $game = $request->user()->games()->active()->first();
        event(new ExploreCellEvent($game,$request->x,$request->y));
        return response()->json(['game'=>new GameResource($game->refresh())]);
    }
}
