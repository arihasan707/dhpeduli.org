<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '960391952837738', {
            autoConfig: false,
            debug: false
        });
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=960391952837738&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="facebook-domain-verification" content="1nkdm2m5z62vn05fmxxb1sjvlyzbv5" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Bersama tangan peduli lahirkan Generasi Qur'ani">
    <meta name="author" content="Daarul Huffadz Peduli">
    <meta name="keywords"
        content="Donasi Al-Qur'an, Galang Dana, Filantropi, Wakaf pesantren, Tahfidz qur'an, Infak, Zakat, Sedekah, Wakaf, Pondok Tahfidz ">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Default -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.5.2-web/css/all.css')}}">

    <!-- swiper -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="icon" href="{{ asset('img/icon.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

</head>

<body class="max-w-[430px] ml-auto mr-auto w-[100%] bg-slate-100">

    @isset($navbar)
    <nav
        class="bg-white font-medium w-[100%] max-w-[430px] h-[60px] fixed rounded-t-lg flex shadow-[-2px_3px_28px_#CCC] z-30 bottom-0 pb-4">
        {{ $navbar }}
    </nav>
    @else
    <nav class="bg-white font-medium w-[100%] max-w-[430px] h-[55px] fixed rounded-t-lg flex bottom-0 z-0 ">
    </nav>
    @endisset

    <!-- Page Heading -->
    @isset($header)
    <header class="max-w-[430px] w-[100%] bg-white flex justify-between z-50 border-solid fixed">
        {{ $header }}
    </header>
    @endisset

    <!-- Page Content -->
    <main {{ $attributes->merge(['class' => 'bg-white min-h-screen relative top-10']) }}>
        {{ $slot }}
    </main>


    @stack('scripts')

    <script>
        let back = document.getElementById('back');
        back.addEventListener('click', function() {
            history.back()
        });
    </script>

</body>

</html>