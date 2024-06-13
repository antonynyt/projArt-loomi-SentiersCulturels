//CODE FROM https://gomakethings.com/improving-web-font-performance-with-service-workers/
var version = 'v_0.3';
// Cache IDs
var coreID = version + '_core';
var imgID = version + '_img';
var cacheIDs = [coreID, imgID];

// Max number of files in cache
var limits = {
	imgs: 20
};

// Font files
var fontFiles = [
    '/fonts/ppagrandir.woff2'
];

/**
 * Remove cached items over a certain number
 * @param  {String}  key The cache key
 * @param  {Integer} max The max number of items allowed
 */
var trimCache = function (key, max) {
	caches.open(key).then(function (cache) {
		cache.keys().then(function (keys) {
			if (keys.length <= max) return;
			cache.delete(keys[0]).then(function () {
				trimCache(key, max);
			});
		});
	});
};

// On install, cache some stuff
self.addEventListener('install', function (event) {
	self.skipWaiting();
	event.waitUntil(caches.open(coreID).then(function (cache) {
		cache.add(new Request('/favicon.ico'));
		fontFiles.forEach(function (file) {
			cache.add(new Request(file));
		});
		return cache;
	}));
});

// On version update, remove old cached files
self.addEventListener('activate', function (event) {
	event.waitUntil(caches.keys().then(function (keys) {
		return Promise.all(keys.filter(function (key) {
			return !cacheIDs.includes(key);
		}).map(function (key) {
			return caches.delete(key);
		}));
	}).then(function () {
		return self.clients.claim();
	}));
});

self.addEventListener('fetch', function (event) {
    // Get the request
	var request = event.request;

	// Bug fix
	// https://stackoverflow.com/a/49719964
	if (event.request.cache === 'only-if-cached' && event.request.mode !== 'same-origin') return;

	// Ignore non-GET requests
	if (request.method !== 'GET') return;

    // Images & Fonts
	// Offline-first
	if (request.url.match(/\.(?:png|jpg|jpeg|gif|webp|svg|woff|woff2)$/i)) {
		event.respondWith(
			caches.match(request).then(function (response) {
				return response || fetch(request).then(function (response) {
	
					// Stash a copy of this image in the images cache
					var copy = response.clone();
					event.waitUntil(caches.open(imgID).then(function (cache) {
						return cache.put(request, copy);
					}));
	
					// Return the requested file
					return response;
	
				});
			})
		);
	}
})

// Trim caches over a certain size
self.addEventListener('message', function (event) {
	if (event.data !== 'cleanUp') return;
	trimCache(imgID, limits.imgs);
});
