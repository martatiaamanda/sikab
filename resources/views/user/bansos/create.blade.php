<x-app-layout>
    <x-slot name="title">Bantuan Sosoial</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Permohonan Bantuan Sosial</h3>
                <p class="mb-0">silahkan isi semua dokumen yang diperlukan</p>
            </div>
            <form action="{{ route('user.bansos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                    {{-- @foreach ($data_types as $data_type) --}}
                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Pribadi</h6>

                    {{-- @foreach ($data_type->input_fields as $input_field) --}}
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
                                placeholder="Nama lengkap" value="{{ old('nama') }}">
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
                            <label class="fs-6 m-0 ps-2" for="tempat_lahir">Tempat Lahir<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                3
                            </p>
                            <label class="fs-6 m-0 ps-2" for="tanggal_lahir">Tanggal Lahir<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                placeholder="" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                4
                            </p>
                            <label class="fs-6 m-0 ps-2" for="tanggal_lahir">Jenis Kelamin<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
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
                                5
                            </p>
                            <label class="fs-6 m-0 ps-2" for="alamat">Alamat Lengkap<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <textarea class="form-control" name="alamat" id="alamat" aria-label="With textarea" placeholder="ALmat Lengkap">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    {{-- @foreach ($data_types as $data_type) --}}
                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Diri Ibu</h6>

                    {{-- @foreach ($data_type->input_fields as $input_field) --}}
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                1
                            </p>
                            <label class="fs-6 m-0 ps-2" for="nama_ibu">Nama Ibu<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                placeholder="Nama Lengkap" value="{{ old('nama_ibu') }}">
                            @error('nama_ibu')
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
                            <label class="fs-6 m-0 ps-2" for="umur_ibu">Umur<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="number" class="form-control" id="umur_ibu" name="umur_ibu"
                                placeholder="Umur" value="{{ old('umur_ibu') }}">
                            @error('umur_ibu')
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
                            <label class="fs-6 m-0 ps-2" for="pekerjaan_ibu">Pekerjaaan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                placeholder="pekerjaan" value="{{ old('pekerjaan_ibu') }}">
                            @error('pekerjaan_ibu')
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
                            <label class="fs-6 m-0 ps-2" for="alamat_ibu">Alamat<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" aria-label="With textarea"
                                placeholder="ALmat Lengkap">{{ old('alamat_ibu') }}</textarea>
                            @error('alamat_ibu')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    {{-- @foreach ($data_types as $data_type) --}}
                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Diri Ayah</h6>

                    {{-- @foreach ($data_type->input_fields as $input_field) --}}
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                1
                            </p>
                            <label class="fs-6 m-0 ps-2" for="nama_ayah">Nama Ayah<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                placeholder="Nama Lengkap" value="{{ old('nama_ayah') }}">
                            @error('nama_ayah')
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
                            <label class="fs-6 m-0 ps-2" for="umur_ayah">Umur<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="number" class="form-control" id="umur_ayah" name="umur_ayah"
                                placeholder="Umur" value="{{ old('umur_ayah') }}">
                            @error('umur_ayah')
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
                            <label class="fs-6 m-0 ps-2" for="pekerjaan_ayah">Pekerjaaan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                placeholder="Pekerjaan" value="{{ old('pekerjaan_ayah') }}">
                            @error('pekerjaan_ayah')
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
                            <label class="fs-6 m-0 ps-2" for="alamat_ayah">Alamat<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" aria-label="With textarea"
                                placeholder="ALmat Lengkap">{{ old('alamat_ayah') }}</textarea>
                            @error('alamat_ayah')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
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
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                style="width: 30px">
                                1
                            </p>
                            <label class="fs-6 m-0 ps-2" for="kk">Kartu Keluarga<span
                                    class="text-danger  font-italic">*(pdf)</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="file" class="form-control" id="kk" name="kk"
                                placeholder="Kartu Keluarga">
                            @error('kk')
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
                            <label class="fs-6 m-0 ps-2" for="ktp">KTP Asli<span
                                    class="text-danger font-italic">*(pdf)</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="file" class="form-control" id="ktp" name="ktp"
                                placeholder="KTP Asli">
                            @error('ktp')
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
                            <label class="fs-6 m-0 ps-2" for="sktm">Surat Keterngan Tidak Mampu dari RT/RW
                                setempat<span class="text-danger font-italic">*(pdf)</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="file" class="form-control" id="sktm" name="sktm"
                                placeholder="surat keterngan tidak mampu">
                            @error('sktm')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                </div>

                <div class="col-md-11 ">
                    <div class="d-flex justify-content-end">
                        <button type="submit"
                            class="btn bg-gradient-faded-info mt-4 mb-0 px-5 text-white">Simpan</button>
                    </div>
                </div>

            </form>
        </div>

    </section>


</x-app-layout>
