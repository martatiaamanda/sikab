<x-app-layout>
    <x-slot name="title">Riwayat Surat</x-slot>



    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{ $page_title }}</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-info  font-weight-bolder opacity-7">NO</th>
                                        <th class="text-uppercase text-info   font-weight-bolder opacity-7 ps-2">Nomor
                                            Surat</th>
                                        <th
                                            class="text-center text-uppercase text-info   font-weight-bolder opacity-7 ps-2">
                                            Nama
                                        </th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Jenis Surat</th>
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
                                            <td>
                                                <p class=" text-secondary  font-weight-bold">
                                                    {{ $history->nomor_surat ?? '-' }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary  font-weight-bold">{{ $history->user->name }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary  font-weight-bold">{{ $history->jenis_surat->name }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary  font-weight-bold">{{ $history->tanggal_surat }}</span>
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
                                                @if ($history->status == 'diproses')
                                                    <button type="button" data-bs-toggle="modal" id="ButtonOk"
                                                        onclick="showmodal('diterima', {{ $history->id }})"
                                                        class="border-0 bg-transparent text-secondary font-weight-bold text-decoration-underline">Terima</button>
                                                    <button type="button" data-bs-toggle="modal" id="ButtonOk"
                                                        onclick="showmodal('ditolak', {{ $history->id }})"
                                                        class="border-0 bg-transparent text-secondary font-weight-bold text-decoration-underline">Tolak</button>
                                                @endif
                                                <a href="{{ $history->jenis_surat->slug == 'surat-pindah' ? route('admin.surat.pindah.show', [$history->id]) : route('admin.surat.show', [$history->id]) }}"
                                                    class="text-secondary font-weight-bold text-decoration-underline"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    detail
                                                </a>
                                                <div class="modal fade " id="modalOk{{ $history->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modalOkLabel{{ $history->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="modalOkLabel{{ $history->id }}">Catatan Surat
                                                                </h5>
                                                                <button type="button" class="btn-close text-dark"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action='{{ route('admin.surat.konfirmasi', [$history->id]) }}'
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="row ">
                                                                        <div class=" mb-3">
                                                                            <label for="catatan">Catatan</label>
                                                                            <textarea class="form-control" name="catatan" id="catatan" aria-label="With textarea"></textarea>
                                                                            @error('catatan')
                                                                                <p class="text-danger p-0 m-0">
                                                                                    {{ $message }}
                                                                                </p>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="mb-3" style="display: none ">
                                                                            <label for="status">status</label>
                                                                            <select name="status"
                                                                                id="status{{ $history->id }}"
                                                                                class="form-control">
                                                                                <option value="">Pilih Jenis
                                                                                    Kelamin
                                                                                </option>
                                                                                <option value="diterima">ok
                                                                                </option>
                                                                                <option value="ditolak">
                                                                                    no
                                                                                </option>
                                                                            </select>

                                                                        </div>


                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn bg-gradient-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn bg-gradient-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end px-3">
                                {{ $histories->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name='scripts'>
        <script>
            const showmodal = (status, id) => {
                const inputStatus = document.getElementById('status' + id);
                const data = status
                inputStatus.value = data;
                const modal = new bootstrap.Modal(document.getElementById('modalOk' + id));
                modal.show();
            }
            // const btnOk = document.getElementById('ButtonOk');
            // btnOk.addEventListener('click', function() {
            //     const modal = new bootstrap.Modal(document.getElementById('modalOk'));
            //     modal.show();
            // });
            // const session = {!! json_encode($errors->all()) !!};
            // const modalOk = document.getElementById('modalOK');

            // if (session.length > 0) {
            //     const modal = new bootstrap.Modal(modalOk);
            //     modal.show();
            // }
        </script>
    </x-slot>

</x-app-layout>
