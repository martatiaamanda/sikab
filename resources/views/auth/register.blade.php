<x-guest-layout>
    <x-slot name='title'>
        Register
    </x-slot>

    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-10 col-md-10 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang</h3>
                                <p class="mb-0">Daftarkan data diri anda untuk masuk kedalam sistem</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('register.store') }}">
                                    @csrf
                                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data
                                        Pribadi</h6>

                                    <div class="row mb-5">
                                        <div class="col-md-6 mb-3">
                                            <label for="name">Nama Lengkap<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control"
                                                placeholder="Nama Lengkap" aria-label="name"
                                                aria-describedby="name-addon" value="{{ old('name') }}">
                                            @error('name')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="NIK">NIK<span class="text-danger">*</span></label>
                                            <input name="NIK" id="NIK" type="text" class="form-control"
                                                placeholder="NIK" aria-label="NIK" value="{{ old('NIK') }}">
                                            @error('NIK')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="alamat">Alamat Lengkap<span
                                                    class="text-danger">*</span></label>
                                            <input name="alamat" id="alamat" type="text" class="form-control"
                                                placeholder="Alamat Lengkap" aria-label="alamat"
                                                value="{{ old('alamat') }}">
                                            @error('alamat')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="tempat_lahir">Tempat Lahir<span
                                                    class="text-danger">*</span></label>
                                            <input name="tempat_lahir" id="tempat_lahir" type="text"
                                                class="form-control" placeholder="Tempat Lahir"
                                                aria-label="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                            @error('tempat_lahir')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir<span
                                                    class="text-danger">*</span></label>
                                            <input name="tanggal_lahir" id="tanggal_lahir" type="date"
                                                class="form-control" placeholder="Tanggal Lahir"
                                                aria-label="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="jenis_kelamin">Jenis Kelamin<span
                                                    class="text-danger">*</span></label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            {{-- <input name="NIK" id="NIK" type="text" class="form-control" placeholder="NIK" aria-label="NIK" value="{{ old('NIK') }}"> --}}
                                            @error('jenis_kelamin')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="no_hp">Nomor Handphone<span
                                                    class="text-danger">*</span></label>
                                            <input name="no_hp" id="no_hp" type="text" class="form-control"
                                                placeholder="Nomor Handphone" aria-label="no_hp"
                                                value="{{ old('no_hp') }}">
                                            @error('no_hp')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    {{-- data accunt --}}
                                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Email dan
                                        Password</h6>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email<span class="text-danger">*</span></label>
                                            <input name="email" id="email" type="email" class="form-control"
                                                placeholder="Email" aria-label="Email / NIK"
                                                aria-describedby="email-addon" value="{{ old('email') }}" required>
                                            @error('email')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="password">Password<span class="text-danger">*</span></label>
                                            <div
                                                class="form-control d-flex justify-content-between align-items-center p-0">
                                                <input type="password" name="password" id="password"
                                                    class="form-control border-0" placeholder="Password"
                                                    aria-label="Password" aria-describedby="password-addon" required>
                                                <button type="button" onclick="toggleShowPassword('password')"
                                                    class="input-group-text border-0">
                                                    <i id="toggleIcon" class="fas fa-eye-slash"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="password_confirmation">Konfirmasi Password<span
                                                    class="text-danger">*</span></label>
                                            <div
                                                class="form-control d-flex justify-content-between align-items-center p-0">
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation" class="form-control border-0"
                                                    placeholder="Konfirmasi Password" aria-label="Password"
                                                    aria-describedby="password-addon" required>
                                                <button type="button"
                                                    onclick="toggleShowPassword('password_confirmation')"
                                                    class="input-group-text border-0">
                                                    <i id="toggleIcon" class="fas fa-eye-slash"></i>
                                                </button>
                                            </div>
                                            @error('password_confirmation')
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-faded-info w-100 mt-4 mb-0 text-white">Registrasi</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Sudah memiliki akun ?
                                    <a href="{{ route('login') }}"
                                        class="text-info text-gradient font-weight-bold">login di sini </a>
                                </p>
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
