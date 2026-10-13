<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'name'      => $request->username, // همگام با پنل مدیریت
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth');
    }
}