<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peserta Magang - Dispendik Jatim</title>
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
            --blue-hover: #09327f;
            --text: #20212b;
            --muted: #606477;
            --border: #d9dce8;
            --bg: #f7f6ff;
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

        /* ================= SIDEBAR (sama dengan dashboard) ================= */
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

        .brand-tag {
            display: inline-block;
            margin-bottom: 4px;
            padding: 1px 7px;
            border-radius: 99px;
            background: rgba(255, 255, 255, 0.25);
            font-size: 7px;
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        .brand-title {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-sub {
            margin-top: 3px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 8px;
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
            color: #0a56d6;
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

                :root {
            --blue2: #0a56d6;
        }

        /* Logo sidebar (logo.png) */
        .brand-logo {
            width: 40px;
            height: 56px;
            flex-shrink: 0;
            object-fit: contain;
        }

        /* ================= TOPBAR (desain baru) ================= */
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
            color: var(--text);
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
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--blue2);
            color: #fff;
        }

        .avatar svg {
            width: 15px;
            height: 15px;
        }

        /* ================= KONTEN ================= */
        .content {
            flex: 1;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 24px 28px 36px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .card,
        .panel {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(25, 35, 70, 0.08);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border: 0;
            border-radius: 7px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .btn svg {
            width: 14px;
            height: 14px;
        }

        .btn-primary {
            background: var(--blue2);
            color: #fff;
        }

        .btn-primary:hover {
            background: #0847b5;
        }

        .btn-white {
            background: #fff;
            color: var(--blue2);
        }

        .btn-glass {
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.14);
            color: #fff;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 3px 10px;
            border-radius: 99px;
            background: #e4eafb;
            color: var(--blue2);
            font-size: 9px;
            font-weight: 600;
        }

        .badge svg {
            width: 11px;
            height: 11px;
        }

        /* ================= BANNER SAMBUTAN ================= */
        .banner {
            position: relative;
            overflow: hidden;
            padding: 20px 24px 26px;
            border-radius: 14px;
            background: linear-gradient(135deg, #0a56d6 0%, #0a5be0 60%, #0b4fc9 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(10, 86, 214, 0.25);
        }

        .banner::before {
            content: "";
            position: absolute;
            top: -80px;
            right: -50px;
            width: 270px;
            height: 270px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .banner::after {
            content: "";
            position: absolute;
            bottom: -70px;
            right: 170px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .banner > * {
            position: relative;
            z-index: 1;
        }

        .banner-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 3px 10px;
            border-radius: 99px;
            background: rgba(255, 255, 255, 0.2);
            font-size: 9px;
            font-weight: 600;
        }

        .banner-badge .dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #fff;
        }

        .banner h1 {
            margin: 8px 0 6px;
            font-size: 26px;
            font-weight: 800;
            line-height: 1.25;
            letter-spacing: -0.3px;
        }

        .banner p {
            max-width: 520px;
            margin: 0;
            color: rgba(255, 255, 255, 0.88);
            font-size: 12px;
            line-height: 1.6;
        }

        /* ================= BERANDA AWAL ================= */
        .home-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 270px;
            gap: 18px;
            align-items: start;
        }

        .start-card {
            padding: 24px 26px 26px;
        }

        .start-card h2 {
            margin: 14px 0 12px;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .start-card p {
            max-width: 330px;
            margin: 0 0 22px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .alur-card {
            padding: 20px 22px 22px;
        }

        .alur-title {
            margin: 0 0 16px;
            font-size: 14px;
            font-weight: 700;
        }

        .alur-list {
            display: flex;
            flex-direction: column;
            gap: 13px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .alur-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .alur-no {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #eaf0fd;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
        }

        .alur-item.first .alur-no {
            background: var(--blue2);
            color: #fff;
        }

        .alur-item strong {
            display: block;
            font-size: 11px;
            line-height: 1.35;
        }

        .alur-item div span {
            display: block;
            margin-top: 2px;
            color: var(--muted);
            font-size: 9px;
            line-height: 1.4;
        }

        /* ================= PANEL TAHAPAN ================= */
        .panel {
            padding: 24px;
        }

        .stage-head {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 26px;
        }

        .stage-icon,
        .icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 10px;
            background: #e4eafb;
            color: var(--blue2);
        }

        .stage-icon {
            width: 44px;
            height: 44px;
        }

        .stage-icon svg {
            width: 21px;
            height: 21px;
        }

        .stage-label {
            margin: 0 0 3px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.6px;
        }

        .stage-title {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin: 0;
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .stage-badge {
            padding: 3px 10px;
            border-radius: 99px;
            background: #e4eafb;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0;
        }

        .stepper-wrap {
            /* padding memberi ruang agar cincin cahaya lingkaran aktif tidak terpotong */
            margin: -10px -10px 24px;
            padding: 10px 10px 0;
            overflow-x: auto;
        }

        .stepper {
            position: relative;
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            min-width: 640px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .stepper::before,
        .stepper::after {
            content: "";
            position: absolute;
            top: 19px;
            left: 10%;
            height: 3px;
            border-radius: 99px;
        }

        .stepper::before {
            right: 10%;
            background: #e3e6f1;
        }

        .stepper::after {
            width: var(--fill, 0%);
            background: var(--blue);
        }

        .step {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 4px;
            text-align: center;
        }

        .step-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            min-width: 40px;
            min-height: 40px;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
            margin-bottom: 10px;
            border: 3px solid #fff;
            border-radius: 50%;
            background: #eceef6;
            color: #9a9db0;
        }

        .step-circle svg {
            width: 18px;
            height: 18px;
        }

        .step.done .step-circle {
            background: var(--blue);
            color: #fff;
        }

        .step.current .step-circle {
            background: #5f8fe8;
            color: #fff;
            box-shadow: 0 0 0 4px rgba(95, 143, 232, 0.22);
        }

        .step.fail .step-circle {
            background: #dc2626;
            color: #fff;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.18);
        }

        .step-no {
            color: #9a9db0;
            font-size: 10px;
            font-weight: 600;
        }

        .step-name {
            margin: 2px 0;
            color: #8a8da0;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.3;
        }

        .step-sub {
            color: #b0b3c3;
            font-size: 10px;
        }

        .step.done .step-no,
        .step.current .step-no {
            color: var(--blue2);
            font-weight: 700;
        }

        .step.done .step-name,
        .step.current .step-name,
        .step.fail .step-name {
            color: var(--text);
            font-weight: 700;
        }

        .step.done .step-sub,
        .step.current .step-sub {
            color: #3a3f55;
        }

        .step.fail .step-no,
        .step.fail .step-sub {
            color: #dc2626;
            font-weight: 600;
        }

        /* ================= KARTU DALAM PANEL ================= */
        .sub-card {
            margin-top: 18px;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
        }

        .sub-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .sub-head-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .icon-box {
            width: 34px;
            height: 34px;
            border-radius: 8px;
        }

        .icon-box svg {
            width: 17px;
            height: 17px;
        }

        .sub-title {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .info-wrap {
            padding: 14px;
            border-radius: 10px;
            background: #f1f2fb;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 8px;
            background: #fff;
        }

        .info-row + .info-row {
            margin-top: 10px;
        }

        .info-label {
            margin: 0 0 3px;
            color: #3a3f55;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        .info-value {
            margin: 0;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.4;
        }

        .info-sub {
            margin: 3px 0 0;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
        }

        .flash-success {
            position: fixed;
            top: 85px;
            right: 25px;
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 10px;
            max-width: 380px;
            padding: 14px 18px;
            border: 1px solid #a7e3c0;
            border-radius: 10px;
            background: #e9f9ef;
            color: #166534;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
            font-size: 12px;
            animation: toast-in 0.3s ease;
        }

        @keyframes toast-in {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .notice {
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #f8f9fe;
            color: #45495d;
            font-size: 11px;
            line-height: 1.7;
        }

        .flash {
            padding: 12px 14px;
            border: 1px solid #a7e3c0;
            border-radius: 10px;
            background: #e9f9ef;
            color: #15803d;
            font-size: 12px;
        }

        /* ================= DITERIMA ================= */
        .hero-pass {
            padding: 24px;
            border-radius: 14px;
            background: linear-gradient(135deg, #0847b5 0%, #0a5be0 55%, #0b4fc9 100%);
            color: #fff;
            box-shadow: 0 4px 14px rgba(10, 86, 214, 0.25);
        }

        .hero-top {
            display: flex;
            gap: 16px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
        }

        .hero-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            border-radius: 11px;
            background: rgba(255, 255, 255, 0.18);
        }

        .hero-icon svg {
            width: 22px;
            height: 22px;
        }

        .hero-pill {
            display: inline-block;
            padding: 4px 10px;
            border: 1px solid rgba(255, 255, 255, 0.28);
            border-radius: 99px;
            background: rgba(255, 255, 255, 0.14);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .hero-pass h2 {
            margin: 10px 0;
            font-size: 22px;
            line-height: 1.3;
        }

        .hero-pass p {
            max-width: 600px;
            margin: 0;
            color: rgba(255, 255, 255, 0.85);
            font-size: 11px;
            line-height: 1.7;
        }

        .tiles {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin: 20px 0;
        }

        .tile {
            padding: 14px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
        }

        .tile small {
            display: block;
            margin-bottom: 4px;
            color: rgba(255, 255, 255, 0.75);
            font-size: 9px;
        }

        .tile strong {
            font-size: 11px;
            line-height: 1.4;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .hero-actions .btn {
            padding: 10px 16px;
            font-size: 11px;
        }

        /* ================= DITOLAK ================= */
        .fail-head {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
        }

        .fail-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border: 1px solid #f2b8b5;
            border-radius: 10px;
            background: #fdecec;
            color: #dc2626;
        }

        .fail-icon svg {
            width: 20px;
            height: 20px;
        }

        .fail-head h2 {
            margin: 0 0 3px;
            font-size: 20px;
        }

        .fail-head p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
        }

        .fail-text {
            margin: 0 0 18px;
            color: #3a3f55;
            font-size: 11px;
            line-height: 1.7;
        }

        .tip {
            padding: 14px 16px;
            border: 1px solid #e3e6f1;
            border-radius: 10px;
            background: #f1f2fb;
        }

        .tip strong {
            display: block;
            margin-bottom: 3px;
            font-size: 11px;
        }

        .tip p {
            margin: 0;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
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

            .home-grid {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 18px 14px 20px;
            }

            .tiles {
                grid-template-columns: 1fr;
            }

            .sub-head {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 520px) {
            .topbar-title {
                font-size: 13px;
            }

            .banner h1 {
                font-size: 20px;
            }

            .stage-title {
                font-size: 17px;
            }

            .hero-top {
                flex-direction: column;
            }

            .hero-pass h2 {
                font-size: 19px;
            }
        }

    </style>
</head>
<body>
@php
    $peserta = auth('peserta')->user();
    $namaPeserta = $peserta?->nama ?? 'Peserta';

    // Variabel ini akan disediakan controller setelah relasi/model pengajuan disambungkan.
    $pengajuan = $pengajuan ?? null;
    $status = $pengajuan?->status_pengajuan;
    $tujuan = $pengajuan?->tujuan_magang;
    $jadwalWawancara = $jadwalWawancara ?? null; // satu jadwal aktif/terbaru yang dipilih controller
    $wawancaraTerkonfirmasi = $jadwalWawancara?->status_kehadiran === 'Terkonfirmasi';
    $hasilSeleksi = $hasilSeleksi ?? null;
    $suratPenerimaan = $suratPenerimaan ?? null;
    $laporanAkhir = $laporanAkhir ?? null;
    $sertifikat = $sertifikat ?? null;
    $jenjang = $peserta?->jenjang_pendidikan;
    $labelJenjang = $jenjang === 'SMK' ? 'Siswa SMK Terdaftar' : ($jenjang === 'MAHASISWA' ? 'Mahasiswa Terdaftar' : 'Peserta Magang');

    /* Link aman: jika nama route belum ada, jatuh ke alamat cadangan (tidak error) */
    $rute = fn (string $nama, string $cadangan = '#') =>
        \Illuminate\Support\Facades\Route::has($nama) ? route($nama) : $cadangan;

    $urlBeranda = $rute('peserta.dashboard', url('/dashboard/pendaftar'));
    $urlTujuan  = $rute('peserta.pengajuan.create', url('/pengajuan'));
    $urlDokumen = $rute('peserta.dokumen.index', '#');
    $urlLogout  = $rute('logout', '#');

    $icons = [
        'home' => '<path d="m3 10 9-7 9 7"></path><path d="M5 9v12h14V9"></path><path d="M9 21v-7h6v7"></path>',
        'doc' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5M9 13h6M9 17h6"></path>',
        'badge' => '<circle cx="12" cy="9" r="5"></circle><path d="m8.5 13.5-1.5 7.5 5-3 5 3-1.5-7.5"></path>',
        'user' => '<circle cx="12" cy="8" r="3.5"></circle><path d="M5 20v-1.5a7 7 0 0 1 14 0V20z"></path>',
        'help' => '<circle cx="12" cy="12" r="9"></circle><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 1-1 1.7"></path><circle cx="12" cy="17" r=".5"></circle>',
        'logout' => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="m16 17 5-5-5-5M21 12H9"></path>',
        'checklist' => '<rect x="4" y="3" width="16" height="18" rx="2"></rect><path d="m8 9 1.5 1.5L12 8M14 9.5h3M8 15l1.5 1.5L12 14M14 15.5h3"></path>',
        'check' => '<path d="m5 12 5 5 9-10"></path>',
        'upload' => '<path d="M12 17V7M8 11l4-4 4 4"></path><path d="M5 19h14"></path>',
        'shield' => '<path d="M12 3 5 6v5c0 4.5 3 8 7 10 4-2 7-5.5 7-10V6z"></path>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M3 10h18M8 3v4M16 3v4"></path>',
        'building' => '<rect x="5" y="3" width="14" height="18" rx="1.5"></rect><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2"></path>',
        'award' => '<circle cx="12" cy="9" r="5.5"></circle><path d="m8.5 14-1.5 7 5-3 5 3-1.5-7"></path>',
        'x' => '<circle cx="12" cy="12" r="9"></circle><path d="m9 9 6 6M15 9l-6 6"></path>',
        'arrow' => '<path d="M5 12h14M13 6l6 6-6 6"></path>',
        'bell' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>',
        'rocket' => '<path d="M4.5 16.5c-1.5 1.3-2 5-2 5s3.7-.5 5-2c.7-.8.7-2.1-.1-2.9a2.2 2.2 0 0 0-2.9-.1z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.9A12.9 12.9 0 0 1 22 2c0 2.7-.8 7.5-6 11a22.4 22.4 0 0 1-4 2z"></path><path d="M9 12H4s.6-3 2-4c1.6-1.1 5 0 5 0"></path><path d="M12 15v5s3-.6 4-2c1.1-1.6 0-5 0-5"></path>',
        'download' => '<path d="M12 4v12M7 11l5 5 5-5M4 20h16"></path>',
        'pin' => '<path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"></path><circle cx="12" cy="10" r="2.5"></circle>',
    ];
    $svg = fn ($name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($icons[$name] ?? '').'</svg>';

    /*
     * Status "sudah dikirim": diutamakan dari controller ($sudahDikirim).
     * Jika controller tidak mengirimnya, dicoba dari kolom pengajuan (dikirim_at / sudah_dikirim).
     * Dashboard dan halaman Dokumen Magang HARUS memakai aturan yang sama.
     */
    $sudahDikirim = (bool) (
        $sudahDikirim
        ?? data_get($pengajuan, 'dikirim_at')
        ?? data_get($pengajuan, 'sudah_dikirim')
        ?? false
    );

    $steps = [
        ['name' => 'Isi Data Diri & Tujuan', 'icon' => 'doc',
         'sub' => ['done' => 'Terverifikasi Sistem', 'current' => 'Sedang Berlangsung', 'pending' => 'Pilih Tujuan Magang']],
        ['name' => 'Unggah Dokumen', 'icon' => 'doc',
         'sub' => ['done' => 'Berkas Lengkap', 'current' => 'Sedang Berlangsung', 'pending' => 'Unggah 4 Dokumen']],
        ['name' => 'Verifikasi Berkas', 'icon' => 'shield',
         'sub' => ['done' => 'Lolos Seleksi Berkas', 'current' => 'Sedang Berlangsung', 'pending' => 'Menunggu Seleksi Dokumen']],
        ['name' => 'Wawancara', 'icon' => 'user',
         'sub' => ['done' => 'Wawancara Selesai', 'current' => 'Sedang Berlangsung', 'pending' => 'Jadwal Ditentukan']],
        ['name' => 'Pengumuman Kelulusan', 'icon' => 'badge',
         'sub' => ['done' => 'Sudah Diumumkan', 'current' => 'Sedang Berlangsung', 'pending' => 'Surat Keputusan Resmi']],
    ];

    // -1 = belum ada pengajuan sama sekali
    $stepIndex = match ($status) {
        'Diajukan' => 0,
        'Terverifikasi' => 1,
        'Wawancara' => 2,
        'Diterima', 'Ditolak' => 3,
        default => -1,
    };

    $judulTahap = match ($status) {
        'Diajukan' => $sudahDikirim ? 'Sedang Menunggu Seleksi Dokumen' : 'Lengkapi Dokumen',
        'Terverifikasi' => 'Berkas Telah Terverifikasi',
        'Wawancara' => 'Tahap Wawancara',
        'Diterima' => 'Anda Dinyatakan Diterima',
        'Ditolak' => 'Hasil Seleksi Telah Keluar',
        default => 'Status Pendaftaran',
    };

    $nomorTahap = match ($status) {
        'Diajukan' => $sudahDikirim ? 3 : 2,
        'Terverifikasi' => 3,
        'Wawancara' => 4,
        'Diterima', 'Ditolak' => 5,
        default => 1,
    };

    // Indeks langkah yang sedang aktif (mulai dari 0)
    $tahapAktif = $nomorTahap - 1;

    // Indeks langkah yang sedang aktif (mulai dari 0)
    $tahapAktif = $nomorTahap - 1;

    // Garis biru mengikuti posisi langkah aktif
    $fill = ($tahapAktif / 4) * 80;

    $namaTujuan = is_string($tujuan) ? $tujuan : (data_get($tujuan, 'nama') ?? data_get($tujuan, 'nama_unit') ?? '-');
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
                <span class="brand-tag">DINDIK JATIM</span>
                <div class="brand-title">Student Portal</div>
                <div class="brand-sub">Dinas Pendidikan<br>Provinsi Jawa Timur</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">
            <a href="{{ $urlBeranda }}" class="nav-link active" aria-current="page">{!! $svg('home') !!} Beranda</a>
            <a href="{{ $urlDokumen }}" class="nav-link">{!! $svg('doc') !!} Dokumen Magang</a>
            <a href="{{ route('peserta.surat-keterangan') }}" class="nav-link"> {!! $svg('badge') !!} Surat Keterangan </a>
            <a href="{{ route('peserta.profil') }}" class="nav-link">{!! $svg('user') !!}Profil
            </a>
        </nav>

        <div class="nav-bottom">
            <a href="#" class="nav-link">{!! $svg('help') !!} Bantuan</a>
            <form action="{{ $urlLogout }}" method="POST">
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
                        <div class="user-name">Hai, {{ $namaPeserta }}</div>
                        <div class="user-role">Selamat datang kembali</div>
                    </div>
                    <div class="avatar" title="{{ $labelJenjang }}">{!! $svg('user') !!}</div>
                </div>
            </div>
        </header>

        <main class="content">

            @if (session('success'))
                <div class="flash flash-success" id="success-toast">
                    <span>&#10003;</span>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('status'))
                <div class="flash">{{ session('status') }}</div>
            @endif

            {{-- Banner sambutan (selalu tampil) --}}
            <section class="banner">
                <span class="banner-badge"><span class="dot"></span> Periode Pendaftaran Aktif Semester Ganjil</span>
                <h1>Selamat Datang, {{ $namaPeserta }}!</h1>
                <p>
                    Pantau status pendaftaran dan informasi seleksi di lingkungan<br>
                    Dinas Pendidikan Provinsi Jawa Timur secara transparan dan terpadu.
                </p>
            </section>

            {{-- ========== BELUM ADA PENGAJUAN ========== --}}
            @if ($stepIndex < 0)
                <div class="home-grid">
                    <section class="card start-card">
                        <span class="badge">{!! $svg('rocket') !!} Langkah Awal</span>
                        <h2>Mulai Pendaftaran Magang Anda Hari Ini</h2>
                        <p>
                            Telusuri berbagai program magang yang tersedia di instansi
                            pemerintahan Jawa Timur dan temukan yang sesuai dengan
                            jurusan Anda.
                        </p>
                        <a href="{{ $urlTujuan }}" class="btn btn-primary">
                            Cari Program {!! $svg('arrow') !!}
                        </a>
                    </section>

                    <aside class="card alur-card">
                        <h3 class="alur-title">Alur Pendaftaran</h3>
                        <ol class="alur-list">
                            <li class="alur-item first">
                                <span class="alur-no">1</span>
                                <div>
                                    <strong>Pilih tujuan magang</strong>
                                    <span>Dinas Pusat atau UPT TIKP</span>
                                </div>
                            </li>
                            <li class="alur-item">
                                <span class="alur-no">2</span>
                                <div>
                                    <strong>Lengkapi data dan unggah dokumen</strong>
                                    <span>CV, surat pengantar, proposal, transkrip</span>
                                </div>
                            </li>
                            <li class="alur-item">
                                <span class="alur-no">3</span>
                                <div>
                                    <strong>Verifikasi berkas</strong>
                                    <span>Diperiksa oleh Admin Pusat</span>
                                </div>
                            </li>
                            <li class="alur-item">
                                <span class="alur-no">4</span>
                                <div>
                                    <strong>Wawancara dan pengumuman</strong>
                                    <span>Kabar hasil dikirim lewat email</span>
                                </div>
                            </li>
                        </ol>
                    </aside>
                </div>

            {{-- ========== SUDAH ADA PENGAJUAN ========== --}}
            @else
                <section class="panel">
                    <div class="stage-head">
                        <div class="stage-icon">{!! $svg('checklist') !!}</div>
                        <div>
                            <p class="stage-label">TAHAPAN BERJALAN</p>
                            <h2 class="stage-title">
                                {{ $judulTahap }}
                                <span class="stage-badge">Tahap {{ $nomorTahap }} dari 5</span>
                            </h2>
                        </div>
                    </div>

                    <div class="stepper-wrap">
                        <ol class="stepper" style="--fill: {{ $fill }}%;">
                            @foreach ($steps as $i => $step)
                                @php  
                                    $kelas = $i < $tahapAktif
                                        ? 'done'
                                        : ($i === $tahapAktif
                                            ? ($status === 'Ditolak' ? 'fail' : 'current')
                                            : '');

                                    // Tahap wawancara menjadi selesai setelah peserta konfirmasi kehadiran.
                                    if (
                                        $status === 'Wawancara'
                                        && $wawancaraTerkonfirmasi
                                        && $i === 3
                                    ) {
                                        $kelas = 'done';
                                    }

                                    // Setelah diterima, seluruh langkah selesai.
                                    if ($status === 'Diterima') {
                                        $kelas = 'done';
                                    }

                                    $ikon = $kelas === 'done'
                                        ? 'check'
                                        : ($kelas === 'fail' ? 'x' : $step['icon']);

                                    $subTeks = match ($kelas) {
                                        'done' => $step['sub']['done'],
                                        'current' => $step['sub']['current'],
                                        'fail' => 'Tidak Lolos',
                                        default => $step['sub']['pending'],
                                    };
                                @endphp

                                <li class="step {{ $kelas }}">
                                    <div class="step-circle">{!! $svg($ikon) !!}</div>
                                    <span class="step-no">Langkah {{ $i + 1 }}</span>
                                    <span class="step-name">{{ $step['name'] }}</span>
                                    <span class="step-sub">{{ $subTeks }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>

                    {{-- Diajukan --}}
                    @if ($status === 'Diajukan')
                        <div class="notice">
                            @if ($sudahDikirim)
                                Pengajuan magang Anda{{ $namaTujuan !== '-' ? ' ke ' . $namaTujuan : '' }}
                                sudah berhasil dikirim dan sedang menunggu pemeriksaan berkas oleh Admin UPT TIKP.
                                Pantau halaman ini untuk melihat perkembangannya.
                            @else
                                Anda sudah mengisi formulir pengajuan magang{{ $namaTujuan !== '-' ? ' dengan tujuan ' . $namaTujuan : '' }}.
                                Silakan lengkapi empat dokumen persyaratan dan kirim pengajuan agar dapat diproses oleh admin.
                                @if (Route::has('peserta.dokumen.index'))
                                    <br><a href="{{ route('peserta.dokumen.index') }}" style="color:#0a56d6;font-weight:600;">Lanjut unggah dokumen &rarr;</a>
                                @endif
                            @endif
                        </div>
                    @endif

                    {{-- Terverifikasi --}}
                    @if ($status === 'Terverifikasi')
                        <div class="notice">
                            Berkas Anda sudah dinyatakan lengkap dan terverifikasi. Mohon menunggu informasi
                            penjadwalan wawancara atau keputusan seleksi selanjutnya.
                        </div>
                    @endif
                                        
                    {{-- Wawancara --}}
                    @if ($status === 'Wawancara')
                        @if ($jadwalWawancara)
                            <div class="sub-card">
                                <div class="sub-head">
                                    <div class="sub-head-left">
                                        <div class="icon-box">{!! $svg('calendar') !!}</div>
                                        <h3 class="sub-title">Jadwal Wawancara Offline (Tatap Muka)</h3>
                                    </div>

                                    <span class="badge">
                                        {{ $wawancaraTerkonfirmasi ? 'Sudah Dikonfirmasi' : 'Undangan Wawancara Resmi' }}
                                    </span>
                                </div>

                                <div class="info-wrap">
                                    <div class="info-row">
                                        <div class="icon-box">{!! $svg('calendar') !!}</div>
                                        <div>
                                            <p class="info-label">Hari, Tanggal & Waktu</p>
                                            <p class="info-value">
                                                {{ \Carbon\Carbon::parse($jadwalWawancara->tanggal)->translatedFormat('l, d F Y') }}
                                                • {{ substr($jadwalWawancara->waktu, 0, 5) }} WIB
                                            </p>
                                            <p class="info-sub">Mohon hadir tepat waktu.</p>
                                        </div>
                                    </div>

                                    <div class="info-row">
                                        <div class="icon-box">{!! $svg('pin') !!}</div>
                                        <div>
                                            <p class="info-label">Lokasi Wawancara</p>
                                            <p class="info-value">
                                                Kantor UPT TIKP Dinas Pendidikan Provinsi Jawa Timur
                                            </p>
                                            <p class="info-sub">
                                                Jl. Jagir Wonokromo No. 350, Surabaya
                                            </p>
                                        </div>
                                    </div>

                                    @if ($jadwalWawancara->catatan_instruksi)
                                        <div class="info-row">
                                            <div class="icon-box">{!! $svg('doc') !!}</div>
                                            <div>
                                                <p class="info-label">Catatan / Instruksi</p>
                                                <p class="info-value">
                                                    {{ $jadwalWawancara->catatan_instruksi }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @if ($wawancaraTerkonfirmasi)
                                    <div class="flash" style="margin-top:14px;">
                                        ✓ Kehadiran wawancara Anda sudah dikonfirmasi.
                                    </div>
                                @else
                                    <form
                                        action="{{ route('peserta.wawancara.konfirmasi', $pengajuan->id_pengajuan) }}"
                                        method="POST"
                                        style="margin-top:14px;"
                                        onsubmit="return confirm('Apakah Anda yakin ingin mengonfirmasi kehadiran wawancara?')"
                                    >
                                        @csrf

                                        <button type="submit" class="btn btn-primary">
                                            {!! $svg('check') !!}
                                            Konfirmasi Kehadiran Wawancara
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @else
                            <div class="notice">
                                Anda masuk tahap wawancara. Jadwal wawancara belum tersedia.
                                Silakan pantau halaman ini secara berkala.
                            </div>
                        @endif
                    @endif

                    {{-- Diterima --}}
                    @if ($status === 'Diterima')
                        <div class="hero-pass">
                            <div class="hero-top">
                                <div class="hero-icon">{!! $svg('award') !!}</div>
                                <div>
                                    <span class="hero-pill">PENGUMUMAN KELULUSAN SELEKSI</span>
                                    <h2>Selamat! Anda Dinyatakan Lolos Seleksi Magang</h2>
                                    <p>
                                        Anda resmi diterima sebagai peserta program Praktik Kerja / Magang
                                        di lingkungan Dinas Pendidikan Provinsi Jawa Timur.
                                    </p>
                                </div>
                            </div>

                            <div class="tiles">
                                <div class="tile">
                                    <small>Unit Penempatan</small>
                                    <strong>{{ $namaTujuan }}</strong>
                                </div>
                                <div class="tile">
                                    <small>Periode Magang</small>
                                    <strong>{{ data_get($hasilSeleksi, 'periode', '-') }}</strong>
                                </div>
                                <div class="tile">
                                    <small>Catatan</small>
                                    <strong>{{ data_get($hasilSeleksi, 'catatan', '-') }}</strong>
                                </div>
                            </div>

                            <div class="hero-actions">
                                @if ($urlSurat = data_get($suratPenerimaan, 'url'))
                                    <a href="{{ $urlSurat }}" class="btn btn-white">{!! $svg('download') !!} Unduh Surat Penerimaan</a>
                                @endif
                                @if ($urlLaporan = data_get($laporanAkhir, 'url'))
                                    <a href="{{ $urlLaporan }}" class="btn btn-glass">{!! $svg('download') !!} Laporan Akhir</a>
                                @endif
                                @if ($urlSertifikat = data_get($sertifikat, 'url'))
                                    <a href="{{ $urlSertifikat }}" class="btn btn-glass">{!! $svg('download') !!} Sertifikat</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- Ditolak --}}
                    @if ($status === 'Ditolak')
                        <div class="sub-card" style="margin-top:0;">
                            <div class="fail-head">
                                <div class="fail-icon">{!! $svg('x') !!}</div>
                                <div>
                                    <h2>Mohon Maaf, Anda Belum Berhasil Lolos Seleksi Magang</h2>
                                    @if ($namaTujuan !== '-')
                                        <p>Tujuan: {{ $namaTujuan }}</p>
                                    @endif
                                </div>
                            </div>

                            <p class="fail-text">
                                Terima kasih atas partisipasi Anda dalam proses seleksi. Berdasarkan hasil evaluasi,
                                pengajuan Anda belum dapat kami terima pada periode ini.
                                @if (data_get($hasilSeleksi, 'catatan'))
                                    <br><strong>Catatan:</strong> {{ data_get($hasilSeleksi, 'catatan') }}
                                @endif
                            </p>

                            <div class="tip">
                                <strong>Peluang &amp; Rekomendasi Selanjutnya</strong>
                                <p>
                                    Keputusan ini tidak membatasi kesempatan Anda untuk mendaftar kembali pada
                                    periode berikutnya. Anda dapat memperbarui berkas dan mengajukan kembali saat
                                    pendaftaran dibuka.
                                </p>
                            </div>
                        </div>
                    @endif
                </section>
            @endif

        </main>
    </div>
</div>
<script>
    // Notifikasi sukses hilang otomatis setelah 4 detik
    (function () {
        var toast = document.getElementById('success-toast');
        if (!toast) return;

        setTimeout(function () {
            toast.style.transition = 'opacity 0.4s ease';
            toast.style.opacity = '0';
            setTimeout(function () { toast.remove(); }, 400);
        }, 4000);
    })();
</script>
</body>
</html>