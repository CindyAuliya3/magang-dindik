<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Unit Kerja | Portal Magang Dindik Jatim</title>

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
            --blue: #0755d9;
            --blue-dark: #0645b5;
            --text: #20212b;
            --muted: #7b8196;
            --border: #e1e5ee;
            --bg: #f5f7fa;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }

        svg {
            flex-shrink: 0;
        }

        /* ================= TOPBAR ================= */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 12px 28px;
            border-bottom: 2px solid #2164ed;
            background: linear-gradient(100deg, #fff 0%, #fff 45%, #e8f0ff 100%);
        }

        .brand-title {
            color: #18365d;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-subtitle {
            margin-top: 3px;
            color: #71809a;
            font-size: 8px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            width: 230px;
            height: 34px;
            padding: 0 12px;
            border: 1px solid #e1e7f0;
            border-radius: 8px;
            background: #f5f8fd;
            color: #9aa6b7;
        }

        .search-box svg {
            width: 13px;
            height: 13px;
        }

        .search-box input {
            width: 100%;
            padding: 0;
            border: 0;
            outline: none;
            background: transparent;
            color: var(--text);
            font-family: inherit;
            font-size: 10px;
        }

        .search-box input::placeholder {
            color: #9aa6b7;
        }

        .bell {
            display: flex;
            padding: 4px;
            border: 0;
            background: none;
            color: #64748b;
            cursor: pointer;
        }

        .bell svg {
            width: 17px;
            height: 17px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--blue);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
        }

        .profile-name {
            font-size: 10px;
            font-weight: 700;
        }

        .profile-role {
            margin-top: 2px;
            color: #8995a7;
            font-size: 9px;
        }

        /* ================= KONTEN ================= */
        .main {
            max-width: 1120px;
            margin: 30px auto;
            padding: 0 24px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 16px;
        }

        .heading-title {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .heading-title svg {
            width: 20px;
            height: 20px;
            color: var(--blue);
        }

        .heading-description {
            margin: 6px 0 0 29px;
            color: #8190a5;
            font-size: 11px;
        }

        .unit-count {
            color: #91a0b2;
            font-size: 10px;
            white-space: nowrap;
        }

        /* ================= KARTU UNIT ================= */
        .unit-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .unit-card {
            display: flex;
            flex-direction: column;
            min-height: 400px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(20, 40, 80, 0.04);
        }

        .unit-card.featured {
            border: 2px solid #8bb5ff;
            box-shadow: 0 4px 14px rgba(7, 85, 217, 0.12);
        }

        .unit-card-header {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 22px;
            min-height: 112px;
            padding: 14px 16px 15px;
            background: var(--blue);
            color: #fff;
        }

        .unit-type {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            width: fit-content;
            padding: 4px 11px;
            border-radius: 99px;
            background: rgba(255, 255, 255, 0.2);
            font-size: 9px;
            font-weight: 600;
        }

        .unit-type svg {
            width: 11px;
            height: 11px;
        }

        .unit-name {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.35;
        }

        .unit-address {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 5px;
            color: rgba(255, 255, 255, 0.85);
            font-size: 9px;
        }

        .unit-address svg {
            width: 10px;
            height: 10px;
        }

        .unit-card-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding: 20px 18px 16px;
        }

        .section-label {
            margin-bottom: 10px;
            color: #8997a9;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
            gap: 6px;
        }

        .tag {
            padding: 5px 9px;
            border: 1px solid #e1e6ed;
            border-radius: 6px;
            background: #f2f5f9;
            color: #344256;
            font-size: 9px;
            font-weight: 500;
        }

        .tag.blue {
            border-color: #dbe7ff;
            background: #f1f6ff;
            color: var(--blue);
        }

        .tag.orange {
            border-color: #f5dfc3;
            background: #fff5e9;
            color: #cf873a;
        }

        .unit-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: auto;
            padding: 11px 12px;
            border: 0;
            border-radius: 9px;
            background: var(--blue);
            color: #fff;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .unit-button svg {
            width: 13px;
            height: 13px;
        }

        .unit-button:hover {
            background: var(--blue-dark);
        }

        /* Unit yang belum aktif */
        .unit-card.disabled .unit-card-header {
            background: #dfe3e9;
            color: #89919e;
        }

        .unit-card.disabled .unit-type {
            background: rgba(255, 255, 255, 0.45);
            color: #929aa6;
        }

        .unit-card.disabled .unit-address {
            color: #a5acb7;
        }

        .unit-card.disabled .unit-card-body {
            opacity: 0.8;
        }

        .unit-card.disabled .unit-button,
        .unit-card.disabled .unit-button:hover {
            background: #e7e9ed;
            color: #a1a8b2;
            cursor: not-allowed;
        }

        /* ================= INFO HAK AKSES ================= */
        .access-info {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-top: 18px;
            padding: 14px 16px;
            border: 1px solid #d3e3fb;
            border-radius: 10px;
            background: #f4f8ff;
            color: var(--blue);
            font-size: 11px;
            line-height: 1.6;
        }

        .access-info svg {
            width: 16px;
            height: 16px;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 900px) {
            .unit-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .topbar {
                padding: 12px 16px;
            }

            .search-box,
            .bell {
                display: none;
            }

            .main {
                margin-top: 22px;
                padding: 0 14px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .heading-description {
                margin-left: 0;
            }

            .unit-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .unit-card {
                min-height: 330px;
            }
        }
    </style>
</head>

<body>
@php
    $icons = [
        'building' => '<rect x="5" y="3" width="14" height="18" rx="1.5"></rect><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2"></path>',
        'layers' => '<path d="m12 3 9 5-9 5-9-5z"></path><path d="m3 13 9 5 9-5"></path>',
        'landmark' => '<path d="M3 10 12 4l9 6"></path><path d="M5 10v8M9 10v8M15 10v8M19 10v8M3 21h18"></path>',
        'pin' => '<path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"></path><circle cx="12" cy="10" r="2.5"></circle>',
        'search' => '<circle cx="11" cy="11" r="7"></circle><path d="m20 20-3.5-3.5"></path>',
        'bell' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>',
        'arrow' => '<path d="M5 12h14"></path><path d="m13 6 6 6-6 6"></path>',
        'info' => '<circle cx="12" cy="12" r="9"></circle><path d="M12 8h.01M11 12h1v5h1"></path>',
    ];

    $svg = fn (string $name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($icons[$name] ?? '') . '</svg>';

    // Data admin pada header
    $petugas = auth('petugas')->user();
    $namaAdmin = $petugas->nama ?? 'Admin Pusat';
    $unitAdmin = $petugas->unit_kerja ?? 'Sekretariat';

    $inisial = collect(preg_split('/\s+/', trim($namaAdmin)))
        ->filter()->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');

    /*
     * Daftar unit kerja. Jika controller mengirim $unitKerja, itu yang dipakai.
     * Tag: ['teks' => ..., 'gaya' => ''|'blue'|'orange']
     * url = null  -> tombol tampil, tetapi halaman belum dihubungkan (muncul pemberitahuan)
     */
    $unitKerja = $unitKerja ?? [
        [
            'nama' => 'Dinas Pendidikan Provinsi Jawa Timur',
            'tipe' => 'Kantor Pusat',
            'ikon' => 'building',
            'alamat' => 'Jl. Gentengkali No. 33 Surabaya',
            'label' => 'Sub-bidang penempatan:',
            'tag' => [
                ['teks' => 'Sekretariat', 'gaya' => ''],
                ['teks' => 'Bidang SMA', 'gaya' => ''],
                ['teks' => 'Bidang SMK', 'gaya' => ''],
                ['teks' => 'Bidang PK-PLK', 'gaya' => ''],
                ['teks' => 'Bidang GTK', 'gaya' => ''],
            ],
            'aktif' => true,
            'utama' => false,
            'url' => route('admin-pusat.dashboard'),
        ],
        [
            'nama' => 'UPT TIKP',
            'tipe' => 'Pelaksana Teknis',
            'ikon' => 'layers',
            'alamat' => 'Jl. Jagir Wonokromo No. 356 Surabaya',
            'label' => 'Bidang keahlian teknis:',
            'tag' => [
                ['teks' => 'Rekayasa Perangkat Lunak', 'gaya' => 'blue'],
                ['teks' => 'Jaringan & Server', 'gaya' => 'blue'],
                ['teks' => 'Multimedia Edukasi', 'gaya' => 'blue'],
            ],
            'aktif' => true,
            'utama' => true,
            // Ganti dengan route halaman pengelolaan UPT TIKP bila sudah dibuat
            'url' => \Illuminate\Support\Facades\Route::has('admin-pusat.upt-tikp')
                ? route('admin-pusat.upt-tikp')
                : null,
        ],
        [
            'nama' => 'UPT PTKK',
            'tipe' => 'Pelaksana Teknis',
            'ikon' => 'layers',
            'alamat' => 'Surabaya',
            'label' => 'Keterangan:',
            'tag' => [
                ['teks' => 'Pengembangan Teknis', 'gaya' => 'blue'],
                ['teks' => 'Keterampilan Kejuruan', 'gaya' => 'blue'],
                ['teks' => 'Belum Aktif', 'gaya' => 'orange'],
            ],
            'aktif' => false,
            'utama' => false,
            'url' => null,
        ],
    ];

    $jumlahTersedia = collect($unitKerja)->where('aktif', true)->count();
@endphp

    {{-- ============ HEADER ============ --}}
    <header class="topbar">
        <div>
            <div class="brand-title">Portal Magang Dinas Pendidikan</div>
            <div class="brand-subtitle">PROVINSI JAWA TIMUR</div>
        </div>

        <div class="header-right">
            <label class="search-box">
                {!! $svg('search') !!}
                <input type="search" placeholder="Cari pendaftar, jadwal wawancara..." aria-label="Cari">
            </label>

            <button type="button" class="bell" aria-label="Notifikasi">{!! $svg('bell') !!}</button>

            <div class="profile">
                <div class="avatar">{{ $inisial ?: 'AP' }}</div>
                <div>
                    <div class="profile-name">{{ $namaAdmin }}</div>
                    <div class="profile-role">{{ $unitAdmin }}</div>
                </div>
            </div>
        </div>
    </header>

    {{-- ============ KONTEN ============ --}}
    <main class="main">

        <div class="page-heading">
            <div>
                <h1 class="heading-title">
                    {!! $svg('landmark') !!}
                    Pilih &amp; Kelola Unit Kerja Magang
                </h1>

                <p class="heading-description">
                    Pilih unit kerja sesuai akun Anda. Unit yang belum tersedia tidak dapat dibuka.
                </p>
            </div>

            <div class="unit-count">Total {{ $jumlahTersedia }} Satuan Kerja Tersedia</div>
        </div>

        <div class="unit-grid">
            @foreach ($unitKerja as $unit)
                <article class="unit-card {{ $unit['utama'] ? 'featured' : '' }} {{ $unit['aktif'] ? '' : 'disabled' }}"
                         @unless ($unit['aktif']) aria-disabled="true" @endunless>

                    <div class="unit-card-header">
                        <span class="unit-type">{!! $svg($unit['ikon']) !!} {{ $unit['tipe'] }}</span>

                        <div>
                            <div class="unit-name">{{ $unit['nama'] }}</div>
                            <div class="unit-address">{!! $svg('pin') !!} {{ $unit['alamat'] }}</div>
                        </div>
                    </div>

                    <div class="unit-card-body">
                        <div class="section-label">{{ $unit['label'] }}</div>

                        <div class="tags">
                            @foreach ($unit['tag'] as $tag)
                                <span class="tag {{ $tag['gaya'] }}">{{ $tag['teks'] }}</span>
                            @endforeach
                        </div>

                        @if (! $unit['aktif'])
                            <span class="unit-button" aria-disabled="true">Belum Tersedia {!! $svg('arrow') !!}</span>
                        @elseif ($unit['url'])
                            <a href="{{ $unit['url'] }}" class="unit-button">
                                Masuk &amp; Kelola Unit {!! $svg('arrow') !!}
                            </a>
                        @else
                            {{-- Route belum dihubungkan --}}
                            <a href="#" class="unit-button"
                               onclick="event.preventDefault(); alert('Halaman pengelolaan {{ $unit['nama'] }} untuk Admin Pusat akan dihubungkan pada tahap berikutnya.');">
                                Masuk &amp; Kelola Unit {!! $svg('arrow') !!}
                            </a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Informasi hak akses --}}
        <div class="access-info">
            {!! $svg('info') !!}
            <span>
                <strong>Informasi Hak Akses:</strong>
                Verifikasi kelengkapan dokumen awal seluruh pendaftar dilakukan
                oleh tim Sekretariat Pusat sebelum didistribusikan ke masing-masing UPT.
            </span>
        </div>

    </main>

</body>
</html>