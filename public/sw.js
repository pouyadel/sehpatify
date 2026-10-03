const CACHE_NAME = 'sehpatify-v1';
const STATIC_FILES = [
  '/',
  '/manifest.json'
];

self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(STATIC_FILES))
  );
  self.skipWaiting();
});

self.addEventListener('activate', (e) => {
  e.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', (e) => {
  if (e.request.url.includes('/api/')) {
    return; // درخواست‌های API کش نشوند تا اطلاعات همیشه به‌روز باشد
  }
  e.respondWith(
    caches.match(e.request).then((res) => res || fetch(e.request))
  );
});