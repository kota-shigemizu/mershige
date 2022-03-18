<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

     protected function redirectTo($request)
     {
         return route('dashboard.login');
     }

     protected $fillable = [
         'name', 'email', 'password',
     ];

     protected $hidden = [
         'password', 'remember_token',
     ];

     protected $casts = [
         'email_verified_at' => 'datetime',
     ];
}
