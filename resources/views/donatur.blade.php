<x-app-layout>

    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] justify-between sticky top-0">
            <div class="p-4 text-white">
                <button id="backTo">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </button>
                <span class="relative bottom-1 pl-3 font-bold">Donatur ({{ $countDonasi  }})</span>
            </div>
        </div>
    </x-slot>

    <div class="bg-white min-h-screen pt-5">
        <div class="">
            <div class="p-4">
                <div class="flex items-center overflow-auto mb-4">
                    <button type="button"
                        class="rounded-full border border-red-500 hover:bg-red-500 hover:text-white py-1 px-3 whitespace-nowrap mr-2 mb-2 text-sm text-red-500 latest {{request()->query('filter') == 'latest' ? 'bg-red-500 text-white' : ''}}">Terbaru
                    </button>
                    <button type="button"
                        class="rounded-full border border-red-500 hover:bg-red-500 hover:text-white py-1 px-3 whitespace-nowrap mr-2 mb-2 text-sm text-red-500 doa {{request()->query('filter') == 'doa' ? 'bg-red-500 text-white' : ''}}">Dengan
                        do’a
                    </button>
                    <button type="button"
                        class="rounded-full border border-red-500 hover:bg-red-500 hover:text-white py-1 px-3 whitespace-nowrap mr-2 mb-2 text-sm text-red-500 donasi-desc {{request()->query('filter') == 'donasi-desc' ? 'bg-red-500 text-white' : ''}}">Terbesar</button>
                </div>

                @if ($donatur->count() == 0)
                <div class="relative text-center text-xs">
                    <p class="font-medium">Belum ada donatur</p>
                    <p>Ayo jadi yang pertama menjadi donatur!</p>
                </div>
                @endif

                @foreach ($donatur as $row)
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

   <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script>
    $('.doa').on('click', function() {

        window.location.href =
            "{!!route('donatur' ,[$program->slug ,'slug'=>$program->slug, 'filter'=>'doa'] )!!}"

    })

    $('.latest').on('click', function() {

        window.location.href =
            "{!!route('donatur' ,[$program->slug ,'slug'=>$program->slug, 'filter'=>'latest'] )!!}"

    })

    $('.donasi-desc').on('click', function() {

        window.location.href =
            "{!!route('donatur' ,[$program->slug ,'slug'=>$program->slug, 'filter'=>'donasi-desc'] )!!}"

    })
    
    $('#backTo').on('click', function() {
            window.location.href = "{!! route('detail',$program->slug) !!}"
        })
    </script>

</x-app-layout>