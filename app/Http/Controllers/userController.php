<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class userController extends Controller
{
    public function register(Request $request)
    {
        // Defined rules for the validation of product storing in DB
        $rules = [
            'fullname' => 'required|min:5',
            'username' => 'required|min:5',
            'email' => 'required',
            'password' => 'required|min:6',
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }
        ;

        $validator = Validator::make($request->all(), $rules);

        // Check if email or username already exists
        if (User::where('email', $request->email)->exists()) {
            $validator->errors()->add('email', 'The email is already taken.');
        }

        if (User::where('username', $request->username)->exists()) {
            $validator->errors()->add('username', 'The username is already taken.');
        }

        // So if our validations fails then redirect user to products.create with the errors
        if ($validator->fails())
            return redirect()->route('signup')->withInput()->withErrors($validator);

        // Inserting Data in DB
        $user = new User();
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($request->image != "") {
            // storing images here
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; //Unique Image Name

            // Save images to product directory
            $image->move(public_path('uploads/user/profileImage'), $imageName);

            // Save image name in database
            $user->image = $imageName;
            $user->save();
        }

        return redirect()->route('login')->with('success', 'Signned Up Successfully');
    }

    public function signin(Request $request)
    {
        // Define validation rules
        $rules = [
            'email_or_username' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->route('login')->withInput()->withErrors($validator);
        }

        // Retrieve user by email or username
        $user = User::where('email', $request->email_or_username)
            ->orWhere('username', $request->email_or_username)
            ->first();

        // Check if user exists and password is correct
        if ($user && \Hash::check($request->password, $user->password)) {
            // Authentication successful
            auth()->login($user);

            // Create user data array
            $userData = [
                'id' => $user->id,
                'email' => $user->email,
                'image' => $user->image,
                'fullname' => $user->fullname,
                'username' => $user->username
            ];

            // Store user data in a cookie as a JSON object
            Cookie::queue(Cookie::make('user_data', json_encode($userData), 60 * 24 * 7)); // 1 week

            return redirect()->route('home')->with('success', 'Logged in successfully.');
        } else {
            // Authentication failed
            return redirect()->route('login')->withErrors(['email_or_username' => 'The provided credentials are incorrect.']);
        }
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('user_data'));

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    public function editprofiledata(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Define rules for the validation of user updating
        $rules = [
            'bio' => 'required|max:150',
        ];

        if ($request->image) {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return to the previous page with errors
        if ($validator->fails()) {
            return redirect()->route('editprofile')->withInput()->withErrors($validator);
        }

        // Update user details
        $user->bio = $request->bio;

        // Handle the profile image
        if ($request->hasFile('image')) {
            // Remove the old image if exists
            if ($user->image) {
                $oldImagePath = public_path('uploads/user/profileImage/' . $user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/user/profileImage'), $imageName);

            // Update image name in the database
            $user->image = $imageName;
        }

        // Regenerate the user data for the cookie
        $userData = [
            'id' => $user->id,
            'bio' => $request->bio,
            'email' => $user->email,
            'image' => $user->image,
            'fullname' => $user->fullname,
            'username' => $user->username
        ];

        // Update the cookie with new user data (expires in 1 week)
        Cookie::queue(Cookie::make('user_data', json_encode($userData), 60 * 24 * 7));

        // Save updated user data
        $user->save();

        return redirect()->route('myprofile')->with('success', 'Profile updated successfully.');
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $searchTerm = $request->input('query');

            // Search users by username
            $users = User::with('followers')->where('username', 'LIKE', '%' . $searchTerm . '%')->get();

            // Return JSON response
            return response()->json($users);
        }
    }
}
