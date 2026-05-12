@extends('layouts.app')
@section('title', 'Struktur BEM - BEM Fasilkom')
@section('content')

<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-12 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-4">Struktur Organisasi</h1>
        <p class="text-slate-300 text-lg">Angkatan {{ $activeAngkatan?->formatted_name ?? 'BEM' }}</p>
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
                            <img src="{{ $member->photo ? asset('storage/' . $member->photo) : 'https://media.istockphoto.com/id/1208175274/id/vektor/ikon-vektor-avatar-ilustrasi-elemen-sederhanaavatar-ikon-vektor-ilustrasi-vektor-konsep.jpg?s=612x612&w=0&k=20&c=DND6ivQIRnLrF4UhqlOhqcyuxbwnU10c440HKdLNMzc=' }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
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
                    <div class="flex items-center gap-4 mb-6">
                        @if($div->icon)
                            <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background-color: {{ $div->color }}20; color: {{ $div->color }};">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>
                            </div>
                        @endif
                        <div>
                            <h3 class="text-2xl font-bold">{{ $div->name }}</h3>
                            @if($div->description)
                                <p class="text-slate-600 dark:text-slate-400">{{ $div->description }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Members Grid -->
                    @if($div->members->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                            @foreach($div->members as $member)
                                <div class="bg-slate-100 dark:bg-slate-800 p-4 rounded-lg">
                                    <p class="font-semibold">{{ $member->name }}</p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400">{{ $member->jabatan }}</p>
                                    @if($member->nim)
                                        <p class="text-xs text-slate-500">{{ $member->nim }}</p>
                                    @endif
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
