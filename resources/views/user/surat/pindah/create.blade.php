<x-app-layout>
    <x-slot name="title">Buat Surat</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Surat Pindah</h3>
                <p class="mb-0">silahkan isi semua dokumen yang diperlukan</p>
            </div>
            <form action='{{ route('user.buat-surat.pindah.store') }}' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                    {{-- @foreach ($data_types as $data_type) --}}
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
                                3
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
                                4
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
                                5
                            </p>
                            <label class="fs-6 m-0 ps-2" for="kewarganegaraan">Kewarganegaraan<span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
                                placeholder="Kewarganegaraan" value="{{ old('kewarganegaraan') }}">
                            @error('kewarganegaraan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 my-3">
                        <div class="d-flex align-items-baseline">
                            <p class="bg-gradient-faded-info m-0 rounded-circle text-center square" style="width: 30px">
                                6
                            </p>
                            <label class="fs-6 m-0 ps-2" for="agama">Agama<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="agama" name="agama"
                                placeholder="Agama" value="{{ old('agama') }}">
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
                                placeholder="Status Perkawinan" value="{{ old('perkawinan') }}">
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
                                placeholder="Pekerjaan " value="{{ old('pekerjaan') }}">
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
                                placeholder="Pendidikan Terakhir" value="{{ old('pendidikan') }}">
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
                                placeholder="Nomor KK" value="{{ old('no_kk') }}">
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
                                placeholder="ALmat Lengkap">{{ old('alamat_asal') }}</textarea>

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
                                placeholder="Alamat tujuan" value="{{ old('alamat_tujuan') }}">
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
                                placeholder="Desa tujuan" value="{{ old('desa_tujuan') }}">
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
                                placeholder="Kecamatan tujuan" value="{{ old('kecamatan_tujuan') }}">
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
                                placeholder="Kabupaten tujuan" value="{{ old('kabupaten_tujuan') }}">
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
                                placeholder="Provinsi tujuan" value="{{ old('provinsi_tujuan') }}">
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
                                placeholder="Alasan Pindah">{{ old('alasan_pindah') }}</textarea>

                            {{-- <input type="text" class="form-control" id="provinsi_tujuan" name="provinsi_tujuan"
                                placeholder="Provinsi tujuan" value="{{ old('provinsi_tujuan') }}"> --}}
                            @error('alasan pindah')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Pengikut</h6>

                    <div class="col-md-12 col-lg-11">
                        <div class="row" id="subSuratPindah">



                        </div>

                        <div class="d-flex justify-content-start">
                            <button type="button" id="btnAddPengikut"
                                class="btn bg-gradient-faded-primary mt-4 mb-0 px-5 text-white">Tambah
                                Pengikut</button>
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

    <x-slot name='scripts'>

        <script>
            document.getElementById('btnAddPengikut').addEventListener('click', function() {
                let subSurats = document.getElementById('subSuratPindah');
                let index = subSurats.children.length;
                console.log(index);
                let newSubSurat = `
                            <div class="row form-group">
                                <div class="col-12">
                                    <spanc class=" text-xs font-weight-bolder opacity-6">pengikut ${index+1}</spanc>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subSuratPindah[${index}][nama]">Nama Lengkap<span class="text-danger">*</span></label>
                                    <input name="subSuratPindah[${index}][nama]" id="subSuratPindah[${index}][nama]" type="text" class="form-control"
                                        placeholder="Nama Lengkap" value="{{ old('subSuratPindah[${index}][nama]') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subSuratPindah[${index}][jenis_kelamin]">Jenis Kelamin<span class="text-danger">*</span></label>
                                    <select id="subSuratPindah[${index}][jenis_kelamin]" name="subSuratPindah[${index}][jenis_kelamin]" class="form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('subSuratPindah[${index}][jenis_kelamin]') == 'L' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="P" {{ old('subSuratPindah[${index}][jenis_kelamin]') == 'P' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="subSuratPindah[${index}][hubungan]">Hubungan Keluarga<span class="text-danger">*</span></label>
                                    <input name="subSuratPindah[${index}][hubungan]" id="subSuratPindah[${index}][hubungan]" type="text" class="form-control"
                                        placeholder="Hubungan Keluarga" value="{{ old('subSuratPindah[${index}][hubungan]') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subSuratPindah[${index}][keterangan]">Keterangan<span class="text-danger">*</span></label>
                                    <input name="subSuratPindah[${index}][keterangan]" id="subSuratPindah[${index}][keterangan]" type="text" class="form-control"
                                        placeholder="Keterangan" value="{{ old('subSuratPindah[${index}][keterangan]') }}">
                                </div>
                            </div>
                `
                subSurats.insertAdjacentHTML('beforeend', newSubSurat);
            });
        </script>
    </x-slot>


</x-app-layout>
