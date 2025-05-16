<x-app-layout class="pb-[10vh] top-10">
    <x-slot name="header">
        <div class="pl-4 pb-2 pt-[10px] max-w-[120px] p-1">
            <a href="{{route('home.index')}}">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="pt-3 pr-3 text-lg text-slate-50 w-[240px]">
            <form action="{{route('search')}}" method="GET">
                <input name="prog"
                    class="w-[100%] shadow-lg p-[3.5px] border-transparent focus:border-transparent focus:ring-0 border-none relative focus:border-blue pla text-[14px] text-gray-900 pl-3 placeholder-slate-400 rounded-xl"
                    placeholder="Bantu sesama, cari donasi...">
                <button type="submit" class="absolute"><i
                        class="fa-solid relative right-7 top-[0.6px] fa-magnifying-glass text-md text-blue"></i></button>
            </form>
        </div>
    </x-slot>

    <x-navbar />

    @if (request()->query('prog'))
    <div class="p-4">
        <div class="h-8 w-full bg-slate-200 rounded-sm flex items-center p-2">
            <p class="text-[12px] italic">Hasil pencarian dengan kata kunci <span
                    class=" font-bold">"{{request()->query('prog')}}"</span></p>
        </div>
    </div>
    @endif

    <div class="pt-4">
        <x-part.program-list :$program>
    </div>

    <div class=" pt-4">
        </x-part.program-list>
    </div>

</x-app-layout>