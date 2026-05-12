@extends('layouts.app')

@section('title', 'Home - BEM Fasilkom UMRI')

@section('content')

<!-- Hero Carousel Section -->
@include('components.hero', ['heroCarousels' => $heroCarousels])

<!-- Stats Section -->
<section class="py-12 md:py-20 bg-gradient-to-r from-slate-900 via-cyan-900 to-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center" data-aos="zoom-in">
                <div class="text-4xl md:text-5xl font-bold text-transparent bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text mb-2">
                    {{ $totalBerita }}
                </div>
                <p class="text-slate-300 text-sm md:text-base">Berita</p>
            </div>
            <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-4xl md:text-5xl font-bold text-transparent bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text mb-2">
                    {{ $totalGaleri }}
                </div>
                <p class="text-slate-300 text-sm md:text-base">Foto & Video</p>
            </div>
            <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
                <div class="text-4xl md:text-5xl font-bold text-transparent bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text mb-2">
                    {{ $totalAnggota }}
                </div>
                <p class="text-slate-300 text-sm md:text-base">Anggota</p>
            </div>
            <div class="text-center" data-aos="zoom-in" data-aos-delay="300">
                <div class="text-4xl md:text-5xl font-bold text-transparent bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text mb-2">
                    {{ $totalAgenda }}
                </div>
                <p class="text-slate-300 text-sm md:text-base">Agenda</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 md:py-24 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div data-aos="fade-right">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Tentang <span class="gradient-text">BEM Fasilkom</span>
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed mb-4">
                    Badan Eksekutif Mahasiswa Fasilkom UMRI adalah organisasi mahasiswa yang berkomitmen untuk memajukan akademik, penelitian, dan pengembangan karakter mahasiswa Fasilitas Komputer.
                </p>
                <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed mb-8">
                    Dengan visi menjadi organisasi yang progresif dan inovatif, kami terus berinovasi dalam menyelenggarakan program-program berkualitas untuk pengembangan potensi mahasiswa.
                </p>
                <div class="flex gap-4">
                    <a href="/tentang" class="btn-primary">
                        Pelajari Lebih Lanjut
                        <svg class="inline-block w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-2 gap-6" data-aos="fade-left">
                <div class="glass dark:glass-dark p-6 rounded-xl">
                    <div class="w-12 h-12 bg-cyan-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m0 0v2m0-6a2 2 0 110-4m0 4a2 2 0 100-4m0 4v2m6-10V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m0 0v2m0-6a2 2 0 110-4m0 4a2 2 0 100-4m0 4v2"/></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Inovatif</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Terus berkembang dengan ide-ide segar</p>
                </div>

                <div class="glass dark:glass-dark p-6 rounded-xl">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Profesional</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Mengelola dengan penuh tanggung jawab</p>
                </div>

                <div class="glass dark:glass-dark p-6 rounded-xl">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Transparan</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Terbuka dalam setiap keputusan</p>
                </div>

                <div class="glass dark:glass-dark p-6 rounded-xl">
                    <div class="w-12 h-12 bg-orange-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m0 0v2m0-6a2 2 0 110-4m0 4a2 2 0 100-4m0 4v2m6-10V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m0 0v2m0-6a2 2 0 110-4m0 4a2 2 0 100-4m0 4v2M5.5 10a3.5 3.5 0 00-3.5 3.5V17a3.5 3.5 0 003.5 3.5M5.5 10V8a3.5 3.5 0 013.5-3.5h9a3.5 3.5 0 013.5 3.5v2"/></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Kolaboratif</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Bersatu dalam setiap program</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KSB Section -->
