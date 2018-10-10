@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
</div>
<div class="container-fluid">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Номер заказа</th>
        <th scope="col">Игра</th>
        <th scope="col">Сервер</th>
        <th scope="col">Ник клиента</th>
        <th scope="col">Коды</th>
        <th scope="col">Сумма</th>
        <th scope="col">Дата</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
          <tr>
            <th scope="row">{{ $order->order_number }}</th>
            <td>{{ $order->games }}</td>
            <td>{{ $order->server }}</td>
            <td>{{ $order->nick_clienta }}</td>
            <td>{{ $order->order }}</td>
            <td>{{ $order->timestamps }}</td>


          </tr>
      @endforeach


      </tr>
    </tbody>
  </table>




  </div>

@endsection
