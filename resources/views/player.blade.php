<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
  <title>سهپاتیفای | Sehpatify — ریتم، درون تو زنده است</title>
  <meta name="theme-color" content="#07070C" />
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
      --brand-glow-lg: rgba(16, 185, 84, 0.25);
      --brand-dim: rgba(16, 185, 84, 0.12);
      --brand-hover: #15d261;
      --brand-active: #0d9643;

      --bg: #07070C;
      --surface: #0E0E17;
      --surface-card: rgba(22, 22, 34, 0.65);
      --surface-elevated: rgba(30, 30, 46, 0.75);
      --surface-glass: rgba(14, 14, 23, 0.78);
      --surface-glass-heavy: rgba(10, 10, 16, 0.92);

      --text: #F8F8FA;
      --muted: #9E9EB0;
      --muted-dark: #66667A;
      --border: rgba(255, 255, 255, 0.08);
      --border-light: rgba(255, 255, 255, 0.14);
      --border-brand: rgba(16, 185, 84, 0.45);

      --sidebar-w: 260px;
      --topbar-h: 70px;
      --mini-player-h: 84px;
      --mobile-nav-h: 64px;

      --radius-sm: 10px;
      --radius-md: 16px;
      --radius-lg: 24px;
      --radius-full: 9999px;
      --shadow-sm: 0 4px 16px rgba(0, 0, 0, 0.35);
      --shadow-md: 0 10px 30px rgba(0, 0, 0, 0.55);
      --shadow-lg: 0 20px 50px rgba(0, 0, 0, 0.75);
      --transition-fast: 0.16s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-normal: 0.28s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-spring: 0.46s cubic-bezier(0.16, 1, 0.3, 1);
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
      background: rgba(255, 255, 255, 0.16);
      border-radius: var(--radius-full);
    }
    ::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    #app {
      display: flex;
      width: 100vw;
      height: 100vh;
      height: 100dvh;
      overflow: hidden;
      position: relative;
      background: radial-gradient(ellipse at 50% 0%, rgba(16, 185, 84, 0.08) 0%, transparent 60%), var(--bg);
    }

    /* سایدبار ناوبری دسکتاپ */
    .sidebar {
      width: var(--sidebar-w);
      height: 100%;
      background: var(--surface-glass);
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
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
      background: linear-gradient(135deg, rgba(16, 185, 84, 0.22), rgba(18, 18, 28, 0.95));
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
      gap: 4px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 14px;
      border-radius: var(--radius-md);
      color: var(--muted);
      font-weight: 500;
      font-size: 13.5px;
      cursor: pointer;
      transition: all var(--transition-fast);
      position: relative;
      text-decoration: none;
      min-height: 44px;
    }

    .nav-link:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.05);
    }

    .nav-link.active {
      color: var(--text);
      background: linear-gradient(90deg, rgba(16, 185, 84, 0.18) 0%, rgba(16, 185, 84, 0.04) 100%);
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

    .main-wrapper {
      flex: 1;
      height: 100%;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      position: relative;
    }

    /* نوار بالای استاندارد */
    .topbar {
      height: var(--topbar-h);
      padding: 0 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
      background: var(--surface-glass);
      backdrop-filter: blur(28px);
      -webkit-backdrop-filter: blur(28px);
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
      max-width: 440px;
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
      background: rgba(255, 255, 255, 0.09);
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
      gap: 12px;
    }

    /* دکمه پروفایل متقارن با آیکون پیش‌فرض آدمک هماهنگ با تم سایت */
    .user-pill-badge {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.12);
      box-shadow: var(--shadow-sm);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      padding: 0;
      flex-shrink: 0;
      transition: all var(--transition-fast);
    }

    .user-pill-badge:hover {
      background: rgba(255, 255, 255, 0.12);
      border-color: var(--border-brand);
      transform: scale(1.05);
    }

    .user-avatar-dot {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: linear-gradient(135deg, rgba(30, 30, 46, 0.95) 0%, rgba(18, 18, 28, 0.95) 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #A6A6BA;
      flex-shrink: 0;
      transition: all var(--transition-fast);
    }

    .user-pill-badge:hover .user-avatar-dot {
      color: var(--brand);
      background: rgba(16, 185, 84, 0.16);
    }

    .user-avatar-dot svg {
      width: 18px;
      height: 18px;
    }

    .user-pill-name {
      display: none;
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
      backdrop-filter: blur(16px);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 12px;
      display: flex;
      flex-direction: column;
      position: relative;
      transition: all var(--transition-normal);
      cursor: pointer;
      box-shadow: var(--shadow-sm);
    }

    .music-card:hover {
      background: var(--surface-elevated);
      border-color: var(--border-brand);
      transform: translateY(-4px);
      box-shadow: var(--shadow-md), 0 0 16px var(--brand-glow-lg);
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
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
      margin-bottom: 3px;
    }

    .card-subtitle {
      font-size: 12px;
      color: var(--muted);
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
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
      gap: 6px;
    }

    .track-row {
      display: grid;
      grid-template-columns: 32px 46px 1fr 140px 75px 115px;
      align-items: center;
      gap: 12px;
      padding: 8px 14px;
      border-radius: var(--radius-sm);
      transition: all var(--transition-fast);
      cursor: pointer;
      min-height: 56px;
      border: 1px solid transparent;
    }

    .track-row:hover {
      background: rgba(255, 255, 255, 0.05);
      border-color: rgba(255, 255, 255, 0.06);
    }

    .track-row.playing {
      background: rgba(16, 185, 84, 0.1);
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
      border-radius: 8px;
      overflow: hidden;
      background: #20202d;
      flex-shrink: 0;
      border: 1px solid var(--border);
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
      overflow: hidden;
    }

    .track-name {
      font-size: 13.5px;
      font-weight: 600;
      color: var(--text);
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
      line-height: 1.4;
    }

    .track-row.playing .track-name {
      color: var(--brand);
    }

    .track-artist {
      font-size: 11.5px;
      color: var(--muted);
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
      line-height: 1.4;
    }

    .track-album {
      font-size: 12.5px;
      color: var(--muted);
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
    }

    .track-duration {
      font-size: 12px;
      color: var(--muted);
      direction: ltr;
      text-align: right;
      font-weight: 500;
    }

    .track-actions-cell {
      display: flex;
      align-items: center;
      gap: 4px;
      justify-content: flex-end;
    }

    .action-icon-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      border: none;
      background: transparent;
      color: var(--muted);
      cursor: pointer;
      transition: all var(--transition-fast);
      flex-shrink: 0;
    }

    .action-icon-btn:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.08);
    }

    .action-icon-btn.favorited {
      color: var(--brand) !important;
    }

    /* هدر بازطراحی‌شده صفحات اختصاصی پلی‌لیست، خواننده و موردعلاقه‌ها */
    .artist-header-box {
      display: flex;
      align-items: flex-end;
      text-align: right;
      justify-content: flex-start;
      gap: 28px;
      padding: 30px;
      background: linear-gradient(135deg, rgba(25, 25, 38, 0.8) 0%, rgba(12, 12, 20, 0.95) 100%);
      backdrop-filter: blur(28px);
      -webkit-backdrop-filter: blur(28px);
      border: 1px solid var(--border-light);
      border-radius: var(--radius-lg);
      margin-bottom: 28px;
      position: relative;
      overflow: hidden;
      box-shadow: var(--shadow-md);
    }

    .artist-avatar-lg, .playlist-cover-lg {
      width: 180px;
      height: 180px;
      flex-shrink: 0;
      overflow: hidden;
      position: relative;
      box-shadow: var(--shadow-lg), 0 0 30px rgba(0, 0, 0, 0.5);
    }

    .artist-avatar-lg {
      border-radius: 50%;
      border: 2px solid var(--border-brand);
    }

    .playlist-cover-lg {
      border-radius: var(--radius-md);
      border: 1px solid var(--border-light);
    }

    .artist-avatar-lg img, .playlist-cover-lg img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .artist-info-col {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      text-align: right;
      gap: 10px;
      min-width: 0;
      flex: 1;
      justify-content: flex-end;
    }

    .artist-verified-tag {
      font-size: 11.5px;
      font-weight: 700;
      color: var(--brand);
      background: var(--brand-dim);
      border: 1px solid var(--border-brand);
      padding: 4px 12px;
      border-radius: var(--radius-full);
      display: inline-flex;
      align-items: center;
      gap: 6px;
      width: fit-content;
    }

    .artist-name-title {
      font-size: clamp(24px, 3.2vw, 36px);
      font-weight: 900;
      line-height: 1.3;
      color: #FFFFFF;
      text-align: right;
      word-break: break-word;
      margin: 2px 0;
    }

    .artist-header-desc {
      font-size: 13px;
      color: var(--muted);
      line-height: 1.7;
      max-width: 680px;
      text-align: right;
      word-break: break-word;
    }

    .artist-meta-txt {
      display: flex;
      align-items: center;
      gap: 10px;
      color: var(--muted);
      font-size: 12.5px;
      text-align: right;
      font-weight: 500;
    }

    .artist-meta-txt .meta-bullet {
      color: var(--muted-dark);
      font-size: 14px;
    }

    .artist-actions-row {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-top: 6px;
      justify-content: flex-start;
      flex-wrap: wrap;
    }

    /* مینی پلیر پایینی شناور */
    .mini-player {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: var(--mini-player-h);
      background: var(--surface-glass);
      backdrop-filter: blur(32px);
      -webkit-backdrop-filter: blur(32px);
      border-top: 1px solid var(--border);
      z-index: 50;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 24px;
      transition: all var(--transition-normal);
      cursor: pointer;
    }

    .player-progress-bar-wrap {
      position: absolute;
      top: -3px;
      left: 0;
      right: 0;
      height: 5px;
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
      width: 280px;
    }

    .mini-player-art {
      width: 50px;
      height: 50px;
      border-radius: var(--radius-sm);
      overflow: hidden;
      flex-shrink: 0;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--border);
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
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
    }

    .mini-track-artist {
      font-size: 11.5px;
      color: var(--muted);
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
    }

    .player-center-controls {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      flex: 1;
      max-width: 540px;
      padding: 4px 0;
    }

    .ctrl-buttons {
      display: flex;
      direction: ltr !important;
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
      width: 36px;
      height: 36px;
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
      box-shadow: 0 0 16px var(--brand-glow);
      transition: all var(--transition-bounce);
    }

    .play-pause-btn:hover {
      transform: scale(1.06);
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
      direction: ltr !important;
    }

    .interactive-slider-track {
      position: relative;
      height: 20px;
      display: flex;
      align-items: center;
      cursor: pointer;
      direction: ltr !important;
      flex: 1;
    }

    .slider-rail {
      position: relative;
      width: 100%;
      height: 4px;
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
      gap: 10px;
      width: 280px;
      justify-content: flex-end;
    }

    .expanded-player-modal {
      position: fixed;
      inset: 0;
      height: 100vh;
      height: 100dvh;
      background: #08080E;
      z-index: 100;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow: hidden;
      padding: env(safe-area-inset-top, 12px) 0 env(safe-area-inset-bottom, 12px);
      transform: translateY(100%) scale(0.95);
      opacity: 0;
      pointer-events: none;
      transition: transform var(--transition-spring), opacity 0.3s ease;
    }

    .expanded-player-modal.active {
      transform: translateY(0) scale(1);
      opacity: 1;
      pointer-events: auto;
    }

    .full-player-bg-aura {
      position: absolute;
      inset: -40px;
      background-size: cover;
      background-position: center;
      filter: blur(80px);
      opacity: 0.28;
      z-index: 1;
      pointer-events: none;
      transition: background-image 0.6s ease;
    }

    .sheet-grabber-bar {
      width: 38px;
      height: 4.5px;
      background: rgba(255, 255, 255, 0.28);
      border-radius: var(--radius-full);
      margin: 8px auto 4px;
      cursor: pointer;
      z-index: 5;
      flex-shrink: 0;
    }

    .full-player-nav {
      position: relative;
      z-index: 5;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 8px 24px 12px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      flex-shrink: 0;
    }

    .full-nav-circle-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.12);
      color: var(--text);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all var(--transition-fast);
      flex-shrink: 0;
      box-shadow: var(--shadow-sm);
    }

    .full-nav-circle-btn:hover {
      background: rgba(255, 255, 255, 0.12);
      border-color: rgba(255, 255, 255, 0.24);
      transform: scale(1.06);
    }

    .full-nav-circle-btn.favorited {
      color: var(--brand);
      border-color: var(--border-brand);
      background: var(--brand-dim);
    }

    .full-tab-switcher {
      display: flex;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(20px);
      padding: 3px;
      border-radius: var(--radius-full);
      border: 1px solid var(--border);
      gap: 4px;
    }

    .full-tab-btn {
      background: transparent;
      border: none;
      color: var(--muted);
      font-size: 12px;
      font-weight: 700;
      padding: 6px 16px;
      border-radius: var(--radius-full);
      cursor: pointer;
      transition: all var(--transition-fast);
    }

    .full-tab-btn.active {
      background: var(--brand);
      color: #052410;
      box-shadow: 0 0 12px var(--brand-glow);
    }

    .full-player-stage {
      position: relative;
      z-index: 5;
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 12px 20px;
      overflow: hidden;
      min-height: 0;
    }

    .full-panel-view {
      display: none;
      width: 100%;
      height: 100%;
      max-width: 580px;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .full-panel-view.active {
      display: flex;
    }

    .full-cover-wrapper {
      width: min(72vw, 310px);
      max-height: 42vh;
      aspect-ratio: 1 / 1;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 24px 60px rgba(0, 0, 0, 0.85), 0 0 35px var(--brand-glow-lg);
      border: 1px solid var(--border-light);
      position: relative;
      flex-shrink: 0;
      margin: auto 0;
      transition: transform 0.45s ease, box-shadow 0.45s ease, filter 0.45s ease;
    }

    .full-cover-wrapper.pulsing {
      animation: coverFloat 4s ease-in-out infinite alternate;
    }

    .full-cover-wrapper.paused {
      transform: scale(0.93);
      filter: brightness(0.85);
      box-shadow: 0 14px 40px rgba(0, 0, 0, 0.65);
    }

    @keyframes coverFloat {
      0% { transform: scale(1) translateY(0); box-shadow: 0 24px 60px rgba(0, 0, 0, 0.85), 0 0 30px var(--brand-glow-lg); }
      100% { transform: scale(1.03) translateY(-4px); box-shadow: 0 30px 70px rgba(0, 0, 0, 0.95), 0 0 45px var(--brand-glow); }
    }

    .full-cover-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .full-meta-card {
      width: 100%;
      max-width: 480px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-top: 14px;
      padding: 0 8px;
    }

    .full-meta-col {
      display: flex;
      flex-direction: column;
      min-width: 0;
      text-align: right;
    }

    .full-meta-title {
      font-size: 20px;
      font-weight: 800;
      color: var(--text);
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
    }

    .full-meta-artist {
      font-size: 14px;
      color: var(--muted);
      margin-top: 2px;
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
      cursor: pointer;
    }

    .full-meta-artist:hover {
      color: var(--brand);
    }

    .full-lyrics-container {
      width: 100%;
      height: 100%;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 24px;
      padding: 24px 16px;
      text-align: center;
      scroll-behavior: smooth;
    }

    .full-lyrics-line {
      font-size: 18px;
      font-weight: 500;
      color: var(--muted-dark);
      opacity: 0.35;
      cursor: pointer;
      transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
      line-height: 1.8;
      max-width: 540px;
      transform: scale(0.96);
    }

    .full-lyrics-line.active {
      color: #FFFFFF !important;
      font-size: 24px !important;
      font-weight: 900 !important;
      opacity: 1 !important;
      text-shadow: 0 0 24px var(--brand-glow), 0 0 10px rgba(16, 185, 84, 0.8) !important;
      transform: scale(1.05) !important;
    }

    .full-lyrics-line .karaoke-trans-txt {
      display: block;
      font-size: 12px;
      color: var(--muted);
      font-weight: 400;
      margin-top: 4px;
      direction: ltr;
    }

    .full-queue-container {
      width: 100%;
      height: 100%;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 8px;
      padding: 12px 6px;
    }

    .full-control-deck {
      position: relative;
      z-index: 5;
      width: 100%;
      max-width: 540px;
      margin: 0 auto;
      padding: 12px 24px 24px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      flex-shrink: 0;
    }

    .full-control-deck .time-tracker-row {
      display: flex !important;
      align-items: center;
      gap: 12px;
      width: 100%;
      font-size: 12px;
      font-family: monospace;
      color: var(--muted);
      direction: ltr !important;
    }

    .full-primary-buttons {
      display: flex;
      direction: ltr !important;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      padding: 0 14px;
    }

    .full-play-pause-btn {
      width: 64px;
      height: 64px;
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
      transform: scale(1.06);
      background: var(--brand-hover);
    }

    .side-drawer {
      position: fixed;
      top: 0;
      bottom: var(--mini-player-h);
      left: 0;
      width: 380px;
      background: var(--surface-glass-heavy);
      backdrop-filter: blur(36px);
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
      to { transform: translateY(0); }
    }

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

    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.72);
      backdrop-filter: blur(12px);
      z-index: 120;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 16px;
    }
    .modal-overlay.open {
      display: flex;
      animation: modalSlideUp 0.25s ease;
    }
    .modal-glass-box {
      background: var(--surface-glass-heavy);
      border: 1px solid var(--border-light);
      border-radius: var(--radius-lg);
      padding: 24px;
      width: 100%;
      max-width: 440px;
      box-shadow: var(--shadow-lg);
    }

    @media (min-width: 769px) {
      #mini-progress-top {
        display: none !important;
      }
      .mini-player {
        padding-top: 2px;
      }
    }

    @media (max-width: 1024px) {
      .track-row {
        grid-template-columns: 30px 42px 1fr 70px 105px;
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
        height: 60px;
      }
      .topbar-mobile-logo {
        display: flex;
      }
      .user-pill-badge {
        width: 34px;
        height: 34px;
      }
      .user-avatar-dot svg {
        width: 16px;
        height: 16px;
      }
      .content-viewport {
        padding: 14px 14px calc(var(--mobile-nav-h) + 80px + env(safe-area-inset-bottom, 0px));
      }
      .mini-player {
        bottom: calc(var(--mobile-nav-h) + env(safe-area-inset-bottom, 0px) + 6px);
        left: 8px;
        right: 8px;
        height: 62px;
        padding: 0 10px;
        border-radius: 14px;
        border: 1px solid var(--border-light);
      }
      .mini-player .time-tracker-row, .player-right-utils, #ctrl-shuffle, #ctrl-repeat {
        display: none;
      }
      .player-left-track {
        width: calc(100% - 84px);
      }

      /* چیدمان متقارن، واکنش‌گرا و خوانای هدر در موبایل */
      .artist-header-box {
        flex-direction: column;
        align-items: center !important;
        text-align: center !important;
        gap: 16px;
        padding: 20px 16px;
      }

      .artist-avatar-lg, .playlist-cover-lg {
        width: 140px;
        height: 140px;
        margin: 0 auto;
      }

      .artist-info-col {
        width: 100%;
        align-items: center !important;
        text-align: center !important;
        gap: 8px;
      }

      .artist-verified-tag {
        margin: 0 auto;
      }

      .artist-name-title {
        font-size: 20px !important;
        text-align: center !important;
        line-height: 1.35 !important;
      }

      .artist-header-desc, .artist-header-box p {
        font-size: 12px !important;
        white-space: normal !important;
        line-height: 1.65 !important;
        text-align: center !important;
        max-width: 100% !important;
      }

      .artist-meta-txt {
        justify-content: center !important;
        font-size: 11.5px !important;
      }

      .artist-actions-row {
        width: 100%;
        justify-content: center !important;
        gap: 10px;
        margin-top: 4px;
      }

      .artist-actions-row .btn-brand,
      .artist-actions-row .btn-secondary {
        padding: 9px 18px;
        font-size: 12.5px;
        min-height: 40px;
      }

      .mobile-carousel-row {
        display: flex !important;
        overflow-x: auto !important;
        flex-wrap: nowrap !important;
        gap: 12px !important;
        padding-bottom: 8px !important;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
      }
      .mobile-carousel-row::-webkit-scrollbar {
        display: none;
      }
      .mobile-carousel-row .music-card {
        min-width: 140px !important;
        max-width: 150px !important;
        flex-shrink: 0 !important;
      }

      .track-row {
        grid-template-columns: 24px 44px 1fr 95px;
        gap: 8px;
        padding: 6px 10px;
      }
      .track-duration {
        display: none;
      }
      .action-icon-btn {
        width: 28px;
        height: 28px;
      }

      .side-drawer {
        width: 100vw;
        bottom: calc(var(--mobile-nav-h) + 72px);
      }
      .full-control-deck {
        padding: 8px 16px 20px;
      }
      .full-cover-wrapper {
        width: min(72vw, 250px);
        margin: auto 0;
      }
      .full-meta-title {
        font-size: 17px;
      }
      .full-play-pause-btn {
        width: 58px;
        height: 58px;
      }

      #view-playlists .section-header, #view-library .section-header {
        align-items: center !important;
        gap: 10px !important;
      }
      #view-playlists .section-title, #view-library .section-title {
        font-size: 13.5px !important;
        white-space: nowrap !important;
        letter-spacing: -0.2px;
      }
      #view-playlists .section-title::before, #view-library .section-title::before {
        height: 14px !important;
        width: 3px !important;
      }
      #view-playlists .btn-create-playlist, #view-library .btn-create-playlist {
        font-size: 11px !important;
        padding: 6px 12px !important;
        min-height: 32px !important;
        white-space: nowrap !important;
        flex-shrink: 0 !important;
      }
    }
  </style>
