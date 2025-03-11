<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jsvectormap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/quill.snow.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>

    <!-- Sign In -->
    <div class="bg-white dark:bg-[#0a0e19] py-[40px] md:py-[60px] lg:py-[95px]">
        <div class="mx-auto px-[12.5px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1255px]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[25px] items-center">
                <div class="xl:mr-[25px] 2xl:mr-[45px]rounded-[25px] order-2 lg:order-1">
                    <img src="{{ asset('assets/images/sign-in.jpg') }}" alt="sign-in-image" class="rounded-[25px]">
                </div>
                <div class="xl:pl-[90px]2xl:pl-[120px] order-1 lg:order-2">
                    {{-- <img src="assets/images/logo-big.svg" alt="logo" class="inline-block dark:hidden">
                    <img src="assets/images/white-logo-big.svg" alt="logo" class="hidden dark:inline-block"> --}}
                    <div class="my-[17px] md:my-[25px]">
                        <h1 class="font-semibold text-[22px] md:text-xl lg:text-2xl mb-[5px] md:mb-[7px]">
                            Welcome back to {{ config('app.name') }}!
                        </h1>
                    </div>

                    <x-errors />

                    <form action="{{ route('login') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="mb-[15px] relative">
                            <label class="mb-[10px] md:mb-[12px] text-black dark:text-white font-medium block">
                                Email Address
                            </label>
                            <input type="text"
                                class="h-[55px] rounded-md text-black dark:text-white border border-gray-200 dark:border-[#172036] bg-white dark:bg-[#0c1427] px-[17px] block w-full outline-0 transition-all placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:border-primary-500"
                                name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="mb-[15px] relative" id="passwordHideShow">
                            <label class="mb-[10px] md:mb-[12px] text-black dark:text-white font-medium block">
                                Password
                            </label>
                            <input type="password"
                                class="h-[55px] rounded-md text-black dark:text-white border border-gray-200 dark:border-[#172036] bg-white dark:bg-[#0c1427] px-[17px] block w-full outline-0 transition-all placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:border-primary-500"
                                id="password" name="password" placeholder="Masukkan Password">
                            <button
                                class="absolute text-lg right-[20px] bottom-[12px] transition-all hover:text-primary-500"
                                id="toggleButton" type="button">
                                <i class="ri-eye-off-line"></i>
                            </button>
                        </div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="text-gray-500 dark:text-white">Remember me</label>
                        <button type="submit"
                            class="md:text-md block w-full text-center transition-all rounded-md font-medium mt-[20px] md:mt-[25px] py-[12px] px-[25px] text-white bg-primary-500 hover:bg-primary-400">
                            <span class="flex items-center justify-center gap-[5px]">
                                <i class="material-symbols-outlined">
                                    login
                                </i>
                                Sign In
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sign In -->


    <!-- Links Of JS File -->
    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/fslightbox.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/prism.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('assets/js/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @if (Session::has('error'))
        <script type="module">
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ Session::get('error') }}',
            })
        </script>
    @endif
</body>

</html>
