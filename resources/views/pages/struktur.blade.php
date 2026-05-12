@extends('layouts.app')
@section('title', 'Struktur BEM - BEM Fasilkom')
@section('content')

<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-12 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-4">Struktur Organisasi</h1>
        <p class="text-slate-300 text-lg mb-8">Kepengurusan BEM Fasilkom Periode {{ $activeAngkatan?->tahun }}</p>
        
        <!-- Year Selector -->
        <div class="flex flex-wrap justify-center gap-2 mt-6">
            @foreach($allAngkatan as $angkatan)
                <a href="{{ route('struktur.index', ['tahun' => $angkatan->tahun]) }}" 
                   class="px-4 py-2 rounded-full border transition-all duration-300 {{ $activeAngkatan->id == $angkatan->id ? 'bg-white text-slate-900 border-white' : 'border-white/30 text-white hover:bg-white/10' }}">
                    {{ $angkatan->tahun }}
                </a>
            @endforeach
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- KSB Section -->
    @if($ksb->count() > 0)
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center gradient-text">Ketua, Sekretaris, Bendahara</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($ksb as $member)
                    <div class="glass dark:glass-dark rounded-xl overflow-hidden card-hover group">
                        <div class="relative h-80 overflow-hidden">
                            <img src="{{ $member->photo ? asset('uploads/' . $member->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&background=06B6D4&color=fff&size=512' }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold">{{ $member->name }}</h3>
                            <p class="text-cyan-500 font-semibold mb-2">{{ $member->jabatan }}</p>
                            @if($member->instagram)
                                <a href="{{ $member->instagram_url }}" target="_blank" class="text-sm text-cyan-600 hover:underline">
                                    @ {{ $member->instagram }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Divisi Section -->
    <div class="border-t border-slate-300 dark:border-slate-700 pt-12">
        <h2 class="text-3xl font-bold mb-12 text-center gradient-text">Divisi-Divisi</h2>
        
        <div class="space-y-12">
            @foreach($divisi as $div)
                <div class="glass dark:glass-dark rounded-xl p-8" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-8">
                        @if($div->icon)
                            <div class="w-16 h-16 rounded-xl flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, {{ $div->color }}, {{ $div->color }}dd); color: white;">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            </div>
                        @endif
                        <div>
                            <h3 class="text-3xl font-bold text-slate-800 dark:text-white">{{ $div->name }}</h3>
                            @if($div->description)
                                <p class="text-slate-600 dark:text-slate-400 mt-1">{{ $div->description }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Members Grid -->
                    @if($div->members->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($div->members as $member)
                                <div class="flex items-center gap-4 bg-white dark:bg-slate-800 p-4 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-md transition card-hover">
                                    <div class="w-16 h-16 rounded-full overflow-hidden flex-shrink-0 border-2 border-cyan-500 shadow-sm">
                                        <img src="{{ $member->photo ? asset('uploads/' . $member->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&background=random&size=128' }}" 
                                             alt="{{ $member->name }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-bold text-slate-800 dark:text-white truncate">{{ $member->name }}</p>
                                        <p class="text-xs font-semibold text-cyan-600 truncate">{{ $member->jabatan }}</p>
                                        @if($member->nim)
                                            <p class="text-[10px] text-slate-500 uppercase tracking-wider mt-1">{{ $member->nim }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
