@extends('layouts.app')

@section('content')
<div class="container">
  <h1>商品を編集する</h1>

  <form method="POST" action="/posts/{{$post->id}}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group mt-5">
      <label for="post-title">商品名</label>
      <input type="text" name="title" id="post-title" class="form-control" value="{{$post->title}}">
    </div>
    <div class="form-group mt-3">
      <label for="post-price">価格</label>
      <input type="number" name="price" id="post-price" class="form-control" value="{{$post->price}}">
    </div>
    <div class="form-group mt-3">
      <select name="category_id" class="form-control" id="post-category">
        @foreach ($categories as $category)
          @if ($category->id == $post->category_id)
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
          @else
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group mt-3">
      <label for="post-description">説明文</label>
      <textarea name="description" id="post-description" class="form-control">{{$post->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-danger mt-5 mb-3">更新</button>
  </form>

  <a href="/posts">戻る</a>

</div>

@endsection
