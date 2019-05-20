<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'topic', 'short_text', 'full_text',
        'author', 'img'];
    protected $hidden = ['_token'];
}
