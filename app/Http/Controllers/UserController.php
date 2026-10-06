<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // دریافت لیست زنده کاربران دیتابیس
    public function index()
    {
        $users = User::latest()->get()->map(function ($user) {
            return [
                'id'        => $user->id,
                'name'      => $user->name,
                'email'     => $user->email,
                'role'      => ($user->role === 'مدیر' || $user->role === 'مدیر ارشد') ? 'مدیر' : 'کاربر عادی',
                'is_active' => (bool) ($user->is_active ?? true),
                'date'      => $user->created_at ? $user->created_at->format('Y/m/d') : '---',
            ];
        });

        return response()->json($users);
    }

    // ثبت کاربر جدید
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => 'nullable|string',
        ], [
            'name.required'     => 'نام و نام خانوادگی الزامی است.',
            'email.required'    => 'ایمیل الزامی است.',
            'email.unique'      => 'این ایمیل قبلاً در سیستم ثبت شده است.',
            'password.required' => 'کلمه عبور الزامی است.',
            'password.min'      => 'کلمه عبور باید حداقل ۶ کاراکتر باشد.',
        ]);

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'role'      => $request->input('role') === 'مدیر' ? 'مدیر' : 'کاربر عادی',
            'is_active' => true,
        ]);

        return response()->json([
            'message' => 'کاربر جدید با موفقیت ایجاد شد.',
            'user'    => $user
        ], 201);
    }

    // ویرایش اطلاعات کاربر
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'role'     => 'nullable|string',
        ], [
            'name.required'  => 'نام و نام خانوادگی الزامی است.',
            'email.required' => 'ایمیل الزامی است.',
            'email.unique'   => 'این ایمیل برای کاربر دیگری ثبت شده است.',
            'password.min'   => 'کلمه عبور باید حداقل ۶ کاراکتر باشد.',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role') === 'مدیر' ? 'مدیر' : 'کاربر عادی';

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return response()->json([
            'message' => 'اطلاعات کاربر با موفقیت به‌روزرسانی شد.',
            'user'    => $user
        ]);
    }

    // تغییر وضعیت مسدود / فعال
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        $statusText = $user->is_active ? 'فعال' : 'مسدود';

        return response()->json([
            'message'   => "وضعیت حساب کاربری «{$user->name}» به {$statusText} تغییر یافت.",
            'is_active' => $user->is_active
        ]);
    }

    // حذف کاربر
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'کاربر با موفقیت حذف گردید.']);
    }
}