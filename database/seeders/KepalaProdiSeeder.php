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
        $user = User::create([
            'nama' => 'Test Kaprodi',
            'username' => '123456789012345678',
            'email' => 'testkaprodi@example.com',
            'password' => 'testkaprodi123',
            'role_id' => $role_id,
        ]);
        $user->kepalaProdi()->create([
            'nip' => '123456789012345678',
            'nidn' => '1234567890',
            'angkatan' => '20222',
            'prodi_id' => '58302',
            'is_active' => true,
        ]);
    }
}
