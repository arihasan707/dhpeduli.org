<div {{ $attributes->merge(["class"=> "pl-4"]) }}>
    <h2 class="font-bold text-sky-600">{{ $title }}</h2>
</div>
<div class="grid overflow-x-auto">
    <div class="flex gap-4 pl-4 pb-6 pt-4 pr-4 ">
        @foreach ($kategori as $row)
        <div class="bg-white w-36 shadow-lg">
            <a href="{{route('program',['kategori'=> $row->nama])}}">
                <img src="{{asset('upload/'.$row->img)}}" class="relative rounded-2xl" alt="...">
            </a>
        </div>
        @endforeach

    </div>

</div>