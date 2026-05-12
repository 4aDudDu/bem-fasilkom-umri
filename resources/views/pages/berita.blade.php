@extends('layouts.app')

@section('title', 'Berita - BEM Fasilkom')

@section('content')

<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-6 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold">Berita & Pengumuman</h1>
        <p class="text-slate-300 mt-2">Tetap update dengan informasi terbaru dari BEM Fasilkom</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Filters -->
        <aside class="lg:col-span-1">
            <div class="glass dark:glass-dark rounded-xl p-6 sticky top-24">
                <h3 class="font-bold text-lg mb-4">Filter</h3>

                <!-- Search -->
                <form action="/berita" method="GET" class="mb-6">
                    <input type="text" name="search" placeholder="Cari berita..." 
                        value="{{ request('search') }}"
                        class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </form>

                <!-- Categories -->
                <div class="mb-6">
                    <h4 class="font-semibold mb-3 text-sm uppercase text-slate-600 dark:text-slate-400">Kategori</h4>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                            <a href="{{ request()->fullUrlWithQuery(['category' => $category->id]) }}"
                                class="flex items-center gap-2 text-sm py-2 px-3 rounded-lg {{ request('category') == $category->id ? 'bg-cyan-500 text-white' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }} transition">
                                <span class="inline-block w-3 h-3 rounded-full" style="background-color: {{ $category->color }}"></span>
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Academic Year -->
                <div class="mb-6">
                    <h4 class="font-semibold mb-3 text-sm uppercase text-slate-600 dark:text-slate-400">Angkatan BEM</h4>
                    <div class="space-y-2">
                        @foreach($angkatanBems as $angkatan)
                            <a href="{{ request()->fullUrlWithQuery(['angkatan' => $angkatan->id]) }}"
                                class="flex items-center gap-2 text-sm py-2 px-3 rounded-lg {{ request('angkatan') == $angkatan->id ? 'bg-blue-500 text-white' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }} transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $angkatan->tahun }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Clear Filters -->
                @if(request('search') || request('category') || request('angkatan'))
                    <a href="/berita" class="block w-full text-center px-4 py-2 bg-slate-200 dark:bg-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-300 dark:hover:bg-slate-600 transition">
                        Hapus Filter
                    </a>
                @endif
            </div>
        </aside>

        <!-- Main Content -->
        <main class="lg:col-span-3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                @forelse($berita as $item)
                    <a href="{{ route('berita.show', $item->slug) }}" class="glass dark:glass-dark rounded-xl overflow-hidden card-hover group transition-all" data-aos="zoom-in">
                        <!-- Thumbnail / Slider -->
                        <div class="relative overflow-hidden h-48">
                            @if($item->images && count($item->images) > 0)
                                <div class="swiper-container news-swiper h-full" id="news-swiper-{{ $item->id }}">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('uploads/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                        </div>
                                        @foreach($item->images as $img)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('uploads/' . $img) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination !bottom-2"></div>
                                </div>
                            @else
                                <img src="{{ asset('uploads/' . $item->thumbnail) }}" alt="{{ $item->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif
                            
                            <div class="absolute top-4 right-4 z-10">
                                <span class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $item->category?->name ?? 'Berita' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                {{ $item->published_at?->format('d M Y') }}
                            </p>
                            <h3 class="font-bold text-lg mb-3 line-clamp-2 group-hover:text-cyan-600 transition">
                                {{ $item->title }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-3 mb-4 text-justify">
                                {{ $item->description }}
                            </p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-slate-500 dark:text-slate-400 flex items-center gap-1">
                                    👁 {{ $item->views }}
                                </span>
                                <span class="text-cyan-600 dark:text-cyan-400 font-semibold">Baca →</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-slate-300 dark:text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2z"/></svg>
                        <p class="text-slate-600 dark:text-slate-400">Tidak ada berita ditemukan</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $berita->links() }}
            </div>
        </main>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.news-swiper').forEach(el => {
                new Swiper(el, {
                    loop: true,
                    pagination: { el: el.querySelector('.swiper-pagination'), clickable: true },
                    autoplay: { delay: 3000, disableOnInteraction: false },
                });
            });
        });
    </script>
@endpush

@endsection
