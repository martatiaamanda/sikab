<x-guest-layout>
    <x-slot name='title'>
        reset password
    </x-slot>

    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl- col-lg-8 col-md-9 d-flex flex-column mx-auto ">
                        <div class="card card-plain mt-8 bg-gradient-light">
                            <div class="row m-3">
                                <div class="card-header pb-0 text-left bg-transparent text-center">
                                    <h2 class="font-weight-bolder text-primary text-gradient">Reset password</h2>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="card-body">
                                        <p class="mb-0">
                                            Silahkan masukkan email anda, kami akan mengirimkan link untuk mereset
                                            password anda
                                        </p>

                                        <form role="form" method="POST" action="{{ route('password.email') }}">
                                            @csrf
                                            <label class="mt-3">Email</label>
                                            <div class="mb-1  ">
                                                <input name="email" id="email" type="text" class="form-control"
                                                    placeholder="Email" aria-label="Email"
                                                    aria-describedby="email-addon" value="{{ old('email') }}" required>
                                            </div>
                                            @error('email')
                                                <p class="text-danger text-center p-0 m-0">Email tidak ditemukan</p>
                                            @enderror
                                            <div class="text-center">
                                                <p id="countdown"
                                                    class="my-2 text-primary text-gradient font-weight-bold"></p>
                                                <!-- Countdown display -->
                                                <button type="submit" id="submit-button"
                                                    class="btn bg-gradient-faded-info w-100 mt-4 mb-0 text-white">Kirim
                                                    Email Reset Password
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    </div> --}}
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            <a href="{{ route('login') }}"
                                                class="text-primary text-gradient font-weight-bold">kembali</a>
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

            document.addEventListener('DOMContentLoaded', function() {
                const submitButton = document.getElementById('submit-button');
                const countdownElement = document.getElementById('countdown');

                // Check if the session indicates success
                const sessionSuccess = {{ session('success') ? 'true' : 'false' }};

                if (sessionSuccess) {
                    submitButton.disabled = true;
                    let timeLeft = 120; // 2 minutes in seconds

                    // Update countdown every second
                    const countdownInterval = setInterval(() => {
                        timeLeft--;
                        // Display the remaining time
                        countdownElement.innerText = `Please wait ${timeLeft} seconds before resubmitting.`;

                        if (timeLeft <= 0) {
                            clearInterval(countdownInterval); // Stop the countdown
                            submitButton.disabled = false; // Re-enable the button
                            countdownElement.innerText = ''; // Clear the countdown message
                            sessionStorage.removeItem('success'); // Clear the session success status
                        }
                    }, 1000);
                }
            });
        </script>
    </x-slot>
</x-guest-layout>
