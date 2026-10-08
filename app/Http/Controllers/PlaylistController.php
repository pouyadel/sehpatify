<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::with('tracks')->latest()->get();
        return response()->json($playlists);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'desc'       => 'nullable|string',
            'cover_file' => 'nullable|image|max:10240',
            'cover_url'  => 'nullable|string',
            'track_ids'  => 'nullable|array',
        ], [
            'title.required' => 'عنوان پلی‌لیست الزامی است.',
        ]);

        $coverPath = $request->input('cover_url');
        if ($request->hasFile('cover_file')) {
            $coverPath = '/storage/' . $request->file('cover_file')->store('playlist_covers', 'public');
        }

        $playlist = Playlist::create([
            'title' => $request->input('title'),
            'desc'  => $request->input('desc') ?: 'کالکشن اختصاصی استودیو سهپاتیفای',
            'cover' => $coverPath ?: 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500',
            'count' => '۰ قطعه',
        ]);

        if ($request->has('track_ids') && is_array($request->track_ids)) {
            $playlist->tracks()->sync($request->track_ids);
        }

        $playlist->count = $playlist->tracks()->count() . ' قطعه';
        $playlist->save();

        return response()->json($playlist->load('tracks'), 201);
    }

    public function update(Request $request, $id)
    {
        $playlist = Playlist::findOrFail($id);

        $request->validate([
            'title'      => 'required|string|max:255',
            'desc'       => 'nullable|string',
            'cover_file' => 'nullable|image|max:10240',
            'cover_url'  => 'nullable|string',
            'track_ids'  => 'nullable|array',
        ]);

        if ($request->hasFile('cover_file')) {
            if ($playlist->cover && str_starts_with($playlist->cover, '/storage/playlist_covers/')) {
                $oldPath = str_replace('/storage/', '', $playlist->cover);
                Storage::disk('public')->delete($oldPath);
            }
            $playlist->cover = '/storage/' . $request->file('cover_file')->store('playlist_covers', 'public');
        } elseif ($request->filled('cover_url')) {
            $playlist->cover = $request->input('cover_url');
        }

        $playlist->title = $request->input('title');
        $playlist->desc = $request->input('desc') ?: $playlist->desc;

        $trackIds = $request->input('track_ids', []);
        $playlist->tracks()->sync($trackIds);

        $playlist->count = $playlist->tracks()->count() . ' قطعه';
        $playlist->save();

        return response()->json($playlist->load('tracks'));
    }
    // دریافت جزئیات یک پلی‌لیست به همراه قطعات آن
    public function show($id)
    {
        $playlist = Playlist::with('tracks')->findOrFail($id);
        return response()->json($playlist);
    }
    public function destroy($id)
    {
        $playlist = Playlist::findOrFail($id);

        if ($playlist->cover && str_starts_with($playlist->cover, '/storage/playlist_covers/')) {
            $oldPath = str_replace('/storage/', '', $playlist->cover);
            Storage::disk('public')->delete($oldPath);
        }

        $playlist->delete();

        return response()->json(['message' => 'پلی‌لیست با موفقیت حذف شد']);
    }
}