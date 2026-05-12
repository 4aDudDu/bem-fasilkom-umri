@extends('layouts.app')
@section('title', 'Tentang - BEM Fasilkom')
@section('content')

<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-12 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-bold">Tentang BEM Fasilkom</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">
    <!-- Visi Misi -->
    <div class="grid md:grid-cols-2 gap-8" data-aos="fade-up">
        <div class="glass dark:glass-dark rounded-xl p-8">
            <h2 class="text-2xl font-bold mb-4 flex items-center gap-3">
                <span class="text-3xl">🎯</span>
                Visi
            </h2>
            <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                Menjadi organisasi mahasiswa yang progresif, aspiratif, dan responsif dalam mewujudkan mahasiswa Fasilkom yang kompeten, bermoral, dan berdedikasi tinggi terhadap pengembangan akademis dan kemasyarakatan.
            </p>
        </div>

        <div class="glass dark:glass-dark rounded-xl p-8">
            <h2 class="text-2xl font-bold mb-4 flex items-center gap-3">
                <span class="text-3xl">💡</span>
                Misi
            </h2>
            <ul class="space-y-3 text-slate-600 dark:text-slate-400">
                <li>✓ Meningkatkan kesejahteraan dan kepedulian antar mahasiswa</li>
                <li>✓ Mengembangkan potensi akademis dan non-akademis</li>
                <li>✓ Memperkuat hubungan dengan dosen dan pimpinan fakultas</li>
                <li>✓ Menjadi pelopor dalam kegiatan sosial kemasyarakatan</li>
            </ul>
        </div>
    </div>

    <!-- Sejarah -->
    <div class="glass dark:glass-dark rounded-xl p-8" data-aos="zoom-in">
        <h2 class="text-3xl font-bold mb-4">📖 Sejarah BEM Fasilkom</h2>
        <p class="text-slate-600 dark:text-slate-400 mb-4 leading-relaxed">
            BEM Fasilkom (Badan Eksekutif Mahasiswa Fakultas Sains dan Teknologi) didirikan untuk menjadi wadah aspirasi dan kreativitas mahasiswa. Sejak berdiri, BEM Fasilkom telah berkontribusi dalam berbagai kegiatan akademis, sosial, dan pengembangan karakter mahasiswa.
        </p>
        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
            Dengan struktur organisasi yang solid dan program kerja yang terukur, BEM Fasilkom terus berinovasi dalam memberikan nilai tambah bagi seluruh mahasiswa Fakultas Sains dan Teknologi Universitas Muhammadiyah Riau.
        </p>
    </div>

    <!-- Nilai Nilai -->
    <div data-aos="fade-up">
        <h2 class="text-3xl font-bold mb-8 text-center">🌟 Nilai-Nilai Kami</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @php
                $values = [
                    ['🤝', 'Kolaboratif', 'Bekerja sama dengan saling menghormati dan mendukung'],
                    ['📚', 'Inovatif', 'Terus belajar dan menciptakan ide-ide segar'],
                    ['🎯', 'Integritas', 'Bertindak jujur dan bertanggung jawab atas setiap tindakan'],
                    ['💪', 'Dedikasi', 'Berkomitmen penuh untuk kemajuan bersama'],
                    ['🌍', 'Kepedulian', 'Peduli terhadap lingkungan dan sesama mahasiswa'],
                    ['✨', 'Keunggulan', 'Selalu berusaha memberikan yang terbaik'],
                ];
            @endphp
            @foreach($values as $val)
                <div class="glass dark:glass-dark rounded-xl p-6 text-center">
                    <div class="text-5xl mb-2">{{ $val[0] }}</div>
                    <h3 class="font-bold text-lg mb-2">{{ $val[1] }}</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">{{ $val[2] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
