<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'id' => '58302',
            'nama' => 'Teknologi Rekayasa Perangkat Lunak',
            'jenjang' => 'D4',
            'jurusan_id' => '40'
        ]);
    }
}
