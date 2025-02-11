@isset($subHeading)
{{ $subHeading }}
@endisset


@foreach ($program as $row)
<div class="mb-2 grid">
    <a href="{{route('detail',$row->slug)}}" class="flex flex-row pl-4 pt-3 pr-4">
        <div class="basis-2/3">
            <img src="{{asset('upload/'.$row->img)}}" alt="flayer"
                class="rounded-s-md border-slate-100 shadow-md border-1">
        </div>
        <div class="basis-2/3 rounded-e-md border-slate-100 pl-2 pr-2 shadow-md border-1">
            <span class="text-[9px]">Daarul Huffadz Peduli <i class="fa fa-check-circle text-blue"></i></span>
            <h5 class="font-bold text-[11px]">{{ Str::limit($row->judul,48) }}</h5>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1 lg:mb-1">
                <div class="bg-red-600 h-1 rounded-full" style="width: {{$row->terkumpul / $row->kebutuhan * 100}}%">
                </div>
            </div>
            <div class="flex justify-between">
                <div>
                    <div class="text-[10px] font-light">Donasi Terkumpul</div>
                    <p class="text-[12px] font-bold leading-3">@rupiah($row->terkumpul)</p>
                </div>
                <div class=" text-right">
                    <div>
                        <p class="text-[10px]">Sisa Waktu</p>
                        @if ($row->waktu == NULL)
                        <p class="text-[12px] font-bold text-right leading-3"><i class="fa fa-infinity"></i></p>
                        @else
                        <p class="text-[12px] font-bold text-right leading-3">
                            {{ selisihWaktu($row->waktu) }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
@endforeach

@if ($program->isEmpty())
<div class="text-center mt-32">
    <div class="flex justify-center mb-4 opacity-30">
        <img src="{{ asset('img/log.png') }}">
    </div>
    <h3 class="text-gray-600 font-semibold text-xs mb-1 leading-none">Program tidak dapat ditemukan</h3>
    <p class="text-gray-600 text-xs my-0">Pastikan kata kunci benar atau gunakan kata yang lain</p>
</div>
@endif

@isset($lainnya)
{{ $lainnya }}
@endisset