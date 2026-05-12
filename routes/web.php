<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BeritaController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\StrukturController;
use App\Http\Controllers\Frontend\AgendaController;
use App\Http\Controllers\Frontend\LaporanController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Berita
Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/api/search', [BeritaController::class, 'search'])->name('berita.search');
    Route::post('/{id}/view', [BeritaController::class, 'incrementView'])->name('berita.view');
});

// Gallery
Route::prefix('gallery')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/{slug}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('/api/masonry', [GalleryController::class, 'masonry'])->name('gallery.masonry');
});

// Struktur BEM
Route::prefix('struktur')->group(function () {
    Route::get('/', [StrukturController::class, 'index'])->name('struktur.index');
    Route::get('/divisi/{slug}', [StrukturController::class, 'showDivision'])->name('struktur.division');
});

// Agenda
Route::prefix('agenda')->group(function () {
    Route::get('/', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/{slug}', [AgendaController::class, 'show'])->name('agenda.show');
});

// Lapor (Pengaduan)
Route::prefix('lapor')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('lapor.index');
    Route::post('/store', [LaporanController::class, 'store'])->name('lapor.store');
    Route::get('/{id}/status', [LaporanController::class, 'checkStatus'])->name('lapor.status');
});

// Other Pages
Route::get('/tentang', function () {
    return view('pages.tentang');
})->name('tentang');

Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

// Filament Admin Routes (auto-registered by Filament plugin)
