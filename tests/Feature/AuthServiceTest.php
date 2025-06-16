<?php

namespace Tests\Feature;

use App\Services\Auth\AuthServiceInterface;
use Database\Seeders\JurusanSeeder;
use Database\Seeders\KepalaProdiSeeder;
use Database\Seeders\ProdiSeeder;
use Database\Seeders\RoleSeeder;
use DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    private $authService;

    protected function setUp(): void
    {
        parent::setUp();

        DB::delete('DELETE FROM password_reset_tokens');
        DB::delete('DELETE FROM users');
        DB::delete('DELETE FROM kepala_prodi');
        DB::delete('DELETE FROM roles');
        DB::delete('DELETE FROM prodi');
        DB::delete('DELETE FROM jurusan');

        $this->authService = App::make(AuthServiceInterface::class);
    }

    public function testLoginKaprodi()
    {
        $this->seed([JurusanSeeder::class, ProdiSeeder::class, RoleSeeder::class, KepalaProdiSeeder::class]);

        $success = $this->authService->login([
            'username' => '123456789012345678',
            'password' => 'testkaprodi123'
        ]);

        self::assertTrue($success);
        self::assertNotNull(Auth::user());
    }

    public function testLogout()
    {
        $this->testLoginKaprodi();
        $this->authService->logout();

        self::assertNull(Auth::user());
    }

    public function testForgotPasswordKaprodi()
    {
        $this->seed([JurusanSeeder::class, ProdiSeeder::class, RoleSeeder::class, KepalaProdiSeeder::class]);

        $email = 'testkaprodi@example.com';

        $status = $this->authService->forgotPassword($email);

        self::assertEquals(__('passwords.sent'), $status);
    }

    public function testAPI()
    {
        $academicYear = ['20221', '20222'];
        $email = 'rezyanto263@gmail.com';

        // Mahasiswa
        foreach ($academicYear as $year) {
            $hashCode = strtoupper(hash('sha256', $year . config('services.pnb_api.key')));
            $url = config('services.pnb_api.url') . '/mahasiswa';

            $response = Http::post($url, [
                'tahunAkademik' => $year,
                'HashCode' => $hashCode
            ])->collect('daftar');

            $mahasiswa = $response->firstWhere('email', $email);

            if ($mahasiswa) {
                break;
            }
        }

        Log::info(json_encode($mahasiswa, JSON_PRETTY_PRINT));

        self::assertEquals('2215354081', $mahasiswa['nim']);
    }
}
