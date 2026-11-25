<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PesertaMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class PesertaAuthController extends Controller
{
    /**
     * Menampilkan halaman registrasi peserta.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Memproses registrasi peserta.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            // Data diri
            'nama' => ['required', 'string', 'max:255'],
            'nik' => [
                'required',
                'string',
                'size:16',
                'unique:peserta_magang,nik',
            ],
            'no_telepon' => ['required', 'string', 'max:255'],

            // Alamat domisili
            'provinsi' => ['nullable', 'string'],
            'kabupaten_kota' => ['nullable', 'string'],
            'kecamatan' => ['nullable', 'string'],
            'kelurahan' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'],

            // Data pendidikan
            'jenjang_pendidikan' => [
                'nullable',
                'in:MAHASISWA,SMK',
            ],
            'nama_instansi' => ['nullable', 'string'],
            'jurusan' => ['nullable', 'string'],
            'nomor_induk' => ['nullable', 'string'],

            // Keamanan akun
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:peserta_magang,email',
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
        ]);

        $peserta = PesertaMagang::create([
            'nama' => $validated['nama'],
            'nik' => $validated['nik'],
            'no_telepon' => $validated['no_telepon'],

            'provinsi' => $validated['provinsi'] ?? null,
            'kabupaten_kota' => $validated['kabupaten_kota'] ?? null,
            'kecamatan' => $validated['kecamatan'] ?? null,
            'kelurahan' => $validated['kelurahan'] ?? null,
            'alamat' => $validated['alamat'] ?? null,

            'jenjang_pendidikan' => $validated['jenjang_pendidikan'] ?? null,
            'nama_instansi' => $validated['nama_instansi'] ?? null,
            'jurusan' => $validated['jurusan'] ?? null,
            'nomor_induk' => $validated['nomor_induk'] ?? null,

            'email' => $validated['email'],
            'password' => $validated['password'],
            'status_akun' => 'Aktif',
            'created_at' => now(),
        ]);

        Auth::guard('peserta')->login($peserta);

        $request->session()->regenerate();

        return redirect()->route('peserta.dashboard');
    }

    /**
     * Menampilkan halaman login peserta.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Memproses login peserta dengan Rate Limiting.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Membuat kunci berdasarkan email dan alamat IP.
        $key = Str::transliterate(
            Str::lower($credentials['email']) . '|' . $request->ip()
        );

        // Memeriksa batas percobaan login.
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withErrors([
                    'email' => "Terlalu banyak percobaan login. Coba lagi dalam {$seconds} detik.",
                ])
                ->onlyInput('email');
        }

        // Memeriksa email, status akun, dan password.
        $peserta = PesertaMagang::where('email', $credentials['email'])
            ->where('status_akun', 'Aktif')
            ->first();

        if (
            !$peserta ||
            !Hash::check($credentials['password'], $peserta->password)
        ) {
            // Mencatat percobaan login gagal selama 60 detik.
            RateLimiter::hit($key, 60);

            return back()
                ->withErrors([
                    'email' => 'Email atau password tidak sesuai.',
                ])
                ->onlyInput('email');
        }

        // Menghapus penghitung setelah login berhasil.
        RateLimiter::clear($key);

        Auth::guard('peserta')->login($peserta);

        // Regenerasi session setelah login berhasil.
        $request->session()->regenerate();

        return redirect()->route('peserta.dashboard');
    }

    /**
     * Memproses logout peserta.
     */
    public function logout(Request $request)
    {
        Auth::guard('peserta')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