@if($ksb->count() > 0)
    <section class="py-16 md:py-24 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Kepemimpinan</span> BEM
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">Ketua, Sekretaris, & Bendahara</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($ksb as $member)
                    <div class="glass dark:glass-dark rounded-xl overflow-hidden card-hover group" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative overflow-hidden h-80">
                            <img src="{{ $member->photo }}" alt="{{ $member->name }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-6">
                                <h3 class="text-2xl font-bold text-white">{{ $member->name }}</h3>
                                <p class="text-cyan-300 font-semibold">{{ $member->jabatan }}</p>
                            </div>
                        </div>
                        <div class="p-6">
                            @if($member->bio)
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">{{ $member->bio }}</p>
                            @endif
                            @if($member->instagram)
                                <div class="flex gap-2">
                                    <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener" 
                                        class="flex items-center gap-1 text-cyan-500 hover:text-cyan-600 text-sm transition">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058z"/></svg>
                                        Instagram
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Latest News Section -->
@if($beritaTerbaru->count() > 0)
    <section class="py-16 md:py-24 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12" data-aos="fade-up">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="gradient-text">Berita Terbaru</span>
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 text-lg">Update informasi dan pengumuman dari BEM</p>
                </div>
                <a href="/berita" class="btn-primary hidden md:block">
                    Lihat Semua
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @foreach($beritaTerbaru as $berita)
                    <a href="{{ route('berita.show', $berita->slug) }}" class="glass dark:glass-dark rounded-xl overflow-hidden card-hover group transition-all" data-aos="zoom-in">
                        <!-- Thumbnail -->
                        <div class="relative overflow-hidden h-48">
                            <img src="{{ $berita->thumbnail }}" alt="{{ $berita->title }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4">
                                <span class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $berita->category?->name ?? 'Berita' }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                {{ $berita->published_at?->format('d M Y') }}
                            </p>
                            <h3 class="font-bold text-lg mb-3 line-clamp-2 group-hover:text-cyan-600 transition">
                                {{ $berita->title }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2 mb-4">
                                {{ $berita->description }}
                            </p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-slate-500 dark:text-slate-400 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    {{ $berita->views }}
                                </span>
                                <span class="text-cyan-600 dark:text-cyan-400 font-semibold group-hover:translate-x-1 transition">
                                    Baca →
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="md:hidden">
                <a href="/berita" class="btn-primary w-full text-center">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>
@endif

<!-- Gallery Section -->
@if($galeriTerbaru->count() > 0)
    <section class="py-16 md:py-24 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Galeri Foto</span>
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">Dokumentasi kegiatan dan acara BEM</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                @foreach($galeriTerbaru as $gallery)
                    <a href="{{ route('gallery.show', $gallery->slug) }}" class="group relative overflow-hidden rounded-xl card-hover" data-aos="zoom-in">
                        <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" 
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all flex items-end justify-start p-4">
                            <div class="translate-y-8 group-hover:translate-y-0 transition-transform">
                                <p class="text-white font-bold text-sm line-clamp-2">{{ $gallery->title }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center">
                <a href="/gallery" class="btn-primary">
                    Lihat Semua Foto
                </a>
            </div>
        </div>
    </section>
@endif

<!-- Upcoming Events Section -->
@if($agendaMendatang->count() > 0)
    <section class="py-16 md:py-24 bg-gradient-to-r from-slate-900 via-blue-900 to-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    <span class="text-transparent bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text">Agenda Mendatang</span>
                </h2>
                <p class="text-slate-300 text-lg">Ikuti kegiatan dan acara menarik dari BEM</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($agendaMendatang as $agenda)
                    <a href="{{ route('agenda.show', $agenda->slug) }}" class="glass dark:glass-dark rounded-xl overflow-hidden card-hover group" data-aos="zoom-in">
                        <div class="md:flex">
                            <!-- Poster -->
                            <div class="relative w-full md:w-1/3 h-48 md:h-auto overflow-hidden">
                                <img src="{{ $agenda->poster }}" alt="{{ $agenda->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>

                            <!-- Content -->
                            <div class="p-6 md:flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="text-xs font-bold px-3 py-1 bg-cyan-500/20 text-cyan-300 rounded-full">
                                            {{ $agenda->countdown_format }}
                                        </span>
                                    </div>
                                    <h3 class="font-bold text-lg text-white mb-2 line-clamp-2">
                                        {{ $agenda->title }}
                                    </h3>
                                </div>

                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center gap-2 text-slate-300">
                                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $agenda->waktu_mulai->format('d M Y H:i') }}
                                    </div>
                                    @if($agenda->lokasi)
                                        <div class="flex items-center gap-2 text-slate-300">
                                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                            {{ $agenda->lokasi }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="/agenda" class="btn-primary">
                    Lihat Semua Agenda
                </a>
            </div>
        </div>
    </section>
@endif

<!-- Call to Action Section -->
<section class="py-16 md:py-24 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">
            Punya Keluhan atau Saran?
        </h2>
        <p class="text-slate-600 dark:text-slate-400 text-lg mb-8 leading-relaxed">
            BEM Fasilkom siap mendengarkan masukan Anda untuk terus berkembang dan memberikan pelayanan terbaik kepada semua mahasiswa.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/lapor" class="btn-primary">
                <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                Buat Laporan
            </a>
            <a href="/kontak" class="btn-secondary">
                <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection
