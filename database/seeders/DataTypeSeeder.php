<?php

namespace Database\Seeders;

use Database\Seeders\surat\KependudukanSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->call([
            KependudukanSeeder::class,
        ]);

    }
}
