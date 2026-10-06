<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Track;
use App\Models\Artist;
use App\Models\Playlist;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Artist::create([
            'name' => 'چارتار',
            'genre' => 'تلفیقی الکترونیک',
            'listeners' => '۱,۸۴۰,۳۲۰',
            'verified' => true,
            'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=80'
        ]);

        Track::create([
            'title' => 'آرمان‌شهر',
            'artist' => 'چارتار (Chaartaar)',
            'album' => 'باران تویی',
            'duration' => '04:12',
            'duration_sec' => 252,
            'cover' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=500&auto=format&fit=crop&q=80',
            'genre' => 'تلفیقی و الکترونیک',
            'mood' => 'تمرکز',
            'is_lossless' => true,
            'streams' => 142800,
            'favorited' => true,
            'lyrics' => [
                ['time' => 0, 'fa' => 'در هوایت بی قرارم روز و شب...', 'en' => 'Restless in your yearning day and night...'],
                ['time' => 15.2, 'fa' => 'سر ز پایت بر ندارم روز و شب...', 'en' => 'My head upon your path, without end...'],
                ['time' => 30.5, 'fa' => 'آسمان با رقص ما روشن شد از نور سحر', 'en' => 'The skies ignited with dawn from our dance'],
                ['time' => 55.0, 'fa' => 'ریتم باران روی سازم زندگی بخشید باز', 'en' => 'The rhythm of rain breathed life upon my strings']
            ]
        ]);

        Track::create([
            'title' => 'طهران در مه',
            'artist' => 'اکو تهران (Echo Tehran)',
            'album' => 'شب‌های دود و چراغ',
            'duration' => '03:45',
            'duration_sec' => 225,
            'cover' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=80',
            'genre' => 'آلترناتیو',
            'mood' => 'شبانه',
            'is_lossless' => true,
            'streams' => 89400,
            'favorited' => false,
            'lyrics' => [
                ['time' => 0, 'fa' => 'چراغ‌های اتوبان در امتداد شب', 'en' => 'Highway lights stretching across midnight'],
                ['time' => 20.4, 'fa' => 'صدای پای خاطره در ازدحام مه', 'en' => 'Echoes of memory amidst the velvet haze'],
                ['time' => 42.1, 'fa' => 'سهپاتیفای در گوش من زمزمه می‌کند', 'en' => 'Sehpatify murmuring softly in my ears']
            ]
        ]);

        Playlist::create([
            'title' => 'شب‌های تهران',
            'count' => '۲۴ قطعه',
            'cover' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=80',
            'desc' => 'نواهای دلنشین برای رانندگی شبانه و آرامش پایتخت'
        ]);
        // سبک‌های اصلی موسیقی
        $defaultGenres = [
            ['name' => 'پاپ مدرن', 'slug' => 'pop'],
            ['name' => 'سنتی معاصر', 'slug' => 'traditional'],
            ['name' => 'تلفیقی و الکترونیک', 'slug' => 'electronic-fusion'],
            ['name' => 'آلترناتیو و راک', 'slug' => 'rock'],
            ['name' => 'رپ و هیپ‌هاپ', 'slug' => 'rap'],
            ['name' => 'امبینت و ریلکس', 'slug' => 'ambient'],
            ['name' => 'کلاسیک ایرانی', 'slug' => 'classical'],
            ['name' => 'بلوز و جاز', 'slug' => 'jazz'],
        ];

        foreach ($defaultGenres as $genre) {
            \App\Models\Genre::firstOrCreate(['slug' => $genre['slug']], $genre);
        }
    }
}