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
            text-decoration: underline solid 3px;
        }

        .content {
            margin-top: 20px;
        }

        .content .paragraph {
            margin: 8mm 0;
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
            width: 60%;
            /* margin-top: 50px; */
        }

        .signature {
            text-align: center;
            font-weight: bold;
            margin-top: 50px;
            margin-right: 50px;
        }

        .signature p {
            margin: 0;
        }

        .signature img {
            width: 200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            align-self: baseline;
            vertical-align: top;
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
                <h3>SURAT KETERANGAN KELAHIRAN</h3>
                <p>NOMOR: 474/ /V.07/VI.42/VI/2024</p>
            </div>

            <div class="content">
                <p class="paragraph">
                    Yang bertanda tangan dibawah ini Lurah Bakung Kecamatan
                    TelukBetung Barat Kota Bandar Lampung dengan ini
                    menerangkan sesungguhnya:
                </p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>PANI</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td>Bandar Lampung, 18-07-2017</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>Belum/TidakBekerja</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                Jl. Saleh Kramayudha RT 001 LK II, Kelurahan
                                Bakung Kecamatan TelukBetung Barat
                            </td>
                        </tr>
                    </table>
                </div>

                <p class="paragraph">
                    Adalah benar nama tersebut diatas anak pernikahan dari
                    seorang laki-laki:
                </p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>PANI</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td>Bandar Lampung, 18-07-2017</td>
                        </tr>
                        <tr>
                            <td>Bangsa/ Agama</td>
                            <td>:</td>
                            <td>Indonesia / Ilsam</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>Belum/TidakBekerja</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                Jl. Saleh Kramayudha RT 001 LK II, Kelurahan
                                Bakung Kecamatan TelukBetung Barat
                            </td>
                        </tr>
                    </table>
                </div>

                <p class="paragraph">Dengan seorang perempuan:</p>

                <div class="details">
                    <table>
                        <tr>
                            <td style="width: 180px">Nama</td>
                            <td>:</td>
                            <td>PANI</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td>Bandar Lampung, 18-07-2017</td>
                        </tr>
                        <tr>
                            <td>Bangsa/ Agama</td>
                            <td>:</td>
                            <td>Indonesia / Ilsam</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>Belum/TidakBekerja</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                Jl. Saleh Kramayudha RT 001 LK II, Kelurahan
                                Bakung Kecamatan TelukBetung Barat
                            </td>
                        </tr>
                    </table>
                </div>

                <p class="paragraph">
                    Demikian Surat Keterangan ini dibuat dengan sebenarnya
                    dan dapat dipergunakan seperlunya.
                </p>
            </div>

            <div class="footer">
                <div class="inner-footer">
                    <table>
                        <tr>
                            <td>DIKELUARKAN DI</td>
                            <td>:</td>
                            <td>Bandar Lampung</td>
                        </tr>
                        <tr>
                            <td>PADA TANGGAL</td>
                            <td>:</td>
                            <td>20 JUNI 2024</td>
                        </tr>
                    </table>
                    <div class="stemple">
                        <img src="{{ asset('storage/lurah/' . $lurah->stemple) }}" alt="stempel"
                            style="width: 100%; height: 100%">
                    </div>
                    <div class="signature">
                        <p>LURAH BAKUNG</p>
                        <p>KECAMATAN TELUKBETUNG BARAT</p>
                        <img src="{{ asset('surat/ttd.png') }}" alt="ttd">
                        <p style="text-decoration: underline 2px">SIGIT, SE</p>
                        <p>NIP.19761202 200701 1 006</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
