<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$user['username']}} | Myprofile | Connect</title>

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{$user['username']}}">
    <meta property="og:description" content="{{$user['username']}}">
    <meta property="og:type" content="website">
    <meta property="og:image"
        content="{{asset('uploads/user/profileImage/' . $user['image']) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">
    <meta property="og:image:alt" content="profile image">
    <meta property="og:locale" content="en_US">

    <!-- Tailwind Css & Fonts -->
    @vite('resources/css/app.css')

    <!-- Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <div class="sticky top-0 bg-white shadow-sm">
        <nav class="container-width py-6 flex items-center justify-between">
            <div class="flex items-center ">
                <a class="conntect-logo-font" href="{{route('home')}}">Connect</a>
            </div>
            <div class="flex items-center justify-between gap-4">
                <a href="{{route('home')}}" class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                </a>
                <button class="svg-icon" id="open-modal" onclick="showModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l320 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM200 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                    </svg>
                </button>

                <div class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9l.3-.5z" />
                    </svg>
                </div>
                <div class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                    </svg>
                </div>

                @if ($user)
                    <div class="w-[20px] lg:w-[40px] lg:h-[40px]">
                        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-[40px] h-[20px] lg:w-8 lg:h-8 rounded-full object-cover"
                                src="{{asset('uploads/user/profileImage/' . $user['image']) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                                alt="user photo">

                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatar"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div><span>@</span>{{  $user['username'] ?? 'User' }}</div>
                                <div class="font-medium truncate">{{ $user['email'] ?? 'No Email' }}</div>
                            </div>
                            <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                                <li>
                                    <a href="{{route('myprofile')}}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My
                                        Profile</a>
                                </li>
                            </ul>
                            <div class="rounded-b-md">
                                <form
                                    class="block rounded-b-md py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-red-400"
                                    action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button
                                        class="block rounded-b-md px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-red-400">Sign
                                        out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- My Profile -->
    <div class="container-width">
        <div class="lg:py-6 lg:px-40">
            <div class="flex lg:flex-row flex-col gap-10 lg:gap-20">
                <img class="w-[200px] border-gray-200 border-[5px] p-1 object-cover h-[200px] rounded-full"
                    src="{{asset('uploads/user/profileImage/' . $user['image']) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                    alt="">
                <div class="flex flex-col lg:py-5">
                    <div class="flex items-center">
                        <h2 class="text-[30px]">{{$user['username']}}</h2>
                        <a href="{{route('editprofile')}}"
                            class="py-1 bg-gray-50 ml-5 px-3 text-[15px] border-gray-200 border-[0.5px]">Edit
                            Profile</a>
                    </div>
                    <div class="flex justify-between items-center mt-4 gap-5">
                        <span class="text-[14px] font-bold">{{$userposts->posts->count()}} <span
                                class="font-normal">posts</span></span>
                        <span class="text-[14px] font-bold">{{$userposts->followers->count()}} <span
                                class="font-normal">followers</span></span>
                        <span class="text-[14px] font-bold">{{$userposts->following->count()}} <span
                                class="font-normal">following</span></span>
                    </div>
                    <h4 class="mt-3">{{$user['fullname']}}</h4>
                    <p class="w-[300px]">
                        {{$user['bio'] ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic aut ipsum nulla iure tempora nobis. Aspernatur, placeat quos! Ad numquam provident quam minus illo vel aspernatur incidunt esse dicta blanditiis!'}}
                    </p>
                </div>
            </div>
        </div>
        <hr class="my-5">
        <div class="">
            <div class="flex justify-center items-center gap-5">
                <span>POSTS</span><span>SAVED</span><span>TAGGED</span>
            </div>
            @if ($userposts->posts->isEmpty())
                <div class="flex flex-col items-center justify-between w-full mt-7 space-y-1">
                    <div class="w-[50px]">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#b5b5b5"
                                d="M149.1 64.8L138.7 96 64 96C28.7 96 0 124.7 0 160L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64l-74.7 0L362.9 64.8C356.4 45.2 338.1 32 317.4 32L194.6 32c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                        </svg>
                    </div>
                    <h1 class="text-[30px] font-bold text-gray-500">Share Photos</h1>
                    <p class="text-gray-500">When you share photos, they will appear on your profile.</p>
                    <button id="share-photos" onclick="showModal()" class="text-blue-700">Share your first photo</button>

                </div>
            @else
                <div class="grid grid-cols-3 w-full gap-2 md:gap-1 py-3 mt-2 lg:px-20">
                    @foreach ($userposts->posts as $post)
                        <div class="hover:opacity-90 cursor-pointer group" onclick="postModle({{$post->id}})">
                            <div>
                                <img class="object-cover w-full h-[100px] md:h-[180px] lg:h-[280px]"
                                    src="{{asset('uploads/posts/postsImages/' . $post->image) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                                    alt="">
                                <div
                                    class="hidden gap-2 group-hover:flex absolute ml-[7.3rem] -translate-y-40 text-white text-2xl">
                                    <div class="flex items-center gap-2">
                                        <div class="w-[20px] flex">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#ffffff"
                                                    d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                            </svg>
                                        </div>
                                        <span class="text-xl">{{$post->likes->count()}}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-[20px] flex">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#ffffff"
                                                    d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c0 0 0 0 0 0s0 0 0 0s0 0 0 0c0 0 0 0 0 0l.3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z" />
                                            </svg>
                                        </div>
                                        <span class="text-xl">{{$post->comments->count()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="postModal{{ $post->id }}" onclick="closeModal({{ $post->id }})"
                            class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">

                            <div class="bg-white w-full shadow-lg max-w-5xl mx-auto relative" onclick="event.stopPropagation()">

                                <div class="flex">
                                    <!-- Image on the left -->
                                    <div class="h-full">
                                        <img class="object-cover w-[500px] h-[577px]"
                                            src="{{ asset('uploads/posts/postsImages/' . $post->image) }}" alt="Post Image">
                                    </div>

                                    <!-- Content on the right -->
                                    <div class="w-1/2 p-4 relative">
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center gap-2">
                                                <img class="w-[40px] h-[20px] lg:w-8 lg:h-8 rounded-full object-cover"
                                                    src="{{asset('uploads/user/profileImage/' . $post->user->image) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                                                    alt="user photo">
                                                <h3 class="text-[14px] font-bold">{{ $post->user->fullname }} </h3>
                                            </div>
                                            <div class="w-[15px]">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                </svg>
                                            </div>


                                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">Dropdown button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>

                                            
                                            <div id="dropdown"
                                                class="z-[9999px] absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownDefaultButton">
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                                            out</a>
                                                    </li>
                                                </ul>
                                            </div> 


                                        </div>
                                        <hr>
                                        <div class="h-[330px]">
                                            <div class="flex flex-col ">
                                                <div class="flex items-center gap-1">
                                                    <div class="flex items-center gap-2">
                                                        <img class="w-[40px] h-[20px] lg:w-8 lg:h-8 rounded-full object-cover"
                                                            src="{{asset('uploads/user/profileImage/' . $post->user->image) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                                                            alt="user photo">
                                                        <h3 class="text-[14px] font-bold">{{ $post->user->fullname }} </h3>
                                                    </div>
                                                    <p class="">{{ $post->description }}</p>
                                                </div>
                                                <div class="mt-4">
                                                    @foreach ($post->comments as $comment)
                                                        <div class="flex items-center gap-2 mt-2">
                                                            <div class="flex items-center gap-1">
                                                                <img class="w-7 h-7 object-cover rounded-full"
                                                                    src="{{asset('uploads/user/profileImage/' . $comment->user->image)}}"
                                                                    alt="user photo">
                                                                <span>{{$comment->user->username}}</span>
                                                            </div>
                                                            <p>{{$comment->content}}</p>
                                                        </div>
                                                        <div class="text-[8px] text-gray-600 ml-2 mt-1">
                                                            {{$comment->created_at->format('M d')}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- Like button and count -->
                                        <div class="flex items-center gap-2">
                                            @if ($post->likedByUser($user))
                                                <form action="{{ route('unlike', $post->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            class="w-6 h-6">
                                                            <path fill="#ff3c2e"
                                                                d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('like', $post->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            class="w-6 h-6">
                                                            <path
                                                                d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="mt-2 flex flex-col">
                                            <span>{{ $post->likes->count() }} likes</span>
                                            <span>{{$post->created_at->format('M d')}}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <button class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"
                                onclick="closeModal({{ $post->id }})">
                                <div class="w-[20px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path fill="#ffffff"
                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                    </svg>
                                </div>
                            </button>
                        </div>

                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <!-- My Profile End -->

    <!-- Modal HTML -->
    <div id="overlay"
        class="hidden fixed overflow-x-hidden overflow-y-hidden inset-0 bg-black bg-opacity-75 z-50 flex justify-center items-center">
        <!-- Modal content -->
        <div class="w-[20px] top-0 right-0 absolute m-4">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff"
                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
            </svg>
        </div>
        <form action="{{route('post', $user['id'])}}" method="post" enctype="multipart/form-data" id="modal-content"
            class="bg-gray-800 text-white grid grid-cols-2 gap-4 rounded-lg w-[60%]">
            @csrf
            <div id="removeImageDiv"
                class="bg-gray-700 rounded-tl-md rounded-bl-md flex h-[420px] flex-col justify-center">
                <label htmlfor="image" id="upload" class="flex cursor-pointer gap-1 flex-col items-center">
                    <input value="{{old('image')}}" type="file" accept=".png,.jpg,.jpeg" name="image" id="image"
                        class="hidden">
                    <div class="w-[40px]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <!-- Font Awesome SVG icon -->
                            <path fill="#ffffff"
                                d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128l-368 0zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39L296 392c0 13.3 10.7 24 24 24s24-10.7 24-24l0-134.1 39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z" />
                        </svg>
                    </div>
                    <h2 class="text-[15px]">Upload from your device</h2>
                </label>
                <div id="image-preview" class="hidden">
                    <img id="selected-image" src="" alt="Selected Image" class="object-cover w-full h-[420px]">
                </div>
            </div>

            <div class="py-6">
                <div class="flex items-center gap-3">
                    <img class="w-10 h-10 rounded-full object-cover"
                        src="{{asset('uploads/user/profileImage/' . $user['image']) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                        alt="user photo">
                    <h3>{{$user['username']}}</h3>
                </div>
                <div class="mr-3">
                    <textarea name="description" value="{{old('description')}}"
                        class="input-fields mt-3 resize-none w-full h-[200px]" id="myTextarea"></textarea>
                    <p id="charCount">0 / 2000 characters</p>
                </div>
                <button type="submit"
                    class="py-2 float-end mr-4 mt-10 px-6 rounded-full hover:bg-gray-700 duration-100 text-[18px] border-gray-400 border-[0.5px]">Share</button>
            </div>
        </form>
    </div>

    @error('description')
        <p class="text-red-400">{{$message}}</p>
    @enderror
    @error('image')
        <p class="text-red-400">{{$message}}</p>
    @enderror
    <!-- Modal Confirmation HTML -->
    <div id="confirm-modal"
        class="hidden w-full animate-open fixed inset-0 bg-black bg-opacity-75 z-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-1/3">
            <p class="text-gray-800 mb-4 text-[15px]">Are you sure you want to discard your changes?</p>
            <div class="flex justify-end">
                <button id="discard-btn" class="mr-2 bg-red-500 text-white px-4 py-2 rounded">Discard</button>
                <button id="cancel-btn" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
            </div>
        </div>
    </div>


    <script>
        const sharepost = document.getElementById('share-photos')
        const overlay = document.getElementById('overlay');
        const modalContent = document.getElementById('modal-content');
        const openModal = document.getElementById('open-modal');
        const confirmModal = document.getElementById('confirm-modal');
        const discardBtn = document.getElementById('discard-btn');
        const cancelBtn = document.getElementById('cancel-btn');
        const textarea = document.getElementById('myTextarea');
        const charCount = document.getElementById('charCount');
        const upload = document.getElementById('upload')
        const removeImageDiv = document.getElementById('removeImageDiv')
        const selectedImage = document.getElementById('selected-image');
        const imagePreview = document.getElementById('image-preview');

        let maxChars = 2000;

        // Open the main modal
        openModal.addEventListener('click', () => {
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });

        sharepost.addEventListener('click', () => {
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });
        sharepost

        // Close modal and open confirmation when clicking outside
        overlay.addEventListener('click', (e) => {
            if (!modalContent.contains(e.target)) {
                confirmModal.classList.remove('hidden');
                document.body.classList.remove('overflow-hidden');

            }
        });

        // Discard changes and close all modals
        discardBtn.addEventListener('click', () => {
            confirmModal.classList.add('hidden');
            overlay.classList.add('hidden');
            textarea.value = ''
            charCount.textContent = `0 / ${maxChars} characters`;
            charCount.classList.remove('text-red-500');
            document.getElementById('upload').classList.remove('hidden');
            selectedImage.classList.add('hidden'); // Hide the image if no file is selected
            selectedImage.src = ''
        });

        // Cancel discard and close confirmation dialog
        cancelBtn.addEventListener('click', () => {
            confirmModal.classList.add('hidden');
        });

        // Prevent clicking inside modal from triggering the overlay click event
        modalContent.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        textarea.addEventListener('input', () => {
            const textLength = textarea.value.length;

            if (textLength >= maxChars) {
                // Prevent input if it reaches or exceeds the limit
                textarea.value = textarea.value.substring(0, maxChars);
                charCount.textContent = `${maxChars} / ${maxChars} characters`;
                charCount.classList.add('text-red-500')
            } else {
                // Update the character count display
                charCount.textContent = `${textLength} / ${maxChars} characters`;
            }
        });

        document.getElementById('image').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const imagePreview = document.getElementById('image-preview');
            const selectedImage = document.getElementById('selected-image');

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    selectedImage.src = e.target.result;
                    imagePreview.classList.remove('hidden'); // Show the image preview container
                    selectedImage.classList.remove('hidden'); // Ensure the image is visible
                    upload.classList.add('hidden')
                    removeImageDiv.classList.remove('items-center')
                    removeImageDiv.classList.remove('justify-between')
                }

                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add('hidden'); // Hide the container if no file is selected
                selectedImage.classList.add('hidden'); // Hide the image if no file is selected
            }
        });

        function postModle(postId) {
            document.getElementById('postModal' + postId).classList.remove('hidden');
        }

        function closeModal(postId) {
            document.getElementById('postModal' + postId).classList.add('hidden');
        }
    </script>
</body>

</html>