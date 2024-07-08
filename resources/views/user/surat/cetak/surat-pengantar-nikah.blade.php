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
        {{-- <img src="{{ asset('surat/header.png') }}" style="width: 100%" alt="header" /> --}}

        <div class="inner">
            <div class="header">
                <p>KANTOR DESA/KELURAHAN : $kelurahan }}</p>
                <p>KECAMATAN : $kecamatan }}</p>
                <p>KABUPATEN/KOTA : $kabupaten }}</p>
                <p><strong>SURAT PENGANTAR PERKAWINAN</strong></p>
                <p>Nomor: $nomor }}</p>
            </div>

            <div class="content">
                <p>Yang bertanda tangan di bawah ini menjelaskan dengan sesungguhnya bahwa:</p>
                <p>1. Nama: $nama }}</p>
                <p>2. Nomor Induk Kependudukan (NIK): $nik }}</p>
                <p>3. Jenis kelamin: $jenis_kelamin }}</p>
                <p>4. Tempat dan tanggal lahir: $tempat_tanggal_lahir }}</p>
                <p>5. Agama: $agama }}</p>
                <p>6. Pekerjaan: $pekerjaan }}</p>
                <p>7. Alamat: $alamat }}</p>
                <p>8. Status perkawinan:</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;- Laki-laki: Jejaka, Duda, atau beristri ke... : $status_laki_laki }}</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;- Perempuan: Perawan, Janda : $status_perempuan }}</p>
                <p>9. Nama istri/suami terdahulu: $nama_istri_suami_terdahulu }}</p>
                <br>
                <p>Adalah benar anak dari perkawinan seorang pria:</p>
                <p>Nama lengkap dan alias: $nama_ayah }}</p>
                <p>Nomor Induk Kependudukan (NIK): $nik_ayah }}</p>
                <p>Tempat dan tanggal lahir: $tempat_tanggal_lahir_ayah }}</p>
                <p>Kewarganegaraan: $kewarganegaraan_ayah }}</p>
                <p>Agama: $agama_ayah }}</p>
                <p>Pekerjaan: $pekerjaan_ayah }}</p>
                <p>Alamat: $alamat_ayah }}</p>
                <br>
                <p>dengan seorang wanita:</p>
                <p>Nama lengkap dan alias: $nama_ibu }}</p>
                <p>Nomor Induk Kependudukan (NIK): $nik_ibu }}</p>
                <p>Tempat dan tanggal lahir: $tempat_tanggal_lahir_ibu }}</p>
                <p>Kewarganegaraan: $kewarganegaraan_ibu }}</p>
                <p>Agama: $agama_ibu }}</p>
                <p>Pekerjaan: $pekerjaan_ibu }}</p>
                <p>Alamat: $alamat_ibu }}</p>
            </div>
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
