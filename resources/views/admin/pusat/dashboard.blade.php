<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Pusat | Magang Dindik Jatim</title>

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

        .filter-select:disabled {
            opacity: 1;
            cursor: default;
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
            grid-template-columns: repeat(5, minmax(0, 1fr));
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

        .stat-card.danger .stat-icon {
            color: var(--blue2);
        }

        .stat-card.primary {
            border-color: #c7dcff;
            box-shadow: 0 3px 10px rgba(10,86,214,.12);
        }

        .stat-card.primary .stat-title,
        .stat-card.primary .stat-number {
            color: var(--blue2);
        }

        /* ================= DASHBOARD GRID ================= */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            align-items: start;
        }

        .right-column {
            display: flex;
            flex-direction: column;
            gap: 18px;
            min-width: 0;
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

        .panel-left {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 0;
        }

        .panel-left > svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            color: var(--blue2);
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

        .panel-link {
            color: var(--blue2);
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .panel-note {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
            color: #94a3b8;
            font-size: 10px;
            line-height: 1.6;
        }

        .panel-note svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
            color: var(--blue2);
        }

        .panel-note.divided {
            padding-top: 14px;
            border-top: 1px solid #edf0f5;
        }

        /* ================= STATUS ================= */
        .status-item {
            padding: 12px 14px;
            margin-bottom: 10px;
            border: 1px solid #edf0f5;
            border-radius: 11px;
            box-shadow: 0 1px 3px rgba(25,35,70,.04);
        }

        .status-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 9px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .status-label svg {
            width: 14px;
            height: 14px;
            color: var(--blue2);
        }

        .status-heading strong {
            color: var(--blue2);
            white-space: nowrap;
        }

        .progress {
            height: 6px;
            overflow: hidden;
            border-radius: 20px;
            background: #eef1f6;
        }

        .progress-fill {
            height: 100%;
            border-radius: 20px;
            background: var(--blue2);
        }

        /* ================= KOMPOSISI ================= */
        .education-item {
            margin-bottom: 14px;
        }

        .education-item:last-of-type {
            margin-bottom: 0;
        }

        .education-heading {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 7px;
            font-size: 11px;
            font-weight: 500;
        }

        .education-heading strong {
            color: var(--blue2);
        }

        .education-detail {
            display: flex;
            justify-content: space-between;
            margin-top: 6px;
            color: #94a3b8;
            font-size: 9px;
        }

        /* ================= ANTREAN ================= */
        .queue-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .queue-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 12px;
            border: 1px solid #edf0f5;
            border-radius: 11px;
            box-shadow: 0 1px 3px rgba(25,35,70,.04);
        }

        .queue-avatar {
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

        .queue-info {
            flex: 1;
            min-width: 0;
        }

        .queue-name {
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .queue-description {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 9px;
        }

        .queue-link {
            padding: 6px 12px;
            border-radius: 99px;
            background: #f1f5fb;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
        }

        .queue-link:hover {
            background: #e3ecfb;
        }

        .empty-state {
            padding: 24px 12px;
            color: #8992a5;
            font-size: 11px;
            text-align: center;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 1250px) {
            .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 1000px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
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
        'bell-ring' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.9 1.9 0 0 0 3.4 0M2 8c0-2.2.7-4.3 2-6M22 8a10 10 0 0 0-2-6"></path>',
        'download' => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"></path>',
        'folder' => '<path d="M3 8V6a2 2 0 0 1 2-2h4l2 2h6a2 2 0 0 1 2 2v2"></path><path d="M3 10h19l-2 8a2 2 0 0 1-2 1.5H5a2 2 0 0 1-2-2z"></path>',
        'shield' => '<path d="M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6z"></path><path d="m9 12 2 2 4-4"></path>',
        'x-circle' => '<circle cx="12" cy="12" r="9"></circle><path d="m15 9-6 6M9 9l6 6"></path>',
        'globe' => '<circle cx="12" cy="12" r="9"></circle><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"></path>',
        'bars' => '<path d="M5 20V10M12 20V4M19 20v-7" stroke-width="3"></path>',
        'file' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5M9 13h6M9 17h6"></path>',
        'cap' => '<path d="m2 9 10-5 10 5-10 5z"></path><path d="M6 11.5V16c0 1.5 2.7 3 6 3s6-1.5 6-3v-4.5M22 9v6"></path>',
        'trend' => '<path d="m3 17 6-6 4 4 8-8M15 7h6v6"></path>',
        'sliders' => '<path d="M4 6h8M20 6h-2M4 12h2M14 12h6M4 18h10M20 18h-2"></path><circle cx="16" cy="6" r="2"></circle><circle cx="10" cy="12" r="2"></circle><circle cx="16" cy="18" r="2"></circle>',
        'refresh' => '<path d="M21 12a9 9 0 1 1-3-6.7L21 8"></path><path d="M21 3v5h-5"></path>',
        'bolt' => '<path d="M13 2 4 14h7l-1 8 9-12h-7z"></path>',
    ];

    $svg = fn (string $name) =>
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . ($icons[$name] ?? '') . '</svg>';

    $petugas = auth('petugas')->user();
    $namaAdmin = $petugas->nama ?? 'Admin Pusat';

    $inisial = collect(preg_split('/\s+/', trim($namaAdmin)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');

    $jam = now('Asia/Jakarta')->hour;
    $sapaan = $jam < 11 ? 'Pagi' : ($jam < 15 ? 'Siang' : ($jam < 18 ? 'Sore' : 'Malam'));

    $periodeAktif = $daftarPeriode->firstWhere('id_periode', $periodeTerpilih)
        ?? $daftarPeriode->firstWhere('status_tampilan', 'Berjalan');

    $jumlahTotal = $totalPengajuan;

    $persentase = fn ($jumlah) => $jumlahTotal > 0
        ? round(($jumlah / $jumlahTotal) * 100, 1)
        : 0;

    // Format angka gaya Indonesia: 23,4 / 67,2 / 100
    $fmt = fn ($angka) => rtrim(rtrim(number_format($angka, 1, ',', '.'), '0'), ',');

    $jumlahMahasiswa = $komposisiPendidikan->get('MAHASISWA', 0);
    $jumlahSMK = $komposisiPendidikan->get('SMK', 0);
    $jumlahTidakDiketahui = $komposisiPendidikan->get('Tidak diketahui', 0);
    $totalPendidikan = $jumlahMahasiswa + $jumlahSMK + $jumlahTidakDiketahui;

    $daftarStatus = [
        ['icon' => 'file',     'label' => 'Menunggu verifikasi (antrean)',          'jumlah' => $antreanVerifikasi],
        ['icon' => 'cap',      'label' => 'Lolos verifikasi, diteruskan ke UPT TIKP', 'jumlah' => $berkasTerverifikasi],
        ['icon' => 'x-circle', 'label' => 'Ditolak (dokumen tidak sesuai)',          'jumlah' => $pengajuanDitolak],
    ];

    $daftarJenjang = [
        ['kunci' => 'MAHASISWA', 'label' => 'Perguruan Tinggi (D3/D4/S1)', 'jumlah' => $jumlahMahasiswa],
        ['kunci' => 'SMK',       'label' => 'SMK',                          'jumlah' => $jumlahSMK],
    ];
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

            <a href="{{ route('admin-pusat.dashboard') }}" class="nav-link active" aria-current="page">
                {!! $svg('grid') !!}
                Dashboard
            </a>

            <a href="{{ route('admin-pusat.verifikasi-berkas') }}"
                class="nav-link">
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
                    <div class="avatar">{{ $inisial ?: 'AP' }}</div>

                    <div class="user-info">
                        <div class="user-name">{{ $namaAdmin }}</div>
                        <div class="user-role">Sekretariat</div>
                    </div>
                </div>
            </div>

        </header>

        <!-- KONTEN -->
        <main class="content">

            <!-- WELCOME -->
            <section class="welcome">

                <div>
                    <div class="period-badge">
                        <span class="period-dot"></span>
                        Admin Pusat &bull; {{ $periodeAktif?->nama_periode ?? 'Semua Periode' }}
                    </div>

                    <h1>Selamat {{ $sapaan }}!</h1>

                    <p>
                        Pantau berkas pendaftar magang UPT TIKP, antrean verifikasi,
                        dan hasil verifikasi pada periode penerimaan.
                    </p>
                </div>

                <div class="welcome-actions">
                    <button type="button" class="btn btn-outline" onclick="window.print()">
                        {!! $svg('download') !!}
                        Ekspor Ringkasan
                    </button>

                    <a href="#" class="btn">
                        {!! $svg('verify') !!}
                        Mulai Verifikasi ({{ $antreanVerifikasi }})
                    </a>
                </div>

            </section>

            <!-- FILTER GLOBAL -->
            <section class="panel filter-card">

                <form method="GET" action="{{ route('admin-pusat.dashboard') }}">

                    <div class="filter-row">

                        <span class="filter-heading">
                            {!! $svg('sliders') !!}
                            Filter Global:
                        </span>

                        <span class="filter-label">Periode:</span>

                        <select name="periode" class="filter-select" onchange="this.form.submit()">
                            <option value="">Semua Periode</option>

                            @foreach ($daftarPeriode as $periode)
                                <option
                                    value="{{ $periode->id_periode }}"
                                    @selected((string) $periodeTerpilih === (string) $periode->id_periode)
                                >
                                    {{ $periode->nama_periode }}
                                    ({{ mb_strtolower($periode->status_tampilan) }})
                                </option>
                            @endforeach
                        </select>

                        <span class="filter-label">Jenjang:</span>

                        <select class="filter-select" disabled>
                            <option>Semua Jenjang (D3/D4/S1 &amp; SMK)</option>
                        </select>

                    </div>

                    <div class="filter-bottom">

                        <a href="{{ route('admin-pusat.dashboard') }}" class="reset-btn">
                            {!! $svg('refresh') !!}
                            Reset Filter
                        </a>

                        <span class="realtime">
                            <i></i> Data Terkini (Real-time)
                        </span>

                    </div>

                </form>

            </section>

            <!-- STATISTIK -->
            <section class="stats-grid">

                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Total Berkas Masuk</span>
                        <span class="stat-icon">{!! $svg('folder') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($totalPengajuan, 0, ',', '.') }}</div>
                    <div class="stat-description">Seluruh pengajuan pada periode terpilih</div>
                </article>

                <article class="stat-card danger">
                    <div class="stat-top">
                        <span class="stat-title">Antrean Verifikasi</span>
                        <span class="stat-icon">{!! $svg('bell-ring') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($antreanVerifikasi, 0, ',', '.') }}</div>
                    <div class="stat-description">&bull; Tindakan segera</div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Lolos Verifikasi</span>
                        <span class="stat-icon">{!! $svg('shield') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($berkasTerverifikasi, 0, ',', '.') }}</div>
                    <div class="stat-description">{{ $fmt($persentase($berkasTerverifikasi)) }}% dari pendaftar</div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Ditolak</span>
                        <span class="stat-icon">{!! $svg('x-circle') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($pengajuanDitolak, 0, ',', '.') }}</div>
                    <div class="stat-description">{{ $fmt($persentase($pengajuanDitolak)) }}% dari pendaftar</div>
                </article>

                <article class="stat-card primary">
                    <div class="stat-top">
                        <span class="stat-title">Total Berkas Diteruskan</span>
                        <span class="stat-icon">{!! $svg('globe') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($berkasTerverifikasi, 0, ',', '.') }}</div>
                    <div class="stat-description">Berkas lolos verifikasi Admin Pusat</div>
                </article>

            </section>

            <!-- ISI DASHBOARD -->
            <section class="dashboard-grid">

                <!-- STATUS VERIFIKASI -->
                <div class="panel panel-body">

                    <div class="panel-header">

                        <div class="panel-left">
                            {!! $svg('bars') !!}

                            <div>
                                <h2 class="panel-title" style="margin:0;">Status Verifikasi Berkas</h2>
                                <div class="panel-subtitle">
                                    Sebaran status berkas pendaftar UPT TIKP pada periode terpilih
                                </div>
                            </div>
                        </div>

                        <span class="panel-count">{{ $totalPengajuan }} Berkas Masuk</span>

                    </div>

                    @foreach ($daftarStatus as $status)
                        <div class="status-item">

                            <div class="status-heading">
                                <span class="status-label">
                                    {!! $svg($status['icon']) !!}
                                    {{ $status['label'] }}
                                </span>

                                <strong>
                                    {{ $status['jumlah'] }} Berkas
                                    ({{ $fmt($persentase($status['jumlah'])) }}%)
                                </strong>
                            </div>

                            <div class="progress">
                                <div class="progress-fill" style="width: {{ $persentase($status['jumlah']) }}%"></div>
                            </div>

                        </div>
                    @endforeach

                    <div class="panel-note">
                        {!! $svg('bolt') !!}
                        Berkas yang lolos verifikasi otomatis diteruskan ke UPT TIKP.
                    </div>

                </div>

                <!-- KOLOM KANAN -->
                <div class="right-column">

                    <!-- KOMPOSISI JENJANG -->
                    <div class="panel panel-body">

                        <div class="panel-header">

                            <div>
                                <h2 class="panel-title">
                                    {!! $svg('cap') !!}
                                    Komposisi Jenjang Pendidikan
                                </h2>
                                <div class="panel-subtitle">
                                    Proporsi pelamar Mahasiswa vs Siswa SMK
                                </div>
                            </div>

                            <span class="panel-link" style="font-weight:700;">
                                {{ $totalPendidikan }} Pendaftar
                            </span>

                        </div>

                        @foreach ($daftarJenjang as $jenjang)

                            @php
                                $persenJenjang = $totalPendidikan > 0
                                    ? round(($jenjang['jumlah'] / $totalPendidikan) * 100)
                                    : 0;

                                $adaDetail = isset($lolosPerJenjang);
                                $lolos = $adaDetail ? ($lolosPerJenjang[$jenjang['kunci']] ?? 0) : null;
                            @endphp

                            <div class="education-item">

                                <div class="education-heading">
                                    <span>{{ $jenjang['label'] }}</span>
                                    <strong>{{ $jenjang['jumlah'] }} ({{ $persenJenjang }}%)</strong>
                                </div>

                                <div class="progress">
                                    <div class="progress-fill" style="width: {{ $persenJenjang }}%"></div>
                                </div>

                                @if ($adaDetail)
                                    <div class="education-detail">
                                        <span>Lolos verifikasi: {{ $lolos }}</span>
                                        <span>Belum lolos: {{ max(0, $jenjang['jumlah'] - $lolos) }}</span>
                                    </div>
                                @endif

                            </div>

                        @endforeach

                        @if ($jumlahTidakDiketahui > 0)
                            <div class="panel-note">
                                {{ $jumlahTidakDiketahui }} pengajuan memiliki jenjang pendidikan yang belum tercatat.
                            </div>
                        @endif

                    </div>

                    <!-- ANTREAN CEPAT -->
                    <div class="panel panel-body">

                        <div class="panel-header">

                            <div>
                                <h2 class="panel-title">Antrean Cepat Verifikasi</h2>
                                <div class="panel-subtitle">Validasi berkas prioritas masuk</div>
                            </div>

                            <a href="#" class="panel-link">
                                Semua ({{ $antreanVerifikasi }}) &rarr;
                            </a>

                        </div>

                        <div class="queue-list">

                            @forelse ($daftarAntrean as $item)

                                @php
                                    $namaPeserta = $item->peserta->nama ?? 'Nama tidak tersedia';

                                    $inisialPeserta = collect(preg_split('/\s+/', trim($namaPeserta)))
                                        ->filter()
                                        ->take(2)
                                        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
                                        ->implode('');

                                    $jenjangPeserta = $item->peserta->jenjang_pendidikan ?? null;
                                    $jenjangTampil = $jenjangPeserta
                                        ? ($jenjangPeserta === 'SMK' ? 'SMK' : ucfirst(mb_strtolower($jenjangPeserta)))
                                        : 'Jenjang belum tersedia';
                                @endphp

                                <div class="queue-item">

                                    <div class="queue-avatar">{{ $inisialPeserta }}</div>

                                    <div class="queue-info">
                                        <div class="queue-name">{{ $namaPeserta }}</div>
                                        <div class="queue-description">
                                            UPT TIKP &bull; {{ $jenjangTampil }}
                                        </div>
                                    </div>

                                    <a href="#" class="queue-link">Periksa</a>

                                </div>

                            @empty

                                <div class="empty-state">
                                    Belum ada pengajuan yang menunggu verifikasi.
                                </div>

                            @endforelse

                        </div>

                        <div class="panel-note divided">
                            {!! $svg('bolt') !!}
                            Berkas lolos otomatis diteruskan ke UPT TIKP
                        </div>

                    </div>

                </div>

            </section>

        </main>

    </div>

</div>

</body>
</html>