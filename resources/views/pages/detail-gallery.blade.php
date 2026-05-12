@extends('layouts.app')
@section('title', $gallery->title . ' - Galeri')
@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="glass dark:glass-dark p-8 rounded-xl mb-12" data-aos="fade-up">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-4xl font-bold mb-2">{{ $gallery->title }}</h1>
                <div class="flex items-center gap-4 text-sm text-slate-600 dark:text-slate-400">
                    <span class="bg-cyan-500/20 text-cyan-600 dark:text-cyan-400 px-3 py-1 rounded-full font-semibold">
                        {{ $gallery->category?->name ?? 'Dokumentasi' }}
                    </span>
                    <span>{{ $gallery->created_at->format('d M Y') }}</span>
                </div>
            </div>
            <a href="/gallery" class="btn-secondary">
                ← Kembali
            </a>
        </div>
        @if($gallery->description)
            <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed">{{ $gallery->description }}</p>
        @endif
    </div>

    <!-- Main Collection -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <!-- Cover Image -->
        <a data-fslightbox="gallery" href="{{ asset('uploads/' . $gallery->image) }}" class="lg:col-span-2 row-span-2 rounded-xl overflow-hidden shadow-2xl group cursor-zoom-in" data-aos="zoom-in">
            <img src="{{ asset('uploads/' . $gallery->image) }}" alt="{{ $gallery->title }}" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
        </a>

        <!-- Documentation Images -->
        @if($gallery->images && count($gallery->images) > 0)
            @foreach($gallery->images as $img)
                <a data-fslightbox="gallery" href="{{ asset('uploads/' . $img) }}" class="rounded-xl overflow-hidden shadow-lg group cursor-zoom-in aspect-video" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                    <img src="{{ asset('uploads/' . $img) }}" alt="{{ $gallery->title }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </a>
            @endforeach
        @endif
    </div>

    <div class="text-center">
        <a href="/gallery" class="btn-primary">
            Lihat Galeri Lainnya
        </a>
    </div>
</div>

@endsection
