<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    // دریافت لیست همه آهنگ‌ها
    public function index()
    {
        $tracks = Track::latest()->get()->map(function ($track) {
            $track->stream_url = $track->audio_path ? url("/api/tracks/{$track->id}/stream") : null;
            return $track;
        });

        return response()->json($tracks);
    }

    // آپلود و افزودن آهنگ جدید
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'artist'      => 'required|string|max:255',
            'album'       => 'nullable|string|max:255',
            'genre'       => 'nullable|string|max:100',
            'duration'    => 'nullable|string',
            'duration_sec'=> 'nullable|numeric',
            'audio_file'  => 'required|file|max:102400', // تا ۱۰۰ مگابایت
            'cover_file'  => 'nullable|image|max:10240',
            'cover_url'   => 'nullable|string',
            'is_lossless' => 'nullable',
        ], [
            'title.required'      => 'عنوان ترانه الزامی است.',
            'artist.required'     => 'نام هنرمند الزامی است.',
            'audio_file.required' => 'فایل صوتی ترانه را انتخاب نکرده‌اید.',
            'audio_file.max'      => 'حجم فایل صوتی بیش از حد مجاز است (حداکثر ۱۰۰ مگابایت).',
        ]);

        $audioPath = $request->file('audio_file')->store('tracks', 'public');

        $coverPath = $request->input('cover_url');
        if ($request->hasFile('cover_file')) {
            $coverPath = '/storage/' . $request->file('cover_file')->store('covers', 'public');
        }

        $duration = $request->input('duration') ?: '03:30';
        $durationSec = (int) ($request->input('duration_sec') ?: 210);

        $track = Track::create([
            'title'        => $request->input('title'),
            'artist'       => $request->input('artist'),
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

        $track->stream_url = url("/api/tracks/{$track->id}/stream");

        return response()->json($track, 201);
    }

    // ویرایش اطلاعات اثر
    public function update(Request $request, $id)
    {
        $track = Track::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'artist'      => 'required|string|max:255',
            'album'       => 'nullable|string|max:255',
            'genre'       => 'nullable|string|max:100',
            'duration'    => 'nullable|string',
            'duration_sec'=> 'nullable|numeric',
            'audio_file'  => 'nullable|file|max:102400',
            'cover_file'  => 'nullable|image|max:10240',
            'cover_url'   => 'nullable|string',
            'is_lossless' => 'nullable',
        ]);

        // در صورت انتخاب فایل صوتی جدید، قبلی حذف و جدید جایگزین می‌شود
        if ($request->hasFile('audio_file')) {
            if ($track->audio_path && Storage::disk('public')->exists($track->audio_path)) {
                Storage::disk('public')->delete($track->audio_path);
            }
            $track->audio_path = $request->file('audio_file')->store('tracks', 'public');
        }

        // در صورت آپلود کاور جدید
        if ($request->hasFile('cover_file')) {
            $track->cover = '/storage/' . $request->file('cover_file')->store('covers', 'public');
        } elseif ($request->filled('cover_url')) {
            $track->cover = $request->input('cover_url');
        }

        $track->title = $request->input('title');
        $track->artist = $request->input('artist');
        $track->album = $request->input('album') ?: $request->input('title');
        $track->genre = $request->input('genre') ?: $track->genre;
        if ($request->filled('duration')) $track->duration = $request->input('duration');
        if ($request->filled('duration_sec')) $track->duration_sec = (int) $request->input('duration_sec');
        if ($request->has('is_lossless')) {
            $track->is_lossless = filter_var($request->input('is_lossless'), FILTER_VALIDATE_BOOLEAN);
        }

        $track->save();
        $track->stream_url = $track->audio_path ? url("/api/tracks/{$track->id}/stream") : null;

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

        $track->delete();

        return response()->json(['message' => 'قطعه صوتی با موفقیت حذف شد']);
    }
}