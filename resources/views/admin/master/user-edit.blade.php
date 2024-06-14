<x-admin-layout>
    <x-slot name="title">Edit User {{$user->name}}</x-slot>
    <section>
        <div class="page-header">
            {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-xl-11 col-lg-11 col-md-11 d-flex flex-column">
                    <div class="card">

                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('admin.user.update', [$user->id]) }}"
                                class=" w-full">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <div class="w-15 h-15 mx-auto">
                                        <img src="{{ $user->user_data->profile_ficture ? asset('storage/profile/' . $user->user_data->profile_ficture) : asset('static/img/default.png') }}"
                                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <h6 class="mt-4 text-uppercase text-xs font-weight-bolder opacity-6 text-center">Data
                                    Pribadi</h6>

                                <div class="row mb-5">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Nama Lengkap</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                            placeholder="Nama Lengkap" aria-label="name" aria-describedby="name-addon"
                                            value="{{ $user->name }}">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="NIK">NIK</label>
                                        <input name="NIK" id="NIK" type="text" class="form-control"
                                            placeholder="NIK" aria-label="NIK" value="{{ $user->NIK }}">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input name="email" id="email" type="email" class="form-control"
                                            placeholder="Email" aria-label="Email / NIK" aria-describedby="email-addon"
                                            value="{{ $user->email }}" readonly>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="alamat">Alamat Lengkap</label>
                                        <input name="alamat" id="alamat" type="text" class="form-control"
                                            placeholder="Alamat Lengkap" aria-label="alamat"
                                            value="{{ $user->user_data->alamat }}">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control"
                                            placeholder="Tempat Lahir" aria-label="tempat_lahir"
                                            value="{{ $user->user_data->tempat_lahir }}">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" id="tanggal_lahir" type="date"
                                            class="form-control" placeholder="Tanggal Lahir" aria-label="tanggal_lahir"
                                            value="{{ $user->user_data->tanggal_lahir }}">

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L"
                                                {{ $user->user_data->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ $user->user_data->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="no_hp">Nomor Handphone</label>
                                        <input name="no_hp" id="no_hp" type="text" class="form-control"
                                            placeholder="Nomor Handphone" aria-label="no_hp"
                                            value="{{ $user->user_data->no_hp }}">

                                    </div>

                                    <h6 class="mt-4 text-uppercase text-xs font-weight-bolder opacity-6 text-center">
                                        Rubah
                                        Akun
                                    </h6>

                                    <div class="col-md-6 mb-3">
                                        <label for="password">Password</label>
                                        <div class="form-control d-flex justify-content-between align-items-center p-0">
                                            <input type="password" name="password" id="password"
                                                class="form-control border-0" placeholder="Password"
                                                aria-label="Password" aria-describedby="password-addon">
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
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="user"
                                                {{ $user->role == 'user' ? 'selected' : '' }}>User
                                            </option>
                                            <option value="admin"
                                                {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                Admin

                                            </option>
                                        </select>

                                    </div>
                                </div>


                                <div class="text-end ">
                                    <button type="submit"
                                        class="btn bg-gradient-faded-info mt-4 mb-0 text-white">simpan</button>
                                    <a href="{{ route('admin.user') }}"
                                        class="btn bg-gradient-faded-danger mt-4 mb-0 text-white">Batal</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
            {{-- </div> --}}
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

</x-admin-layout>
