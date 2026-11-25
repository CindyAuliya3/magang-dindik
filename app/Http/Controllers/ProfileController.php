<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $peserta = Auth::guard('peserta')->user();

        return view('peserta.profil', compact('peserta'));
    }

    public function update(Request $request)
    {
        $peserta = Auth::guard('peserta')->user();

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nomor_induk' => ['nullable', 'string', 'max:255'],
            'nama_instansi' => ['nullable', 'string', 'max:255'],
            'jurusan' => ['nullable', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('peserta_magang', 'email')
                    ->ignore($peserta->id_peserta, 'id_peserta'),
            ],
            'alamat' => ['nullable', 'string'],
            'kelurahan' => ['nullable', 'string', 'max:255'],
            'kecamatan' => ['nullable', 'string', 'max:255'],
            'kabupaten_kota' => ['nullable', 'string', 'max:255'],
            'provinsi' => ['nullable', 'string', 'max:255'],
        ]);

        $peserta->update($validated);

        return back()->with('success', 'Data profil berhasil diperbarui.');
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto_profil' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        $peserta = Auth::guard('peserta')->user();

        if ($peserta->foto_profil) {
            Storage::disk('public')->delete($peserta->foto_profil);
        }

        $path = $request->file('foto_profil')
            ->store('foto-profil-peserta', 'public');

        $peserta->update([
            'foto_profil' => $path,
        ]);

        return back()->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function hapusFoto()
    {
        $peserta = Auth::guard('peserta')->user();

        if ($peserta->foto_profil) {
            Storage::disk('public')->delete($peserta->foto_profil);

            $peserta->update([
                'foto_profil' => null,
            ]);
        }

        return back()->with('success', 'Foto profil berhasil dihapus.');
    }

    /**
     * Memperbarui kata sandi peserta.
     */
    public function updatePassword(Request $request)
    {
        $peserta = Auth::guard('peserta')->user();

        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'different:current_password',
            ],
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
            'password.different' => 'Kata sandi baru harus berbeda dari kata sandi saat ini.',
        ]);

        if (! Hash::check($validated['current_password'], $peserta->password)) {
            return back()->withErrors([
                'current_password' => 'Kata sandi saat ini yang kamu masukkan salah.',
            ]);
        }

        $peserta->password = $validated['password'];
        $peserta->save();

        return back()->with('success', 'Kata sandi berhasil diperbarui.');
    }
}
