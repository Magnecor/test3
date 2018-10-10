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



      @foreach($games as $game)
        <table class="table table-striped">

        <tbody>
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
</table>

      @foreach ($game->servers as $server)

        <form id="form{{$server->id}}" onsubmit="if(confirm('Сохранить изменения?')) {return true} else {return false}" action="{{action('ServerController@update', $server)}}" method="post">
               @csrf
                 <input name="_method" type="hidden" value="PATCH">
        <table>

            <tr>
              <th>Сервер</th>
                <th>Наш ник</th>
                  <th>Сорт</th>
              <th>Код 300</th>
              <th>Код 500</th>
              <th>Код 3000</th>
              <th>Код 300</th>
              <th>Код 500</th>
              <th>Код 3000</th>
                <th></th>
                <th></th>

            </tr>

<br>


        <tr>

    <td>  <input form="form{{$server->id}}" type="text" class="form-control" name="title" required value="{{$server->title}}"></td>
    <td>  <input form="form{{$server->id}}"  type="text" class="form-control" name="nick" required value="{{$server->nick}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="sort" required value="{{$server->sort}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk_300" required value="{{$server->vk_300}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk_500" required value="{{$server->vk_500}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk_3000" required value="{{$server->vk_3000}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk1_300" required value="{{$server->vk1_300}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk2_500" required value="{{$server->vk2_500}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk3_3000" required value="{{$server->vk3_3000}}"></td>
    <td>  </form>
          <td>

</td>

        </tr>


    <td> </td>
    <td>  </td>
  <td> </td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk_3001" required value="{{$server->vk_3001}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk_5001" required value="{{$server->vk_5001}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk_30001" required value="{{$server->vk_30001}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk1_3001" required value="{{$server->vk1_3001}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk2_5001" required value="{{$server->vk2_5001}}"></td>
  <td>  <input form="form{{$server->id}}"  type="number" class="form-control" name="vk3_30001" required value="{{$server->vk3_30001}}"></td>
    <td>   <button class="btn btn-warning" type="submit">Сохранить</button></td></form>
          <td>      <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{action('ServerController@destroy', $server)}}" method="post">
                  @csrf
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-danger" type="submit">Удалить</button>
                </form>

</td>

        </tr>
  </table>



    @endforeach


      @endforeach

    </tbody>


  </div>

@endsection
