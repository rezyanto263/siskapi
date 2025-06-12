<?php

namespace App\Resolvers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserServiceResolver
{
    

    public static function relation(User $user): HasOne|null
    {
        return match ($user->role->nama) {
            'Mahasiswa' => $user->mahasiswa(),
            'Kepala Prodi' => $user->kepalaProdi(),
            'BAAK' => $user->baak(),
            'UPAPKK' => $user->upapkk(),
            default => null
        };
    }

    public static function withRelation(User $user): User|null
    {
        return match ($user->role->nama) {
            'Mahasiswa' => $user->with('mahasiswa')->first(),
            'Kepala Prodi' => $user->with('kepalaProdi')->first(),
            'BAAK' => $user->with('baak')->first(),
            'UPAPKK' => $user->with('upapkk')->first(),
            default => null
        };
    }

    public static function detail(User $user)
    {
        return match ($user->role->nama) {
            'Mahasiswa' => $user->mahasiswa,
            'Kepala Prodi' => $user->kepalaProdi,
            'BAAK' => $user->baak,
            'UPAPKK' => $user->upapkk,
            default => null
        };
    }
}
