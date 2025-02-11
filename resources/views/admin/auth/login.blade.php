<x-layouts.admin-login>
    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{asset('backend/images/auth/auth-img.png')}}" width="500px" alt="">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="index.html" class="mb-40 max-w-290-px">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <h5 class="mb-12">Sign In Admin</h5>
                    <p class="mb-32 text-secondary-light text-md">Silahkan login untuk terhubung ke sistem.</p>
                </div>
                <form action="{{route('login.store')}}" method="Post">
                    @csrf
                    <div class="icon-field">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" class="form-control bg-neutral-50 radius-12" placeholder="Email" required>
                    </div>
                    <x-input-error-bootstrap :messages="$errors->get('email')" class="mt-2" />
                    <div class="position-relative">
                        <div class="icon-field mt-20">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password" class="form-control bg-neutral-50 radius-12" id="your-password" placeholder="Password">
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
                    </div>
                    <button type="submit" class="btn btn-primary text-sm btn-sm px-10 py-13 w-100 radius-12 mt-3">Login</button>
                </form>
            </div>
        </div>
    </section>

</x-layouts.admin-login>