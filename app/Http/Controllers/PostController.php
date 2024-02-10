<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Helpers\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function makePostPage()
    {
        return view('posts.createPost');
    }


    public function createPost(Request $request)
    {
        $data = $request->all();
        $check = Validator::validate($data);
        if ($check) {
            return response()->json(['error' => $check], 400);
        }

        Post::create($data);

        return "post ditambahkan";
    }
}
