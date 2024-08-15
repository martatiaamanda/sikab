<x-app-layout>
    <x-slot name="title">User</x-slot>

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
                            <h6>Kelola User</h6>
                        </div>
                        {{-- <a href="{{ route('admin.user.create') }}"
                            class="btn bg-gradient-faded-primary mt-4 mb-0 px-5 text-white me-3">Tambah Admin</a> --}}
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="data_teble" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name & NIK</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Emial</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Role</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                        {{-- <th class="text-secondary opacity-7"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ $user->user_data->profile_ficture ? asset('storage/profile/' . $user->user_data->profile_ficture) : asset('static/img/default.png') }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $user->NIK }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $user->user_data->alamat }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm {{ $user->role == 'admin' ? 'bg-gradient-success' : 'bg-gradient-primary' }}">{{ $user->role }}</span>
                                            </td>
                                            {{-- <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                            </td> --}}
                                            <td class="align-middle justify-center w-full text-center">
                                                @if ($user->role != 'user')
                                                    <a href="{{ route('admin.user.edit', [$user->id]) }}"
                                                        class="text-secondary font-weight-bold text-decoration-underline pe-3"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                @endif
                                                <a href="{{ route('admin.user.show', [$user->id]) }}"
                                                    class="text-secondary font-weight-bold text-decoration-underline "
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    detail
                                                </a>

                                                <form action="{{ route('admin.user.delete', [$user->id]) }}"
                                                    method="POST" class="p-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="border-0 bg-transparent text-secondary font-weight-bold text-decoration-underline"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Hapus
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end px-3">
                                {{-- {{ $users->links() }} --}}
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
        </script>
    </x-slot>
</x-app-layout>
