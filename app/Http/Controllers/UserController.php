<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Nice;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        return view('users.mypage', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        /** @var User $user */
        $user = Auth::user();

         $user->name = $request->input('name') ? $request->input('name') : $user->name;
         $user->email = $request->input('email') ? $request->input('email') : $user->email;
         $user->postal_code = $request->input('postal_code') ? $request->input('postal_code') : $user->postal_code;
         $user->address = $request->input('address') ? $request->input('address') : $user->address;
         $user->phone = $request->input('phone') ? $request->input('phone') : $user->phone;
         $user->update();

         return redirect()->route('mypage');
    }

    public function edit_address()
     {
         $user = Auth::user();

         return view('users.edit_address', compact('user'));
     }

     public function edit_password()
     {
         return view('users.edit_password');
     }

     public function update_password(Request $request)
     {
         /** @var User $user */
         $user = Auth::user();

         if ($request->input('password') == $request->input('password_confirmation')) {
             $user->password = bcrypt($request->input('password'));
             $user->update();
         } else {
             return redirect()->route('mypage.edit_password');
         }

         return redirect()->route('mypage');
     }

     public function nice()
     {
         /** @var User $user */
         $user = Auth::user();

         $nices = $user->nices(Nice::class)->get();

         return view('users.nice', compact('nices'));
     }

     public function order_history()
     {
         /** @var User $user */
         $user = Auth::user();
         $orders = ($user)->orders()->get();
        return view('users.order_history', compact('orders'));
     }
}
