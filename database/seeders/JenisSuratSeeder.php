<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Surat Keterangan Domisili',
                'slug' => 'surat-keterangan-domisili',
                'icon' => 'fa-people-group',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Domisili sering diperlukan untuk berbagai keperluan, baik pribadi maupun administratif. Berikut adalah beberapa fungsi utama dari Surat Keterangan Domisili:',
                    'functions' => [
                        'Pembuatan KTP atau Perubahan Data KTP serta pembuatan Kartu Keluarga',
                        'Pengurusan Paspor',
                        'Izin Mendirikan Bangunan (IMB)',
                        'Pengajuan Gugatan atau Dokumen Hukum',
                        'Keterangan Pindah Alamat dan Kedatangan di Wilayah Baru',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'slug' => 'surat-keterangan-tidak-mampu',
                'icon' => 'fa-hand-holding-dollar',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Tidak Mampu digunakan untuk berbagai keperluan administratif, terutama untuk mendapatkan keringanan biaya atau bantuan dari pemerintah maupun institusi lainnya. Berikut adalah beberapa fungsi utama dari Surat Keterangan Tidak Mampu:',
                    'functions' => [
                        'Keringanan Biaya Sekolah',
                        'Pengajuan Beasiswa dan Pembebasan Biaya Kuliah di Perguruan Tinggi',
                        'Pengurusan Bantuan Biaya Kesehatan',
                        'Pendaftaran atau Pengajuan Bantuan Sosial',
                        'Pembebasan atau Keringanan Pajak Daerah',
                        'Pengajuan Program Perumahan Subsidi',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Kematian',
                'slug' => 'surat-kematian',
                'icon' => 'fa-bed-pulse',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Kematian diperlukan untuk berbagai keperluan administratif, hukum, dan keuangan bagi keluarga atau ahli waris. Berikut adalah beberapa fungsi utama dari Surat Kematian: ',
                    'functions' => [
                        'Pencatatan Sipil',
                        'Pengurusan Data Administratif',
                        'Pengajuan Surat Keterangan Ahli Waris',
                        'Klaim Asuransi Jiwa maupun Kesehatan',
                        'Penghentian Pembayaran Pensiun atau Tunjangan',
                        'Pengurusan Jaminan Sosial',
                        'Penghentian Pembayaran Pajak',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan',
                'slug' => 'surat-keterangan',
                'icon' => 'fa-shop',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan diperlukan dalam berbagai keperluan administratif. Berikut adalah beberapa fungsi utama dari berbagai jenis Surat Keterangan yang dikeluarkan oleh kelurahan:',
                    'functions' => [
                        'Surat Keterangan Kehilangan',
                        'Surat Keterangan Ahli Waris',
                        'Surat Keterangan Perbedaan Data',
                        'Surat Pengantar Cerai',
                        'Surat Keterangan Kepemilikan Rumah dan Tanah',
                        'Surat Keterangan Bekerja di Luar Negeri',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Sudah Menikah',
                'slug' => 'surat-sudah-menikah',
                'icon' => 'fa-heart-circle-check',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Sudah Menikah diperlukan untuk berbagai keperluan administratif, hukum, maupun sosial. Berikut adalah beberapa fungsi utama dari Surat Keterangan Sudah Menikah: ',
                    'functions' => [
                        'Pengurusan Tunjangan Keluarga',
                        'Tambahan Tertanggung dalam Asuransi',
                        'Pengajuan Kredit atau Pinjaman Bersama',
                        'Pengurusan Visa dan Keperluan Imigrasi',
                        'Pengajuan Hak Waris',
                        'Pengurusan Kartu Keluarga',
                        'Pengajuan Cuti Pernikahan',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Bersih Diri',
                'slug' => 'surat-bersih-diri',
                'icon' => 'fa-hand-sparkles',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Bersih Diri (SKBD) adalah dokumen yang menyatakan bahwa seseorang tidak memiliki catatan kriminal atau masalah hukum. Surat ini dikeluarkan oleh pihak berwenang seperti kelurahan atau kepolisian, dan biasanya diperlukan untuk keperluan tertentu yang memerlukan pembuktian bahwa seseorang bersih dari masalah hukum. Berikut beberapa penggunaan dari Surat Keterangan Bersih Diri:',
                    'functions' => [
                        'Melamar Pekerjaan',
                        'Pengajuan Visa atau Keperluan Imigrasi',
                        'Pendaftaran Sekolah atau Beasiswa',
                        'Pengajuan Izin Tinggal atau Kewarganegaraan',
                        'Pengajuan Kredit atau Pinjaman',
                        'Pengurusan Sertifikasi atau Lisensi Khusus',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'slug' => 'surat-keterangan-usaha',
                'icon' => 'fa-shop',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Usaha (SKU) adalah dokumen resmi yang dikeluarkan oleh kelurahan atau instansi pemerintah terkait untuk menyatakan bahwa seseorang memiliki usaha yang sah. SKU ini sering dibutuhkan dalam berbagai keperluan administratif dan legal. Berikut adalah beberapa fungsi utama dari Surat Keterangan Usaha:',
                    'functions' => [
                        'Pengajuan Pinjaman atau Kredit Usaha',
                        'Pengajuan Bantuan Usaha dari Pemerintah',
                        'Pengurusan Izin Usaha',
                        'Pengajuan Tempat Usaha atau Lokasi Bisnis',
                        'Pengurusan Sertifikasi Halal atau Sertifikasi Lainnya',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Pindah',
                'slug' => 'surat-pindah',
                'icon' => 'fa-suitcase-rolling',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Pindah adalah dokumen resmi yang dikeluarkan oleh kantor kelurahan atau kecamatan yang menyatakan bahwa seseorang atau sebuah keluarga telah pindah tempat tinggal dari satu daerah ke daerah lainnya. Dokumen ini berfungsi untuk mengurus administrasi kependudukan di tempat tujuan. Berikut beberapa fungsi utama dari Surat Keterangan Pindah:',
                    'functions' => [
                        'Pengurusan Pindah Domisili',
                        'Pindah Hak Pemilih dalam Pemilu',
                        'Pengurusan Jaminan Sosial',
                        'Pengurusan Perpindahan Alamat pada Bank dan Lembaga Keuangan',
                        'Pengurusan Pajak dan Kendaraan Bermotor',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Penghasilan',
                'slug' => 'surat-penghasilan',
                'icon' => 'fa-hand-holding-dollar',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Penghasilan adalah dokumen resmi yang menyatakan jumlah pendapatan seseorang selama periode tertentu. Dokumen ini sering dikeluarkan oleh instansi tempat seseorang bekerja atau oleh pemerintah setempat, seperti kelurahan, untuk pengusaha atau pekerja informal. Berikut adalah beberapa fungsi utama Surat Keterangan Penghasilan:',
                    'functions' => [
                        'Pengajuan Kredit atau Pinjaman di Bank',
                        'Pengajuan Kartu Kredit',
                        'Pengajuan Keringanan Biaya Sekolah atau Bantuan Pendidikan',
                        'Bukti Kemampuan Finansial',
                        'Pengajuan Sewa Rumah KPR atau Cicilan Properti',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Pengantar SKCK',
                'slug' => 'surat-skck',
                'icon' => 'fa-file-invoice',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Pengantar Keterangan Catatan Kepolisian (SKCK) dari kelurahan berfungsi sebagai dokumen resmi yang mempermudah proses pengajuan SKCK di kepolisian. Berikut adalah beberapa kegunaan dari SKCK yang dikeluarkan oleh kelurahan:',
                    'functions' => [
                        'Dokumen Pendukung Surat Keterangan Catatan Kepolisian (SKCK)',
                        'Pendaftaran Pekerjaan',
                        'Pendaftaran Pendidikan',
                        'Pengurusan Visa dan Imigrasi',
                        'Pengurusan Dokumen Hukum',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Pengantar Nikah',
                'slug' => 'surat-pengantar-nikah',
                'icon' => 'fa-hand-holding-heart',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Pengantar Nikah adalah dokumen resmi yang dikeluarkan oleh kelurahan atau instansi terkait yang memberikan pengantar bagi pasangan yang akan menikah. Surat ini biasanya digunakan untuk berbagai keperluan dalam proses pernikahan, antara lain:',
                    'functions' => [
                        'Pengajuan Pernikahan di KUA',
                        'Pendaftaran Pernikahan di Catatan Sipil',
                        'Verifikasi Status Perkawinan',
                        'Pengajuan Kartu Keluarga',
                        'Pencairan Dana Program Keluarga',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Belum Menikah',
                'slug' => 'surat-belum-menikah',
                'icon' => 'fa-heart-circle-xmark',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Belum Menikah adalah dokumen resmi yang dikeluarkan oleh kelurahan atau instansi terkait untuk menyatakan bahwa seseorang belum pernah menikah. Surat ini biasanya digunakan untuk berbagai keperluan administratif dan legal, antara lain:',
                    'functions' => [
                        'Pengajuan Permohonan Nikah',
                        'Pendaftaran Beasiswa',
                        'Pendaftaran di Institusi Pendidikan',
                        'Pengajuan Visa',
                        'Pembuatan Kartu Keluarga Baru',
                    ]
                ]),
            ],
            [
                'name' => 'Surat Keterangan Kelahiran',
                'slug' => 'surat-kelahiran',
                'icon' => 'fa-baby',
                'deskrisi' => json_encode([
                    'requirements' => ['KTP', 'Kartu Keluarga'],
                    'data' => 'Surat Keterangan Kelahiran adalah dokumen resmi yang dikeluarkan oleh instansi pemerintah, seperti kelurahan atau rumah sakit, yang mencatat kelahiran seseorang. Surat ini biasanya digunakan untuk berbagai keperluan administratif, antara lain:',
                    'functions' => [
                        'Pendaftaran Akta Kelahiran',
                        'Pembuatan Kartu Keluarga',
                        'Pengurusan Hak Waris',
                        'Dokumen Pendukung dalam Pengajuan Visa untuk Anak',
                    ]
                ]),
            ],
        ];

        JenisSurat::insert($data);
    }
}
