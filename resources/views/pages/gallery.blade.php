@extends('layouts.app')
@section('title', 'Galeri - BEM Fasilkom')
@section('content')

<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-6 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">Galeri Foto</h1>
        <p class="text-slate-300 mt-2">Dokumentasi kegiatan BEM Fasilkom</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Filter -->
    <div class="flex justify-between items-center mb-8">
        <div class="flex gap-2 flex-wrap">
            <a href="/gallery" class="px-4 py-2 rounded-lg {{ !request('category') ? 'bg-cyan-500 text-white' : 'bg-slate-200 dark:bg-slate-800' }} transition">
                Semua
            </a>
            @foreach($categories as $category)
                <a href="/gallery?category={{ $category->id }}" 
                    class="px-4 py-2 rounded-lg {{ request('category') == $category->id ? 'bg-cyan-500 text-white' : 'bg-slate-200 dark:bg-slate-800' }} transition text-sm">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Masonry Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($galeri as $gallery)
            <a href="{{ route('gallery.show', $gallery->slug) }}" class="group relative overflow-hidden rounded-xl card-hover aspect-[4/3]" data-aos="zoom-in">
                <img src="{{ asset('uploads/' . $gallery->image) }}" alt="{{ $gallery->title }}" 
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all flex items-end justify-start p-4">
                    <div class="translate-y-8 group-hover:translate-y-0 transition-transform">
                        <p class="text-white font-bold">{{ $gallery->title }}</p>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-slate-600 dark:text-slate-400">Tidak ada foto ditemukan</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $galeri->links() }}
    </div>
</div>

@endsection
