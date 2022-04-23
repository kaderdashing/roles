<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Writer extends Authenticatable
    {
        use Notifiable;
        use HasApiTokens, HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */

        protected $guard = 'writer';

        protected $fillable = [
            'name', 'email', 'password',
        ];
          /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

        protected $hidden = [
            'password', 'remember_token',
        ];
    }