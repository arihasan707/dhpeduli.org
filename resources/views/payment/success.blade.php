<x-app-layout>

    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] flex justify-between sticky top-0">
            <div class="p-4 text-white">
                <button id="back">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </button>
                <span class="relative bottom-1 pl-3 font-bold">Instruksi Pembayaran</span>
            </div>
        </div>
    </x-slot>

    <div class="px-4 py-8 text-gray-600 text-center">
        <h2 class="font-bold text-xl mb-1 text-gray-900">Terima Kasih Atas Donasi Yang diberikan 😇😊</h2>
        <p class="mb-5">Jazakumullah khairan katsiran
        </p>
        <a class="block w-full py-2 px-8 my-2 text-sm border-2 border-blue text-blue rounded-md font-semibold"
            href="{{route('program')}}">Cari program kebaikan lainnya</a>
        <a href="https://api.whatsapp.com/send?phone=6282122022947&amp;text=Assalaamualaikum%20admin%20...%0A%0A%0ASumber%20info%3A%20https://www.dhpeduli.org"
            rel="noreferrer" target="_blank"
            class="block w-full py-2 px-8 my-2 text-sm border-2 border-green-500 text-green-500 rounded-md font-semibold">Hubungi
            Admin Dhpeduli
        </a>
    </div>

    <div class="p-4 border-t-8 border-gray-100">
        <div class="p-4">
            <p class="text-gray-600 text-center text-sm">Yuk jadi <strong
                    class="text-orange-500">#PejuangAlquran</strong>
                dengan bantu <strong>Daarul Huffadz Peduli</strong> mencapai targetnya</p>
            <!-- <button
                class="flex items-center justify-center text-sm px-2 py-3 font-semibold rounded-md text-white text-center flex-1 mt-4 bg-red-400 w-full"
                fdprocessedid="80kyze"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="mr-2">
                    <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                    <polyline points="16 6 12 2 8 6"></polyline>
                    <line x1="12" y1="2" x2="12" y2="15"></line>
                </svg>Bagikan Program Ini</button> -->
            <a class="flex items-center justify-center mt-2 text-sm p-2 rounded-md text-orange-500 font-bold border-2 text-center flex-1 border-orange-500"
                href="{{route('program')}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="mr-2 text-orange-400">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>Lihat Program Lainnya</a>
        </div>
    </div>
    <x-footer />


</x-app-layout>