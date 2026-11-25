<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class PetugasAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.petugas-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Kunci pembatasan berdasarkan email dan IP.
        $key = Str::transliterate(
            Str::lower($credentials['email']) . '|' . $request->ip()
        );

        // Periksa apakah batas percobaan sudah tercapai.
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withErrors([
                    'email' => "Terlalu banyak percobaan login. Coba lagi dalam {$seconds} detik.",
                ])
                ->onlyInput('email');
        }

        $berhasil = Auth::guard('petugas')->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'status_akun' => 'Aktif',
        ]);

        if (!$berhasil) {
            RateLimiter::hit($key, 60);

            return back()
                ->withErrors([
                    'email' => 'Email atau password tidak sesuai.',
                ])
                ->onlyInput('email');
        }

        // Reset penghitung jika login berhasil.
        RateLimiter::clear($key);

        $request->session()->regenerate();

        $petugas = Auth::guard('petugas')->user();

        // Redirect berdasarkan role.
        $redirectRoute = match ($petugas->role) {
            'Admin Pusat' => 'admin-pusat.pilih-unit',
            'Admin UPT TIKP' => 'admin-upt.dashboard',
            'Kepala Dinas' => 'kepala-dinas.dashboard',
            'Kepala UPT TIKP' => 'kepala-upt.dashboard',
            default => null,
        };

        if (!$redirectRoute) {
            Auth::guard('petugas')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('petugas.login')
                ->withErrors([
                    'email' => 'Role akun tidak dikenali. Hubungi pengelola sistem.',
                ]);
        }

        return redirect()->route($redirectRoute);
    }

    public function logout(Request $request)
    {
        Auth::guard('petugas')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('petugas.login');
    }
}
