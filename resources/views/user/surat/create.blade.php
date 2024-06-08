<x-app-layout>
    <x-slot name="title">Buat Surat</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">{{ $jenis_surat->name }}</h3>
                <p class="mb-0">silahkan isi semua dokumen yang diperlukan</p>
            </div>
            <form action="{{ route('user.buat-surat.store', [$jenis_surat->slug]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                    @foreach ($data_types as $data_type)
                        <h6 class="ps-4 mt-5 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                            {{ $data_type->name }}</h6>

                        {{-- {{$data_type->sub_input_fields}} --}}

                        @if ($data_type->sub_input_fields)
                        
                            @foreach ($data_type->sub_input_fields->input_field as $sub_input_field)
                                <div class="col-md-6 col-lg-4 my-3">
                                    <div class="d-flex align-items-baseline">
                                        <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                            style="width: 30px">
                                            {{ $loop->iteration }}
                                        </p>
                                        <label class="fs-6 m-0 ps-2" for="name">{{ $sub_input_field->title }}<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                @if ($sub_input_field->name == 'jenis_kelamin')
                                    <div class="col-md-6 col-lg-7">
                                        <div class="form-group">
                                            <select id="{{ $sub_input_field->name }}" name="{{ $sub_input_field->name }}"
                                                class="form-control">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            
                                            @error($sub_input_field->name)
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6 col-lg-7">
                                        <div class="form-group">
                                            <input type="{{ $sub_input_field->type }}" class="form-control"
                                                id="{{ $sub_input_field->name }}" name="{{ $sub_input_field->name }}"
                                                placeholder="{{ $sub_input_field->title }}"
                                                value="{{ old($sub_input_field->name) }}">
                                            @error($sub_input_field->name)
                                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif


                        @foreach ($data_type->input_fields as $input_field)
                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="d-flex align-items-baseline">
                                    <p class="bg-gradient-faded-info m-0 rounded-circle text-center square"
                                        style="width: 30px">
                                        {{ $loop->iteration }}
                                    </p>
                                    <label class="fs-6 m-0 ps-2" for="name">{{ $input_field->title }}<span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            @if ($input_field->name == 'jenis_kelamin')
                                <div class="col-md-6 col-lg-7">
                                    <div class="form-group">
                                        <select id="{{ $input_field->name }}" name="{{ $input_field->name }}"
                                            class="form-control">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        {{-- <input type="{{$input_field->type}}" class="form-control" id="{{$input_field->name}}" name="{{$input_field->name}}" placeholder="{{$input_field->title}}"> --}}
                                        @error($input_field->name)
                                            <p class="text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @elseif ($input_field->type == 'file')
                                <div class="col-md-6 col-lg-7">
                                    <div class="form-group">
                                        <input type="{{ $input_field->type }}" class="form-control"
                                            id="{{ $input_field->name }}" name="{{ $input_field->name }}"
                                            placeholder="{{ $input_field->title }}">
                                        @error($input_field->name)
                                            <p class="text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 col-lg-7">
                                    <div class="form-group">
                                        <input type="{{ $input_field->type }}" class="form-control"
                                            id="{{ $input_field->name }}" name="{{ $input_field->name }}"
                                            placeholder="{{ $input_field->title }}"
                                            value="{{ old($input_field->name) }}">
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
                        <button type="submit"
                            class="btn bg-gradient-faded-info mt-4 mb-0 px-5 text-white">Simpan</button>
                    </div>
                </div>

            </form>
        </div>

    </section>


</x-app-layout>
