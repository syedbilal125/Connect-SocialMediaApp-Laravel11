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

    <!-- Edit Profile -->
    <div class="container-width p-10">
        <h1 class="text-[20px]">Edit profile</h1>
        <div class="flex flex-col p-5">
            <form action="{{route('editprofiledata', $user['id'])}}" enctype="multipart/form-data" method="post"
                class="bg-gray-700  py-5 px-10 rounded-md text-white">
                @csrf
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <img class="w-[70px] border-gray-200 border-[1px] p-1 object-cover h-[70px] rounded-full"
                            src="{{asset('uploads/user/profileImage/' . $user['image']) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                            alt="">
                        <div class="">
                            <h2 class="text-[25px] font-bold">{{$user['username']}}</h2>
                            <h4 class="">{{$user['fullname']}}</h4>
                        </div>
                    </div>
                    <div class="">
                        <label htmlfor="image"
                            class="py-2 text-white px-6 rounded-full hover:bg-gray-500 duration-100 text-[18px] border-gray-400 border-[0.5px]">Change
                            Photo
                            <input value="{{old('image')}}" type="file" accept=".png,.jpg,.jpeg" class="hidden"
                                name="image" id="image">
                        </label>
                    </div>
                </div>
                <div class="mt-7">
                    <span class="text-[18px]">Bio</span>
                    <div class="border-gray-300 border-[1px] rounded-md">
                        <textarea name="bio" value="{{old('bio')}}" class="input-fields  resize-none w-full h-[100px]"
                            placeholder="bio" id="myTextarea"></textarea>
                        @error('bio')
                            <p class="text-red-400">{{$message}}</p>
                        @enderror
                        <p id="charCount" class="float-end mt-1">0 / 150 characters</p>
                    </div>
                    <button type="submit"
                        class="py-2 text-white mt-10 px-6 rounded-full hover:bg-gray-500 duration-100 text-[18px] border-gray-400 border-[0.5px]">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Profile END -->
</body>

</html>