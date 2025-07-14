<?php

namespace App\Services\Kegiatan;

use App\Models\User;

interface KegiatanServiceInterface
{
    public function getUserKegiatan(User $user);
}
