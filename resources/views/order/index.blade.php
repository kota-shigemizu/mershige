@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <div class="row w-75">
    <h1>注文内容確認</h1>

    <div class="row">
      <div class="col-md-2 mt-2">
        <a href="{{route('posts.show', $post->id)}}">
          <img src="{{ asset('img/dummy.png')}}" class="img-fuild w-100">
        </a>
      </div>
      <div class="col-md-4 mt-4">
        <h3 class="mt-4">{{$post->title}}</h3>
      </div>
      <div class="col-md-6 mt-4">
        <h3 class="mt-4">{{$post->price}}</h3>
      </div>
    </div>


  </div>

  <form method="POST"  action="{{route('order.store')}}" class="m-3 align-item-end">
        @csrf
        <input type="hidden" name="id" value="{{$post->id}}">
        <button type="submit">購入する</button>
  </form>


  <a href="/posts">戻る</a>

</div>



@endsection
