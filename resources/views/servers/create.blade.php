@extends('layouts.app')

@section('content')

  <div class="container">
    <h2>Добавить игру</h2><br/>
    <form method="post" action="{{action('ServerController@store')}}" enctype="multipart/form-data">
     <input type="hidden" name="games_id" value="{{$games->id or ''}}">
      @csrf
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="Name">сервер</label>
          <input type="text" class="form-control" name="title">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Email">Сортировка</label>
            <input type="text" class="form-control" name="sort">
          </div>
        </div>

        <div class="col-md-4"></div>
        <div class="form-group col-md-4" style="margin-top:60px">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>


@endsection
