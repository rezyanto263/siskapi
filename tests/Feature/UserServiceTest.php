<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use App\Services\User\UserServiceInterface;
use Database\Seeders\JurusanSeeder;
use Database\Seeders\KepalaProdiSeeder;
use Database\Seeders\ProdiSeeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private $userService;

    protected function setUp(): void
    {
        parent::setUp();

        DB::delete('DELETE FROM password_reset_tokens');
        DB::delete('DELETE FROM users');
        DB::delete('DELETE FROM kepala_prodi');
        DB::delete('DELETE FROM roles');
        DB::delete('DELETE FROM prodi');
        DB::delete('DELETE FROM jurusan');

        $this->userService = App::make(UserServiceInterface::class);
    }

    public function testNeedLogin()
    {
        $this->seed([JurusanSeeder::class, ProdiSeeder::class, RoleSeeder::class, KepalaProdiSeeder::class]);
        $success = Auth::attempt([
            'username' => '123456789012345678',
            'password' => 'testkaprodi123'
        ]);
        self::assertTrue($success);
    }

    public function testServiceProvider()
    {
        self::assertInstanceOf(UserServiceInterface::class, $this->userService);
    }

    public function testCreateKaprodi()
    {
        $this->seed([JurusanSeeder::class, ProdiSeeder::class, RoleSeeder::class]);

        $role_id = Role::where('nama', 'Kepala Prodi')->first()->id;
        $insert = $this->userService->create([
            'nama' => 'Test Kaprodi',
            'nip' => '123456789012345678',
            'nidn' => '1234567890',
            'email' => 'testkaprodi@example.com',
            'password' => 'testkaprodi123',
            'angkatan' => '20222',
            'prodi_id' => '58302',
            'role_id' => $role_id,
        ]);

        $user = User::find($insert->id);
        $kepalaProdi = $user->kepalaProdi;

        self::assertNotNull($user);
        self::assertNotNull($kepalaProdi);
        self::assertEquals($insert->id, $user->id);
        self::assertEquals($insert->kepalaProdi->nip, $user->username);
        self::assertEquals($insert->kepalaProdi->nip, $kepalaProdi->nip);
    }

    public function testGetKaprodi()
    {
        $this->testNeedLogin();
        $userWithoutLogin = User::with('kepalaProdi')->where('username', '123456789012345678')->first();
        $userWithLogin = $this->userService->getCurrent();

        self::assertEquals($userWithoutLogin, $userWithLogin);
    }

    public function testUpdateKaprodi()
    {
        $this->testNeedLogin();

        $userOld = Auth::user()->with('kepalaProdi')->first();

        $updated = $this->userService->updateCurrent([
            'nama' => 'Test Kaprodi 123',
            'nip' => '123456789912345678',
            'nidn' => '1234567899',
            'email' => 'testkaprodi123@example.com',
            'password' => 'testkaprodi123',
            'angkatan' => '20221',
            'prodi_id' => '58302'
        ]);

        $userNew = Auth::user()->with('kepalaProdi')->first();
        self::assertNotEquals($userOld, $updated);
        self::assertEquals($userNew, $updated);
    }

    public function testDeleteKaprodi()
    {
        $this->seed([JurusanSeeder::class, ProdiSeeder::class, RoleSeeder::class, KepalaProdiSeeder::class]);

        $user = User::query();

        $success = $this->userService->delete($user->where('username', '123456789012345678')->first()->id);
        self::assertTrue($success);
        self::assertNull($user->where('username', '123456789012345678')->first());
        self::assertNotNull($user->onlyTrashed()->where('username', '123456789012345678')->first()->deleted_at);
    }
}
