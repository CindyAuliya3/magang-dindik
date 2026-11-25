<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerbitan Sertifikat | Admin UPT TIKP</title>

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
            --orange: #ea580c;
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
            overflow-y: auto;
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

        .nav-link svg { width: 16px; height: 16px; flex-shrink: 0; }
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
            padding-top: 16px;
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
            max-width: 1250px;
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

        .breadcrumb { margin-bottom: 8px; color: #8490a5; font-size: 10px; }
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

        /* SUMMARY */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
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
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: #eaf1ff;
            color: var(--blue2);
        }

        .summary-icon svg { width: 16px; height: 16px; }

        .summary-value {
            margin-bottom: 7px;
            font-size: 27px;
            font-weight: 800;
        }

        .summary-note { color: #64748b; font-size: 10px; line-height: 1.5; }
        .summary-card.green .summary-icon { background: #eaf9ef; color: var(--green); }
        .summary-card.orange .summary-icon { background: #fff4e8; color: var(--orange); }
        .summary-card.red .summary-icon { background: #fff0f0; color: var(--red); }

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
        .panel-subtitle { margin: 5px 0 0; color: var(--muted); font-size: 10px; }

        /* TABS */
        .tabs {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0 20px 15px;
            overflow-x: auto;
            border-bottom: 1px solid #edf0f5;
        }

        .tab {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 12px;
            border: 1px solid transparent;
            border-radius: 8px;
            color: #64748b;
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .tab:hover { background: #f5f7fb; }

        .tab.active {
            border-color: #dbeafe;
            background: #eff6ff;
            color: var(--blue2);
        }

        .tab-count {
            padding: 2px 6px;
            border-radius: 5px;
            background: #edf0f5;
            color: #64748b;
            font-size: 9px;
        }

        .tab.active .tab-count { background: #dbeafe; color: var(--blue2); }

        /* FILTER */
        .filter-area { padding: 15px 20px; }

        .filter-form {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            width: 100%;
        }

        .search-box { position: relative; flex: 1; min-width: 220px; }

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

        .search-box input:focus, .select:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10,86,214,.10);
        }

        .search-box svg {
            position: absolute;
            top: 10px;
            left: 11px;
            width: 15px;
            height: 15px;
            color: #94a3b8;
        }

        .select {
            height: 36px;
            min-width: 150px;
            padding: 0 30px 0 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            background: white;
            color: #334155;
            font-family: inherit;
            font-size: 10px;
            cursor: pointer;
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
            background: #f8f9fc;
            color: #475569;
        }

        /* TABLE */
        .table-wrap { width: 100%; overflow-x: auto; }

        table {
            width: 100%;
            min-width: 900px;
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
        .person-sub { margin-top: 4px; color: #94a3b8; font-size: 9px; }
        .institution { color: #334155; font-weight: 600; }
        .sub-text { margin-top: 4px; color: #94a3b8; font-size: 9px; }

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
        .badge-orange { background: #fff4e8; color: #c2410c; }
        .badge-gray { background: #f1f5f9; color: #64748b; }
        .badge-blue { background: #eff6ff; color: var(--blue2); }

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
            padding: 12px 20px;
            border-top: 1px solid #edf0f5;
            font-size: 10px;
        }

        .pagination nav p { margin: 0; }

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
            .select { flex: 1; }
        }
    </style>
</head>

<body>
@php
    $admin = auth('petugas')->user();

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
    ];

    $svg = fn ($name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($icons[$name] ?? '').'</svg>';

    $inisial = collect(preg_split('/\s+/', trim($admin->nama ?? 'Admin')))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');

    $kategoriAktif = $kategori ?? request('kategori', 'semua');
    $jenjangAktif = request('jenjang', '');

    $linkKategori = fn ($nilai) => route('admin-upt.sertifikat', array_filter([
        'kategori' => $nilai === 'semua' ? null : $nilai,
        'jenjang' => $jenjangAktif ?: null,
        'cari' => request('cari') ?: null,
    ]));

    $formatJenjang = fn ($nilai) => $nilai === 'MAHASISWA'
        ? 'Mahasiswa S1'
        : ($nilai === 'SMK' ? 'SMK' : ($nilai ?: '-'));

    $totalSemua = $totalPesertaAktif;
    $totalSiap = max(0, $totalLaporanTerunggah - $totalSertifikatDiterbitkan);
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

            <a href="{{ route('admin-upt.sertifikat') }}"
               class="nav-link active"
               aria-current="page">
                {!! $svg('badge') !!} Penerbitan Sertifikat
            </a>

            <a href="{{ route('admin-upt.riwayat') }}" class="nav-link">
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

            {{-- JUDUL HALAMAN --}}
            <section class="page-heading">
                <div>
                    <div class="breadcrumb">
                        Dashboard / <span>Penerbitan Sertifikat</span>
                    </div>
                    <h1>Penerbitan Sertifikat Magang</h1>
                    <p>
                        Kelola penilaian akhir dan penerbitan sertifikat peserta
                        magang UPT TIKP.
                    </p>
                </div>

                <span class="unit-tag">UPT TIKP</span>
            </section>

            {{-- RINGKASAN --}}
            <section class="summary-grid">

                <article class="summary-card">
                    <div class="summary-top">
                        <span class="summary-label">PESERTA MAGANG AKTIF</span>
                        <span class="summary-icon">{!! $svg('users') !!}</span>
                    </div>
                    <div class="summary-value">
                        {{ number_format($totalPesertaAktif, 0, ',', '.') }}
                    </div>
                    <div class="summary-note">Peserta yang diterima oleh pimpinan</div>
                </article>

                <article class="summary-card green">
                    <div class="summary-top">
                        <span class="summary-label">LAPORAN AKHIR TERUNGGAH</span>
                        <span class="summary-icon">{!! $svg('file') !!}</span>
                    </div>
                    <div class="summary-value">
                        {{ number_format($totalLaporanTerunggah, 0, ',', '.') }}
                    </div>
                    <div class="summary-note">Peserta yang telah mengunggah laporan akhir</div>
                </article>

                <article class="summary-card orange">
                    <div class="summary-top">
                        <span class="summary-label">BELUM MENGUNGGAH LAPORAN</span>
                        <span class="summary-icon">{!! $svg('doc') !!}</span>
                    </div>
                    <div class="summary-value">
                        {{ number_format($totalBelumMengunggah, 0, ',', '.') }}
                    </div>
                    <div class="summary-note">Peserta yang belum memiliki laporan akhir</div>
                </article>

                <article class="summary-card red">
                    <div class="summary-top">
                        <span class="summary-label">SERTIFIKAT DITERBITKAN</span>
                        <span class="summary-icon">{!! $svg('badge') !!}</span>
                    </div>
                    <div class="summary-value">
                        {{ number_format($totalSertifikatDiterbitkan, 0, ',', '.') }}
                    </div>
                    <div class="summary-note">Sertifikat yang sudah diunggah</div>
                </article>

            </section>

            {{-- DAFTAR PESERTA --}}
            <section class="panel">

                <div class="panel-header">
                    <div>
                        <h2 class="panel-title">Daftar Penerbitan Sertifikat</h2>
                        <p class="panel-subtitle">
                            Data peserta UPT TIKP berdasarkan hasil seleksi pimpinan.
                        </p>
                    </div>
                </div>

                {{-- TAB KATEGORI --}}
                <div class="tabs">

                    <a href="{{ $linkKategori('semua') }}"
                       class="tab {{ $kategoriAktif === 'semua' ? 'active' : '' }}">
                        Semua
                        <span class="tab-count">{{ $totalSemua }}</span>
                    </a>

                    <a href="{{ $linkKategori('menunggu_laporan') }}"
                       class="tab {{ $kategoriAktif === 'menunggu_laporan' ? 'active' : '' }}">
                        Menunggu Laporan
                        <span class="tab-count">{{ $totalBelumMengunggah }}</span>
                    </a>

                    <a href="{{ $linkKategori('siap_diterbitkan') }}"
                       class="tab {{ $kategoriAktif === 'siap_diterbitkan' ? 'active' : '' }}">
                        Siap Diterbitkan
                        <span class="tab-count">{{ $totalSiap }}</span>
                    </a>

                    <a href="{{ $linkKategori('sertifikat_terbit') }}"
                       class="tab {{ $kategoriAktif === 'sertifikat_terbit' ? 'active' : '' }}">
                        Sertifikat Terbit
                        <span class="tab-count">{{ $totalSertifikatDiterbitkan }}</span>
                    </a>

                </div>

                {{-- FILTER --}}
                <div class="filter-area">
                    <form action="{{ route('admin-upt.sertifikat') }}"
                          method="GET"
                          class="filter-form">

                        @if ($kategoriAktif !== 'semua')
                            <input type="hidden" name="kategori" value="{{ $kategoriAktif }}">
                        @endif

                        <div class="search-box">
                            {!! $svg('search') !!}
                            <input
                                type="text"
                                name="cari"
                                value="{{ request('cari') }}"
                                placeholder="Cari nama peserta atau instansi..."
                            >
                        </div>

                        <select name="jenjang" class="select">
                            <option value="">Semua Jenjang</option>
                            <option value="MAHASISWA" {{ $jenjangAktif === 'MAHASISWA' ? 'selected' : '' }}>
                                Mahasiswa S1
                            </option>
                            <option value="SMK" {{ $jenjangAktif === 'SMK' ? 'selected' : '' }}>
                                SMK
                            </option>
                        </select>

                        <button type="submit" class="btn btn-primary">
                            {!! $svg('search') !!} Cari Data
                        </button>

                        <a href="{{ route('admin-upt.sertifikat') }}" class="btn btn-light">
                            Reset Filter
                        </a>
                    </form>
                </div>

                {{-- TABEL --}}
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>PESERTA & INSTANSI</th>
                                <th>JENJANG / JURUSAN</th>
                                <th>PERIODE MAGANG</th>
                                <th>STATUS LAPORAN</th>
                                <th>STATUS SERTIFIKAT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($daftarPengajuan as $index => $pengajuan)
                                @php
                                    $peserta = $pengajuan->peserta;
                                    $laporan = $pengajuan->laporanAkhir;
                                    $penilaian = $pengajuan->penilaian;
                                    $sertifikat = $pengajuan->sertifikatMagang;

                                    $nama = $peserta->nama ?? 'Nama tidak tersedia';

                                    $inisialPeserta = collect(preg_split('/\s+/', trim($nama)))
                                        ->filter()
                                        ->take(2)
                                        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
                                        ->implode('');
                                @endphp

                                <tr>
                                    <td>{{ $daftarPengajuan->firstItem() + $index }}</td>

                                    <td>
                                        <div class="person">
                                            <div class="person-avatar">
                                                {{ $inisialPeserta ?: 'P' }}
                                            </div>
                                            <div>
                                                <div class="person-name">{{ $nama }}</div>
                                                <div class="person-sub">
                                                    {{ $peserta->nama_instansi ?? 'Instansi tidak tersedia' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="institution">
                                            {{ $formatJenjang($peserta->jenjang_pendidikan ?? '-') }}
                                        </div>
                                        <div class="sub-text">
                                            {{ $peserta->jurusan ?? '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        <div>{{ $pengajuan->periode->nama_periode ?? '-' }}</div>
                                        <div class="sub-text">
                                            {{ $pengajuan->tanggal_mulai?->format('d/m/Y') ?? '-' }}
                                            –
                                            {{ $pengajuan->tanggal_selesai?->format('d/m/Y') ?? '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        @if ($laporan)
                                            <span class="badge badge-green">Sudah diunggah</span>
                                        @else
                                            <span class="badge badge-orange">Belum diunggah</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($sertifikat)
                                            <span class="badge badge-blue">Sudah diterbitkan</span>
                                        @elseif (!$laporan)
                                            <span class="badge badge-gray">Menunggu laporan</span>
                                        @elseif (!$penilaian)
                                            <span class="badge badge-orange">Menunggu penilaian</span>
                                        @else
                                            <span class="badge badge-green">Siap diterbitkan</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($sertifikat)
                                            <a href="{{ url('/admin-upt/penerbitan-sertifikat/'.$pengajuan->id_pengajuan.'/lihat') }}"
                                               class="action-link">
                                                Lihat Sertifikat
                                            </a>
                                        @elseif ($laporan)
                                            <a href="{{ url('/admin-upt/penerbitan-sertifikat/'.$pengajuan->id_pengajuan.'/kelola') }}"
                                               class="action-link">
                                                Terbitkan Sertifikat
                                            </a>
                                        @else
                                            <span class="badge badge-gray">Belum tersedia</span>
                                        @endif
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            {!! $svg('file') !!}
                                            <h3>Belum Ada Data Penerbitan Sertifikat</h3>
                                            <p>
                                                Belum terdapat pengajuan UPT TIKP yang sesuai
                                                dengan kategori atau filter yang dipilih.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span>
                        Menampilkan {{ $daftarPengajuan->count() }} data peserta
                    </span>
                    <span>Data Penerbitan Sertifikat UPT TIKP</span>
                </div>

                @if ($daftarPengajuan->hasPages())
                    <div class="pagination">
                        {{ $daftarPengajuan->links() }}
                    </div>
                @endif

            </section>

        </main>
    </div>
</div>

</body>
</html>
