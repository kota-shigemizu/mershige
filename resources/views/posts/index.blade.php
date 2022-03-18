@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-2">
    @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
    @endcomponent
  </div>
  <div class="col-9">
    <div class="container">
      @if ($category !== null)
        <a href="/posts">トップ</a> > <a href="#">{{ $category->major_category_name }}</a> > {{$category->name}}
        <h1>{{ $category->name }}の商品一覧{{$total_count}}件</h1>

          <form action="{{ route('posts.index')}}" class="form-inline">
            <input type="hidden" name="category" value="{{$category->id}}">
            並び替え
            <select name="sort" onChange="this.form.submit();" class="form-inline ml-2">
              @foreach ($sort as $key => $value)
                @if ($sorted == $value)
                  <option value="{{$value}}" selected>{{$key}}</option>
                @else
                  <option value="{{$value}}">{{$key}}</option>
                @endif
              @endforeach
            </select>
          </form>
      @endif
    </div>
    <div class="container mt-4">
      <div class="row w-100 mb-5">
        @foreach($posts as $post)
          <div class="col-3">
            <a href="{{route('posts.show', $post)}}">
              <img src="{{asset('img/dummy.png')}}" class="img-thumbnail">
            </a>
            <div class="row">
              <div class="col-12">
                <p class="mershige-product-label mt-2">
                  <label class="fs-3">{{$post->title}}</label><br>
                  <label>¥{{$post->price}}</label><br>
                  <label>{{$post->user->name}}</label>
                </p>
              </div>
            </div>

            <a href="{{route('posts.edit', $post)}}">編集する</a>
            <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('本当に削除しますか?')) { return true } else {return false };">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="mt-3">削除する</button>
            </form>
          </div>
        @endforeach
      </div>
      {{$posts->appends(request()->query())->links()}}
    </div>
  </div>
  <!-- 並べ替え -->
  <div>
      <!-- @sortablelink('並び替え項目', 'value')でもいいが昇順、降順を指定できずクリックのたびに切り替えになってしまう -->
    <a href="/posts?sort=id&direction=asc">古い順</a>
    <a href="/posts?sort=id&direction=desc">新着順</a>
    <a href="/posts?sort=price&direction=asc">価格の安い順</a>
    <a href="/posts?sort=price&direction=desc">価格の高い順</a>
  </div>
</div>


<a href="/posts/create" class="btn bg-danger text-light mt-5 fs-3 mb-5 ms-5">商品を出品する</a>


<form method="GET">
  @csrf
                        <ul class="navbar-nav ms-auto">
                            <div class="input-group">
                                <input type="search" name="search" value="{{request('search')}}" class="form-control" placeholder="なにをお探しですか？">
                                <span class="input-group-btn bg-secondary ">
                                    <button type="submit" class="btn btn-default text-light">検索</button>
                                    <button class="btn btn-secondary my-2 ml-5">
                                        <a href="{{route('posts.index')}}" class="text-white"> クリア</a>
                                    </button>
                                </span>
                            </div>
                        </ul>
                    </form>

                    @foreach ($posts as $post)
                        <a href="{{route('posts.show', ['post' => $post])}}">
                            {{$post->title}}
                        </a>
                    @endforeach


@endsection