</head>
<body>
  <div id="app">

    <!-- سایدبار ناوبری دسکتاپ -->
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
          <a class="nav-link" id="nav-all-tracks" onclick="switchView('all-tracks')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            <span>تمام قطعات موسیقی</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-discover" onclick="switchView('discover')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            <span>اکتشاف و ژانرها</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-artists" onclick="switchView('artists')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            <span>هنرمندان</span>
            <span class="badge-count" id="nav-artists-count">۰</span>
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
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <span>پلی‌لیست‌ها</span>
            <span class="badge-count" id="nav-playlists-count">۰</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-favorites" onclick="switchView('favorites')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            <span>موردعلاقه‌ها</span>
            <span class="badge-count" id="fav-count">۰</span>
          </a>
        </li>
        <li>
          <a class="nav-link" id="nav-library" onclick="switchView('library')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
            <span>کتابخانه</span>
          </a>
        </li>
      </ul>
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

        <!-- سرچ هدر -->
        <div class="search-container">
          <span class="search-icon-pos">
            <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          </span>
          <input type="text" class="search-input" id="global-search-input" 
                 placeholder="جستجوی آهنگ، هنرمند یا پلی‌لیست..." 
                 onfocus="onSearchInputFocus()" 
                 onclick="onSearchInputFocus()" 
                 oninput="handleSearchInput(this.value)" />
        </div>

        <!-- دکمه پروفایل متقارن با آیکون پیش‌فرض آدمک کاربر هماهنگ با تم سایت -->
        <div class="topbar-actions">
          <button class="user-pill-badge" id="user-profile-btn" title="پروفایل کاربری" aria-label="پروفایل کاربری">
            <div class="user-avatar-dot">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
              </svg>
            </div>
          </button>
        </div>
      </header>

      <div class="content-viewport" id="viewport">

        <!-- VIEW 1: HOME -->
        <section class="view-panel active" id="view-home">
          <!-- پلی‌لیست‌های برگزیده -->
          <div class="section-header">
            <h2 class="section-title">پلی‌لیست‌های برگزیده</h2>
            <a class="section-see-all" onclick="switchView('playlists')">مشاهده همه</a>
          </div>
          <div class="grid-container mobile-carousel-row" id="home-playlists-grid"></div>

          <!-- پیشنهادها -->
          <div class="section-header">
            <h2 class="section-title">پیشنهادی برای تو</h2>
          </div>
          <div class="grid-container mobile-carousel-row" id="home-featured-grid"></div>

          <!-- قطعات برگزیده (حداکثر ۶ تا) + دکمه آهنگ‌های بیشتر -->
          <div class="section-header">
            <h2 class="section-title">قطعات برگزیده</h2>
            <a class="section-see-all" onclick="switchView('all-tracks')">مشاهده همه</a>
          </div>
          <div class="track-list" id="home-recent-tracks"></div>
          <div style="display:flex; justify-content:center; margin: 18px 0 28px;">
            <button class="btn-secondary" onclick="switchView('all-tracks')" style="gap:8px; padding:10px 24px; font-weight:700;">
              <span>مشاهده آهنگ‌های بیشتر</span>
              <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
          </div>

          <!-- هنرمندان منتخب -->
          <div class="section-header">
            <h2 class="section-title">هنرمندان منتخب و جریان‌ساز</h2>
            <a class="section-see-all" onclick="switchView('artists')">مشاهده همه</a>
          </div>
          <div class="grid-container mobile-carousel-row" id="home-artists-grid"></div>
        </section>

        <!-- VIEW: ALL TRACKS -->
        <section class="view-panel" id="view-all-tracks">
          <div class="section-header">
            <div>
              <h2 class="section-title">تمام قطعات و ترانه‌ها</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:4px;">آرشیو کامل قطعات صوتی به همراه امکان دانلود و پخش آنلاین</p>
            </div>
            <div style="display:flex; gap:10px; align-items:center;">
              <button class="btn-brand" onclick="playDefaultQueue()" style="padding:8px 18px; font-size:12px;">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                <span>پخش همه</span>
              </button>
              <button class="btn-secondary" onclick="switchView('home')" style="padding:8px 16px; font-size:12px;">بازگشت به خانه</button>
            </div>
          </div>
          <div class="track-list" id="all-tracks-list"></div>
        </section>

        <!-- VIEW 2: DISCOVER -->
        <section class="view-panel" id="view-discover">
          <div class="section-header">
            <h2 class="section-title">ژانرها و سبک‌های پلتفرم</h2>
          </div>
          <div class="grid-container" id="discover-genres-grid"></div>
        </section>

        <!-- VIEW 3: ARTISTS DIRECTORY -->
        <section class="view-panel" id="view-artists">
          <div class="section-header">
            <div>
              <h2 class="section-title">تمام هنرمندان و خوانندگان پلتفرم</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:4px;">برای مشاهده پروفایل و تمام ترانه‌ها روی خواننده مورد نظر کلیک کنید</p>
            </div>
          </div>
          <div class="grid-container" id="artists-page-grid"></div>
        </section>

        <!-- VIEW 4: SEARCH -->
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

        <!-- VIEW 5: LIBRARY -->
        <section class="view-panel" id="view-library">
          <div class="section-header">
            <div>
              <h2 class="section-title">کالکشن‌ها و پلی‌لیست‌های من</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:4px;" id="user-custom-playlist-counter">پلی‌لیست‌های شخصی شما: ۰ از ۱۰</p>
            </div>
            <button class="btn-brand btn-create-playlist" onclick="openCreatePlaylistModal()">
              <span>+ ساخت پلی‌لیست شخصی</span>
            </button>
          </div>
          <div class="grid-container" id="library-playlists-grid"></div>
        </section>

        <!-- VIEW 6: PLAYLISTS DIRECTORY -->
        <section class="view-panel" id="view-playlists">
          <div class="section-header">
            <div>
              <h2 class="section-title">پلی‌لیست‌های اختصاصی و کالکشن‌ها</h2>
              <p style="font-size:12px; color:var(--muted); margin-top:4px;">مجموعه‌های عمومی و پلی‌لیست‌های شخصی شما</p>
            </div>
            <button class="btn-brand btn-create-playlist" onclick="openCreatePlaylistModal()">
              <span>+ ساخت پلی‌لیست من</span>
            </button>
          </div>
          <div class="grid-container" id="playlists-grid"></div>
        </section>

        <!-- VIEW 7: PLAYLIST DETAIL (هدر مرتب‌شده و بدون شکستگی متن) -->
        <section class="view-panel" id="view-playlist">
          <div class="artist-header-box playlist-header-box">
            <div class="playlist-cover-lg">
              <img id="playlist-page-img" src="" alt="کاور پلی‌لیست" />
            </div>
            <div class="artist-info-col">
              <span class="artist-verified-tag">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                پلی‌لیست سهپاتیفای
              </span>
              <h1 class="artist-name-title" id="playlist-page-name">عنوان پلی‌لیست</h1>
              <p class="artist-header-desc" id="playlist-page-desc"></p>
              <div class="artist-meta-txt">
                <span id="playlist-page-track-count">۰ قطعه صوتی</span>
                <span class="meta-bullet">•</span>
                <span>استودیو سهپاتیفای</span>
              </div>
              <div class="artist-actions-row">
                <button class="btn-brand" onclick="playAllPlaylistTracks()">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>پخش تمام قطعات</span>
                </button>
                <button class="btn-secondary" onclick="switchView('playlists')">
                  <span>بازگشت به لیست</span>
                </button>
              </div>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">قطعات این مجموعه</h2>
          </div>
          <div class="track-list" id="playlist-tracks-list"></div>
        </section>

        <!-- VIEW 8: ARTIST DETAIL (هدر مرتب‌شده و بدون شکستگی متن) -->
        <section class="view-panel" id="view-artist">
          <div class="artist-header-box">
            <div class="artist-avatar-lg">
              <img id="artist-page-img" src="" alt="هنرمند" />
            </div>
            <div class="artist-info-col">
              <span class="artist-verified-tag" id="artist-page-badge">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                هنرمند رسمی و تاییدشده سهپاتیفای
              </span>
              <h1 class="artist-name-title" id="artist-page-name">نام هنرمند</h1>
              <p class="artist-header-desc" id="artist-page-bio"></p>
              <div class="artist-meta-txt">
                <span id="artist-page-listeners">۰ شنونده ماهانه</span>
                <span class="meta-bullet">•</span>
                <span id="artist-page-genres" style="color:var(--brand); font-weight:700;">سبک‌های متنوع</span>
              </div>
              <div class="artist-actions-row">
                <button class="btn-brand" onclick="playAllArtistTracks()">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>پخش تمام آثار</span>
                </button>
                <button class="btn-secondary" onclick="switchView('artists')">
                  <span>لیست هنرمندان</span>
                </button>
              </div>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">تمام ترانه‌های این هنرمند</h2>
          </div>
          <div class="track-list" id="artist-tracks-list"></div>
        </section>

        <!-- VIEW 9: FAVORITES (هدر مرتب‌شده و بدون شکستگی متن) -->
        <section class="view-panel" id="view-favorites">
          <div class="artist-header-box playlist-header-box">
            <div class="playlist-cover-lg" style="background: linear-gradient(135deg, #10B954 0%, #06401d 100%); display:flex; align-items:center; justify-content:center; box-shadow: 0 12px 36px rgba(16,185,84,0.35);">
              <svg width="84" height="84" fill="#FFFFFF" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
            <div class="artist-info-col">
              <span class="artist-verified-tag">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                کالکشن اختصاصی شما
              </span>
              <h1 class="artist-name-title">ترانه‌های موردعلاقه من</h1>
              <p class="artist-header-desc">مجموعه آهنگ‌هایی که با نشان قلب نشانه‌گذاری کرده‌اید و هر لحظه با بالاترین کیفیت صوتی در دسترس شما هستند.</p>
              <div class="artist-meta-txt">
                <span id="favorites-page-count">۰ قطعه صوتی</span>
                <span class="meta-bullet">•</span>
                <span>سهپاتیفای</span>
              </div>
              <div class="artist-actions-row">
                <button class="btn-brand" onclick="playAllFavorites()">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>پخش تمام علاقه‌مندی‌ها</span>
                </button>
              </div>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">لیست ترانه‌های برگزیده</h2>
          </div>
          <div class="track-list" id="favorites-tracks-list"></div>
        </section>

      </div>
    </main>

    <!-- مینی پلیر پایینی -->
    <div class="mini-player" id="mini-player" onclick="toggleFullPlayer()">
      <div class="player-progress-bar-wrap" id="mini-progress-top">
        <div class="player-progress-fill" id="progress-top-fill"></div>
      </div>

      <div class="player-left-track">
        <div class="mini-player-art">
          <img id="mini-art-img" src="" alt="Artwork" />
        </div>
        <div class="mini-track-meta">
          <span class="mini-track-title" id="mini-title">عنوان ترانه</span>
          <span class="mini-track-artist" id="mini-artist">نام هنرمند</span>
        </div>
        <button class="action-icon-btn" id="mini-fav-btn" onclick="event.stopPropagation(); toggleFavoriteCurrent();" title="علاقه‌مندی">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </button>
      </div>

      <div class="player-center-controls" onclick="event.stopPropagation();">
        <div class="ctrl-buttons">
          <button class="ctrl-btn" id="ctrl-shuffle" onclick="toggleShuffle()" title="پخش تصادفی">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 3 21 3 21 8"></polyline><line x1="4" y1="20" x2="21" y2="3"></line><polyline points="21 16 21 21 16 21"></polyline><line x1="15" y1="15" x2="21" y2="21"></line><line x1="4" y1="4" x2="9" y2="9"></line></svg>
          </button>
          <button class="ctrl-btn" onclick="prevTrack()" title="قبلی">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
          </button>
          <button class="play-pause-btn" id="main-play-btn" onclick="togglePlay()" title="پخش / توقف">
            <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
          </button>
          <button class="ctrl-btn" onclick="nextTrack()" title="بعدی">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
          </button>
          <button class="ctrl-btn" id="ctrl-repeat" onclick="toggleRepeat()" title="تکرار">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </button>
        </div>

        <div class="time-tracker-row">
          <span class="time-val" id="mini-time-cur">0:00</span>
          <div class="interactive-slider-track" id="mini-scrub-track">
            <div class="slider-rail">
              <div class="slider-fill" id="mini-scrub-fill"></div>
            </div>
          </div>
          <span class="time-val" id="mini-time-tot">0:00</span>
        </div>
      </div>

      <div class="player-right-utils" onclick="event.stopPropagation();">
        <button class="ctrl-btn" onclick="downloadCurrentTrack()" title="دانلود این آهنگ">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        </button>
        <button class="ctrl-btn" onclick="toggleLyricsDrawer()" title="لیریکس">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
        </button>
        <button class="ctrl-btn" onclick="toggleQueueDrawer()" title="صف پخش">
          <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
        </button>
      </div>
    </div>

    <!-- پلیر تمام‌صفحه -->
    <div class="expanded-player-modal" id="full-player-modal">
      <div class="full-player-bg-aura" id="full-player-bg-aura"></div>
      <div class="sheet-grabber-bar" onclick="toggleFullPlayer()"></div>

      <div class="full-player-nav">
        <button class="full-nav-circle-btn" onclick="toggleFullPlayer()" title="بستن پلیر">
          <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"/></svg>
        </button>

        <div class="full-tab-switcher">
          <button class="full-tab-btn active" id="full-tab-now" onclick="switchFullPlayerView('now')">کاور</button>
          <button class="full-tab-btn" id="full-tab-lyrics" onclick="switchFullPlayerView('lyrics')">متن شعر</button>
          <button class="full-tab-btn" id="full-tab-queue" onclick="switchFullPlayerView('queue')">صف پخش</button>
        </div>

        <button class="full-nav-circle-btn" id="full-fav-btn" onclick="toggleFavoriteCurrent()" title="علاقه‌مندی">
          <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </button>
      </div>

      <div class="full-player-stage">
        <!-- ۱. کاور آلبوم -->
        <div class="full-panel-view active" id="full-view-now">
          <div class="full-cover-wrapper" id="full-cover-wrapper">
            <img id="full-art-img" src="" alt="Album Artwork" />
          </div>

          <div class="full-meta-card">
            <div class="full-meta-col">
              <div class="full-meta-title" id="full-track-title">عنوان ترانه</div>
              <div class="full-meta-artist" id="full-track-artist">نام هنرمند</div>
            </div>
            <button class="full-nav-circle-btn" onclick="downloadCurrentTrack()" title="دانلود این قطعه">
              <svg width="19" height="19" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            </button>
          </div>
        </div>

        <!-- ۲. لیریکس با قابلیت بولد شدن مصرع فعال -->
        <div class="full-panel-view" id="full-view-lyrics">
          <div class="full-lyrics-container" id="full-lyrics-container"></div>
        </div>

        <!-- ۳. صف پخش -->
        <div class="full-panel-view" id="full-view-queue">
          <div class="full-queue-container" id="full-queue-container"></div>
        </div>
      </div>

      <div class="full-control-deck">
        <div class="time-tracker-row">
          <span class="time-val" id="full-time-cur">0:00</span>
          <div class="interactive-slider-track" id="full-scrub-track">
            <div class="slider-rail">
              <div class="slider-fill" id="full-scrub-fill"></div>
            </div>
          </div>
          <span class="time-val" id="full-time-tot">0:00</span>
        </div>

        <div class="full-primary-buttons">
          <button class="ctrl-btn" id="full-ctrl-shuffle" onclick="toggleShuffle()" title="پخش تصادفی">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 3 21 3 21 8"></polyline><line x1="4" y1="20" x2="21" y2="3"></line><polyline points="21 16 21 21 16 21"></polyline><line x1="15" y1="15" x2="21" y2="21"></line><line x1="4" y1="4" x2="9" y2="9"></line></svg>
          </button>
          
          <button class="ctrl-btn" onclick="prevTrack()" title="قبلی">
            <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
          </button>

          <button class="full-play-pause-btn" id="full-play-btn" onclick="togglePlay()" title="پخش / توقف">
            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
          </button>

          <button class="ctrl-btn" onclick="nextTrack()" title="بعدی">
            <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
          </button>

          <button class="ctrl-btn" id="full-ctrl-repeat" onclick="toggleRepeat()" title="تکرار">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- دراورهای لیریکس و صف پخش -->
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

    <!-- مودال ساخت پلی‌لیست شخصی -->
    <div class="modal-overlay" id="modal-create-playlist">
      <div class="modal-glass-box">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px;">
          <h3 style="font-size:16px; font-weight:800;">ساخت پلی‌لیست شخصی جدید</h3>
          <button class="action-icon-btn" onclick="closeCreatePlaylistModal()">✕</button>
        </div>
        <p style="font-size:12px; color:var(--muted); margin-bottom:14px;">هر کاربر می‌تواند حداکثر ۱۰ پلی‌لیست شخصی داشته باشد.</p>
        <div style="display:flex; flex-direction:column; gap:12px;">
          <input type="text" id="custom-playlist-title" class="search-input" style="padding:10px 14px;" placeholder="نام پلی‌لیست (مثال: شب‌های بارانی)..." />
          <textarea id="custom-playlist-desc" class="search-input" style="padding:10px 14px; border-radius:12px; height:80px; resize:none;" placeholder="توضیحات کوتاه درباره این مجموعه..."></textarea>
          <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:8px;">
            <button class="btn-secondary" onclick="closeCreatePlaylistModal()">انصراف</button>
            <button class="btn-brand" onclick="saveCustomPlaylist()">ایجاد پلی‌لیست</button>
          </div>
        </div>
      </div>
    </div>

    <!-- مودال افزودن ترانه به پلی‌لیست شخصی -->
    <div class="modal-overlay" id="modal-add-to-playlist">
      <div class="modal-glass-box">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
          <h3 style="font-size:16px; font-weight:800;">افزودن به پلی‌لیست شخصی</h3>
          <button class="action-icon-btn" onclick="closeAddToPlaylistModal()">✕</button>
        </div>
        <input type="hidden" id="add-to-playlist-track-id" />
        <div id="user-custom-playlists-picker" style="display:flex; flex-direction:column; gap:8px; max-height:240px; overflow-y:auto; margin-bottom:14px;"></div>
        <div style="display:flex; justify-content:space-between; align-items:center;">
          <button class="btn-secondary" style="font-size:11.5px; padding:6px 14px;" onclick="closeAddToPlaylistModal(); openCreatePlaylistModal();">+ ساخت پلی‌لیست جدید</button>
          <button class="btn-secondary" onclick="closeAddToPlaylistModal()">بستن</button>
        </div>
      </div>
    </div>

    <!-- منوی پایینی موبایل -->
    <nav class="mobile-bottom-nav">
      <div class="mobile-nav-btn active" id="mob-home" onclick="switchView('home')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span>خانه</span>
      </div>
      <div class="mobile-nav-btn" id="mob-artists" onclick="switchView('artists')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        <span>هنرمندان</span>
      </div>
      <div class="mobile-nav-btn" id="mob-playlists" onclick="switchView('playlists')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        <span>پلی‌لیست‌ها</span>
      </div>
      <div class="mobile-nav-btn" id="mob-favorites" onclick="switchView('favorites')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        <span>موردعلاقه‌ها</span>
      </div>
      <div class="mobile-nav-btn" id="mob-library" onclick="switchView('library')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
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
    let USER_CUSTOM_PLAYLISTS = [];

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

    function loadCustomPlaylistsFromStorage() {
      try {
        const stored = localStorage.getItem('sehpatify_custom_user_playlists');
        USER_CUSTOM_PLAYLISTS = stored ? JSON.parse(stored) : [];
      } catch (e) {
        USER_CUSTOM_PLAYLISTS = [];
      }
    }

    function saveCustomPlaylistsToStorage() {
      localStorage.setItem('sehpatify_custom_user_playlists', JSON.stringify(USER_CUSTOM_PLAYLISTS));
    }

    function onSearchInputFocus() {
      switchView('search');
    }

    async function initAppData() {
      loadCustomPlaylistsFromStorage();

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
        console.warn('خطا در دریافت اطلاعات سرور');
      }
    }

    function renderAppViews() {
      const homePlaylists = document.getElementById('home-playlists-grid');
      const combinedPlaylists = [...PLAYLISTS_DB, ...USER_CUSTOM_PLAYLISTS];

      if (homePlaylists) {
        if (combinedPlaylists.length === 0) {
          homePlaylists.innerHTML = `<div style="grid-column: 1/-1; text-align:center; padding:24px; color:var(--muted); font-size:12.5px;">هنوز پلی‌لیستی ثبت نشده است.</div>`;
        } else {
          homePlaylists.innerHTML = combinedPlaylists.map(p => `
            <div class="music-card" onclick="openPlaylistPage('${p.id}')">
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

      renderTracksTableList(ALL_TRACKS.slice(0, 6), 'home-recent-tracks');
      renderTracksTableList(ALL_TRACKS, 'all-tracks-list');

      const artistsGrid = document.getElementById('home-artists-grid');
      const artistsPageGrid = document.getElementById('artists-page-grid');
      const navArtistsCount = document.getElementById('nav-artists-count');
      if (navArtistsCount) navArtistsCount.textContent = ARTISTS_DB.length;

      const artistsHtml = (ARTISTS_DB && ARTISTS_DB.length > 0)
        ? ARTISTS_DB.map(a => `
            <div class="music-card artist-card" onclick="openArtistPage('${a.id}')">
              <div class="card-art-box">
                <img class="card-art-img" src="${a.image || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300'}" alt="${escapeHtml(a.name)}" />
              </div>
              <div class="card-title">${escapeHtml(a.name)}</div>
              <div class="card-subtitle">${escapeHtml(a.genre_names || (a.listeners + ' شنونده'))}</div>
            </div>
          `).join('')
        : `<div style="grid-column: 1/-1; text-align:center; padding:24px; color:var(--muted); font-size:12.5px;">هنوز هنرمندی در سیستم ثبت نشده است.</div>`;

      if (artistsGrid) artistsGrid.innerHTML = artistsHtml;
      if (artistsPageGrid) artistsPageGrid.innerHTML = artistsHtml;

      renderPlaylistsDirectory();

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

      renderFavoritesView();
    }

    function renderPlaylistsDirectory() {
      const playlistsGrid = document.getElementById('playlists-grid');
      const libraryGrid = document.getElementById('library-playlists-grid');
      const counterEl = document.getElementById('user-custom-playlist-counter');
      const navCount = document.getElementById('nav-playlists-count');

      const combined = [...PLAYLISTS_DB, ...USER_CUSTOM_PLAYLISTS];
      if (navCount) navCount.textContent = combined.length;
      if (counterEl) counterEl.textContent = `پلی‌لیست‌های شخصی شما: ${USER_CUSTOM_PLAYLISTS.length} از ۱۰`;

      const playlistsHtml = combined.length > 0 
        ? combined.map(p => `
          <div class="music-card" onclick="openPlaylistPage('${p.id}')">
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
            <div class="track-actions-cell" onclick="event.stopPropagation();">
              <button class="action-icon-btn" onclick="openAddToPlaylistModal('${t.id}', event)" title="افزودن به پلی‌لیست شخصی">
                <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
              </button>
              <button class="action-icon-btn" onclick="downloadTrack('${t.id}', event)" title="دانلود قطعه">
                <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
              </button>
              <button class="action-icon-btn ${t.favorited ? 'favorited' : ''}" data-fav-track-id="${t.id}" onclick="toggleFavTrackById('${t.id}');" title="علاقه‌مندی">
                <svg width="18" height="18" fill="${t.favorited ? 'var(--brand)' : 'none'}" stroke="${t.favorited ? 'var(--brand)' : 'currentColor'}" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
              </button>
            </div>
          </div>
        `;
      }).join('');
    }

    async function openPlaylistPage(playlistId) {
      try {
        let playlist = [...PLAYLISTS_DB, ...USER_CUSTOM_PLAYLISTS].find(p => String(p.id) === String(playlistId));

        if (!playlist || !playlist.is_custom) {
          try {
            const res = await fetch(`/api/playlists/${playlistId}`);
            if (res.ok) playlist = await res.json();
          } catch (e) {}
        }

        if (!playlist) {
          showToast('پلی‌لیست مورد نظر یافت نشد.');
          return;
        }

        ACTIVE_PLAYLIST = playlist;

        document.getElementById('playlist-page-name').textContent = playlist.title;
        document.getElementById('playlist-page-desc').textContent = playlist.desc || 'کالکشن اختصاصی استودیو سهپاتیفای با بهترین قطعات برگزیده';
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
      showToast(`پخش پلی‌لیست «${ACTIVE_PLAYLIST.title}» آغاز شد ✓`);
    }

    function playTrackInPlaylist(idx) {
      if (!ACTIVE_PLAYLIST || !ACTIVE_PLAYLIST.tracks) return;
      CURRENT_QUEUE = [...ACTIVE_PLAYLIST.tracks];
      currentQueueIndex = idx;
      playCurrentQueue();
    }

    async function openArtistPage(artistId) {
      try {
        let artist = ARTISTS_DB.find(a => String(a.id) === String(artistId));

        try {
          const res = await fetch(`/api/artists/${artistId}`);
          if (res.ok) artist = await res.json();
        } catch (e) {}

        if (!artist) {
          showToast('هنرمند مورد نظر یافت نشد.');
          return;
        }

        ACTIVE_ARTIST = artist;

        if (!artist.tracks || artist.tracks.length === 0) {
          artist.tracks = ALL_TRACKS.filter(t => String(t.artist_id) === String(artist.id) || (t.artist && t.artist.trim().toLowerCase() === artist.name.trim().toLowerCase()));
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

    function renderFavoritesView() {
      const favs = ALL_TRACKS.filter(t => t.favorited);
      const counter = document.getElementById('favorites-page-count');
      if (counter) counter.textContent = `${favs.length} قطعه صوتی`;
      renderTracksTableList(favs, 'favorites-tracks-list', 'playTrackInFavorites');
    }

    function playAllFavorites() {
      const favs = ALL_TRACKS.filter(t => t.favorited);
      if (favs.length === 0) {
        showToast('هنوز ترانه‌ای به علاقه‌مندی‌های خود اضافه نکرده‌اید.');
        return;
      }
      CURRENT_QUEUE = [...favs];
      currentQueueIndex = 0;
      playCurrentQueue();
      showToast('پخش ترانه‌های موردعلاقه آغاز شد ✓');
    }

    function playTrackInFavorites(idx) {
      const favs = ALL_TRACKS.filter(t => t.favorited);
      if (favs.length === 0) return;
      CURRENT_QUEUE = [...favs];
      currentQueueIndex = idx;
      playCurrentQueue();
    }

    function openCreatePlaylistModal() {
      if (USER_CUSTOM_PLAYLISTS.length >= 10) {
        showToast('شما به سقف مجاز (حداکثر ۱۰ پلی‌لیست شخصی) رسیده‌اید.');
        return;
      }
      document.getElementById('custom-playlist-title').value = '';
      document.getElementById('custom-playlist-desc').value = '';
      document.getElementById('modal-create-playlist').classList.add('open');
    }

    function closeCreatePlaylistModal() {
      document.getElementById('modal-create-playlist').classList.remove('open');
    }

    function saveCustomPlaylist() {
      const title = document.getElementById('custom-playlist-title').value.trim();
      const desc = document.getElementById('custom-playlist-desc').value.trim();

      if (!title) {
        showToast('عنوان پلی‌لیست را وارد کنید.');
        return;
      }

      const newPlaylist = {
        id: 'custom_' + Date.now(),
        title: title,
        desc: desc || 'پلی‌لیست اختصاصی شما',
        cover: 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=500',
        is_custom: true,
        tracks: []
      };

      USER_CUSTOM_PLAYLISTS.push(newPlaylist);
      saveCustomPlaylistsToStorage();
      renderPlaylistsDirectory();
      closeCreatePlaylistModal();
      showToast(`پلی‌لیست «${title}» با موفقیت ایجاد شد ✓`);
    }

    function openAddToPlaylistModal(trackId, event) {
      if (event) event.stopPropagation();
      document.getElementById('add-to-playlist-track-id').value = trackId;
      const container = document.getElementById('user-custom-playlists-picker');
      
      if (!USER_CUSTOM_PLAYLISTS || USER_CUSTOM_PLAYLISTS.length === 0) {
        container.innerHTML = `<div style="text-align:center; padding:20px; color:var(--muted); font-size:12.5px;">هنوز پلی‌لیست شخصی نساخته‌اید. ابتدا با زدن دکمه زیر یک پلی‌لیست ایجاد کنید.</div>`;
      } else {
        container.innerHTML = USER_CUSTOM_PLAYLISTS.map(p => `
          <div onclick="addTrackToSpecificCustomPlaylist('${p.id}')" style="display:flex; align-items:center; justify-content:space-between; padding:10px 14px; background:rgba(255,255,255,0.03); border:1px solid var(--border); border-radius:10px; cursor:pointer; transition:var(--transition-fast);">
            <div style="font-weight:700; font-size:13px; color:var(--text);">${escapeHtml(p.title)}</div>
            <span style="font-size:11px; color:var(--brand);">${(p.tracks ? p.tracks.length : 0)} قطعه</span>
          </div>
        `).join('');
      }

      document.getElementById('modal-add-to-playlist').classList.add('open');
    }

    function closeAddToPlaylistModal() {
      document.getElementById('modal-add-to-playlist').classList.remove('open');
    }

    function addTrackToSpecificCustomPlaylist(playlistId) {
      const trackId = document.getElementById('add-to-playlist-track-id').value;
      const track = ALL_TRACKS.find(t => String(t.id) === String(trackId));
      const playlist = USER_CUSTOM_PLAYLISTS.find(p => String(p.id) === String(playlistId));

      if (!track || !playlist) return;

      if (!playlist.tracks) playlist.tracks = [];

      const exists = playlist.tracks.some(t => String(t.id) === String(track.id));
      if (exists) {
        showToast('این قطعه از قبل در این پلی‌لیست وجود دارد.');
        closeAddToPlaylistModal();
        return;
      }

      playlist.tracks.push(track);
      saveCustomPlaylistsToStorage();
      renderPlaylistsDirectory();
      closeAddToPlaylistModal();
      showToast(`قطعه «${track.title}» به «${playlist.title}» افزوده شد ✓`);
    }

    async function downloadTrack(trackId, event) {
      if (event) event.stopPropagation();
      const track = ALL_TRACKS.find(t => String(t.id) === String(trackId));
      if (!track) return;

      const audioUrl = track.stream_url || (track.audio_path ? `/api/tracks/${track.id}/stream` : null);
      if (!audioUrl) {
        showToast('فایل صوتی برای دانلود یافت نشد.');
        return;
      }

      showToast(`در حال آغاز دانلود: ${track.title}...`);
      const filename = `${track.title} - ${track.artist} - sehpatify.ir.mp3`;

      try {
        const res = await fetch(audioUrl);
        if (!res.ok) throw new Error();
        const blob = await res.blob();
        const blobUrl = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = blobUrl;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(blobUrl);
      } catch (e) {
        const a = document.createElement('a');
        a.href = audioUrl;
        a.download = filename;
        a.target = '_blank';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
      }
    }

    function downloadCurrentTrack() {
      const track = CURRENT_QUEUE[currentQueueIndex];
      if (track) downloadTrack(track.id);
    }

    function switchFullPlayerView(viewName) {
      document.querySelectorAll('.full-panel-view').forEach(p => p.classList.remove('active'));
      document.querySelectorAll('.full-tab-btn').forEach(b => b.classList.remove('active'));

      const target = document.getElementById(`full-view-${viewName}`);
      if (target) target.classList.add('active');

      const btn = document.getElementById(`full-tab-${viewName}`);
      if (btn) btn.classList.add('active');

      if (viewName === 'lyrics') {
        syncLyricsHighlight(currentSeconds, true);
      }
    }

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

      const aura = document.getElementById('full-player-bg-aura');
      if (aura) {
        aura.style.backgroundImage = `url('${coverUrl}')`;
      }

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

      const audioUrl = track.stream_url || (track.audio_path ? `/api/tracks/${track.id}/stream` : `/api/tracks/${track.id}/stream`);

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
        
        const wrapper = document.getElementById('full-cover-wrapper');
        if (wrapper) {
          wrapper.classList.remove('paused');
          wrapper.classList.add('pulsing');
        }
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
      
      const wrapper = document.getElementById('full-cover-wrapper');
      if (wrapper) {
        wrapper.classList.remove('pulsing');
        wrapper.classList.add('paused');
      }
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
      const fullContainer = document.getElementById('full-lyrics-container');

      const content = (!track || !track.lyrics || track.lyrics.length === 0)
        ? `<div style="text-align:center; color:var(--muted); padding:40px 0; font-size:14px;">فاقد متن همگام ترانه برای این قطعه</div>`
        : track.lyrics.map((l, i) => `
            <div class="full-lyrics-line ${i === 0 ? 'active' : ''}" data-time="${l.time}" onclick="seekToSeconds(${l.time})">
              <span>${escapeHtml(l.fa || '')}</span>
              ${l.en ? `<span class="karaoke-trans-txt">${escapeHtml(l.en)}</span>` : ''}
            </div>
          `).join('');

      if (container) container.innerHTML = content;
      if (fullContainer) fullContainer.innerHTML = content;
    }

    function syncLyricsHighlight(sec, forceScroll = false) {
      const track = CURRENT_QUEUE[currentQueueIndex];
      if (!track || !track.lyrics || track.lyrics.length === 0) return;

      let activeIndex = 0;
      for (let i = 0; i < track.lyrics.length; i++) {
        if (sec >= track.lyrics[i].time) {
          activeIndex = i;
        }
      }

      const fullLines = document.querySelectorAll('#full-lyrics-container .full-lyrics-line');
      const drawerLines = document.querySelectorAll('#lyrics-container .full-lyrics-line');

      fullLines.forEach((fl, idx) => {
        const isTarget = (idx === activeIndex);
        if (fl.classList.contains('active') !== isTarget) {
          fl.classList.toggle('active', isTarget);
          if (isTarget) {
            fl.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
        }
      });

      drawerLines.forEach((dl, idx) => {
        const isTarget = (idx === activeIndex);
        if (dl.classList.contains('active') !== isTarget) {
          dl.classList.toggle('active', isTarget);
          if (isTarget) {
            dl.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
        }
      });
    }

    function renderQueueDrawer() {
      const container = document.getElementById('queue-container');
      const fullContainer = document.getElementById('full-queue-container');

      const content = CURRENT_QUEUE.map((t, idx) => `
        <div class="queue-item" onclick="playFromTrackList(CURRENT_QUEUE, ${idx})" style="display:flex; align-items:center; gap:10px; padding:10px; border-radius:8px; background:rgba(255,255,255,0.03); cursor:pointer;">
          <img src="${t.cover || 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=100'}" style="width:40px; height:40px; border-radius:6px; object-fit:cover; flex-shrink:0;" />
          <div style="flex:1; overflow:hidden;">
            <div style="font-weight:700; font-size:13px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; ${idx === currentQueueIndex ? 'color:var(--brand);' : 'color:var(--text);'}">${escapeHtml(t.title)}</div>
            <div style="font-size:11.5px; color:var(--muted); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(t.artist)}</div>
          </div>
          <span style="font-size:11px; color:var(--muted); font-family:monospace;">${t.duration || '03:30'}</span>
        </div>
      `).join('');

      if (container) container.innerHTML = content;
      if (fullContainer) fullContainer.innerHTML = content;
    }

    async function toggleFavTrackById(trackId) {
      let newFavStatus = null;

      const track = ALL_TRACKS.find(t => String(t.id) === String(trackId));
      if (track) {
        track.favorited = !track.favorited;
        newFavStatus = track.favorited;
      }

      if (ACTIVE_PLAYLIST && ACTIVE_PLAYLIST.tracks) {
        const pTrack = ACTIVE_PLAYLIST.tracks.find(t => String(t.id) === String(trackId));
        if (pTrack) {
          if (newFavStatus === null) newFavStatus = !pTrack.favorited;
          pTrack.favorited = newFavStatus;
        }
      }

      if (ACTIVE_ARTIST && ACTIVE_ARTIST.tracks) {
        const aTrack = ACTIVE_ARTIST.tracks.find(t => String(t.id) === String(trackId));
        if (aTrack) {
          if (newFavStatus === null) newFavStatus = !aTrack.favorited;
          aTrack.favorited = newFavStatus;
        }
      }

      CURRENT_QUEUE.forEach(t => {
        if (String(t.id) === String(trackId)) {
          if (newFavStatus === null) newFavStatus = !t.favorited;
          t.favorited = newFavStatus;
        }
      });

      if (newFavStatus === null) return;

      if (String(CURRENT_QUEUE[currentQueueIndex]?.id) === String(trackId)) {
        updateFavoriteButtons(newFavStatus);
      }

      document.querySelectorAll(`[data-fav-track-id="${trackId}"]`).forEach(btn => {
        btn.classList.toggle('favorited', newFavStatus);
        const svg = btn.querySelector('svg');
        if (svg) {
          svg.setAttribute('fill', newFavStatus ? 'var(--brand)' : 'none');
          svg.setAttribute('stroke', newFavStatus ? 'var(--brand)' : 'currentColor');
        }
      });

      updateFavoriteBadges();
      renderFavoritesView();

      showToast(newFavStatus ? 'به موردعلاقه‌ها افزوده شد ♥' : 'از موردعلاقه‌ها برداشته شد');

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
      const activeSvg = `<svg width="20" height="20" fill="var(--brand)" stroke="var(--brand)" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>`;
      const inactiveSvg = `<svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>`;
      
      const m = document.getElementById('mini-fav-btn');
      const f = document.getElementById('full-fav-btn');
      
      if (m) {
        m.innerHTML = isFav ? activeSvg : inactiveSvg;
        m.classList.toggle('favorited', isFav);
      }
      if (f) {
        f.innerHTML = isFav ? activeSvg : inactiveSvg;
        f.classList.toggle('favorited', isFav);
      }
    }

    function updateFavoriteBadges() {
      const count = ALL_TRACKS.filter(t => t.favorited).length;
      document.getElementById('fav-count').textContent = count;
    }

    function handleSearchInput(query) {
      const searchPanel = document.getElementById('view-search');
      if (query.trim().length > 0 && searchPanel && !searchPanel.classList.contains('active')) {
        switchView('search');
      }

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

      const filteredPlaylists = [...PLAYLISTS_DB, ...USER_CUSTOM_PLAYLISTS].filter(p => 
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
          <div class="music-card artist-card" onclick="openArtistPage('${a.id}')">
            <div class="card-art-box"><img class="card-art-img" src="${a.image || ''}" /></div>
            <div class="card-title">${escapeHtml(a.name)}</div>
            <div class="card-subtitle">${escapeHtml(a.genre_names || '')}</div>
          </div>
        `).join('');
      }

      if (filteredPlaylists.length > 0 && document.getElementById('search-playlists-grid')) {
        document.getElementById('search-playlists-grid').innerHTML = filteredPlaylists.map(p => `
          <div class="music-card" onclick="openPlaylistPage('${p.id}')">
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
      const input = document.getElementById('global-search-input');
      if (input) {
        input.value = genreName;
      }
      handleSearchInput(genreName);
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

      if (viewId !== 'search') {
        const searchInput = document.getElementById('global-search-input');
        if (searchInput && searchInput.value) {
          searchInput.value = '';
          const searchContainer = document.getElementById('search-results-container');
          if (searchContainer) searchContainer.innerHTML = '';
        }
      } else {
        const allBtn = document.getElementById('search-tag-all');
        if (allBtn) setSearchFilter('all', allBtn);
      }

      if (viewId === 'favorites') {
        renderFavoritesView();
      }
    }

    function toggleFullPlayer() { 
      const modal = document.getElementById('full-player-modal');
      if (modal) modal.classList.toggle('active'); 
    }
    function toggleLyricsDrawer() { document.getElementById('lyrics-drawer').classList.toggle('open'); }
    function toggleQueueDrawer() { document.getElementById('queue-drawer').classList.toggle('open'); }

    function toggleShuffle() {
      isShuffle = !isShuffle;
      document.getElementById('ctrl-shuffle')?.classList.toggle('active', isShuffle);
      document.getElementById('full-ctrl-shuffle')?.classList.toggle('active', isShuffle);
    }

    function toggleRepeat() {
      repeatMode = (repeatMode + 1) % 3;
      const isAct = repeatMode > 0;
      document.getElementById('ctrl-repeat')?.classList.toggle('active', isAct);
      document.getElementById('full-ctrl-repeat')?.classList.toggle('active', isAct);
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

    function initTouchGestures() {
      const modal = document.getElementById('full-player-modal');
      const grabber = document.querySelector('.sheet-grabber-bar');
      const nav = document.querySelector('.full-player-nav');
      if (!modal) return;

      let startY = 0;
      let currentY = 0;

      const handleTouchStart = (e) => {
        startY = e.touches[0].clientY;
      };

      const handleTouchMove = (e) => {
        currentY = e.touches[0].clientY;
        const delta = currentY - startY;
        if (delta > 0 && delta < 250) {
          modal.style.transform = `translateY(${delta}px)`;
        }
      };

      const handleTouchEnd = () => {
        const delta = currentY - startY;
        modal.style.transform = '';
        if (delta > 90) {
          toggleFullPlayer();
        }
        startY = 0;
        currentY = 0;
      };

      [grabber, nav].forEach(target => {
        if (target) {
          target.addEventListener('touchstart', handleTouchStart, { passive: true });
          target.addEventListener('touchmove', handleTouchMove, { passive: true });
          target.addEventListener('touchend', handleTouchEnd);
        }
      });
    }

    window.addEventListener('DOMContentLoaded', () => {
      initSliders();
      initTouchGestures();
      initAppData();
    });
  </script>
</body>
</html>