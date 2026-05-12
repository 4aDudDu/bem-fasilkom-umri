@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-white">
    <!-- Soft Background Elements -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none overflow-hidden z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-50 rounded-full blur-[120px] opacity-60"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-indigo-50 rounded-full blur-[120px] opacity-60"></div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div data-aos="fade-up">
            <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-wider text-blue-600 uppercase bg-blue-50 rounded-full">
                BEM Fasilkom Periode 2024/2025
            </span>
            
            <h1 class="heading-huge mb-8">
                Mewujudkan <span class="text-blue-600">Aksi & Kreasi</span> <br>
                Mahasiswa Fasilkom
            </h1>
            
            <p class="text-xl text-slate-600 mb-12 max-w-2xl mx-auto leading-relaxed">
                Wadah aspirasi dan pengembangan potensi mahasiswa Fakultas Ilmu Komputer Universitas Muhammadiyah Riau yang inovatif dan kolaboratif.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="/lapor" class="btn-primary">
                    Aspirasi Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="/tentang" class="btn-secondary">
                    Tentang Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats Cards (Floating) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card-premium flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="font-bold text-lg mb-1">Cepat</h3>
                <p class="text-sm text-slate-500">Respon laporan cepat</p>
            </div>
            <div class="card-premium flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-bold text-lg mb-1">Aman</h3>
                <p class="text-sm text-slate-500">Privasi terjaga</p>
            </div>
            <div class="card-premium flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-cyan-50 text-cyan-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <h3 class="font-bold text-lg mb-1">Inovatif</h3>
                <p class="text-sm text-slate-500">Solusi kreatif</p>
            </div>
            <div class="bg-blue-600 rounded-3xl p-8 text-white flex flex-col justify-between shadow-xl shadow-blue-600/30">
                <div>
                    <h3 class="font-bold text-xl mb-2">Butuh Bantuan?</h3>
                    <p class="text-blue-100 text-sm mb-6">Chat Admin kami sekarang</p>
                </div>
                <a href="#" class="inline-flex items-center gap-2 font-bold hover:translate-x-2 transition-transform">
                    Hubungi WA <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Berita Section -->
@if(isset($beritaTerbaru) && $beritaTerbaru->count() > 0)
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-16" data-aos="fade-up">
            <div>
                <h2 class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-2">Informasi Terkini</h2>
                <p class="text-4xl font-black text-slate-900">Berita Terbaru</p>
            </div>
            <a href="/berita" class="hidden md:flex items-center gap-2 font-bold text-blue-600 hover:gap-4 transition-all">
                Lihat Semua <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($beritaTerbaru as $berita)
            <article class="group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="relative aspect-[4/3] rounded-3xl overflow-hidden mb-6 shadow-lg shadow-slate-200">
                    <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-blue-600 text-xs font-black rounded-full shadow-sm">
                            {{ strtoupper($berita->category->name) }}
                        </span>
                    </div>
                </div>
                <div class="px-2">
                    <div class="text-xs text-slate-400 font-bold mb-3 flex items-center gap-2">
                        <span>{{ strtoupper($berita->created_at->format('d M Y')) }}</span>
                        <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                        <span>{{ $berita->views }} VIEWS</span>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-blue-600 transition-colors line-clamp-2">
                        <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                    </h3>
                    <p class="text-slate-500 line-clamp-2 mb-6">
                        {{ $berita->excerpt }}
                    </p>
                    <a href="{{ route('berita.show', $berita->slug) }}" class="inline-flex items-center gap-2 font-bold text-blue-600 text-sm">
                        BACA SELENGKAPNYA <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
