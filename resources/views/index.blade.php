@extends('layouts.app')

@section('content')

<div class="container">
<example-component></example-component>


<div class="row justify-content-center">
  @foreach ($games as $game)

        <div class="col-4 border">{{$game->title}}

        </div>
@endforeach
  </div>




  @foreach ($games as $game)


 @foreach ($game->servers as $server)
  <div class="row">
<div class="col border">  {{$server->title}}  </div>
<div class="col border">  {{$server->vk_300}}  </div>
<div class="col border">  {{$server->vk_500}}  </div>
<div class="col border">  {{$server->vk_3000}}  </div>
<div class="col border">  {{$server->vk1_300}}  </div>
<div class="col border">  {{$server->vk2_500}}  </div>
<div class="col border">  {{$server->vk3_3000}}  </div>
<div class="col border">  {{$server->vk_3001}}  </div>
<div class="col border">  {{$server->vk_5001}}  </div>
<div class="col border">  {{$server->vk_30001}}  </div>
<div class="col border">  {{$server->vk1_3001}}  </div>
<div class="col border">  {{$server->vk2_5001}} </div>
<div class="col border">  {{$server->vk3_30001}}  </div>
  </div>



@endforeach

  @endforeach

</div>





  @endsection
