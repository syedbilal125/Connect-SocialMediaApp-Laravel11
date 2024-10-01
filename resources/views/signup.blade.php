<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect | Sign up</title>

    <!-- Tailwind Css & Fonts -->
    @vite('resources/css/app.css')

    <!-- Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>

<body>
    <div class="w-full py-20">
        <div class="max-w-3xl grid grid-cols-1 lg:gap-7 lg:grid-cols-2 mx-auto">
            <div class="rounded-lg">
                <img class="w-full h-[600px] object-cover rounded-lg"
                    src="https://s3-alpha.figma.com/hub/file/408830524/c98e3200-42db-4c7f-b7cd-225875e0af3a-cover"
                    alt="">
            </div>
            <div class="flex flex-col space-y-2">
                <div class="flex flex-col px-10 py-5 border-gray-300 border-[0.1px]">
                    <h1 class="conntect-logo-font text-center">Connect</h1>
                    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col p-5 mt-2 gap-1">
                            @error('email')
                                <p class="text-red-400">{{$message}}</p>
                            @enderror
                            <div class="input-fields-wrapper @error('email') border-red-400 @enderror">
                                <input value="{{old('email')}}" name="email" placeholder="Email" type="email"
                                    class="input-fields">
                            </div>
                            @error('fullname')
                                <p class="text-red-400">{{$message}}</p>
                            @enderror
                            <div class="input-fields-wrapper @error('fullname') border-red-400 @enderror">
                                <input value="{{old('fullname')}}" name="fullname" placeholder="Fullname" type="text"
                                    class="input-fields">
                            </div>
                            @error('username')
                                <p class="text-red-400">{{$message}}</p>
                            @enderror
                            <div class="input-fields-wrapper @error('username') border-red-400 @enderror">
                                <input value="{{old('username')}}" name="username" placeholder="Username" type="text"
                                    class="input-fields">
                            </div>
                            @error('image')
                                <p class="text-red-400">{{$message}}</p>
                            @enderror
                            <div class="input-fields-wrapper @error('image') border-red-400 @enderror">
                                <input value="{{old(key: 'image')}}" name="image" placeholder="image" type="file"
                                    accept=".png, .jpg, .jpeg" class="input-fields">
                            </div>
                            @error('password')
                                <p class="text-red-400">{{$message}}</p>
                            @enderror
                            <div class="input-fields-wrapper @error('password') border-red-400 @enderror">
                                <input value="{{old('password')}}" name="password" placeholder="Password"
                                    type="password" class="input-fields">
                                <button class="text-[12px] mr-2">show</button>
                            </div>
                            <button class="p-2 w-full bg-blue-500 text-white text-[12px] font-bold mt-3 rounded-md">Sign
                                up
                            </button>
                        </div>
                    </form>
                    <!--  -->
                    <h6 class="text-center">OR</h6>
                    <a href="" class="text-center primary-text mt-5">Forgot Password?</a>
                </div>
                <div class="border-gray-300 border-[0.1px] py-4">
                    <p class="text-center  text-[14px]">
                        Have an account?
                        <a href="{{route('login')}}" class="primary-text">Login</a>
                    </p>
                </div>
                <div class="py-3">
                    <h4 class="text-center text-[13px]">Get the app.</h4>
                    <div class="flex items-center gap-2 justify-center mt-4">
                        <a href="https://play.google.com/store" target="_blank">
                            <img src="../resources/assets/googleplay.png" class="w-[120px] h-[40px]" alt="">
                        </a>
                        <a href="ms-windows-store://home" target="_blank">
                            <img src="../resources/assets/microsoft.png" class="w-[120px] h-[40px]" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>