<x-app-layout>
    <x-slot name="title">Detail Surat</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">{{ $jenis_surat->name }}</h3>
                {{-- <p class="mb-0">silahkan isi semua dokumen yang diperlukan</p> --}}
            </div>
            <form method="POST" action="{{ route('user.surat.update', [$history->id]) }}">
                @csrf
                @method('PUT')
                {{-- @csrf --}}
                <div class="row align-items-center">

                    <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Surat</h6>
                    <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Nomor Surat</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">: {{ $history->nomor_surat ?? '-' }}</p>
                    </div>

                    <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Tanggal Dibuat</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">:
                            {{ \Carbon\Carbon::parse($history->tanggal_surat)->format('d F Y') }}</p>
                    </div>

                    {{-- <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                        <label class="fs-6 m-0 ps-2">Status</label>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-6">
                        <p class=" text-secondary fs-6  font-weight-bold">:
                            <span
                                class="badge badge-sm bg-gradient-{{ $history->status == 'diterima' ? 'success' : ($history->status == 'ditolak' ? 'danger' : 'warning') }}">{{ $history->status }}</span>
                        </p>
                    </div> --}}

                    @if ($history->status == 'ditolak')
                        <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                            <label class="fs-6 m-0 ps-2">Catatan</label>
                        </div>
                        <div class="col-md-6 col-lg-7 col-sm-6">
                            <p class=" text-secondary fs-6  font-weight-bold">: {{ $history->catatan ?? '-' }}</p>
                        </div>
                    @endif

                    @if ($history->status == 'diterima')
                        <div class="col-md-6 col-lg-4 col-sm-6 my-1">
                            <label class="fs-6 m-0 ps-2">Tanggal Diterima</label>
                        </div>
                        <div class="col-md-6 col-lg-7 col-sm-6">
                            <p class=" text-secondary fs-6  font-weight-bold">:
                                {{ \Carbon\Carbon::parse($history->tanggal_disetujui)->format('d F Y') }}</p>
                        </div>
                    @endif




                    @foreach ($data_types as $data_type)
                        <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                            {{ $data_type->name }}</h6>

                        @foreach ($data_type->input_fields as $input_field)
                            {{-- {{dd($surat_value[$input_field->id])}} --}}
                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="d-flex align-items-baseline">
                                    <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                        style="width: 30px">
                                        {{ $loop->iteration }}
                                    </p>
                                    <label class="fs-6 m-0 ps-2" for="name">{{ $input_field->title }}</label>
                                </div>
                            </div>
                            @if ($input_field->name == 'jenis_kelamin')
                                <div class="col-md-6 col-lg-7">
                                    <div class="form-group">
                                        <select id="{{ $input_field->name }}" name="{{ $input_field->name }}"
                                            class="form-control">
                                            <option {{ $surat_value[$input_field->id] == 'L' ? 'selected' : '' }}
                                                value="L">Laki-laki</option>
                                            <option {{ $surat_value[$input_field->id] == 'P' ? 'selected' : '' }}
                                                value="P">Perempuan</option>
                                        </select>
                                        @error($input_field->name)
                                            <p class="text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @elseif ($input_field->type == 'file')
                                <div class="col-md-6 col-lg-7">
                                    <div class="form-group">
                                        <!-- Ubah Button -->
                                        <button type="button" id="ubahButton" class="btn btn-primary mb-2"
                                            onclick="toggleFileInput('{{ $input_field->name }}')">Ubah</button>

                                        <!-- File Input -->
                                        <input type="file" class="form-control" id="{{ $input_field->name }}"
                                            name="{{ $input_field->name }}" style="display: none;">

                                        <!-- Validation Error Handling -->
                                        @error($input_field->name)
                                            <p class="text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror

                                        <!-- Button to trigger modal -->
                                        <button type="button" class="btn btn-secondary w-100 text-start mt-2"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            {{ $surat_value[$input_field->id] }}
                                        </button>
                                    </div>

                                    <!-- Modal to show document -->
                                    <div class="modal modal-fullscreen fade modal-xl" id="exampleModal" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content rounded rounded-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Document Viewer</h5>
                                                    <button type="button" class="btn-close text-dark"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed class="p-0 m-0"
                                                        src="{{ asset('storage/surat/' . $surat_value[$input_field->id]) }}"
                                                        width="100%" height="100%" type='application/pdf'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 col-lg-7">
                                    <div class="form-group">
                                        <input type="{{ $input_field->type }}" class="form-control"
                                            id="{{ $input_field->name }}" name="{{ $input_field->name }}"
                                            placeholder="{{ $input_field->title }}"
                                            value="{{ $surat_value[$input_field->id] }}">
                                        @error($input_field->name)
                                            <p class="text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="col-md-11 ">
                    <div class="d-flex justify-content-end">
                        @if ($history->status != 'diterima')
                            <button type="submit"
                                class="btn bg-gradient-faded-info mt-4 mb-0 px-5 text-white me-5">simpan</button>
                        @endif
                        <a href="{{ back()->getTargetUrl() }}"
                            class="btn bg-gradient-faded-danger mt-4 mb-0 px-5 text-white">Kembali</a>
                        {{-- class="btn bg-gradient-faded-info mt-4 mb-0 px-5 text-white">Simpan</button> --}}
                    </div>
                </div>

            </form>
        </div>

    </section>

    <x-slot name='scripts'>

        <script>
            function toggleFileInput(fieldName) {
                var fileInput = document.getElementById(fieldName);
                fileInput.style.display = fileInput.style.display === 'none' ? 'block' : 'none';
            };
        </script>
    </x-slot>
</x-app-layout>
