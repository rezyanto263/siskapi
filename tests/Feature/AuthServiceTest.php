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
            'login' => '123456789012345678',
            'password' => 'testkaprodi'
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

    public function testAPI()
    {
        $academicYear = ['20221', '20222'];
        $email = 'ayulestari2563@gmail.com';

        // Mahasiswa
        for ($i = 0; $i < count($academicYear); $i++) {
            $hashCode = strtoupper(hash('sha256', $academicYear[$i] . config('services.pnb_api.key')));
            $response = Http::post('https://webapi.pnb.ac.id/api/mahasiswa', [
                'tahunAkademik' => $academicYear[$i],
                'HashCode' => $hashCode
            ])->collect('daftar');

            $mahasiswa = $response->firstWhere('email', $email);

            if ($mahasiswa) {
                break;
            }
        }

        Log::info(json_encode($mahasiswa, JSON_PRETTY_PRINT));

        self::assertEquals('2215354045', $mahasiswa['nim']);
    }
}
