<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Game;

class StartController extends Controller
{

  public function index()
  {

return view('start', ['vuegames' =>  Game::get()], ['vueservers' => Server::get()] );



  }

  public function getJsonGames()
  {

  return

  Game::select('title','id','sort')->get();


  }

public function getJsonServ()
{

return

Server::get();


}







public function newEvent(\Illuminate\Http\Request $request)
{
 $result = Game::get();

if ($request->has('title')) {
$request['title'][] = $request->input('title');

if ($request->has('realtime')) {
  if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) {
  event(new \App\Events\NewEvent($result));
  }
}

}

return $result;

}

public function sendMessage(\Illuminate\Http\Request $request)
{
 event(new \App\Events\NewMessage($request->input('massage')));

}





    //
}
