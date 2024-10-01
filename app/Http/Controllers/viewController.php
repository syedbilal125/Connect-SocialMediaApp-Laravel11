<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class viewController extends Controller
{
    //
    public function home()
    {
        // Retrieve and decode user data from the cookie
        $userData = Cookie::get('user_data');

        if ($userData) {
            $userDatad = json_decode($userData, true);
            $user = User::findOrFail($userDatad['id']); // Decoding as associative array
            $jsonUser = json_encode($user);

            // Decode JSON back to an object
            $decodedUser = json_decode($jsonUser);
            $users = User::withCount('followers')
                ->orderBy('followers_count', 'DESC') // Order by the count of followers
                ->take(5) // Limit to the top 5 users
                ->get();
            $allposts = Posts::with('likes', 'user', 'comments') // Eager load likes
                ->orderBy('created_at', 'DESC')
                ->get()
                ->map(function ($post) use ($user) {
                    // Check if the current user has liked the post
                    $post->liked_by_user = $post->likes()->where('user_id', $user->id)->exists();
                    return $post;
                });

            // Pass user data to the view
            return view('home', ['user' => $user, 'decodedUser' => $decodedUser, "allposts" => $allposts, 'users' => $users]);
        }

        // If no user data is found, you might want to redirect or show an error
        return redirect()->route('login')->withErrors(['message' => 'User not logged in']);
    }
    public function signupview()
    {
        $userData = Cookie::get('user_data');
        if ($userData) {
            return redirect()->route('home');
        }
        return view("signup");
    }
    public function loginview()
    {
        $userData = Cookie::get('user_data');
        if ($userData) {
            return redirect()->route('home');
        }
        return view("login");
    }

    public function myprofileview(Request $request)
    {
        $userData = Cookie::get("user_data");
        if ($userData) {
            $userData = json_decode($userData, true);
            $user = User::findOrFail($userData["id"]);
            $userposts = User::with('posts')->find($user['id']);

            return view('myprofile', ['user' => $user], ['userposts' => $userposts]);
        }
    }

    public function editprofile(Request $request)
    {
        $userData = Cookie::get("user_data");
        if ($userData) {
            $user = json_decode($userData, true);
            $userposts = User::with('posts')->find($user['id']);
            return view('editprofile', ['user' => $user], ['userposts' => $userposts]);
        }
    }

    public function profile(Request $request, $id)
    {
        $userData = Cookie::get("user_data");
        // Fetch the current user from the cookie
        $currentuser = $userData ? json_decode($userData, true) : null;

        // Fetch the user and their posts
        $user = User::with('posts', 'likes')->find($id);
        $userposts = Posts::with('user', 'likes')
            ->where('user_id', $id)  // Replace $userId with the specific user's ID
            ->get();
        $currentuserData = User::find($currentuser['id']);


        // Pass all data to the view in one array
        return view('profile', [
            'userposts' => $userposts,
            'user' => $user,
            'currentuser' => $currentuser,
            'currentuserData' => $currentuserData,
        ]);
    }

    public function postswithuser()
    {

        // Fetch the user and their posts
        $user = Posts::with('comments', 'user')->get();


        // Pass all data to the view in one array
        return $user;
    }

    public function searchview()
    {

        $userData = Cookie::get('user_data');
        $userDatad = json_decode($userData, true);
        $user = User::findOrFail($userDatad['id']); // Decoding as associative array
        $jsonUser = json_encode($user);
        $decodedUser = json_decode($jsonUser);
        $users = User::withCount('followers')
            ->orderBy('followers_count', 'DESC') // Order by the count of followers
            ->take(10) // Limit to the top 5 users
            ->get();

        // Pass all data to the view in one array
        return view('search', ['decodedUser' => $decodedUser, 'users' => $users]);
    }
}
