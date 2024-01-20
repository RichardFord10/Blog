<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
    protected $fillable = ['title', 'content', 'author_id'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

        public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
