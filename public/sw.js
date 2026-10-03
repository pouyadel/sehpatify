const CACHE_NAME = 'sehpatify-v3';
const STATIC_FILES = [
  '/',
  '/manifest.json'
];

self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(STATIC_FILES)).catch(() => {})
  );
  self.skipWaiting();
});

self.addEventListener('activate', (e) => {
  e.waitUntil(
    caches.keys().then((keys) => {
      return Promise.all(
        keys.filter((key) => key !== CACHE_NAME).map((key) => caches.delete(key))
      );
    }).then(() => self.clients.claim())
  );
});

self.addEventListener('fetch', (e) => {
  // روت‌های پنل ادمین، استریم صوتی و API هرگز توسط Service Worker کش نمی‌شوند
  if (
    e.request.url.includes('/api/') || 
    e.request.url.includes('/stream') || 
    e.request.url.includes('/admin')
  ) {
    return;
  }

  e.respondWith(
    caches.match(e.request).then((res) => {
      return res || fetch(e.request).catch(() => caches.match('/'));
    })
  );
});