<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Tujuan Magang - Portal Magang Dinas Pendidikan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        :root {
            --blue: #0b3d9e;
            --blue-hover: #09327f;
            --text: #20212b;
            --muted: #606477;
            --border: #d9dce8;
            --bg: #f7f6ff;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }

        .app {
            display: grid;
            grid-template-columns: 222px minmax(0, 1fr);
            min-height: 100vh;
        }

        /* ================= SIDEBAR (sama dengan dashboard) ================= */
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

        .sidebar::before {
            content: "";
            position: absolute;
            top: 70px;
            right: -70px;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            pointer-events: none;
        }

        .sidebar::after {
            content: "";
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            pointer-events: none;
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
            background: rgba(255, 255, 255, 0.25);
            font-size: 7px;
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        .brand-title {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-sub {
            margin-top: 3px;
            color: rgba(255, 255, 255, 0.8);
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
            background: rgba(255, 255, 255, 0.12);
        }

        .nav-link.is-disabled,
        .nav-link.is-disabled:hover {
            background: none;
            opacity: 0.5;
            cursor: not-allowed;
        }

        .nav-link.active {
            background: white;
            color: #0a56d6;
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
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

        /* ================= TOPBAR (sama dengan dashboard) ================= */
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
            padding: 12px 28px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(90deg, #ffffff 0%, #ffffff 40%, #e9f0ff 100%);
            box-shadow: 0 2px 4px rgba(25, 35, 70, 0.06);
        }

        .topbar-title {
            margin: 0;
            color: #14213d;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.3;
        }

        .topbar-sub {
            margin-top: 1px;
            color: var(--muted);
            font-size: 8px;
            font-weight: 500;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
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
            font-size: 10px;
            font-weight: 500;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #0a56d6;
            color: white;
        }

        .avatar svg {
            width: 14px;
            height: 14px;
        }

        /* ================= KONTEN ================= */
        .content {
            flex: 1;
            width: 100%;
            max-width: 1020px;
            margin: 0 auto;
            padding: 28px 28px 32px;
        }

        .page-title {
            margin: 0 0 6px;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .page-desc {
            max-width: 560px;
            margin: 0 0 22px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .form-error {
            margin-bottom: 18px;
            color: #c62828;
            font-size: 12px;
        }

        .form-error ul {
            margin: 0;
            padding-left: 18px;
        }

        /* ================= KARTU LOKASI ================= */
        .lokasi-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .lokasi-card {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 22px 20px 20px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #f9f9fd;
            box-shadow: 0 2px 8px rgba(25, 35, 70, 0.1);
            cursor: pointer;
            transition: border-color .15s, box-shadow .15s;
        }

        .lokasi-card:hover {
            border-color: #aab4d6;
        }

        .lokasi-card.selected {
            border-color: #0a56d6;
            box-shadow: 0 0 0 2px rgba(10, 86, 214, 0.16), 0 2px 8px rgba(25, 35, 70, 0.1);
        }

        .lokasi-card.is-disabled {
            background: #eeeeF2;
            border-color: #d7d8df;
            box-shadow: none;
            color: #858895;
            cursor: not-allowed;
            opacity: .78;
        }

        .lokasi-card.is-disabled h3,
        .lokasi-card.is-disabled .lokasi-alamat,
        .lokasi-card.is-disabled .lokasi-desc,
        .lokasi-card.is-disabled .bidang-label {
            color: #858895;
        }

        .lokasi-card.is-disabled .lokasi-icon {
            color: #9295a1;
        }

        .lokasi-card.is-disabled .lokasi-radio,
        .lokasi-card.is-disabled .btn-pilih,
        .lokasi-card.is-disabled .chip {
            cursor: not-allowed;
        }

        .lokasi-card.is-disabled .btn-pilih {
            border-color: #d0d1d8;
            background: #e3e4e9;
            color: #858895;
        }

        /* ---------- Kondisi kuota penuh ---------- */
        .alert-kuota {
            margin-bottom: 20px;
            padding: 14px 16px;
            border: 1px solid #f4b8b4;
            border-radius: 8px;
            background: #fdeceb;
            color: #b42318;
            font-size: 12px;
            line-height: 1.6;
        }

        /* Kartu tetap tampil normal (tidak abu-abu), hanya tidak bisa dipilih */
        .lokasi-card.kuota-habis,
        .lokasi-card.kuota-habis .lokasi-radio {
            cursor: not-allowed;
        }

        .lokasi-card.kuota-habis:hover {
            border-color: var(--border);
        }

        .lokasi-card.kuota-habis .lokasi-radio {
            opacity: .6;
        }

        .btn-pilih.btn-kuota-penuh,
        .btn-pilih.btn-kuota-penuh:hover {
            border-color: #b42318;
            background: white;
            color: #b42318;
            cursor: not-allowed;
        }

        .lokasi-radio {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 14px;
            height: 14px;
            margin: 0;
            border: 1px solid #c4c8d8;
            border-radius: 50%;
            background: white;
            appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
        }

        .lokasi-radio:checked {
            border-color: #0a56d6;
            background: radial-gradient(circle, #0a56d6 0 3.5px, white 4.5px);
        }

        .lokasi-radio:focus-visible {
            outline: 2px solid #0a56d6;
            outline-offset: 2px;
        }

        .lokasi-icon {
            display: flex;
            align-items: center;
            width: 24px;
            height: 24px;
            margin: 6px 0 22px 14px;
            color: #0a56d6;
        }

        .lokasi-icon svg {
            width: 22px;
            height: 22px;
        }

        .lokasi-card h3 {
            margin: 0 0 10px;
            padding-left: 2px;
            color: #14213d;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.3;
        }

        .lokasi-alamat {
            display: flex;
            align-items: flex-start;
            gap: 5px;
            margin: 0 0 14px;
            padding-left: 2px;
            color: #3a3f55;
            font-size: 10px;
            line-height: 1.5;
        }

        .lokasi-alamat svg {
            width: 11px;
            height: 11px;
            margin-top: 1px;
            flex-shrink: 0;
        }

        .lokasi-desc {
            margin: 0 0 16px;
            padding-left: 2px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
            text-align: justify;
        }

        .bidang-label {
            margin: 6px 0 8px;
            padding-left: 2px;
            font-size: 10px;
            font-weight: 700;
        }

        .bidang-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 18px;
        }

        .chip {
            position: relative;
        }

        .chip input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .chip span {
            display: inline-block;
            padding: 4px 11px;
            border: 1px solid #c4c8d8;
            border-radius: 99px;
            background: white;
            color: #3a3f55;
            font-size: 10px;
            cursor: pointer;
            transition: all .15s;
        }

        .chip input:checked + span {
            border-color: #0a56d6;
            background: #e4eafb;
            color: #0a56d6;
            font-weight: 600;
        }

        .chip input:focus-visible + span {
            outline: 2px solid #0a56d6;
            outline-offset: 2px;
        }

        .btn-pilih {
            margin-top: auto;
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #b9bfd3;
            border-radius: 6px;
            background: white;
            color: #0a56d6;
            font-family: inherit;
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-pilih:hover {
            background: #f1f3fb;
        }

        .lokasi-card.selected .btn-pilih {
            border-color: #0a56d6;
            background: #0a56d6;
            color: white;
        }

        /* ================= PERIODE ================= */
        .periode {
            padding: 18px 18px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 6px rgba(25, 35, 70, 0.1);
        }

        .periode h3 {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 0 14px;
            font-size: 16px;
            font-weight: 700;
        }

        .periode h3 svg {
            width: 18px;
            height: 18px;
            color: var(--blue);
        }

        .periode-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .field label {
            display: block;
            margin-bottom: 6px;
            color: #3a3f55;
            font-size: 11px;
            font-weight: 700;
        }

        .field input[type="date"] {
            display: block;
            width: 100%;
            height: 38px;
            padding: 0 12px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: white;
            color: var(--text);
            font-family: inherit;
            font-size: 12px;
        }

        .field input:focus {
            outline: none;
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(11, 61, 158, 0.12);
        }

        .periode-hint {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 12px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .periode-hint svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
        }

        .periode-hint.error {
            color: #c62828;
        }

        /* ================= FOOTER AKSI ================= */
        .action-bar {
            position: sticky;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 28px;
            border-top: 1px solid var(--border);
            background: white;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 7px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn svg {
            width: 14px;
            height: 14px;
        }

        .btn-outline {
            border: 1px solid var(--border);
            background: white;
            color: var(--blue);
        }

        .btn-outline:hover {
            background: #f1f3fb;
        }

        .btn-primary {
            border: 0;
            background: var(--blue);
            color: white;
        }

        .btn-primary:hover {
            background: var(--blue-hover);
        }

        .btn-primary:disabled {
            background: #9db0d9;
            cursor: not-allowed;
        }

        /* ================= LAYAR SEDANG ================= */
        @media (max-width: 1180px) {
            .lokasi-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
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
                padding: 20px 16px 24px;
            }

            .lokasi-grid {
                grid-template-columns: 1fr;
            }

            .periode-grid {
                grid-template-columns: 1fr;
            }

            .action-bar {
                padding: 12px 16px;
            }
        }
    </style>
</head>

<body>
    @php
        $user = auth('peserta')->user();
        // Menu Dokumen Magang hanya aktif setelah peserta memilih tujuan magang
        $sudahPilihTujuan = !empty($user->tujuan_magang);

        // Kuota tetap 40 peserta diterima untuk setiap periode penerimaan.
        $kuotaMaksimal = 40;
        $kuotaTerpakai = (int) ($kuotaTerpakai ?? 0);
        $kuotaPenuh = $kuotaTerpakai >= $kuotaMaksimal;

        $subUnitDinas = [
            'Sekretariat',
            'Bidang SMA',
            'Bidang SMK',
            'Bidang PK-PLK',
            'Bidang GTK',
        ];

        $iconPaths = [
            'gedung' => '<rect x="4" y="3" width="16" height="18" rx="1.5"></rect><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2"></path>',
            'laptop' => '<rect x="4" y="5" width="16" height="11" rx="1.5"></rect><path d="M2 20h20"></path>',
            'orang'  => '<circle cx="9" cy="8" r="3.5"></circle><path d="M2.5 20v-1a6.5 6.5 0 0 1 11-4.6"></path><circle cx="18" cy="16" r="2"></circle><path d="M18 11.5v1.2M18 19.3v1.2M13.5 16h1.2M21.3 16h1.2M14.8 12.8l.9.9M20.3 18.3l.9.9M21.2 12.8l-.9.9M15.7 18.3l-.9.9"></path>',
        ];
    @endphp

    <div class="app">
        {{-- ============ SIDEBAR ============ --}}
        <aside class="sidebar">
            <div class="brand">
                {{-- Letakkan logo di public/images/logo.png --}}
                <img class="brand-logo"
                     src="{{ asset('images/logo.png') }}"
                     alt="Logo Provinsi Jawa Timur"
                     onerror="this.style.display='none'">
                <div>
                    <span class="brand-tag">DINDIK JATIM</span>
                    <div class="brand-title">Student Portal</div>
                    <div class="brand-sub">Dinas Pendidikan<br>Provinsi Jawa Timur</div>
                </div>
            </div>

            <nav class="nav" aria-label="Menu utama">
                <a href="{{ route('peserta.dashboard') }}" class="nav-link active" aria-current="page">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 10 9-7 9 7"></path><path d="M5 9v12h14V9"></path><path d="M9 21v-7h6v7"></path></svg>
                    Beranda
                </a>
                @if ($sudahPilihTujuan)
                    <a href="{{ route('peserta.dokumen.index') }}" class="nav-link">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5"></path><path d="M9 13h6M9 17h6"></path></svg>
                        Dokumen Magang
                    </a>
                @else
                    <span class="nav-link is-disabled" aria-disabled="true" title="Pilih tujuan magang terlebih dahulu">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5"></path><path d="M9 13h6M9 17h6"></path></svg>
                        Dokumen Magang
                    </span>
                @endif
                <a href="#" class="nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="9" r="5"></circle><path d="m8.500 13.500-1.500 7.500 5-3 5 3-1.500-7.500"></path></svg>
                    Surat Keterangan
                </a>
                <a href="#" class="nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="3.500"></circle><path d="M5 20v-1.500a7 7 0 0 1 14 0V20z"></path></svg>
                    Profil
                </a>
            </nav>

            <div class="nav-bottom">
                <a href="#" class="nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M9.500 9.500a2.500 2.500 0 1 1 3.500 2.300c-.700.400-1 1-1 1.700"></path><circle cx="12" cy="17" r=".5"></circle></svg>
                    Bantuan
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="m16 17 5-5-5-5"></path><path d="M21 12H9"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- ============ KONTEN ============ --}}
        <div class="main">
            <header class="topbar">
                <div>
                    <h2 class="topbar-title">Portal Magang Dinas Pendidikan</h2>
                    <div class="topbar-sub">Provinsi Jawa Timur</div>
                </div>
                <div class="user">
                    <div class="user-info">
                        <div class="user-name">Hai, {{ $user->nama ?? 'Peserta' }}</div>
                        <div class="user-role">Selamat datang kembali</div>
                    </div>
                    <div class="avatar" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="3.5"></circle><path d="M5 20v-1.5a7 7 0 0 1 14 0V20z"></path></svg>
                    </div>
                </div>
            </header>

            {{--
                Ganti action="#" dengan route penyimpanan pilihan magang,
                mis. action="{{ route('pendaftar.simpan-tujuan') }}"
            --}}
            <form id="tujuanForm" method="POST" action="{{ url('/pengajuan') }}" style="display:contents;">
                @csrf

                <main class="content">
                    <h1 class="page-title">Pilih Tujuan Magang</h1>
                    <p class="page-desc">
                        @if ($kuotaPenuh)
                            Saat ini pendaftaran melalui sistem dibuka untuk UPT TIKP. Lokasi lain belum tersedia dan dapat diaktifkan pada tahap pengembangan berikutnya.
                        @else
                            Silakan pilih lokasi instansi yang menjadi tujuan magang Anda. Pastikan Anda telah membaca persyaratan khusus untuk masing-masing lokasi.
                        @endif
                    </p>

                    @if ($kuotaPenuh)
                        <div class="alert-kuota" role="alert">
                            Kuota UPT TIKP sudah penuh, sehingga pengajuan belum dapat dikirim. Pendaftaran akan dibuka kembali ketika kuota periode berikutnya ditetapkan Admin UPT TIKP.
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="form-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="lokasi-grid">
                        {{-- DINAS PENDIDIKAN PUSAT --}}
                        <div class="lokasi-card is-disabled" data-card data-disabled="true" aria-disabled="true">
                            <input class="lokasi-radio" type="radio" name="tujuan_magang"
                                   value="Dinas Pusat" aria-label="Dinas Pendidikan Pusat belum tersedia"
                                   disabled>

                            <div class="lokasi-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconPaths['gedung'] !!}</svg></div>

                            <h3>Dinas Pendidikan Pusat</h3>
                            <p class="lokasi-alamat">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"></path><circle cx="12" cy="10" r="2.5"></circle></svg>
                                Jl. Gentengkali No.33, Surabaya
                            </p>
                            <p class="lokasi-desc">Penempatan di kantor pusat Dinas Pendidikan Provinsi Jawa Timur. Cocok untuk mahasiswa dengan latar belakang Administrasi Publik, Hukum, atau Manajemen Pemerintahan.</p>

                            <p class="bidang-label">Pilih Bidang/Sub-Bagian:</p>
                            <div class="bidang-list">
                                @foreach ($subUnitDinas as $subUnit)
                                    <label class="chip">
                                        <input type="radio" name="sub_unit_tujuan" value="{{ $subUnit }}"
                                               @checked(old('sub_unit_tujuan') === $subUnit)>
                                        <span>{{ $subUnit }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <button type="button" class="btn-pilih" disabled>Belum Tersedia</button>
                        </div>

                        {{-- UPT TIKP --}}
                        <div class="lokasi-card {{ $kuotaPenuh ? 'kuota-habis' : (old('tujuan_magang') === 'UPT TIKP' ? 'selected' : '') }}"
                             data-card data-disabled="{{ $kuotaPenuh ? 'true' : 'false' }}"
                             aria-disabled="{{ $kuotaPenuh ? 'true' : 'false' }}">
                            <input class="lokasi-radio" type="radio" name="tujuan_magang"
                                   value="UPT TIKP" aria-label="Pilih UPT TIKP"
                                   @checked(!$kuotaPenuh && old('tujuan_magang') === 'UPT TIKP')
                                   {{ $kuotaPenuh ? 'disabled' : 'required' }}>

                            <div class="lokasi-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconPaths['laptop'] !!}</svg></div>

                            <h3>UPT TIKP (Cabang)</h3>
                            <p class="lokasi-alamat">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"></path><circle cx="12" cy="10" r="2.5"></circle></svg>
                                Jl. Jagir Wonokromo No.356, Surabaya
                            </p>
                            <p class="lokasi-desc">Unit Pelaksana Teknis Teknologi Informasi dan Komunikasi Pendidikan. Disarankan bagi mahasiswa Teknik Informatika, Sistem Informasi, atau Desain Komunikasi Visual.</p>

                            <button type="button" class="btn-pilih {{ $kuotaPenuh ? 'btn-kuota-penuh' : '' }}" {{ $kuotaPenuh ? 'disabled' : '' }}>
                                {{ $kuotaPenuh ? 'Kuota Penuh' : (old('tujuan_magang') === 'UPT TIKP' ? 'Terpilih' : 'Pilih Lokasi') }}
                            </button>
                        </div>

                        {{-- UPT PTKK --}}
                        <div class="lokasi-card is-disabled" data-card data-disabled="true" aria-disabled="true">
                            <input class="lokasi-radio" type="radio" name="tujuan_magang"
                                   value="UPT PTKK" aria-label="UPT PTKK belum tersedia"
                                   disabled>

                            <div class="lokasi-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconPaths['orang'] !!}</svg></div>

                            <h3>UPT PTKK</h3>
                            <p class="lokasi-alamat">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"></path><circle cx="12" cy="10" r="2.5"></circle></svg>
                                Surabaya
                            </p>
                            <p class="lokasi-desc">UPT Pengembangan Teknis Dan Keterampilan Kejuruan sebagai salah satu Unit Pelaksana Teknis dari Dinas Pendidikan Propinsi Jawa timur. Bertugas dalam kegiatan dan pengembangan teknis dan keterampilan kejuruan, ketatausahaan, dan pelayanan masyarakat.</p>
                            <button type="button" class="btn-pilih" disabled>Belum Tersedia</button>
                        </div>
                    </div>

                    {{-- PERIODE MAGANG --}}
                    <section class="periode">
                        <h3>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M3 10h18M8 3v4M16 3v4"></path></svg>
                            Periode Magang
                        </h3>

                        <div class="periode-grid">
                            <div class="field">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input id="tanggal_mulai" name="tanggal_mulai" type="date"
                                       value="{{ old('tanggal_mulai') }}" required>
                            </div>

                            <div class="field">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input id="tanggal_selesai" name="tanggal_selesai" type="date"
                                       value="{{ old('tanggal_selesai') }}" required>
                            </div>
                        </div>

                        <p class="periode-hint" id="periodeHint">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M12 8h.01M11 12h1v5h1"></path></svg>
                            <span id="periodeHintText">Durasi magang minimal 2 bulan dan maksimal 6 bulan. Periode penerimaan enam bulanan ditentukan sistem berdasarkan tanggal mulai magang.</span>
                        </p>
                    </section>
                </main>

                <div class="action-bar">
                    <a href="{{ route('peserta.dashboard') }}" class="btn btn-outline">Kembali</a>

                    <button type="submit" class="btn btn-primary" id="btnLanjut"
                            data-kuota-penuh="{{ $kuotaPenuh ? 'true' : 'false' }}"
                            {{ $kuotaPenuh ? 'disabled' : '' }}>
                        Lanjut ke Dokumen
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"></path><path d="m13 6 6 6-6 6"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        (function () {
            var cards = document.querySelectorAll('[data-card]');

            // ---------- Pilih lokasi ----------
            function sync() {
                cards.forEach(function (card) {
                    var radio = card.querySelector('.lokasi-radio');
                    if (card.dataset.disabled === 'true') return;

                    card.classList.toggle('selected', radio.checked);
                    card.querySelector('.btn-pilih').textContent = radio.checked ? 'Terpilih' : 'Pilih Lokasi';

                    if (!radio.checked) {
                        card.querySelectorAll('.chip input').forEach(function (c) { c.checked = false; });
                    }
                });
            }

            cards.forEach(function (card) {
                var radio = card.querySelector('.lokasi-radio');

                // Klik di mana saja pada kartu memilih lokasinya
                card.addEventListener('click', function (e) {
                    if (card.dataset.disabled === 'true' || radio.disabled) return;
                    if (e.target === radio) { sync(); return; }
                    radio.checked = true;
                    sync();
                });

                // Klik chip bidang: pilih kartunya, lalu tandai bidangnya
                card.querySelectorAll('.chip input').forEach(function (chip) {
                    chip.addEventListener('change', function () {
                        radio.checked = true;
                        sync();
                        chip.checked = true;
                    });
                });
            });

            // Hanya UPT TIKP yang tersedia untuk dipilih pada tahap ini.
            var kuotaPenuh = document.getElementById('btnLanjut').dataset.kuotaPenuh === 'true';

            document.getElementById('tujuanForm').addEventListener('submit', function (e) {
                if (kuotaPenuh) {
                    e.preventDefault();
                    return;
                }
                var selected = document.querySelector('.lokasi-radio:checked');
                if (!selected || selected.value !== 'UPT TIKP') {
                    e.preventDefault();
                    alert('Silakan pilih UPT TIKP sebagai tujuan magang.');
                }
            });

            sync();

            // ---------- Validasi periode: min 2 bulan, maks 6 bulan ----------
            var mulai = document.getElementById('tanggal_mulai');
            var selesai = document.getElementById('tanggal_selesai');
            var hint = document.getElementById('periodeHint');
            var hintText = document.getElementById('periodeHintText');
            var btn = document.getElementById('btnLanjut');
            var defaultText = hintText.textContent;

            function iso(d) {
                var m = String(d.getMonth() + 1).padStart(2, '0');
                var day = String(d.getDate()).padStart(2, '0');
                return d.getFullYear() + '-' + m + '-' + day;
            }

            function addMonths(dateStr, n) {
                var d = new Date(dateStr + 'T00:00:00');
                d.setMonth(d.getMonth() + n);
                return d;
            }

            mulai.min = iso(new Date());

            function validate() {
                hint.classList.remove('error');
                hintText.textContent = defaultText;
                btn.disabled = kuotaPenuh;

                if (!mulai.value) {
                    selesai.removeAttribute('min');
                    selesai.removeAttribute('max');
                    return;
                }

                var min = iso(addMonths(mulai.value, 2));
                var max = iso(addMonths(mulai.value, 6));
                selesai.min = min;
                selesai.max = max;

                if (selesai.value && (selesai.value < min || selesai.value > max)) {
                    hint.classList.add('error');
                    hintText.textContent = 'Tanggal selesai harus antara ' + min + ' dan ' + max + ' (2 sampai 6 bulan).';
                    btn.disabled = true;
                }
            }

            mulai.addEventListener('change', validate);
            selesai.addEventListener('change', validate);
            validate();
        })();
    </script>
</body>
</html>