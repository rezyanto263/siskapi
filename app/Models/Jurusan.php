<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $keyType = 'string';
    public $incrementing = false;

    public function prodis(): HasMany
    {
        return $this->hasMany(Prodi::class, 'prodi_id', 'id');
    }
}
