<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi Wawancara | Dindik Jatim</title>

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

        /* SIDEBAR (sama dengan dashboard) */
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

        .brand-title { font-size: 13px; font-weight: 700; line-height: 1.2; }
        .brand-sub { margin-top: 3px; font-size: 10px; line-height: 1.4; color: rgba(255,255,255,.8); }

        .nav, .nav-bottom {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
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

        .nav-link:hover { background: rgba(255,255,255,.12); }

        .nav-link.active {
            background: white;
            color: var(--blue2);
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0,0,0,.12);
        }

        .nav-bottom { margin-top: auto; }
        .nav-bottom form { margin: 0; }

        /* MAIN & HEADER */
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
        .topbar-sub { margin: 3px 0 0; color: var(--muted); font-size: 8px; font-weight: 600; letter-spacing: 1px; }

        .topbar-right, .user {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user { gap: 10px; }
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

        /* CONTENT */
        .content {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 22px 28px 36px;
        }

        .page-heading { margin-bottom: 16px; }

        .page-heading h1 {
            margin: 0 0 5px;
            font-size: 22px;
            font-weight: 800;
        }

        .page-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
        }

        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            margin-bottom: 18px;
            border: 1px solid #dce5f4;
            border-radius: 10px;
            background: #f4f8ff;
            color: #24344f;
            font-size: 10px;
            line-height: 1.6;
        }

        .info-icon {
            color: var(--blue2);
            font-size: 15px;
            font-weight: 700;
        }

        /* SUMMARY */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-bottom: 18px;
        }

        .summary-card {
            position: relative;
            min-height: 94px;
            padding: 15px 16px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
            box-shadow: 0 2px 5px rgba(25,35,70,.04);
        }

        .summary-label {
            margin-bottom: 6px;
            color: #53617c;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .summary-value {
            display: flex;
            align-items: baseline;
            gap: 7px;
        }

        .summary-value strong {
            font-size: 25px;
            line-height: 1;
        }

        .summary-value span { color: var(--muted); font-size: 9px; }

        .summary-note {
            margin-top: 6px;
            color: #718096;
            font-size: 9px;
        }

        .summary-icon {
            position: absolute;
            top: 26px;
            right: 18px;
            color: var(--blue2);
            font-size: 19px;
        }

        .summary-card.warning .summary-label,
        .summary-card.warning .summary-note { color: var(--red); }

        .summary-card.primary {
            border-color: var(--blue2);
            background: linear-gradient(120deg, #0754ce, #1769e5);
            color: white;
        }

        .summary-card.primary .summary-label,
        .summary-card.primary .summary-value span,
        .summary-card.primary .summary-note,
        .summary-card.primary .summary-icon { color: white; }

        /* CATEGORY TABS */
        .category-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 7px;
            margin-bottom: 13px;
        }

        .category-tab {
            display: inline-flex;
            align-items: center;
            padding: 8px 11px;
            border: 0;
            border-radius: 6px;
            background: transparent;
            color: #334155;
            font-family: inherit;
            font-size: 9px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .category-tab.active {
            background: var(--blue2);
            color: white;
        }

        .category-count {
            margin-left: auto;
            color: var(--muted);
            font-size: 9px;
        }

        /* FILTERS */
        .filter-row {
            display: grid;
            grid-template-columns: 120px 110px minmax(180px, 1fr);
            gap: 8px;
            margin-bottom: 14px;
        }

        .filter-control {
            width: 100%;
            min-height: 34px;
            padding: 0 10px;
            border: 1px solid #dce1ea;
            border-radius: 7px;
            background: white;
            color: #334155;
            font-family: inherit;
            font-size: 9px;
        }

        .search-wrap { position: relative; }
        .search-wrap input { padding-left: 30px; }
        .search-icon {
            position: absolute;
            top: 9px;
            left: 11px;
            color: #8993a5;
            font-size: 12px;
        }

        /* TABLE */
        .table-panel {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
        }

        .table-scroll { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead { background: #fafafa; }

        th {
            padding: 13px 12px;
            color: #526079;
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .3px;
            white-space: nowrap;
        }

        td {
            padding: 12px;
            border-top: 1px solid #edf0f5;
            color: #334155;
            font-size: 9px;
            vertical-align: middle;
        }

        .number-cell { width: 48px; text-align: center; color: #94a3b8; }

        .candidate {
            display: flex;
            align-items: center;
            gap: 9px;
            min-width: 180px;
        }

        .candidate-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #eff4ff;
            color: var(--blue2);
            font-size: 9px;
            font-weight: 800;
        }

        .candidate-name { color: #20212b; font-weight: 700; }
        .candidate-institution { margin-top: 4px; color: #64748b; font-size: 8px; }
        .candidate-code { margin-top: 3px; color: #a0a9b8; font-size: 7px; }

        .level-badge {
            display: inline-block;
            padding: 4px 6px;
            border: 1px solid #d8e5ff;
            border-radius: 4px;
            background: #f4f8ff;
            color: var(--blue2);
            font-size: 8px;
            font-weight: 600;
        }

        .major { margin-top: 5px; color: #334155; }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 8px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-waiting { background: #fff3df; color: #d97706; }
        .status-scheduled { background: #eaf1ff; color: #0754ce; }
        .status-confirmed { background: #e9f8ef; color: #15803d; }

        .schedule-detail {
            margin-top: 5px;
            color: #718096;
            font-size: 8px;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 7px 10px;
            border: 1px solid #dce1ea;
            border-radius: 6px;
            background: white;
            color: #334155;
            font-family: inherit;
            font-size: 8px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .action-button.primary {
            border-color: var(--blue2);
            background: var(--blue2);
            color: white;
        }

        .empty-state {
            padding: 35px 15px;
            color: #64748b;
            text-align: center;
            font-size: 10px;
        }

        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 14px;
            border-top: 1px solid #edf0f5;
            color: #64748b;
            font-size: 9px;
        }

        .pagination-links {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .pagination-links a,
        .pagination-links span {
            padding: 6px 9px;
            border: 1px solid #e1e5ee;
            border-radius: 5px;
            color: #334155;
            text-decoration: none;
        }

        .pagination-links .current {
            border-color: var(--blue2);
            background: var(--blue2);
            color: white;
        }

        #advanced-filter.show {
            display: block !important;
        }

        @media (max-width: 900px) {
            .app { grid-template-columns: 190px minmax(0,1fr); }
            .content { padding: 20px 18px; }
            .summary-grid { grid-template-columns: 1fr 1fr; }
            .summary-card.primary { grid-column: span 2; }
        }

        @media (max-width: 620px) {
            .app { grid-template-columns: 1fr; }
            .sidebar { position: relative; height: auto; }
            .nav { display: grid; grid-template-columns: 1fr 1fr; }
            .nav-bottom { margin-top: 10px; }
            .topbar { padding: 12px 15px; }
            .topbar-title { font-size: 12px; }
            .user-info { display: none; }
            .content { padding: 18px 12px; }
            .page-heading h1 { font-size: 18px; }
            .summary-grid { grid-template-columns: 1fr; }
            .summary-card.primary { grid-column: auto; }
            .filter-row { grid-template-columns: 1fr 1fr; }
            .search-wrap { grid-column: span 2; }
            .category-count { width: 100%; margin-left: 0; }
        }
    </style>
</head>

<body>
@php
    $icons = [
        'grid' => '<rect x="3" y="3" width="7" height="7" rx="1.5"></rect><rect x="14" y="3" width="7" height="7" rx="1.5"></rect><rect x="3" y="14" width="7" height="7" rx="1.5"></rect><rect x="14" y="14" width="7" height="7" rx="1.5"></rect>',
        'users' => '<circle cx="9" cy="8" r="3.5"></circle><path d="M2.5 20v-1a6.5 6.5 0 0 1 13 0v1"></path><path d="M16 5.5a3 3 0 0 1 0 5.5M18.5 20v-1a5 5 0 0 0-3-4.6"></path>',
        'doc' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5M9 13h6M9 17h6"></path>',
        'badge' => '<circle cx="12" cy="9" r="5"></circle><path d="m8.5 13.5-1.5 7.5 5-3 5 3-1.5-7.5"></path>',
        'history' => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"></path><path d="M3 3v5h5M12 7v5l3 2"></path>',
        'help' => '<circle cx="12" cy="12" r="9"></circle><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 1-1 1.7"></path><circle cx="12" cy="17" r=".5"></circle>',
        'logout' => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="m16 17 5-5-5-5M21 12H9"></path>',
        'bell' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>',
    ];

    $svg = fn (string $name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($icons[$name] ?? '') . '</svg>';

    $namaAdmin = $admin->nama ?? 'Admin UPT TIKP';
    $inisial = collect(explode(' ', trim($namaAdmin)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => strtoupper(substr($kata, 0, 1)))
        ->implode('');

    $jumlahSemua = (int) $totalSiapWawancara;

    $urlFilter = function (array $tambahan = []) {
        return route('admin-upt.wawancara', array_merge(
            request()->query(),
            $tambahan
        ));
    };
@endphp

<div class="app">

    {{-- ============ SIDEBAR ============ --}}
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
            <a href="{{ route('admin-upt.wawancara') }}" class="nav-link active" aria-current="page">
                {!! $svg('users') !!} Seleksi Wawancara
            </a>
            <a href="{{ route('admin-upt.surat-penerimaan') }}" class="nav-link">
                {!! $svg('doc') !!} Surat Penerimaan
            </a>
            <a href="{{ route('admin-upt.sertifikat') }}" class="nav-link">
                {!! $svg('badge') !!}
                Penerbitan Sertifikat
            </a>

            <a href="{{ route('admin-upt.riwayat') }}" class="nav-link">
                {!! $svg('history') !!}
                Riwayat
            </a>
        </nav>

        <div class="nav-bottom">
            <a href="#" class="nav-link">{!! $svg('help') !!} Bantuan</a>
            <form action="{{ route('petugas.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link">{!! $svg('logout') !!} Keluar</button>
            </form>
        </div>
    </aside>

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
                        <div class="user-name">{{ $namaAdmin }}</div>
                        <div class="user-role">{{ $admin->unit_kerja ?? 'UPT TIKP' }}</div>
                    </div>
                    <div class="avatar">{{ $inisial ?: 'A' }}</div>
                </div>
            </div>
        </header>

        <main class="content">

            <section class="page-heading">
                <h1>Seleksi Wawancara - UPT TIKP</h1>
                <p>Kelola jadwal wawancara tatap muka untuk kandidat yang telah lolos verifikasi administrasi penempatan UPT TIKP.</p>
            </section>

            <section class="info-box">
                <span class="info-icon">ⓘ</span>
                <div>
                    <strong>Ketentuan Wawancara UPT TIKP:</strong>
                    Wawancara diselenggarakan secara tatap muka (offline) di Kantor UPT TIKP,
                    Jl. Jagir Wonokromo No. 350, Surabaya. Ruang wawancara akan ditentukan
                    saat melapor ke petugas resepsionis di lokasi.
                </div>
            </section>

            <section class="summary-grid">
                <div class="summary-card">
                    <div class="summary-label">TOTAL SIAP WAWANCARA</div>
                    <div class="summary-value">
                        <strong>{{ $totalSiapWawancara }}</strong>
                        <span>Kandidat</span>
                    </div>
                    <div class="summary-note">Lolos verifikasi berkas UPT TIKP</div>
                    <div class="summary-icon">♙</div>
                </div>

                <div class="summary-card warning">
                    <div class="summary-label">BELUM DIJADWALKAN</div>
                    <div class="summary-value">
                        <strong>{{ $belumDijadwalkan }}</strong>
                        <span>Kandidat</span>
                    </div>
                    <div class="summary-note">● Butuh tindakan segera</div>
                    <div class="summary-icon">◷</div>
                </div>

                <div class="summary-card primary">
                    <div class="summary-label">JADWAL TERKONFIRMASI</div>
                    <div class="summary-value">
                        <strong>{{ $jadwalTerkonfirmasi }}</strong>
                        <span>Kandidat</span>
                    </div>
                    <div class="summary-note">Terjadwal pekan ini</div>
                    <div class="summary-icon">▣</div>
                </div>
            </section>

            <nav class="category-row" aria-label="Kategori kandidat">
                <a href="{{ $urlFilter(['jenjang' => 'SEMUA']) }}"
                   class="category-tab {{ $jenjang === 'SEMUA' ? 'active' : '' }}">
                    Semua Kandidat ({{ $jumlahSemua }})
                </a>

                <a href="{{ $urlFilter(['jenjang' => 'SMK']) }}"
                   class="category-tab {{ $jenjang === 'SMK' ? 'active' : '' }}">
                    Siswa SMK / Vokasi
                </a>

                <a href="{{ $urlFilter(['jenjang' => 'MAHASISWA']) }}"
                   class="category-tab {{ $jenjang === 'MAHASISWA' ? 'active' : '' }}">
                    Mahasiswa Perguruan Tinggi
                </a>

                <span class="category-count">
                    Menampilkan {{ $daftarPeserta->total() }} Kandidat
                </span>
            </nav>

            <form action="{{ route('admin-upt.wawancara') }}" method="GET">
                <input type="hidden" name="jenjang" value="{{ $jenjang }}">

                <div class="filter-row">
                    <select name="status" class="filter-control" onchange="this.form.submit()">
                        <option value="SEMUA" {{ $status === 'SEMUA' ? 'selected' : '' }}>
                            Semua Status
                        </option>
                        <option value="MENUNGGU_JADWAL" {{ $status === 'MENUNGGU_JADWAL' ? 'selected' : '' }}>
                            Menunggu Jadwal
                        </option>
                        <option value="SUDAH_TERJADWAL" {{ $status === 'SUDAH_TERJADWAL' ? 'selected' : '' }}>
                            Sudah Terjadwal
                        </option>
                    </select>

                    <button
                        type="button"
                        class="filter-control"
                        onclick="document.getElementById('advanced-filter').classList.toggle('show')"
                    >
                        ⚙ Filter Lanjutan
                    </button>

                    <div class="search-wrap">
                        <span class="search-icon">⌕</span>
                        <input type="search"
                               name="cari"
                               value="{{ $cari }}"
                               class="filter-control"
                               placeholder="Cari nama atau asal sekolah/kampus...">
                    </div>
                </div>

                <div id="advanced-filter" style="display:none; margin:-5px 0 14px;">
                    <select name="periode" class="filter-control" onchange="this.form.submit()">
                        @foreach ($daftarPeriode as $periode)
                            <option value="{{ $periode->id_periode }}"
                                {{ (int) $periodeId === (int) $periode->id_periode ? 'selected' : '' }}>
                                {{ $periode->nama_periode }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>

            <section class="table-panel">
                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th class="number-cell">NO</th>
                                <th>NAMA KANDIDAT &amp; INSTITUSI</th>
                                <th>JENJANG &amp; JURUSAN</th>
                                <th>TANGGAL &amp; STATUS WAWANCARA</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($daftarPeserta as $index => $pengajuan)
                                @php
                                    $peserta = $pengajuan->peserta;
                                    $jadwal = $pengajuan->jadwalWawancara->first();

                                    $nama = $peserta->nama ?? '-';
                                    $inisialPeserta = collect(explode(' ', trim($nama)))
                                        ->filter()
                                        ->take(2)
                                        ->map(fn ($kata) => strtoupper(substr($kata, 0, 1)))
                                        ->implode('');

                                    $jenjangLabel = ($peserta->jenjang_pendidikan ?? '') === 'MAHASISWA'
                                        ? 'Strata 1 (S1)'
                                        : 'SMK / Vokasi';
                                @endphp

                                <tr>
                                    <td class="number-cell">
                                        {{ $daftarPeserta->firstItem() + $index }}
                                    </td>

                                    <td>
                                        <div class="candidate">
                                            <div class="candidate-avatar">{{ $inisialPeserta ?: 'P' }}</div>
                                            <div>
                                                <div class="candidate-name">{{ $nama }}</div>
                                                <div class="candidate-institution">
                                                    {{ $peserta->nama_instansi ?? '-' }}
                                                </div>
                                                <div class="candidate-code">
                                                    {{ $peserta->nomor_induk ?? '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="level-badge">{{ $jenjangLabel }}</span>
                                        <div class="major">{{ $peserta->jurusan ?? '-' }}</div>
                                    </td>

                                    <td>
                                        @if ($jadwal)
                                            @if ($jadwal->status_kehadiran === 'Terkonfirmasi')
                                                <span class="status-badge status-confirmed">
                                                    ● Sudah Terkonfirmasi
                                                </span>
                                            @else
                                                <span class="status-badge status-scheduled">
                                                    ● Sudah Terjadwal
                                                </span>
                                            @endif

                                            <div class="schedule-detail">
                                                ◷
                                                {{ $jadwal->tanggal?->translatedFormat('d M Y') ?? '-' }},
                                                {{ $jadwal->waktu ?? '-' }}
                                            </div>
                                        @else
                                            <span class="status-badge status-waiting">
                                                ● Menunggu Jadwal
                                            </span>
                                            <div class="schedule-detail">Belum dialokasikan jadwal</div>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($jadwal)
                                            <a href="{{ route('admin-upt.wawancara.detail', $pengajuan->id_pengajuan) }}"
                                                class="action-button">
                                                ◉ Lihat Detail
                                            </a>
                                        @else
                                            <a href="{{ route('admin-upt.wawancara.atur-jadwal', $pengajuan->id_pengajuan) }}"
                                            class="action-button primary">
                                                ▣ Atur Jadwal
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            Belum ada kandidat yang sesuai dengan filter.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($daftarPeserta->hasPages())
                    <div class="pagination">
                        <span>
                            Menampilkan {{ $daftarPeserta->firstItem() ?? 0 }}
                            - {{ $daftarPeserta->lastItem() ?? 0 }}
                            dari {{ $daftarPeserta->total() }} kandidat
                        </span>

                        <div class="pagination-links">
                            @if ($daftarPeserta->onFirstPage())
                                <span>‹</span>
                            @else
                                <a href="{{ $daftarPeserta->previousPageUrl() }}">‹</a>
                            @endif

                            <span class="current">{{ $daftarPeserta->currentPage() }}</span>

                            @if ($daftarPeserta->hasMorePages())
                                <a href="{{ $daftarPeserta->nextPageUrl() }}">›</a>
                            @else
                                <span>›</span>
                            @endif
                        </div>
                    </div>
                @endif
            </section>

        </main>
    </div>
</div>

<script>
    document.querySelectorAll('.filter-row input[type="search"]').forEach(function (input) {
        input.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                input.form.submit();
            }
        });
    });

    document.querySelector('.filter-row input[type="search"]')?.addEventListener('change', function () {
        this.form.submit();
    });
</script>
</body>
</html>