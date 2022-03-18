@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
  <div class="w-75">
    <h1>お気に入り</h1>
    <hr>
    <div class="row">
      @foreach($nices as $ni)
      <div class="col-md-8 mt-2">
        <div class="d-inline-flex">
          <a href="{{route('posts.show', $ni)}}" class="w-25">
            <img src="{{asset('img/dummy.png')}}" class="img-fuild w-100">
          </a>
          <div class="container mt-3">
            <h5 class="w-100 mershige-nice-item-text">{{App\Models\Post::find($ni->post_id)->title}}</h5>
            <h5 class="w-100 mershige-nice-item-text">¥{{App\Models\Post::find($ni->post_id)->price}}</h5>
          </div>
        </div>
      </div>
      <div class="col-md-2 d-flex align-items-center justify-content-end">
        <a href="{{ route('unnice', $ni->post) }}" class="mershige-nice-item-delete">
          削除
        </a>
      </div>
      <div class="col-md-2 d-flex align-items-center justify-content-end">
        <button type="submit" class="btn mershige-nice-add-cart text-white w-100">購入する</button>
      </div>
      @endforeach
    </div>
    <hr>
  </div>
</div>
@endsection
