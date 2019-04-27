<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password', '_token'
    ];

    protected $hidden = [
        'password', '_token',
    ];
}

