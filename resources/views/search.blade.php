<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | Connect</title>

    <!-- Tailwind Css & Fonts -->
    @vite('resources/css/app.css')

    <!-- Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>

<body>
    <div class="sticky top-0 bg-white shadow-sm">
        <nav class="container-width py-6 flex items-center justify-between">
            <div class="flex items-center ">
                <a class="conntect-logo-font" href="{{route('home')}}">Connect</a>
            </div>
            <div class="flex items-center justify-between gap-4">
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
                @if ($decodedUser)
                    <button class="svg-icon" id="open-modal" onclick="showModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l320 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM200 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                        </svg>
                    </button>
                @endif
                @if ($decodedUser)
                    <div class="w-[12px] lg:w-[40px] lg:h-[40px]">
                        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full object-cover"
                                src="{{asset('uploads/user/profileImage/' . $decodedUser->image) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                                alt="user photo">

                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatar"
                            class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div><span>@</span>{{  $decodedUser->username ?? 'User' }}</div>
                                <div class="font-medium truncate">{{  $decodedUser->email ?? 'No Email' }}</div>
                            </div>
                            <ul class="text-sm text-gray-700 z-50 dark:text-gray-200"
                                aria-labelledby="dropdownUserAvatarButton">
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

    <!-- Post Overlay -->
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
        <form action="{{route('post', $decodedUser->id)}}" method="post" enctype="multipart/form-data"
            id="modal-content" class="bg-gray-800 text-white grid grid-cols-2 gap-4 rounded-lg w-[60%]">
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
                        src="{{asset('uploads/user/profileImage/' . $decodedUser->image) ?? 'https://cdn.prod.website-files.com/62d84e447b4f9e7263d31e94/6399a4d27711a5ad2c9bf5cd_ben-sweet-2LowviVHZ-E-unsplash-1.jpeg'}}"
                        alt="user photo">
                    <h3>{{$decodedUser->username}}</h3>
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

    <div class="container-width flex">
        <div class="w-1/3 border-r-gray-200 border-r-[1px] space-y-2 py-10 h-[100%]">
            <div class="flex items-center justify-between">
                <h2 class="text-[14px] text-gray-500 font-bold">Suggestions For You</h2>
            </div>
            @foreach ($users as $userss)
                <a href="{{ route('profile', $userss->id) }}" class="flex items-center p-2 gap-2 cursor-pointer">
                    <img class="w-8 h-8 object-cover rounded-full"
                        src="{{ asset('uploads/user/profileImage/' . $userss->image) }}" alt="user photo">
                    <div>
                        <span class="text-[14px] font-bold">{{ $userss->fullname }}</span>
                        <p class="text-[12px] text-gray-700"><span>@</span>{{ $userss->username }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="m-10 w-full">
            <h1 class="text-2xl font-bold">Search</h1>
            <div class="border-[1px] border-gray-700 flex items-center px-4 py-2 rounded-2xl w-1/2">
                <div class="w-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </div>
                <input type="text" id="search-user" placeholder="search"
                    class="outline-none px-1 bg-transparent py-2 w-full">
            </div>
            <div id="search-results" class="mt-2"></div>
        </div>
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



    <!-- Add jQuery CDN (or install locally if needed) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Java Script -->
    <script>

        $(document).ready(function () {
            $('#search-user').on('keyup', function () {
                var query = $(this).val().trim();  // Trim any extra spaces

                // Check if the input is empty
                if (query === "") {
                    $('#search-results').html('<p>No users found.</p>'); // Clear previous results
                    return; // Do not make the AJAX request
                }

                // Perform AJAX request if query is not empty
                $.ajax({
                    url: "{{ route('search') }}", // Route for search
                    type: 'GET',
                    data: { query: query },
                    success: function (data) {
                        $('#search-results').html(""); // Clear previous results

                        if (data.length === 0) {
                            $('#search-results').append('<p>No users found.</p>');
                        } else {
                            // Display each user in search results
                            $.each(data, function (index, user) {
                                $('#search-results').append(
                                    '<div class="py-2">' +
                                    '<a href="http://localhost/dashboard/connectproject/public/profile/' + user.id + '" class="flex items-center gap-2">' +
                                    '<img src="http://localhost/dashboard/connectproject/public/uploads/user/profileImage/' + user.image + '" class="w-8 h-8 rounded-full">' +
                                    '<div class="flex flex-col">'
                                    + '<span>' + user.username + '</span>'
                                    + '<div class="flex gap-1 items-center">'
                                    + '<span>' + user.fullname + '</span>' + '<div class="w-[4px]">' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">' +
                                    '<!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->' +
                                    '<path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-352a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>' +
                                    '</svg>' +
                                    '</div>' +
                                    '<span>' + user.followers.length + ' followers' + '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>' +
                                    '</div>'
                                );
                            });
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });


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


    </script>
</body>

</html>