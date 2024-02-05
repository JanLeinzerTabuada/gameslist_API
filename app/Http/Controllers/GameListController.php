<?php

namespace App\Http\Controllers;
use App\Models\Game_models;
use Illuminate\Http\Request;

class GameListController extends Controller
{

    function list($id=null) 
    {
        return $id?Game_models::find($id):Game_models::all();
    }
    
    function add(REQUEST $req)
    {
        $game_models= new Game_models;
        $game_models->game_thumbnail=$req->game_thumbnail;
        $game_models->game_url=$req->game_url;
        $game_models->name=$req->name;
        $game_models->gameCode=$req->gameCode;
        $results=$game_models->save();
        
        if($results)
        {
            return ["Result"=>"Data has been added"];
        }
        else
        {
            return ["Result"=> "You fucked, didnt save"];
        }
    }

}
