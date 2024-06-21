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
                                            Yang
                                            Mengajukan
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
                                                <a href="{{ route('admin.surat.show', [$history->id]) }}"
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
                                {{ $histories->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>
