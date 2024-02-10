<?php

namespace App\Service;

use App\Repository\PostRepository;

class PostService
{
    public static function latestPost()
    {
        $result = PostRepository::latestPost();


        foreach ($result as $row) {
            $row->judul_indonesia = $row->title;
        }

        return $result;
    }
}
