<x-app-layout class="top-8">
    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] flex justify-between sticky top-0">
            <div class="p-4 text-white">
                <a href="{{route('akun.index')}}">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </a>
                <span class="relative bottom-1 pl-3 font-bold">Register</span>
            </div>
        </div>
    </x-slot>
    <x-form-user>
        <div class="space-y-2 pt-4">
            <h1 class="text-[17px] font-bold leading-tight tracking-tight text-gray-900">
                Daftar Akun dhpeduli.org
            </h1>
            <p class="text-sm text-slate-500 pb-3">
                Yuk bergabung dengan dhpeduli.org untuk nikmati kemudahan berdonasi dan akses fitur lainnya
            </p>
            <form method="POST" class="space-y-2" action="{{ route('register') }}">
                @csrf
                <div class="pb-2">
                    <x-input-label for="name">Nama Lengkap<em class="text-red-500"> *</em></x-input-label>
                    <x-text-input type="text" name="name" value="{{ old('name') }}" id="name"
                        placeholder="Masukan Nama Lengkap" required="" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="pb-2">
                    <x-input-label for="email">Alamat Email<em class="text-red-500"> *</em></x-input-label>
                    <x-text-input type="email" name="email" value="{{ old('email') }}" id="Email"
                        placeholder="Masukan Alamat Email" required="" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="pb-2">
                    <x-input-label for="no_wa">Nomor Telepon<em class="text-red-500"> *</em></x-input-label>
                    <x-text-input type="text" name="no_wa" value="{{ old('no_wa') }}" id="no_wa"
                        placeholder="Masukan Nomor Telepon" required="" />
                    <x-input-error :messages="$errors->get('no_wa')" class="mt-2" />
                </div>
                <div class="pb-2">
                    <x-input-label for="password">Password<em class="text-red-500"> *</em></x-input-label>
                    <x-text-input type="password" name="password" id="password" placeholder="Masukan Password"
                        required="" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="pb-3">
                    <x-input-label for="password_confirmation">Konfirmasi Password<em class="text-red-500"> *</em>
                    </x-input-label>
                    <x-text-input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Masukan Kembali Password" required="" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <x-button>
                    {{ __('Daftar') }}
                </x-button>
            </form>
            <p class="text-sm font-light py-1 text-center text-gray-500">
                Sudah punya akun? <a href="{{route('login')}}"
                    class="font-medium text-sky-500 underline text-primary-600 hover:underline">Login</a>
            </p>
        </div>
    </x-form-user>

</x-app-layout>