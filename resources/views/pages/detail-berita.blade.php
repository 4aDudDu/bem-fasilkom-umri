@extends('layouts.app')

@section('title', $berita->title . ' - BEM Fasilkom')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Hero Image / Slider -->
    <div class="relative h-96 md:h-[500px] rounded-xl overflow-hidden mb-8 -mx-4 sm:mx-0">
        @if($berita->images && count($berita->images) > 0)
            <div class="swiper-container berita-slider h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a data-fslightbox="news-gallery" href="{{ asset('uploads/' . $berita->thumbnail) }}" class="cursor-zoom-in">
                            <img src="{{ asset('uploads/' . $berita->thumbnail) }}" alt="{{ $berita->title }}" class="w-full h-full object-cover">
                        </a>
                    </div>
                    @foreach($berita->images as $img)
                        <div class="swiper-slide">
                            <a data-fslightbox="news-gallery" href="{{ asset('uploads/' . $img) }}" class="cursor-zoom-in">
                                <img src="{{ asset('uploads/' . $img) }}" alt="{{ $berita->title }}" class="w-full h-full object-cover">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        @else
            <a data-fslightbox="news-gallery" href="{{ asset('uploads/' . $berita->thumbnail) }}" class="cursor-zoom-in">
                <img src="{{ asset('uploads/' . $berita->thumbnail) }}" alt="{{ $berita->title }}" 
                    class="w-full h-full object-cover">
            </a>
        @endif
        
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8 pointer-events-none">
            <div class="flex items-center gap-2 mb-4">
                <span class="bg-cyan-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                    {{ $berita->category?->name }}
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white">{{ $berita->title }}</h1>
        </div>
    </div>

    <!-- Metadata -->
    <div class="glass dark:glass-dark rounded-xl p-6 mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                {{ substr($berita->author?->name, 0, 1) }}
            </div>
            <div>
                <p class="font-semibold">{{ $berita->author?->name }}</p>
                <p class="text-sm text-slate-600 dark:text-slate-400">
                    {{ $berita->published_at?->format('d M Y H:i') }}
                </p>
            </div>
        </div>
        <div class="flex items-center gap-4 text-sm text-slate-600 dark:text-slate-400">
            <span class="flex items-center gap-1">
                👁 {{ $berita->views }} views
            </span>
            <span>{{ $berita->read_time }} min read</span>
        </div>
    </div>

    <!-- Content -->
    <div class="prose dark:prose-invert max-w-none mb-12 text-justify">
        {!! $berita->content !!}
    </div>

    <!-- Tags -->
    @if($berita->tags && count($berita->tags) > 0)
        <div class="mb-12 flex flex-wrap gap-2">
            @foreach($berita->tags as $tag)
                <span class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-3 py-1 rounded-full text-sm hover:bg-slate-300 dark:hover:bg-slate-700 transition cursor-pointer">
                    #{{ $tag }}
                </span>
            @endforeach
        </div>
    @endif

    <!-- Divider -->
    <div class="border-t border-slate-300 dark:border-slate-700 my-12"></div>

    <!-- Related Posts -->
    @if($relatedBerita->count() > 0)
        <div>
            <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center md:text-left">Artikel Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedBerita as $related)
                    <a href="{{ route('berita.show', $related->slug) }}" class="glass dark:glass-dark rounded-xl overflow-hidden card-hover group">
                        <div class="relative overflow-hidden h-40">
                            <img src="{{ asset('uploads/' . $related->thumbnail) }}" alt="{{ $related->title }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold line-clamp-2 group-hover:text-cyan-600 transition mb-2">
                                {{ $related->title }}
                            </h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400">
                                {{ $related->published_at?->format('d M Y') }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.berita-slider', {
                loop: true,
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                autoplay: { delay: 5000, disableOnInteraction: false },
            });
            
            // Refresh Lightbox to detect new elements
            refreshFsLightbox();
        });
    </script>
@endpush

@endsection
