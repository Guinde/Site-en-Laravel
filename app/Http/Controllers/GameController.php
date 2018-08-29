<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use DB;

class GameController extends Controller
{
    public function displayAllUpcoming(){
        $games = Game::all()->where('date', '>=', date('2018-08-01')) ;
        return view('game.games', ['games'=>$games]);
    }

    public function add(){
        return view('game.add');
    }

    public function store(Request $request){
        echo "Game added!";
        $validationData = $request->validate([
            'date' => 'required',
            'team1' => 'required',
            'team2' => 'required'
        ]);
        $game = new Game;
        $game->date = $request->date;
        $game->team1 = $request->team1;
        $game->team2 = $request->team2;
        $game->scoreboard= $request->scoreboard;
        $game->winner = $request->winner;
        $game->save();
        return view("game.add");
    }
}
