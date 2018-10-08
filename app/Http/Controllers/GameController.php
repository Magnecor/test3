<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('games.index', ['games' => Game::get(), 'servers' => Server::get()


     ]);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('games.create');  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Game::create($request->all());

       return redirect('admin/games')->with('success', 'Игра успешно добавлена');  //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $games)
    {
        return view('admin/games', ['game' => $game]);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $games = \App\Game::find($id);
        return view('games.edit',compact('games','id'));  //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
      $game->update($request->all());//
        return redirect('admin/games')->with('success', 'Сервер успешно обновлен');  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {

         $game->delete();
         return redirect('admin/games')->with('success', 'Успешно удалена игра -');    //
    }

    

}
