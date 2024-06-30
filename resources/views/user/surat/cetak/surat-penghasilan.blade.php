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
            margin-top: 30px;
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

        /* table tr td {
            padding: 5px 0;
        } */

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
                <h3>SURAT KETERANGAN</h3>
                <p>NOMOR: {{ $surat->nomor_surat }}</p>
            </div>


            <div class="content">
                <p class="paragraph">
                    Yang bertanda tangan di bawah ini Lurah Bakung, Kecamatan Telukbetung Barat Kota Bandar Lampung,
                    menerangkan :
                </p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>{{ $lurah->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 180px">Jabatan</td>
                            <td>:</td>
                            <td>LURAH TELUKBAKUNG KECAMATAN TELUKBETUNG BARAT</td>
                        </tr>
                    </table>
                </div>

                <p style="text-indent: 20px; margin-top: 0;">
                    Menerangkan bahwa :
                </p>
                <div class="details">
                    <table>

                        <tr>
                            <td style="width: 180px">Nama Ayah</td>
                            {{-- <td>:</td> --}}
                            <td style="font-weight: bold">: {{ $surat_value['nama_ayah'] }}</td>
                        </tr>
                        <tr>
                            <td>pekerjaan</td>
                            {{-- <td>:</td> --}}
                            <td>: {{ $surat_value['pekerjaan_ayah'] }}</td>
                        </tr>

                        <tr>
                            <td style=" padding-top: 20px">Nama Ibu</td>
                            {{-- <td style="padding-top: 20px">:</td> --}}
                            <td style="font-weight: bold; padding-top: 20px">: {{ $surat_value['nama_ibu'] }}</td>
                        </tr>
                        <tr>
                            <td>pekerjaan</td>
                            {{-- <td>:</td> --}}
                            <td>: {{ $surat_value['pekerjaan_ibu'] }}</td>
                        </tr>
                    </table>
                </div>
                <p>
                    Yang merupakan Orang Tua dari Mahasiswa atas Nama :
                </p>
                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            {{-- <td>:</td> --}}
                            <td>: {{ $surat_value['nama'] }}</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl Lahir</td>
                            {{-- <td>:</td> --}}
                            <td>: {{ $surat_value['tempat_lahir'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir'])->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            {{-- <td>:</td> --}}
                            <td>: {{ $surat_value['alamat'] }}</td>
                        </tr>
                    </table>
                </div>
                <p>
                    Penghasilan perbulan yang diperoleh nama tersebut diatas dari pekerjaan yang dimiliki adalah :
                </p>
                <div class="details">
                    <table>
                        <tr id="ayah">
                            <td rowspan="3">a. Ayah</td>
                            <td>:Pengahasilan Orang Tua</td>
                            <td>Rp. {{ $surat_value['penghasilan_ayah'] }}</td>
                        </tr>
                        <tr>
                            <td>Pengahsilan Lain</td>
                            <td>Rp. {{ $surat_value['penghasilan_tambahan_ayah'] }}</td>
                        </tr>
                        <tr>
                            <td>Total Pengahasilana</td>
                            <td>Rp.
                                {{ (int) $surat_value['penghasilan_ayah'] + (int) $surat_value['penghasilan_tambahan_ayah'] }}
                            </td>
                        </tr>
                        <tr id="ibu">
                            <td rowspan="3">b. Ibu</td>
                            <td>:Pengahasilan Orang Tua</td>
                            <td>Rp. {{ $surat_value['penghasilan_ibu'] }}</td>
                        </tr>
                        <tr>
                            <td>Pengahsilan Lain</td>
                            <td>Rp. {{ $surat_value['penghasilan_tambahan_ibu'] }}</td>
                        </tr>
                        <tr>
                            <td>Total Pengahasilana</td>
                            <td>Rp.
                                {{ (int) $surat_value['penghasilan_ibu'] + (int) $surat_value['penghasilan_tambahan_ibu'] }}
                            </td>
                        </tr>
                    </table>
                </div>
                <p class="paragraph">
                    Demikian surat keterangan ini diberikan kepada yang bersangkutan untuk dapat dipergunakan
                    sebagaimana mestinya.
                </p>

            </div>

            <div class="footer">
                <div class="inner-footer">
                    <table style="font-weight: bold">
                        <tr>
                            <td style="margin: 0; padding: 0;">DIKELUARKAN DI</td>
                            <td style="margin: 0; padding: 0;">:</td>
                            <td style="margin: 0; padding: 0;">Bandar Lampung</td>
                        </tr>
                        <tr>
                            <td style="margin: 0; padding: 0;">PADA TANGGAL</td>
                            <td style="margin: 0; padding: 0;">:</td>
                            <td style="margin: 0; padding: 0;">
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
                </div>
            </div>

        </div>
</body>

</html>
