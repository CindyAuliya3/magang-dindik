<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Peserta - Dispendik Jatim</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        :root {
            --blue: #0b3d9e;
            --blue2: #0a56d6;
            --text: #20212b;
            --muted: #606477;
            --border: #d9dce8;
            --bg: #f7f6ff;
            --field: #f4f5f9;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', Arial, sans-serif;
        }

        .app {
            display: grid;
            grid-template-columns: 222px minmax(0, 1fr);
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            padding: 14px 10px 18px;
            overflow: hidden;
            background: linear-gradient(180deg, #0a5be0 0%, #0050cf 100%);
            color: white;
        }

        .sidebar::before,
        .sidebar::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, .07);
            pointer-events: none;
        }

        .sidebar::before {
            top: 70px;
            right: -70px;
            width: 190px;
            height: 190px;
        }

        .sidebar::after {
            bottom: -60px;
            left: -60px;
            width: 300px;
            height: 300px;
        }

        .sidebar > * {
            position: relative;
            z-index: 1;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 6px;
            margin-bottom: 22px;
        }

        .brand-logo {
            width: 40px;
            height: 56px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .brand-tag {
            display: inline-block;
            margin-bottom: 4px;
            padding: 1px 7px;
            border-radius: 99px;
            background: rgba(255, 255, 255, .25);
            font-size: 7px;
            font-weight: 700;
            letter-spacing: .4px;
        }

        .brand-title {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-sub {
            margin-top: 3px;
            color: rgba(255, 255, 255, .8);
            font-size: 8px;
            line-height: 1.4;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border: 0;
            border-radius: 10px;
            background: none;
            color: white;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            text-align: left;
            cursor: pointer;
        }

        .nav-link svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, .12);
        }

        .nav-link.is-disabled,
        .nav-link.is-disabled:hover {
            background: none;
            opacity: .5;
            cursor: not-allowed;
        }

        .nav-link.active {
            background: white;
            color: #0a56d6;
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .12);
        }

        .nav-bottom {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-top: auto;
        }

        .nav-bottom form {
            margin: 0;
        }

        .nav-bottom .nav-link {
            width: 100%;
        }

        /* ================= TOPBAR ================= */
        .main {
            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 28px;
            border-bottom: 1px solid #e3e8f5;
            background: linear-gradient(90deg, #fff 0%, #fff 55%, #eaf1ff 100%);
            box-shadow: 0 2px 4px rgba(25, 35, 70, .05);
        }

        .topbar-title {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.2;
        }

        .topbar-sub {
            margin: 3px 0 0;
            color: var(--muted);
            font-size: 8px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .topbar-right,
        .user {
            display: flex;
            align-items: center;
        }

        .topbar-right {
            gap: 16px;
        }

        .user {
            gap: 10px;
        }

        .bell {
            display: flex;
            padding: 4px;
            border: 0;
            background: none;
            color: #4a4e63;
            cursor: pointer;
        }

        .bell svg {
            width: 17px;
            height: 17px;
        }

        .user-info {
            text-align: right;
            line-height: 1.35;
        }

        .user-name {
            font-size: 10px;
            font-weight: 700;
        }

        .user-role {
            color: var(--muted);
            font-size: 9px;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            overflow: hidden;
            border-radius: 50%;
            background: var(--blue2);
            color: white;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar svg {
            width: 15px;
            height: 15px;
        }

        /* ================= KONTEN ================= */
        .content {
            flex: 1;
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 30px 40px 44px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            padding: 24px 26px;
            border: 1px solid #e6e8f1;
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 8px rgba(25, 35, 70, .08);
        }

        .flash {
            padding: 12px 15px;
            border: 1px solid #b8e4c7;
            border-radius: 10px;
            background: #effaf2;
            color: #236b3b;
            font-size: 12px;
        }

        .flash-error {
            border-color: #f0c2c2;
            background: #fff1f1;
            color: #a52e2e;
        }

        .flash-error ul {
            margin: 7px 0 0;
            padding-left: 18px;
        }

        /* ---------- Kepala profil ---------- */
        .profile-head {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 22px;
            border-bottom: 1px solid #ebedf4;
        }

        .photo-wrap {
            position: relative;
            flex-shrink: 0;
        }

        .profile-photo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 84px;
            height: 84px;
            overflow: hidden;
            border: 3px solid #fff;
            border-radius: 18px;
            background: #edf2ff;
            color: var(--blue2);
            box-shadow: 0 2px 8px rgba(25, 35, 70, .2);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-photo svg {
            width: 38px;
            height: 38px;
        }

        .photo-check {
            position: absolute;
            right: -5px;
            bottom: -5px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            border: 2px solid #fff;
            border-radius: 50%;
            background: var(--blue2);
            color: #fff;
        }

        .photo-check svg {
            width: 11px;
            height: 11px;
            stroke-width: 2.6;
        }

        .name-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin-bottom: 4px;
        }

        .name-row h1 {
            margin: 0;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -.2px;
        }

        .role-pill {
            padding: 3px 10px;
            border-radius: 99px;
            background: #e4eafb;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
        }

        .profile-meta {
            margin: 0 0 12px;
            color: #4a4e63;
            font-size: 11px;
            line-height: 1.5;
        }

        .photo-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .photo-actions form {
            margin: 0;
        }

        .photo-note {
            margin: 10px 0 0;
            color: #85899a;
            font-size: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 32px;
            padding: 7px 14px;
            border: 0;
            border-radius: 7px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn svg {
            width: 13px;
            height: 13px;
        }

        .btn-primary {
            background: var(--blue2);
            color: #fff;
        }

        .btn-primary:hover {
            background: #0847b5;
        }

        .btn-primary:disabled {
            background: #9db0d9;
            cursor: not-allowed;
        }

        .btn-light {
            background: #eceef4;
            color: #3a3f55;
        }

        .btn-light:hover {
            background: #e1e4ee;
        }

        .btn-lg {
            min-height: 38px;
            padding: 9px 18px;
        }

        /* ---------- Judul bagian ---------- */
        .section-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 24px 0 16px;
            font-size: 14px;
            font-weight: 700;
        }

        .section-title svg {
            width: 16px;
            height: 16px;
            color: var(--blue2);
        }

        /* ---------- Formulir ---------- */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            color: #36394b;
            font-size: 10px;
            font-weight: 700;
        }

        .form-control {
            width: 100%;
            min-height: 40px;
            padding: 10px 14px;
            border: 1px solid transparent;
            border-radius: 8px;
            outline: none;
            background: var(--field);
            color: #292c3a;
            font-family: inherit;
            font-size: 12px;
        }

        .form-control::placeholder {
            color: #9a9db0;
        }

        .form-control:focus {
            border-color: var(--blue2);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(10, 86, 214, .1);
        }

        .form-control[readonly] {
            color: #666b7c;
        }

        textarea.form-control {
            min-height: 78px;
            resize: vertical;
        }

        .input-icon {
            position: relative;
        }

        .input-icon > svg {
            position: absolute;
            top: 50%;
            left: 13px;
            width: 14px;
            height: 14px;
            color: #6b6f82;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .input-icon .form-control {
            padding-left: 36px;
        }

        .error-text {
            color: #c03939;
            font-size: 10px;
        }

        /* Detail wilayah (tidak ada di desain, tetap tersedia agar data tidak hilang) */
        .wilayah {
            grid-column: 1 / -1;
        }

        .wilayah summary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--blue2);
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            list-style: none;
        }

        .wilayah summary::-webkit-details-marker {
            display: none;
        }

        .wilayah summary::before {
            content: "+";
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #e4eafb;
            font-size: 12px;
            line-height: 1;
        }

        .wilayah[open] summary::before {
            content: "\2212";
        }

        .wilayah .form-grid {
            margin-top: 14px;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid #ebedf4;
        }

        /* ---------- Keamanan akun ---------- */
        .sec-head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .sec-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #e4eafb;
            color: var(--blue2);
        }

        .sec-icon svg {
            width: 16px;
            height: 16px;
        }

        .sec-head h2 {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
        }

        .sec-head p {
            margin: 2px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .sec-note {
            margin: 14px 0 0;
            color: #85899a;
            font-size: 10px;
        }

        /* ================= HP / TABLET ================= */
        @media (max-width: 900px) {
            .app {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: relative;
                height: auto;
                padding: 14px 12px;
            }

            .brand {
                margin-bottom: 14px;
            }

            .nav,
            .nav-bottom {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .nav-bottom {
                margin-top: 10px;
            }

            .nav-bottom .nav-link {
                width: auto;
            }

            .topbar {
                padding: 12px 16px;
            }

            .content {
                padding: 20px 16px 32px;
            }
        }

        @media (max-width: 560px) {
            .topbar-title {
                font-size: 13px;
            }

            .card {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .profile-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .form-footer .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
@php
    $peserta = auth('peserta')->user();

    $icons = [
        'home' => '<path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/>',
        'doc' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h8"/>',
        'badge' => '<circle cx="12" cy="8" r="6"/><path d="M8.2 13 7 22l5-3 5 3-1.2-9"/>',
        'user' => '<circle cx="12" cy="8" r="4"/><path d="M5 21v-2a7 7 0 0 1 14 0v2z"/>',
        'help' => '<circle cx="12" cy="12" r="10"/><path d="M9.1 9a3 3 0 0 1 5.8 1c0 2-3 3-3 3M12 17h.01"/>',
        'logout' => '<path d="M10 17l5-5-5-5M15 12H3"/><path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>',
        'bell' => '<path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/>',
        'camera' => '<path d="M14 5h-4l-2 3H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9a2 2 0 0 0-2-2h-3z"/><circle cx="12" cy="13" r="3"/>',
        'trash' => '<path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6M10 11v6M14 11v6"/>',
        'check' => '<path d="m5 12 5 5 9-10"/>',
        'save' => '<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><path d="M17 21v-8H7v8M7 3v5h8"/>',
        'phone' => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
        'idcard' => '<rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M5.5 17a3.5 3.5 0 0 1 7 0M15 9h3M15 12h3"/>',
        'history' => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"/><path d="M3 3v5h5M12 7v5l3 2"/>',
    ];

    $svg = fn ($name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($icons[$name] ?? '').'</svg>';

    $jenjang = strtoupper($peserta->jenjang_pendidikan ?? '');
    $labelPeran = $jenjang === 'MAHASISWA' ? 'Mahasiswa Magang' : 'Siswa Magang';
    $labelNomorInduk = $jenjang === 'MAHASISWA' ? 'NIM' : 'NISN';
    $labelJenjang = $jenjang === 'SMK' ? 'SMK / Vokasi' : ($jenjang === 'MAHASISWA' ? 'Mahasiswa S1' : '-');

    // Tujuan magang tersimpan pada tabel pengajuan, bukan peserta_magang.
    // Menu Dokumen Magang aktif setelah peserta memiliki pengajuan.
    $sudahPilihTujuan = $peserta->pengajuan()->exists();

    $urlBeranda = route('peserta.dashboard');
    $urlDokumen = route('peserta.dokumen.index');
    $urlLogout = route('logout');

    $fotoUrl = $peserta->foto_profil
        ? \Illuminate\Support\Facades\Storage::disk('public')->url($peserta->foto_profil)
        : null;

    // Rute ganti kata sandi (isi bila sudah dibuat; jika belum, bagian itu hanya tampilan)
    $adaRuteSandi = \Illuminate\Support\Facades\Route::has('peserta.profil.password');
@endphp


<div class="app">
    {{-- ============ SIDEBAR ============ --}}
    <aside class="sidebar">
        <div class="brand">
            <img class="brand-logo" src="{{ asset('images/logo.png') }}"
                 alt="Logo Dinas Pendidikan Jawa Timur"
                 onerror="this.style.display='none'">
            <div>
                <span class="brand-tag">DINDIK JATIM</span>
                <div class="brand-title">Student Portal</div>
                <div class="brand-sub">Dinas Pendidikan<br>Provinsi Jawa Timur</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">
            <a href="{{ $urlBeranda }}" class="nav-link">{!! $svg('home') !!} Beranda</a>

            @if ($sudahPilihTujuan)
                <a href="{{ $urlDokumen }}" class="nav-link">{!! $svg('doc') !!} Dokumen Magang</a>
            @else
                <span class="nav-link is-disabled" aria-disabled="true" title="Pilih tujuan magang terlebih dahulu">
                    {!! $svg('doc') !!} Dokumen Magang
                </span>
            @endif

            <a href="#" class="nav-link">{!! $svg('badge') !!} Surat Keterangan</a>
            <a href="{{ route('peserta.profil') }}" class="nav-link active" aria-current="page">{!! $svg('user') !!} Profil</a>
        </nav>

        <div class="nav-bottom">
            <a href="#" class="nav-link">{!! $svg('help') !!} Bantuan</a>
            <form action="{{ $urlLogout }}" method="POST">
                @csrf
                <button type="submit" class="nav-link">{!! $svg('logout') !!} Keluar</button>
            </form>
        </div>
    </aside>

    {{-- ============ KONTEN ============ --}}
    <div class="main">
        <header class="topbar">
            <div>
                <h2 class="topbar-title">Portal Magang Dinas Pendidikan</h2>
                <p class="topbar-sub">PROVINSI JAWA TIMUR</p>
            </div>

            <div class="topbar-right">
                <button type="button" class="bell" aria-label="Notifikasi">{!! $svg('bell') !!}</button>

                <div class="user">
                    <div class="user-info">
                        <div class="user-name">Hai, {{ $peserta->nama }}</div>
                        <div class="user-role">Selamat datang kembali</div>
                    </div>
                    <div class="avatar">
                        @if ($fotoUrl)
                            <img src="{{ $fotoUrl }}" alt="Foto profil">
                        @else
                            {!! $svg('user') !!}
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <main class="content">

            @if (session('success'))
                <div class="flash">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="flash flash-error">
                    <strong>Periksa kembali data yang dimasukkan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ========== KARTU PROFIL ========== --}}
            <section class="card">

                {{-- Foto + identitas singkat --}}
                <div class="profile-head">
                    <div class="photo-wrap">
                        <div class="profile-photo">
                            @if ($fotoUrl)
                                <img src="{{ $fotoUrl }}" alt="Foto profil {{ $peserta->nama }}">
                            @else
                                {!! $svg('user') !!}
                            @endif
                        </div>
                        <span class="photo-check" title="Akun terverifikasi">{!! $svg('check') !!}</span>
                    </div>

                    <div>
                        <div class="name-row">
                            <h1>{{ $peserta->nama }}</h1>
                            <span class="role-pill">{{ $labelPeran }}</span>
                        </div>

                        <p class="profile-meta">
                            {{ $labelNomorInduk }}: {{ $peserta->nomor_induk ?: '-' }}
                            • {{ $peserta->nama_instansi ?: '-' }}
                        </p>

                        <div class="photo-actions">
                            <form action="{{ route('peserta.profil.foto') }}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="foto_profil" class="btn btn-primary">
                                    {!! $svg('camera') !!} Ubah Foto
                                </label>
                                <input type="file" name="foto_profil" id="foto_profil"
                                       accept=".jpg,.jpeg,.png" hidden
                                       onchange="this.form.submit()">
                            </form>

                            @if ($fotoUrl)
                                <form action="{{ route('peserta.profil.foto.hapus') }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus foto profil?')">
                                    @csrf
                                    <button type="submit" class="btn btn-light">
                                        {!! $svg('trash') !!} Hapus
                                    </button>
                                </form>
                            @endif
                        </div>

                        <p class="photo-note">Format JPG, PNG, maks. 2MB dengan latar belakang formal.</p>
                    </div>
                </div>

                {{-- Data pribadi & akademik --}}
                <h2 class="section-title">{!! $svg('idcard') !!} Data Pribadi &amp; Akademik</h2>

                <form action="{{ route('peserta.profil.update') }}" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group full">
                            <label for="nama">Nama Lengkap Siswa / Mahasiswa</label>
                            <input class="form-control" type="text" id="nama" name="nama"
                                   value="{{ old('nama', $peserta->nama) }}" required>
                            @error('nama') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="nomor_induk">NISN / NIM</label>
                            <input class="form-control" type="text" id="nomor_induk" name="nomor_induk"
                                   value="{{ old('nomor_induk', $peserta->nomor_induk) }}">
                            @error('nomor_induk') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                            <input class="form-control" type="text" id="jenjang_pendidikan"
                                   value="{{ $labelJenjang }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_instansi">Asal Sekolah / Universitas</label>
                            <input class="form-control" type="text" id="nama_instansi" name="nama_instansi"
                                   value="{{ old('nama_instansi', $peserta->nama_instansi) }}">
                            @error('nama_instansi') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="jurusan">Jurusan / Program Keahlian</label>
                            <input class="form-control" type="text" id="jurusan" name="jurusan"
                                   value="{{ old('jurusan', $peserta->jurusan) }}">
                            @error('jurusan') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">Nomor WhatsApp / HP</label>
                            <div class="input-icon">
                                {!! $svg('phone') !!}
                                <input class="form-control" type="tel" id="no_telepon" name="no_telepon"
                                       value="{{ old('no_telepon', $peserta->no_telepon) }}" required>
                            </div>
                            @error('no_telepon') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat Email Resmi</label>
                            <div class="input-icon">
                                {!! $svg('mail') !!}
                                <input class="form-control" type="email" id="email" name="email"
                                       value="{{ old('email', $peserta->email) }}" required>
                            </div>
                            @error('email') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group full">
                            <label for="alamat">Alamat Domisili</label>
                            <textarea class="form-control" id="alamat" name="alamat"
                                      placeholder="Masukkan alamat domisili lengkap">{{ old('alamat', $peserta->alamat) }}</textarea>
                            @error('alamat') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        {{-- Detail wilayah: tidak tampil di desain, tetap dikirim agar data tidak hilang --}}
                        <details class="wilayah" @if ($errors->hasAny(['kelurahan', 'kecamatan', 'kabupaten_kota', 'provinsi'])) open @endif>
                            <summary>Detail wilayah (kelurahan, kecamatan, kabupaten/kota, provinsi)</summary>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan / Desa</label>
                                    <input class="form-control" type="text" id="kelurahan" name="kelurahan"
                                           value="{{ old('kelurahan', $peserta->kelurahan) }}">
                                    @error('kelurahan') <span class="error-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input class="form-control" type="text" id="kecamatan" name="kecamatan"
                                           value="{{ old('kecamatan', $peserta->kecamatan) }}">
                                    @error('kecamatan') <span class="error-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kabupaten_kota">Kabupaten / Kota</label>
                                    <input class="form-control" type="text" id="kabupaten_kota" name="kabupaten_kota"
                                           value="{{ old('kabupaten_kota', $peserta->kabupaten_kota) }}">
                                    @error('kabupaten_kota') <span class="error-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input class="form-control" type="text" id="provinsi" name="provinsi"
                                           value="{{ old('provinsi', $peserta->provinsi) }}">
                                    @error('provinsi') <span class="error-text">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </details>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-lg">
                            {!! $svg('save') !!} Perbarui Data Siswa
                        </button>
                    </div>
                </form>
            </section>

            {{-- ========== KEAMANAN AKUN ========== --}}
            <section class="card">
                <div class="sec-head">
                    <div class="sec-icon">{!! $svg('history') !!}</div>
                    <div>
                        <h2>Pengaturan Keamanan Akun</h2>
                        <p>Kelola kata sandi untuk keamanan akun portal magang Anda.</p>
                    </div>
                </div>

                <form action="{{ $adaRuteSandi ? route('peserta.profil.password') : '#' }}" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group full">
                            <label for="current_password">Kata Sandi Saat Ini</label>
                            <input class="form-control" type="password" id="current_password"
                                   name="current_password" autocomplete="current-password"
                                   placeholder="Masukkan kata sandi saat ini">
                            @error('current_password') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Kata Sandi Baru</label>
                            <input class="form-control" type="password" id="password" name="password"
                                   autocomplete="new-password" placeholder="Minimal 8 karakter">
                            @error('password') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Kata Sandi Baru</label>
                            <input class="form-control" type="password" id="password_confirmation"
                                   name="password_confirmation" autocomplete="new-password"
                                   placeholder="Ulangi kata sandi baru">
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-lg" @disabled(! $adaRuteSandi)>
                            Perbarui Kata Sandi
                        </button>
                    </div>

                    @unless ($adaRuteSandi)
                        <p class="sec-note">Fitur ganti kata sandi belum diaktifkan (route <code>peserta.profil.password</code> belum dibuat).</p>
                    @endunless
                </form>
            </section>

        </main>
    </div>
</div>
</body>
</html>