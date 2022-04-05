<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Nice;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index(Request $request)
  {
    $post = Post::find($request->input('id'));

    return view('order.index', compact('post'));
  }

  public function store(Request $request)
  {
    $post = Post::find($request->input('id'));
    $order = new Order();
    $order->post()->associate($post);
    $order->user()->associate(Auth::user());

    if($post->status === 'sold_out') {
      return redirect()->route('posts.index');
    }

    $order->save();

    $post->update(['status'=>'sold_out']);


    return view('order.store', compact('order'));
  }


}
