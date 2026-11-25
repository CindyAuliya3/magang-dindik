<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Berkas | Admin Pusat</title>

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
            padding: 24px 26px 36px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .panel {
            min-width: 0;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        /* ================= SUMMARY ================= */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .summary-card {
            padding: 20px 20px 18px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        .summary-card.blue {
            border-color: var(--blue2);
            background: var(--blue2);
            color: white;
            box-shadow: 0 4px 12px rgba(10,86,214,.2);
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .summary-label {
            color: #7b8196;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .6px;
            text-transform: uppercase;
        }

        .summary-icon {
            display: inline-flex;
            color: var(--blue2);
        }

        .summary-icon svg {
            width: 15px;
            height: 15px;
        }

        .summary-number {
            margin: 18px 0 8px;
            font-size: 28px;
            font-weight: 800;
        }

        .summary-description {
            color: var(--muted);
            font-size: 10px;
        }

        .summary-card.red .summary-label {
            color: var(--red);
        }

        .summary-card.red .summary-number {
            color: #b01c1c;
        }

        .summary-card.blue .summary-label,
        .summary-card.blue .summary-description {
            color: rgba(255,255,255,.88);
        }

        /* ================= FILTER ================= */
        .filter-panel {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 180px;
        }

        .search-box svg {
            position: absolute;
            top: 11px;
            left: 12px;
            width: 15px;
            height: 15px;
            color: #8992a5;
        }

        .search-box input,
        .filter-select {
            height: 36px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            background: white;
            color: #334155;
            font-family: inherit;
            font-size: 11px;
        }

        .search-box input {
            width: 100%;
            padding: 0 12px 0 36px;
        }

        .filter-select {
            min-width: 150px;
            padding: 0 12px;
        }

        .search-box input:focus,
        .filter-select:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10,86,214,.1);
        }

        .btn-filter {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 36px;
            padding: 0 16px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: #fafbfe;
            color: #334155;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-filter svg {
            width: 13px;
            height: 13px;
        }

        .btn-filter:hover {
            border-color: var(--blue2);
            background: #f3f7ff;
        }

        .btn-reset {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            color: var(--blue2);
            text-decoration: none;
        }

        .btn-reset svg {
            width: 15px;
            height: 15px;
        }

        .btn-reset:hover {
            background: #eaf1ff;
        }

        /* ================= TABLE ================= */
        .table-panel {
            padding: 20px 22px 22px;
        }

        .table-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }

        .table-title {
            display: inline-block;
            margin: 0;
            font-size: 15px;
            font-weight: 800;
        }

        .count-badge {
            display: inline-block;
            margin-left: 10px;
            padding: 5px 11px;
            border: 1px solid #d7e4ff;
            border-radius: 99px;
            background: #eaf1ff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
        }

        .table-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            color: #475569;
            font-size: 10px;
        }

        .table-meta i {
            display: inline-block;
            width: 6px;
            height: 6px;
            margin-right: 6px;
            border-radius: 50%;
            background: var(--blue2);
        }

        .table-meta i.dark {
            background: #1f2937;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        thead th {
            padding: 13px 11px;
            border-bottom: 1px solid var(--border);
            color: #8992a5;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: .8px;
            text-align: left;
            text-transform: uppercase;
        }

        tbody td {
            padding: 14px 11px;
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
            gap: 12px;
        }

        .person-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e8eef9;
            color: #3b4a66;
            font-size: 10px;
            font-weight: 700;
        }

        .person-name {
            font-size: 11px;
            font-weight: 700;
        }

        .person-sub {
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
        }

        .person-id {
            margin-top: 3px;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
        }

        .cell-title {
            font-size: 11px;
            font-weight: 700;
        }

        .cell-sub {
            margin-top: 4px;
            color: var(--muted);
            font-size: 10px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            min-width: 130px;
            padding: 7px 13px;
            border-radius: 99px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-badge svg {
            width: 13px;
            height: 13px;
        }

        .status-badge .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            opacity: .7;
        }

        .status-pending {
            background: #f1f3f5;
            color: #64748b;
        }

        .status-verified {
            background: #e5efff;
            color: var(--blue2);
        }

        .status-rejected {
            background: #e3f5eb;
            color: #16834a;
        }

        .status-other {
            background: #fff4df;
            color: #b45309;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 15px;
            border-radius: 8px;
            background: var(--blue2);
            color: white;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-action svg {
            width: 13px;
            height: 13px;
        }

        .btn-action:hover {
            background: var(--blue);
        }

        .btn-action.secondary {
            background: #f1f3f5;
            color: #374151;
        }

        .btn-action.secondary:hover {
            background: #e6e9ee;
        }

        .empty-state {
            padding: 38px 15px;
            color: #8992a5;
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
            border-top: 1px solid var(--border);
            margin-top: 12px;
        }

        .pagination-info {
            color: var(--muted);
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
            border-radius: 7px;
            color: #596579;
            font-size: 10px;
            text-decoration: none;
        }

        .pagination-links a:hover {
            border-color: var(--blue2);
            color: var(--blue2);
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

            .filter-panel {
                flex-wrap: wrap;
            }

            .search-box {
                flex-basis: 100%;
            }
        }

        @media (max-width: 700px) {
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .user-info {
                display: none;
            }

            .table-panel {
                padding: 16px;
            }

            .filter-select,
            .btn-filter {
                flex: 1;
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
        'file' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5M9 13h6M9 17h6"></path>',
        'alert' => '<path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z"></path><path d="M12 9v4M12 17h.01"></path>',
        'search' => '<circle cx="11" cy="11" r="7"></circle><path d="m20 20-4-4"></path>',
        'funnel' => '<path d="M22 3H2l8 9.5V19l4 2v-8.5z"></path>',
        'refresh' => '<path d="M21 12a9 9 0 1 1-3-6.7L21 8"></path><path d="M21 3v5h-5"></path>',
        'eye' => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path><circle cx="12" cy="12" r="3"></circle>',
        'check-circle' => '<circle cx="12" cy="12" r="9"></circle><path d="m8.5 12.5 2.5 2.5 4.5-5"></path>',
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

    $persenBelum = $totalAntrean > 0
        ? round(($belumDiperiksa / $totalAntrean) * 100)
        : 0;
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
                <div class="brand-sub">Kantor Pusat</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">

            <a href="{{ route('admin-pusat.dashboard') }}" class="nav-link">
                {!! $svg('grid') !!}
                Dashboard
            </a>

            <a href="{{ route('admin-pusat.verifikasi-berkas') }}" class="nav-link active" aria-current="page">
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

            <a href="{{ route('admin-pusat.riwayat') }}" class="nav-link">
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

            <!-- RINGKASAN -->
            <section class="summary-grid">

                <article class="summary-card">
                    <div class="summary-top">
                        <span class="summary-label">Total Antrean</span>
                        <span class="summary-icon">{!! $svg('file') !!}</span>
                    </div>
                    <div class="summary-number">{{ number_format($totalAntrean, 0, ',', '.') }}</div>
                    <div class="summary-description">&bull; Berkas pendaftar magang UPT TIKP</div>
                </article>

                <article class="summary-card red">
                    <div class="summary-top">
                        <span class="summary-label">Belum Diperiksa</span>
                        <span class="summary-icon">{!! $svg('alert') !!}</span>
                    </div>
                    <div class="summary-number">{{ number_format($belumDiperiksa, 0, ',', '.') }}</div>
                    <div class="summary-description">&bull; {{ $persenBelum }}% dari total antrean</div>
                </article>

                <article class="summary-card blue">
                    <div class="summary-top">
                        <span class="summary-label">Verifikasi Hari Ini</span>
                    </div>
                    <div class="summary-number">{{ number_format($verifikasiHariIni, 0, ',', '.') }}</div>
                    <div class="summary-description">&bull; Akumulasi berkas diproses hari ini</div>
                </article>

            </section>

            <!-- FILTER -->
            <form
                action="{{ route('admin-pusat.verifikasi-berkas') }}"
                method="GET"
                class="panel filter-panel"
            >

                <div class="search-box">
                    {!! $svg('search') !!}

                    <input
                        type="text"
                        name="q"
                        value="{{ $kataKunci }}"
                        placeholder="Cari nama kandidat, universitas, atau ID pendaftaran..."
                    >
                </div>

                <select name="status" class="filter-select">
                    <option value="semua" @selected($status === 'semua')>Semua Status</option>
                    <option value="Diajukan" @selected($status === 'Diajukan')>Menunggu Verifikasi</option>
                    <option value="Terverifikasi" @selected($status === 'Terverifikasi')>Lolos Verifikasi</option>
                    <option value="Ditolak" @selected($status === 'Ditolak')>Ditolak</option>
                </select>

                <button type="submit" class="btn-filter">
                    {!! $svg('funnel') !!}
                    Filter
                </button>

                <a
                    href="{{ route('admin-pusat.verifikasi-berkas') }}"
                    class="btn-reset"
                    title="Reset filter"
                    aria-label="Reset filter"
                >
                    {!! $svg('refresh') !!}
                </a>

            </form>

            <!-- TABEL -->
            <section class="panel table-panel">

                <div class="table-heading">

                    <div>
                        <h2 class="table-title">Daftar Berkas Masuk</h2>
                        <span class="count-badge">{{ $daftarPengajuan->total() }} Berkas</span>
                    </div>

                    <div class="table-meta">
                        <span><i></i>Penempatan: UPT TIKP</span>
                        <span><i class="dark"></i>Periode Magang</span>
                    </div>

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>Nama Pendaftar &amp; Institusi</th>
                                <th>Jurusan / Keahlian</th>
                                <th>Tanggal Submit</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($daftarPengajuan as $pengajuan)

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
                                        default => 'status-other',
                                    };

                                    $statusLabel = match ($pengajuan->status_pengajuan) {
                                        'Diajukan' => 'Menunggu Verifikasi',
                                        'Terverifikasi' => 'Lolos Verifikasi',
                                        'Ditolak' => 'Ditolak',
                                        default => $pengajuan->status_pengajuan,
                                    };

                                    $tanggal = $pengajuan->tanggal_pengajuan
                                        ? \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)
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
                                        <div class="cell-title">
                                            {{ $peserta->jenjang_pendidikan ?? '-' }}
                                            {{ $peserta && $peserta->jurusan ? $peserta->jurusan : '' }}
                                        </div>

                                        <div class="cell-sub">
                                            {{ $pengajuan->sub_unit_penempatan ?: 'Belum ditentukan' }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="cell-title">
                                            {{ $tanggal ? $tanggal->translatedFormat('d M Y') : '-' }}
                                        </div>

                                        <div class="cell-sub">
                                            {{ $tanggal ? $tanggal->format('H:i') . ' WIB' : '' }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="status-badge {{ $statusClass }}">
                                            @if ($pengajuan->status_pengajuan === 'Terverifikasi')
                                                {!! $svg('check-circle') !!}
                                            @else
                                                <span class="dot"></span>
                                            @endif
                                            {{ $statusLabel }}
                                        </span>
                                    </td>

                                    <td>
                                        <a
                                            href="{{ route('admin-pusat.verifikasi-berkas.detail', $pengajuan->id_pengajuan) }}"
                                            class="btn-action {{ $pengajuan->status_pengajuan === 'Diajukan' ? '' : 'secondary' }}"
                                        >
                                            {!! $svg('eye') !!}
                                            {{ $pengajuan->status_pengajuan === 'Diajukan' ? 'Periksa Berkas' : 'Lihat Detail' }}
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            Belum ada berkas pengajuan yang ditemukan.
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <!-- PAGINATION -->
                @if ($daftarPengajuan->hasPages())

                    <div class="pagination-area">

                        <div class="pagination-info">
                            Halaman {{ $daftarPengajuan->currentPage() }}
                            dari {{ $daftarPengajuan->lastPage() }}
                        </div>

                        <div class="pagination-links">

                            @if ($daftarPengajuan->onFirstPage())
                                <span class="disabled">&lsaquo;</span>
                            @else
                                <a href="{{ $daftarPengajuan->previousPageUrl() }}">&lsaquo;</a>
                            @endif

                            @foreach ($daftarPengajuan->getUrlRange(
                                max(1, $daftarPengajuan->currentPage() - 2),
                                min($daftarPengajuan->lastPage(), $daftarPengajuan->currentPage() + 2)
                            ) as $page => $url)

                                @if ($page == $daftarPengajuan->currentPage())
                                    <span class="current">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif

                            @endforeach

                            @if ($daftarPengajuan->hasMorePages())
                                <a href="{{ $daftarPengajuan->nextPageUrl() }}">&rsaquo;</a>
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