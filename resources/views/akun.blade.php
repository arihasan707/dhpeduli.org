<x-app-layout class="top-10">
    <x-slot name="header">
        <div class="bg-blue z-10 w-[100%]">
            <div class="p-4 text-white">
                <span class="relative bottom-1 pl-3 font-bold">Akun</span>
            </div>
        </div>
    </x-slot>

    <x-navbar />

    @guest
    <section class="relative top-10 min-h-screen">
        <div class="pl-4 pr-4 mb-6">
            <h2 class="text-md text-slate-500 pb-3">
                Yuk Masuk untuk nikmati kemudahan berdonasi dan akses fitur lainnya
            </h2>
            <a href="{{route('login')}}"
                class="flex justify-center bg-white border border-red-500 focus:outline-none hover:bg-red-500 hover:text-white focus:ring-4 focus:ring-gray-100 font-small rounded-lg font-bold text-md px-5 py-2.5 mb-2 text-red-500">Masuk
                Sekarang</a>
            <p class="text-sm font-light py-1 text-center text-gray-500">
                Belum punya akun? <a href="{{route('register')}}"
                    class="font-medium text-sky-500 underline text-primary-600 hover:underline">Yuk
                    daftar
                    sekarang</a>
            </p>
        </div>

        <div class="px-4 text-base font-semibold mb-3 mt-8">Seputar Dhpeduli.org</div><a
            class="flex w-full menu-mobile-item py-3 px-4 items-center transition duration-150 hover:bg-gray-100 border-b font-medium text-sm text-gray-600 "
            href="{{route('tentang')}}"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg></span>
            <div class="flex justify-between w-full items-center">Tentang Kami <svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg></div>
        </a>
        <a class="flex w-full menu-mobile-item py-3 px-4 items-center transition duration-150 hover:bg-gray-100 border-b font-medium text-sm text-gray-600 "
            href="{{route('kontak')}}"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                    </path>
                </svg></span>
            <div class="flex justify-between w-full items-center">Pusat Bantuan <svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg></div>
        </a>



        <a class="flex w-full menu-mobile-item py-3 px-4 items-center transition duration-150 hover:bg-gray-100 font-medium text-sm text-gray-600 "
            href="{{route('faq')}}"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg></span>
            <div class="flex justify-between w-full items-center">FAQ <svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg></div>
        </a>

    </section>
    @endguest
    @auth
    <div class="bg-white min-h-screen">
        <!--<div class="pb-[65px]">-->
        <div class="pb-20 pt-6">
            <div class="flex px-4 justify-between mb-4 cursor-pointer">
                <div class="flex flex-1">
                    <div class="relative  rounded-full overflow-hidden  rounded-full border shadow-sm flex-shrink-0"
                        style="width: 46px; height: 46px;">
                        <div
                            class="absolute inset-0 w-full-h-full flex items-center justify-center font-semibold uppercase bg-gray-100">
                            {{ $user->avatar }}
                        </div>
                    </div>
                    <div class="ml-2 leading-tight flex-1">
                        <div class="font-semibold text-lg">{{ $user->name }}</div>
                        <div class="text-gray-600 text-sm leading-6">
                            <div>{{ $user->email }}</div>
                        </div>
                    </div>
                </div>
                <div class="text-sm underline flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg></div>
            </div>
            <div class="px-4 text-base font-semibold mb-3">Akun Saya</div>
            <!-- <a class="transition duration-150 py-3 px-4 hover:bg-gray-100 flex items-center border-b font-medium text-sm text-gray-600"
                    href="/dashboard"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg></span>
                    <div class="flex justify-between w-full items-center">Dashboard <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg></div>
                </a> -->
            <a class="transition duration-150 py-3 px-4 hover:bg-gray-100 flex items-center border-b font-medium text-sm text-gray-600"
                href="{{route('donation',['status'=>'success'])}}"><span class="w-8 mr-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="21 8 21 21 3 21 3 8"></polyline>
                        <rect x="1" y="3" width="22" height="5"></rect>
                        <line x1="10" y1="12" x2="14" y2="12"></line>
                    </svg></span>
                <div class="flex justify-between w-full items-center">Donasi Saya <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </a>
            <!-- <a
                    class="transition duration-150 py-3 px-4 hover:bg-gray-100 flex items-center border-b font-medium text-sm text-gray-600 "
                    href="/dashboard/settings"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg></span>
                    <div class="flex justify-between w-full items-center">Pengaturan <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg></div>
                </a> -->
            <div class="px-4 text-base font-semibold mb-3 mt-8">Seputar Dhpeduli.org</div><a
                class="flex w-full menu-mobile-item py-3 px-4 items-center transition duration-150 hover:bg-gray-100 border-b font-medium text-sm text-gray-600 "
                href="{{route('tentang')}}"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                        height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg></span>
                <div class="flex justify-between w-full items-center">Tentang Kami <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </a>
            <a class="flex w-full menu-mobile-item py-3 px-4 items-center transition duration-150 hover:bg-gray-100 border-b font-medium text-sm text-gray-600 "
                href="{{route('kontak')}}"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                        height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg></span>
                <div class="flex justify-between w-full items-center">Pusat Bantuan <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </a>
            <!-- <a
                    class="flex w-full menu-mobile-item py-3 px-4 items-center transition duration-150 hover:bg-gray-100 border-b font-medium text-sm text-gray-600 "
                    href="/page/term-condition"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg"
                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg></span>
                    <div class="flex justify-between w-full items-center">Syarat &amp; Ketentuan <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg></div>
                </a> -->
            <!-- <a
                    class="flex w-full menu-mobile-item py-3 px-4 items-center transition duration-150 hover:bg-gray-100 border-b font-medium text-sm text-gray-600 "
                    href="/page/privacy"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg></span>
                    <div class="flex justify-between w-full items-center">Kebijakan Privasi <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg></div>
                </a> -->
            <a class="flex w-full menu-mobile-item py-3 px-4 items-center transition duration-150 hover:bg-gray-100 font-medium text-sm text-gray-600 "
                href="/page/faq"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg></span>
                <div class="flex justify-between w-full items-center">FAQ <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit"
                    class="w-full cursor-pointer py-3 px-4 transition duration-150 hover:bg-gray-100 text-left flex items-center font-medium text-sm mt-3 text-red-500"
                    fdprocessedid="6lqh3"><span class="w-8 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg></span>
                    <div class="flex justify-between w-full items-center">Keluar <svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg></div>
                </button>
            </form>
        </div>
        <!--</div>-->
    </div>
    @endauth

</x-app-layout>