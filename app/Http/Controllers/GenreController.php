<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::latest()->get();
        return response()->json($genres);
    }

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

        $genre = Genre::create($data);

        return response()->json([
            'success' => true,
            'message' => 'سبک جدید با موفقیت اضافه شد.',
            'genre'   => $genre
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:genres,name,' . $genre->id,
        ], [
            'name.required' => 'نام سبک الزامی است.',
            'name.unique' => 'این نام سبک از قبل وجود دارد.',
        ]);

        $data = ['name' => trim($request->name)];
        if (Schema::hasColumn('genres', 'slug')) {
            $data['slug'] = Str::slug($request->name);
        }

        $genre->update($data);

        return response()->json([
            'success' => true,
            'message' => 'سبک با موفقیت ویرایش شد.',
            'genre'   => $genre
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        if (Schema::hasColumn('tracks', 'genre_id')) {
            Track::where('genre_id', $genre->id)->update(['genre_id' => null]);
        }

        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'سبک با موفقیت حذف گردید.'
        ]);
    }
}