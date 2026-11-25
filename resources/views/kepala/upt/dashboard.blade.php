<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kepala UPT TIKP | Dindik Jatim</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        :root {
            --blue: #0b3d9e;
            --blue2: #0a56d6;
            --soft-blue: #6d9bf1;
            --text: #20212b;
            --muted: #606477;
            --border: #e1e5ee;
            --bg: #f7f6ff;
            --green: #16a34a;
            --orange: #ea580c;
            --red: #dc2626;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }

        .app {
            display: grid;
            grid-template-columns: 222px minmax(0, 1fr);
            min-height: 100vh;
        }

        /* ================= SIDEBAR (sama dengan dashboard admin UPT) ================= */
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

        .sidebar::before {
            content: "";
            position: absolute;
            top: 70px;
            right: -70px;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            pointer-events: none;
        }

        .sidebar::after {
            content: "";
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            pointer-events: none;
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
            color: rgba(255, 255, 255, 0.8);
            font-size: 10px;
            line-height: 1.4;
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
            background: rgba(255, 255, 255, 0.12);
        }

        .nav-link.active {
            background: white;
            color: var(--blue2);
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
        }

        .nav-bottom {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-top: auto;
        }

        .nav-bottom form {
            margin: 0;
        }

        .nav-bottom .nav-link {
            width: 100%;
        }

        /* ================= TOPBAR ================= */
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
            box-shadow: 0 2px 4px rgba(25, 35, 70, 0.05);
        }

        .topbar-title {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.2;
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
            gap: 16px;
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

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info {
            text-align: right;
            line-height: 1.35;
        }

        .user-name {
            font-size: 10px;
            font-weight: 700;
        }

        .user-role {
            color: var(--muted);
            font-size: 9px;
            font-weight: 500;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--blue2);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
        }

        /* ================= KONTEN ================= */
        .content {
            flex: 1;
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 24px 28px 36px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .panel {
            position: relative;
            min-width: 0;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(25, 35, 70, 0.07);
        }

        .section-panel {
            padding: 20px 22px 22px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 16px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: #fff;
            color: var(--blue2);
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
        }

        .btn:hover {
            background: #f1f5ff;
        }

        /* ================= JUDUL HALAMAN ================= */
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
            letter-spacing: -0.3px;
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
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            flex-shrink: 0;
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
            color: #fff;
        }

        .badge-light {
            background: #eaf1ff;
            color: var(--blue2);
        }

        .badge-light .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--blue2);
        }

        /* ================= KARTU RINGKASAN ================= */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .stat-card {
            padding: 16px 18px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(25, 35, 70, 0.07);
        }

        .stat-label {
            color: #7b8196;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .stat-value {
            margin: 10px 0 6px;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .stat-note {
            color: #64748b;
            font-size: 10px;
            line-height: 1.5;
        }

        .stat-link {
            display: inline-block;
            margin-top: 10px;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
        }

        .stat-card.primary {
            border-color: var(--blue2);
            background: var(--blue2);
            color: #fff;
            box-shadow: 0 4px 12px rgba(10, 86, 214, 0.25);
        }

        .stat-card.primary .stat-label,
        .stat-card.primary .stat-note {
            color: rgba(255, 255, 255, 0.85);
        }

        .stat-card.primary .stat-link {
            color: #fff;
        }

        /* ================= GRID TENGAH ================= */
        .middle-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(280px, 1fr);
            align-items: start;
            gap: 18px;
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

        .progress-item + .progress-item {
            margin-top: 16px;
        }

        .progress-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .progress-heading strong {
            color: var(--blue2);
            font-weight: 700;
        }

        .progress-heading .plain {
            color: #4a4e63;
            font-weight: 500;
        }

        .progress-track {
            width: 100%;
            height: 7px;
            margin: 8px 0 6px;
            overflow: hidden;
            border-radius: 20px;
            background: #eceef5;
        }

        .progress-fill {
            height: 100%;
            border-radius: 20px;
            background: var(--blue2);
        }

        .progress-fill.soft {
            background: var(--soft-blue);
        }

        .progress-note {
            color: var(--muted);
            font-size: 9px;
        }

        .section-divider {
            margin: 18px 0 14px;
            border: 0;
            border-top: 1px solid #ebedf4;
        }

        .subheading {
            margin: 0 0 14px;
            font-size: 11px;
            font-weight: 700;
        }

        .empty-state {
            padding: 22px 12px;
            border: 1px dashed #dce2ea;
            border-radius: 11px;
            background: #fcfdff;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.7;
            text-align: center;
        }

        /* ================= TELUSURI DATA ================= */
        .head-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .head-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .select {
            min-width: 140px;
            height: 34px;
            padding: 0 30px 0 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23606477' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            color: #334155;
            font-family: inherit;
            font-size: 11px;
            font-weight: 500;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
        }

        .select:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10, 86, 214, 0.12);
        }

        .period-form {
            margin: 0;
        }

        .breadcrumb {
            margin: 4px 0 14px;
            color: var(--muted);
            font-size: 10px;
        }

        .breadcrumb strong {
            color: var(--text);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 620px;
            border-collapse: collapse;
        }

        th {
            padding: 11px 10px;
            border-bottom: 1px solid var(--border);
            color: #7b8196;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 0.4px;
            text-align: left;
            text-transform: uppercase;
        }

        td {
            padding: 15px 10px;
            border-bottom: 1px solid #ebedf4;
            font-size: 11px;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        tr.is-selected td {
            background: #f7faff;
        }

        .row-link {
            color: inherit;
            text-decoration: none;
        }

        .period-name {
            font-weight: 700;
        }

        .tag-running {
            margin-left: 8px;
            padding: 2px 9px;
            border-radius: 99px;
            background: #e4eefe;
            color: var(--blue2);
            font-size: 9px;
            font-weight: 600;
        }

        .num-accepted {
            color: var(--blue2);
            font-weight: 700;
        }

        .person-name {
            font-size: 11px;
            font-weight: 700;
        }

        .person-sub {
            margin-top: 3px;
            color: var(--muted);
            font-size: 9px;
        }

        .status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 99px;
            font-size: 9px;
            font-weight: 600;
        }

        .status.success {
            background: #e3f5eb;
            color: #16834a;
        }

        .status.danger {
            background: #ffe8e8;
            color: #c52c2c;
        }

        .td-empty {
            padding: 22px 10px;
            color: #94a3b8;
            text-align: center;
        }

        /* ================= SIMULASI KUOTA ================= */
        .sim-badge {
            padding: 5px 11px;
            border-radius: 99px;
            background: #eef0f6;
            color: #5b6075;
            font-size: 9px;
            font-weight: 600;
            white-space: nowrap;
        }

        .sim-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-top: 4px;
        }

        .sim-box {
            padding: 18px 20px 20px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #f9fafd;
        }

        .sim-label {
            margin: 0 0 14px;
            color: #7b8196;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .field + .field {
            margin-top: 12px;
        }

        .field-name {
            margin-bottom: 6px;
            color: #4a4e63;
            font-size: 10px;
        }

        .field-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 9px 12px;
            border: 1px solid transparent;
            border-radius: 8px;
            background: #eff1f6;
            font-size: 11px;
            font-weight: 700;
        }

        .field-box input {
            width: 70px;
            padding: 0;
            border: 0;
            outline: none;
            background: transparent;
            color: var(--text);
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
        }

        .field-box.editable {
            border-color: #cdd9f3;
            background: #fff;
        }

        .field-box.editable:focus-within {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10, 86, 214, 0.12);
        }

        .field-tag {
            padding: 2px 9px;
            border-radius: 99px;
            background: #e0e3ec;
            color: #5b6075;
            font-size: 9px;
            font-weight: 600;
            white-space: nowrap;
        }

        .field-tag.data {
            background: #dfeafe;
            color: var(--blue2);
        }

        .field-hint {
            margin-top: 6px;
            color: #85899a;
            font-size: 9px;
        }

        .result-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding-bottom: 14px;
            margin-bottom: 14px;
            border-bottom: 1px solid #e6e8f0;
        }

        .result-title {
            font-size: 12px;
            font-weight: 700;
        }

        .result-formula {
            margin-top: 4px;
            color: #85899a;
            font-size: 9px;
        }

        .result-number {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .capacity-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            font-size: 12px;
            font-weight: 700;
        }

        .capacity-head strong {
            color: var(--blue2);
        }

        .capacity-track {
            width: 100%;
            height: 7px;
            margin: 10px 0 14px;
            overflow: hidden;
            border-radius: 20px;
            background: #e5e8f1;
        }

        .capacity-fill {
            width: 0;
            height: 100%;
            border-radius: 20px;
            background: var(--blue2);
            transition: width .25s ease, background .25s ease;
        }

        .capacity-fill.over {
            background: var(--red);
        }

        .sim-note {
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: #fff;
            color: #4a4e63;
            font-size: 10px;
            line-height: 1.6;
        }

        .sim-note.over {
            border-color: #f4b8b4;
            background: #fdeceb;
            color: #b42318;
        }

        /* ================= MONITORING KUOTA ================= */
        .quota-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .quota-card {
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fafbfc;
        }

        .quota-name {
            margin-bottom: 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .quota-numbers {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            font-size: 10px;
        }

        .quota-numbers strong {
            color: var(--blue2);
        }

        .quota-note {
            color: var(--muted);
            font-size: 9px;
        }

        /* ================= CATATAN AKSES ================= */
        .access-note {
            padding: 14px 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
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

        /* ================= LAYAR SEDANG ================= */
        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .middle-grid,
            .sim-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ================= HP / TABLET ================= */
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

        @media (max-width: 560px) {
            .topbar-title {
                font-size: 13px;
            }

            .user-info {
                display: none;
            }

            .page-heading h1 {
                font-size: 19px;
            }

            .stats-grid,
            .quota-grid {
                grid-template-columns: 1fr;
            }

            .section-panel {
                padding: 16px;
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
        'bell' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>',
    ];

    $svg = fn (string $name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($icons[$name] ?? '') . '</svg>';

    $rute = fn (string $nama, string $cadangan = '#') =>
        \Illuminate\Support\Facades\Route::has($nama) ? route($nama) : $cadangan;

    $namaKepala = auth('petugas')->user()->nama ?? 'Kepala UPT TIKP';

    $inisial = collect(preg_split('/\s+/', trim($namaKepala)))
        ->filter()->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');

    $persen = fn ($bagian, $total) => $total > 0 ? (int) round(($bagian / $total) * 100) : 0;

    /* ---------- Angka ringkasan ---------- */
    $jumlahDiputuskan = $totalDiterima + $totalDitolak;
    $dalamSeleksi = $dalamSeleksi ?? $totalBelumDitetapkan;
    $totalSuratTerbit = $totalSuratTerbit ?? $suratTerbaru->count();

    /* ---------- Kuota ---------- */
    $totalKuota = $daftarKuota->sum('kuota');
    $totalKuotaTerpakai = $daftarKuota->sum('diterima');
    $totalSisaKuota = $daftarKuota->sum('sisa');
    $kuotaPeriode = $totalKuota > 0 ? $totalKuota : ($kuotaMaksimal ?? 40);

    /* ---------- Data untuk simulasi ---------- */
    $lamaPeriode = 6; // ketentuan: 1 periode = 6 bulan
    $mulaiPeriode = data_get($periodeTerpilih, 'tanggal_mulai');

    $bulanBerjalan = $bulanBerjalan
        ?? ($mulaiPeriode
            ? (int) ceil(abs(\Carbon\Carbon::parse($mulaiPeriode)->floatDiffInMonths(now())))
            : $lamaPeriode);
    $bulanBerjalan = max(1, min($lamaPeriode, $bulanBerjalan));

    $rataPerBulan = (int) round($totalPengajuan / $bulanBerjalan);
    $tingkatPenerimaan = $totalPengajuan > 0 ? ($totalDiterima / $totalPengajuan) : 0;

    /* ---------- Komposisi jenjang (opsional dari controller) ---------- */
    $jumlahMahasiswa = (int) ($komposisiJenjang['MAHASISWA'] ?? 0);
    $jumlahSmk = (int) ($komposisiJenjang['SMK'] ?? 0);
    $jumlahJenjang = $jumlahMahasiswa + $jumlahSmk;
    $adaKomposisi = isset($komposisiJenjang) && $jumlahJenjang > 0;

    /* ---------- Tabel "Telusuri Data" ---------- */
    $adaRingkasanPeriode = isset($ringkasanPeriode) && collect($ringkasanPeriode)->isNotEmpty();
@endphp

<div class="app">

    {{-- ============ SIDEBAR ============ --}}
    <aside class="sidebar">
        <div class="brand">
            {{-- Logo: public/images/logo.png --}}
            <img class="brand-logo"
                 src="{{ asset('images/logo.png') }}"
                 alt="Logo Dinas Pendidikan Jawa Timur"
                 onerror="this.style.display='none'">
            <div>
                <div class="brand-title">Dindik Jatim</div>
                <div class="brand-sub">Pimpinan</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">
            <a href="{{ route('kepala-upt.dashboard') }}" class="nav-link active" aria-current="page">
                {!! $svg('grid') !!} Dashboard
            </a>
            <a href="{{ route('kepala-upt.monitoring') }}" class="nav-link">
                {!! $svg('tasks') !!} Monitoring Seleksi
            </a>
            <a href="{{ route('kepala-upt.keputusan-surat') }}" class="nav-link">
                {!! $svg('clipboard') !!} Keputusan &amp; Surat
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

    {{-- ============ KONTEN ============ --}}
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
                        <div class="user-name">{{ $namaKepala }}</div>
                        <div class="user-role">Pimpinan</div>
                    </div>
                    <div class="avatar">{{ $inisial ?: 'KU' }}</div>
                </div>
            </div>
        </header>

        <main class="content">

            {{-- ========== JUDUL ========== --}}
            <section class="page-heading">
                <div>
                    <h1>Dashboard Pemantauan</h1>
                    <p>
                        Ringkasan peserta UPT TIKP
                        @if ($periodeTerpilih)
                            periode {{ $periodeTerpilih->nama_periode }}.
                        @else
                            seluruh periode penerimaan.
                        @endif
                        Anda dapat menelusuri data dan menjalankan simulasi tanpa mengubah data.
                    </p>
                </div>

                <div class="heading-badges">
                    <span class="badge badge-blue">Kepala UPT TIKP</span>
                    <span class="badge badge-light"><span class="dot"></span> Tanpa ubah data</span>
                </div>
            </section>

            {{-- ========== KARTU RINGKASAN ========== --}}
            <section class="stats-grid">

                <article class="stat-card">
                    <div class="stat-label">Penempatan UPT TIKP</div>
                    <div class="stat-value">{{ number_format($totalPengajuan, 0, ',', '.') }}</div>
                    <div class="stat-note">Lolos verifikasi Admin Pusat</div>
                    <a href="#telusuri" class="stat-link">Lihat rincian &rsaquo;</a>
                </article>

                <article class="stat-card">
                    <div class="stat-label">Dalam seleksi</div>
                    <div class="stat-value">{{ number_format($dalamSeleksi, 0, ',', '.') }}</div>
                    <div class="stat-note">Wawancara tatap muka berjalan</div>
                    <a href="#alur" class="stat-link">Lihat rincian &rsaquo;</a>
                </article>

                <article class="stat-card">
                    <div class="stat-label">Sudah diputuskan</div>
                    <div class="stat-value">{{ number_format($jumlahDiputuskan, 0, ',', '.') }}</div>
                    <div class="stat-note">{{ $totalDiterima }} diterima, {{ $totalDitolak }} tidak diterima</div>
                    <a href="#keputusan" class="stat-link">Lihat rincian &rsaquo;</a>
                </article>

                <article class="stat-card primary">
                    <div class="stat-label">Surat penerimaan terbit</div>
                    <div class="stat-value">{{ number_format($totalSuratTerbit, 0, ',', '.') }}</div>
                    <div class="stat-note">Peserta resmi diterima</div>
                    <a href="#surat" class="stat-link">Lihat rincian &rsaquo;</a>
                </article>

            </section>

            {{-- ========== ALUR TAHAPAN + ASAL PESERTA ========== --}}
            <section class="middle-grid" id="alur">

                <div class="panel section-panel">
                    <h2 class="panel-title">Alur Tahapan Pendaftaran</h2>
                    <p class="panel-description">Jumlah peserta pada setiap tahap proses.</p>

                    <div class="progress-item">
                        <div class="progress-heading">
                            <span>Ditempatkan di UPT TIKP</span>
                            <strong>{{ $totalPengajuan }} peserta</strong>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width: {{ $totalPengajuan > 0 ? 100 : 0 }}%"></div>
                        </div>
                        <div class="progress-note">Lolos verifikasi Admin Pusat</div>
                    </div>

                    <div class="progress-item">
                        <div class="progress-heading">
                            <span>Dalam seleksi wawancara</span>
                            <strong>{{ $dalamSeleksi }} peserta</strong>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width: {{ $persen($dalamSeleksi, $totalPengajuan) }}%"></div>
                        </div>
                        <div class="progress-note">{{ $persen($dalamSeleksi, $totalPengajuan) }}% dari penempatan</div>
                    </div>

                    <div class="progress-item">
                        <div class="progress-heading">
                            <span>Sudah ada keputusan</span>
                            <strong>{{ $jumlahDiputuskan }} peserta</strong>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width: {{ $persen($jumlahDiputuskan, $totalPengajuan) }}%"></div>
                        </div>
                        <div class="progress-note">{{ $persen($jumlahDiputuskan, $totalPengajuan) }}% dari penempatan</div>
                    </div>

                    <div class="progress-item">
                        <div class="progress-heading">
                            <span>Surat penerimaan terbit</span>
                            <strong>{{ $totalSuratTerbit }} peserta</strong>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width: {{ $persen($totalSuratTerbit, $totalPengajuan) }}%"></div>
                        </div>
                        <div class="progress-note">{{ $persen($totalSuratTerbit, $totalPengajuan) }}% dari penempatan</div>
                    </div>
                </div>

                <div class="panel section-panel">
                    <h2 class="panel-title">Asal Peserta</h2>
                    <p class="panel-description">Dari {{ $totalPengajuan }} peserta di UPT TIKP.</p>

                    @if ($adaKomposisi)
                        <div class="progress-item">
                            <div class="progress-heading">
                                <span>Mahasiswa</span>
                                <strong>{{ $jumlahMahasiswa }} peserta ({{ $persen($jumlahMahasiswa, $jumlahJenjang) }}%)</strong>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill" style="width: {{ $persen($jumlahMahasiswa, $jumlahJenjang) }}%"></div>
                            </div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-heading">
                                <span>Siswa SMK</span>
                                <strong>{{ $jumlahSmk }} peserta ({{ $persen($jumlahSmk, $jumlahJenjang) }}%)</strong>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill" style="width: {{ $persen($jumlahSmk, $jumlahJenjang) }}%"></div>
                            </div>
                        </div>
                    @else
                        <div class="empty-state">Data asal peserta belum tersedia.</div>
                    @endif

                    <hr class="section-divider">

                    <h3 class="subheading">Hasil Seleksi</h3>

                    <div class="progress-item">
                        <div class="progress-heading">
                            <span class="plain">Diterima</span>
                            <span class="plain">{{ $totalDiterima }} ({{ $persen($totalDiterima, $totalPengajuan) }}%)</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill soft" style="width: {{ $persen($totalDiterima, $totalPengajuan) }}%"></div>
                        </div>
                    </div>

                    <div class="progress-item">
                        <div class="progress-heading">
                            <span class="plain">Tidak diterima</span>
                            <span class="plain">{{ $totalDitolak }} ({{ $persen($totalDitolak, $totalPengajuan) }}%)</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill soft" style="width: {{ $persen($totalDitolak, $totalPengajuan) }}%"></div>
                        </div>
                    </div>
                </div>

            </section>

            {{-- ========== TELUSURI DATA ========== --}}
            <section class="panel section-panel" id="telusuri">
                <div class="head-row">
                    <div>
                        <h2 class="panel-title">Telusuri Data</h2>
                        <p class="panel-description" style="margin-bottom:0;">
                            Jumlah pendaftar tiap periode (1 periode = 6 bulan).
                            Klik angka ringkasan di atas untuk melihat daftar pendaftarnya.
                        </p>
                    </div>

                    <div class="head-actions">
                        <form action="{{ route('kepala-upt.dashboard') }}" method="GET" class="period-form">
                            <select name="periode" class="select" aria-label="Pilih periode" onchange="this.form.submit()">
                                @forelse ($daftarPeriode as $periode)
                                    <option value="{{ $periode->id_periode }}"
                                        @selected($periodeTerpilih?->id_periode == $periode->id_periode)>
                                        {{ $periode->nama_periode }}
                                    </option>
                                @empty
                                    <option value="">Belum ada periode</option>
                                @endforelse
                            </select>
                        </form>

                        <a href="{{ $rute('kepala-upt.riwayat-lolos') }}" class="btn">
                            Riwayat Peserta Lolos &rsaquo;
                        </a>
                    </div>
                </div>

                <div class="breadcrumb">
                    Pendaftar UPT TIKP ({{ $totalPengajuan }}) &rsaquo; <strong>Per periode (6 bulan)</strong>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Periode (6 bulan)</th>
                                <th>Masuk seleksi</th>
                                <th>Sedang seleksi</th>
                                <th>Selesai</th>
                                <th>Diterima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($adaRingkasanPeriode)
                                @foreach ($ringkasanPeriode as $baris)
                                    @php
                                        $idBaris = data_get($baris, 'id_periode');
                                        $dipilih = $idBaris && $periodeTerpilih?->id_periode == $idBaris;
                                    @endphp
                                    <tr class="{{ $dipilih ? 'is-selected' : '' }}">
                                        <td>
                                            <span class="period-name">{{ data_get($baris, 'nama_periode', '-') }}</span>
                                            @if (data_get($baris, 'berjalan'))
                                                <span class="tag-running">Berjalan</span>
                                            @endif
                                        </td>
                                        <td>{{ data_get($baris, 'masuk', 0) }}</td>
                                        <td>{{ data_get($baris, 'sedang', 0) }}</td>
                                        <td>{{ data_get($baris, 'selesai', 0) }}</td>
                                        <td class="num-accepted">{{ data_get($baris, 'diterima', 0) }}</td>
                                    </tr>
                                @endforeach
                            @else
                                {{-- Cadangan: hanya periode yang sedang dipilih --}}
                                <tr class="is-selected">
                                    <td>
                                        <span class="period-name">{{ $periodeTerpilih?->nama_periode ?? 'Belum ada periode' }}</span>
                                        @if (data_get($periodeTerpilih, 'status_tampilan') === 'Berjalan')
                                            <span class="tag-running">Berjalan</span>
                                        @endif
                                    </td>
                                    <td>{{ $totalPengajuan }}</td>
                                    <td>{{ $dalamSeleksi }}</td>
                                    <td>{{ $jumlahDiputuskan }}</td>
                                    <td class="num-accepted">{{ $totalDiterima }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- ========== SIMULASI KUOTA ========== --}}
            <section class="panel section-panel" id="simulasi">
                <div class="head-row">
                    <div>
                        <h2 class="panel-title">Simulasi Kuota</h2>
                        <p class="panel-description" style="margin-bottom:0;">
                            Perkiraan kebutuhan kuota periode berikutnya. Angka &ldquo;Dari data&rdquo; terisi otomatis
                            dari data pendaftar, angka &ldquo;Asumsi&rdquo; bisa Anda ubah.
                        </p>
                    </div>
                    <span class="sim-badge">Hanya simulasi, tidak mengubah data</span>
                </div>

                <div class="sim-grid" style="margin-top:16px;"
                     id="simulasi-kuota"
                     data-rata="{{ $rataPerBulan }}"
                     data-lama="{{ $lamaPeriode }}"
                     data-tingkat="{{ round($tingkatPenerimaan, 4) }}"
                     data-kuota="{{ $kuotaPeriode }}">

                    {{-- Data dan asumsi --}}
                    <div class="sim-box">
                        <p class="sim-label">Data dan asumsi</p>

                        <div class="field">
                            <div class="field-name">Rata-rata pendaftar per bulan</div>
                            <div class="field-box">
                                <span>{{ $rataPerBulan }} pendaftar</span>
                                <span class="field-tag data">Dari data</span>
                            </div>
                            <div class="field-hint">Total peserta UPT TIKP &divide; jumlah bulan berjalan ({{ $bulanBerjalan }} bulan)</div>
                        </div>

                        <div class="field">
                            <div class="field-name">Lama satu periode</div>
                            <div class="field-box">
                                <span>{{ $lamaPeriode }} bulan</span>
                                <span class="field-tag">Ketentuan</span>
                            </div>
                            <div class="field-hint">Ketentuan periode magang</div>
                        </div>

                        <div class="field">
                            <div class="field-name">Tingkat penerimaan</div>
                            <div class="field-box">
                                <span>{{ round($tingkatPenerimaan * 100) }}%</span>
                                <span class="field-tag data">Dari data</span>
                            </div>
                            <div class="field-hint">Total diterima &divide; total peserta UPT TIKP</div>
                        </div>

                        <div class="field">
                            <div class="field-name">Pertumbuhan pendaftar</div>
                            <label class="field-box editable" for="sim-growth">
                                <span style="display:flex;align-items:center;gap:2px;">
                                    <input type="number" id="sim-growth" value="10" min="-90" max="500" step="1"
                                           inputmode="numeric" aria-label="Pertumbuhan pendaftar dalam persen">
                                    <span>%</span>
                                </span>
                                <span class="field-tag">Asumsi</span>
                            </label>
                            <div class="field-hint">Ubah angka ini untuk melihat dampaknya pada proyeksi</div>
                        </div>
                    </div>

                    {{-- Hasil proyeksi --}}
                    <div class="sim-box">
                        <p class="sim-label">Hasil proyeksi periode berikutnya</p>

                        <div class="result-row">
                            <div>
                                <div class="result-title">Proyeksi masuk seleksi</div>
                                <div class="result-formula">Rata-rata per bulan &times; lama periode &times; (1 + pertumbuhan)</div>
                            </div>
                            <div class="result-number" id="sim-masuk">0</div>
                        </div>

                        <div class="result-row">
                            <div>
                                <div class="result-title">Perkiraan diterima</div>
                                <div class="result-formula">Proyeksi masuk seleksi &times; tingkat penerimaan</div>
                            </div>
                            <div class="result-number" id="sim-diterima">0</div>
                        </div>

                        <div class="capacity-head">
                            <span>Kapasitas terpakai</span>
                            <strong id="sim-kapasitas-teks">0 dari {{ $kuotaPeriode }} (0%)</strong>
                        </div>
                        <div class="capacity-track">
                            <div class="capacity-fill" id="sim-kapasitas-bar"></div>
                        </div>

                        <div class="sim-note" id="sim-catatan">Menghitung proyeksi...</div>
                    </div>
                </div>
            </section>

            {{-- ========== MONITORING KUOTA ========== --}}
            <section class="panel section-panel">
                <div class="head-row" style="margin-bottom:16px;">
                    <div>
                        <h2 class="panel-title">Monitoring Kuota</h2>
                        <p class="panel-description" style="margin-bottom:0;">
                            Perbandingan kuota penerimaan dengan jumlah peserta yang telah diterima.
                            Bagian ini hanya menampilkan data dan tidak mengubah kuota.
                        </p>
                    </div>
                    <span class="sim-badge">
                        Kuota {{ $totalKuota }} &bull; terpakai {{ $totalKuotaTerpakai }} &bull; sisa {{ $totalSisaKuota }}
                    </span>
                </div>

                @if ($daftarKuota->isNotEmpty())
                    <div class="quota-grid">
                        @foreach ($daftarKuota as $kuota)
                            <div class="quota-card">
                                <div class="quota-name">{{ $kuota['sub_unit'] }}</div>

                                <div class="quota-numbers">
                                    <span>Kuota: {{ $kuota['kuota'] }}</span>
                                    <strong>{{ $kuota['diterima'] }} diterima</strong>
                                </div>

                                <div class="progress-track">
                                    <div class="progress-fill" style="width: {{ min(100, $kuota['persentase']) }}%"></div>
                                </div>

                                <div class="quota-note">Sisa {{ $kuota['sisa'] }} dari {{ $kuota['kuota'] }} kuota</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">Belum ada data kuota untuk periode yang dipilih.</div>
                @endif
            </section>

            {{-- ========== KEPUTUSAN TERBARU ========== --}}
            <section class="panel section-panel" id="keputusan">
                <div class="head-row" style="margin-bottom:8px;">
                    <h2 class="panel-title">Keputusan Terbaru</h2>
                    <span class="badge badge-light">Monitoring</span>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Pengajuan</th>
                                <th>Keputusan pimpinan</th>
                                <th>Status</th>
                                <th>Tanggal penetapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($keputusanTerbaru as $hasil)
                                <tr>
                                    <td>
                                        <div class="person-name">
                                            {{ $hasil->pengajuan?->peserta?->nama ?? 'Nama peserta tidak tersedia' }}
                                        </div>
                                        <div class="person-sub">UPT TIKP</div>
                                    </td>
                                    <td>{{ $hasil->keputusan_pimpinan }}</td>
                                    <td>
                                        @if ($hasil->status === 'Diterima')
                                            <span class="status success">Diterima</span>
                                        @else
                                            <span class="status danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ $hasil->tanggal_penetapan?->format('d M Y') ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="td-empty">Belum ada keputusan seleksi pada periode ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- ========== SURAT TERBARU ========== --}}
            <section class="panel section-panel" id="surat">
                <h2 class="panel-title">Surat Penerimaan Terbaru</h2>
                <p class="panel-description">Daftar surat penerimaan yang telah diterbitkan.</p>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nomor surat</th>
                                <th>Peserta</th>
                                <th>Tanggal terbit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratTerbaru as $surat)
                                <tr>
                                    <td>{{ $surat->nomor_surat }}</td>
                                    <td>{{ $surat->pengajuan?->peserta?->nama ?? 'Nama peserta tidak tersedia' }}</td>
                                    <td>{{ $surat->tanggal_terbit?->format('d M Y') ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="td-empty">Belum ada surat penerimaan pada periode ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <div class="access-note">
                <strong>Akses pimpinan</strong><br>
                Anda dapat memantau data pengajuan, hasil seleksi, kuota, dan surat penerimaan.
                Keputusan serta catatan disposisi dimasukkan oleh Admin berdasarkan arahan pimpinan.
                Halaman ini tidak menyediakan akses untuk mengubah data operasional.
            </div>

            <p class="footer-note">
                Sistem Informasi Manajemen Magang &mdash; Dinas Pendidikan Provinsi Jawa Timur
            </p>

        </main>
    </div>
</div>

<script>
    // Simulasi kuota: murni perhitungan di browser, tidak mengubah data apa pun.
    (function () {
        var box = document.getElementById('simulasi-kuota');
        if (!box) return;

        var rata    = parseFloat(box.dataset.rata)    || 0;
        var lama    = parseFloat(box.dataset.lama)    || 6;
        var tingkat = parseFloat(box.dataset.tingkat) || 0;
        var kuota   = parseFloat(box.dataset.kuota)   || 0;

        var growth    = document.getElementById('sim-growth');
        var elMasuk   = document.getElementById('sim-masuk');
        var elTerima  = document.getElementById('sim-diterima');
        var elTeks    = document.getElementById('sim-kapasitas-teks');
        var elBar     = document.getElementById('sim-kapasitas-bar');
        var elCatatan = document.getElementById('sim-catatan');

        function hitung() {
            var g = parseFloat(growth.value);
            if (isNaN(g)) g = 0;

            var masuk  = Math.round(rata * lama * (1 + g / 100));
            var terima = Math.round(masuk * tingkat);
            var persen = kuota > 0 ? Math.round((terima / kuota) * 100) : 0;
            var lewat  = kuota > 0 && terima > kuota;

            elMasuk.textContent  = masuk;
            elTerima.textContent = terima;
            elTeks.textContent   = terima + ' dari ' + kuota + ' (' + persen + '%)';
            elBar.style.width    = Math.min(100, persen) + '%';
            elBar.classList.toggle('over', lewat);
            elCatatan.classList.toggle('over', lewat);

            if (kuota <= 0) {
                elCatatan.textContent = 'Data kuota belum tersedia, kapasitas tidak dapat dihitung.';
            } else if (lewat) {
                elCatatan.textContent = 'Perkiraan diterima melebihi kuota sebanyak ' + (terima - kuota) +
                    ' tempat. Pertimbangkan penambahan kuota pada periode berikutnya.';
            } else {
                elCatatan.textContent = 'Kuota masih mencukupi, tersisa ' + (kuota - terima) +
                    ' tempat pada periode berikutnya.';
            }
        }

        growth.addEventListener('input', hitung);
        hitung();
    })();
</script>
</body>
</html>