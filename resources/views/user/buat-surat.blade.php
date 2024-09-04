'<x-app-layout>
    <x-slot name="title">Buat Surat</x-slot>



    <section class="m-3">
        <div class="row">
            @foreach ($mail_types as $mail_type)
                <div class="col-md-4 col-lg-3 p-3">
                    <div class="card card-profile card-plain h-100">
                        <div class="rounded rounded-3 px-4 py-1 border position-  aspect-square ">
                            <div class="d-flex gap-3">
                                <i
                                    class="fa-solid {{ $mail_type->icon }} fs-1 text-white  p-3 rounded rounded-3 bg-gradient-faded-info"></i>
                                <span class="px-1 text-bold text-xl">{{ $mail_type->name }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <button type="button" class="btn border-0 d-flex gap-2 mt-1" data-bs-toggle="modal"
                                    data-bs-target="#modalType{{ $mail_type->id }}">
                                    <span>info</span>
                                    <i class="fa-solid fa-circle-info"></i>
                                </button>

                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#modalMake{{ $mail_type->id }}"
                                    class="d-flex  align-items-center gap-3 bg-transparent border-0 border-top ">
                                    <span class="text-bold">Buat Surat</span>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade " id="modalType{{ $mail_type->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modalTypeLabel{{ $mail_type->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTypeLabel{{ $mail_type->id }}">Pili Data</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-profile card-plain h-100">
                                            data info surat
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade " id="modalMake{{ $mail_type->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modalMakeLabel{{ $mail_type->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalMakeLabel{{ $mail_type->id }}">Buat
                                    {{ $mail_type->name }} Untuk</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-profile card-plain h-100 border border-1 text-center ">
                                            <a href="{{ $mail_type->slug === 'surat-pindah' ? route('user.buat-surat.pindah.create', ['q' => 'main']) : route('user.buat-surat.create', [$mail_type->slug, 'q' => 'main']) }}"
                                                class="card-body">
                                                <div
                                                    class="rounded rounded-3 p-4 bg-gradient-faded-info d-inline-flex aspect-square">
                                                    <i class="fa-solid fa-user fs-1 text-white"></i>
                                                </div>
                                                <h5 class="mt-3 mb-1 d-md-block text-center">Data Pribadi</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-profile card-plain h-100 border border-1 text-center ">
                                            <a href="{{ $mail_type->slug === 'surat-pindah' ? route('user.buat-surat.pindah.create') : route('user.buat-surat.create', [$mail_type->slug]) }}"
                                                class="card-body">
                                                <div
                                                    class="rounded rounded-3 p-4 bg-gradient-faded-info d-inline-flex aspect-square">
                                                    <i class="fa-solid fa-user-pen fs-1 text-white"></i>
                                                </div>

                                                <h5 class="mt-3 mb-1 d-md-block">Data Orang lain</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>


</x-app-layout>
