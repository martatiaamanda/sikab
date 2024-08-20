<x-app-layout>
    <x-slot name="title">Kepala Kelurahan</x-slot>

    <section>
        <div class="row">
            <div class="col-xl-11 col-lg-11 col-md-11 d-flex flex-column">
                <div class="card ">
                    <div class="card-body">
                        <form role="form" ">

                            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data
                                Kepala Kelurahan</h6>

                            <div class="row mb-5">
                                <div class="col-md-7 mb-3">
                                    <label for="name">Nama Lengkap</label>
                                    <input name="name" id="name" type="text" class="form-control"
                                        placeholder="Nama Lengkap" aria-label="name"
                                        aria-describedby="name-addon" value="{{ $lurah->name }}" disabled>
                                </div>
                                <div class="col-md-7 mb-3">
                                    <label for="NIP">NIP</label>
                                    <input name="NIP" id="NIP" type="text" class="form-control"
                                        placeholder="NIP" aria-label="NIP" value="{{ $lurah->NIP }}" disabled>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="NIK">Masa Jabatan </label>
                                            <input name="NIK" id="NIK" type="text" class="form-control"
                                                placeholder="NIK" aria-label="NIK" value="{{ $lurah->awal_jabatan }}" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="NIK">Sampai</label>
                                            <input name="NIK" id="NIK" type="text" class="form-control"
                                                placeholder="NIK" aria-label="NIK" value="{{ $lurah->akhir_jabatan }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7 mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="tanda_tangan">Tanda Tangan</label>
                                            <div class="">
                                                <div class="w-25 h-25">
                                                    <img src="{{ $lurah->tanda_tangan ? asset('storage/kades/' . $lurah->tanda_tangan) : 'https://via.placeholder.com/150' }}"
                                                        alt="ttd" class="w-100 border-radius-lg shadow-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="stempel">Stempel <span class="text-danger">(foto stempel dengan background transparan)</span></label>
                                            <div class="">
                                                <div class="w-25 h-25">
                                                    <img src="{{ $lurah->stemple ? asset('storage/kades/' . $lurah->stemple) : 'https://via.placeholder.com/150' }}"
                                                        alt="ttd" class="w-100 border-radius-lg shadow-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-end">
                                <button type="button"
                                    class="btn bg-gradient-faded-info mt-4 mb-0 text-white" data-bs-toggle="modal"
                                    data-bs-target="#modalUpdate">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    <div class="modal fade " id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateLabel">Ubah Data Kepala Kelurahan</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.lurah.update', [$lurah->id]) }} method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-5">
                        <div class=" mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input name="name" id="name" type="text" class="form-control"
                                placeholder="Nama Lengkap" aria-label="name"
                                aria-describedby="name-addon" value="{{ $lurah->name }}">
                                @error('name')
    <p class="text-danger p-0 m-0">{{ $message }}</p>
@enderror
                        </div>
                        <div class=" mb-3">
                            <label for="NIP">NIP</label>
                            <input name="NIP" id="NIP" type="text" class="form-control"
                                placeholder="NIP" aria-label="NIP" value="{{ $lurah->NIP }}">
                                @error('NIP')
    <p class="text-danger p-0 m-0">{{ $message }}</p>
@enderror
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="awal_jabatan">Masa Jabtan </label>
                                    <input type="number" class="form-control" id="awal_jabatan" name="awal_jabatan" min="1900" max="2100" placeholder="YYYY" value="{{ $lurah->awal_jabatan }}" required>
                                    {{-- <input type="year" name="awal_jabatan" id="awal_jabatan" type="text" class="form-control"
                                        placeholder="awal_jabatan" aria-label="awal_jabatan" value="{{ $lurah->awal_jabatan }}"> --}}
                                        @error('awal_jabatan')
    <p class="text-danger p-0 m-0">{{ $message }}</p>
@enderror
                                </div>
                                <div class="col-6">
                                    <label for="akhir_jabatan">sampai</label>
                                    <input type="number" class="form-control" id="akhir_jabatan" name="akhir_jabatan" min="1900" max="2100" placeholder="YYYY" value="{{ $lurah->akhir_jabatan }}" required>
                                    {{-- <input name="akhir_jabatan" id="akhir_jabatan" type="text" class="form-control"
                                        placeholder="akhir_jabatan" aria-label="akhir_jabatan" value="{{ $lurah->akhir_jabatan }}"> --}}
                                        @error('akhir_jabatan')
    <p class="text-danger p-0 m-0">{{ $message }}</p>
@enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanda_tangan">Tanda Tangan</label>
                            <input type="file" class="form-control" id="tanda_tangan" name="tanda_tangan" accept=".png">
                                @error('tanda_tangan')
    <p class="text-danger p-0 m-0">{{ $message }}</p>
@enderror
                        </div>
                        <div class="mb-3">
                            <label for="stemple">Stempel</label>
                            <input type="file" class="form-control" id="stemple" name="stemple" accept=".png">
                                @error('stemple')
    <p class="text-danger p-0 m-0">{{ $message }}</p>
@enderror
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

    </section>

    <x-slot name='scripts' >
        <script>
            const session = {!! json_encode($errors->all()) !!};
            const modalData = document.getElementById('modalUpdate');

            if (session.length > 0) {
                const modal = new bootstrap.Modal(modalUpdate);
                modal.show();
            }
        </script>
    </x-slot>

</x-app-layout>
