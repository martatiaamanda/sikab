<?php

namespace Database\Seeders;

use App\Models\InputField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surat_kependudkan = [
            [
                'jenis_surat_id' => 1,
                'name' => 'nama',
                'type' => 'text',
                'title' => 'Nama Lengkap',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'tanggal_lahir',
                'type' => 'date',
                'title' => 'Nama Lengkap',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'jenis_kelamin',
                'type' => 'option',
                'title' => 'Jenis Kelamin',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'alamat',
                'type' => 'option',
                'title' => 'Alamat Lengkap',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'nama_ibu',
                'type' => 'option',
                'title' => 'Nama Ibu',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'umur_ibu',
                'type' => 'option',
                'title' => 'Umur Ibu',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'Pekerjaan_ibu',
                'type' => 'option',
                'title' => 'Pekerjaan Ibu',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'alamat_ibu',
                'type' => 'option',
                'title' => 'Alamat Ibu',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'nama_ayah',
                'type' => 'option',
                'title' => 'Nama Ayah',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'umur_ayah',
                'type' => 'option',
                'title' => 'Umur Ayah',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'Pekerjaan_ayah',
                'type' => 'option',
                'title' => 'Pekerjaan Ayah',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'alamat_ayah',
                'type' => 'option',
                'title' => 'Alamat Ayah',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'kartu_keluarga',
                'type' => 'file',
                'title' => 'Scan Dokumen Kartu Keluarga',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'KTP',
                'type' => 'file',
                'title' => 'Scan Dokumen KTP Asli',
                'validate' => 'required'
            ],
            [
                'jenis_surat_id' => 1,
                'name' => 'SKTM',
                'type' => 'file',
                'title' => 'Surat Keterangan Tidak Mampu dari RT/RW Setempat',
                'validate' => 'required'
            ],
        ];

        InputField::insert($surat_kependudkan);


    }
}
