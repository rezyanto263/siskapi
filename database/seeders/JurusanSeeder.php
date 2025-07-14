<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hashCodeJurusan = strtoupper(hash('sha256', config('services.pnb_api.key')));

        $jurusan = Http::post(config('services.pnb_api.url'). '/daftarjurusan', [
            'HashCode' => $hashCodeJurusan
        ])->collect('daftar');

        $jurusan->each(function($value) {
            Jurusan::updateOrCreate(
                ['id' => $value['kodeJurusan']],
                ['nama' => $value['namaJurusan']]
            );
        });
    }
}
