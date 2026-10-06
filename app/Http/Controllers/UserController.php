<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // دریافت لیست کاربران دیتابیس
    public function index()
    {
        $users = User::latest()->get()->map(function ($user) {
            return [
                'id'        => $user->id,
                'name'      => $user->name,
                'email'     => $user->email,
                'role'      => $user->role ?? 'کاربر',
                'plan'      => $user->plan ?? 'رایگان',
                'is_active' => (bool) $user->is_active,
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
            'password' => 'nullable|string|min:6',
            'role'     => 'nullable|string',
            'plan'     => 'nullable|string',
        ], [
            'name.required'  => 'نام و نام خانوادگی الزامی است.',
            'email.required' => 'ایمیل الزامی است.',
            'email.unique'   => 'این ایمیل قبلاً در سیستم ثبت شده است.',
        ]);

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password') ?: '12345678'),
            'role'      => $request->input('role') ?: 'کاربر',
            'plan'      => $request->input('plan') ?: 'رایگان',
            'is_active' => true,
        ]);

        return response()->json([
            'message' => 'کاربر با موفقیت ثبت شد.',
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
            'plan'     => 'nullable|string',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role') ?: $user->role;
        $user->plan = $request->input('plan') ?: $user->plan;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return response()->json([
            'message' => 'اطلاعات کاربر به‌روزرسانی شد.',
            'user'    => $user
        ]);
    }

    // مسدودسازی یا فعال‌سازی کاربر (Toggle Status)
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        $statusText = $user->is_active ? 'فعال' : 'مسدود';

        return response()->json([
            'message'   => "حساب کاربری {$user->name} اکنون {$statusText} است.",
            'is_active' => $user->is_active
        ]);
    }

    // حذف کاربر
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'کاربر با موفقیت حذف شد.']);
    }
}