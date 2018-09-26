@extends('layouts.app')

@section('content')

    <div class="container">
      <h2>Edit A Form</h2><br  />
        <form method="post" action="{{action('GameController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Название</label>
            <input type="text" class="form-control" name="title" required value="{{$games->title}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Сорт</label>
              <input type="number" class="form-control" name="sort" required value="{{$games->sort}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>


    @endsection
