@extends('layouts.app')
@section('title', $gallery->title . ' - Galeri')
@section('content')

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="w-full rounded-xl mb-8">
    
    <div class="glass dark:glass-dark p-8 rounded-xl">
        <h1 class="text-4xl font-bold mb-4">{{ $gallery->title }}</h1>
        @if($gallery->description)
            <p class="text-slate-600 dark:text-slate-400 text-lg mb-4">{{ $gallery->description }}</p>
        @endif
        <div class="flex items-center gap-4 text-sm text-slate-600 dark:text-slate-400">
            <span>{{ $gallery->category?->name }}</span>
            <span>{{ $gallery->created_at->format('d M Y') }}</span>
        </div>
    </div>

    <div class="mt-8 text-center">
        <a href="/gallery" class="btn-primary">Kembali ke Galeri</a>
    </div>
</div>

@endsection
