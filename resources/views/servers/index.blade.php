@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <a href="{{action('GameController@create')}}" class="btn btn-warning">Добавить игру</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Игра</th>
        <th>Изменить</th>
        <th>Сортировка</th>
      <th>Удалить</th>
        <th>Сервера</th>
      </tr>
    </thead>
    <tbody>

      @foreach($games as $game)
      <tr>
        <td>{{$game['title']}}</td>
    <td><a href="{{action('GameController@edit', $game['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>{{$game['sort']}}</td>


        <td>
          <form action="{{action('GameController@destroy', $game['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
  <td> <a href="{{action('ServerController@create')}}" class="btn btn-warning">Добавить сервер</a>  </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection
