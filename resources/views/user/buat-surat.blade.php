<x-app-layout>
    <x-slot name="title">Buat Surat</x-slot>



    <section class="m-3">
        <div class="row">
            @foreach ($mail_types as $mail_type )
        {{-- {{$mail_type}} --}}
        <div class="col-md-4 col-lg-3 p-3">

                <a href="#" class="card card-profile card-plain h-100">
                    <div class="card-body text-center bg-white shadow border-radius-lg p-3">
                      {{-- <i class="fa-solid fa-user fs-1 text-gradient"></i> --}}
                      <div class="rounded rounded-3 p-4 bg-gradient-faded-info d-inline-flex aspect-square">
                          <i class="fa-solid {{ $mail_type->icon }} fs-1 text-white"></i>
                      </div>
                      {{-- <a href="javascript:;">
                        <img class="w-100 border-radius-md" src="assets/img/kit/pro/anastasia.jpg">
                      </a> --}}
                      <h5 class="mt-3 mb-1 d-md-block d-none">{{ $mail_type->name }}</h5>
                      {{-- <p class="mb-1 d-md-none d-block text-sm font-weight-bold text-darker">Natalie Paisley</p> --}}
                      {{-- <p class="mb-0 text-xs font-weight-bolder text-warning text-gradient text-uppercase">Credit Analyst</p> --}}
                    </div>
                  </a>

          </div>
        @endforeach

        </div>
    </section>


</x-app-layout>
