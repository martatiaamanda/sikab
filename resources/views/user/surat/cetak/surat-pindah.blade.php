<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Kelahiran</title>
    <style>
        @page {
            size: 210mm 330mm;
            /* Ukuran kertas F4 */
            margin: 0;
            /* Hilangkan margin untuk mengurangi efek header/footer */
        }

        /* * {
        
            font-size: 12px
        } */

        body {
            font-family: "Times New Roman", Times, serif;
            text-size-adjust: 12px;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 210mm;
            max-width: 210mm;
            min-height: 330mm;
            box-sizing: border-box;
            margin: auto;
        }

        .container .inner {
            padding: 0 20mm;
        }

        .header {
            text-align: center;
            padding-top: 10px;
        }

        .header h3,
        .header p {
            margin: 0;
        }

        .header h3 {
            margin-bottom: 5px;
            text-decoration: underline solid 2px;
        }

        .content {
            margin-top: 5px;
        }

        .content p {
            margin: 0;
            padding: 0;
        }

        .content .paragraph {
            margin: 1mm 0;
            text-indent: 20px;
            text-align: justify;
        }

        .content .section-title {
            font-weight: bold;
        }

        .footer {
            position: relative;
        }

        .footer .inner-footer {
            position: absolute;
            right: 0;
            /* width: 60%; */
            /* margin-top: 50px; */
        }

        .signature {
            text-align: center;
            font-weight: bold;
            /* margin-top: 30px; */
            margin-right: 50px;
        }

        .signature p {
            margin: 0;
        }

        .signature img {
            /* width: 200px; */
            height: 120px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-left: 20px;
        }

        table tr td {
            padding: 2px 0;
        }

        th,
        td {
            vertical-align: top;
        }

        .ttd-field {
            height: 120px;
        }

        .stemple {
            position: absolute;
            width: 200px;
            height: 200px;
            opacity: 0.6;
            right: 0;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('surat/header.png') }}" style="width: 100%" alt="header" />

        <div class="inner">
            <div class="header">
                <h3>SURAT KETERANGAN BELUM MENIKAH</h3>
                <p>NOMOR: {{ $surat->nomor_surat }}</p>
            </div>

            <div class="content">
                <p class="paragraph">
                    Yang bertanda tangan dibawah ini , Lurah Bakung
                    Kecamatan Teluk Betung Barat Kota Bandar Lampung ,
                    menerangkan bahwa :
                </p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>{{ $surat_value->name }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['tempat_lahir'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir'])->format('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $surat_value['agama'] }}</td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                            <td>{{ $surat_value['kewarganegaraan'] }}</td>
                        </tr>
                        <tr>
                            <td>Status Perkawinan</td>
                            <td>:</td>
                            <td>{{ $surat_value['satus_perkawianan'] }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $surat_value['pekerjaan'] }}</td>
                        </tr>
                        <tr>
                            <td>Pendidkan</td>
                            <td>:</td>
                            <td>{{ $surat_value['pendidikan'] }}</td>
                        </tr>
                        <tr>
                            <td>No. KK</td>
                            <td>:</td>
                            <td>{{ $surat_value['no_kk'] }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $surat_value['alamat_asal'] }}</td>
                        </tr>
                        <tr>
                            <td style="padding-top: 10px">Pindah Ke</td>
                            <td style="padding-top: 10px">:</td>
                            <td style="padding-top: 10px">
                                <table style="width: 40%">
                                    <tr>
                                        <td>{{ $surat_value->alamat_tujuan }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Desa / Kelurahan</td>
                                        <td>: {{ $surat_value->desa_tujuan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>: {{ $surat_value->kecamatan_tujuan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kab / Kota</td>
                                        <td>: {{ $surat_value->kabupaten_tujuan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Provisi</td>
                                        <td>: {{ $surat_value->provinsi_tujuan }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 10px">Alasan Pindah</td>
                            <td style="padding-top: 10px">:</td>
                            <td style="padding-top: 10px"> {{ $surat_value->alasan_pindah }}</td>
                        </tr>
                        <tr>
                            <td>Pengikut</td>
                            <td>:</td>
                            <td>
                                {{ count($surat_value->sub_surat_pindah) }} Orang Pengikut
                            </td>
                        </tr>
                    </table>

                    <table border="1" style="border-collapse: collapse; margin-top: 10px; margin-bottom: 10px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NAMA</th>
                                <th>JENIS KELAMIN</th>
                                <th>HUB KELUARGA</th>
                                <th>KET</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($surat_value->sub_surat_pindah->isEmpty())
                                @for ($i = 0; $i < 2; $i++)
                                    <tr>
                                        <td style="text-align: center">{{ $i + 1 }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endfor

                            @endif
                            @foreach ($surat_value->sub_surat_pindah as $index => $item)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['jenis_kelamin'] }}</td>
                                    <td>{{ $item['hubungan'] }}</td>
                                    <td>{{ $item['keterangan'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="footer">
                <div class="inner-footer">
                    <table>
                        <tr>
                            <td>
                                Bandar Lampung,
                                {{ \Carbon\Carbon::parse($surat->tanggal_disetujui)->format('d F Y') }}
                            </td>
                        </tr>
                    </table>
                    <div class="stemple">
                        <img src="{{ asset('storage/lurah/' . $lurah->stemple) }}" alt="stempel"
                            style="width: 100%; height: 100%" />
                    </div>
                    <div class="signature">
                        <p>LURAH BAKUNG</p>
                        <p>KECAMATAN TELUKBETUNG BARAT</p>
                        <img src="{{ $lurah->tanda_tangan ? asset('storage/lurah/' . $lurah->tanda_tangan) : 'https://via.placeholder.com/150' }}"
                            alt="ttd" />
                        <p style="text-decoration: underline 2px">
                            {{ $lurah->name }}
                        </p>
                        <p>NIP.{{ $lurah->NIP }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
