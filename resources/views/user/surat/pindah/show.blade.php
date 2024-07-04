<x-app-layout>
    <x-slot name="title">Detail Surat</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">{{ $surat->jenis_surat->name }}</h3>
                {{-- <p class="mb-0">silahkan isi semua dokumen yang diperlukan</p> --}}
            </div>
            <form>
                {{-- @csrf --}}
                <div class="row align-items-center">

                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Surat</h6>
                    <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Nomor Surat</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">: {{ $surat->nomor_surat ?? '-' }}</p>
                    </div>

                    <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Tanggal Dibuat</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">:
                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y') }}</p>
                    </div>

                    <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Status</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">:
                            <span
                                class="badge badge-sm bg-gradient-{{ $surat->status == 'diterima' ? 'success' : ($surat->status == 'ditolak' ? 'danger' : 'warning') }}">{{ $surat->status }}</span>
                        </p>
                    </div>

                    @if ($surat->status == 'ditolak')
                        <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                            <label class="fs-6 m-0 ps-2">Catatan</label>
                        </div>
                        <div class="col-md-6 col-lg-7 col-sm-6">
                            <p class=" text-secondary fs-6  font-weight-bold">: {{ $surat->catatan ?? '-' }}</p>
                        </div>
                    @endif

                    @if ($surat->status == 'diterima')
                        <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                            <label class="fs-6 m-0 ps-2">Tanggal Diterima</label>
                        </div>
                        <div class="col-md-6 col-lg-7 col-sm-6">
                            <p class=" text-secondary fs-6  font-weight-bold">:
                                {{ \Carbon\Carbon::parse($surat->tanggal_disetujui)->format('d F Y') }}</p>
                        </div>
                    @endif

                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Diri</h6>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                1
                            </p>
                            <label class="fs-6 m-0 ps-2" for="nama">Nama Lengkap<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama lengkap" value="{{ $surat_pindah->nama }}" disabled>
                            @error('nama')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                2
                            </p>
                            <label class="fs-6 m-0 ps-2" for="tanggal_lahir">Jenis Kelamin<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" disabled>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ $surat_pindah->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="P" {{ $surat_pindah->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>

                            @error('jenis_kelamin')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                3
                            </p>
                            <label class="fs-6 m-0 ps-2" for="tempat_lahir">Tempat Lahir<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                placeholder="Tempat Lahir" value="{{ $surat_pindah->tempat_lahir }}" disabled>
                            @error('tempat_lahir')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                4
                            </p>
                            <label class="fs-6 m-0 ps-2" for="tanggal_lahir">Tanggal Lahir<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                placeholder="" value="{{ $surat_pindah->tanggal_lahir }}" disabled>
                            @error('tanggal_lahir')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                5
                            </p>
                            <label class="fs-6 m-0 ps-2" for="kewarganegaraan">Kewarganegaraan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
                                placeholder="Kewarganegaraan" value="{{ $surat_pindah->kewarganegaraan }}" disabled>
                            @error('kewarganegaraan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                6
                            </p>
                            <label class="fs-6 m-0 ps-2" for="agama">Agama<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="agama" name="agama"
                                placeholder="Agama" value="{{ $surat_pindah->agama }}" disabled>
                            @error('agama')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                7
                            </p>
                            <label class="fs-6 m-0 ps-2" for="perkawinan">Status Perkawinan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="perkawinan" name="perkawinan"
                                placeholder="Status Perkawinan" value="{{ $surat_pindah->perkawinan }}" disabled>
                            @error('perkawinan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                8
                            </p>
                            <label class="fs-6 m-0 ps-2" for="pekerjaan">Pekerjaan <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                placeholder="Pekerjaan " value="{{ $surat_pindah->pekerjaan }}" disabled>
                            @error('pekerjaan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                9
                            </p>
                            <label class="fs-6 m-0 ps-2" for="pendidikan">Pendidikan Terakhir<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                placeholder="Pendidikan Terakhir" value="{{ $surat_pindah->pendidikan }}" disabled>
                            @error('pendidikan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                10
                            </p>
                            <label class="fs-6 m-0 ps-2" for="no_kk">Nomor KK<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_kk" name="no_kk"
                                placeholder="Nomor KK" value="{{ $surat_pindah->no_kk }}" disabled>
                            @error('no_kk')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Pindah</h6>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                1
                            </p>
                            <label class="fs-6 m-0 ps-2" for="alamat_asal">Alamat Asal<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <textarea class="form-control" name="alamat_asal" id="alamat_asal" aria-label="With textarea"
                                placeholder="ALmat Lengkap" disabled>{{ $surat_pindah->alamat_asal }}</textarea>

                            {{-- <input type="text" class="form-control" id="alamat_asal" name="alamat_asal" --}}
                            {{-- placeholder="Alamat Asal" value="{{ old('alamat_asal') }}"> --}}
                            @error('alamat_asal')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                2
                            </p>
                            <label class="fs-6 m-0 ps-2" for="alamat_tujuan">Alamat tujuan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat_tujuan" name="alamat_tujuan"
                                placeholder="Alamat tujuan" value="{{ $surat_pindah->alamat_tujuan }}" disabled>
                            @error('alamat_tujuan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                3
                            </p>
                            <label class="fs-6 m-0 ps-2" for="desa_tujuan">Desa tujuan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="desa_tujuan" name="desa_tujuan"
                                placeholder="Desa tujuan" value="{{ $surat_pindah->desa_tujuan }}" disabled>
                            @error('desa_tujuan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                4
                            </p>
                            <label class="fs-6 m-0 ps-2" for="kecamatan_tujuan">Kecamatan tujuan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kecamatan_tujuan" name="kecamatan_tujuan"
                                placeholder="Kecamatan tujuan" value="{{ $surat_pindah->kecamatan_tujuan }}"
                                disabled>
                            @error('kecamatan_tujuan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                5
                            </p>
                            <label class="fs-6 m-0 ps-2" for="kabupaten_tujuan">Kabupaten tujuan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kabupaten_tujuan" name="kabupaten_tujuan"
                                placeholder="Kabupaten tujuan" value="{{ $surat_pindah->kabupaten_tujuan }}"
                                disabled>
                            @error('kabupaten_tujuan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                6
                            </p>
                            <label class="fs-6 m-0 ps-2" for="provinsi_tujuan">Provinsi tujuan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="provinsi_tujuan" name="provinsi_tujuan"
                                placeholder="Provinsi tujuan" value="{{ $surat_pindah->provinsi_tujuan }}" disabled>
                            @error('provinsi_tujuan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                7
                            </p>
                            <label class="fs-6 m-0 ps-2" for="alasan_pindah">Alasan Pindah<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <textarea class="form-control" name="alasan_pindah" id="alasan_pindah" aria-label="With textarea"
                                placeholder="Alasan Pindah" disabled>{{ $surat_pindah->alasan_pindah }}</textarea>
                            @error('alasan pindah')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Pengikut</h6>


                    {{-- @foreach ($data_type->input_fields as $input_field) --}}
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
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
                                    {{ $surat_pindah->kk }}
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
                                            src="{{ asset('storage/surat/' . $surat_pindah->kk) }}" width="100%"
                                            height="100%" type='application/pdf'>

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
                                    {{ $surat_pindah->ktp }}
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
                                            src="{{ asset('storage/surat/' . $surat_pindah->ktp) }}" width="100%"
                                            height="100%" type='application/pdf'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Pengikut</h6>


                    <div class="col-md-12 col-lg-11 my-3">
                        <table class="table align-items-center mb-0 w-full">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-info  font-weight-bolder opacity-7">NO</th>
                                    <th class="text-uppercase text-info   font-weight-bolder opacity-7 ps-2">Nama</th>
                                    <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                        Jenis Kelamin</th>
                                    <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                        Hubungan</th>
                                    <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                        Keterangan</th>
                                    {{-- <th class="text-info opacity-7"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surat_pindah->sub_surat_pindah as $sub_surat_pindah)
                                    <tr>
                                        <td>
                                            <p class=" ps-3 text-secondary  font-weight-bold">{{ $loop->iteration }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class=" text-secondary  font-weight-bold">
                                                {{ $sub_surat_pindah->nama }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-secondary  font-weight-bold">{{ $sub_surat_pindah->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-secondary  font-weight-bold">{{ $sub_surat_pindah->hubungan }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-secondary  font-weight-bold">{{ $sub_surat_pindah->keterangan }}</span>
                                        </td>
                                        {{-- <td>
                                            {{ $pengikut }}
                                        </td> --}}
                                    </tr>
                                @endforeach
                        </table>
                    </div>





                </div>
                <div class="col-md-11 ">
                    <div class="d-flex justify-content-end">
                        @if ($surat->status != 'diterima')
                            <a href="{{ route('user.riwayat-surat.pindah.edit', [$surat->id]) }}"
                                class="btn bg-gradient-faded-success mt-4 mb-0 px-5 text-white me-5">Edit</a>
                        @endif
                        <a href="{{ back()->getTargetUrl() }}"
                            class="btn bg-gradient-faded-danger mt-4 mb-0 px-5 text-white">Kembali</a>
                    </div>
                </div>

            </form>
        </div>

    </section>


</x-app-layout>
