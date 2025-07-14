<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpapkkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_id = Role::where('nama', Role::UPAPKK)->value('id');
        $nip = '000000000000000003';
        $user = User::updateOrCreate(
            ['username' => $nip],
            [
                'nama' => 'Test UPAPKK',
                'email' => 'testupapkk@example.com',
                'password' => 'testupapkk123',
                'role_id' => $role_id,
            ]
        );
        $user->upapkk()->updateOrCreate(
            ['nip' => $nip],
            ['is_active' => true]
        );
    }
}
