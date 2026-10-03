<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
  <title>سهپاتیفای | Sehpatify — ریتم، درون تو زنده است</title>
  <meta name="theme-color" content="#0A0A0F" />
  <meta name="description" content="پلتفرم نسل نوین موسیقی ایرانی و بین‌المللی با کیفیت Lossless Hi-Res و تجربه بومی فارسی" />

  <!-- Google Fonts: Vazirmatn (Comprehensive Persian Typography) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="manifest" href="/manifest.json">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    :root {
      /* Brand Color System (#10B954 Brand Green) */
      --brand: #10B954;
      --brand-glow: rgba(16, 185, 84, 0.45);
      --brand-glow-lg: rgba(16, 185, 84, 0.24);
      --brand-dim: rgba(16, 185, 84, 0.12);
      --brand-hover: #15d261;
      --brand-active: #0d9643;

      /* Surfaces & Deep Onyx Backgrounds */
      --bg: #0A0A0F;
      --surface: #12121A;
      --surface-card: #161622;
      --surface-elevated: #1D1D2B;
      --surface-hover: #222233;
      --surface-glass: rgba(18, 18, 26, 0.88);
      --surface-glass-heavy: rgba(10, 10, 15, 0.95);

      /* Typography & Neutral Colors */
      --text: #F5F5F7;
      --muted: #9696A3;
      --muted-dark: #636372;
      --border: rgba(255, 255, 255, 0.08);
      --border-light: rgba(255, 255, 255, 0.14);
      --border-brand: rgba(16, 185, 84, 0.45);

      /* Layout Dimensions */
      --sidebar-w: 260px;
      --topbar-h: 72px;
      --mini-player-h: 90px;
      --mobile-nav-h: 66px;

      /* Radii & Shadows */
      --radius-sm: 8px;
      --radius-md: 14px;
      --radius-lg: 20px;
      --radius-full: 9999px;
      --shadow-sm: 0 4px 14px rgba(0, 0, 0, 0.28);
      --shadow-md: 0 8px 26px rgba(0, 0, 0, 0.45);
      --shadow-lg: 0 16px 42px rgba(0, 0, 0, 0.65);
      --shadow-glow: 0 0 20px var(--brand-glow);
      --transition-fast: 0.16s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-normal: 0.26s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-bounce: 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    *, *::before, *::after, 
    html, body, button, input, select, textarea, optgroup, span, p, a, div, h1, h2, h3, h4, h5, h6 {
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
      width: 5px;
      height: 5px;
    }
    ::-webkit-scrollbar-track {
      background: transparent;
    }
    ::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.15);
      border-radius: var(--radius-full);
    }
    ::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.28);
    }

    #app {
      display: flex;
      width: 100vw;
      height: 100vh;
      height: 100dvh;
      overflow: hidden;
      position: relative;
    }

    .sidebar {
      width: var(--sidebar-w);
      height: 100%;
      background: var(--surface);
      border-left: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      flex-shrink: 0;
      z-index: 40;
      padding: 18px 16px calc(var(--mini-player-h) + 16px);
      overflow-y: auto;
      transition: transform var(--transition-normal);
    }

    .brand-header {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 4px 10px 18px;
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
      background: linear-gradient(135deg, rgba(16, 185, 84, 0.18), rgba(18, 18, 26, 0.9));
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
      font-size: 17px;
      font-weight: 800;
      letter-spacing: -0.2px;
      background: linear-gradient(to right, #FFFFFF, #E2E8F0);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .brand-title span.en {
      font-weight: 900;
      font-size: 15px;
      letter-spacing: 0.8px;
    }

    .brand-sub {
      font-size: 10px;
      font-weight: 600;
      color: var(--brand);
      letter-spacing: 0.4px;
    }

    .nav-label {
      font-size: 11px;
      font-weight: 700;
      color: var(--muted-dark);
      text-transform: uppercase;
      letter-spacing: 0.5px;
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
      padding: 9px 12px;
      border-radius: var(--radius-md);
      color: var(--muted);
      font-weight: 500;
      font-size: 13.5px;
      cursor: pointer;
      transition: all var(--transition-fast);
      position: relative;
      text-decoration: none;
      min-height: 42px;
    }

    .nav-link:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.04);
    }

    .nav-link.active {
      color: var(--text);
      background: linear-gradient(90deg, rgba(16, 185, 84, 0.16) 0%, rgba(16, 185, 84, 0.03) 100%);
      font-weight: 700;
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
      transition: stroke var(--transition-fast);
      flex-shrink: 0;
    }

    .nav-link.active svg {
      stroke: var(--brand);
    }

    .nav-link .badge-count {
      margin-right: auto;
      background: rgba(255, 255, 255, 0.08);
      color: var(--muted);
      font-size: 11px;
      padding: 1px 7px;
      border-radius: var(--radius-full);
      font-weight: 600;
    }

    .sidebar-divider {
      height: 1px;
      background: var(--border);
      margin: 12px 10px;
    }

    .offline-card {
      margin-top: auto;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 12px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .offline-text {
      display: flex;
      flex-direction: column;
    }

    .offline-title {
      font-size: 11.5px;
      font-weight: 700;
      color: var(--text);
    }

    .offline-sub {
      font-size: 10px;
      color: var(--muted);
      direction: ltr;
      text-align: right;
    }

    .status-dot {
      width: 8px;
      height: 8px;
      background: var(--brand);
      border-radius: 50%;
      box-shadow: 0 0 8px var(--brand);
      flex-shrink: 0;
    }

    .main-wrapper {
      flex: 1;
      height: 100%;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      position: relative;
      background: radial-gradient(circle at 85% 0%, rgba(16, 185, 84, 0.07) 0%, transparent 45%),
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

    .topbar-mobile-logo {
      display: none;
      align-items: center;
      gap: 8px;
      cursor: pointer;
    }

    .topbar-mobile-logo .brand-logo-wrap {
      width: 36px;
      height: 36px;
      border-radius: 9px;
    }

    .topbar-mobile-logo .brand-logo-svg {
      width: 24px;
      height: 24px;
    }

    .search-container {
      flex: 1;
      max-width: 460px;
      position: relative;
    }

    .search-input {
      width: 100%;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--border);
      color: var(--text);
      font-size: 13px;
      padding: 10px 42px 10px 16px;
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
      display: flex;
    }

    .topbar-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .hi-res-chip {
      background: linear-gradient(135deg, rgba(16, 185, 84, 0.15), rgba(255, 255, 255, 0.02));
      border: 1px solid var(--border-brand);
      padding: 5px 12px;
      border-radius: var(--radius-full);
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 11px;
      font-weight: 700;
      color: var(--brand);
      letter-spacing: 0.5px;
      cursor: pointer;
      transition: var(--transition-fast);
      white-space: nowrap;
    }

    .hi-res-chip:hover {
      box-shadow: 0 0 14px var(--brand-glow);
    }

    .action-circle-btn {
      width: 38px;
      height: 38px;
      border-radius: var(--radius-full);
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border);
      color: var(--text);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all var(--transition-fast);
      position: relative;
      flex-shrink: 0;
    }

    .action-circle-btn:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--border-light);
    }

    .action-circle-btn .badge-dot {
      position: absolute;
      top: 8px;
      left: 8px;
      width: 8px;
      height: 8px;
      background: var(--brand);
      border-radius: 50%;
      box-shadow: 0 0 6px var(--brand);
    }

    /* Enhanced Interactive Profile Widget & Dropdown */
    .profile-widget-wrap {
      position: relative;
    }

    .profile-pill {
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

    .profile-pill:hover, .profile-pill.active {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--border-brand);
      box-shadow: 0 0 14px var(--brand-glow-lg);
    }

    .profile-avatar-box {
      position: relative;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: linear-gradient(135deg, #10B954, #084c24);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 13px;
      color: #fff;
      border: 1.5px solid rgba(255, 255, 255, 0.15);
      flex-shrink: 0;
    }

    .profile-online-ring {
      position: absolute;
      bottom: -1px;
      right: -1px;
      width: 9px;
      height: 9px;
      background: var(--brand);
      border: 2px solid var(--surface);
      border-radius: 50%;
    }

    .profile-info-col {
      display: flex;
      flex-direction: column;
      line-height: 1.25;
      text-align: right;
    }

    .profile-name {
      font-size: 12.5px;
      font-weight: 700;
      color: var(--text);
    }

    .profile-vip-badge {
      font-size: 9.5px;
      font-weight: 700;
      color: var(--brand);
      letter-spacing: 0.3px;
    }

    .profile-chevron {
      color: var(--muted);
      transition: transform var(--transition-fast);
    }

    .profile-pill.active .profile-chevron {
      transform: rotate(180deg);
    }

    /* Popover Dropdown Menu */
    .profile-dropdown-menu {
      position: absolute;
      top: calc(100% + 10px);
      left: 0;
      width: 250px;
      background: var(--surface-card);
      border: 1px solid var(--border-light);
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-lg), 0 0 24px rgba(0, 0, 0, 0.5);
      padding: 10px;
      display: none;
      flex-direction: column;
      gap: 4px;
      z-index: 80;
      animation: viewFadeIn 0.2s ease;
    }

    .profile-dropdown-menu.open {
      display: flex;
    }

    .profile-menu-header {
      padding: 10px;
      background: rgba(255, 255, 255, 0.02);
      border-radius: var(--radius-sm);
      margin-bottom: 4px;
    }

    .profile-menu-email {
      font-size: 11px;
      color: var(--muted);
      direction: ltr;
      text-align: right;
    }

    .profile-menu-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 9px 12px;
      border-radius: var(--radius-sm);
      color: var(--muted);
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      transition: all var(--transition-fast);
      border: none;
      background: transparent;
      width: 100%;
      text-align: right;
    }

    .profile-menu-item:hover {
      background: rgba(255, 255, 255, 0.05);
      color: var(--text);
    }

    .profile-menu-item.active-item {
      color: var(--brand);
    }

    .content-viewport {
      flex: 1;
      overflow-y: auto;
      overflow-x: hidden;
      padding: 22px 24px calc(var(--mini-player-h) + 28px);
      scroll-behavior: smooth;
    }

    .view-panel {
      display: none;
      animation: viewFadeIn 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .view-panel.active {
      display: block;
    }

    @keyframes viewFadeIn {
      from { opacity: 0; transform: translateY(8px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .section-header {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      margin: 28px 0 16px;
    }
    .section-header:first-of-type {
      margin-top: 0;
    }

    .section-title {
      font-size: 18px;
      font-weight: 800;
      color: var(--text);
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

    .section-see-all {
      color: var(--brand);
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      cursor: pointer;
      transition: color var(--transition-fast);
    }
    .section-see-all:hover {
      text-decoration: underline;
    }

    /* Mobile Quick Shortcut Pills */
    .mobile-quick-shortcuts {
      display: none;
      gap: 8px;
      overflow-x: auto;
      padding-bottom: 12px;
      margin-bottom: 16px;
      scrollbar-width: none;
    }
    .mobile-quick-shortcuts::-webkit-scrollbar {
      display: none;
    }

    .quick-chip {
      background: var(--surface-card);
      border: 1px solid var(--border);
      padding: 7px 14px;
      border-radius: var(--radius-full);
      font-size: 12px;
      font-weight: 600;
      color: var(--muted);
      cursor: pointer;
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all var(--transition-fast);
    }

    .quick-chip.active, .quick-chip:hover {
      background: var(--brand-dim);
      border-color: var(--border-brand);
      color: var(--brand);
    }

    .hero-banner {
      position: relative;
      border-radius: var(--radius-lg);
      padding: 34px 40px;
      overflow: hidden;
      margin-bottom: 28px;
      background: linear-gradient(135deg, rgba(22, 22, 34, 0.95) 0%, rgba(10, 10, 15, 0.98) 100%);
      border: 1px solid var(--border-light);
      box-shadow: var(--shadow-md);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .hero-banner::before {
      content: '';
      position: absolute;
      top: -40%;
      right: 15%;
      width: 320px;
      height: 320px;
      background: radial-gradient(circle, var(--brand-glow) 0%, transparent 70%);
      pointer-events: none;
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 540px;
    }

    .hero-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 4px 12px;
      background: var(--brand-dim);
      border: 1px solid var(--border-brand);
      border-radius: var(--radius-full);
      color: var(--brand);
      font-size: 11px;
      font-weight: 700;
      margin-bottom: 12px;
    }

    .hero-heading {
      font-size: 30px;
      font-weight: 900;
      line-height: 1.35;
      margin-bottom: 10px;
      background: linear-gradient(to left, #FFFFFF 60%, #D1D5DB 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero-sub {
      color: var(--muted);
      font-size: 13.5px;
      line-height: 1.7;
      margin-bottom: 22px;
    }

    .hero-ctas {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .btn-brand {
      background: var(--brand);
      color: #052410;
      font-weight: 800;
      font-size: 13.5px;
      padding: 11px 24px;
      border-radius: var(--radius-full);
      border: none;
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      transition: all var(--transition-fast);
      box-shadow: 0 4px 18px var(--brand-glow);
      min-height: 44px;
    }

    .btn-brand:hover {
      background: var(--brand-hover);
      transform: translateY(-2px);
      box-shadow: 0 6px 24px var(--brand-glow);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.05);
      color: var(--text);
      font-weight: 600;
      font-size: 13.5px;
      padding: 11px 20px;
      border-radius: var(--radius-full);
      border: 1px solid var(--border);
      cursor: pointer;
      transition: var(--transition-fast);
      display: flex;
      align-items: center;
      gap: 8px;
      min-height: 44px;
    }

    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.09);
      border-color: var(--border-light);
    }

    .hero-art-box {
      position: relative;
      z-index: 2;
      width: 200px;
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .hero-pulse-logo {
      width: 160px;
      height: 160px;
      filter: drop-shadow(0 0 25px rgba(16, 185, 84, 0.7));
      animation: heroFloat 4s ease-in-out infinite alternate;
    }

    @keyframes heroFloat {
      0% { transform: translateY(0px) scale(1); }
      100% { transform: translateY(-7px) scale(1.02); }
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(175px, 1fr));
      gap: 16px;
    }

    .music-card {
      background: var(--surface-card);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 12px;
      display: flex;
      flex-direction: column;
      position: relative;
      transition: all var(--transition-normal);
      cursor: pointer;
    }

    .music-card:hover {
      background: var(--surface-elevated);
      border-color: var(--border-light);
      transform: translateY(-4px);
      box-shadow: var(--shadow-md);
    }

    .card-art-box {
      position: relative;
      width: 100%;
      aspect-ratio: 1 / 1;
      border-radius: var(--radius-sm);
      overflow: hidden;
      margin-bottom: 10px;
      background: #191924;
    }

    .card-art-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .music-card:hover .card-art-img {
      transform: scale(1.05);
    }

    .card-play-overlay {
      position: absolute;
      bottom: 8px;
      left: 8px;
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: var(--brand);
      color: #052410;
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transform: translateY(8px);
      transition: all var(--transition-fast);
      box-shadow: 0 4px 16px var(--brand-glow);
      cursor: pointer;
      z-index: 5;
    }

    .music-card:hover .card-play-overlay {
      opacity: 1;
      transform: translateY(0);
    }

    .card-play-overlay:hover {
      transform: scale(1.08);
      background: var(--brand-hover);
    }

    .card-title {
      font-size: 13.5px;
      font-weight: 700;
      color: var(--text);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 3px;
    }

    .card-subtitle {
      font-size: 12px;
      color: var(--muted);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .artist-card .card-art-box {
      border-radius: 50%;
    }
    .artist-card .card-title,
    .artist-card .card-subtitle {
      text-align: center;
    }

    .track-list {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .track-row {
      display: grid;
      grid-template-columns: 32px 46px 1fr 140px 75px 44px;
      align-items: center;
      gap: 14px;
      padding: 8px 12px;
      border-radius: var(--radius-sm);
      transition: background var(--transition-fast);
      cursor: pointer;
      min-height: 56px;
    }

    .track-row:hover {
      background: var(--surface-card);
    }

    .track-row.playing {
      background: rgba(16, 185, 84, 0.08);
      border: 1px solid var(--border-brand);
    }

    .track-num {
      font-size: 13px;
      color: var(--muted);
      text-align: center;
      font-weight: 600;
    }

    .track-row.playing .track-num {
      display: none;
    }

    .equalizer-wave {
      display: none;
      align-items: flex-end;
      gap: 2.5px;
      height: 15px;
      justify-content: center;
    }

    .track-row.playing .equalizer-wave {
      display: flex;
    }

    .eq-bar {
      width: 2.5px;
      background: var(--brand);
      border-radius: 2px;
      animation: eqDance 0.9s ease-in-out infinite alternate;
    }
    .eq-bar:nth-child(1) { height: 60%; animation-delay: 0.1s; }
    .eq-bar:nth-child(2) { height: 100%; animation-delay: 0.3s; }
    .eq-bar:nth-child(3) { height: 45%; animation-delay: 0.2s; }

    @keyframes eqDance {
      0% { height: 20%; }
      100% { height: 100%; }
    }

    .track-thumb {
      width: 44px;
      height: 44px;
      border-radius: 6px;
      overflow: hidden;
      background: #20202d;
      flex-shrink: 0;
    }

    .track-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .track-meta {
      display: flex;
      flex-direction: column;
      min-width: 0;
    }

    .track-name {
      font-size: 13.5px;
      font-weight: 600;
      color: var(--text);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .track-row.playing .track-name {
      color: var(--brand);
    }

    .track-artist {
      font-size: 11.5px;
      color: var(--muted);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .track-album {
      font-size: 12.5px;
      color: var(--muted);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .track-duration {
      font-size: 12px;
      color: var(--muted);
      direction: ltr;
      text-align: right;
      font-weight: 500;
    }

    /* Perfectly Centered Universal Favorite & Ghost Buttons */
    .icon-btn-ghost, .fav-action-btn {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      width: 38px;
      height: 38px;
      padding: 0 !important;
      margin: 0 !important;
      border-radius: 50%;
      border: none;
      background: transparent;
      color: var(--muted);
      cursor: pointer;
      transition: all var(--transition-fast);
      flex-shrink: 0;
      line-height: 0;
    }

    .icon-btn-ghost:hover, .fav-action-btn:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.08);
    }

    .icon-btn-ghost.favorited, .fav-action-btn.favorited {
      color: var(--brand) !important;
    }

    .icon-btn-ghost svg, .fav-action-btn svg {
      width: 18px;
      height: 18px;
      display: block;
      margin: 0 auto;
      pointer-events: none;
    }

    .moods-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 14px;
      margin-bottom: 30px;
    }

    .mood-card {
      height: 96px;
      border-radius: var(--radius-md);
      padding: 14px;
      position: relative;
      overflow: hidden;
      cursor: pointer;
      transition: all var(--transition-fast);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .mood-card:hover {
      transform: scale(1.025);
    }

    .mood-card span.title {
      font-size: 16px;
      font-weight: 800;
      color: #FFFFFF;
      z-index: 2;
    }

    .mood-card .mood-icon {
      position: absolute;
      left: 10px;
      bottom: 6px;
      opacity: 0.35;
      transform: rotate(-15deg);
      transition: transform 0.3s ease;
    }

    .mood-card:hover .mood-icon {
      transform: rotate(0deg) scale(1.12);
      opacity: 0.6;
    }

    .search-tags-row {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin: 12px 0 20px;
    }

    .search-tag {
      background: var(--surface-card);
      border: 1px solid var(--border);
      padding: 6px 14px;
      border-radius: var(--radius-full);
      font-size: 12px;
      color: var(--muted);
      cursor: pointer;
      transition: all var(--transition-fast);
      min-height: 36px;
      display: inline-flex;
      align-items: center;
    }

    .search-tag:hover, .search-tag.active {
      background: var(--brand-dim);
      border-color: var(--border-brand);
      color: var(--brand);
    }

    .artist-header-box {
      display: flex;
      align-items: flex-end;
      gap: 28px;
      padding: 24px 0 24px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 20px;
    }

    .artist-avatar-lg {
      width: 190px;
      height: 190px;
      border-radius: 50%;
      box-shadow: var(--shadow-lg);
      overflow: hidden;
      flex-shrink: 0;
      background: #1d1d2b;
      border: 2px solid var(--border-brand);
    }

    .artist-avatar-lg img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .artist-info-col {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .artist-verified-tag {
      font-size: 11.5px;
      font-weight: 700;
      color: var(--brand);
      letter-spacing: 0.8px;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .artist-name-title {
      font-size: 34px;
      font-weight: 900;
      line-height: 1.2;
    }

    .artist-meta-txt {
      display: flex;
      align-items: center;
      gap: 12px;
      color: var(--muted);
      font-size: 13px;
    }

    .artist-actions-row {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-top: 6px;
    }

    .mini-player {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: var(--mini-player-h);
      background: var(--surface-glass);
      backdrop-filter: blur(28px);
      -webkit-backdrop-filter: blur(28px);
      border-top: 1px solid var(--border);
      z-index: 50;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 24px;
      transition: all var(--transition-normal);
    }

    .player-progress-bar-wrap {
      position: absolute;
      top: -4px;
      left: 0;
      right: 0;
      height: 8px;
      background: rgba(255, 255, 255, 0.08);
      cursor: pointer;
      direction: ltr !important;
      touch-action: none;
    }

    .player-progress-bar-wrap:hover {
      height: 10px;
      top: -6px;
    }

    .player-progress-fill {
      height: 100%;
      width: 0%;
      background: var(--brand);
      position: relative;
      box-shadow: 0 0 10px var(--brand);
      pointer-events: none;
    }

    .player-left-track {
      display: flex;
      align-items: center;
      gap: 12px;
      width: 290px;
    }

    .mini-player-art {
      width: 52px;
      height: 52px;
      border-radius: var(--radius-sm);
      overflow: hidden;
      cursor: pointer;
      position: relative;
      flex-shrink: 0;
      box-shadow: var(--shadow-sm);
    }

    .mini-player-art img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .mini-track-meta {
      display: flex;
      flex-direction: column;
      overflow: hidden;
      min-width: 0;
    }

    .mini-track-title {
      font-size: 13.5px;
      font-weight: 700;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      cursor: pointer;
    }

    .mini-track-title:hover {
      text-decoration: underline;
    }

    .mini-track-artist {
      font-size: 11.5px;
      color: var(--muted);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    /* Center Controls with generous breathing room & ergonomics */
    .player-center-controls {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      flex: 1;
      max-width: 550px;
    }

    .ctrl-buttons {
      display: flex;
      align-items: center;
      gap: 18px;
      margin-top: 2px;
    }

    .ctrl-btn {
      background: transparent;
      border: none;
      color: var(--muted);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 38px;
      height: 38px;
      transition: all var(--transition-fast);
      border-radius: 50%;
      position: relative;
    }

    .ctrl-btn:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.05);
    }

    .ctrl-btn.active {
      color: var(--brand) !important;
      text-shadow: 0 0 12px var(--brand);
    }

    .ctrl-btn.active::after {
      content: '';
      position: absolute;
      bottom: 2px;
      width: 4px;
      height: 4px;
      background: var(--brand);
      border-radius: 50%;
      box-shadow: 0 0 6px var(--brand);
    }

    .repeat-badge {
      display: none;
      position: absolute;
      top: 5px;
      right: 7px;
      font-size: 9px;
      font-weight: 900;
      color: var(--brand);
      line-height: 1;
    }

    .ctrl-btn.repeat-one .repeat-badge {
      display: block;
    }

    .play-pause-btn {
      width: 44px;
      height: 44px;
      background: var(--brand);
      color: #052410;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      cursor: pointer;
      box-shadow: 0 0 18px var(--brand-glow);
      transition: all var(--transition-bounce);
    }

    .play-pause-btn:hover {
      transform: scale(1.08);
      background: var(--brand-hover);
    }

    .time-tracker-row {
      display: flex;
      align-items: center;
      gap: 12px;
      width: 100%;
      font-size: 11.5px;
      color: var(--muted);
      font-weight: 500;
    }

    .time-val {
      direction: ltr;
      display: inline-block;
      min-width: 30px;
    }

    .interactive-slider-track {
      position: relative;
      height: 24px;
      display: flex;
      align-items: center;
      cursor: pointer;
      direction: ltr !important;
      touch-action: none;
      user-select: none;
    }

    .scrub-timeline {
      flex: 1;
    }

    .slider-rail {
      position: relative;
      width: 100%;
      height: 5px;
      background: rgba(255, 255, 255, 0.12);
      border-radius: var(--radius-full);
      overflow: visible;
      transition: height var(--transition-fast);
    }

    .interactive-slider-track:hover .slider-rail {
      height: 7px;
    }

    .slider-fill {
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 0%;
      background: var(--brand);
      border-radius: var(--radius-full);
      box-shadow: 0 0 8px var(--brand-glow);
      pointer-events: none;
    }

    .slider-handle {
      position: absolute;
      top: 50%;
      right: 0;
      transform: translate(50%, -50%);
      width: 14px;
      height: 14px;
      border-radius: 50%;
      background: #FFFFFF;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.8), 0 0 10px var(--brand);
      opacity: 0;
      transition: opacity var(--transition-fast), transform var(--transition-fast);
      pointer-events: none;
    }

    .interactive-slider-track:hover .slider-handle,
    .interactive-slider-track.dragging .slider-handle {
      opacity: 1;
      transform: translate(50%, -50%) scale(1.15);
    }

    .player-right-utils {
      display: flex;
      align-items: center;
      gap: 14px;
      width: 290px;
      justify-content: flex-end;
    }

    .volume-slider-container {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .volume-bar-wrap {
      width: 90px;
    }

    .expanded-player-modal {
      position: fixed;
      inset: 0;
      background: var(--bg);
      z-index: 99;
      display: none;
      flex-direction: column;
      overflow: hidden;
      animation: modalSlideUp 0.32s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .expanded-player-modal.active {
      display: flex;
    }

    @keyframes modalSlideUp {
      from { transform: translateY(100%); }
      to { transform: translateY(0); }
    }

    .ambient-glow-layer {
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 50% 30%, rgba(16, 185, 84, 0.22) 0%, transparent 65%);
      filter: blur(80px);
      pointer-events: none;
      z-index: 1;
    }

    .full-player-nav {
      position: relative;
      z-index: 10;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 24px;
      border-bottom: 1px solid var(--border);
      flex-shrink: 0;
    }

    .full-player-tabs {
      display: flex;
      align-items: center;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--border);
      border-radius: var(--radius-full);
      padding: 3px;
      gap: 4px;
    }

    .full-tab-btn {
      background: transparent;
      border: none;
      color: var(--muted);
      font-size: 12.5px;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: var(--radius-full);
      cursor: pointer;
      transition: all var(--transition-fast);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .full-tab-btn.active {
      background: var(--surface-card);
      color: var(--brand);
      box-shadow: var(--shadow-sm);
    }

    .full-player-stage {
      position: relative;
      z-index: 5;
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 12px 24px;
      overflow: hidden;
      min-height: 0;
    }

    .full-panel-view {
      display: none;
      width: 100%;
      height: 100%;
      max-width: 900px;
      margin: 0 auto;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 0;
    }

    .full-panel-view.active {
      display: flex;
      animation: viewFadeIn 0.28s ease;
    }

    .full-cover-card {
      width: min(300px, 48vh);
      height: min(300px, 48vh);
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.75), 0 0 35px var(--brand-glow);
      border: 1px solid rgba(255, 255, 255, 0.12);
      position: relative;
      margin-bottom: 16px;
      flex-shrink: 0;
    }

    .full-cover-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .visualizer-canvas {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 75px;
      pointer-events: none;
      opacity: 0.88;
    }

    .full-meta-block {
      text-align: center;
      margin-bottom: 8px;
    }

    .full-track-title {
      font-size: 24px;
      font-weight: 900;
      margin-bottom: 4px;
    }

    .full-track-artist {
      font-size: 15px;
      color: var(--muted);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    .full-lyrics-container {
      width: 100%;
      height: 100%;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      padding: 20px 16px;
      text-align: center;
    }

    .full-lyrics-line {
      font-size: 19px;
      font-weight: 700;
      color: var(--muted-dark);
      cursor: pointer;
      transition: all 0.3s ease;
      line-height: 1.8;
      max-width: 650px;
    }

    .full-lyrics-line:hover {
      color: var(--text);
    }

    .full-lyrics-line.active {
      color: var(--brand);
      font-size: 24px;
      font-weight: 900;
      text-shadow: 0 0 24px var(--brand-glow);
      transform: scale(1.03);
    }

    .full-lyrics-trans {
      display: block;
      font-size: 13.5px;
      font-weight: 400;
      color: var(--muted);
      margin-top: 4px;
      direction: ltr;
    }

    .full-queue-container {
      width: 100%;
      height: 100%;
      max-width: 650px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 8px;
      padding: 16px 8px;
    }

    /* Fixed Fullscreen Player Deck with Spacing & Padding */
    .full-control-deck {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      padding: 14px 24px calc(24px + env(safe-area-inset-bottom, 0px));
      display: flex;
      flex-direction: column;
      gap: 16px;
      flex-shrink: 0;
    }

    .full-control-deck .time-tracker-row {
      margin-bottom: 6px;
    }

    .full-primary-buttons {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 32px;
      margin-bottom: 8px;
    }

    .full-primary-buttons .ctrl-btn {
      width: 46px;
      height: 46px;
    }

    .full-primary-buttons .ctrl-btn svg {
      width: 24px;
      height: 24px;
    }

    .full-play-pause-btn {
      width: 62px;
      height: 62px;
      background: var(--brand);
      color: #052410;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      cursor: pointer;
      box-shadow: 0 0 26px var(--brand-glow);
      transition: all var(--transition-bounce);
    }

    .full-play-pause-btn:hover {
      transform: scale(1.08);
      background: var(--brand-hover);
    }

    .full-deck-utilities {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding-top: 10px;
      border-top: 1px solid var(--border);
    }

    .side-drawer {
      position: fixed;
      top: 0;
      bottom: var(--mini-player-h);
      left: 0;
      width: 380px;
      background: var(--surface-glass-heavy);
      backdrop-filter: blur(32px);
      -webkit-backdrop-filter: blur(32px);
      border-right: 1px solid var(--border);
      z-index: 45;
      display: flex;
      flex-direction: column;
      transform: translateX(-100%);
      transition: transform var(--transition-normal);
      padding: 24px;
    }

    .side-drawer.open {
      transform: translateX(0);
    }

    .drawer-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
      padding-bottom: 12px;
      border-bottom: 1px solid var(--border);
    }

    .drawer-title {
      font-size: 17px;
      font-weight: 800;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .lyrics-stream {
      flex: 1;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 18px;
      padding: 16px 0;
      text-align: right;
    }

    .lyrics-line {
      font-size: 16px;
      font-weight: 700;
      color: var(--muted-dark);
      transition: all 0.3s ease;
      cursor: pointer;
      line-height: 1.8;
    }

    .lyrics-line:hover {
      color: var(--text);
    }

    .lyrics-line.active {
      color: var(--brand);
      font-size: 19px;
      font-weight: 900;
      text-shadow: 0 0 20px var(--brand-glow);
    }

    .lyrics-translation {
      display: block;
      font-size: 12.5px;
      font-weight: 400;
      color: var(--muted);
      margin-top: 3px;
      direction: ltr;
      text-align: right;
    }

    .queue-list {
      display: flex;
      flex-direction: column;
      gap: 8px;
      overflow-y: auto;
      flex: 1;
    }

    .queue-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 9px;
      border-radius: var(--radius-sm);
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid var(--border);
      transition: background var(--transition-fast);
      cursor: pointer;
    }

    .queue-item:hover {
      background: rgba(255, 255, 255, 0.06);
    }

    .toast-container {
      position: fixed;
      bottom: calc(var(--mini-player-h) + 16px);
      left: 20px;
      z-index: 110;
      display: flex;
      flex-direction: column;
      gap: 10px;
      pointer-events: none;
    }

    .toast-msg {
      background: var(--surface-elevated);
      border: 1px solid var(--border-brand);
      color: var(--text);
      padding: 10px 18px;
      border-radius: var(--radius-full);
      box-shadow: var(--shadow-lg), 0 0 16px var(--brand-glow-lg);
      font-size: 13px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 10px;
      pointer-events: auto;
      animation: toastIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    @keyframes toastIn {
      from { transform: translateY(15px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .modal-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.72);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      z-index: 95;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 16px;
    }

    .modal-backdrop.open {
      display: flex;
    }

    .modal-card {
      background: var(--surface-card);
      border: 1px solid var(--border-light);
      border-radius: var(--radius-lg);
      max-width: 480px;
      width: 100%;
      padding: 24px;
      box-shadow: var(--shadow-lg);
    }

    /* 5-Item Mobile Bottom Navigation */
    .mobile-bottom-nav {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: calc(var(--mobile-nav-h) + env(safe-area-inset-bottom, 0px));
      padding-bottom: env(safe-area-inset-bottom, 0px);
      background: var(--surface-glass-heavy);
      backdrop-filter: blur(28px);
      -webkit-backdrop-filter: blur(28px);
      border-top: 1px solid var(--border);
      z-index: 60;
      justify-content: space-around;
      align-items: center;
    }

    .mobile-nav-btn {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 3px;
      color: var(--muted);
      text-decoration: none;
      font-size: 10.5px;
      font-weight: 600;
      cursor: pointer;
      min-width: 52px;
      height: 100%;
      transition: color var(--transition-fast);
      position: relative;
    }

    .mobile-nav-btn.active {
      color: var(--brand);
    }

    .mobile-nav-btn svg {
      width: 20px;
      height: 20px;
      stroke-width: 2;
    }

    .mobile-nav-badge {
      position: absolute;
      top: 6px;
      left: calc(50% - 14px);
      width: 6px;
      height: 6px;
      background: var(--brand);
      border-radius: 50%;
    }

    @media (max-width: 1024px) {
      .track-row {
        grid-template-columns: 30px 42px 1fr 70px 40px;
      }
      .track-album {
        display: none;
      }
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }

      .mobile-bottom-nav {
        display: flex;
      }

      .mobile-quick-shortcuts {
        display: flex;
      }

      .topbar {
        padding: 0 14px;
        height: 62px;
      }

      .topbar-mobile-logo {
        display: flex;
      }

      .profile-info-col, .profile-chevron, .hi-res-chip {
        display: none;
      }

      .profile-pill {
        padding: 3px;
        border-radius: 50%;
      }

      .content-viewport {
        padding: 14px 14px calc(var(--mobile-nav-h) + 84px + env(safe-area-inset-bottom, 0px));
      }

      /* Floating Mini Player for Mobile docked above Bottom Nav */
      .mini-player {
        bottom: calc(var(--mobile-nav-h) + env(safe-area-inset-bottom, 0px) + 8px);
        left: 10px;
        right: 10px;
        height: 66px;
        padding: 0 12px;
        border-radius: 14px;
        border: 1px solid var(--border-light);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
        z-index: 55;
      }

      .player-progress-bar-wrap {
        border-radius: 14px 14px 0 0;
      }

      .player-right-utils, .time-tracker-row, #ctrl-shuffle, #ctrl-repeat {
        display: none;
      }

      .player-left-track {
        width: calc(100% - 100px);
        gap: 10px;
      }

      .mini-player-art {
        width: 44px;
        height: 44px;
      }

      .player-center-controls {
        flex: none;
        gap: 0;
      }

      .ctrl-buttons {
        gap: 8px;
        margin-top: 0;
      }

      .hero-banner {
        flex-direction: column;
        padding: 20px 16px;
        text-align: center;
        gap: 16px;
      }

      .hero-art-box {
        display: none;
      }

      .hero-ctas {
        justify-content: center;
        flex-wrap: wrap;
      }

      .artist-header-box {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 16px;
      }

      .full-player-nav {
        padding: 12px 16px;
      }

      .full-cover-card {
        width: min(240px, 34vh);
        height: min(240px, 34vh);
        margin-bottom: 12px;
      }

      .full-primary-buttons {
        gap: 20px;
      }

      .full-control-deck {
        padding: 10px 16px calc(16px + env(safe-area-inset-bottom, 0px));
        gap: 12px;
      }

      .side-drawer {
        width: 100vw;
        bottom: calc(var(--mobile-nav-h) + 76px);
      }

      .toast-container {
        bottom: calc(var(--mobile-nav-h) + 84px + env(safe-area-inset-bottom, 0px));
        left: 12px;
        right: 12px;
      }

      .track-row {
        grid-template-columns: 24px 44px 1fr 40px;
        gap: 10px;
        padding: 6px 8px;
      }

      .track-duration {
        display: none;
      }
    }

    @media (max-width: 480px) {
      .grid-container {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
      }
      .hero-heading {
        font-size: 22px;
      }
      .hero-sub {
        font-size: 12px;
      }
      .moods-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      .full-tabs-text {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div id="app">

    <aside class="sidebar" id="sidebar">
      <a class="brand-header" onclick="switchView('home')" title="سهپاتیفای — صفحه اصلی">
        <div class="brand-logo-wrap">
          <svg class="brand-logo-svg" viewBox="0 0 320 240" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <linearGradient id="pulseGlowGrad" x1="40" y1="40" x2="280" y2="200" gradientUnits="userSpaceOnUse">
                <stop offset="0%" stop-color="#4ADE80" />
                <stop offset="50%" stop-color="#10B954" />
                <stop offset="100%" stop-color="#056B30" />
              </linearGradient>
              <filter id="brandNeon" x="-20%" y="-20%" width="140%" height="140%">
                <feGaussianBlur stdDeviation="7" result="blur" />
                <feComposite in="SourceGraphic" in2="blur" operator="over" />
              </filter>
            </defs>
            <path d="M 68 126 C 68 148, 86 172, 116 172 C 146 172, 142 64, 160 64 C 178 64, 174 172, 204 172 C 234 172, 252 148, 252 126" 
                  stroke="url(#pulseGlowGrad)" stroke-width="26" stroke-linecap="round" stroke-linejoin="round" />
            <circle cx="68" cy="126" r="14" fill="#4ADE80" filter="url(#brandNeon)" />
            <circle cx="252" cy="126" r="14" fill="#10B954" filter="url(#brandNeon)" />
          </svg>
        </div>
        <div class="brand-text-col">
          <div class="brand-title">
            <span class="en">SEHPATIFY</span>
          </div>
          <div class="brand-sub">پلتفرم بومی موسیقی ایرانی</div>
        </div>
      </a>

      <!-- Primary Nav Items -->
      <div class="nav-label">مرور و کاوش</div>
      <ul class="nav-list">
        <li>
          <a class="nav-link active" id="nav-home" onclick="switchView('home')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>خانه</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-discover" onclick="switchView('discover')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            <span>اکتشاف و ژانرها</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-search" onclick="switchView('search')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <span>جستجوی پیشرفته</span>
          </a>
        </li>
      </ul>

      <div class="nav-label">کتابخانه من</div>
      <ul class="nav-list">
        <li>
          <a class="nav-link" id="nav-playlists" onclick="switchView('playlists')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            <span>پلی‌لیست‌ها</span>
            <span class="badge-count">۴</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-favorites" onclick="filterFavorites()">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            <span>موردعلاقه‌ها</span>
            <span class="badge-count" id="fav-count">۳</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-library" onclick="switchView('library')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <span>کتابخانه و آلبوم‌ها</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-downloads" onclick="showToast('دانلودهای آفلاین با کیفیت 24-bit Flac ذخیره شدند')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            <span>دانلودها و آفلاین</span>
          </a>
        </li>
      </ul>

      <div class="sidebar-divider"></div>

      <div class="offline-card">
        <div class="offline-text">
          <span class="offline-title">موتور صوتی Hi-Res</span>
          <span class="offline-sub">96kHz / 24-bit Lossless</span>
        </div>
        <div class="status-dot" title="فعال و پایدار"></div>
      </div>
    </aside>

    <main class="main-wrapper">
      <header class="topbar">
        <div class="topbar-mobile-logo" onclick="switchView('home')">
          <div class="brand-logo-wrap">
            <svg class="brand-logo-svg" viewBox="0 0 320 240" fill="none">
              <path d="M 68 126 C 68 148, 86 172, 116 172 C 146 172, 142 64, 160 64 C 178 64, 174 172, 204 172 C 234 172, 252 148, 252 126" 
                    stroke="url(#pulseGlowGrad)" stroke-width="26" stroke-linecap="round" />
              <circle cx="68" cy="126" r="14" fill="#4ADE80" />
              <circle cx="252" cy="126" r="14" fill="#10B954" />
            </svg>
          </div>
        </div>

        <div class="search-container">
          <span class="search-icon-pos">
            <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          </span>
          <input 
            type="text" 
            class="search-input" 
            id="global-search-input" 
            placeholder="جستجوی آهنگ، هنرمند یا آلبوم..."
            oninput="handleSearchInput(this.value)"
          />
        </div>

        <div class="topbar-actions">
          <div class="hi-res-chip" onclick="openAudioSettings()" title="تنظیمات کیفیت خروجی صدا">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            <span>FLAC 24-BIT</span>
          </div>

          <button class="action-circle-btn" onclick="showToast('۳ انتشار تازه از هنرمندان دنبال‌شده شما موجود است')" title="اعلان‌ها">
            <div class="badge-dot"></div>
            <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
          </button>

          <!-- Upgraded Interactive Profile Widget -->
          <div class="profile-widget-wrap">
            <div class="profile-pill" id="profile-pill-btn" onclick="toggleProfileMenu()">
              <div class="profile-avatar-box">
                <span>س</span>
                <span class="profile-online-ring"></span>
              </div>
              <div class="profile-info-col">
                <span class="profile-name">سهراب پارسا</span>
                <span class="profile-vip-badge">کاربر طلایی Hi-Res</span>
              </div>
              <svg class="profile-chevron" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </div>

            <!-- Profile Popover Dropdown -->
            <div class="profile-dropdown-menu" id="profile-dropdown-menu">
              <div class="profile-menu-header">
                <div style="font-weight:800; font-size:13px; color:var(--text);">سهراب پارسا</div>
                <div class="profile-menu-email">sohrab@sehpatify.ir</div>
                <div style="font-size:10px; color:var(--brand); margin-top:4px; font-weight:700;">اشتراک ویژه بی‌نهایت استودیو</div>
              </div>
              <button class="profile-menu-item" onclick="filterFavorites(); closeProfileMenu();">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                <span>ترانه‌های موردعلاقه من</span>
              </button>
              <button class="profile-menu-item" onclick="switchView('playlists'); closeProfileMenu();">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                <span>پلی‌لیست‌های اختصاصی</span>
              </button>
              <button class="profile-menu-item" onclick="openAudioSettings(); closeProfileMenu();">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
                <span>تنظیمات صدا و کش</span>
              </button>
              <div class="sidebar-divider" style="margin:4px 0;"></div>
              <button class="profile-menu-item" style="color:#ef4444;" onclick="showToast('نشست کاربری شما محفوظ است.'); closeProfileMenu();">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span>خروج موقت</span>
              </button>
            </div>
          </div>
        </div>
      </header>

      <div class="content-viewport" id="viewport">

        <!-- VIEW 1: HOME PAGE -->
        <section class="view-panel active" id="view-home">
          <!-- Mobile Quick Shortcut Pills Row -->
          <div class="mobile-quick-shortcuts">
            <button class="quick-chip active" onclick="switchView('home')">همه</button>
            <button class="quick-chip" onclick="filterFavorites()">
              <span>♥ موردعلاقه‌ها</span>
              <span style="color:var(--brand);">(<span id="mob-fav-count">۳</span>)</span>
            </button>
            <button class="quick-chip" onclick="switchView('playlists')">♫ پلی‌لیست‌ها</button>
            <button class="quick-chip" onclick="filterByMood('شبانه')">شب‌های تهران</button>
            <button class="quick-chip" onclick="filterByMood('تمرکز')">تمرکز عمیق</button>
          </div>

          <div class="hero-banner">
            <div class="hero-content">
              <div class="hero-tag">
                <span class="status-dot"></span>
                <span>پخش زنده استریم اختصاصی سهپاتیفای</span>
              </div>
              <h1 class="hero-heading">«ریتم، درون تو زنده است.»</h1>
              <p class="hero-sub">
                تجربه‌ای ناب و عمیق از آوای ایران تا کهکشان صوت؛ با سهپاتیفای عمیق‌ترین نت‌ها و اشعار را با کیفیت استودیو مستر Lossless احساس کنید.
              </p>
              <div class="hero-ctas">
                <button class="btn-brand" onclick="playTrack(0)">
                  <span id="hero-play-icon">
                    <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  </span>
                  <span>شروع پخش هوشمند</span>
                </button>
                <button class="btn-secondary" onclick="switchView('discover')">
                  <span>کشف موسیقی تازه</span>
                </button>
              </div>
            </div>

            <div class="hero-art-box">
              <svg class="hero-pulse-logo" viewBox="0 0 320 240" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M 68 126 C 68 148, 86 172, 116 172 C 146 172, 142 64, 160 64 C 178 64, 174 172, 204 172 C 234 172, 252 148, 252 126" 
                      stroke="url(#pulseGlowGrad)" stroke-width="28" stroke-linecap="round" />
                <circle cx="68" cy="126" r="16" fill="#4ADE80" filter="url(#brandNeon)" />
                <circle cx="252" cy="126" r="16" fill="#10B954" filter="url(#brandNeon)" />
              </svg>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">پیشنهادی برای تو</h2>
            <a class="section-see-all" onclick="switchView('discover')">مشاهده همه</a>
          </div>
          <div class="grid-container" id="home-featured-grid"></div>

          <div class="section-header">
            <h2 class="section-title">ادامه‌ی پخش و ترانه‌های محبوب</h2>
          </div>
          <div class="track-list" id="home-recent-tracks"></div>

          <div class="section-header">
            <h2 class="section-title">هنرمندان منتخب و جریان‌ساز</h2>
          </div>
          <div class="grid-container" id="home-artists-grid"></div>
        </section>

        <!-- VIEW 2: DISCOVER & MOODS -->
        <section class="view-panel" id="view-discover">
          <div class="section-header">
            <h2 class="section-title">بر اساس حال‌وهوای تو</h2>
          </div>
          <div class="moods-grid">
            <div class="mood-card" style="background: linear-gradient(135deg, #1b382b, #0c1c15);" onclick="filterByMood('تمرکز')">
              <span class="title">تمرکز عمیق</span>
              <svg class="mood-icon" width="46" height="46" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="mood-card" style="background: linear-gradient(135deg, #301f40, #150d1c);" onclick="filterByMood('شبانه')">
              <span class="title">شب‌های تهران</span>
              <svg class="mood-icon" width="46" height="46" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
            </div>
            <div class="mood-card" style="background: linear-gradient(135deg, #3a2717, #1c130b);" onclick="filterByMood('نوستالژی')">
              <span class="title">نوستالژی اصیل</span>
              <svg class="mood-icon" width="46" height="46" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            </div>
            <div class="mood-card" style="background: linear-gradient(135deg, #103b39, #091a19);" onclick="filterByMood('انرژی')">
              <span class="title">انرژی و تمرین</span>
              <svg class="mood-icon" width="46" height="46" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">ژانرهای برگزیده</h2>
          </div>
          <div class="grid-container" id="discover-genres-grid"></div>
        </section>

        <!-- VIEW 3: LIVE SEARCH -->
        <section class="view-panel" id="view-search">
          <div class="section-header">
            <h2 class="section-title">جستجو در گنجینه سهپاتیفای</h2>
          </div>
          <div class="search-tags-row">
            <span class="search-tag active" onclick="applySearchTag('همه')">همه موارد</span>
            <span class="search-tag" onclick="applySearchTag('آهنگ‌ها')">آهنگ‌ها</span>
            <span class="search-tag" onclick="applySearchTag('هنرمندان')">هنرمندان</span>
            <span class="search-tag" onclick="applySearchTag('سنتی')">موسیقی اصیل سنتی</span>
            <span class="search-tag" onclick="applySearchTag('راک ایرانی')">آلترناتیو و راک</span>
          </div>
          <div class="track-list" id="search-results-list"></div>
        </section>

        <!-- VIEW 4: LIBRARY -->
        <section class="view-panel" id="view-library">
          <div class="section-header">
            <h2 class="section-title">کتابخانه و آلبوم‌های ذخیره‌شده</h2>
            <button class="btn-secondary" onclick="showToast('مرتب‌سازی بر اساس تاریخ به‌روزرسانی شد')">مرتب‌‌سازی</button>
          </div>
          <div class="grid-container" id="library-grid"></div>
        </section>

        <!-- VIEW 5: PLAYLISTS -->
        <section class="view-panel" id="view-playlists">
          <div class="section-header">
            <h2 class="section-title">پلی‌لیست‌های اختصاصی سهپاتیفای</h2>
          </div>
          <div class="grid-container" id="playlists-grid"></div>
        </section>

        <!-- VIEW 6: ARTIST DETAIL -->
        <section class="view-panel" id="view-artist">
          <div class="artist-header-box">
            <div class="artist-avatar-lg">
              <img id="artist-page-img" src="" alt="" />
            </div>
            <div class="artist-info-col">
              <span class="artist-verified-tag">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                هنرمند رسمی و تاییدشده سهپاتیفای
              </span>
              <h1 class="artist-name-title" id="artist-page-name">چارتار</h1>
              <div class="artist-meta-txt">
                <span>۱,۸۴۰,۳۲۰ شنونده ماهانه</span>
                <span>•</span>
                <span>تهران، ایران</span>
              </div>
              <div class="artist-actions-row">
                <button class="btn-brand" onclick="playTrack(0)">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>پخش برترین‌ها</span>
                </button>
                <button class="btn-secondary" id="btn-follow-artist" onclick="toggleFollowArtist()">
                  <span>دنبال کردن</span>
                </button>
              </div>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">محبوب‌ترین ترانه‌ها</h2>
          </div>
          <div class="track-list" id="artist-tracks-list"></div>
        </section>

      </div>
    </main>

    <div class="mini-player" id="mini-player">
      <div class="player-progress-bar-wrap" id="mini-progress-top">
        <div class="player-progress-fill" id="progress-top-fill"></div>
      </div>

      <!-- Track Information Left -->
      <div class="player-left-track">
        <div class="mini-player-art" onclick="toggleFullPlayer()">
          <img id="mini-art-img" src="" alt="Album Artwork" />
        </div>
        <div class="mini-track-meta">
          <span class="mini-track-title" id="mini-title" onclick="toggleFullPlayer()">عنوان ترانه</span>
          <span class="mini-track-artist" id="mini-artist">نام هنرمند</span>
        </div>
        <!-- Perfectly Centered Mini Favorite Button -->
        <button class="fav-action-btn" id="mini-fav-btn" onclick="toggleFavoriteCurrent()" title="افزودن به موردعلاقه‌ها">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </button>
      </div>

      <!-- Controls Deck Center with Generous Spacing -->
      <div class="player-center-controls">
        <div class="ctrl-buttons">
          <!-- Standard Shuffle Button -->
          <button class="ctrl-btn" id="ctrl-shuffle" onclick="toggleShuffle()" title="پخش تصادفی">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="16 3 21 3 21 8"></polyline>
              <line x1="4" y1="20" x2="21" y2="3"></line>
              <polyline points="21 16 21 21 16 21"></polyline>
              <line x1="15" y1="15" x2="21" y2="21"></line>
              <line x1="4" y1="4" x2="9" y2="9"></line>
            </svg>
          </button>

          <!-- Next Track (Swapped with Prev) -->
          <button class="ctrl-btn" onclick="nextTrack()" title="آهنگ بعدی">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
          </button>

          <!-- Main Play/Pause -->
          <button class="play-pause-btn" id="main-play-btn" onclick="togglePlay()" title="پخش / توقف">
            <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
          </button>

          <!-- Prev Track (Swapped with Next) -->
          <button class="ctrl-btn" onclick="prevTrack()" title="آهنگ قبلی">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
          </button>

          <!-- Repeat Button -->
          <button class="ctrl-btn" id="ctrl-repeat" onclick="toggleRepeat()" title="تکرار">
            <span class="repeat-badge">1</span>
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </button>
        </div>

        <!-- Scrubber Row: Total time on left, Current time on right -->
        <div class="time-tracker-row">
          <span class="time-val" id="mini-time-tot">0:00</span>
          <div class="interactive-slider-track scrub-timeline" id="mini-scrub-track">
            <div class="slider-rail">
              <div class="slider-fill" id="mini-scrub-fill">
                <div class="slider-handle"></div>
              </div>
            </div>
          </div>
          <span class="time-val" id="mini-time-cur">0:00</span>
        </div>
      </div>

      <!-- Utilities Right -->
      <div class="player-right-utils">
        <button class="ctrl-btn" id="btn-toggle-lyrics" onclick="toggleLyricsDrawer()" title="متن ترانه (Lyrics)">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
        </button>

        <button class="ctrl-btn" id="btn-toggle-queue" onclick="toggleQueueDrawer()" title="صف پخش (Queue)">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
        </button>

        <div class="volume-slider-container">
          <button class="ctrl-btn" id="mini-vol-btn" onclick="toggleMute()" title="صدا">
            <span id="mini-vol-icon-wrap">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
            </span>
          </button>
          <div class="interactive-slider-track volume-bar-wrap" id="mini-volume-track">
            <div class="slider-rail">
              <div class="slider-fill" id="mini-volume-fill">
                <div class="slider-handle"></div>
              </div>
            </div>
          </div>
        </div>

        <button class="ctrl-btn" onclick="toggleFullPlayer()" title="نمایش تمام‌صفحه">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
        </button>
      </div>
    </div>

    <div class="expanded-player-modal" id="full-player-modal">
      <div class="ambient-glow-layer"></div>

      <!-- Topbar with View Tabs -->
      <div class="full-player-nav">
        <button class="action-circle-btn" onclick="toggleFullPlayer()" title="بستن پخش تمام‌‌صفحه">
          <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>

        <div class="full-player-tabs">
          <button class="full-tab-btn active" id="full-tab-now" onclick="switchFullPlayerView('now')">
            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            <span class="full-tabs-text">در حال پخش</span>
          </button>
          <button class="full-tab-btn" id="full-tab-lyrics" onclick="switchFullPlayerView('lyrics')">
            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
            <span class="full-tabs-text">متن ترانه</span>
          </button>
          <button class="full-tab-btn" id="full-tab-queue" onclick="switchFullPlayerView('queue')">
            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
            <span class="full-tabs-text">صف پخش</span>
          </button>
        </div>

        <button class="action-circle-btn" onclick="toggleFavoriteCurrent()" title="موردعلاقه‌ها">
          <span id="full-fav-top-btn" class="fav-action-btn" style="width:100%; height:100%;">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
          </span>
        </button>
      </div>

      <!-- Stage Switcher -->
      <div class="full-player-stage">
        <!-- 1. Now Playing Cover & Waveform -->
        <div class="full-panel-view active" id="full-view-now">
          <div class="full-cover-card">
            <img id="full-art-img" src="" alt="Album Cover" />
            <canvas class="visualizer-canvas" id="canvas-visualizer"></canvas>
          </div>
          <div class="full-meta-block">
            <h1 class="full-track-title" id="full-track-title">عنوان ترانه</h1>
            <div class="full-track-artist">
              <span id="full-track-artist">نام هنرمند</span>
              <svg width="14" height="14" fill="var(--brand)" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            </div>
          </div>
        </div>

        <!-- 2. Full Synced Lyrics -->
        <div class="full-panel-view" id="full-view-lyrics">
          <div class="full-lyrics-container" id="full-lyrics-container"></div>
        </div>

        <!-- 3. Full Playback Queue -->
        <div class="full-panel-view" id="full-view-queue">
          <div class="full-queue-container" id="full-queue-container"></div>
        </div>
      </div>

      <!-- Full Player Deck with Comfort Spacing -->
      <div class="full-control-deck">
        <div class="time-tracker-row">
          <span class="time-val" id="full-time-tot">0:00</span>
          <div class="interactive-slider-track scrub-timeline" id="full-scrub-track">
            <div class="slider-rail">
              <div class="slider-fill" id="full-scrub-fill">
                <div class="slider-handle"></div>
              </div>
            </div>
          </div>
          <span class="time-val" id="full-time-cur">0:00</span>
        </div>

        <div class="full-primary-buttons">
          <!-- Shuffle Button -->
          <button class="ctrl-btn" id="full-shuffle-btn" onclick="toggleShuffle()" title="پخش تصادفی">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="16 3 21 3 21 8"></polyline>
              <line x1="4" y1="20" x2="21" y2="3"></line>
              <polyline points="21 16 21 21 16 21"></polyline>
              <line x1="15" y1="15" x2="21" y2="21"></line>
              <line x1="4" y1="4" x2="9" y2="9"></line>
            </svg>
          </button>

          <!-- Next Track (Swapped with Prev) -->
          <button class="ctrl-btn" onclick="nextTrack()" title="آهنگ بعدی">
            <svg width="26" height="26" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
          </button>

          <!-- Main Full Play/Pause -->
          <button class="full-play-pause-btn" id="full-play-btn" onclick="togglePlay()" title="پخش / توقف">
            <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
          </button>

          <!-- Prev Track (Swapped with Next) -->
          <button class="ctrl-btn" onclick="prevTrack()" title="آهنگ قبلی">
            <svg width="26" height="26" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
          </button>

          <!-- Repeat Button -->
          <button class="ctrl-btn" id="full-repeat-btn" onclick="toggleRepeat()" title="تکرار">
            <span class="repeat-badge">1</span>
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </button>
        </div>

        <div class="full-deck-utilities">
          <div class="hi-res-chip" style="font-size:10.5px;">
            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            <span>STUDIO MASTER • 24-BIT FLAC</span>
          </div>

          <div class="volume-slider-container">
            <button class="ctrl-btn" id="full-vol-btn" onclick="toggleMute()" title="صدا">
              <span id="full-vol-icon-wrap">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
              </span>
            </button>
            <div class="interactive-slider-track volume-bar-wrap" id="full-volume-track" style="width:110px;">
              <div class="slider-rail">
                <div class="slider-fill" id="full-volume-fill">
                  <div class="slider-handle"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Drawers for Lyrics & Queue -->
    <div class="side-drawer" id="lyrics-drawer">
      <div class="drawer-header">
        <div class="drawer-title">
          <svg width="20" height="20" stroke="var(--brand)" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
          <span>متن همگام ترانه</span>
        </div>
        <button class="icon-btn-ghost" onclick="toggleLyricsDrawer()">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <div class="lyrics-stream" id="lyrics-container"></div>
    </div>

    <div class="side-drawer" id="queue-drawer">
      <div class="drawer-header">
        <div class="drawer-title">
          <svg width="20" height="20" stroke="var(--brand)" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
          <span>صف پخش (Queue)</span>
        </div>
        <button class="icon-btn-ghost" onclick="toggleQueueDrawer()">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <div class="queue-list" id="queue-container"></div>
    </div>

    <!-- 5-Item Mobile Bottom Navigation with Dedicated Playlists & Favorites -->
    <nav class="mobile-bottom-nav">
      <div class="mobile-nav-btn active" id="mob-home" onclick="switchView('home')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span>خانه</span>
      </div>
      <div class="mobile-nav-btn" id="mob-discover" onclick="switchView('discover')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        <span>اکتشاف</span>
      </div>
      <div class="mobile-nav-btn" id="mob-playlists" onclick="switchView('playlists')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
        <span>پلی‌لیست‌ها</span>
      </div>
      <div class="mobile-nav-btn" id="mob-favorites" onclick="filterFavorites()">
        <span class="mobile-nav-badge"></span>
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        <span>موردعلاقه‌ها</span>
      </div>
      <div class="mobile-nav-btn" id="mob-library" onclick="switchView('library')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        <span>کتابخانه</span>
      </div>
    </nav>

    <!-- Settings Modal -->
    <div class="modal-backdrop" id="settings-modal" onclick="closeAudioSettings(event)">
      <div class="modal-card" onclick="event.stopPropagation()">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
          <h3 style="font-size:16px; font-weight:800;">تنظیمات و کیفیت پخش صدا</h3>
          <button class="icon-btn-ghost" onclick="closeAudioSettings(null)">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
          </button>
        </div>
        <div style="display:flex; flex-direction:column; gap:16px;">
          <div style="display:flex; justify-content:space-between; align-items:center;">
            <div>
              <div style="font-weight:700; font-size:14px;">کیفیت استریم Hi-Res</div>
              <div style="color:var(--muted); font-size:11.5px;">فرکانس مستر استودیو بدون افت فشرده‌سازی</div>
            </div>
            <select style="background:var(--surface-elevated); color:var(--text); border:1px solid var(--border); padding:6px 12px; border-radius:var(--radius-sm);">
              <option selected>FLAC Master (24-bit / 96kHz)</option>
              <option>MP3 320 kbps (High)</option>
              <option>AAC 256 kbps (Standard)</option>
            </select>
          </div>
          <div class="sidebar-divider"></div>
          <div style="display:flex; justify-content:space-between; align-items:center;">
            <div>
              <div style="font-weight:700; font-size:14px;">برابرساز هوشمند (Dynamic EQ)</div>
              <div style="color:var(--muted); font-size:11.5px;">تنظیم خودکار فرکانس‌ها متناسب با هندزفری</div>
            </div>
            <input type="checkbox" checked style="accent-color:var(--brand); width:18px; height:18px; cursor:pointer;" />
          </div>
          <div class="sidebar-divider"></div>
          <div style="display:flex; justify-content:space-between; align-items:center;">
            <div>
              <div style="font-weight:700; font-size:14px;">حافظه کش آفلاین</div>
              <div style="color:var(--muted); font-size:11.5px;">حجم اشغال شده: 1.4 گیگابایت</div>
            </div>
            <button class="btn-secondary" style="min-height:36px; padding:6px 14px;" onclick="showToast('حافظه کش سهپاتیفای تخلیه شد'); closeAudioSettings(null);">پاک‌سازی</button>
          </div>
        </div>
      </div>
    </div>

    <div class="toast-container" id="toast-shelf"></div>

  </div>

  <script>
    let TRACKS_DB = [];

    async function fetchTracksFromDatabase() {
    try {
        const res = await fetch('/api/tracks');
        TRACKS_DB = await res.json();
        renderAppGrids();
        initSliders();
        if (TRACKS_DB.length > 0) loadTrack(0);
        updateFavoriteBadges();
    } catch (e) {
        console.error('ارتباط با سرور برقرار نشد');
    }
    }

    if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js');
    });
    }

    window.addEventListener('DOMContentLoaded', () => {
    fetchTracksFromDatabase();
    });

    const PLAYLISTS_DB = [
      { id: 101, title: "شب‌های تهران", count: "۲۴ قطعه", cover: "https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=80", desc: "نواهای دلنشین برای رانندگی شبانه و آرامش پایتخت" },
      { id: 102, title: "تمرکز عمیق (Deep Focus)", count: "۳۸ قطعه", cover: "https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500&auto=format&fit=crop&q=80", desc: "لوفای و امبینت برای بیشترین تمرکز کاری و ذهنی" },
      { id: 103, title: "نوستالژی دهه‌ی هفتاد", count: "۵۰ قطعه", cover: "https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=500&auto=format&fit=crop&q=80", desc: "یادآور خاطرات طلایی و آواهای ماندگار کاست‌ها" },
      { id: 104, title: "Persian Essentials", count: "۳۲ قطعه", cover: "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=500&auto=format&fit=crop&q=80", desc: "شاهکارهای اصیل موسیقی که هر ایرانی باید بشنود" }
    ];

    const ARTISTS_DB = [
      { name: "چارتار", listeners: "۱.۸ میلیون", img: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=80" },
      { name: "همایون شجریان", listeners: "۲.۴ میلیون", img: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&auto=format&fit=crop&q=80" },
      { name: "اکو تهران", listeners: "۹۵۰ هزار", img: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=500&auto=format&fit=crop&q=80" },
      { name: "نیما فرهمند", listeners: "۶۴۰ هزار", img: "https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=500&auto=format&fit=crop&q=80" }
    ];

    let currentTrackIndex = 0;
    let isPlaying = false;
    let currentSeconds = 0;
    let isShuffle = false;
    let repeatMode = 0; // 0: Off, 1: Repeat All, 2: Repeat One
    let isMuted = false;
    let audioVolume = 0.8;
    let previousVolume = 0.8;
    let playbackTimer = null;
    let isUserScrubbing = false;
    let isFullPlayerOpen = false;

    let audioCtx = null;
    let synthOsc = null;
    let synthGain = null;

    function initWebAudio() {
      if (!audioCtx) {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        audioCtx = new AudioContext();
      }
      if (audioCtx.state === 'suspended') {
        audioCtx.resume();
      }
    }

    function startSynthSound() {
      try {
        initWebAudio();
        stopSynthSound();
        synthOsc = audioCtx.createOscillator();
        synthGain = audioCtx.createGain();
        
        synthOsc.type = 'sine';
        synthOsc.frequency.setValueAtTime(220, audioCtx.currentTime);
        synthOsc.frequency.exponentialRampToValueAtTime(329.63, audioCtx.currentTime + 3);
        
        const effectiveVol = isMuted ? 0 : audioVolume;
        synthGain.gain.setValueAtTime(0.001, audioCtx.currentTime);
        synthGain.gain.exponentialRampToValueAtTime(Math.max(0.001, 0.05 * effectiveVol), audioCtx.currentTime + 0.8);
        
        synthOsc.connect(synthGain);
        synthGain.connect(audioCtx.destination);
        synthOsc.start();
      } catch (e) {}
    }

    function stopSynthSound() {
      if (synthGain && audioCtx) {
        try {
          synthGain.gain.exponentialRampToValueAtTime(0.0001, audioCtx.currentTime + 0.2);
          setTimeout(() => {
            if (synthOsc) {
              synthOsc.stop();
              synthOsc = null;
            }
          }, 200);
        } catch(e) {}
      }
    }

    function loadTrack(index) {
      currentTrackIndex = (index + TRACKS_DB.length) % TRACKS_DB.length;
      const track = TRACKS_DB[currentTrackIndex];
      currentSeconds = 0;

      // Update Mini Player Metadata
      document.getElementById('mini-art-img').src = track.cover;
      document.getElementById('mini-title').textContent = track.title;
      document.getElementById('mini-artist').textContent = track.artist;
      document.getElementById('mini-time-tot').textContent = track.duration;
      document.getElementById('mini-time-cur').textContent = "0:00";

      // Update Full Player Metadata
      document.getElementById('full-art-img').src = track.cover;
      document.getElementById('full-track-title').textContent = track.title;
      document.getElementById('full-track-artist').textContent = track.artist;
      document.getElementById('full-time-tot').textContent = track.duration;
      document.getElementById('full-time-cur').textContent = "0:00";

      updateScrubbers(0);
      updateFavoriteButtons(track.favorited);
      renderLyrics();
      renderQueue();
      highlightActiveTrackRows();
    }

    function togglePlay() {
      if (isPlaying) {
        pauseTrack();
      } else {
        playTrack(currentTrackIndex);
      }
    }

    function playTrack(index) {
      if (index !== undefined && index !== currentTrackIndex) {
        loadTrack(index);
      }
      isPlaying = true;
      startSynthSound();
      updatePlayIcons(true);

      if (playbackTimer) clearInterval(playbackTimer);
      playbackTimer = setInterval(tickPlayback, 1000);
      highlightActiveTrackRows();
      showToast(`در حال پخش: ${TRACKS_DB[currentTrackIndex].title}`);
    }

    function pauseTrack() {
      isPlaying = false;
      stopSynthSound();
      updatePlayIcons(false);
      if (playbackTimer) clearInterval(playbackTimer);
      highlightActiveTrackRows();
    }

    function nextTrack() {
      let nextIndex;
      if (isShuffle) {
        nextIndex = Math.floor(Math.random() * TRACKS_DB.length);
        if (nextIndex === currentTrackIndex && TRACKS_DB.length > 1) {
          nextIndex = (nextIndex + 1) % TRACKS_DB.length;
        }
      } else {
        nextIndex = currentTrackIndex + 1;
      }
      playTrack(nextIndex);
    }

    function prevTrack() {
      if (currentSeconds > 3) {
        seekToSeconds(0);
      } else {
        playTrack(currentTrackIndex - 1);
      }
    }

    function updatePlayIcons(playing) {
      const playSvg = `<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>`;
      const pauseSvg = `<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
      
      const fullPlaySvg = `<svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>`;
      const fullPauseSvg = `<svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;

      const mainBtn = document.getElementById('main-play-btn');
      if (mainBtn) mainBtn.innerHTML = playing ? pauseSvg : playSvg;

      const fullBtn = document.getElementById('full-play-btn');
      if (fullBtn) fullBtn.innerHTML = playing ? fullPauseSvg : fullPlaySvg;

      const heroIcon = document.getElementById('hero-play-icon');
      if (heroIcon) heroIcon.innerHTML = playing ? pauseSvg : playSvg;
    }

    function tickPlayback() {
      if (isUserScrubbing) return;
      const track = TRACKS_DB[currentTrackIndex];
      currentSeconds++;

      if (currentSeconds > track.durationSec) {
        if (repeatMode === 2) {
          seekToSeconds(0);
          playTrack(currentTrackIndex);
        } else if (repeatMode === 1 || currentTrackIndex < TRACKS_DB.length - 1) {
          nextTrack();
        } else {
          pauseTrack();
          seekToSeconds(0);
        }
        return;
      }

      const percent = (currentSeconds / track.durationSec) * 100;
      updateScrubbers(percent);
      const formatted = formatSeconds(currentSeconds);
      document.getElementById('mini-time-cur').textContent = formatted;
      document.getElementById('full-time-cur').textContent = formatted;
      syncLyricsHighlight(currentSeconds);
    }

    function updateScrubbers(percent) {
      const p = Math.max(0, Math.min(100, percent)) + '%';
      const miniFill = document.getElementById('mini-scrub-fill');
      const fullFill = document.getElementById('full-scrub-fill');
      const topFill = document.getElementById('progress-top-fill');
      if (miniFill) miniFill.style.width = p;
      if (fullFill) fullFill.style.width = p;
      if (topFill) topFill.style.width = p;
    }

    function seekToSeconds(seconds) {
      const track = TRACKS_DB[currentTrackIndex];
      currentSeconds = Math.max(0, Math.min(track.durationSec, seconds));
      const percent = (currentSeconds / track.durationSec) * 100;
      updateScrubbers(percent);
      const formatted = formatSeconds(currentSeconds);
      document.getElementById('mini-time-cur').textContent = formatted;
      document.getElementById('full-time-cur').textContent = formatted;
      syncLyricsHighlight(currentSeconds);
    }

    function bindSliderDrag(trackElem, onUpdate, onCommit) {
      if (!trackElem) return;
      let isDragging = false;

      function calculateFraction(e) {
        const rect = trackElem.getBoundingClientRect();
        const clientX = e.clientX ?? (e.touches ? e.touches[0].clientX : 0);
        const offsetX = clientX - rect.left;
        return Math.max(0, Math.min(1, offsetX / rect.width));
      }

      function onPointerDown(e) {
        isDragging = true;
        trackElem.classList.add('dragging');
        trackElem.setPointerCapture(e.pointerId);
        const fraction = calculateFraction(e);
        onUpdate(fraction);
      }

      function onPointerMove(e) {
        if (!isDragging) return;
        const fraction = calculateFraction(e);
        onUpdate(fraction);
      }

      function onPointerUp(e) {
        if (!isDragging) return;
        isDragging = false;
        trackElem.classList.remove('dragging');
        try { trackElem.releasePointerCapture(e.pointerId); } catch(err) {}
        const fraction = calculateFraction(e);
        if (onCommit) onCommit(fraction);
      }

      trackElem.addEventListener('pointerdown', onPointerDown);
      trackElem.addEventListener('pointermove', onPointerMove);
      trackElem.addEventListener('pointerup', onPointerUp);
      trackElem.addEventListener('pointercancel', onPointerUp);
    }

    function initSliders() {
      // 1. Mini Scrubber Bar
      const miniScrub = document.getElementById('mini-scrub-track');
      bindSliderDrag(miniScrub, 
        (frac) => {
          isUserScrubbing = true;
          const track = TRACKS_DB[currentTrackIndex];
          const sec = Math.floor(frac * track.durationSec);
          updateScrubbers(frac * 100);
          document.getElementById('mini-time-cur').textContent = formatSeconds(sec);
          document.getElementById('full-time-cur').textContent = formatSeconds(sec);
        },
        (frac) => {
          isUserScrubbing = false;
          const track = TRACKS_DB[currentTrackIndex];
          seekToSeconds(Math.floor(frac * track.durationSec));
        }
      );

      // 2. Full Scrubber Bar
      const fullScrub = document.getElementById('full-scrub-track');
      bindSliderDrag(fullScrub, 
        (frac) => {
          isUserScrubbing = true;
          const track = TRACKS_DB[currentTrackIndex];
          const sec = Math.floor(frac * track.durationSec);
          updateScrubbers(frac * 100);
          document.getElementById('mini-time-cur').textContent = formatSeconds(sec);
          document.getElementById('full-time-cur').textContent = formatSeconds(sec);
        },
        (frac) => {
          isUserScrubbing = false;
          const track = TRACKS_DB[currentTrackIndex];
          seekToSeconds(Math.floor(frac * track.durationSec));
        }
      );

      // 3. Top edge progress bar in mini player
      const topScrub = document.getElementById('mini-progress-top');
      bindSliderDrag(topScrub,
        (frac) => {
          const track = TRACKS_DB[currentTrackIndex];
          seekToSeconds(Math.floor(frac * track.durationSec));
        },
        (frac) => {
          const track = TRACKS_DB[currentTrackIndex];
          seekToSeconds(Math.floor(frac * track.durationSec));
        }
      );

      // 4. Mini Volume Slider
      const miniVol = document.getElementById('mini-volume-track');
      bindSliderDrag(miniVol, (frac) => setAudioVolume(frac), (frac) => setAudioVolume(frac));

      // 5. Full Volume Slider
      const fullVol = document.getElementById('full-volume-track');
      bindSliderDrag(fullVol, (frac) => setAudioVolume(frac), (frac) => setAudioVolume(frac));
    }

    function setAudioVolume(fraction) {
      audioVolume = Math.max(0, Math.min(1, fraction));
      if (audioVolume > 0 && isMuted) {
        isMuted = false;
      }
      updateVolumeUI();

      if (synthGain && audioCtx) {
        const effectiveVol = isMuted ? 0 : audioVolume;
        synthGain.gain.setValueAtTime(Math.max(0.0001, 0.05 * effectiveVol), audioCtx.currentTime);
      }
    }

    function toggleMute() {
      if (isMuted) {
        isMuted = false;
        audioVolume = previousVolume || 0.8;
      } else {
        previousVolume = audioVolume;
        isMuted = true;
        audioVolume = 0;
      }
      updateVolumeUI();
      if (synthGain && audioCtx) {
        const effectiveVol = isMuted ? 0 : audioVolume;
        synthGain.gain.setValueAtTime(Math.max(0.0001, 0.05 * effectiveVol), audioCtx.currentTime);
      }
      showToast(isMuted ? 'صدا قطع شد' : 'صدا وصل شد');
    }

    function updateVolumeUI() {
      const percent = (isMuted ? 0 : audioVolume * 100) + '%';
      const miniFill = document.getElementById('mini-volume-fill');
      const fullFill = document.getElementById('full-volume-fill');
      if (miniFill) miniFill.style.width = percent;
      if (fullFill) fullFill.style.width = percent;

      let iconSvg;
      if (isMuted || audioVolume === 0) {
        iconSvg = `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15zM17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/></svg>`;
      } else if (audioVolume < 0.5) {
        iconSvg = `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>`;
      } else {
        iconSvg = `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>`;
      }

      const miniIcon = document.getElementById('mini-vol-icon-wrap');
      const fullIcon = document.getElementById('full-vol-icon-wrap');
      if (miniIcon) miniIcon.innerHTML = iconSvg;
      if (fullIcon) fullIcon.innerHTML = iconSvg;
    }

    function toggleShuffle() {
      isShuffle = !isShuffle;
      const miniBtn = document.getElementById('ctrl-shuffle');
      const fullBtn = document.getElementById('full-shuffle-btn');
      if (miniBtn) miniBtn.classList.toggle('active', isShuffle);
      if (fullBtn) fullBtn.classList.toggle('active', isShuffle);
      showToast(isShuffle ? 'پخش تصادفی فعال شد' : 'پخش عادی فعال شد');
    }

    function toggleRepeat() {
      repeatMode = (repeatMode + 1) % 3;
      const miniBtn = document.getElementById('ctrl-repeat');
      const fullBtn = document.getElementById('full-repeat-btn');

      [miniBtn, fullBtn].forEach(btn => {
        if (!btn) return;
        btn.classList.remove('active', 'repeat-one');
        if (repeatMode === 1) {
          btn.classList.add('active');
        } else if (repeatMode === 2) {
          btn.classList.add('active', 'repeat-one');
        }
      });

      if (repeatMode === 1) {
        showToast('تکرار تمام پلی‌لیست فعال شد');
      } else if (repeatMode === 2) {
        showToast('تکرار همین ترانه فعال شد');
      } else {
        showToast('حالت تکرار غیرفعال شد');
      }
    }

    function toggleFavoriteCurrent() {
      const track = TRACKS_DB[currentTrackIndex];
      track.favorited = !track.favorited;
      updateFavoriteButtons(track.favorited);
      updateFavoriteBadges();
      renderAppGrids();
      showToast(track.favorited ? 'به موردعلاقه‌ها اضافه شد' : 'از موردعلاقه‌ها برداشته شد');
    }

    function updateFavoriteButtons(isFav) {
      const favSvgActive = `<svg width="18" height="18" fill="var(--brand)" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>`;
      const favSvgInactive = `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>`;

      const miniFav = document.getElementById('mini-fav-btn');
      const fullFav = document.getElementById('full-fav-top-btn');
      if (miniFav) {
        miniFav.innerHTML = isFav ? favSvgActive : favSvgInactive;
        miniFav.classList.toggle('favorited', isFav);
      }
      if (fullFav) {
        fullFav.innerHTML = isFav ? favSvgActive : favSvgInactive;
        fullFav.classList.toggle('favorited', isFav);
      }
    }

    function updateFavoriteBadges() {
      const count = TRACKS_DB.filter(t => t.favorited).length;
      const favBadge = document.getElementById('fav-count');
      const mobFavBadge = document.getElementById('mob-fav-count');
      if (favBadge) favBadge.textContent = count;
      if (mobFavBadge) mobFavBadge.textContent = count;
    }

    function formatSeconds(sec) {
      const m = Math.floor(sec / 60);
      const s = sec % 60;
      return `${m}:${s < 10 ? '0' : ''}${s}`;
    }

    function switchFullPlayerView(viewName) {
      document.querySelectorAll('.full-tab-btn').forEach(btn => btn.classList.remove('active'));
      document.querySelectorAll('.full-panel-view').forEach(p => p.classList.remove('active'));

      const targetTab = document.getElementById(`full-tab-${viewName}`);
      const targetView = document.getElementById(`full-view-${viewName}`);
      if (targetTab) targetTab.classList.add('active');
      if (targetView) targetView.classList.add('active');
    }

    function toggleFullPlayer() {
      const modal = document.getElementById('full-player-modal');
      modal.classList.toggle('active');
      isFullPlayerOpen = modal.classList.contains('active');
      if (isFullPlayerOpen) {
        initVisualizerLoop();
        switchFullPlayerView('now');
      }
    }

    function renderLyrics() {
      const track = TRACKS_DB[currentTrackIndex];
      const sideContainer = document.getElementById('lyrics-container');
      const fullContainer = document.getElementById('full-lyrics-container');

      if (!track.lyrics || track.lyrics.length === 0) {
        const emptyMsg = `<div style="color:var(--muted); text-align:center; padding:40px 0;">متن ترانه‌ای برای این اثر یافت نشد.</div>`;
        if (sideContainer) sideContainer.innerHTML = emptyMsg;
        if (fullContainer) fullContainer.innerHTML = emptyMsg;
        return;
      }

      const sideHtml = track.lyrics.map((line, idx) => `
        <div class="lyrics-line ${idx === 0 ? 'active' : ''}" data-time="${line.time}" onclick="seekToSeconds(${line.time})">
          ${line.fa}
          <span class="lyrics-translation">${line.en}</span>
        </div>
      `).join('');

      const fullHtml = track.lyrics.map((line, idx) => `
        <div class="full-lyrics-line ${idx === 0 ? 'active' : ''}" data-time="${line.time}" onclick="seekToSeconds(${line.time})">
          ${line.fa}
          <span class="full-lyrics-trans">${line.en}</span>
        </div>
      `).join('');

      if (sideContainer) sideContainer.innerHTML = sideHtml;
      if (fullContainer) fullContainer.innerHTML = fullHtml;
    }

    function syncLyricsHighlight(sec) {
      const updateLines = (selector, activeCls) => {
        const lines = document.querySelectorAll(selector);
        lines.forEach(line => {
          const t = parseInt(line.getAttribute('data-time') || '0', 10);
          if (sec >= t) {
            lines.forEach(l => l.classList.remove(activeCls));
            line.classList.add(activeCls);
          }
        });
      };
      updateLines('.lyrics-line', 'active');
      updateLines('.full-lyrics-line', 'active');
    }

    function renderQueue() {
      const sideQueue = document.getElementById('queue-container');
      const fullQueue = document.getElementById('full-queue-container');

      const itemsHtml = TRACKS_DB.map((t, idx) => `
        <div class="queue-item" onclick="playTrack(${idx})">
          <img src="${t.cover}" style="width:38px; height:38px; border-radius:6px; object-fit:cover;" />
          <div style="flex:1; overflow:hidden;">
            <div style="font-size:12.5px; font-weight:700; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; ${idx === currentTrackIndex ? 'color:var(--brand);' : ''}">${t.title}</div>
            <div style="font-size:11px; color:var(--muted);">${t.artist}</div>
          </div>
          <span style="font-size:11px; color:var(--muted); direction:ltr;">${t.duration}</span>
        </div>
      `).join('');

      if (sideQueue) sideQueue.innerHTML = itemsHtml;
      if (fullQueue) fullQueue.innerHTML = itemsHtml;
    }

    function toggleLyricsDrawer() {
      const lyrics = document.getElementById('lyrics-drawer');
      const queue = document.getElementById('queue-drawer');
      if (queue) queue.classList.remove('open');
      if (lyrics) lyrics.classList.toggle('open');
    }

    function toggleQueueDrawer() {
      const queue = document.getElementById('queue-drawer');
      const lyrics = document.getElementById('lyrics-drawer');
      if (lyrics) lyrics.classList.remove('open');
      if (queue) queue.classList.toggle('open');
    }

    function switchView(viewId) {
      document.querySelectorAll('.view-panel').forEach(panel => panel.classList.remove('active'));
      document.querySelectorAll('.nav-link').forEach(item => item.classList.remove('active'));
      document.querySelectorAll('.mobile-nav-btn').forEach(btn => btn.classList.remove('active'));

      const targetView = document.getElementById(`view-${viewId}`);
      if (targetView) targetView.classList.add('active');

      const desktopNav = document.getElementById(`nav-${viewId}`);
      if (desktopNav) desktopNav.classList.add('active');

      const mobNav = document.getElementById(`mob-${viewId}`);
      if (mobNav) mobNav.classList.add('active');

      document.getElementById('viewport').scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Profile Dropdown Handler
    function toggleProfileMenu() {
      const menu = document.getElementById('profile-dropdown-menu');
      const pill = document.getElementById('profile-pill-btn');
      menu.classList.toggle('open');
      pill.classList.toggle('active');
    }

    function closeProfileMenu() {
      const menu = document.getElementById('profile-dropdown-menu');
      const pill = document.getElementById('profile-pill-btn');
      if (menu) menu.classList.remove('open');
      if (pill) pill.classList.remove('active');
    }

    document.addEventListener('click', (e) => {
      const wrap = document.querySelector('.profile-widget-wrap');
      if (wrap && !wrap.contains(e.target)) {
        closeProfileMenu();
      }
    });

    function renderAppGrids() {
      // 1. Home Recommended Grid
      const homeFeatured = document.getElementById('home-featured-grid');
      homeFeatured.innerHTML = TRACKS_DB.map((t, idx) => `
        <div class="music-card" onclick="playTrack(${idx})">
          <div class="card-art-box">
            <img class="card-art-img" src="${t.cover}" alt="${t.title}" />
            <button class="card-play-overlay" title="پخش">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
            </button>
          </div>
          <div class="card-title">${t.title}</div>
          <div class="card-subtitle">${t.artist}</div>
        </div>
      `).join('');

      // 2. Home Recent Tracks with Centered Favorite Icons
      const recentList = document.getElementById('home-recent-tracks');
      recentList.innerHTML = TRACKS_DB.map((t, idx) => `
        <div class="track-row ${idx === currentTrackIndex && isPlaying ? 'playing' : ''}" onclick="playTrack(${idx})">
          <div class="track-num">${idx + 1}</div>
          <div class="equalizer-wave">
            <div class="eq-bar"></div>
            <div class="eq-bar"></div>
            <div class="eq-bar"></div>
          </div>
          <div class="track-thumb">
            <img src="${t.cover}" alt="${t.title}" />
          </div>
          <div class="track-meta">
            <div class="track-name">${t.title}</div>
            <div class="track-artist">${t.artist}</div>
          </div>
          <div class="track-album">${t.album}</div>
          <div class="track-duration">${t.duration}</div>
          <button class="fav-action-btn ${t.favorited ? 'favorited' : ''}" onclick="event.stopPropagation(); toggleFavTrack(${idx});" title="موردعلاقه‌ها">
            <svg width="18" height="18" fill="${t.favorited ? 'currentColor' : 'none'}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
          </button>
        </div>
      `).join('');

      // 3. Home Featured Artists
      const homeArtists = document.getElementById('home-artists-grid');
      homeArtists.innerHTML = ARTISTS_DB.map(a => `
        <div class="music-card artist-card" onclick="openArtistPage('${a.name}', '${a.img}', '${a.listeners}')">
          <div class="card-art-box">
            <img class="card-art-img" src="${a.img}" alt="${a.name}" />
          </div>
          <div class="card-title">${a.name}</div>
          <div class="card-subtitle">${a.listeners} شنونده</div>
        </div>
      `).join('');

      // 4. Playlists Grid
      const playGrid = document.getElementById('playlists-grid');
      playGrid.innerHTML = PLAYLISTS_DB.map(p => `
        <div class="music-card" onclick="showToast('بارگذاری پلی‌‌لیست: ${p.title}')">
          <div class="card-art-box">
            <img class="card-art-img" src="${p.cover}" alt="${p.title}" />
            <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
          </div>
          <div class="card-title">${p.title}</div>
          <div class="card-subtitle">${p.count} • ${p.desc}</div>
        </div>
      `).join('');

      // 5. Discover Genres Grid
      const genres = ["سنتی اصیل", "تلفیقی", "پاپ مدرن", "آلترناتیو و راک", "لوفای و ریلکس", "الکترونیک و کلاب", "جاز و بلوز", "موسیقی متن سینما"];
      const discGrid = document.getElementById('discover-genres-grid');
      discGrid.innerHTML = genres.map(g => `
        <div class="music-card" onclick="filterByMood('${g}')">
          <div class="card-art-box" style="background: linear-gradient(135deg, #10B954 0%, #0d381c 100%); display:flex; align-items:center; justify-content:center;">
            <svg width="40" height="40" stroke="#FFFFFF" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
          </div>
          <div class="card-title">${g}</div>
          <div class="card-subtitle">برترین ترانه‌ها</div>
        </div>
      `).join('');

      // 6. Library Grid
      document.getElementById('library-grid').innerHTML = homeFeatured.innerHTML;
    }

    function highlightActiveTrackRows() {
      document.querySelectorAll('.track-row').forEach((row, i) => {
        if (i === currentTrackIndex && isPlaying) {
          row.classList.add('playing');
        } else {
          row.classList.remove('playing');
        }
      });
    }

    function toggleFavTrack(index) {
      TRACKS_DB[index].favorited = !TRACKS_DB[index].favorited;
      renderAppGrids();
      loadTrack(currentTrackIndex);
      updateFavoriteBadges();
      showToast(TRACKS_DB[index].favorited ? 'به علاقه‌‌مندی‌ها اضافه شد' : 'حذف شد');
    }

    function handleSearchInput(query) {
      if (query.trim().length > 0) {
        switchView('search');
      }
      const list = document.getElementById('search-results-list');
      const q = query.toLowerCase().trim();

      const results = TRACKS_DB.filter(t => 
        t.title.toLowerCase().includes(q) || 
        t.artist.toLowerCase().includes(q) ||
        t.album.toLowerCase().includes(q) ||
        t.genre.toLowerCase().includes(q)
      );

      if (results.length === 0) {
        list.innerHTML = `<div style="text-align:center; padding:40px; color:var(--muted);">اثری منطبق با «${query}» یافت نشد.</div>`;
        return;
      }

      list.innerHTML = results.map((t, idx) => `
        <div class="track-row" onclick="playTrack(${t.id - 1})">
          <div class="track-num">${idx + 1}</div>
          <div class="track-thumb">
            <img src="${t.cover}" alt="${t.title}" />
          </div>
          <div class="track-meta">
            <div class="track-name">${t.title}</div>
            <div class="track-artist">${t.artist}</div>
          </div>
          <div class="track-album">${t.album}</div>
          <div class="track-duration">${t.duration}</div>
          <button class="fav-action-btn ${t.favorited ? 'favorited' : ''}" onclick="event.stopPropagation(); toggleFavTrack(${t.id - 1});">
            <svg width="18" height="18" fill="${t.favorited ? 'currentColor' : 'none'}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
          </button>
        </div>
      `).join('');
    }

    function applySearchTag(tag) {
      document.querySelectorAll('.search-tag').forEach(t => t.classList.remove('active'));
      event.target.classList.add('active');
      if (tag === 'همه') {
        handleSearchInput('');
      } else {
        handleSearchInput(tag);
      }
    }

    function filterByMood(mood) {
      switchView('search');
      document.getElementById('global-search-input').value = mood;
      handleSearchInput(mood);
      showToast(`فیلتر ژانر: ${mood}`);
    }

    function filterFavorites() {
      switchView('search');
      document.getElementById('global-search-input').value = "";
      const list = document.getElementById('search-results-list');
      const favs = TRACKS_DB.filter(t => t.favorited);
      
      // Update nav active state for mobile
      document.querySelectorAll('.mobile-nav-btn').forEach(btn => btn.classList.remove('active'));
      const mobFavBtn = document.getElementById('mob-favorites');
      if (mobFavBtn) mobFavBtn.classList.add('active');

      if (favs.length === 0) {
        list.innerHTML = `<div style="text-align:center; padding:40px; color:var(--muted);">هنوز هیچ ترانه‌ای به موردعلاقه‌ها اضافه نشده است.</div>`;
        return;
      }

      list.innerHTML = favs.map((t, idx) => `
        <div class="track-row" onclick="playTrack(${t.id - 1})">
          <div class="track-num">${idx + 1}</div>
          <div class="track-thumb"><img src="${t.cover}" /></div>
          <div class="track-meta"><div class="track-name">${t.title}</div><div class="track-artist">${t.artist}</div></div>
          <div class="track-album">${t.album}</div>
          <div class="track-duration">${t.duration}</div>
          <button class="fav-action-btn favorited" onclick="event.stopPropagation(); toggleFavTrack(${t.id - 1});">
            <svg width="18" height="18" fill="var(--brand)" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
          </button>
        </div>
      `).join('');
      showToast('نمایش ترانه‌های موردعلاقه');
    }

    function openArtistPage(name, img, listeners) {
      document.getElementById('artist-page-name').textContent = name;
      document.getElementById('artist-page-img').src = img;
      
      const artistTracks = TRACKS_DB.filter(t => t.artist.includes(name.split(' ')[0]));
      const list = document.getElementById('artist-tracks-list');
      list.innerHTML = (artistTracks.length > 0 ? artistTracks : TRACKS_DB.slice(0, 3)).map((t, idx) => `
        <div class="track-row" onclick="playTrack(${t.id - 1})">
          <div class="track-num">${idx + 1}</div>
          <div class="track-thumb"><img src="${t.cover}" /></div>
          <div class="track-meta"><div class="track-name">${t.title}</div><div class="track-artist">${t.artist}</div></div>
          <div class="track-album">${t.album}</div>
          <div class="track-duration">${t.duration}</div>
          <button class="fav-action-btn ${t.favorited ? 'favorited' : ''}" onclick="event.stopPropagation(); toggleFavTrack(${t.id - 1});">
            <svg width="18" height="18" fill="${t.favorited ? 'currentColor' : 'none'}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
          </button>
        </div>
      `).join('');

      switchView('artist');
    }

    function toggleFollowArtist() {
      const btn = document.getElementById('btn-follow-artist');
      if (btn.innerText.includes('دنبال شده')) {
        btn.innerHTML = `<span>دنبال کردن</span>`;
        showToast('هنرمند از لیست دنبال‌شدگان شما برداشته شد');
      } else {
        btn.innerHTML = `<span style="color:var(--brand);">دنبال شده ✓</span>`;
        showToast('به جمع شنوندگان رسمی این هنرمند پیوستید');
      }
    }

    let canvasAnimId = null;
    function initVisualizerLoop() {
      const canvas = document.getElementById('canvas-visualizer');
      if (!canvas) return;
      const ctx = canvas.getContext('2d');
      canvas.width = canvas.parentElement.offsetWidth;
      canvas.height = 75;

      let step = 0;
      function renderWave() {
        if (!isFullPlayerOpen) return;
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        step += 0.05;
        const bars = 36;
        const barWidth = canvas.width / bars;

        for (let i = 0; i < bars; i++) {
          const heightFactor = isPlaying 
            ? Math.abs(Math.sin(step + i * 0.25)) * 48 + 8 
            : 6;
          
          const grad = ctx.createLinearGradient(0, canvas.height, 0, 0);
          grad.addColorStop(0, "rgba(16, 185, 84, 0.1)");
          grad.addColorStop(1, "rgba(16, 185, 84, 0.88)");

          ctx.fillStyle = grad;
          ctx.fillRect(i * barWidth, canvas.height - heightFactor, barWidth - 3, heightFactor);
        }

        canvasAnimId = requestAnimationFrame(renderWave);
      }
      if (canvasAnimId) cancelAnimationFrame(canvasAnimId);
      renderWave();
    }

    function showToast(message) {
      const shelf = document.getElementById('toast-shelf');
      const toast = document.createElement('div');
      toast.className = 'toast-msg';
      toast.innerHTML = `
        <svg width="17" height="17" fill="var(--brand)" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
        <span>${message}</span>
      `;
      shelf.appendChild(toast);
      setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(10px)';
        toast.style.transition = 'all 0.3s ease';
        setTimeout(() => toast.remove(), 300);
      }, 3000);
    }

    function openAudioSettings() {
      document.getElementById('settings-modal').classList.add('open');
    }

    function closeAudioSettings(e) {
      document.getElementById('settings-modal').classList.remove('open');
    }

    window.addEventListener('DOMContentLoaded', () => {
      renderAppGrids();
      initSliders();
      loadTrack(0);
      updateVolumeUI();
      updateFavoriteBadges();
      handleSearchInput('');
    });
  </script>
</body>
</html>