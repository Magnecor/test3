<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $games=\App\Games::all();
       return view('index',compact('games'));  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('create');  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       $games= new \App\Games;
       $games->title=$request->get('title');
       $games->sort=$request->get('sort');
       $games->filename=$request->get('filename');
       $games->save();

       return redirect('games')->with('success', 'Игра успешно добавлена');  //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $games = \App\Games::find($id);
        return view('edit',compact('games','id'));  //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $games= \App\Games::find($id);
        $games->title=$request->get('title');
        $games->sort=$request->get('sort');
        $games->save();
        return redirect('games');  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $games = \App\Games::find($id);
         $games->delete();
         return redirect('games')->with('success', 'Успешно удалена игра -' . "$games->title");    //
    }
}
