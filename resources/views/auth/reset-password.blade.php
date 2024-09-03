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
                                    <h2 class="font-weight-bolder text-primary text-gradient">Reset Password</h2>
                                    <p class="mb-0">silahkan masukan password baru anda</p>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="card-body">
                                        <form role="form" method="POST" action="{{ route('password.store') }}">
                                            @csrf
                                            <input type="text" name="token" value="{{ $request->token }}"
                                                class="d-none" readonly>
                                            <label>Email</label>
                                            <div class="mb-3">
                                                <input name="email" id="email" type="text" class="form-control"
                                                    placeholder="Email" aria-label="Email"
                                                    aria-describedby="email-addon" value="{{ $request->email }}"
                                                    required>
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
                                            <label>Konfirmasi Password</label>
                                            <div class="mb-3">
                                                <div
                                                    class="form-control d-flex justify-content-between align-items-center p-0">
                                                    <input type="password" name="password_confirmation"
                                                        id="password_confirmation" class="form-control border-0"
                                                        placeholder="password_confirmation"
                                                        aria-label="password_confirmation"
                                                        aria-describedby="password_confirmation-addon" required>
                                                    <button type="button"
                                                        onclick="toggleShowPassword('password_confirmation')"
                                                        class="input-group-text border-0">
                                                        <i id="toggleIcon" class="fas fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            {{-- <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="rememberMe"
                                                    id="rememberMe" checked="">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div> --}}
                                            @error('email')
                                                <p class="text-danger text-center p-0 m-0">{{ $message }}
                                                </p>
                                            @enderror

                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn bg-gradient-faded-info w-100 mt-4 mb-0 text-white">Reset
                                                    Password</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            Lupa password ?
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#modalAdminList"
                                                class="text-primary text-gradient font-weight-bold bg-transparent border-0">
                                                Hubungi Admin
                                            </button>
                                            / <a href="{{ route('password.request') }}"
                                                class="text-primary text-gradient font-weight-bold">Reset Password</a>

                                        </p>
                                    </div> --}}
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            <a href="{{ route('login') }}"
                                                class="text-primary text-gradient font-weight-bold">Kembali </a>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6 d-md-block d-none pb-5">
                                    <div class="w-100 h-100 bg-cover rounded-3 ">
                                        <img class="img-fluid pt-5" src="{{ asset('static/img/bg-auth-5.png') }}"
                                            alt="img">
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
