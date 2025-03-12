<div class="relative top-7 pb-28">
    <div class="bg-white rounded-md">
        <div class="p-4">
            <div class="flex items-center mb-7">
                <img class="rounded-md" src="{{asset('upload/berita/' . $berita->foto)}}" alt="" srcset="">
            </div>
            <span class="text-sm text-[#999999] flex gap-1 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd"
                        d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                        clip-rule="evenodd" />
                </svg>
                {{ date_format($berita->created_at, 'd-M-Y h:i') . ' WIB' }}
            </span>
            <a href="{{route('berita' ,$berita->slug)}}"
                class="font-semibold hover:text-sky-500 text-sky-700">{{ $berita->judul }} </a>
            <div class="font-medium text-sm my-2 text-justify">{!! $berita->isi !!}
            </div>
            <x-berita-card-program :row="$berita" />
        </div>
    </div>
</div>