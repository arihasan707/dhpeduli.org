<x-slot name="navbar">
    <div class="basis-28 text-slate-300 flex justify-center pt-1 text-center">
        <a href="{{route('home.index')}}" class="group">
            <i class="text-2xl fa-solid {{ request()->is('/') ? 'text-red-500' : '' }} fa-house navbar-hover"></i>
            <span
                class="text-[#999999] {{ request()->is('/') ? 'text-red-500' : '' }} text-[10px] block group-hover:text-red-500">Beranda</span>
        </a>
    </div>
    <div class="basis-28 text-slate-300 flex justify-center pt-1 text-center">
        <a href="{{ Illuminate\Support\Facades\Auth::user() ? route('donation',['status'=>'success']) : route('donation') }}"
            class="group">
            <i
                class="text-2xl fa-solid fa-hand-holding-heart navbar-hover {{ request()->is('donation') ? 'text-red-500' : '' }}"></i>
            <span
                class="text-[#999999] text-[10px] block group-hover:text-red-500 {{ request()->is('donation') ? 'text-red-500' : '' }}">Donasi
                Saya</span>
        </a>
    </div>
    <div class="basis-28 text-slate-300 flex justify-center pt-1 text-center">
        <a href="{{route('program')}}" class="group">
            <i
                class="text-2xl fa-solid fa-heart navbar-hover {{ request()->is('program') || request()->is('program/search') ? 'text-red-500' : '' }}"></i>
            <span
                class="text-[#999999] text-[10px] block group-hover:text-red-500 {{ request()->is('program') || request()->is('search') ? 'text-red-500' : '' }}">Program</span>
        </a>
    </div>
    <!-- <div class="basis-28 text-slate-300 flex justify-center pt-1 text-center">
        <a href="" class="group">
            <i class="text-2xl fa-solid fa-circle-check navbar-hover"></i>
            <span class="text-[#999999] text-[10px] block group-hover:text-red-500">Wakaf</span>
        </a>
    </div> -->
    <div class="basis-28 text-slate-300 flex justify-center pt-1 text-center">
        <a href="{{route('akun.index')}}" class="group">
            <i class="text-2xl fa-solid fa-user navbar-hover {{request()->is('akun') ? 'text-red-500' : '' }}"></i>
            <span
                class="text-[#999999] text-[10px] block group-hover:text-red-500 {{ request()->is('akun') ? 'text-red-500' : '' }}">Akun</span>
        </a>
    </div>
</x-slot>