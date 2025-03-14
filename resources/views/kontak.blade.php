<x-app-layout class=" top-14">
    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] flex justify-between sticky top-0">
            <div class="p-4 text-white">
                <button id="back">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </button>
                <span class="relative bottom-1 pl-3 font-bold">Pusat Bantuan</span>
            </div>
        </div>
    </x-slot>

    <div class="bg-white min-h-screen">
        <div class="">
            <div class="p-4">
                <div class="mb-8 text-center">
                    <div>
                        <h2 class="text-gray-900 font-bold mb-1">Butuh Bantuan?</h2>
                        <p class="text-gray-600 text-sm">Jangan sungkan untuk menghubungi Kami jika Anda memiliki
                            pertanyaan, kendala, atau saran tentang dhpeduli</p>
                    </div>
                </div><a href="mailto:admin@dhpeduli.org"
                    class="mb-8 p-4 rounded shadow-lg flex items-center border hover:bg-gray-100">
                    <div class="mr-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg></div>
                    <div>
                        <h3 class="text-gray-900 font-medium">Hubungi kami lewat email</h3>
                        <p class="text-gray-600 text-sm">Ajukan pertanyaan atau saranmu melalui email</p>
                    </div>
                </a>
                <a href="https://api.whatsapp.com/send?phone=6285215112369?text=Halooooooooo" target="_blank"
                    class="mb-8 p-4 rounded shadow-lg flex items-center border hover:bg-gray-100 w-full text-left">
                    <div class="mr-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-green-500">
                            <path
                                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                            </path>
                        </svg></div>
                    <div>
                        <h3 class="text-gray-900 font-medium">Hubungi kami lewat whatshapp</h3>
                        <p class="text-gray-600 text-sm">Ajukan pertanyaan atau saranmu melalui whatshapp</p>
                    </div>
                </a>
                <a href="https://www.google.com/maps/place/Pondok+Syahir/@-6.5671171,106.7450807,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69c5dccfcf0d1f:0x89b97038a279929c!8m2!3d-6.5671224!4d106.7476556!16s%2Fg%2F11ld2nt7w_?hl=en&entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                    target="_blank" rel="noreferrer" class="mt-14 block">
                    <div class="flex mb-2 text-sm">
                        <div class="mr-3"><svg width="18" fill="none" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <defs></defs>
                                <path d="M1 6v16l7-4 8 4 7-4V2l-7 4-8-4-7 4zM8 2v16M16 6v16" stroke="#323232"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></div>
                        <h3 class="text-gray-900 font-medium w-full">Alamat Kantor</h3>
                        <div class="text-blue-500 text-sm flex-shrink-0">Lihat maps</div>
                    </div>
                    <p class="text-sm leading-normal text-gray-600 mb-1">Jl. Batu Hulung No.54, RT.02/RW.01, Margajaya,
                        Kec. Bogor Barat., Kota Bogor, Jawa Barat 16116</p>
                    <p class="text-sm leading-normal text-gray-600 mb-1">Senin s/d Jumat (Pukul 08.00 - 17.00 WIB)</p>
                    <p class="text-sm leading-normal text-gray-600">Sabtu dan Minggu (Libur)</p>
                </a>
            </div>
        </div>
    </div>

</x-app-layout>