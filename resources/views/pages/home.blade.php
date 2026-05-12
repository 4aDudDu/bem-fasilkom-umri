@extends('layouts.app')

@section('title', 'BEM Fasilkom - Universitas Muhammadiyah Riau')

@section('content')
<!-- Hero Section with Glassmorphism -->
<section class="relative min-h-[85vh] flex items-center pt-16 overflow-hidden">
    <!-- Animated Background Gradients -->
    <div class="absolute top-0 left-0 w-full h-full z-0 overflow-hidden">
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-cyan-400/20 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-600/20 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-50 dark:bg-cyan-900/30 text-cyan-600 dark:text-cyan-400 text-sm font-bold mb-6">
                    <span class="w-2 h-2 rounded-full bg-cyan-500 animate-ping"></span>
                    BEM Fasilkom Periode 2024/2025
                </div>
                <h1 class="text-5xl sm:text-7xl font-extrabold text-slate-900 dark:text-white leading-tight mb-6">
                    Mewujudkan <br>
                    <span class="gradient-text">Aksi & Kreasi</span> <br>
                    Mahasiswa Fasilkom
                </h1>
                <p class="text-lg text-slate-600 dark:text-slate-400 mb-10 max-w-lg leading-relaxed">
                    Wadah aspirasi dan pengembangan potensi mahasiswa Fakultas Ilmu Komputer Universitas Muhammadiyah Riau yang inovatif dan kolaboratif.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="/lapor" class="btn-primary flex items-center gap-2">
                        <span>Aspirasi Sekarang</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="/tentang" class="btn-secondary">
                        Tentang Kami
                    </a>
                </div>
            </div>

            <!-- Visual Content -->
            <div class="relative" data-aos="zoom-in">
                <div class="relative z-10 glass dark:glass-dark rounded-[2.5rem] p-4 overflow-hidden shadow-2xl">
                    <div class="aspect-[4/3] rounded-[2rem] overflow-hidden bg-slate-200 dark:bg-slate-800">
                        <!-- Default Placeholder if no carousel -->
                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                            <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    </div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-cyan-400 rounded-full blur-3xl opacity-40"></div>
                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-blue-600 rounded-full blur-3xl opacity-40"></div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-12 bg-white dark:bg-slate-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="glass dark:glass-dark p-8 rounded-2xl text-center group hover:scale-105 transition-all">
                <div class="text-3xl font-bold text-cyan-600 mb-1">{{ $totalBerita }}</div>
                <div class="text-sm text-slate-500 font-medium">Berita Terkini</div>
            </div>
            <div class="glass dark:glass-dark p-8 rounded-2xl text-center group hover:scale-105 transition-all">
                <div class="text-3xl font-bold text-blue-600 mb-1">{{ $totalGaleri }}</div>
                <div class="text-sm text-slate-500 font-medium">Galeri Kegiatan</div>
            </div>
            <div class="glass dark:glass-dark p-8 rounded-2xl text-center group hover:scale-105 transition-all">
                <div class="text-3xl font-bold text-indigo-600 mb-1">{{ $totalAnggota }}</div>
                <div class="text-sm text-slate-500 font-medium">Anggota Aktif</div>
            </div>
            <div class="glass dark:glass-dark p-8 rounded-2xl text-center group hover:scale-105 transition-all">
                <div class="text-3xl font-bold text-purple-600 mb-1">{{ $totalAgenda }}</div>
                <div class="text-sm text-slate-500 font-medium">Agenda Mendatang</div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Section -->
@if(isset($beritaTerbaru) && $beritaTerbaru->count() > 0)
<section class="py-24 bg-slate-50 dark:bg-slate-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-12" data-aos="fade-up">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white">Berita Terbaru</h2>
                <p class="text-slate-500 mt-2">Update kegiatan dan informasi terbaru BEM Fasilkom</p>
            </div>
            <a href="/berita" class="text-cyan-600 font-bold hover:gap-2 transition-all flex items-center gap-1">
                Lihat Semua <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($beritaTerbaru as $berita)
            <article class="card-premium group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-1 bg-cyan-100 dark:bg-cyan-900/30 text-cyan-600 dark:text-cyan-400 text-xs font-bold rounded">
                            {{ $berita->category->name }}
                        </span>
                        <span class="text-xs text-slate-400">{{ $berita->created_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-3 line-clamp-2 hover:text-cyan-600 transition">
                        <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                    </h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-6">
                        {{ $berita->excerpt }}
                    </p>
                    <a href="{{ route('berita.show', $berita->slug) }}" class="inline-flex items-center gap-2 text-cyan-600 font-bold text-sm">
                        Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
