@extends('layouts.app')

@section('content')
<div class="container">
  <h1>商品を出品する</h1>

  <form method="POST" action="/posts">
    @csrf
    <div class="form-group mt-5">
      <label for="post-title">商品名</label>
      <input type="text" name="title" id="post-title" class="form-control">
    </div>
    <div class="form-group mt-3">
      <label for="post-price">価格</label>
      <input type="number" name="price" id="post-price" class="form-control">
    </div>
    <div class="form-group mt-3">
      <label for="post-category">カテゴリー
        <select name="category_id" class="form-control" id="post-category">
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </label>
    </div>
    <div class="form-group mt-3">
      <label for="post-description">説明文</label>
      <textarea name="description" id="post-description" class="form-control"></textarea>
    </div>

    <button type="submit" class="mt-5 mb-5">出品する</button>
  </form>

  <a href="/posts">戻る</a>
</div>

@endsection
