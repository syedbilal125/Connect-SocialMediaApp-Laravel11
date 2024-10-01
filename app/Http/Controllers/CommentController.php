<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CommentController extends Controller
{
    //
    public function createcommnet(Request $request, Posts $post)
    {
        $userData = Cookie::get('user_data');
        $user = json_decode($userData, true);
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $post->comments()->create([
            'user_id' => $user['id'],
            'posts_id' => $post->id,
            'content' => $request->input('content'),
        ]);

        return redirect()->back();
    }
}
