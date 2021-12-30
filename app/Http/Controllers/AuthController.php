<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function emailVerificationHandler(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/dashboard');
    }

    public function emailVerificationNotice()
    {
        if (auth()->user()->email_verified_at) {
            return redirect('/dashboard');
        }

        return view('auth.verify-email', [
            'title' => 'Verifikasi Email',
            'user' => User::find(Auth::user()->id)
        ]);
    }

    public function resendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Tautan baru verifikasi email terkirim!');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password', [
            'title' => 'Lupa Password'
        ]);
    }

    public function sendResetPasswordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email:dns']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => 'Tautan reset password berhasil terkirim ke ' . $request['email'] . '. Silahkan cek kotak masuk email Anda!'])
            : back()->with(['email' => 'Tautan reset password gagal terkirim ke ' . $request['email'] . '. Silahkan cek kembali email yang Anda masukkan!']);
    }

    public function passwordResetToken(Request $request, $token)
    {
        return view('auth.reset-password', [
            'title' => 'Reset Password',
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Password berhasil direset. Silahkan login kembali!')
            : back()->with(['email' => 'Password gagal direset.']);
    }
}
