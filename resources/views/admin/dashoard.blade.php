<x-app-layout>
    <x-slot name="title">home</x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 row ">
        {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg row"> --}}
        @foreach ($jenisSurat as $jenis_surat)
            <div class="col-md-4 col-lg-3 p-3">
                <div class="card card-profile card-plain h-100">
                    <div class="rounded rounded-3 px-4 py-1 border position-  aspect-square ">
                        <div class="d-flex gap-3">
                            <i
                                class="fa-solid {{ $jenis_surat->icon }} fs-1 text-white  p-3 rounded rounded-3 bg-gradient-faded-info"></i>
                            <span class="px-1 text-bold text-xl">{{ $jenis_surat->name }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-baseline">
                            <span class="px-2 text-bold text-4xl">{{ count($jenis_surat->surats) }}</span>

                            <a href="{{ route('admin.surat.jenis', [$jenis_surat->slug]) }}"
                                class="d-flex  align-items-center gap-3 border-top">
                                <span class="text-bold">Kelola Surat</span>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- </div> --}}
    </div>

</x-app-layout>
