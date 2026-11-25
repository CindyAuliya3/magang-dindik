<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerbitan Surat Penerimaan | Admin UPT TIKP</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue: #0b3d9e;
            --blue2: #0a56d6;
            --text: #20212b;
            --muted: #606477;
            --border: #e1e5ee;
            --bg: #f7f6ff;
            --green: #16a34a;
            --red: #dc2626;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: var(--bg);
        }

        .app {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 222px minmax(0, 1fr);
        }

        /* SIDEBAR */
        .sidebar {
            background: linear-gradient(160deg, #0755d9, #0750c7);
            color: white;
            padding: 22px 12px;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
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
            width: 260px;
            height: 260px;
            right: -110px;
            top: 100px;
        }

        .sidebar::after {
            width: 320px;
            height: 320px;
            left: -130px;
            bottom: -200px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px;
            margin-bottom: 32px;
            position: relative;
            z-index: 1;
        }

        .brand img {
            width: 55px;
            height: 70px;
            object-fit: contain;
        }

        .brand strong {
            display: block;
            font-size: 16px;
        }

        .brand span {
            font-size: 12px;
            opacity: .85;
            display: block;
            margin-top: 5px;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 7px;
            position: relative;
            z-index: 1;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 15px;
            border-radius: 13px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,.13);
        }

        .nav-link.active {
            color: #0755d9;
            background: white;
        }

        .nav-link svg {
            width: 19px;
            height: 19px;
            flex-shrink: 0;
        }

        .nav-bottom {
            margin-top: auto;
            position: relative;
            z-index: 1;
        }

        /* MAIN */
        .main {
            min-width: 0;
        }

        .topbar {
            height: 78px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 8px rgba(20,30,60,.04);
        }

        .portal-title {
            font-size: 19px;
            font-weight: 700;
        }

        .portal-subtitle {
            font-size: 11px;
            color: var(--muted);
            letter-spacing: 1.5px;
            margin-top: 4px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 13px;
            text-align: right;
        }

        .admin-info strong {
            display: block;
            font-size: 13px;
        }

        .admin-info span {
            display: block;
            color: var(--muted);
            font-size: 12px;
            margin-top: 4px;
        }

        .avatar {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            background: var(--blue2);
            color: white;
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: 700;
        }

        .content {
            max-width: 1500px;
            margin: auto;
            padding: 28px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: #475569;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .back-link:hover {
            color: var(--blue2);
        }

        .page-title {
            font-size: 23px;
            font-weight: 800;
            margin: 0 0 7px;
        }

        .page-description {
            color: #718096;
            font-size: 13px;
            margin: 0 0 26px;
            line-height: 1.6;
        }

        /* CARD */
        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(20,30,60,.04);
            padding: 25px;
            margin-bottom: 23px;
        }

        /* PARTICIPANT */
        .participant-card {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(0, 1.5fr);
            align-items: center;
            gap: 24px;
        }

        .participant-info {
            display: flex;
            align-items: center;
            gap: 18px;
            min-width: 0;
        }

        .participant-icon {
            width: 48px;
            height: 48px;
            color: var(--blue2);
            flex-shrink: 0;
        }

        .participant-name {
            font-size: 17px;
            font-weight: 800;
        }

        .status {
            display: inline-block;
            background: #e8f6ed;
            color: #16803c;
            border: 1px solid #b9e5c8;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            margin-left: 6px;
        }

        .period-badge {
            display: inline-block;
            background: #eff6ff;
            border: 1px solid #cfe0ff;
            color: var(--blue2);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            margin: 9px 0 7px;
        }

        .participant-detail {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
            line-height: 1.5;
        }

        .participant-summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .summary-box {
            background: #f8fafc;
            border: 1px solid #eef0f4;
            border-radius: 11px;
            padding: 15px 12px;
            min-width: 0;
        }

        .summary-box small {
            color: #94a3b8;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .5px;
            display: block;
            margin-bottom: 8px;
        }

        .summary-box strong {
            font-size: 12px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        /* FORM */
        .form-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 23px;
        }

        .form-label {
            background: var(--blue2);
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            border-radius: 5px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .ready-badge {
            background: #e8f6ed;
            color: #16803c;
            border: 1px solid #b9e5c8;
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 10px;
            font-weight: 700;
        }

        .form-title {
            font-size: 17px;
            font-weight: 800;
            margin: 0 0 6px;
        }

        .form-description {
            font-size: 13px;
            line-height: 1.7;
            color: #718096;
            margin: 0 0 25px;
            max-width: 560px;
        }

        .field {
            margin-bottom: 20px;
            min-width: 0;
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 9px;
        }

        .required {
            color: var(--red);
        }

        .field input,
        .field select {
            width: 100%;
            height: 43px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            padding: 0 13px;
            font-family: inherit;
            font-size: 13px;
            color: #334155;
            background: white;
            outline: none;
        }

        .field input:focus,
        .field select:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10,86,214,.08);
        }

        .field input[readonly] {
            background: #f8fafc;
            color: #475569;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .field-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .field-heading a {
            font-size: 11px;
            color: var(--blue2);
            font-weight: 600;
        }

        .upload-area {
            border: 1px dashed #93b8f5;
            background: #f8fbff;
            border-radius: 10px;
            padding: 22px;
            text-align: center;
            cursor: pointer;
            transition: .2s;
        }

        .upload-area:hover {
            background: #eff6ff;
        }

        .upload-area svg {
            width: 32px;
            height: 32px;
            color: var(--blue2);
            margin-bottom: 9px;
        }

        .upload-area strong {
            display: block;
            font-size: 13px;
            color: #334155;
            margin-bottom: 5px;
        }

        .upload-area span {
            font-size: 11px;
            color: #94a3b8;
        }

        .upload-area input {
            display: none;
        }

        .file-preview {
            display: none;
            border: 1px solid #cfe0ff;
            background: #f8fbff;
            padding: 16px;
            border-radius: 9px;
            align-items: center;
            gap: 12px;
            margin-top: 12px;
        }

        .file-preview.show {
            display: flex;
        }

        .file-icon {
            color: var(--blue2);
        }

        .file-name {
            font-size: 12px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .file-size {
            font-size: 10px;
            color: #64748b;
            margin-top: 5px;
        }

        .notification {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            padding: 16px;
            border-radius: 10px;
            margin-top: 5px;
        }

        .notification input {
            width: 18px;
            height: 18px;
            accent-color: var(--blue2);
            flex-shrink: 0;
        }

        .notification label {
            font-size: 12px;
            line-height: 1.6;
            color: #334155;
            font-weight: 600;
        }

        .notice {
            font-size: 11px;
            color: #64748b;
            margin-top: 12px;
            line-height: 1.6;
        }

        .error {
            color: var(--red);
            font-size: 11px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 8px;
            padding: 12px 19px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-secondary {
            color: #475569;
            background: #f1f5f9;
        }

        .btn-primary {
            background: var(--blue2);
            color: white;
        }

        .btn-primary:hover {
            background: var(--blue);
        }

        .existing-file {
            background: #f8fbff;
            border: 1px solid #cfe0ff;
            border-radius: 10px;
            padding: 17px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .existing-file a {
            color: var(--blue2);
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        .alert-success {
            background: #e8f6ed;
            color: #16803c;
        }

        .alert-danger {
            background: #fee2e2;
            color: #b91c1c;
        }

        @media (max-width: 1050px) {
            .participant-card {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .app {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .topbar {
                padding: 0 16px;
            }

            .content {
                padding: 18px 14px;
            }

            .participant-summary {
                grid-template-columns: 1fr;
            }

            .field-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .card {
                padding: 18px;
            }

            .page-title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
@php
    $peserta = $pengajuan->peserta;
    $periode = $pengajuan->periode;
    $hasil = $pengajuan->hasilSeleksi;
    $surat = $pengajuan->suratPenerimaan;

    $namaAdmin = auth('petugas')->user()->nama ?? 'Admin UPT TIKP';

    $inisial = collect(preg_split('/\s+/', trim($namaAdmin)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => strtoupper(substr($kata, 0, 1)))
        ->implode('');

    $formatTanggal = function ($tanggal) {
        return $tanggal
            ? \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y')
            : '-';
    };

    $namaPeriode = $periode->nama_periode ?? '-';

    $tanggalMulai = $periode->tanggal_mulai ?? null;
    $tanggalSelesai = $periode->tanggal_selesai ?? null;

    $durasi = '-';

    if ($tanggalMulai && $tanggalSelesai) {
        $durasi = $formatTanggal($tanggalMulai) . ' - ' . $formatTanggal($tanggalSelesai);
    }
@endphp

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Dindik Jatim">
            <div>
                <strong>Dindik Jatim</strong>
                <span>UPT TIKP</span>
            </div>
        </div>

        <nav class="nav">
            <a href="{{ route('admin-upt.dashboard') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin-upt.wawancara') }}" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                Seleksi Wawancara
            </a>

            <a href="{{ route('admin-upt.surat-penerimaan') }}" class="nav-link active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <path d="M14 2v6h6M8 13h8M8 17h8"/>
                </svg>
                Surat Penerimaan
            </a>

            <a href="#" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="8" r="6"/>
                    <path d="m8.2 13.5-1 8.5 4.8-2.5 4.8 2.5-1-8.5"/>
                </svg>
                Penerbitan Sertifikat
            </a>

            <a href="#" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12a9 9 0 1 0 3-6.7L3 8"/>
                    <path d="M3 3v5h5M12 7v5l4 2"/>
                </svg>
                Riwayat
            </a>
        </nav>

        <div class="nav-bottom">
            <a href="#" class="nav-link">
                Bantuan
            </a>

            <a href="{{ route('petugas.logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Keluar
            </a>

            <form id="logout-form" action="{{ route('petugas.logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <header class="topbar">
            <div>
                <div class="portal-title">Portal Magang Dinas Pendidikan</div>
                <div class="portal-subtitle">PROVINSI JAWA TIMUR</div>
            </div>

            <div class="admin-info">
                <div>
                    <strong>{{ $namaAdmin }}</strong>
                    <span>UPT TIKP</span>
                </div>
                <div class="avatar">{{ $inisial ?: 'AU' }}</div>
            </div>
        </header>

        <div class="content">

            <a href="{{ route('admin-upt.surat-penerimaan') }}" class="back-link">
                <span>←</span>
                Kembali ke Daftar Penerbitan Dokumen
            </a>

            <h1 class="page-title">Penerbitan Surat Penerimaan Magang</h1>
            <p class="page-description">
                Kelola penerbitan surat penerimaan resmi bagi peserta magang yang dinyatakan diterima.
            </p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali data berikut:</strong>
                    <ul style="margin-bottom:0;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- INFORMASI PESERTA -->
            <section class="card participant-card">

                <div class="participant-info">
                    <svg class="participant-icon" viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="12" cy="7" r="4"/>
                        <path d="M4 21v-2a8 8 0 0 1 16 0v2z"/>
                    </svg>

                    <div>
                        <div>
                            <span class="participant-name">
                                {{ $peserta->nama ?? 'Nama peserta tidak tersedia' }}
                            </span>

                            <span class="status">Lolos Seleksi Akhir</span>
                        </div>

                        <span class="period-badge">
                            Periode {{ $namaPeriode }}
                        </span>

                        <div class="participant-detail">
                            {{ $peserta->nama_instansi ?? '-' }}
                            •
                            {{ $peserta->jurusan ?? '-' }}
                            ({{ $peserta->jenjang_pendidikan ?? '-' }})
                        </div>

                        <div class="participant-detail">
                            ID Registrasi: {{ $pengajuan->id_pengajuan }}
                        </div>
                    </div>
                </div>

                <div class="participant-summary">
                    <div class="summary-box">
                        <small>TUJUAN MAGANG:</small>
                        <strong>UPT TIKP</strong>
                    </div>

                    <div class="summary-box">
                        <small>PERIODE DATA:</small>
                        <strong>{{ $namaPeriode }}</strong>
                    </div>

                    <div class="summary-box">
                        <small>PERIODE MAGANG:</small>
                        <strong>{{ $durasi }}</strong>
                    </div>
                </div>

            </section>

            <!-- FORM SURAT -->
            <section class="card">

                <div class="form-header">
                    <span class="form-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <path d="M14 2v6h6M8 13h8M8 17h5"/>
                        </svg>
                        SURAT PENERIMAAN
                    </span>

                    <span class="ready-badge">
                        ● {{ $surat ? 'Sudah Diterbitkan' : 'Siap Diterbitkan' }}
                    </span>
                </div>

                <h2 class="form-title">Surat Keterangan Penerimaan Magang</h2>

                <p class="form-description">
                    Dokumen legalitas sebagai bukti persetujuan institusi Dinas Pendidikan
                    atas usulan praktik kerja peserta magang.
                </p>

                @if($surat)

                    <div class="existing-file">
                        <div>
                            <strong style="font-size:13px;">Surat Penerimaan sudah diunggah</strong>
                            <div class="participant-detail">
                                Nomor: {{ $surat->nomor_surat }}
                            </div>
                            <div class="participant-detail">
                                Tanggal terbit: {{ $formatTanggal($surat->tanggal_terbit) }}
                            </div>
                        </div>

                        <a href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($surat->file_path) }}"
                           target="_blank" rel="noopener">
                            Lihat Dokumen ↗
                        </a>
                    </div>

                @else

                    <form
                        action="{{ route('admin-upt.surat-penerimaan.store', $pengajuan->id_pengajuan) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <!-- NOMOR SURAT -->
                        <div class="field">
                            <div class="field-heading">
                                <label for="nomor_surat">
                                    Nomor Registrasi Surat Dinas
                                    <span class="required">*</span>
                                </label>
                            </div>

                            <input
                                type="text"
                                id="nomor_surat"
                                name="nomor_surat"
                                value="{{ old('nomor_surat') }}"
                                placeholder="Contoh: TIKP/041/2026"
                                required
                            >

                            @error('nomor_surat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- TANGGAL DAN PEJABAT -->
                        <div class="field-row">

                            <div class="field">
                                <label for="tanggal_terbit">
                                    Tanggal Surat Terbit
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="date"
                                    id="tanggal_terbit"
                                    name="tanggal_terbit"
                                    value="{{ old('tanggal_terbit') }}"
                                    required
                                >

                                @error('tanggal_terbit')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="pejabat">
                                    Pejabat Penandatangan
                                </label>

                                <input
                                    type="text"
                                    id="pejabat"
                                    value="Pejabat berwenang UPT TIKP"
                                    readonly
                                >

                                <div class="notice">
                                    Informasi pejabat ditampilkan sebagai keterangan dan belum disimpan ke database.
                                </div>
                            </div>

                        </div>

                        <!-- UPLOAD PDF -->
                        <div class="field">
                            <label>
                                Unggah Berkas PDF (TTE BSrE / Cap Resmi)
                                <span class="required">*</span>
                            </label>

                            <label for="file_surat" class="upload-area">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                    <path d="M12 16V4m-4 4 4-4 4 4"/>
                                    <path d="M4 16v4h16v-4"/>
                                </svg>

                                <strong>Pilih berkas PDF Surat Penerimaan</strong>
                                <span>Format PDF • Maksimal 5 MB</span>

                                <input
                                    type="file"
                                    id="file_surat"
                                    name="file_surat"
                                    accept="application/pdf,.pdf"
                                    required
                                >
                            </label>

                            <div class="file-preview" id="filePreview">
                                <div class="file-icon">
                                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <path d="M14 2v6h6"/>
                                    </svg>
                                </div>

                                <div>
                                    <div class="file-name" id="fileName"></div>
                                    <div class="file-size" id="fileSize"></div>
                                </div>
                            </div>

                            @error('file_surat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- INFORMASI NOTIFIKASI -->
                        <div class="notification">
                            <input type="checkbox" id="notifikasi" checked disabled>

                            <label for="notifikasi">
                                Notifikasi email otomatis: surat penerimaan dapat diunduh
                                di portal peserta dan tautan unduh dikirim ke email peserta.
                            </label>
                        </div>

                        <p class="notice">
                            Catatan: Pengiriman notifikasi email otomatis belum diaktifkan.
                            Checkbox ini hanya informasi tampilan dan tidak menjalankan pengiriman email.
                        </p>

                        <!-- TOMBOL -->
                        <div class="actions">
                            <a href="{{ route('admin-upt.surat-penerimaan') }}"
                               class="btn btn-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Simpan Surat Penerimaan
                            </button>
                        </div>

                    </form>

                @endif

            </section>

        </div>
    </main>
</div>

<script>
    const fileInput = document.getElementById('file_surat');

    if (fileInput) {
        fileInput.addEventListener('change', function () {
            const file = this.files[0];

            const preview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');

            if (!file) {
                preview.classList.remove('show');
                return;
            }

            if (file.type !== 'application/pdf') {
                alert('File harus berformat PDF.');
                this.value = '';
                preview.classList.remove('show');
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file maksimal 5 MB.');
                this.value = '';
                preview.classList.remove('show');
                return;
            }

            fileName.textContent = file.name;
            fileSize.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';

            preview.classList.add('show');
        });
    }
</script>

</body>
</html>