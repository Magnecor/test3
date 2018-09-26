@extends('layouts.app')

@section('content')

  <div class="container">
    <h2>Добавить игру</h2><br/>
    <form method="post" action="{{action('GameController@store')}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="Name">Игра</label>
          <input type="text" class="form-control" name="title">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Email">сорт</label>
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
