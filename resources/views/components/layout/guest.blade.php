<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet" /> --}}
</head>

<body x-data="{ loading: true }" 
      x-init="setTimeout(() => loading = false, 1000)"
      @beforeunload.window="loading = true"
      @load.window="setTimeout(() => loading = false, 1000)">
    <!-- Loading overlay -->
    <div x-show="loading" 
        class="fixed inset-0 z-50 flex items-center justify-center bg-white"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <!-- Animasi tiga titik meloncat -->
        <div class="flex space-x-2">
            <div class="dot w-4 h-4 bg-main rounded-full animate-bounce delay-0"></div>
            <div class="dot w-4 h-4 bg-second rounded-full animate-bounce delay-200"></div>
            <div class="dot w-4 h-4 bg-third rounded-full animate-bounce delay-400"></div>
        </div>
    </div>

    <style>
        /* Menambahkan delay pada animasi */
        .animate-bounce {
            animation: bounce 0.6s infinite alternate;
        }
        .delay-0 {
            animation-delay: 0s;
        }
        .delay-200 {
            animation-delay: 0.2s;
        }
        .delay-400 {
            animation-delay: 0.4s;
        }

        /* Keyframes untuk animasi bounce */
        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-8px);
            }
        }
    </style>

    <div class="w-full bg-background">
        @include('components.layout.navigation')
        <main>
            <div class="w-full min-h-[calc(100vh-470px)]">
                {{$slot}}
            </div>
        </main>
        @include('components.layout.footer')
    </div>
</body>

    <!-- Script -->
    {{-- <script src="{{ asset('build/assets/app.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</html>
