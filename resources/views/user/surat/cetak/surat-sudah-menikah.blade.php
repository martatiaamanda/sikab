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
            margin-bottom: 10px;
            text-decoration: underline solid 2px;
        }

        .content {
            margin-top: 20px;
        }

        .content .paragraph {
            margin: 8mm 0;
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
            width: 100%;
            margin-left: 20px
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
                <h3>SURAT KETERANGAN SUDAH MENIKAH</h3>
                <p>NOMOR: {{ $surat->nomor_surat }}</p>
            </div>

            <div class="content">
                <p class="paragraph">
                    Yang bertanda tangan di bawah ini Lurah Bakung Kecamatan Teluk Betung Barat Kota Bandar Lampung,
                    menerangkan :
                </p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>{{ $surat_value['nama'] }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $surat_value['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $surat_value['tempat_lahir'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir'])->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                            <td>{{ $surat_value['kewarganegaraan'] }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $surat_value['agama'] }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $surat_value['pekerjaan'] }}</td>
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
                    Adalah suami dari Perempuan
                </p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>{{ $surat_value['nama_istri'] }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $surat_value['jenis_kelamin_istri'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $surat_value['tempat_lahir_istri'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir_istri'])->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                            <td>{{ $surat_value['kewarganegaraan_istri'] }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $surat_value['agama_istri'] }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $surat_value['pekerjaan_istri'] }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['alamat_istri'] }}
                            </td>
                        </tr>
                    </table>
                </div>

                <p class="paragraph">
                    Benar nama tersebut adalah warga Kelurahan Bakung kecamatan Teluk Betung Barat yang bertempat
                    tinggal pada alamat tersebut diatas. Dan menurut pengetahuan kami nama tersebut diatas pada saat ini
                    berstatus Telah Menikah pada tanggal
                    {{ \Carbon\Carbon::parse($surat_value['tanggal_nikah'])->format('d F Y') }} .
                </p>
                <p class="paragraph">
                    Demikian Surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana
                    mestinya.
                </p>
            </div>

            <div class="footer">
                <div class="inner-footer">
                    <table>
                        <tr>
                            <td>Bandar Lampung,
                                {{ \Carbon\Carbon::parse($surat->tanggal_disetujui)->format('d F Y') }}
                            </td>
                        </tr>
                    </table>
                    <div class="stemple">
                        <img src="{{ asset('storage/kades/' . $lurah->stemple) }}" alt="stempel"
                            style="width: 100%; height: 100%">
                    </div>
                    <div class="signature">
                        <p>LURAH BAKUNG</p>
                        <p>KECAMATAN TELUKBETUNG BARAT</p>
                        <img src="{{ $lurah->tanda_tangan ? asset('storage/kades/' . $lurah->tanda_tangan) : 'https://via.placeholder.com/150' }}"
                            alt="ttd">
                        <p style="text-decoration: underline 2px">{{ $lurah->name }}</p>
                        <p>NIP.{{ $lurah->NIP }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
