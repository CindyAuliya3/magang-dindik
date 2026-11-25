<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Portal Magang Dispendik Jatim</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        :root {
            --blue: #0b3d9e;
            --blue-hover: #09327f;
            --text: #20212b;
            --label: #3a3f55;
            --muted: #606477;
            --border: #d9dce8;
            --danger: #c62828;
        }

        .login-page {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            height: 100vh;
            min-height: 0;
            background: #f7f6ff;
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }

        /* ================= HERO ================= */
        .login-hero {
            position: relative;
            display: flex;
            align-items: flex-end;
            height: 100%;
            min-height: 0;
            padding: 28px 20px;
            color: white;
            background-image:
                linear-gradient(to top, rgba(5, 18, 37, 0.88), rgba(5, 18, 37, 0.12)),
                url('/images/gedung.jpg');
            background-position: center;
            background-size: cover;
        }

        .login-hero-content {
            position: relative;
            z-index: 1;
            max-width: 540px;
        }

        .login-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 16px;
            padding: 7px 13px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.15);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.6px;
        }

        .login-hero h1 {
            margin: 0 0 10px;
            color: white;
            font-size: clamp(25px, 2.1vw, 30px);
            font-weight: 700;
            line-height: 1.25;
            letter-spacing: -0.4px;
        }

        .login-hero p {
            max-width: 540px;
            margin: 0;
            color: rgba(255, 255, 255, 0.9);
            font-size: 13px;
            line-height: 1.8;
        }

        /* ================= PANEL KANAN ================= */
        .login-panel {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            min-width: 0;
            padding: 24px;
            overflow-y: auto;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            margin: auto 0 0;
            flex-shrink: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 8px rgba(25, 35, 70, 0.05);
        }

        /* TABS */
        .login-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid var(--border);
        }

        .login-tab {
            padding: 16px 10px;
            border-bottom: 2px solid transparent;
            background: white;
            color: #303447;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.4px;
            text-align: center;
            text-decoration: none;
        }

        .login-tab.active {
            border-bottom-color: var(--blue);
            color: var(--blue);
            font-weight: 700;
        }

        .login-card-body {
            padding: 28px 30px 30px;
        }

        .login-heading h2 {
            margin: 0 0 6px;
            color: var(--text);
            font-size: 20px;
            font-weight: 700;
            line-height: 1.3;
        }

        .login-heading p {
            margin: 0 0 24px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* FORM */
        .login-fields {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .login-field label {
            display: block;
            margin-bottom: 6px;
            color: var(--label);
            font-size: 11px;
            font-weight: 600;
        }

        .login-field input[type="email"],
        .login-field input[type="text"],
        .login-field input[type="password"] {
            display: block;
            width: 100%;
            min-width: 0;
            height: 36px;
            padding: 0 12px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: #fff;
            color: var(--text);
            font-family: inherit;
            font-size: 12px;
            line-height: 1.4;
        }

        .login-field input::placeholder {
            color: #9a9db0;
        }

        .login-field input:focus {
            outline: none;
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(11, 61, 158, 0.12);
        }

        .login-field input:disabled {
            background: #f6f7fb;
        }

        /* Kolom yang error */
        .login-field.has-error input {
            border-color: var(--danger);
        }

        /* PASSWORD */
        .password-wrap {
            position: relative;
        }

        .password-wrap input {
            padding-right: 38px !important;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            display: flex;
            padding: 2px;
            border: 0;
            background: none;
            color: #606477;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-toggle svg {
            width: 16px;
            height: 16px;
        }

        /* INGAT SAYA */
        .login-remember {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--label);
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
        }

        .login-remember input {
            width: 14px;
            height: 14px;
            margin: 0;
            accent-color: var(--blue);
            cursor: pointer;
        }

        /* TOMBOL */
        .login-submit {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            min-height: 44px;
            margin-top: 4px;
            border: 0;
            border-radius: 8px;
            background: var(--blue);
            color: white;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .login-submit:hover {
            background: var(--blue-hover);
        }

        .login-submit:disabled {
            background: #9db0d9;
            cursor: not-allowed;
        }

        .login-submit svg {
            width: 16px;
            height: 16px;
        }

        .login-copyright {
            margin: 22px 0 auto;
            color: #55586b;
            font-size: 10px;
            text-align: center;
            line-height: 1.7;
        }

        .login-status {
            margin-bottom: 16px;
            padding: 10px 12px;
            border: 1px solid #a7e3c0;
            border-radius: 8px;
            background: #e9f9ef;
            color: #15803d;
            font-size: 12px;
        }

        .login-error {
            margin-bottom: 16px;
            color: var(--danger);
            font-size: 12px;
        }

        .login-error ul {
            margin: 0;
            padding-left: 18px;
        }

        /* ================= HP ================= */
        @media (max-width: 760px) {
            .login-page {
                grid-template-columns: 1fr;
                height: auto;
            }

            .login-hero {
                height: 270px;
                min-height: 270px;
                padding: 24px;
            }

            .login-panel {
                height: auto;
                overflow: visible;
                padding: 28px 16px;
            }

            .login-card {
                margin: 0;
            }

            .login-card-body {
                padding: 24px 16px 26px;
            }
        }
    </style>
</head>

<body>
    <main class="login-page">

        <!-- HERO -->
        <section class="login-hero">
            <div class="login-hero-content">

                <div class="login-badge">
                    <span aria-hidden="true">◇</span>
                    INTERNSHIP PORTAL
                </div>

                <h1>Selamat Datang di Portal Magang Dinas Pendidikan</h1>

                <p>
                    Platform terpadu untuk pendaftaran, seleksi, dan
                    manajemen kegiatan magang bagi mahasiswa dan siswa
                    di lingkungan Dinas Pendidikan Provinsi Jawa Timur.
                </p>

            </div>
        </section>

        <!-- PANEL LOGIN -->
        <section class="login-panel">

            <div class="login-card">

                <!-- TAB MASUK / DAFTAR -->
                <nav class="login-tabs" aria-label="Autentikasi">

                    <a href="{{ route('login') }}"
                       class="login-tab active"
                       aria-current="page">
                        Masuk
                    </a>

                    <a href="{{ route('register') }}"
                       class="login-tab">
                        Daftar
                    </a>

                </nav>

                <div class="login-card-body">

                    <div class="login-heading">
                        <h2>Selamat Datang</h2>

                        <p>
                            Silakan masukkan email dan kata sandi Anda
                            untuk mengakses portal magang.
                        </p>
                    </div>

                    {{-- Pesan sukses (mis. setelah registrasi atau logout) --}}
                    @if (session('status'))
                        <div class="login-status">{{ session('status') }}</div>
                    @endif

                    {{-- Pesan error --}}
                    @if ($errors->any())
                        <div class="login-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- FORM LOGIN -->
                    {{-- Pastikan nama route POST ini sama dengan di routes/web.php --}}
                    <form method="POST"
                          action="{{ route('login.process') }}"
                          class="login-fields"
                          id="loginForm">

                        @csrf

                        <div class="login-field @error('email') has-error @enderror">
                            <label for="email">Email</label>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                autocomplete="email"
                                required
                                autofocus
                            >
                        </div>

                        <div class="login-field @error('password') has-error @enderror">
                            <label for="password">Kata Sandi</label>

                            <div class="password-wrap">

                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="Masukkan kata sandi"
                                    autocomplete="current-password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    data-target="password"
                                    aria-label="Tampilkan kata sandi"
                                >
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        aria-hidden="true"
                                    >
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>

                            </div>
                        </div>

                        <label class="login-remember">
                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            Ingat saya
                        </label>

                        <button
                            type="submit"
                            class="login-submit"
                            data-test="login-button"
                            id="btnMasuk"
                        >
                            Masuk

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>
                        </button>

                    </form>

                </div>
            </div>

            <footer class="login-copyright">
                © {{ date('Y') }} Dinas Pendidikan Provinsi Jawa Timur.
                Hak Cipta Dilindungi.
            </footer>

        </section>
    </main>

    <script>
        (function () {
            // Tampilkan / sembunyikan kata sandi
            document.querySelectorAll('.password-toggle').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var input = document.getElementById(btn.dataset.target);

                    input.type = input.type === 'password'
                        ? 'text'
                        : 'password';
                });
            });

            // Cegah kirim ganda saat tombol Masuk diklik berkali-kali
            document.getElementById('loginForm').addEventListener('submit', function () {
                document.getElementById('btnMasuk').disabled = true;
            });
        })();
    </script>

</body>
</html>