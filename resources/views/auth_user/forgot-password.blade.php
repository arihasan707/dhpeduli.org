<x-app-layout>
    <x-slot name="header">
        <div class="max-w-[430px] bg-blue z-10 w-[100%] flex justify-between sticky top-0">
            <div class="p-4 text-white">
                <a href="{{route('akun.index')}}">
                    <i class="fa-solid fa-arrow-left text-[24px]"></i>
                </a>
                <span class="relative bottom-1 pl-3 font-bold">Reset Password</span>
            </div>
        </div>
    </x-slot>
    <x-form-user>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="font-bold text-gray-900 text-lg mb-1">Atur Ulang Password</div>
            <p class="text-gray-600 mb-8 text-sm">Masukkan email yang terdaftar. Kami akan mengirimkan link verifikasi
                untuk mengatur ulang kata sandi.</p>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="mb-4">
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <x-button>
                {{ __('Kirim link reset password') }}
            </x-button>
            <p class="text-center text-sm mt-4 text-gray-600">Ingat password Anda <a
                    class="text-blue hover:text-blue underline" href="{{route('login')}}">Masuk Sekarang</a>.</p>
        </form>
    </x-form-user>

</x-app-layout>