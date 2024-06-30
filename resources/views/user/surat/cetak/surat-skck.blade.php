<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Kelahiran</title>
    <style>
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

        .head {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .head_left,
        .head_right {
            width: 50%;
        }

        .head_left {
            padding-top: 9mm;
        }

        .head_left table {
            margin: 0;
        }

        .head_right p {
            margin: 0;
            padding: 0;
        }

        .head_right .alamat {
            margin-top: 3mm;
            margin-left: 35px
        }

        .head_right .alamat .tempat {
            margin-left: 35px;
        }

        .dote {
            background: #000;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-left: 15px;
            padding: 0;
        }

        .content {
            margin-top: 20px;
        }

        .content p {
            margin: 0;
            padding: 0;
        }

        .content .paragraph {
            margin: 5mm 0;
            text-indent: 20px;
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
            width: 47%;
        }

        .tanggal {
            width: 100%;
            /* border-bottom: 1px solid black; */
        }

        .tanggal span {
            display: block;
        }

        .footer table tr td {
            width: 50%;
        }

        .right .signature {
            margin-top: 65px
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
            font-weight: bold
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
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('surat/header.png') }}" style="width: 100%" alt="header" />

        <div class="inner">
            <div class="head">

                <div class="head_left">
                    <table>
                        <tr>
                            <td>Nomor</td>
                            <td>: </td>
                            <td> {{ $surat->nomor_surat }}</td>
                        </tr>
                        <tr>
                            <td>Lampiran</td>
                            <td>: </td>
                            <td> -</td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td>: </td>
                            <td style="text-decoration: underline; font-weight: bold"> Mohon Surat Keterangan
                                Berkelakuan
                                Baik</td>
                        </tr>
                    </table>
                </div>
                <div class="head_right">
                    <p>Bandar Lampung, {{ \Carbon\Carbon::parse($surat->tanggal_disetujui)->format('d F Y') }}</p>
                    <div class="alamat">
                        <p>Kepada Yth.</p>
                        <p>Bapak KAPOLTABES Bandar Lampung</p>
                        <p>Di - </p>
                        <p class="tempat">Bandar Lampung</p>
                    </div>
                </div>
            </div>

            <div class="content">
                <p class="paragraph" style="font-weight: bold">Dengan Hormat</p>
                <p class="paragraph">
                    Yang Bertanda Tangan dibawah ini Lurah Bakung Kecamatan Telukbetung Barat Kota Bandar Lampung,
                    menerangkan dengan sesungguhnya :
                </p>
                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">1. Nama</td>
                            <td>:</td>
                            <td>{{ $surat_value['nama'] }}</td>
                        </tr>
                        <tr>
                            <td>2. Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $surat_value['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td>3. Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td>{{ $surat_value['tempat_lahir'] }},
                                {{ \Carbon\Carbon::parse($surat_value['tanggal_lahir'])->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>4. Bangsa/ Agama</td>
                            <td>:</td>
                            <td>{{ $surat_value['kewarganegaraan'] }}, {{ $surat_value['agama'] }}</td>
                        </tr>
                        <tr>
                            <td>5. Nomor KK</td>
                            <td>:</td>
                            <td>{{ $surat_value['no_kk'] }}</td>
                        </tr>
                        <tr>
                            <td>6. Alamat</td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['alamat'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="display: flex; align-items: center">
                                <div class="dote"></div>
                                <p style="text-indent: 25px; margin: 0; padding: 0;">Kelurahan</p>
                            </td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['kelurahan'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="display: flex; align-items: center">
                                <div class="dote"></div>
                                <p style="text-indent: 25px; margin: 0; padding: 0;">Kecamatan</p>
                            </td>
                            <td>:</td>
                            <td>
                                {{ $surat_value['kecamatan'] }}
                            </td>
                        </tr>
                    </table>
                </div>

                <p style="margin-top: 5mm; text-indent: 20px">
                    Berdasarkan data dan catatan yang ada serta sepanjang pengetahuan kami nama tersebut diatas:
                </p>
                <p>
                    1. Penduduk Kelurahan Bakung Kecamatan TelukBetung Barat dan bertempat tinggal pada alamat tersebut
                    diatas.
                </p>
                <p>2. Berkelakuan baik didalam kehidupan bermasyarakat.</p>
                <p>3. Tidak pernah tersangkut perkara Kriminal dengan Instansi Kepolisian.</p>
                <p>4. Tidak dalam status tahanan yang berwajib.</p>
                <p>5. Tidak pernah terlibat dengan obat-obat terlarang.</p>

                <p class="paragraph">Surat keterangan ini dibuat untuk keperluan <span
                        style="font-weight: bold">{{ $surat_value['Keperluan'] }}</span>
                    Demikian Surat keterangan ini di buat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya
                </p>
            </div>

            <div class="footer">

                <div class="left">
                    <p style="text-align: center; margin: 0; padding: 0">Mengetahui</p>
                    <div class="tanggal">
                        <span>Nomor : {{ $surat->nomor_surat }}</span>
                        <span>Tanggal : {{ \Carbon\Carbon::parse($surat->tanggal_disetujui)->format('d F Y') }}</span>
                    </div>
                    <div class="signature">
                        <p>LURAH BAKUNG</p>
                        <p>KECAMATAN TELUKBETUNG BARAT</p>
                        <img src="{{ $lurah->tanda_tangan ? asset('storage/lurah/' . $lurah->tanda_tangan) : 'https://via.placeholder.com/150' }}"
                            alt="ttd">
                        <p class="name" style="text-decoration: underline">{{ $lurah->name }}</p>
                        <P class="name">NIP. {{ $lurah->NIP }}</P>

                    </div>

                </div>
                <div class="right">
                    <div class="signature">
                        <p>Ketua RT {{ $surat_value['rt'] }}</p>
                        <p>KELURAHAN BAKUNG</p>
                        <div class="ttd-field"></div>
                        <p class="name" style="text-decoration: underline">{{ $surat_value['ketua_rt'] }}</p>
                        {{-- <P class="name">NIP. 19710723 200003 1 004</P> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
