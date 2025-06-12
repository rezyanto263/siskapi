<?php

namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface
{
    public function create(array $data): User;
    public function getCurrent(): User;
    public function getUserByEmailFromDatabase(string $email): User|null;
     public function getMahasiswaByEmailFromAPI(string $email): User|null;
    public function updateCurrent(array $data): User;
    public function delete(string $userId): bool;
}
