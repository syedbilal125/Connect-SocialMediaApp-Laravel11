<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
use App\Http\Controllers\viewController;
use Illuminate\Support\Facades\Route;

// Rendring 404 page
Route::fallback(function () {
    return view("404");
});

// View Routes
Route::controller(viewController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/signup', 'signupview')->name('signup');
    Route::get('/login', 'loginview')->name('login');
    Route::get('/myprofile', 'myprofileview')->name('myprofile');
    Route::get('/myprofile/edit', 'editprofile')->name('editprofile');
    Route::get('/profile/{id}', 'profile')->name('profile');
    Route::get('/users', 'postswithuser')->name('postswithuser');
    Route::get('/search', 'searchview')->name('searchview');
});

// User Api Routes
Route::controller(userController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/editprofiledata/{id}', 'editprofiledata')->name('editprofiledata');
    Route::post('/signin', 'signin')->name('signin');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/search-users', 'search')->name('search');
});

// Post Api Routes
Route::controller(postController::class)->group(function () {
    Route::post('/post/{id}', 'post')->name('post');
    Route::post('/posts/{post}/like', 'likepost')->name('likepost');

});

// Follow/UnFollow Routes
Route::controller(FollowController::class)->group(function () {
    Route::post('/follow/{id}', 'follow')->name('follow');
    Route::post('/unfollow/{id}', 'unfollow')->name('unfollow');
});

Route::controller(LikeController::class)->group(function () {
    Route::post('/posts/{post}/like', 'like')->name('like');
    Route::post('/posts/{post}/unlike', 'unlike')->name('unlike');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/posts/{post}/comments', 'createcommnet')->name('createcommnet');
});