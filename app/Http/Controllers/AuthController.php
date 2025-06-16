<?php

namespace App\Http\Controllers;

use App\Exceptions\UserException;
use App\Http\Requests\Auth\AccountSetupRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Services\Auth\AuthServiceInterface;
use App\Exceptions\MailException;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private AuthServiceInterface $authService
    ) {}

    public function showRegistrationForm(Request $request)
    {
        return match ($request->query('type') ?? 'student') {
            'student' => view('auth.register-student'),
            'employee' => view('auth.register-employee'),
            default => abort(404)
        };
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        try {
            $success = $this->authService->register(
                $data['nim'] ?? $data['token'],
                $data['email'],
                $data['type']
            );

            return $success
                ? redirect('/login')->with('status', __('auth.register.verification_required'))
                : back()->withErrors(['status' => __('auth.register.verification_failed')]);
        } catch (UserException $e) {
            return back()->withErrors(['status' => $e->getMessage()]);
        }
    }

    public function showAccountSetupForm(Request $request)
    {
        $data = $request->only('token', 'username');
        return $data
            ? view('auth.account-setup', $data)
            : redirect('/login')->withErrors(['status' => __('exceptions.registration_token_invalid')]);
    }

    public function accountSetup(AccountSetupRequest $request)
    {
        $data = $request->validated();

        try {
            $success = $this->authService->accountSetup($data['token'], $data['password']);

            if (!$success) {
                throw new UserException(__('auth.register.error'));
            }

            return redirect('/login')->with('status', __('auth.register.verification_success'));
        } catch (UserException $e) {
            return back()->withErrors(['status' => $e->getMessage()]);
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        try {
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
        } catch (UserException $e) {
            return back()->withErrors(['status' => $e->getMessage()]);
        }
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
            $status = $this->authService->forgotPassword($request->input('email'));
            return back()->with('status', $status);
        } catch(MailException $e) {
            return back()->withErrors(['status' => $e->getMessage()]);
        }
    }

    public function showResetPasswordForm(Request $request)
    {
        $data = $request->only('token', 'email');

        return $data
            ? view('auth.reset-password', $data)
            : redirect('/login')->withErrors(['status' => __('passwords.token')]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $data = $request->validated();

        try {
            $status = $this->authService->resetPassword($data);
            return redirect('/login')->with('status', $status);
        } catch (UserException $e) {
            return back()->withErrors(['status' => $e->getMessage()]);
        }
    }
}
