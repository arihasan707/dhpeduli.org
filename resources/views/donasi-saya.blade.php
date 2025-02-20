<x-app-layout>
    
   <x-slot name="header">
        <div class="bg-blue z-10 w-[100%]">
            <div class="p-4 text-white">
                <span class="relative bottom-1 pl-3 font-bold">Donasi Saya</span>
            </div>
        </div>
    </x-slot>

    <x-navbar />

    @guest
    <div class="bg-white flex h-screen items-center">
        <!--<div class="pb-[65px]">-->
            <div class="p-4">
                <h3 class="text-xl font-semibold text-center">Silahkan login terlebih dahulu <br>
                </h3>
                <p class="text-gray-600 mt-2 text-center text-sm">Untuk melihat riwayat dari transaksimu, kamu harus
                    login terlebih dahulu.</p><a href="{{route('login')}}"
                    class="block bg-red-500 hover:bg-red-400 py-3 px-4 rounded-xl text-white font-semibold mt-4 w-full text-center text-sm shadow-lg shadow-red-200"
                    rel="noreferrer">Login Sekarang</a>
            </div>
        <!--</div>-->
    </div>
    @endguest

    @auth

    <div class="p-4">

        @if (in_array('pending', $_empty))
        <div class="mb-4">
            <div>
                <h2 class="text-gray-900 font-bold mb-1">Menunggu Pembayaran</h2>
            </div>
        </div>
        @endif

        @foreach ($donasi as $row)
        @if ($row->status == 'pending')

        <div class="bg-orange-50 border border-orange-200 mb-3 p-3 rounded cursor-pointer notif"
            data-kode="{{$row->kode}}" data-slug="{{$row->program->slug}}">
            <span class="text-xs mb-2 block"><span class="text-gray-600">{{ $row->kode }}</span></span>
            <div class="mb-2 text-sm"><span
                    class="font-semibold text-gray-900 hover:text-gray-600">{{ $row->program->judul }}</span></div>
            <div class="text-xs text-gray-600 flex items-center"><span
                    class="mr-2">{{ date_format($row->created_at,'d M Y H:i') }}</span><span>@rupiah($row->amount)</span>
            </div>
        </div>

        @endif
        @endforeach
    </div>


    <div class="bg-white min-h-screen">
        <!--<div class="pb-[65px]">-->
            <div class="px-4">
                <div class="mb-4">
                    <div>
                        <h2 class="text-gray-900 font-bold mb-1">Donasi Saya</h2>
                    </div>
                </div>
                <div class="border-b flex mb-4">
                    <a href="{{route('donation',['status'=>'success'])}}"
                        class="{{ request()->query('status') == 'success' ? 'text-red-500 border-red-500 font-semibold' : 'border-transparent' }}  border-b pb-3 mr-4 text-sm success">Berhasil</a>
                    <a href="{{route('donation',['status'=>'expired'])}}"
                        class="{{ request()->query('status') == 'expired' ? 'text-red-500 border-red-500 font-semibold' : 'border-transparent' }} text-gray-600  border-b pb-3 mr-4 text-sm failed">Gagal</a>
                </div>
                <div class="mt-6">
                    <!-- <img src="/assets/images/fig-empty-donatur.svg" alt="belum ada data"
                        class="mx-auto mb-6"> -->
                    @if (request()->query('status') == 'success')
                    @foreach ($success as $row)
                    <div class="flex border-b  mb-3 pb-3 cursor-pointer success" data-kode="{{$row->kode}}"
                        data-slug="{{$row->program->slug}}">
                        <div class="flex-shrink-0 mr-4">
                            <div
                                class="flex items-center justify-center w-6 h-6 rounded-full bg-green-600 text-white mt-2">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="">
                                <div class="flex text-xs mb-2">
                                    <span class="text-gray-500">{{ $row->kode }}</span>
                                </div>
                                <div class="flex mb-2 text-sm ">
                                    <span
                                        class="font-semibold text-gray-900 hover:text-gray-600">{{ $row->program->judul }}</span>
                                </div>
                                <div class="text-xs text-gray-500  flex items-center">
                                    <span
                                        class="mr-2">{{ date_format($row->created_at,'d M Y H:i') }}</span><span>@rupiah($row->amount)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if (!in_array('settlement', $_empty))
                    <div class="text-center">
                        <h3 class="text-gray-600 font-semibold text-xs mb-1 leading-none">Tidak ada data donasi</h3>
                        <p class="text-gray-600 text-xs my-0">Pilih programnya segerakan dapat pahalanya</p>
                    </div>
                    @endif
                    @endif
                    @if (request()->query('status') == 'expired')
                    @foreach ($expire as $row)
                    <div class="flex border-b  mb-3 pb-3 cursor-pointer expire" data-kode="{{$row->kode}}"
                        data-slug="{{$row->program->slug}}">
                        <div class=" flex-shrink-0 mr-4">
                            <div
                                class="flex items-center justify-center w-6 h-6 rounded-full bg-red-500 text-white mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>

                            </div>
                        </div>
                        <div class="flex">
                            <div class="">
                                <div class="flex text-xs mb-2">
                                    <span class="text-gray-500">{{ $row->kode }}</span>
                                </div>
                                <div class="flex mb-2 text-sm ">
                                    <span
                                        class="font-semibold text-gray-900 hover:text-gray-600">{{ $row->program->judul }}</span>
                                </div>
                                <div class="text-xs text-gray-500  flex items-center">
                                    <span
                                        class="mr-2">{{ date_format($row->created_at,'d M Y H:i') }}</span><span>@rupiah($row->amount)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if (!in_array('expire', $_empty))
                    <div class="text-center">
                        <h3 class="text-gray-600 font-semibold text-xs mb-1 leading-none">Tidak ada data donasi</h3>
                        <p class="text-gray-600 text-xs my-0">Pilih programnya segerakan dapat pahalanya</p>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        <!--</div>-->
    </div>
    @endauth

    @push('scripts')
    
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script>
    // $('.notif').each(function() {
    //     $(this).on('click', function() {
    //         let tes = $(this).data()
    //         console.log(tes);
    //     })
    // })


    $('.notif').on('click', function() {
        let kode = $(this).data('kode')
        let slug = $(this).data('slug')

        let url = '{{route("payment",[":kode", ":slug" ])}}'

        url = url.replace(':kode', kode)
        url = url.replace(':slug', slug)

        window.location.href = url
    })

    $('.success').on('click', function() {
        let kode = $(this).data('kode')
        let slug = $(this).data('slug')

        let url = '{{route("success",[":kode", ":slug" ])}}'

        url = url.replace(':kode', kode)
        url = url.replace(':slug', slug)

        window.location.href = url
    })

    $('.expire').on('click', function() {
        let kode = $(this).data('kode')
        let slug = $(this).data('slug')

        let url = '{{route("expire",[":kode", ":slug" ])}}'

        url = url.replace(':kode', kode)
        url = url.replace(':slug', slug)

        window.location.href = url
    })
    </script>

    @endpush


</x-app-layout>