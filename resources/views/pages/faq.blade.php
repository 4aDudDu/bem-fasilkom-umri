@extends('layouts.app')
@section('title', 'FAQ - BEM Fasilkom')
@section('content')

<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-12 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-bold">Pertanyaan Umum</h1>
        <p class="text-slate-300 mt-2">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
    </div>
</div>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="space-y-4" x-data="{ openItem: null }">
        @php
            $faqs = [
                [
                    'q' => 'Apa itu BEM Fasilkom?',
                    'a' => 'BEM Fasilkom adalah Badan Eksekutif Mahasiswa Fakultas Sains dan Teknologi yang berfungsi sebagai wadah aspirasi, pengembangan, dan pemberdayaan mahasiswa Fasilkom.'
                ],
                [
                    'q' => 'Bagaimana cara bergabung dengan BEM Fasilkom?',
                    'a' => 'Anda dapat bergabung dengan BEM Fasilkom melalui proses seleksi yang biasanya diadakan setiap awal tahun akademik. Informasi lebih lanjut dapat diperoleh dari sekretariat BEM atau media sosial kami.'
                ],
                [
                    'q' => 'Apa saja divisi yang ada di BEM Fasilkom?',
                    'a' => 'BEM Fasilkom memiliki beberapa divisi utama yaitu: Divisi Internal, Divisi Eksternal, Divisi Media dan Informasi, Divisi Sponsorship dan Kemitraan, serta Divisi Acara dan Kegiatan.'
                ],
                [
                    'q' => 'Bagaimana cara menyampaikan keluhan atau saran?',
                    'a' => 'Anda dapat menyampaikan keluhan atau saran melalui fitur "Lapor!" yang tersedia di website ini, atau menghubungi kami melalui media sosial dan email resmi BEM Fasilkom.'
                ],
                [
                    'q' => 'Kapan BEM Fasilkom biasanya mengadakan acara?',
                    'a' => 'BEM Fasilkom mengadakan berbagai acara sepanjang tahun, baik acara rutin maupun acara khusus. Jadwal acara dapat dilihat di halaman Agenda atau media sosial kami.'
                ],
                [
                    'q' => 'Bagaimana cara menjalin kerjasama dengan BEM Fasilkom?',
                    'a' => 'Untuk menjalin kerjasama, Anda dapat menghubungi Divisi Sponsorship dan Kemitraan melalui email atau media sosial resmi kami dengan menyertakan proposal kerjasama.'
                ],
                [
                    'q' => 'Apakah BEM Fasilkom memiliki forum diskusi?',
                    'a' => 'Kami memiliki grup komunikasi di berbagai platform media sosial dimana mahasiswa dapat berdiskusi, berbagi ide, dan mendapatkan informasi terkini.'
                ],
                [
                    'q' => 'Bagaimana cara mengajukan ide atau inisiatif?',
                    'a' => 'Anda dapat mengajukan ide melalui forum diskusi kami atau menghubungi langsung divisi yang relevan. Kami terbuka terhadap ide-ide kreatif dari semua mahasiswa.'
                ],
            ];
        @endphp

        @foreach($faqs as $idx => $faq)
            <div class="glass dark:glass-dark rounded-xl overflow-hidden" data-aos="fade-up">
                <button @click="openItem = openItem === {{ $idx }} ? null : {{ $idx }}"
                    class="w-full p-6 flex items-center justify-between hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                    <h3 class="text-lg font-semibold text-left">{{ $faq['q'] }}</h3>
                    <svg class="w-6 h-6 transition-transform" :class="openItem === {{ $idx }} ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </button>

                <div x-show="openItem === {{ $idx }}" x-collapse class="border-t border-slate-300 dark:border-slate-700 p-6">
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">{{ $faq['a'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Masih Ada Pertanyaan -->
    <div class="mt-12 glass dark:glass-dark rounded-xl p-8 text-center">
        <h3 class="text-2xl font-bold mb-4">Masih ada pertanyaan?</h3>
        <p class="text-slate-600 dark:text-slate-400 mb-6">
            Jangan ragu untuk menghubungi kami melalui berbagai saluran yang tersedia.
        </p>
        <div class="flex gap-4 justify-center flex-wrap">
            <a href="/kontak" class="btn-primary">Hubungi Kami</a>
            <a href="/lapor" class="btn-secondary">Kirim Laporan</a>
        </div>
    </div>
</div>

@endsection
