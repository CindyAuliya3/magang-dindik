<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Portal Magang Dispendik Jatim</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', Arial, sans-serif;
        }

        :root {
            --blue: #0b3d9e;
            --blue-hover: #09327f;
            --text: #20212b;
            --label: #3a3f55;
            --muted: #606477;
            --border: #d9dce8;
            --danger: #c62828;
        }

        .register-page {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            height: 100vh;
            min-height: 0;
            background: #f7f6ff;
        }

        /* ================= HERO ================= */
        .register-hero {
            position: relative;
            display: flex;
            align-items: flex-end;
            height: 100%;
            min-height: 0;
            padding: 28px 20px;
            color: white;
            background-image:
                linear-gradient(to top, rgba(5, 18, 37, 0.88), rgba(5, 18, 37, 0.12)),
                url('/images/gedung.jpg');
            background-position: center;
            background-size: cover;
        }

        .register-hero-content {
            position: relative;
            z-index: 1;
            max-width: 540px;
        }

        .register-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 16px;
            padding: 7px 13px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.15);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.6px;
        }

        .register-hero h1 {
            margin: 0 0 10px;
            color: white;
            font-size: clamp(25px, 2.1vw, 30px);
            font-weight: 700;
            line-height: 1.25;
            letter-spacing: -0.4px;
        }

        .register-hero p {
            max-width: 540px;
            margin: 0;
            color: rgba(255, 255, 255, 0.9);
            font-size: 13px;
            line-height: 1.8;
        }

        /* ================= PANEL ================= */
        .register-panel {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            min-width: 0;
            padding: 24px;
            overflow-y: auto;
        }

        .register-card {
            width: 100%;
            max-width: 440px;
            margin: auto 0 0;
            flex-shrink: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 8px rgba(25, 35, 70, 0.05);
        }

        /* TABS */
        .register-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid var(--border);
        }

        .register-tab {
            padding: 16px 10px;
            border-bottom: 2px solid transparent;
            color: #303447;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.4px;
            text-align: center;
            text-decoration: none;
        }

        .register-tab.active {
            border-bottom-color: var(--blue);
            color: var(--blue);
            font-weight: 700;
        }

        .register-card-body {
            padding: 28px 30px 30px;
        }

        .register-heading h2 {
            margin: 0 0 6px;
            color: var(--text);
            font-size: 20px;
            font-weight: 700;
            line-height: 1.3;
        }

        .register-heading p {
            margin: 0 0 24px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* SECTION (KARTU) */
        .register-section {
            margin: 0 0 20px;
            padding: 18px 20px 20px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 6px rgba(25, 35, 70, 0.08);
        }

        .register-section h3 {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 0 14px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e8eaf2;
            color: var(--text);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .register-section-icon {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            color: var(--blue);
        }

        .register-fields {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .register-field label {
            display: block;
            margin-bottom: 6px;
            color: var(--label);
            font-size: 11px;
            font-weight: 600;
        }

        .register-field input,
        .register-field select,
        .register-field textarea {
            display: block;
            width: 100%;
            min-width: 0;
            height: 36px;
            padding: 0 12px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: white;
            color: var(--text);
            font-family: inherit;
            font-size: 12px;
            line-height: 1.4;
        }

        .register-field textarea {
            height: auto;
            min-height: 64px;
            padding: 10px 12px;
            resize: vertical;
        }

        .register-field input::placeholder,
        .register-field textarea::placeholder {
            color: #9a9db0;
        }

        .register-field select {
            appearance: none;
            -webkit-appearance: none;
            padding-right: 32px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23606477' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            cursor: pointer;
        }

        .register-field select:disabled {
            background-color: #f6f7fb;
            cursor: not-allowed;
        }

        .register-field input:focus,
        .register-field select:focus,
        .register-field textarea:focus {
            outline: none;
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(11, 61, 158, 0.12);
        }

        /* Kolom yang error */
        .register-field.has-error input,
        .register-field.has-error select,
        .register-field.has-error textarea {
            border-color: var(--danger);
        }

        .field-error {
            margin-top: 5px;
            color: var(--danger);
            font-size: 10px;
        }

        /* PASSWORD */
        .password-wrap {
            position: relative;
        }

        .password-wrap input {
            padding-right: 38px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            display: flex;
            padding: 2px;
            border: 0;
            background: none;
            color: var(--muted);
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-toggle svg {
            width: 16px;
            height: 16px;
        }

        .strength-bar {
            width: 100%;
            height: 4px;
            margin-top: 8px;
            overflow: hidden;
            border-radius: 99px;
            background: #e6e8f0;
        }

        .strength-fill {
            width: 0;
            height: 100%;
            border-radius: 99px;
            background: var(--danger);
            transition: width .2s, background .2s;
        }

        .strength-text {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
        }

        /* TOMBOL */
        .register-submit {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            min-height: 44px;
            border: 0;
            border-radius: 8px;
            background: var(--blue);
            color: white;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .register-submit:hover {
            background: var(--blue-hover);
        }

        .register-submit:disabled {
            background: #9db0d9;
            cursor: not-allowed;
        }

        .register-submit svg {
            width: 16px;
            height: 16px;
        }

        .register-copyright {
            margin: 22px 0 auto;
            color: #55586b;
            font-size: 10px;
            text-align: center;
            line-height: 1.7;
        }

        .register-error {
            margin-bottom: 18px;
            color: var(--danger);
            font-size: 12px;
        }

        .register-error ul {
            margin: 0;
            padding-left: 18px;
        }

        /* ================= HP ================= */
        @media (max-width: 760px) {
            .register-page {
                grid-template-columns: 1fr;
                height: auto;
            }

            .register-hero {
                height: 270px;
                min-height: 270px;
                padding: 24px;
            }

            .register-panel {
                height: auto;
                overflow: visible;
                padding: 28px 16px;
            }

            .register-card {
                margin: 0;
            }

            .register-card-body {
                padding: 24px 16px 26px;
            }

            .register-section {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
@php
    /* Semua field yang punya pesan error sendiri di bawah kolomnya */
    $fieldKeys = [
        'nama', 'nik', 'no_telepon',
        'provinsi', 'kabupaten_kota', 'kecamatan', 'kelurahan', 'alamat',
        'jenjang_pendidikan', 'nama_instansi', 'jurusan', 'nomor_induk',
        'email', 'password', 'password_confirmation',
    ];

    /* Error di luar daftar di atas ditampilkan sebagai daftar umum */
    $errorUmum = collect($errors->getMessages())->except($fieldKeys)->flatten();
@endphp

<main class="register-page">

    <!-- HERO -->
    <section class="register-hero">
        <div class="register-hero-content">
            <div class="register-badge">
                <span aria-hidden="true">◇</span>
                INTERNSHIP PORTAL
            </div>

            <h1>Selamat Datang di Portal Magang Dinas Pendidikan</h1>

            <p>
                Platform terpadu untuk pendaftaran, seleksi, dan
                manajemen kegiatan magang bagi mahasiswa dan siswa
                di lingkungan Dinas Pendidikan Provinsi Jawa Timur.
            </p>
        </div>
    </section>

    <!-- PANEL FORM -->
    <section class="register-panel">

        <div class="register-card">

            <nav class="register-tabs" aria-label="Autentikasi">
                <a href="{{ route('login') }}" class="register-tab">Masuk</a>

                <a href="{{ route('register') }}"
                   class="register-tab active"
                   aria-current="page">Daftar</a>
            </nav>

            <div class="register-card-body">

                <div class="register-heading">
                    <h2>Registrasi Akun</h2>
                    <p>Lengkapi data diri Anda untuk memulai program magang.</p>
                </div>

                {{-- Error umum (yang tidak terkait kolom tertentu) --}}
                @if ($errorUmum->isNotEmpty())
                    <div class="register-error">
                        <ul>
                            @foreach ($errorUmum as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" id="registerForm">
                    @csrf

                    <!-- DATA DIRI -->
                    <section class="register-section">
                        <h3>
                            <svg class="register-section-icon" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="8" r="3.5"></circle>
                                <path d="M5 20v-1.5a7 7 0 0 1 14 0V20z"></path>
                            </svg>
                            Data Diri
                        </h3>

                        <div class="register-fields">

                            <div class="register-field @error('nama') has-error @enderror">
                                <label for="nama">Nama Lengkap (Sesuai KTP)</label>
                                <input id="nama" name="nama" type="text"
                                       value="{{ old('nama') }}"
                                       placeholder="Nama lengkap sesuai KTP"
                                       autocomplete="name" required autofocus>
                                @error('nama')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('nik') has-error @enderror">
                                <label for="nik">NIK (16 Digit)</label>
                                <input id="nik" name="nik" type="text"
                                       value="{{ old('nik') }}"
                                       placeholder="Masukkan 16 digit NIK"
                                       maxlength="16" inputmode="numeric"
                                       pattern="[0-9]{16}"
                                       title="NIK harus 16 digit angka" required>
                                @error('nik')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('no_telepon') has-error @enderror">
                                <label for="no_telepon">No. WhatsApp/Telepon</label>
                                <input id="no_telepon" name="no_telepon" type="tel"
                                       value="{{ old('no_telepon') }}"
                                       placeholder="08xxxxxxxxxx"
                                       autocomplete="tel" inputmode="tel" required>
                                @error('no_telepon')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </section>

                    <!-- ALAMAT DOMISILI -->
                    <section class="register-section">
                        <h3>
                            <svg class="register-section-icon" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m3 10 9-7 9 7"></path>
                                <path d="M5 9v12h14V9"></path>
                                <path d="M9 21v-7h6v7"></path>
                            </svg>
                            Alamat Domisili
                        </h3>

                        <div class="register-fields">

                            <div class="register-field @error('provinsi') has-error @enderror">
                                <label for="provinsi">Provinsi</label>
                                <select id="provinsi" name="provinsi" required
                                        data-ph="Pilih Provinsi" data-old="{{ old('provinsi') }}">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                                @error('provinsi')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('kabupaten_kota') has-error @enderror">
                                <label for="kabupaten_kota">Kabupaten/Kota</label>
                                <select id="kabupaten_kota" name="kabupaten_kota" required disabled
                                        data-ph="Pilih Kabupaten/Kota" data-old="{{ old('kabupaten_kota') }}">
                                    <option value="">Pilih Kabupaten/Kota</option>
                                </select>
                                @error('kabupaten_kota')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('kecamatan') has-error @enderror">
                                <label for="kecamatan">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" required disabled
                                        data-ph="Pilih Kecamatan" data-old="{{ old('kecamatan') }}">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                @error('kecamatan')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('kelurahan') has-error @enderror">
                                <label for="kelurahan">Kelurahan/Desa</label>
                                <select id="kelurahan" name="kelurahan" required disabled
                                        data-ph="Pilih Kelurahan/Desa" data-old="{{ old('kelurahan') }}">
                                    <option value="">Pilih Kelurahan/Desa</option>
                                </select>
                                @error('kelurahan')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('alamat') has-error @enderror">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea id="alamat" name="alamat"
                                          placeholder="Nama jalan, gedung, nomor rumah, dan sebagainya"
                                          required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </section>

                    <!-- DATA PENDIDIKAN -->
                    <section class="register-section">
                        <h3>
                            <svg class="register-section-icon" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M22 9 12 4 2 9l10 5 10-5z"></path>
                                <path d="M6 11.5V16c0 1.2 2.7 3 6 3s6-1.8 6-3v-4.5"></path>
                                <path d="M22 9v6"></path>
                            </svg>
                            Data Pendidikan
                        </h3>

                        <div class="register-fields">

                            <div class="register-field @error('jenjang_pendidikan') has-error @enderror">
                                <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                <select id="jenjang_pendidikan" name="jenjang_pendidikan" required>
                                    <option value="">Pilih Jenjang</option>
                                    <option value="MAHASISWA" @selected(old('jenjang_pendidikan') == 'MAHASISWA')>Mahasiswa S1</option>
                                    <option value="SMK" @selected(old('jenjang_pendidikan') == 'SMK')>SMK</option>
                                </select>
                                @error('jenjang_pendidikan')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('nama_instansi') has-error @enderror">
                                <label for="nama_instansi">Nama Instansi (Sekolah/Universitas)</label>
                                <input id="nama_instansi" name="nama_instansi" type="text"
                                       value="{{ old('nama_instansi') }}"
                                       placeholder="Contoh: SMKN 1 Surabaya / Universitas Airlangga" required>
                                @error('nama_instansi')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('jurusan') has-error @enderror">
                                <label for="jurusan">Jurusan / Program Studi</label>
                                <input id="jurusan" name="jurusan" type="text"
                                       value="{{ old('jurusan') }}"
                                       placeholder="Masukkan jurusan atau program studi" required>
                                @error('jurusan')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('nomor_induk') has-error @enderror">
                                <label for="nomor_induk">Nomor Induk (NISN / NIM / NPM)</label>
                                <input id="nomor_induk" name="nomor_induk" type="text"
                                       value="{{ old('nomor_induk') }}"
                                       placeholder="Masukkan nomor induk siswa/mahasiswa" required>
                                @error('nomor_induk')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </section>

                    <!-- KEAMANAN AKUN -->
                    <section class="register-section">
                        <h3>
                            <svg class="register-section-icon" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="5" y="10" width="14" height="11" rx="2"></rect>
                                <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                                <circle cx="12" cy="15" r="1"></circle>
                            </svg>
                            Keamanan Akun
                        </h3>

                        <div class="register-fields">

                            <div class="register-field @error('email') has-error @enderror">
                                <label for="email">Alamat Email Aktif</label>
                                <input id="email" name="email" type="email"
                                       value="{{ old('email') }}"
                                       placeholder="nama@email.com"
                                       autocomplete="email" required>
                                @error('email')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('password') has-error @enderror">
                                <label for="password">Kata Sandi</label>

                                <div class="password-wrap">
                                    <input id="password" name="password" type="password"
                                           placeholder="Minimal 8 karakter"
                                           autocomplete="new-password"
                                           minlength="8" required>

                                    <button type="button" class="password-toggle"
                                            data-target="password"
                                            aria-label="Tampilkan kata sandi">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </div>

                                <div class="strength-bar">
                                    <div class="strength-fill" id="strengthFill"></div>
                                </div>

                                <p class="strength-text" id="strengthText">
                                    Kekuatan sandi: -. Gunakan kombinasi huruf dan angka.
                                </p>

                                @error('password')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="register-field @error('password_confirmation') has-error @enderror">
                                <label for="password_confirmation">Konfirmasi Kata Sandi</label>

                                <div class="password-wrap">
                                    <input id="password_confirmation" name="password_confirmation"
                                           type="password" placeholder="Ulangi kata sandi"
                                           autocomplete="new-password" required>

                                    <button type="button" class="password-toggle"
                                            data-target="password_confirmation"
                                            aria-label="Tampilkan kata sandi">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </div>

                                <div class="field-error" id="confirmError" hidden>
                                    Konfirmasi kata sandi tidak sama.
                                </div>

                                @error('password_confirmation')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </section>

                    <button type="submit" class="register-submit"
                            data-test="register-user-button" id="btnDaftar">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="9" cy="8" r="3.5"></circle>
                            <path d="M2.5 20v-1a6.5 6.5 0 0 1 13 0v1"></path>
                            <path d="M19 8v6M16 11h6"></path>
                        </svg>
                        Daftar Sekarang
                    </button>

                </form>
            </div>
        </div>

        <footer class="register-copyright">
            © {{ date('Y') }} Dinas Pendidikan Provinsi Jawa Timur.
            Hak Cipta Dilindungi.
        </footer>

    </section>
</main>

<script>
    (function () {
        // Tampilkan / sembunyikan kata sandi
        document.querySelectorAll('.password-toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                var input = document.getElementById(button.dataset.target);
                input.type = input.type === 'password' ? 'text' : 'password';
            });
        });

        // Indikator kekuatan kata sandi
        var password = document.getElementById('password');
        var confirmation = document.getElementById('password_confirmation');
        var fill = document.getElementById('strengthFill');
        var text = document.getElementById('strengthText');
        var confirmError = document.getElementById('confirmError');

        var hint = 'Gunakan kombinasi huruf dan angka.';

        password.addEventListener('input', function () {
            var v = password.value;
            var score = 0;

            if (v.length >= 8) score++;
            if (/[a-z]/.test(v) && /[A-Z]/.test(v)) score++;
            if (/\d/.test(v)) score++;
            if (/[^A-Za-z0-9]/.test(v)) score++;

            if (!v) {
                fill.style.width = '0';
                text.textContent = 'Kekuatan sandi: -. ' + hint;
                checkConfirm();
                return;
            }

            var level = score <= 1 ? ['Lemah', '#c62828', '33%']
                      : score <= 3 ? ['Sedang', '#f59e0b', '66%']
                                   : ['Kuat', '#16a34a', '100%'];

            fill.style.width = level[2];
            fill.style.background = level[1];
            text.textContent = 'Kekuatan sandi: ' + level[0] + '. ' + hint;
            checkConfirm();
        });

        // Cek kecocokan konfirmasi kata sandi
        function checkConfirm() {
            var beda = confirmation.value !== '' && confirmation.value !== password.value;
            confirmError.hidden = !beda;
        }

        confirmation.addEventListener('input', checkConfirm);

        // Cegah kirim ganda & pastikan konfirmasi sama
        document.getElementById('registerForm').addEventListener('submit', function (e) {
            if (confirmation.value !== password.value) {
                e.preventDefault();
                confirmError.hidden = false;
                confirmation.focus();
                return;
            }
            document.getElementById('btnDaftar').disabled = true;
        });
    })();
</script>


<script>
    // Dropdown wilayah bertingkat (data: API wilayah Indonesia - emsifa.com)
    (function () {
        var API = 'https://www.emsifa.com/api-wilayah-indonesia/api';
        var levels = [
            { el: document.getElementById('provinsi'),       path: function ()   { return 'provinces'; } },
            { el: document.getElementById('kabupaten_kota'), path: function (id) { return 'regencies/' + id; } },
            { el: document.getElementById('kecamatan'),      path: function (id) { return 'districts/' + id; } },
            { el: document.getElementById('kelurahan'),      path: function (id) { return 'villages/' + id; } }
        ];

        function reset(sel) {
            sel.innerHTML = '<option value="">' + sel.dataset.ph + '</option>';
            sel.disabled = true;
        }

        // Jika API tidak bisa diakses, ubah jadi kolom teks agar form tetap bisa diisi
        function fallback(sel) {
            var input = document.createElement('input');
            input.type = 'text';
            input.id = sel.id;
            input.name = sel.name;
            input.required = true;
            input.value = sel.dataset.old || '';
            input.placeholder = sel.dataset.ph.replace('Pilih ', 'Masukkan ');
            sel.replaceWith(input);
        }

        function getJson(path) {
            return fetch(API + '/' + path + '.json').then(function (r) {
                if (!r.ok) throw new Error('gagal');
                return r.json();
            });
        }

        function selectedId(sel) {
            var opt = sel.options[sel.selectedIndex];
            return opt && opt.dataset.id ? opt.dataset.id : null;
        }

        // Isi satu level, lalu lanjut ke level berikutnya (memakai old() jika ada)
        function load(i, parentId, usePreset) {
            if (i >= levels.length) return Promise.resolve();

            var sel = levels[i].el;
            if (!sel || sel.tagName !== 'SELECT') return Promise.resolve();

            return getJson(levels[i].path(parentId)).then(function (items) {
                var preset = usePreset ? sel.dataset.old : '';
                reset(sel);

                items.forEach(function (it) {
                    var opt = new Option(it.name, it.name);
                    opt.dataset.id = it.id;
                    if (preset && it.name === preset) opt.selected = true;
                    sel.add(opt);
                });

                sel.disabled = false;

                var id = selectedId(sel);
                return id ? load(i + 1, id, true) : null;
            }).catch(function () {
                for (var k = i; k < levels.length; k++) {
                    if (levels[k].el && levels[k].el.tagName === 'SELECT') fallback(levels[k].el);
                }
            });
        }

        // Saat pilihan diubah, kosongkan level di bawahnya lalu muat ulang
        levels.forEach(function (lv, i) {
            if (i === levels.length - 1) return;

            lv.el.addEventListener('change', function () {
                for (var k = i + 1; k < levels.length; k++) {
                    if (levels[k].el.tagName === 'SELECT') reset(levels[k].el);
                }
                var id = selectedId(lv.el);
                if (id) load(i + 1, id, false);
            });
        });

        load(0, null, true);
    })();
</script>

</body>
</html>