<x-admin-layout>
    <x-slot name="title">User</x-slot>
    <section>

        {{-- {{ $user }} --}}
        <div class="page-header">
            {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-10 d-flex flex-column">
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
                                            <option value="user"
                                                {{ $user->role == 'user' ? 'selected' : '' }}>User
                                            </option>
                                            <option value="admin"
                                                {{ $user->role == 'admin' ? 'selected' : '' }}>
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
                                            value="{{ $user->user_data->no_hp }}" disabled>

                                    </div>

                                </div>

                                <div class="text-end ">

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

</x-admin-layout>
