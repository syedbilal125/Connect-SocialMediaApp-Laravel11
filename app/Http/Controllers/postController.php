<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class postController extends Controller
{
    //
    public function post(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'description' => 'required|min:20',
            'image' => 'required',
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->route('myprofile')->withInput()->withErrors($validator);

        // Inserting Data in DB
        $post = new Posts();
        $post->description = $request->description;
        $post->user_id = $id;
        $post->save();

        if ($request->image != "") {
            // storing images here
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; //Unique Image Name

            // Save images to product directory
            $image->move(public_path('uploads/posts/postsImages'), $imageName);

            // Save image name in database
            $post->image = $imageName;
            $post->save();
        }
        return redirect()->route('myprofile')->with('success', 'Posted Successfully');
    }

    public function likepost(Request $request, $postId)
    {
        $userdata = Cookie::get('user_data');
        $userDecodeToJSON = json_decode($userdata, true);
        $user = User::findOrFail($userDecodeToJSON['id']);
        $post = Posts::findOrFail($postId);

        // Toggle the like status
        if ($user->likedPosts()->where('post_id', $postId)->exists()) {
            // Unlike the post
            $user->likedPosts()->detach($postId);
        } else {
            // Like the post
            $user->likedPosts()->attach($postId);
        }

        return back();
    }
}
