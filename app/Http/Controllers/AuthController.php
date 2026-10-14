<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showAuthForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth');
    }

    // تولید کد کپچای امنیتی در سشن سرور
    public function getCaptcha()
    {
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $code = '';
        for ($i = 0; $i < 5; $i++) {
            $code .= $chars[ random_int(0, strlen($chars) - 1) ];
        }

        session(['sehpatify_captcha' => strtoupper($code)]);

        return response()->json([
            'code' => $code
        ]);
    }

    private function verifyCaptcha(Request $request)
    {
        $input = strtoupper(trim($request->input('captcha', '')));
        $stored = session('sehpatify_captcha');

        // یک‌بار مصرف کردن کپچا پس از هر تلاش
        session()->forget('sehpatify_captcha');

        return !empty($stored) && $input === $stored;
    }

    public function register(Request $request)
    {
        if (!$this->verifyCaptcha($request)) {
            return response()->json([
                'message' => 'کد امنیتی (کپچا) اشتباه وارد شده است. لطفاً دوباره تلاش کنید.',
                'captcha_error' => true,
            ], 422);
        }

        $request->validate([
            'username' => 'required|string|min:3|max:50|unique:users,username|regex:/^[a-zA-Z0-9_.-]+$/',
            'email'    => 'required|email|max:255|unique:users,email',
            'phone'    => 'required|string|regex:/^09[0-9]{9}$/|unique:users,phone',
            'password' => 'required|string|min:6',
        ], [
            'username.required' => 'لطفاً نام کاربری (یوزرنیم) را وارد کنید.',
            'username.min'      => 'نام کاربری باید حداقل ۳ کاراکتر باشد.',
            'username.unique'   => 'این نام کاربری قبلاً انتخاب شده است.',
            'username.regex'    => 'نام کاربری فقط می‌تواند شامل حروف انگلیسی، اعداد و نقطه یا خط زیر باشد.',
            'email.required'    => 'وارد کردن ایمیل الزامی است.',
            'email.email'       => 'فرمت ایمیل وارد شده معتبر نیست.',
            'email.unique'      => 'این ایمیل قبلاً ثبت شده است.',
            'phone.required'    => 'شماره موبایل الزامی است.',
            'phone.regex'       => 'شماره موبایل باید ۱۱ رقم و با 09 شروع شود (مثال: 09123456789).',
            'phone.unique'      => 'این شماره تلفن قبلاً ثبت شده است.',
            'password.required' => 'رمز عبور الزامی است.',
            'password.min'      => 'رمز عبور باید حداقل ۶ کاراکتر باشد.',
        ]);

        $user = User::create([
            'name'      => $request->username,
            'username'  => $request->username,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
            'role'      => 'کاربر عادی',
            'is_active' => true,
        ]);

        Auth::login($user, true);

        return response()->json([
            'message'  => 'ثبت‌نام با موفقیت انجام شد!',
            'redirect' => '/',
        ], 201);
    }

    public function login(Request $request)
    {
        if (!$this->verifyCaptcha($request)) {
            return response()->json([
                'message' => 'کد امنیتی (کپچا) اشتباه وارد شده است. لطفاً دوباره تلاش کنید.',
                'captcha_error' => true,
            ], 422);
        }

        $request->validate([
            'identifier' => 'required|string',
            'password'   => 'required|string',
        ], [
            'identifier.required' => 'نام کاربری، ایمیل یا شماره تلفن خود را وارد کنید.',
            'password.required'   => 'رمز عبور را وارد کنید.',
        ]);

        $id = trim($request->identifier);

        $user = User::where('email', $id)
            ->orWhere('username', $id)
            ->orWhere('phone', $id)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'اطلاعات وارد شده یا رمز عبور اشتباه است.'
            ], 422);
        }

        if (isset($user->is_active) && !$user->is_active) {
            return response()->json([
                'message' => 'حساب کاربری شما توسط مدیریت مسدود شده است.'
            ], 403);
        }

        Auth::login($user, $request->boolean('remember'));

        return response()->json([
            'message'  => 'خوش آمدید!',
            'redirect' => $user->role === 'مدیر' ? '/admin' : '/',
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'لطفاً آدرس ایمیل خود را وارد کنید.',
            'email.email'    => 'فرمت ایمیل وارد شده معتبر نیست.',
            'email.exists'   => 'حسابی با این آدرس ایمیل در سیستم یافت نشد.',
        ]);

        $user = User::where('email', trim($request->email))->firstOrFail();
        $newPassword = Str::random(8);

        $user->password = Hash::make($newPassword);
        $user->save();

        $username = $user->username ?: $user->name;

        $htmlContent = "
        <div dir='rtl' style='font-family: Tahoma, Arial, sans-serif; background-color: #07070C; color: #F8F8FA; padding: 32px 20px; border-radius: 18px; max-width: 500px; margin: 0 auto; border: 1px solid rgba(16, 185, 84, 0.4); text-align: right;'>
            <div style='text-align: center; margin-bottom: 20px;'>
                <h2 style='color: #10B954; margin: 0; font-size: 22px; letter-spacing: 1px;'>SEHPATIFY</h2>
                <p style='color: #9E9EB0; font-size: 12px; margin-top: 4px;'>پلتفرم بومی موسیقی ایرانی</p>
            </div>
            <p style='font-size: 14px; line-height: 1.8;'>سلام <strong>{$username}</strong> عزیز،</p>
            <p style='font-size: 13.5px; color: #9E9EB0; line-height: 1.8;'>درخواست بازیابی رمز عبور برای حساب کاربری شما ثبت شد. رمز عبور جدید شما به شرح زیر است:</p>
            <div style='background: rgba(16, 185, 84, 0.12); border: 1px dashed #10B954; border-radius: 12px; padding: 14px; text-align: center; margin: 22px 0;'>
                <span style='font-size: 12px; color: #9E9EB0; display: block; margin-bottom: 6px;'>رمز عبور جدید شما:</span>
                <strong style='font-size: 22px; color: #10B954; letter-spacing: 3px; font-family: monospace;'>{$newPassword}</strong>
            </div>
            <p style='font-size: 12px; color: #9E9EB0; line-height: 1.7;'>اکنون می‌توانید با استفاده از این رمز عبور وارد حساب کاربری خود در سهپاتیفای شوید.</p>
        </div>";

        try {
            Mail::html($htmlContent, function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('بازیابی رمز عبور | سهپاتیفای (Sehpatify)');
            });

            return response()->json([
                'message' => 'رمز عبور جدید با موفقیت به ایمیل شما ارسال شد. لطفاً صندوق ورودی یا پوشه Spam را بررسی کنید.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'خطا در ارسال ایمیل. لطفاً تنظیمات SMTP سرور ایمیل را در فایل .env بررسی کنید.'
            ], 500);
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:100',
            'username' => 'required|string|min:3|max:50|regex:/^[a-zA-Z0-9_.-]+$/|unique:users,username,' . $user->id,
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'    => 'required|string|regex:/^09[0-9]{9}$/|unique:users,phone,' . $user->id,
        ], [
            'name.required'     => 'نام نمایشی الزامی است.',
            'username.required' => 'نام کاربری الزامی است.',
            'username.min'      => 'نام کاربری باید حداقل ۳ کاراکتر باشد.',
            'username.regex'    => 'نام کاربری فقط می‌تواند شامل حروف انگلیسی، اعداد، نقطه و خط تیره باشد.',
            'username.unique'   => 'این نام کاربری قبلاً توسط شخص دیگری انتخاب شده است.',
            'email.required'    => 'آدرس ایمیل الزامی است.',
            'email.email'       => 'فرمت ایمیل معتبر نیست.',
            'email.unique'      => 'این ایمیل قبلاً ثبت شده است.',
            'phone.required'    => 'شماره موبایل الزامی است.',
            'phone.regex'       => 'شماره موبایل باید ۱۱ رقم و با 09 شروع شود.',
            'phone.unique'      => 'این شماره موبایل قبلاً ثبت شده است.',
        ]);

        $user->update([
            'name'     => trim($request->name),
            'username' => trim($request->username),
            'email'    => trim($request->email),
            'phone'    => trim($request->phone),
        ]);

        return response()->json([
            'message' => 'اطلاعات حساب کاربری شما با موفقیت بروزرسانی شد ✓',
            'user'    => [
                'name'     => $user->name,
                'username' => $user->username,
                'email'    => $user->email,
                'phone'    => $user->phone,
            ]
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required|string',
            'new_password'     => 'required|string|min:6|confirmed',
        ], [
            'current_password.required' => 'وارد کردن رمز عبور فعلی الزامی است.',
            'new_password.required'     => 'رمز عبور جدید را وارد کنید.',
            'new_password.min'          => 'رمز عبور جدید باید حداقل ۶ کاراکتر باشد.',
            'new_password.confirmed'    => 'تکرار رمز عبور جدید با رمز وارد شده مطابقت ندارد.',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => 'رمز عبور فعلی وارد شده اشتباه است.'
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'رمز عبور شما با موفقیت تغییر یافت ✓'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth');
    }
}