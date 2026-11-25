
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Jadwal Wawancara | Dindik Jatim</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        :root {
            --blue: #0755d5;
            --blue-dark: #0647b7;
            --text: #20212b;
            --muted: #697386;
            --border: #e4e8ef;
            --bg: #f5f6fa;
            --green: #159653;
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

        /* SIDEBAR */
        .sidebar {
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            padding: 18px 12px;
            overflow: hidden;
            background: linear-gradient(180deg, #075be0, #064bc4);
            color: white;
        }

        .sidebar::before,
        .sidebar::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,.07);
            pointer-events: none;
        }

        .sidebar::before {
            width: 240px;
            height: 240px;
            top: 80px;
            right: -100px;
        }

        .sidebar::after {
            width: 300px;
            height: 300px;
            bottom: -220px;
            left: -100px;
        }

        .sidebar > * {
            position: relative;
            z-index: 1;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 35px;
            padding: 0 5px;
        }

        .brand-logo {
            width: 40px;
            height: 65px;
            object-fit: contain;
        }

        .brand-title {
            font-size: 14px;
            font-weight: 800;
        }

        .brand-sub {
            margin-top: 4px;
            font-size: 11px;
            color: rgba(255,255,255,.8);
        }

        .nav, .nav-bottom {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 14px;
            border: 0;
            border-radius: 11px;
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
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        .nav-link:hover {
            background: rgba(255,255,255,.12);
        }

        .nav-link.active {
            background: white;
            color: var(--blue);
        }

        .nav-bottom {
            margin-top: auto;
        }

        .nav-bottom form {
            margin: 0;
        }

        /* MAIN */
        .main {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 16px 28px;
            border-bottom: 1px solid #e1e7f2;
            background: linear-gradient(90deg, #fff, #eaf1ff);
            box-shadow: 0 2px 5px rgba(20,35,70,.04);
        }

        .topbar-title {
            margin: 0;
            font-size: 16px;
            font-weight: 800;
        }

        .topbar-sub {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 10px;
            letter-spacing: 1px;
        }

        .topbar-right, .user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            text-align: right;
            line-height: 1.5;
        }

        .user-name {
            font-size: 11px;
            font-weight: 700;
        }

        .user-role {
            color: var(--muted);
            font-size: 9px;
        }

        .avatar-admin {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--blue);
            color: white;
            font-size: 11px;
            font-weight: 800;
        }

        /* CONTENT */
        .content {
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
            padding: 28px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 30px;
            color: var(--blue);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .back-link:hover {
            color: var(--blue-dark);
        }

        .page-heading {
            margin-bottom: 20px;
        }

        .page-heading h1 {
            margin: 0 0 7px;
            font-size: 25px;
            font-weight: 800;
        }

        .page-heading p {
            margin: 0;
            color: #596174;
            font-size: 13px;
            line-height: 1.6;
        }

        /* TWO COLUMN */
        .schedule-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            align-items: start;
            gap: 22px;
        }

        .left-column,
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 14px;
            min-width: 0;
        }

        .panel {
            padding: 25px;
            border: 1px solid #edf0f4;
            border-radius: 15px;
            background: white;
            box-shadow: 0 2px 7px rgba(20,35,70,.035);
        }

        /* PARTICIPANT */
        .participant-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 25px;
        }

        .participant-photo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 12px;
            background: #eaf1ff;
            color: var(--blue);
            font-size: 20px;
            font-weight: 800;
        }

        .participant-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .participant-name {
            margin-bottom: 7px;
            font-size: 20px;
            font-weight: 800;
        }

        .verified {
            display: inline-block;
            margin-left: 5px;
            padding: 5px 9px;
            border-radius: 20px;
            background: #e5f5eb;
            color: #148447;
            font-size: 10px;
            font-weight: 700;
            vertical-align: middle;
        }

        .participant-contact {
            display: flex;
            flex-direction: column;
            gap: 6px;
            color: #586174;
            font-size: 11px;
            overflow-wrap: anywhere;
        }

        .participant-contact a {
            color: inherit;
            text-decoration: none;
        }

        .participant-contact a:hover {
            color: var(--blue);
        }

        .information-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .information-item {
            min-width: 0;
            padding: 16px;
            border-radius: 11px;
            background: #f5f6f8;
        }

        .information-item.full {
            grid-column: 1 / -1;
        }

        .information-label {
            margin-bottom: 7px;
            color: #747c8e;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .3px;
            text-transform: uppercase;
        }

        .information-value {
            color: #20212b;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .information-value.highlight {
            color: var(--blue);
            font-size: 19px;
        }

        .period-icon {
            float: right;
            color: #697386;
        }

        /* DOCUMENTS */
        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 16px;
        }

        .section-heading h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            font-size: 19px;
            font-weight: 800;
        }

        .section-heading h2 svg {
            width: 20px;
            height: 20px;
            color: var(--blue);
        }

        .document-count {
            color: #778093;
            font-size: 11px;
            font-weight: 600;
        }

        .document-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .document-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 15px;
            border-radius: 11px;
            background: #f5f6f8;
        }

        .document-left {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .document-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            color: var(--blue);
        }

        .document-name {
            font-size: 12px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .document-file {
            margin-top: 4px;
            color: #7b8495;
            font-size: 10px;
            overflow-wrap: anywhere;
        }

        .document-status {
            flex-shrink: 0;
            padding: 6px 9px;
            border-radius: 20px;
            background: #e5f5eb;
            color: #148447;
            font-size: 10px;
            font-weight: 700;
        }

        .no-document {
            padding: 20px;
            border-radius: 10px;
            background: #f5f6f8;
            color: var(--muted);
            font-size: 12px;
            text-align: center;
        }

        /* FORM */
        .form-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-heading-icon {
            color: var(--blue);
        }

        .form-heading-icon svg {
            width: 25px;
            height: 25px;
        }

        .form-heading h2 {
            margin: 0 0 5px;
            font-size: 20px;
            font-weight: 800;
        }

        .form-heading p {
            margin: 0;
            color: #7a8191;
            font-size: 11px;
        }

        .info-box {
            display: flex;
            gap: 12px;
            padding: 16px;
            margin-bottom: 22px;
            border-radius: 12px;
            background: #f4f6f9;
            color: #454c5b;
            font-size: 12px;
            line-height: 1.8;
        }

        .info-box svg {
            width: 21px;
            height: 21px;
            flex-shrink: 0;
            color: var(--blue);
        }

        .info-box strong {
            display: block;
            margin-bottom: 3px;
            color: #252a35;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 11px;
            font-weight: 800;
        }

        .required {
            color: #dc2626;
        }

        .form-control {
            width: 100%;
            min-height: 49px;
            padding: 0 14px;
            border: 1px solid #e2e6ed;
            border-radius: 10px;
            outline: none;
            background: #f5f6f8;
            color: #303747;
            font-family: inherit;
            font-size: 12px;
        }

        .form-control:focus {
            border-color: var(--blue);
            background: white;
            box-shadow: 0 0 0 3px rgba(7,85,213,.08);
        }

        .quick-title {
            margin: 0 0 10px;
            color: #65718a;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .quick-options {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 22px;
        }

        .quick-button {
            padding: 9px 13px;
            border: 1px solid #dce5f1;
            border-radius: 22px;
            background: #f4f7fa;
            color: var(--blue);
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .15s;
        }

        .quick-button:hover,
        .quick-button.selected {
            border-color: var(--blue);
            background: #eaf1ff;
        }

        .note-box {
            padding: 17px;
            border: 1px solid #e5eaf1;
            border-radius: 12px;
            background: #f7f8fa;
        }

        .note-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            font-size: 11px;
            font-weight: 800;
        }

        .note-title svg {
            width: 16px;
            height: 16px;
            color: var(--blue);
        }

        .note-description {
            margin: 0 0 12px;
            color: #81899a;
            font-size: 11px;
        }

        .note-box textarea {
            width: 100%;
            min-height: 100px;
            padding: 12px;
            resize: vertical;
            border: 1px solid #e2e6ed;
            border-radius: 8px;
            outline: none;
            background: white;
            color: #303747;
            font-family: inherit;
            font-size: 12px;
            line-height: 1.6;
        }

        .note-box textarea:focus {
            border-color: var(--blue);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 43px;
            padding: 0 17px;
            border: 1px solid #dce1ea;
            border-radius: 9px;
            background: white;
            color: #455064;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .button-primary {
            border-color: var(--blue);
            background: var(--blue);
            color: white;
        }

        .button-primary:hover {
            background: var(--blue-dark);
        }

        .button:disabled {
            opacity: .6;
            cursor: not-allowed;
        }

        .error-message {
            margin-top: 6px;
            color: #dc2626;
            font-size: 10px;
        }

        .alert-error {
            padding: 12px 15px;
            margin-bottom: 16px;
            border: 1px solid #fecaca;
            border-radius: 9px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 12px;
        }

        @media (max-width: 1050px) {
            .schedule-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .app {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: relative;
                height: auto;
            }

            .nav {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .nav-bottom {
                margin-top: 10px;
            }

            .topbar {
                padding: 13px 15px;
            }

            .user-info {
                display: none;
            }

            .content {
                padding: 20px 13px;
            }

            .page-heading h1 {
                font-size: 20px;
            }

            .panel {
                padding: 17px;
            }

            .participant-name {
                font-size: 16px;
            }

            .information-grid {
                grid-template-columns: 1fr;
            }

            .information-item.full {
                grid-column: auto;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

@php
    $namaAdmin = $admin->nama ?? 'Admin UPT TIKP';

    $inisialAdmin = collect(explode(' ', trim($namaAdmin)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => strtoupper(substr($kata, 0, 1)))
        ->implode('');

    $peserta = $pengajuan->peserta;

    $namaPeserta = $peserta->nama ?? '-';

    $inisialPeserta = collect(explode(' ', trim($namaPeserta)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => strtoupper(substr($kata, 0, 1)))
        ->implode('');

    $jenjangLabel = ($peserta->jenjang_pendidikan ?? '') === 'MAHASISWA'
        ? 'S1'
        : 'SMK / Vokasi';

    $programStudi = $peserta->jurusan ?? '-';
    $institusi = $peserta->nama_instansi ?? '-';

    $tanggalMulai = $pengajuan->tanggal_mulai
        ? \Carbon\Carbon::parse($pengajuan->tanggal_mulai)
        : null;

    $tanggalSelesai = $pengajuan->tanggal_selesai
        ? \Carbon\Carbon::parse($pengajuan->tanggal_selesai)
        : null;

    $durasiMagang = ($tanggalMulai && $tanggalSelesai)
        ? $tanggalMulai->diffInMonths($tanggalSelesai) . ' Bulan'
        : '-';

    $dokumen = $pengajuan->dokumen ?? collect();
@endphp

<div class="app">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="brand">
            <img
                class="brand-logo"
                src="{{ asset('images/logo.png') }}"
                alt="Logo Dinas Pendidikan Jawa Timur"
                onerror="this.style.display='none'"
            >

            <div>
                <div class="brand-title">Dindik Jatim</div>
                <div class="brand-sub">UPT TIKP</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">

            <a href="{{ route('admin-upt.dashboard') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                    <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin-upt.wawancara') }}" class="nav-link active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="9" cy="8" r="3.5"/>
                    <path d="M2.5 20v-1a6.5 6.5 0 0 1 13 0v1"/>
                    <path d="M16 5.5a3 3 0 0 1 0 5.5M18.5 20v-1a5 5 0 0 0-3-4.6"/>
                </svg>
                Seleksi Wawancara
            </a>

            <a href="#" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/>
                    <path d="M14 3v5h5M9 13h6M9 17h6"/>
                </svg>
                Surat Penerimaan
            </a>

            <a href="#" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="9" r="5"/>
                    <path d="m8.5 13.5-1.5 7.5 5-3 5 3-1.5-7.5"/>
                </svg>
                Penerbitan Sertifikat
            </a>

            <a href="#" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M3 12a9 9 0 1 0 3-6.7L3 8"/>
                    <path d="M3 3v5h5M12 7v5l3 2"/>
                </svg>
                Riwayat
            </a>

        </nav>

        <div class="nav-bottom">

            <a href="#" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 1-1 1.7"/>
                    <circle cx="12" cy="17" r=".5"/>
                </svg>
                Bantuan
            </a>

            <form action="{{ route('petugas.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <path d="m16 17 5-5-5-5M21 12H9"/>
                    </svg>
                    Keluar
                </button>
            </form>

        </div>
    </aside>

    {{-- MAIN --}}
    <div class="main">

        <header class="topbar">

            <div>
                <h2 class="topbar-title">Portal Magang Dinas Pendidikan</h2>
                <p class="topbar-sub">PROVINSI JAWA TIMUR</p>
            </div>

            <div class="topbar-right">
                <div class="user">
                    <div class="user-info">
                        <div class="user-name">{{ $namaAdmin }}</div>
                        <div class="user-role">{{ $admin->unit_kerja ?? 'UPT TIKP' }}</div>
                    </div>

                    <div class="avatar-admin">
                        {{ $inisialAdmin ?: 'A' }}
                    </div>
                </div>
            </div>

        </header>

        <main class="content">

            <a href="{{ route('admin-upt.wawancara') }}" class="back-link">
                <span style="font-size:20px;">←</span>
                Kembali ke Daftar Seleksi Wawancara
            </a>

            <section class="page-heading">
                <h1>Atur Jadwal Wawancara Tatap Muka</h1>
                <p>
                    Tentukan jadwal wawancara langsung (offline) dan ruangan
                    di Kantor UPT TIKP Surabaya untuk kandidat terpilih.
                </p>
            </section>

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Jadwal belum dapat disimpan.</strong>
                    <ul style="margin:8px 0 0;padding-left:18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="schedule-grid">

                {{-- KOLOM KIRI --}}
                <div class="left-column">

                    {{-- IDENTITAS PESERTA --}}
                    <section class="panel">

                        <div class="participant-header">

                            <div class="participant-photo">
                                @if (!empty($peserta->foto_profil))
                                    <img
                                        src="{{ asset('storage/' . $peserta->foto_profil) }}"
                                        alt="Foto {{ $namaPeserta }}"
                                        onerror="this.style.display='none';this.parentElement.textContent='{{ $inisialPeserta ?: 'P' }}'"
                                    >
                                @else
                                    {{ $inisialPeserta ?: 'P' }}
                                @endif
                            </div>

                            <div>
                                <div class="participant-name">
                                    {{ $namaPeserta }}
                                    <span class="verified">✓ Lolos Seleksi Berkas</span>
                                </div>

                                <div class="participant-contact">
                                    <span>✉ {{ $peserta->email ?? '-' }}</span>
                                    <span>♧ {{ $peserta->no_telepon ?? '-' }}</span>
                                </div>
                            </div>

                        </div>

                        <div class="information-grid">

                            <div class="information-item">
                                <div class="information-label">Universitas / Institusi</div>
                                <div class="information-value">
                                    {{ $institusi }}
                                </div>
                            </div>

                            <div class="information-item">
                                <div class="information-label">Program Studi / Jurusan</div>
                                <div class="information-value">
                                    {{ $programStudi }}
                                </div>
                            </div>

                            <div class="information-item">
                                <div class="information-label">Jenjang</div>
                                <div class="information-value highlight">
                                    {{ $jenjangLabel }}
                                </div>
                            </div>

                            <div class="information-item">
                                <div class="information-label">Tujuan Magang</div>
                                <div class="information-value highlight" style="font-size:14px;">
                                    {{ $pengajuan->tujuan_magang ?? 'UPT TIKP' }}
                                </div>
                            </div>

                            <div class="information-item full">
                                <span class="period-icon">▦</span>
                                <div class="information-label">Periode & Durasi Magang</div>
                                <div class="information-value">
                                    {{ $durasiMagang }}
                                    @if ($tanggalMulai && $tanggalSelesai)
                                        •
                                        {{ $tanggalMulai->translatedFormat('d F Y') }}
                                        —
                                        {{ $tanggalSelesai->translatedFormat('d F Y') }}
                                    @else
                                        • Periode belum tersedia
                                    @endif
                                </div>
                            </div>

                        </div>

                    </section>

                    {{-- DOKUMEN TERLAMPIR --}}
                    <section class="panel">

                        <div class="section-heading">
                            <h2>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M3 7h7l2 2h9v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                    <path d="M3 7V5a2 2 0 0 1 2-2h5l2 2"/>
                                </svg>
                                Dokumen Terlampir
                            </h2>

                            <span class="document-count">
                                {{ $dokumen->count() }} Dokumen
                            </span>
                        </div>

                        @if ($dokumen->isNotEmpty())

                            <div class="document-list">

                                @foreach ($dokumen as $item)
                                    <div class="document-item">

                                        <div class="document-left">

                                            <div class="document-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                    <path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/>
                                                    <path d="M14 3v5h5M9 13h6M9 17h6"/>
                                                </svg>
                                            </div>

                                            <div>
                                                <div class="document-name">
                                                    {{ $item->jenis_dokumen }}
                                                </div>

                                                <div class="document-file">
                                                    {{ basename($item->file_path ?? 'File dokumen') }}
                                                </div>
                                            </div>

                                        </div>

                                        <span class="document-status">
                                            Terlampir
                                        </span>

                                    </div>
                                @endforeach

                            </div>

                        @else

                            <div class="no-document">
                                Belum ada dokumen yang dilampirkan.
                            </div>

                        @endif

                    </section>

                </div>

                {{-- KOLOM KANAN --}}
                <div class="right-column">

                    <section class="panel">

                        <div class="form-heading">

                            <div class="form-heading-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="3" y="5" width="18" height="16" rx="2"/>
                                    <path d="M16 3v4M8 3v4M3 10h18M8 14h3M8 17h3"/>
                                </svg>
                            </div>

                            <div>
                                <h2>Formulir Jadwal Wawancara</h2>
                                <p>Atur jadwal seleksi tahap akhir untuk pelamar ini.</p>
                            </div>

                        </div>

                        <div class="info-box">

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 11v5M12 8h.01"/>
                            </svg>

                            <div>
                                <strong>Ketentuan Wawancara Tatap Muka</strong>
                                Wawancara dilaksanakan secara langsung di Kantor UPT TIKP
                                Dinas Pendidikan Provinsi Jawa Timur,
                                Jl. Jagir Wonokromo No. 350, Surabaya.
                            </div>

                        </div>

                        <form
                            action="{{ route('admin-upt.wawancara.simpan-jadwal', $pengajuan->id_pengajuan) }}"
                            method="POST"
                            id="schedule-form"
                        >
                            @csrf

                            <div class="form-row">

                                <div class="form-group">
                                    <label for="tanggal">
                                        TANGGAL WAWANCARA
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="date"
                                        id="tanggal"
                                        name="tanggal"
                                        class="form-control"
                                        min="{{ now()->format('Y-m-d') }}"
                                        value="{{ old('tanggal') }}"
                                        required
                                    >

                                    @error('tanggal')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waktu">
                                        WAKTU SESI (WIB)
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="time"
                                        id="waktu"
                                        name="waktu"
                                        class="form-control"
                                        value="{{ old('waktu') }}"
                                        required
                                    >

                                    @error('waktu')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            {{-- PILIHAN CEPAT TANGGAL --}}
                            <div class="quick-title">PILIH CEPAT TANGGAL</div>

                            <div class="quick-options" id="date-options">

                                @for ($i = 1; $i <= 4; $i++)
                                    @php
                                        $quickDate = now()->addDays($i);
                                    @endphp

                                    <button
                                        type="button"
                                        class="quick-button date-option"
                                        data-date="{{ $quickDate->format('Y-m-d') }}"
                                    >
                                        {{ $quickDate->translatedFormat('D d/m') }}
                                    </button>
                                @endfor

                            </div>

                            {{-- PILIHAN CEPAT WAKTU --}}
                            <div class="quick-title">PILIH CEPAT WAKTU (WIB)</div>

                            <div class="quick-options" id="time-options">

                                @foreach (['09:00', '10:30', '13:00', '14:30'] as $jam)
                                    <button
                                        type="button"
                                        class="quick-button time-option"
                                        data-time="{{ $jam }}"
                                    >
                                        {{ $jam }} WIB
                                    </button>
                                @endforeach

                            </div>

                            {{-- CATATAN --}}
                            <div class="note-box">

                                <div class="note-title">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/>
                                        <path d="M14 3v5h5M9 13h6M9 17h6"/>
                                    </svg>
                                    CATATAN KHUSUS & INSTRUKSI KEHADIRAN
                                </div>

                                <p class="note-description">
                                    Catatan ini akan menjadi instruksi bagi peserta.
                                </p>

                                <textarea
                                    name="catatan_instruksi"
                                    id="catatan_instruksi"
                                    maxlength="1000"
                                    placeholder="Tuliskan instruksi kehadiran, seperti membawa dokumen asli, hadir 15 menit sebelum wawancara, atau ketentuan lainnya..."
                                >{{ old('catatan_instruksi') }}</textarea>

                                @error('catatan_instruksi')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-actions">

                                <a
                                    href="{{ route('admin-upt.wawancara') }}"
                                    class="button"
                                >
                                    Batal
                                </a>

                                <button
                                    type="submit"
                                    class="button button-primary"
                                    id="submit-button"
                                >
                                    <span>▣</span>
                                    Simpan Jadwal Wawancara
                                </button>

                            </div>

                        </form>

                    </section>

                </div>

            </div>

        </main>

    </div>

</div>

<script>
    // Pilihan cepat tanggal.
    document.querySelectorAll('.date-option').forEach(function(button) {
        button.addEventListener('click', function() {
            document.getElementById('tanggal').value = this.dataset.date;

            document.querySelectorAll('.date-option').forEach(function(item) {
                item.classList.remove('selected');
            });

            this.classList.add('selected');
        });
    });

    // Pilihan cepat waktu.
    document.querySelectorAll('.time-option').forEach(function(button) {
        button.addEventListener('click', function() {
            document.getElementById('waktu').value = this.dataset.time;

            document.querySelectorAll('.time-option').forEach(function(item) {
                item.classList.remove('selected');
            });

            this.classList.add('selected');
        });
    });

    // Mencegah tombol diklik berulang saat form dikirim.
    document.getElementById('schedule-form').addEventListener('submit', function() {
        const button = document.getElementById('submit-button');
        button.disabled = true;
        button.innerHTML = 'Menyimpan...';
    });
</script>

</body>
</html>
