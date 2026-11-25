<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Verifikasi | Magang Dindik Jatim</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --blue: #0b3d9e;
            --blue2: #0a56d6;
            --text: #20212b;
            --muted: #606477;
            --soft: #8992a5;
            --border: #e1e5ee;
            --bg: #f7f6ff;
            --red: #c52c2c;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', Arial, sans-serif;
        }

        .app {
            display: grid;
            grid-template-columns: 230px minmax(0, 1fr);
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
            background: rgba(255,255,255,.07);
            pointer-events: none;
        }

        .sidebar::before {
            top: 56px;
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
            margin-bottom: 20px;
        }

        .brand-logo {
            width: 40px;
            height: 56px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .brand-title {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-sub {
            margin-top: 3px;
            color: rgba(255,255,255,.8);
            font-size: 10px;
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
            border-radius: 10px;
            color: white;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
        }

        .nav-link svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .nav-link:hover {
            background: rgba(255,255,255,.12);
        }

        .nav-link.active {
            background: white;
            color: var(--blue2);
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0,0,0,.12);
        }

        .nav-link.disabled {
            color: rgba(255,255,255,.5);
            cursor: not-allowed;
        }

        .nav-link.disabled:hover {
            background: none;
        }

        /* ================= MAIN & TOPBAR ================= */
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
            border-bottom: 2px solid #1a5fe0;
            background: linear-gradient(90deg, #fff 0%, #fff 50%, #e6eeff 100%);
        }

        .topbar-title {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .topbar-sub {
            margin: 3px 0 0;
            color: var(--muted);
            font-size: 8px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .bell {
            display: inline-flex;
            color: #64748b;
        }

        .bell svg {
            width: 16px;
            height: 16px;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info {
            line-height: 1.4;
        }

        .user-name {
            font-size: 10px;
            font-weight: 700;
        }

        .user-role {
            color: #94a3b8;
            font-size: 9px;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--blue2);
            color: white;
            font-size: 10px;
            font-weight: 700;
        }

        /* ================= CONTENT ================= */
        .content {
            flex: 1;
            width: 100%;
            max-width: 1250px;
            margin: 0 auto;
            padding: 22px 28px 36px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .welcome {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
        }

        .period-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 5px 11px;
            border: 1px solid #d7e4ff;
            border-radius: 99px;
            background: #f8fbff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .period-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--blue2);
        }

        .welcome h1 {
            margin: 0 0 6px;
            font-size: 22px;
            font-weight: 800;
        }

        .welcome p {
            margin: 0;
            max-width: 680px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .welcome-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 34px;
            padding: 0 15px;
            border: 1px solid var(--blue2);
            border-radius: 99px;
            background: var(--blue2);
            color: white;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .btn svg {
            width: 14px;
            height: 14px;
        }

        .btn:hover {
            background: var(--blue);
        }

        .btn-outline {
            border-color: var(--border);
            background: white;
            color: #334155;
        }

        .btn-outline:hover {
            background: #f5f7fb;
        }

        /* ================= PANEL ================= */
        .panel {
            min-width: 0;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        .panel-body {
            padding: 20px 22px 22px;
        }

        .panel-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0;
            font-size: 13px;
            font-weight: 700;
        }

        .panel-title svg {
            width: 15px;
            height: 15px;
            color: var(--blue2);
        }

        .panel-subtitle {
            margin-top: 4px;
            color: var(--soft);
            font-size: 10px;
            line-height: 1.5;
        }

        .panel-count {
            padding: 6px 11px;
            border-radius: 8px;
            background: #eaf1ff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* ================= FILTER ================= */
        .filter-card {
            padding: 14px 18px;
        }

        .filter-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .filter-heading {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding-right: 12px;
            border-right: 1px solid var(--border);
            font-size: 11px;
            font-weight: 700;
            color: #334155;
        }

        .filter-heading svg {
            width: 14px;
            height: 14px;
        }

        .filter-label {
            color: var(--soft);
            font-size: 10px;
        }

        .filter-select {
            min-width: 180px;
            height: 34px;
            padding: 0 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            background: #fafbfe;
            color: #263445;
            font-family: inherit;
            font-size: 11px;
            font-weight: 500;
        }

        .filter-select:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10,86,214,.1);
        }

        .filter-bottom {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 12px;
        }

        .reset-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 8px;
            background: #f1f3f5;
            color: #475569;
            font-size: 10px;
            font-weight: 500;
            text-decoration: none;
        }

        .reset-btn svg {
            width: 12px;
            height: 12px;
        }

        .reset-btn:hover {
            background: #e6e9ee;
        }

        .realtime {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--muted);
            font-size: 10px;
        }

        .realtime i {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--blue2);
        }

        /* ================= STAT CARDS ================= */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .stat-card {
            padding: 16px 16px 15px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .stat-title {
            color: var(--muted);
            font-size: 10px;
        }

        .stat-icon {
            display: inline-flex;
            color: var(--blue2);
        }

        .stat-icon svg {
            width: 15px;
            height: 15px;
        }

        .stat-number {
            margin-top: 16px;
            font-size: 24px;
            font-weight: 800;
            color: #263445;
        }

        .stat-description {
            margin-top: 6px;
            color: var(--soft);
            font-size: 10px;
        }

        .stat-card.danger .stat-title,
        .stat-card.danger .stat-description {
            color: var(--red);
        }

        .stat-card.danger .stat-number {
            color: #b01c1c;
        }

        .stat-card.primary {
            border-color: #c7dcff;
            box-shadow: 0 3px 10px rgba(10,86,214,.12);
        }

        .stat-card.primary .stat-title,
        .stat-card.primary .stat-number {
            color: var(--blue2);
        }

        /* ================= TABS ================= */
        .tabs {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 18px;
            border-bottom: 1px solid var(--border);
        }

        .tab {
            display: inline-block;
            padding: 10px 14px;
            border-bottom: 2px solid transparent;
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }

        .tab:hover {
            color: var(--blue2);
        }

        .tab.active {
            border-bottom-color: var(--blue2);
            color: var(--blue2);
            font-weight: 700;
        }

        /* ================= TABLE ================= */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
        }

        thead th {
            padding: 12px 11px;
            border-bottom: 1px solid var(--border);
            color: var(--soft);
            font-size: 9px;
            font-weight: 600;
            letter-spacing: .6px;
            text-align: left;
            text-transform: uppercase;
        }

        tbody td {
            padding: 13px 11px;
            border-bottom: 1px solid #edf0f5;
            font-size: 11px;
            vertical-align: middle;
        }

        tbody tr:hover td {
            background: #f8faff;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .person {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .person-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #eaf1ff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
        }

        .person-name {
            font-size: 11px;
            font-weight: 700;
        }

        .person-sub {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 9px;
        }

        .person-id {
            margin-top: 3px;
            color: var(--blue2);
            font-size: 9px;
            font-weight: 700;
        }

        .cell-title {
            font-size: 11px;
            font-weight: 700;
        }

        .cell-sub {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 9px;
            line-height: 1.5;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 12px;
            border-radius: 99px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-badge::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-pending {
            background: #f1f3f5;
            color: #64748b;
        }

        .status-verified {
            background: #eaf1ff;
            color: var(--blue2);
        }

        .status-rejected {
            background: #fdecec;
            color: var(--red);
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 99px;
            background: #f1f5fb;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-action:hover {
            background: #e3ecfb;
        }

        .empty-state {
            padding: 32px 12px;
            color: var(--soft);
            font-size: 11px;
            text-align: center;
        }

        /* ================= PAGINATION ================= */
        .pagination-area {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid #edf0f5;
            margin-top: 12px;
        }

        .pagination-info {
            color: var(--soft);
            font-size: 10px;
        }

        .pagination-links {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 30px;
            height: 30px;
            padding: 0 8px;
            border: 1px solid var(--border);
            border-radius: 8px;
            color: #596579;
            font-size: 10px;
            text-decoration: none;
        }

        .pagination-links a:hover {
            background: #f5f7fb;
        }

        .pagination-links .current {
            border-color: var(--blue2);
            background: var(--blue2);
            color: white;
        }

        .pagination-links .disabled {
            opacity: .4;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 1250px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .app {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: relative;
                height: auto;
                padding: 14px 12px;
            }

            .nav {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .topbar {
                padding: 12px 16px;
            }

            .content {
                padding: 16px;
            }

            .welcome {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .user-info {
                display: none;
            }

            .welcome h1 {
                font-size: 19px;
            }

            .panel-body {
                padding: 16px;
            }

            .filter-select {
                min-width: 0;
                width: 100%;
            }

            .pagination-area {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

@php
    $icons = [
        'grid' => '<rect x="3" y="3" width="7" height="7" rx="1.5"></rect><rect x="14" y="3" width="7" height="7" rx="1.5"></rect><rect x="3" y="14" width="7" height="7" rx="1.5"></rect><rect x="14" y="14" width="7" height="7" rx="1.5"></rect>',
        'verify' => '<rect x="3" y="4" width="18" height="16" rx="2"></rect><path d="m7.5 10 1.5 1.5L12 8.5M14 10h3M7.5 15l1.5 1.5L12 13.5M14 15h3"></path>',
        'users' => '<circle cx="9" cy="8" r="3"></circle><path d="M3 20v-1a5 5 0 0 1 5-5h2a5 5 0 0 1 5 5v1"></path><circle cx="17" cy="9" r="2.2"></circle><path d="M17 14.2a4 4 0 0 1 4 3.8V19"></path>',
        'clipboard' => '<rect x="5" y="4" width="14" height="17" rx="2"></rect><path d="M9 4V3h6v1M9 10h6M9 14h6M9 18h4"></path>',
        'award' => '<circle cx="12" cy="9" r="5"></circle><path d="m8.7 13.5-1.2 7 4.5-2.5 4.5 2.5-1.2-7"></path>',
        'history' => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"></path><path d="M3 3v5h5M12 7v5l3 2"></path>',
        'bell' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.9 1.9 0 0 0 3.4 0"></path>',
        'folder' => '<path d="M3 8V6a2 2 0 0 1 2-2h4l2 2h6a2 2 0 0 1 2 2v2"></path><path d="M3 10h19l-2 8a2 2 0 0 1-2 1.5H5a2 2 0 0 1-2-2z"></path>',
        'shield' => '<path d="M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6z"></path><path d="m9 12 2 2 4-4"></path>',
        'x-circle' => '<circle cx="12" cy="12" r="9"></circle><path d="m15 9-6 6M9 9l6 6"></path>',
        'file' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5M9 13h6M9 17h6"></path>',
        'sliders' => '<path d="M4 6h8M20 6h-2M4 12h2M14 12h6M4 18h10M20 18h-2"></path><circle cx="16" cy="6" r="2"></circle><circle cx="10" cy="12" r="2"></circle><circle cx="16" cy="18" r="2"></circle>',
        'refresh' => '<path d="M21 12a9 9 0 1 1-3-6.7L21 8"></path><path d="M21 3v5h-5"></path>',
    ];

    $svg = fn (string $name) =>
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . ($icons[$name] ?? '') . '</svg>';

    $petugas = auth('petugas')->user();
    $namaAdmin = $petugas->nama ?? 'Admin Pusat';

    $inisialAdmin = collect(preg_split('/\s+/', trim($namaAdmin)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');

    $periodeAktif = collect($daftarPeriode)->first(
        fn ($p) => (string) $p->id_periode === (string) $periodeTerpilih
    );
@endphp

<div class="app">

    <!-- SIDEBAR -->
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
                <div class="brand-sub">Dinas Pusat</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">

            <a href="{{ route('admin-pusat.dashboard') }}" class="nav-link">
                {!! $svg('grid') !!}
                Dashboard
            </a>

            <a href="{{ route('admin-pusat.verifikasi-berkas') }}" class="nav-link">
                {!! $svg('verify') !!}
                Verifikasi Berkas
            </a>

            <a href="#" class="nav-link disabled" aria-disabled="true" onclick="return false;">
                {!! $svg('users') !!}
                Seleksi Wawancara
            </a>

            <a href="#" class="nav-link disabled" aria-disabled="true" onclick="return false;">
                {!! $svg('clipboard') !!}
                Surat Penerimaan
            </a>

            <a href="#" class="nav-link disabled" aria-disabled="true" onclick="return false;">
                {!! $svg('award') !!}
                Penerbitan Sertifikat
            </a>

            <a href="{{ route('admin-pusat.riwayat') }}" class="nav-link active" aria-current="page">
                {!! $svg('history') !!}
                Riwayat
            </a>

        </nav>

    </aside>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div>
                <h2 class="topbar-title">Portal Magang Dinas Pendidikan</h2>
                <p class="topbar-sub">PROVINSI JAWA TIMUR</p>
            </div>

            <div class="topbar-right">
                <span class="bell">{!! $svg('bell') !!}</span>

                <div class="user">
                    <div class="avatar">{{ $inisialAdmin ?: 'AP' }}</div>

                    <div class="user-info">
                        <div class="user-name">{{ $namaAdmin }}</div>
                        <div class="user-role">Sekretariat</div>
                    </div>
                </div>
            </div>

        </header>

        <!-- KONTEN -->
        <main class="content">

            <!-- HEADING -->
            <section class="welcome">

                <div>
                    <div class="period-badge">
                        <span class="period-dot"></span>
                        Admin Pusat &bull; {{ $periodeAktif?->nama_periode ?? 'Semua Periode' }}
                    </div>

                    <h1>Riwayat Verifikasi Berkas</h1>

                    <p>
                        Kelola dan pantau seluruh riwayat hasil verifikasi berkas pendaftar magang
                        pada periode penerimaan.
                    </p>
                </div>

                <div class="welcome-actions">
                    <a href="{{ route('admin-pusat.verifikasi-berkas') }}" class="btn">
                        {!! $svg('verify') !!}
                        Verifikasi Berkas
                    </a>
                </div>

            </section>

            <!-- FILTER -->
            <section class="panel filter-card">

                <form action="{{ route('admin-pusat.riwayat') }}" method="GET">

                    <div class="filter-row">

                        <span class="filter-heading">
                            {!! $svg('sliders') !!}
                            Filter Global:
                        </span>

                        <span class="filter-label">Periode:</span>

                        <select name="periode" class="filter-select" onchange="this.form.submit()">
                            @foreach ($daftarPeriode as $periode)
                                <option
                                    value="{{ $periode->id_periode }}"
                                    @selected((string) $periodeTerpilih === (string) $periode->id_periode)
                                >
                                    {{ $periode->nama_periode }}
                                </option>
                            @endforeach
                        </select>

                        <input type="hidden" name="status" value="{{ $status }}">

                    </div>

                    <div class="filter-bottom">

                        <a href="{{ route('admin-pusat.riwayat') }}" class="reset-btn">
                            {!! $svg('refresh') !!}
                            Reset Filter
                        </a>

                        <span class="realtime">
                            <i></i> Data Terkini (Real-time)
                        </span>

                    </div>

                </form>

            </section>

            <!-- RINGKASAN -->
            <section class="stats-grid">

                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Total Berkas Masuk</span>
                        <span class="stat-icon">{!! $svg('folder') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($totalBerkas, 0, ',', '.') }}</div>
                    <div class="stat-description">Seluruh pengajuan pada periode terpilih</div>
                </article>

                <article class="stat-card primary">
                    <div class="stat-top">
                        <span class="stat-title">Diteruskan ke UPT TIKP</span>
                        <span class="stat-icon">{!! $svg('shield') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($diteruskanKeUpt, 0, ',', '.') }}</div>
                    <div class="stat-description">Berkas lolos verifikasi Admin Pusat</div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Menunggu Verifikasi</span>
                        <span class="stat-icon">{!! $svg('file') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($menungguVerifikasi, 0, ',', '.') }}</div>
                    <div class="stat-description">Berkas yang belum diperiksa</div>
                </article>

                <article class="stat-card danger">
                    <div class="stat-top">
                        <span class="stat-title">Ditolak</span>
                        <span class="stat-icon">{!! $svg('x-circle') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($ditolak, 0, ',', '.') }}</div>
                    <div class="stat-description">Berkas tidak lolos verifikasi</div>
                </article>

            </section>

            <!-- TABEL RIWAYAT -->
            <section class="panel panel-body">

                <div class="panel-header">

                    <div>
                        <h2 class="panel-title">
                            {!! $svg('history') !!}
                            Daftar Riwayat Verifikasi
                        </h2>
                        <div class="panel-subtitle">
                            Hasil verifikasi berkas pendaftar pada periode terpilih
                        </div>
                    </div>

                    <span class="panel-count">{{ $daftarRiwayat->total() }} Berkas</span>

                </div>

                <!-- TAB STATUS -->
                <div class="tabs">
                    <a
                        href="{{ route('admin-pusat.riwayat', ['periode' => $periodeTerpilih, 'status' => 'semua']) }}"
                        class="tab {{ $status === 'semua' ? 'active' : '' }}"
                    >
                        Semua Berkas
                    </a>

                    <a
                        href="{{ route('admin-pusat.riwayat', ['periode' => $periodeTerpilih, 'status' => 'Terverifikasi']) }}"
                        class="tab {{ $status === 'Terverifikasi' ? 'active' : '' }}"
                    >
                        Diteruskan ke UPT TIKP
                    </a>

                    <a
                        href="{{ route('admin-pusat.riwayat', ['periode' => $periodeTerpilih, 'status' => 'Ditolak']) }}"
                        class="tab {{ $status === 'Ditolak' ? 'active' : '' }}"
                    >
                        Ditolak
                    </a>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Peserta & Institusi</th>
                                <th>Jenjang / Jurusan</th>
                                <th>Tujuan Magang</th>
                                <th>Hasil Verifikasi</th>
                                <th>Keterangan</th>
                                <th>Tanggal Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($daftarRiwayat as $pengajuan)

                                @php
                                    $peserta = $pengajuan->peserta;
                                    $namaPeserta = $peserta->nama ?? 'Data peserta tidak tersedia';

                                    $inisialPeserta = collect(preg_split('/\s+/', trim($namaPeserta)))
                                        ->filter()
                                        ->take(2)
                                        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
                                        ->implode('');

                                    $statusClass = match ($pengajuan->status_pengajuan) {
                                        'Diajukan' => 'status-pending',
                                        'Terverifikasi' => 'status-verified',
                                        'Ditolak' => 'status-rejected',
                                        default => 'status-pending',
                                    };

                                    $statusLabel = match ($pengajuan->status_pengajuan) {
                                        'Diajukan' => 'Menunggu Verifikasi',
                                        'Terverifikasi' => 'Diteruskan ke UPT TIKP',
                                        'Ditolak' => 'Ditolak',
                                        default => $pengajuan->status_pengajuan,
                                    };

                                    $tanggalVerifikasi = $pengajuan->tanggal_verifikasi
                                        ? \Carbon\Carbon::parse($pengajuan->tanggal_verifikasi)
                                        : null;
                                @endphp

                                <tr>
                                    <td>
                                        <div class="person">
                                            <div class="person-avatar">{{ $inisialPeserta ?: '?' }}</div>

                                            <div>
                                                <div class="person-name">{{ $namaPeserta }}</div>
                                                <div class="person-sub">{{ $peserta->nama_instansi ?? '-' }}</div>
                                                <div class="person-id">ID: {{ $pengajuan->id_pengajuan }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="cell-title">{{ $peserta->jenjang_pendidikan ?? '-' }}</div>
                                        <div class="cell-sub">{{ $peserta->jurusan ?? '-' }}</div>
                                    </td>

                                    <td>
                                        <div class="cell-title">{{ $pengajuan->tujuan_magang }}</div>
                                        <div class="cell-sub">
                                            {{ $pengajuan->sub_unit_penempatan ?: 'Belum ditentukan' }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                    </td>

                                    <td>
                                        <div class="cell-sub" style="margin-top:0;">
                                            {{ $pengajuan->catatan_verifikasi ?: '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="cell-title">
                                            {{ $tanggalVerifikasi ? $tanggalVerifikasi->translatedFormat('d M Y') : '-' }}
                                        </div>
                                        <div class="cell-sub">
                                            {{ $tanggalVerifikasi ? $tanggalVerifikasi->format('H:i') . ' WIB' : '' }}
                                        </div>
                                    </td>

                                    <td>
                                        <a
                                            href="{{ route('admin-pusat.verifikasi-berkas.detail', $pengajuan->id_pengajuan) }}"
                                            class="btn-action"
                                        >
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            Belum ada riwayat verifikasi pada periode ini.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                @if ($daftarRiwayat->hasPages())
                    <div class="pagination-area">

                        <div class="pagination-info">
                            Menampilkan {{ $daftarRiwayat->firstItem() }}
                            sampai {{ $daftarRiwayat->lastItem() }}
                            dari {{ $daftarRiwayat->total() }} data
                        </div>

                        <div class="pagination-links">
                            @if ($daftarRiwayat->onFirstPage())
                                <span class="disabled">&lsaquo;</span>
                            @else
                                <a href="{{ $daftarRiwayat->previousPageUrl() }}">&lsaquo;</a>
                            @endif

                            @foreach ($daftarRiwayat->getUrlRange(
                                max(1, $daftarRiwayat->currentPage() - 2),
                                min($daftarRiwayat->lastPage(), $daftarRiwayat->currentPage() + 2)
                            ) as $page => $url)

                                @if ($page == $daftarRiwayat->currentPage())
                                    <span class="current">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach

                            @if ($daftarRiwayat->hasMorePages())
                                <a href="{{ $daftarRiwayat->nextPageUrl() }}">&rsaquo;</a>
                            @else
                                <span class="disabled">&rsaquo;</span>
                            @endif
                        </div>
                    </div>
                @endif

            </section>

        </main>
    </div>
</div>

</body>
</html>