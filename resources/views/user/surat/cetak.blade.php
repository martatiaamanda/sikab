<x-app-layout>
    <x-slot name="title">Detail Surat</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient"></h3>
                {{-- <p class="mb-0">silahkan isi semua dokumen yang diperlukan</p> --}}
            </div>

            <div class="col-md-11 ">
                <div class="d-flex justify-content-end">
                    {{-- @if ($history->status != 'diterima')
                        <a href="{{ route('user.riwayat-surat.edit', [$history->id]) }}"
                            class="btn bg-gradient-faded-success mt-4 mb-0 px-5 text-white me-5">Edit</a>
                    @endif --}}
                    <a href="{{ back()->getTargetUrl() }}"
                        class="btn bg-gradient-faded-danger mt-4 mb-0 px-5 text-white">Kembali</a>
                    {{-- class="btn bg-gradient-faded-info mt-4 mb-0 px-5 text-white">Simpan</button> --}}
                    <button onclick="printContent('1')"
                        class="btn bg-gradient-faded-danger mt-4 mb-0 px-5 text-white">cetak</button>
                </div>
            </div>

            {{-- </form> --}}
        </div>

    </section>

    <x-slot name="scripts">
        <script>
            function printContent(routeId) {
                console.log(routeId);
                fetch("{{ route('user.riwayat-surat.cetak', [1]) }}", {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        const iframe = document.createElement('iframe');
                        iframe.style.display = 'none';
                        document.body.appendChild(iframe);
                        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                        iframeDoc.open();
                        iframeDoc.write(html);
                        iframeDoc.close();
                        iframe.onload = () => {
                            iframe.contentWindow.focus();
                            iframe.contentWindow.print();
                            document.body.removeChild(iframe);
                        };

                    });
            }
        </script>
    </x-slot>


</x-app-layout>
