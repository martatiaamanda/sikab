<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Kelahiran</title>
    <style>
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
            margin-bottom: 10px;
            text-decoration: underline solid 2px;
        }

        .content {
            margin-top: 20px;
        }

        .content .paragraph {
            margin: 8mm 0;
            text-indent: 20px;
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
            /* margin-top: 50px; */
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
            width: 100%;
            margin-left: 20px
        }

        table tr td {
            padding: 5px 0;
        }

        th,
        td {
            vertical-align: top;
        }

        .ttd-field {
            height: 120px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('surat/header.png') }}" style="width: 100%" alt="header" />

        <div class="inner">
            <div class="header">
                <h3>SURAT KETERANGAN DOMISILI</h3>
                <p>NOMOR: {{ $surat->nomor_surat }}</p>
            </div>

            <div class="content">
                <p class="paragraph">
                    Yang bertanda tangan dibawah ini , Lurah Bakung Kecamatan Telukbetung Barat Kota Bandar Lampung ,
                    menerangkan bahwa:
                </p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>{{ $surat_value['nama'] }}</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td>{{ $surat_value['tempat_lahir'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir'])->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $surat_value['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $surat_value['pekerjaan'] }}</td>
                        </tr>
                        <tr>
                            <td>Bangsa/ Agama</td>
                            <td>:</td>
                            <td>{{ $surat_value['kewarganegaraan'] }}, {{ $surat_value['agama'] }}</td>
                        </tr>
                        <tr>
                            <td>Masa Berlaku s/d</td>
                            <td>:</td>
                            <td>{{ $surat_value['masa_berlaku'] }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['alamat'] }}
                            </td>
                        </tr>
                    </table>
                </div>

                <p class="paragraph">
                    Bahwa benar nama tersebut diatas adalah penduduk Kelurahan Bakung Kecamatan Telukbetung Barat Kota
                    Bandar Lampung yang berdomisili pada alamat tersebut diatas.
                </p>

                <p class="paragraph">
                    Demikian Surat keterangan Domisili ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana
                    mestinya .
                </p>
            </div>

            <div class="footer">
                <div class="inner-footer">

                    <table>
                        <td style="vertical-align: bottom">
                            <div class="signature">
                                {{-- <p>LURAH BAKUNG</p> --}}
                                <p>Yang Bersangkutan</p>
                                <div class="ttd-field"></div>
                                {{-- <img src="{{ asset('surat/ttd.png') }}" alt="ttd"> --}}
                                <p>{{ $surat_value['nama'] }}</p>
                                <p style="color: white">any think</p>
                            </div>
                        </td>
                        <td style="vertical-align: bottom">
                            <table>
                                <tr>
                                    <td>Bandar Lampung,
                                        {{ \Carbon\Carbon::parse($surat->tanggal_disetujui)->format('d F Y') }}</td>
                                </tr>
                            </table>
                            <div class="signature">
                                <p>LURAH BAKUNG</p>
                                <p>KECAMATAN TELUKBETUNG BARAT</p>
                                <img src="{{ $lurah->tanda_tangan ? asset('storage/lurah/' . $lurah->tanda_tangan) : 'https://via.placeholder.com/150' }}"
                                    alt="ttd">
                                <p style="text-decoration: underline 2px">{{ $lurah->name }}</p>
                                <p>NIP.{{ $lurah->NIP }}</p>
                            </div>
                        </td>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
