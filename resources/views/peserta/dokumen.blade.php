<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Dokumen - Portal Magang Dispendik Jatim</title>
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

        /* ================= TOPBAR (sama dengan dashboard) ================= */
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
            padding: 12px 28px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(90deg, #ffffff 0%, #ffffff 40%, #e9f0ff 100%);
            box-shadow: 0 2px 4px rgba(25, 35, 70, 0.06);
        }

        .topbar-title {
            margin: 0;
            color: #14213d;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.3;
        }

        .topbar-sub {
            margin-top: 1px;
            color: var(--muted);
            font-size: 8px;
            font-weight: 500;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .bell {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            margin-right: 6px;
            color: var(--muted);
        }

        .bell svg {
            width: 14px;
            height: 14px;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info {
            text-align: right;
            line-height: 1.3;
        }

        .user-name {
            font-size: 10px;
            font-weight: 700;
        }

        .user-role {
            color: var(--muted);
            font-size: 10px;
            font-weight: 600;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--blue);
            color: white;
        }

        .avatar svg {
            width: 13px;
            height: 13px;
        }

        /* ================= KONTEN ================= */
        .content {
            flex: 1;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 24px 28px 36px;
        }

        .panel {
            padding: 26px 28px 28px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 8px rgba(25, 35, 70, 0.08);
        }

        /* Header tahapan */
        .stage-head {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
        }

        .stage-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            border-radius: 11px;
            background: #e4eafb;
            color: var(--blue);
        }

        .stage-icon svg {
            width: 22px;
            height: 22px;
        }

        .stage-label {
            margin: 0 0 2px;
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
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .stage-badge {
            padding: 3px 10px;
            border-radius: 99px;
            background: #e4eafb;
            color: var(--blue);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0;
        }

        /* Stepper */
        .stepper-wrap {
            padding: 8px 8px 4px;
            margin: -8px -8px 22px;
            overflow-x: auto;
        }

        .stepper {
            position: relative;
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            min-width: 640px;
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
            width: var(--progress-width, 20%);
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
            margin-bottom: 10px;
            border: 3px solid white;
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
            color: white;
        }

        .step.current .step-circle {
            background: #0a56d6;
            color: white;
            box-shadow: 0 0 0 4px rgba(10, 86, 214, 0.2);
        }

        .step-no {
            font-size: 10px;
            font-weight: 600;
            color: #9a9db0;
        }

        .step-name {
            margin: 2px 0;
            color: #9a9db0;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.3;
        }

        .step-sub {
            color: #b0b3c3;
            font-size: 10px;
            font-weight: 500;
        }

        .step.done .step-no,
        .step.current .step-no {
            color: var(--blue);
            font-weight: 700;
        }

        .step.done .step-name,
        .step.current .step-name {
            color: var(--text);
            font-weight: 700;
        }

        .step.done .step-sub {
            color: #3a3f55;
        }

        .step.current .step-sub {
            color: #0a56d6;
            font-weight: 600;
        }

        /* Formulir */
        .form-card {
            padding: 20px 20px 22px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
        }

        .form-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding-bottom: 18px;
            margin-bottom: 18px;
            border-bottom: 1px solid #e8eaf2;
        }

        .form-head-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-head-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 8px;
            background: #eceffa;
            color: var(--blue);
        }

        .form-head-icon svg {
            width: 18px;
            height: 18px;
        }

        .form-title {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .form-sub {
            margin: 2px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 11px;
            border: 1px solid #fbd9a0;
            border-radius: 99px;
            background: #fff6e5;
            color: #b45309;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pill::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #f59e0b;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 0 0 14px;
            font-size: 13px;
            font-weight: 700;
        }

        .section-title svg {
            width: 14px;
            height: 14px;
            color: var(--blue);
        }

        .form-error {
            margin-bottom: 14px;
            color: #c62828;
            font-size: 12px;
        }

        .form-error ul {
            margin: 0;
            padding-left: 18px;
        }

        /* Baris dokumen */
        .doc-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .doc-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
        }

        .doc-row:not(.is-uploaded) {
            background: #faf9ff;
            box-shadow: 0 2px 5px rgba(25, 35, 70, 0.08);
        }

        .doc-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 8px;
            background: #e8eefc;
            color: var(--blue);
        }

        .doc-row:not(.is-uploaded) .doc-icon {
            background: #eceef6;
            color: #606477;
        }

        .doc-icon svg {
            width: 16px;
            height: 16px;
        }

        .doc-info {
            flex: 1;
            min-width: 0;
        }

        .doc-title {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .doc-badge {
            padding: 2px 8px;
            border: 1px solid;
            border-radius: 99px;
            font-size: 9px;
            font-weight: 600;
        }

        .doc-badge.ok {
            border-color: #a7e3c0;
            background: #e9f9ef;
            color: #15803d;
        }

        .doc-badge.warn {
            border-color: #fbd9a0;
            background: #fff6e5;
            color: #b45309;
        }

        .doc-meta {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 4px;
            color: var(--muted);
            font-size: 10px;
            word-break: break-all;
        }

        .doc-meta svg {
            width: 11px;
            height: 11px;
            flex-shrink: 0;
            color: var(--blue);
        }

        .doc-error {
            margin-top: 4px;
            color: #c62828;
            font-size: 10px;
        }

        .doc-error:empty {
            display: none;
        }

        .doc-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 12px;
            border-radius: 6px;
            font-family: inherit;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn svg {
            width: 12px;
            height: 12px;
        }

        .btn-outline {
            border: 1px solid var(--border);
            background: white;
            color: var(--text);
        }

        .btn-outline:hover {
            background: #f1f3fb;
        }

        .btn-primary {
            border: 0;
            background: var(--blue);
            color: white;
        }

        .btn-primary:hover {
            background: var(--blue-hover);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Tombol "Ganti Berkas" pada dokumen yang sudah diunggah */
        .btn.btn-outline.pick-button {
            border: 1px solid var(--border);
            background: white;
            color: var(--text);
        }

        .btn.btn-outline.pick-button:hover {
            background: #f1f3fb;
        }

        /* Footer aksi */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
        }

        .kirim-hint {
            margin: 0 auto 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .form-actions .btn {
            padding: 10px 18px;
            font-size: 11px;
        }

        .form-actions .btn svg {
            width: 13px;
            height: 13px;
        }

        .doc-upload-form {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0;
        }

        .file-input {
            display: none;
        }

        .flash-message {
            padding: 11px 14px;
            margin-bottom: 16px;
            border: 1px solid #a7e3c0;
            border-radius: 8px;
            background: #e9f9ef;
            color: #166534;
            font-size: 12px;
        }

        .flash-error {
            border-color: #f3b4b4;
            background: #fff0f0;
            color: #b91c1c;
        }

        .completion-note {
            padding: 12px 14px;
            margin-top: 18px;
            border-radius: 9px;
            background: #f1f4fc;
            color: var(--muted);
            font-size: 11px;
        }

        .completion-note.complete {
            background: #e9f9ef;
            color: #166534;
        }

        .completion-note p {
            margin: 6px 0 0;
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
            .panel {
                padding: 18px 14px 20px;
            }
            .form-card {
                padding: 16px 12px 18px;
            }
            .form-head {
                flex-direction: column;
                align-items: flex-start;
            }
            .doc-row {
                flex-wrap: wrap;
            }
            .doc-actions {
                width: 100%;
                justify-content: flex-end;
            }
            .doc-upload-form {
                width: 100%;
                flex-wrap: wrap;
                justify-content: flex-end;
            }
            .form-actions {
                flex-wrap: wrap;
            }
            .kirim-hint {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @php
        /* Link aman (sama dengan dashboard): jika nama route belum ada, jatuh ke alamat cadangan */
        $rute = fn (string $nama, string $cadangan = '#') =>
            \Illuminate\Support\Facades\Route::has($nama) ? route($nama) : $cadangan;

        $urlBeranda = $rute('peserta.dashboard', url('/dashboard/pendaftar'));
        $urlDokumen = $rute('peserta.dokumen.index', '#');
        $urlSurat   = $rute('peserta.surat-keterangan', '#');
        $urlProfil  = $rute('peserta.profil', '#');
        $urlLogout  = $rute('logout', '#');

        $user = $peserta;
        $jenjang = $user->jenjang_pendidikan ?? null;

        // Status pengajuan dan jadwal wawancara dari database.
        $statusPengajuan = $pengajuan?->status_pengajuan;
        $jadwalWawancara = $jadwalWawancara ?? null;
        $hasilSeleksi = $hasilSeleksi ?? $pengajuan?->hasilSeleksi;
        $statusKehadiran = $jadwalWawancara?->status_kehadiran;
        $kehadiranTerkonfirmasi = $statusKehadiran === 'Terkonfirmasi';

        // Bedakan penolakan saat verifikasi berkas dan penolakan hasil seleksi.
        $ditolakSaatVerifikasi = $statusPengajuan === 'Ditolak' && !$hasilSeleksi;
        $hasilSeleksiSudahKeluar = in_array($statusPengajuan, ['Diterima', 'Ditolak'], true)
            && (bool) $hasilSeleksi;

        // Menentukan tahapan berdasarkan status terbaru di tabel pengajuan.
        if (!$sudahDikirim) {
            $tahapAktif = 2;
        } elseif (in_array($statusPengajuan, ['Diajukan', 'Terverifikasi'], true)) {
            $tahapAktif = 3;
        } elseif ($statusPengajuan === 'Wawancara') {
            $tahapAktif = 4;
        } elseif ($statusPengajuan === 'Diterima' || $hasilSeleksiSudahKeluar) {
            $tahapAktif = 5;
        } elseif ($ditolakSaatVerifikasi) {
            $tahapAktif = 3;
        } else {
            $tahapAktif = 2;
        }

        $progressWidth = match ($tahapAktif) {
            2 => '20%',
            3 => '40%',
            4 => '60%',
            5 => '80%',
            default => '0%',
        };

        $docIcons = [
            'cv' => '<rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="11" r="2"></circle><path d="M5.5 17a3.5 3.5 0 0 1 7 0M15 9h3M15 12h3"></path>',
            'surat' => '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m3 7 9 6 9-6"></path>',
            'proposal' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5M9 13h6M9 17h6"></path>',
            'transkrip' => '<path d="M22 9 12 4 2 9l10 5 10-5z"></path><path d="M6 11.5V16c0 1.2 2.7 3 6 3s6-1.8 6-3v-4.5"></path><path d="M22 9v6"></path>',
        ];

        $steps = [
            [
                'no' => 1,
                'nama' => 'Isi Data Diri & Tujuan',
                'sub' => 'Terverifikasi Sistem',
                'status' => 'done',
                'icon' => '<path d="m5 12 5 5 9-10"></path>',
            ],
            [
                'no' => 2,
                'nama' => 'Unggah Dokumen',
                'sub' => $sudahDikirim ? 'Berkas Lengkap' : 'Sedang Berlangsung',
                'status' => $sudahDikirim ? 'done' : 'current',
                'icon' => $sudahDikirim
                    ? '<path d="m5 12 5 5 9-10"></path>'
                    : '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5"></path>',
            ],
            [
                'no' => 3,
                'nama' => 'Verifikasi Berkas',
                'sub' => match ($statusPengajuan) {
                    'Diajukan' => 'Sedang Berlangsung',
                    'Terverifikasi', 'Wawancara', 'Diterima' => 'Lolos Seleksi Berkas',
                    'Ditolak' => 'Tidak Lolos Verifikasi',
                    default => 'Menunggu Seleksi Dokumen',
                },
                'status' => $ditolakSaatVerifikasi
                    ? 'fail'
                    : (in_array($statusPengajuan, ['Wawancara', 'Diterima'], true) || $hasilSeleksiSudahKeluar
                        ? 'done'
                        : ($tahapAktif === 3 ? 'current' : '')),
                'icon' => in_array($statusPengajuan, ['Wawancara', 'Diterima'], true)
                    ? '<path d="m5 12 5 5 9-10"></path>'
                    : '<path d="M12 3 5 6v5c0 4.5 3 8 7 10 4-2 7-5.5 7-10V6z"></path><circle cx="12" cy="10" r="2"></circle><path d="M8.5 16a3.5 3.5 0 0 1 7 0"></path>',
            ],
            [
                'no' => 4,
                'nama' => 'Wawancara',
                'sub' => $kehadiranTerkonfirmasi
                    ? 'Kehadiran Terkonfirmasi'
                    : ($jadwalWawancara ? 'Menunggu Konfirmasi Kehadiran' : 'Jadwal Ditentukan'),
                'status' => ($kehadiranTerkonfirmasi || $hasilSeleksiSudahKeluar || $statusPengajuan === 'Diterima')
                    ? 'done'
                    : ($tahapAktif === 4 ? 'current' : ''),
                'icon' => $kehadiranTerkonfirmasi
                    ? '<path d="m5 12 5 5 9-10"></path>'
                    : '<circle cx="9" cy="8" r="3"></circle><path d="M3 20v-1a5 5 0 0 1 10 0v1M16 5.5a3 3 0 0 1 0 5M19 3a7 7 0 0 1 0 10"></path>',
            ],
            [
                'no' => 5,
                'nama' => 'Pengumuman Kelulusan',
                'sub' => match ($statusPengajuan) {
                    'Diterima' => 'Dinyatakan Diterima',
                    'Ditolak' => 'Dinyatakan Tidak Diterima',
                    default => 'Surat Keputusan Resmi',
                },
                'status' => ($hasilSeleksiSudahKeluar || $statusPengajuan === 'Diterima')
                    ? ($statusPengajuan === 'Ditolak' ? 'fail' : 'current')
                    : '',
                'icon' => '<path d="M3 11v3a1 1 0 0 0 1 1h2l5 4V6L6 10H4a1 1 0 0 0-1 1z"></path><path d="M15 8.5a4.5 4.5 0 0 1 0 7M18 6a8 8 0 0 1 0 12"></path>',
            ],
        ];
    @endphp

    <div class="app">

        <aside class="sidebar">
            <div class="brand">
                <img class="brand-logo" src="{{ asset('images/logo.png') }}" alt="Logo Dinas Pendidikan Jawa Timur" onerror="this.style.display='none'">
                <div>
                    <span class="brand-tag">DINDIK JATIM</span>
                    <div class="brand-title">Student Portal</div>
                    <div class="brand-sub">Dinas Pendidikan<br>Provinsi Jawa Timur</div>
                </div>
            </div>
            <nav class="nav" aria-label="Menu utama">
                <a href="{{ $urlBeranda }}" class="nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 10 9-7 9 7"></path><path d="M5 9v12h14V9"></path><path d="M9 21v-7h6v7"></path></svg>
                    Beranda
                </a>
                <a href="{{ $urlDokumen }}" class="nav-link active" aria-current="page">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5"></path><path d="M9 13h6M9 17h6"></path></svg>
                    Dokumen Magang
                </a>
                <a href="{{ $urlSurat }}" class="nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="9" r="5"></circle>
                        <path d="m8.5 13.5-1.5 7.5 5-3 5 3-1.5-7.5"></path>
                    </svg>
                    Surat Keterangan
                </a>
                <a href="{{ $urlProfil }}" class="nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="3.5"></circle><path d="M5 20v-1.5a7 7 0 0 1 14 0V20z"></path></svg>
                    Profil
                </a>
            </nav>
            <div class="nav-bottom">
                <a href="#" class="nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 1-1 1.7"></path><circle cx="12" cy="17" r=".5"></circle></svg>
                    Bantuan
                </a>
                <form action="{{ $urlLogout }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="m16 17 5-5-5-5"></path><path d="M21 12H9"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <div class="main">
            <header class="topbar">
                <div>
                    <h2 class="topbar-title">Portal Magang Dinas Pendidikan</h2>
                    <div class="topbar-sub">Provinsi Jawa Timur</div>
                </div>
                <div class="user">
                    <div class="bell" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path></svg>
                    </div>
                    <div class="user-info">
                        <div class="user-name">Hai, {{ $user->nama }}</div>
                        <div class="user-role">Selamat datang kembali</div>
                    </div>
                    <div class="avatar" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="3.5"></circle><path d="M5 20v-1.5a7 7 0 0 1 14 0V20z"></path></svg>
                    </div>
                </div>
            </header>
            <main class="content">
                <section class="panel">
                    <div class="stage-head">
                        <div class="stage-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="2"></rect><path d="m8 9 1.5 1.5L12 8M14 9.5h3M8 15l1.5 1.5L12 14M14 15.5h3"></path></svg>
                        </div>
                        <div>
                            <p class="stage-label">TAHAPAN BERJALAN</p>
                            <h1 class="stage-title">
                                {{ match ($tahapAktif) { 2 => 'Sedang Mengisi Berkas Pendaftaran', 3 => 'Sedang Menunggu Seleksi Dokumen', 4 => 'Tahap Wawancara', 5 => 'Pengumuman Kelulusan', default => 'Proses Pendaftaran' } }}
                                <span class="stage-badge">
                                    Tahap {{ $tahapAktif }} dari 5
                                </span>
                            </h1>
                        </div>
                    </div>
                    <div class="stepper-wrap">
                        <ol class="stepper"
                            style="list-style:none;margin:0;padding:0;--progress-width:{{ $progressWidth }};">
                            @foreach ($steps as $step)
                                <li class="step {{ $step['status'] }}">
                                    <div class="step-circle">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $step['icon'] !!}</svg>
                                    </div>
                                    <span class="step-no">Langkah {{ $step['no'] }}</span>
                                    <span class="step-name">{{ $step['nama'] }}</span>
                                    <span class="step-sub">{{ $step['sub'] }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    @if (session('success'))
                        <div class="flash-message">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="flash-message flash-error">{{ session('error') }}</div>
                    @endif
                    <div class="form-card">
                        <div class="form-head">
                            <div class="form-head-left">
                                <div class="form-head-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                                </div>
                                <div>
                                    <h2 class="form-title">Formulir Kelengkapan Magang</h2>
                                    <p class="form-sub">Pastikan seluruh informasi terisi akurat sesuai identitas resmi</p>
                                </div>
                            </div>
                            <span class="status-pill">{{ $jumlahTerunggah === 4 ? 'Dokumen Lengkap' : 'Proses Pengisian' }}</span>
                        </div>
                        <h3 class="section-title">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5"></path></svg>
                            Unggah Berkas Persyaratan
                        </h3>
                        <div class="doc-list">
                            @foreach ($dokumen as $d)
                                @php $ada = !empty($d['file']); @endphp
                                <div class="doc-row {{ $ada ? 'is-uploaded' : '' }}" data-doc>
                                    <div class="doc-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $docIcons[$d['icon']] ?? $docIcons['proposal'] !!}</svg>
                                    </div>
                                    <div class="doc-info">
                                        <div class="doc-title">
                                            <span>{{ $d['nama'] }}</span>
                                            <span class="doc-badge {{ $ada ? 'ok' : 'warn' }}">
                                                {{ $ada ? 'Terunggah' : 'Belum Diunggah' }}
                                            </span>
                                        </div>
                                        <div class="doc-meta">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5"></path></svg>
                                            <span>
                                                @if ($ada)
                                                    {{ $d['file'] }}@if (!empty($d['size'])) • {{ $d['size'] }}@endif (Maks {{ $d['max'] }}MB)
                                                @else
                                                    Wajib format PDF • Ukuran maksimal {{ $d['max'] }}MB
                                                @endif
                                            </span>
                                        </div>
                                        {{-- Pesan error: dari server (setelah gagal kirim) atau dari JavaScript --}}
                                        <div class="doc-error" data-error>@if ($errors->has('file') && old('jenis_dokumen') === $d['jenis']){{ $errors->first('file') }}@endif</div>
                                    </div>
                                    <div class="doc-actions">
                                        @if ($ada)
                                            <a href="{{ $d['url'] }}" target="_blank" rel="noopener" class="btn btn-outline">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                Lihat
                                            </a>
                                        @endif
                                        @if (!$sudahDikirim)
                                            <form method="POST" action="{{ route('peserta.dokumen.store') }}"
                                                enctype="multipart/form-data" class="doc-upload-form">
                                                @csrf
                                                <input type="hidden" name="jenis_dokumen" value="{{ $d['jenis'] }}">
                                                <input
                                                    class="file-input"
                                                    type="file"
                                                    name="file"
                                                    accept="application/pdf,.pdf"
                                                    required
                                                    data-file
                                                    data-max="{{ $d['max'] }}"
                                                >
                                                <button type="button"
                                                    class="btn {{ $ada ? 'btn-outline' : 'btn-primary' }} pick-button"
                                                    data-pick>
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                                        aria-hidden="true">
                                                        <path d="M12 16V4M7 9l5-5 5 5M4 20h16"></path>
                                                    </svg>
                                                    <span data-pick-label>{{ $ada ? 'Ganti Berkas' : 'Unggah Berkas' }}</span>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (!$sudahDikirim)
                            <div class="completion-note {{ $jumlahTerunggah === 4 ? 'complete' : '' }}">
                                @if ($jumlahTerunggah === 4)
                                    <strong>Seluruh dokumen wajib sudah lengkap.</strong>
                                    <p>
                                        Pastikan seluruh berkas yang kamu unggah sudah benar.
                                        Setelah dikirim, dokumen tidak dapat diganti lagi.
                                    </p>
                                    <div class="form-actions">
                                        <p class="kirim-hint">
                                            Pastikan dokumen sudah benar sebelum mengirim.
                                        </p>
                                        <form method="POST"
                                            action="{{ route('peserta.dokumen.kirim') }}"
                                            onsubmit="return confirm('Apakah kamu yakin ingin mengirim pengajuan? Setelah dikirim, dokumen tidak dapat diganti lagi.');">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                Kirim Pengajuan
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    Lengkapi seluruh dokumen wajib sebelum pengajuan dapat dikirim
                                    ({{ $jumlahTerunggah }}/4 dokumen sudah diunggah).
                                @endif
                            </div>
                        @endif
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        (function () {
            document.querySelectorAll('[data-doc]').forEach(function (row) {
                var input = row.querySelector('[data-file]');
                var pick  = row.querySelector('[data-pick]');
                var label = row.querySelector('[data-pick-label]');
                var err   = row.querySelector('[data-error]');
                // Dokumen sudah dikirim -> tidak ada form unggah, tidak perlu apa-apa
                if (!input || !pick) return;
                var maxMb = parseFloat(input.dataset.max);
                // Klik tombol -> buka pemilih file
                pick.addEventListener('click', function () {
                    input.click();
                });
                // Setelah file dipilih -> validasi, lalu kirim otomatis
                input.addEventListener('change', function () {
                    var file = input.files[0];
                    err.textContent = '';
                    if (!file) return;
                    var isPdf = file.type === 'application/pdf' || /\.pdf$/i.test(file.name);
                    if (!isPdf) {
                        err.textContent = 'Berkas harus berformat PDF.';
                        input.value = '';
                        return;
                    }
                    if (file.size > maxMb * 1024 * 1024) {
                        err.textContent = 'Ukuran berkas melebihi ' + maxMb + 'MB.';
                        input.value = '';
                        return;
                    }
                    pick.disabled = true;
                    if (label) label.textContent = 'Mengunggah...';
                    input.form.submit();
                });
            });
        })();
    </script>
</body>
</html>