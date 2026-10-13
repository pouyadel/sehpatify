<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
  <title>ورود و عضویت | سهپاتیفای — Sehpatify</title>
  <meta name="theme-color" content="#07070C" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Fonts: Vazirmatn -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <style>
    :root {
      --brand: #10B954;
      --brand-glow: rgba(16, 185, 84, 0.45);
      --brand-glow-lg: rgba(16, 185, 84, 0.22);
      --brand-dim: rgba(16, 185, 84, 0.12);
      --brand-hover: #15d261;

      --bg: #07070C;
      --surface-card: rgba(20, 20, 32, 0.78);
      --surface-input: rgba(255, 255, 255, 0.04);
      --surface-input-focus: rgba(255, 255, 255, 0.08);

      --text: #F8F8FA;
      --muted: #9E9EB0;
      --muted-dark: #66667A;
      --danger: #f87171;
      --border: rgba(255, 255, 255, 0.09);
      --border-light: rgba(255, 255, 255, 0.16);
      --border-brand: rgba(16, 185, 84, 0.45);

      --radius-sm: 12px;
      --radius-md: 16px;
      --radius-lg: 24px;
      --radius-full: 9999px;
      --transition: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }

    *, *::before, *::after,
    html, body, button, input, span, p, a, div, h1, h2, h3, label {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      outline: none;
      -webkit-tap-highlight-color: transparent;
      font-family: 'Vazirmatn', system-ui, -apple-system, sans-serif !important;
    }

    html, body {
      width: 100%;
      min-height: 100vh;
      min-height: 100dvh;
      background-color: var(--bg);
      color: var(--text);
      font-size: 14px;
      line-height: 1.6;
      direction: rtl;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    .auth-page-wrapper {
      min-height: 100vh;
      min-height: 100dvh;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 24px 16px;
      position: relative;
      background:
        radial-gradient(circle at 50% 0%, rgba(16, 185, 84, 0.15) 0%, transparent 55%),
        radial-gradient(circle at 10% 90%, rgba(16, 185, 84, 0.07) 0%, transparent 45%),
        var(--bg);
    }

    /* دکمه بازگشت به صفحه اصلی */
    .back-home-pill {
      position: absolute;
      top: 22px;
      right: 24px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 16px;
      border-radius: var(--radius-full);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--border);
      color: var(--muted);
      text-decoration: none;
      font-size: 12.5px;
      font-weight: 600;
      transition: var(--transition);
      backdrop-filter: blur(16px);
      z-index: 10;
    }

    .back-home-pill:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.1);
      border-color: var(--border-brand);
    }

    /* کارت اصلی شیشه‌ای */
    .auth-glass-card {
      width: 100%;
      max-width: 440px;
      background: var(--surface-card);
      backdrop-filter: blur(28px);
      -webkit-backdrop-filter: blur(28px);
      border: 1px solid var(--border-light);
      border-radius: var(--radius-lg);
      padding: 32px 28px;
      box-shadow: 0 24px 60px rgba(0, 0, 0, 0.75), 0 0 40px rgba(16, 185, 84, 0.06);
      position: relative;
      z-index: 5;
      animation: cardEnter 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes cardEnter {
      from { opacity: 0; transform: translateY(14px) scale(0.98); }
      to { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* هدر لوگو */
    .auth-brand-box {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      margin-bottom: 22px;
    }

    .auth-logo-wrap {
      width: 56px;
      height: 56px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, rgba(16, 185, 84, 0.24), rgba(18, 18, 28, 0.95));
      border: 1px solid var(--border-brand);
      border-radius: 16px;
      box-shadow: 0 0 24px var(--brand-glow-lg);
      margin-bottom: 12px;
    }

    .auth-logo-svg {
      width: 38px;
      height: 38px;
      filter: drop-shadow(0 0 8px rgba(16, 185, 84, 0.85));
    }

    .auth-brand-title {
      font-size: 20px;
      font-weight: 900;
      letter-spacing: 0.5px;
      color: #FFFFFF;
    }

    .auth-brand-sub {
      font-size: 12px;
      color: var(--muted);
      margin-top: 2px;
    }

    /* سوییچر تب ورود / ثبت‌نام */
    .auth-tabs-switcher {
      display: grid;
      grid-template-columns: 1fr 1fr;
      background: rgba(0, 0, 0, 0.35);
      padding: 4px;
      border-radius: var(--radius-full);
      border: 1px solid var(--border);
      margin-bottom: 22px;
    }

    .auth-tab-btn {
      background: transparent;
      border: none;
      color: var(--muted);
      font-size: 13px;
      font-weight: 700;
      padding: 9px 12px;
      border-radius: var(--radius-full);
      cursor: pointer;
      transition: var(--transition);
    }

    .auth-tab-btn.active {
      background: var(--brand);
      color: #052410;
      font-weight: 800;
      box-shadow: 0 2px 14px var(--brand-glow);
    }

    /* نمایش خطا یا پیام */
    .auth-alert {
      display: none;
      padding: 10px 14px;
      border-radius: var(--radius-sm);
      font-size: 12.5px;
      font-weight: 600;
      margin-bottom: 16px;
      line-height: 1.5;
    }

    .auth-alert.error {
      display: block;
      background: rgba(248, 113, 113, 0.12);
      border: 1px solid rgba(248, 113, 113, 0.35);
      color: var(--danger);
    }

    .auth-alert.success {
      display: block;
      background: var(--brand-dim);
      border: 1px solid var(--border-brand);
      color: var(--brand);
    }

    /* فرم‌ها */
    .auth-form-panel {
      display: none;
      flex-direction: column;
      gap: 14px;
    }

    .auth-form-panel.active {
      display: flex;
      animation: fadeForm 0.22s ease;
    }

    @keyframes fadeForm {
      from { opacity: 0; transform: translateY(4px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .field-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .field-label {
      font-size: 12px;
      font-weight: 700;
      color: var(--text);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .field-hint {
      font-size: 10.5px;
      font-weight: 500;
      color: var(--muted-dark);
    }

    .input-box {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-icon {
      position: absolute;
      right: 14px;
      color: var(--muted);
      display: flex;
      pointer-events: none;
      transition: color var(--transition);
    }

    .auth-input {
      width: 100%;
      height: 46px;
      background: var(--surface-input);
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      color: var(--text);
      font-size: 13.5px;
      padding: 0 42px 0 40px;
      transition: var(--transition);
      text-align: left;
      direction: ltr;
    }

    .auth-input::placeholder {
      color: var(--muted-dark);
      text-align: right;
      direction: rtl;
    }

    .auth-input:focus {
      background: var(--surface-input-focus);
      border-color: var(--brand);
      box-shadow: 0 0 16px var(--brand-glow-lg);
    }

    .input-box:focus-within .input-icon {
      color: var(--brand);
    }

    .toggle-pass-btn {
      position: absolute;
      left: 12px;
      background: transparent;
      border: none;
      color: var(--muted);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 4px;
      transition: color var(--transition);
    }

    .toggle-pass-btn:hover {
      color: var(--text);
    }

    /* دکمه ثبت */
    .btn-submit-auth {
      margin-top: 6px;
      width: 100%;
      height: 48px;
      background: var(--brand);
      color: #052410;
      font-size: 14px;
      font-weight: 800;
      border: none;
      border-radius: var(--radius-full);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      box-shadow: 0 6px 22px var(--brand-glow);
      transition: var(--transition);
    }

    .btn-submit-auth:hover {
      background: var(--brand-hover);
      transform: translateY(-1.5px);
      box-shadow: 0 8px 28px var(--brand-glow);
    }

    .btn-submit-auth:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    .auth-footer-note {
      margin-top: 18px;
      padding-top: 14px;
      border-top: 1px solid var(--border);
      text-align: center;
      font-size: 12px;
      color: var(--muted);
    }

    .auth-footer-note a {
      color: var(--brand);
      font-weight: 700;
      text-decoration: none;
      cursor: pointer;
    }

    .auth-footer-note a:hover {
      text-decoration: underline;
    }

    /* واکنش‌گرایی مخصوص موبایل */
    @media (max-width: 480px) {
      .auth-page-wrapper {
        padding: 16px 12px;
        justify-content: center;
      }

      .back-home-pill {
        top: 14px;
        right: 14px;
        padding: 6px 12px;
        font-size: 11.5px;
      }

      .auth-glass-card {
        padding: 24px 18px;
        border-radius: 20px;
      }

      .auth-logo-wrap {
        width: 48px;
        height: 48px;
      }

      .auth-brand-title {
        font-size: 18px;
      }

      .auth-input {
        height: 44px;
        font-size: 13px;
      }

      .btn-submit-auth {
        height: 44px;
        font-size: 13.5px;
      }
    }
  </style>
</head>
<body>

  <div class="auth-page-wrapper">
    <a href="/" class="back-home-pill">
      <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      <span>بازگشت به پلیر</span>
    </a>

    <div class="auth-glass-card">
      <!-- هدر و لوگو -->
      <div class="auth-brand-box">
        <div class="auth-logo-wrap">
          <svg class="auth-logo-svg" viewBox="0 0 320 240" fill="none">
            <path d="M 68 126 C 68 148, 86 172, 116 172 C 146 172, 142 64, 160 64 C 178 64, 174 172, 204 172 C 234 172, 252 148, 252 126" stroke="#10B954" stroke-width="26" stroke-linecap="round" />
            <circle cx="68" cy="126" r="14" fill="#4ADE80" />
            <circle cx="252" cy="126" r="14" fill="#10B954" />
          </svg>
        </div>
        <h1 class="auth-brand-title">SEHPATIFY</h1>
        <p class="auth-brand-sub">ریتم، درون تو زنده است</p>
      </div>

      <!-- تب ورود و ثبت‌نام -->
      <div class="auth-tabs-switcher">
        <button type="button" class="auth-tab-btn active" id="tab-btn-login" onclick="switchAuthTab('login')">ورود به حساب</button>
        <button type="button" class="auth-tab-btn" id="tab-btn-register" onclick="switchAuthTab('register')">ثبت‌نام رایگان</button>
      </div>

      <!-- باکس پیام خطا / موفقیت -->
      <div class="auth-alert" id="auth-alert-box"></div>

      <!-- ۱. فرم ورود -->
      <form class="auth-form-panel active" id="form-login" onsubmit="submitLogin(event)">
        <div class="field-group">
          <label class="field-label">
            <span>نام کاربری، ایمیل یا شماره موبایل</span>
          </label>
          <div class="input-box">
            <span class="input-icon">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </span>
            <input type="text" class="auth-input" id="login-identifier" placeholder="نام کاربری، ایمیل یا شماره تلفن..." required />
          </div>
        </div>

        <div class="field-group">
          <label class="field-label">
            <span>رمز عبور</span>
          </label>
          <div class="input-box">
            <span class="input-icon">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </span>
            <input type="password" class="auth-input" id="login-password" placeholder="رمز عبور خود را وارد کنید..." required />
            <button type="button" class="toggle-pass-btn" onclick="togglePasswordVisibility('login-password', this)" title="نمایش رمز">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </button>
          </div>
        </div>

        <button type="submit" class="btn-submit-auth" id="btn-login-submit">
          <span>ورود به سهپاتیفای</span>
        </button>

        <div class="auth-footer-note">
          هنوز حساب کاربری ندارید؟ <a onclick="switchAuthTab('register')">ساخت حساب جدید</a>
        </div>
      </form>

      <!-- ۲. فرم ثبت‌نام (فقط یوزرنیم، ایمیل، شماره تلفن و رمز) -->
      <form class="auth-form-panel" id="form-register" onsubmit="submitRegister(event)">
        <div class="field-group">
          <label class="field-label">
            <span>نام کاربری (Username)</span>
            <span class="field-hint">حروف انگلیسی و اعداد</span>
          </label>
          <div class="input-box">
            <span class="input-icon">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </span>
            <input type="text" class="auth-input" id="reg-username" placeholder="مثال: pouya_del" required />
          </div>
        </div>

        <div class="field-group">
          <label class="field-label">
            <span>آدرس ایمیل</span>
          </label>
          <div class="input-box">
            <span class="input-icon">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </span>
            <input type="email" class="auth-input" id="reg-email" placeholder="example@gmail.com" required />
          </div>
        </div>

        <div class="field-group">
          <label class="field-label">
            <span>شماره موبایل</span>
            <span class="field-hint">۱۱ رقم با 09</span>
          </label>
          <div class="input-box">
            <span class="input-icon">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </span>
            <input type="tel" class="auth-input" id="reg-phone" maxlength="11" placeholder="09123456789" required />
          </div>
        </div>

        <div class="field-group">
          <label class="field-label">
            <span>رمز عبور</span>
            <span class="field-hint">حداقل ۶ کاراکتر</span>
          </label>
          <div class="input-box">
            <span class="input-icon">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </span>
            <input type="password" class="auth-input" id="reg-password" placeholder="انتخاب رمز عبور..." required />
            <button type="button" class="toggle-pass-btn" onclick="togglePasswordVisibility('reg-password', this)" title="نمایش رمز">
              <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </button>
          </div>
        </div>

        <button type="submit" class="btn-submit-auth" id="btn-register-submit">
          <span>تکمیل ثبت‌نام و ورود</span>
        </button>

        <div class="auth-footer-note">
          قبلاً ثبت‌نام کرده‌اید؟ <a onclick="switchAuthTab('login')">وارد حساب خود شوید</a>
        </div>
      </form>

    </div>
  </div>

  <script>
    function switchAuthTab(tab) {
      const alertBox = document.getElementById('auth-alert-box');
      alertBox.className = 'auth-alert';
      alertBox.textContent = '';

      document.getElementById('tab-btn-login').classList.toggle('active', tab === 'login');
      document.getElementById('tab-btn-register').classList.toggle('active', tab === 'register');

      document.getElementById('form-login').classList.toggle('active', tab === 'login');
      document.getElementById('form-register').classList.toggle('active', tab === 'register');
    }

    function togglePasswordVisibility(inputId, btn) {
      const input = document.getElementById(inputId);
      if (!input) return;
      input.type = input.type === 'password' ? 'text' : 'password';
    }

    function showAuthAlert(msg, type = 'error') {
      const box = document.getElementById('auth-alert-box');
      box.className = `auth-alert ${type}`;
      box.textContent = msg;
    }

    async function submitLogin(e) {
      e.preventDefault();
      const btn = document.getElementById('btn-login-submit');
      btn.disabled = true;
      btn.textContent = 'در حال بررسی...';

      try {
        const res = await fetch('/auth/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({
            identifier: document.getElementById('login-identifier').value.trim(),
            password: document.getElementById('login-password').value
          })
        });

        const data = await res.json();

        if (!res.ok) {
          const firstError = data.errors ? Object.values(data.errors)[0][0] : data.message;
          showAuthAlert(firstError || 'خطا در ورود به حساب', 'error');
        } else {
          showAuthAlert(data.message, 'success');
          window.location.href = data.redirect || '/';
        }
      } catch (err) {
        showAuthAlert('خطا در برقراری ارتباط با سرور', 'error');
      } finally {
        btn.disabled = false;
        btn.textContent = 'ورود به سهپاتیفای';
      }
    }

    async function submitRegister(e) {
      e.preventDefault();
      const btn = document.getElementById('btn-register-submit');
      btn.disabled = true;
      btn.textContent = 'در حال ساخت حساب...';

      try {
        const res = await fetch('/auth/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({
            username: document.getElementById('reg-username').value.trim(),
            email: document.getElementById('reg-email').value.trim(),
            phone: document.getElementById('reg-phone').value.trim(),
            password: document.getElementById('reg-password').value
          })
        });

        const data = await res.json();

        if (!res.ok) {
          const firstError = data.errors ? Object.values(data.errors)[0][0] : data.message;
          showAuthAlert(firstError || 'خطا در ثبت اطلاعات', 'error');
        } else {
          showAuthAlert(data.message, 'success');
          window.location.href = data.redirect || '/';
        }
      } catch (err) {
        showAuthAlert('خطا در برقراری ارتباط با سرور', 'error');
      } finally {
        btn.disabled = false;
        btn.textContent = 'تکمیل ثبت‌نام و ورود';
      }
    }
  </script>
</body>
</html>