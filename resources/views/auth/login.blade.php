<x-guest-layout>
    <x-slot name='title'>
        Login
    </x-slot>

    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl- col-lg-8 col-md-9 d-flex flex-column mx-auto ">
                        <div class="card card-plain mt-8 bg-gradient-light">
                            <div class="row m-3">
                                <div class="card-header pb-0 text-left bg-transparent text-center">
                                    <h2 class="font-weight-bolder text-primary text-gradient">Selamat Datang</h2>
                                    <p class="mb-0">Gunakan Email / NIK dan password untuk masuk kedalam sistem
                                    </p>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="card-body">
                                        <form role="form" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <label>Email / NIK</label>
                                            <div class="mb-3">
                                                <input name="email" id="email" type="text" class="form-control"
                                                    placeholder="Email / NIK" aria-label="Email / NIK"
                                                    aria-describedby="email-addon" value="{{ old('email') }}" required>
                                            </div>
                                            <label>Password</label>
                                            <div class="mb-3">
                                                <div
                                                    class="form-control d-flex justify-content-between align-items-center p-0">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control border-0" placeholder="Password"
                                                        aria-label="Password" aria-describedby="password-addon"
                                                        required>
                                                    <button type="button" onclick="toggleShowPassword('password')"
                                                        class="input-group-text border-0">
                                                        <i id="toggleIcon" class="fas fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="rememberMe"
                                                    id="rememberMe" checked="">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                            @error('email')
                                                <p class="text-danger text-center p-0 m-0">Kombinasi Email / NIK dan
                                                    Password
                                                    salah
                                                </p>
                                            @enderror

                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn bg-gradient-faded-info w-100 mt-4 mb-0 text-white">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            Lupa password ?
                                            <a href="https://wa.me/6283105075794" target="_blank"
                                                class="text-primary text-gradient font-weight-bold">Hubungi Admin </a>
                                        </p>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            Belum memiliki akun ?
                                            <a href="{{ route('register') }}"
                                                class="text-primary text-gradient font-weight-bold">Daftar di sini </a>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6 d-md-block d-none pb-5">
                                    <div class="w-100 h-100 bg-cover rounded-3 "
                                        style="background-image: url('{{ asset('static/img/bg-auth-5.png') }}')">
                                        {{-- <div class="w-100 h-100 bg-gradient-faded-dark opacity-2 rounded-3"></div> --}}
                                        {{-- <img class="w-full" src="{{ asset('static/img/bg-auth.jpg') }}" alt="img"> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <x-slot name='scripts'>
        <script>
            function toggleShowPassword(target) {
                const targetInput = document.getElementById(target);
                const targetIcon = targetInput.parentElement.querySelector('#toggleIcon');
                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    targetIcon.classList.remove('fa-eye-slash');
                    targetIcon.classList.add('fa-eye');
                } else {
                    targetInput.type = 'password';
                    targetIcon.classList.remove('fa-eye');
                    targetIcon.classList.add('fa-eye-slash');
                }
            }
        </script>
    </x-slot>
</x-guest-layout>
