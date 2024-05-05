<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'NIK' => '1234567890123456',
            'name' => 'Test User',
            'email' => 'test@sikab.com',
        ]);

        $user->user_data()->create([
            'alamat' => 'Jl. Jalan Jalan, Bandar Lampung',
            'tempat_lahir' => 'Bandar Lampung',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'L',
            'no_hp' => '0812345xxxx',
        ]);

        $admin = User::factory()->create([
            'NIK' => '01234567890123456',
            'name' => 'Test User Admin',
            'email' => 'test.admin@sikab.com',
            'role' => 'admin',
        ]);

        $admin->user_data()->create([
            'alamat' => 'Jl. Jalan Jalan, Bandar Lampung',
            'tempat_lahir' => 'Bandar Lampung',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'L',
            'no_hp' => '0812345xxxx',
        ]);
    }
}
