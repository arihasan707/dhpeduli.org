<x-app-layout>

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
    /* CSS Code */
    .swiper-wrapper {
        width: 100%;
        height: max-content !important;
        -webkit-transition-timing-function: linear !important;
        transition-timing-function: linear !important;
        position: relative;
    }

    .swiper-pagination-bullet {
        background: #4f46e5;
    }
    </style>
    @endpush

    <x-slot name="header">
        <div class="pl-4 pb-2 pt-[10px] max-w-[120px] p-1">
            <a href="{{route('home.index')}}">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="pt-3 pr-3 text-lg text-slate-50 w-[240px]">
            <form action="{{route('search')}}" method="GET">
                <input name="prog"
                    class="w-[100%] shadow-lg p-[3.5px] border-transparent focus:border-transparent focus:ring-0 border-none relative focus:border-blue pla text-[14px] text-gray-900 pl-3 placeholder-slate-400 rounded-xl"
                    placeholder="Bantu sesama, cari donasi...">
                <button type="submit" class="absolute"><i
                        class="fa-solid relative right-7 top-[0.6px] fa-magnifying-glass text-md text-blue"></i></button>
            </form>
        </div>
    </x-slot>

    <x-navbar />

    <!--swipper-->
    <div class="w-full relative pt-6">
        <x-part.carousel />
    </div>

    <x-part.program-carousel class="pt-3">
        <x-slot:title>
            <div>Bangun Pusat Peradaban</div>
        </x-slot:title>
        @foreach ($program as $row)
        <x-part.card-program>
            <a href="{{ route('detail',$row->slug) }}">
                <img src="{{asset('upload/' . $row->img)}}" class="relative rounded-t-lg" alt="...">
                <div class="px-3 pt-3">
                    <p class="text-[9px]">Daarul Huffadz Peduli <i class="fa fa-check-circle text-sky-500"></i>
                    </p>
                    <h2 class="text-[12px] font-bold">{{ Str::limit($row->judul,55) }}</h2>
                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-3">
                        <div class="bg-red-600 h-1 rounded-full"
                            style="width:{{ $row->terkumpul / $row->kebutuhan * 100 }}%;"></div>
                    </div>
                </div>
                <div class="pb-4 pt-1 px-3 flex justify-between">
                    <div>
                        <p class="text-[10px] font-light">Donasi Terkumpul</p>
                        <p class="text-[12px] font-bold leading-3">@rupiah($row->terkumpul)</p>
                    </div>
                    <div>
                        <p class="text-[10px]">Sisa Waktu</p>
                        @if ($row->waktu == NULL)
                        <p class="text-[12px] font-bold text-right leading-3"><i class="fa fa-infinity"></i></p>
                        @else
                        <p class="text-[12px] font-bold text-right leading-3">
                            {{ selisihWaktu($row->waktu) }}
                        </p>
                        @endif
                    </div>
                </div>
            </a>
        </x-part.card-program>
        @endforeach
    </x-part.program-carousel>

    <x-part.kategori-populer :$kategori>
        <x-slot:title>
            <div class="mt-3">Kategori Populer</div>
        </x-slot:title>
    </x-part.kategori-populer>

    <x-part.program-list :$program>
        <x-slot name="subHeading">
            <div class="pl-4 pt-5">
                <h2 class="font-bold text-sky-600">Yuk Berbagi</h2>
            </div>
        </x-slot>
        <x-slot name="lainnya">
            <div class="pl-4 pt-4 pr-4">
                <a href="{{route('program')}}">
                    <div class="w-100 bg-sky-500 h-9 rounded-md flex items-center justify-center">
                        <p class=" text-md font-medium text-white">Lihat Semua Program</p>
                    </div>
                </a>
            </div>
        </x-slot>
    </x-part.program-list>



    <x-footer />

    @push('scripts')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
    });
    </script>

    <script>
    var swiper = new Swiper(".default-carousel", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 2100,
            disableOnInteraction: false,
        },
    });
    </script>

    @endpush

</x-app-layout>