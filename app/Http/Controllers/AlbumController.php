<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with(['artist', 'tracks'])->latest()->get()->map(function ($album) {
            $album->artist_name = $album->artist ? $album->artist->name : 'نامشخص';
            $album->tracks_count = $album->tracks->count();
            return $album;
        });

        return response()->json($albums);
    }

    public function show($id)
    {
        $album = Album::with(['artist', 'tracks'])->findOrFail($id);
        $album->artist_name = $album->artist ? $album->artist->name : 'نامشخص';
        return response()->json($album);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'artist_id'       => 'required|exists:artists,id',
            'genre'           => 'nullable|string|max:100',
            'release_year'    => 'nullable|string|max:20',
            'description'     => 'nullable|string',
            'search_keywords' => 'nullable|string',
            'cover_file'      => 'nullable|image|max:10240',
            'cover_url'       => 'nullable|string',
            'track_ids'       => 'nullable|array',
        ], [
            'title.required'     => 'عنوان آلبوم الزامی است.',
            'artist_id.required' => 'انتخاب هنرمند آلبوم الزامی است.',
        ]);

        $coverPath = $request->input('cover_url');
        if ($request->hasFile('cover_file')) {
            $coverPath = '/storage/' . $request->file('cover_file')->store('albums', 'public');
        }

        $album = Album::create([
            'title'           => $request->input('title'),
            'artist_id'       => $request->input('artist_id'),
            'genre'           => $request->input('genre') ?: 'پاپ مدرن',
            'release_year'    => $request->input('release_year') ?: date('Y'),
            'description'     => $request->input('description'),
            'search_keywords' => $request->input('search_keywords'),
            'cover'           => $coverPath ?: 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500',
        ]);

        // انتساب آهنگ‌های انتخابی به این آلبوم
        if ($request->has('track_ids') && is_array($request->track_ids)) {
            Track::whereIn('id', $request->track_ids)->update([
                'album_id' => $album->id,
                'album'    => $album->title,
            ]);
        }

        return response()->json($album->load(['artist', 'tracks']), 201);
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        $request->validate([
            'title'           => 'required|string|max:255',
            'artist_id'       => 'required|exists:artists,id',
            'genre'           => 'nullable|string|max:100',
            'release_year'    => 'nullable|string|max:20',
            'description'     => 'nullable|string',
            'search_keywords' => 'nullable|string',
            'cover_file'      => 'nullable|image|max:10240',
            'cover_url'       => 'nullable|string',
            'track_ids'       => 'nullable|array',
        ]);

        if ($request->hasFile('cover_file')) {
            if ($album->cover && str_starts_with($album->cover, '/storage/albums/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $album->cover));
            }
            $album->cover = '/storage/' . $request->file('cover_file')->store('albums', 'public');
        } elseif ($request->filled('cover_url')) {
            $album->cover = $request->input('cover_url');
        }

        $album->title = $request->input('title');
        $album->artist_id = $request->input('artist_id');
        $album->genre = $request->input('genre');
        $album->release_year = $request->input('release_year');
        $album->description = $request->input('description');
        $album->search_keywords = $request->input('search_keywords');
        $album->save();

        // به‌روزرسانی آهنگ‌ها
        $newTrackIds = $request->input('track_ids', []);
        
        // ترک‌هایی که تیکشان برداشته شده آزاد می‌شوند
        Track::where('album_id', $album->id)
            ->whereNotIn('id', $newTrackIds)
            ->update(['album_id' => null]);

        // ترک‌های جدید به این آلبوم متصل می‌شوند
        if (!empty($newTrackIds)) {
            Track::whereIn('id', $newTrackIds)->update([
                'album_id' => $album->id,
                'album'    => $album->title,
            ]);
        }

        return response()->json($album->load(['artist', 'tracks']));
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);

        Track::where('album_id', $album->id)->update(['album_id' => null]);

        if ($album->cover && str_starts_with($album->cover, '/storage/albums/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $album->cover));
        }

        $album->delete();

        return response()->json(['message' => 'آلبوم با موفقیت حذف شد.']);
    }
}