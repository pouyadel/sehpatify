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

    public function register(Request $request)
    {
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

    // بازیابی و ارسال رمز عبور جدید به ایمیل کاربر
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

        // تولید رمز عبور جدید ۸ کاراکتری
        $newPassword = Str::random(8);

        // ذخیره رمز جدید در دیتابیس
        $user->password = Hash::make($newPassword);
        $user->save();

        $username = $user->username ?: $user->name;

        // قالب ایمیل هماهنگ با استایل سهپاتیفای
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth');
    }
}