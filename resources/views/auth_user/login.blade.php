<x-app-layout class="top-8">
    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] flex justify-between sticky top-0">
            <div class="p-4 text-white">
                <a href="{{route('home.index')}}">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </a>
                <span class="relative bottom-1 pl-3 font-bold">Login</span>
            </div>
        </div>
    </x-slot>
    <x-form-user>
        <div class="space-y-2 pt-4">
            <h1 class="text-[17px] font-bold leading-tight tracking-tight text-gray-900">
                Masuk Akun dhpeduli.org
            </h1>
            <p class="text-sm text-slate-500 pb-3">
                Yuk Masuk untuk nikmati kemudahan berdonasi dan akses fitur lainnya
            </p>
            <form method="POST" class="space-y-2" action="{{ route('login') }}">
                @csrf
                <div class="pb-2">
                    <x-text-input type="text" name="login" value="{{ old('login') }}" id="login"
                        placeholder="Masukan No Handphone atau Alamat Email" required="" />
                    <x-input-error :messages="$errors->get('login')" class="mt-2" />
                </div>
                <div>
                    <x-text-input type="password" name="password" value="{{ old('password') }}" id="password"
                        placeholder="Password" required="" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between pb-1">
                    <div class="flex items-start">
                    </div>
                    <a href="{{route('password.request')}}"
                        class="text-[13px] underline text-sky-500 font-medium text-primary-600 hover:underline">Lupa
                        Password?</a>
                </div>
                <x-button>
                    {{ __('Masuk ke akun saya') }}
                </x-button>
            </form>
            <p class="text-sm font-light py-1 text-center text-gray-500">
                Belum punya akun? <a href="{{route('register')}}"
                    class="font-medium text-sky-500 underline text-primary-600 hover:underline">Yuk
                    daftar
                    sekarang</a>
            </p>
        </div>
    </x-form-user>

</x-app-layout>