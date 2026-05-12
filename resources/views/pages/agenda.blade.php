@extends('layouts.app')
@section('title', 'Agenda - BEM Fasilkom')
@section('content')

<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-12 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-bold mb-4">Agenda Kegiatan</h1>
        <p class="text-slate-300">Ikuti berbagai kegiatan menarik dari BEM Fasilkom</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Filter Tabs -->
    <div class="flex gap-4 mb-8 flex-wrap">
        <a href="?filter=upcoming" class="px-6 py-2 rounded-lg {{ $filter == 'upcoming' ? 'bg-cyan-500 text-white' : 'bg-slate-200 dark:bg-slate-800' }} transition">
            📅 Mendatang ({{ $upcomingCount }})
        </a>
        <a href="?filter=past" class="px-6 py-2 rounded-lg {{ $filter == 'past' ? 'bg-cyan-500 text-white' : 'bg-slate-200 dark:bg-slate-800' }} transition">
            ✅ Selesai ({{ $pastCount }})
        </a>
        <a href="?filter=all" class="px-6 py-2 rounded-lg {{ $filter == 'all' ? 'bg-cyan-500 text-white' : 'bg-slate-200 dark:bg-slate-800' }} transition">
            📆 Semua
        </a>
    </div>

    <!-- Agenda List -->
    <div class="space-y-6 mb-12">
        @forelse($agenda as $item)
            <a href="{{ route('agenda.show', $item->slug) }}" class="glass dark:glass-dark rounded-xl overflow-hidden card-hover md:flex group" data-aos="zoom-in">
                <div class="relative w-full md:w-1/3 h-48 md:h-auto overflow-hidden">
                    <img src="{{ $item->poster }}" alt="{{ $item->title }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                </div>
                <div class="p-6 md:flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold px-3 py-1 bg-cyan-500/20 text-cyan-400 rounded-full">
                                {{ $item->countdown_format }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 group-hover:text-cyan-600 transition">{{ $item->title }}</h3>
                        @if($item->description)
                            <p class="text-slate-600 dark:text-slate-400 line-clamp-2">{{ $item->description }}</p>
                        @endif
                    </div>
                    <div class="mt-4 space-y-2 text-sm">
                        <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $item->waktu_mulai->format('d M Y H:i') }}
                        </div>
                        @if($item->lokasi)
                            <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                {{ $item->lokasi }}
                            </div>
                        @endif
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center py-12">
                <p class="text-slate-600 dark:text-slate-400">Tidak ada agenda ditemukan</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    {{ $agenda->links() }}
</div>

@endsection
