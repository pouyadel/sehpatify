<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtistController extends Controller
{
    // لیست همه هنرمندان همراه با سبک‌ها و تعداد آهنگ‌ها
    public function index()
    {
        $artists = Artist::with('genres')
            ->withCount('tracks')
            ->latest()
            ->get()
            ->map(function ($artist) {
                // اگر سبک دستی رشته‌ای ذخیره شده بود و رابطه‌ای نداشت، سازگاری حفظ شود
                $artist->genre_names = $artist->genres->pluck('name')->implode('، ') ?: ($artist->genre ?: 'عمومی');
                return $artist;
            });

        return response()->json($artists);
    }

    // لیست کامل سبک‌های پلتفرم برای فرم‌ها و چک‌باکس‌ها
    public function genres()
    {
        return response()->json(Genre::orderBy('name')->get());
    }

    // دریافت اطلاعات تکمیلی یک هنرمند همراه با تمام آهنگ‌های او
    public function show($id)
    {
        $artist = Artist::with('genres')
            ->with(['tracks' => function ($q) {
                $q->latest();
            }])
            ->findOrFail($id);

        $artist->genre_names = $artist->genres->pluck('name')->implode('، ') ?: ($artist->genre ?: 'عمومی');

        // ایجاد آدرس مستقیم استریم برای آهنگ‌های این هنرمند
        $artist->tracks->each(function ($track) {
            $track->stream_url = $track->audio_path ? url("/api/tracks/{$track->id}/stream") : null;
        });

        return response()->json($artist);
    }

    // ثبت هنرمند جدید
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'bio'         => 'nullable|string',
            'listeners'   => 'nullable|string',
            'verified'    => 'nullable',
            'image_file'  => 'nullable|image|max:10240',
            'image_url'   => 'nullable|string',
            'genre_ids'   => 'nullable|array',
        ], [
            'name.required' => 'نام هنرمند الزامی است.',
        ]);

        $imagePath = $request->input('image_url');
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('artists', 'public');
        }

        $artist = Artist::create([
            'name'      => $request->input('name'),
            'slug'      => Str::slug($request->input('name')) ?: time(),
            'bio'       => $request->input('bio'),
            'listeners' => $request->input('listeners') ?: '۰',
            'verified'  => filter_var($request->input('verified'), FILTER_VALIDATE_BOOLEAN),
            'image'     => $imagePath ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500',
        ]);

        if ($request->has('genre_ids') && is_array($request->genre_ids)) {
            $artist->genres()->sync($request->genre_ids);
        }

        return response()->json($artist->load('genres'), 201);
    }

    // ویرایش مشخصات، سبک‌ها و تصویر هنرمند
    public function update(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'bio'         => 'nullable|string',
            'listeners'   => 'nullable|string',
            'verified'    => 'nullable',
            'image_file'  => 'nullable|image|max:10240',
            'image_url'   => 'nullable|string',
            'genre_ids'   => 'nullable|array',
        ]);

        if ($request->hasFile('image_file')) {
            if ($artist->image && str_starts_with($artist->image, '/storage/artists/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $artist->image));
            }
            $artist->image = '/storage/' . $request->file('image_file')->store('artists', 'public');
        } elseif ($request->filled('image_url')) {
            $artist->image = $request->input('image_url');
        }

        $artist->name = $request->input('name');
        $artist->bio = $request->input('bio');
        $artist->listeners = $request->input('listeners') ?: $artist->listeners;
        $artist->verified = filter_var($request->input('verified'), FILTER_VALIDATE_BOOLEAN);
        $artist->save();

        $genreIds = $request->input('genre_ids', []);
        $artist->genres()->sync($genreIds);

        return response()->json($artist->load('genres'));
    }

    // حذف ایمن هنرمند (Deletion Safety)
    public function destroy($id)
    {
        $artist = Artist::withCount('tracks')->findOrFail($id);

        // شرط ایمنی حذف: اگر آهنگی متصل باشد اجازه حذف داده نمی‌شود
        if ($artist->tracks_count > 0) {
            return response()->json([
                'message' => "این هنرمند دارای {$artist->tracks_count} قطعه صوتی در سیستم است. ابتدا آهنگ‌های او را ویرایش یا حذف کنید."
            ], 422);
        }

        if ($artist->image && str_starts_with($artist->image, '/storage/artists/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $artist->image));
        }

        $artist->genres()->detach();
        $artist->delete();

        return response()->json(['message' => 'هنرمند با موفقیت حذف گردید.']);
    }
}