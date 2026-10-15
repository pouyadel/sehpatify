<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
  <title>سهپاتیفای | Sehpatify — ریتم، درون تو زنده است</title>
  <meta name="theme-color" content="#07070C" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="پلتفرم نسل نوین موسیقی ایرانی و بین‌المللی با کیفیت Lossless Hi-Res و تجربه بومی فارسی" />

<link rel="stylesheet" href="/css/app.css" />
  <link rel="icon" type="image/png" href="/logo.png" />
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

    /* اگر می‌خواهید کادر شیشه‌ای تیره دور لوگو باشد */
    .brand-logo-wrap {
      width: 44px;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: transparent !important;
      border: none !important;
      box-shadow: none !important;
    }
    
    .brand-logo-svg {
      width: 100%;
      height: 100%;
      object-fit: contain;
      filter: drop-shadow(0 0 8px rgba(16, 185, 84, 0.65));
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
      width: 100%;
      height: 100%;
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
    /* استایل دکمه فعال فیلترهای جستجو */
    .search-tags-row button.active {
      background: var(--brand) !important;
      color: #052410 !important;
      font-weight: 800 !important;
      border-color: var(--brand) !important;
      box-shadow: 0 0 14px var(--brand-glow) !important;
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

    .sidebar-backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.65);
      backdrop-filter: blur(5px);
      -webkit-backdrop-filter: blur(5px);
      z-index: 85;
    }
    .sidebar-backdrop.active {
      display: block;
    }

    .mobile-quick-pills {
      display: none;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: fixed;
        right: 0;
        top: 0;
        bottom: 0;
        width: 270px;
        height: 100dvh;
        background: var(--surface-glass-heavy);
        transform: translateX(100%);
        z-index: 90;
        box-shadow: -10px 0 35px rgba(0, 0, 0, 0.85);
        padding-bottom: 30px;
      }
      .sidebar.open {
        transform: translateX(0);
      }

      /* نوار کپسولی دسترسی سریع مخصوص موبایل (سبک اسپاتیفای) */
      .mobile-quick-pills {
        display: flex;
        align-items: center;
        gap: 8px;
        overflow-x: auto;
        padding: 10px 14px 4px;
        scrollbar-width: none;
        -webkit-overflow-scrolling: touch;
        flex-shrink: 0;
      }
      .mobile-quick-pills::-webkit-scrollbar {
        display: none;
      }
      .quick-pill-item {
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid var(--border);
        color: var(--muted);
        font-size: 12px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: var(--radius-full);
        white-space: nowrap;
        cursor: pointer;
        transition: all var(--transition-fast);
        flex-shrink: 0;
      }
      .quick-pill-item.active {
        background: var(--brand);
        color: #052410;
        font-weight: 800;
        border-color: var(--brand);
        box-shadow: 0 0 12px var(--brand-glow);
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
    /* استایل دکمه فعال فیلترهای جستجو */
    .search-tags-row button.active {
      background: var(--brand) !important;
      color: #052410 !important;
      font-weight: 800 !important;
      border-color: var(--brand) !important;
      box-shadow: 0 0 14px var(--brand-glow) !important;
    }
    /* غیرفعال‌سازی کامل نوتیفیکیشن‌ها */
    .toast-container {
      display: none !important;
    }

    /* جلوگیری از دو خطی شدن متن تمام دکمه‌ها */
    .btn-brand, .btn-secondary {
      white-space: nowrap !important;
      flex-shrink: 0;
    }

    /* استایل هماهنگ هدر صفحات (تمام قطعات، آلبوم‌ها و هنرمندان) */
    .page-top-header {
      display: flex;
      align-items: center !important;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 20px;
    }

    .page-header-text {
      min-width: 0;
      flex: 1;
    }

    .section-subtitle {
      font-size: 12px;
      color: var(--muted);
      margin-top: 4px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .page-header-actions {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-shrink: 0;
    }

    .btn-header-action {
      height: 38px !important;
      min-height: 38px !important;
      padding: 0 18px !important;
      font-size: 12.5px !important;
      font-weight: 700 !important;
      border-radius: var(--radius-full) !important;
      white-space: nowrap !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      gap: 6px !important;
      flex-shrink: 0 !important;
    }

    @media (max-width: 768px) {
      .page-top-header {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 10px !important;
      }

      .page-header-text {
        width: 100%;
      }

      .page-header-text .section-title {
        font-size: 15px !important;
        white-space: nowrap !important;
      }

      .section-subtitle {
        font-size: 11px !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        width: 100%;
      }

      .page-header-actions {
        width: 100%;
        display: flex;
        gap: 8px;
      }

      .btn-header-action {
        flex: 1;
        height: 35px !important;
        min-height: 35px !important;
        padding: 0 12px !important;
        font-size: 11.5px !important;
      }
    }
    /* استایل بخش آلبوم‌های پروفایل هنرمند و حالت بدون آلبوم (Empty State) */
    .artist-section-badge {
      font-size: 11.5px;
      font-weight: 700;
      color: var(--brand);
      background: var(--brand-dim);
      border: 1px solid var(--border-brand);
      padding: 3px 10px;
      border-radius: var(--radius-full);
    }

    .artist-empty-albums {
      grid-column: 1 / -1;
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 18px 22px;
      background: linear-gradient(135deg, rgba(22, 22, 34, 0.75) 0%, rgba(14, 14, 23, 0.9) 100%);
      border: 1px dashed rgba(255, 255, 255, 0.14);
      border-radius: var(--radius-md);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
    }

    .artist-empty-icon {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      background: rgba(16, 185, 84, 0.1);
      border: 1px solid var(--border-brand);
      color: var(--brand);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      box-shadow: 0 0 20px rgba(16, 185, 84, 0.15);
    }

    .artist-empty-text {
      display: flex;
      flex-direction: column;
      gap: 3px;
      min-width: 0;
    }

    .artist-empty-title {
      font-size: 13.5px;
      font-weight: 800;
      color: var(--text);
    }

    .artist-empty-sub {
      font-size: 12px;
      color: var(--muted);
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      .artist-empty-albums {
        padding: 14px 16px;
        gap: 12px;
      }
      .artist-empty-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
      }
      .artist-empty-title {
        font-size: 12.5px;
      }
      .artist-empty-sub {
        font-size: 11px;
      }
    }
    /* استایل‌های پنل حساب کاربری */
    .profile-grid-layout {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 24px;
    }

    .profile-glass-card {
      background: var(--surface-card);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 24px;
      box-shadow: var(--shadow-sm);
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .profile-card-head {
      display: flex;
      align-items: center;
      gap: 10px;
      padding-bottom: 12px;
      border-bottom: 1px solid var(--border);
      font-size: 15px;
      font-weight: 800;
      color: var(--text);
    }

    .profile-card-head svg {
      color: var(--brand);
      flex-shrink: 0;
    }

    .profile-field-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .profile-field-label {
      font-size: 12px;
      font-weight: 700;
      color: var(--muted);
      display: flex;
      justify-content: space-between;
    }

    .profile-input {
      width: 100%;
      height: 44px;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      color: var(--text);
      font-size: 13px;
      padding: 0 14px;
      transition: all var(--transition-fast);
    }

    .profile-input.ltr-input {
      direction: ltr;
      text-align: left;
    }

    .profile-input:focus {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--brand);
      box-shadow: 0 0 14px var(--brand-glow-lg);
    }

    .profile-alert-box {
      display: none;
      padding: 10px 14px;
      border-radius: var(--radius-sm);
      font-size: 12px;
      font-weight: 700;
      line-height: 1.5;
    }

    .profile-alert-box.error {
      display: block;
      background: rgba(248, 113, 113, 0.12);
      border: 1px solid rgba(248, 113, 113, 0.35);
      color: #f87171;
    }

    .profile-alert-box.success {
      display: block;
      background: var(--brand-dim);
      border: 1px solid var(--border-brand);
      color: var(--brand);
    }

    .profile-stats-row {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 6px;
    }

    .profile-stat-pill {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border);
      padding: 6px 14px;
      border-radius: var(--radius-full);
      font-size: 12px;
      color: var(--muted);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .profile-stat-pill strong {
      color: var(--brand);
      font-weight: 800;
    }

    @media (max-width: 860px) {
      .profile-grid-layout {
        grid-template-columns: 1fr;
      }
      .profile-glass-card {
        padding: 18px;
      }
      .profile-stats-row {
        justify-content: center;
      }
    }
    /* اسکرول افقی (Carousel) در دسکتاپ و موبایل برای ردیف‌های صفحه اصلی */
    .mobile-carousel-row {
      display: flex !important;
      overflow-x: auto !important;
      flex-wrap: nowrap !important;
      gap: 16px !important;
      padding-bottom: 12px !important;
      scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch;
      cursor: grab;
    }

    .mobile-carousel-row.dragging {
      cursor: grabbing;
      scroll-behavior: auto;
      user-select: none;
    }

    .mobile-carousel-row .music-card {
      min-width: 180px !important;
      max-width: 190px !important;
      flex-shrink: 0 !important;
    }

    /* استایل نوار صفحه‌بندی (Pagination) هماهنگ با تم شیشه‌ای */
    .pagination-bar {
      grid-column: 1 / -1;
      width: 100%;
      margin-top: 24px;
      padding: 12px 18px;
      background: var(--surface-card);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--border-light);
      border-radius: var(--radius-md);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      flex-wrap: wrap;
      box-shadow: var(--shadow-sm);
    }

    .pagination-info {
      font-size: 12.5px;
      color: var(--muted);
      font-weight: 500;
    }

    .pagination-info strong {
      color: var(--brand);
      font-weight: 800;
    }

    .pagination-total {
      font-size: 11.5px;
      color: var(--muted-dark);
      margin-right: 4px;
    }

    .pagination-controls {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
    }

    .page-numbers-wrap {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .page-num-btn, .page-nav-btn {
      height: 36px;
      min-width: 36px;
      padding: 0 10px;
      border-radius: var(--radius-sm);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--border);
      color: var(--text);
      font-size: 12.5px;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 5px;
      transition: all var(--transition-fast);
    }

    .page-nav-btn {
      padding: 0 14px;
    }

    .page-num-btn:hover:not(.active), .page-nav-btn:hover:not(:disabled) {
      background: rgba(255, 255, 255, 0.1);
      border-color: var(--border-brand);
      color: var(--brand);
    }

    .page-num-btn.active {
      background: var(--brand);
      color: #052410;
      border-color: var(--brand);
      font-weight: 900;
      box-shadow: 0 0 14px var(--brand-glow);
    }

    .page-nav-btn:disabled {
      opacity: 0.35;
      cursor: not-allowed;
    }

    .page-dots {
      color: var(--muted-dark);
      font-size: 13px;
      padding: 0 4px;
    }

    @media (max-width: 768px) {
      .mobile-carousel-row {
        gap: 12px !important;
        padding-bottom: 8px !important;
      }
      .mobile-carousel-row .music-card {
        min-width: 142px !important;
        max-width: 150px !important;
      }
      .pagination-bar {
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 12px;
        gap: 10px;
      }
      .pagination-controls {
        width: 100%;
        justify-content: center;
      }
      .page-num-btn, .page-nav-btn {
        height: 32px;
        min-width: 32px;
        font-size: 11.5px;
        padding: 0 8px;
      }
    }
    .mobile-carousel-row {
      display: flex !important;
      overflow-x: auto !important;
      flex-wrap: nowrap !important;
      gap: 16px !important;
      padding: 12px 6px 16px !important;
      margin: -8px -6px 0 !important;
      scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch;
      cursor: grab;
    }

    .grid-container {
      padding-top: 6px;
    }

    .music-card:hover {
      z-index: 10;
    }
    /* ==========================================================================
       اصلاح جامع رسپانسیو موبایل (پلی‌لیست‌ها، موردعلاقه‌ها، کتابخانه، آلبوم‌ها و لیست‌ها)
       ========================================================================== */
    @media (max-width: 768px) {

      /* ۱. دو ستونه کردن استاندارد کارت‌ها در صفحات پلی‌لیست، کتابخانه، آلبوم‌ها و ژانرها */
      .grid-container:not(.mobile-carousel-row) {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        gap: 12px !important;
      }

      .grid-container:not(.mobile-carousel-row) .music-card {
        padding: 10px !important;
        border-radius: 14px !important;
      }

      .grid-container:not(.mobile-carousel-row) .card-art-box {
        margin-bottom: 8px !important;
        border-radius: 10px !important;
      }

      .grid-container:not(.mobile-carousel-row) .artist-card .card-art-box {
        border-radius: 50% !important;
      }

      .grid-container:not(.mobile-carousel-row) .card-title {
        font-size: 12.5px !important;
      }

      .grid-container:not(.mobile-carousel-row) .card-subtitle {
        font-size: 11px !important;
      }

      /* نمایش دائمی و ظریف دکمه پخش روی کارت‌ها در صفحات لمسی */
      .grid-container:not(.mobile-carousel-row) .card-play-overlay {
        width: 34px !important;
        height: 34px !important;
        bottom: 6px !important;
        left: 6px !important;
        opacity: 0.95 !important;
        transform: translateY(0) !important;
      }

      /* ۲. اصلاح هدر صفحات پلی‌لیست‌ها و کتابخانه من (#view-playlists, #view-library) */
      #view-playlists .section-header,
      #view-library .section-header {
        flex-direction: column !important;
        align-items: stretch !important;
        gap: 12px !important;
        margin-bottom: 18px !important;
      }

      #view-playlists .section-title,
      #view-library .section-title {
        font-size: 16px !important;
        white-space: normal !important;
      }

      #view-playlists .btn-create-playlist,
      #view-library .btn-create-playlist {
        width: 100% !important;
        justify-content: center !important;
        min-height: 40px !important;
        font-size: 12.5px !important;
        padding: 8px 16px !important;
      }

      /* ۳. بازطراحی هدر صفحات جزئیات (پلی‌لیست تکی، موردعلاقه‌ها، آلبوم، خواننده و پروفایل) */
      .artist-header-box {
        flex-direction: column !important;
        align-items: center !important;
        text-align: center !important;
        gap: 14px !important;
        padding: 18px 14px !important;
        border-radius: 18px !important;
        margin-bottom: 20px !important;
      }

      .artist-avatar-lg,
      .playlist-cover-lg {
        width: 124px !important;
        height: 124px !important;
        border-radius: 16px !important;
      }

      .artist-avatar-lg {
        border-radius: 50% !important;
      }

      /* کوچک‌تر کردن آیکون قلب در کاور صفحه موردعلاقه‌ها */
      #view-favorites .playlist-cover-lg svg {
        width: 56px !important;
        height: 56px !important;
      }

      .artist-name-title {
        font-size: 18px !important;
        line-height: 1.4 !important;
        margin: 0 !important;
      }

      .artist-header-desc {
        font-size: 11.5px !important;
        line-height: 1.6 !important;
        color: var(--muted) !important;
        text-align: center !important;
        padding: 0 4px !important;
      }

      /* وسط‌چین کردن زیرعنوان انگلیسی در صفحه پروفایل */
      #profile-header-sub {
        text-align: center !important;
      }

      /* جلوگیری از بیرون‌زدن متادیتا (نام خواننده • سال • تعداد آهنگ) */
      .artist-meta-txt {
        flex-wrap: wrap !important;
        justify-content: center !important;
        gap: 6px 8px !important;
        font-size: 11px !important;
      }

      /* چیدمان منظم و تمام‌عرض دکمه‌های عملیات در هدر پلی‌لیست و علاقه‌مندی‌ها */
      .artist-actions-row {
        width: 100% !important;
        display: flex !important;
        flex-wrap: wrap !important;
        justify-content: center !important;
        gap: 8px !important;
        margin-top: 6px !important;
      }

      /* دکمه اصلی (پخش همه) در موبایل تمام‌عرض و شاخص باشد */
      .artist-actions-row > .btn-brand {
        width: 100% !important;
        justify-content: center !important;
        min-height: 42px !important;
        font-size: 13px !important;
      }

      /* دکمه‌های فرعی (بازگشت، ویرایش، حذف) به صورت متقارن کنار هم قرار بگیرند */
      .artist-actions-row > .btn-secondary,
      .artist-actions-row > form {
        flex: 1 1 calc(50% - 4px) !important;
        justify-content: center !important;
        min-height: 38px !important;
        font-size: 11.5px !important;
        padding: 8px 10px !important;
      }

      .artist-actions-row > form > button {
        width: 100% !important;
        justify-content: center !important;
      }

      #playlist-owner-actions {
        width: 100% !important;
        display: flex !important;
        gap: 8px !important;
      }

      #playlist-owner-actions .btn-secondary {
        flex: 1 1 calc(50% - 4px) !important;
        justify-content: center !important;
        padding: 8px 6px !important;
        font-size: 11px !important;
        min-height: 38px !important;
      }

      /* ۴. بهینه‌سازی لیست آهنگ‌ها (.track-row) برای خوانایی کامل نام آهنگ در موبایل */
      .track-row {
        grid-template-columns: 18px 42px 1fr auto !important;
        gap: 8px !important;
        padding: 8px 8px !important;
        min-height: 54px !important;
      }

      .track-num {
        font-size: 11.5px !important;
      }

      .track-thumb {
        width: 42px !important;
        height: 42px !important;
        border-radius: 8px !important;
      }

      .track-name {
        font-size: 13px !important;
      }

      .track-artist {
        font-size: 11px !important;
      }

      .track-actions-cell {
        gap: 2px !important;
      }

      .action-icon-btn {
        width: 28px !important;
        height: 28px !important;
      }

      /* ۵. مرتب‌سازی کپسول‌های آماری پروفایل و مودال ساخت پلی‌لیست در موبایل */
      .profile-stats-row {
        gap: 6px !important;
        justify-content: center !important;
      }

      .profile-stat-pill {
        font-size: 11px !important;
        padding: 4px 10px !important;
      }

      #modal-create-playlist .modal-glass-box {
        padding: 16px !important;
      }

      #modal-create-playlist div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
      }
    }

    /* تنظیمات تکمیلی برای گوشی‌های با صفحه نمایش کوچک‌تر (زیر ۳۸۰ پیکسل) */
    @media (max-width: 380px) {
      .grid-container:not(.mobile-carousel-row) {
        gap: 8px !important;
      }
      .track-row {
        grid-template-columns: 40px 1fr auto !important;
      }
      .track-num, .track-row.playing .equalizer-wave {
        display: none !important;
      }
    }
    #playlist-owner-actions[style*="inline-flex"] {
        width: 100% !important;
        display: flex !important;
        gap: 8px !important;
      }

      /* ==========================================================================
       دکمه شناور پشتیبانی و شبکه‌های اجتماعی (تلگرام و اینستاگرام)
       ========================================================================== */
    .floating-social-wrap {
      position: fixed;
      bottom: calc(var(--mini-player-h) + 18px);
      left: 24px;
      z-index: 55;
      direction: rtl;
    }

    .floating-social-btn {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: var(--surface-glass-heavy);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--border-brand);
      color: var(--brand);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: var(--shadow-md), 0 0 18px var(--brand-glow-lg);
      transition: all var(--transition-normal);
      position: relative;
    }

    .floating-social-btn:hover {
      transform: translateY(-3px) scale(1.04);
      background: var(--brand);
      color: #052410;
      box-shadow: 0 8px 25px var(--brand-glow);
    }

    .floating-social-btn .icon-close {
      display: none;
    }

    .floating-social-wrap.open .floating-social-btn {
      background: var(--surface-elevated);
      color: var(--text);
      border-color: var(--border-light);
      box-shadow: var(--shadow-sm);
    }

    .floating-social-wrap.open .floating-social-btn .icon-support {
      display: none;
    }

    .floating-social-wrap.open .floating-social-btn .icon-close {
      display: block;
    }

    /* پاپ‌آپ شیشه‌ای منوی شبکه‌های اجتماعی */
    .floating-social-menu {
      position: absolute;
      bottom: calc(100% + 12px);
      left: 0;
      width: 235px;
      background: var(--surface-glass-heavy);
      backdrop-filter: blur(28px);
      -webkit-backdrop-filter: blur(28px);
      border: 1px solid var(--border-light);
      border-radius: var(--radius-md);
      padding: 10px;
      box-shadow: var(--shadow-lg), 0 0 24px rgba(0, 0, 0, 0.6);
      display: flex;
      flex-direction: column;
      gap: 6px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(12px) scale(0.94);
      transform-origin: bottom left;
      transition: all var(--transition-normal);
      pointer-events: none;
    }

    .floating-social-wrap.open .floating-social-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0) scale(1);
      pointer-events: auto;
    }

    .social-menu-header {
      font-size: 11px;
      font-weight: 700;
      color: var(--muted);
      padding: 2px 6px 6px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 2px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .social-menu-header span.dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--brand);
      box-shadow: 0 0 8px var(--brand);
    }

    .social-menu-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 8px 10px;
      border-radius: 12px;
      text-decoration: none;
      color: var(--text);
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid transparent;
      transition: all var(--transition-fast);
    }

    .social-menu-item:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--border-light);
      transform: translateX(3px);
    }

    .social-icon-box {
      width: 34px;
      height: 34px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      color: #fff;
    }

    .social-icon-box.telegram {
      background: linear-gradient(135deg, #2AABEE 0%, #229ED9 100%);
      box-shadow: 0 4px 12px rgba(34, 158, 217, 0.35);
    }

    .social-icon-box.instagram {
      background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
      box-shadow: 0 4px 12px rgba(220, 39, 67, 0.35);
    }

    .social-item-info {
      display: flex;
      flex-direction: column;
      min-width: 0;
      flex: 1;
    }

    .social-item-title {
      font-size: 12.5px;
      font-weight: 800;
      color: var(--text);
      line-height: 1.3;
    }

    .social-item-handle {
      font-size: 11px;
      color: var(--muted);
      direction: ltr;
      text-align: right;
      font-family: monospace, sans-serif !important;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    /* تنظیم موقعیت در موبایل برای تداخل نداشتن با مینی‌پلیر و منوی پایین */
    @media (max-width: 768px) {
      .floating-social-wrap {
        bottom: calc(var(--mobile-nav-h) + env(safe-area-inset-bottom, 0px) + 76px);
        left: 14px;
      }

      .floating-social-btn {
        width: 40px;
        height: 40px;
      }

      .floating-social-menu {
        width: 215px;
      }
    }
    /* ==========================================================================
   بنر مینیمال حمایت مالی (اول صفحه اصلی - #view-home)
   ========================================================================== */
.support-hero-card {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  padding: 16px 22px;
  margin-bottom: 24px;
  border-radius: var(--radius-md);
  background: 
    radial-gradient(circle at 92% 50%, rgba(16, 185, 84, 0.14) 0%, transparent 55%),
    linear-gradient(135deg, rgba(22, 22, 34, 0.75) 0%, rgba(14, 14, 23, 0.88) 100%);
  border: 1px solid rgba(16, 185, 84, 0.3);
  box-shadow: var(--shadow-sm);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  transition: all var(--transition-normal);
}

.support-hero-card:hover {
  border-color: var(--border-brand);
  box-shadow: var(--shadow-md), 0 0 22px rgba(16, 185, 84, 0.12);
}

.support-content-col {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  min-width: 0;
  flex: 1;
}

.support-mini-icon {
  width: 40px;
  height: 40px;
  border-radius: 12px;
  background: var(--brand-dim);
  border: 1px solid var(--border-brand);
  color: var(--brand);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  margin-top: 2px;
}

.support-text-body {
  display: flex;
  flex-direction: column;
  gap: 4px;
  min-width: 0;
}

.support-title-row {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
}

.support-main-title {
  font-size: 14.5px;
  font-weight: 800;
  color: var(--text);
  line-height: 1.4;
}

.support-main-title span.highlight {
  color: var(--brand);
}

.support-live-badge {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  background: rgba(16, 185, 84, 0.1);
  border: 1px solid rgba(16, 185, 84, 0.28);
  color: var(--brand);
  font-size: 10.5px;
  font-weight: 700;
  padding: 1px 8px;
  border-radius: var(--radius-full);
}

.support-live-dot {
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: var(--brand);
  box-shadow: 0 0 6px var(--brand);
}

.support-desc-text {
  font-size: 12px;
  color: var(--muted);
  line-height: 1.65;
}

.btn-donate-minimal {
  background: var(--brand);
  color: #052410 !important;
  font-size: 12.5px;
  font-weight: 800;
  padding: 0 20px;
  height: 40px;
  border-radius: var(--radius-full);
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  white-space: nowrap;
  flex-shrink: 0;
  box-shadow: 0 4px 14px var(--brand-glow-lg);
  transition: all var(--transition-fast);
}

.btn-donate-minimal:hover {
  background: var(--brand-hover);
  transform: translateY(-1px);
  box-shadow: 0 6px 18px var(--brand-glow);
}

/* واکنش‌گرایی در موبایل و تبلت */
@media (max-width: 768px) {
  .support-hero-card {
    flex-direction: column;
    align-items: stretch;
    padding: 14px;
    gap: 12px;
    margin-bottom: 18px;
    border-radius: 14px;
  }

  .support-content-col {
    gap: 10px;
  }

  .support-mini-icon {
    width: 34px;
    height: 34px;
    border-radius: 10px;
  }

  .support-main-title {
    font-size: 13px;
  }

  .support-desc-text {
    font-size: 11.5px;
    line-height: 1.6;
  }

  .btn-donate-minimal {
    width: 100%;
    height: 38px;
    font-size: 12px;
  }
}
  </style>
</head>
<body>
  <div id="app">
    <div class="sidebar-backdrop" id="sidebar-backdrop" onclick="toggleMobileMenu()"></div>
    <!-- سایدبار ناوبری دسکتاپ -->
    <aside class="sidebar" id="sidebar">
      <a class="brand-header" onclick="switchView('home')" title="سهپاتیفای — صفحه اصلی">
        <div class="brand-logo-wrap">
          <img src="/logo.png" class="brand-logo-svg" alt="Sehpatify Logo" />
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
          <a class="nav-link" id="nav-albums" onclick="switchView('albums')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
            <span>آلبوم‌ها</span>
            <span class="badge-count" id="nav-albums-count">۰</span>
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
          <a class="nav-link" id="nav-profile" onclick="switchView('profile')">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            <span>تنظیمات حساب من</span>
          </a>
        </li>
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
        <div class="topbar-mobile-logo">
          <!-- دکمه باز کردن منوی کامل در موبایل -->
          <button onclick="toggleMobileMenu()" style="width:36px; height:36px; border-radius:9px; background:rgba(255,255,255,0.06); border:1px solid var(--border); color:var(--text); display:flex; align-items:center; justify-content:center; cursor:pointer;">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
          <div class="brand-logo-wrap" onclick="switchView('home')">
            <img src="/logo.png" class="brand-logo-svg" alt="Sehpatify Logo" />
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

        <!-- دکمه پروفایل و وضعیت ورود کاربر -->
        <div class="topbar-actions">
          @auth
            <div style="display:flex; align-items:center; gap:8px;">
              <button type="button" onclick="switchView('profile')" style="cursor:pointer; font-size:12px; font-weight:700; color:var(--brand); background:var(--brand-dim); border:1px solid var(--border-brand); padding:6px 14px; border-radius:var(--radius-full); display:flex; align-items:center; gap:6px; transition:var(--transition-fast);" title="مشاهده و ویرایش پروفایل">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <span id="topbar-username-label">{{ auth()->user()->username ?? auth()->user()->name }}</span>
              </button>
              <form action="/auth/logout" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="user-pill-badge" title="خروج از حساب کاربری">
                  <div class="user-avatar-dot" style="color:#f87171;">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                  </div>
                </button>
              </form>
            </div>
          @else
            <a href="/auth" class="user-pill-badge" id="user-profile-btn" title="ورود / ثبت‌نام">
              <div class="user-avatar-dot">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
              </div>
            </a>
          @endauth
        </div>
      </header>

      <!-- نوار کپسولی دسترسی سریع به تمام صفحات در موبایل -->
      <div class="mobile-quick-pills">
        <button class="quick-pill-item active" id="pill-home" onclick="switchView('home')">خانه</button>
        <button class="quick-pill-item" id="pill-all-tracks" onclick="switchView('all-tracks')">تمام آهنگ‌ها</button>
        <button class="quick-pill-item" id="pill-albums" onclick="switchView('albums')">آلبوم‌ها</button>
        <button class="quick-pill-item" id="pill-discover" onclick="switchView('discover')">سبک‌ها و ژانرها</button>
        <button class="quick-pill-item" id="pill-artists" onclick="switchView('artists')">هنرمندان</button>
        <button class="quick-pill-item" id="pill-playlists" onclick="switchView('playlists')">پلی‌لیست‌ها</button>
        <button class="quick-pill-item" id="pill-favorites" onclick="switchView('favorites')">موردعلاقه‌ها</button>
        <button class="quick-pill-item" id="pill-profile" onclick="switchView('profile')">حساب کاربری</button>
      </div>

      <div class="content-viewport" id="viewport">

        <!-- VIEW 1: HOME -->
        <section class="view-panel active" id="view-home">
          <!-- بنر مینیمال حمایت مالی از سهپاتیفای -->
          <div class="support-hero-card">
            <div class="support-content-col">
              <div class="support-mini-icon">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
              </div>
              <div class="support-text-body">
                <div class="support-title-row">
                  <h2 class="support-main-title">
                    همراهی در نگهداری و ارتقای <span class="highlight">سهپاتیفای</span>
                  </h2>
                  <span class="support-live-badge">
                    <span class="support-live-dot"></span>
                    <span>حمایت مردمی</span>
                  </span>
                </div>
                <p class="support-desc-text">
                  سهپاتیفای بدون تبلیغات و کاملاً رایگان در اختیار شماست. برای تأمین هزینه‌های نگهداری سرور، ترافیک دانلود و ارائه خدمات بهتر، خوشحال می‌شویم با هر مبلغی که برایتان مقدور است ما را یاری کنید.
                </p>
              </div>
            </div>

            <a href="https://daramet.com/sehpatify" target="_blank" rel="noopener noreferrer" class="btn-donate-minimal">
              <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
              </svg>
              <span>حمایت مالی (دونیت)</span>
            </a>
          </div>
          <!-- پلی‌لیست‌های برگزیده -->
          <div class="section-header">
            <h2 class="section-title">پلی‌لیست‌های برگزیده</h2>
            <a class="section-see-all" onclick="switchView('playlists')">مشاهده همه</a>
          </div>
          <div class="grid-container mobile-carousel-row" id="home-playlists-grid"></div>

          <!-- پیشنهادها -->
          <div class="section-header">
            <h2 class="section-title">پیشنهادی برای تو</h2>
            <a class="section-see-all" onclick="switchView('all-tracks')">مشاهده همه</a>
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
          <!-- آلبوم‌های برگزیده -->
          <div class="section-header">
            <h2 class="section-title">آلبوم‌های برگزیده و رسمی</h2>
            <a class="section-see-all" onclick="switchView('albums')">مشاهده همه</a>
          </div>
          <div class="grid-container mobile-carousel-row" id="home-albums-grid"></div>
          <!-- ژانرها و سبک‌های موسیقی در صفحه اصلی -->
          <div class="section-header">
            <h2 class="section-title">سبک‌ها و ژانرهای برگزیده</h2>
            <a class="section-see-all" onclick="switchView('discover')">مشاهده همه</a>
          </div>
          <div class="grid-container mobile-carousel-row" id="home-genres-grid"></div>
          <!-- هنرمندان منتخب -->
          <div class="section-header">
            <h2 class="section-title">هنرمندان منتخب و جریان‌ساز</h2>
            <a class="section-see-all" onclick="switchView('artists')">مشاهده همه</a>
          </div>
          <div class="grid-container mobile-carousel-row" id="home-artists-grid"></div>
        </section>

       <!-- VIEW: ALL TRACKS -->
        <section class="view-panel" id="view-all-tracks">
          <div class="section-header page-top-header">
            <div class="page-header-text">
              <h2 class="section-title">تمام قطعات و ترانه‌ها</h2>
              <p class="section-subtitle">آرشیو کامل قطعات صوتی با امکان دانلود و پخش آنلاین</p>
            </div>
            <div class="page-header-actions">
              <button class="btn-brand btn-header-action" onclick="playDefaultQueue()">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                <span>پخش همه</span>
              </button>
              <button class="btn-secondary btn-header-action" onclick="switchView('home')">
                <span>بازگشت به خانه</span>
              </button>
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
          <div class="section-header page-top-header">
            <div class="page-header-text">
              <h2 class="section-title">تمام هنرمندان و خوانندگان پلتفرم</h2>
              <p class="section-subtitle">برای مشاهده پروفایل و تمام ترانه‌ها روی خواننده مورد نظر کلیک کنید</p>
            </div>
          </div>
          <div class="grid-container" id="artists-page-grid"></div>
        </section>

        <!-- VIEW: ALL ALBUMS -->
        <section class="view-panel" id="view-albums">
          <div class="section-header page-top-header">
            <div class="page-header-text">
              <h2 class="section-title">تمام آلبوم‌های موسیقی</h2>
              <p class="section-subtitle">آرشیو رسمی آلبوم‌های منتشر شده هنرمندان</p>
            </div>
           
          </div>
          <div class="grid-container" id="albums-page-grid"></div>
        </section>

        <!-- VIEW: ALBUM DETAIL -->
        <section class="view-panel" id="view-album">
          <div class="artist-header-box playlist-header-box">
            <div class="playlist-cover-lg">
              <img id="album-page-img" src="" alt="کاور آلبوم" />
            </div>
            <div class="artist-info-col">
              <span class="artist-verified-tag">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                آلبوم رسمی سهپاتیفای
              </span>
              <h1 class="artist-name-title" id="album-page-name">عنوان آلبوم</h1>
              <p class="artist-header-desc" id="album-page-desc"></p>
              <div class="artist-meta-txt">
                <span id="album-page-artist" style="color:var(--brand); font-weight:700;">نام هنرمند</span>
                <span class="meta-bullet">•</span>
                <span id="album-page-year">سال انتشار</span>
                <span class="meta-bullet">•</span>
                <span id="album-page-genre">سبک موسیقی</span>
                <span class="meta-bullet">•</span>
                <span id="album-page-track-count">۰ قطعه صوتی</span>
              </div>
              <div class="artist-actions-row">
                <button class="btn-brand" onclick="playAllAlbumTracks()">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>پخش تمام آلبوم</span>
                </button>
                <button class="btn-secondary" onclick="switchView('albums')">
                  <span>لیست آلبوم‌ها</span>
                </button>
              </div>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">قطعات این آلبوم</h2>
          </div>
          <div class="track-list" id="album-tracks-list"></div>
        </section>
        <!-- VIEW: GENRE DETAIL -->
        <section class="view-panel" id="view-genre">
          <div class="artist-header-box playlist-header-box">
            <div class="playlist-cover-lg">
              <img id="genre-page-img" src="" alt="کاور سبک" />
            </div>
            <div class="artist-info-col">
              <span class="artist-verified-tag">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                سبک موسیقی سهپاتیفای
              </span>
              <h1 class="artist-name-title" id="genre-page-name">نام سبک</h1>
              <p class="artist-header-desc">مجموعه برترین قطعات و ترانه‌های اختصاصی منتشر شده در این ژانر صوتی</p>
              <div class="artist-meta-txt">
                <span id="genre-page-track-count">۰ قطعه صوتی</span>
                <span class="meta-bullet">•</span>
                <span>سهپاتیفای استودیو</span>
              </div>
              <div class="artist-actions-row">
                <button class="btn-brand" onclick="playAllGenreTracks()">
                  <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                  <span>پخش تمام قطعات این سبک</span>
                </button>
                <button class="btn-secondary" onclick="switchView('discover')">
                  <span>بازگشت به سبک‌ها</span>
                </button>
              </div>
            </div>
          </div>

          <div class="section-header">
            <h2 class="section-title">قطعات این سبک</h2>
          </div>
          <div class="track-list" id="genre-tracks-list"></div>
        </section>
        <!-- VIEW 4: SEARCH -->
        <section class="view-panel" id="view-search">
          <div class="section-header">
            <h2 class="section-title">جستجو در گنجینه سهپاتیفای</h2>
          </div>
          <div class="search-tags-row" style="display:flex; gap:8px; margin-bottom:18px; overflow-x:auto; padding-bottom:4px;">
            <button class="btn-secondary active" id="search-tag-all" onclick="setSearchFilter('all', this)">همه</button>
            <button class="btn-secondary" id="search-tag-tracks" onclick="setSearchFilter('tracks', this)">آهنگ‌ها</button>
            <button class="btn-secondary" id="search-tag-albums" onclick="setSearchFilter('albums', this)">آلبوم‌ها</button>
            <button class="btn-secondary" id="search-tag-artists" onclick="setSearchFilter('artists', this)">هنرمندان</button>
            <button class="btn-secondary" id="search-tag-playlists" onclick="setSearchFilter('playlists', this)">پلی‌لیست‌ها</button>
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
                <!-- دکمه‌های مخصوص صاحب پلی‌لیست برای ویرایش آهنگ‌ها/نام و حذف -->
                <div id="playlist-owner-actions" style="display:none; gap:10px; flex-wrap:wrap;">
                  <button class="btn-secondary" onclick="openEditUserPlaylistModal()">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    <span>ویرایش پلی‌لیست و آهنگ‌ها</span>
                  </button>
                  <button class="btn-secondary" onclick="deleteCurrentUserPlaylist()" style="color:#f87171; border-color:rgba(248,113,113,0.35);">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    <span>حذف پلی‌لیست</span>
                  </button>
                </div>
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

          <!-- بخش مجزای آلبوم‌های این هنرمند -->
          <div class="section-header" style="align-items:center;">
            <h2 class="section-title">آلبوم‌های رسمی این هنرمند</h2>
            <span class="artist-section-badge" id="artist-albums-count-badge">۰ آلبوم</span>
          </div>
          <div class="grid-container mobile-carousel-row" id="artist-albums-grid" style="margin-bottom: 28px;"></div>

          <!-- بخش ترانه‌های این هنرمند -->
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
        <!-- VIEW 10: USER PROFILE & ACCOUNT SETTINGS -->
        <section class="view-panel" id="view-profile">
          @auth
            <!-- هدر پروفایل کاربر -->
            <div class="artist-header-box">
              <div class="artist-avatar-lg" style="background: linear-gradient(135deg, #10B954 0%, #063d1b 100%); display:flex; align-items:center; justify-content:center; font-size:58px; font-weight:900; color:#fff; text-transform:uppercase;">
                <span id="profile-avatar-char">{{ mb_substr(auth()->user()->username ?? auth()->user()->name, 0, 1) }}</span>
              </div>
              <div class="artist-info-col">
                <span class="artist-verified-tag">
                  <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                  <span>{{ auth()->user()->role === 'مدیر' ? 'مدیر ارشد سیستم' : 'کاربر رسمی سهپاتیفای' }}</span>
                </span>
                <h1 class="artist-name-title" id="profile-header-name">{{ auth()->user()->name }}</h1>
                <p class="artist-header-desc" id="profile-header-sub" style="direction:ltr; text-align:right;">
                  {{ '@' . (auth()->user()->username ?? 'user') }} • {{ auth()->user()->email }}
                </p>

                <div class="profile-stats-row">
                  <div class="profile-stat-pill">
                    <span>آهنگ‌های موردعلاقه:</span>
                    <strong id="profile-stat-favs">۰</strong>
                  </div>
                  <div class="profile-stat-pill">
                    <span>پلی‌لیست‌های شخصی:</span>
                    <strong id="profile-stat-playlists">۰</strong>
                  </div>
                  <div class="profile-stat-pill">
                    <span>کیفیت استریم:</span>
                    <strong>FLAC 24-bit Lossless</strong>
                  </div>
                </div>

                <div class="artist-actions-row" style="margin-top:10px;">
                  @if(auth()->user()->role === 'مدیر')
                    <a href="/admin" class="btn-brand" style="text-decoration:none;">
                      <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                      <span>ورود به پنل مدیریت (Studio)</span>
                    </a>
                  @endif
                  <form action="/auth/logout" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="btn-secondary" style="color:#f87171; border-color:rgba(248,113,113,0.3);">
                      <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                      <span>خروج از حساب</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <!-- گرید دو ستونه فرم‌های ویرایش اطلاعات و تغییر رمز -->
            <div class="profile-grid-layout">
              
              <!-- کارت ۱: ویرایش مشخصات فردی -->
              <form class="profile-glass-card" onsubmit="submitUserProfileUpdate(event)">
                <div class="profile-card-head">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                  <span>ویرایش اطلاعات شخصی</span>
                </div>

                <div class="profile-alert-box" id="profile-info-alert"></div>

                <div class="profile-field-group">
                  <label class="profile-field-label">نام نمایشی</label>
                  <input type="text" class="profile-input" id="prof-name" value="{{ auth()->user()->name }}" required />
                </div>

                <div class="profile-field-group">
                  <label class="profile-field-label">
                    <span>نام کاربری (Username)</span>
                    <span style="font-size:10.5px; color:var(--muted-dark);">حروف انگلیسی و اعداد</span>
                  </label>
                  <input type="text" class="profile-input ltr-input" id="prof-username" value="{{ auth()->user()->username }}" required />
                </div>

                <div class="profile-field-group">
                  <label class="profile-field-label">آدرس ایمیل</label>
                  <input type="email" class="profile-input ltr-input" id="prof-email" value="{{ auth()->user()->email }}" required />
                </div>

                <div class="profile-field-group">
                  <label class="profile-field-label">شماره موبایل</label>
                  <input type="tel" class="profile-input ltr-input" id="prof-phone" maxlength="11" value="{{ auth()->user()->phone }}" placeholder="09123456789" required />
                </div>

                <button type="submit" class="btn-brand" id="btn-save-profile-info" style="justify-content:center; margin-top:6px;">
                  <span>ذخیره تغییرات پروفایل</span>
                </button>
              </form>

              <!-- کارت ۲: تغییر رمز عبور و امنیت -->
              <form class="profile-glass-card" onsubmit="submitUserPasswordUpdate(event)">
                <div class="profile-card-head">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                  <span>تغییر رمز عبور و امنیت</span>
                </div>

                <div class="profile-alert-box" id="profile-pass-alert"></div>

                <div class="profile-field-group">
                  <label class="profile-field-label">رمز عبور فعلی</label>
                  <input type="password" class="profile-input ltr-input" id="prof-current-password" placeholder="••••••••" required />
                </div>

                <div class="profile-field-group">
                  <label class="profile-field-label">
                    <span>رمز عبور جدید</span>
                    <span style="font-size:10.5px; color:var(--muted-dark);">حداقل ۶ کاراکتر</span>
                  </label>
                  <input type="password" class="profile-input ltr-input" id="prof-new-password" placeholder="••••••••" required />
                </div>

                <div class="profile-field-group">
                  <label class="profile-field-label">تکرار رمز عبور جدید</label>
                  <input type="password" class="profile-input ltr-input" id="prof-confirm-password" placeholder="••••••••" required />
                </div>

                <button type="submit" class="btn-brand" id="btn-save-profile-pass" style="justify-content:center; margin-top:auto;">
                  <span>بروزرسانی رمز عبور</span>
                </button>
              </form>

            </div>

            <!-- کارت ۳: تنظیمات کاربردی حساب و حافظه -->
            <div class="profile-glass-card">
              <div class="profile-card-head">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                <span>تنظیمات پخش و مدیریت داده‌های شخصی</span>
              </div>
              <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
                <div>
                  <div style="font-weight:700; font-size:13.5px; color:var(--text);">پاک‌سازی پلی‌لیست‌های شخصی مرورگر</div>
                  <div style="font-size:12px; color:var(--muted);">در صورت تمایل می‌توانید پلی‌لیست‌های شخصی ساخته‌شده در این دستگاه را بازنشانی کنید.</div>
                </div>
                <button type="button" class="btn-secondary" onclick="clearAllCustomUserPlaylists()" style="color:#f87171; border-color:rgba(248,113,113,0.3);">
                  <span>حذف پلی‌لیست‌های شخصی</span>
                </button>
              </div>
            </div>
          @else
            <div class="profile-glass-card" style="text-align:center; align-items:center; padding:48px 20px;">
              <div style="width:64px; height:64px; border-radius:50%; background:var(--brand-dim); border:1px solid var(--border-brand); color:var(--brand); display:flex; align-items:center; justify-content:center; margin-bottom:10px;">
                <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              </div>
              <h3 style="font-size:18px; font-weight:800;">وارد حساب کاربری خود نشده‌اید</h3>
              <p style="font-size:13px; color:var(--muted); max-width:360px;">برای مدیریت اطلاعات شخصی، تغییر رمز عبور و دسترسی کامل به امکانات حساب، وارد شوید.</p>
              <a href="/auth" class="btn-brand" style="text-decoration:none; margin-top:8px;">ورود / ثبت‌نام در سهپاتیفای</a>
            </div>
          @endauth
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

    <!-- مودال ساخت و ویرایش پلی‌لیست شخصی (همراه با انتخابگر آهنگ‌ها) -->
    <div class="modal-overlay" id="modal-create-playlist">
      <div class="modal-glass-box" style="max-width: 540px; max-height: 90vh; overflow-y: auto;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
          <h3 style="font-size:16px; font-weight:800;" id="custom-playlist-modal-title">ساخت پلی‌لیست شخصی جدید</h3>
          <button class="action-icon-btn" onclick="closeCreatePlaylistModal()">✕</button>
        </div>
        <p style="font-size:11.5px; color:var(--muted); margin-bottom:14px;">هر حساب کاربری می‌تواند تا ۱۰ پلی‌لیست شخصی بسازد (فقط برای شما قابل نمایش است مگر آنکه مدیریت آن را به اشتراک بگذارد).</p>

        <input type="hidden" id="custom-playlist-id" value="" />

        <div style="display:flex; flex-direction:column; gap:12px;">
          <div>
            <label style="font-size:11.5px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">نام پلی‌لیست *</label>
            <input type="text" id="custom-playlist-title" class="search-input" style="padding:10px 14px; border-radius:10px;" placeholder="مثال: شب‌های بارانی..." />
          </div>

          <div>
            <label style="font-size:11.5px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">توضیحات کوتاه</label>
            <input type="text" id="custom-playlist-desc" class="search-input" style="padding:10px 14px; border-radius:10px;" placeholder="توضیحات درباره حال و هوای این پلی‌لیست..." />
          </div>

          <div style="display:grid; grid-template-columns: 1fr 1fr; gap:10px;">
            <div>
              <label style="font-size:11.5px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">آپلود تصویر کاور</label>
              <input type="file" id="custom-playlist-cover-file" accept="image/*" class="search-input" style="padding:7px 10px; border-radius:10px; font-size:11.5px;" />
            </div>
            <div>
              <label style="font-size:11.5px; font-weight:700; color:var(--muted); display:block; margin-bottom:4px;">یا لینک تصویر کاور</label>
              <input type="text" id="custom-playlist-cover-url" class="search-input" style="padding:10px 12px; border-radius:10px; direction:ltr; text-align:left;" placeholder="https://..." />
            </div>
          </div>

          <!-- انتخاب و حذف آهنگ‌ها از قطعات موجود در پلتفرم -->
          <div style="margin-top:4px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
              <label style="font-size:12px; font-weight:800; color:var(--brand);">انتخاب آهنگ‌های داخل پلی‌لیست:</label>
              <span style="font-size:11px; color:var(--muted);" id="custom-playlist-selected-count">۰ آهنگ انتخاب شده</span>
            </div>
            <input type="text" id="custom-playlist-tracks-search" class="search-input" style="padding:8px 14px; border-radius:10px; font-size:12px; margin-bottom:8px;" placeholder="جستجوی سریع نام آهنگ یا خواننده..." oninput="filterUserPlaylistTracksPicker(this.value)" />
            
            <div id="custom-playlist-tracks-picker" style="max-height:190px; overflow-y:auto; background:rgba(255,255,255,0.03); border:1px solid var(--border); border-radius:10px; padding:8px; display:flex; flex-direction:column; gap:6px;"></div>
          </div>

          <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:8px;">
            <button type="button" class="btn-secondary" onclick="closeCreatePlaylistModal()">انصراف</button>
            <button type="button" class="btn-brand" id="btn-save-custom-playlist" onclick="saveCustomPlaylist()">ذخیره پلی‌لیست</button>
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
    <!-- ویجت شناور پشتیبانی و شبکه‌های اجتماعی -->
    <div class="floating-social-wrap" id="floating-social-wrap">
      <div class="floating-social-menu">
        <div class="social-menu-header">
          <span>شبکه‌های اجتماعی و پشتیبانی</span>
          <span class="dot"></span>
        </div>

        <!-- لینک کانال تلگرام -->
        <a href="https://t.me/sehpatify" target="_blank" rel="noopener noreferrer" class="social-menu-item">
          <div class="social-icon-box telegram">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
              <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
            </svg>
          </div>
          <div class="social-item-info">
            <span class="social-item-title">کانال تلگرام</span>
            <span class="social-item-handle">@sehpatify</span>
          </div>
        </a>

        <!-- لینک پیج اینستاگرام -->
        <a href="https://www.instagram.com/sehpatify.ir?xtok=cmJ0NXZ5NWwxZms4" target="_blank" rel="noopener noreferrer" class="social-menu-item">
          <div class="social-icon-box instagram">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </div>
          <div class="social-item-info">
            <span class="social-item-title">صفحه اینستاگرام</span>
            <span class="social-item-handle">@sehpatify.ir</span>
          </div>
        </a>
      </div>

      <!-- دکمه اصلی شناور با آیکون هدست پشتیبانی -->
      <button type="button" class="floating-social-btn" onclick="toggleSocialFloat(event)" title="پشتیبانی و شبکه‌های اجتماعی">
        <svg class="icon-support" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 18v-6a9 9 0 0118 0v6"></path>
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
        </svg>
        <svg class="icon-close" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>
    <div class="toast-container" id="toast-shelf"></div>
  </div>

  <script>
    const IS_USER_LOGGED_IN = {{ auth()->check() ? 'true' : 'false' }};
    let realPlayer = new Audio();

    let ALL_TRACKS = [];
    let PLAYLISTS_DB = [];
    let ARTISTS_DB = [];
    let GENRES_DB = [];
    let USER_CUSTOM_PLAYLISTS = [];
    let ALBUMS_DB = [];
    let CURRENT_QUEUE = [];
    let currentQueueIndex = 0;

    let ACTIVE_PLAYLIST = null;
    let ACTIVE_ARTIST = null;
    let ACTIVE_ALBUM = null;
    let ACTIVE_GENRE = null;

    let isPlaying = false;
    let currentSeconds = 0;
    let isShuffle = false;
    let isRepeat = false;
    let shufflePool = [];
    let drawerZIndex = 45;
    let isUserScrubbing = false;
    let currentSearchFilter = 'all';

    // تفکیک پلی‌لیست‌های شخصی اکانت کاربر از کل پلی‌لیست‌های دریافتی دیتابیس
    function syncUserAndPublicPlaylists() {
      USER_CUSTOM_PLAYLISTS = (PLAYLISTS_DB || []).filter(p => p.is_mine);
    }

    function onSearchInputFocus() {
      if (!document.getElementById('view-search')?.classList.contains('active')) {
        switchView('search');
      }
    }

    async function initAppData() {
      localStorage.removeItem('sehpatify_custom_user_playlists');

      try {
        const results = await Promise.allSettled([
          fetch('/api/tracks'),
          fetch('/api/playlists'),
          fetch('/api/artists'),
          fetch('/api/genres'),
          fetch('/api/albums')
        ]);

        if (results[0].status === 'fulfilled' && results[0].value.ok) {
          ALL_TRACKS = await results[0].value.json();
        }
        if (results[1].status === 'fulfilled' && results[1].value.ok) {
          PLAYLISTS_DB = await results[1].value.json();
          syncUserAndPublicPlaylists();
        }
        if (results[2].status === 'fulfilled' && results[2].value.ok) {
          ARTISTS_DB = await results[2].value.json();
        }
        if (results[3].status === 'fulfilled' && results[3].value.ok) {
          GENRES_DB = await results[3].value.json();
        }
        if (results[4].status === 'fulfilled' && results[4].value.ok) {
          ALBUMS_DB = await results[4].value.json();
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

    async function refreshUserPlaylistsFromServer() {
      try {
        const res = await fetch('/api/playlists');
        if (res.ok) {
          PLAYLISTS_DB = await res.json();
          syncUserAndPublicPlaylists();
          renderAppViews();
          updateProfileStatsView();
        }
      } catch (e) {}
    }

    // وضعیت صفحه‌بندی برای تمام لیست‌ها و گریدها
    const PAGINATION_STATE = {};

    function toFaDigits(n) {
      return Number(n || 0).toLocaleString('fa-IR');
    }

    function buildPaginationBarHtml(containerId, currentPage, totalPages, totalItems, handlerName) {
      if (totalPages <= 1) return '';

      let pagesHtml = '';
      const maxVisible = 5;
      let startPage = Math.max(1, currentPage - 2);
      let endPage = Math.min(totalPages, startPage + maxVisible - 1);
      if (endPage - startPage < maxVisible - 1) {
        startPage = Math.max(1, endPage - maxVisible + 1);
      }

      if (startPage > 1) {
        pagesHtml += `<button type="button" class="page-num-btn" onclick="${handlerName}('${containerId}', 1)">${toFaDigits(1)}</button>`;
        if (startPage > 2) pagesHtml += `<span class="page-dots">…</span>`;
      }

      for (let p = startPage; p <= endPage; p++) {
        pagesHtml += `<button type="button" class="page-num-btn ${p === currentPage ? 'active' : ''}" onclick="${handlerName}('${containerId}', ${p})">${toFaDigits(p)}</button>`;
      }

      if (endPage < totalPages) {
        if (endPage < totalPages - 1) pagesHtml += `<span class="page-dots">…</span>`;
        pagesHtml += `<button type="button" class="page-num-btn" onclick="${handlerName}('${containerId}', ${totalPages})">${toFaDigits(totalPages)}</button>`;
      }

      return `
        <div class="pagination-bar" onclick="event.stopPropagation();">
          <div class="pagination-info">
            صفحه <strong>${toFaDigits(currentPage)}</strong> از <strong>${toFaDigits(totalPages)}</strong>
            <span class="pagination-total">(${toFaDigits(totalItems)} مورد)</span>
          </div>
          <div class="pagination-controls">
            <button type="button" class="page-nav-btn" ${currentPage <= 1 ? 'disabled' : ''} onclick="${handlerName}('${containerId}', ${currentPage - 1})">
              <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/></svg>
              <span>قبلی</span>
            </button>
            <div class="page-numbers-wrap">${pagesHtml}</div>
            <button type="button" class="page-nav-btn" ${currentPage >= totalPages ? 'disabled' : ''} onclick="${handlerName}('${containerId}', ${currentPage + 1})">
              <span>بعدی</span>
              <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7"/></svg>
            </button>
          </div>
        </div>
      `;
    }

    // رندر گریدهای صفحه‌بندی شده (۱۲ آیتم در هر صفحه)
    function renderPaginatedGrid(items, containerId, cardBuilder, emptyMsg = 'موردی برای نمایش وجود ندارد.', perPage = 12, page = 1) {
      const container = document.getElementById(containerId);
      if (!container) return;

      if (!items || items.length === 0) {
        container.innerHTML = `<div style="grid-column: 1/-1; text-align:center; padding:30px; color:var(--muted); font-size:13px;">${emptyMsg}</div>`;
        return;
      }

      const totalItems = items.length;
      const totalPages = Math.ceil(totalItems / perPage);
      const safePage = Math.max(1, Math.min(page, totalPages));

      PAGINATION_STATE[containerId] = {
        items,
        cardBuilder,
        emptyMsg,
        perPage,
        page: safePage
      };

      const startIdx = (safePage - 1) * perPage;
      const slicedItems = items.slice(startIdx, startIdx + perPage);

      container.innerHTML = slicedItems.map((item, idx) => cardBuilder(item, startIdx + idx)).join('') +
        buildPaginationBarHtml(containerId, safePage, totalPages, totalItems, 'changeGridPage');
    }

    function changeGridPage(containerId, newPage) {
      const st = PAGINATION_STATE[containerId];
      if (!st) return;
      renderPaginatedGrid(st.items, containerId, st.cardBuilder, st.emptyMsg, st.perPage, newPage);
      const el = document.getElementById(containerId);
      if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function renderAppViews() {
      syncUserAndPublicPlaylists();

      // ۱. پلی‌لیست‌های برگزیده در صفحه اصلی (حداکثر ۱۰ عدد با اسکرول افقی)
      const homePlaylists = document.getElementById('home-playlists-grid');
      const publicPlaylists = PLAYLISTS_DB.filter(p => p.is_public);

      if (homePlaylists) {
        if (publicPlaylists.length === 0) {
          homePlaylists.innerHTML = `<div style="grid-column: 1/-1; text-align:center; padding:24px; color:var(--muted); font-size:12.5px;">هنوز پلی‌لیستی ثبت نشده است.</div>`;
        } else {
          homePlaylists.innerHTML = publicPlaylists.slice(0, 10).map(p => `
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

      // ۲. پیشنهادی برای تو در صفحه اصلی (حداکثر ۱۰ آهنگ با اسکرول افقی)
      const featured = document.getElementById('home-featured-grid');
      if (featured) {
        featured.innerHTML = ALL_TRACKS.slice(0, 10).map((t, idx) => `
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

      // ۳. لیست قطعات برگزیده در صفحه اصلی (۶ قطعه) و صفحه تمام قطعات (صفحه‌بندی ۱۵ تایی)
      renderTracksTableList(ALL_TRACKS.slice(0, 6), 'home-recent-tracks');
      renderTracksTableList(ALL_TRACKS, 'all-tracks-list');

      // ۴. هنرمندان در صفحه اصلی (حداکثر ۱۰ هنرمند) و صفحه کل هنرمندان (صفحه‌بندی ۱۲ تایی)
      const artistsGrid = document.getElementById('home-artists-grid');
      const navArtistsCount = document.getElementById('nav-artists-count');
      if (navArtistsCount) navArtistsCount.textContent = ARTISTS_DB.length;

      const artistCardTemplate = (a) => `
        <div class="music-card artist-card" onclick="openArtistPage('${a.id}')">
          <div class="card-art-box">
            <img class="card-art-img" src="${a.image || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300'}" alt="${escapeHtml(a.name)}" />
          </div>
          <div class="card-title">${escapeHtml(a.name)}</div>
          <div class="card-subtitle">${escapeHtml(a.genre_names || (a.listeners + ' شنونده'))}</div>
        </div>
      `;

      if (artistsGrid) {
        artistsGrid.innerHTML = (ARTISTS_DB && ARTISTS_DB.length > 0)
          ? ARTISTS_DB.slice(0, 10).map(artistCardTemplate).join('')
          : `<div style="grid-column: 1/-1; text-align:center; padding:24px; color:var(--muted); font-size:12.5px;">هنوز هنرمندی در سیستم ثبت نشده است.</div>`;
      }

      renderPaginatedGrid(ARTISTS_DB, 'artists-page-grid', artistCardTemplate, 'هنوز هنرمندی در سیستم ثبت نشده است.', 12, 1);

      // ۵. پلی‌لیست‌ها و کتابخانه من (صفحه‌بندی ۱۲ تایی)
      renderPlaylistsDirectory();

      // ۶. سبک‌ها و ژانرها در صفحه اصلی (حداکثر ۱۰ ژانر) و صفحه اکتشاف (صفحه‌بندی ۱۲ تایی)
      const homeGenresGrid = document.getElementById('home-genres-grid');
      const genreCardTemplate = (g) => `
        <div class="music-card" onclick="openGenrePage('${g.id}')">
          <div class="card-art-box">
            <img class="card-art-img" src="${g.cover || 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=300'}" alt="${escapeHtml(g.name)}" />
            <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
          </div>
          <div class="card-title">${escapeHtml(g.name)}</div>
          <div class="card-subtitle">${g.tracks_count || 0} قطعه صوتی</div>
        </div>
      `;

      if (homeGenresGrid) {
        homeGenresGrid.innerHTML = (GENRES_DB && GENRES_DB.length > 0)
          ? GENRES_DB.slice(0, 10).map(genreCardTemplate).join('')
          : `<div style="grid-column: 1/-1; text-align:center; padding:24px; color:var(--muted); font-size:12.5px;">هنوز سبکی ثبت نشده است.</div>`;
      }

      renderPaginatedGrid(GENRES_DB, 'discover-genres-grid', genreCardTemplate, 'هنوز سبکی ثبت نشده است.', 12, 1);

      // ۷. علاقه‌مندی‌ها
      renderFavoritesView();

      // ۸. آلبوم‌ها در صفحه اصلی (حداکثر ۱۰ آلبوم) و صفحه کل آلبوم‌ها (صفحه‌بندی ۱۲ تایی)
      const homeAlbumsGrid = document.getElementById('home-albums-grid');
      const navAlbumsCount = document.getElementById('nav-albums-count');
      if (navAlbumsCount) navAlbumsCount.textContent = ALBUMS_DB.length;

      const albumCardTemplate = (alb) => `
        <div class="music-card" onclick="openAlbumPage('${alb.id}')">
          <div class="card-art-box">
            <img class="card-art-img" src="${alb.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=300'}" alt="${escapeHtml(alb.title)}" />
            <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
          </div>
          <div class="card-title">${escapeHtml(alb.title)}</div>
          <div class="card-subtitle">${escapeHtml(alb.artist_name || 'نامشخص')} • ${(alb.tracks ? alb.tracks.length : 0)} قطعه</div>
        </div>
      `;

      if (homeAlbumsGrid) {
        homeAlbumsGrid.innerHTML = (ALBUMS_DB && ALBUMS_DB.length > 0)
          ? ALBUMS_DB.slice(0, 10).map(albumCardTemplate).join('')
          : `<div style="grid-column: 1/-1; text-align:center; padding:20px; color:var(--muted);">آلبومی وجود ندارد.</div>`;
      }

      renderPaginatedGrid(ALBUMS_DB, 'albums-page-grid', albumCardTemplate, 'هنوز آلبومی ثبت نشده است.', 12, 1);

      initDesktopCarouselDrag();
    }

    function renderPlaylistsDirectory() {
      syncUserAndPublicPlaylists();
      const counterEl = document.getElementById('user-custom-playlist-counter');
      const navCount = document.getElementById('nav-playlists-count');

      if (navCount) navCount.textContent = PLAYLISTS_DB.length;
      if (counterEl) counterEl.textContent = `پلی‌لیست‌های شخصی شما: ${USER_CUSTOM_PLAYLISTS.length} از ۱۰`;

      const publicPlCard = (p) => `
        <div class="music-card" onclick="openPlaylistPage('${p.id}')">
          <div class="card-art-box">
            <img class="card-art-img" src="${p.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=300'}" alt="${escapeHtml(p.title)}" />
            <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
          </div>
          <div class="card-title">${escapeHtml(p.title)}</div>
          <div class="card-subtitle">${(p.tracks ? p.tracks.length : 0)} قطعه • ${p.is_mine ? (p.is_public ? 'عمومی شما' : 'شخصی شما') : escapeHtml(p.owner_name || 'رسمی')}</div>
        </div>
      `;

      const libraryPlCard = (p) => `
        <div class="music-card" onclick="openPlaylistPage('${p.id}')">
          <div class="card-art-box">
            <img class="card-art-img" src="${p.cover || 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=300'}" alt="${escapeHtml(p.title)}" />
            <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
          </div>
          <div class="card-title">${escapeHtml(p.title)}</div>
          <div class="card-subtitle">${(p.tracks ? p.tracks.length : 0)} قطعه • ${p.is_public ? '🌐 عمومی شده' : '🔒 خصوصی'}</div>
        </div>
      `;

      renderPaginatedGrid(PLAYLISTS_DB, 'playlists-grid', publicPlCard, 'پلی‌لیستی برای نمایش وجود ندارد.', 12, 1);
      renderPaginatedGrid(USER_CUSTOM_PLAYLISTS, 'library-playlists-grid', libraryPlCard, 'شما هنوز پلی‌لیست شخصی نساخته‌اید. روی دکمه «+ ساخت پلی‌لیست شخصی» کلیک کنید.', 12, 1);
    }

    // رندر لیست آهنگ‌ها همراه با صفحه‌بندی خودکار (۱۵ آهنگ در هر صفحه)
    function renderTracksTableList(tracks, containerId, customOnClick = null, page = 1) {
      const container = document.getElementById(containerId);
      if (!container) return;

      if (!tracks || tracks.length === 0) {
        container.innerHTML = `<div style="text-align:center; padding:32px; color:var(--muted); font-size:13px;">قطعه‌ای در این بخش یافت نشد.</div>`;
        return;
      }

      const isHomeRecent = (containerId === 'home-recent-tracks');
      const perPage = isHomeRecent ? 6 : 15;
      const totalItems = tracks.length;
      const totalPages = isHomeRecent ? 1 : Math.ceil(totalItems / perPage);
      const safePage = Math.max(1, Math.min(page, totalPages));

      PAGINATION_STATE[containerId] = {
        items: tracks,
        customOnClick,
        perPage,
        page: safePage
      };

      const startIdx = (safePage - 1) * perPage;
      const pageTracks = tracks.slice(startIdx, startIdx + perPage);

      container.innerHTML = pageTracks.map((t, idx) => {
        const realIdx = startIdx + idx;
        const isCurrentPlaying = (CURRENT_QUEUE[currentQueueIndex]?.id === t.id && isPlaying);
        const clickHandler = customOnClick
          ? `${customOnClick}(${realIdx})`
          : (isHomeRecent ? `playFromTrackList(ALL_TRACKS, ${realIdx})` : `playTrackFromPaginatedList('${containerId}', ${realIdx})`);

        return `
          <div class="track-row ${isCurrentPlaying ? 'playing' : ''}" onclick="${clickHandler}">
            <div class="track-num">${realIdx + 1}</div>
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
      }).join('') + (!isHomeRecent ? buildPaginationBarHtml(containerId, safePage, totalPages, totalItems, 'changeTrackListPage') : '');
    }

    function changeTrackListPage(containerId, newPage) {
      const st = PAGINATION_STATE[containerId];
      if (!st) return;
      renderTracksTableList(st.items, containerId, st.customOnClick, newPage);
      const el = document.getElementById(containerId);
      if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function playTrackFromPaginatedList(containerId, realIdx) {
      const st = PAGINATION_STATE[containerId];
      const list = (st && st.items) ? st.items : ALL_TRACKS;
      playFromTrackList(list, realIdx);
    }

    // قابلیت کشیدن افقی کاروسل‌ها با موس در دسکتاپ (Drag to Scroll)
    function initDesktopCarouselDrag() {
      document.querySelectorAll('.mobile-carousel-row').forEach(row => {
        if (row.dataset.dragBound) return;
        row.dataset.dragBound = 'true';

        let isDown = false;
        let startX;
        let scrollLeft;

        row.addEventListener('mousedown', (e) => {
          isDown = true;
          row.classList.add('dragging');
          startX = e.pageX - row.offsetLeft;
          scrollLeft = row.scrollLeft;
        });

        row.addEventListener('mouseleave', () => {
          isDown = false;
          row.classList.remove('dragging');
        });

        row.addEventListener('mouseup', () => {
          isDown = false;
          row.classList.remove('dragging');
        });

        row.addEventListener('mousemove', (e) => {
          if (!isDown) return;
          e.preventDefault();
          const x = e.pageX - row.offsetLeft;
          const walk = (x - startX) * 1.6;
          row.scrollLeft = scrollLeft - walk;
        });
      });
    }

    async function openPlaylistPage(playlistId) {
      try {
        let playlist = PLAYLISTS_DB.find(p => String(p.id) === String(playlistId));

        try {
          const res = await fetch(`/api/playlists/${playlistId}`);
          if (res.ok) playlist = await res.json();
        } catch (e) {}

        if (!playlist) return;

        ACTIVE_PLAYLIST = playlist;

        document.getElementById('playlist-page-name').textContent = playlist.title;
        document.getElementById('playlist-page-desc').textContent = playlist.desc || 'کالکشن اختصاصی سهپاتیفای';
        document.getElementById('playlist-page-img').src = playlist.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500';
        
        const count = playlist.tracks ? playlist.tracks.length : 0;
        document.getElementById('playlist-page-track-count').textContent = `${count} قطعه صوتی`;

        // نمایش دکمه‌های ویرایش و حذف فقط برای صاحب پلی‌لیست
        const ownerActions = document.getElementById('playlist-owner-actions');
        if (ownerActions) {
          ownerActions.style.display = playlist.is_mine ? 'inline-flex' : 'none';
        }

        renderTracksTableList(playlist.tracks || [], 'playlist-tracks-list', 'playTrackInPlaylist');
        switchView('playlist');
      } catch (err) {}
    }

    function playAllPlaylistTracks() {
      if (!ACTIVE_PLAYLIST || !ACTIVE_PLAYLIST.tracks || ACTIVE_PLAYLIST.tracks.length === 0) return;
      CURRENT_QUEUE = [...ACTIVE_PLAYLIST.tracks];
      currentQueueIndex = 0;
      resetShufflePool();
      playCurrentQueue();
    }

    function playTrackInPlaylist(idx) {
      if (!ACTIVE_PLAYLIST || !ACTIVE_PLAYLIST.tracks) return;
      CURRENT_QUEUE = [...ACTIVE_PLAYLIST.tracks];
      currentQueueIndex = idx;
      resetShufflePool();
      playCurrentQueue();
    }

    // رندر لیست انتخاب آهنگ‌ها در مودال پلی‌لیست شخصی کاربر
    function renderUserPlaylistTracksPicker(selectedTrackIds = []) {
      const container = document.getElementById('custom-playlist-tracks-picker');
      if (!container) return;

      const selectedSet = new Set(selectedTrackIds.map(Number));

      if (!ALL_TRACKS || ALL_TRACKS.length === 0) {
        container.innerHTML = `<div style="text-align:center; padding:14px; color:var(--muted); font-size:12px;">آهنگی در پلتفرم موجود نیست.</div>`;
        return;
      }

      container.innerHTML = ALL_TRACKS.map(t => {
        const checked = selectedSet.has(Number(t.id)) ? 'checked' : '';
        const searchStr = `${t.title || ''} ${t.artist || ''} ${t.album || ''} ${t.search_keywords || ''}`.toLowerCase();
        return `
          <label class="user-pl-track-item" data-search="${escapeHtml(searchStr)}" style="display:flex; align-items:center; justify-content:space-between; gap:10px; padding:6px 8px; border-radius:8px; background:rgba(255,255,255,0.02); cursor:pointer;">
            <div style="display:flex; align-items:center; gap:8px; min-width:0;">
              <input type="checkbox" class="user-pl-track-cb" value="${t.id}" ${checked} onchange="updateUserPlaylistSelectedCount()" style="accent-color:var(--brand); width:16px; height:16px; cursor:pointer;" />
              <img src="${t.cover || ''}" style="width:32px; height:32px; border-radius:6px; object-fit:cover; flex-shrink:0;" />
              <div style="min-width:0;">
                <div style="font-size:12.5px; font-weight:700; color:var(--text); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(t.title)}</div>
                <div style="font-size:10.5px; color:var(--muted); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${escapeHtml(t.artist)}</div>
              </div>
            </div>
            <span style="font-size:11px; color:var(--muted); direction:ltr;">${t.duration || '03:30'}</span>
          </label>
        `;
      }).join('');

      updateUserPlaylistSelectedCount();
    }

    function filterUserPlaylistTracksPicker(query) {
      const q = (query || '').toLowerCase().trim();
      document.querySelectorAll('#custom-playlist-tracks-picker .user-pl-track-item').forEach(item => {
        const s = item.getAttribute('data-search') || '';
        item.style.display = (!q || s.includes(q)) ? 'flex' : 'none';
      });
    }

    function updateUserPlaylistSelectedCount() {
      const c = document.querySelectorAll('.user-pl-track-cb:checked').length;
      const el = document.getElementById('custom-playlist-selected-count');
      if (el) el.textContent = `${c} آهنگ انتخاب شده`;
    }

    function openCreatePlaylistModal() {
      if (!IS_USER_LOGGED_IN) {
        window.location.href = '/auth';
        return;
      }

      syncUserAndPublicPlaylists();
      if (USER_CUSTOM_PLAYLISTS.length >= 10) {
        alert('شما به سقف مجاز ساخت ۱۰ پلی‌لیست شخصی رسیده‌اید.');
        return;
      }

      document.getElementById('custom-playlist-modal-title').textContent = 'ساخت پلی‌لیست شخصی جدید';
      document.getElementById('custom-playlist-id').value = '';
      document.getElementById('custom-playlist-title').value = '';
      document.getElementById('custom-playlist-desc').value = '';
      document.getElementById('custom-playlist-cover-file').value = '';
      document.getElementById('custom-playlist-cover-url').value = '';
      document.getElementById('custom-playlist-tracks-search').value = '';
      document.getElementById('btn-save-custom-playlist').textContent = 'ایجاد پلی‌لیست';

      renderUserPlaylistTracksPicker([]);
      document.getElementById('modal-create-playlist').classList.add('open');
    }

    function openEditUserPlaylistModal() {
      if (!ACTIVE_PLAYLIST || !ACTIVE_PLAYLIST.is_mine) return;

      document.getElementById('custom-playlist-modal-title').textContent = `ویرایش پلی‌لیست: ${ACTIVE_PLAYLIST.title}`;
      document.getElementById('custom-playlist-id').value = ACTIVE_PLAYLIST.id;
      document.getElementById('custom-playlist-title').value = ACTIVE_PLAYLIST.title || '';
      document.getElementById('custom-playlist-desc').value = ACTIVE_PLAYLIST.desc || '';
      document.getElementById('custom-playlist-cover-file').value = '';
      document.getElementById('custom-playlist-cover-url').value = ACTIVE_PLAYLIST.cover || '';
      document.getElementById('custom-playlist-tracks-search').value = '';
      document.getElementById('btn-save-custom-playlist').textContent = 'ذخیره تغییرات';

      const currentTrackIds = ACTIVE_PLAYLIST.tracks ? ACTIVE_PLAYLIST.tracks.map(t => Number(t.id)) : [];
      renderUserPlaylistTracksPicker(currentTrackIds);
      document.getElementById('modal-create-playlist').classList.add('open');
    }

    function closeCreatePlaylistModal() {
      document.getElementById('modal-create-playlist').classList.remove('open');
    }

    async function saveCustomPlaylist() {
      const playlistId = document.getElementById('custom-playlist-id').value;
      const title = document.getElementById('custom-playlist-title').value.trim();
      const desc = document.getElementById('custom-playlist-desc').value.trim();

      if (!title) {
        alert('لطفاً نام پلی‌لیست را وارد کنید.');
        return;
      }

      const btn = document.getElementById('btn-save-custom-playlist');
      btn.disabled = true;
      btn.textContent = 'در حال ذخیره‌سازی...';

      const formData = new FormData();
      formData.append('title', title);
      formData.append('desc', desc);

      const coverFile = document.getElementById('custom-playlist-cover-file');
      if (coverFile.files && coverFile.files[0]) {
        formData.append('cover_file', coverFile.files[0]);
      } else {
        formData.append('cover_url', document.getElementById('custom-playlist-cover-url').value.trim());
      }

      document.querySelectorAll('.user-pl-track-cb:checked').forEach(cb => {
        formData.append('track_ids[]', cb.value);
      });

      const endpoint = playlistId ? `/api/my-playlists/${playlistId}` : '/api/my-playlists';

      try {
        const res = await fetch(endpoint, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: formData
        });

        const data = await res.json();
        if (!res.ok) {
          alert(data.message || 'خطا در ذخیره پلی‌لیست');
          return;
        }

        closeCreatePlaylistModal();
        await refreshUserPlaylistsFromServer();

        if (playlistId) {
          await openPlaylistPage(playlistId);
        }
      } catch (e) {
        alert('خطا در ارتباط با سرور');
      } finally {
        btn.disabled = false;
        btn.textContent = playlistId ? 'ذخیره تغییرات' : 'ایجاد پلی‌لیست';
      }
    }

    async function deleteCurrentUserPlaylist() {
      if (!ACTIVE_PLAYLIST || !ACTIVE_PLAYLIST.is_mine) return;
      if (!confirm(`آیا از حذف پلی‌لیست «${ACTIVE_PLAYLIST.title}» مطمئن هستید؟`)) return;

      try {
        const res = await fetch(`/api/my-playlists/${ACTIVE_PLAYLIST.id}`, {
          method: 'DELETE',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          }
        });

        if (res.ok) {
          ACTIVE_PLAYLIST = null;
          await refreshUserPlaylistsFromServer();
          switchView('library');
        }
      } catch (e) {}
    }

    function openAddToPlaylistModal(trackId, event) {
      if (event) event.stopPropagation();

      if (!IS_USER_LOGGED_IN) {
        window.location.href = '/auth';
        return;
      }

      syncUserAndPublicPlaylists();
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

    async function addTrackToSpecificCustomPlaylist(playlistId) {
      const trackId = document.getElementById('add-to-playlist-track-id').value;

      try {
        const res = await fetch(`/api/my-playlists/${playlistId}/add-track`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({ track_id: trackId })
        });

        const data = await res.json();
        if (!res.ok) {
          alert(data.message || 'خطا در افزودن آهنگ');
        } else {
          await refreshUserPlaylistsFromServer();
        }
      } catch (e) {}

      closeAddToPlaylistModal();
    }

    async function openAlbumPage(albumId) {
      try {
        let album = ALBUMS_DB.find(a => String(a.id) === String(albumId));
        if (!album) {
          const res = await fetch(`/api/albums/${albumId}`);
          if (res.ok) album = await res.json();
        }

        if (!album) return;

        ACTIVE_ALBUM = album;

        if (!album.tracks || album.tracks.length === 0) {
          album.tracks = ALL_TRACKS.filter(t => String(t.album_id) === String(album.id) || (t.album && t.album.trim().toLowerCase() === album.title.trim().toLowerCase()));
        }

        document.getElementById('album-page-name').textContent = album.title;
        document.getElementById('album-page-img').src = album.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500';
        document.getElementById('album-page-desc').textContent = album.description || 'آلبوم رسمی استودیو سهپاتیفای';
        document.getElementById('album-page-artist').textContent = album.artist_name || 'هنرمند رسمی';
        document.getElementById('album-page-year').textContent = album.release_year || 'انتشار جدید';
        document.getElementById('album-page-genre').textContent = album.genre || 'عمومی';
        document.getElementById('album-page-track-count').textContent = `${album.tracks.length} قطعه صوتی`;

        renderTracksTableList(album.tracks, 'album-tracks-list', 'playTrackInAlbum');
        switchView('album');
      } catch (e) {}
    }

    function playAllAlbumTracks() {
      if (!ACTIVE_ALBUM || !ACTIVE_ALBUM.tracks || ACTIVE_ALBUM.tracks.length === 0) return;
      CURRENT_QUEUE = [...ACTIVE_ALBUM.tracks];
      currentQueueIndex = 0;
      resetShufflePool();
      playCurrentQueue();
    }

    function playTrackInAlbum(idx) {
      if (!ACTIVE_ALBUM || !ACTIVE_ALBUM.tracks) return;
      CURRENT_QUEUE = [...ACTIVE_ALBUM.tracks];
      currentQueueIndex = idx;
      resetShufflePool();
      playCurrentQueue();
    }

    function openGenrePage(genreId) {
      const genre = GENRES_DB.find(g => String(g.id) === String(genreId));
      if (!genre) return;

      ACTIVE_GENRE = genre;

      const norm = s => String(s || '').trim().toLowerCase().replace(/ي/g, 'ی').replace(/ك/g, 'ک');
      const gName = norm(genre.name);
      const gSlug = norm(genre.slug);

      const genreTracks = ALL_TRACKS.filter(t => {
        if (t.genre_id && String(t.genre_id) === String(genre.id)) return true;
        if (t.genre) {
          const tGenre = norm(t.genre);
          if (tGenre === gName || (gSlug && tGenre === gSlug) || tGenre.includes(gName) || gName.includes(tGenre)) {
            return true;
          }
        }
        if (t.search_keywords && norm(t.search_keywords).includes(gName)) return true;
        return false;
      });

      genre.tracks = genreTracks;

      document.getElementById('genre-page-name').textContent = genre.name;
      document.getElementById('genre-page-img').src = genre.cover || 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=500';
      document.getElementById('genre-page-track-count').textContent = `${genreTracks.length} قطعه صوتی`;

      renderTracksTableList(genreTracks, 'genre-tracks-list', 'playTrackInGenre');
      switchView('genre');
    }

    function playAllGenreTracks() {
      if (!ACTIVE_GENRE || !ACTIVE_GENRE.tracks || ACTIVE_GENRE.tracks.length === 0) return;
      CURRENT_QUEUE = [...ACTIVE_GENRE.tracks];
      currentQueueIndex = 0;
      resetShufflePool();
      playCurrentQueue();
    }

    function playTrackInGenre(idx) {
      if (!ACTIVE_GENRE || !ACTIVE_GENRE.tracks || !ACTIVE_GENRE.tracks[idx]) return;
      CURRENT_QUEUE = [...ACTIVE_GENRE.tracks];
      currentQueueIndex = idx;
      resetShufflePool();
      playCurrentQueue();
    }

    async function openArtistPage(artistId) {
      try {
        let artist = ARTISTS_DB.find(a => String(a.id) === String(artistId));

        try {
          const res = await fetch(`/api/artists/${artistId}`);
          if (res.ok) artist = await res.json();
        } catch (e) {}

        if (!artist) return;

        ACTIVE_ARTIST = artist;

        if (!artist.tracks || artist.tracks.length === 0) {
          artist.tracks = ALL_TRACKS.filter(t => 
            String(t.artist_id) === String(artist.id) || 
            (t.artist_ids && t.artist_ids.map(String).includes(String(artist.id))) || 
            (t.artist && t.artist.trim().toLowerCase().includes(artist.name.trim().toLowerCase()))
          );
        }

        document.getElementById('artist-page-name').textContent = artist.name;
        document.getElementById('artist-page-img').src = artist.image || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500';
        document.getElementById('artist-page-bio').textContent = artist.bio || 'هنرمند محبوب و رسمی پلتفرم سهپاتیفای';
        document.getElementById('artist-page-listeners').textContent = `${artist.listeners || '۰'} شنونده ماهانه`;
        document.getElementById('artist-page-genres').textContent = artist.genre_names || 'سبک‌های متنوع';

        const badge = document.getElementById('artist-page-badge');
        if (badge) badge.style.display = artist.verified ? 'inline-flex' : 'none';

        const artistAlbums = (ALBUMS_DB || []).filter(alb => 
          String(alb.artist_id) === String(artist.id) || 
          (alb.artist_name && alb.artist_name.trim().toLowerCase() === artist.name.trim().toLowerCase())
        );

        const albumsBadge = document.getElementById('artist-albums-count-badge');
        if (albumsBadge) {
          albumsBadge.textContent = artistAlbums.length > 0 ? `${artistAlbums.length} آلبوم` : 'تک‌آهنگ‌ها';
        }

        const albumsGrid = document.getElementById('artist-albums-grid');
        if (albumsGrid) {
          if (artistAlbums.length > 0) {
            albumsGrid.classList.add('mobile-carousel-row');
            albumsGrid.innerHTML = artistAlbums.map(alb => {
              const tCount = alb.tracks ? alb.tracks.length : (alb.tracks_count || 0);
              const subText = alb.release_year ? `${alb.release_year} • ${tCount} قطعه` : `${tCount} قطعه صوتی`;
              return `
                <div class="music-card" onclick="openAlbumPage('${alb.id}')">
                  <div class="card-art-box">
                    <img class="card-art-img" src="${alb.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=300'}" alt="${escapeHtml(alb.title)}" />
                    <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
                  </div>
                  <div class="card-title">${escapeHtml(alb.title)}</div>
                  <div class="card-subtitle">${escapeHtml(subText)}</div>
                </div>
              `;
            }).join('');
          } else {
            albumsGrid.classList.remove('mobile-carousel-row');
            albumsGrid.innerHTML = `
              <div class="artist-empty-albums">
                <div class="artist-empty-icon">
                  <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9" stroke-width="1.8"></circle>
                    <circle cx="12" cy="12" r="3" stroke-width="1.8"></circle>
                  </svg>
                </div>
                <div class="artist-empty-text">
                  <div class="artist-empty-title">آلبوم مستقلی برای این هنرمند ثبت نشده است</div>
                  <div class="artist-empty-sub">آثار این خواننده به‌صورت تک‌آهنگ منتشر شده و در فهرست زیر قابل پخش هستند.</div>
                </div>
              </div>
            `;
          }
        }

        renderTracksTableList(artist.tracks || [], 'artist-tracks-list', 'playTrackInArtist');
        switchView('artist');
      } catch (err) {}
    }

    function playAllArtistTracks() {
      if (!ACTIVE_ARTIST || !ACTIVE_ARTIST.tracks || ACTIVE_ARTIST.tracks.length === 0) return;
      CURRENT_QUEUE = [...ACTIVE_ARTIST.tracks];
      currentQueueIndex = 0;
      resetShufflePool();
      playCurrentQueue();
    }

    function playTrackInArtist(idx) {
      if (!ACTIVE_ARTIST || !ACTIVE_ARTIST.tracks) return;
      CURRENT_QUEUE = [...ACTIVE_ARTIST.tracks];
      currentQueueIndex = idx;
      resetShufflePool();
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
      if (favs.length === 0) return;
      CURRENT_QUEUE = [...favs];
      currentQueueIndex = 0;
      resetShufflePool();
      playCurrentQueue();
    }

    function playTrackInFavorites(idx) {
      const favs = ALL_TRACKS.filter(t => t.favorited);
      if (favs.length === 0) return;
      CURRENT_QUEUE = [...favs];
      currentQueueIndex = idx;
      resetShufflePool();
      playCurrentQueue();
    }

    async function downloadTrack(trackId, event) {
      if (event) event.stopPropagation();
      const track = ALL_TRACKS.find(t => String(t.id) === String(trackId));
      if (!track) return;

      const audioUrl = track.stream_url || (track.audio_path ? `/api/tracks/${track.id}/stream` : null);
      if (!audioUrl) return;

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
      resetShufflePool();
      playCurrentQueue();
    }

    function playDefaultQueue() {
      if (ALL_TRACKS.length > 0) {
        CURRENT_QUEUE = [...ALL_TRACKS];
        currentQueueIndex = 0;
        resetShufflePool();
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

    function resetShufflePool() {
      if (!CURRENT_QUEUE || CURRENT_QUEUE.length === 0) {
        shufflePool = [];
        return;
      }
      shufflePool = CURRENT_QUEUE.map((_, i) => i).filter(i => i !== currentQueueIndex);
      for (let i = shufflePool.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [shufflePool[i], shufflePool[j]] = [shufflePool[j], shufflePool[i]];
      }
    }

    realPlayer.onended = () => {
      if (isRepeat) {
        seekToSeconds(0);
        playCurrentQueue();
      } else {
        nextTrack();
      }
    };

    function nextTrack() {
      if (!CURRENT_QUEUE || CURRENT_QUEUE.length === 0) return;

      let nextIdx;
      if (isShuffle) {
        if (shufflePool.length === 0) {
          resetShufflePool();
        }
        nextIdx = shufflePool.length > 0 ? shufflePool.pop() : 0;
      } else {
        nextIdx = currentQueueIndex + 1;
        if (nextIdx >= CURRENT_QUEUE.length) {
          nextIdx = 0;
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

    function syncLyricsHighlight(sec) {
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
          if (isTarget) fl.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
      });

      drawerLines.forEach((dl, idx) => {
        const isTarget = (idx === activeIndex);
        if (dl.classList.contains('active') !== isTarget) {
          dl.classList.toggle('active', isTarget);
          if (isTarget) dl.scrollIntoView({ behavior: 'smooth', block: 'center' });
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

    // موتور جستجوی هوشمند
    function handleSearchInput(query) {
      const searchPanel = document.getElementById('view-search');
      if (query && query.trim().length > 0 && searchPanel && !searchPanel.classList.contains('active')) {
        switchView('search');
      }

      const q = (query || '').toLowerCase().trim();
      const container = document.getElementById('search-results-container');
      if (!container) return;

      const filteredTracks = ALL_TRACKS.filter(t => 
        !q || 
        (t.title && String(t.title).toLowerCase().includes(q)) || 
        (t.artist && String(t.artist).toLowerCase().includes(q)) ||
        (t.album && String(t.album).toLowerCase().includes(q)) ||
        (t.search_keywords && String(t.search_keywords).toLowerCase().includes(q))
      );

      const filteredAlbums = (ALBUMS_DB || []).filter(alb => 
        !q || 
        (alb.title && String(alb.title).toLowerCase().includes(q)) || 
        (alb.artist_name && String(alb.artist_name).toLowerCase().includes(q)) ||
        (alb.genre && String(alb.genre).toLowerCase().includes(q)) ||
        (alb.search_keywords && String(alb.search_keywords).toLowerCase().includes(q))
      );

      const filteredArtists = (ARTISTS_DB || []).filter(a => 
        !q || 
        (a.name && String(a.name).toLowerCase().includes(q)) || 
        (a.genre_names && String(a.genre_names).toLowerCase().includes(q)) ||
        (a.search_keywords && String(a.search_keywords).toLowerCase().includes(q))
      );

      const filteredPlaylists = PLAYLISTS_DB.filter(p => 
        !q || 
        (p.title && String(p.title).toLowerCase().includes(q)) || 
        (p.desc && String(p.desc).toLowerCase().includes(q))
      );

      let html = '';

      if ((currentSearchFilter === 'all' || currentSearchFilter === 'tracks') && filteredTracks.length > 0) {
        const title = q ? `قطعات منطبق (${filteredTracks.length})` : 'آهنگ‌ها و قطعات';
        html += `<h3 style="margin:16px 0 10px; font-weight:800;">${title}</h3><div class="track-list" id="search-tracks-list"></div>`;
      }

      if ((currentSearchFilter === 'all' || currentSearchFilter === 'albums') && filteredAlbums.length > 0) {
        const title = q ? `آلبوم‌های منطبق (${filteredAlbums.length})` : 'آلبوم‌های موسیقی';
        html += `<h3 style="margin:24px 0 10px; font-weight:800;">${title}</h3><div class="grid-container" id="search-albums-grid"></div>`;
      }

      if ((currentSearchFilter === 'all' || currentSearchFilter === 'artists') && filteredArtists.length > 0) {
        const title = q ? `هنرمندان (${filteredArtists.length})` : 'هنرمندان و خوانندگان';
        html += `<h3 style="margin:24px 0 10px; font-weight:800;">${title}</h3><div class="grid-container" id="search-artists-grid"></div>`;
      }

      if ((currentSearchFilter === 'all' || currentSearchFilter === 'playlists') && filteredPlaylists.length > 0) {
        const title = q ? `پلی‌لیست‌ها (${filteredPlaylists.length})` : 'پلی‌لیست‌ها و مجموعه‌ها';
        html += `<h3 style="margin:24px 0 10px; font-weight:800;">${title}</h3><div class="grid-container" id="search-playlists-grid"></div>`;
      }

      if (!html) {
        const emptyMsg = q 
          ? `موردی منطبق با «${escapeHtml(query)}» در این بخش یافت نشد.`
          : 'موردی برای نمایش در این بخش وجود ندارد.';
        container.innerHTML = `<div style="text-align:center; padding:48px 16px; color:var(--muted); font-size:13px;">${emptyMsg}</div>`;
        return;
      }

      container.innerHTML = html;

      if (filteredTracks.length > 0 && document.getElementById('search-tracks-list')) {
        renderTracksTableList(filteredTracks, 'search-tracks-list');
      }

     if (filteredAlbums.length > 0 && document.getElementById('search-albums-grid')) {
        renderPaginatedGrid(filteredAlbums, 'search-albums-grid', alb => `
          <div class="music-card" onclick="openAlbumPage('${alb.id}')">
            <div class="card-art-box">
              <img class="card-art-img" src="${alb.cover || 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=300'}" alt="${escapeHtml(alb.title)}" />
              <button class="card-play-overlay"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
            </div>
            <div class="card-title">${escapeHtml(alb.title)}</div>
            <div class="card-subtitle">${escapeHtml(alb.artist_name || 'نامشخص')} • ${(alb.tracks ? alb.tracks.length : 0)} قطعه</div>
          </div>
        `, '', 12, 1);
      }

      if (filteredArtists.length > 0 && document.getElementById('search-artists-grid')) {
        renderPaginatedGrid(filteredArtists, 'search-artists-grid', a => `
          <div class="music-card artist-card" onclick="openArtistPage('${a.id}')">
            <div class="card-art-box"><img class="card-art-img" src="${a.image || ''}" /></div>
            <div class="card-title">${escapeHtml(a.name)}</div>
            <div class="card-subtitle">${escapeHtml(a.genre_names || '')}</div>
          </div>
        `, '', 12, 1);
      }

      if (filteredPlaylists.length > 0 && document.getElementById('search-playlists-grid')) {
        renderPaginatedGrid(filteredPlaylists, 'search-playlists-grid', p => `
          <div class="music-card" onclick="openPlaylistPage('${p.id}')">
            <div class="card-art-box"><img class="card-art-img" src="${p.cover || ''}" /></div>
            <div class="card-title">${escapeHtml(p.title)}</div>
            <div class="card-subtitle">${(p.tracks ? p.tracks.length : 0)} قطعه</div>
          </div>
        `, '', 12, 1);
      }
      
    }

    function setSearchFilter(filter, btn) {
      currentSearchFilter = filter || 'all';
      document.querySelectorAll('.search-tags-row button').forEach(b => b.classList.remove('active'));
      if (btn) {
        btn.classList.add('active');
      } else {
        const targetBtn = document.getElementById(`search-tag-${currentSearchFilter}`);
        if (targetBtn) targetBtn.classList.add('active');
      }
      const val = document.getElementById('global-search-input')?.value || '';
      handleSearchInput(val);
    }

    function filterByGenreName(genreName) {
      switchView('search');
      const input = document.getElementById('global-search-input');
      if (input) input.value = genreName;
      setSearchFilter('all', document.getElementById('search-tag-all'));
    }

    function toggleMobileMenu() {
      document.getElementById('sidebar')?.classList.toggle('open');
      document.getElementById('sidebar-backdrop')?.classList.toggle('active');
    }

    function switchView(viewId) {
      document.querySelectorAll('.view-panel').forEach(p => p.classList.remove('active'));
      document.querySelectorAll('.nav-link').forEach(n => n.classList.remove('active'));
      document.querySelectorAll('.mobile-nav-btn').forEach(m => m.classList.remove('active'));
      document.querySelectorAll('.quick-pill-item').forEach(pill => pill.classList.remove('active'));

      const target = document.getElementById(`view-${viewId}`);
      if (target) target.classList.add('active');

      document.getElementById(`nav-${viewId}`)?.classList.add('active');
      document.getElementById(`mob-${viewId}`)?.classList.add('active');
      document.getElementById(`pill-${viewId}`)?.classList.add('active');
      document.getElementById('viewport').scrollTo({ top: 0, behavior: 'smooth' });

      document.getElementById('sidebar')?.classList.remove('open');
      document.getElementById('sidebar-backdrop')?.classList.remove('active');

      if (viewId === 'search') {
        currentSearchFilter = 'all';
        document.querySelectorAll('.search-tags-row button').forEach(b => b.classList.remove('active'));
        document.getElementById('search-tag-all')?.classList.add('active');
        const val = document.getElementById('global-search-input')?.value || '';
        handleSearchInput(val);
      } else {
        const searchInput = document.getElementById('global-search-input');
        if (searchInput && searchInput.value) {
          searchInput.value = '';
          const searchContainer = document.getElementById('search-results-container');
          if (searchContainer) searchContainer.innerHTML = '';
        }
      }

      if (viewId === 'favorites') {
        renderFavoritesView();
      }
      if (viewId === 'profile') {
        updateProfileStatsView();
      }
    }

    function toggleFullPlayer() { 
      const modal = document.getElementById('full-player-modal');
      if (modal) modal.classList.toggle('active'); 
    }

    function toggleLyricsDrawer() {
      const lyrics = document.getElementById('lyrics-drawer');
      const queue = document.getElementById('queue-drawer');
      if (!lyrics) return;

      if (!lyrics.classList.contains('open')) {
        queue?.classList.remove('open');
        drawerZIndex++;
        lyrics.style.zIndex = drawerZIndex;
        lyrics.classList.add('open');
      } else {
        lyrics.classList.remove('open');
      }
    }

    function toggleQueueDrawer() {
      const lyrics = document.getElementById('lyrics-drawer');
      const queue = document.getElementById('queue-drawer');
      if (!queue) return;

      if (!queue.classList.contains('open')) {
        lyrics?.classList.remove('open');
        drawerZIndex++;
        queue.style.zIndex = drawerZIndex;
        queue.classList.add('open');
      } else {
        queue.classList.remove('open');
      }
    }

    function toggleShuffle() {
      isShuffle = !isShuffle;
      if (isShuffle) {
        resetShufflePool();
      }
      document.getElementById('ctrl-shuffle')?.classList.toggle('active', isShuffle);
      document.getElementById('full-ctrl-shuffle')?.classList.toggle('active', isShuffle);
    }

    function toggleRepeat() {
      isRepeat = !isRepeat;
      document.getElementById('ctrl-repeat')?.classList.toggle('active', isRepeat);
      document.getElementById('full-ctrl-repeat')?.classList.toggle('active', isRepeat);
    }

    function formatSeconds(s) {
      const m = Math.floor(s / 60);
      const sec = s % 60;
      return `${m}:${sec < 10 ? '0' : ''}${sec}`;
    }

    function escapeHtml(str) { 
      return String(str ?? '').replace(/"/g, '&quot;').replace(/'/g, '&#39;'); 
    }

    function showToast(msg) {}

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

      const handleTouchStart = (e) => { startY = e.touches[0].clientY; };
      const handleTouchMove = (e) => {
        currentY = e.touches[0].clientY;
        const delta = currentY - startY;
        if (delta > 0 && delta < 250) modal.style.transform = `translateY(${delta}px)`;
      };
      const handleTouchEnd = () => {
        const delta = currentY - startY;
        modal.style.transform = '';
        if (delta > 90) toggleFullPlayer();
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

    function updateProfileStatsView() {
      const favEl = document.getElementById('profile-stat-favs');
      const plEl = document.getElementById('profile-stat-playlists');
      if (favEl) favEl.textContent = ALL_TRACKS.filter(t => t.favorited).length;
      if (plEl) plEl.textContent = USER_CUSTOM_PLAYLISTS.length;
    }

    function showProfileBoxAlert(boxId, msg, type = 'error') {
      const el = document.getElementById(boxId);
      if (!el) return;
      el.className = `profile-alert-box ${type}`;
      el.textContent = msg;
    }

    async function submitUserProfileUpdate(e) {
      e.preventDefault();
      const btn = document.getElementById('btn-save-profile-info');
      btn.disabled = true;
      btn.textContent = 'در حال ذخیره‌سازی...';

      const alertId = 'profile-info-alert';
      document.getElementById(alertId).className = 'profile-alert-box';

      try {
        const res = await fetch('/auth/profile', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({
            name: document.getElementById('prof-name').value.trim(),
            username: document.getElementById('prof-username').value.trim(),
            email: document.getElementById('prof-email').value.trim(),
            phone: document.getElementById('prof-phone').value.trim(),
          })
        });

        const data = await res.json();

        if (!res.ok) {
          const err = data.errors ? Object.values(data.errors)[0][0] : data.message;
          showProfileBoxAlert(alertId, err || 'خطا در بروزرسانی اطلاعات', 'error');
        } else {
          showProfileBoxAlert(alertId, data.message, 'success');
          if (data.user) {
            const topLabel = document.getElementById('topbar-username-label');
            if (topLabel) topLabel.textContent = data.user.username || data.user.name;
            const headerName = document.getElementById('profile-header-name');
            if (headerName) headerName.textContent = data.user.name;
            const headerSub = document.getElementById('profile-header-sub');
            if (headerSub) headerSub.textContent = `@${data.user.username} • ${data.user.email}`;
            const avatarChar = document.getElementById('profile-avatar-char');
            if (avatarChar) avatarChar.textContent = (data.user.username || data.user.name).charAt(0);
          }
        }
      } catch (err) {
        showProfileBoxAlert(alertId, 'خطا در ارتباط با سرور', 'error');
      } finally {
        btn.disabled = false;
        btn.textContent = 'ذخیره تغییرات پروفایل';
      }
    }

    async function submitUserPasswordUpdate(e) {
      e.preventDefault();
      const btn = document.getElementById('btn-save-profile-pass');
      btn.disabled = true;
      btn.textContent = 'در حال بررسی...';

      const alertId = 'profile-pass-alert';
      document.getElementById(alertId).className = 'profile-alert-box';

      try {
        const res = await fetch('/auth/password', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({
            current_password: document.getElementById('prof-current-password').value,
            new_password: document.getElementById('prof-new-password').value,
            new_password_confirmation: document.getElementById('prof-confirm-password').value,
          })
        });

        const data = await res.json();

        if (!res.ok) {
          const err = data.errors ? Object.values(data.errors)[0][0] : data.message;
          showProfileBoxAlert(alertId, err || 'خطا در تغییر رمز عبور', 'error');
        } else {
          showProfileBoxAlert(alertId, data.message, 'success');
          document.getElementById('prof-current-password').value = '';
          document.getElementById('prof-new-password').value = '';
          document.getElementById('prof-confirm-password').value = '';
        }
      } catch (err) {
        showProfileBoxAlert(alertId, 'خطا در ارتباط با سرور', 'error');
      } finally {
        btn.disabled = false;
        btn.textContent = 'بروزرسانی رمز عبور';
      }
    }

    window.addEventListener('DOMContentLoaded', () => {
      initSliders();
      initTouchGestures();
      initAppData();
    });
    // کنترل باز و بسته شدن دکمه شناور شبکه‌های اجتماعی
    function toggleSocialFloat(e) {
      if (e) e.stopPropagation();
      const wrap = document.getElementById('floating-social-wrap');
      if (wrap) wrap.classList.toggle('open');
    }

    document.addEventListener('click', (e) => {
      const wrap = document.getElementById('floating-social-wrap');
      if (wrap && wrap.classList.contains('open') && !wrap.contains(e.target)) {
        wrap.classList.remove('open');
      }
    });
  </script>
</body>
</html>