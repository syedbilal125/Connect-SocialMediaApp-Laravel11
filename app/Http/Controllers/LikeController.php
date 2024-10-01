<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Posts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LikeController extends Controller
{


    public function like(Posts $post)
    {
        $userData = Cookie::get("user_data");
        $userData = json_decode($userData, true);

        $like = new Like();
        $like->user_id = $userData['id'];
        $like->posts_id = $post->id;
        $like->save();

        return back();
    }

    public function unlike(Posts $post)
    {
        $userData = Cookie::get("user_data");
        $userData = json_decode($userData, true);
        $like = Like::where('user_id', $userData['id'])->where('posts_id', $post->id)->first();
        if ($like) {
            $like->delete();
        }

        return back();
    }

    //
}
