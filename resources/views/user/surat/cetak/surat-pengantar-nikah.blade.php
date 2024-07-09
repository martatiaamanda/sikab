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
            font-family: Arial, sans-serif;
            /* font-family: "Times New Roman", Times, serif; */
            text-size-adjust: 12px;
            margin: 0;
            padding: 0;
        }

        .inner {
            margin-top: 15mm;
        }

        .inner table {
            margin: 0
        }

        .container {
            width: 210mm;
            max-width: 210mm;
            min-height: 330mm;
            box-sizing: border-box;
            margin: auto;
            /* border: 1px solid black; */
        }

        .container .inner {
            padding: 0 20mm;
        }

        .header {
            text-align: center;
            padding-top: 15px;
        }

        .header h3,
        .header p {
            margin: 0;
        }

        .header h3 {
            /* margin-bottom: 10px; */
            text-decoration: underline solid 2px;
        }

        .content {
            margin-top: 20px;
        }

        .content .paragraph {
            margin: 4mm 0 0 0;
            /* text-indent: 20px; */
            text-align: justify;
        }

        .content table tr .field {
            width: 280px
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
        {{-- <img src="{{ asset('surat/header.png') }}" style="width: 100%" alt="header" /> --}}

        <div class="inner">
            <table style="width: 70%; text-indent: 0">
                <tr>
                    <td>KANTOR DESA/KELURAHAN</td>
                    <td>: BAKUNG</td>
                </tr>
                <tr>
                    <td>KECAMATAN</td>
                    <td>: TELUKBETUNG BARAT</td>
                </tr>
                <tr>
                    <td>KABUPATEN</td>
                    <td>: BANDAR LAMPUNG</td>
                </tr>


            </table>
            <div class="header">
                <h3>SURAT PENGANTAR PERNIKAHAN</h3>
                <p>Nomor: {{ $surat->nomor_surat }}</p>
            </div>

            <div class="content">
                <p class="paragraph">Yang bertanda tangan di bawah ini menjelaskan dengan sesungguhnya bahwa:</p>
                <table>
                    <tr>
                        <td class="field">1. Nama</td>
                        <td>: {{ $surat_value['nama'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">2. Nomor Induk Kependudukan (NIK)</td>
                        <td>: {{ $surat_value['nik'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">3. Jenis Kelamin</td>
                        <td>: {{ $surat_value['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <td class="field">4. Tempat dan Tanggal Lahir</td>
                        <td>: {{ $surat_value['tempat_lahir'] }},
                            {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir'])->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td class="field">5. Agama</td>
                        <td>: {{ $surat_value['agama'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">6. Pekerjaan</td>
                        <td>: {{ $surat_value['pekerjaan'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">7. Alamat</td>
                        <td>: {{ $surat_value['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">8. Status Perkawinan</td>
                        <td>: - </td>
                    </tr>
                    <tr>
                        <td class="field" style="text-indent: 20px"> a. Laki-laki : Jejaka, Duda</td>
                        <td>: {{ $surat_value['laki_laki'] }}</td>
                    </tr>
                    <tr>
                        <td class="field" style="text-indent: 40px"> atau beristri ke</td>
                        <td>: {{ $surat_value['istri_ke'] }}</td>
                    </tr>
                    <tr>
                        <td class="field" style="text-indent: 20px"> b. Perempuan : Perawan, Janda</td>
                        <td>: {{ $surat_value['perempuan'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">9. Nama Istri/Suami terdahulu</td>
                        <td>: {{ $surat_value['pasangan_terdahulu'] }}</td>
                    </tr>
                </table>
                <p class="paragraph">Adalah benar anal dari perkawian seorang pria :</p>

                <table>
                    <tr>
                        <td class="field">Nama</td>
                        <td>: {{ $surat_value['nama_ayah'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Nomor Induk Kependudukan (NIK)</td>
                        <td>: {{ $surat_value['nik_ayah'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Tempat dan Tanggal Lahir</td>
                        <td>: {{ $surat_value['tempat_lahir_ayah'] }},
                            {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir_ayah'])->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td class="field">Kewarganegaraan</td>
                        <td>: {{ $surat_value['kewarganegaraan_ayah'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Agama</td>
                        <td>: {{ $surat_value['agama_ayah'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Pekerjaan</td>
                        <td>: {{ $surat_value['pekerjaan_ayah'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Alamat</td>
                        <td>: {{ $surat_value['alamat_ayah'] }}</td>
                    </tr>
                </table>

                <p class="paragraph">dengan seorang wanita :</p>

                <table>
                    <tr>
                        <td class="field">Nama</td>
                        <td>: {{ $surat_value['nama_ibu'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Nomor Induk Kependudukan (NIK)</td>
                        <td>: {{ $surat_value['nik_ibu'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Tempat dan Tanggal Lahir</td>
                        <td>: {{ $surat_value['tempat_lahir_ibu'] }},
                            {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir_ibu'])->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td class="field">Kewarganegaraan</td>
                        <td>: {{ $surat_value['kewarganegaraan_ibu'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Agama</td>
                        <td>: {{ $surat_value['agama_ibu'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Pekerjaan</td>
                        <td>: {{ $surat_value['pekerjaan_ibu'] }}</td>
                    </tr>
                    <tr>
                        <td class="field">Alamat</td>
                        <td>: {{ $surat_value['alamat_ibu'] }}</td>
                    </tr>
                </table>
            </div>

            <p style="text-align: justify; text-indent: 30px; margin: 8mm 0;">Demikian, surat pengantar ini dibuat
                dengan mengingat
                sumpah jabatan dan untuk dipergunakan sebagaimana
                mestinya. </p>
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
                    <img src="{{ asset('storage/lurah/' . $lurah->stemple) }}" alt="stempel"
                        style="width: 100%; height: 100%">
                </div>
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
    </div>
</body>

</html>
