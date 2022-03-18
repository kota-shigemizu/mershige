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
      <form method="POST"  action="{{route('carts.store')}}" class="m-3 align-item-end">
        @csrf
        <input type="hidden" name="id" value="{{$post->id}}">
        <input type="hidden" name="title" value="{{$post->title}}">
        <input type="hidden" name="price" value="{{$post->price}}">


        <div class="form-group row">
            <div class="col-5">
              <button type="submit" class="btn mershige-submit-button w-100 secList">
                 <i class="fas fa-shopping-cart"></i>
                    購入手続きへ
              </button>
              <div class="section">
                <p>カートに追加しました</p>
              </div>
            </div>
            <div class="col-5 ">
              <a href="/posts/{{ $post->id }}/nice" class="btn mershige-favorite-button text-dark w-100"></a>
                  <span>
                    <img src="{{asset('img/nicebutton.png')}}" width="30px">

                      <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                      @if($nice)
                      <!-- 「いいね」取消用ボタンを表示 -->
	                    <a href="{{ route('unnice', $post) }}" class="btn btn-success btn-sm">
                        いいね
	                    	<!-- 「いいね」の数を表示 -->
		                    <span class="badge">
                          {{ $post->nices->count() }}
		                    </span>
	                    </a>
                      @else
                      <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	                    <a href="{{ route('nice', $post) }}" class="btn btn-secondary btn-sm">
                        いいね
		                    <!-- 「いいね」の数を表示 -->
		                    <span class="badge">
                          {{ $post->nices->count() }}
		                    </span>
                    	</a>
                      @endif
                  </span>
            </div>

        </div>
      </form>
      @endauth
    </div>
  </div>


  <a href="/posts">戻る</a>

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
