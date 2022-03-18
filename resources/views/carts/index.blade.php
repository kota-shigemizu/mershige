@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
  <div class="w-75">
    <h1>ショッピングカート</h1>

    <div class="row">
      <div class="offset-8 col-4">
        <div class="row">
          <div class="col-6">
            <h2>数量</h2>
          </div>
          <div class="col-6">
            <h2>合計</h2>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
      @foreach ($cart as $post)
      <div class="col-md-2 mt-2">
        <a href="{{route('posts.show', $post->id)}}">
          <img src="{{asset('img/dummy.png')}}" class="img-fuild w-100">
        </a>
      </div>
      <div class="col-md-6 mt-4">
        <h3 class="mt-4">{{$post->name}}</h3>
      </div>
      <div class="col-md-2">
        <h3 class="w-100 mt-4">{{$post->qty}}</h3>
      </div>
      <div class="col-md-2">
        <h3 class="w-100 mt-4">￥{{$post->qty * $post->price}}</h3>
      </div>
      @endforeach
    </div>

    <hr>

    <div class="offset-8 col-4">
      <div class="row">
        <div class="col-6">
          <h2>合計</h2>
        </div>
        <div class="col-6">
          <h2>¥{{$total}}</h2>
        </div>
        <div class="col-12 d-flex justify-content-end">
          表示価格は税込です
        </div>
      </div>
    </div>

    <form method="post" action="{{route('carts.destroy')}}" class="d-flex justify-content-end mt-3">
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <a href="/posts" class="btn mershige-favorite-button border-dark text-dark mr-3">
        買い物を続ける
      </a>
      @if($total > 0)
      <button type="submit" class="btn mershige-submit-button">購入を確定する</button>
      @else
      <button type="submit" class="btn mershige-submit-button disabled">購入を確定する</button>
      @endif
    </form>
  </div>
</div>
@endsection