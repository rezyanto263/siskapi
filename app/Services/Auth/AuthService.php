<?php

namespace App\Services\Auth;

use App\Exceptions\MailException;
use App\Services\Auth\AuthServiceInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        private UserServiceInterface $userService
    ) {}

    public function login(array $credentials, bool $remember = false): bool
    {
        $field = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $credentials['username'], 'password' => $credentials['password']], $remember)) {
            Session::regenerate();
            return true;
        }

        return false;
    }

    public function logout(): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
    }

    public function forgotPassword(string $email): string
    {
        $user = $this->userService->getUserByEmailFromDatabase($email) ?? $this->userService->getMahasiswaByEmailFromAPI($email);

        if (!$user) {
            throw new MailException(__('password.user'));
        }

        $status = Password::sendResetLink($user->email);

        if ($status != Password::RESET_LINK_SENT) {
            return $status;
        }

        throw new MailException(__($status));
    }

    public function resetPassword(array $credentials): bool
    {
        $user = $this->userService->getUserByEmailFromDatabase($credentials['email']);

        if ($user) {
            $status = Password::reset($credentials, function () {

            });
        }

        return true;
    }
}
