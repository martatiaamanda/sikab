<x-app-layout>
    <x-slot name="title">Riwayat Surat</x-slot>

    <x-slot name='metas'>
        {{-- datatables --}}
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
            integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    </x-slot>


    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between items-center">
                        <div class="card-header pb-0">
                            <h6>{{ $page_title }}</h6>
                        </div>
                        @if ($page_title == 'Bansos Selesai')
                            <button type="button" href="{{ route('admin.export.bansos') }}" data-bs-toggle="modal"
                                data-bs-target="#mudalExport"
                                class="btn bg-gradient-faded-primary mt-4 mb-0 px-5 text-white me-3">Export
                                Data</button>

                            <div class="modal fade " id="mudalExport"" tabindex="-1" role="dialog"
                                aria-labelledby="mudalExportLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mudalExportLabel">Export Data
                                            </h5>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action={{ route('admin.export.bansos') }} method="GET"
                                            onsubmit="closeModal()">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="start_date">Dari Tanggal</label>
                                                    <input type="date" class="form-control" id="start_date"
                                                        name="start_date">
                                                    @error('start_date')
                                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="end_date">Sampai Tanggal</label>
                                                    <input type="date" class="form-control" id="end_date"
                                                        name="end_date">
                                                    @error('end_date')
                                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn bg-gradient-primary">Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="data_teble" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-info  font-weight-bolder opacity-7">NO</th>
                                        {{-- <th class="text-uppercase text-info   font-weight-bolder opacity-7 ps-2">Nomor
                                            Surat</th> --}}
                                        <th
                                            class="text-center text-uppercase text-info   font-weight-bolder opacity-7 ps-2">
                                            Nama
                                        </th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Perihal
                                        </th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Tgl Pengajuan</th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-info opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histories as $history)
                                        <tr>
                                            <td>
                                                <p class=" ps-3 text-secondary  font-weight-bold">{{ $loop->iteration }}
                                                </p>
                                            </td>
                                            {{-- <td>
                                                <p class=" text-secondary  font-weight-bold">
                                                    {{ $history->nomor_bansos ?? '-' }}</p>
                                            </td> --}}
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary  font-weight-bold">{{ $history->user->name }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary  font-weight-bold">{{ $history->perihal }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary  font-weight-bold">{{ $history->tanggal_bansos }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="badge badge-sm bg-gradient-{{ $history->status == 'diterima' ? 'success' : ($history->status == 'ditolak' ? 'danger' : 'warning') }}">{{ $history->status }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                {{-- @if ($history->status != 'diterima')
                                                    <a href="{{ route('user.riwayat-surat.edit', [$history->id]) }}"
                                                        class="text-secondary font-weight-bold text-decoration-underline pe-3"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                @endif --}}
                                                <a href="{{ route('admin.bansos.show', [$history->id]) }}"
                                                    class="text-secondary font-weight-bold text-decoration-underline"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end px-3">
                                {{-- {{ $histories->links() }} --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <x-slot name="scripts">
        <script>
            $(document).ready(function() {
                $('#data_teble').DataTable();
            });

            function closeModal() {
                const modal = new bootstrap.Modal(document.getElementById('mudalExport'));
                modal.hide();
            }


            // document.addEventListener('DOMContentLoaded', function() {
            //     const form = document.querySelector('#mudalExport form');
            //     const modal = new bootstrap.Modal(document.getElementById('mudalExport'));

            //     form.addEventListener('submit', function(event) {
            //         event.preventDefault(); // Mencegah form dari submit default

            //         // Lakukan submit menggunakan Ajax
            //         fetch(form.action, {
            //             method: form.method,
            //             body: new FormData(form),
            //             headers: {
            //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
            //                     .getAttribute('content')
            //             }
            //         }).then(response => {
            //             if (response.ok) {
            //                 modal.hide(); // Menutup modal
            //                 // Tambahkan logika jika ingin memperbarui data di halaman setelah export, atau menampilkan pesan sukses.
            //             } else {
            //                 console.error('Gagal mengekspor data.');
            //             }
            //         }).catch(error => {
            //             console.error('Terjadi kesalahan:', error);
            //         });
            //     });
            // });
        </script>
    </x-slot>
</x-app-layout>
