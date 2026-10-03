<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TrackController extends Controller
{
    // دریافت لیست همه آهنگ‌ها از دیتابیس
    public function index()
    {
        $tracks = Track::latest()->get()->map(function ($track) {
            // ساخت آدرس مستقیم استریم موزیک برای فرانت
            $track->stream_url = url("/api/tracks/{$track->id}/stream");
            return $track;
        });

        return response()->json($tracks);
    }

    // آپلود و ذخیره آهنگ جدید
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'artist'      => 'required|string|max:255',
            'album'       => 'nullable|string|max:255',
            'genre'       => 'nullable|string|max:100',
            'duration'    => 'nullable|string',
            'duration_sec'=> 'nullable|numeric',
            'audio_file'  => 'required|file|mimes:mp3,wav,ogg,flac|max:51200', // حداکثر ۵۰ مگابایت
            'cover_file'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'cover_url'   => 'nullable|string',
            'is_lossless' => 'nullable|string',
        ]);

        // ذخیره فایل موزیک
        $audioPath = $request->file('audio_file')->store('tracks', 'public');

        // ذخیره کاور (یا از فایل آپلود شده یا از آدرس URL)
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
            'genre'        => $request->input('genre') ?: 'پاپ',
            'duration'     => $duration,
            'duration_sec' => $durationSec,
            'cover'        => $coverPath ?: 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500',
            'audio_path'   => $audioPath,
            'is_lossless'  => $request->input('is_lossless') === 'true',
            'streams'      => 0,
            'lyrics'       => [],
            'favorited'    => false,
        ]);

        $track->stream_url = url("/api/tracks/{$track->id}/stream");

        return response()->json($track, 201);
    }

    // استریم فایل صوتی با پشتیبانی از Seek و بافرینگ استاندارد
    public function stream($id)
    {
        $track = Track::findOrFail($id);
        $fullPath = storage_path('app/public/' . $track->audio_path);

        if (!file_exists($fullPath)) {
            return response()->json(['message' => 'فایل صوتی روی سرور یافت نشد'], 404);
        }

        // افزایش شمارنده استریم
        $track->increment('streams');

        $response = new BinaryFileResponse($fullPath);
        BinaryFileResponse::trustXSendfileTypeHeader();

        return $response;
    }

    // ذخیره لیریکس همگام‌سازی شده از استودیو
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

    // حذف آهنگ
    public function destroy($id)
    {
        $track = Track::findOrFail($id);

        if ($track->audio_path && Storage::disk('public')->exists($track->audio_path)) {
            Storage::disk('public')->delete($track->audio_path);
        }

        $track->delete();

        return response()->json(['message' => 'آهنگ حذف شد']);
    }
}