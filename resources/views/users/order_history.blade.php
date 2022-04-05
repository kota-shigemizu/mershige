@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <span>
        <a href="{{ route('mypage') }}">マイページ</a>注文履歴
      </span>

      <div class="container mt-4">
        @foreach($orders as $order)
          <div>{{$order->id}}</div>
          <div>{{$order->post->title}}</div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
