<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository
{
    public static function latestPost()
    {
        return Post::limit(5)->orderBy('id', 'desc')->get();
    }
}
