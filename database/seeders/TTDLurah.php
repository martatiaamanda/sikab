<?php

namespace Database\Seeders;

use App\Models\lurah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TTDLurah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lurah = lurah::first();

        $lurah->tanda_tangan = 'fake-signature-word-vector.jpg';
        $lurah->save();
    }
}
