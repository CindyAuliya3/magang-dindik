<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin UPT TIKP | Dindik Jatim</title>
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
            --text: #20212b;
            --muted: #606477;
            --border: #e1e5ee;
            --bg: #f7f6ff;
            --green: #16a34a;
            --orange: #ea580c;
            --red: #dc2626;
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

        /* ================= SIDEBAR (sama dengan dashboard peserta) ================= */
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
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(25, 35, 70, 0.07);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 15px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
        }

        .btn svg {
            width: 13px;
            height: 13px;
        }

        .btn-primary {
            background: var(--blue2);
            color: #fff;
        }

        .btn-primary:hover {
            background: #0847b5;
        }

        .btn-light {
            border-color: var(--border);
            background: #f8f9fc;
            color: #334155;
        }

        .btn-light:hover {
            background: #eef1f8;
        }

        /* ================= SAMBUTAN ================= */
        .welcome {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 22px 24px;
        }

        .tag-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }

        .tag-blue {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border: 1px solid #cfe0ff;
            border-radius: 99px;
            background: #f1f6ff;
            color: var(--blue2);
            font-size: 10px;
            font-weight: 600;
        }

        .tag-blue .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--blue2);
        }

        .tag-gray {
            padding: 4px 9px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background: #f3f4f6;
            color: #475569;
            font-size: 9px;
            font-weight: 600;
        }

        .welcome h1 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .welcome p {
            max-width: 600px;
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
        }

        .welcome-actions {
            display: flex;
            gap: 10px;
            flex-shrink: 0;
        }

        /* ================= FILTER ================= */
        .filter-panel {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            padding: 12px 18px;
        }

        .filter-form {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin: 0;
        }

        .filter-title {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #334155;
            font-size: 11px;
            font-weight: 700;
        }

        .filter-title svg {
            width: 14px;
            height: 14px;
            color: var(--blue2);
        }

        .filter-label {
            color: var(--muted);
            font-size: 11px;
        }

        /* Dropdown periode (disamakan dengan desain Figma) */
        .select {
            min-width: 150px;
            height: 32px;
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

        .select:hover {
            border-color: #cbd5e1;
        }

        .select:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 3px rgba(10, 86, 214, 0.12);
        }

        .segmented {
            display: inline-flex;
            padding: 3px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: #f4f5f9;
        }

        .segmented a {
            padding: 6px 12px;
            border-radius: 6px;
            color: #4a4e63;
            font-size: 11px;
            font-weight: 500;
            text-decoration: none;
            white-space: nowrap;
        }

        .segmented a.active {
            background: #fff;
            color: var(--blue2);
            font-weight: 700;
            box-shadow: 0 1px 3px rgba(25, 35, 70, 0.12);
        }

        .sync-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 99px;
            background: #f8fafc;
            color: #475569;
            font-size: 10px;
        }

        .sync-pill .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--blue2);
        }

        /* ================= RINGKASAN ================= */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .summary-card {
            padding: 16px 18px 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(25, 35, 70, 0.07);
        }

        .summary-card.accepted {
            border-color: #bcd3ff;
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 10px;
        }

        .summary-label {
            color: #7b8196;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        .summary-icon {
            display: flex;
            color: var(--blue2);
        }

        .summary-icon svg {
            width: 15px;
            height: 15px;
        }

        .summary-value {
            margin-bottom: 8px;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .summary-note {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #64748b;
            font-size: 10px;
            line-height: 1.5;
        }

        .summary-note svg {
            width: 11px;
            height: 11px;
            flex-shrink: 0;
        }

        .summary-note.warning {
            display: inline-flex;
            padding: 3px 8px;
            border-radius: 5px;
            background: #fde8e8;
            color: #b42318;
            font-weight: 600;
        }

        .summary-card.accepted .summary-label,
        .summary-card.accepted .summary-value {
            color: var(--blue2);
        }

        .summary-card.accepted .summary-note {
            color: var(--blue2);
            font-weight: 600;
        }

        /* ================= GRID UTAMA ================= */
        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(300px, 1fr);
            align-items: start;
            gap: 18px;
        }

        .column {
            display: flex;
            flex-direction: column;
            gap: 18px;
            min-width: 0;
        }

        .section-panel {
            padding: 20px 22px 22px;
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0;
            font-size: 14px;
            font-weight: 700;
        }

        .section-title svg {
            width: 15px;
            height: 15px;
            color: var(--blue2);
        }

        .section-subtitle {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .count-badge {
            padding: 4px 9px;
            border: 1px solid #dbeafe;
            border-radius: 6px;
            background: #eff6ff;
            color: var(--blue2);
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Kartu bagian / seksi */
        .division-card {
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fcfdff;
        }

        .division-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .division-info {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 0;
        }

        .icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #eaf1ff;
            color: var(--blue2);
        }

        .icon-box svg {
            width: 15px;
            height: 15px;
        }

        .division-name {
            font-size: 12px;
            font-weight: 700;
        }

        .division-description {
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        .division-total {
            text-align: right;
            white-space: nowrap;
            color: #64748b;
            font-size: 10px;
        }

        .division-total strong {
            margin-right: 3px;
            color: var(--blue2);
            font-size: 17px;
            font-weight: 800;
        }

        .pill {
            display: inline-block;
            padding: 2px 8px;
            margin-top: 4px;
            border: 1px solid #dbeafe;
            border-radius: 5px;
            background: #eff6ff;
            color: var(--blue2);
            font-size: 9px;
            font-weight: 600;
        }

        .progress-track {
            width: 100%;
            height: 6px;
            margin: 14px 0 10px;
            overflow: hidden;
            border-radius: 20px;
            background: #e5e7eb;
        }

        .progress-bar {
            height: 100%;
            border-radius: 20px;
            background: var(--blue2);
        }

        .progress-bar.gray {
            background: #64748b;
        }

        .division-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            color: var(--muted);
            font-size: 10px;
        }

        .division-footer strong {
            margin-left: 6px;
            color: var(--text);
        }

        /* Kartu tahapan / jenjang */
        .education-card {
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fafbfc;
        }

        .education-top,
        .education-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .education-name {
            font-size: 11px;
            font-weight: 700;
        }

        .education-total {
            color: var(--blue2);
            font-size: 11px;
            font-weight: 700;
        }

        .education-bottom {
            color: var(--muted);
            font-size: 10px;
        }

        .education-card .progress-track {
            margin: 10px 0;
        }

        /* Jadwal wawancara */
        .queue-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 11px 12px;
            border: 1px solid var(--border);
            border-radius: 11px;
        }

        .queue-person {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .queue-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #eaf1ff;
            color: var(--blue2);
            font-size: 11px;
            font-weight: 700;
        }

        .queue-name {
            overflow: hidden;
            color: #334155;
            font-size: 11px;
            font-weight: 700;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .queue-detail {
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        .queue-status {
            padding: 5px 8px;
            border-radius: 6px;
            background: #fff7ed;
            color: var(--orange);
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .empty-state {
            padding: 24px 12px;
            border: 1px dashed #dce2ea;
            border-radius: 11px;
            background: #fcfdff;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.7;
            text-align: center;
        }

        .empty-state svg {
            width: 24px;
            height: 24px;
            margin-bottom: 8px;
        }

        .empty-state p {
            margin: 0;
        }

        .footer-note {
            margin: 4px 0 0;
            color: #94a3b8;
            font-size: 10px;
            text-align: center;
        }

        /* ================= LAYAR SEDANG ================= */
        @media (max-width: 1150px) {
            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .dashboard-grid {
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

            .welcome {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 520px) {
            .topbar-title {
                font-size: 13px;
            }

            .user-info {
                display: none;
            }

            .welcome h1 {
                font-size: 20px;
            }

            .welcome-actions {
                flex-wrap: wrap;
            }

            .summary-grid {
                gap: 10px;
            }

            .summary-value {
                font-size: 22px;
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
        'users' => '<circle cx="9" cy="8" r="3.5"></circle><path d="M2.5 20v-1a6.5 6.5 0 0 1 13 0v1"></path><path d="M16 5.5a3 3 0 0 1 0 5.5M18.5 20v-1a5 5 0 0 0-3-4.6"></path>',
        'doc' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5M9 13h6M9 17h6"></path>',
        'badge' => '<circle cx="12" cy="9" r="5"></circle><path d="m8.5 13.5-1.5 7.5 5-3 5 3-1.5-7.5"></path>',
        'history' => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"></path><path d="M3 3v5h5M12 7v5l3 2"></path>',
        'help' => '<circle cx="12" cy="12" r="9"></circle><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.4-1 1-1 1.7"></path><circle cx="12" cy="17" r=".5"></circle>',
        'logout' => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="m16 17 5-5-5-5M21 12H9"></path>',
        'bell' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>',
        'filter' => '<path d="M3 5h18M6 12h12M10 19h4"></path>',
        'chart' => '<path d="M4 20V10M10 20V4M16 20v-8M22 20H2"></path>',
        'building' => '<rect x="5" y="3" width="14" height="18" rx="1.5"></rect><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2"></path>',
        'cap' => '<path d="M22 9 12 4 2 9l10 5 10-5z"></path><path d="M6 11.5V16c0 1.2 2.7 3 6 3s6-1.8 6-3v-4.5"></path><path d="M22 9v6"></path>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M3 10h18M8 3v4M16 3v4"></path>',
        'checksq' => '<rect x="3" y="3" width="18" height="18" rx="3"></rect><path d="m8 12 3 3 5-6"></path>',
        'chat' => '<path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.4A8 8 0 1 1 21 12z"></path>',
        'usercheck' => '<circle cx="9" cy="8" r="3.5"></circle><path d="M2.5 20v-1a6.5 6.5 0 0 1 13 0v1"></path><path d="m16 11 2 2 4-4"></path>',
        'xcircle' => '<circle cx="12" cy="12" r="9"></circle><path d="m9 9 6 6M15 9l-6 6"></path>',
        'okcircle' => '<circle cx="12" cy="12" r="9"></circle><path d="m8.5 12 2.5 2.5 4.5-5"></path>',
        'download' => '<path d="M12 4v12M7 11l5 5 5-5M4 20h16"></path>',
        'inbox' => '<path d="M4 13h4l1.5 3h5L16 13h4"></path><path d="M4 13 6 5h12l2 8v6H4z"></path>',
    ];

    $svg = fn (string $name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($icons[$name] ?? '') . '</svg>';

    // Inisial avatar: 2 huruf (mis. "Tata Usaha" -> TU)
    $inisial = collect(preg_split('/\s+/', trim($admin->nama ?? 'Admin')))
        ->filter()->take(2)
        ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
        ->implode('');

    $jumlahMahasiswa = (int) ($komposisiJenjang['MAHASISWA'] ?? 0);
    $jumlahSmk = (int) ($komposisiJenjang['SMK'] ?? 0);
    $jumlahSemua = $jumlahMahasiswa + $jumlahSmk;

    // Tautan segmented "Jenjang" (periode tetap terbawa)
    $linkJenjang = fn (string $nilai) => route('admin-upt.dashboard', array_filter([
        'periode' => $periodeId ?? null,
        'jenjang' => $nilai,
    ]));

    // Jumlah per jenjang hanya ditampilkan jika filter "Semua" (agar angkanya tidak menyesatkan)
    $tampilJumlah = ($jenjang ?? 'SEMUA') === 'SEMUA';
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
                <div class="brand-sub">UPT TIKP</div>
            </div>
        </div>

        <nav class="nav" aria-label="Menu utama">
            <a href="{{ route('admin-upt.dashboard') }}" class="nav-link active" aria-current="page">
                {!! $svg('grid') !!} Dashboard
            </a>
            <a href="{{ route('admin-upt.wawancara') }}" class="nav-link">
                {!! $svg('users') !!} Seleksi Wawancara
            </a>
            <a href="{{ route('admin-upt.surat-penerimaan') }}" class="nav-link">
                {!! $svg('doc') !!} Surat Penerimaan
            </a>
            <a href="{{ route('admin-upt.sertifikat') }}" class="nav-link">
                {!! $svg('badge') !!} Penerbitan Sertifikat
            </a>
            <a href="{{ route('admin-upt.riwayat') }}" class="nav-link">
                {!! $svg('history') !!}
                Riwayat
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
                        <div class="user-name">{{ $admin->nama ?? 'Admin UPT TIKP' }}</div>
                        <div class="user-role">{{ $admin->unit_kerja ?? 'UPT TIKP' }}</div>
                    </div>
                    <div class="avatar">{{ $inisial ?: 'A' }}</div>
                </div>
            </div>
        </header>

        <main class="content">

            {{-- ========== SAMBUTAN ========== --}}
            <section class="panel welcome">
                <div>
                    <div class="tag-row">
                        <span class="tag-blue">
                            <span class="dot"></span>
                            Admin UPT TIKP
                            @if ($periodeAktif)
                                • Periode {{ $periodeAktif->nama_periode }}
                            @endif
                        </span>
                        <span class="tag-gray">UPT TIKP</span>
                    </div>

                    <h1>Selamat {{ $sapaan }}, {{ $admin->nama ?? 'Admin' }}!</h1>

                    <p>
                        Selamat datang di dashboard operasional magang UPT TIKP.
                        Pantau pengajuan peserta, proses wawancara, hasil seleksi,
                        dan distribusi penempatan peserta magang.
                    </p>
                </div>

                <div class="welcome-actions">
                    <a href="#distribusi" class="btn btn-light">Lihat Distribusi</a>
                    <a href="#antrean" class="btn btn-primary">
                        {!! $svg('chat') !!} Antrean Wawancara ({{ $antreanWawancara }})
                    </a>
                </div>
            </section>

            {{-- ========== FILTER ========== --}}
            <section class="panel filter-panel">
                <form action="{{ route('admin-upt.dashboard') }}" method="GET" class="filter-form">
                    <input type="hidden" name="jenjang" value="{{ $jenjang ?? 'SEMUA' }}">

                    <span class="filter-title">{!! $svg('filter') !!} Filter Dashboard</span>

                    <label for="periode" class="filter-label">Periode:</label>

                    <select name="periode" id="periode" class="select" onchange="this.form.submit()">
                        @forelse ($daftarPeriode as $periode)
                            <option
                                value="{{ $periode->id_periode }}"
                                {{ (int) $periodeId === (int) $periode->id_periode ? 'selected' : '' }}
                            >
                                {{ $periode->nama_periode }} ({{ mb_strtolower($periode->status_tampilan) }})
                            </option>
                        @empty
                            <option value="">Belum ada periode</option>
                        @endforelse
                    </select>

                    <noscript><button type="submit" class="btn btn-primary">Terapkan</button></noscript>

                    <span class="filter-label">Jenjang:</span>

                    <span class="segmented" role="group" aria-label="Filter jenjang">
                        <a href="{{ $linkJenjang('SEMUA') }}"
                           class="{{ ($jenjang ?? 'SEMUA') === 'SEMUA' ? 'active' : '' }}">
                            Semua{{ $tampilJumlah ? ' (' . $jumlahSemua . ')' : '' }}
                        </a>
                        <a href="{{ $linkJenjang('MAHASISWA') }}"
                           class="{{ ($jenjang ?? '') === 'MAHASISWA' ? 'active' : '' }}">
                            Mahasiswa{{ $tampilJumlah ? ' (' . $jumlahMahasiswa . ')' : '' }}
                        </a>
                        <a href="{{ $linkJenjang('SMK') }}"
                           class="{{ ($jenjang ?? '') === 'SMK' ? 'active' : '' }}">
                            SMK{{ $tampilJumlah ? ' (' . $jumlahSmk . ')' : '' }}
                        </a>
                    </span>
                </form>

                <span class="sync-pill"><span class="dot"></span> Data Dashboard</span>
            </section>

            {{-- ========== RINGKASAN ========== --}}
            <section class="summary-grid">

                <article class="summary-card">
                    <div class="summary-top">
                        <span class="summary-label">TOTAL PENGAJUAN UPT</span>
                        <span class="summary-icon">{!! $svg('checksq') !!}</span>
                    </div>
                    <div class="summary-value">{{ number_format($totalPengajuan, 0, ',', '.') }}</div>
                    <div class="summary-note">
                        {!! $svg('okcircle') !!} Seluruh pengajuan pada filter terpilih
                    </div>
                </article>

                <article class="summary-card">
                    <div class="summary-top">
                        <span class="summary-label">ANTREAN WAWANCARA</span>
                        <span class="summary-icon" style="color:var(--orange);">{!! $svg('chat') !!}</span>
                    </div>
                    <div class="summary-value">{{ number_format($antreanWawancara, 0, ',', '.') }}</div>
                    <div class="summary-note warning">Menunggu penjadwalan wawancara</div>
                </article>

                <article class="summary-card accepted">
                    <div class="summary-top">
                        <span class="summary-label">PESERTA DITERIMA</span>
                        <span class="summary-icon">{!! $svg('usercheck') !!}</span>
                    </div>
                    <div class="summary-value">{{ number_format($pesertaDiterima, 0, ',', '.') }}</div>
                    <div class="summary-note">{{ $persentaseDiterima }}% dari pengajuan yang sudah diputuskan</div>
                </article>

                <article class="summary-card">
                    <div class="summary-top">
                        <span class="summary-label">DITOLAK / GUGUR</span>
                        <span class="summary-icon" style="color:#94a3b8;">{!! $svg('xcircle') !!}</span>
                    </div>
                    <div class="summary-value">{{ number_format($pesertaDitolak, 0, ',', '.') }}</div>
                    <div class="summary-note">Pengajuan dengan status ditolak</div>
                </article>

            </section>

            {{-- ========== GRID UTAMA ========== --}}
            <div class="dashboard-grid">

                {{-- ---------- KOLOM KIRI ---------- --}}
                <div class="column">

                    {{-- Distribusi per bagian / seksi --}}
                    <section class="panel section-panel" id="distribusi">
                        <div class="section-heading">
                            <div>
                                <h2 class="section-title">{!! $svg('chart') !!} Pendaftar per Bagian dan Seksi UPT TIKP</h2>
                                <p class="section-subtitle">Sebaran peminat magang berdasarkan sub-unit penempatan UPT TIKP</p>
                            </div>
                            <span class="count-badge">{{ $totalPengajuan }} Pendaftar</span>
                        </div>

                        @php
                            $totalDistribusi = $distribusiBidang->sum('total_pendaftar');
                        @endphp

                        <div class="list">
                            @forelse ($distribusiBidang as $bidang)
                                @php
                                    $persentaseBidang = $totalDistribusi > 0
                                        ? round(($bidang->total_pendaftar / $totalDistribusi) * 100, 1)
                                        : 0;

                                    // Opsional: tampil jika data kuota tersedia pada hasil query
                                    $kuota = $bidang->kuota ?? null;
                                    $terisi = (int) ($bidang->terisi ?? $bidang->total_diterima ?? 0);
                                @endphp

                                <div class="division-card">
                                    <div class="division-top">
                                        <div class="division-info">
                                            <div class="icon-box">{!! $svg('building') !!}</div>
                                            <div>
                                                <div class="division-name">{{ $bidang->nama_sub_unit }}</div>
                                                <div class="division-description">
                                                    {{ $bidang->deskripsi ?? 'Sub-unit penempatan UPT TIKP' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="division-total">
                                            <strong>{{ $bidang->total_pendaftar }}</strong> Pendaftar
                                            <br>
                                            <span class="pill">{{ str_replace('.', ',', (string) $persentaseBidang) }}% dari total</span>
                                        </div>
                                    </div>

                                    <div class="progress-track">
                                        <div class="progress-bar" style="width: {{ $persentaseBidang }}%"></div>
                                    </div>

                                    <div class="division-footer">
                                        @if (! is_null($kuota))
                                            <span>Kuota: <strong>{{ $kuota }} Kursi</strong></span>
                                            <span class="pill" style="margin-top:0;">
                                                {{ $terisi }} terisi • sisa {{ max(0, $kuota - $terisi) }}
                                            </span>
                                        @else
                                            <span>Jumlah pengajuan</span>
                                            <span>{{ $bidang->total_pendaftar }} pengajuan</span>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">
                                    {!! $svg('inbox') !!}
                                    <p>Belum ada data distribusi penempatan.</p>
                                    <p>Data akan muncul setelah pengajuan memiliki sub-unit penempatan.</p>
                                </div>
                            @endforelse
                        </div>
                    </section>

                    {{-- Ringkasan tahapan --}}
                    <section class="panel section-panel">
                        <div class="section-heading">
                            <div>
                                <h2 class="section-title">{!! $svg('doc') !!} Ringkasan Tahapan Pengajuan</h2>
                                <p class="section-subtitle">Jumlah pengajuan berdasarkan status proses</p>
                            </div>
                        </div>

                        @php
                            $tahapanPengajuan = [
                                ['nama' => 'Diajukan',      'jumlah' => $pengajuanMenunggu, 'warna' => '#64748b'],
                                ['nama' => 'Terverifikasi', 'jumlah' => $antreanWawancara,  'warna' => '#ea580c'],
                                ['nama' => 'Wawancara',     'jumlah' => $jadwalWawancara,   'warna' => '#0a56d6'],
                                ['nama' => 'Diterima',      'jumlah' => $pesertaDiterima,   'warna' => '#16a34a'],
                                ['nama' => 'Ditolak',       'jumlah' => $pesertaDitolak,    'warna' => '#dc2626'],
                            ];
                        @endphp

                        <div class="list">
                            @foreach ($tahapanPengajuan as $tahap)
                                @php
                                    $persentaseTahap = $totalPengajuan > 0
                                        ? round(($tahap['jumlah'] / $totalPengajuan) * 100)
                                        : 0;
                                @endphp

                                <div class="education-card">
                                    <div class="education-top">
                                        <span class="education-name">{{ $tahap['nama'] }}</span>
                                        <span class="education-total" style="color:{{ $tahap['warna'] }};">
                                            {{ $tahap['jumlah'] }} pengajuan
                                        </span>
                                    </div>

                                    <div class="progress-track">
                                        <div class="progress-bar"
                                             style="width:{{ $persentaseTahap }}%;background:{{ $tahap['warna'] }};"></div>
                                    </div>

                                    <div class="education-bottom">
                                        <span>Persentase dari seluruh pengajuan</span>
                                        <span>{{ $persentaseTahap }}%</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                {{-- ---------- KOLOM KANAN ---------- --}}
                <div class="column">

                    {{-- Komposisi jenjang --}}
                    <section class="panel section-panel">
                        <div class="section-heading">
                            <div>
                                <h2 class="section-title">{!! $svg('cap') !!} Komposisi Jenjang Pendidikan</h2>
                                <p class="section-subtitle">Asal jenjang pendidikan peserta UPT TIKP</p>
                            </div>
                            <span class="count-badge">{{ $jumlahSemua }} Peserta</span>
                        </div>

                        @php
                            $persenMahasiswa = $jumlahSemua > 0 ? round(($jumlahMahasiswa / $jumlahSemua) * 100) : 0;
                            $persenSmk = $jumlahSemua > 0 ? round(($jumlahSmk / $jumlahSemua) * 100) : 0;

                            // Opsional: rincian per jenjang jika controller mengirim $komposisiDetail
                            $detailMhs = $komposisiDetail['MAHASISWA'] ?? null;
                            $detailSmk = $komposisiDetail['SMK'] ?? null;
                        @endphp

                        <div class="list">
                            <div class="education-card">
                                <div class="education-top">
                                    <span class="education-name">Perguruan Tinggi (D3/D4/S1)</span>
                                    <span class="education-total">{{ $jumlahMahasiswa }} peserta ({{ $persenMahasiswa }}%)</span>
                                </div>

                                <div class="progress-track">
                                    <div class="progress-bar" style="width:{{ $persenMahasiswa }}%;"></div>
                                </div>

                                <div class="education-bottom">
                                    @if ($detailMhs)
                                        <span>Diterima: {{ $detailMhs['diterima'] ?? 0 }}</span>
                                        <span>Sedang seleksi: {{ $detailMhs['seleksi'] ?? 0 }}</span>
                                    @else
                                        <span>Mahasiswa S1</span>
                                        <span>{{ $persenMahasiswa }}%</span>
                                    @endif
                                </div>
                            </div>

                            <div class="education-card">
                                <div class="education-top">
                                    <span class="education-name">SMK / Vokasi</span>
                                    <span class="education-total" style="color:#475569;">{{ $jumlahSmk }} peserta ({{ $persenSmk }}%)</span>
                                </div>

                                <div class="progress-track">
                                    <div class="progress-bar gray" style="width:{{ $persenSmk }}%;"></div>
                                </div>

                                <div class="education-bottom">
                                    @if ($detailSmk)
                                        <span>Diterima: {{ $detailSmk['diterima'] ?? 0 }}</span>
                                        <span>Sedang seleksi: {{ $detailSmk['seleksi'] ?? 0 }}</span>
                                    @else
                                        <span>Jenjang SMK</span>
                                        <span>{{ $persenSmk }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- Jadwal wawancara terdekat --}}
                    <section class="panel section-panel" id="antrean">
                        <div class="section-heading">
                            <div>
                                <h2 class="section-title">{!! $svg('calendar') !!} Jadwal Wawancara Terdekat</h2>
                                <p class="section-subtitle">Daftar jadwal wawancara yang akan dilaksanakan</p>
                            </div>
                            <span class="count-badge">{{ $jadwalTerdekat->count() }} Jadwal</span>
                        </div>

                        <div class="list">
                            @forelse ($jadwalTerdekat as $jadwal)
                                <div class="queue-item">
                                    <div class="queue-person">
                                        <div class="queue-avatar">
                                            {{ strtoupper(substr($jadwal->pengajuan?->peserta?->nama ?? 'P', 0, 1)) }}
                                        </div>
                                        <div style="min-width:0;">
                                            <div class="queue-name">
                                                {{ $jadwal->pengajuan?->peserta?->nama ?? 'Nama peserta tidak tersedia' }}
                                            </div>
                                            <div class="queue-detail">
                                                {{ $jadwal->tanggal->translatedFormat('d M Y') }}
                                                • {{ substr((string) $jadwal->waktu, 0, 5) }}
                                            </div>
                                        </div>
                                    </div>

                                    <span class="queue-status">Dijadwalkan</span>
                                </div>
                            @empty
                                <div class="empty-state">
                                    {!! $svg('calendar') !!}
                                    <p>Belum ada jadwal wawancara terdekat.</p>
                                    <p>Jadwal yang sudah dibuat akan ditampilkan di bagian ini.</p>
                                </div>
                            @endforelse
                        </div>
                    </section>
                </div>
            </div>

            <p class="footer-note">
                Sistem Informasi Manajemen Magang — Dinas Pendidikan Provinsi Jawa Timur
            </p>

        </main>
    </div>
</div>
</body>
</html>