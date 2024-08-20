<x-app-layout>
    <x-slot name="title">User {{ $user->name }}</x-slot>
    <section>

        {{-- {{ $user }} --}}
        <div class="page-header">
            {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-xl-11 col-lg-11 col-md-11 d-flex flex-column">
                    <div class="card">

                        <div class="card-body">
                            <form role="form" class=" w-full">
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
                                            value="{{ $user->name }}" disabled>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="NIK">NIK</label>
                                        <input name="NIK" id="NIK" type="text" class="form-control"
                                            placeholder="NIK" aria-label="NIK" value="{{ $user->NIK }}" disabled>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input name="email" id="email" type="email" class="form-control"
                                            placeholder="Email" aria-label="Email / NIK" aria-describedby="email-addon"
                                            value="{{ $user->email }}" disabled>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control" disabled>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User
                                            </option>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                Admin

                                            </option>
                                        </select>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="alamat">Alamat Lengkap</label>
                                        <input name="alamat" id="alamat" type="text" class="form-control"
                                            placeholder="Alamat Lengkap" aria-label="alamat"
                                            value="{{ $user->user_data->alamat }}" disabled>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control"
                                            placeholder="Tempat Lahir" aria-label="tempat_lahir"
                                            value="{{ $user->user_data->tempat_lahir }}" disabled>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" id="tanggal_lahir" type="date"
                                            class="form-control" placeholder="Tanggal Lahir" aria-label="tanggal_lahir"
                                            value="{{ $user->user_data->tanggal_lahir }}" disabled>

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" disabled>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L"
                                                {{ $user->user_data->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ $user->user_data->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="no_hp">Nomor Handphone</label>
                                        <input name="no_hp" id="no_hp" type="text" class="form-control"
                                            placeholder="Nomor Handphone" aria-label="no_hp"
                                            value="{{ $user->user_data->no_hp }}" disabled>

                                    </div>

                                </div>

                                <div class="text-end ">
                                    <button type="button" class="btn bg-gradient-primary  mt-4 mb-0 text-white me-3"
                                        data-bs-toggle="modal" data-bs-target="#modalPass">
                                        <i class="fas fa-user-edit text-secondary text-sm text-white"></i>
                                        <span>Ubah Password</span>
                                    </button>

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


        <div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="modalPassLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPassLabel">Ubah Password</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action={{ route('admin.user.update.password', [$user->id]) }} method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Ubah Password
                                (kosongkan untuk password default '123456')
                            </h6>

                            <div class="row mb-5">
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password<span class="text-danger">*</span></label>
                                    <div class="form-control d-flex justify-content-between align-items-center p-0">
                                        <input type="password" name="password" id="password"
                                            class="form-control border-0" placeholder="Password default is '123456'"
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
                                    <label for="password_confirmation">Konfirmasi Password<span
                                            class="text-danger">*</span></label>
                                    <div class="form-control d-flex justify-content-between align-items-center p-0">
                                        <input type="password" name="password_confirmation"
                                            id="password_confirmation" class="form-control border-0"
                                            placeholder="Konfirmasi Password" aria-label="Password"
                                            aria-describedby="password-addon">
                                        <button type="button" onclick="toggleShowPassword('password_confirmation')"
                                            class="input-group-text border-0">
                                            <i id="toggleIcon" class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    @error('password_confirmation')
                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                            </div>
                        </form>
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
                const isPasswordType = targetInput.type === 'password';
                targetInput.type = isPasswordType ? 'text' : 'password';
                targetIcon.classList.toggle('fa-eye', isPasswordType);
                targetIcon.classList.toggle('fa-eye-slash', !isPasswordType);
            }

            const session = {!! json_encode($errors->all()) !!};
            const modals = {
                modalPass: document.getElementById('modalPass')
            };

            const errorConditions = [{
                keyword: 'Password',
                modal: modals.modalPass
            }, ];

            console.log(session);

            if (session.length > 0) {
                const errorMessage = session[0];
                const condition = errorConditions.find(cond => errorMessage.includes(cond.keyword));
                const modalToShow = condition ? condition.modal : modals.modalData;
                new bootstrap.Modal(modalToShow).show();
            }
        </script>
    </x-slot>

</x-app-layout>
