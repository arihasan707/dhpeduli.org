<div class="text-xs">
    <div class="pb-5 text-justify text-slate-800">
        <span>{{ $row->cta }}</span>
    </div>
    <p>Silahkan salurkan sedekah terbaiknya :</p>
</div>
<div class="mb-2 grid pt-2">
    <p class="text-sky-600 font-semibold text-sm mb-1 text-center">Klik link donasi di bawah ini</p>
    <a href="{{route('detail',$row->Program->slug)}}" class="flex flex-row">
        <div class="basis-2/3">
            <img src="{{asset('upload/'.$row->Program->img)}}" alt="flayer"
                class="rounded-s-md border-slate-100 shadow-lg border-1">
        </div>
        <div class="basis-2/3 rounded-e-md border-slate-100 pl-2 pr-2 shadow-lg">
            <span class="text-[9px]">Daarul Huffadz Peduli <i class="fa fa-check-circle text-blue"></i></span>
            <h5 class="font-bold text-[11px]">{{ Str::limit($row->Program->judul,48) }}</h5>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1 lg:mb-1">
                <div class="bg-red-600 h-1 rounded-full"
                    style="width: {{$row->Program->terkumpul / $row->Program->kebutuhan * 100}}%">
                </div>
            </div>
            <div class="flex justify-between">
                <div>
                    <div class="text-[10px] font-light">Donasi Terkumpul</div>
                    <p class="text-[12px] font-bold leading-3">@rupiah($row->Program->terkumpul)</p>
                </div>
                <div class=" text-right">
                    <div>
                        <p class="text-[10px]">Sisa Waktu</p>
                        @if ($row->Program->waktu == NULL)
                        <p class="text-[12px] font-bold text-right leading-3"><i class="fa fa-infinity"></i></p>
                        @else
                        <p class="text-[12px] font-bold text-right leading-3">
                            {{ selisihWaktu($row->Program->waktu) }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>