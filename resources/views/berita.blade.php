<x-app-layout>
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

    <div class="px-4 relative top-7">
        <div class="bg-white rounded-md shadow-xl border-[1.1px]">
            <div class="p-4">
                <div class="flex items-center mb-7">
                    <img class="rounded-md" src="{{asset('backend/images/card/card-bg.jpg')}}" alt="" srcset="">
                </div>
                <span class="text-xs text-[#999999] flex gap-1 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                            clip-rule="evenodd" />
                    </svg>

                    13 Feb 2023 08:00 WIB
                </span>
                <a href="#" class="font-semibold hover:text-sky-500 text-sky-700">Tarhib Ramadhan dan
                    Do'a Bersama Penghafal Al-Qur'an </a>
                <p class="font-medium text-xs my-2">bertempat di Masjid As Sofia, telah dilaksanakan acara Tarhib
                    Ramadhan dan Doa Bersama Penghafal Al-Qur'an. Acara ini dihadiri oleh jamaah Masjid As Sofia serta..
                </p>
                <div class=" flex justify-end mt-5">
                    <a href="#" class=" text-red-600 hover:text-red-500 text-xs font-medium">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>