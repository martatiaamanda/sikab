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

        * {
            font-size: 12px
        }

        body {
            font-family: "Times New Roman", Times, serif;
            /* text-size-adjust: 10px; */
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
            font-size: 110px;
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
            margin: 5mm 0;
            /* text-indent: 20px; */
        }

        .content .section-title {
            font-weight: bold;
        }

        .footer {
            display: flex;
            justify-content: space-between
        }

        .left,
        .right {
            /* border: 1px solid black; */
            width: 40%;
        }

        .tanggal {
            width: 100%;
            border-bottom: 1px solid black;
        }

        .tanggal span {
            display: block;
        }

        .footer table tr td {
            width: 50%;
        }

        .signature {
            text-align: center;
            width: 100%;
            /* margin-top: 50px; */
            margin-right: 50px;
        }

        .signature .name {
            font-weight: bold;
        }

        .signature p {
            margin: 0;
        }


        .signature img {
            /* width: 200px; */
            height: 90px;
        }

        table {
            width: 100%;
            margin-left: 50px;
            border-collapse: collapse;
        }

        table tr td {
            padding: 0
        }

        th,
        td {
            vertical-align: top;
        }

        .ttd-field {
            height: 90px;
        }

        .line {
            width: 100%;
            border-bottom: 1px solid black;
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
                <h3>SURAT KETERANGAN BERSIH DIRI</h3>
                <p>NOMOR: {{ $surat->nomor_surat }}</p>
            </div>

            <div class="content">
                <p>
                    Yang bertanda tangan dibawah ini, Lurah Bakung Kecamatan TelukBetung Barat, dengan ini menerangkan
                    bahwa :
                </p>
                <p>
                    Nama Orang tua/Wali :
                </p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama Bapak/Wali</td>
                            <td>:</td>
                            <td>{{ $surat_value['nama_ayah'] }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $surat_value['jenis_kelamin_ayah'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td>{{ $surat_value['tempat_lahir_ayah'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir_ayah'])->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Agama/ Warganegara</td>
                            <td>:</td>
                            <td>{{ $surat_value['agama_ayah'] }}, {{ $surat_value['kewarganegaraan_ayah'] }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $surat_value['pekerjaan_ayah'] }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['alamat_ayah'] }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="details" style="padding-top: 15px">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama Ibu</td>
                            <td>:</td>
                            <td>{{ $surat_value['nama_ibu'] }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $surat_value['jenis_kelamin_ibu'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td>{{ $surat_value['tempat_lahir_ibu'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir_ibu'])->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Agama/ Warganegara</td>
                            <td>:</td>
                            <td>{{ $surat_value['agama_ibu'] }}, {{ $surat_value['kewarganegaraan_ibu'] }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $surat_value['pekerjaan_ibu'] }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['alamat_ibu'] }}
                            </td>
                        </tr>
                    </table>
                </div>

                <p class="paragraph">
                    Nama tersebut diatas BENAR Orang Tua/Wali (Bapak/ibu) dari :
                </p>
                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>{{ $surat_value['nama'] }}</td>
                        </tr>
                        <tr>
                            <td style="width: 180px">NIK/KTP</td>
                            <td>:</td>
                            <td>{{ $surat_value['nik'] }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $surat_value['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td>{{ $surat_value['tempat_lahir'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir'])->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Agama/ Warganegara</td>
                            <td>:</td>
                            <td>{{ $surat_value['agama'] }}, {{ $surat_value['kewarganegaraan'] }}</td>
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
                    Bahwa berdasarkan data-data yang ada serta sepengetahuan kami, nama tersebut diatas tidak terlibat
                    G-30 S/PKI atau OT/Ormas lainnya yang terlarang dan tidak pernah dihukum serta berkelakuan baik.
                    Surat keterangan Bersih Diri/ bersih lingkungan ini diberikan dengan benar kepada yang bersangkutan
                    untuk dapat melengkapi persyaratan : {{ $surat_value['keperluan'] }}.
                </p>
                <p>
                    Demikian surat keterangan ini diberikan kepada yang bersangkutan untuk dapat dipergunakan
                    sebagaimana mestinya.
                </p>
            </div>

            <div class="footer">

                <div class="left">
                    <div class="tanggal">
                        <span>Nomor :</span>
                        <span>Tanggal :</span>
                    </div>
                    <div class="signature">
                        <p>Mengetahui</p>
                        <p>Camat TelukBetung Barat</p>
                        <div class="ttd-field"></div>
                        <p class="name" style="text-decoration: underline">IDHAM BASYAR, S.SH</p>
                        <P class="name">NIP. 19710723 200003 1 004</P>

                    </div>

                </div>
                <div class="right" style="position: relative">
                    <div class="tanggal">
                        <span>Dikeluarkan : Bandar Lampung</span>
                        <span>pada Tanggal : {{ \Carbon\Carbon::parse($surat->tanggal_disetujui)->format('d F Y') }}
                        </span>
                    </div>
                    <div class="stemple">
                        <img src="{{ asset('storage/lurah/' . $lurah->stemple) }}" alt="stempel"
                            style="width: 100%; height: 100%">
                    </div>
                    <div class="signature">
                        <p>Lurah Bakung</p>
                        <p>Kecaamat TelukBetung Barat</p>
                        {{-- <div class="ttd-field"></div> --}}
                        <img src="{{ $lurah->tanda_tangan ? asset('storage/lurah/' . $lurah->tanda_tangan) : 'https://via.placeholder.com/150' }}"
                            alt="ttd">
                        <p class="name" style="text-decoration: underline">IDHAM BASYAR, S.SH</p>
                        <P class="name">NIP. 19710723 200003 1 004</P>

                    </div>
                </div>
            </div>
            <div class="footer" style=" padding-top: 10px;">
                <div class="left">
                    <div class="signature">
                        <p>Mengetahui</p>
                        <p>KOMANDAN KORAMIL 0410-03/TBT-TBB</p>
                        <div class="ttd-field"></div>
                        <p>(....................................................)</p>
                    </div>

                </div>
                <div class="right">
                    <div class="signature">
                        <p>Mengetahui</p>
                        <p>KAPOLSEK TERLUKBETUNG TIMUR</p>
                        <div class="ttd-field"></div>
                        <p>(....................................................)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
