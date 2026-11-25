
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan | Student Portal</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f6fb;
            color: #202432;
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input {
            font-family: inherit;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #0755d8;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px 13px;
            z-index: 10;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 4px 5px 28px;
        }

        .brand-logo {
            width: 47px;
            height: 58px;
            object-fit: contain;
        }

        .brand-label {
            font-size: 8px;
            font-weight: 800;
            background: #4383eb;
            padding: 3px 7px;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 4px;
        }

        .brand-name {
            font-size: 14px;
            font-weight: 800;
        }

        .brand-desc {
            font-size: 10px;
            line-height: 1.5;
            opacity: .85;
            margin-top: 3px;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 13px;
            border-radius: 11px;
            font-size: 13px;
            font-weight: 650;
            color: white;
            transition: .2s;
        }

        .nav-link:hover {
            background: #ffffff20;
        }

        .nav-link.active {
            background: white;
            color: #0755d8;
        }

        .nav-link svg {
            width: 19px;
            height: 19px;
            flex-shrink: 0;
        }

        .nav-bottom {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            gap: 7px;
            padding-top: 25px;
        }

        .logout-form {
            width: 100%;
        }

        .logout-form button {
            border: 0;
            width: 100%;
            background: transparent;
            color: white;
            cursor: pointer;
            text-align: left;
        }

        .main {
            margin-left: 220px;
            min-height: 100vh;
        }

        .topbar {
            height: 66px;
            background: white;
            border-bottom: 1px solid #e2e7f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 27px;
            position: sticky;
            top: 0;
            z-index: 5;
        }

        .portal-title {
            font-size: 14px;
            font-weight: 800;
        }

        .portal-subtitle {
            font-size: 9px;
            letter-spacing: 1px;
            color: #71809a;
            margin-top: 3px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            text-align: right;
        }

        .user-name {
            font-size: 11px;
            font-weight: 700;
        }

        .user-caption {
            font-size: 10px;
            color: #8792a8;
            margin-top: 3px;
        }

        .avatar {
            width: 31px;
            height: 31px;
            background: #0755d8;
            color: white;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 11px;
            font-weight: 800;
        }

        .content {
            max-width: 1500px;
            padding: 25px 27px 45px;
            margin: auto;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            color: #202432;
        }

        .page-description {
            color: #78849a;
            font-size: 12px;
            margin-top: 7px;
            line-height: 1.6;
        }

        .status-summary {
            background: white;
            border: 1px solid #e5e9f2;
            border-radius: 11px;
            padding: 11px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
        }

        .status-summary svg {
            width: 19px;
            height: 19px;
            color: #0755d8;
        }

        .status-summary strong {
            display: block;
            font-size: 11px;
        }

        .status-summary small {
            color: #8b96aa;
            font-size: 10px;
            display: block;
            margin-top: 3px;
        }

        .grid-top {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 17px;
            margin-bottom: 17px;
        }

        .panel {
            background: white;
            border: 1px solid #e4e8f0;
            border-radius: 12px;
            padding: 18px;
            box-shadow: 0 2px 5px #1c31500a;
            min-width: 0;
        }

        .panel-heading {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .panel-icon {
            width: 29px;
            height: 29px;
            border-radius: 8px;
            background: #eaf0ff;
            color: #0755d8;
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .panel-icon svg {
            width: 16px;
            height: 16px;
        }

        .panel-title {
            font-size: 13px;
            font-weight: 800;
        }

        .panel-subtitle {
            font-size: 10px;
            color: #8792a8;
            line-height: 1.6;
            margin-top: 4px;
        }

        .stage-label {
            font-size: 9px;
            color: #0755d8;
            font-weight: 800;
            letter-spacing: .4px;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .document-box {
            min-height: 130px;
            background: #f4f5f8;
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 16px;
            margin-bottom: 11px;
        }

        .document-box.available {
            background: #f1f7ff;
        }

        .document-icon {
            width: 38px;
            height: 38px;
            background: white;
            color: #8792a8;
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin-bottom: 9px;
        }

        .document-box.available .document-icon {
            color: #0755d8;
        }

        .document-icon svg {
            width: 18px;
            height: 18px;
        }

        .document-state {
            font-size: 11px;
            font-weight: 800;
        }

        .document-hint {
            font-size: 9px;
            color: #8c96a8;
            line-height: 1.6;
            margin-top: 5px;
            max-width: 260px;
        }

        .requirement {
            background: #f5f6f9;
            border-radius: 8px;
            padding: 11px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-top: 9px;
        }

        .requirement svg {
            width: 14px;
            height: 14px;
            color: #0755d8;
            flex-shrink: 0;
        }

        .requirement strong {
            display: block;
            font-size: 9px;
            margin-bottom: 4px;
        }

        .requirement p {
            font-size: 9px;
            color: #778197;
            line-height: 1.6;
        }

        .panel-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 12px;
        }

        .footer-note {
            font-size: 9px;
            color: #8792a8;
            line-height: 1.5;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 12px;
            border-radius: 7px;
            border: 1px solid #dce3f0;
            background: white;
            color: #40516e;
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap;
        }

        .btn:hover {
            background: #f4f7ff;
        }

        .btn-primary {
            color: white;
            background: #0755d8;
            border-color: #0755d8;
        }

        .btn-primary:hover {
            background: #0647b8;
        }

        .btn:disabled {
            opacity: .5;
            cursor: not-allowed;
        }

        .btn svg {
            width: 13px;
            height: 13px;
        }

        .upload-input {
            display: none;
        }

        .upload-panel {
            margin-top: 17px;
        }

        .upload-drop {
            background: #f4f5f8;
            border: 1px dashed #cbd4e3;
            border-radius: 9px;
            min-height: 145px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 12px;
        }

        .upload-drop svg {
            width: 23px;
            height: 23px;
            color: #8792a8;
            margin-bottom: 9px;
        }

        .upload-drop strong {
            font-size: 11px;
        }

        .upload-drop p {
            font-size: 9px;
            color: #8c96a8;
            margin-top: 5px;
            line-height: 1.6;
        }

        .file-name {
            color: #0755d8;
            font-weight: 700;
            font-size: 10px;
            margin-top: 8px;
            overflow-wrap: anywhere;
        }

        .upload-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .certificate-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .certificate-preview {
            min-height: 165px;
            background: #f4f5f8;
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 16px;
        }

        .certificate-preview.available {
            background: #f1f7ff;
        }

        .certificate-details {
            background: #f5f6f9;
            border-radius: 9px;
            padding: 13px;
        }

        .certificate-details h4 {
            font-size: 10px;
            margin-bottom: 10px;
        }

        .detail-line {
            padding: 7px 0;
            border-bottom: 1px solid #e4e8ef;
        }

        .detail-line:last-child {
            border-bottom: 0;
        }

        .detail-line small {
            display: block;
            color: #8792a8;
            font-size: 9px;
            margin-bottom: 4px;
        }

        .detail-line strong {
            font-size: 10px;
            overflow-wrap: anywhere;
        }

        .alert {
            border-radius: 8px;
            padding: 11px 13px;
            margin-bottom: 15px;
            font-size: 11px;
            line-height: 1.6;
        }

        .alert-success {
            background: #eaf8ef;
            border: 1px solid #b9e7c9;
            color: #168044;
        }

        .alert-error {
            background: #fff0f0;
            border: 1px solid #f2caca;
            color: #b42318;
        }

        .alert-validation {
            background: #fff8e8;
            border: 1px solid #f3dfad;
            color: #946200;
        }

        .file-meta {
            font-size: 9px;
            color: #8792a8;
            margin-top: 6px;
            overflow-wrap: anywhere;
        }

        .optional-label {
            margin-left: auto;
            font-size: 9px;
            font-weight: 700;
            color: #9a6a19;
            background: #fff4dc;
            padding: 4px 7px;
            border-radius: 10px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
            }

            .grid-top {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                width: 65px;
                padding: 15px 7px;
            }

            .brand {
                justify-content: center;
                padding: 5px 0 25px;
            }

            .brand-logo {
                width: 42px;
            }

            .brand-text,
            .nav-link span {
                display: none;
            }

            .nav-link {
                justify-content: center;
                padding: 12px 5px;
            }

            .main {
                margin-left: 65px;
            }

            .topbar {
                padding: 0 13px;
            }

            .content {
                padding: 18px 12px 30px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-title {
                font-size: 20px;
            }

            .certificate-grid {
                grid-template-columns: 1fr;
            }

            .panel-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .upload-actions {
                justify-content: flex-start;
            }
        }
    </style>
</head>

<body>

@php
    $namaPeserta = $peserta->nama ?? 'Peserta Magang';
    $inisial = collect(explode(' ', trim($namaPeserta)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => strtoupper(substr($kata, 0, 1)))
        ->implode('');

    $statusDiterima = $pengajuan->status_pengajuan === 'Diterima';

    $surat = $pengajuan->suratPenerimaan;
    $logbook = $pengajuan->logbook;
    $laporan = $pengajuan->laporanAkhir;
    $sertifikat = $pengajuan->sertifikatMagang;

    $jumlahDokumen = collect([
        $surat,
        $logbook,
        $laporan,
        $sertifikat,
    ])->filter()->count();

    $tanggalSelesai = $pengajuan->tanggal_selesai;
    $bolehUploadLaporan = $statusDiterima
        && $tanggalSelesai
        && now()->toDateString() >= $tanggalSelesai->toDateString();

    $formatUkuran = function ($ukuran) {
        if (!$ukuran) {
            return '-';
        }

        return $ukuran >= 1048576
            ? number_format($ukuran / 1048576, 2) . ' MB'
            : number_format($ukuran / 1024, 0) . ' KB';
    };
@endphp

<aside class="sidebar">
    <div class="brand">
        <img
            src="{{ asset('images/logo-jatim.png') }}"
            alt="Logo Dinas Pendidikan Jawa Timur"
            class="brand-logo"
            onerror="this.style.display='none'"
        >

        <div class="brand-text">
            <span class="brand-label">DINDIK JATIM</span>
            <div class="brand-name">Student Portal</div>
            <div class="brand-desc">
                Dinas Pendidikan<br>
                Provinsi Jawa Timur
            </div>
        </div>
    </div>

    <nav class="nav-menu">
        <a href="{{ route('peserta.dashboard') }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 10 9-7 9 7"></path>
                <path d="M5 9v12h14V9"></path>
                <path d="M9 21v-7h6v7"></path>
            </svg>
            <span>Beranda</span>
        </a>

        <a href="{{ route('peserta.dokumen.index') }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <path d="M14 2v6h6"></path>
                <path d="M8 13h8M8 17h8"></path>
            </svg>
            <span>Dokumen Magang</span>
        </a>

        <a href="{{ route('peserta.surat-keterangan') }}" class="nav-link active">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="9" r="5"></circle>
                <path d="m8.5 13.5-1.5 7.5 5-3 5 3-1.5-7.5"></path>
            </svg>
            <span>Surat Keterangan</span>
        </a>

        <a href="{{ route('peserta.profil') }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="4"></circle>
                <path d="M5 21v-2a7 7 0 0 1 14 0v2z"></path>
            </svg>
            <span>Profil</span>
        </a>
    </nav>

    <div class="nav-bottom">
        <a href="#" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 1-1 1.7"></path>
                <circle cx="12" cy="17" r=".5"></circle>
            </svg>
            <span>Bantuan</span>
        </a>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="nav-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 17l5-5-5-5"></path>
                    <path d="M15 12H3"></path>
                    <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"></path>
                </svg>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>

<main class="main">

    <header class="topbar">
        <div>
            <div class="portal-title">Portal Magang Dinas Pendidikan</div>
            <div class="portal-subtitle">PROVINSI JAWA TIMUR</div>
        </div>

        <div class="user-info">
            <div>
                <div class="user-name">{{ $namaPeserta }}</div>
                <div class="user-caption">Selamat datang kembali</div>
            </div>
            <div class="avatar">{{ $inisial ?: 'P' }}</div>
        </div>
    </header>

    <section class="content">

        <div class="page-heading">
            <div>
                <h1 class="page-title">Surat Keterangan</h1>
                <p class="page-description">
                    Unduh surat penerimaan, unggah logbook (opsional) dan laporan akhir di akhir masa magang,
                    lalu unduh sertifikat dari UPT TIKP.
                </p>
            </div>

            <div class="status-summary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                    <path d="M9 8h6M9 12h6M9 16h3"></path>
                </svg>
                <div>
                    <strong>STATUS DOKUMEN</strong>
                    <small>{{ $jumlahDokumen }} dari 4 dokumen tersedia</small>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-validation">
                <strong>Periksa kembali berkas yang diunggah:</strong>
                <ul style="padding-left:17px; margin-top:5px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- BARIS ATAS: SURAT PENERIMAAN DAN LOGBOOK --}}
        <div class="grid-top">

            {{-- SURAT PENERIMAAN --}}
            <section class="panel">
                <div class="stage-label">Tahap Awal</div>

                <div class="panel-heading">
                    <div class="panel-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <path d="M14 2v6h6"></path>
                            <path d="M8 13h8M8 17h8"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="panel-title">Surat Keterangan Penerimaan Magang</h2>
                    </div>
                </div>

                <p class="panel-subtitle">
                    Dokumen legalitas sebagai bukti peserta telah lulus seleksi dan memperoleh
                    persetujuan untuk melaksanakan kegiatan magang.
                </p>

                @if ($surat && $surat->file_path)
                    <div class="document-box available">
                        <div class="document-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <path d="M14 2v6h6"></path>
                            </svg>
                        </div>
                        <div class="document-state">Surat Penerimaan Tersedia</div>
                        <div class="document-hint">
                            Nomor surat: {{ $surat->nomor_surat ?? '-' }}<br>
                            Diterbitkan:
                            {{ $surat->tanggal_terbit?->translatedFormat('d F Y') ?? '-' }}
                        </div>
                    </div>
                @else
                    <div class="document-box">
                        <div class="document-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="11" width="16" height="11" rx="2"></rect>
                                <path d="M8 11V7a4 4 0 1 1 8 0v4"></path>
                            </svg>
                        </div>
                        <div class="document-state">Dokumen Belum Tersedia</div>
                        <div class="document-hint">
                            Surat penerimaan akan tersedia setelah diterbitkan oleh Admin UPT TIKP.
                        </div>
                    </div>
                @endif

                <div class="requirement">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 11v5M12 8h.01"></path>
                    </svg>
                    <div>
                        <strong>PERSYARATAN PENERBITAN</strong>
                        <p>
                            Surat diterbitkan setelah pihak UPT TIKP menyetujui
                            peserta dan menyelesaikan tahapan administrasi.
                        </p>
                    </div>
                </div>

                <div class="panel-footer">
                    <span class="footer-note">Dokumen resmi dari UPT TIKP</span>

                    @if ($surat && $surat->file_path)
                        <a href="{{ route('peserta.surat-keterangan.lihat', 'surat-penerimaan') }}"
                           class="btn">
                            Unduh PDF
                        </a>
                    @else
                        <button type="button" class="btn" disabled>
                            Unduh PDF
                        </button>
                    @endif
                </div>
            </section>

            {{-- LOGBOOK --}}
            <section class="panel">
                <div class="stage-label">Tahap Akhir - Opsional</div>

                <div class="panel-heading">
                    <div class="panel-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16H6a2 2 0 0 1-2-2z"></path>
                            <path d="M8 7h8M8 11h8M8 15h5"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="panel-title">Unggah Logbook Magang</h2>
                    </div>
                    <span class="optional-label">Opsional</span>
                </div>

                <p class="panel-subtitle">
                    Unggah sebuah file PDF berisi rekap seluruh kegiatan magang per minggu.
                    Dikumpulkan di akhir magang sebelum laporan akhir (opsional).
                </p>

                @if ($logbook && $logbook->file_path)
                    <div class="document-box available">
                        <div class="document-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12l4 4L19 6"></path>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                        </div>
                        <div class="document-state">Logbook Sudah Diunggah</div>
                        <div class="document-hint">
                            {{ $logbook->nama_berkas }}<br>
                            {{ $logbook->tanggal_unggah?->translatedFormat('d F Y, H:i') ?? '-' }}
                        </div>
                        <div class="file-meta">
                            Ukuran: {{ $formatUkuran($logbook->ukuran_berkas) }}
                        </div>
                    </div>
                @else
                    <div class="document-box">
                        <div class="document-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="11" width="16" height="11" rx="2"></rect>
                                <path d="M8 11V7a4 4 0 1 1 8 0v4"></path>
                            </svg>
                        </div>
                        <div class="document-state">Belum Dapat Diunggah</div>
                        <div class="document-hint">
                            @if ($statusDiterima)
                                Silakan unggah rekap logbook kegiatan magang Anda.
                            @else
                                Logbook dapat diunggah setelah peserta diterima oleh UPT TIKP.
                            @endif
                        </div>
                    </div>
                @endif

                <div class="requirement">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 11v5M12 8h.01"></path>
                    </svg>
                    <div>
                        <strong>KETENTUAN LOGBOOK</strong>
                        <p>
                            Logbook diunggah satu kali dalam bentuk PDF berisi rekap
                            seluruh kegiatan mingguan selama magang.
                        </p>
                    </div>
                </div>

                <div class="panel-footer">
                    <span class="footer-note">Opsional, tidak wajib</span>

                    @if ($logbook && $logbook->file_path)
                        <a href="{{ route('peserta.surat-keterangan.lihat', 'logbook') }}"
                           class="btn">
                            Lihat Logbook
                        </a>
                    @endif
                </div>

                @if ($statusDiterima)
                    <form action="{{ route('peserta.surat-keterangan.logbook') }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf

                        <input
                            type="file"
                            name="file"
                            id="logbookFile"
                            class="upload-input"
                            accept=".pdf,application/pdf"
                        >

                        <div class="upload-actions">
                            <button type="button" class="btn btn-primary"
                                    onclick="document.getElementById('logbookFile').click()">
                                Pilih / Ganti Logbook
                            </button>
                        </div>

                        <div class="file-name" id="logbookFileName"></div>

                        <button type="submit" class="btn btn-primary"
                                id="submitLogbook" style="display:none; margin-top:10px;">
                            Simpan Logbook
                        </button>
                    </form>
                @endif
            </section>
        </div>

        {{-- LAPORAN AKHIR --}}
        <section class="panel upload-panel">
            <div class="stage-label">Tahap Akhir - Langkah 1</div>

            <div class="panel-heading">
                <div class="panel-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <path d="M14 2v6h6"></path>
                        <path d="M8 13h8M8 17h8"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="panel-title">Unggah Laporan Akhir Magang</h2>
                </div>
            </div>

            <p class="panel-subtitle">
                Unggah laporan akhir kegiatan magang Anda. Laporan wajib diunggah
                agar UPT TIKP dapat menerbitkan sertifikat.
            </p>

            @if ($laporan && $laporan->file_path)
                <div class="document-box available">
                    <div class="document-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12l4 4L19 6"></path>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                    </div>
                    <div class="document-state">Laporan Akhir Sudah Diunggah</div>
                    <div class="document-hint">
                        {{ $laporan->nama_berkas }}<br>
                        {{ $laporan->tanggal_unggah?->translatedFormat('d F Y, H:i') ?? '-' }}
                    </div>
                    <div class="file-meta">
                        Ukuran: {{ $formatUkuran($laporan->ukuran_berkas) }}
                    </div>
                </div>
            @else
                <div class="upload-drop">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="11" width="16" height="11" rx="2"></rect>
                        <path d="M8 11V7a4 4 0 1 1 8 0v4"></path>
                    </svg>
                    <strong>
                        {{ $bolehUploadLaporan ? 'Silakan Unggah Laporan Akhir' : 'Belum Dapat Diunggah' }}
                    </strong>
                    <p>
                        @if (!$statusDiterima)
                            Laporan akhir dapat diunggah setelah peserta dinyatakan diterima.
                        @elseif (!$bolehUploadLaporan)
                            Laporan akhir dapat diunggah setelah masa magang selesai.
                        @else
                            Pilih file PDF laporan akhir dari perangkat Anda.
                        @endif
                    </p>
                </div>
            @endif

            <div class="requirement">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M12 11v5M12 8h.01"></path>
                </svg>
                <div>
                    <strong>KETENTUAN UNGGAH</strong>
                    <p>
                        Laporan akhir diunggah satu kali dalam format PDF.
                        UPT TIKP dapat menilai laporan Anda sebelum menerbitkan sertifikat.
                    </p>
                </div>
            </div>

            @if ($bolehUploadLaporan)
                <form action="{{ route('peserta.surat-keterangan.laporan') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf

                    <input
                        type="file"
                        name="file"
                        id="laporanFile"
                        class="upload-input"
                        accept=".pdf,application/pdf"
                    >

                    <div class="upload-actions">
                        <button type="button" class="btn btn-primary"
                                onclick="document.getElementById('laporanFile').click()">
                            Pilih Laporan
                        </button>
                    </div>

                    <div class="file-name" id="laporanFileName"></div>

                    <button type="submit" class="btn btn-primary"
                            id="submitLaporan" style="display:none; margin-top:10px;">
                        Simpan Laporan Akhir
                    </button>
                </form>
            @endif

            @if ($laporan && $laporan->file_path)
                <div class="panel-footer">
                    <span class="footer-note">Laporan akhir tersimpan</span>
                    <a href="{{ route('peserta.surat-keterangan.lihat', 'laporan-akhir') }}"
                       class="btn">
                        Unduh Laporan
                    </a>
                </div>
            @endif
        </section>

        {{-- SURAT KETERANGAN SELESAI DAN SERTIFIKAT --}}
        <section class="panel upload-panel">
            <div class="stage-label">Tahap Akhir - Langkah 2</div>

            <div class="panel-heading">
                <div class="panel-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6"></circle>
                        <path d="m8 13-1 9 5-3 5 3-1-9"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="panel-title">Surat Keterangan Selesai & Sertifikat</h2>
                </div>
                @if ($sertifikat && $sertifikat->file_path)
                    <span class="optional-label" style="color:#168044;background:#e8f7ed;">
                        Tersedia
                    </span>
                @endif
            </div>

            <div class="certificate-grid">
                <div class="certificate-preview {{ $sertifikat && $sertifikat->file_path ? 'available' : '' }}">
                    <div class="document-icon">
                        @if ($sertifikat && $sertifikat->file_path)
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m5 12 4 4L19 6"></path>
                            </svg>
                        @else
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="11" width="16" height="11" rx="2"></rect>
                                <path d="M8 11V7a4 4 0 1 1 8 0v4"></path>
                            </svg>
                        @endif
                    </div>

                    <div class="document-state">
                        {{ $sertifikat && $sertifikat->file_path ? 'Sertifikat Tersedia' : 'Sertifikat Terkunci' }}
                    </div>

                    <div class="document-hint">
                        @if ($sertifikat && $sertifikat->file_path)
                            Sertifikat magang Anda telah diterbitkan.
                        @else
                            Sertifikat akan tersedia setelah proses penilaian dan penerbitan oleh UPT TIKP.
                        @endif
                    </div>
                </div>

                <div class="certificate-details">
                    <h4>SYARAT SERTIFIKAT TERBIT</h4>

                    <div class="detail-line">
                        <small>Laporan akhir</small>
                        <strong>
                            {{ $laporan && $laporan->file_path ? 'Sudah diunggah' : 'Belum diunggah' }}
                        </strong>
                    </div>

                    <div class="detail-line">
                        <small>Nilai akhir</small>
                        <strong>
                            {{ $pengajuan->penilaian ? 'Penilaian tersedia' : 'Menunggu penilaian UPT TIKP' }}
                        </strong>
                    </div>

                    <div class="detail-line">
                        <small>Nomor sertifikat</small>
                        <strong>{{ $sertifikat->nomor_sertifikat ?? 'Belum diterbitkan' }}</strong>
                    </div>

                    <div class="detail-line">
                        <small>Tanggal terbit</small>
                        <strong>
                            {{ $sertifikat?->tanggal_terbit?->translatedFormat('d F Y') ?? '-' }}
                        </strong>
                    </div>

                    @if ($sertifikat?->pejabat_penandatangan)
                        <div class="detail-line">
                            <small>Pejabat penandatangan</small>
                            <strong>{{ $sertifikat->pejabat_penandatangan }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="panel-footer">
                <span class="footer-note">
                    Sertifikat diterbitkan oleh Admin UPT TIKP.
                </span>

                @if ($sertifikat && $sertifikat->file_path)
                    <a href="{{ route('peserta.surat-keterangan.lihat', 'sertifikat') }}"
                       class="btn btn-primary">
                        Unduh Sertifikat
                    </a>
                @else
                    <button type="button" class="btn" disabled>
                        Unduh Sertifikat
                    </button>
                @endif
            </div>
        </section>

    </section>
</main>

<script>
    function aturInputFile(inputId, nameId, submitId) {
        const input = document.getElementById(inputId);
        const name = document.getElementById(nameId);
        const submit = document.getElementById(submitId);

        if (!input || !name || !submit) return;

        input.addEventListener('change', function () {
            if (this.files.length > 0) {
                name.textContent = 'File dipilih: ' + this.files[0].name;
                submit.style.display = 'inline-flex';
            } else {
                name.textContent = '';
                submit.style.display = 'none';
            }
        });
    }

    aturInputFile('logbookFile', 'logbookFileName', 'submitLogbook');
    aturInputFile('laporanFile', 'laporanFileName', 'submitLaporan');
</script>

</body>
</html>
