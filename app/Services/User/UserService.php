<?php

namespace App\Services\User;

use App\Exceptions\UserException;
use App\Models\Role;
use App\Resolvers\UserServiceResolver;
use App\Models\User;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserService implements UserServiceInterface
{
    public function create(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = new User();

            $user->fill($data);
            $user->username = $data['nim'] ?? $data['nip'];
            $user->save();

            UserServiceResolver::relation($user)->create($data);
            return $user;
        });
    }

    public function getCurrent(): User
    {
        $user = Auth::user();

        if (!$user) {
            throw new UserException('You are unauthorized');
        }

        return UserServiceResolver::withRelation($user);
    }

    public function getUserByEmailFromDatabase(string $email): User|null
    {
        $user = User::where('email', $email)->first();
        return $user ?: null;
    }

    public function getMahasiswaByEmailFromAPI(string $email): User|null
    {
        $exist = $this->getUserByEmailFromDatabase($email);
        if ($exist) {
            return $exist;
        }

        $academicYears = ['20221', '20222'];

        foreach ($academicYears as $year) {
            $hashCode = strtoupper(hash('sha256', $year . config('services.pnb_api.key')));
            $response = Http::post('https://webapi.pnb.ac.id/api/mahasiswa', [
                'tahunAkademik' => $year,
                'HashCode' => $hashCode
            ])->collect('daftar');

            $data = $response->firstWhere('email', $email);

            if ($data) {
                break;
            }
        }

        if (!$data) {
            return null;
        }

        return $this->create($this->mapMahasiswaData($data));
    }

    private function mapMahasiswaData(array $data): array
    {
        $role_id = Role::where('nama', 'Mahasiswa')->first()->id;
        return [
            'nama' => $data['nama'],
            'nim' => $data['nim'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'angkatan' => $data['tahunAkademik'],
            'role_id' => $role_id,
            'prodi_id' => $data['kodeProdi'],
            'jurusan_id' => $data['kodeJurusan']
        ];
    }

    public function updateCurrent(array $data): User
    {
        $user = Auth::user();

        if (!$user) {
            throw new UserException('You are unauthorized');
        }

        DB::transaction(function () use ($user, $data) {
            $userUpdated = $user->update([
                'nama' => $data['nama'],
                'username' => $data['nip'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            if (!$userUpdated) {
                throw new UserException('Failed to update user');
            }

            $relationUpdated = UserServiceResolver::detail($user)->update($data);

            if (!$relationUpdated) {
                throw new UserException('Failed to update user');
            }
        });

        return $this->getCurrent();
    }

    public function delete(string $userId): bool
    {
        return DB::transaction(function () use ($userId) {
            $user = User::find($userId);

            if (!$user) {
                throw new UserException('User not found');
            }

            $user->delete();
            UserServiceResolver::relation($user)->update(['is_active' => false]);

            return true;
        });
    }
}
