<x-app-layout>
    <x-slot name="title">Bantuan Sosoial</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Bantuan Sosial</h3>
            </div>
            <form>

                <div class="row align-items-center">
                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Surat</h6>
                    {{-- <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Nomor Surat</label>
                    </div> --}}
                    {{-- <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">: {{ $bansos->nomor_bansos ?? '-' }}</p>
                    </div> --}}

                    <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Tanggal Dibuat</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">:
                            {{ \Carbon\Carbon::parse($bansos->tanggal_surat)->format('d F Y') }}</p>
                    </div>

                    <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Status</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">:
                            <span
                                class="badge badge-sm bg-gradient-{{ $bansos->status == 'diterima' ? 'success' : ($bansos->status == 'ditolak' ? 'danger' : 'warning') }}">{{ $bansos->status }}</span>
                        </p>
                    </div>

                    @if ($bansos->catatan != null)
                        <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                            <label class="fs-6 m-0 ps-2">Catatan</label>
                        </div>
                        <div class="col-md-6 col-lg-7 col-sm-6">
                            <p class=" text-secondary fs-6  font-weight-bold">: {{ $bansos->catatan ?? '-' }}</p>
                        </div>
                    @endif

                    @if ($bansos->status == 'diterima')
                        <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                            <label class="fs-6 m-0 ps-2">Tanggal Diterima</label>
                        </div>
                        <div class="col-md-6 col-lg-7 col-sm-6">
                            <p class=" text-secondary fs-6  font-weight-bold">:
                                {{ $bansos->tanggal_disetujui != null ? \Carbon\Carbon::parse($bansos->tanggal_disetujui)->format('d F Y') : '-' }}
                                {{-- {{ \Carbon\Carbon::parse($bansos->tanggal_disetujui)->format('d F Y') }}</p> --}}
                        </div>
                    @endif
                    {{-- @foreach ($data_types as $data_type) --}}
                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Pribadi</h6>

                    {{-- @foreach ($data_type->input_fields as $input_field) --}}
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                1
                            </p>
                            <label class="fs-6 m-0 ps-2" for="nama">Nama Lengkap</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama lengkap" value="{{ $bansos->data_bansos->nama }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                2
                            </p>
                            <label class="fs-6 m-0 ps-2" for="tempat_lahir">Tempat Tanggal Lahir</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                placeholder="Tempat Lahir"
                                value="{{ $bansos->data_bansos->tempat_lahir . ', ' . $bansos->data_bansos->tanggal_lahir }}"
                                disabled>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                3
                            </p>
                            <label class="fs-6 m-0 ps-2" for="tanggal_lahir">Jenis Kelamin</label>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" disabled>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L"
                                    {{ $bansos->data_bansos->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="P"
                                    {{ $bansos->data_bansos->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                4
                            </p>
                            <label class="fs-6 m-0 ps-2" for="alamat">Alamat Lengkap</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <textarea class="form-control" name="alamat" id="alamat" aria-label="With textarea" placeholder="Alamat Lengkap"
                                disabled>{{ $bansos->data_bansos->alamat }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    {{-- @foreach ($data_types as $data_type) --}}
                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Dokumen Tambahan</h6>

                    {{-- @foreach ($data_type->input_fields as $input_field) --}}
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                1
                            </p>
                            <label class="fs-6 m-0 ps-2" for="kk">Kartu Keluarga</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <div class="form-control ">
                                <button type="button" class="border-0 bg-transparent w-100 text-start"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    {{ $bansos->data_bansos->kk }}
                                </button>
                            </div>
                        </div>

                        <div class="modal modal-fullscreen fade modal-xl " id="exampleModal" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
                                <div class="modal-content rounded rounded-3">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Kartu Keluarga</h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <embed class="p-0 m-0"
                                            src="{{ asset('storage/bansos/' . $bansos->data_bansos->kk) }}"
                                            width="100%" height="100%" type='application/pdf'>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                2
                            </p>
                            <label class="fs-6 m-0 ps-2" for="ktp">KTP Asli</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <div class="form-control ">
                                <button type="button" class="border-0 bg-transparent w-100 text-start"
                                    data-bs-toggle="modal" data-bs-target="#modalKtp">
                                    {{ $bansos->data_bansos->ktp }}
                                </button>
                            </div>
                        </div>

                        <div class="modal modal-fullscreen fade modal-xl " id="modalKtp" tabindex="-1"
                            role="dialog" aria-labelledby="modalKtpLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
                                <div class="modal-content rounded rounded-3">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalKtpLabel">KTP</h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <embed class="p-0 m-0"
                                            src="{{ asset('storage/bansos/' . $bansos->data_bansos->ktp) }}"
                                            width="100%" height="100%" type='application/pdf'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                3
                            </p>
                            <label class="fs-6 m-0 ps-2" for="sktm">Surat Keterngan Tidak Mampu dari RT/RW
                                setempat</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <div class="form-control ">
                                <button type="button" class="border-0 bg-transparent w-100 text-start"
                                    data-bs-toggle="modal" data-bs-target="#modalSktmModal">
                                    {{ $bansos->data_bansos->sktm }}
                                </button>
                            </div>
                        </div>

                        <div class="modal modal-fullscreen fade modal-xl " id="modalSktmModal" tabindex="-1"
                            role="dialog" aria-labelledby="modalSktmModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
                                <div class="modal-content rounded rounded-3">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalSktmModalLabel">Surat Keterngan Tidak Mampu
                                            dari RT/RW</h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <embed class="p-0 m-0"
                                            src="{{ asset('storage/bansos/' . $bansos->data_bansos->sktm) }}"
                                            width="100%" height="100%" type='application/pdf'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                3
                            </p>
                            <label class="fs-6 m-0 ps-2" for="sktm">Surat Pengantar dari RT/RW
                                setempat</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <div class="form-control ">
                                <button type="button" class="border-0 bg-transparent w-100 text-start"
                                    data-bs-toggle="modal" data-bs-target="#pengantar">
                                    {{ $bansos->data_bansos->pengantar_rt }}
                                </button>
                            </div>
                        </div>

                        <div class="modal modal-fullscreen fade modal-xl " id="pengantar" tabindex="-1"
                            role="dialog" aria-labelledby="pengantarLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
                                <div class="modal-content rounded rounded-3">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pengantarLabel">Surat Pengantar
                                            dari RT/RW</h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <embed class="p-0 m-0"
                                            src="{{ asset('storage/bansos/' . $bansos->data_bansos->pengantar_rt) }}"
                                            width="100%" height="100%" type='application/pdf'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-11 ">
                    <div class="d-flex justify-content-end gap-3">
                        @if ($bansos->status == 'diproses')
                            <button type="button" data-bs-toggle="modal" id="ButtonOk"
                                onclick="showmodal('diterima')"
                                class="btn bg-gradient-faded-primary mt-4 mb-0 px-5 text-white">Terima</button>
                            <button type="button" data-bs-toggle="modal" id="ButtonOk"
                                onclick="showmodal('ditolak')"
                                class="btn bg-gradient-faded-danger mt-4 mb-0 px-5 text-white">Tolak</button>
                        @endif
                        {{-- @if ($bansos->status == 'diterima')
                            <a href="{{ route('admin.bansos.cetak', [$bansos->id]) }}"
                                class="btn bg-gradient-faded-success mt-4 mb-0 px-5 text-white me-5">Cetak</a>
                        @endif --}}
                        <a href="{{ back()->getTargetUrl() }}"
                            class="btn bg-gradient-faded-secondary mt-4 mb-0 px-5 text-white">Kembali</a>
                        {{-- class="btn bg-gradient-faded-info mt-4 mb-0 px-5 text-white">Simpan</button> --}}
                    </div>
                </div>



            </form>
        </div>

        <div class="modal fade " id="modalOk" tabindex="-1" role="dialog" aria-labelledby="modalOkLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalOkLabel">catatan bantuan sosial</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action='{{ route('admin.bansos.konfirmasi', [$bansos->id]) }}' method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-5">
                                {{-- <div class=" mb-3" id="input_nomor_bansos">
                                    <label for="nomor_bansos">Nomor_bansos</label>
                                    <input type="text" class="form-control" id="nomor_bansos" name="nomor_bansos"
                                        placeholder="Nomor Bantuan Sosial" value="{{ old('nomor_bansos') }}">
                                    @error('nomor_bansos')
                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                <div class=" mb-3">
                                    <label for="catatan">Caratan</label>
                                    <textarea class="form-control" name="catatan" id="catatan" aria-label="With textarea"></textarea>
                                    @error('catatan')
                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3" style="display: none">
                                    <label for="status">status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="diterima">ok
                                        </option>
                                        <option value="ditolak">
                                            no
                                        </option>
                                    </select>

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
            const inputStatus = document.getElementById('status');
            const inputNomorBansos = document.getElementById('input_nomor_bansos');


            const showmodal = (status) => {
                if (status == 'ditolak') {
                    inputNomorBansos.style.display = 'none';
                } else {
                    inputNomorBansos.style.display = 'block';
                }
                const data = status
                console.log(data);
                inputStatus.value = data;
                const modal = new bootstrap.Modal(document.getElementById('modalOk'));
                modal.show();
            }
            // const btnOk = document.getElementById('ButtonOk');
            btnOk.addEventListener('click', function() {
                const modal = new bootstrap.Modal(document.getElementById('modalOk'));
                modal.show();
            });
            const session = {!! json_encode($errors->all()) !!};
            const modalOk = document.getElementById('modalOK');

            if (session.length > 0) {
                const modal = new bootstrap.Modal(modalOk);
                modal.show();
            }
        </script>
    </x-slot>


</x-app-layout>
