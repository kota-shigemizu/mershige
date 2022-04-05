@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <div class="row w-75">
    <div class="col-5 offset-1">
      <img src="{{asset('img/dummy.png')}}" class="w-100 img-fuild">
    </div>
    <div class="col">
      <div class="d-flex flex-column">
        <h1 class="">{{$post->title}}</h1>
        <p class="">{{$post->price}}(税込)</p>
        <hr>
        <p class="">{{$post->description}}</p>
        <hr>
      </div>
      @auth
      <form method="POST"  action="{{route('order.index')}}" class="m-3 align-item-end">
        @csrf
        <input type="hidden" name="id" value="{{$post->id}}">
        <input type="hidden" name="title" value="{{$post->title}}">
        <input type="hidden" name="price" value="{{$post->price}}">


        <div class="form-group row">
            <div class="col-5">
              @if($post->status === 'sold_out')
                <p>購入済みです</p>
              @else
              <button type="submit" class="btn mershige-submit-button w-100 secList">
                 <i class="fas fa-shopping-cart"></i>
                    購入手続きへ
              </button>
              @endif
              <div class="section">
                <p>カートに追加しました</p>
              </div>
            </div>

      </form>
      @endauth
    </div>
  </div>


  <a href="/seller">戻る</a>

</div>

<script>
  $(function(){
    $('.section').hide();
    $('.secList').on('click', function(){
      $('.section').show();
    })
  })
</script>

@endsection
