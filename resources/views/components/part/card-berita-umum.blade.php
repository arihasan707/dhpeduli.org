@forelse ($berita as $row)
<div class="px-4 relative top-7 pb-5">
    <div class="bg-white rounded-md shadow-xl border-x-[1.1px]">
        <div class="flex items-center mb-7">
            <img class="rounded-t-md" src="{{asset('upload/berita/' . $row->foto)}}" alt="" srcset="">
        </div>
        <div class="px-4 pb-4">
            <span class="text-sm text-[#999999] flex gap-1 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd"
                        d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                        clip-rule="evenodd" />
                </svg>
                {{ date_format($row->created_at, 'd-M-Y h:i') . ' WIB' }}
            </span>
            <a href="{{route('berita' ,$row->slug)}}"
                class="font-semibold hover:text-sky-500 text-sky-700">{{ $row->judul }} </a>
            <div class="font-medium text-sm my-2 text-justify">{!! Str::limit($row->isi ,151) !!}
            </div>
            <div class=" flex justify-end mt-5">
                <a href="{{route('berita' ,$row->slug)}}"
                    class=" text-red-600 hover:text-red-500 text-sm font-medium">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@empty
<div class="px-4 relative top-7 pb-5">
    <div class="rounded-md shadow-xl border-[1.1px]">
        <div class="text-center mt-32">
            <div class="flex justify-center mb-4 opacity-30">
                <img src="{{ asset('img/log.png') }}">
            </div>
            <h3 class="text-gray-600 font-semibold text-sm mb-1 leading-none">Belum ada berita terbaru</h3>
            <p class="text-gray-600 text-sm my-0">berita empty</p>
        </div>
    </div>
</div>
@endforelse