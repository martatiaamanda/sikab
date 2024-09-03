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
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="card-body">
                                        <p class="mb-0">Terimaksih Sudah Mendaftar ke Aplikasi Kami. Silahkan Cek
                                            Email Anda Untuk Verifikasi Akun, jika tidak ada email masuk silahkan
                                            klik tombol dibawah ini untuk mengirim ulang email verifikasi</p>
                                        </p>

                                        <form role="form" method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn bg-gradient-faded-info w-100 mt-4 mb-0 text-white">Kirim
                                                    Ulang Email Verifikasi</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    </div> --}}
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            <a href="{{ route('logout') }}"
                                                class="text-primary text-gradient font-weight-bold">Logout</a>
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
