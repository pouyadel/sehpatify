<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:genres,name',
        ]);

        Genre::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return back()->with('success', 'سبک جدید با موفقیت ایجاد شد.');
    }

    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:genres,name,' . $genre->id,
        ]);

        $genre->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return back()->with('success', 'سبک مورد نظر با موفقیت به‌روزرسانی شد.');
    }

    public function destroy(Genre $genre)
    {
        // در صورت وجود آهنگ متصل، می‌توانید مانع حذف شوید یا رابطه را null کنید
        if ($genre->tracks()->exists()) {
            return back()->with('error', 'امکان حذف این سبک به دلیل وجود آهنگ‌های متصل وجود ندارد.');
        }

        $genre->delete();

        return back()->with('success', 'سبک با موفقیت حذف شد.');
    }
}