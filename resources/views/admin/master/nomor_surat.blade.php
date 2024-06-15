<x-app-layout>
    <x-slot name="title">Nomor Surat</x-slot>

    <section>
        <div class="row">
            <div class="col-xl-11 col-lg-11 col-md-11 d-flex flex-column">
                <div class="card ">
                    <div class="card-body">
                        <form role="form" ">
                                    
                            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data
                                Nomor Surat</h6>

                            <div class="card-header pb-3 text-left bg-transparent">
                                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">catatan</h6>
                                <p class="mb-2">Nomor awal adalah nomor sebelum urtuan surat, dan nomor akhir ada nomor setelah urutan surat</p>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-7 mb-3">
                                    <label for="name">Nomor Awal</label>
                                    <input name="name" id="name" type="text" class="form-control"
                                        placeholder="Nama Lengkap" aria-label="name"
                                        aria-describedby="name-addon" value="{{ $nomor_surat->awal }}" disabled>
                                </div>
                                <div class="col-md-7 mb-3">
                                    <label for="NIP">Nomor Akhir</label>
                                    <input name="NIP" id="NIP" type="text" class="form-control"
                                        placeholder="NIP" aria-label="NIP" value="{{ $nomor_surat->akhir }}" disabled>
                                </div>
                                <div class="col-md-7 mb-3">
                                    <label for="NIP">Tahun</label>
                                    <input name="NIP" id="NIP" type="text" class="form-control"
                                        placeholder="NIP" aria-label="NIP" value="{{ $nomor_surat->tahun }}" disabled>
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
                <h5 class="modal-title" id="modalUpdateLabel">ubah data Kelapa Kelurahan</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.nomor-surat.update', [$nomor_surat->id]) }} method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-5">
                        <div class=" mb-3">
                            <label for="awal">Nomor Awal</label>
                            <input name="awal" id="awal" type="text" class="form-control"
                                placeholder="Nama Lengkap" aria-label="awal"
                                aria-describedby="awal-addon" value="{{ $nomor_surat->awal }}">
                                @error('awal')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="akhir">Nomor Akhir</label>
                            <input name="akhir" id="akhir" type="text" class="form-control"
                                placeholder="akhir" aria-label="akhir" value="{{ $nomor_surat->akhir }}">
                                @error('akhir')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" min="1900" max="2100" placeholder="YYYY" value="{{$nomor_surat->tahun}}" required>
                                @error('tahun')
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

        if (session.length > 0 ) {
            const modal = new bootstrap.Modal(modalUpdate);
            modal.show();
        }
        </script>
    </x-slot>

</x-app-layout>
