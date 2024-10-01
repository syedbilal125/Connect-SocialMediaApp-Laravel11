<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class FollowController extends Controller
{
    // Follow a user
    public function follow($userId)
    {
        $userData = Cookie::get("user_data");
        $userData = json_decode($userData, true);
        $user = User::findOrFail($userId);
        $user->followers()->attach($userData['id']);

        return redirect()->route('profile', $userId)->with('success', 'Followed Successfully');
    }

    // Unfollow a user
    public function unfollow($userId)
    {
        $user = User::findOrFail($userId);
        $userData = Cookie::get("user_data");
        $userData = json_decode($userData, true);
        $user->followers()->detach($userData['id']);

        return redirect()->route('profile', $userId)->with('success', 'Unfollowed Successfully');
    }
}
