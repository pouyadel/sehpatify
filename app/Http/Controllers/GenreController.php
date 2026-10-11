<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:genres,name',
        ], [
            'name.required' => 'نام سبک الزامی است.',
            'name.unique' => 'این سبک قبلاً ثبت شده است.',
        ]);

        $data = ['name' => trim($request->name)];

        if (Schema::hasColumn('genres', 'slug')) {
            $data['slug'] = Str::slug($request->name);
        }

        Genre::create($data);

        return back()->with('success', 'سبک جدید با موفقیت اضافه شد.');
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:genres,name,' . $genre->id,
        ], [
            'name.required' => 'نام سبک الزامی است.',
            'name.unique' => 'این نام سبک قبلاً ثبت شده است.',
        ]);

        $data = ['name' => trim($request->name)];

        if (Schema::hasColumn('genres', 'slug')) {
            $data['slug'] = Str::slug($request->name);
        }

        $genre->update($data);

        return back()->with('success', 'سبک مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);

        // در صورت وجود ستون genre_id در جدول آهنگ‌ها، ارجاع آهنگ‌ها به این سبک null می‌شود
        if (Schema::hasColumn('tracks', 'genre_id')) {
            Track::where('genre_id', $genre->id)->update(['genre_id' => null]);
        }

        // قطع رابطه چندبه‌چند با هنرمندان در صورت وجود
        if (method_exists($genre, 'artists')) {
            $genre->artists()->detach();
        }

        $genre->delete();

        return back()->with('success', 'سبک با موفقیت حذف شد.');
    }
}