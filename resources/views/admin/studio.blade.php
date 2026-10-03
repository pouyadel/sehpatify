<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
  <title>سهپاتیفای استودیو | Sehpatify Admin & Lyrics Studio Pro</title>
  <meta name="theme-color" content="#0A0A0F" />
  <meta name="description" content="مرکز مدیریت جامع، مانیتورینگ زنده و استودیو فوق‌پیشرفته همگام‌ساز لیریکس سهپاتیفای" />

  <!-- Google Fonts: Vazirmatn -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <style>
    :root {
      /* Brand Color System (#10B954 Brand Neon Green) */
      --brand: #10B954;
      --brand-glow: rgba(16, 185, 84, 0.45);
      --brand-glow-lg: rgba(16, 185, 84, 0.22);
      --brand-dim: rgba(16, 185, 84, 0.12);
      --brand-hover: #15d261;
      --brand-active: #0d9643;

      /* Deep Onyx Surfaces & Dark Themes */
      --bg: #0A0A0F;
      --surface: #12121A;
      --surface-card: #161622;
      --surface-elevated: #1D1D2B;
      --surface-hover: #232336;
      --surface-glass: rgba(18, 18, 26, 0.88);
      --surface-glass-heavy: rgba(10, 10, 15, 0.95);

      /* Typography & Neutral Colors */
      --text: #F5F5F7;
      --muted: #9696A3;
      --muted-dark: #636372;
      --border: rgba(255, 255, 255, 0.08);
      --border-light: rgba(255, 255, 255, 0.14);
      --border-brand: rgba(16, 185, 84, 0.45);

      /* Status Badges */
      --accent-blue: #38bdf8;
      --accent-purple: #c084fc;
      --accent-amber: #fbbf24;
      --accent-red: #f87171;

      /* Dimensions */
      --sidebar-w: 260px;
      --topbar-h: 70px;
      --mobile-bar-h: 64px;

      /* Radii & Shadows */
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

    /* Main Container Layout */
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

    /* Live Studio Engine Status */
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
      background: radial-gradient(circle at 90% 0%, rgba(16, 185, 84, 0.08) 0%, transparent 45%),
                  var(--bg);
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

    .action-circle-btn {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border);
      color: var(--text);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all var(--transition-fast);
      position: relative;
    }

    .action-circle-btn:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--border-light);
    }

    .badge-dot {
      position: absolute;
      top: 8px;
      left: 8px;
      width: 8px;
      height: 8px;
      background: var(--brand);
      border-radius: 50%;
      box-shadow: 0 0 6px var(--brand);
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

    .admin-profile-pill:hover {
      border-color: var(--border-brand);
      box-shadow: 0 0 14px var(--brand-glow-lg);
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

    /* KPI Cards */
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
    }

    .filter-chip.active, .filter-chip:hover {
      background: var(--brand-dim);
      border-color: var(--border-brand);
      color: var(--brand);
    }

    .table-wrapper {
      width: 100%;
      overflow-x: auto;
    }

    .admin-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      text-align: right;
    }

    .admin-table th {
      padding: 12px 14px;
      font-size: 11.5px;
      font-weight: 700;
      color: var(--muted);
      border-bottom: 1px solid var(--border);
      white-space: nowrap;
    }

    .admin-table td {
      padding: 12px 14px;
      font-size: 13px;
      color: var(--text);
      border-bottom: 1px solid rgba(255, 255, 255, 0.04);
      vertical-align: middle;
      white-space: nowrap;
    }

    .admin-table tr:hover td {
      background: rgba(255, 255, 255, 0.02);
    }

    .track-meta-cell {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .track-cover-thumb {
      width: 44px;
      height: 44px;
      border-radius: 8px;
      object-fit: cover;
      background: #1e1e2d;
      flex-shrink: 0;
      border: 1px solid var(--border);
    }

    .badge-status {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 3px 9px;
      border-radius: var(--radius-full);
      font-size: 11px;
      font-weight: 700;
    }

    .badge-status.synced {
      background: rgba(16, 185, 84, 0.15);
      color: var(--brand);
      border: 1px solid var(--border-brand);
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
      padding: 0 10px;
      font-size: 11.5px;
      font-weight: 700;
      gap: 5px;
    }

    .btn-table-action.lyrics-action:hover {
      background: var(--brand);
      color: #052410;
    }

    .btn-table-action.danger:hover {
      background: rgba(239, 68, 68, 0.2);
      color: var(--accent-red);
      border-color: var(--accent-red);
    }

    .lyrics-studio-container {
      display: grid;
      grid-template-columns: 1fr 380px;
      gap: 20px;
      height: calc(100vh - 150px);
      min-height: 600px;
    }

    .studio-editor-card {
      background: var(--surface-card);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      display: flex;
      flex-direction: column;
      overflow: hidden;
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
      max-width: 420px;
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

    /* Audio Studio Player Toolbar */
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

    .studio-timer-display {
      font-size: 21px;
      font-weight: 900;
      color: var(--brand);
      direction: ltr;
      letter-spacing: 1px;
      font-family: monospace !important;
      background: rgba(16, 185, 84, 0.08);
      padding: 4px 12px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border-brand);
      text-shadow: 0 0 10px var(--brand-glow);
    }

    .studio-playback-ctrls {
      display: flex;
      align-items: center;
      gap: 8px;
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

    /* Speed rate chips */
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

    /* Live Karaoke Preview Screen */
    .studio-preview-card {
      background: var(--surface-card);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      display: flex;
      flex-direction: column;
      overflow: hidden;
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
      padding: 16px;
      display: flex;
      align-items: center;
      gap: 14px;
      background: rgba(255, 255, 255, 0.015);
      border-bottom: 1px solid var(--border);
    }

    .preview-art {
      width: 60px;
      height: 60px;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: var(--shadow-sm);
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
      font-size: 19px;
      font-weight: 900;
      text-shadow: 0 0 20px var(--brand-glow);
      transform: scale(1.06);
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

    /* Mobile Bottom Floating Navigation Bar */
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

    /* Toast shelf */
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

    @media (max-width: 1080px) {
      .lyrics-studio-container {
        grid-template-columns: 1fr;
        height: auto;
      }
      .studio-preview-card {
        height: 380px;
      }
    }

    @media (max-width: 768px) {
      .admin-sidebar {
        position: fixed;
        right: 0;
        top: 0;
        bottom: 0;
        transform: translateX(100%);
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
      }
      .admin-info-col {
        display: none;
      }
      .search-container {
        display: none;
      }
      .content-viewport {
        padding: 14px 14px calc(var(--mobile-bar-h) + 20px);
      }
      .form-row-2 {
        grid-template-columns: 1fr;
      }
      .lyrics-row-card {
        grid-template-columns: 78px 1fr 90px;
      }
      .lyrics-row-card .input-lyric-en {
        display: none;
      }
      .toast-container {
        bottom: calc(var(--mobile-bar-h) + 16px);
        left: 12px;
        right: 12px;
      }
    }
  </style>
</head>
<body>

  <div id="admin-app">
    
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

      <!-- Menu Section: Overview -->
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
            <span class="nav-badge-pill" id="badge-track-count">۵</span>
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

      <!-- Menu Section: Collections -->
      <div class="nav-label">مجموعه‌ها و تعامل</div>
      <ul class="nav-list">
        <li>
          <a class="nav-link" id="nav-playlists" onclick="switchAdminView('playlists')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <span>پلی‌لیست‌ها</span>
            <span class="nav-badge-pill" id="badge-playlist-count">۴</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-artists" onclick="switchAdminView('artists')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            <span>هنرمندان</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-users" onclick="switchAdminView('users')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <span>کاربران و VIP</span>
            <span class="nav-badge-pill" id="badge-users-count">۴</span>
          </a>
        </li>
      </ul>

      <!-- Menu Section: System -->
      <div class="nav-label">سیستم و استودیو</div>
      <ul class="nav-list">
        <li>
          <a class="nav-link" id="nav-settings" onclick="switchAdminView('settings')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
            <span>تنظیمات استریم</span>
          </a>
        </li>
      </ul>

      <div class="sidebar-divider"></div>

      <!-- Studio engine status badge -->
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

          <button class="action-circle-btn" onclick="showToast('۳ قطعه صوتی در صف استودیو برای همگام‌سازی لیریکس منتظر هستند')" title="اعلان‌ها">
            <div class="badge-dot"></div>
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
          </button>

          <!-- Admin Profile Pill -->
          <div class="admin-profile-pill" onclick="showToast('سهراب پارسا (مدیر ارشد پلتفرم سهپاتیفای)')">
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
          
          <!-- KPI Stats -->
          <div class="stats-kpi-grid">
            <div class="kpi-card">
              <div class="kpi-card-header">
                <span class="kpi-title">مجموع قطعات ثبت شده</span>
                <div class="kpi-icon-box">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                </div>
              </div>
              <div class="kpi-value" id="kpi-total-tracks">۵</div>
              <div class="kpi-subtext">
                <span class="kpi-trend-up">۱۰۰٪</span>
                <span>فرمت استودیو مستر Hi-Res</span>
              </div>
            </div>

            <div class="kpi-card">
              <div class="kpi-card-header">
                <span class="kpi-title">لیریکس‌های همگام‌سازی شده</span>
                <div class="kpi-icon-box" style="color:var(--accent-purple);">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                </div>
              </div>
              <div class="kpi-value" id="kpi-synced-lyrics">۴ / ۵</div>
              <div class="kpi-subtext">
                <span class="kpi-trend-up">۸۰٪ پوشش</span>
                <span>تایم‌استمپ میلی‌ثانیه‌ای</span>
              </div>
            </div>

            <div class="kpi-card">
              <div class="kpi-card-header">
                <span class="kpi-title">مجموع استریم‌ها</span>
                <div class="kpi-icon-box" style="color:var(--accent-blue);">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
              </div>
              <div class="kpi-value" id="kpi-total-streams">۶۰۱,۹۰۰</div>
              <div class="kpi-subtext">
                <span class="kpi-trend-up">+۲۱.۵٪</span>
                <span>رشد نسبت به ماه قبل</span>
              </div>
            </div>

            <div class="kpi-card">
              <div class="kpi-card-header">
                <span class="kpi-title">کاربران فعال VIP</span>
                <div class="kpi-icon-box" style="color:var(--accent-amber);">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
              </div>
              <div class="kpi-value">۲,۸۴۰</div>
              <div class="kpi-subtext">
                <span class="kpi-trend-up">+۱۱۴ اشتراک</span>
                <span>در هفته جاری</span>
              </div>
            </div>
          </div>

          <!-- Interactive Streams Chart Section -->
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

            <div style="position:relative; width:100%; height:220px;">
              <canvas id="streams-analytics-canvas" style="width:100%; height:100%;"></canvas>
            </div>
          </div>

          <!-- Quick Action Banner for Lyrics Studio -->
          <div style="background: linear-gradient(135deg, rgba(16, 185, 84, 0.16) 0%, rgba(22, 22, 34, 0.95) 100%); border:1px solid var(--border-brand); border-radius:var(--radius-md); padding:18px 22px; display:flex; align-items:center; justify-content:space-between; gap:16px; margin-bottom:24px; flex-wrap:wrap;">
            <div>
              <div style="font-weight:800; font-size:15px; color:#fff; margin-bottom:4px;">استودیو فوق‌حرفه‌ای لیریکس همگام‌ساز (Timed Lyrics Studio)</div>
              <div style="font-size:12px; color:var(--muted);">با کلید فضا (Space) یا دکمه لمسی، زمان دقیق هر مصرع را همزمان با پخش موسیقی میلی‌ثانیه‌ای نشانه بزنید.</div>
            </div>
            <button class="btn-quick-action" onclick="switchAdminView('lyrics')" style="padding:10px 22px;">
              <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
              <span>ورود به استودیو لیریکس</span>
            </button>
          </div>

          <!-- Real-time Listeners Activity -->
          <div class="panel-card">
            <div class="section-title-row">
              <h3 class="section-title">در حال پخش آنلاین در پلتفرم (Live Activity)</h3>
              <span class="badge-status synced">● زنده و متصل</span>
            </div>
            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap:12px;" id="live-activity-grid"></div>
          </div>
        </section>

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
            <!-- Filter & Search Toolbar -->
            <div class="table-controls-bar">
              <div class="filter-chips-row">
                <button class="filter-chip active" onclick="filterTracksTable('all', this)">همه آهنگ‌ها</button>
                <button class="filter-chip" onclick="filterTracksTable('synced', this)">دارای لیریکس همگام</button>
                <button class="filter-chip" onclick="filterTracksTable('no-lyrics', this)">فاقد لیریکس</button>
                <button class="filter-chip" onclick="filterTracksTable('lossless', this)">FLAC 24-bit Lossless</button>
              </div>

              <div style="display:flex; align-items:center; gap:8px;">
                <input type="text" class="form-control" style="width:220px; padding:7px 12px; font-size:12px;" placeholder="جستجو در این جدول..." oninput="searchTracksLocal(this.value)" />
              </div>
            </div>

            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>کاور و نام اثر</th>
                    <th>هنرمند</th>
                    <th>آلبوم</th>
                    <th>مدت زمان</th>
                    <th>کیفیت صوتی</th>
                    <th>وضعیت لیریکس</th>
                    <th>استریم</th>
                    <th>عملیات</th>
                  </tr>
                </thead>
                <tbody id="tracks-table-body"></tbody>
              </table>
            </div>
          </div>
        </section>

        <section class="admin-panel-view" id="view-lyrics">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">استودیو پیشرفته همگام‌سازی لیریکس (Timed Lyrics Studio)</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">با فشردن دکمه ثبت تایم لحظه‌ای یا کلید Space زمان دقیق را ذخیره کنید</p>
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
            
            <!-- Left: Lyrics Editor & Timestamp Controls -->
            <div class="studio-editor-card">
              
              <!-- Header with Track Selector -->
              <div class="studio-header">
                <div class="studio-track-select-box">
                  <span style="font-size:12.5px; font-weight:700; color:var(--muted); white-space:nowrap;">آهنگ هدف:</span>
                  <select class="select-styled" id="studio-track-picker" onchange="onStudioTrackChange(this.value)"></select>
                </div>

                <div style="display:flex; align-items:center; gap:8px;">
                  <button class="btn-secondary" style="padding:6px 12px; font-size:11.5px;" onclick="addNewLyricRow()">+ خط جدید</button>
                  <button class="btn-secondary" style="padding:6px 12px; font-size:11.5px; color:var(--accent-red);" onclick="clearAllLyrics()">پاک‌سازی</button>
                </div>
              </div>

              <!-- Audio Player Toolbar with Realtime Stamping -->
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

                    <!-- Speed Control -->
                    <div class="speed-selector-group">
                      <button class="speed-btn" onclick="setStudioSpeed(0.5, this)">0.5x</button>
                      <button class="speed-btn" onclick="setStudioSpeed(0.75, this)">0.75x</button>
                      <button class="speed-btn active" onclick="setStudioSpeed(1.0, this)">1.0x</button>
                    </div>
                  </div>

                  <!-- Magic LIVE STAMP BUTTON -->
                  <button class="btn-stamp-live" onclick="stampCurrentTimeOnActiveRow()" title="ثبت زمان کنونی برای خط انتخابی (کلید Space)">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>ثبت تایم لحظه‌ای (Space)</span>
                  </button>
                </div>

                <!-- Studio Interactive Scrubber -->
                <div class="studio-progress-track" id="studio-scrubber" onclick="onStudioScrubberClick(event)">
                  <div class="studio-progress-fill" id="studio-progress-fill"></div>
                </div>
              </div>

              <!-- Editable Lyrics Rows List -->
              <div class="studio-lines-scroll" id="studio-lyrics-list"></div>
            </div>

            <!-- Right: Realtime Karaoke Preview -->
            <div class="studio-preview-card">
              <div class="preview-header">
                <span>پیش‌نمایش زنده کارائوکه</span>
                <span style="font-size:11px; color:var(--brand); font-weight:700;">سینک خودکار</span>
              </div>

              <div class="preview-cover-box">
                <img class="preview-art" id="preview-track-art" src="" alt="" />
                <div>
                  <div style="font-weight:800; font-size:14px;" id="preview-track-title">عنوان اثر</div>
                  <div style="font-size:12px; color:var(--muted);" id="preview-track-artist">نام هنرمند</div>
                </div>
              </div>

              <!-- Stream Lines for Karaoke Highlight -->
              <div class="karaoke-stream-viewport" id="karaoke-preview-stream"></div>
            </div>

          </div>
        </section>

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

        <section class="admin-panel-view" id="view-artists">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">مدیریت هنرمندان، خوانندگان و آرتیست‌های رسمی</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">اعطای نشان تاییدیه، پایش شنوندگان و آلبوم‌ها</p>
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
                    <th>ژانر اصلی</th>
                    <th>عملیات</th>
                  </tr>
                </thead>
                <tbody id="artists-table-body"></tbody>
              </table>
            </div>
          </div>
        </section>

        <section class="admin-panel-view" id="view-users">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">مدیریت کاربران و اشتراک‌های طلایی Lossless</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">کنترل دسترسی‌ها، ارتقای سطح اشتراک و مانیتورینگ فعالیت</p>
            </div>
            <button class="btn-quick-action" onclick="openAddUserModal()">
              <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              <span>ثبت کاربر جدید</span>
            </button>
          </div>

          <div class="panel-card">
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>کاربر</th>
                    <th>ایمیل</th>
                    <th>سطح اشتراک</th>
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

        <section class="admin-panel-view" id="view-settings">
          <div class="section-title-row">
            <div>
              <h2 class="section-title">تنظیمات سرور و فرکانس‌های استریم سهپاتیفای</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:2px;">پیکربندی مستر Lossless، کش CDN و امنیت DRM صوتی</p>
            </div>
          </div>

          <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap:20px;">
            <div class="panel-card">
              <h3 style="font-size:15px; font-weight:800; margin-bottom:14px;">پیکربندی استودیو مستر صوتی</h3>
              
              <div class="form-group">
                <label class="form-label">فرمت پیش‌فرض استریم کاربران طلایی</label>
                <select class="form-control">
                  <option selected>FLAC Studio Master (24-bit / 96kHz) Lossless</option>
                  <option>ALAC Apple Lossless (24-bit / 48kHz)</option>
                  <option>MP3 320 kbps (High Quality)</option>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label">اندازه بافر استریم زنده</label>
                <input type="text" class="form-control" value="512 KB (بدون وقفه و بافرینگ صفر)" />
              </div>

              <div class="form-group" style="display:flex; justify-content:space-between; align-items:center; margin-top:14px;">
                <div>
                  <div style="font-weight:700;">رمزنگاری ضدکپی آهنگ‌ها (DRM Audio Shield)</div>
                  <div style="font-size:11px; color:var(--muted);">حفاظت از کپی غیرمجاز فایل اصلی استودیو</div>
                </div>
                <input type="checkbox" checked style="accent-color:var(--brand); width:20px; height:20px; cursor:pointer;" />
              </div>
            </div>

            <div class="panel-card">
              <h3 style="font-size:15px; font-weight:800; margin-bottom:14px;">فضای دیتاسنتر و CDN</h3>

              <div class="form-group">
                <label class="form-label">حجم اشغال‌شده توسط فایل‌های FLAC</label>
                <div style="font-size:20px; font-weight:900; color:var(--brand); margin-bottom:6px;">214.6 GB / 1000 GB</div>
                <div style="width:100%; height:8px; background:rgba(255,255,255,0.06); border-radius:10px; overflow:hidden;">
                  <div style="width:21.4%; height:100%; background:var(--brand);"></div>
                </div>
              </div>

              <div style="margin-top:20px; display:flex; flex-direction:column; gap:10px;">
                <button class="btn-secondary" onclick="showToast('حافظه موقت شبکه توزیع محتوا (CDN) تخلیه گردید.')">پاک‌سازی کش شبکه توزیع محتوا (Purge CDN)</button>
                <button class="btn-secondary" onclick="showToast('نسخه پشتیبان از تمامی متادیتاها و لیریکس‌ها ذخیره شد.')">پشتیبان‌گیری ابری فوری (Backup)</button>
              </div>
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
        <span>پلی‌‌لیست</span>
      </div>
      <div class="mobile-bar-btn" id="mob-users" onclick="switchAdminView('users')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        <span>کاربران</span>
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

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">عنوان ترانه *</label>
            <input type="text" class="form-control" id="track-form-name" placeholder="مثال: آرمان‌شهر" />
          </div>
          <div class="form-group">
            <label class="form-label">هنرمند / گروه *</label>
            <input type="text" class="form-control" id="track-form-artist" placeholder="مثال: چارتار" />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">نام آلبوم</label>
            <input type="text" class="form-control" id="track-form-album" placeholder="مثال: باران تویی" />
          </div>
          <div class="form-group">
            <label class="form-label">ژانر موسیقی</label>
            <select class="form-control" id="track-form-genre">
              <option>تلفیقی و الکترونیک</option>
              <option>سنتی معاصر</option>
              <option>آلترناتیو</option>
              <option>امبینت و ریلکس</option>
              <option>پاپ مدرن</option>
            </select>
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">مدت زمان (دقیقه:ثانیه) *</label>
            <input type="text" class="form-control" id="track-form-duration" placeholder="04:12" value="03:45" />
          </div>
          <div class="form-group">
            <label class="form-label">کیفیت FLAC Lossless</label>
            <select class="form-control" id="track-form-hires">
              <option value="true">بله - 24bit / 96kHz Lossless</option>
              <option value="false">خیر - 320kbps MP3</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">آدرس کاور تصویر (URL Artwork)</label>
          <input type="text" class="form-control" id="track-form-cover" value="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500&auto=format&fit=crop&q=80" />
        </div>

        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-track')">انصراف</button>
          <button class="btn-quick-action" onclick="saveTrackFromModal()">ذخیره آهنگ</button>
        </div>
      </div>
    </div>

    <!-- MODAL 2: ADD PLAYLIST -->
    <div class="modal-backdrop" id="modal-playlist">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title">ساخت پلی‌لیست اختصاصی</h3>
          <button class="btn-table-action" onclick="closeModal('modal-playlist')">✕</button>
        </div>
        <div class="form-group">
          <label class="form-label">عنوان پلی‌لیست *</label>
          <input type="text" class="form-control" id="playlist-form-title" placeholder="مثال: شب‌های تهران" />
        </div>
        <div class="form-group">
          <label class="form-label">توضیحات</label>
          <input type="text" class="form-control" id="playlist-form-desc" placeholder="توضیحاتی برای شنوندگان..." />
        </div>
        <div class="form-group">
          <label class="form-label">آدرس تصویر کاور (URL)</label>
          <input type="text" class="form-control" id="playlist-form-cover" value="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=80" />
        </div>
        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-playlist')">انصراف</button>
          <button class="btn-quick-action" onclick="savePlaylistFromModal()">ساخت پلی‌لیست</button>
        </div>
      </div>
    </div>

    <!-- MODAL 3: ADD ARTIST -->
    <div class="modal-backdrop" id="modal-artist">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title">افزودن آرتیست رسمی</h3>
          <button class="btn-table-action" onclick="closeModal('modal-artist')">✕</button>
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">نام هنرمند / گروه *</label>
            <input type="text" class="form-control" id="artist-form-name" placeholder="مثال: پرواز همای" />
          </div>
          <div class="form-group">
            <label class="form-label">ژانر اصلی</label>
            <input type="text" class="form-control" id="artist-form-genre" placeholder="مثال: سنتی معاصر" />
          </div>
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">تعداد شنوندگان تخمینی</label>
            <input type="text" class="form-control" id="artist-form-listeners" placeholder="مثال: ۱,۲۰۰,۰۰۰" value="۸۵۰,۰۰۰" />
          </div>
          <div class="form-group">
            <label class="form-label">نشان رسمی تایید (Verified)</label>
            <select class="form-control" id="artist-form-verified">
              <option value="true">دارای تیک رسمی</option>
              <option value="false">در انتظار تایید</option>
            </select>
          </div>
        </div>
        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-artist')">انصراف</button>
          <button class="btn-quick-action" onclick="saveArtistFromModal()">ثبت هنرمند</button>
        </div>
      </div>
    </div>

    <!-- MODAL 4: ADD USER -->
    <div class="modal-backdrop" id="modal-user">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title">تعریف کاربر جدید</h3>
          <button class="btn-table-action" onclick="closeModal('modal-user')">✕</button>
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">نام و نام خانوادگی *</label>
            <input type="text" class="form-control" id="user-form-name" placeholder="نگین خسروی" />
          </div>
          <div class="form-group">
            <label class="form-label">ایمیل *</label>
            <input type="email" class="form-control" id="user-form-email" placeholder="negin@example.com" />
          </div>
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label">سطح اشتراک</label>
            <select class="form-control" id="user-form-plan">
              <option value="طلایی Hi-Res (یک ساله)">طلایی Hi-Res (یک ساله)</option>
              <option value="پرمیوم استاندارد">پرمیوم استاندارد</option>
              <option value="رایگان">رایگان</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">نقش دسترسی</label>
            <select class="form-control" id="user-form-role">
              <option value="کاربر">کاربر</option>
              <option value="آرتیست رسمی">آرتیست رسمی</option>
              <option value="مدیر ارشد">مدیر ارشد</option>
            </select>
          </div>
        </div>
        <div class="modal-actions">
          <button class="btn-secondary" onclick="closeModal('modal-user')">انصراف</button>
          <button class="btn-quick-action" onclick="saveUserFromModal()">افزودن کاربر</button>
        </div>
      </div>
    </div>

    <!-- MODAL 5: BULK LYRICS PARSER -->
    <div class="modal-backdrop" id="modal-bulk-lyrics">
      <div class="modal-container">
        <div class="modal-head">
          <h3 class="modal-title">تبدیل متن ساده به خطوط همگام‌سازی</h3>
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

    <!-- Toast Notifications Shelf -->
    <div class="toast-container" id="toast-shelf"></div>

  </div>

  <script>
    const DEFAULT_TRACKS = [
      {
        id: 1,
        title: "آرمان‌شهر",
        artist: "چارتار (Chaartaar)",
        album: "باران تویی",
        duration: "04:12",
        durationSec: 252,
        cover: "https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500&auto=format&fit=crop&q=80",
        genre: "تلفیقی و الکترونیک",
        isLossless: true,
        streams: 142800,
        lyrics: [
          { time: 0, fa: "در هوایت بی قرارم روز و شب...", en: "Restless in your yearning day and night..." },
          { time: 15.2, fa: "سر ز پایت بر ندارم روز و شب...", en: "My head upon your path, without end..." },
          { time: 30.5, fa: "آسمان با رقص ما روشن شد از نور سحر", en: "The skies ignited with dawn from our dance" },
          { time: 55.0, fa: "ریتم باران روی سازم زندگی بخشید باز", en: "The rhythm of rain breathed life upon my strings" }
        ]
      },
      {
        id: 2,
        title: "طهران در مه",
        artist: "اکو تهران (Echo Tehran)",
        album: "شب‌های دود و چراغ",
        duration: "03:45",
        durationSec: 225,
        cover: "https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=80",
        genre: "آلترناتیو",
        isLossless: true,
        streams: 89400,
        lyrics: [
          { time: 0, fa: "چراغ‌های اتوبان در امتداد شب", en: "Highway lights stretching across midnight" },
          { time: 20.4, fa: "صدای پای خاطره در ازدحام مه", en: "Echoes of memory amidst the velvet haze" },
          { time: 42.1, fa: "سهپاتیفای در گوش من زمزمه می‌کند", en: "Sehpatify murmuring softly in my ears" }
        ]
      },
      {
        id: 3,
        title: "آواز سکوت",
        artist: "دریا دادور (Darya)",
        album: "انعکاس نور",
        duration: "05:02",
        durationSec: 302,
        cover: "https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=500&auto=format&fit=crop&q=80",
        genre: "سنتی معاصر",
        isLossless: true,
        streams: 63200,
        lyrics: [
          { time: 0, fa: "سکوت سرشار از ناگفته‌هاست...", en: "Silence overflows with unspoken words..." },
          { time: 25.8, fa: "در عمق جان، نوای تار می‌پیچد", en: "Deep in the soul, strings resonate" }
        ]
      },
      {
        id: 4,
        title: "نبض بی‌پایان (Pulse)",
        artist: "نیما فرهمند (Nima)",
        album: "مدار بیست و چهار",
        duration: "03:18",
        durationSec: 198,
        cover: "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=500&auto=format&fit=crop&q=80",
        genre: "امبینت و ریلکس",
        isLossless: true,
        streams: 112000,
        lyrics: [
          { time: 0, fa: "موج در موج، ارتعاش بی‌پایان نور", en: "Wave upon wave, infinite vibrations of light" },
          { time: 22.0, fa: "ریتم، درون تو جاری است", en: "The rhythm lives within you" }
        ]
      },
      {
        id: 5,
        title: "کویر و ستاره",
        artist: "کیهان کلهر & اردال ارزنجان",
        album: "باد صبا",
        duration: "06:40",
        durationSec: 400,
        cover: "https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=500&auto=format&fit=crop&q=80",
        genre: "سنتی معاصر",
        isLossless: true,
        streams: 194500,
        lyrics: []
      }
    ];

    let TRACKS_DB = JSON.parse(localStorage.getItem('sehpatify_tracks')) || DEFAULT_TRACKS;

    let PLAYLISTS_DB = JSON.parse(localStorage.getItem('sehpatify_playlists')) || [
      { id: 101, title: "شب‌های تهران", count: "۲۴ قطعه", cover: "https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=80", desc: "نواهای دلنشین برای رانندگی شبانه و آرامش پایتخت" },
      { id: 102, title: "تمرکز عمیق (Deep Focus)", count: "۳۸ قطعه", cover: "https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500&auto=format&fit=crop&q=80", desc: "لوفای و امبینت برای بیشترین تمرکز کاری و ذهنی" },
      { id: 103, title: "نوستالژی دهه‌ی هفتاد", count: "۵۰ قطعه", cover: "https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=500&auto=format&fit=crop&q=80", desc: "یادآور خاطرات طلایی و آواهای ماندگار کاست‌ها" },
      { id: 104, title: "Persian Essentials", count: "۳۲ قطعه", cover: "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=500&auto=format&fit=crop&q=80", desc: "شاهکارهای اصیل موسیقی که هر ایرانی باید بشنود" }
    ];

    let ARTISTS_DB = JSON.parse(localStorage.getItem('sehpatify_artists')) || [
      { name: "چارتار", listeners: "۱,۸۴۰,۳۲۰", verified: true, count: 18, genre: "تلفیقی الکترونیک" },
      { name: "همایون شجریان", listeners: "۲,۴۱۰,۰۰۰", verified: true, count: 42, genre: "سنتی اصیل" },
      { name: "اکو تهران", listeners: "۹۵۰,۲۰۰", verified: true, count: 12, genre: "آلترناتیو" },
      { name: "نیما فرهمند", listeners: "۶۴۰,۱۵۰", verified: false, count: 8, genre: "امبینت" }
    ];

    let USERS_DB = JSON.parse(localStorage.getItem('sehpatify_users')) || [
      { id: 1, name: "سهراب پارسا", email: "sohrab@sehpatify.ir", plan: "طلایی Hi-Res (یک ساله)", role: "مدیر ارشد", date: "۱۴۰۲/۰۶/۱۵", active: true },
      { id: 2, name: "مریم کیانی", email: "maryam@gmail.com", plan: "پرمیوم استاندارد", role: "کاربر", date: "۱۴۰۳/۰۱/۲۰", active: true },
      { id: 3, name: "احسان علوی", email: "ehsan.alavi@yahoo.com", plan: "رایگان", role: "کاربر", date: "۱۴۰۳/۰۴/۱۱", active: true },
      { id: 4, name: "آرش افشار", email: "arash@soundstudio.com", plan: "طلایی Hi-Res (یک ساله)", role: "آرتیست رسمی", date: "۱۴۰۲/۱۱/۰۴", active: true }
    ];

    let currentAdminView = 'dashboard';
    let selectedStudioTrackId = 1;
    let studioIsPlaying = false;
    let studioCurrentTime = 0;
    let studioPlaybackRate = 1.0;
    let studioTimerInterval = null;
    let activeEditingLineIndex = 0;

    // Web Audio Synthesizer Engine
    let audioCtx = null;
    let synthOsc = null;
    let synthGain = null;

    function initStudioAudio() {
      if (!audioCtx) {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        audioCtx = new AudioContext();
      }
      if (audioCtx.state === 'suspended') {
        audioCtx.resume();
      }
    }

    function startAudioTone() {
      try {
        initStudioAudio();
        stopAudioTone();
        synthOsc = audioCtx.createOscillator();
        synthGain = audioCtx.createGain();
        synthOsc.type = 'sine';
        synthOsc.frequency.setValueAtTime(240, audioCtx.currentTime);
        synthGain.gain.setValueAtTime(0.001, audioCtx.currentTime);
        synthGain.gain.exponentialRampToValueAtTime(0.04, audioCtx.currentTime + 0.3);
        synthOsc.connect(synthGain);
        synthGain.connect(audioCtx.destination);
        synthOsc.start();
      } catch (err) {}
    }

    function stopAudioTone() {
      if (synthGain && audioCtx) {
        try {
          synthGain.gain.exponentialRampToValueAtTime(0.0001, audioCtx.currentTime + 0.1);
          setTimeout(() => {
            if (synthOsc) {
              synthOsc.stop();
              synthOsc = null;
            }
          }, 120);
        } catch(e) {}
      }
    }

    function saveState() {
      localStorage.setItem('sehpatify_tracks', JSON.stringify(TRACKS_DB));
      localStorage.setItem('sehpatify_playlists', JSON.stringify(PLAYLISTS_DB));
      localStorage.setItem('sehpatify_artists', JSON.stringify(ARTISTS_DB));
      localStorage.setItem('sehpatify_users', JSON.stringify(USERS_DB));
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
        users: { title: "مدیریت کاربران و VIP", crumb: "سهپاتیفای استودیو / اعضای فعال" },
        settings: { title: "تنظیمات استریم صوتی", crumb: "سهپاتیفای استودیو / پیکربندی Lossless" }
      };

      if (titles[viewKey]) {
        document.getElementById('topbar-title').textContent = titles[viewKey].title;
        document.getElementById('topbar-breadcrumb').textContent = titles[viewKey].crumb;
      }

      document.getElementById('admin-sidebar').classList.remove('open');
      document.getElementById('viewport').scrollTo({ top: 0, behavior: 'smooth' });

      if (viewKey === 'lyrics') {
        renderStudioView();
      } else if (viewKey === 'dashboard') {
        drawStreamsChart('7d');
      }
    }

    function toggleMobileSidebar() {
      document.getElementById('admin-sidebar').classList.toggle('open');
    }

    function drawStreamsChart(period = '7d') {
      const canvas = document.getElementById('streams-analytics-canvas');
      if (!canvas) return;
      const ctx = canvas.getContext('2d');
      canvas.width = canvas.parentElement.offsetWidth;
      canvas.height = canvas.parentElement.offsetHeight;

      let labels = ["شنبه", "۱شنبه", "۲شنبه", "۳شنبه", "۴شنبه", "۵شنبه", "جمعه"];
      let values = [48, 62, 54, 75, 89, 120, 155]; // in thousands

      if (period === '30d') {
        labels = ["هفته ۱", "هفته ۲", "هفته ۳", "هفته ۴"];
        values = [310, 420, 580, 690];
      } else if (period === '12m') {
        labels = ["فروردین", "تیر", "مهر", "دی", "اسفند"];
        values = [820, 1150, 1600, 2100, 2800];
      }

      ctx.clearRect(0, 0, canvas.width, canvas.height);

      const maxVal = Math.max(...values) * 1.25;
      const paddingX = 40;
      const paddingY = 30;
      const graphW = canvas.width - paddingX * 2;
      const graphH = canvas.height - paddingY * 2;

      // Draw Grid Lines
      ctx.strokeStyle = "rgba(255, 255, 255, 0.05)";
      ctx.lineWidth = 1;
      for (let i = 0; i <= 4; i++) {
        const y = paddingY + (graphH / 4) * i;
        ctx.beginPath();
        ctx.moveTo(paddingX, y);
        ctx.lineTo(canvas.width - paddingX, y);
        ctx.stroke();
      }

      // Draw Gradient Area
      const points = values.map((val, idx) => {
        const x = paddingX + (graphW / (values.length - 1)) * idx;
        const y = paddingY + graphH - (val / maxVal) * graphH;
        return { x, y, val, label: labels[idx] };
      });

      const grad = ctx.createLinearGradient(0, paddingY, 0, canvas.height - paddingY);
      grad.addColorStop(0, "rgba(16, 185, 84, 0.35)");
      grad.addColorStop(1, "rgba(16, 185, 84, 0.0)");

      ctx.beginPath();
      ctx.moveTo(points[0].x, canvas.height - paddingY);
      points.forEach(p => ctx.lineTo(p.x, p.y));
      ctx.lineTo(points[points.length - 1].x, canvas.height - paddingY);
      ctx.closePath();
      ctx.fillStyle = grad;
      ctx.fill();

      // Stroke Line
      ctx.beginPath();
      ctx.strokeStyle = "#10B954";
      ctx.lineWidth = 3.5;
      ctx.lineJoin = "round";
      points.forEach((p, idx) => {
        if (idx === 0) ctx.moveTo(p.x, p.y);
        else ctx.lineTo(p.x, p.y);
      });
      ctx.stroke();

      // Dots and Text
      ctx.font = "11px Vazirmatn";
      ctx.fillStyle = "#9696A3";
      ctx.textAlign = "center";

      points.forEach(p => {
        ctx.beginPath();
        ctx.arc(p.x, p.y, 4.5, 0, Math.PI * 2);
        ctx.fillStyle = "#FFFFFF";
        ctx.fill();
        ctx.strokeStyle = "#10B954";
        ctx.lineWidth = 2.5;
        ctx.stroke();

        ctx.fillStyle = "#9696A3";
        ctx.fillText(p.label, p.x, canvas.height - 8);
      });
    }

    function updateChartPeriod(period) {
      document.querySelectorAll('#chart-btn-7d, #chart-btn-30d, #chart-btn-12m').forEach(b => b.classList.remove('active'));
      const activeBtn = document.getElementById(`chart-btn-${period}`);
      if (activeBtn) activeBtn.classList.add('active');
      drawStreamsChart(period);
    }

    function renderTracksTable(tracksToRender = TRACKS_DB) {
      const tbody = document.getElementById('tracks-table-body');
      if (!tbody) return;

      tbody.innerHTML = tracksToRender.map((t, idx) => `
        <tr>
          <td><span style="color:var(--muted); font-weight:700;">${idx + 1}</span></td>
          <td>
            <div class="track-meta-cell">
              <img class="track-cover-thumb" src="${t.cover}" alt="${t.title}" />
              <div>
                <div style="font-weight:800; font-size:13.5px;">${t.title}</div>
                <div style="font-size:11px; color:var(--muted);">${t.genre}</div>
              </div>
            </div>
          </td>
          <td><span style="font-weight:600;">${t.artist}</span></td>
          <td><span style="color:var(--muted);">${t.album}</span></td>
          <td style="direction:ltr; text-align:right;">${t.duration}</td>
          <td>
            <span class="badge-status ${t.isLossless ? 'hi-res' : ''}">
              ${t.isLossless ? 'FLAC 24-bit' : 'MP3 320k'}
            </span>
          </td>
          <td>
            <span class="badge-status ${t.lyrics && t.lyrics.length > 0 ? 'synced' : 'empty'}">
              ${t.lyrics && t.lyrics.length > 0 ? `✓ ${t.lyrics.length} سطر همگام` : 'فاقد لیریکس'}
            </span>
          </td>
          <td style="font-weight:700; color:var(--muted);">${t.streams.toLocaleString('fa-IR')}</td>
          <td>
            <div class="table-actions-cell">
              <button class="btn-table-action lyrics-action" onclick="openTrackInLyricsStudio(${t.id})" title="ورود به استودیو لیریکس این آهنگ">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                <span>لیریکس</span>
              </button>
              <button class="btn-table-action" onclick="openEditTrackModal(${t.id})" title="ویرایش اطلاعات">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
              </button>
              <button class="btn-table-action danger" onclick="deleteTrack(${t.id})" title="حذف اثر">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');

      // Update KPI
      document.getElementById('kpi-total-tracks').textContent = TRACKS_DB.length;
      const syncedCount = TRACKS_DB.filter(t => t.lyrics && t.lyrics.length > 0).length;
      document.getElementById('kpi-synced-lyrics').textContent = `${syncedCount} / ${TRACKS_DB.length}`;
      document.getElementById('badge-track-count').textContent = TRACKS_DB.length;
    }

    function filterTracksTable(filterKey, chipBtn) {
      document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
      chipBtn.classList.add('active');

      if (filterKey === 'all') {
        renderTracksTable(TRACKS_DB);
      } else if (filterKey === 'synced') {
        renderTracksTable(TRACKS_DB.filter(t => t.lyrics && t.lyrics.length > 0));
      } else if (filterKey === 'no-lyrics') {
        renderTracksTable(TRACKS_DB.filter(t => !t.lyrics || t.lyrics.length === 0));
      } else if (filterKey === 'lossless') {
        renderTracksTable(TRACKS_DB.filter(t => t.isLossless));
      }
    }

    function searchTracksLocal(query) {
      const q = query.toLowerCase().trim();
      const results = TRACKS_DB.filter(t => 
        t.title.toLowerCase().includes(q) ||
        t.artist.toLowerCase().includes(q) ||
        t.album.toLowerCase().includes(q)
      );
      renderTracksTable(results);
    }

    function handleAdminGlobalSearch(query) {
      if (!query.trim()) return;
      switchAdminView('tracks');
      searchTracksLocal(query);
    }

    function renderLiveActivity() {
      const container = document.getElementById('live-activity-grid');
      if (!container) return;

      const activeUsersMock = [
        { track: "آرمان‌شهر", artist: "چارتار", user: "امیرحسین • شیراز", quality: "FLAC 96kHz" },
        { track: "طهران در مه", artist: "اکو تهران", user: "نیلوفر • تهران", quality: "FLAC Lossless" },
        { track: "آواز سکوت", artist: "دریا دادور", user: "آریا • اصفهان", quality: "Studio Master" },
        { track: "نبض بی‌پایان", artist: "نیما فرهمند", user: "سحر • رشت", quality: "FLAC Lossless" }
      ];

      container.innerHTML = activeUsersMock.map(item => `
        <div style="background:var(--surface-elevated); border:1px solid var(--border); border-radius:var(--radius-sm); padding:10px 14px; display:flex; align-items:center; justify-content:space-between;">
          <div style="display:flex; align-items:center; gap:10px;">
            <div class="status-dot-pulse"></div>
            <div>
              <div style="font-weight:700; font-size:13px;">${item.track}</div>
              <div style="font-size:11px; color:var(--muted);">${item.user}</div>
            </div>
          </div>
          <span style="font-size:10px; color:var(--brand); font-weight:700; background:rgba(16,185,84,0.1); padding:2px 8px; border-radius:var(--radius-full);">${item.quality}</span>
        </div>
      `).join('');
    }

    function renderStudioView() {
      const picker = document.getElementById('studio-track-picker');
      picker.innerHTML = TRACKS_DB.map(t => `
        <option value="${t.id}" ${t.id === selectedStudioTrackId ? 'selected' : ''}>
          ${t.title} — ${t.artist} (${t.lyrics ? t.lyrics.length : 0} سطر)
        </option>
      `).join('');

      loadStudioTrack(selectedStudioTrackId);
    }

    function onStudioTrackChange(trackId) {
      selectedStudioTrackId = parseInt(trackId, 10);
      loadStudioTrack(selectedStudioTrackId);
    }

    function openTrackInLyricsStudio(trackId) {
      selectedStudioTrackId = trackId;
      switchAdminView('lyrics');
      renderStudioView();
    }

    function loadStudioTrack(trackId) {
      const track = TRACKS_DB.find(t => t.id === trackId) || TRACKS_DB[0];
      if (!track) return;

      document.getElementById('preview-track-art').src = track.cover;
      document.getElementById('preview-track-title').textContent = track.title;
      document.getElementById('preview-track-artist').textContent = track.artist;

      studioCurrentTime = 0;
      updateStudioTimerDisplay(0);
      updateStudioScrubberFill(0);

      renderStudioLyricsList(track);
      renderKaraokePreview(track);
    }

    function renderStudioLyricsList(track) {
      const listContainer = document.getElementById('studio-lyrics-list');
      if (!track.lyrics || track.lyrics.length === 0) {
        listContainer.innerHTML = `
          <div style="text-align:center; padding:45px 16px; color:var(--muted);">
            <div style="font-size:15px; font-weight:700; margin-bottom:6px;">هنوز سطری برای لیریکس این اثر ثبت نشده است.</div>
            <div style="font-size:12px; margin-bottom:16px;">می‌توانید خطوط جدید اضافه کرده یا کل شعر را با فرمت فله‌ای (Bulk) یا فایل LRC وارد کنید.</div>
            <button class="btn-quick-action" style="margin:0 auto;" onclick="addNewLyricRow()">+ ایجاد اولین سطر شعر</button>
          </div>
        `;
        return;
      }

      listContainer.innerHTML = track.lyrics.map((line, idx) => `
        <div class="lyrics-row-card ${idx === activeEditingLineIndex ? 'active-line' : ''}" id="lyrics-row-${idx}" onclick="selectLyricLineForEdit(${idx})">
          <div>
            <input type="text" class="input-timestamp" value="${formatTimeWithMs(line.time)}" onchange="updateLineTime(${idx}, this.value)" title="زمان (دقیقه:ثانیه)" />
          </div>
          <div>
            <input type="text" class="input-lyric-txt" value="${escapeHtml(line.fa || '')}" oninput="updateLineFa(${idx}, this.value)" placeholder="متن فارسی شعر..." />
          </div>
          <div>
            <input type="text" class="input-lyric-txt input-lyric-en" value="${escapeHtml(line.en || '')}" oninput="updateLineEn(${idx}, this.value)" placeholder="ترجمه انگلیسی..." />
          </div>
          <div style="display:flex; align-items:center; gap:4px; justify-content:flex-end;">
            <button class="nudge-btn" onclick="event.stopPropagation(); nudgeLineTime(${idx}, -0.5);">-0.5s</button>
            <button class="nudge-btn" onclick="event.stopPropagation(); nudgeLineTime(${idx}, +0.5);">+0.5s</button>
            <button class="btn-table-action" onclick="event.stopPropagation(); stampCurrentTimeOnLine(${idx});" title="مهر زمان کنونی">
              <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </button>
            <button class="btn-table-action danger" onclick="event.stopPropagation(); deleteLyricLine(${idx});" title="حذف خط">
              <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </button>
          </div>
        </div>
      `).join('');
    }

    function renderKaraokePreview(track) {
      const container = document.getElementById('karaoke-preview-stream');
      if (!track.lyrics || track.lyrics.length === 0) {
        container.innerHTML = `<div style="color:var(--muted); font-size:12.5px; padding-top:40px;">بدون لیریکس برای پیش‌نمایش</div>`;
        return;
      }

      container.innerHTML = track.lyrics.map((line, idx) => `
        <div class="karaoke-line ${idx === 0 ? 'active' : ''}" id="karaoke-line-${idx}" onclick="jumpToLineTime(${line.time})">
          <div>${line.fa || '...'}</div>
          ${line.en ? `<span class="karaoke-trans">${line.en}</span>` : ''}
        </div>
      `).join('');
    }

    function selectLyricLineForEdit(idx) {
      activeEditingLineIndex = idx;
      document.querySelectorAll('.lyrics-row-card').forEach(r => r.classList.remove('active-line'));
      const activeRow = document.getElementById(`lyrics-row-${idx}`);
      if (activeRow) activeRow.classList.add('active-line');
    }

    function addNewLyricRow() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;
      if (!track.lyrics) track.lyrics = [];

      const newTime = Math.round(studioCurrentTime * 10) / 10;
      track.lyrics.push({
        time: newTime,
        fa: "متن شعر جدید...",
        en: ""
      });

      track.lyrics.sort((a, b) => a.time - b.time);
      activeEditingLineIndex = track.lyrics.findIndex(l => l.time === newTime);

      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      showToast(`سطر جدید در ثانیه ${newTime} اضافه شد`);
    }

    function deleteLyricLine(idx) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics) return;
      track.lyrics.splice(idx, 1);
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      showToast('سطر لیریکس حذف شد');
    }

    function updateLineFa(idx, value) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (track && track.lyrics[idx]) {
        track.lyrics[idx].fa = value;
        renderKaraokePreview(track);
      }
    }

    function updateLineEn(idx, value) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (track && track.lyrics[idx]) {
        track.lyrics[idx].en = value;
        renderKaraokePreview(track);
      }
    }

    function updateLineTime(idx, timeStr) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics[idx]) return;

      const sec = parseTimeStrToSeconds(timeStr);
      track.lyrics[idx].time = sec;
      track.lyrics.sort((a, b) => a.time - b.time);
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
    }

    function nudgeLineTime(idx, delta) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics[idx]) return;
      track.lyrics[idx].time = Math.max(0, Math.round((track.lyrics[idx].time + delta) * 10) / 10);
      track.lyrics.sort((a, b) => a.time - b.time);
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
    }

    function stampCurrentTimeOnActiveRow() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics || track.lyrics.length === 0) {
        addNewLyricRow();
        return;
      }
      stampCurrentTimeOnLine(activeEditingLineIndex);
    }

    function stampCurrentTimeOnLine(idx) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics[idx]) return;

      const stampedSec = Math.round(studioCurrentTime * 10) / 10;
      track.lyrics[idx].time = stampedSec;
      
      if (idx < track.lyrics.length - 1) {
        activeEditingLineIndex = idx + 1;
      }

      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      showToast(`زمان خط به ${formatTimeWithMs(stampedSec)} متصل گردید ✓`);
    }

    function clearAllLyrics() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;
      track.lyrics = [];
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      showToast('خطوط لیریکس پاک‌سازی شدند');
    }

    function jumpToLineTime(sec) {
      studioCurrentTime = sec;
      updateStudioTimerDisplay(studioCurrentTime);
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (track) {
        updateStudioScrubberFill((studioCurrentTime / track.durationSec) * 100);
      }
      syncKaraokeHighlight(studioCurrentTime);
    }

    function toggleStudioAudio() {
      studioIsPlaying = !studioIsPlaying;
      const playBtn = document.getElementById('studio-play-btn');
      
      if (studioIsPlaying) {
        playBtn.innerHTML = `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
        startAudioTone();
        studioTimerInterval = setInterval(tickStudioAudio, 100);
      } else {
        playBtn.innerHTML = `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>`;
        stopAudioTone();
        if (studioTimerInterval) clearInterval(studioTimerInterval);
      }
    }

    function setStudioSpeed(speed, btn) {
      studioPlaybackRate = speed;
      document.querySelectorAll('.speed-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      showToast(`سرور پخش روی ${speed}x تنظیم شد`);
    }

    function tickStudioAudio() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      const maxSec = track ? track.durationSec : 240;

      studioCurrentTime += 0.1 * studioPlaybackRate;
      if (studioCurrentTime > maxSec) {
        studioCurrentTime = 0;
        toggleStudioAudio();
        return;
      }

      updateStudioTimerDisplay(studioCurrentTime);
      updateStudioScrubberFill((studioCurrentTime / maxSec) * 100);
      syncKaraokeHighlight(studioCurrentTime);
    }

    function jumpStudioAudio(secondsOffset) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      const maxSec = track ? track.durationSec : 240;
      studioCurrentTime = Math.max(0, Math.min(maxSec, studioCurrentTime + secondsOffset));
      updateStudioTimerDisplay(studioCurrentTime);
      updateStudioScrubberFill((studioCurrentTime / maxSec) * 100);
      syncKaraokeHighlight(studioCurrentTime);
    }

    function onStudioScrubberClick(e) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;
      const rect = e.currentTarget.getBoundingClientRect();
      const fraction = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
      studioCurrentTime = fraction * track.durationSec;
      updateStudioTimerDisplay(studioCurrentTime);
      updateStudioScrubberFill(fraction * 100);
      syncKaraokeHighlight(studioCurrentTime);
    }

    function updateStudioTimerDisplay(sec) {
      const disp = document.getElementById('studio-time-display');
      if (disp) disp.textContent = formatTimeWithMs(sec);
    }

    function updateStudioScrubberFill(pct) {
      const fill = document.getElementById('studio-progress-fill');
      if (fill) fill.style.width = Math.min(100, Math.max(0, pct)) + '%';
    }

    function syncKaraokeHighlight(currentSec) {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track || !track.lyrics || track.lyrics.length === 0) return;

      let activeIdx = 0;
      for (let i = 0; i < track.lyrics.length; i++) {
        if (currentSec >= track.lyrics[i].time) {
          activeIdx = i;
        }
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

    try {
        const res = await fetch(`/api/admin/tracks/${track.id}/lyrics`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ lyrics: track.lyrics })
        });
        if (res.ok) {
        showToast(`لیریکس ${track.title} با موفقیت در دیتابیس لاراول ذخیره شد ✓`);
        }
    } catch(e) {
        showToast('خطا در ذخیره لیریکس');
    }
    }

    function openBulkLyricsModal() {
      document.getElementById('bulk-lyrics-textarea').value = "";
      openModal('modal-bulk-lyrics');
    }

    function processBulkLyrics() {
      const text = document.getElementById('bulk-lyrics-textarea').value.trim();
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!text || !track) return;

      const lines = text.split('\n').filter(l => l.trim().length > 0);
      let startTime = 0;
      const step = Math.min(15, Math.floor(track.durationSec / (lines.length || 1)));

      track.lyrics = lines.map((l, idx) => ({
        time: idx * step,
        fa: l.trim(),
        en: ""
      }));

      saveState();
      renderStudioLyricsList(track);
      renderKaraokePreview(track);
      closeModal('modal-bulk-lyrics');
      showToast(`${lines.length} سطر شعر به صورت خودکار ایجاد گردید ✓`);
    }

    function openLrcModal() {
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;

      let lrcStr = `[ti:${track.title}]\n[ar:${track.artist}]\n[al:${track.album}]\n`;
      if (track.lyrics) {
        track.lyrics.forEach(line => {
          const m = Math.floor(line.time / 60);
          const s = Math.floor(line.time % 60);
          const ms = Math.floor((line.time % 1) * 100);
          const timeTag = `[${m < 10 ? '0' : ''}${m}:${s < 10 ? '0' : ''}${s}.${ms < 10 ? '0' : ''}${ms}]`;
          lrcStr += `${timeTag}${line.fa}\n`;
        });
      }

      document.getElementById('lrc-textarea').value = lrcStr;
      openModal('modal-lrc');
    }

    function applyLrcImport() {
      const rawText = document.getElementById('lrc-textarea').value;
      const track = TRACKS_DB.find(t => t.id === selectedStudioTrackId);
      if (!track) return;

      const lines = rawText.split('\n');
      const parsedLyrics = [];

      lines.forEach(line => {
        const match = line.match(/\[(\d{2}):(\d{2}(?:\.\d{1,3})?)\](.*)/);
        if (match) {
          const minutes = parseInt(match[1], 10);
          const seconds = parseFloat(match[2]);
          const text = match[3].trim();
          if (text) {
            parsedLyrics.push({
              time: minutes * 60 + seconds,
              fa: text,
              en: ""
            });
          }
        }
      });

      if (parsedLyrics.length > 0) {
        track.lyrics = parsedLyrics.sort((a, b) => a.time - b.time);
        saveState();
        renderStudioLyricsList(track);
        renderKaraokePreview(track);
        renderTracksTable();
        closeModal('modal-lrc');
        showToast(`${parsedLyrics.length} سطر استاندارد از LRC بارگذاری شد ✓`);
      } else {
        showToast('فرمت LRC نامعتبر است.');
      }
    }

    function copyLrcText() {
      const txt = document.getElementById('lrc-textarea');
      txt.select();
      document.execCommand('copy');
      showToast('محتوای LRC در کلیپ‌بورد کپی شد ✓');
    }

    function exportTracksJson() {
      const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(TRACKS_DB, null, 2));
      const downloadAnchor = document.createElement('a');
      downloadAnchor.setAttribute("href", dataStr);
      downloadAnchor.setAttribute("download", "sehpatify_tracks_database.json");
      document.body.appendChild(downloadAnchor);
      downloadAnchor.click();
      downloadAnchor.remove();
      showToast('خروجی پایگاه داده به صورت JSON دریافت گردید.');
    }

    function renderPlaylistsAdmin() {
      const container = document.getElementById('playlists-admin-grid');
      if (!container) return;

      container.innerHTML = PLAYLISTS_DB.map((p, idx) => `
        <div class="panel-card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="display:flex; gap:12px; align-items:center; margin-bottom:12px;">
              <img src="${p.cover}" style="width:64px; height:64px; border-radius:10px; object-fit:cover;" />
              <div>
                <div style="font-weight:800; font-size:15px;">${p.title}</div>
                <div style="font-size:12px; color:var(--brand); font-weight:700;">${p.count}</div>
              </div>
            </div>
            <p style="font-size:12px; color:var(--muted); line-height:1.6; margin-bottom:14px;">${p.desc}</p>
          </div>
          <div style="display:flex; align-items:center; justify-content:space-between; border-top:1px solid var(--border); padding-top:12px;">
            <span class="badge-status synced">عمومی • رسمی</span>
            <div style="display:flex; gap:6px;">
              <button class="btn-table-action" onclick="showToast('ویرایش کالکشن ${p.title}')">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
              </button>
              <button class="btn-table-action danger" onclick="deletePlaylist(${idx})">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
              </button>
            </div>
          </div>
        </div>
      `).join('');

      document.getElementById('badge-playlist-count').textContent = PLAYLISTS_DB.length;
    }

    function renderArtistsAdmin() {
      const tbody = document.getElementById('artists-table-body');
      if (!tbody) return;

      tbody.innerHTML = ARTISTS_DB.map((a, idx) => `
        <tr>
          <td><div style="font-weight:800; font-size:14px;">${a.name}</div></td>
          <td>
            <span class="badge-status ${a.verified ? 'synced' : 'empty'}">
              ${a.verified ? '✓ تیک رسمی' : 'در انتظار بررسی'}
            </span>
          </td>
          <td style="font-weight:700;">${a.listeners} شنونده</td>
          <td>${a.count} اثر صوتی</td>
          <td><span style="color:var(--muted);">${a.genre}</span></td>
          <td>
            <div class="table-actions-cell">
              <button class="btn-table-action" onclick="toggleArtistVerify(${idx})" title="تغییر تیک تایید">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              </button>
              <button class="btn-table-action danger" onclick="deleteArtist(${idx})">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');
    }

    function renderUsersAdmin() {
      const tbody = document.getElementById('users-table-body');
      if (!tbody) return;

      tbody.innerHTML = USERS_DB.map((u, idx) => `
        <tr>
          <td>
            <div style="display:flex; align-items:center; gap:8px;">
              <div class="admin-avatar" style="width:28px; height:28px; font-size:11px;">${u.name[0]}</div>
              <span style="font-weight:700;">${u.name}</span>
            </div>
          </td>
          <td style="direction:ltr; text-align:right; color:var(--muted);">${u.email}</td>
          <td>
            <span class="badge-status ${u.plan.includes('طلایی') ? 'synced' : 'hi-res'}">${u.plan}</span>
          </td>
          <td><span style="font-weight:600;">${u.role}</span></td>
          <td><span style="color:var(--muted);">${u.date}</span></td>
          <td>
            <span class="badge-status ${u.active ? 'synced' : 'empty'}">
              ${u.active ? 'فعال' : 'مسدود'}
            </span>
          </td>
          <td>
            <div class="table-actions-cell">
              <button class="btn-table-action" onclick="toggleUserStatus(${idx})" title="فعال / مسدود سازی">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
              </button>
            </div>
          </td>
        </tr>
      `).join('');

      document.getElementById('badge-users-count').textContent = USERS_DB.length;
    }

    function openModal(modalId) {
      const modal = document.getElementById(modalId);
      if (modal) modal.classList.add('open');
    }

    function closeModal(modalId) {
      const modal = document.getElementById(modalId);
      if (modal) modal.classList.remove('open');
    }

    function openAddTrackModal() {
      document.getElementById('modal-track-title').textContent = "افزودن آهنگ جدید به سهپاتیفای";
      document.getElementById('track-form-id').value = "";
      document.getElementById('track-form-name').value = "";
      document.getElementById('track-form-artist').value = "";
      document.getElementById('track-form-album').value = "";
      document.getElementById('track-form-duration').value = "03:45";
      openModal('modal-track');
    }

    function openEditTrackModal(trackId) {
      const t = TRACKS_DB.find(item => item.id === trackId);
      if (!t) return;
      document.getElementById('modal-track-title').textContent = `ویرایش ترانه: ${t.title}`;
      document.getElementById('track-form-id').value = t.id;
      document.getElementById('track-form-name').value = t.title;
      document.getElementById('track-form-artist').value = t.artist;
      document.getElementById('track-form-album').value = t.album;
      document.getElementById('track-form-duration').value = t.duration;
      document.getElementById('track-form-cover').value = t.cover;
      document.getElementById('track-form-genre').value = t.genre;
      openModal('modal-track');
    }

    function saveTrackFromModal() {
      const id = document.getElementById('track-form-id').value;
      const title = document.getElementById('track-form-name').value.trim();
      const artist = document.getElementById('track-form-artist').value.trim();
      const album = document.getElementById('track-form-album').value.trim() || title;
      const duration = document.getElementById('track-form-duration').value.trim() || "03:30";
      const cover = document.getElementById('track-form-cover').value.trim();
      const genre = document.getElementById('track-form-genre').value;
      const isLossless = document.getElementById('track-form-hires').value === 'true';

      if (!title || !artist) {
        showToast('لطفاً عنوان اثر و نام هنرمند را وارد فرمایید.');
        return;
      }

      const durSec = parseDurationToSeconds(duration);

      if (id) {
        const t = TRACKS_DB.find(item => item.id === parseInt(id, 10));
        if (t) {
          t.title = title;
          t.artist = artist;
          t.album = album;
          t.duration = duration;
          t.durationSec = durSec;
          t.cover = cover;
          t.genre = genre;
          t.isLossless = isLossless;
          showToast(`قطعه «${title}» با موفقیت ویرایش گردید ✓`);
        }
      } else {
        const newTrack = {
          id: Date.now(),
          title,
          artist,
          album,
          duration,
          durationSec: durSec,
          cover,
          genre,
          isLossless,
          streams: 0,
          lyrics: []
        };
        TRACKS_DB.push(newTrack);
        showToast(`آهنگ «${title}» به گنجینه سهپاتیفای افزوده شد ✓`);
      }

      saveState();
      closeModal('modal-track');
      renderTracksTable();
      renderStudioView();
    }

    function deleteTrack(trackId) {
      TRACKS_DB = TRACKS_DB.filter(t => t.id !== trackId);
      saveState();
      renderTracksTable();
      renderStudioView();
      showToast('قطعه صوتی با موفقیت حذف گردید.');
    }

    function openAddPlaylistModal() {
      document.getElementById('playlist-form-title').value = "";
      document.getElementById('playlist-form-desc').value = "";
      openModal('modal-playlist');
    }

    function savePlaylistFromModal() {
      const title = document.getElementById('playlist-form-title').value.trim();
      const desc = document.getElementById('playlist-form-desc').value.trim();
      const cover = document.getElementById('playlist-form-cover').value.trim();

      if (!title) {
        showToast('عنوان پلی‌لیست الزامی است.');
        return;
      }

      PLAYLISTS_DB.push({
        id: Date.now(),
        title,
        desc: desc || "کالکشن اختصاصی استودیو سهپاتیفای",
        count: "۰ قطعه",
        cover
      });

      saveState();
      closeModal('modal-playlist');
      renderPlaylistsAdmin();
      showToast(`پلی‌لیست «${title}» ایجاد شد ✓`);
    }

    function deletePlaylist(idx) {
      PLAYLISTS_DB.splice(idx, 1);
      saveState();
      renderPlaylistsAdmin();
      showToast('پلی‌لیست حذف شد.');
    }

    function openAddArtistModal() {
      document.getElementById('artist-form-name').value = "";
      document.getElementById('artist-form-genre').value = "";
      openModal('modal-artist');
    }

    function saveArtistFromModal() {
      const name = document.getElementById('artist-form-name').value.trim();
      const genre = document.getElementById('artist-form-genre').value.trim() || "تلفیقی";
      const listeners = document.getElementById('artist-form-listeners').value.trim() || "۵۰۰,۰۰۰";
      const verified = document.getElementById('artist-form-verified').value === 'true';

      if (!name) {
        showToast('نام هنرمند الزامی است.');
        return;
      }

      ARTISTS_DB.push({
        name,
        genre,
        listeners,
        verified,
        count: 1
      });

      saveState();
      closeModal('modal-artist');
      renderArtistsAdmin();
      showToast(`هنرمند «${name}» ثبت گردید ✓`);
    }

    function openAddUserModal() {
      document.getElementById('user-form-name').value = "";
      document.getElementById('user-form-email').value = "";
      openModal('modal-user');
    }

    function saveUserFromModal() {
      const name = document.getElementById('user-form-name').value.trim();
      const email = document.getElementById('user-form-email').value.trim();
      const plan = document.getElementById('user-form-plan').value;
      const role = document.getElementById('user-form-role').value;

      if (!name || !email) {
        showToast('نام و ایمیل را کامل وارد نمایید.');
        return;
      }

      USERS_DB.push({
        id: Date.now(),
        name,
        email,
        plan,
        role,
        date: "۱۴۰۳/۰۷/۱۵",
        active: true
      });

      saveState();
      closeModal('modal-user');
      renderUsersAdmin();
      showToast(`کاربر «${name}» ایجاد شد ✓`);
    }

    function toggleUserStatus(idx) {
      USERS_DB[idx].active = !USERS_DB[idx].active;
      saveState();
      renderUsersAdmin();
      showToast('وضعیت حساب کاربری به روز شد.');
    }

    function toggleArtistVerify(idx) {
      ARTISTS_DB[idx].verified = !ARTISTS_DB[idx].verified;
      saveState();
      renderArtistsAdmin();
      showToast('وضعیت تیک تایید هنرمند تغییر یافت.');
    }

    function deleteArtist(idx) {
      ARTISTS_DB.splice(idx, 1);
      saveState();
      renderArtistsAdmin();
      showToast('هنرمند حذف شد.');
    }

    function formatTimeWithMs(sec) {
      const m = Math.floor(sec / 60);
      const s = Math.floor(sec % 60);
      const ms = Math.floor((sec % 1) * 100);
      return `${m < 10 ? '0' : ''}${m}:${s < 10 ? '0' : ''}${s}.${ms < 10 ? '0' : ''}${ms}`;
    }

    function parseTimeStrToSeconds(str) {
      if (!str) return 0;
      const parts = str.split(':');
      if (parts.length === 2) {
        const m = parseFloat(parts[0]) || 0;
        const s = parseFloat(parts[1]) || 0;
        return m * 60 + s;
      }
      return parseFloat(str) || 0;
    }

    function parseDurationToSeconds(dur) {
      const p = dur.split(':');
      if (p.length === 2) {
        return (parseInt(p[0], 10) * 60) + parseInt(p[1], 10);
      }
      return 210;
    }

    function escapeHtml(str) {
      return str.replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    function showToast(message) {
      const shelf = document.getElementById('toast-shelf');
      const toast = document.createElement('div');
      toast.className = 'toast-message';
      toast.innerHTML = `
        <svg width="17" height="17" fill="var(--brand)" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
        <span>${message}</span>
      `;
      shelf.appendChild(toast);
      setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(12px)';
        toast.style.transition = 'all 0.3s ease';
        setTimeout(() => toast.remove(), 300);
      }, 3200);
    }

    // Keyboard Shortcuts: Space or S for Stamping!
    window.addEventListener('keydown', (e) => {
      if (currentAdminView === 'lyrics' && !['INPUT', 'TEXTAREA'].includes(e.target.tagName)) {
        if (e.code === 'Space' || e.code === 'KeyS') {
          e.preventDefault();
          stampCurrentTimeOnActiveRow();
        } else if (e.code === 'ArrowLeft') {
          e.preventDefault();
          jumpStudioAudio(-5);
        } else if (e.code === 'ArrowRight') {
          e.preventDefault();
          jumpStudioAudio(5);
        }
      }
    });

    window.addEventListener('resize', () => {
      if (currentAdminView === 'dashboard') {
        drawStreamsChart('7d');
      }
    });

    window.addEventListener('DOMContentLoaded', () => {
      renderTracksTable();
      renderPlaylistsAdmin();
      renderArtistsAdmin();
      renderUsersAdmin();
      renderLiveActivity();
      renderStudioView();
      drawStreamsChart('7d');
    });
  </script>
</body>
</html>