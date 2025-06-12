<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
    public function login(array $credentials, bool $remember = false): bool;
    public function logout(): void;
    public function forgotPassword(string $email): string;
    public function resetPassword(array $data): bool;
}
