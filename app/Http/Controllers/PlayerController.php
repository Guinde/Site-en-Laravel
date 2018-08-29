<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use DB;

class PlayerController extends Controller
{
    public function add(){
        return view('player.add');
    }

    public function show($id){
        $players = Player::find(['id' => $id]);
        $firstName = $player->firstName;
        $lastName = $player->firstName;
        $position = $player->position;
        $gamesPlayed = $player->gamesPlayed;
        $goals = $player->goals;
        $assists = $player->assists;
        $cards = $player->cards;
        $teamId = $player->teamId;
        return view('player.player', ['firstName'=>$firstName, 'lastName'=>$lastName, 'position'=>$position, 'gamesPlayed'=>$gamesPlayed, 'goals'=>$goals, 'assists'=>$assists, 'cards'=>$cards, 'teamId'=>$teamId]);   
    }

    public function showAll(){
        $players = Player::all();
        return view('player.players', ['players'=>$players]);   
    }

    public function deletePage(){
        return view('player.delete');
    }

    public function deletePlayer(Request $request){
        
        $playerId = $request->input('playerId');
        if($playerId != null){
        //dd("hello");
        $test = DB::table('players')->where('id', '=', $playerId)->delete();
        echo "Player Deleted!";
        }
        else
        return view('player.delete');
    }

    public function store(Request $request){
        echo "Player added!";
        $validationData = $request->validate([
            'firstName' => 'required|regex: /^[a-zA-Z\s]*$/',
            'lastName' => 'required|regex: /^[a-zA-Z\s]*$/',
            'position' => 'required',
            'gamesPlayed' => 'required|integer',
            'goals' => 'required|integer',
            'assists' => 'required|integer',
            'cards' => 'required|integer',
            'teamId' => 'required|integer',
        ]);

        $player = new Player;
        $player->firstName = $request->firstName;
        $player->lastName = $request->lastName;
        $player->position = $request->position;
        $player->gamesPlayed = $request->gamesPlayed;
        $player->goals = $request->goals;
        $player->assists = $request->assists;
        $player->cards = $request->cards;
        $player->teamId = $request->teamId;
        $player->save();
        return view("player.add");
    }

    public function delete($id){
        if (Player::find(['id' => $id])) {
            Player::destroy($id);
            return back();
        }
    }

    public function sendIdToFormEdit($id){
       return ($this->formEdit($id));
    }

    public function formEdit($id){
       $player = Player::find(['id' => $id]);
        return view('player.formedit', ['player'=>$player]);
    }

    public function editTeam(Request $request){
        $validationData = $request->validate([
            'firstName' => 'required|regex: /^[a-zA-Z\s]*$/',
            'lastName' => 'required|regex: /^[a-zA-Z\s]*$/',
            'position' => 'required',
            'gamesPlayed' => 'required|integer',
            'goals' => 'required|integer',
            'assists' => 'required|integer',
            'cards' => 'required|integer',
            'teamId' => 'required|integer'
            ]);
            DB::table('players')->where('id', $request->id)->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'position' => $request->position,
                'gamesPlayed' => $request->gamesPlayed,
                'goals' =>  $request->goals,
                'assists' => $request->assists,
                'cards' => $request->cards,
                'teamId' => $request->teamId
            ]);
        return view('welcome');
    }

}