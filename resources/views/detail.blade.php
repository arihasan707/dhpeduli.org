<x-detail-program>

    @push('styles')
    <style>
        .content-clipper {
            max-height: 300px;
            overflow: hidden;
            position: relative;
        }

        .content-clipper::after {
            content: " ";
            width: 100%;
            height: 200px;
            position: absolute;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(hsla(0, 0%, 100%, 0), #fff);
        }

        .content-clipper-lg {
            max-height: 300px;
            overflow: hidden;
            position: relative;
        }

        .content-clipper-lg::after {
            content: " ";
            width: 100%;
            height: 200px;
            position: absolute;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(hsla(0, 0%, 100%, 0), #fff);
        }

        .fill-current {
            color: red;
        }

        .news-item:before {
            content: " ";
            position: absolute;
            width: 18px;
            height: 18px;
            background-color: #fff;
            border-radius: 100%;
            top: 0;
            left: 0;
            z-index: 3;
            border: 4px solid #fff !important;
            background: #ff2d20 !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .08);
        }

        .news-item:not(:last-child):after {
            content: " ";
            position: absolute;
            top: 0;
            left: 9px;
            bottom: 0;
            width: 1px;
            background-color: #e3e3e3;
        }

        .news-item {
            padding-left: 30px;
        }
    </style>

    @endpush

    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] justify-between sticky top-0 scroll" style="display: none;">
            <div class="p-4 text-white">
                <button class="backTo">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </button>
                <span class="relative bottom-1 pl-3 font-bold">{{ $judulHeader }}</span>
            </div>
        </div>
        <div class="max-w-[430px] z-10 w-[100%] absolute">
            <div class="px-3 py-2" style="background-image: linear-gradient(rgba(0,0,0,.6),transparent);">
                <button class="backTo">
                    <div class="bg-white w-8 rounded-full p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </x-slot>

    <x-slot name="navbar">
        <nav
            class="bg-white font-medium w-[100%] max-w-[430px] h-[55px] fixed rounded-t-lg flex bottom-0 px-4 py-2 gap-3 z-40">
            <!-- <button
                class="text-blue outline outline-1 outline-blue hover:bg-sky-700 focus:outline-none hover:text-white focus:ring-blue font-medium rounded-md text-sm px-5 py-2 text-center">
                Bagikan
            </button> -->
            <a href="{{route('donasi',$program->slug)}}"
                class="text-white bg-blue px-5 py-2 hover:bg-sky-700 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm text-center w-full">Donasi
                Sekarang</a>
        </nav>
    </x-slot>

    <div class="bagikan fixed bottom-0 z-[1001]" style="display: none;">
        <div class="max-w-[430px]">
            <div class="bg-white rounded-t-lg p-4">
                <h2 class="font-bold mb-4 flex justify-between"><span>Bagikan Program</span>
                    <button id='x' fdprocessedid="fvwvu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </h2>
                <div class="flex flex-wrap text-sm text-gray-600"><button aria-label="facebook"
                        class="react-share__ShareButton w-1/4 flex flex-col items-center justify-center p-2"
                        fdprocessedid="d3r1f9"><svg viewBox="0 0 64 64" width="36" height="36">
                            <rect width="64" height="64" rx="10" ry="10" fill="#3b5998"></rect>
                            <path
                                d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z"
                                fill="white"></path>
                        </svg><span class="mt-2">Facebook</span></button><button aria-label="twitter"
                        class="react-share__ShareButton w-1/4 flex flex-col items-center justify-center p-2"
                        fdprocessedid="fb776"><svg viewBox="0 0 64 64" width="36" height="36">
                            <rect width="64" height="64" rx="10" ry="10" fill="#00aced"></rect>
                            <path
                                d="M48,22.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6 C41.7,19.8,40,19,38.2,19c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5c-5.5-0.3-10.3-2.9-13.5-6.9c-0.6,1-0.9,2.1-0.9,3.3 c0,2.3,1.2,4.3,2.9,5.5c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1c2.9,1.9,6.4,2.9,10.1,2.9c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C46,24.5,47.1,23.4,48,22.1z"
                                fill="white"></path>
                        </svg><span class="mt-2">Twitter</span></button><button aria-label="whatsapp"
                        class="react-share__ShareButton w-1/4 flex flex-col items-center justify-center p-2"
                        fdprocessedid="zy2di"><svg viewBox="0 0 64 64" width="36" height="36">
                            <rect width="64" height="64" rx="10" ry="10" fill="#25D366"></rect>
                            <path
                                d="m42.32286,33.93287c-0.5178,-0.2589 -3.04726,-1.49644 -3.52105,-1.66732c-0.4712,-0.17346 -0.81554,-0.2589 -1.15987,0.2589c-0.34175,0.51004 -1.33075,1.66474 -1.63108,2.00648c-0.30032,0.33658 -0.60064,0.36247 -1.11327,0.12945c-0.5178,-0.2589 -2.17994,-0.80259 -4.14759,-2.56312c-1.53269,-1.37217 -2.56312,-3.05503 -2.86603,-3.57283c-0.30033,-0.5178 -0.03366,-0.80259 0.22524,-1.06149c0.23301,-0.23301 0.5178,-0.59547 0.7767,-0.90616c0.25372,-0.31068 0.33657,-0.5178 0.51262,-0.85437c0.17088,-0.36246 0.08544,-0.64725 -0.04402,-0.90615c-0.12945,-0.2589 -1.15987,-2.79613 -1.58964,-3.80584c-0.41424,-1.00971 -0.84142,-0.88027 -1.15987,-0.88027c-0.29773,-0.02588 -0.64208,-0.02588 -0.98382,-0.02588c-0.34693,0 -0.90616,0.12945 -1.37736,0.62136c-0.4712,0.5178 -1.80194,1.76053 -1.80194,4.27186c0,2.51134 1.84596,4.945 2.10227,5.30747c0.2589,0.33657 3.63497,5.51458 8.80262,7.74113c1.23237,0.5178 2.1903,0.82848 2.94111,1.08738c1.23237,0.38836 2.35599,0.33657 3.24402,0.20712c0.99159,-0.15534 3.04985,-1.24272 3.47963,-2.45956c0.44013,-1.21683 0.44013,-2.22654 0.31068,-2.45955c-0.12945,-0.23301 -0.46601,-0.36247 -0.98382,-0.59548m-9.40068,12.84407l-0.02589,0c-3.05503,0 -6.08417,-0.82849 -8.72495,-2.38189l-0.62136,-0.37023l-6.47252,1.68286l1.73463,-6.29129l-0.41424,-0.64725c-1.70875,-2.71846 -2.6149,-5.85116 -2.6149,-9.07706c0,-9.39809 7.68934,-17.06155 17.15993,-17.06155c4.58253,0 8.88029,1.78642 12.11655,5.02268c3.23625,3.21036 5.02267,7.50812 5.02267,12.06476c-0.0078,9.3981 -7.69712,17.06155 -17.14699,17.06155m14.58906,-31.58846c-3.93529,-3.80584 -9.1133,-5.95471 -14.62789,-5.95471c-11.36055,0 -20.60848,9.2065 -20.61625,20.52564c0,3.61684 0.94757,7.14565 2.75211,10.26282l-2.92557,10.63564l10.93337,-2.85309c3.0136,1.63108 6.4052,2.4958 9.85634,2.49839l0.01037,0c11.36574,0 20.61884,-9.2091 20.62403,-20.53082c0,-5.48093 -2.14111,-10.64081 -6.03239,-14.51915"
                                fill="white"></path>
                        </svg><span class="mt-2">Whatsapp</span></button><button aria-label="telegram"
                        class="react-share__ShareButton w-1/4 flex flex-col items-center justify-center p-2"
                        fdprocessedid="bl8okm"><svg viewBox="0 0 64 64" width="36" height="36">
                            <rect width="64" height="64" rx="10" ry="10" fill="#37aee2"></rect>
                            <path
                                d="m45.90873,15.44335c-0.6901,-0.0281 -1.37668,0.14048 -1.96142,0.41265c-0.84989,0.32661 -8.63939,3.33986 -16.5237,6.39174c-3.9685,1.53296 -7.93349,3.06593 -10.98537,4.24067c-3.05012,1.1765 -5.34694,2.05098 -5.4681,2.09312c-0.80775,0.28096 -1.89996,0.63566 -2.82712,1.72788c-0.23354,0.27218 -0.46884,0.62161 -0.58825,1.10275c-0.11941,0.48114 -0.06673,1.09222 0.16682,1.5716c0.46533,0.96052 1.25376,1.35737 2.18443,1.71383c3.09051,0.99037 6.28638,1.93508 8.93263,2.8236c0.97632,3.44171 1.91401,6.89571 2.84116,10.34268c0.30554,0.69185 0.97105,0.94823 1.65764,0.95525l-0.00351,0.03512c0,0 0.53908,0.05268 1.06412,-0.07375c0.52679,-0.12292 1.18879,-0.42846 1.79109,-0.99212c0.662,-0.62161 2.45836,-2.38812 3.47683,-3.38552l7.6736,5.66477l0.06146,0.03512c0,0 0.84989,0.59703 2.09312,0.68132c0.62161,0.04214 1.4399,-0.07726 2.14229,-0.59176c0.70766,-0.51626 1.1765,-1.34683 1.396,-2.29506c0.65673,-2.86224 5.00979,-23.57745 5.75257,-27.00686l-0.02107,0.08077c0.51977,-1.93157 0.32837,-3.70159 -0.87096,-4.74991c-0.60054,-0.52152 -1.2924,-0.7498 -1.98425,-0.77965l0,0.00176zm-0.2072,3.29069c0.04741,0.0439 0.0439,0.0439 0.00351,0.04741c-0.01229,-0.00351 0.14048,0.2072 -0.15804,1.32576l-0.01229,0.04214l-0.00878,0.03863c-0.75858,3.50668 -5.15554,24.40802 -5.74203,26.96472c-0.08077,0.34417 -0.11414,0.31959 -0.09482,0.29852c-0.1756,-0.02634 -0.50045,-0.16506 -0.52679,-0.1756l-13.13468,-9.70175c4.4988,-4.33199 9.09945,-8.25307 13.744,-12.43229c0.8218,-0.41265 0.68483,-1.68573 -0.29852,-1.70681c-1.04305,0.24584 -1.92279,0.99564 -2.8798,1.47502c-5.49971,3.2626 -11.11882,6.13186 -16.55882,9.49279c-2.792,-0.97105 -5.57873,-1.77704 -8.15298,-2.57601c2.2336,-0.89555 4.00889,-1.55579 5.75608,-2.23009c3.05188,-1.1765 7.01687,-2.7042 10.98537,-4.24067c7.94051,-3.06944 15.92667,-6.16346 16.62028,-6.43037l0.05619,-0.02283l0.05268,-0.02283c0.19316,-0.0878 0.30378,-0.09658 0.35471,-0.10009c0,0 -0.01756,-0.05795 -0.00351,-0.04566l-0.00176,0zm-20.91715,22.0638l2.16687,1.60145c-0.93418,0.91311 -1.81743,1.77353 -2.45485,2.38812l0.28798,-3.98957"
                                fill="white"></path>
                        </svg><span class="mt-2">Telegram</span></button><button aria-label="line"
                        class="react-share__ShareButton w-1/4 flex flex-col items-center justify-center p-2"
                        fdprocessedid="ozncm"><svg viewBox="0 0 64 64" width="36" height="36">
                            <rect width="64" height="64" rx="10" ry="10" fill="#00b800"></rect>
                            <path
                                d="M52.62 30.138c0 3.693-1.432 7.019-4.42 10.296h.001c-4.326 4.979-14 11.044-16.201 11.972-2.2.927-1.876-.591-1.786-1.112l.294-1.765c.069-.527.142-1.343-.066-1.865-.232-.574-1.146-.872-1.817-1.016-9.909-1.31-17.245-8.238-17.245-16.51 0-9.226 9.251-16.733 20.62-16.733 11.37 0 20.62 7.507 20.62 16.733zM27.81 25.68h-1.446a.402.402 0 0 0-.402.401v8.985c0 .221.18.4.402.4h1.446a.401.401 0 0 0 .402-.4v-8.985a.402.402 0 0 0-.402-.401zm9.956 0H36.32a.402.402 0 0 0-.402.401v5.338L31.8 25.858a.39.39 0 0 0-.031-.04l-.002-.003-.024-.025-.008-.007a.313.313 0 0 0-.032-.026.255.255 0 0 1-.021-.014l-.012-.007-.021-.012-.013-.006-.023-.01-.013-.005-.024-.008-.014-.003-.023-.005-.017-.002-.021-.003-.021-.002h-1.46a.402.402 0 0 0-.402.401v8.985c0 .221.18.4.402.4h1.446a.401.401 0 0 0 .402-.4v-5.337l4.123 5.568c.028.04.063.072.101.099l.004.003a.236.236 0 0 0 .025.015l.012.006.019.01a.154.154 0 0 1 .019.008l.012.004.028.01.005.001a.442.442 0 0 0 .104.013h1.446a.4.4 0 0 0 .401-.4v-8.985a.402.402 0 0 0-.401-.401zm-13.442 7.537h-3.93v-7.136a.401.401 0 0 0-.401-.401h-1.447a.4.4 0 0 0-.401.401v8.984a.392.392 0 0 0 .123.29c.072.068.17.111.278.111h5.778a.4.4 0 0 0 .401-.401v-1.447a.401.401 0 0 0-.401-.401zm21.429-5.287c.222 0 .401-.18.401-.402v-1.446a.401.401 0 0 0-.401-.402h-5.778a.398.398 0 0 0-.279.113l-.005.004-.006.008a.397.397 0 0 0-.111.276v8.984c0 .108.043.206.112.278l.005.006a.401.401 0 0 0 .284.117h5.778a.4.4 0 0 0 .401-.401v-1.447a.401.401 0 0 0-.401-.401h-3.93v-1.519h3.93c.222 0 .401-.18.401-.402V29.85a.401.401 0 0 0-.401-.402h-3.93V27.93h3.93z"
                                fill="white"></path>
                        </svg><span class="mt-2">Line</span></button><button aria-label="linkedin"
                        class="react-share__ShareButton w-1/4 flex flex-col items-center justify-center p-2"
                        fdprocessedid="9irqv"><svg viewBox="0 0 64 64" width="36" height="36">
                            <rect width="64" height="64" rx="10" ry="10" fill="#007fb1"></rect>
                            <path
                                d="M20.4,44h5.4V26.6h-5.4V44z M23.1,18c-1.7,0-3.1,1.4-3.1,3.1c0,1.7,1.4,3.1,3.1,3.1 c1.7,0,3.1-1.4,3.1-3.1C26.2,19.4,24.8,18,23.1,18z M39.5,26.2c-2.6,0-4.4,1.4-5.1,2.8h-0.1v-2.4h-5.2V44h5.4v-8.6 c0-2.3,0.4-4.5,3.2-4.5c2.8,0,2.8,2.6,2.8,4.6V44H46v-9.5C46,29.8,45,26.2,39.5,26.2z"
                                fill="white"></path>
                        </svg><span class="mt-2">LinkedIn</span></button><button aria-label="email"
                        class="react-share__ShareButton w-1/4 flex flex-col items-center justify-center p-2"
                        fdprocessedid="idtj4j"><svg viewBox="0 0 64 64" width="36" height="36">
                            <rect width="64" height="64" rx="10" ry="10" fill="#7f7f7f"></rect>
                            <path
                                d="M17,22v20h30V22H17z M41.1,25L32,32.1L22.9,25H41.1z M20,39V26.6l12,9.3l12-9.3V39H20z"
                                fill="white"></path>
                        </svg><span class="mt-2">Email</span></button><button title="" type="button"
                        class="w-1/4 flex flex-col items-center justify-center p-2"
                        data-clipboard-text="https://www.amalsholeh.com/bangunmasjid-terapunguntuk-minoritas-muslimcamkamboja?ref=RVnRQ"
                        fdprocessedid="ni8f8j">
                        <div class="bg-gray-200 flex items-center justify-center"
                            style="width: 36px; height: 36px; border-radius: 5px;"><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-gray-600">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg></div><span class="mt-2">Salin URL</span>
                    </button></div>
            </div>
        </div>
    </div>


    <div>
        <img src="{{ asset('upload/' . $program->img) }}">
    </div>

    <div x-data="{open: false}">
        <div class="w-full p-4 flex flex-col">
            <h2 class="text-lg font-semibold leading-normal overflow-hidden">{{$program->judul}}</h2>
            <p class="text-gray-600 text-sm mt-2">{{ $program->desc_singkat }}</p>
            <div class="flex items-end mt-6">
                <div class="flex-1">
                    <div class="text-sm text-gray-600 inline-flex items-center gap-2">
                        Dana terkumpul</div>
                    <div class="text-red-600 font-semibold text-lg">@rupiah($program->terkumpul)</div>
                </div>
                <button x-on:click="open = !open" class="text-sm flex items-center text-slate-500">Selengkapnya<svg
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </div>
            <span x-show="open" x-transition>
                <div class="bg-slate-50 -mx-4 -mb-4 p-4 mt-2 border-t border-b">
                    <div class="text-sm text-gray-600">Terkumpul</div>
                    <div class="text-gray-800 font-semibold text-lg">{{ number_format($terkumpul)}}%
                        <span class="text-sm font-normal text-gray-600">dari
                            <strong>@rupiah($program->kebutuhan)</strong></span>
                    </div>
                    <div class="flex justify-between items-center mt-auto">
                        <div class="text-sm text-gray-600"></div>
                    </div>
                    <div class="program-collected mb-2 mt-2">
                        <div class="program-collected__bar bg-gray-200 w-full h-[6px] rounded overflow-hidden">
                            <div style="width:{{$terkumpul}}%;" class="h-[6px]
                      bg-red-500
                    "></div>
                        </div>
                    </div>
                    <div class="text-sm text-gray-600 font-medium flex justify-between items-center">
                        <div class="flex-1 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg> <strong>{{ $countDonasi }}</strong> Donatur</div>
                        <div class="flex-shrink-0">
                            @if ($program->waktu == NULL)
                            <p class="text-[12px] font-bold text-right leading-3"><i class="fa fa-infinity"></i></p>
                            @else
                            <p class="text-[12px] font-bold text-right leading-3">{{selisihWaktu($program->waktu)}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </span>
        </div>
    </div>

    <div class="p-4 border-t-8 border-gray-100">
        <h3 class="font-bold mb-3 text-sm">Info Lembaga</h3>
        <a href="{{route('tentang')}}">
            <div class="flex items-center">
                <div class="flex-shrink-0 mr-5">
                    <div class="relative rounded-full overflow-hidden  mt-0 w-10 h-10 leading-none border"
                        style="width:45px;height:45px">
                        <img class="absolute inset-0 w-full h-full" src="{{asset('img/log.png')}}"
                            alt="Daarul Huffadz Peduli">
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-gray-900 font-semibold leading-none text-xs mb-2">Daarul Huffadz Peduli</h3>
                    <div class="inline-flex items-center text-sky-700 bg-sky-100 rounded-full py-1 px-2"><span
                            class="mr-2"><svg width="12" height="12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                                <path d="m4 7.5 3 3L12.5 5" stroke="#fff" stroke-width="1.5"></path>
                            </svg></span>
                        <div class="text-[11px]">Akun Terverifikasi</div>
                    </div>
                </div>
                <div class="text-gray-900"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg></div>
            </div>
        </a>
    </div>

    <div class="p-4 border-t-8 border-gray-100 relative">
        <h3 class="font-bold mb-3 text-sm">Tentang program</h3>
        <div class="text-gray-600 leading-relaxed text-sm">
            <div class="content content-clipper">
                {!! $program->detail_program !!}
            </div>
            <div class="text-center pt-8">
                <button type="button"
                    class="bg-red-100 hover:bg-red-200 text-red-600 font-semibold py-2 px-4 text-sm rounded-xl"
                    id="tentang">Selengkapnya</button>
            </div>
            <div class="border border-blue-300 bg-blue-100 p-3 mt-8 text-gray-600 text-xs"><strong
                    class="text-gray-600">Disclaimer :</strong> Informasi, opini dan foto yang ada di halaman galang
                dana ini adalah milik dan tanggung jawab penggalang dana. Jika ada masalah/kecurigaan silakan <a
                    class="text-red-600 font-semibold" href="http://">lapor kepada kami disini.</a>.</div>
        </div>
    </div>

    @if ($berita === false)
    <div class="p-4 border-t-8 border-gray-100 relative" id="news">
        <div class="flex items-center justify-between mb-8">
            <h3 class="font-bold text-sm flex-1">Berita Terbaru</h3>
        </div>
        <div id="news-list">
            <div class="text-center"><img src="{{asset('img/paper-logo.png')}}" width="55" alt="belum ada berita"
                    class="mx-auto mb-6 w-20">
                <h3 class="font-semibold mb-2 leading-none">Belum ada berita</h3>
                <p class="text-gray-600 text-sm my-0">Lembaga belum membuat berita terbaru</p>
            </div>
        </div>
    </div>
    @else
    <div class="p-4 border-t-8 border-gray-100 relative" id="news">
        <div class="flex items-center justify-between mb-8">
            <h3 class="font-bold text-sm flex-1">Berita Terbaru</h3><a
                class="text-darkblue-500 hover:text-darkblue-700 font-medium text-sm flex items-center"
                href="/sedekah-untuk-berbuka-puasa-senin-kamis/news?utm=list_program">Lihat Semua <svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg></a>
        </div>
        <div id="news-list">
            <div class="content content-clipper-lg ">
                <div class="news-item pb-5 relative">
                    <div class="">
                        <p class="text-sm text-gray-600 mb-1">27 Dec 2024</p>
                        <p class="font-semibold mb-3 text-sm">{{ $berita->judul }}</p>
                        <div class="content leading-relaxed text-gray-600 text-sm">
                            {!! $berita->ket !!}
                        </div>
                    </div>
                </div>
                <div class="text-center"><a
                        class="text-darkblue-500 font-medium text-sm flex items-center justify-center"
                        href="/sedekah-untuk-berbuka-puasa-senin-kamis/news?utm=list_program">Lihat Semua Berita<svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="ml-1">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg></a></div>
            </div>
            <div class="text-center pt-8"><button id="berita" type="button"
                    class="bg-red-100 hover:bg-red-200 text-red-600  font-semibold py-2 px-4 text-sm rounded-xl">Selengkapnya</button>
            </div>
        </div>
    </div>
    @endif


    <div class="p-4 border-t-8 border-gray-100 relative">
        <div class="flex items-center justify-between mb-8">
            <h3 class="font-bold text-sm flex-1">Donatur</h3><a
                class="text-darkblue-500 hover:text-darkblue-700 font-medium text-sm flex items-center"
                href="{{route('donatur',[$program->slug,'slug'=> $program->slug , 'filter'=>'latest'])}}">Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg></a>
        </div>
        <div id="donatur-list">
            <div>

                @if ($donasi->count() == 0)
                <div class="relative text-center text-xs">
                    <p class="font-medium">Belum ada donatur</p>
                    <p>Ayo jadi yang pertama menjadi donatur!</p>
                </div>
                @endif

                @foreach ($donasi as $row)

                <div class="mb-6 relative">
                    <div class="flex items-center">
                        <div class="relative  rounded-full overflow-hidden  mt-0 w-10 h-10 mr-5 leading-none"
                            style="width: 48px; height: 48px;">
                            <div
                                class="absolute inset-0 w-full-h-full flex items-center justify-center font-semibold uppercase bg-gray-100">
                                {{ avatarNama($row->anonim,$row->nama) }}
                            </div>
                        </div>
                        <div class="text-sm flex-1">
                            <div class="flex items-top">
                                <div class="mr-2">
                                    <p class="font-semibold mb-1 leading-none text-sm">
                                        {{ nama($row->anonim,$row->nama) }}
                                    </p>
                                    <p class="text-gray-500 text-sm">
                                        {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                                <p class="text-gray-600 font-normal text-xs ml-auto"><span
                                        class="font-semibold">@rupiah($row->amount)</span></p>
                            </div>
                        </div>
                    </div>
                    @if ($row->pesan != NULL )
                    <div class="flex">
                        <div class="border shadow-sm mt-4 w-full rounded-xl">
                            <div class="p-4 text-gray-500 text-sm">{{ $row->pesan }}</div>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script>
        let kebutuhan = '{{$program->kebutuhan}}'
        let terkumpul = '{{$program->terkumpul}}'
        let tipe_waktu = '{{$program->tipe_waktu}}'
        let waktu = '{{selisihWaktu($program->waktu)}}'


        if (tipe_waktu == 0) {
            waktu = '{{$program->waktu}}'
        }

        waktu = waktu.replace('hari', '')

        if (kebutuhan == terkumpul || waktu == 0) {
            $('nav a').addClass('cursor-not-allowed')
            $('nav a').text('Program telah berakhir')
            $('nav a').removeAttr('href')
        }

        if (waktu == '') {
            $('nav a').removeClass('cursor-not-allowed opacity-30')
            $('nav a').text('Donasi Sekarang')
            $('nav a').attr('href', "{{route('donasi',$program->slug)}}")
            if (kebutuhan == terkumpul) {
                $('nav a').addClass('cursor-not-allowed')
                $('nav a').text('Program telah berakhir')
                $('nav a').removeAttr('href')
            }
        }

        let scroll = $('.scroll');

        $(document).ready(function() {
            $(window).on('scroll', function() {
                if (pageYOffset > 280) {
                    scroll.show()
                } else
                    scroll.hide()
            })

            $('#tentang').on('click', function() {
                $(this).closest('div').remove();
                $('.content').removeClass('content-clipper');
            })

            $('#berita').on('click', function() {
                $(this).closest('div').remove();
                $('.content').removeClass('content-clipper-lg');
            })

            $('nav button').on('click', function() {
                $('.bagikan').show();
                $('body').append(
                    ' <div class="fixed overlay inset-0 bg-gray-900 bg-opacity-50 z-[1000]"></div>')
            })

            $('#x').on('click', function() {
                $('.bagikan').hide();
                $('.overlay').remove()
            })

            $('.like').on('click', function() {
                $(this).removeClass('hover:border-red-500');
                $(this).removeClass('hover:text-red-500');
                $(this).children().addClass('fill-current');
                $(this).addClass('border-red-500');
                $(this).addClass('text-red-500');
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{route('like')}}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                    },
                    success: function(response) {

                    }
                });

                $(this).off('click')
            });

            $('.backTo').on('click', function() {
                window.location.href = "{{route('program')}}"
            })

        });
    </script>

    @endpush


</x-detail-program>