@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <a href="{{action('GameController@create')}}" class="btn btn-primary mb-2">Добавить игру</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Игра</th>
        <th>Изменить</th>
        <th>Сортировка</th>
      <th>Удалить</th>
        <th>Сервер</th>

      </tr>
    </thead>
    <tbody>


      @foreach($games as $game)
      <tr>
        <td>{{$game['title']}}</td>
    <td><a href="{{action('GameController@edit', $game['id'])}}" class="btn btn-warning" >Редактировать</a></td>
        <td>{{$game['sort']}}</td>


        <td>
          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{action('GameController@destroy', $game['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Удалить</button>
          </form>
        </td>

  <td>   <form class="form-inline" action="{{action('ServerController@store')}}" method="post">
      <input name="games_id" type="hidden" value="{{$game->id}}">
      @csrf
    <div class="form-group mx-sm-3 mb-2">

        <input type="text" class="form-control" name="title" required placeholder="Название сервера">

</div>




     <button class="btn btn-primary mb-2" type="submit">Добавить сервер</button>






</form>
</td>
  </tr>
    <tr>
      <th>Сервер</th>
      <th>Удалить</th>
    </tr>
      @foreach ($game->servers as $server)
        <tr>
            <td>   {{$server->title}}</td>
              <td>

                <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{action('ServerController@destroy', $server)}}" method="post">
                  @csrf
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-danger" type="submit">Удалить</button>
                </form>



              </td>
        </tr>




    @endforeach


      @endforeach

    </tbody>
  </table>
  </div>

@endsection
