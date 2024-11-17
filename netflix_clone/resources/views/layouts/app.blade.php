<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Netflix Clone')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    @vite('resources/css/app.css')
</head>
<body class="bg-black text-white">
    @include('layouts.navbar') <!-- تضمين الناف بار -->
    <main class="p-8">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3, // عدد العناصر الظاهرة
                spaceBetween: 20, // المسافة بين العناصر
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                loop: true, // التمرير بشكل دائري
            });
        });
    </script>
    
</body>
</html>
