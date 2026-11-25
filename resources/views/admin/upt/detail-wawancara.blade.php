<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wawancara | Dindik Jatim</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        :root {
            --blue: #0755d8; --blue-dark: #0b3d9e; --text: #20212b;
            --muted: #64748b; --border: #e1e7f0; --bg: #f7f6ff;
            --green: #15803d; --orange: #d97706;
        }
        body { margin: 0; background: var(--bg); color: var(--text); font-family: Inter, Arial, sans-serif; }
        .app { min-height: 100vh; display: grid; grid-template-columns: 222px minmax(0,1fr); }
        .sidebar { position: sticky; top: 0; height: 100vh; padding: 18px 12px; overflow: hidden; color: white; background: linear-gradient(180deg,#0a5be0,#0050cf); }
        .brand { display:flex; align-items:center; gap:10px; padding: 0 7px; margin-bottom: 32px; }
        .brand img { width:42px; height:58px; object-fit:contain; }
        .brand-title { font-size:14px; font-weight:800; }
        .brand-sub { margin-top:4px; font-size:11px; color:#dbeafe; }
        .nav-link { display:flex; align-items:center; gap:11px; padding:12px 13px; margin-bottom:7px; border-radius:10px; color:white; text-decoration:none; font-size:12px; font-weight:600; }
        .nav-link.active { background:white; color:var(--blue); }
        .main { min-width:0; }
        .topbar { display:flex; align-items:center; justify-content:space-between; gap:15px; padding:18px 30px; background:linear-gradient(90deg,#fff 0%,#fff 60%,#eaf1ff 100%); border-bottom:1px solid #e3e8f5; }
        .topbar-title { margin:0; font-size:17px; font-weight:800; }
        .topbar-sub { margin:4px 0 0; color:var(--muted); font-size:9px; letter-spacing:1px; font-weight:700; }
        .user { display:flex; align-items:center; gap:10px; text-align:right; font-size:11px; font-weight:700; }
        .user small { display:block; margin-top:3px; color:var(--muted); font-weight:400; }
        .avatar { width:36px; height:36px; display:grid; place-items:center; border-radius:50%; background:var(--blue); color:white; }
        .content { max-width:1180px; margin:0 auto; padding:26px 30px 40px; }
        .heading-row { display:flex; align-items:flex-start; justify-content:space-between; gap:15px; margin-bottom:20px; }
        .eyebrow { margin-bottom:7px; color:var(--blue); font-size:10px; font-weight:800; letter-spacing:.7px; text-transform:uppercase; }
        h1 { margin:0; font-size:24px; font-weight:800; }
        .subtitle { margin:7px 0 0; color:var(--muted); font-size:12px; line-height:1.6; }
        .back { display:inline-flex; align-items:center; gap:8px; padding:10px 14px; border:1px solid var(--border); border-radius:9px; background:white; color:#334155; text-decoration:none; font-size:11px; font-weight:700; white-space:nowrap; }
        .grid { display:grid; grid-template-columns:minmax(0,1.15fr) minmax(300px,.85fr); gap:18px; align-items:start; }
        .stack { display:grid; gap:18px; }
        .panel { padding:21px; border:1px solid var(--border); border-radius:15px; background:white; box-shadow:0 2px 7px rgba(25,35,70,.04); }
        .panel h2 { margin:0 0 16px; font-size:15px; font-weight:800; }
        .person { display:flex; align-items:center; gap:13px; padding-bottom:17px; border-bottom:1px solid #edf0f5; }
        .person-avatar { width:48px; height:48px; flex:0 0 48px; display:grid; place-items:center; border-radius:14px; background:#eff4ff; color:var(--blue); font-weight:800; }
        .person-name { font-size:16px; font-weight:800; }
        .person-sub { margin-top:5px; color:var(--muted); font-size:11px; }
        .pill { display:inline-flex; align-items:center; gap:6px; padding:6px 10px; border-radius:20px; background:#eaf1ff; color:var(--blue); font-size:10px; font-weight:700; }
        .pill.green { background:#e9f8ef; color:var(--green); }
        .pill.orange { background:#fff3df; color:var(--orange); }
        .info-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:18px 22px; padding-top:18px; }
        .field-label { margin-bottom:6px; color:#8996aa; font-size:10px; }
        .field-value { color:#263449; font-size:12px; font-weight:700; line-height:1.6; overflow-wrap:anywhere; }
        .schedule-box { padding:16px; border:1px solid #dce7ff; border-radius:12px; background:#f5f8ff; }
        .schedule-date { color:var(--blue-dark); font-size:19px; font-weight:800; }
        .schedule-time { margin-top:5px; color:#334155; font-size:13px; font-weight:700; }
        .doc-list { display:grid; gap:10px; }
        .doc-item { display:flex; justify-content:space-between; gap:12px; align-items:center; padding:12px; border:1px solid #e8edf4; border-radius:10px; }
        .doc-name { color:#263449; font-size:11px; font-weight:700; }
        .doc-date { margin-top:4px; color:#8996aa; font-size:10px; }
        .doc-type { flex:0 0 auto; padding:5px 7px; border-radius:6px; background:#fff1f2; color:#dc2626; font-size:9px; font-weight:800; }
        .note { padding:13px 14px; border:1px solid #e8edf4; border-radius:10px; background:#f8fafc; color:#475569; font-size:11px; line-height:1.7; white-space:pre-line; }
        .muted-empty { color:#94a3b8; font-size:11px; font-style:italic; }
        @media(max-width:900px) { .app { grid-template-columns:190px minmax(0,1fr); } .content { padding:22px 18px; } .grid { grid-template-columns:1fr; } }
        @media(max-width:620px) { .app { grid-template-columns:1fr; } .sidebar { position:relative; height:auto; } .topbar { padding:14px; } .content { padding:18px 12px; } .heading-row { flex-direction:column; } h1 { font-size:20px; } .info-grid { grid-template-columns:1fr; } .user-info { display:none; } }
    </style>
</head>
<body>
@php
    $nama = $pengajuan->peserta->nama ?? '-';
    $inisial = collect(explode(' ', trim($nama)))->filter()->take(2)
        ->map(fn ($kata) => strtoupper(substr($kata, 0, 1)))->implode('');
    $tanggal = $jadwal->tanggal
        ? \Illuminate\Support\Carbon::parse($jadwal->tanggal)->translatedFormat('l, d F Y')
        : '-';
    $waktu = $jadwal->waktu ? substr((string) $jadwal->waktu, 0, 5) : '-';
@endphp
<div class="app">
    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Dindik Jatim" onerror="this.style.display='none'">
            <div><div class="brand-title">Dindik Jatim</div><div class="brand-sub">UPT TIKP</div></div>
        </div>
        <nav>
            <a class="nav-link" href="{{ route('admin-upt.dashboard') }}">▦ Dashboard</a>
            <a class="nav-link active" href="{{ route('admin-upt.wawancara') }}">♧ Seleksi Wawancara</a>
            <a class="nav-link" href="{{ route('admin-upt.surat-penerimaan') }}">▤ Surat Penerimaan</a>
            <a class="nav-link" href="{{ route('admin-upt.sertifikat') }}">♙ Penerbitan Sertifikat</a>
            <a class="nav-link" href="{{ route('admin-upt.riwayat') }}">◷ Riwayat</a>
        </nav>
    </aside>

    <div class="main">
        <header class="topbar">
            <div><h2 class="topbar-title">Portal Magang Dinas Pendidikan</h2><p class="topbar-sub">PROVINSI JAWA TIMUR</p></div>
            <div class="user"><div class="user-info">{{ $admin->nama ?? 'Admin UPT TIKP' }}<small>UPT TIKP</small></div><div class="avatar">AU</div></div>
        </header>

        <main class="content">
            @if (session('success'))
                <div class="note" style="margin-bottom:15px;border-color:#bbf7d0;background:#f0fdf4;color:#166534;">{{ session('success') }}</div>
            @endif

            <div class="heading-row">
                <div>
                    <div class="eyebrow">UPT TIKP &nbsp; • &nbsp; Detail Wawancara &nbsp; • &nbsp; ID Pengajuan: {{ $pengajuan->id_pengajuan }}</div>
                    <h1>Detail Jadwal Wawancara</h1>
                    <p class="subtitle">Informasi peserta dan jadwal wawancara yang telah diatur oleh Admin UPT TIKP.</p>
                </div>
                <a class="back" href="{{ route('admin-upt.wawancara') }}">← Kembali ke Seleksi Wawancara</a>
            </div>

            <div class="grid">
                <div class="stack">
                    <section class="panel">
                        <h2>Informasi Peserta</h2>
                        <div class="person">
                            <div class="person-avatar">{{ $inisial ?: 'P' }}</div>
                            <div>
                                <div class="person-name">{{ $nama }}</div>
                                <div class="person-sub">{{ $pengajuan->peserta->nama_instansi ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="info-grid">
                            <div><div class="field-label">Nomor Induk</div><div class="field-value">{{ $pengajuan->peserta->nomor_induk ?? '-' }}</div></div>
                            <div><div class="field-label">Email</div><div class="field-value">{{ $pengajuan->peserta->email ?? '-' }}</div></div>
                            <div><div class="field-label">Jenjang Pendidikan</div><div class="field-value">{{ ($pengajuan->peserta->jenjang_pendidikan ?? '') === 'MAHASISWA' ? 'Mahasiswa S1' : ($pengajuan->peserta->jenjang_pendidikan ?? '-') }}</div></div>
                            <div><div class="field-label">Jurusan / Program Studi</div><div class="field-value">{{ $pengajuan->peserta->jurusan ?? '-' }}</div></div>
                            <div><div class="field-label">Nomor Telepon</div><div class="field-value">{{ $pengajuan->peserta->no_telepon ?? $pengajuan->peserta->telepon ?? '-' }}</div></div>
                            <div><div class="field-label">Tujuan Magang</div><div class="field-value">{{ $pengajuan->tujuan_magang ?? 'UPT TIKP' }}</div></div>
                            <div><div class="field-label">Tanggal Pengajuan</div><div class="field-value">{{ $pengajuan->tanggal_pengajuan ? \Illuminate\Support\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y') : '-' }}</div></div>
                            <div><div class="field-label">Periode Magang</div><div class="field-value">{{ $pengajuan->periode->nama_periode ?? '-' }}</div></div>
                        </div>
                    </section>

                    <section class="panel">
                        <h2>Dokumen Pengajuan</h2>
                        <div class="doc-list">
                            @forelse ($pengajuan->dokumen as $dokumen)
                                <div class="doc-item">
                                    <div>
                                        <div class="doc-name">{{ $dokumen->jenis_dokumen }}</div>
                                        <div class="doc-date">Diunggah: {{ $dokumen->tanggal_unggah ? \Illuminate\Support\Carbon::parse($dokumen->tanggal_unggah)->translatedFormat('d M Y') : '-' }}</div>
                                    </div>
                                    <span class="doc-type">DOKUMEN</span>
                                </div>
                            @empty
                                <div class="muted-empty">Belum ada dokumen pada pengajuan ini.</div>
                            @endforelse
                        </div>
                    </section>
                </div>

                <div class="stack">
                    <section class="panel">
                        <h2>Jadwal Wawancara</h2>
                        <div class="schedule-box">
                            <div class="field-label">Hari dan Tanggal</div>
                            <div class="schedule-date">{{ $tanggal }}</div>
                            <div class="schedule-time">Pukul {{ $waktu }} WIB</div>
                        </div>
                        <div class="info-grid">
                            <div>
                                <div class="field-label">Status Pengajuan</div>
                                <div class="field-value"><span class="pill">Wawancara</span></div>
                            </div>
                            <div>
                                <div class="field-label">Status Kehadiran</div>
                                <div class="field-value">
                                    @if ($jadwal->status_kehadiran === 'Terkonfirmasi')
                                        <span class="pill green">Terkonfirmasi</span>
                                    @else
                                        <span class="pill orange">{{ $jadwal->status_kehadiran ?? 'Belum Dikonfirmasi' }}</span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div class="field-label">Status Pelaksanaan</div>
                                <div class="field-value">{{ $jadwal->status_pelaksanaan ?? '-' }}</div>
                            </div>
                            <div>
                                <div class="field-label">Petugas Pengatur Jadwal</div>
                                <div class="field-value">{{ $jadwal->petugas->nama ?? $admin->nama ?? '-' }}</div>
                            </div>
                            <div>
                                <div class="field-label">Tanggal Konfirmasi</div>
                                <div class="field-value">{{ $jadwal->tanggal_konfirmasi ? \Illuminate\Support\Carbon::parse($jadwal->tanggal_konfirmasi)->translatedFormat('d M Y H:i') : 'Belum dikonfirmasi' }}</div>
                            </div>
                        </div>
                    </section>

                    <section class="panel">
                        <h2>Catatan / Instruksi Wawancara</h2>
                        @if ($jadwal->catatan_instruksi)
                            <div class="note">{{ $jadwal->catatan_instruksi }}</div>
                        @else
                            <div class="muted-empty">Tidak ada catatan atau instruksi khusus.</div>
                        @endif
                    </section>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
