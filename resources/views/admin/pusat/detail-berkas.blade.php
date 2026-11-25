<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berkas | Admin Pusat</title>

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

        /* ================= SIDEBAR (sama dengan Verifikasi Berkas) ================= */
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

        /* ================= MAIN & TOPBAR (sama dengan Verifikasi Berkas) ================= */
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

        /* PAGE HEADING */
        .page-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
            margin-bottom: 9px;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .5px;
        }

        .breadcrumb .sep {
            color: #cbd5e1;
        }

        .application-id {
            padding: 4px 9px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: #f8fafc;
            color: #64748b;
            font-weight: 500;
            letter-spacing: .2px;
        }

        .page-title {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: #334155;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 1px 3px rgba(25,35,70,.05);
        }

        .btn-back svg {
            width: 14px;
            height: 14px;
        }

        .btn-back:hover {
            border-color: var(--blue2);
            background: #f3f7ff;
        }

        /* GRID */
        .detail-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.4fr) minmax(300px, 1fr);
            gap: 22px;
            align-items: start;
        }

        .left-column,
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
            min-width: 0;
        }

        .card {
            min-width: 0;
            padding: 20px 22px 22px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 11px;
            padding-bottom: 14px;
            margin-bottom: 16px;
            border-bottom: 1px solid #edf0f5;
        }

        .card-heading > svg {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
            color: var(--blue2);
        }

        .card-heading h3 {
            margin: 0;
            font-size: 13px;
            font-weight: 700;
        }

        .card-heading p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
        }

        /* PARTICIPANT */
        .participant-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            padding-bottom: 18px;
            border-bottom: 1px solid #edf0f5;
        }

        .participant-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .participant-avatar {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #e8eef9;
            color: var(--blue2);
            font-size: 15px;
            font-weight: 700;
        }

        .participant-avatar i {
            position: absolute;
            right: 0;
            bottom: 1px;
            width: 11px;
            height: 11px;
            border: 2px solid white;
            border-radius: 50%;
            background: #94a3b8;
        }

        .participant-avatar i.dot-pending { background: #f5b400; }
        .participant-avatar i.dot-verified { background: var(--blue2); }
        .participant-avatar i.dot-rejected { background: #16a34a; }

        .participant-name {
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: 800;
        }

        .participant-program {
            color: var(--blue2);
            font-size: 11px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 13px;
            border-radius: 99px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pill .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            opacity: .7;
        }

        /* Warna status disamakan dengan halaman Verifikasi Berkas */
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

        .participant-data {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 24px;
            padding-top: 18px;
        }

        .data-label {
            margin-bottom: 6px;
            color: var(--soft);
            font-size: 10px;
        }

        .data-value {
            font-size: 11px;
            font-weight: 600;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .data-value.large {
            font-size: 13px;
            font-weight: 700;
        }

        .placement-value {
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .placement-value i {
            flex-shrink: 0;
            width: 6px;
            height: 6px;
            margin-top: 6px;
            border-radius: 50%;
            background: var(--blue2);
        }

        /* DOKUMEN */
        .document-count {
            margin-left: auto;
            padding: 7px 11px;
            border-radius: 7px;
            background: #eaf1ff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            line-height: 1.4;
        }

        .document-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .document-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 15px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fbfcfe;
            box-shadow: 0 1px 3px rgba(25,35,70,.04);
        }

        .document-info {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .file-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border: 1px solid #fee2e2;
            border-radius: 8px;
            background: #fff1f1;
            color: #dc2626;
            font-size: 9px;
            font-weight: 700;
        }

        .file-icon.empty {
            border-color: var(--border);
            background: #f1f3f5;
            color: #94a3b8;
        }

        .document-name {
            margin-bottom: 4px;
            font-size: 11px;
            font-weight: 700;
        }

        .document-meta {
            color: #94a3b8;
            font-size: 10px;
        }

        .btn-document {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: #334155;
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-document svg {
            width: 13px;
            height: 13px;
        }

        .btn-document:hover {
            border-color: var(--blue2);
            background: #f3f7ff;
        }

        .document-missing {
            color: var(--red);
            font-size: 10px;
            font-weight: 600;
        }

        /* CHECKLIST */
        .destination-box {
            padding: 11px 13px;
            margin-bottom: 14px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: #f8fafc;
            font-size: 11px;
        }

        .destination-box i {
            display: inline-block;
            width: 6px;
            height: 6px;
            margin-right: 8px;
            border-radius: 50%;
            background: var(--blue2);
        }

        .checklist {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .check-item {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            padding: 12px 13px;
            border: 1px solid #edf0f5;
            border-radius: 11px;
            box-shadow: 0 1px 3px rgba(25,35,70,.04);
        }

        .check-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 18px;
            height: 18px;
            margin-top: 1px;
            border-radius: 5px;
            background: var(--blue2);
            color: white;
        }

        .check-icon svg {
            width: 12px;
            height: 12px;
            stroke-width: 2.6;
        }

        .check-icon.missing {
            background: #fee2e2;
            color: #dc2626;
            font-size: 11px;
            font-weight: 800;
        }

        .check-title {
            font-size: 10px;
            font-weight: 700;
            line-height: 1.5;
        }

        .check-description {
            margin-top: 3px;
            color: #64748b;
            font-size: 10px;
            line-height: 1.5;
        }

        .check-description.warning {
            color: var(--red);
        }

        /* STATUS VERIFIKASI */
        .status-information {
            padding: 13px;
            margin-bottom: 12px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #f8fafc;
        }

        .status-information .data-label {
            margin-bottom: 8px;
        }

        .verification-note {
            padding: 13px;
            border: 1px solid #f5e5bd;
            border-radius: 10px;
            background: #fffaf0;
            color: #854d0e;
            font-size: 11px;
            line-height: 1.6;
        }

        .verification-note strong {
            display: block;
            margin-bottom: 5px;
        }

        .no-note {
            color: #94a3b8;
            font-style: italic;
        }

        /* ================= FORM TINDAKAN VERIFIKASI ================= */
        .verification-form {
            margin-top: 16px;
            padding: 15px;
            border: 1px solid #e9edf2;
            border-radius: 12px;
            background: #fff;
        }

        .verification-form label {
            display: block;
            margin-bottom: 7px;
            color: #374456;
            font-size: 11px;
            font-weight: 700;
        }

        .verification-form textarea {
            width: 100%;
            min-height: 105px;
            padding: 11px 12px;
            resize: vertical;
            border: 1px solid #dfe5ed;
            border-radius: 9px;
            background: #f9fafb;
            color: #344054;
            font: inherit;
            font-size: 11px;
            line-height: 1.6;
        }

        .verification-help {
            margin: 7px 0 13px;
            color: #8292aa;
            font-size: 10px;
            line-height: 1.5;
        }

        .verification-actions {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .verification-actions button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            min-height: 39px;
            padding: 9px 13px;
            border: 1px solid transparent;
            border-radius: 9px;
            color: #fff;
            font: inherit;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .verification-actions button svg {
            width: 18px;
            height: 18px;
            flex: 0 0 18px;
        }

        .btn-verify {
            background: var(--blue2);
            box-shadow: 0 2px 5px rgba(10,86,214,.17);
        }

        .btn-verify:hover {
            background: var(--blue);
        }

        .btn-reject {
            background: #dc2626;
        }

        .btn-reject:hover {
            background: #b91c1c;
        }

        .verification-locked {
            margin-top: 15px;
            padding: 12px 13px;
            border: 1px solid #e9edf2;
            border-radius: 10px;
            background: #f8fafc;
            color: #64748b;
            font-size: 10px;
            line-height: 1.6;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .detail-grid {
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
        }

        @media (max-width: 650px) {
            .user-info {
                display: none;
            }

            .page-title {
                font-size: 19px;
            }

            .participant-header {
                flex-direction: column;
            }

            .participant-data {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .document-item {
                align-items: flex-start;
                flex-direction: column;
            }

            .btn-document {
                align-self: flex-end;
            }

            .card {
                padding: 16px;
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
        'arrow-left' => '<path d="M19 12H5M12 19l-7-7 7-7"></path>',
        'eye' => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path><circle cx="12" cy="12" r="3"></circle>',
        'check' => '<path d="m5 12.5 4.5 4.5L19 7"></path>',
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

    $peserta = $pengajuan->peserta;

    $jenisDokumen = [
        'CV' => [
            'nama' => 'Curriculum Vitae (CV)',
            'deskripsi' => 'Riwayat pendidikan dan pengalaman peserta.',
            'cek' => 'Kelengkapan Curriculum Vitae (CV)',
            'kriteria' => 'Format standar & riwayat pendidikan valid.',
        ],
        'Surat Pengantar' => [
            'nama' => 'Surat Pengantar (Sekolah / Kampus)',
            'deskripsi' => 'Surat pengantar resmi dari institusi pendidikan.',
            'cek' => 'Format & Keabsahan Surat Pengantar',
            'kriteria' => 'Tanda tangan pimpinan sekolah/fakultas & stempel basah/resmi.',
        ],
        'Proposal' => [
            'nama' => 'Proposal Magang & Rencana Kegiatan',
            'deskripsi' => 'Rencana kegiatan selama pelaksanaan magang.',
            'cek' => 'Proposal Magang & Rencana Kegiatan',
            'kriteria' => 'Kesesuaian durasi 2-6 bulan & tujuan di UPT TIKP.',
        ],
        'Transkrip Nilai / Rapor' => [
            'nama' => 'Transkrip Nilai / Rapor',
            'deskripsi' => 'Dokumen nilai akademik peserta.',
            'cek' => 'Transkrip Nilai / Rapor',
            'kriteria' => 'Nama dan institusi sesuai data pendaftaran.',
        ],
    ];

    // Ambil unggahan terbaru untuk setiap jenis dokumen.
    $dokumenTersedia = $pengajuan->dokumen
        ->sortByDesc('id_dokumen')
        ->sortByDesc('tanggal_unggah')
        ->unique('jenis_dokumen')
        ->keyBy('jenis_dokumen');

    $jumlahDokumen = collect(array_keys($jenisDokumen))
        ->filter(fn ($jenis) => $dokumenTersedia->has($jenis))
        ->count();

    $statusClass = match ($pengajuan->status_pengajuan) {
        'Diajukan' => 'status-pending',
        'Terverifikasi' => 'status-verified',
        'Ditolak' => 'status-rejected',
        default => 'status-other',
    };

    $dotClass = match ($pengajuan->status_pengajuan) {
        'Diajukan' => 'dot-pending',
        'Terverifikasi' => 'dot-verified',
        'Ditolak' => 'dot-rejected',
        default => '',
    };

    $statusLabel = match ($pengajuan->status_pengajuan) {
        'Diajukan' => 'Menunggu Verifikasi',
        'Terverifikasi' => 'Lolos Verifikasi',
        'Ditolak' => 'Ditolak',
        default => $pengajuan->status_pengajuan,
    };

    $namaPeserta = $peserta->nama ?? 'Peserta Magang';

    $inisial = collect(preg_split('/\s+/', trim($namaPeserta)))
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

            @if (session('success'))
                <div role="alert" style="padding:12px 15px;border:1px solid #b9e5cc;border-radius:9px;background:#e7f7ed;color:#16834a;font-size:12px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div role="alert" style="padding:12px 15px;border:1px solid #fecaca;border-radius:9px;background:#fef2f2;color:#b91c1c;font-size:12px;">
                    <strong>Periksa kembali:</strong>
                    <ul style="margin:6px 0 0 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- JUDUL HALAMAN -->
            <section class="page-heading">

                <div>
                    <div class="breadcrumb">
                        <span>SEKRETARIAT JATIM</span>
                        <span class="sep">&bull;</span>
                        <span>MODUL VERIFIKASI</span>
                        <span class="application-id">ID: {{ $pengajuan->id_pengajuan }}</span>
                    </div>

                    <h1 class="page-title">Detail Berkas &amp; Kelayakan Dokumen</h1>
                </div>

                <a href="{{ route('admin-pusat.verifikasi-berkas') }}" class="btn-back">
                    {!! $svg('arrow-left') !!}
                    Kembali ke Daftar Berkas
                </a>

            </section>

            <!-- DUA KOLOM -->
            <div class="detail-grid">

                <!-- KOLOM KIRI -->
                <div class="left-column">

                    <!-- DATA PESERTA -->
                    <div class="card">

                        <div class="participant-header">

                            <div class="participant-profile">

                                <div class="participant-avatar">
                                    {{ $inisial ?: 'PM' }}
                                    <i class="{{ $dotClass }}"></i>
                                </div>

                                <div>
                                    <div class="participant-name">{{ $namaPeserta }}</div>
                                    <div class="participant-program">Pelamar Program Magang Mandiri</div>
                                </div>

                            </div>

                            <span class="status-pill {{ $statusClass }}">
                                <span class="dot"></span>
                                {{ $statusLabel }}
                            </span>

                        </div>

                        <div class="participant-data">

                            <div>
                                <div class="data-label">Institusi / Asal Sekolah / Kampus</div>
                                <div class="data-value large">{{ $peserta->nama_instansi ?? '-' }}</div>
                            </div>

                            <div>
                                <div class="data-label">Jenjang &amp; Jurusan</div>
                                <div class="data-value">
                                    {{ $peserta->jenjang_pendidikan ?? '-' }}
                                    {{ $peserta->jurusan ?? '' }}
                                </div>
                            </div>

                            <div>
                                <div class="data-label">Unit Tujuan Penempatan</div>
                                <div class="data-value placement-value">
                                    <i></i>
                                    <span>{{ $pengajuan->sub_unit_penempatan ?: $pengajuan->tujuan_magang }}</span>
                                </div>
                            </div>

                            <div>
                                <div class="data-label">Tanggal Submit Berkas</div>
                                <div class="data-value">
                                    {{ $pengajuan->tanggal_pengajuan
                                        ? \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d M Y, H:i') . ' WIB'
                                        : '-' }}
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- DOKUMEN PENDUKUNG -->
                    <div class="card">

                        <div class="card-heading">

                            <div>
                                <h3>Dokumen Pendukung</h3>
                                <p>
                                    Klik 'Buka Dokumen' untuk memverifikasi
                                    keabsahan berkas yang dilampirkan.
                                </p>
                            </div>

                            <div class="document-count">
                                {{ $jumlahDokumen }} dari 4 Berkas<br>Dilampirkan
                            </div>

                        </div>

                        <div class="document-list">

                            @foreach ($jenisDokumen as $jenis => $detail)

                                @php
                                    $dokumen = $dokumenTersedia->get($jenis);
                                    $ekstensi = $dokumen
                                        ? strtoupper(pathinfo($dokumen->file_path, PATHINFO_EXTENSION) ?: 'FILE')
                                        : null;
                                @endphp

                                <div class="document-item">

                                    <div class="document-info">

                                        <div class="file-icon {{ $dokumen ? '' : 'empty' }}">
                                            {{ $ekstensi ?? 'FILE' }}
                                        </div>

                                        <div>
                                            <div class="document-name">{{ $detail['nama'] }}</div>

                                            <div class="document-meta">
                                                @if ($dokumen)
                                                    {{ $ekstensi }}
                                                    @if ($dokumen->tanggal_unggah)
                                                        &bull; Diunggah
                                                        {{ \Carbon\Carbon::parse($dokumen->tanggal_unggah)->translatedFormat('d M Y') }}
                                                    @endif
                                                @else
                                                    {{ $detail['deskripsi'] }}
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    @if ($dokumen)
                                        <a
                                            href="{{ route('admin-pusat.verifikasi-berkas.dokumen', $dokumen->id_dokumen) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="btn-document"
                                        >
                                            {!! $svg('eye') !!}
                                            Buka Dokumen
                                        </a>
                                    @else
                                        <span class="document-missing">Belum diunggah</span>
                                    @endif

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

                <!-- KOLOM KANAN -->
                <div class="right-column">

                    <!-- CHECKLIST -->
                    <div class="card">

                        <div class="card-heading">

                            {!! $svg('check') !!}

                            <div>
                                <h3>Checklist Kelengkapan &amp; Validitas</h3>
                                <p>Kriteria verifikator Sekretariat Pusat</p>
                            </div>

                        </div>

                        <div class="destination-box">
                            <i></i>
                            <strong>Tujuan:</strong>
                            {{ $pengajuan->tujuan_magang }}
                        </div>

                        <div class="checklist">

                            @foreach ($jenisDokumen as $jenis => $detail)

                                @php
                                    $tersedia = $dokumenTersedia->has($jenis);
                                @endphp

                                <div class="check-item">

                                    <div class="check-icon {{ $tersedia ? '' : 'missing' }}">
                                        @if ($tersedia)
                                            {!! $svg('check') !!}
                                        @else
                                            !
                                        @endif
                                    </div>

                                    <div>
                                        <div class="check-title">{{ $detail['cek'] }}</div>

                                        <div class="check-description {{ $tersedia ? '' : 'warning' }}">
                                            {{ $tersedia
                                                ? $detail['kriteria']
                                                : 'Dokumen belum ditemukan pada pengajuan ini.' }}
                                        </div>
                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                    <!-- STATUS VERIFIKASI -->
                    <div class="card">

                        <div class="card-heading">
                            <div>
                                <h3>Status Verifikasi</h3>
                                <p>Informasi status pemeriksaan pengajuan</p>
                            </div>
                        </div>

                        <div class="status-information">
                            <div class="data-label">Status Pengajuan Saat Ini</div>

                            <span class="status-pill {{ $statusClass }}">
                                <span class="dot"></span>
                                {{ $statusLabel }}
                            </span>
                        </div>

                        <div class="status-information">
                            <div class="data-label">Tanggal Verifikasi</div>

                            <div class="data-value">
                                {{ $pengajuan->tanggal_verifikasi
                                    ? \Carbon\Carbon::parse($pengajuan->tanggal_verifikasi)->translatedFormat('d M Y, H:i') . ' WIB'
                                    : 'Belum diverifikasi' }}
                            </div>
                        </div>

                        <div class="verification-note">
                            <strong>Catatan Verifikasi Sebelumnya</strong>

                            @if ($pengajuan->catatan_verifikasi)
                                {{ $pengajuan->catatan_verifikasi }}
                            @else
                                <span class="no-note">Belum ada catatan verifikasi.</span>
                            @endif
                        </div>

                        @if ($pengajuan->status_pengajuan === 'Diajukan')
                            <form
                                class="verification-form"
                                method="POST"
                                action="{{ route('admin-pusat.verifikasi-berkas.verifikasi', $pengajuan->id_pengajuan) }}"
                            >
                                @csrf

                                <label for="catatan_verifikasi">Catatan Verifikator</label>
                                <textarea
                                    id="catatan_verifikasi"
                                    name="catatan_verifikasi"
                                    required
                                    minlength="5"
                                    maxlength="2000"
                                    placeholder="Tuliskan hasil pemeriksaan atau alasan penolakan..."
                                >{{ old('catatan_verifikasi') }}</textarea>

                                <p class="verification-help">
                                    Catatan ini akan disimpan pada data pengajuan dan menjadi informasi bagi peserta.
                                    Periksa isi dokumen terlebih dahulu sebelum memilih tindakan.
                                </p>

                                <div class="verification-actions">
                                    <button
                                        type="submit"
                                        class="btn-verify"
                                        formaction="{{ route('admin-pusat.verifikasi-berkas.verifikasi', $pengajuan->id_pengajuan) }}"
                                        onclick="return confirm('Verifikasi berkas dan teruskan pengajuan ke Admin UPT TIKP?');"
                                    >
                                        {!! $svg('check') !!}
                                        Verifikasi &amp; Teruskan ke Unit
                                    </button>

                                    <button
                                        type="submit"
                                        class="btn-reject"
                                        formaction="{{ route('admin-pusat.verifikasi-berkas.tolak', $pengajuan->id_pengajuan) }}"
                                        onclick="return confirm('Tolak pengajuan ini? Pastikan alasan penolakan sudah ditulis.');"
                                    >
                                        Tolak Berkas
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="verification-locked">
                                Pengajuan ini sudah diproses. Tindakan verifikasi tidak dapat dilakukan kembali.
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>

</body>
</html>