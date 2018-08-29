<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use DB;

class TeamController extends Controller
{
    public function add(){
        return view('team.add');
    }

    public function show($id){
        $teams = Team::all();
        foreach($teams as $team){
            if($id == $team->id){
                $name = $team->name;
                $country = $team->country;
                $flag = $team->flag;
            }
        }
        dd($flag);
        return view('team.team', ['name'=>$name, 'country'=>$country, 'flag'=>$flag]);   
    }

    public function showAll(){
        $teams = Team::all();
        return view('team.teams', ['teams'=>$teams]);   
    }
    
    public function store(Request $request){
        echo "Team added!";
        $validationData = $request->validate([
            'name' => 'required|max:25',
            'country' => 'required',
            'flag' => 'required',
        ]);
        $team = new Team;
        $team->name = $request->name;
        $team->country = $request->country;
        $team->flag = "storage/flags/". $request->file('flag')->getClientOriginalName();
        $request->file('flag')->move('storage/flags/', $request->file('flag')->getClientOriginalName());
        $team->save();
        return view("team.add");
    }

    public function showStats($teamId){
        $teams = DB::table("teams")->where('id', $teamId)->first(); 
        $flag = "/" . DB::table("teams")->where('id', $teamId)->pluck('flag')->first();
        $country = DB::table("teams")->where('id', $teamId)->pluck('country')->first();
        $teamPlayers = DB::table("players")->where('teamId', $teamId)->get();
        return view("player.players", ['players'=>$teamPlayers, 'country'=>$country, "team" => $teams, 'flag'=>$flag]);
    }

    public function sendIdToFormEditTeam($id){
        return ($this->formEditTeam($id));
     }

     public function formEditTeam($id){
        $team= Team::find(['id' => $id]);
         return view('team.formeditteam', ['team'=>$team[0]]);
     }

     public function editTeam(Request $request){
        $validationData = $request->validate([
            'name' => 'required|regex: /^[a-zA-Z\s]*$/',
            'gamesPlayed' => 'required|integer',
            'win' => 'required|integer',
            'draw' => 'required|integer',
            'lost' => 'required|integer'
            ]);
            DB::table('teams')->where('id', $request->id)->update([
                'gamesplayed' => $request->gamesPlayed,
                'win' => $request->win,
                'draw' => $request->draw,
                'lost' => $request->lost
            ]);
        return view('welcome');
    }
}
