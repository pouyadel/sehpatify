<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Artist;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    // دریافت لیست همه آهنگ‌ها (همراه با خوانندگان فیت)
    public function index()
    {
        $tracks = Track::with('artists')->latest()->get()->map(function ($track) {
            $track->stream_url = $track->audio_path ? url("/api/tracks/{$track->id}/stream") : null;

            // استخراج خوانندگان فیت به صورت متن و آرایه آیدی‌ها
            $artists = $track->artists;
            if ($artists->isNotEmpty()) {
                $track->artist = $artists->pluck('name')->join(' & ');
                $track->artist_ids = $artists->pluck('id')->toArray();
            } else {
                $track->artist_ids = $track->artist_id ? [$track->artist_id] : [];
            }

            return $track;
        });

        return response()->json($tracks);
    }

    // ایجاد آهنگ جدید (پشتیبانی کامل از فیت و فایل صوتی)
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'artist_id'    => 'nullable',
            'artist_ids'   => 'nullable|array',
            'album'        => 'nullable|string|max:255',
            'genre'        => 'nullable|string|max:100',
            'duration'     => 'nullable|string',
            'duration_sec' => 'nullable|numeric',
            'audio_file'   => 'required|file|max:102400',
            'cover_file'   => 'nullable|image|max:10240',
            'cover_url'    => 'nullable|string',
            'is_lossless'  => 'nullable',
        ], [
            'title.required'      => 'عنوان ترانه الزامی است.',
            'audio_file.required' => 'فایل صوتی ترانه را انتخاب نکرده‌اید.',
        ]);

        // پشتیبانی همزمان از artist_ids (فیت) و artist_id تکی
        $artistIds = $request->input('artist_ids', []);
        if (empty($artistIds) && $request->filled('artist_id')) {
            $artistIds = [$request->input('artist_id')];
        }

        if (empty($artistIds)) {
            return response()->json([
                'message' => 'لطفاً حداقل یک خواننده برای ترانه انتخاب فرمایید.',
                'errors'  => ['artist_id' => ['انتخاب خواننده الزامی است.']]
            ], 422);
        }

        // واکشی خوانندگان انتخاب‌شده
        $artists = Artist::whereIn('id', $artistIds)->get();
        if ($artists->isEmpty()) {
            return response()->json([
                'message' => 'خواننده انتخاب شده یافت نشد.',
                'errors'  => ['artist_id' => ['خواننده نامعتبر است.']]
            ], 422);
        }

        $artistNames = $artists->pluck('name')->join(' & ');
        $primaryArtistId = $artists->first()->id;

        // آپلود فایل صوتی
        $audioPath = $request->file('audio_file')->store('tracks', 'public');

        // پردازش کاور
        $coverPath = $request->input('cover_url');
        if ($request->hasFile('cover_file')) {
            $coverPath = '/storage/' . $request->file('cover_file')->store('covers', 'public');
        }

        $duration = $request->input('duration') ?: '03:30';
        $durationSec = (int) ($request->input('duration_sec') ?: 210);

        // درج رکورد آهنگ در دیتابیس
        $track = Track::create([
            'title'        => $request->input('title'),
            'artist'       => $artistNames,
            'artist_id'    => $primaryArtistId,
            'album'        => $request->input('album') ?: $request->input('title'),
            'genre'        => $request->input('genre') ?: 'پاپ مدرن',
            'duration'     => $duration,
            'duration_sec' => $durationSec,
            'cover'        => $coverPath ?: 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500',
            'audio_path'   => $audioPath,
            'is_lossless'  => filter_var($request->input('is_lossless'), FILTER_VALIDATE_BOOLEAN),
            'streams'      => 0,
            'lyrics'       => [],
            'favorited'    => false,
        ]);

        // ذخیره خوانندگان فیت در جدول واسط با زمان دقیق
        $syncData = [];
        foreach ($artists as $a) {
            $syncData[$a->id] = ['created_at' => now(), 'updated_at' => now()];
        }
        $track->artists()->sync($syncData);

        $track->stream_url = url("/api/tracks/{$track->id}/stream");
        $track->artist_ids = $artists->pluck('id')->toArray();

        return response()->json($track, 201);
    }

    // ویرایش آهنگ موجود
    public function update(Request $request, $id)
    {
        $track = Track::findOrFail($id);

        $request->validate([
            'title'        => 'required|string|max:255',
            'artist_id'    => 'nullable',
            'artist_ids'   => 'nullable|array',
            'album'        => 'nullable|string|max:255',
            'genre'        => 'nullable|string|max:100',
            'duration'     => 'nullable|string',
            'duration_sec' => 'nullable|numeric',
            'audio_file'   => 'nullable|file|max:102400',
            'cover_file'   => 'nullable|image|max:10240',
            'cover_url'    => 'nullable|string',
            'is_lossless'  => 'nullable',
        ]);

        if ($request->hasFile('audio_file')) {
            if ($track->audio_path && Storage::disk('public')->exists($track->audio_path)) {
                Storage::disk('public')->delete($track->audio_path);
            }
            $track->audio_path = $request->file('audio_file')->store('tracks', 'public');
        }

        if ($request->hasFile('cover_file')) {
            $track->cover = '/storage/' . $request->file('cover_file')->store('covers', 'public');
        } elseif ($request->filled('cover_url')) {
            $track->cover = $request->input('cover_url');
        }

        // همگام‌سازی خوانندگان در صورت ارسال
        $artistIds = $request->input('artist_ids', []);
        if (empty($artistIds) && $request->filled('artist_id')) {
            $artistIds = [$request->input('artist_id')];
        }

        if (!empty($artistIds)) {
            $artists = Artist::whereIn('id', $artistIds)->get();
            if ($artists->isNotEmpty()) {
                $track->artist_id = $artists->first()->id;
                $track->artist = $artists->pluck('name')->join(' & ');

                $syncData = [];
                foreach ($artists as $a) {
                    $syncData[$a->id] = ['created_at' => now(), 'updated_at' => now()];
                }
                $track->artists()->sync($syncData);
            }
        }

        $track->title = $request->input('title');
        $track->album = $request->input('album') ?: $request->input('title');
        $track->genre = $request->input('genre') ?: $track->genre;
        if ($request->filled('duration')) $track->duration = $request->input('duration');
        if ($request->filled('duration_sec')) $track->duration_sec = (int) $request->input('duration_sec');
        if ($request->has('is_lossless')) {
            $track->is_lossless = filter_var($request->input('is_lossless'), FILTER_VALIDATE_BOOLEAN);
        }

        $track->save();
        $track->stream_url = $track->audio_path ? url("/api/tracks/{$track->id}/stream") : null;
        $track->artist_ids = $track->artists->pluck('id')->toArray();

        return response()->json($track);
    }

    // استریم فایل صوتی با پشتیبانی از Seek
    public function stream($id)
    {
        $track = Track::findOrFail($id);

        if (empty($track->audio_path)) {
            return response()->json(['message' => 'فایل صوتی برای این قطعه آپلود نشده است.'], 404);
        }

        $fullPath = storage_path('app/public/' . $track->audio_path);

        if (!is_file($fullPath) || !file_exists($fullPath)) {
            return response()->json(['message' => 'فایل فیزیکی روی سرور یافت نشد.'], 404);
        }

        $track->increment('streams');

        return response()->file($fullPath, [
            'Content-Type'  => mime_content_type($fullPath) ?: 'audio/mpeg',
            'Accept-Ranges' => 'bytes',
        ]);
    }

    // ذخیره لیریکس همگام
    public function saveLyrics(Request $request, $id)
    {
        $request->validate([
            'lyrics' => 'present|array'
        ]);

        $track = Track::findOrFail($id);
        $track->lyrics = $request->lyrics;
        $track->save();

        return response()->json([
            'message' => 'متن ترانه با موفقیت در دیتابیس ذخیره شد',
            'track'   => $track
        ]);
    }

    // افزودن/حذف از علاقه‌مندی‌ها
    public function toggleFavorite($id)
    {
        $track = Track::findOrFail($id);
        $track->favorited = !$track->favorited;
        $track->save();

        return response()->json(['favorited' => $track->favorited]);
    }

    // حذف کامل آهنگ از سرور و دیتابیس
    public function destroy($id)
    {
        $track = Track::findOrFail($id);

        if ($track->audio_path && Storage::disk('public')->exists($track->audio_path)) {
            Storage::disk('public')->delete($track->audio_path);
        }

        // قطع رابطه با خوانندگان قبل از حذف
        $track->artists()->detach();
        $track->delete();

        return response()->json(['message' => 'قطعه صوتی با موفقیت حذف شد']);
    }

    // آمار زنده داشبورد ادمین
    public function dashboardStats()
    {
        $totalTracks = Track::count();

        $syncedLyrics = Track::whereNotNull('lyrics')
            ->where('lyrics', '!=', '[]')
            ->where('lyrics', '!=', '')
            ->count();

        $totalStreams = (int) Track::sum('streams');
        $totalArtists = Artist::count();
        $totalPlaylists = Playlist::count();
        $totalUsers = User::count();

        $lyricsCoverage = $totalTracks > 0 ? round(($syncedLyrics / $totalTracks) * 100) : 0;

        $liveTracks = Track::orderBy('streams', 'desc')->take(4)->get([
            'id', 'title', 'artist', 'cover', 'genre', 'streams', 'is_lossless'
        ]);

        return response()->json([
            'total_tracks'    => $totalTracks,
            'synced_lyrics'   => $syncedLyrics,
            'lyrics_coverage' => $lyricsCoverage,
            'total_streams'   => $totalStreams,
            'total_artists'   => $totalArtists,
            'total_playlists' => $totalPlaylists,
            'total_users'     => $totalUsers > 0 ? $totalUsers : 4,
            'live_tracks'     => $liveTracks,
        ]);
    }
}