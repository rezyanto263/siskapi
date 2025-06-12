<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthServiceContract;
use App\Exceptions\MailException;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(
        private AuthServiceContract $authService
    ) {
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $success = $this->authService->login($data, $data['remember'] ?? false);

        if ($success) {
            return match (Auth::user()->role->nama) {
                'Mahasiswa' => redirect()->intended('/'),
                'UPAPKK' => redirect()->intended('/'),
                'Kepala Prodi' => redirect()->intended('/'),
                'BAAK' => redirect()->intended('/'),
                default => abort(401, 'Unauthorized')
            };
        }

        return back()->withErrors(['status' => __('auth.failed')]);
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect('/login');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        try {
            $status = $this->authService->forgotPassword($request->only('email'));
            return back()->with('status', $status);
        } catch(MailException $e) {
            return back()->withErrors(['status' => $e->getMessage()]);
        }
    }

    public function showResetPasswordForm(string $token = null)
    {
        return $token
            ? view('auth.reset-password', ['token' => $token])
            : redirect('/login')->withErrors(['status' => __('passwords.token')]);
    }

    public function resetPassword(Request $request)
    {
        
    }
}
