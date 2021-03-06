<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Nice;
use App\Models\Category;
use Illuminate\Http\Request;


class PostSellerController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sort_query = [];
        $sorted = "";

        if ($request->direction !== null) {
            $sort_query = $request->direction;
            $sorted = $request->sort;
        } else if ($request->sort !== null) {
            $slices = explode(' ', $request->sort);
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->sort;
        }

        $posts = Post::where('user_id', auth()->user()->id);
        if ($request->category !== null) {
            $posts = $posts->where('category_id', $request->category);
            $total_count = $posts->count();
            $category = Category::find($request->category);
        } else {
            $total_count = "";
            $category = null;
        }
        $posts = $posts->sortable($sort_query)->paginate(3);

        $sort = [
            '並び替え' => '',
            '価格の安い順' => 'price asc',
            '価格の高い順' => 'price desc',
            '出品の古い順' => 'id asc',
            '出品の新しい順' => 'id desc'
        ];



        // paginateにgetの役割も入っているため->get();は不要
        // $posts = Post::sortable()->paginate(3);
        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();
        return view('seller.index', compact('posts', 'category', 'categories', 'major_category_names', 'total_count', 'sort', 'sorted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->category_id = $request->input('category_id');
        $post->description = $request->input('description');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $nice = Nice::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        return view('seller.show', compact('post', 'nice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->category_id = $request->input('category_id');
        $post->description = $request->input('description');
        $post->update();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }



}
