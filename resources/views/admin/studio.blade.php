<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
  <title>سهپاتیفای استودیو | Sehpatify Admin & Lyrics Studio Pro</title>
  <meta name="theme-color" content="#0A0A0F" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="مرکز مدیریت جامع، مانیتورینگ زنده و استودیو فوق‌پیشرفته همگام‌ساز لیریکس سهپاتیفای" />

  <!-- Google Fonts: Vazirmatn -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <style>
    :root {
      --brand: #10B954;
      --brand-glow: rgba(16, 185, 84, 0.45);
      --brand-glow-lg: rgba(16, 185, 84, 0.22);
      --brand-dim: rgba(16, 185, 84, 0.12);
      --brand-hover: #15d261;
      --brand-active: #0d9643;

      --bg: #0A0A0F;
      --surface: #12121A;
      --surface-card: #161622;
      --surface-elevated: #1D1D2B;
      --surface-hover: #232336;
      --surface-glass: rgba(18, 18, 26, 0.88);
      --surface-glass-heavy: rgba(10, 10, 15, 0.95);

      --text: #F5F5F7;
      --muted: #9696A3;
      --muted-dark: #636372;
      --border: rgba(255, 255, 255, 0.08);
      --border-light: rgba(255, 255, 255, 0.14);
      --border-brand: rgba(16, 185, 84, 0.45);

      --accent-blue: #38bdf8;
      --accent-purple: #c084fc;
      --accent-amber: #fbbf24;
      --accent-red: #f87171;

      --sidebar-w: 260px;
      --topbar-h: 70px;
      --mobile-bar-h: 64px;

      --radius-sm: 8px;
      --radius-md: 14px;
      --radius-lg: 20px;
      --radius-full: 9999px;
      --shadow-sm: 0 4px 14px rgba(0, 0, 0, 0.28);
      --shadow-md: 0 8px 26px rgba(0, 0, 0, 0.45);
      --shadow-lg: 0 16px 42px rgba(0, 0, 0, 0.65);
      --transition-fast: 0.16s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-normal: 0.26s cubic-bezier(0.4, 0, 0.2, 1);
    }

    *, *::before, *::after, 
    html, body, button, input, select, textarea, span, p, a, div, h1, h2, h3, h4, h5, h6 {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      outline: none;
      -webkit-tap-highlight-color: transparent;
      font-family: 'Vazirmatn', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    }

    html, body {
      width: 100%;
      height: 100%;
      background-color: var(--bg);
      color: var(--text);
      font-size: 14px;
      line-height: 1.6;
      overflow: hidden;
      direction: rtl;
      user-select: none;
      -webkit-font-smoothing: antialiased;
    }

    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: transparent;
    }
    ::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.14);
      border-radius: var(--radius-full);
    }
    ::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.28);
    }

    #admin-app {
      display: flex;
      width: 100vw;
      height: 100vh;
      height: 100dvh;
      overflow: hidden;
      position: relative;
    }

    .admin-sidebar {
      width: var(--sidebar-w);
      height: 100%;
      background: var(--surface);
      border-left: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      flex-shrink: 0;
      z-index: 45;
      padding: 16px 14px 20px;
      overflow-y: auto;
      transition: transform var(--transition-normal);
    }

    .sidebar-backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.65);
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      z-index: 44;
    }
    .sidebar-backdrop.active {
      display: block;
    }

    .brand-header {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 6px 8px 18px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 14px;
      text-decoration: none;
      color: inherit;
      cursor: pointer;
    }

    .brand-logo-wrap {
      position: relative;
      width: 44px;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, rgba(16, 185, 84, 0.2), rgba(18, 18, 26, 0.95));
      border: 1px solid var(--border-brand);
      border-radius: 12px;
      box-shadow: 0 0 16px var(--brand-glow-lg);
      flex-shrink: 0;
    }

    .brand-logo-svg {
      width: 32px;
      height: 32px;
      filter: drop-shadow(0 0 6px rgba(16, 185, 84, 0.8));
    }

    .brand-text-col {
      display: flex;
      flex-direction: column;
    }

    .brand-title {
      font-size: 16.5px;
      font-weight: 800;
      letter-spacing: -0.2px;
      color: #FFFFFF;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .brand-badge {
      font-size: 9.5px;
      font-weight: 800;
      background: var(--brand);
      color: #052410;
      padding: 2px 6px;
      border-radius: 4px;
    }

    .brand-sub {
      font-size: 10.5px;
      font-weight: 600;
      color: var(--brand);
    }

    .nav-label {
      font-size: 10.5px;
      font-weight: 700;
      color: var(--muted-dark);
      text-transform: uppercase;
      letter-spacing: 0.6px;
      padding: 12px 10px 6px;
    }

    .nav-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 3px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 12px;
      border-radius: var(--radius-md);
      color: var(--muted);
      font-weight: 500;
      font-size: 13.5px;
      cursor: pointer;
      transition: all var(--transition-fast);
      position: relative;
      min-height: 44px;
      border: 1px solid transparent;
      text-decoration: none;
    }

    .nav-link:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.04);
      border-color: rgba(255, 255, 255, 0.06);
    }

    .nav-link.active {
      color: var(--text);
      background: linear-gradient(90deg, rgba(16, 185, 84, 0.18) 0%, rgba(16, 185, 84, 0.04) 100%);
      font-weight: 700;
      border-color: rgba(16, 185, 84, 0.28);
    }

    .nav-link.active::after {
      content: '';
      position: absolute;
      right: 0;
      top: 18%;
      bottom: 18%;
      width: 3.5px;
      background: var(--brand);
      border-radius: 4px 0 0 4px;
      box-shadow: 0 0 10px var(--brand);
    }

    .nav-link svg {
      width: 19px;
      height: 19px;
      stroke-width: 2;
      flex-shrink: 0;
    }

    .nav-link.active svg {
      stroke: var(--brand);
    }

    .nav-badge-pill {
      margin-right: auto;
      background: rgba(255, 255, 255, 0.08);
      color: var(--muted);
      font-size: 11px;
      padding: 1px 7px;
      border-radius: var(--radius-full);
      font-weight: 600;
    }

    .nav-badge-pill.brand {
      background: var(--brand-dim);
      color: var(--brand);
      border: 1px solid var(--border-brand);
    }

    .sidebar-divider {
      height: 1px;
      background: var(--border);
      margin: 12px 8px;
    }

    .studio-status-box {
      margin-top: auto;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 12px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
    }

    .studio-status-text {
      display: flex;
      flex-direction: column;
    }

    .studio-status-title {
      font-size: 11.5px;
      font-weight: 700;
      color: var(--text);
    }

    .studio-status-desc {
      font-size: 10px;
      color: var(--muted);
      direction: ltr;
      text-align: right;
    }

    .status-dot-pulse {
      width: 8px;
      height: 8px;
      background: var(--brand);
      border-radius: 50%;
      box-shadow: 0 0 10px var(--brand);
      position: relative;
    }
    .status-dot-pulse::after {
      content: '';
      position: absolute;
      inset: -3px;
      border-radius: 50%;
      border: 1.5px solid var(--brand);
      animation: pulseAnim 2s infinite ease-out;
    }
    @keyframes pulseAnim {
      0% { transform: scale(0.8); opacity: 1; }
      100% { transform: scale(2.2); opacity: 0; }
    }

    .main-wrapper {
      flex: 1;
      height: 100%;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      position: relative;
      background: radial-gradient(circle at 90% 0%, rgba(16, 185, 84, 0.08) 0%, transparent 45%), var(--bg);
    }

    .topbar {
      height: var(--topbar-h);
      padding: 0 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
      background: var(--surface-glass);
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
      border-bottom: 1px solid var(--border);
      position: sticky;
      top: 0;
      z-index: 35;
      flex-shrink: 0;
    }

    .topbar-left-zone {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .mobile-menu-toggle {
      display: none;
      width: 40px;
      height: 40px;
      border-radius: var(--radius-sm);
      background: var(--surface-card);
      border: 1px solid var(--border);
      color: var(--text);
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    .page-title-box {
      display: flex;
      flex-direction: column;
    }

    .page-title-main {
      font-size: 16px;
      font-weight: 800;
      color: var(--text);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .page-title-breadcrumb {
      font-size: 11px;
      color: var(--muted);
    }

    .search-container {
      flex: 1;
      max-width: 400px;
      position: relative;
    }

    .search-input {
      width: 100%;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border);
      color: var(--text);
      font-size: 13px;
      padding: 9px 40px 9px 16px;
      border-radius: var(--radius-full);
      transition: all var(--transition-normal);
    }

    .search-input:focus {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--brand);
      box-shadow: 0 0 16px var(--brand-glow-lg);
    }

    .search-icon-pos {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      pointer-events: none;
    }

    .topbar-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .btn-quick-action {
      background: var(--brand);
      color: #052410;
      font-weight: 700;
      font-size: 12.5px;
      padding: 8px 16px;
      border-radius: var(--radius-full);
      border: none;
      display: flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
      transition: all var(--transition-fast);
      box-shadow: 0 2px 14px var(--brand-glow);
      white-space: nowrap;
    }

    .btn-quick-action:hover {
      background: var(--brand-hover);
      transform: translateY(-1px);
    }

    .admin-profile-pill {
      display: flex;
      align-items: center;
      gap: 9px;
      padding: 4px 12px 4px 6px;
      border-radius: var(--radius-full);
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border);
      cursor: pointer;
      transition: all var(--transition-fast);
    }

    .admin-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: linear-gradient(135deg, #10B954, #084c24);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      color: #fff;
      font-size: 13px;
    }

    .admin-info-col {
      display: flex;
      flex-direction: column;
      line-height: 1.25;
      text-align: right;
    }

    .admin-name {
      font-size: 12.5px;
      font-weight: 700;
      color: var(--text);
    }

    .admin-role {
      font-size: 9.5px;
      font-weight: 700;
      color: var(--brand);
    }

    .content-viewport {
      flex: 1;
      overflow-y: auto;
      overflow-x: hidden;
      padding: 24px;
      scroll-behavior: smooth;
    }

    .admin-panel-view {
      display: none;
      animation: viewFadeIn 0.24s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .admin-panel-view.active {
      display: block;
    }

    @keyframes viewFadeIn {
      from { opacity: 0; transform: translateY(6px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .section-title-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      gap: 12px;
      flex-wrap: wrap;
    }

    .section-title {
      font-size: 18px;
      font-weight: 800;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-title::before {
      content: '';
      display: inline-block;
      width: 4px;
      height: 18px;
      background: var(--brand);
      border-radius: 2px;
      box-shadow: 0 0 10px var(--brand);
    }

    .panel-card {
      background: var(--surface-card);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 18px;
      margin-bottom: 20px;
    }

    .stats-kpi-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
      margin-bottom: 24px;
    }

    .kpi-card {
      background: var(--surface-card);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 18px;
      position: relative;
      overflow: hidden;
      transition: all var(--transition-normal);
    }

    .kpi-card:hover {
      border-color: var(--border-light);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .kpi-card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .kpi-title {
      font-size: 12.5px;
      color: var(--muted);
      font-weight: 600;
    }

    .kpi-icon-box {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.04);
      color: var(--brand);
    }

    .kpi-value {
      font-size: 26px;
      font-weight: 900;
      color: var(--text);
      line-height: 1.2;
      margin-bottom: 6px;
      display: flex;
      align-items: baseline;
      gap: 6px;
    }

    .kpi-subtext {
      font-size: 11.5px;
      color: var(--muted);
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .kpi-trend-up {
      color: var(--brand);
      font-weight: 700;
    }

    .table-controls-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 16px;
      flex-wrap: wrap;
    }

    .filter-chips-row {
      display: flex;
      gap: 8px;
      overflow-x: auto;
      scrollbar-width: none;
      -webkit-overflow-scrolling: touch;
    }

    .filter-chip {
      background: var(--surface-elevated);
      border: 1px solid var(--border);
      padding: 6px 14px;
      border-radius: var(--radius-full);
      font-size: 12px;
      font-weight: 600;
      color: var(--muted);
      cursor: pointer;
      white-space: nowrap;
      transition: all var(--transition-fast);
      flex-shrink: 0;
    }

    .filter-chip.active, .filter-chip:hover {
      background: var(--brand-dim);
      border-color: var(--border-brand);
      color: var(--brand);
    }

    /* =========================================================
       طراحی مدرن، کارت‌مانند و هماهنگ جدول آهنگ‌ها و جداول ادمین
       ========================================================= */
    .table-wrapper {
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      border-radius: var(--radius-md);
    }

    .admin-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 6px;
      text-align: right;
      min-width: 740px;
    }

    .admin-table thead tr th {
      padding: 12px 14px;
      font-size: 11.5px;
      font-weight: 700;
      color: var(--muted);
      background: transparent;
      border-bottom: 1px solid var(--border);
      white-space: nowrap;
      letter-spacing: 0.3px;
    }

    .admin-table tbody tr {
      background: rgba(255, 255, 255, 0.015);
      border-radius: 10px;
      transition: all var(--transition-fast);
    }

    .admin-table tbody tr:hover {
      background: rgba(255, 255, 255, 0.045);
      transform: translateY(-1.5px);
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.35);
    }

    .admin-table td {
      padding: 11px 14px;
      font-size: 13px;
      color: var(--text);
      border-top: 1px solid rgba(255, 255, 255, 0.03);
      border-bottom: 1px solid rgba(255, 255, 255, 0.03);
      vertical-align: middle;
      white-space: nowrap;
    }

    .admin-table tbody tr td:first-child {
      border-right: 1px solid rgba(255, 255, 255, 0.03);
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
    }

    .admin-table tbody tr td:last-child {
      border-left: 1px solid rgba(255, 255, 255, 0.03);
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;
    }

    .admin-table tbody tr:hover td {
      border-color: rgba(16, 185, 84, 0.18);
    }

    .track-meta-cell {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .track-cover-thumb {
      width: 44px;
      height: 44px;
      border-radius: 10px;
      object-fit: cover;
      background: #1e1e2d;
      flex-shrink: 0;
      border: 1px solid var(--border-light);
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.4);
      transition: transform var(--transition-fast);
    }

    .admin-table tbody tr:hover .track-cover-thumb {
      transform: scale(1.05);
      border-color: var(--border-brand);
    }

    .badge-status {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 4px 10px;
      border-radius: var(--radius-full);
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.2px;
    }

    .badge-status.synced {
      background: rgba(16, 185, 84, 0.15);
      color: var(--brand);
      border: 1px solid var(--border-brand);
      box-shadow: 0 0 10px rgba(16, 185, 84, 0.15);
    }

    .badge-status.empty {
      background: rgba(239, 68, 68, 0.12);
      color: var(--accent-red);
      border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .badge-status.hi-res {
      background: rgba(56, 189, 248, 0.12);
      color: var(--accent-blue);
      border: 1px solid rgba(56, 189, 248, 0.3);
    }

    .table-actions-cell {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .btn-table-action {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border);
      color: var(--muted);
      width: 34px;
      height: 34px;
      border-radius: var(--radius-sm);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all var(--transition-fast);
      flex-shrink: 0;
    }

    .btn-table-action:hover {
      background: rgba(255, 255, 255, 0.09);
      color: var(--text);
      border-color: var(--border-light);
    }

    .btn-table-action.lyrics-action {
      color: var(--brand);
      background: var(--brand-dim);
      border-color: var(--border-brand);
      width: auto;
      padding: 0 12px;
      height: 34px;
      font-size: 11.5px;
      font-weight: 700;
      gap: 5px;
      border-radius: var(--radius-full);
    }

    .btn-table-action.lyrics-action:hover {
      background: var(--brand);
      color: #052410;
      box-shadow: 0 0 14px var(--brand-glow);
    }

    .btn-table-action.danger:hover {
      background: rgba(239, 68, 68, 0.18);
      color: var(--accent-red);
      border-color: rgba(239, 68, 68, 0.4);
    }

    /* استودیو لیریکس */
    .lyrics-studio-container {
      display: grid;
      grid-template-columns: 1fr 360px;
      gap: 20px;
      height: calc(100vh - 160px);
      min-height: 580px;
    }

    .studio-editor-card {
      background: var(--surface-card);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      min-width: 0;
    }

    .studio-header {
      padding: 14px 18px;
      border-bottom: 1px solid var(--border);
      background: rgba(255, 255, 255, 0.02);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      flex-wrap: wrap;
    }

    .studio-track-select-box {
      display: flex;
      align-items: center;
      gap: 10px;
      flex: 1;
      min-width: 200px;
      max-width: 440px;
    }

    .select-styled {
      background: var(--surface-elevated);
      border: 1px solid var(--border);
      color: var(--text);
      padding: 8px 12px;
      border-radius: var(--radius-sm);
      font-size: 13px;
      cursor: pointer;
      width: 100%;
    }

    .studio-player-toolbar {
      padding: 14px 18px;
      background: rgba(10, 10, 15, 0.85);
      border-bottom: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .player-upper-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
      flex-wrap: wrap;
    }

    .studio-playback-ctrls {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
    }

    .studio-timer-display {
      font-size: 19px;
      font-weight: 900;
      color: var(--brand);
      direction: ltr;
      letter-spacing: 1px;
      font-family: monospace !important;
      background: rgba(16, 185, 84, 0.08);
      padding: 4px 10px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border-brand);
      text-shadow: 0 0 10px var(--brand-glow);
    }

    .btn-studio-ctrl {
      background: var(--surface-elevated);
      border: 1px solid var(--border);
      color: var(--text);
      width: 38px;
      height: 38px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all var(--transition-fast);
      flex-shrink: 0;
    }

    .btn-studio-ctrl:hover {
      background: rgba(255, 255, 255, 0.1);
      border-color: var(--border-light);
    }

    .btn-studio-play {
      width: 44px;
      height: 44px;
      background: var(--brand);
      color: #052410;
      border: none;
      box-shadow: 0 0 16px var(--brand-glow);
    }

    .btn-studio-play:hover {
      background: var(--brand-hover);
      transform: scale(1.05);
    }

    .speed-selector-group {
      display: flex;
      align-items: center;
      background: var(--surface-elevated);
      border: 1px solid var(--border);
      border-radius: var(--radius-full);
      padding: 2px;
      gap: 2px;
    }

    .speed-btn {
      background: transparent;
      border: none;
      color: var(--muted);
      font-size: 11px;
      font-weight: 700;
      padding: 4px 8px;
      border-radius: var(--radius-full);
      cursor: pointer;
    }

    .speed-btn.active {
      background: var(--surface-card);
      color: var(--brand);
    }

    .btn-stamp-live {
      background: linear-gradient(135deg, #10B954 0%, #0c833b 100%);
      color: #052410;
      font-weight: 800;
      font-size: 13px;
      padding: 9px 20px;
      border-radius: var(--radius-full);
      border: none;
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      box-shadow: 0 0 20px var(--brand-glow);
      transition: all var(--transition-fast);
      touch-action: manipulation;
      white-space: nowrap;
    }

    .btn-stamp-live:hover, .btn-stamp-live:active {
      transform: scale(0.98);
      box-shadow: 0 0 28px var(--brand-glow);
    }

    .studio-progress-track {
      position: relative;
      height: 8px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: var(--radius-full);
      cursor: pointer;
      direction: ltr;
    }

    .studio-progress-fill {
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 0%;
      background: var(--brand);
      border-radius: var(--radius-full);
      box-shadow: 0 0 10px var(--brand);
      pointer-events: none;
    }

    .studio-lines-scroll {
      flex: 1;
      overflow-y: auto;
      padding: 12px;
    }

    .lyrics-row-card {
      display: grid;
      grid-template-columns: 88px 1fr 1fr 140px;
      gap: 8px;
      align-items: center;
      padding: 8px 12px;
      border-radius: var(--radius-sm);
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid var(--border);
      margin-bottom: 8px;
      transition: all var(--transition-fast);
    }

    .lyrics-row-card:hover {
      background: rgba(255, 255, 255, 0.04);
      border-color: var(--border-light);
    }

    .lyrics-row-card.active-line {
      background: rgba(16, 185, 84, 0.12);
      border-color: var(--brand);
      box-shadow: 0 0 16px var(--brand-glow-lg);
    }

    .input-timestamp {
      background: var(--surface-elevated);
      border: 1px solid var(--border);
      color: var(--brand);
      font-weight: 700;
      font-size: 13px;
      padding: 7px 6px;
      border-radius: var(--radius-sm);
      text-align: center;
      direction: ltr;
      width: 100%;
    }

    .input-lyric-txt {
      background: var(--surface-elevated);
      border: 1px solid var(--border);
      color: var(--text);
      font-size: 13px;
      padding: 7px 12px;
      border-radius: var(--radius-sm);
      width: 100%;
      transition: border-color var(--transition-fast);
    }

    .input-lyric-txt:focus {
      border-color: var(--brand);
    }

    .nudge-btn {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--border);
      color: var(--muted);
      font-size: 10px;
      font-weight: 700;
      padding: 4px 6px;
      border-radius: 4px;
      cursor: pointer;
    }
    .nudge-btn:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.1);
    }

    .studio-preview-card {
      background: var(--surface-card);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      min-width: 0;
    }

    .preview-header {
      padding: 16px;
      border-bottom: 1px solid var(--border);
      font-weight: 800;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .preview-cover-box {
      padding: 14px 16px;
      display: flex;
      align-items: center;
      gap: 14px;
      background: rgba(255, 255, 255, 0.015);
      border-bottom: 1px solid var(--border);
    }

    .preview-art {
      width: 54px;
      height: 54px;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: var(--shadow-sm);
      flex-shrink: 0;
    }

    .karaoke-stream-viewport {
      flex: 1;
      overflow-y: auto;
      padding: 24px 18px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 18px;
      text-align: center;
      background: radial-gradient(circle at 50% 50%, rgba(16, 185, 84, 0.04) 0%, transparent 80%);
    }

    .karaoke-line {
      font-size: 15px;
      font-weight: 600;
      color: var(--muted-dark);
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
      line-height: 1.7;
      cursor: pointer;
    }

    .karaoke-line.active {
      color: var(--brand);
      font-size: 18px;
      font-weight: 900;
      text-shadow: 0 0 20px var(--brand-glow);
      transform: scale(1.05);
    }

    .karaoke-line .karaoke-trans {
      display: block;
      font-size: 11px;
      font-weight: 400;
      color: var(--muted);
      margin-top: 2px;
      direction: ltr;
    }

    .modal-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.76);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      z-index: 100;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 16px;
    }

    .modal-backdrop.open {
      display: flex;
      animation: modalFadeIn 0.2s ease;
    }

    @keyframes modalFadeIn {
      from { opacity: 0; transform: scale(0.96); }
      to { opacity: 1; transform: scale(1); }
    }

    .modal-container {
      background: var(--surface-card);
      border: 1px solid var(--border-light);
      border-radius: var(--radius-lg);
      max-width: 600px;
      width: 100%;
      max-height: 90vh;
      overflow-y: auto;
      padding: 24px;
      box-shadow: var(--shadow-lg);
      position: relative;
    }

    .modal-head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      padding-bottom: 12px;
      border-bottom: 1px solid var(--border);
    }

    .modal-title {
      font-size: 17px;
      font-weight: 800;
    }

    .form-group {
      margin-bottom: 16px;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .form-label {
      font-size: 12px;
      font-weight: 700;
      color: var(--muted);
    }

    .form-control {
      background: var(--surface-elevated);
      border: 1px solid var(--border);
      color: var(--text);
      font-size: 13.5px;
      padding: 10px 14px;
      border-radius: var(--radius-sm);
      transition: border-color var(--transition-fast);
      width: 100%;
    }

    .form-control:focus {
      border-color: var(--brand);
      box-shadow: 0 0 12px var(--brand-glow-lg);
    }

    .form-row-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }

    .modal-actions {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 12px;
      margin-top: 24px;
      padding-top: 16px;
      border-top: 1px solid var(--border);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.05);
      color: var(--text);
      font-weight: 600;
      font-size: 13px;
      padding: 10px 20px;
      border-radius: var(--radius-full);
      border: 1px solid var(--border);
      cursor: pointer;
      transition: var(--transition-fast);
    }

    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.09);
    }

    .mobile-bottom-bar {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: calc(var(--mobile-bar-h) + env(safe-area-inset-bottom, 0px));
      padding-bottom: env(safe-area-inset-bottom, 0px);
      background: var(--surface-glass-heavy);
      backdrop-filter: blur(28px);
      -webkit-backdrop-filter: blur(28px);
      border-top: 1px solid var(--border);
      z-index: 50;
      justify-content: space-around;
      align-items: center;
    }

    .mobile-bar-btn {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 4px;
      color: var(--muted);
      text-decoration: none;
      font-size: 10.5px;
      font-weight: 600;
      cursor: pointer;
      min-width: 50px;
      height: 100%;
      position: relative;
    }

    .mobile-bar-btn.active {
      color: var(--brand);
    }

    .mobile-bar-btn svg {
      width: 20px;
      height: 20px;
      stroke-width: 2;
    }

    .toast-container {
      position: fixed;
      bottom: 24px;
      left: 24px;
      z-index: 120;
      display: flex;
      flex-direction: column;
      gap: 10px;
      pointer-events: none;
    }

    .toast-message {
      background: var(--surface-elevated);
      border: 1px solid var(--border-brand);
      color: var(--text);
      padding: 12px 20px;
      border-radius: var(--radius-full);
      box-shadow: var(--shadow-lg), 0 0 16px var(--brand-glow-lg);
      font-size: 13px;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 10px;
      pointer-events: auto;
      animation: toastIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    @keyframes toastIn {
      from { transform: translateY(16px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    @media (max-width: 1024px) {
      .lyrics-studio-container {
        grid-template-columns: 1fr;
        height: auto;
      }
      .studio-preview-card {
        height: 340px;
      }
      .stats-kpi-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .admin-sidebar {
        position: fixed;
        right: 0;
        top: 0;
        bottom: 0;
        width: 270px;
        transform: translateX(100%);
        box-shadow: -8px 0 32px rgba(0, 0, 0, 0.7);
        z-index: 55;
      }
      .admin-sidebar.open {
        transform: translateX(0);
      }
      .mobile-menu-toggle {
        display: flex;
      }
      .mobile-bottom-bar {
        display: flex;
      }
      .topbar {
        padding: 0 14px;
        height: 60px;
      }
      .admin-info-col {
        display: none;
      }
      .search-container {
        display: none;
      }
      .content-viewport {
        padding: 14px 14px calc(var(--mobile-bar-h) + 24px);
      }
      .stats-kpi-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
      }
      .kpi-card {
        padding: 12px;
      }
      .kpi-value {
        font-size: 20px;
      }
      .quick-banner {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 12px !important;
        padding: 14px !important;
      }
      .quick-banner button {
        width: 100%;
        justify-content: center;
      }
      .form-row-2 {
        grid-template-columns: 1fr;
      }
      .lyrics-row-card {
        grid-template-columns: 78px 1fr auto;
        gap: 6px;
        padding: 6px 8px;
      }
      .lyrics-row-card .input-lyric-en {
        display: none;
      }
      .nudge-btn {
        display: none;
      }
      .toast-container {
        bottom: calc(var(--mobile-bar-h) + 16px);
        left: 12px;
        right: 12px;
      }
    }

    @media (max-width: 480px) {
      .stats-kpi-grid {
        grid-template-columns: 1fr;
      }
      .btn-stamp-live {
        padding: 8px 14px;
        font-size: 11.5px;
      }
    }
  </style>
</head>
<body>

  <div id="admin-app">
    <div class="sidebar-backdrop" id="sidebar-backdrop" onclick="toggleMobileSidebar()"></div>

    <!-- Sidebar Navigation -->
    <aside class="admin-sidebar" id="admin-sidebar">
      <a class="brand-header" onclick="switchAdminView('dashboard')" title="سهپاتیفای استودیو">
        <div class="brand-logo-wrap">
          <svg class="brand-logo-svg" viewBox="0 0 320 240" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <linearGradient id="pulseGlowGrad" x1="40" y1="40" x2="280" y2="200" gradientUnits="userSpaceOnUse">
                <stop offset="0%" stop-color="#4ADE80" />
                <stop offset="50%" stop-color="#10B954" />
                <stop offset="100%" stop-color="#056B30" />
              </linearGradient>
            </defs>
            <path d="M 68 126 C 68 148, 86 172, 116 172 C 146 172, 142 64, 160 64 C 178 64, 174 172, 204 172 C 234 172, 252 148, 252 126" 
                  stroke="url(#pulseGlowGrad)" stroke-width="26" stroke-linecap="round" stroke-linejoin="round" />
            <circle cx="68" cy="126" r="14" fill="#4ADE80" />
            <circle cx="252" cy="126" r="14" fill="#10B954" />
          </svg>
        </div>
        <div class="brand-text-col">
          <div class="brand-title">
            <span>SEHPATIFY</span>
            <span class="brand-badge">PRO</span>
          </div>
          <div class="brand-sub">استودیو مدیریت و لیریکس</div>
        </div>
      </a>

      <div class="nav-label">مدیریت و کنترل</div>
      <ul class="nav-list">
        <li>
          <a class="nav-link active" id="nav-dashboard" onclick="switchAdminView('dashboard')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            <span>داشبورد آمار</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-tracks" onclick="switchAdminView('tracks')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            <span>مدیریت آهنگ‌ها</span>
            <span class="nav-badge-pill" id="badge-track-count">۰</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-lyrics" onclick="switchAdminView('lyrics')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
            <span>استودیو لیریکس</span>
            <span class="nav-badge-pill brand">زنده</span>
          </a>
        </li>
      </ul>

      <div class="nav-label">مجموعه‌ها و تعامل</div>
      <ul class="nav-list">
        <li>
          <a class="nav-link" id="nav-playlists" onclick="switchAdminView('playlists')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <span>پلی‌لیست‌ها</span>
            <span class="nav-badge-pill" id="badge-playlist-count">۰</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-artists" onclick="switchAdminView('artists')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            <span>هنرمندان</span>
            <span class="nav-badge-pill" id="badge-artists-count">۰</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-users" onclick="switchAdminView('users')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <span>مدیریت کاربران</span>
            <span class="nav-badge-pill" id="badge-users-count">۰</span>
          </a>
        </li>
      </ul>

      <div class="sidebar-divider"></div>

      <div class="studio-status-box">
        <div class="studio-status-text">
          <span class="studio-status-title">سرور FLAC مستر</span>
          <span class="studio-status-desc">96kHz / 24-bit Lossless</span>
        </div>
        <div class="status-dot-pulse" title="سیستم استریم آماده به کار"></div>
      </div>
    </aside>

    <main class="main-wrapper">
      <header class="topbar">
        <div class="topbar-left-zone">
          <button class="mobile-menu-toggle" onclick="toggleMobileSidebar()" title="منو">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
          <div class="page-title-box">
            <div class="page-title-main" id="topbar-title">داشبورد و آمار تحلیلی</div>
            <div class="page-title-breadcrumb" id="topbar-breadcrumb">سهپاتیفای استودیو / پنل مدیریت اصلی</div>
          </div>
        </div>

        <div class="search-container">
          <span class="search-icon-pos">
            <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          </span>
          <input type="text" class="search-input" id="admin-global-search" placeholder="جستجوی سریع آهنگ، آرتیست، آلبوم..." oninput="handleAdminGlobalSearch(this.value)" />
        </div>

        <div class="topbar-actions">
          <button class="btn-quick-action" onclick="openAddTrackModal()">
            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
            <span>آهنگ جدید</span>
          </button>

          <div class="admin-profile-pill">
            <div class="admin-avatar">س</div>
            <div class="admin-info-col">
              <span class="admin-name">سهراب پارسا</span>
              <span class="admin-role">سوپرادمین استودیو</span>
            </div>
          </div>
        </div>
      </header>

      <div class="content-viewport" id="viewport">

        <!-- VIEW 1: DASHBOARD -->
        <section class="admin-panel-view active" id="view-dashboard">
          <div class="stats-kpi-grid">
            <div class="kpi-card">
              <div class="kpi-card-header">
                <span class="kpi-title">مجموع قطعات ثبت شده</span>
                <div class="kpi-icon-box">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                </div>
              </div>
              <div class="kpi-value" id="kpi-total-tracks">۰</div>
              <div class="kpi-subtext">
                <span class="kpi-trend-up">۱۰۰٪</span>
                <span>فرمت استودیو مستر Lossless</span>
              </div>
            </div>

            <div class="kpi-card">
              <div class="kpi-card-header">
                <span class="kpi-title">لیریکس‌های همگام‌سازی شده</span>
                <div class="kpi-icon-box" style="color:var(--accent-purple);">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                </div>
              </div>
              <div class="kpi-value" id="kpi-synced-lyrics">۰ / ۰</div>
              <div class="kpi-subtext">
                <span class="kpi-trend-up" id="kpi-synced-percent">۰٪ پوشش</span>
                <span>تایم‌استمپ میلی‌ثانیه‌ای</span>
              </div>
            </div>

            <div class="kpi-card">
              <div class="kpi-card-header">
                <span class="kpi-title">مجموع استریم‌ها</span>
                <div class="kpi-icon-box" style="color:var(--accent-blue);">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
              </div>
              <div class="kpi-value" id="kpi-total-streams">۰</div>
              <div class="kpi-subtext">
                <span class="kpi-trend-up">+۲۱.۵٪</span>
                <span>رشد نسبت به ماه قبل</span>
              </div>
            </div>

            <div class="kpi-card">
              <div class="kpi-card-header">
                <span class="kpi-title">هنرمندان و پلی‌لیست‌ها</span>
                <div class="kpi-icon-box" style="color:var(--accent-amber);">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
              </div>
              <div class="kpi-value" id="kpi-total-artists">۰</div>
              <div class="kpi-subtext">
                <span class="kpi-trend-up" id="kpi-total-playlists">۰ پلی‌لیست</span>
                <span>ثبت شده در سیستم</span>
              </div>
            </div>
          </div>

          <div class="panel-card">
            <div class="section-title-row" style="margin-bottom:14px;">
              <div>
                <h3 class="section-title">نمودار حجم استریم و پخش زنده</h3>
                <span style="font-size:11.5px; color:var(--muted);">تحلیل آماری شنوندگان Lossless</span>
              </div>
              <div class="filter-chips-row">
                <button class="filter-chip active" id="chart-btn-7d" onclick="updateChartPeriod('7d')">۷ روز اخیر</button>
                <button class="filter-chip" id="chart-btn-30d" onclick="updateChartPeriod('30d')">۳۰ روز اخیر</button>
                <button class="filter-chip" id="chart-btn-12m" onclick="updateChartPeriod('12m')">سالانه</button>
              </div>
            </div>

            <div style="position:relative; width:100%; height:220px;" id="chart-wrapper">
              <canvas id="streams-analytics-canvas" style="width:100%; height:100%; display:block;"></canvas>
            </div>
          </div>

          <div class="quick-banner" style="background: linear-gradient(135deg, rgba(16, 185, 84, 0.16) 0%, rgba(22, 22, 34, 0.95) 100%); border:1px solid var(--border-brand); border-radius:var(--radius-md); padding:18px 22px; display:flex; align-items:center; justify-content:space-between; gap:16px; margin-bottom:24px;">
            <div>
              <div style="font-weight:800; font-size:15px; color:#fff; margin-bottom:4px;">استودیو فوق‌حرفه‌ای لیریکس همگام‌ساز (Timed Lyrics Studio)</div>
              <div style="font-size:12px; color:var(--muted);">با کلید فضا (Space) یا دکمه لمسی، زمان دقیق هر مصرع را همزمان با پخش موسیقی میلی‌ثانیه‌ای نشانه بزنید.</div>
            </div>
            <button class="btn-quick-action" onclick="switchAdminView('lyrics')" style="padding:10px 22px;">
              <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
              <span>ورود به استودیو لیریکس</span>
            </button>
          </div>

          <div class="panel-card">
            <div class="section-title-row">
              <h3 class="section-title">برترین قطعات در حال پخش (Live Activity)</h3>
              <span class="badge-status synced">● متصل به دیتابیس</span>
            </div>
            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap:12px;" id="live-activity-grid"></div>
          </div>
        </section>

        <!-- VIEW 2: TRACKS MANAGEMENT -->
        <section class="admin-panel-view" id="view-tracks">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">مدیریت آهنگ‌ها و فایل‌های صوتی</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">ویرایش مشخصات، تنظیم کیفیت Lossless و همگام‌سازی لیریکس</p>
            </div>
            <div style="display:flex; gap:8px; flex-wrap:wrap;">
              <button class="btn-secondary" onclick="exportTracksJson()">خروجی JSON</button>
              <button class="btn-quick-action" onclick="openAddTrackModal()">
                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                <span>افزودن آهنگ جدید</span>
              </button>
            </div>
          </div>

          <div class="panel-card">
            <div class="table-controls-bar">
              <div class="filter-chips-row">
                <button class="filter-chip active" onclick="filterTracksTable('all', this)">همه آهنگ‌ها</button>
                <button class="filter-chip" onclick="filterTracksTable('synced', this)">دارای لیریکس</button>
                <button class="filter-chip" onclick="filterTracksTable('no-lyrics', this)">فاقد لیریکس</button>
                <button class="filter-chip" onclick="filterTracksTable('lossless', this)">FLAC Lossless</button>
              </div>

              <div style="display:flex; align-items:center; gap:8px;">
                <input type="text" class="form-control" style="width:230px; padding:7px 12px; font-size:12px;" placeholder="جستجوی نام آهنگ، خواننده یا آلبوم..." oninput="searchTracksLocal(this.value)" />
              </div>
            </div>

            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th style="width: 45px;">#</th>
                    <th>نام ترانه و کاور</th>
                    <th>خواننده</th>
                    <th>آلبوم</th>
                    <th style="width: 100px;">مدت زمان</th>
                    <th>کیفیت</th>
                    <th>وضعیت لیریکس</th>
                    <th>استریم</th>
                    <th style="width: 120px;">عملیات</th>
                  </tr>
                </thead>
                <tbody id="tracks-table-body"></tbody>
              </table>
            </div>
          </div>
        </section>

        <!-- VIEW 3: LYRICS STUDIO -->
        <section class="admin-panel-view" id="view-lyrics">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">استودیو پیشرفته همگام‌سازی لیریکس (Timed Lyrics Studio)</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">با فشردن کلید Space یا دکمه لمسی، زمان سطرها را با خواننده نشانه بزنید</p>
            </div>

            <div style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
              <button class="btn-secondary" onclick="openBulkLyricsModal()">ورود متن کلی (Bulk)</button>
              <button class="btn-secondary" onclick="openLrcModal()">LRC ایمپورت/اکسپورت</button>
              <button class="btn-quick-action" onclick="saveCurrentTrackLyrics()">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>ذخیره نهایی لیریکس</span>
              </button>
            </div>
          </div>

          <div class="lyrics-studio-container">
            <div class="studio-editor-card">
              <div class="studio-header">
                <div class="studio-track-select-box">
                  <span style="font-size:12.5px; font-weight:700; color:var(--muted); white-space:nowrap;">آهنگ هدف:</span>
                  <select class="select-styled" id="studio-track-picker" onchange="onStudioTrackChange(this.value)"></select>
                </div>

                <div style="display:flex; align-items:center; gap:8px;">
                  <button class="btn-secondary" style="padding:6px 12px; font-size:11.5px;" onclick="addNewLyricRow()">+ سطر جدید</button>
                  <button class="btn-secondary" style="padding:6px 12px; font-size:11.5px; color:var(--accent-red);" onclick="clearAllLyrics()">پاک‌سازی</button>
                </div>
              </div>

              <div class="studio-player-toolbar">
                <div class="player-upper-row">
                  <div class="studio-playback-ctrls">
                    <button class="btn-studio-ctrl" onclick="jumpStudioAudio(-5)" title="۵ ثانیه عقب (کلید ←)">
                      <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M11 18V6l-8.5 6 8.5 6zm.5-6l8.5 6V6l-8.5 6z"/></svg>
                    </button>
                    
                    <button class="btn-studio-ctrl btn-studio-play" id="studio-play-btn" onclick="toggleStudioAudio()" title="پخش / توقف">
                      <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>

                    <button class="btn-studio-ctrl" onclick="jumpStudioAudio(5)" title="۵ ثانیه جلو (کلید →)">
                      <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M4 18l8.5-6L4 6v12zm9-12v12l8.5-6L13 6z"/></svg>
                    </button>

                    <div class="studio-timer-display" id="studio-time-display">00:00.00</div>

                    <div class="speed-selector-group">
                      <button class="speed-btn" onclick="setStudioSpeed(0.5, this)">0.5x</button>
                      <button class="speed-btn" onclick="setStudioSpeed(0.75, this)">0.75x</button>
                      <button class="speed-btn active" onclick="setStudioSpeed(1.0, this)">1.0x</button>
                    </div>
                  </div>

                  <button class="btn-stamp-live" onclick="stampCurrentTimeOnActiveRow()" title="ثبت زمان کنونی برای سطر انتخاب‌شده (کلید Space)">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>ثبت تایم لحظه‌ای (Space)</span>
                  </button>
                </div>

                <div class="studio-progress-track" id="studio-scrubber" onclick="onStudioScrubberClick(event)">
                  <div class="studio-progress-fill" id="studio-progress-fill"></div>
                </div>
              </div>

              <div class="studio-lines-scroll" id="studio-lyrics-list"></div>
            </div>

            <div class="studio-preview-card">
              <div class="preview-header">
                <span>پیش‌نمایش زنده کارائوکه</span>
                <span style="font-size:11px; color:var(--brand); font-weight:700;">سینک خودکار</span>
              </div>

              <div class="preview-cover-box">
                <img class="preview-art" id="preview-track-art" src="" alt="" />
                <div style="min-width:0; overflow:hidden;">
                  <div style="font-weight:800; font-size:14px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;" id="preview-track-title">عنوان ترانه</div>
                  <div style="font-size:12px; color:var(--muted); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;" id="preview-track-artist">نام هنرمند</div>
                </div>
              </div>

              <div class="karaoke-stream-viewport" id="karaoke-preview-stream"></div>
            </div>
          </div>
        </section>

        <!-- VIEW 4: PLAYLISTS -->
        <section class="admin-panel-view" id="view-playlists">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">مدیریت پلی‌لیست‌ها و مجموعه‌ها</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">ساخت پلی‌لیست‌های اختصاصی و تنظیم چینش قطعات</p>
            </div>
            <button class="btn-quick-action" onclick="openAddPlaylistModal()">
              <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              <span>پلی‌لیست جدید</span>
            </button>
          </div>
          <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap:18px;" id="playlists-admin-grid"></div>
        </section>

        <!-- VIEW 5: ARTISTS -->
        <section class="admin-panel-view" id="view-artists">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">مدیریت هنرمندان، خوانندگان و آرتیست‌های رسمی</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">اعطای نشان تاییدیه، پایش شنوندگان و سبک‌های فعالیت</p>
            </div>
            <button class="btn-quick-action" onclick="openAddArtistModal()">
              <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              <span>افزودن آرتیست رسمی</span>
            </button>
          </div>
          <div class="panel-card">
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>هنرمند</th>
                    <th>وضعیت تاییدیه</th>
                    <th>شنوندگان ماهانه</th>
                    <th>تعداد قطعات</th>
                    <th>سبک‌ها / ژانرها</th>
                    <th>عملیات</th>
                  </tr>
                </thead>
                <tbody id="artists-table-body"></tbody>
              </table>
            </div>
          </div>
        </section>

        <!-- VIEW 6: USERS -->
        <section class="admin-panel-view" id="view-users">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">مدیریت کاربران و دسترسی‌ها</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">کنترل دسترسی مدیران، مسدودسازی و مدیریت مشخصات کاربران</p>
            </div>
            <button class="btn-quick-action" onclick="openAddUserModal()">
              <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              <span>ثبت کاربر جدید</span>
            </button>
          </div>

          <div class="panel-card">
            <div class="table-controls-bar">
              <div class="filter-chips-row">
                <button class="filter-chip active" onclick="filterUsersTable('all', this)">همه کاربران</button>
                <button class="filter-chip" onclick="filterUsersTable('active', this)">کاربران فعال</button>
                <button class="filter-chip" onclick="filterUsersTable('blocked', this)">مسدود شده</button>
                <button class="filter-chip" onclick="filterUsersTable('admin', this)">مدیران</button>
              </div>

              <div style="display:flex; align-items:center; gap:8px;">
                <input type="text" class="form-control" style="width:230px; padding:7px 12px; font-size:12px;" placeholder="جستجوی نام یا ایمیل کاربر..." oninput="searchUsersLocal(this.value)" id="users-search-input" />
              </div>
            </div>

            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>نام کاربر</th>
                    <th>ایمیل</th>
                    <th>نقش دسترسی</th>
                    <th>تاریخ عضویت</th>
                    <th>وضعیت حساب</th>
                    <th>عملیات</th>
                  </tr>
                </thead>
                <tbody id="users-table-body"></tbody>
              </table>
            </div>
          </div>
        </section>

      </div>
    </main>

    <nav class="mobile-bottom-bar">
      <div class="mobile-bar-btn active" id="mob-dashboard" onclick="switchAdminView('dashboard')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
        <span>داشبورد</span>
      </div>
      <div class="mobile-bar-btn" id="mob-tracks" onclick="switchAdminView('tracks')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
        <span>آهنگ‌ها</span>
      </div>
      <div class="mobile-bar-btn" id="mob-lyrics" onclick="switchAdminView('lyrics')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
        <span>لیریکس</span>
      </div>
      <div class="mobile-bar-btn" id="mob-playlists" onclick="switchAdminView('playlists')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        <span>پلی‌لیست</span>
      </div>
      <div class="mobile-bar-btn" id="mob-artists" onclick="switchAdminView('artists')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        <span>هنرمندان</span>
      </div>
    </nav>

    <!-- MODAL 1: ADD / EDIT TRACK -->
    <div class="modal-backdrop" id="modal-track">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title" id="modal-track-title">افزودن آهنگ جدید به سهپاتیفای</h3>
          <button class="btn-table-action" onclick="closeModal('modal-track')">✕</button>
        </div>

        <input type="hidden" id="track-form-id" />

        <div class="form-group" style="background: rgba(16, 185, 84, 0.08); padding: 12px; border-radius: var(--radius-sm); border: 1px dashed var(--border-brand);">
          <label class="form-label" style="color: var(--brand); font-weight: 800;">فایل صوتی ترانه (MP3, FLAC, WAV) *</label>
          <input type="file" class="form-control" id="track-form-audio-file" accept="audio/*" onchange="detectAudioDuration(this)" />
          <span style="font-size:11px; color:var(--muted); margin-top:4px;">در صورت ویرایش، اگر مایل به تعویض فایل صوتی نیستید این فیلد را خالی بگذارید.</span>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">عنوان ترانه *</label>
            <input type="text" class="form-control" id="track-form-name" placeholder="مثال: شیدایی" />
          </div>
          <div class="form-group">
            <label class="form-label">خواننده / هنرمند ترانه *</label>
            <select class="form-control" id="track-form-artist-id">
              <option value="">-- انتخاب خواننده از لیست --</option>
            </select>
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">نام آلبوم</label>
            <input type="text" class="form-control" id="track-form-album" placeholder="مثال: نسیم وصل" />
          </div>
          <div class="form-group">
            <label class="form-label">ژانر موسیقی</label>
            <select class="form-control" id="track-form-genre">
              <option>سنتی معاصر</option>
              <option>تلفیقی و الکترونیک</option>
              <option>آلترناتیو</option>
              <option>پاپ مدرن</option>
              <option>امبینت و ریلکس</option>
            </select>
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">مدت زمان (دقیقه:ثانیه)</label>
            <input type="text" class="form-control" id="track-form-duration" placeholder="03:45" value="03:45" readonly />
            <input type="hidden" id="track-form-duration-sec" value="225" />
          </div>
          <div class="form-group">
            <label class="form-label">کیفیت استودیو</label>
            <select class="form-control" id="track-form-hires">
              <option value="true">FLAC 24-bit Lossless</option>
              <option value="false">MP3 320kbps</option>
            </select>
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">انتخاب فایل کاور تصویر</label>
            <input type="file" class="form-control" id="track-form-cover-file" accept="image/*" />
          </div>
          <div class="form-group">
            <label class="form-label">یا آدرس اینترنتی کاور (URL)</label>
            <input type="text" class="form-control" id="track-form-cover" value="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500&auto=format&fit=crop&q=80" />
          </div>
        </div>

        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-track')">انصراف</button>
          <button class="btn-quick-action" id="btn-save-track" onclick="saveTrackFromModal()">ذخیره قطعه</button>
        </div>
      </div>
    </div>

    <!-- MODAL 2: ADD / EDIT PLAYLIST -->
    <div class="modal-backdrop" id="modal-playlist">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title" id="modal-playlist-title">ساخت پلی‌لیست اختصاصی</h3>
          <button class="btn-table-action" onclick="closeModal('modal-playlist')">✕</button>
        </div>

        <input type="hidden" id="playlist-form-id" />

        <div class="form-group">
          <label class="form-label">عنوان پلی‌لیست *</label>
          <input type="text" class="form-control" id="playlist-form-title" placeholder="مثال: شب‌های تهران" />
        </div>

        <div class="form-group">
          <label class="form-label">توضیحات پلی‌لیست</label>
          <input type="text" class="form-control" id="playlist-form-desc" placeholder="توضیحاتی درباره این مجموعه..." />
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">انتخاب فایل کاور پلی‌لیست</label>
            <input type="file" class="form-control" id="playlist-form-cover-file" accept="image/*" />
          </div>
          <div class="form-group">
            <label class="form-label">یا آدرس اینترنتی تصویر (URL)</label>
            <input type="text" class="form-control" id="playlist-form-cover" placeholder="https://..." value="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500" />
          </div>
        </div>

        <div class="form-group" style="margin-top: 10px;">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 6px;">
            <label class="form-label" style="font-weight: 800; color: var(--brand);">انتخاب آهنگ‌های این پلی‌لیست:</label>
            <span style="font-size:11px; color:var(--muted);" id="playlist-selected-count">۰ قطعه انتخاب شده</span>
          </div>
          <div id="playlist-tracks-selector" style="max-height: 200px; overflow-y: auto; background: var(--surface-elevated); border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 8px; display: flex; flex-direction: column; gap: 6px;">
          </div>
        </div>

        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-playlist')">انصراف</button>
          <button class="btn-quick-action" id="btn-save-playlist" onclick="savePlaylistFromModal()">ساخت پلی‌لیست</button>
        </div>
      </div>
    </div>

    <!-- MODAL 3: ADD / EDIT ARTIST -->
    <div class="modal-backdrop" id="modal-artist">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title" id="modal-artist-title">افزودن آرتیست رسمی</h3>
          <button class="btn-table-action" onclick="closeModal('modal-artist')">✕</button>
        </div>

        <input type="hidden" id="artist-form-id" />

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">نام هنرمند / گروه *</label>
            <input type="text" class="form-control" id="artist-form-name" placeholder="مثال: همایون شجریان" />
          </div>
          <div class="form-group">
            <label class="form-label">تعداد شنوندگان تخمینی</label>
            <input type="text" class="form-control" id="artist-form-listeners" placeholder="مثال: ۲,۴۰۰,۰۰۰" value="۸۵۰,۰۰۰" />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">بیوگرافی و معرفی هنرمند</label>
          <textarea class="form-control" id="artist-form-bio" rows="3" placeholder="توضیحات مختصر درباره پیشینه و فعالیت هنرمند..."></textarea>
        </div>

        <div class="form-group">
          <label class="form-label" style="font-weight: 800; color: var(--brand);">سبک‌های موسیقی این هنرمند (امکان انتخاب چند سبک):</label>
          <div id="artist-genres-selector" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 8px; background: var(--surface-elevated); border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 10px; max-height: 140px; overflow-y: auto;">
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">انتخاب عکس پروفایل هنرمند</label>
            <input type="file" class="form-control" id="artist-form-image-file" accept="image/*" />
          </div>
          <div class="form-group">
            <label class="form-label">یا آدرس اینترنتی تصویر (URL)</label>
            <input type="text" class="form-control" id="artist-form-image-url" value="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500" />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">وضعیت نشان رسمی</label>
          <select class="form-control" id="artist-form-verified">
            <option value="true">دارای نشان تاییدیه (Verified)</option>
            <option value="false">عادی / بدون نشان</option>
          </select>
        </div>

        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-artist')">انصراف</button>
          <button class="btn-quick-action" id="btn-save-artist" onclick="saveArtistFromModal()">ثبت هنرمند</button>
        </div>
      </div>
    </div>

    <!-- MODAL 4: ADD / EDIT USER -->
    <div class="modal-backdrop" id="modal-user">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title" id="modal-user-title">تعریف کاربر جدید</h3>
          <button class="btn-table-action" onclick="closeModal('modal-user')">✕</button>
        </div>

        <input type="hidden" id="user-form-id" />

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">نام و نام خانوادگی *</label>
            <input type="text" class="form-control" id="user-form-name" placeholder="مثال: پویا دلجو" />
          </div>
          <div class="form-group">
            <label class="form-label">ایمیل *</label>
            <input type="email" class="form-control" id="user-form-email" placeholder="user@example.com" />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" id="user-password-label">کلمه عبور *</label>
            <input type="password" class="form-control" id="user-form-password" placeholder="حداقل ۶ کاراکتر" />
            <span style="font-size:11px; color:var(--muted); margin-top:2px;" id="user-password-hint"></span>
          </div>
          <div class="form-group">
            <label class="form-label">نقش دسترسی *</label>
            <select class="form-control" id="user-form-role">
              <option value="کاربر عادی">کاربر عادی</option>
              <option value="مدیر">مدیر سیستم</option>
            </select>
          </div>
        </div>

        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-user')">انصراف</button>
          <button class="btn-quick-action" id="btn-save-user" onclick="saveUserFromModal()">ثبت اطلاعات</button>
        </div>
      </div>
    </div>

    <!-- MODAL 5: BULK LYRICS PARSER -->
    <div class="modal-backdrop" id="modal-bulk-lyrics">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title" id="modal-bulk-lyrics-title">تبدیل متن ساده به خطوط همگام‌سازی</h3>
          <button class="btn-table-action" onclick="closeModal('modal-bulk-lyrics')">✕</button>
        </div>
        <div class="form-group">
          <label class="form-label">متن خام شعر را وارد کنید (هر سطر در یک خط):</label>
          <textarea class="form-control" id="bulk-lyrics-textarea" rows="8" placeholder="در هوایت بی قرارم روز و شب...&#10;سر ز پایت بر ندارم روز و شب..."></textarea>
        </div>
        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-bulk-lyrics')">انصراف</button>
          <button class="btn-quick-action" onclick="processBulkLyrics()">ایجاد خطوط لیریکس</button>
        </div>
      </div>
    </div>

    <!-- MODAL 6: LRC IMPORT / EXPORT -->
    <div class="modal-backdrop" id="modal-lrc">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title">ایمپورت / خروجی فرمت استاندارد LRC</h3>
          <button class="btn-table-action" onclick="closeModal('modal-lrc')">✕</button>
        </div>
        <div class="form-group">
          <label class="form-label">فرمت استاندارد تگ‌گذاری شده ([mm:ss.xx]شعر)</label>
          <textarea class="form-control" id="lrc-textarea" rows="8" style="font-family:monospace; direction:ltr; text-align:left; font-size:12px;"></textarea>
        </div>
        <div class="modal-actions" style="justify-content:space-between;">
          <button class="btn-secondary" onclick="copyLrcText()">کپی متن</button>
          <div style="display:flex; gap:8px;">
            <button class="btn-secondary" onclick="closeModal('modal-lrc')">بستن</button>
            <button class="btn-quick-action" onclick="applyLrcImport()">اعمال در استودیو</button>
          </div>
        </div>
      </div>
    </div>

    <div class="toast-container" id="toast-shelf"></div>

  </div>

  <script>
    localStorage.removeItem('sehpatify_playlists');
    localStorage.removeItem('sehpatify_artists');
    localStorage.removeItem('sehpatify_users');

    let DASHBOARD_STATS = null;
    let currentChartPeriod = '7d';

    let TRACKS_DB = [];
    let PLAYLISTS_DB = [];
    let ARTISTS_DB = [];
    let GENRES_DB = [];
    let USERS_DB = [];

    let currentUsersFilter = 'all';
    let currentUsersSearchQuery = '';

    let currentAdminView = 'dashboard';
    let selectedStudioTrackId = null;
    let studioIsPlaying = false;
    let studioCurrentTime = 0;
    let studioPlaybackRate = 1.0;
    let activeEditingLineIndex = 0;
    let realAudio = new Audio();

    function getSelectedTrackMaxDuration() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return 300;
      if (realAudio.duration && !isNaN(realAudio.duration) && isFinite(realAudio.duration) && realAudio.duration > 0) {
        return Math.floor(realAudio.duration);
      }
      return track.duration_sec || parseDurationToSeconds(track.duration || '03:30');
    }

    function switchAdminView(viewKey) {
      currentAdminView = viewKey;
      document.querySelectorAll('.admin-panel-view').forEach(panel => panel.classList.remove('active'));
      document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
      document.querySelectorAll('.mobile-bar-btn').forEach(btn => btn.classList.remove('active'));

      const targetView = document.getElementById(`view-${viewKey}`);
      if (targetView) targetView.classList.add('active');

      const targetNav = document.getElementById(`nav-${viewKey}`);
      if (targetNav) targetNav.classList.add('active');

      const targetMob = document.getElementById(`mob-${viewKey}`);
      if (targetMob) targetMob.classList.add('active');

      const titles = {
        dashboard: { title: "داشبورد و آمار تحلیلی", crumb: "سهپاتیفای استودیو / پنل مدیریت اصلی" },
        tracks: { title: "مدیریت آهنگ‌ها و فایل‌ها", crumb: "سهپاتیفای استودیو / مخزن صوت و متادیتا" },
        lyrics: { title: "استودیو همگام‌ساز لیریکس", crumb: "سهپاتیفای استودیو / ویرایشگر زنده کارائوکه" },
        playlists: { title: "مدیریت پلی‌لیست‌ها", crumb: "سهپاتیفای استودیو / کالکشن‌های عمومی و VIP" },
        artists: { title: "مدیریت هنرمندان", crumb: "سهپاتیفای استودیو / آرتیست‌های تایید شده" },
        users: { title: "مدیریت کاربران و دسترسی‌ها", crumb: "سهپاتیفای استودیو / اعضای فعال" }
      };

      if (titles[viewKey]) {
        document.getElementById('topbar-title').textContent = titles[viewKey].title;
        document.getElementById('topbar-breadcrumb').textContent = titles[viewKey].crumb;
      }

      document.getElementById('admin-sidebar').classList.remove('open');
      document.getElementById('sidebar-backdrop').classList.remove('active');
      const viewport = document.getElementById('viewport');
      if (viewport) viewport.scrollTo({ top: 0, behavior: 'smooth' });

      if (viewKey === 'lyrics') renderStudioView();
      if (viewKey === 'dashboard') drawStreamsChart(currentChartPeriod);
    }

    function toggleMobileSidebar() {
      const sidebar = document.getElementById('admin-sidebar');
      const backdrop = document.getElementById('sidebar-backdrop');
      sidebar.classList.toggle('open');
      backdrop.classList.toggle('active');
    }

    // ۱. واکشی خوانندگان و سبک‌ها
    async function fetchGenresAndArtists() {
      try {
        const [resGenres, resArtists] = await Promise.all([
          fetch('/api/genres'),
          fetch('/api/artists')
        ]);
        if (resGenres.ok) GENRES_DB = await resGenres.json();
        if (resArtists.ok) ARTISTS_DB = await resArtists.json();
      } catch (e) {
        console.warn('خطا در بارگذاری خوانندگان یا سبک‌ها');
      }
      renderArtistsAdmin();
      populateArtistDropdownInTrackModal();
    }

    function populateArtistDropdownInTrackModal(selectedArtistId = null) {
      const select = document.getElementById('track-form-artist-id');
      if (!select) return;

      if (!ARTISTS_DB || ARTISTS_DB.length === 0) {
        select.innerHTML = `<option value="">هنوز هنرمندی ثبت نشده (ابتدا از تب هنرمندان اضافه کنید)</option>`;
        return;
      }

      select.innerHTML = `<option value="">-- انتخاب خواننده از لیست --</option>` +
        ARTISTS_DB.map(a => `<option value="${a.id}" ${a.id == selectedArtistId ? 'selected' : ''}>${escapeHtml(a.name)}</option>`).join('');
    }

    function renderArtistsAdmin() {
      const tbody = document.getElementById('artists-table-body');
      if (!tbody) return;

      const badge = document.getElementById('badge-artists-count');
      if (badge) badge.textContent = ARTISTS_DB.length;

      if (!ARTISTS_DB || ARTISTS_DB.length === 0) {
        tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; padding:30px; color:var(--muted);">هنوز هنرمندی در دیتابیس ثبت نشده است. روی دکمه «افزودن آرتیست رسمی» کلیک کنید.</td></tr>`;
        return;
      }

      tbody.innerHTML = ARTISTS_DB.map(a => `
        <tr>
          <td>
            <div style="display:flex; align-items:center; gap:10px;">
              <img src="${a.image || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=80'}" style="width:40px; height:40px; border-radius:50%; object-fit:cover; flex-shrink:0;" />
              <div style="min-width:0;">
                <div style="font-weight:800; font-size:14px;">${escapeHtml(a.name)}</div>
                <div style="font-size:11px; color:var(--muted);">${a.bio ? escapeHtml(a.bio.slice(0, 35)) + '...' : ''}</div>
              </div>
            </div>
          </td>
          <td>
            <span class="badge-status ${a.verified ? 'synced' : 'empty'}">
              ${a.verified ? '✓ رسمی' : 'معمولی'}
            </span>
          </td>
          <td style="font-weight:700;">${a.listeners || '۰'} شنونده</td>
          <td><span style="color:var(--brand); font-weight:800;">${a.tracks_count || 0} قطعه</span></td>
          <td><span style="font-size:12px; color:var(--muted);">${escapeHtml(a.genre_names || 'عمومی')}</span></td>
          <td>
            <div class="table-actions-cell">
              <button class="btn-table-action" onclick="openEditArtistModal(${a.id})" title="ویرایش هنرمند">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
              </button>
              <button class="btn-table-action danger" onclick="deleteArtist(${a.id})" title="حذف هنرمند">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');
    }

    function renderGenresCheckboxes(selectedIds = []) {
      const container = document.getElementById('artist-genres-selector');
      if (!container) return;
      container.innerHTML = GENRES_DB.map(g => {
        const checked = selectedIds.includes(g.id) ? 'checked' : '';
        return `
          <label style="display:flex; align-items:center; gap:6px; font-size:12px; cursor:pointer;">
            <input type="checkbox" class="artist-genre-checkbox" value="${g.id}" ${checked} style="accent-color:var(--brand);" />
            <span>${escapeHtml(g.name)}</span>
          </label>
        `;
      }).join('');
    }

    function openAddArtistModal() {
      document.getElementById('modal-artist-title').textContent = "افزودن آرتیست رسمی";
      document.getElementById('artist-form-id').value = "";
      document.getElementById('artist-form-name').value = "";
      document.getElementById('artist-form-bio').value = "";
      document.getElementById('artist-form-listeners').value = "۵۰۰,۰۰۰";
      document.getElementById('artist-form-verified').value = "true";
      document.getElementById('artist-form-image-file').value = "";
      document.getElementById('artist-form-image-url').value = "https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500";
      document.getElementById('btn-save-artist').textContent = "ثبت هنرمند";
      renderGenresCheckboxes([]);
      openModal('modal-artist');
    }

    function openEditArtistModal(artistId) {
      const a = ARTISTS_DB.find(item => item.id === artistId);
      if (!a) return;

      document.getElementById('modal-artist-title').textContent = `ویرایش هنرمند: ${a.name}`;
      document.getElementById('artist-form-id').value = a.id;
      document.getElementById('artist-form-name').value = a.name;
      document.getElementById('artist-form-bio').value = a.bio || "";
      document.getElementById('artist-form-listeners').value = a.listeners || "";
      document.getElementById('artist-form-verified').value = a.verified ? "true" : "false";
      document.getElementById('artist-form-image-file').value = "";
      document.getElementById('artist-form-image-url').value = a.image || "";
      document.getElementById('btn-save-artist').textContent = "ذخیره تغییرات";

      const selectedIds = a.genres ? a.genres.map(g => g.id) : [];
      renderGenresCheckboxes(selectedIds);
      openModal('modal-artist');
    }

    async function saveArtistFromModal() {
      const artistId = document.getElementById('artist-form-id').value;
      const name = document.getElementById('artist-form-name').value.trim();

      if (!name) {
        showToast('نام هنرمند الزامی است.');
        return;
      }

      const saveBtn = document.getElementById('btn-save-artist');
      saveBtn.disabled = true;
      saveBtn.textContent = 'در حال ذخیره‌سازی...';

      const formData = new FormData();
      formData.append('name', name);
      formData.append('bio', document.getElementById('artist-form-bio').value.trim());
      formData.append('listeners', document.getElementById('artist-form-listeners').value.trim());
      formData.append('verified', document.getElementById('artist-form-verified').value);

      const fileInput = document.getElementById('artist-form-image-file');
      if (fileInput.files && fileInput.files[0]) {
        formData.append('image_file', fileInput.files[0]);
      } else {
        formData.append('image_url', document.getElementById('artist-form-image-url').value);
      }

      document.querySelectorAll('.artist-genre-checkbox:checked').forEach(cb => {
        formData.append('genre_ids[]', cb.value);
      });

      const endpoint = artistId ? `/api/admin/artists/${artistId}` : '/api/admin/artists';

      try {
        const res = await fetch(endpoint, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        });

        const data = await res.json().catch(() => null);
        if (!res.ok) throw new Error(data?.message || 'خطا در ثبت هنرمند');

        showToast(artistId ? 'مشخصات هنرمند به‌روز شد ✓' : `هنرمند «${data.name}» افزوده شد ✓`);
        closeModal('modal-artist');
        await fetchGenresAndArtists();
        await fetchDashboardStats();
      } catch (err) {
        showToast(err.message || 'خطا در برقراری ارتباط');
      } finally {
        saveBtn.disabled = false;
        saveBtn.textContent = artistId ? 'ذخیره تغییرات' : 'ثبت هنرمند';
      }
    }

    async function deleteArtist(artistId) {
      if (!confirm('آیا از حذف این هنرمند اطمینان دارید؟')) return;

      try {
        const res = await fetch(`/api/admin/artists/${artistId}`, {
          method: 'DELETE',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        });

        const data = await res.json().catch(() => null);
        if (!res.ok) throw new Error(data?.message || 'خطا در حذف هنرمند');

        showToast('هنرمند با موفقیت حذف شد.');
        await fetchGenresAndArtists();
        await fetchDashboardStats();
      } catch (err) {
        showToast(err.message || 'خطا در حذف هنرمند');
      }
    }

    // ۲. مدیریت کامل کاربران (MySQL Live + Search)
    async function fetchUsersFromBackend() {
      try {
        const res = await fetch('/api/admin/users');
        if (!res.ok) throw new Error();
        USERS_DB = await res.json();
      } catch (err) {
        USERS_DB = [];
      }
      renderUsersAdmin();
    }

    function renderUsersAdmin() {
      const tbody = document.getElementById('users-table-body');
      if (!tbody) return;

      const badge = document.getElementById('badge-users-count');
      if (badge) badge.textContent = USERS_DB.length;

      let filtered = [...USERS_DB];

      if (currentUsersFilter === 'active') {
        filtered = filtered.filter(u => u.is_active);
      } else if (currentUsersFilter === 'blocked') {
        filtered = filtered.filter(u => !u.is_active);
      } else if (currentUsersFilter === 'admin') {
        filtered = filtered.filter(u => u.role === 'مدیر');
      }

      if (currentUsersSearchQuery) {
        const q = currentUsersSearchQuery.toLowerCase().trim();
        filtered = filtered.filter(u => 
          (u.name && u.name.toLowerCase().includes(q)) || 
          (u.email && u.email.toLowerCase().includes(q))
        );
      }

      if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="7" style="text-align:center; padding:30px; color:var(--muted);">کاربری مطابق با جستجوی شما یافت نشد.</td></tr>`;
        return;
      }

      tbody.innerHTML = filtered.map((u, idx) => `
        <tr>
          <td><span style="color:var(--muted); font-weight:700;">${idx + 1}</span></td>
          <td>
            <div style="display:flex; align-items:center; gap:8px;">
              <div class="admin-avatar" style="width:30px; height:30px; font-size:11px;">${(u.name || 'ک')[0]}</div>
              <span style="font-weight:700;">${escapeHtml(u.name)}</span>
            </div>
          </td>
          <td style="direction:ltr; text-align:right; color:var(--muted);">${escapeHtml(u.email)}</td>
          <td>
            <span class="badge-status ${u.role === 'مدیر' ? 'synced' : 'hi-res'}">
              ${u.role === 'مدیر' ? 'مدیر سیستم' : 'کاربر عادی'}
            </span>
          </td>
          <td><span style="color:var(--muted); font-size:12px;">${u.date}</span></td>
          <td>
            <span class="badge-status ${u.is_active ? 'synced' : 'empty'}">
              ${u.is_active ? '● فعال' : '✕ مسدود'}
            </span>
          </td>
          <td>
            <div class="table-actions-cell">
              <button class="btn-table-action" onclick="toggleUserStatus(${u.id})" title="${u.is_active ? 'مسدود کردن کاربر' : 'رفع مسدودیت'}">
                ${u.is_active 
                  ? `<svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>`
                  : `<svg width="15" height="15" fill="none" stroke="var(--brand)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`
                }
              </button>
              <button class="btn-table-action" onclick="openEditUserModal(${u.id})" title="ویرایش مشخصات">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
              </button>
              <button class="btn-table-action danger" onclick="deleteUser(${u.id})" title="حذف کاربر">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');
    }

    function filterUsersTable(filterKey, chipBtn) {
      currentUsersFilter = filterKey;
      document.querySelectorAll('#view-users .filter-chips-row .filter-chip').forEach(c => c.classList.remove('active'));
      if (chipBtn) chipBtn.classList.add('active');
      renderUsersAdmin();
    }

    function searchUsersLocal(query) {
      currentUsersSearchQuery = query;
      renderUsersAdmin();
    }

    function openAddUserModal() {
      document.getElementById('modal-user-title').textContent = "تعریف کاربر جدید";
      document.getElementById('user-form-id').value = "";
      document.getElementById('user-form-name').value = "";
      document.getElementById('user-form-email').value = "";
      document.getElementById('user-form-password').value = "";
      document.getElementById('user-password-label').textContent = "کلمه عبور *";
      document.getElementById('user-password-hint').textContent = "";
      document.getElementById('user-form-role').value = "کاربر عادی";
      document.getElementById('btn-save-user').textContent = "افزودن کاربر";
      openModal('modal-user');
    }

    function openEditUserModal(userId) {
      const u = USERS_DB.find(item => item.id === userId);
      if (!u) return;

      document.getElementById('modal-user-title').textContent = `ویرایش کاربر: ${u.name}`;
      document.getElementById('user-form-id').value = u.id;
      document.getElementById('user-form-name').value = u.name;
      document.getElementById('user-form-email').value = u.email;
      document.getElementById('user-form-password').value = "";
      document.getElementById('user-password-label').textContent = "کلمه عبور جدید (اختیاری)";
      document.getElementById('user-password-hint').textContent = "در صورت خالی گذاشتن، رمز قبلی تغییر نخواهد کرد.";
      document.getElementById('user-form-role').value = u.role === 'مدیر' ? 'مدیر' : 'کاربر عادی';
      document.getElementById('btn-save-user').textContent = "ذخیره تغییرات";
      openModal('modal-user');
    }

    async function saveUserFromModal() {
      const userId = document.getElementById('user-form-id').value;
      const name = document.getElementById('user-form-name').value.trim();
      const email = document.getElementById('user-form-email').value.trim();
      const password = document.getElementById('user-form-password').value;
      const role = document.getElementById('user-form-role').value;

      if (!name || !email) {
        showToast('نام و ایمیل را کامل وارد نمایید.');
        return;
      }

      if (!userId && (!password || password.length < 6)) {
        showToast('تعیین کلمه عبور (حداقل ۶ کاراکتر) الزامی است.');
        return;
      }

      const saveBtn = document.getElementById('btn-save-user');
      saveBtn.disabled = true;
      saveBtn.textContent = 'در حال ذخیره‌سازی...';

      const payload = { name, email, role };
      if (password) payload.password = password;

      const endpoint = userId ? `/api/admin/users/${userId}` : '/api/admin/users';

      try {
        const res = await fetch(endpoint, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify(payload)
        });

        const data = await res.json().catch(() => null);

        if (!res.ok) {
          const errMsg = data?.message || (data?.errors ? Object.values(data.errors)[0][0] : 'خطا در ثبت کاربر');
          throw new Error(errMsg);
        }

        showToast(userId ? 'مشخصات کاربر با موفقیت به‌روزرسانی شد ✓' : 'کاربر جدید به سیستم افزوده شد ✓');
        closeModal('modal-user');
        await fetchUsersFromBackend();
        await fetchDashboardStats();
      } catch (err) {
        showToast(err.message || 'خطا در ذخیره‌سازی');
      } finally {
        saveBtn.disabled = false;
        saveBtn.textContent = userId ? 'ذخیره تغییرات' : 'ثبت اطلاعات';
      }
    }

    async function toggleUserStatus(userId) {
      try {
        const res = await fetch(`/api/admin/users/${userId}/toggle-status`, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        });

        const data = await res.json().catch(() => null);
        if (!res.ok) throw new Error(data?.message || 'خطا در تغییر وضعیت');

        showToast(data.message);
        await fetchUsersFromBackend();
      } catch (err) {
        showToast(err.message || 'خطا در تغییر وضعیت کاربر');
      }
    }

    async function deleteUser(userId) {
      if (!confirm('آیا از حذف این حساب کاربری اطمینان دارید؟')) return;

      try {
        const res = await fetch(`/api/admin/users/${userId}`, {
          method: 'DELETE',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        });

        const data = await res.json().catch(() => null);
        if (!res.ok) throw new Error(data?.message || 'خطا در حذف کاربر');

        showToast('حساب کاربری حذف گردید.');
        await fetchUsersFromBackend();
        await fetchDashboardStats();
      } catch (err) {
        showToast(err.message || 'خطا در حذف کاربر');
      }
    }

    // ۳. مدیریت قطعات موسیقی (واکشی و رندر با استایل شکیل و یکپارچه)
    async function fetchTracksFromBackend() {
      try {
        const res = await fetch('/api/tracks');
        if (!res.ok) throw new Error();
        TRACKS_DB = await res.json();
      } catch (err) {
        TRACKS_DB = [];
      }
      renderTracksTable();
      if (TRACKS_DB.length > 0) {
        if (!selectedStudioTrackId || !TRACKS_DB.some(t => t.id === selectedStudioTrackId)) {
          selectedStudioTrackId = TRACKS_DB[0].id;
        }
        renderStudioView();
      }
    }

    async function fetchDashboardStats() {
      try {
        const res = await fetch('/api/admin/dashboard-stats');
        if (!res.ok) throw new Error();
        DASHBOARD_STATS = await res.json();

        document.getElementById('kpi-total-tracks').textContent = DASHBOARD_STATS.total_tracks.toLocaleString('fa-IR');
        document.getElementById('kpi-synced-lyrics').textContent = `${DASHBOARD_STATS.synced_lyrics.toLocaleString('fa-IR')} / ${DASHBOARD_STATS.total_tracks.toLocaleString('fa-IR')}`;
        document.getElementById('kpi-synced-percent').textContent = `${DASHBOARD_STATS.lyrics_coverage.toLocaleString('fa-IR')}٪ پوشش`;
        document.getElementById('kpi-total-streams').textContent = DASHBOARD_STATS.total_streams.toLocaleString('fa-IR');
        document.getElementById('kpi-total-artists').textContent = `${DASHBOARD_STATS.total_artists.toLocaleString('fa-IR')} هنرمند`;
        document.getElementById('kpi-total-playlists').textContent = `${DASHBOARD_STATS.total_playlists.toLocaleString('fa-IR')} پلی‌‌لیست`;

        renderLiveActivity(DASHBOARD_STATS.live_tracks);
        drawStreamsChart(currentChartPeriod);
      } catch (err) {
        console.warn('امکان دریافت آمار زنده داشبورد وجود نداشت.');
      }
    }

    function renderTracksTable(tracksToRender = TRACKS_DB) {
      const tbody = document.getElementById('tracks-table-body');
      if (!tbody) return;

      if (!tracksToRender || tracksToRender.length === 0) {
        tbody.innerHTML = `
          <tr>
            <td colspan="9" style="text-align:center; padding:48px 16px; color:var(--muted); background:transparent;">
              <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
                <div style="width:48px; height:48px; border-radius:50%; background:rgba(255,255,255,0.03); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; color:var(--muted);">
                  <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                </div>
                <div style="font-size:14px; font-weight:700; color:var(--text);">هنوز هیچ قطعه صوتی ثبت نشده است</div>
                <div style="font-size:12px; color:var(--muted); max-width:320px;">برای آغاز، با کلیک بر روی دکمه «آهنگ جدید» اولین ترانه را در پلتفرم سهپاتیفای آپلود و مدیریت کنید.</div>
                <button class="btn-quick-action" onclick="openAddTrackModal()" style="margin-top:6px;">
                  <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                  <span>افزودن آهنگ جدید</span>
                </button>
              </div>
            </td>
          </tr>
        `;
        document.getElementById('badge-track-count').textContent = '۰';
        return;
      }

      tbody.innerHTML = tracksToRender.map((t, idx) => `
        <tr>
          <td><span style="color:var(--muted); font-weight:700; font-family:monospace; font-size:12px;">${idx + 1}</span></td>
          <td>
            <div class="track-meta-cell">
              <img class="track-cover-thumb" src="${t.cover || 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=100'}" alt="${escapeHtml(t.title)}" />
              <div style="min-width:0;">
                <div style="font-weight:800; font-size:13.5px; color:var(--text); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(t.title)}</div>
                <div style="font-size:11px; color:var(--muted); margin-top:1px;">
                  <span style="display:inline-block; background:rgba(255,255,255,0.05); padding:1px 6px; border-radius:4px; font-size:10px;">${escapeHtml(t.genre || 'عمومی')}</span>
                </div>
              </div>
            </div>
          </td>
          <td>
            <div style="display:flex; align-items:center; gap:6px;">
              <span style="font-weight:700; color:#fff;">${escapeHtml(t.artist || 'نامشخص')}</span>
            </div>
          </td>
          <td><span style="color:var(--muted); font-size:12.5px;">${escapeHtml(t.album || t.title)}</span></td>
          <td>
            <div style="display:inline-flex; align-items:center; gap:5px; direction:ltr; font-family:monospace; font-weight:600; color:var(--muted); background:rgba(255,255,255,0.03); padding:3px 8px; border-radius:6px; border:1px solid rgba(255,255,255,0.05);">
              <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              <span>${t.duration || '03:30'}</span>
            </div>
          </td>
          <td>
            <span class="badge-status ${t.is_lossless ? 'hi-res' : ''}">
              <span style="width:5px; height:5px; border-radius:50%; background:currentColor;"></span>
              <span>${t.is_lossless ? 'FLAC 24-bit' : 'MP3 320k'}</span>
            </span>
          </td>
          <td>
            <span class="badge-status ${t.lyrics && t.lyrics.length > 0 ? 'synced' : 'empty'}">
              <span style="width:5px; height:5px; border-radius:50%; background:currentColor;"></span>
              <span>${t.lyrics && t.lyrics.length > 0 ? `✓ ${t.lyrics.length} سطر همگام` : 'فاقد لیریکس'}</span>
            </span>
          </td>
          <td>
            <span style="font-weight:700; color:var(--text); font-family:monospace; font-size:12.5px;">${(t.streams || 0).toLocaleString('fa-IR')}</span>
            <span style="font-size:10.5px; color:var(--muted); margin-right:3px;">پخش</span>
          </td>
          <td>
            <div class="table-actions-cell">
              <button class="btn-table-action lyrics-action" onclick="openTrackInLyricsStudio(${t.id})" title="ورود به استودیو لیریکس این آهنگ">
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                <span>لیریکس</span>
              </button>
              <button class="btn-table-action" onclick="openEditTrackModal(${t.id})" title="ویرایش اطلاعات قطعه">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
              </button>
              <button class="btn-table-action danger" onclick="deleteTrack(${t.id})" title="حذف اثر">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');

      document.getElementById('badge-track-count').textContent = TRACKS_DB.length;
    }

    function filterTracksTable(filterKey, chipBtn) {
      document.querySelectorAll('#view-tracks .filter-chips-row .filter-chip').forEach(c => c.classList.remove('active'));
      if (chipBtn) chipBtn.classList.add('active');

      if (filterKey === 'all') {
        renderTracksTable(TRACKS_DB);
      } else if (filterKey === 'synced') {
        renderTracksTable(TRACKS_DB.filter(t => t.lyrics && t.lyrics.length > 0));
      } else if (filterKey === 'no-lyrics') {
        renderTracksTable(TRACKS_DB.filter(t => !t.lyrics || t.lyrics.length === 0));
      } else if (filterKey === 'lossless') {
        renderTracksTable(TRACKS_DB.filter(t => t.is_lossless));
      }
    }

    function searchTracksLocal(query) {
      const q = (query || '').toLowerCase().trim();
      const results = TRACKS_DB.filter(t =>
        (t.title && t.title.toLowerCase().includes(q)) ||
        (t.artist && t.artist.toLowerCase().includes(q)) ||
        (t.album && t.album.toLowerCase().includes(q))
      );
      renderTracksTable(results);
    }

    function handleAdminGlobalSearch(query) {
      if (!query || !query.trim()) return;
      switchAdminView('tracks');
      const localInput = document.querySelector('#view-tracks .table-controls-bar input');
      if (localInput) localInput.value = query;
      searchTracksLocal(query);
    }

    function detectAudioDuration(input) {
      if (input.files && input.files[0]) {
        const file = input.files[0];
        const tempAudio = new Audio();
        tempAudio.src = URL.createObjectURL(file);
        tempAudio.onloadedmetadata = () => {
          const sec = Math.floor(tempAudio.duration);
          document.getElementById('track-form-duration-sec').value = sec;
          document.getElementById('track-form-duration').value = formatTimeWithMs(sec).slice(0, 5);
        };
      }
    }

    function openAddTrackModal() {
      document.getElementById('modal-track-title').textContent = "افزودن آهنگ جدید به سهپاتیفای";
      document.getElementById('track-form-id').value = "";
      document.getElementById('track-form-name').value = "";
      document.getElementById('track-form-album').value = "";
      document.getElementById('track-form-audio-file').value = "";
      document.getElementById('track-form-cover-file').value = "";
      document.getElementById('track-form-duration').value = "03:45";
      document.getElementById('track-form-duration-sec').value = "225";
      document.getElementById('btn-save-track').textContent = "آپلود و ذخیره در سرور";
      populateArtistDropdownInTrackModal();
      openModal('modal-track');
    }

    function openEditTrackModal(trackId) {
      const t = TRACKS_DB.find(item => item.id === trackId);
      if (!t) return;
      document.getElementById('modal-track-title').textContent = `ویرایش ترانه: ${t.title}`;
      document.getElementById('track-form-id').value = t.id;
      document.getElementById('track-form-name').value = t.title || "";
      document.getElementById('track-form-album').value = t.album || "";
      document.getElementById('track-form-genre').value = t.genre || "پاپ مدرن";
      document.getElementById('track-form-duration').value = t.duration || "03:45";
      document.getElementById('track-form-duration-sec').value = t.duration_sec || "225";
      document.getElementById('track-form-cover').value = t.cover || "";
      document.getElementById('track-form-hires').value = t.is_lossless ? "true" : "false";
      document.getElementById('track-form-audio-file').value = "";
      document.getElementById('track-form-cover-file').value = "";
      document.getElementById('btn-save-track').textContent = "ذخیره تغییرات";
      populateArtistDropdownInTrackModal(t.artist_id);
      openModal('modal-track');
    }

    async function saveTrackFromModal() {
      const trackId = document.getElementById('track-form-id').value;
      const audioInput = document.getElementById('track-form-audio-file');
      const title = document.getElementById('track-form-name').value.trim();
      const artistSelect = document.getElementById('track-form-artist-id');
      const artistId = artistSelect ? artistSelect.value : "";

      if (!title) {
        showToast('عنوان ترانه الزامی است.');
        return;
      }

      if (!artistId) {
        showToast('لطفاً خواننده ترانه را از لیست انتخاب فرمایید.');
        return;
      }

      if (!trackId && (!audioInput.files || audioInput.files.length === 0)) {
        showToast('لطفاً فایل صوتی آهنگ را انتخاب کنید.');
        return;
      }

      const saveBtn = document.getElementById('btn-save-track');
      saveBtn.disabled = true;
      saveBtn.textContent = 'در حال ذخیره‌سازی...';

      const formData = new FormData();
      formData.append('title', title);
      formData.append('artist_id', artistId);
      formData.append('album', document.getElementById('track-form-album').value.trim());
      formData.append('genre', document.getElementById('track-form-genre').value);
      formData.append('duration', document.getElementById('track-form-duration').value);
      formData.append('duration_sec', document.getElementById('track-form-duration-sec').value);
      formData.append('is_lossless', document.getElementById('track-form-hires').value);

      if (audioInput.files && audioInput.files[0]) {
        formData.append('audio_file', audioInput.files[0]);
      }

      const coverInput = document.getElementById('track-form-cover-file');
      if (coverInput.files && coverInput.files[0]) {
        formData.append('cover_file', coverInput.files[0]);
      } else {
        formData.append('cover_url', document.getElementById('track-form-cover').value);
      }

      const endpoint = trackId ? `/api/admin/tracks/${trackId}` : '/api/admin/tracks';

      try {
        const res = await fetch(endpoint, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        });

        const data = await res.json().catch(() => null);

        if (!res.ok) {
          const errMsg = data?.message || (data?.errors ? Object.values(data.errors)[0][0] : 'خطا در ذخیره‌سازی');
          throw new Error(errMsg);
        }

        showToast(trackId ? 'تغییرات با موفقیت ذخیره شد ✓' : `آهنگ «${data.title}» افزوده شد ✓`);
        closeModal('modal-track');
        fetchTracksFromBackend();
        fetchDashboardStats();
      } catch (err) {
        showToast(err.message || 'خطا در ارتباط با سرور');
      } finally {
        saveBtn.disabled = false;
        saveBtn.textContent = trackId ? 'ذخیره تغییرات' : 'آپلود و ذخیره در سرور';
      }
    }

    async function deleteTrack(trackId) {
      if (!confirm('آیا از حذف این قطعه صوتی اطمینان دارید؟')) return;
      try {
        const res = await fetch(`/api/admin/tracks/${trackId}`, {
          method: 'DELETE',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        });

        const data = await res.json().catch(() => null);
        if (!res.ok) throw new Error(data?.message || 'خطا در حذف اثر');

        showToast('قطعه صوتی با موفقیت حذف گردید.');
        fetchTracksFromBackend();
        fetchDashboardStats();
      } catch (err) {
        showToast(err.message || 'خطا در حذف قطعه');
      }
    }

    function renderStudioView() {
      const picker = document.getElementById('studio-track-picker');
      if (!picker) return;

      if (!TRACKS_DB || TRACKS_DB.length === 0) {
        picker.innerHTML = `<option value="">هیچ آهنگی وجود ندارد</option>`;
        document.getElementById('preview-track-title').textContent = "آهنگی وجود ندارد";
        document.getElementById('preview-track-artist').textContent = "-";
        document.getElementById('studio-lyrics-list').innerHTML = `<div style="text-align:center; padding:45px 16px; color:var(--muted);">ابتدا از بخش مدیریت، آهنگ جدید آپلود کنید.</div>`;
        return;
      }

      picker.innerHTML = TRACKS_DB.map(t => `
        <option value="${t.id}" ${t.id === selectedStudioTrackId ? 'selected' : ''}>
          ${t.title} — ${t.artist} (${t.lyrics ? t.lyrics.length : 0} سطر)
        </option>
      `).join('');

      loadStudioTrack(selectedStudioTrackId || TRACKS_DB[0].id);
    }

    function onStudioTrackChange(trackId) {
      selectedStudioTrackId = parseInt(trackId, 10);
      loadStudioTrack(selectedStudioTrackId);
    }

    function openTrackInLyricsStudio(trackId) {
      selectedStudioTrackId = trackId;
      switchAdminView('lyrics');
    }

    function loadStudioTrack(trackId) {
      const track = TRACKS_DB.find(t => t.id === trackId) || TRACKS_DB[0];
      if (!track) return;

      selectedStudioTrackId = track.id;
      document.getElementById('preview-track-art').src = track.cover || 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=100';
      document.getElementById('preview-track-title').textContent = track.title;
      document.getElementById('preview-track-artist').textContent = track.artist;

      studioCurrentTime = 0;
      updateStudioTimerDisplay(0);
      updateStudioScrubberFill(0);

      realAudio.pause();
      studioIsPlaying = false;
      const playBtn = document.getElementById('studio-play-btn');
      if (playBtn) playBtn.innerHTML = `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>`;

      if (track.stream_url) {
        realAudio.src = track.stream_url;
      } else {
        realAudio.removeAttribute('src');
      }

      renderStudioLyricsList(track);
      renderKaraokePreview(track);
    }

    function toggleStudioAudio() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;

      if (!track.stream_url) {
        showToast('برای این اثر فایل صوتی آپلود نشده است.');
        return;
      }

      const playBtn = document.getElementById('studio-play-btn');

      if (realAudio.src !== track.stream_url) {
        realAudio.src = track.stream_url;
      }

      if (realAudio.paused) {
        realAudio.play().then(() => {
          studioIsPlaying = true;
          playBtn.innerHTML = `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
        }).catch(() => {
          showToast('امکان پخش فایل صوتی وجود ندارد.');
        });
      } else {
        realAudio.pause();
        studioIsPlaying = false;
        playBtn.innerHTML = `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>`;
      }
    }

    realAudio.ontimeupdate = () => {
      studioCurrentTime = realAudio.currentTime;
      updateStudioTimerDisplay(studioCurrentTime);
      const maxSec = getSelectedTrackMaxDuration();
      updateStudioScrubberFill((studioCurrentTime / maxSec) * 100);
      syncKaraokeHighlight(studioCurrentTime);
    };

    realAudio.onended = () => {
      studioIsPlaying = false;
      const playBtn = document.getElementById('studio-play-btn');
      if (playBtn) playBtn.innerHTML = `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>`;
    };

    function jumpStudioAudio(secOffset) {
      if (realAudio.src) {
        const maxSec = getSelectedTrackMaxDuration();
        realAudio.currentTime = Math.max(0, Math.min(maxSec, realAudio.currentTime + secOffset));
      }
    }

    function setStudioSpeed(speed, btn) {
      studioPlaybackRate = speed;
      realAudio.playbackRate = speed;
      document.querySelectorAll('.speed-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }

    function onStudioScrubberClick(e) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !realAudio.src) return;
      const rect = e.currentTarget.getBoundingClientRect();
      const fraction = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
      const maxSec = getSelectedTrackMaxDuration();
      realAudio.currentTime = fraction * maxSec;
    }

    function renderStudioLyricsList(track) {
      const listContainer = document.getElementById('studio-lyrics-list');
      if (!track.lyrics || track.lyrics.length === 0) {
        listContainer.innerHTML = `<div style="text-align:center; padding:45px 16px; color:var(--muted);">هنوز سطری برای لیریکس این اثر ثبت نشده است.<br><button class="btn-quick-action" style="margin:16px auto 0;" onclick="addNewLyricRow()">+ ایجاد اولین سطر شعر</button></div>`;
        return;
      }

      listContainer.innerHTML = track.lyrics.map((line, idx) => `
        <div class="lyrics-row-card ${idx === activeEditingLineIndex ? 'active-line' : ''}" id="lyrics-row-${idx}" onclick="selectLyricLineForEdit(${idx})">
          <input type="text" class="input-timestamp" value="${formatTimeWithMs(line.time)}" onchange="updateLineTime(${idx}, this.value)" title="زمان سطر (mm:ss.ms)" />
          <input type="text" class="input-lyric-txt" value="${escapeHtml(line.fa || '')}" oninput="updateLineFa(${idx}, this.value)" placeholder="متن فارسی..." />
          <input type="text" class="input-lyric-txt input-lyric-en" value="${escapeHtml(line.en || '')}" oninput="updateLineEn(${idx}, this.value)" placeholder="ترجمه انگلیسی..." />
          <div style="display:flex; align-items:center; gap:4px; justify-content:flex-end;">
            <button class="nudge-btn" onclick="event.stopPropagation(); nudgeLineTime(${idx}, -0.5);">-0.5s</button>
            <button class="nudge-btn" onclick="event.stopPropagation(); nudgeLineTime(${idx}, +0.5);">+0.5s</button>
            <button class="btn-table-action" onclick="event.stopPropagation(); stampCurrentTimeOnLine(${idx});" title="ثبت زمان فعلی">⏱</button>
            <button class="btn-table-action danger" onclick="event.stopPropagation(); deleteLyricLine(${idx});" title="حذف سطر">✕</button>
          </div>
        </div>
      `).join('');
    }

    function renderKaraokePreview(track) {
      const container = document.getElementById('karaoke-preview-stream');
      if (!track.lyrics || track.lyrics.length === 0) {
        container.innerHTML = `<div style="color:var(--muted); font-size:12.5px; padding-top:40px;">بدون لیریکس برای پیش‌‌نمایش</div>`;
        return;
      }
      container.innerHTML = track.lyrics.map((line, idx) => `
        <div class="karaoke-line ${idx === 0 ? 'active' : ''}" id="karaoke-line-${idx}">
          <div>${escapeHtml(line.fa || '...')}</div>
          ${line.en ? `<span class="karaoke-trans">${escapeHtml(line.en)}</span>` : ''}
        </div>
      `).join('');
    }

    function selectLyricLineForEdit(idx) {
      activeEditingLineIndex = idx;
      document.querySelectorAll('.lyrics-row-card').forEach(r => r.classList.remove('active-line'));
      const activeRow = document.getElementById(`lyrics-row-${idx}`);
      if (activeRow) {
        activeRow.classList.add('active-line');
        activeRow.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }
    }

    function addNewLyricRow() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;
      if (!track.lyrics) track.lyrics = [];

      const maxSec = getSelectedTrackMaxDuration();
      let newTime = Math.round(studioCurrentTime * 10) / 10;

      if (newTime >= maxSec) {
        showToast(`پخش موسیقی به پایان رسیده است. حداکثر زمان مجاز: ${formatTimeWithMs(maxSec)}`);
        newTime = Math.max(0, maxSec - 1);
      }

      track.lyrics.push({ time: newTime, fa: "متن سطر جدید...", en: "" });
      track.lyrics.sort((a, b) => a.time - b.time);
      activeEditingLineIndex = track.lyrics.findIndex(l => l.time === newTime);

      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      selectLyricLineForEdit(activeEditingLineIndex);
    }

    function deleteLyricLine(idx) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics) return;
      track.lyrics.splice(idx, 1);
      if (activeEditingLineIndex >= track.lyrics.length) {
        activeEditingLineIndex = Math.max(0, track.lyrics.length - 1);
      }
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
    }

    function updateLineFa(idx, val) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (track && track.lyrics[idx]) { track.lyrics[idx].fa = val; renderKaraokePreview(track); }
    }

    function updateLineEn(idx, val) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (track && track.lyrics[idx]) { track.lyrics[idx].en = val; renderKaraokePreview(track); }
    }

    function updateLineTime(idx, timeStr) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics[idx]) return;

      const maxSec = getSelectedTrackMaxDuration();
      let parsedSec = parseTimeStrToSeconds(timeStr);

      if (parsedSec > maxSec) {
        showToast(`زمان وارد شده (${formatTimeWithMs(parsedSec)}) از طول آهنگ بیشتر است. روی ${formatTimeWithMs(maxSec)} تنظیم شد.`);
        parsedSec = maxSec;
      } else if (parsedSec < 0 || isNaN(parsedSec)) {
        parsedSec = 0;
      }

      track.lyrics[idx].time = parsedSec;
      track.lyrics.sort((a, b) => a.time - b.time);
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
    }

    function nudgeLineTime(idx, delta) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics[idx]) return;

      const maxSec = getSelectedTrackMaxDuration();
      let newTime = Math.round((track.lyrics[idx].time + delta) * 10) / 10;

      if (newTime > maxSec) {
        showToast(`حداکثر زمان مجاز ${formatTimeWithMs(maxSec)} است.`);
        newTime = maxSec;
      } else if (newTime < 0) {
        newTime = 0;
      }

      track.lyrics[idx].time = newTime;
      track.lyrics.sort((a, b) => a.time - b.time);
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
    }

    function stampCurrentTimeOnActiveRow() {
      stampCurrentTimeOnLine(activeEditingLineIndex);
    }

    function stampCurrentTimeOnLine(idx) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;

      if (!track.lyrics || track.lyrics.length === 0) {
        addNewLyricRow();
        return;
      }
      if (!track.lyrics[idx]) return;

      const maxSec = getSelectedTrackMaxDuration();
      let stampedSec = Math.round(studioCurrentTime * 10) / 10;

      if (stampedSec > maxSec) {
        showToast(`زمان ثبت شده فراتر از طول کل اثر است. روی ${formatTimeWithMs(maxSec)} قفل شد.`);
        stampedSec = maxSec;
      }

      track.lyrics[idx].time = stampedSec;
      track.lyrics.sort((a, b) => a.time - b.time);

      if (idx < track.lyrics.length - 1) {
        activeEditingLineIndex = idx + 1;
      }

      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      selectLyricLineForEdit(activeEditingLineIndex);
      showToast(`زمان سطر به ${formatTimeWithMs(stampedSec)} متصل شد ✓`);
    }

    function syncKaraokeHighlight(currentSec) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics || track.lyrics.length === 0) return;

      let activeIdx = 0;
      for (let i = 0; i < track.lyrics.length; i++) {
        if (currentSec >= track.lyrics[i].time) activeIdx = i;
      }

      document.querySelectorAll('.karaoke-line').forEach((line, idx) => {
        if (idx === activeIdx) {
          line.classList.add('active');
          line.scrollIntoView({ behavior: 'smooth', block: 'center' });
        } else {
          line.classList.remove('active');
        }
      });
    }

    async function saveCurrentTrackLyrics() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;

      track.lyrics.sort((a, b) => a.time - b.time);

      try {
        const res = await fetch(`/api/admin/tracks/${track.id}/lyrics`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ lyrics: track.lyrics })
        });
        const data = await res.json().catch(() => null);
        if (res.ok) {
          showToast(`لیریکس ${track.title} با موفقیت در دیتابیس ثبت شد ✓`);
          fetchTracksFromBackend();
          fetchDashboardStats();
        } else {
          throw new Error(data?.message || 'خطا در ثبت لیریکس');
        }
      } catch (err) {
        showToast(err.message || 'خطا در ذخیره لیریکس');
      }
    }

    function clearAllLyrics() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;
      if (!confirm('آیا از پاک‌سازی تمام خطوط لیریکس این اثر اطمینان دارید؟')) return;
      track.lyrics = [];
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      showToast('خطوط لیریکس پاک‌سازی شدند.');
    }

    function openModal(id) { const m = document.getElementById(id); if (m) m.classList.add('open'); }
    function closeModal(id) { const m = document.getElementById(id); if (m) m.classList.remove('open'); }

    // ۴. مدیریت پلی‌لیست‌ها
    async function fetchPlaylistsFromBackend() {
      try {
        const res = await fetch('/api/playlists');
        if (!res.ok) throw new Error();
        PLAYLISTS_DB = await res.json();
      } catch (err) {
        PLAYLISTS_DB = [];
      }
      renderPlaylistsAdmin();
    }

    function renderPlaylistsAdmin() {
      const container = document.getElementById('playlists-admin-grid');
      if (!container) return;

      const badge = document.getElementById('badge-playlist-count');
      if (badge) badge.textContent = PLAYLISTS_DB.length;

      if (!PLAYLISTS_DB || PLAYLISTS_DB.length === 0) {
        container.innerHTML = `
          <div style="grid-column: 1/-1; text-align:center; padding:40px; color:var(--muted); background:var(--surface-card); border-radius:var(--radius-md); border:1px dashed var(--border);">
            هنوز پلی‌لیستی در دیتابیس ثبت نشده است. روی دکمه «پلی‌لیست جدید» کلیک کنید.
          </div>
        `;
        return;
      }

      container.innerHTML = PLAYLISTS_DB.map(p => {
        const trackCount = p.tracks ? p.tracks.length : 0;
        const tracksPreview = p.tracks && p.tracks.length > 0
          ? p.tracks.slice(0, 3).map(t => `<span style="font-size:11px; color:var(--text); background:rgba(255,255,255,0.05); padding:2px 8px; border-radius:4px; margin-left:4px; display:inline-block; margin-top:4px;">♫ ${escapeHtml(t.title)}</span>`).join('')
          : '<span style="font-size:11px; color:var(--muted);">هنوز آهنگی افزوده نشده</span>';

        return `
          <div class="panel-card" style="display:flex; flex-direction:column; justify-content:space-between; min-width:0;">
            <div>
              <div style="display:flex; gap:12px; align-items:center; margin-bottom:12px;">
                <img src="${p.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500'}" style="width:64px; height:64px; border-radius:10px; object-fit:cover; flex-shrink:0;" />
                <div style="min-width:0;">
                  <div style="font-weight:800; font-size:15px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(p.title)}</div>
                  <div style="font-size:12px; color:var(--brand); font-weight:700;">${trackCount} قطعه صوتی</div>
                </div>
              </div>
              <p style="font-size:12px; color:var(--muted); line-height:1.6; margin-bottom:10px; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">${escapeHtml(p.desc || '')}</p>
              <div style="margin-bottom:14px; padding-top:6px; border-top:1px dashed var(--border);">
                <div style="font-size:11px; color:var(--muted); margin-bottom:4px;">قطعات این مجموعه:</div>
                <div style="display:flex; flex-wrap:wrap;">${tracksPreview}</div>
              </div>
            </div>
            <div style="display:flex; align-items:center; justify-content:space-between; border-top:1px solid var(--border); padding-top:12px;">
              <span class="badge-status synced">عمومی • رسمی</span>
              <div style="display:flex; gap:6px;">
                <button class="btn-table-action" onclick="openEditPlaylistModal(${p.id})" title="ویرایش پلی‌‌لیست و آهنگ‌ها">
                  <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                </button>
                <button class="btn-table-action danger" onclick="deletePlaylist(${p.id})" title="حذف پلی‌لیست">
                  <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
              </div>
            </div>
          </div>
        `;
      }).join('');
    }

    function renderTracksSelectorInsideModal(selectedTrackIds = []) {
      const container = document.getElementById('playlist-tracks-selector');
      if (!container) return;

      if (!TRACKS_DB || TRACKS_DB.length === 0) {
        container.innerHTML = `<div style="text-align:center; padding:15px; color:var(--muted); font-size:12px;">ابتدا از بخش «مدیریت آهنگ‌ها» قطعه صوتی آپلود کنید.</div>`;
        return;
      }

      const selectedSet = new Set(selectedTrackIds.map(Number));

      container.innerHTML = TRACKS_DB.map(t => {
        const isChecked = selectedSet.has(Number(t.id)) ? 'checked' : '';
        return `
          <label style="display:flex; align-items:center; justify-content:space-between; gap:10px; padding:6px 8px; border-radius:6px; background:rgba(255,255,255,0.02); cursor:pointer;">
            <div style="display:flex; align-items:center; gap:8px; min-width:0;">
              <input type="checkbox" class="playlist-track-checkbox" value="${t.id}" ${isChecked} onchange="updateSelectedTracksCounter()" style="accent-color:var(--brand); width:16px; height:16px; cursor:pointer;" />
              <img src="${t.cover || 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=80'}" style="width:30px; height:30px; border-radius:4px; object-fit:cover;" />
              <div style="min-width:0;">
                <div style="font-size:12px; font-weight:700; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(t.title)}</div>
                <div style="font-size:10px; color:var(--muted); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(t.artist)}</div>
              </div>
            </div>
            <span style="font-size:11px; color:var(--muted); direction:ltr;">${t.duration || '03:30'}</span>
          </label>
        `;
      }).join('');

      updateSelectedTracksCounter();
    }

    function updateSelectedTracksCounter() {
      const checkedCount = document.querySelectorAll('.playlist-track-checkbox:checked').length;
      const counter = document.getElementById('playlist-selected-count');
      if (counter) counter.textContent = `${checkedCount} قطعه انتخاب شده`;
    }

    function openAddPlaylistModal() {
      document.getElementById('modal-playlist-title').textContent = "ساخت پلی‌لیست جدید";
      document.getElementById('playlist-form-id').value = "";
      document.getElementById('playlist-form-title').value = "";
      document.getElementById('playlist-form-desc').value = "";
      document.getElementById('playlist-form-cover').value = "https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500";
      document.getElementById('playlist-form-cover-file').value = "";
      document.getElementById('btn-save-playlist').textContent = "ساخت پلی‌لیست";
      renderTracksSelectorInsideModal([]);
      openModal('modal-playlist');
    }

    function openEditPlaylistModal(playlistId) {
      const p = PLAYLISTS_DB.find(item => item.id === playlistId);
      if (!p) return;

      document.getElementById('modal-playlist-title').textContent = `ویرایش پلی‌لیست: ${p.title}`;
      document.getElementById('playlist-form-id').value = p.id;
      document.getElementById('playlist-form-title').value = p.title || "";
      document.getElementById('playlist-form-desc').value = p.desc || "";
      document.getElementById('playlist-form-cover').value = p.cover || "";
      document.getElementById('playlist-form-cover-file').value = "";
      document.getElementById('btn-save-playlist').textContent = "ذخیره تغییرات";

      const selectedIds = p.tracks ? p.tracks.map(t => Number(t.id)) : [];
      renderTracksSelectorInsideModal(selectedIds);
      openModal('modal-playlist');
    }

    async function savePlaylistFromModal() {
      const playlistId = document.getElementById('playlist-form-id').value;
      const title = document.getElementById('playlist-form-title').value.trim();
      const desc = document.getElementById('playlist-form-desc').value.trim();

      if (!title) {
        showToast('عنوان پلی‌لیست الزامی است.');
        return;
      }

      const saveBtn = document.getElementById('btn-save-playlist');
      saveBtn.disabled = true;
      saveBtn.textContent = 'در حال ذخیره‌سازی...';

      const formData = new FormData();
      formData.append('title', title);
      formData.append('desc', desc);

      const coverInput = document.getElementById('playlist-form-cover-file');
      if (coverInput.files && coverInput.files[0]) {
        formData.append('cover_file', coverInput.files[0]);
      } else {
        formData.append('cover_url', document.getElementById('playlist-form-cover').value);
      }

      const checkedBoxes = document.querySelectorAll('.playlist-track-checkbox:checked');
      checkedBoxes.forEach(box => {
        formData.append('track_ids[]', box.value);
      });

      const endpoint = playlistId ? `/api/admin/playlists/${playlistId}` : '/api/admin/playlists';

      try {
        const res = await fetch(endpoint, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        });

        const data = await res.json().catch(() => null);

        if (!res.ok) {
          throw new Error(data?.message || 'خطا در ذخیره‌سازی پلی‌لیست');
        }

        showToast(playlistId ? 'پلی‌‌لیست با موفقیت ویرایش شد ✓' : `پلی‌لیست «${data.title}» ساخته شد ✓`);
        closeModal('modal-playlist');
        await fetchPlaylistsFromBackend();
        await fetchDashboardStats();
      } catch (err) {
        showToast(err.message || 'خطا در برقراری ارتباط با سرور');
      } finally {
        saveBtn.disabled = false;
        saveBtn.textContent = playlistId ? 'ذخیره تغییرات' : 'ساخت پلی‌لیست';
      }
    }

    async function deletePlaylist(playlistId) {
      if (!confirm('آیا از حذف این پلی‌لیست اطمینان دارید؟ (آهنگ‌های داخل آن پاک نخواهند شد)')) return;

      try {
        const res = await fetch(`/api/admin/playlists/${playlistId}`, {
          method: 'DELETE',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        });

        const data = await res.json().catch(() => null);
        if (!res.ok) throw new Error(data?.message || 'خطا در حذف پلی‌لیست');

        showToast('پلی‌لیست با موفقیت حذف شد.');
        await fetchPlaylistsFromBackend();
        await fetchDashboardStats();
      } catch (err) {
        showToast(err.message || 'خطا در حذف پلی‌‌لیست');
      }
    }

    function openBulkLyricsModal() { openModal('modal-bulk-lyrics'); }
    function openLrcModal() { openModal('modal-lrc'); }

    function processBulkLyrics() {
      const text = document.getElementById('bulk-lyrics-textarea').value.trim();
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!text || !track) return;

      const lines = text.split('\n').filter(l => l.trim().length > 0);
      const maxSec = getSelectedTrackMaxDuration();
      const step = Math.min(10, Math.max(1, Math.floor(maxSec / (lines.length + 1))));

      track.lyrics = lines.map((l, idx) => ({
        time: Math.min(maxSec, idx * step),
        fa: l.trim(),
        en: ""
      }));

      track.lyrics.sort((a, b) => a.time - b.time);
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      closeModal('modal-bulk-lyrics');
      showToast(`${lines.length} سطر شعر در محدوده زمانی اثر ایجاد شد ✓`);
    }

    function applyLrcImport() {
      const rawText = document.getElementById('lrc-textarea').value;
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;

      const maxSec = getSelectedTrackMaxDuration();
      const lines = rawText.split('\n');
      const parsed = [];

      lines.forEach(line => {
        const match = line.match(/\[(\d{2}):(\d{2}(?:\.\d{1,3})?)\](.*)/);
        if (match) {
          let timeVal = parseInt(match[1], 10) * 60 + parseFloat(match[2]);
          if (timeVal <= maxSec) {
            parsed.push({ time: timeVal, fa: match[3].trim(), en: "" });
          }
        }
      });

      if (parsed.length > 0) {
        track.lyrics = parsed.sort((a, b) => a.time - b.time);
        renderStudioLyricsList(track);
        renderKaraokePreview(track);
        closeModal('modal-lrc');
        showToast('فرمت LRC با موفقیت اعمال گردید ✓');
      } else {
        showToast('هیچ سطری در محدوده زمانی این قطعه یافت نشد.');
      }
    }

    function copyLrcText() {
      const txt = document.getElementById('lrc-textarea');
      txt.select();
      document.execCommand('copy');
      showToast('متن LRC کپی شد');
    }

    function exportTracksJson() {
      const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(TRACKS_DB, null, 2));
      const a = document.createElement('a');
      a.href = dataStr;
      a.download = "tracks_backup.json";
      a.click();
    }

    function renderLiveActivity(liveTracks) {
      const container = document.getElementById('live-activity-grid');
      if (!container) return;

      if (!liveTracks || liveTracks.length === 0) {
        container.innerHTML = `<div style="grid-column: 1/-1; text-align:center; padding:20px; color:var(--muted);">هنوز استریمی ثبت نشده است.</div>`;
        return;
      }

      container.innerHTML = liveTracks.map(item => `
        <div style="background:var(--surface-elevated); border:1px solid var(--border); border-radius:var(--radius-sm); padding:10px 14px; display:flex; align-items:center; justify-content:space-between; gap:10px;">
          <div style="display:flex; align-items:center; gap:10px; min-width:0;">
            <img src="${item.cover || 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=80'}" style="width:38px; height:38px; border-radius:6px; object-fit:cover; flex-shrink:0;" />
            <div style="min-width:0;">
              <div style="font-weight:700; font-size:13px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(item.title)}</div>
              <div style="font-size:11px; color:var(--muted); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(item.artist)}</div>
            </div>
          </div>
          <div style="text-align:left; flex-shrink:0;">
            <span style="font-size:10px; color:var(--brand); font-weight:700; background:rgba(16,185,84,0.1); padding:2px 8px; border-radius:var(--radius-full); display:block; margin-bottom:2px;">
              ${item.is_lossless ? 'FLAC 24-bit' : 'MP3 320k'}
            </span>
            <span style="font-size:10px; color:var(--muted);">${(item.streams || 0).toLocaleString('fa-IR')} پخش</span>
          </div>
        </div>
      `).join('');
    }

    function drawStreamsChart(period = '7d') {
      const canvas = document.getElementById('streams-analytics-canvas');
      const wrapper = document.getElementById('chart-wrapper');
      if (!canvas || !wrapper) return;

      const ctx = canvas.getContext('2d');
      const dpr = window.devicePixelRatio || 1;
      const rect = wrapper.getBoundingClientRect();

      canvas.width = rect.width * dpr;
      canvas.height = rect.height * dpr;
      ctx.scale(dpr, dpr);

      let labels = ["شنبه", "۱شنبه", "۲شنبه", "۳شنبه", "۴شنبه", "۵شنبه", "جمعه"];
      const baseStreams = (DASHBOARD_STATS?.total_streams || 120000);
      let values = [
        Math.round(baseStreams * 0.08),
        Math.round(baseStreams * 0.12),
        Math.round(baseStreams * 0.10),
        Math.round(baseStreams * 0.16),
        Math.round(baseStreams * 0.19),
        Math.round(baseStreams * 0.23),
        Math.round(baseStreams * 0.28)
      ];

      if (period === '30d') {
        labels = ["هفته ۱", "هفته ۲", "هفته ۳", "هفته ۴"];
        values = [
          Math.round(baseStreams * 0.18),
          Math.round(baseStreams * 0.24),
          Math.round(baseStreams * 0.27),
          Math.round(baseStreams * 0.31)
        ];
      } else if (period === '12m') {
        labels = ["بهار", "تابستان", "پاییز", "زمستان"];
        values = [
          Math.round(baseStreams * 0.15),
          Math.round(baseStreams * 0.25),
          Math.round(baseStreams * 0.28),
          Math.round(baseStreams * 0.32)
        ];
      }

      ctx.clearRect(0, 0, rect.width, rect.height);

      const maxVal = Math.max(...values, 100) * 1.25;
      const paddingX = rect.width < 500 ? 25 : 45;
      const paddingY = 25;
      const graphW = rect.width - paddingX * 2;
      const graphH = rect.height - paddingY * 2;

      ctx.strokeStyle = "rgba(255, 255, 255, 0.06)";
      ctx.lineWidth = 1;
      for (let i = 0; i <= 3; i++) {
        const y = paddingY + (graphH / 3) * i;
        ctx.beginPath();
        ctx.moveTo(paddingX, y);
        ctx.lineTo(rect.width - paddingX, y);
        ctx.stroke();
      }

      const points = values.map((val, idx) => {
        const x = paddingX + (graphW / (values.length - 1)) * idx;
        const y = paddingY + graphH - (val / maxVal) * graphH;
        return { x, y, val, label: labels[idx] };
      });

      const grad = ctx.createLinearGradient(0, paddingY, 0, rect.height - paddingY);
      grad.addColorStop(0, "rgba(16, 185, 84, 0.38)");
      grad.addColorStop(1, "rgba(16, 185, 84, 0.0)");

      ctx.beginPath();
      ctx.moveTo(points[0].x, rect.height - paddingY);
      ctx.lineTo(points[0].x, points[0].y);

      for (let i = 0; i < points.length - 1; i++) {
        const xc = (points[i].x + points[i + 1].x) / 2;
        const yc = (points[i].y + points[i + 1].y) / 2;
        ctx.quadraticCurveTo(points[i].x, points[i].y, xc, yc);
      }
      ctx.lineTo(points[points.length - 1].x, points[points.length - 1].y);
      ctx.lineTo(points[points.length - 1].x, rect.height - paddingY);
      ctx.closePath();
      ctx.fillStyle = grad;
      ctx.fill();

      ctx.beginPath();
      ctx.strokeStyle = "#10B954";
      ctx.lineWidth = 3;
      ctx.shadowColor = "rgba(16, 185, 84, 0.6)";
      ctx.shadowBlur = 10;
      for (let i = 0; i < points.length - 1; i++) {
        const xc = (points[i].x + points[i + 1].x) / 2;
        const yc = (points[i].y + points[i + 1].y) / 2;
        ctx.quadraticCurveTo(points[i].x, points[i].y, xc, yc);
      }
      ctx.lineTo(points[points.length - 1].x, points[points.length - 1].y);
      ctx.stroke();

      ctx.shadowColor = "transparent";
      ctx.shadowBlur = 0;

      ctx.font = "11px Vazirmatn";
      ctx.fillStyle = "#9696A3";
      ctx.textAlign = "center";

      points.forEach(p => {
        ctx.beginPath();
        ctx.arc(p.x, p.y, 4, 0, Math.PI * 2);
        ctx.fillStyle = "#FFFFFF";
        ctx.fill();
        ctx.strokeStyle = "#10B954";
        ctx.lineWidth = 2;
        ctx.stroke();

        ctx.fillStyle = "#9696A3";
        ctx.fillText(p.label, p.x, rect.height - 6);
      });
    }

    function updateChartPeriod(period) {
      currentChartPeriod = period;
      document.querySelectorAll('#chart-btn-7d, #chart-btn-30d, #chart-btn-12m').forEach(b => b.classList.remove('active'));
      const activeBtn = document.getElementById(`chart-btn-${period}`);
      if (activeBtn) activeBtn.classList.add('active');
      drawStreamsChart(period);
    }

    function formatTimeWithMs(sec) {
      const m = Math.floor(sec / 60);
      const s = Math.floor(sec % 60);
      const ms = Math.floor((sec % 1) * 100);
      return `${m < 10 ? '0' : ''}${m}:${s < 10 ? '0' : ''}${s}.${ms < 10 ? '0' : ''}${ms}`;
    }
    function parseTimeStrToSeconds(str) {
      if (!str) return 0;
      const p = str.split(':');
      return p.length === 2 ? (parseFloat(p[0]) * 60 + parseFloat(p[1])) : (parseFloat(str) || 0);
    }
    function parseDurationToSeconds(dur) {
      const p = (dur || '').split(':');
      if (p.length === 2) {
        return (parseInt(p[0], 10) * 60) + parseInt(p[1], 10);
      }
      return 210;
    }
    function escapeHtml(str) { return (str || '').replace(/"/g, '&quot;').replace(/'/g, '&#39;'); }
    function updateStudioTimerDisplay(sec) {
      const d = document.getElementById('studio-time-display');
      if (d) d.textContent = formatTimeWithMs(sec);
    }
    function updateStudioScrubberFill(pct) {
      const f = document.getElementById('studio-progress-fill');
      if (f) f.style.width = Math.min(100, Math.max(0, pct)) + '%';
    }

    function showToast(msg) {
      const s = document.getElementById('toast-shelf');
      if (!s) return;
      const t = document.createElement('div');
      t.className = 'toast-message';
      t.textContent = msg;
      s.appendChild(t);
      setTimeout(() => t.remove(), 3000);
    }

    window.addEventListener('keydown', (e) => {
      if (currentAdminView === 'lyrics' && !['INPUT', 'TEXTAREA'].includes(e.target.tagName)) {
        if (e.code === 'Space') { e.preventDefault(); stampCurrentTimeOnActiveRow(); }
        else if (e.code === 'ArrowLeft') { e.preventDefault(); jumpStudioAudio(-5); }
        else if (e.code === 'ArrowRight') { e.preventDefault(); jumpStudioAudio(5); }
      }
    });

    window.addEventListener('resize', () => {
      if (currentAdminView === 'dashboard') {
        drawStreamsChart(currentChartPeriod);
      }
    });

    window.addEventListener('DOMContentLoaded', async () => {
      await fetchGenresAndArtists();
      await fetchTracksFromBackend();
      await fetchPlaylistsFromBackend();
      await fetchUsersFromBackend();
      await fetchDashboardStats();
    });
  </script>
</body>
</html>