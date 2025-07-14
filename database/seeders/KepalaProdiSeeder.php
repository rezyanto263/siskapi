<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KepalaProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_id = Role::where('nama', Role::KEPALA_PRODI)->value('id');
        $nip = '000000000000000001';
        $user = User::updateOrCreate(
            ['username' => $nip],
            [
                'nama' => 'Test Kaprodi',
                'email' => 'testkaprodi@example.com',
                'password' => 'testkaprodi123',
                'role_id' => $role_id,
            ]
        );
        $user->kepalaProdi()->updateOrCreate(
            ['nip' => $nip],
            [
                'nidn' => '1234567890',
                'angkatan' => '20222',
                'prodi_id' => '58302',
                'is_active' => true,
            ]
        );
    }
}
