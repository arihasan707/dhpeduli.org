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

    <x-form-user class="pt-4">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="font-bold text-gray-900 text-lg mb-1">Reset Password</div>
            <p class="text-gray-600 mb-8 text-sm">Silahkan masukkan email dan password baru Anda untuk mereset password
            </p>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full bg-slate-300 cursor-not-allowed" disabled type="email"
                    name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label class="text-sm mb-2 block font-semibold" for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label class="text-sm mb-2 block font-semibold" for="password_confirmation"
                    :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required placeholder="Masukan kembali password"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>

        </form>
    </x-form-user>

</x-app-layout>