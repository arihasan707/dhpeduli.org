<x-app-layout>

    @push('styles')
    <x-pixel track="Lead" />
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
        data-client-key="<?= config('midtrans.clientKey') ?>"></script>
    @endpush


    <div id="slug" data-slug="{{$slug}}"></div>
    <div id="kode" data-kode="{{$donasi->kode}}"></div>
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

    <div class="p-4 text-gray-600">
        <p class="mb-4 text-center font-bold pt-3">Silahkan klik link dibawah ini jika pembayaran <br> tidak terbuka
            secara
            otomatis</p>
        <button id="pay"
            class="w-full text-sm py-2 px-4 border hover:bg-sky-100 border-blue text-blue font-bold rounded-md flex items-center justify-center"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>Klik Bayar</button>

    </div>

    <div class="p-4 text-gray-600">
        <div class="flex justify-between text-sm mb-4"><span>No.
                Invoice</span><span class="inline-flex items-center">{{ $donasi->kode }}</span></div>
        <div class="flex justify-between text-sm mb-4"><span>Status pembayaran</span><span
                class="inline-flex items-center"><span class="font-bold">
                    @switch($donasi->status)
                    @case('settlement')
                    Pembayaran Berhasil
                    @break
                    @default
                    Menunggu Pembayaran
                    @break
                    @endswitch
                </span></span></div>
    </div>

    <div class="p-4 border-y-8 border-gray-100">
        <div class="mb-6">
            <div>
                <h2 class="text-gray-900 font-bold mb-1">Ada kendala dengan transaksi ini?</h2>
                <p class="text-gray-600 text-sm">Anda menemukan kendala pada transaksi ini? Yuk tanyakan ke admin,
                    siapkan juga bukti transfernya ya</p>
            </div>
        </div><a
            href="https://api.whatsapp.com/send/?phone=6285215112369&amp;text=_Assalaamu%27alaikum_+kak%2C%0A++++++++++++++++++++%0ASaya+ada+kendala+%2Aproses+donasi%2A%0A++++++++++++++++++++%0A%60%60%60Nomor+invoice%3A+{{$donasi->kode}}%0ATotal%3A+@rupiah($donasi->amount)%60%60%60%0A++++++++++++++++++++%0AMohon+untuk+bantu+dicek+ya+kak..&amp;type=phone_number&amp;app_absent=0"
            target="_blank" rel="noreferrer"
            class="flex items-center border py-3 px-4 border-gray-300 rounded text-gray-600"><svg
                xmlns="http://www.w3.org/2000/svg" width="32" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                <path
                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                </path>
            </svg>
            <div>
                <h4 class="font-semibold text-sm text-gray-900 leading-relaxed">Hubungi kami lewat WhatsApp</h4>
                <p class="text-sm">Lapor kendala melalui chat WhatsApp</p>
            </div>
        </a>
    </div>

    <div class="p-4">
        <p class="text-gray-600 text-center text-sm">Yuk jadi <strong class="text-orange-500">#PejuangAlquran</strong>
            dengan bantu <strong>Daarul Huffadz Peduli</strong> mencapai targetnya</p>
        <!-- <button
            class="flex items-center justify-center text-sm px-2 py-3 font-semibold rounded-md text-white text-center flex-1 mt-4 bg-red-400 w-full"
            fdprocessedid="80kyze"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="mr-2">
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

    <x-footer />

    @push('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script>
        let pay = $('#pay');

        function ajaxGetToken(callback) {
            let snapToken = '{{$donasi->snap}}';
            // Request get token to your server & save result to snapToken variable

            if (snapToken) {
                callback(null, snapToken);
            } else {
                callback(new Error('Failed to fetch snap token'), null);
            }
        }

        ajaxGetToken(function(error, snapToken) {
            if (error) {
                snap.hide();
            } else {
                window.snap.pay(snapToken, {
                    onSuccess: function(result) {
                        let slug = $('#slug').data('slug')
                        let kode = $('#kode').data('kode')
                        let url = "{{route('success',[':kode',':slug'])}}"
                        url = url.replace(':kode', kode)
                        url = url.replace(':slug', slug)
                        /* You may add your own implementation here */
                        window.location.href = url
                    },
                })

            }
        });


        pay.on('click', function() {
            snap.show();
            ajaxGetToken(function(error, snapToken) {
                if (error) {
                    snap.hide();
                } else {
                    window.snap.pay(snapToken, {
                        onSuccess: function(result) {
                            let slug = $('#slug').data('slug')
                            let kode = $('#kode').data('kode')
                            let url = "{{route('success',[':kode',':slug'])}}"
                            url = url.replace(':kode', kode)
                            url = url.replace(':slug', slug)
                            /* You may add your own implementation here */
                            window.location.href = url
                        },
                    })

                }
            });
        })
    </script>
    @endpush

</x-app-layout>