<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
  <title>سهپاتیفای | Sehpatify — ریتم، درون تو زنده است</title>
  <meta name="theme-color" content="#0A0A0F" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="پلتفرم نسل نوین موسیقی ایرانی و بین‌المللی با کیفیت Lossless Hi-Res و تجربه بومی فارسی" />

  <!-- Google Fonts: Vazirmatn -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="manifest" href="/manifest.json">

  <style>
    :root {
      --brand: #10B954;
      --brand-glow: rgba(16, 185, 84, 0.45);
      --brand-glow-lg: rgba(16, 185, 84, 0.24);
      --brand-dim: rgba(16, 185, 84, 0.12);
      --brand-hover: #15d261;
      --brand-active: #0d9643;

      --bg: #0A0A0F;
      --surface: #12121A;
      --surface-card: #161622;
      --surface-elevated: #1D1D2B;
      --surface-hover: #222233;
      --surface-glass: rgba(18, 18, 26, 0.88);
      --surface-glass-heavy: rgba(10, 10, 15, 0.95);

      --text: #F5F5F7;
      --muted: #9696A3;
      --muted-dark: #636372;
      --border: rgba(255, 255, 255, 0.08);
      --border-light: rgba(255, 255, 255, 0.14);
      --border-brand: rgba(16, 185, 84, 0.45);

      --sidebar-w: 260px;
      --topbar-h: 72px;
      --mini-player-h: 90px;
      --mobile-nav-h: 66px;

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
      background: radial-gradient(circle at 85% 0%, rgba(16, 185, 84, 0.07) 0%, transparent 45%), var(--bg);
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

    .fav-action-btn {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      border: none;
      background: transparent;
      color: var(--muted);
      cursor: pointer;
      transition: all var(--transition-fast);
      flex-shrink: 0;
    }

    .fav-action-btn:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.08);
    }

    .fav-action-btn.favorited {
      color: var(--brand) !important;
    }

    /* هدر صفحات اختصاصی خواننده و پلی‌لیست */
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

    .playlist-cover-lg {
      width: 190px;
      height: 190px;
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-lg), 0 0 24px rgba(16, 185, 84, 0.15);
      overflow: hidden;
      flex-shrink: 0;
      background: #1d1d2b;
      border: 1px solid var(--border-light);
    }

    .playlist-cover-lg img {
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
      font-size: 32px;
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
      flex-wrap: wrap;
    }

    /* مینی پلیر */
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

    .mini-track-artist {
      font-size: 11.5px;
      color: var(--muted);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

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
      border-radius: 50%;
      transition: all var(--transition-fast);
      position: relative;
    }

    .ctrl-btn:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.05);
    }

    .ctrl-btn.active {
      color: var(--brand) !important;
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

    .interactive-slider-track {
      position: relative;
      height: 24px;
      display: flex;
      align-items: center;
      cursor: pointer;
      direction: ltr !important;
      flex: 1;
    }

    .slider-rail {
      position: relative;
      width: 100%;
      height: 5px;
      background: rgba(255, 255, 255, 0.12);
      border-radius: var(--radius-full);
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
    }

    .player-right-utils {
      display: flex;
      align-items: center;
      gap: 14px;
      width: 290px;
      justify-content: flex-end;
    }

    /* پلیر تمام‌صفحه */
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

    .full-player-nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 24px;
      border-bottom: 1px solid var(--border);
    }

    .full-player-stage {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 12px 24px;
      overflow: hidden;
    }

    .full-panel-view {
      display: none;
      width: 100%;
      height: 100%;
      max-width: 900px;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .full-panel-view.active {
      display: flex;
    }

    .full-cover-card {
      width: min(300px, 46vh);
      height: min(300px, 46vh);
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.75), 0 0 35px var(--brand-glow);
      margin-bottom: 16px;
      position: relative;
    }

    .full-cover-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
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

    .full-control-deck {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      padding: 14px 24px calc(24px + env(safe-area-inset-bottom, 0px));
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .full-primary-buttons {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 32px;
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
    }

    .side-drawer {
      position: fixed;
      top: 0;
      bottom: var(--mini-player-h);
      left: 0;
      width: 380px;
      background: var(--surface-glass-heavy);
      backdrop-filter: blur(32px);
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
      pointer-events: auto;
      animation: toastIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    @keyframes toastIn {
      from { transform: translateY(15px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    /* نویگیشن موبایل */
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
      font-size: 10.5px;
      font-weight: 600;
      cursor: pointer;
      min-width: 52px;
      height: 100%;
    }

    .mobile-nav-btn.active {
      color: var(--brand);
    }

    .mobile-nav-btn svg {
      width: 20px;
      height: 20px;
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
      .topbar {
        padding: 0 14px;
        height: 62px;
      }
      .topbar-mobile-logo {
        display: flex;
      }
      .hi-res-chip {
        display: none;
      }
      .content-viewport {
        padding: 14px 14px calc(var(--mobile-nav-h) + 84px + env(safe-area-inset-bottom, 0px));
      }
      .mini-player {
        bottom: calc(var(--mobile-nav-h) + env(safe-area-inset-bottom, 0px) + 8px);
        left: 10px;
        right: 10px;
        height: 66px;
        padding: 0 12px;
        border-radius: 14px;
        border: 1px solid var(--border-light);
      }
      .player-right-utils, .time-tracker-row, #ctrl-shuffle, #ctrl-repeat {
        display: none;
      }
      .player-left-track {
        width: calc(100% - 90px);
      }
      .hero-banner {
        flex-direction: column;
        padding: 20px 16px;
        text-align: center;
        gap: 16px;
      }
      .artist-header-box {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 16px;
      }
      .artist-avatar-lg, .playlist-cover-lg {
        width: 160px;
        height: 160px;
      }
      .track-row {
        grid-template-columns: 24px 44px 1fr 40px;
        gap: 10px;
        padding: 6px 8px;
      }
      .track-duration {
        display: none;
      }
      .side-drawer {
        width: 100vw;
        bottom: calc(var(--mobile-nav-h) + 76px);
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
    }
  </style>
</head>
<body>
  <div id="app">

    <!-- سایدبار دسکتاپ -->
    <aside class="sidebar" id="sidebar">
      <a class="brand-header" onclick="switchView('home')" title="سهپاتیفای — صفحه اصلی">
        <div class="brand-logo-wrap">
          <svg class="brand-logo-svg" viewBox="0 0 320 240" fill="none">
            <path d="M 68 126 C 68 148, 86 172, 116 172 C 146 172, 142 64, 160 64 C 178 64, 174 172, 204 172 C 234 172, 252 148, 252 126" stroke="#10B954" stroke-width="26" stroke-linecap="round" />
            <circle cx="68" cy="126" r="14" fill="#4ADE80" />
            <circle cx="252" cy="126" r="14" fill="#10B954" />
          </svg>
        </div>
        <div class="brand-text-col">
          <div class="brand-title"><span class="en">SEHPATIFY</span></div>
          <div class="brand-sub">پلتفرم بومی موسیقی ایرانی</div>
        </div>
      </a>

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
            <span class="badge-count" id="nav-playlists-count">۰</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-favorites" onclick="filterFavorites()">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            <span>موردعلاقه‌ها</span>
            <span class="badge-count" id="fav-count">۰</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-library" onclick="switchView('library')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <span>کتابخانه</span>
          </a>
        </li>
      </ul>

      <div class="sidebar-divider"></div>

      <div class="offline-card">
        <div class="offline-text">
          <span class="offline-title">موتور صوتی Hi-Res</span>
          <span class="offline-sub">96kHz / 24-bit Lossless</span>
        </div>
        <div class="status-dot"></div>
      </div>
    </aside>

    <main class="main-wrapper">
      <header class="topbar">
        <div class="topbar-mobile-logo" onclick="switchView('home')">
          <div class="brand-logo-wrap">
            <svg class="brand-logo-svg" viewBox="0 0 320 240" fill="none">
              <path d="M 68 126 C 68 148, 86 172, 116 172 C 146 172, 142 64, 160 64 C 178 64, 174 172, 204 172 C 234 172, 252 148, 252 126" stroke="#10B954" stroke-width="26" stroke-linecap="round" />
              <circle cx="68" cy="126" r="14" fill="#4ADE80" />
              <circle cx="252" cy="126" r="14" fill="#10B954" />
            </svg>
          </div>
        </div>

        <div class="search-container">
          <span class="search-icon-pos">
            <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          </span>
          <input type="text" class="search-input" id="global-search-input" placeholder="جستجوی آهنگ، هنرمند یا پلی‌لیست..." oninput="handleSearchInput(this.value)" />
        </div>

        <div class="topbar-actions">
          <div class="hi-res-chip">
            <span>FLAC 24-BIT</span>
          </div>
          <a href="/admin/studio" class="action-circle-btn" title="ورود به پنل استودیو">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
          </a>
        </div>
      </header>

      <div class="content-viewport" id="viewport">

        <!-- VIEW 1: HOME -->
        <section class="view-panel active" id="view-home">
          <div class="hero-banner">
            <div class="hero-content">
              <div class="hero-tag">
                <span class="status-dot"></span>
                <span>پخش زنده استریم اختصاصی سهپاتیفای</span>
              </div>
              <h1 class="hero-heading">«ریتم، درون تو زنده است.»</h1>
              <p class="hero-sub">تجربه‌ای ناب از آوای ایران تا کهکشان صوت؛ با کیفیت استودیو مستر Lossless.</p>
              <div class="hero-ctas">
                <button class="btn-brand" onclick="playDefaultQueue()">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>شروع پخش هوشمند</span>
                </button>
                <button class="btn-secondary" onclick="switchView('discover')">
                  <span>کشف موسیقی تازه</span>
                </button>
              </div>
            </div>
          </div>

          <!-- بخش پلی‌لیست‌های برگزیده در صفحه اصلی -->
          <div class="section-header">
            <h2 class="section-title">پلی‌لیست‌های برگزیده</h2>
            <a class="section-see-all" onclick="switchView('playlists')">مشاهده همه</a>
          </div>
          <div class="grid-container" id="home-playlists-grid"></div>

          <!-- بخش آهنگ‌های پیشنهادی -->
          <div class="section-header">
            <h2 class="section-title">پیشنهادی برای تو</h2>
          </div>
          <div class="grid-container" id="home-featured-grid"></div>

          <!-- بخش قطعات موسیقی -->
          <div class="section-header">
            <h2 class="section-title">تمام قطعات پلتفرم</h2>
          </div>
          <div class="track-list" id="home-recent-tracks"></div>

          <!-- بخش هنرمندان در صفحه اصلی -->
          <div class="section-header">
            <h2 class="section-title">هنرمندان منتخب و جریان‌ساز</h2>
          </div>
          <div class="grid-container" id="home-artists-grid"></div>
        </section>

        <!-- VIEW 2: DISCOVER -->
        <section class="view-panel" id="view-discover">
          <div class="section-header">
            <h2 class="section-title">ژانرها و سبک‌های پلتفرم</h2>
          </div>
          <div class="grid-container" id="discover-genres-grid"></div>
        </section>

        <!-- VIEW 3: SEARCH -->
        <section class="view-panel" id="view-search">
          <div class="section-header">
            <h2 class="section-title">جستجو در گنجینه سهپاتیفای</h2>
          </div>
          <div class="search-tags-row" style="display:flex; gap:8px; margin-bottom:18px;">
            <button class="btn-secondary active" id="search-tag-all" onclick="setSearchFilter('all', this)">همه</button>
            <button class="btn-secondary" onclick="setSearchFilter('tracks', this)">آهنگ‌ها</button>
            <button class="btn-secondary" onclick="setSearchFilter('artists', this)">هنرمندان</button>
            <button class="btn-secondary" onclick="setSearchFilter('playlists', this)">پلی‌لیست‌ها</button>
          </div>
          <div id="search-results-container"></div>
        </section>

        <!-- VIEW 4: LIBRARY -->
        <section class="view-panel" id="view-library">
          <div class="section-header">
            <h2 class="section-title">کالکشن‌ها و پلی‌لیست‌های من</h2>
          </div>
          <div class="grid-container" id="library-playlists-grid"></div>
        </section>

        <!-- VIEW 5: PLAYLISTS GRID -->
        <section class="view-panel" id="view-playlists">
          <div class="section-header">
            <h2 class="section-title">پلی‌لیست‌های اختصاصی سهپاتیفای</h2>
          </div>
          <div class="grid-container" id="playlists-grid"></div>
        </section>

        <!-- VIEW 6: PLAYLIST DETAIL (صفحه اختصاصی هر پلی‌لیست) -->
        <section class="view-panel" id="view-playlist">
          <div class="artist-header-box playlist-header-box">
            <div class="playlist-cover-lg">
              <img id="playlist-page-img" src="" alt="" />
            </div>
            <div class="artist-info-col">
              <span class="artist-verified-tag">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                پلی‌لیست اختصاصی و رسمی
              </span>
              <h1 class="artist-name-title" id="playlist-page-name">عنوان پلی‌لیست</h1>
              <p style="font-size:13px; color:var(--muted); max-width:620px; line-height:1.7;" id="playlist-page-desc"></p>
              <div class="artist-meta-txt">
                <span id="playlist-page-track-count">۰ قطعه صوتی</span>
                <span>•</span>
                <span>استودیو سهپاتیفای</span>
              </div>
              <div class="artist-actions-row">
                <button class="btn-brand" onclick="playAllPlaylistTracks()">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>پخش تمام قطعات</span>
                </button>
                <button class="btn-secondary" onclick="switchView('playlists')">
                  <span>بازگشت</span>
                </button>
              </div>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">قطعات این مجموعه</h2>
          </div>
          <div class="track-list" id="playlist-tracks-list"></div>
        </section>

        <!-- VIEW 7: ARTIST DETAIL (پروفایل اختصاصی هر هنرمند) -->
        <section class="view-panel" id="view-artist">
          <div class="artist-header-box">
            <div class="artist-avatar-lg">
              <img id="artist-page-img" src="" alt="" />
            </div>
            <div class="artist-info-col">
              <span class="artist-verified-tag" id="artist-page-badge">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                هنرمند رسمی و تاییدشده سهپاتیفای
              </span>
              <h1 class="artist-name-title" id="artist-page-name">نام هنرمند</h1>
              <p style="font-size:13px; color:var(--muted); max-width:620px; line-height:1.7;" id="artist-page-bio"></p>
              <div class="artist-meta-txt">
                <span id="artist-page-listeners">۰ شنونده ماهانه</span>
                <span>•</span>
                <span id="artist-page-genres" style="color:var(--brand); font-weight:700;">سبک‌های متنوع</span>
              </div>
              <div class="artist-actions-row">
                <button class="btn-brand" onclick="playAllArtistTracks()">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>پخش تمام آثار</span>
                </button>
                <button class="btn-secondary" id="btn-follow-artist" onclick="toggleFollowArtist()">
                  <span>دنبال کردن</span>
                </button>
              </div>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">تمام ترانه‌های این هنرمند</h2>
          </div>
          <div class="track-list" id="artist-tracks-list"></div>
        </section>

      </div>
    </main>

    <!-- مینی پلیر پایینی -->
    <div class="mini-player" id="mini-player">
      <div class="player-progress-bar-wrap" id="mini-progress-top">
        <div class="player-progress-fill" id="progress-top-fill"></div>
      </div>

      <div class="player-left-track">
        <div class="mini-player-art" onclick="toggleFullPlayer()">
          <img id="mini-art-img" src="" alt="Album Artwork" />
        </div>
        <div class="mini-track-meta">
          <span class="mini-track-title" id="mini-title" onclick="toggleFullPlayer()">عنوان ترانه</span>
          <span class="mini-track-artist" id="mini-artist">نام هنرمند</span>
        </div>
        <button class="fav-action-btn" id="mini-fav-btn" onclick="toggleFavoriteCurrent()" title="علاقه‌‌مندی">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </button>
      </div>

      <div class="player-center-controls">
        <div class="ctrl-buttons">
          <button class="ctrl-btn" id="ctrl-shuffle" onclick="toggleShuffle()" title="پخش تصادفی">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 3 21 3 21 8"></polyline><line x1="4" y1="20" x2="21" y2="3"></line><polyline points="21 16 21 21 16 21"></polyline><line x1="15" y1="15" x2="21" y2="21"></line><line x1="4" y1="4" x2="9" y2="9"></line></svg>
          </button>
          <button class="ctrl-btn" onclick="nextTrack()" title="بعدی">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
          </button>
          <button class="play-pause-btn" id="main-play-btn" onclick="togglePlay()" title="پخش / توقف">
            <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
          </button>
          <button class="ctrl-btn" onclick="prevTrack()" title="قبلی">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
          </button>
          <button class="ctrl-btn" id="ctrl-repeat" onclick="toggleRepeat()" title="تکرار">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </button>
        </div>

        <div class="time-tracker-row">
          <span class="time-val" id="mini-time-tot">0:00</span>
          <div class="interactive-slider-track" id="mini-scrub-track">
            <div class="slider-rail">
              <div class="slider-fill" id="mini-scrub-fill"></div>
            </div>
          </div>
          <span class="time-val" id="mini-time-cur">0:00</span>
        </div>
      </div>

      <div class="player-right-utils">
        <button class="ctrl-btn" onclick="toggleLyricsDrawer()" title="لیریکس">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
        </button>
        <button class="ctrl-btn" onclick="toggleQueueDrawer()" title="صف پخش">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
        </button>
        <button class="ctrl-btn" onclick="toggleFullPlayer()" title="تمام‌صفحه">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
        </button>
      </div>
    </div>

    <!-- پلیر تمام‌صفحه -->
    <div class="expanded-player-modal" id="full-player-modal">
      <div class="full-player-nav">
        <button class="action-circle-btn" onclick="toggleFullPlayer()" title="بستن">
          <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="full-meta-block" style="text-align:center;">
          <h2 style="font-size:15px; font-weight:800;" id="full-track-title">عنوان ترانه</h2>
          <span style="font-size:12px; color:var(--muted);" id="full-track-artist">نام هنرمند</span>
        </div>
        <button class="action-circle-btn" onclick="toggleFavoriteCurrent()">
          <span id="full-fav-top-btn" class="fav-action-btn">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
          </span>
        </button>
      </div>

      <div class="full-player-stage">
        <div class="full-panel-view active" id="full-view-now">
          <div class="full-cover-card">
            <img id="full-art-img" src="" alt="Album Cover" />
          </div>
        </div>
      </div>

      <div class="full-control-deck">
        <div class="time-tracker-row">
          <span class="time-val" id="full-time-tot">0:00</span>
          <div class="interactive-slider-track" id="full-scrub-track">
            <div class="slider-rail">
              <div class="slider-fill" id="full-scrub-fill"></div>
            </div>
          </div>
          <span class="time-val" id="full-time-cur">0:00</span>
        </div>

        <div class="full-primary-buttons">
          <button class="ctrl-btn" onclick="nextTrack()">
            <svg width="26" height="26" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
          </button>
          <button class="full-play-pause-btn" id="full-play-btn" onclick="togglePlay()">
            <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
          </button>
          <button class="ctrl-btn" onclick="prevTrack()">
            <svg width="26" height="26" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- دراور لیریکس و صف پخش -->
    <div class="side-drawer" id="lyrics-drawer">
      <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <h3 style="font-weight:800; font-size:16px;">متن همگام ترانه</h3>
        <button class="btn-secondary" onclick="toggleLyricsDrawer()">✕</button>
      </div>
      <div id="lyrics-container" style="flex:1; overflow-y:auto; display:flex; flex-direction:column; gap:16px;"></div>
    </div>

    <div class="side-drawer" id="queue-drawer">
      <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <h3 style="font-weight:800; font-size:16px;">صف در حال پخش</h3>
        <button class="btn-secondary" onclick="toggleQueueDrawer()">✕</button>
      </div>
      <div id="queue-container" style="flex:1; overflow-y:auto; display:flex; flex-direction:column; gap:8px;"></div>
    </div>

    <!-- منوی پایینی موبایل -->
    <nav class="mobile-bottom-nav">
      <div class="mobile-nav-btn active" id="mob-home" onclick="switchView('home')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span>خانه</span>
      </div>
      <div class="mobile-nav-btn" id="mob-discover" onclick="switchView('discover')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        <span>اکتشاف</span>
      </div>
      <div class="mobile-nav-btn" id="mob-playlists" onclick="switchView('playlists')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
        <span>پلی‌لیست‌ها</span>
      </div>
      <div class="mobile-nav-btn" id="mob-favorites" onclick="filterFavorites()">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        <span>موردعلاقه‌ها</span>
      </div>
      <div class="mobile-nav-btn" id="mob-library" onclick="switchView('library')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        <span>کتابخانه</span>
      </div>
    </nav>

    <div class="toast-container" id="toast-shelf"></div>
  </div>

  <script>
    let realPlayer = new Audio();

    let ALL_TRACKS = [];
    let PLAYLISTS_DB = [];
    let ARTISTS_DB = [];
    let GENRES_DB = [];

    let CURRENT_QUEUE = [];
    let currentQueueIndex = 0;

    let ACTIVE_PLAYLIST = null;
    let ACTIVE_ARTIST = null;

    let isPlaying = false;
    let currentSeconds = 0;
    let isShuffle = false;
    let repeatMode = 0;
    let isUserScrubbing = false;
    let currentSearchFilter = 'all';

    // ۱. واکشی داده‌های زنده با مقاومت در برابر خطای شبکه (Promise.allSettled)
    async function initAppData() {
      try {
        const results = await Promise.allSettled([
          fetch('/api/tracks'),
          fetch('/api/playlists'),
          fetch('/api/artists'),
          fetch('/api/genres')
        ]);

        if (results[0].status === 'fulfilled' && results[0].value.ok) {
          ALL_TRACKS = await results[0].value.json();
        }
        if (results[1].status === 'fulfilled' && results[1].value.ok) {
          PLAYLISTS_DB = await results[1].value.json();
        }
        if (results[2].status === 'fulfilled' && results[2].value.ok) {
          ARTISTS_DB = await results[2].value.json();
        }
        if (results[3].status === 'fulfilled' && results[3].value.ok) {
          GENRES_DB = await results[3].value.json();
        }

        renderAppViews();

        if (ALL_TRACKS.length > 0) {
          CURRENT_QUEUE = [...ALL_TRACKS];
          loadTrackFromQueue(0);
        }
        updateFavoriteBadges();
      } catch (err) {
        console.warn('خطا در بارگذاری اولیه داده‌ها');
      }
    }

    function renderAppViews() {
      // الف) پلی‌لیست‌های برگزیده در صفحه اصلی
      const homePlaylists = document.getElementById('home-playlists-grid');
      if (homePlaylists) {
        if (!PLAYLISTS_DB || PLAYLISTS_DB.length === 0) {
          homePlaylists.innerHTML = `<div style="grid-column: 1/-1; text-align:center; padding:24px; color:var(--muted); font-size:12.5px;">هنوز پلی‌لیستی ثبت نشده است. از پنل ادمین پلی‌لیست بسازید.</div>`;
        } else {
          homePlaylists.innerHTML = PLAYLISTS_DB.map(p => `
            <div class="music-card" onclick="openPlaylistPage(${p.id})">
              <div class="card-art-box">
                <img class="card-art-img" src="${p.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=300'}" alt="${escapeHtml(p.title)}" />
                <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
              </div>
              <div class="card-title">${escapeHtml(p.title)}</div>
              <div class="card-subtitle">${(p.tracks ? p.tracks.length : 0)} قطعه صوتی</div>
            </div>
          `).join('');
        }
      }

      // ب) صفحه اصلی - آهنگ‌های پیشنهادی
      const featured = document.getElementById('home-featured-grid');
      if (featured) {
        featured.innerHTML = ALL_TRACKS.slice(0, 6).map((t, idx) => `
          <div class="music-card" onclick="playFromTrackList(ALL_TRACKS, ${idx})">
            <div class="card-art-box">
              <img class="card-art-img" src="${t.cover || 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=300'}" alt="${escapeHtml(t.title)}" />
              <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
            </div>
            <div class="card-title">${escapeHtml(t.title)}</div>
            <div class="card-subtitle">${escapeHtml(t.artist)}</div>
          </div>
        `).join('');
      }

      // ج) صفحه اصلی - تمام قطعات
      renderTracksTableList(ALL_TRACKS, 'home-recent-tracks');

      // د) صفحه اصلی - هنرمندان
      const artistsGrid = document.getElementById('home-artists-grid');
      if (artistsGrid) {
        if (!ARTISTS_DB || ARTISTS_DB.length === 0) {
          artistsGrid.innerHTML = `<div style="grid-column: 1/-1; text-align:center; padding:24px; color:var(--muted); font-size:12.5px;">هنوز هنرمندی در سیستم ثبت نشده است.</div>`;
        } else {
          artistsGrid.innerHTML = ARTISTS_DB.map(a => `
            <div class="music-card artist-card" onclick="openArtistPage(${a.id})">
              <div class="card-art-box">
                <img class="card-art-img" src="${a.image || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300'}" alt="${escapeHtml(a.name)}" />
              </div>
              <div class="card-title">${escapeHtml(a.name)}</div>
              <div class="card-subtitle">${escapeHtml(a.genre_names || (a.listeners + ' شنونده'))}</div>
            </div>
          `).join('');
        }
      }

      // ه) تب پلی‌لیست‌ها و کتابخانه
      const playlistsGrid = document.getElementById('playlists-grid');
      const libraryGrid = document.getElementById('library-playlists-grid');
      const navCount = document.getElementById('nav-playlists-count');
      if (navCount) navCount.textContent = PLAYLISTS_DB.length;

      const playlistsHtml = PLAYLISTS_DB.length > 0 
        ? PLAYLISTS_DB.map(p => `
          <div class="music-card" onclick="openPlaylistPage(${p.id})">
            <div class="card-art-box">
              <img class="card-art-img" src="${p.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=300'}" alt="${escapeHtml(p.title)}" />
              <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
            </div>
            <div class="card-title">${escapeHtml(p.title)}</div>
            <div class="card-subtitle">${(p.tracks ? p.tracks.length : 0)} قطعه صوتی</div>
          </div>
        `).join('')
        : `<div style="grid-column: 1/-1; text-align:center; padding:30px; color:var(--muted);">پلی‌لیستی برای نمایش وجود ندارد.</div>`;

      if (playlistsGrid) playlistsGrid.innerHTML = playlistsHtml;
      if (libraryGrid) libraryGrid.innerHTML = playlistsHtml;

      // و) سبک‌ها در تب اکتشاف
      const discGrid = document.getElementById('discover-genres-grid');
      if (discGrid) {
        discGrid.innerHTML = GENRES_DB.map(g => `
          <div class="music-card" onclick="filterByGenreName('${escapeHtml(g.name)}')">
            <div class="card-art-box" style="background:linear-gradient(135deg, #10B954 0%, #083b1c 100%); display:flex; align-items:center; justify-content:center;">
              <svg width="40" height="40" stroke="#FFFFFF" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            </div>
            <div class="card-title">${escapeHtml(g.name)}</div>
            <div class="card-subtitle">مرور آثار این سبک</div>
          </div>
        `).join('');
      }
    }

    function renderTracksTableList(tracks, containerId, customOnClick = null) {
      const container = document.getElementById(containerId);
      if (!container) return;

      if (!tracks || tracks.length === 0) {
        container.innerHTML = `<div style="text-align:center; padding:32px; color:var(--muted); font-size:13px;">قطعه‌ای در این بخش یافت نشد.</div>`;
        return;
      }

      container.innerHTML = tracks.map((t, idx) => {
        const isCurrentPlaying = (CURRENT_QUEUE[currentQueueIndex]?.id === t.id && isPlaying);
        const clickHandler = customOnClick ? `${customOnClick}(${idx})` : `playFromTrackList(ALL_TRACKS, ${idx})`;

        return `
          <div class="track-row ${isCurrentPlaying ? 'playing' : ''}" onclick="${clickHandler}">
            <div class="track-num">${idx + 1}</div>
            <div class="equalizer-wave">
              <div class="eq-bar"></div>
              <div class="eq-bar"></div>
              <div class="eq-bar"></div>
            </div>
            <div class="track-thumb">
              <img src="${t.cover || 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=100'}" alt="${escapeHtml(t.title)}" />
            </div>
            <div class="track-meta">
              <div class="track-name">${escapeHtml(t.title)}</div>
              <div class="track-artist">${escapeHtml(t.artist)}</div>
            </div>
            <div class="track-album">${escapeHtml(t.album || t.title)}</div>
            <div class="track-duration">${t.duration || '03:30'}</div>
            <button class="fav-action-btn ${t.favorited ? 'favorited' : ''}" onclick="event.stopPropagation(); toggleFavTrackById(${t.id});" title="علاقه‌مندی">
              <svg width="18" height="18" fill="${t.favorited ? 'var(--brand)' : 'none'}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </button>
          </div>
        `;
      }).join('');
    }

    // ۲. باز کردن صفحه اختصاصی پلی‌لیست با مقاومت در برابر خطای مسیر
    async function openPlaylistPage(playlistId) {
      try {
        let playlist = null;

        try {
          const res = await fetch(`/api/playlists/${playlistId}`);
          if (res.ok) playlist = await res.json();
        } catch (e) {}

        if (!playlist) {
          playlist = PLAYLISTS_DB.find(p => p.id == playlistId);
        }

        if (!playlist) {
          showToast('پلی‌لیست مورد نظر یافت نشد.');
          return;
        }

        ACTIVE_PLAYLIST = playlist;

        document.getElementById('playlist-page-name').textContent = playlist.title;
        document.getElementById('playlist-page-desc').textContent = playlist.desc || 'کالکشن اختصاصی استودیو سهپاتیفای';
        document.getElementById('playlist-page-img').src = playlist.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500';
        
        const count = playlist.tracks ? playlist.tracks.length : 0;
        document.getElementById('playlist-page-track-count').textContent = `${count} قطعه صوتی`;

        renderTracksTableList(playlist.tracks || [], 'playlist-tracks-list', 'playTrackInPlaylist');
        switchView('playlist');
      } catch (err) {
        showToast('خطا در باز کردن پلی‌لیست');
      }
    }

    function playAllPlaylistTracks() {
      if (!ACTIVE_PLAYLIST || !ACTIVE_PLAYLIST.tracks || ACTIVE_PLAYLIST.tracks.length === 0) {
        showToast('هنوز قطعه‌ای در این پلی‌لیست قرار نگرفته است.');
        return;
      }
      CURRENT_QUEUE = [...ACTIVE_PLAYLIST.tracks];
      currentQueueIndex = 0;
      playCurrentQueue();
      showToast(`پخش پلی‌‌لیست «${ACTIVE_PLAYLIST.title}» آغاز شد ✓`);
    }

    function playTrackInPlaylist(idx) {
      if (!ACTIVE_PLAYLIST || !ACTIVE_PLAYLIST.tracks) return;
      CURRENT_QUEUE = [...ACTIVE_PLAYLIST.tracks];
      currentQueueIndex = idx;
      playCurrentQueue();
    }

    // ۳. باز کردن صفحه اختصاصی هنرمند با مقاومت در برابر خطای مسیر
    async function openArtistPage(artistId) {
      try {
        let artist = null;

        try {
          const res = await fetch(`/api/artists/${artistId}`);
          if (res.ok) artist = await res.json();
        } catch (e) {}

        if (!artist) {
          artist = ARTISTS_DB.find(a => a.id == artistId);
        }

        if (!artist) {
          showToast('هنرمند مورد نظر یافت نشد.');
          return;
        }

        ACTIVE_ARTIST = artist;

        // اگر لیست آهنگ‌ها همراه با مدل نبود، آهنگ‌هایش را از لیست کل ترانه‌ها استخراج می‌کنیم
        if (!artist.tracks || artist.tracks.length === 0) {
          artist.tracks = ALL_TRACKS.filter(t => t.artist_id == artist.id || t.artist === artist.name);
        }

        document.getElementById('artist-page-name').textContent = artist.name;
        document.getElementById('artist-page-img').src = artist.image || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500';
        document.getElementById('artist-page-bio').textContent = artist.bio || 'هنرمند محبوب و رسمی پلتفرم سهپاتیفای';
        document.getElementById('artist-page-listeners').textContent = `${artist.listeners || '۰'} شنونده ماهانه`;
        document.getElementById('artist-page-genres').textContent = artist.genre_names || 'سبک‌های متنوع';

        const badge = document.getElementById('artist-page-badge');
        if (badge) badge.style.display = artist.verified ? 'inline-flex' : 'none';

        renderTracksTableList(artist.tracks || [], 'artist-tracks-list', 'playTrackInArtist');
        switchView('artist');
      } catch (err) {
        showToast('خطا در بارگذاری اطلاعات هنرمند');
      }
    }

    function playAllArtistTracks() {
      if (!ACTIVE_ARTIST || !ACTIVE_ARTIST.tracks || ACTIVE_ARTIST.tracks.length === 0) {
        showToast('هنوز قطعه‌ای برای این هنرمند ثبت نشده است.');
        return;
      }
      CURRENT_QUEUE = [...ACTIVE_ARTIST.tracks];
      currentQueueIndex = 0;
      playCurrentQueue();
      showToast(`پخش تمام آثار «${ACTIVE_ARTIST.name}» آغاز شد ✓`);
    }

    function playTrackInArtist(idx) {
      if (!ACTIVE_ARTIST || !ACTIVE_ARTIST.tracks) return;
      CURRENT_QUEUE = [...ACTIVE_ARTIST.tracks];
      currentQueueIndex = idx;
      playCurrentQueue();
    }

    // ۴. موتور پخش صوت و صف‌بندی (Sequential Playback)
    function playFromTrackList(list, idx) {
      CURRENT_QUEUE = [...list];
      currentQueueIndex = idx;
      playCurrentQueue();
    }

    function playDefaultQueue() {
      if (ALL_TRACKS.length > 0) {
        CURRENT_QUEUE = [...ALL_TRACKS];
        currentQueueIndex = 0;
        playCurrentQueue();
      }
    }

    function loadTrackFromQueue(index) {
      if (!CURRENT_QUEUE || CURRENT_QUEUE.length === 0) return;
      currentQueueIndex = (index + CURRENT_QUEUE.length) % CURRENT_QUEUE.length;
      const track = CURRENT_QUEUE[currentQueueIndex];
      if (!track) return;

      currentSeconds = 0;
      const coverUrl = track.cover || 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500';

      document.getElementById('mini-art-img').src = coverUrl;
      document.getElementById('mini-title').textContent = track.title;
      document.getElementById('mini-artist').textContent = track.artist;
      document.getElementById('mini-time-tot').textContent = track.duration || '03:30';
      document.getElementById('mini-time-cur').textContent = "0:00";

      document.getElementById('full-art-img').src = coverUrl;
      document.getElementById('full-track-title').textContent = track.title;
      document.getElementById('full-track-artist').textContent = track.artist;
      document.getElementById('full-time-tot').textContent = track.duration || '03:30';
      document.getElementById('full-time-cur').textContent = "0:00";

      updateScrubbers(0);
      updateFavoriteButtons(!!track.favorited);
      renderLyrics(track);
      renderQueueDrawer();
      highlightActiveRows();
    }

    function playCurrentQueue() {
      loadTrackFromQueue(currentQueueIndex);
      const track = CURRENT_QUEUE[currentQueueIndex];
      if (!track) return;

      const audioUrl = track.stream_url || (track.audio_path ? `/api/tracks/${track.id}/stream` : null);

      if (!audioUrl) {
        showToast('فایل صوتی این قطعه هنوز آپلود نشده است.');
        pauseTrack();
        return;
      }

      if (realPlayer.src !== audioUrl) {
        realPlayer.src = audioUrl;
      }

      realPlayer.play().then(() => {
        isPlaying = true;
        updatePlayIcons(true);
        highlightActiveRows();
        showToast(`در حال پخش: ${track.title}`);
      }).catch(() => {
        pauseTrack();
      });
    }

    function togglePlay() {
      if (isPlaying) {
        pauseTrack();
      } else {
        if (CURRENT_QUEUE.length > 0) {
          playCurrentQueue();
        }
      }
    }

    function pauseTrack() {
      isPlaying = false;
      realPlayer.pause();
      updatePlayIcons(false);
      highlightActiveRows();
    }

    realPlayer.onended = () => {
      nextTrack();
    };

    function nextTrack() {
      if (!CURRENT_QUEUE || CURRENT_QUEUE.length === 0) return;

      if (repeatMode === 2) {
        seekToSeconds(0);
        playCurrentQueue();
        return;
      }

      let nextIdx = isShuffle 
        ? Math.floor(Math.random() * CURRENT_QUEUE.length) 
        : currentQueueIndex + 1;

      if (nextIdx >= CURRENT_QUEUE.length) {
        if (repeatMode === 1) {
          nextIdx = 0;
        } else {
          pauseTrack();
          seekToSeconds(0);
          return;
        }
      }

      currentQueueIndex = nextIdx;
      playCurrentQueue();
    }

    function prevTrack() {
      if (!CURRENT_QUEUE || CURRENT_QUEUE.length === 0) return;
      if (currentSeconds > 3) {
        seekToSeconds(0);
      } else {
        currentQueueIndex = (currentQueueIndex - 1 + CURRENT_QUEUE.length) % CURRENT_QUEUE.length;
        playCurrentQueue();
      }
    }

    realPlayer.ontimeupdate = () => {
      if (isUserScrubbing) return;
      currentSeconds = Math.floor(realPlayer.currentTime);
      const track = CURRENT_QUEUE[currentQueueIndex];
      const total = track ? (track.duration_sec || 210) : 210;

      updateScrubbers((currentSeconds / total) * 100);
      document.getElementById('mini-time-cur').textContent = formatSeconds(currentSeconds);
      document.getElementById('full-time-cur').textContent = formatSeconds(currentSeconds);
      syncLyricsHighlight(currentSeconds);
    };

    function seekToSeconds(sec) {
      if (realPlayer.src) {
        realPlayer.currentTime = sec;
      }
    }

    function updateScrubbers(pct) {
      const p = Math.max(0, Math.min(100, pct)) + '%';
      const m = document.getElementById('mini-scrub-fill');
      const f = document.getElementById('full-scrub-fill');
      const t = document.getElementById('progress-top-fill');
      if (m) m.style.width = p;
      if (f) f.style.width = p;
      if (t) t.style.width = p;
    }

    function highlightActiveRows() {
      const currentTrack = CURRENT_QUEUE[currentQueueIndex];
      document.querySelectorAll('.track-row').forEach(row => {
        const title = row.querySelector('.track-name')?.textContent;
        const isMatch = (currentTrack && title === currentTrack.title && isPlaying);
        row.classList.toggle('playing', isMatch);
      });
    }

    function updatePlayIcons(playing) {
      const playSvg = `<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>`;
      const pauseSvg = `<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
      const m = document.getElementById('main-play-btn');
      const f = document.getElementById('full-play-btn');
      if (m) m.innerHTML = playing ? pauseSvg : playSvg;
      if (f) f.innerHTML = playing ? pauseSvg : playSvg;
    }

    function renderLyrics(track) {
      const container = document.getElementById('lyrics-container');
      if (!container) return;

      if (!track || !track.lyrics || track.lyrics.length === 0) {
        container.innerHTML = `<div style="text-align:center; color:var(--muted); padding:40px 0;">فاقد متن همگام ترانه</div>`;
        return;
      }

      container.innerHTML = track.lyrics.map((l, i) => `
        <div class="lyrics-line ${i === 0 ? 'active' : ''}" data-time="${l.time}" onclick="seekToSeconds(${l.time})">
          <div style="font-size:16px; font-weight:700; color:var(--text);">${escapeHtml(l.fa)}</div>
          ${l.en ? `<div style="font-size:12px; color:var(--muted); direction:ltr; text-align:right;">${escapeHtml(l.en)}</div>` : ''}
        </div>
      `).join('');
    }

    function syncLyricsHighlight(sec) {
      document.querySelectorAll('.lyrics-line').forEach(line => {
        const t = parseFloat(line.getAttribute('data-time') || '0');
        if (sec >= t) {
          document.querySelectorAll('.lyrics-line').forEach(l => l.classList.remove('active'));
          line.classList.add('active');
        }
      });
    }

    function renderQueueDrawer() {
      const container = document.getElementById('queue-container');
      if (!container) return;

      container.innerHTML = CURRENT_QUEUE.map((t, idx) => `
        <div class="queue-item" onclick="playFromTrackList(CURRENT_QUEUE, ${idx})" style="display:flex; align-items:center; gap:10px; padding:8px; border-radius:6px; background:rgba(255,255,255,0.02); cursor:pointer;">
          <img src="${t.cover || ''}" style="width:36px; height:36px; border-radius:6px; object-fit:cover;" />
          <div style="flex:1; overflow:hidden;">
            <div style="font-weight:700; font-size:12.5px; ${idx === currentQueueIndex ? 'color:var(--brand);' : ''}">${escapeHtml(t.title)}</div>
            <div style="font-size:11px; color:var(--muted);">${escapeHtml(t.artist)}</div>
          </div>
        </div>
      `).join('');
    }

    async function toggleFavTrackById(trackId) {
      const track = ALL_TRACKS.find(t => t.id === trackId);
      if (!track) return;

      track.favorited = !track.favorited;

      if (CURRENT_QUEUE[currentQueueIndex]?.id === trackId) {
        updateFavoriteButtons(track.favorited);
      }
      updateFavoriteBadges();
      renderAppViews();

      if (ACTIVE_PLAYLIST) renderTracksTableList(ACTIVE_PLAYLIST.tracks || [], 'playlist-tracks-list', 'playTrackInPlaylist');
      if (ACTIVE_ARTIST) renderTracksTableList(ACTIVE_ARTIST.tracks || [], 'artist-tracks-list', 'playTrackInArtist');

      try {
        await fetch(`/api/tracks/${trackId}/favorite`, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
          }
        });
      } catch (e) {}
    }

    function toggleFavoriteCurrent() {
      const track = CURRENT_QUEUE[currentQueueIndex];
      if (track) toggleFavTrackById(track.id);
    }

    function updateFavoriteButtons(isFav) {
      const activeSvg = `<svg width="18" height="18" fill="var(--brand)" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>`;
      const inactiveSvg = `<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>`;
      const m = document.getElementById('mini-fav-btn');
      const f = document.getElementById('full-fav-top-btn');
      if (m) m.innerHTML = isFav ? activeSvg : inactiveSvg;
      if (f) f.innerHTML = isFav ? activeSvg : inactiveSvg;
    }

    function updateFavoriteBadges() {
      const count = ALL_TRACKS.filter(t => t.favorited).length;
      document.getElementById('fav-count').textContent = count;
    }

    function filterFavorites() {
      switchView('search');
      document.getElementById('global-search-input').value = "";
      const favs = ALL_TRACKS.filter(t => t.favorited);
      const container = document.getElementById('search-results-container');
      container.innerHTML = `<h3 style="margin-bottom:12px; font-weight:800;">ترانه‌های موردعلاقه من (${favs.length})</h3><div class="track-list" id="fav-tracks-list"></div>`;
      renderTracksTableList(favs, 'fav-tracks-list');
    }

    function handleSearchInput(query) {
      if (query.trim().length > 0) switchView('search');
      const q = (query || '').toLowerCase().trim();
      const container = document.getElementById('search-results-container');
      if (!container) return;

      const filteredTracks = ALL_TRACKS.filter(t => 
        (t.title && t.title.toLowerCase().includes(q)) || 
        (t.artist && t.artist.toLowerCase().includes(q)) ||
        (t.album && t.album.toLowerCase().includes(q))
      );

      const filteredArtists = ARTISTS_DB.filter(a => 
        (a.name && a.name.toLowerCase().includes(q)) || 
        (a.genre_names && a.genre_names.toLowerCase().includes(q))
      );

      const filteredPlaylists = PLAYLISTS_DB.filter(p => 
        (p.title && p.title.toLowerCase().includes(q)) || 
        (p.desc && p.desc.toLowerCase().includes(q))
      );

      let html = '';

      if ((currentSearchFilter === 'all' || currentSearchFilter === 'tracks') && filteredTracks.length > 0) {
        html += `<h3 style="margin:16px 0 10px; font-weight:800;">قطعات منطبق (${filteredTracks.length})</h3><div class="track-list" id="search-tracks-list"></div>`;
      }

      if ((currentSearchFilter === 'all' || currentSearchFilter === 'artists') && filteredArtists.length > 0) {
        html += `<h3 style="margin:20px 0 10px; font-weight:800;">هنرمندان (${filteredArtists.length})</h3><div class="grid-container" id="search-artists-grid"></div>`;
      }

      if ((currentSearchFilter === 'all' || currentSearchFilter === 'playlists') && filteredPlaylists.length > 0) {
        html += `<h3 style="margin:20px 0 10px; font-weight:800;">پلی‌لیست‌ها (${filteredPlaylists.length})</h3><div class="grid-container" id="search-playlists-grid"></div>`;
      }

      if (!html) {
        container.innerHTML = `<div style="text-align:center; padding:40px; color:var(--muted);">موردی منطبق با «${escapeHtml(query)}» یافت نشد.</div>`;
        return;
      }

      container.innerHTML = html;

      if (filteredTracks.length > 0 && document.getElementById('search-tracks-list')) {
        renderTracksTableList(filteredTracks, 'search-tracks-list');
      }

      if (filteredArtists.length > 0 && document.getElementById('search-artists-grid')) {
        document.getElementById('search-artists-grid').innerHTML = filteredArtists.map(a => `
          <div class="music-card artist-card" onclick="openArtistPage(${a.id})">
            <div class="card-art-box"><img class="card-art-img" src="${a.image || ''}" /></div>
            <div class="card-title">${escapeHtml(a.name)}</div>
            <div class="card-subtitle">${escapeHtml(a.genre_names || '')}</div>
          </div>
        `).join('');
      }

      if (filteredPlaylists.length > 0 && document.getElementById('search-playlists-grid')) {
        document.getElementById('search-playlists-grid').innerHTML = filteredPlaylists.map(p => `
          <div class="music-card" onclick="openPlaylistPage(${p.id})">
            <div class="card-art-box"><img class="card-art-img" src="${p.cover || ''}" /></div>
            <div class="card-title">${escapeHtml(p.title)}</div>
            <div class="card-subtitle">${(p.tracks ? p.tracks.length : 0)} قطعه</div>
          </div>
        `).join('');
      }
    }

    function setSearchFilter(filter, btn) {
      currentSearchFilter = filter;
      document.querySelectorAll('.search-tags-row button').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      handleSearchInput(document.getElementById('global-search-input').value);
    }

    function filterByGenreName(genreName) {
      switchView('search');
      document.getElementById('global-search-input').value = genreName;
      handleSearchInput(genreName);
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

    function switchView(viewId) {
      document.querySelectorAll('.view-panel').forEach(p => p.classList.remove('active'));
      document.querySelectorAll('.nav-link').forEach(n => n.classList.remove('active'));
      document.querySelectorAll('.mobile-nav-btn').forEach(m => m.classList.remove('active'));

      const target = document.getElementById(`view-${viewId}`);
      if (target) target.classList.add('active');

      document.getElementById(`nav-${viewId}`)?.classList.add('active');
      document.getElementById(`mob-${viewId}`)?.classList.add('active');
      document.getElementById('viewport').scrollTo({ top: 0, behavior: 'smooth' });
    }

    function toggleFullPlayer() { document.getElementById('full-player-modal').classList.toggle('active'); }
    function toggleLyricsDrawer() { document.getElementById('lyrics-drawer').classList.toggle('open'); }
    function toggleQueueDrawer() { document.getElementById('queue-drawer').classList.toggle('open'); }

    function toggleShuffle() {
      isShuffle = !isShuffle;
      document.getElementById('ctrl-shuffle')?.classList.toggle('active', isShuffle);
      showToast(isShuffle ? 'پخش تصادفی فعال شد' : 'پخش عادی فعال شد');
    }

    function toggleRepeat() {
      repeatMode = (repeatMode + 1) % 3;
      showToast(repeatMode === 1 ? 'تکرار کل لیست فعال شد' : repeatMode === 2 ? 'تکرار همین ترانه فعال شد' : 'حالت تکرار خاموش شد');
    }

    function formatSeconds(s) {
      const m = Math.floor(s / 60);
      const sec = s % 60;
      return `${m}:${sec < 10 ? '0' : ''}${sec}`;
    }

    function escapeHtml(str) { return (str || '').replace(/"/g, '&quot;').replace(/'/g, '&#39;'); }

    function showToast(msg) {
      const shelf = document.getElementById('toast-shelf');
      if (!shelf) return;
      const t = document.createElement('div');
      t.className = 'toast-msg';
      t.textContent = msg;
      shelf.appendChild(t);
      setTimeout(() => t.remove(), 2800);
    }

    function initSliders() {
      const bind = (elem, cb) => {
        if (!elem) return;
        elem.onclick = (e) => {
          const rect = elem.getBoundingClientRect();
          const frac = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
          cb(frac);
        };
      };

      bind(document.getElementById('mini-scrub-track'), frac => {
        const track = CURRENT_QUEUE[currentQueueIndex];
        seekToSeconds(frac * (track ? (track.duration_sec || 210) : 210));
      });
      bind(document.getElementById('full-scrub-track'), frac => {
        const track = CURRENT_QUEUE[currentQueueIndex];
        seekToSeconds(frac * (track ? (track.duration_sec || 210) : 210));
      });
      bind(document.getElementById('mini-progress-top'), frac => {
        const track = CURRENT_QUEUE[currentQueueIndex];
        seekToSeconds(frac * (track ? (track.duration_sec || 210) : 210));
      });
    }

    window.addEventListener('DOMContentLoaded', () => {
      initSliders();
      initAppData();
    });
  </script>
</body>
</html>