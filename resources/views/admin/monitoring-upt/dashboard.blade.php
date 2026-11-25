<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring UPT TIKP | Magang Dindik Jatim</title>

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

        .sidebar::before { top: 56px; right: -70px; width: 190px; height: 190px; }
        .sidebar::after { bottom: -60px; left: -60px; width: 300px; height: 300px; }
        .sidebar > * { position: relative; z-index: 1; }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 6px;
            margin-bottom: 20px;
        }

        .brand-logo { width: 40px; height: 56px; flex-shrink: 0; object-fit: contain; }
        .brand-title { font-size: 13px; font-weight: 700; line-height: 1.2; }
        .brand-sub { margin-top: 3px; color: rgba(255,255,255,.8); font-size: 10px; }

        .nav { display: flex; flex-direction: column; gap: 6px; }
        .nav-bottom { margin-top: auto; }

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

        .nav-link svg { width: 16px; height: 16px; flex-shrink: 0; }
        .nav-link:hover { background: rgba(255,255,255,.12); }

        .nav-link.active {
            background: white;
            color: var(--blue2);
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0,0,0,.12);
        }

        .nav-link.disabled { color: rgba(255,255,255,.5); cursor: not-allowed; }
        .nav-link.disabled:hover { background: none; }

        /* ================= MAIN & TOPBAR ================= */
        .main { display: flex; flex-direction: column; min-width: 0; min-height: 100vh; }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 28px;
            border-bottom: 2px solid #1a5fe0;
            background: linear-gradient(90deg, #fff 0%, #fff 50%, #e6eeff 100%);
        }

        .topbar-title { margin: 0; font-size: 15px; font-weight: 700; }
        .topbar-sub { margin: 3px 0 0; color: var(--muted); font-size: 8px; font-weight: 600; letter-spacing: 1px; }
        .topbar-right { display: flex; align-items: center; gap: 14px; }
        .bell { display: inline-flex; color: #64748b; }
        .bell svg { width: 16px; height: 16px; }
        .user { display: flex; align-items: center; gap: 10px; }
        .user-info { line-height: 1.4; }
        .user-name { font-size: 10px; font-weight: 700; }
        .user-role { color: #94a3b8; font-size: 9px; }

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

        /* ================= PANEL ================= */
        .panel {
            min-width: 0;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        .panel-body { padding: 20px 22px 22px; }

        .panel-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0;
            font-size: 14px;
            font-weight: 700;
        }

        .panel-title svg { width: 15px; height: 15px; color: var(--blue2); flex-shrink: 0; }
        .panel-subtitle { margin-top: 4px; color: var(--soft); font-size: 10px; line-height: 1.5; }

        .panel-count {
            padding: 4px 10px;
            border-radius: 6px;
            background: #eaf1ff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .panel-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .panel-link svg { width: 12px; height: 12px; }

        .divider { height: 1px; margin: 0 0 16px; background: #edf0f5; }

        /* ================= WELCOME ================= */
        .welcome-card {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            padding: 22px 26px;
        }

        .badge-row { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; margin-bottom: 8px; }

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
        }

        .period-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--blue2); }

        .unit-tag {
            padding: 5px 11px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: #f8f9fc;
            color: #334155;
            font-size: 10px;
            font-weight: 600;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 10px;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link:hover { text-decoration: underline; }

        .welcome-card h1 { margin: 0 0 6px; font-size: 22px; font-weight: 800; }
        .welcome-card p { margin: 0; max-width: 620px; color: var(--muted); font-size: 11px; line-height: 1.6; }
        .welcome-actions { display: flex; gap: 8px; flex-wrap: wrap; }

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

        .btn svg { width: 14px; height: 14px; }
        .btn:hover { background: var(--blue); }
        .btn-outline { border-color: var(--border); background: #f8f9fc; color: #334155; }
        .btn-outline:hover { background: #eef1f6; }

        /* ================= FILTER ================= */
        .filter-card {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            padding: 12px 18px;
        }

        .filter-form { display: flex; align-items: center; flex-wrap: wrap; gap: 12px; flex: 1; margin: 0; }

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

        .filter-heading svg { width: 14px; height: 14px; }
        .filter-label { color: var(--soft); font-size: 10px; }

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

        .filter-select:focus { border-color: var(--blue2); box-shadow: 0 0 0 3px rgba(10,86,214,.1); }

        .segmented {
            display: inline-flex;
            padding: 3px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: #f4f6fb;
        }

        .segmented a {
            padding: 6px 13px;
            border-radius: 6px;
            color: #475569;
            font-size: 11px;
            font-weight: 500;
            text-decoration: none;
            white-space: nowrap;
        }

        .segmented a.active {
            background: #eaf1ff;
            color: var(--blue2);
            font-weight: 700;
        }

        .realtime {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 13px;
            border-radius: 99px;
            background: #f1f5fb;
            color: #334155;
            font-size: 10px;
            font-weight: 500;
            margin-left: auto;
        }

        .realtime i { width: 7px; height: 7px; border-radius: 50%; background: var(--blue2); }

        /* ================= STAT CARDS ================= */
        .stats-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; }

        .stat-card {
            padding: 16px 18px 15px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 2px 6px rgba(25,35,70,.06);
        }

        .stat-top { display: flex; align-items: center; justify-content: space-between; gap: 8px; }

        .stat-title {
            color: var(--soft);
            font-size: 9px;
            font-weight: 600;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .stat-icon { display: inline-flex; color: var(--blue2); }
        .stat-icon svg { width: 14px; height: 14px; }
        .stat-number { margin-top: 12px; font-size: 24px; font-weight: 800; color: #263445; }

        .stat-description {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 8px;
            color: var(--soft);
            font-size: 10px;
        }

        .stat-description svg { width: 12px; height: 12px; color: var(--blue2); }

        .stat-card.dark .stat-title,
        .stat-card.dark .stat-description { color: #334155; }

        .stat-pill {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            background: #fdecec;
            color: var(--red);
            font-size: 9px;
            font-weight: 700;
        }

        .stat-card.primary {
            border-color: #c7dcff;
            box-shadow: 0 3px 10px rgba(10,86,214,.12);
        }

        .stat-card.primary .stat-title,
        .stat-card.primary .stat-number,
        .stat-card.primary .stat-description { color: var(--blue2); }

        .stat-card.muted .stat-icon { color: #64748b; }

        /* ================= DASHBOARD GRID ================= */
        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(0, 1fr);
            gap: 20px;
            align-items: start;
        }

        .column { display: flex; flex-direction: column; gap: 18px; min-width: 0; }

        /* ================= BAGIAN / SEKSI ================= */
        .item-card {
            padding: 14px 16px;
            margin-bottom: 12px;
            border: 1px solid #edf0f5;
            border-radius: 11px;
            box-shadow: 0 1px 3px rgba(25,35,70,.04);
        }

        .item-card:last-child { margin-bottom: 0; }

        .bagian-top { display: flex; align-items: center; gap: 14px; }

        .bagian-icon { display: inline-flex; flex-shrink: 0; width: 22px; color: var(--blue2); }
        .bagian-icon svg { width: 18px; height: 18px; }

        .bagian-info { flex: 1; min-width: 0; }
        .bagian-name { font-size: 11px; font-weight: 700; }
        .bagian-desc { margin-top: 4px; color: var(--soft); font-size: 10px; }

        .bagian-count { text-align: right; flex-shrink: 0; }
        .bagian-count strong { font-size: 14px; font-weight: 800; color: var(--blue2); }
        .bagian-count span { margin-left: 3px; color: var(--muted); font-size: 11px; }

        .mini-pill {
            display: inline-block;
            margin-top: 6px;
            padding: 3px 8px;
            border: 1px solid #d7e4ff;
            border-radius: 4px;
            background: #f4f8ff;
            color: var(--blue2);
            font-size: 9px;
            font-weight: 600;
        }

        .mini-pill.gray { border-color: var(--border); background: #f5f6f9; color: #475569; }

        .progress { height: 5px; margin: 12px 0 10px; overflow: hidden; border-radius: 20px; background: #eef1f6; }
        .progress-fill { height: 100%; border-radius: 20px; background: var(--blue2); }
        .progress-fill.slate { background: #64748b; }

        .kuota-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            color: var(--soft);
            font-size: 10px;
        }

        .kuota-label { display: inline-flex; align-items: center; gap: 8px; }
        .kuota-label svg { width: 12px; height: 12px; }
        .kuota-label b { margin-left: 30px; color: #263445; font-weight: 700; }

        /* ================= CTA ================= */
        .cta-banner {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 26px 30px;
            overflow: hidden;
            border-radius: 14px;
            background: var(--blue2);
            color: white;
        }

        .cta-banner::after {
            content: "";
            position: absolute;
            right: -60px;
            bottom: -90px;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(255,255,255,.07);
            pointer-events: none;
        }

        .cta-banner > * { position: relative; z-index: 1; }
        .cta-text { max-width: 330px; }

        .cta-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 10px;
            border-radius: 99px;
            background: rgba(255,255,255,.92);
            color: var(--blue2);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .cta-badge i { width: 6px; height: 6px; border-radius: 50%; background: var(--blue2); }
        .cta-banner h3 { margin: 10px 0 8px; font-size: 17px; font-weight: 700; line-height: 1.35; }
        .cta-banner p { margin: 0; color: rgba(255,255,255,.85); font-size: 11px; line-height: 1.6; }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 99px;
            background: white;
            color: var(--blue2);
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .cta-btn svg { width: 14px; height: 14px; }

        /* ================= KOMPOSISI ================= */
        .edu-heading { display: flex; justify-content: space-between; gap: 10px; font-size: 11px; font-weight: 600; }
        .edu-heading strong { color: var(--blue2); font-weight: 700; }
        .edu-card.slate .edu-heading strong { color: #263445; }

        .edu-detail {
            display: flex;
            justify-content: space-between;
            color: #94a3b8;
            font-size: 9px;
        }

        .edu-detail span:last-child { color: #475569; }

        /* ================= ANTREAN WAWANCARA ================= */
        .queue-list { display: flex; flex-direction: column; gap: 10px; }

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
            width: 32px;
            height: 32px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 700;
        }

        .queue-avatar.solid { background: var(--blue2); color: white; }
        .queue-avatar.soft { background: #eaf1ff; color: var(--blue2); }
        .queue-avatar.green { background: #e3f5eb; color: #16834a; }

        .queue-info { flex: 1; min-width: 0; }

        .queue-name {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 700;
        }

        .queue-tag {
            padding: 2px 6px;
            border-radius: 4px;
            background: #eaf1ff;
            color: var(--blue2);
            font-size: 8px;
            font-weight: 700;
        }

        .queue-desc { margin-top: 3px; color: #94a3b8; font-size: 9px; }

        .queue-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 11px;
            border-radius: 6px;
            background: var(--blue2);
            color: white;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .queue-btn svg { width: 11px; height: 11px; }
        .queue-btn:hover { background: var(--blue); }
        .queue-btn.gray { background: #f1f3f5; color: #475569; font-weight: 600; }
        .queue-btn.gray:hover { background: #e6e9ee; }

        .empty-state { padding: 24px 12px; color: var(--soft); font-size: 11px; text-align: center; }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 1250px) {
            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 1000px) {
            .dashboard-grid { grid-template-columns: 1fr; }
            .realtime { margin-left: 0; }
        }

        @media (max-width: 900px) {
            .app { grid-template-columns: 1fr; }
            .sidebar { position: relative; height: auto; padding: 14px 12px; }
            .nav { flex-direction: row; flex-wrap: wrap; }
            .nav-bottom { margin-top: 10px; }
            .topbar { padding: 12px 16px; }
            .content { padding: 16px; }
            .welcome-card { align-items: flex-start; flex-direction: column; }
            .cta-banner { align-items: flex-start; flex-direction: column; }
        }

        @media (max-width: 600px) {
            .stats-grid { grid-template-columns: 1fr; }
            .user-info { display: none; }
            .welcome-card { padding: 18px; }
            .welcome-card h1 { font-size: 19px; }
            .panel-body { padding: 16px; }
            .filter-select { min-width: 0; width: 100%; }
            .bagian-top { flex-wrap: wrap; }
        }
    </style>
</head>

<body>

@php
    $icons = [
        'grid' => '<rect x="3" y="3" width="7" height="7" rx="1.5"></rect><rect x="14" y="3" width="7" height="7" rx="1.5"></rect><rect x="3" y="14" width="7" height="7" rx="1.5"></rect><rect x="14" y="14" width="7" height="7" rx="1.5"></rect>',
        'users' => '<circle cx="9" cy="8" r="3"></circle><path d="M3 20v-1a5 5 0 0 1 5-5h2a5 5 0 0 1 5 5v1"></path><circle cx="17" cy="9" r="2.2"></circle><path d="M17 14.2a4 4 0 0 1 4 3.8V19"></path>',
        'clipboard' => '<rect x="5" y="4" width="14" height="17" rx="2"></rect><path d="M9 4V3h6v1M9 10h6M9 14h6M9 18h4"></path>',
        'award' => '<circle cx="12" cy="9" r="5"></circle><path d="m8.7 13.5-1.2 7 4.5-2.5 4.5 2.5-1.2-7"></path>',
        'history' => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"></path><path d="M3 3v5h5M12 7v5l3 2"></path>',
        'help' => '<circle cx="12" cy="12" r="9"></circle><path d="M9.5 9a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 .9-1 1.7M12 17h.01"></path>',
        'logout' => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"></path>',
        'bell' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.9 1.9 0 0 0 3.4 0"></path>',
        'download' => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"></path>',
        'chat' => '<path d="M4 4h12a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H9l-4 3v-3H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"></path><path d="M20 9h1a1 1 0 0 1 1 1v9l-3-2h-5"></path>',
        'sliders' => '<path d="M4 6h8M20 6h-2M4 12h2M14 12h6M4 18h10M20 18h-2"></path><circle cx="16" cy="6" r="2"></circle><circle cx="10" cy="12" r="2"></circle><circle cx="16" cy="18" r="2"></circle>',
        'check-square' => '<path d="m9 11 3 3 8-8"></path><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9"></path>',
        'check-circle' => '<circle cx="12" cy="12" r="9"></circle><path d="m8.5 12 2.5 2.5 4.5-5"></path>',
        'user-check' => '<circle cx="9" cy="8" r="3.5"></circle><path d="M3 20v-1a5 5 0 0 1 5-5h2a5 5 0 0 1 5 5v1"></path><path d="m16 11 2 2 4-4"></path>',
        'x-circle' => '<circle cx="12" cy="12" r="9"></circle><path d="m15 9-6 6M9 9l6 6"></path>',
        'bars' => '<path d="M5 20V10M12 20V4M19 20v-7" stroke-width="3"></path>',
        'cap' => '<path d="m2 9 10-5 10 5-10 5z"></path><path d="M6 11.5V16c0 1.5 2.7 3 6 3s6-1.5 6-3v-4.5M22 9v6"></path>',
        'id' => '<rect x="3" y="5" width="18" height="15" rx="2"></rect><path d="M8 5V3h8v2M8 13h3M8 16h8"></path><circle cx="15" cy="11" r="1.5"></circle>',
        'film' => '<rect x="3" y="9" width="18" height="11" rx="1.5"></rect><path d="m3 9 2-5 4 1 4-1 4 1 3-1 1 5M7 9l2-4M12 9l2-4M17 9l2-4"></path>',
        'monitor' => '<rect x="2" y="4" width="14" height="10" rx="1.5"></rect><path d="M6 18h6M9 14v4"></path><rect x="16" y="9" width="6" height="11" rx="1"></rect>',
        'seat' => '<path d="M7 4h6l1 8H8zM6 12h10v3H6zM8 15v5M14 15v5"></path>',
        'calendar-user' => '<rect x="4" y="5" width="16" height="16" rx="2"></rect><path d="M8 3v4M16 3v4M4 10h16"></path><circle cx="12" cy="15" r="1.7"></circle>',
        'message' => '<path d="M4 4h16v12H9l-5 4z"></path><path d="M8 9h8M8 12h5"></path>',
        'arrow' => '<path d="M5 12h14M13 6l6 6-6 6"></path>',
    ];

    $svg = fn (string $name) =>
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . ($icons[$name] ?? '') . '</svg>';

    $inisialDari = fn (string $nama) => collect(preg_split('/\s+/', trim($nama)))
        ->filter()
        ->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');

    // Format angka gaya Indonesia: 19,2 / 50 / 30,8
    $fmt = fn ($angka) => rtrim(rtrim(number_format($angka, 1, ',', '.'), '0'), ',');

    // Identitas petugas yang sedang login.
    $petugas = auth('petugas')->user();
    $namaAdmin = $petugas?->nama ?? 'Admin Pusat';
    $inisialAdmin = $inisialDari($namaAdmin);

    $jam = now('Asia/Jakarta')->hour;
    $sapaan = $jam < 11 ? 'Pagi' : ($jam < 15 ? 'Siang' : ($jam < 18 ? 'Sore' : 'Malam'));

    // Nilai bawaan agar Blade tidak gagal saat controller belum mengirim data.
    // Data aktual tetap harus dihitung dan dikirim oleh controller.
    $daftarPeriode = $daftarPeriode ?? collect();
    $periodeTerpilih = $periodeTerpilih ?? request('periode');
    $komposisiPendidikan = $komposisiPendidikan ?? [];
    $detailJenjang = $detailJenjang ?? [];

    $jumlahBerkasMasuk = $jumlahBerkasMasuk ?? $berkasTerverifikasi ?? 0;
    $antreanWawancara = $antreanWawancara ?? $antreanVerifikasi ?? 0;
    $pesertaDiterima = $pesertaDiterima ?? 0;
    $persenKuota = $persenKuota ?? 0;
    $ditolakGugur = $ditolakGugur ?? $pengajuanDitolak ?? 0;

    $periodeAktif = collect($daftarPeriode)->first(
        fn ($p) => (string) $periodeTerpilih === (string) data_get($p, 'id_periode')
    );
    $namaPeriodeAktif = data_get($periodeAktif, 'nama_periode', 'Semua Periode');

    $jumlahMahasiswa = $komposisiPendidikan['MAHASISWA'] ?? 0;
    $jumlahSMK = $komposisiPendidikan['SMK'] ?? 0;
    $totalPendidikan = $jumlahMahasiswa + $jumlahSMK;

    $jenjangAktif = request('jenjang', 'semua');

    // Tidak menggunakan data contoh/fiktif. Jika kosong, tampilkan empty state.
    $daftarBagian = $daftarBagian ?? [];
    $totalBagian = collect($daftarBagian)->sum('jumlah');
    $daftarWawancara = $daftarWawancara ?? [];

    $warnaAvatar = ['solid', 'soft', 'green'];
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
                <div class="brand-sub">UPT TIKP</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">

            <a href="{{ route('admin-pusat.upt-tikp') }}" class="nav-link active" aria-current="page">
                {!! $svg('grid') !!}
                Dashboard
            </a>

            <a href="{{ route('admin-pusat.wawancara') }}" class="nav-link">
                {!! $svg('users') !!}
                Seleksi Wawancara
            </a>

            <a href="{{ route('admin-pusat.monitoring-surat-penerimaan') }}" class="nav-link">
                {!! $svg('clipboard') !!}
                Surat Penerimaan
            </a>

            <a href="{{ route('admin-pusat.monitoring-sertifikat') }}" class="nav-link">
                {!! $svg('award') !!}
                Penerbitan Sertifikat
            </a>

            <a href="{{ route('admin-pusat.riwayat') }}" class="nav-link">
                {!! $svg('history') !!}
                Riwayat
            </a>

        </nav>

        <nav class="nav nav-bottom" aria-label="Menu bantuan">

            <a href="#" class="nav-link">
                {!! $svg('help') !!}
                Bantuan
            </a>

            {{-- Ganti "#" dengan route logout aplikasi Anda --}}
            <a href="#" class="nav-link">
                {!! $svg('logout') !!}
                Keluar
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
                        <div class="user-role">Admin Pusat</div>
                    </div>
                </div>
            </div>

        </header>

        <!-- KONTEN -->
        <main class="content">

            <!-- WELCOME -->
            <section class="panel welcome-card">

                <div>
                    <a href="{{ route('admin-pusat.pilih-unit') }}" class="back-link">
                        &larr; Kembali ke Pilih Unit
                    </a>

                    <div class="badge-row">
                        <span class="period-badge">
                            <span class="period-dot"></span>
                            Admin Pusat &bull; {{ $namaPeriodeAktif }}
                        </span>
                        <span class="unit-tag">UPT TIKP</span>
                    </div>

                    <h1>Selamat {{ $sapaan }}!</h1>

                    <p>
                        Dashboard operasional magang UPT TIKP: evaluasi berkas delegasi pusat,
                        seleksi wawancara mandiri, dan analitik kuota.
                    </p>
                </div>

                <div class="welcome-actions">
                    <button type="button" class="btn btn-outline" onclick="window.print()">
                        {!! $svg('download') !!}
                        Ekspor Rekap UPT
                    </button>

                    <a href="#" class="btn">
                        {!! $svg('chat') !!}
                        Jadwalkan Wawancara ({{ $antreanWawancara }})
                    </a>
                </div>

            </section>

            <!-- FILTER -->
            <section class="panel filter-card">

                <form method="GET" action="{{ route('admin-pusat.upt-tikp') }}" class="filter-form">

                    <span class="filter-heading">
                        {!! $svg('sliders') !!}
                        Filter UPT TIKP
                    </span>

                    <span class="filter-label">Periode:</span>

                    <select name="periode" class="filter-select" onchange="this.form.submit()">
                        <option value="">Semua Periode</option>

                        @foreach ($daftarPeriode as $item)
                            <option
                                value="{{ $item->id_periode }}"
                                @selected((string) $periodeTerpilih === (string) $item->id_periode)
                            >
                                {{ $item->nama_periode ?? 'Periode ' . $item->id_periode }}
                            </option>
                        @endforeach
                    </select>

                    <span class="filter-label">Jenjang:</span>

                    <div class="segmented">
                        <a
                            href="{{ route('admin-pusat.upt-tikp', ['periode' => $periodeTerpilih, 'jenjang' => 'semua']) }}"
                            class="{{ $jenjangAktif === 'semua' ? 'active' : '' }}"
                        >
                            Semua ({{ $totalPendidikan }})
                        </a>
                        <a
                            href="{{ route('admin-pusat.upt-tikp', ['periode' => $periodeTerpilih, 'jenjang' => 'MAHASISWA']) }}"
                            class="{{ $jenjangAktif === 'MAHASISWA' ? 'active' : '' }}"
                        >
                            Mahasiswa ({{ $jumlahMahasiswa }})
                        </a>
                        <a
                            href="{{ route('admin-pusat.upt-tikp', ['periode' => $periodeTerpilih, 'jenjang' => 'SMK']) }}"
                            class="{{ $jenjangAktif === 'SMK' ? 'active' : '' }}"
                        >
                            SMK ({{ $jumlahSMK }})
                        </a>
                    </div>

                </form>

                <span class="realtime">
                    <i></i> Sinkronisasi Real-Time Pusat Aktif
                </span>

            </section>

            <!-- STATISTIK -->
            <section class="stats-grid">

                <article class="stat-card dark">
                    <div class="stat-top">
                        <span class="stat-title">Berkas Masuk Pusat</span>
                        <span class="stat-icon">{!! $svg('check-square') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($jumlahBerkasMasuk, 0, ',', '.') }}</div>
                    <div class="stat-description">
                        {!! $svg('check-circle') !!}
                        Lolos verifikasi Admin Pusat
                    </div>
                </article>

                <article class="stat-card dark">
                    <div class="stat-top">
                        <span class="stat-title">Antrean Wawancara</span>
                        <span class="stat-icon" style="color:#c2410c;">{!! $svg('chat') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($antreanWawancara, 0, ',', '.') }}</div>
                    <div class="stat-description">
                        <span class="stat-pill">Menunggu wawancara tatap muka</span>
                    </div>
                </article>

                <article class="stat-card primary">
                    <div class="stat-top">
                        <span class="stat-title">Peserta Diterima</span>
                        <span class="stat-icon">{!! $svg('user-check') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($pesertaDiterima, 0, ',', '.') }}</div>
                    <div class="stat-description">{{ $fmt($persenKuota) }}% dari kuota periode</div>
                </article>

                <article class="stat-card muted">
                    <div class="stat-top">
                        <span class="stat-title">Ditolak / Gugur</span>
                        <span class="stat-icon">{!! $svg('x-circle') !!}</span>
                    </div>
                    <div class="stat-number">{{ number_format($ditolakGugur, 0, ',', '.') }}</div>
                    <div class="stat-description">Tidak diterima</div>
                </article>

            </section>

            <!-- ISI DASHBOARD -->
            <section class="dashboard-grid">

                <!-- KOLOM KIRI -->
                <div class="column">

                    <!-- PENDAFTAR PER BAGIAN -->
                    <div class="panel panel-body">

                        <div class="panel-header">
                            <div>
                                <h2 class="panel-title">
                                    {!! $svg('bars') !!}
                                    Pendaftar per Bagian dan Seksi UPT TIKP
                                </h2>
                                <div class="panel-subtitle">
                                    Sebaran peminat magang pada bagian dan seksi UPT TIKP
                                </div>
                            </div>

                            <span class="panel-count">{{ $totalBagian }} Pendaftar</span>
                        </div>

                        <div class="divider"></div>

                        @forelse ($daftarBagian as $bagian)

                            @php
                                $persenBagian = $totalBagian > 0 ? ($bagian['jumlah'] / $totalBagian) * 100 : 0;
                                $sisaKuota = max(0, $bagian['kuota'] - $bagian['terisi']);
                            @endphp

                            <div class="item-card">

                                <div class="bagian-top">
                                    <span class="bagian-icon">{!! $svg($bagian['icon'] ?? 'id') !!}</span>

                                    <div class="bagian-info">
                                        <div class="bagian-name">{{ $bagian['nama'] }}</div>
                                        <div class="bagian-desc">{{ $bagian['deskripsi'] }}</div>
                                    </div>

                                    <div class="bagian-count">
                                        <div>
                                            <strong>{{ $bagian['jumlah'] }}</strong>
                                            <span>Pendaftar</span>
                                        </div>
                                        <span class="mini-pill {{ $loop->first ? '' : 'gray' }}" style="margin-left:0;">
                                            {{ $fmt($persenBagian) }}% dari total
                                        </span>
                                    </div>
                                </div>

                                <div class="progress">
                                    <div class="progress-fill" style="width: {{ round($persenBagian, 1) }}%"></div>
                                </div>

                                <div class="kuota-row">
                                    <span class="kuota-label">
                                        {!! $svg('seat') !!}
                                        Kuota: <b>{{ $bagian['kuota'] }} Kursi</b>
                                    </span>

                                    <span class="mini-pill gray" style="margin-top:0;">
                                        {{ $bagian['terisi'] }} terisi &bull; sisa {{ $sisaKuota }}
                                    </span>
                                </div>

                            </div>

                        @empty
                            <div class="empty-state">
                                Belum ada data pendaftar per bagian untuk periode ini.
                            </div>
                        @endforelse

                    </div>

                    <!-- WHAT-IF -->
                    <div class="cta-banner">

                        <div class="cta-text">
                            <span class="cta-badge"><i></i> WHAT-IF DECISION SUPPORT</span>
                            <h3>Simulasi Penerimaan Magang (What-If Analysis)</h3>
                            <p>
                                Uji coba skenario kuota dan jumlah pendaftar UPT TIKP.
                                Hanya simulasi, tidak mengubah data.
                            </p>
                        </div>

                        <a href="#" class="cta-btn">
                            Simulasikan sekarang
                            {!! $svg('arrow') !!}
                        </a>

                    </div>

                </div>

                <!-- KOLOM KANAN -->
                <div class="column">

                    <!-- KOMPOSISI JENJANG -->
                    <div class="panel panel-body">

                        <div class="panel-header">
                            <div>
                                <h2 class="panel-title">
                                    {!! $svg('cap') !!}
                                    Komposisi Jenjang Pendidikan
                                </h2>
                                <div class="panel-subtitle">Asal peserta UPT TIKP</div>
                            </div>

                            <span class="panel-count">{{ $totalPendidikan }} Peserta</span>
                        </div>

                        <div class="divider"></div>

                        @php
                            $daftarJenjang = [
                                ['kunci' => 'MAHASISWA', 'label' => 'Perguruan Tinggi (D3/D4/S1)', 'jumlah' => $jumlahMahasiswa, 'kelas' => ''],
                                ['kunci' => 'SMK', 'label' => 'SMK / Vokasi', 'jumlah' => $jumlahSMK, 'kelas' => 'slate'],
                            ];
                        @endphp

                        @foreach ($daftarJenjang as $jenjang)

                            @php
                                $persenJenjang = $totalPendidikan > 0
                                    ? round(($jenjang['jumlah'] / $totalPendidikan) * 100)
                                    : 0;

                                // Opsional: $detailJenjang['MAHASISWA'] = ['diterima' => 11, 'seleksi' => 14]
                                $detail = $detailJenjang[$jenjang['kunci']] ?? null;
                            @endphp

                            <div class="item-card edu-card {{ $jenjang['kelas'] }}">

                                <div class="edu-heading">
                                    <span>{{ $jenjang['label'] }}</span>
                                    <strong>{{ $jenjang['jumlah'] }} peserta ({{ $persenJenjang }}%)</strong>
                                </div>

                                <div class="progress">
                                    <div
                                        class="progress-fill {{ $jenjang['kelas'] }}"
                                        style="width: {{ $persenJenjang }}%"
                                    ></div>
                                </div>

                                @if ($detail)
                                    <div class="edu-detail">
                                        <span>Diterima: {{ $detail['diterima'] }}</span>
                                        <span>Sedang seleksi: {{ $detail['seleksi'] }}</span>
                                    </div>
                                @endif

                            </div>

                        @endforeach

                    </div>

                    <!-- ANTREAN WAWANCARA PRIORITAS -->
                    <div class="panel panel-body">

                        <div class="panel-header">
                            <div>
                                <h2 class="panel-title">
                                    {!! $svg('calendar-user') !!}
                                    Antrean Wawancara Prioritas
                                </h2>
                                <div class="panel-subtitle">
                                    {{ $antreanWawancara }} kandidat menunggu wawancara tatap muka
                                </div>
                            </div>

                            <a href="#" class="panel-link">
                                Semua ({{ $antreanWawancara }}) {!! $svg('arrow') !!}
                            </a>
                        </div>

                        <div class="divider"></div>

                        <div class="queue-list">

                            @forelse ($daftarWawancara as $kandidat)

                                <div class="queue-item">

                                    <div class="queue-avatar {{ $warnaAvatar[$loop->index % 3] }}">
                                        {{ $inisialDari($kandidat['nama']) }}
                                    </div>

                                    <div class="queue-info">
                                        <div class="queue-name">
                                            {{ $kandidat['nama'] }}
                                            <span class="queue-tag">{{ $kandidat['instansi'] }}</span>
                                        </div>
                                        <div class="queue-desc">
                                            {{ $kandidat['bidang'] }} &bull; {{ $kandidat['waktu'] }}
                                        </div>
                                    </div>

                                    @if (($kandidat['aksi'] ?? 'berkas') === 'berkas')
                                        <a href="#" class="queue-btn">
                                            {!! $svg('message') !!}
                                            Lihat Berkas
                                        </a>
                                    @else
                                        <a href="#" class="queue-btn gray">Atur Jadwal</a>
                                    @endif

                                </div>

                            @empty

                                <div class="empty-state">
                                    Belum ada kandidat yang menunggu wawancara.
                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>

            </section>

        </main>

    </div>

</div>

</body>
</html>