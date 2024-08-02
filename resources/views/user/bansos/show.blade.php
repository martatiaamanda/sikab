<x-app-layout>
    <x-slot name="title">Bantuan Sosoial</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Bantuan Sosial</h3>
                {{-- <p class="mb-0">silahkan isi semua dokumen yang diperlukan</p> --}}
            </div>
            <form>

                <div class="row align-items-center">
                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Surat</h6>
                    {{-- <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Nomor Surat</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
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

                    @if ($bansos->status == 'ditolak')
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
                                {{ \Carbon\Carbon::parse($bansos->tanggal_disetujui)->format('d F Y') }}</p>
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
                            <label class="fs-6 m-0 ps-2" for="sktm">Surat Keterngan Tidak Mampu </label>
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
                                4
                            </p>
                            <label class="fs-6 m-0 ps-2" for="sktm">Surat Penganter Dari RT Setempat </label>
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
                                        <h5 class="modal-title" id="pengantarLabel">Surat Pengantar dari
                                            dari RT/RW Setempat</h5>
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
                    <div class="d-flex justify-content-end">
                        @if ($bansos->status != 'diterima')
                            <a href="{{ route('user.riwayat-bansos.edit', [$bansos->id]) }}"
                                class="btn bg-gradient-faded-success mt-4 mb-0 px-5 text-white me-5">Edit</a>
                        @endif
                        <a href="{{ back()->getTargetUrl() }}"
                            class="btn bg-gradient-faded-danger mt-4 mb-0 px-5 text-white">Kembali</a>
                        {{-- class="btn bg-gradient-faded-info mt-4 mb-0 px-5 text-white">Simpan</button> --}}
                    </div>
                </div>



            </form>
        </div>

    </section>


</x-app-layout>
