<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::latest()->get()->map(function ($genre) {
            // شمارش تعداد آهنگ‌های این ژانر بر اساس genre_id یا نام متنی ژانر
            $genre->tracks_count = Track::where('genre_id', $genre->id)
                ->orWhere('genre', $genre->name)
                ->count();
            return $genre;
        });

        return response()->json($genres);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:100|unique:genres,name',
            'cover_file' => 'nullable|image|max:10240',
            'cover_url'  => 'nullable|string',
        ], [
            'name.required' => 'نام سبک الزامی است.',
            'name.unique'   => 'این سبک قبلاً ثبت شده است.',
        ]);

        $coverPath = $request->input('cover_url');
        if ($request->hasFile('cover_file')) {
            $coverPath = '/storage/' . $request->file('cover_file')->store('genres', 'public');
        }

        $genre = Genre::create([
            'name'  => trim($request->name),
            'slug'  => Str::slug($request->name) ?: (string) time(),
            'cover' => $coverPath ?: 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=500',
        ]);

        return response()->json([
            'message' => 'سبک جدید با موفقیت اضافه شد.',
            'genre'   => $genre
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $request->validate([
            'name'       => 'required|string|max:100|unique:genres,name,' . $genre->id,
            'cover_file' => 'nullable|image|max:10240',
            'cover_url'  => 'nullable|string',
        ], [
            'name.required' => 'نام سبک الزامی است.',
            'name.unique'   => 'این نام سبک از قبل وجود دارد.',
        ]);

        if ($request->hasFile('cover_file')) {
            if ($genre->cover && str_starts_with($genre->cover, '/storage/genres/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $genre->cover));
            }
            $genre->cover = '/storage/' . $request->file('cover_file')->store('genres', 'public');
        } elseif ($request->filled('cover_url')) {
            $genre->cover = $request->input('cover_url');
        }

        $genre->name = trim($request->name);
        $genre->slug = Str::slug($request->name) ?: $genre->slug;
        $genre->save();

        return response()->json([
            'message' => 'سبک با موفقیت به‌روزرسانی شد.',
            'genre'   => $genre
        ]);
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);

        if (Schema::hasColumn('tracks', 'genre_id')) {
            Track::where('genre_id', $genre->id)->update(['genre_id' => null]);
        }

        if ($genre->cover && str_starts_with($genre->cover, '/storage/genres/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $genre->cover));
        }

        if (method_exists($genre, 'artists')) {
            $genre->artists()->detach();
        }

        $genre->delete();

        return response()->json(['message' => 'سبک با موفقیت حذف گردید.']);
    }
}