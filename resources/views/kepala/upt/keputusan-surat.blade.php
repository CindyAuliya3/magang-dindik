<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keputusan & Surat | Kepala UPT TIKP</title>

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
            --border: #e1e5ee;
            --bg: #f7f6ff;
            --green: #16834a;
            --orange: #c76a16;
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

        .nav,
        .nav-bottom {
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
            background: rgba(255,255,255,.12);
        }

        .nav-link.active {
            background: white;
            color: var(--blue2);
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0,0,0,.12);
        }

        .nav-bottom {
            margin-top: auto;
        }

        .nav-bottom form {
            margin: 0;
        }

        .nav-bottom .nav-link {
            width: 100%;
        }

        /* MAIN DAN TOPBAR */
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

        .topbar-right,
        .user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            text-align: right;
            line-height: 1.4;
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
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--blue2);
            color: white;
            font-size: 10px;
            font-weight: 700;
        }

        /* KONTEN */
        .content {
            flex: 1;
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

        .page-heading h1 {
            margin: 0 0 7px;
            font-size: 22px;
            font-weight: 800;
        }

        .page-heading p {
            max-width: 680px;
            margin: 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .heading-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 13px;
            border-radius: 99px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-blue {
            background: var(--blue2);
            color: white;
        }

        .badge-light {
            background: #eaf1ff;
            color: var(--blue2);
        }

        .panel {
            min-width: 0;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.07);
        }

        .section-panel {
            padding: 20px 22px 22px;
        }

        .panel-title {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
        }

        .panel-description {
            margin: 5px 0 16px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        /* KARTU RINGKASAN */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .stat-card {
            padding: 17px 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.07);
        }

        .stat-card.primary {
            border-color: var(--blue2);
            background: var(--blue2);
            color: white;
            box-shadow: 0 4px 12px rgba(10,86,214,.2);
        }

        .stat-label {
            color: #7b8196;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        .stat-card.primary .stat-label,
        .stat-card.primary .stat-note {
            color: rgba(255,255,255,.85);
        }

        .stat-value {
            margin: 10px 0 6px;
            font-size: 28px;
            font-weight: 800;
        }

        .stat-value.green {
            color: var(--green);
        }

        .stat-value.red {
            color: var(--red);
        }

        .stat-note {
            color: #64748b;
            font-size: 10px;
        }

        /* FILTER */
        .filter-form {
            display: grid;
            grid-template-columns: minmax(200px, 1fr) auto;
            align-items: end;
            gap: 12px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #4a4e63;
            font-size: 10px;
            font-weight: 600;
        }

        .select {
            width: 100%;
            height: 38px;
            padding: 0 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            background: white;
            color: #334155;
            font-family: inherit;
            font-size: 11px;
        }

        .select:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10,86,214,.1);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 38px;
            padding: 0 17px;
            border: 1px solid var(--blue2);
            border-radius: 8px;
            background: var(--blue2);
            color: white;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background: var(--blue);
        }

        .btn-reset {
            border-color: var(--border);
            background: white;
            color: #596579;
        }

        .btn-reset:hover {
            background: #f5f7fb;
        }

        .filter-actions {
            display: flex;
            gap: 7px;
        }

        /* TABEL */
        .table-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .table-count {
            color: var(--muted);
            font-size: 10px;
            white-space: nowrap;
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

        th {
            padding: 12px 11px;
            border-bottom: 1px solid var(--border);
            background: #fafbfe;
            color: #7b8196;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .4px;
            text-align: left;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 14px 11px;
            border-bottom: 1px solid #ebedf4;
            font-size: 10px;
            vertical-align: middle;
        }

        tbody tr:hover td {
            background: #f8faff;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .person-name {
            color: #20212b;
            font-size: 11px;
            font-weight: 700;
        }

        .person-sub {
            margin-top: 4px;
            color: var(--muted);
            font-size: 9px;
        }

        .note-text {
            max-width: 220px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        .file-info {
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 99px;
            font-size: 9px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status.diterima {
            background: #e3f5eb;
            color: #16834a;
        }

        .status.ditolak {
            background: #ffe8e8;
            color: #c52c2c;
        }

        .empty-state {
            padding: 38px 15px;
            color: #8992a5;
            font-size: 11px;
            line-height: 1.7;
            text-align: center;
        }

        .empty-state strong {
            display: block;
            margin-bottom: 5px;
            color: #4a4e63;
            font-size: 12px;
        }

        /* PAGINATION */
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

        .access-note {
            padding: 14px 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            color: #4a4e63;
            font-size: 10px;
            line-height: 1.7;
        }

        .access-note strong {
            color: var(--blue2);
        }

        .footer-note {
            margin: 4px 0 0;
            color: #94a3b8;
            font-size: 10px;
            text-align: center;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
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
                padding: 16px;
            }

            .page-heading {
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                width: 100%;
            }

            .filter-actions .btn {
                flex: 1;
            }

            .user-info {
                display: none;
            }

            .page-heading h1 {
                font-size: 19px;
            }

            .section-panel {
                padding: 16px;
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
        'tasks' => '<rect x="3" y="4" width="18" height="16" rx="2"></rect><path d="m7.5 10 1.5 1.5L12 8.5M14 10h3M7.5 15l1.5 1.5L12 13.5M14 15h3"></path>',
        'clipboard' => '<rect x="5" y="4" width="14" height="17" rx="2"></rect><path d="M9 4V3h6v1M9 10h6M9 14h6M9 18h4"></path>',
        'help' => '<circle cx="12" cy="12" r="9"></circle><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 1-1 1.7"></path><circle cx="12" cy="17" r=".5"></circle>',
        'logout' => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="m16 17 5-5-5-5M21 12H9"></path>',
    ];

    $svg = fn (string $name) =>
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . ($icons[$name] ?? '') . '</svg>';

    $namaKepala = auth('petugas')->user()->nama ?? 'Kepala UPT TIKP';

    $inisial = collect(preg_split('/\s+/', trim($namaKepala)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');
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
                <div class="brand-sub">Pimpinan</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">

            <a href="{{ route('kepala-upt.dashboard') }}" class="nav-link">
                {!! $svg('grid') !!}
                Dashboard
            </a>

            <a href="{{ route('kepala-upt.monitoring') }}" class="nav-link">
                {!! $svg('tasks') !!}
                Monitoring Seleksi
            </a>

            <a href="{{ route('kepala-upt.keputusan-surat') }}" class="nav-link active" aria-current="page">
                {!! $svg('clipboard') !!}
                Keputusan &amp; Surat
            </a>

        </nav>

        <div class="nav-bottom">

            <a href="#" class="nav-link">
                {!! $svg('help') !!}
                Bantuan
            </a>

            <form action="{{ route('petugas.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link">
                    {!! $svg('logout') !!}
                    Keluar
                </button>
            </form>

        </div>

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
                <div class="user">
                    <div class="user-info">
                        <div class="user-name">{{ $namaKepala }}</div>
                        <div class="user-role">Pimpinan</div>
                    </div>

                    <div class="avatar">{{ $inisial ?: 'KU' }}</div>
                </div>
            </div>

        </header>

        <!-- KONTEN -->
        <main class="content">

            <!-- JUDUL HALAMAN -->
            <section class="page-heading">

                <div>
                    <h1>Keputusan &amp; Surat</h1>

                    <p>
                        Pantau hasil keputusan seleksi dan dokumen surat penerimaan
                        peserta magang pada unit kerja UPT TIKP.

                        @if ($periodeTerpilih)
                            Periode yang dipilih: {{ $periodeTerpilih->nama_periode }}.
                        @else
                            Belum ada periode penerimaan yang tersedia.
                        @endif

                        Halaman ini hanya digunakan untuk melihat data.
                    </p>
                </div>

                <div class="heading-badges">
                    <span class="badge badge-blue">Kepala UPT TIKP</span>
                    <span class="badge badge-light">Read Only</span>
                </div>

            </section>

            <!-- RINGKASAN -->
            <section class="stats-grid">

                <article class="stat-card">
                    <div class="stat-label">Total Keputusan</div>
                    <div class="stat-value">
                        {{ number_format($totalKeputusan, 0, ',', '.') }}
                    </div>
                    <div class="stat-note">Keputusan yang sudah ditetapkan</div>
                </article>

                <article class="stat-card">
                    <div class="stat-label">Peserta Diterima</div>
                    <div class="stat-value green">
                        {{ number_format($totalDiterima, 0, ',', '.') }}
                    </div>
                    <div class="stat-note">Keputusan dengan status diterima</div>
                </article>

                <article class="stat-card">
                    <div class="stat-label">Peserta Ditolak</div>
                    <div class="stat-value red">
                        {{ number_format($totalDitolak, 0, ',', '.') }}
                    </div>
                    <div class="stat-note">Keputusan dengan status ditolak</div>
                </article>

                <article class="stat-card primary">
                    <div class="stat-label">Surat Terbit</div>
                    <div class="stat-value">
                        {{ number_format($totalSurat, 0, ',', '.') }}
                    </div>
                    <div class="stat-note">Surat penerimaan yang telah diunggah</div>
                </article>

            </section>

            <!-- FILTER PERIODE -->
            <section class="panel section-panel">

                <h2 class="panel-title">Filter Periode</h2>
                <p class="panel-description">
                    Pilih periode penerimaan untuk menampilkan keputusan dan surat penerimaan.
                </p>

                <form
                    action="{{ route('kepala-upt.keputusan-surat') }}"
                    method="GET"
                    class="filter-form"
                >

                    <div class="form-group">
                        <label for="periode">Periode penerimaan</label>

                        <select name="periode" id="periode" class="select">
                            @forelse ($daftarPeriode as $periode)
                                <option
                                    value="{{ $periode->id_periode }}"
                                    @selected($periodeTerpilih?->id_periode == $periode->id_periode)
                                >
                                    {{ $periode->nama_periode }}
                                </option>
                            @empty
                                <option value="">Belum ada periode</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button type="submit" class="btn">
                            Terapkan
                        </button>

                        <a
                            href="{{ route('kepala-upt.keputusan-surat') }}"
                            class="btn btn-reset"
                        >
                            Reset
                        </a>
                    </div>

                </form>

            </section>

            <!-- PANEL KEPUTUSAN -->
            <section class="panel section-panel">

                <div class="table-heading">
                    <div>
                        <h2 class="panel-title">Daftar Keputusan Seleksi</h2>
                        <p class="panel-description" style="margin-bottom:0;">
                            Informasi keputusan pimpinan yang telah dimasukkan oleh petugas.
                        </p>
                    </div>

                    <span class="table-count">
                        Menampilkan {{ $daftarKeputusan->count() }}
                        dari {{ $daftarKeputusan->total() }} data
                    </span>
                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Peserta</th>
                                <th>Keputusan Pimpinan</th>
                                <th>Catatan Disposisi</th>
                                <th>Status</th>
                                <th>Tanggal Penetapan</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($daftarKeputusan as $index => $hasil)

                                <tr>

                                    <td>
                                        {{ $daftarKeputusan->firstItem() + $index }}
                                    </td>

                                    <td>
                                        <div class="person-name">
                                            {{ $hasil->pengajuan?->peserta?->nama ?? 'Nama tidak tersedia' }}
                                        </div>

                                        <div class="person-sub">
                                            {{ $hasil->pengajuan?->peserta?->nama_instansi ?? '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        <strong>{{ $hasil->keputusan_pimpinan ?: '-' }}</strong>
                                    </td>

                                    <td>
                                        <div class="note-text">
                                            {{ $hasil->catatan_disposisi ?: 'Tidak ada catatan disposisi' }}
                                        </div>
                                    </td>

                                    <td>
                                        @if ($hasil->status === 'Diterima')
                                            <span class="status diterima">Diterima</span>
                                        @else
                                            <span class="status ditolak">Ditolak</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $hasil->tanggal_penetapan
                                            ? \Illuminate\Support\Carbon::parse($hasil->tanggal_penetapan)->translatedFormat('d M Y')
                                            : '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <strong>Belum ada keputusan seleksi</strong>
                                            Keputusan seleksi untuk periode ini belum tersedia.
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <!-- PAGINATION KEPUTUSAN -->
                @if ($daftarKeputusan->hasPages())

                    <div class="pagination-area">

                        <div class="pagination-info">
                            Halaman {{ $daftarKeputusan->currentPage() }}
                            dari {{ $daftarKeputusan->lastPage() }}
                        </div>

                        <div class="pagination-links">

                            @if ($daftarKeputusan->onFirstPage())
                                <span class="disabled">&lsaquo;</span>
                            @else
                                <a href="{{ $daftarKeputusan->previousPageUrl() }}">&lsaquo;</a>
                            @endif

                            @foreach ($daftarKeputusan->getUrlRange(
                                max(1, $daftarKeputusan->currentPage() - 2),
                                min($daftarKeputusan->lastPage(), $daftarKeputusan->currentPage() + 2)
                            ) as $page => $url)

                                @if ($page == $daftarKeputusan->currentPage())
                                    <span class="current">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif

                            @endforeach

                            @if ($daftarKeputusan->hasMorePages())
                                <a href="{{ $daftarKeputusan->nextPageUrl() }}">&rsaquo;</a>
                            @else
                                <span class="disabled">&rsaquo;</span>
                            @endif

                        </div>

                    </div>

                @endif

            </section>

            <!-- PANEL SURAT -->
            <section class="panel section-panel">

                <div class="table-heading">
                    <div>
                        <h2 class="panel-title">Daftar Surat Penerimaan</h2>
                        <p class="panel-description" style="margin-bottom:0;">
                            Daftar dokumen surat penerimaan peserta magang UPT TIKP.
                        </p>
                    </div>

                    <span class="table-count">
                        Menampilkan {{ $daftarSurat->count() }}
                        dari {{ $daftarSurat->total() }} data
                    </span>
                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Peserta</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Terbit</th>
                                <th>Petugas Unggah</th>
                                <th>Dokumen</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($daftarSurat as $index => $surat)

                                <tr>

                                    <td>
                                        {{ $daftarSurat->firstItem() + $index }}
                                    </td>

                                    <td>
                                        <div class="person-name">
                                            {{ $surat->pengajuan?->peserta?->nama ?? 'Nama tidak tersedia' }}
                                        </div>

                                        <div class="person-sub">
                                            {{ $surat->pengajuan?->peserta?->nama_instansi ?? '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="person-name">
                                            {{ $surat->nomor_surat ?: '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $surat->tanggal_terbit
                                            ? \Illuminate\Support\Carbon::parse($surat->tanggal_terbit)->translatedFormat('d M Y')
                                            : '-' }}
                                    </td>

                                    <td>
                                        {{ $surat->petugasUnggah?->nama ?? '-' }}
                                    </td>

                                    <td>
                                        @if ($surat->file_path)
                                            <span class="file-info">File tersedia</span>
                                        @else
                                            <span class="person-sub">File belum tersedia</span>
                                        @endif
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <strong>Belum ada surat penerimaan</strong>
                                            Dokumen surat penerimaan untuk periode ini belum tersedia.
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <!-- PAGINATION SURAT -->
                @if ($daftarSurat->hasPages())

                    <div class="pagination-area">

                        <div class="pagination-info">
                            Halaman {{ $daftarSurat->currentPage() }}
                            dari {{ $daftarSurat->lastPage() }}
                        </div>

                        <div class="pagination-links">

                            @if ($daftarSurat->onFirstPage())
                                <span class="disabled">&lsaquo;</span>
                            @else
                                <a href="{{ $daftarSurat->previousPageUrl() }}">&lsaquo;</a>
                            @endif

                            @foreach ($daftarSurat->getUrlRange(
                                max(1, $daftarSurat->currentPage() - 2),
                                min($daftarSurat->lastPage(), $daftarSurat->currentPage() + 2)
                            ) as $page => $url)

                                @if ($page == $daftarSurat->currentPage())
                                    <span class="current">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif

                            @endforeach

                            @if ($daftarSurat->hasMorePages())
                                <a href="{{ $daftarSurat->nextPageUrl() }}">&rsaquo;</a>
                            @else
                                <span class="disabled">&rsaquo;</span>
                            @endif

                        </div>

                    </div>

                @endif

            </section>

            <!-- CATATAN AKSES -->
            <div class="access-note">
                <strong>Akses pimpinan</strong><br>
                Halaman ini digunakan untuk memantau hasil keputusan seleksi dan surat penerimaan peserta magang UPT TIKP.
                Penginputan keputusan, catatan disposisi, dan unggah surat dikelola oleh petugas yang berwenang.
                Kepala UPT TIKP tidak melakukan perubahan data operasional melalui halaman ini.
            </div>

            <p class="footer-note">
                Sistem Informasi Manajemen Magang &mdash;
                Dinas Pendidikan Provinsi Jawa Timur
            </p>

        </main>

    </div>

</div>
</body>
</html>