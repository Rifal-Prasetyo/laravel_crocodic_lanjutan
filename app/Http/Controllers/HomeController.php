<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    //

    public function home($lang)
    {
        if (!in_array($lang, ['en', 'id'])) {
            abort(400);
        }

        App::setLocale($lang);
        // $posts = Post::limit(5)->get();
        $posts = Post::latest();

        return view('home.home', compact('posts'));
    }
}
