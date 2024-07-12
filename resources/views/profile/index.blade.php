{{-- @if (Auth::user()->role == 'user') --}}
<x-app-layout>
    <x-slot name="title">Profile</x-slot>

    <div class="container-fluid">

        <div class="page-header min-height-150 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved-11.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ Auth::user()->user_data->profile_ficture ? asset('' . Auth::user()->user_data->profile_ficture) : asset('static/img/default.png') }}"
                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ Auth::user()->role }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper d-flex justify-content-end align-items-center">
                        <button type="button" class="btn bg-gradient-primary  end-0" data-bs-toggle="modal"
                            data-bs-target="#modalPhoto"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal for edit photo profile --}}
    <div class="modal fade " id="modalPhoto" tabindex="-1" role="dialog" aria-labelledby="modalPhotoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPhotoLabel">ubah poto profil</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action={{ route('profile.update.photo', ['user' => Auth::user()->id]) }} method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                    ">
                            <label for="profile_ficture">Pilih Foto</label>
                            <input type="file" class="form-control" id="profile_ficture" name="profile_ficture">
                            @error('profile_ficture')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
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
    <div class="container-fluid py-4">
        <div class="row">
            {{-- profile inform --}}
        </div>
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#modalDoc">
                                <i class="fas fa-user-edit text-secondary text-sm text-white"></i>
                                <span>{{ Auth::user()->user_documen ? 'Update Dokumen' : 'Upload Dokumen' }}</span>
                            </button>
                            <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#modalData">
                                <i class="fas fa-user-edit text-secondary text-sm text-white"></i>
                                <span>Update Data</span>
                            </button>
                            <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#modalPass">
                                <i class="fas fa-user-edit text-secondary text-sm text-white"></i>
                                <span>Ubah Password</span>
                            </button>
                        </div>
                        <div class="col-md-7 d-flex align-items-center">
                            <h6 class="mb-0">Profile nformasi</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 row">

                    <div class="col-12 col-md-4 ">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama
                                    Lenglkap :</strong> &nbsp; {{ Auth::user()->name }} </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">NIK
                                    :</strong> &nbsp; {{ Auth::user()->NIK }} </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Alamat
                                    :</strong> &nbsp; {{ Auth::user()->user_data->alamat }} </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Tempat
                                    Tanggal Lahir :</strong> &nbsp; {{ Auth::user()->user_data->tempat_lahir }} ,
                                {{ Auth::user()->user_data->tanggal_lahir }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Jenis
                                    Kelamin :</strong> &nbsp;
                                {{ Auth::user()->user_data->jenis_kelamin === 'L' ? 'laki laki' : 'Perempuan' }}
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Email
                                    :</strong> &nbsp; {{ Auth::user()->email }} </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">No
                                    Handphone :</strong> &nbsp; {{ Auth::user()->user_data->no_hp }} </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-5">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">
                                    Ktp :</strong> &nbsp;
                                @if (Auth::user()->user_documen && Auth::user()->user_documen->ktp)
                                    <button class="border-0 px-0 bg-transparent" data-bs-toggle="modal"
                                        data-bs-target="#ktp">
                                        {{ Auth::user()->user_documen->ktp }}
                                    </button>

                                    <div class="modal modal-fullscreen fade modal-xl " id="ktp" tabindex="-1"
                                        role="dialog" aria-labelledby="ktpLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable "
                                            role="document">
                                            <div class="modal-content rounded rounded-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ktpLabel">Modal title</h5>
                                                    <button type="button" class="btn-close text-dark"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed class="p-0 m-0"
                                                        src="{{ asset('storage/surat/' . Auth::user()->user_documen->ktp) }}"
                                                        width="100%" height="100%" type='application/pdf'>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    KTP Belum Tersedia
                                @endif
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                <strong class="text-dark">
                                    Kartu Keluarga :</strong> &nbsp;
                                @if (Auth::user()->user_documen && Auth::user()->user_documen->kk)
                                    <button class="border-0 px-0 bg-transparent" data-bs-toggle="modal"
                                        data-bs-target="#kk">
                                        {{ Auth::user()->user_documen->kk }}
                                    </button>

                                    <div class="modal modal-fullscreen fade modal-xl " id="kk" tabindex="-1"
                                        role="dialog" aria-labelledby="kkLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable "
                                            role="document">
                                            <div class="modal-content rounded rounded-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="kkLabel">Modal title</h5>
                                                    <button type="button" class="btn-close text-dark"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed class="p-0 m-0"
                                                        src="{{ asset('storage/surat/' . Auth::user()->user_documen->kk) }}"
                                                        width="100%" height="100%" type='application/pdf'>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    Kartu Keluarga Belum Tersedia
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal for edit data profile --}}
    <div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="modalDataLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDataLabel">ubah data</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action={{ route('profile.update', ['user' => Auth::user()->id]) }} method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Pribadi</h6>

                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <label for="name">Nama Lengkap<span class="text-danger">*</span></label>
                                <input name="name" id="name" type="text" class="form-control"
                                    placeholder="Nama Lengkap" aria-label="name" aria-describedby="name-addon"
                                    value="{{ Auth::user()->name }}">
                                @error('name')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NIK">NIK<span class="text-danger">*</span></label>
                                <input name="NIK" id="NIK" type="text" class="form-control"
                                    placeholder="NIK" aria-label="NIK" value="{{ Auth::user()->NIK }}" readonly>
                                @error('NIK')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="alamat">Alamat Lengkap<span class="text-danger">*</span></label>
                                <input name="alamat" id="alamat" type="text" class="form-control"
                                    placeholder="Alamat Lengkap" aria-label="alamat"
                                    value="{{ Auth::user()->user_data->alamat }}">
                                @error('alamat')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                                <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control"
                                    placeholder="Tempat Lahir" aria-label="tempat_lahir"
                                    value="{{ Auth::user()->user_data->tempat_lahir }}">
                                @error('tempat_lahir')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                <input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control"
                                    placeholder="Tanggal Lahir" aria-label="tanggal_lahir"
                                    value="{{ Auth::user()->user_data->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value=" L"
                                        {{ Auth::user()->user_data->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="P"
                                        {{ Auth::user()->user_data->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                {{-- <input name="NIK" id="NIK" type="text" class="form-control" placeholder="NIK" aria-label="NIK" value="{{ old('NIK') }}"> --}}
                                @error('jenis_kelamin')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="no_hp">Nomor Handphone<span class="text-danger">*</span></label>
                                <input name="no_hp" id="no_hp" type="text" class="form-control"
                                    placeholder="Nomor Handphone" aria-label="no_hp"
                                    value="{{ Auth::user()->user_data->no_hp }}">
                                @error('no_hp')
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
    <div class="modal fade" id="modalDoc" tabindex="-1" role="dialog" aria-labelledby="modalDocLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDocLabel">ubah data</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form
                        action={{ Auth::user()->user_documen ? route('profile.upload.document.update') : route('profile.upload.document.store') }}
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (Auth::user()->user_documen)
                            @method('PUT')
                        @endif

                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Dokument</h6>

                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <label for="ktp">KTP<span class="text-danger">*</span></label>
                                <input name="ktp" id="ktp" type="file" class="form-control">
                                @error('ktp')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kk">Kartu Keluarga<span class="text-danger">*</span></label>
                                <input name="kk" id="kk" type="file" class="form-control">
                                @error('kk')
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
    <div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="modalPassLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPassLabel">ubah data</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action={{ route('profile.update.password') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Ubah Password</h6>

                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <div class="form-control d-flex justify-content-between align-items-center p-0">
                                    <input type="password" name="password" id="password"
                                        class="form-control border-0" placeholder="Password" aria-label="Password"
                                        aria-describedby="password-addon">
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
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control border-0" placeholder="Konfirmasi Password"
                                        aria-label="Password" aria-describedby="password-addon">
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
                modalData: document.getElementById('modalData'),
                modalPhoto: document.getElementById('modalPhoto'),
                modalDoc: document.getElementById('modalDoc'),
                modalPass: document.getElementById('modalPass')
            };

            const errorConditions = [{
                    keyword: 'Password',
                    modal: modals.modalPass
                },
                {
                    keyword: 'KTP',
                    modal: modals.modalDoc
                },
                {
                    keyword: 'KK',
                    modal: modals.modalDoc
                },
                {
                    keyword: 'Foto profil wajib diisi',
                    modal: modals.modalPhoto
                }
            ];

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
