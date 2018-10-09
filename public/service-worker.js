self.addEventListener('install', function(e) {
    e.waitUntil(
      caches.open('insiterad').then(function(cache) {
        return cache.addAll([
            '.',
            '/',
            '/login',
            '/js/jquery.min.js',
            '/js/app.js',
            '/js/calculo.js',
            '/css/app.css',
            '/css/calculo.css',
            '/images/logotipo.jpg',
            '/images/loading.gif'
        ]);
      })
    );
});      

self.addEventListener('fetch', function(e) {
    console.log(e.request.url);
    e.respondWith(
    caches.match(e.request).then(function(response) {
        return response || fetch(e.request);
    })
    );
});

