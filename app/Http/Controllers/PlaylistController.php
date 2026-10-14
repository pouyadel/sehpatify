<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    private function formatPlaylist(Playlist $playlist)
    {
        $playlist->tracks->each(function ($track) {
            $track->stream_url = $track->audio_path ? url("/api/tracks/{$track->id}/stream") : null;
        });

        $playlist->is_mine = Auth::check() && (int) $playlist->user_id === (int) Auth::id();
        $playlist->owner_name = $playlist->user
            ? ($playlist->user->username ?: $playlist->user->name)
            : 'استودیو سهپاتیفای';
        $playlist->is_user_created = !is_null($playlist->user_id);

        return $playlist;
    }

    // ۱. دریافت پلی‌لیست‌ها برای صفحه اصلی (فقط عمومی‌ها + پلی‌لیست‌های خودِ کاربر لاگین‌شده)
    public function index()
    {
        $playlists = Playlist::with(['tracks', 'user'])
            ->where(function ($query) {
                $query->where('is_public', true);
                if (Auth::check()) {
                    $query->orWhere('user_id', Auth::id());
                }
            })
            ->latest()
            ->get()
            ->map(function ($playlist) {
                return $this->formatPlaylist($playlist);
            });

        return response()->json($playlists);
    }

    // ۲. دریافت تمام پلی‌لیست‌ها (عمومی و خصوصیِ کاربران) مخصوص پنل ادمین
    public function adminIndex()
    {
        $playlists = Playlist::with(['tracks', 'user'])
            ->latest()
            ->get()
            ->map(function ($playlist) {
                return $this->formatPlaylist($playlist);
            });

        return response()->json($playlists);
    }

    // ۳. نمایش جزئیات یک پلی‌لیست (با بررسی دسترسی حریم خصوصی)
    public function show($id)
    {
        $playlist = Playlist::with(['tracks', 'user'])->findOrFail($id);

        $isOwner = Auth::check() && (int) $playlist->user_id === (int) Auth::id();
        $isAdmin = Auth::check() && Auth::user()->role === 'مدیر';

        if (!$playlist->is_public && !$isOwner && !$isAdmin) {
            return response()->json(['message' => 'این پلی‌لیست شخصی است و دسترسی به آن امکان‌پذیر نیست.'], 403);
        }

        return response()->json($this->formatPlaylist($playlist));
    }

    // ۴. ساخت پلی‌لیست شخصی توسط کاربر (حداکثر ۱۰ عدد، پیش‌فرض خصوصی)
    public function storeUserPlaylist(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'لطفاً ابتدا وارد حساب کاربری خود شوید.'], 401);
        }

        $userPlaylistsCount = Playlist::where('user_id', Auth::id())->count();
        if ($userPlaylistsCount >= 10) {
            return response()->json([
                'message' => 'شما به سقف مجاز ساخت ۱۰ پلی‌لیست شخصی رسیده‌اید.'
            ], 422);
        }

        $request->validate([
            'title'      => 'required|string|max:255',
            'desc'       => 'nullable|string|max:500',
            'cover_file' => 'nullable|image|max:10240',
            'cover_url'  => 'nullable|string',
            'track_ids'  => 'nullable|array',
        ], [
            'title.required' => 'لطفاً نام پلی‌لیست را وارد کنید.',
        ]);

        $coverPath = $request->input('cover_url');
        if ($request->hasFile('cover_file')) {
            $coverPath = '/storage/' . $request->file('cover_file')->store('playlists', 'public');
        }

        $playlist = Playlist::create([
            'user_id'   => Auth::id(),
            'title'     => trim($request->input('title')),
            'desc'      => $request->input('desc') ?: 'پلی‌لیست اختصاصی ' . (Auth::user()->username ?? Auth::user()->name),
            'cover'     => $coverPath ?: 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=500',
            'is_public' => false, // فقط برای خود کاربر و ادمین قابل مشاهده است
        ]);

        if ($request->has('track_ids') && is_array($request->track_ids)) {
            $playlist->tracks()->sync($request->track_ids);
        }

        $playlist->load(['tracks', 'user']);
        return response()->json($this->formatPlaylist($playlist), 201);
    }

    // ۵. ویرایش پلی‌لیست شخصی توسط صاحب اکانت (نام، توضیحات، کاور و لیست آهنگ‌ها)
    public function updateUserPlaylist(Request $request, $id)
    {
        $playlist = Playlist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'title'      => 'required|string|max:255',
            'desc'       => 'nullable|string|max:500',
            'cover_file' => 'nullable|image|max:10240',
            'cover_url'  => 'nullable|string',
            'track_ids'  => 'nullable|array',
        ]);

        if ($request->hasFile('cover_file')) {
            if ($playlist->cover && str_starts_with($playlist->cover, '/storage/playlists/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $playlist->cover));
            }
            $playlist->cover = '/storage/' . $request->file('cover_file')->store('playlists', 'public');
        } elseif ($request->filled('cover_url')) {
            $playlist->cover = $request->input('cover_url');
        }

        $playlist->title = trim($request->input('title'));
        $playlist->desc = $request->input('desc');
        $playlist->save();

        $trackIds = $request->input('track_ids', []);
        $playlist->tracks()->sync($trackIds);

        $playlist->load(['tracks', 'user']);
        return response()->json($this->formatPlaylist($playlist));
    }

    // ۶. حذف پلی‌لیست شخصی توسط صاحب اکانت
    public function destroyUserPlaylist($id)
    {
        $playlist = Playlist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($playlist->cover && str_starts_with($playlist->cover, '/storage/playlists/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $playlist->cover));
        }

        $playlist->tracks()->detach();
        $playlist->delete();

        return response()->json(['message' => 'پلی‌لیست شما با موفقیت حذف شد.']);
    }

    // ۷. افزودن سریع یک آهنگ به پلی‌لیست شخصی کاربر
    public function addTrackToUserPlaylist(Request $request, $id)
    {
        $playlist = Playlist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'track_id' => 'required|exists:tracks,id'
        ]);

        $exists = $playlist->tracks()->where('tracks.id', $request->track_id)->exists();
        if ($exists) {
            return response()->json(['message' => 'این آهنگ از قبل در این پلی‌لیست وجود دارد.'], 422);
        }

        $playlist->tracks()->attach($request->track_id);
        $playlist->load(['tracks', 'user']);

        return response()->json($this->formatPlaylist($playlist));
    }

    // ۸. حذف سریع یک آهنگ از پلی‌لیست شخصی کاربر
    public function removeTrackFromUserPlaylist(Request $request, $id)
    {
        $playlist = Playlist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'track_id' => 'required|exists:tracks,id'
        ]);

        $playlist->tracks()->detach($request->track_id);
        $playlist->load(['tracks', 'user']);

        return response()->json($this->formatPlaylist($playlist));
    }

    // ۹. ساخت پلی‌لیست رسمی توسط ادمین
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'desc'       => 'nullable|string',
            'cover_file' => 'nullable|image|max:10240',
            'cover_url'  => 'nullable|string',
            'track_ids'  => 'nullable|array',
        ]);

        $coverPath = $request->input('cover_url');
        if ($request->hasFile('cover_file')) {
            $coverPath = '/storage/' . $request->file('cover_file')->store('playlists', 'public');
        }

        $playlist = Playlist::create([
            'user_id'   => null,
            'title'     => $request->input('title'),
            'desc'      => $request->input('desc') ?: 'مجموعه اختصاصی سهپاتیفای',
            'cover'     => $coverPath ?: 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500',
            'is_public' => true,
        ]);

        if ($request->has('track_ids') && is_array($request->track_ids)) {
            $playlist->tracks()->sync($request->track_ids);
        }

        $playlist->load(['tracks', 'user']);
        return response()->json($this->formatPlaylist($playlist), 201);
    }

    // ۱۰. ویرایش پلی‌لیست توسط ادمین
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
            if ($playlist->cover && str_starts_with($playlist->cover, '/storage/playlists/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $playlist->cover));
            }
            $playlist->cover = '/storage/' . $request->file('cover_file')->store('playlists', 'public');
        } elseif ($request->filled('cover_url')) {
            $playlist->cover = $request->input('cover_url');
        }

        $playlist->title = $request->input('title');
        $playlist->desc = $request->input('desc');
        $playlist->save();

        $trackIds = $request->input('track_ids', []);
        $playlist->tracks()->sync($trackIds);

        $playlist->load(['tracks', 'user']);
        return response()->json($this->formatPlaylist($playlist));
    }

    // ۱۱. اشتراک‌گذاری عمومی (یا خصوصی کردن مجدد) پلی‌لیست کاربر توسط ادمین
    public function togglePublic($id)
    {
        $playlist = Playlist::with(['tracks', 'user'])->findOrFail($id);
        $playlist->is_public = !$playlist->is_public;
        $playlist->save();

        return response()->json([
            'message'  => $playlist->is_public
                ? "پلی‌لیست «{$playlist->title}» به اشتراک گذاشته شد و برای همه کاربران عمومی گردید ✓"
                : "پلی‌لیست «{$playlist->title}» به حالت خصوصی تغییر یافت.",
            'playlist' => $this->formatPlaylist($playlist)
        ]);
    }

    // ۱۲. حذف پلی‌لیست توسط ادمین
    public function destroy($id)
    {
        $playlist = Playlist::findOrFail($id);

        if ($playlist->cover && str_starts_with($playlist->cover, '/storage/playlists/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $playlist->cover));
        }

        $playlist->tracks()->detach();
        $playlist->delete();

        return response()->json(['message' => 'پلی‌لیست با موفقیت حذف گردید.']);
    }
}