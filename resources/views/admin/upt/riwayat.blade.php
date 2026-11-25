<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Arsip | Admin UPT TIKP</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

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
            padding: 14px 10px 18px;
            overflow: hidden;
            background: linear-gradient(180deg, #0a5be0 0%, #0050cf 100%);
            color: white;
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
            object-fit: contain;
        }

        .brand-title { font-size: 13px; font-weight: 700; }
        .brand-sub { margin-top: 3px; color: rgba(255,255,255,.8); font-size: 10px; }

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
            text-align: left;
            text-decoration: none;
            cursor: pointer;
        }

        .nav-link svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .nav-link:hover { background: rgba(255,255,255,.12); }

        .nav-link.active {
            background: white;
            color: var(--blue2);
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0,0,0,.12);
        }

        .nav-bottom {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-top: auto;
        }

        .nav-bottom form { margin: 0; }
        .nav-bottom .nav-link { width: 100%; }

        /* MAIN & TOPBAR */
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
            box-shadow: 0 2px 4px rgba(25,35,70,.05);
        }

        .topbar-title { margin: 0; font-size: 15px; font-weight: 700; }

        .topbar-sub {
            margin: 3px 0 0;
            color: var(--muted);
            font-size: 8px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .user { display: flex; align-items: center; gap: 10px; }

        .user-info { text-align: right; line-height: 1.35; }
        .user-name { font-size: 10px; font-weight: 700; }
        .user-role { color: var(--muted); font-size: 9px; }

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

        /* CONTENT */
        .content {
            width: 100%;
            max-width: 1350px;
            margin: 0 auto;
            padding: 24px 28px 36px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .page-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        .breadcrumb {
            margin-bottom: 8px;
            color: #8490a5;
            font-size: 10px;
        }

        .breadcrumb span { color: var(--blue2); }

        .page-heading h1 {
            margin: 0 0 7px;
            font-size: 23px;
            font-weight: 800;
        }

        .page-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .unit-tag {
            padding: 7px 11px;
            border: 1px solid #cfe0ff;
            border-radius: 99px;
            background: #f1f6ff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* HEADER FILTER */
        .header-tools {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .select, .search-input {
            height: 36px;
            padding: 0 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            background: white;
            color: #334155;
            font-family: inherit;
            font-size: 10px;
        }

        .select:focus, .search-input:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10,86,214,.10);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 36px;
            padding: 0 14px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-family: inherit;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-primary { background: var(--blue2); color: white; }
        .btn-primary:hover { background: #0847b5; }

        .btn-light {
            border-color: var(--border);
            background: white;
            color: #475569;
        }

        .btn svg { width: 15px; height: 15px; }

        /* SUMMARY */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .summary-card {
            padding: 16px 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 12px;
        }

        .summary-label {
            color: #7b8196;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .35px;
            line-height: 1.5;
        }

        .summary-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #eaf1ff;
            color: var(--blue2);
        }

        .summary-icon svg { width: 17px; height: 17px; }

        .summary-value {
            margin-bottom: 7px;
            font-size: 27px;
            font-weight: 800;
        }

        .summary-note {
            color: #64748b;
            font-size: 10px;
            line-height: 1.5;
        }

        .summary-card.green .summary-icon {
            background: #eaf9ef;
            color: var(--green);
        }

        .summary-card.red .summary-icon {
            background: #fff0f0;
            color: var(--red);
        }

        /* PANEL */
        .panel {
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 19px 20px 14px;
        }

        .panel-title { margin: 0; font-size: 14px; font-weight: 700; }

        .panel-subtitle {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .filter-area { padding: 14px 20px; }

        .filter-form {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 220px;
        }

        .search-box input {
            width: 100%;
            height: 36px;
            padding: 0 12px 0 35px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            font-family: inherit;
            font-size: 10px;
        }

        .search-box svg {
            position: absolute;
            top: 10px;
            left: 11px;
            width: 15px;
            height: 15px;
            color: #94a3b8;
        }

        .filter-form .select { min-width: 145px; }

        /* TABLE */
        .table-wrap { width: 100%; overflow-x: auto; }

        table {
            width: 100%;
            min-width: 980px;
            border-collapse: collapse;
        }

        thead { background: #f8faff; }

        th {
            padding: 12px 14px;
            color: #64748b;
            font-size: 9px;
            font-weight: 700;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 14px;
            border-top: 1px solid #edf0f5;
            color: #475569;
            font-size: 10px;
            vertical-align: middle;
        }

        tbody tr:hover { background: #fbfcff; }

        .person {
            display: flex;
            align-items: center;
            gap: 9px;
            min-width: 180px;
        }

        .person-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #eaf1ff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
        }

        .person-name { color: #263247; font-size: 10px; font-weight: 700; }

        .person-sub {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 9px;
        }

        .institution { color: #334155; font-weight: 600; }

        .sub-text {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 9px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 8px;
            border-radius: 6px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-green { background: #eaf9ef; color: #15803d; }
        .badge-red { background: #fff0f0; color: #dc2626; }
        .badge-blue { background: #eff6ff; color: var(--blue2); }
        .badge-gray { background: #f1f5f9; color: #64748b; }

        .action-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 10px;
            border: 1px solid #cfe0ff;
            border-radius: 7px;
            background: #f1f6ff;
            color: var(--blue2);
            font-size: 9px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .action-link:hover { background: #e3eeff; }

        .empty-state {
            padding: 45px 20px;
            color: #94a3b8;
            text-align: center;
        }

        .empty-state svg {
            width: 34px;
            height: 34px;
            margin-bottom: 10px;
            color: #aab4c5;
        }

        .empty-state h3 {
            margin: 0 0 6px;
            color: #475569;
            font-size: 12px;
        }

        .empty-state p {
            margin: 0;
            font-size: 10px;
            line-height: 1.6;
        }

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 20px;
            border-top: 1px solid #edf0f5;
            color: #94a3b8;
            font-size: 9px;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .pagination a, .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 28px;
            height: 28px;
            padding: 0 8px;
            border: 1px solid var(--border);
            border-radius: 6px;
            color: #64748b;
            font-size: 10px;
            text-decoration: none;
        }

        .pagination .active {
            border-color: var(--blue2);
            background: var(--blue2);
            color: white;
        }

        .pagination .disabled { opacity: .4; }

        /* RETENSI */
        .retention {
            display: flex;
            gap: 13px;
            padding: 17px 19px;
            border: 1px solid #dbeafe;
            border-radius: 12px;
            background: #eff6ff;
        }

        .retention-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #dbeafe;
            color: var(--blue2);
        }

        .retention-icon svg { width: 18px; height: 18px; }

        .retention h3 {
            margin: 0 0 6px;
            color: #1e3a8a;
            font-size: 11px;
            font-weight: 700;
        }

        .retention p {
            margin: 0;
            color: #475569;
            font-size: 10px;
            line-height: 1.7;
        }

        @media (max-width: 1150px) {
            .summary-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 900px) {
            .app { grid-template-columns: 1fr; }
            .sidebar { position: relative; height: auto; }
            .nav, .nav-bottom { flex-direction: row; flex-wrap: wrap; }
            .nav-bottom { margin-top: 12px; }
            .nav-bottom .nav-link { width: auto; }
            .topbar { padding: 12px 16px; }
            .content { padding: 16px; }
        }

        @media (max-width: 520px) {
            .summary-grid { gap: 9px; }
            .summary-card { padding: 13px; }
            .summary-value { font-size: 22px; }
            .page-heading { flex-direction: column; }
            .user-info { display: none; }
            .filter-form { align-items: stretch; }
            .search-box { min-width: 100%; }
            .filter-form .select { flex: 1; }
            .table-footer { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>

<body>

@php
    $admin = auth('petugas')->user();

    $inisial = collect(preg_split('/\s+/', trim($admin->nama ?? 'Admin')))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');

    $icons = [
        'grid' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
        'users' => '<circle cx="9" cy="8" r="3.5"/><path d="M2.5 20v-1a6.5 6.5 0 0 1 13 0v1M16 5.5a3 3 0 0 1 0 5.5M18.5 20v-1a5 5 0 0 0-3-4.6"/>',
        'doc' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5M9 13h6M9 17h6"/>',
        'badge' => '<circle cx="12" cy="9" r="5"/><path d="m8.5 13.5-1.5 7.5 5-3 5 3-1.5-7.5"/>',
        'history' => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"/><path d="M3 3v5h5M12 7v5l3 2"/>',
        'help' => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 1-1 1.7"/><circle cx="12" cy="17" r=".5"/>',
        'logout' => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/>',
        'search' => '<circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/>',
        'file' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/>',
        'download' => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5M12 15V3"/>',
        'archive' => '<rect x="3" y="4" width="18" height="4" rx="1"/><path d="M5 8v12h14V8M10 12h4"/>',
        'shield' => '<path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/><path d="m9 12 2 2 4-4"/>',
    ];

    $svg = fn ($name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($icons[$name] ?? '').'</svg>';

    $filterQuery = request()->query();

    $exportUrl = route('admin-upt.riwayat.export', $filterQuery);

    $formatJenjang = fn ($nilai) => $nilai === 'MAHASISWA'
        ? 'Mahasiswa S1'
        : ($nilai === 'SMK' ? 'SMK' : ($nilai ?: '-'));

    $formatTanggal = fn ($tanggal) => $tanggal
        ? \Carbon\Carbon::parse($tanggal)->translatedFormat('d M Y')
        : '-';
@endphp

<div class="app">

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <div class="brand">
            <img class="brand-logo"
                 src="{{ asset('images/logo.png') }}"
                 alt="Logo Dinas Pendidikan Jawa Timur"
                 onerror="this.style.display='none'">
            <div>
                <div class="brand-title">Dindik Jatim</div>
                <div class="brand-sub">UPT TIKP</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">
            <a href="{{ route('admin-upt.dashboard') }}" class="nav-link">
                {!! $svg('grid') !!} Dashboard
            </a>

            <a href="{{ route('admin-upt.wawancara') }}" class="nav-link">
                {!! $svg('users') !!} Seleksi Wawancara
            </a>

            <a href="{{ route('admin-upt.surat-penerimaan') }}" class="nav-link">
                {!! $svg('doc') !!} Surat Penerimaan
            </a>

            <a href="{{ route('admin-upt.sertifikat') }}" class="nav-link">
                {!! $svg('badge') !!} Penerbitan Sertifikat
            </a>

            <a href="{{ route('admin-upt.riwayat') }}" class="nav-link active" aria-current="page">
                {!! $svg('history') !!} Riwayat
            </a>
        </nav>

        <div class="nav-bottom">
            <a href="#" class="nav-link">{!! $svg('help') !!} Bantuan</a>

            <form action="{{ route('petugas.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link">
                    {!! $svg('logout') !!} Keluar
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

            <div class="user">
                <div class="user-info">
                    <div class="user-name">{{ $admin->nama ?? 'Admin UPT TIKP' }}</div>
                    <div class="user-role">{{ $admin->unit_kerja ?? 'UPT TIKP' }}</div>
                </div>
                <div class="avatar">{{ $inisial ?: 'A' }}</div>
            </div>
        </header>

        <main class="content">

            {{-- HEADER HALAMAN --}}
            <section class="page-heading">
                <div>
                    <div class="breadcrumb">
                        Dashboard / <span>Riwayat Arsip</span>
                    </div>

                    <h1>Riwayat Penerbitan Dokumen Magang</h1>

                    <p>
                        Arsip digital seluruh dokumen dan keputusan pengajuan magang
                        yang telah diproses oleh UPT TIKP.
                    </p>
                </div>

                <span class="unit-tag">UPT TIKP</span>
            </section>

            {{-- FILTER PERIODE DAN EKSPOR --}}
            <section class="header-tools">

                <form action="{{ route('admin-upt.riwayat') }}" method="GET"
                      style="display:flex;align-items:center;flex-wrap:wrap;gap:10px;">

                    <select name="periode" class="select" onchange="this.form.submit()">
                        <option value="">Semua Periode</option>

                        @foreach ($daftarPeriode as $periode)
                            <option value="{{ $periode->id_periode }}"
                                {{ request('periode') == $periode->id_periode ? 'selected' : '' }}>
                                {{ $periode->nama_periode }}
                            </option>
                        @endforeach
                    </select>

                    @foreach (['cari', 'jenis_dokumen', 'jenjang'] as $filter)
                        @if (request($filter))
                            <input type="hidden" name="{{ $filter }}" value="{{ request($filter) }}">
                        @endif
                    @endforeach

                </form>

                <a href="{{ $exportUrl }}" class="btn btn-primary">
                    {!! $svg('download') !!}
                    Ekspor Arsip CSV
                </a>
            </section>

            {{-- STATISTIK --}}
            <section class="summary-grid">

                <article class="summary-card">
                    <div class="summary-top">
                        <span class="summary-label">TOTAL DOKUMEN DIPROSES</span>
                        <span class="summary-icon">{!! $svg('archive') !!}</span>
                    </div>
                    <div class="summary-value">
                        {{ number_format($totalDokumenDiproses, 0, ',', '.') }}
                    </div>
                    <div class="summary-note">Total arsip keputusan dan dokumen penerimaan</div>
                </article>

                <article class="summary-card green">
                    <div class="summary-top">
                        <span class="summary-label">SURAT PENERIMAAN DITERBITKAN</span>
                        <span class="summary-icon">{!! $svg('doc') !!}</span>
                    </div>
                    <div class="summary-value">
                        {{ number_format($totalSuratDiterbitkan, 0, ',', '.') }}
                    </div>
                    <div class="summary-note">Surat penerimaan yang sudah diunggah</div>
                </article>

                <article class="summary-card red">
                    <div class="summary-top">
                        <span class="summary-label">PENGAJUAN DITOLAK</span>
                        <span class="summary-icon">{!! $svg('shield') !!}</span>
                    </div>
                    <div class="summary-value">
                        {{ number_format($totalPengajuanDitolak, 0, ',', '.') }}
                    </div>
                    <div class="summary-note">Keputusan penolakan dari pimpinan</div>
                </article>

            </section>

            {{-- TABEL ARSIP --}}
            <section class="panel">

                <div class="panel-header">
                    <div>
                        <h2 class="panel-title">Daftar Arsip Dokumen Magang</h2>
                        <p class="panel-subtitle">
                            Riwayat dokumen dan keputusan peserta magang UPT TIKP.
                        </p>
                    </div>
                </div>

                {{-- FILTER TABEL --}}
                <div class="filter-area">
                    <form action="{{ route('admin-upt.riwayat') }}" method="GET"
                          class="filter-form">

                        @if (request('periode'))
                            <input type="hidden" name="periode" value="{{ request('periode') }}">
                        @endif

                        <div class="search-box">
                            {!! $svg('search') !!}
                            <input
                                type="text"
                                name="cari"
                                value="{{ request('cari') }}"
                                placeholder="Cari nama, institusi, atau nomor registrasi..."
                            >
                        </div>

                        <select name="jenis_dokumen" class="select">
                            <option value="">Semua Jenis Dokumen</option>
                            <option value="Surat Penerimaan Magang"
                                {{ request('jenis_dokumen') === 'Surat Penerimaan Magang' ? 'selected' : '' }}>
                                Surat Penerimaan
                            </option>
                            <option value="Keputusan Penolakan"
                                {{ request('jenis_dokumen') === 'Keputusan Penolakan' ? 'selected' : '' }}>
                                Keputusan Penolakan
                            </option>
                        </select>

                        <select name="jenjang" class="select">
                            <option value="">Semua Jenjang</option>
                            <option value="MAHASISWA"
                                {{ request('jenjang') === 'MAHASISWA' ? 'selected' : '' }}>
                                Mahasiswa S1
                            </option>
                            <option value="SMK"
                                {{ request('jenjang') === 'SMK' ? 'selected' : '' }}>
                                SMK
                            </option>
                        </select>

                        <button type="submit" class="btn btn-primary">
                            {!! $svg('search') !!} Cari Data
                        </button>

                        <a href="{{ route('admin-upt.riwayat') }}" class="btn btn-light">
                            Reset
                        </a>
                    </form>
                </div>

                {{-- TABEL --}}
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>NAMA KANDIDAT & INSTITUSI</th>
                                <th>JENJANG / JURUSAN</th>
                                <th>JENIS & NOMOR DOKUMEN</th>
                                <th>TANGGAL TERBIT</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($daftarArsip as $index => $arsip)
                                @php
                                    $inisialPeserta = collect(
                                        preg_split('/\s+/', trim($arsip['nama']))
                                    )
                                    ->filter()
                                    ->take(2)
                                    ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
                                    ->implode('');
                                @endphp

                                <tr>
                                    <td>
                                        {{ ($daftarArsip->currentPage() - 1) * $daftarArsip->perPage() + $index + 1 }}
                                    </td>

                                    <td>
                                        <div class="person">
                                            <div class="person-avatar">
                                                {{ $inisialPeserta ?: 'P' }}
                                            </div>
                                            <div>
                                                <div class="person-name">
                                                    {{ $arsip['nama'] }}
                                                </div>
                                                <div class="person-sub">
                                                    {{ $arsip['instansi'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="institution">
                                            {{ $formatJenjang($arsip['jenjang']) }}
                                        </div>
                                        <div class="sub-text">
                                            {{ $arsip['jurusan'] }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="institution">
                                            {{ $arsip['jenis_dokumen'] }}
                                        </div>
                                        <div class="sub-text">
                                            Nomor: {{ $arsip['nomor_dokumen'] }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $formatTanggal($arsip['tanggal_terbit']) }}
                                    </td>

                                    <td>
                                        @if ($arsip['status'] === 'Diterima')
                                            <span class="badge badge-green">Diterima</span>
                                        @else
                                            <span class="badge badge-red">Ditolak</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($arsip['file_path'])
                                            <a
                                                href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($arsip['file_path']) }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="action-link">
                                                Lihat Dokumen
                                            </a>
                                        @else
                                            <span class="badge badge-gray">
                                                Belum ada file
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            {!! $svg('file') !!}
                                            <h3>Belum Ada Arsip Dokumen</h3>
                                            <p>
                                                Belum terdapat arsip dokumen UPT TIKP
                                                yang sesuai dengan periode atau filter yang dipilih.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- FOOTER TABEL --}}
                <div class="table-footer">
                    <span>
                        Menampilkan {{ $daftarArsip->count() }} dari
                        {{ $daftarArsip->total() }} data arsip
                    </span>

                    <div class="pagination">
                        @if ($daftarArsip->onFirstPage())
                            <span class="disabled">‹</span>
                        @else
                            <a href="{{ $daftarArsip->previousPageUrl() }}">‹</a>
                        @endif

                        @foreach ($daftarArsip->getUrlRange(
                            max(1, $daftarArsip->currentPage() - 2),
                            min($daftarArsip->lastPage(), $daftarArsip->currentPage() + 2)
                        ) as $page => $url)
                            @if ($page == $daftarArsip->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($daftarArsip->hasMorePages())
                            <a href="{{ $daftarArsip->nextPageUrl() }}">›</a>
                        @else
                            <span class="disabled">›</span>
                        @endif
                    </div>
                </div>

            </section>

            {{-- RETENSI DAN LEGALITAS --}}
            <section class="retention">
                <div class="retention-icon">
                    {!! $svg('shield') !!}
                </div>

                <div>
                    <h3>Retensi & Legalitas Arsip Digital</h3>
                    <p>
                        Arsip digital ini merupakan dokumentasi riwayat pengelolaan
                        dokumen magang UPT TIKP. Data dan dokumen ditampilkan
                        berdasarkan informasi yang tersimpan pada sistem.
                        Pengelolaan masa retensi dan ketentuan legalitas arsip
                        mengikuti kebijakan instansi yang berlaku.
                    </p>
                </div>
            </section>

        </main>
    </div>
</div>
</body>
</html>
