<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <a href="{{action('GamesController@create')}}" class="btn btn-warning">Добавить игру</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Игра</th>
        <th>Сортировка</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($games as $game)
      <tr>
        <td>{{$game['id']}}</td>
        <td>{{$game['title']}}</td>
        <td>{{$game['sort']}}</td>

        <td><a href="{{action('GamesController@edit', $game['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('GamesController@destroy', $game['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
