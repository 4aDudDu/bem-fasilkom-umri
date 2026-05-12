@extends('layouts.app')

@section('title', 'SK BEM - BEM Fasilkom')

@section('content')

<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-12 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div data-aos="fade-right">
                <h1 class="text-4xl md:text-5xl font-bold">Surat Keputusan (SK)</h1>
                <p class="text-slate-300 mt-2 text-lg">Dokumen resmi kepengurusan BEM Fasilkom UMRI</p>
            </div>
            <div data-aos="fade-left">
                <a href="{{ asset('pdf/sk.pdf') }}" download class="btn-primary flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v1-5m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Download PDF
                </a>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- PDF Viewer Container -->
    <div class="glass dark:glass-dark rounded-2xl overflow-hidden shadow-2xl border border-white/10" data-aos="zoom-in">
        <div class="bg-slate-100 dark:bg-slate-800 p-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="flex gap-1.5">
                    <div class="w-3 h-3 rounded-full bg-red-500 shadow-sm"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-500 shadow-sm"></div>
                    <div class="w-3 h-3 rounded-full bg-green-500 shadow-sm"></div>
                </div>
                <span class="ml-4 text-sm font-semibold text-slate-600 dark:text-slate-300">sk-bem-fasilkom-umri.pdf</span>
            </div>
            <div class="hidden sm:block text-xs font-medium text-slate-500 uppercase tracking-wider">Official Document</div>
        </div>
        
        <!-- The Viewer -->
        <div class="relative w-full h-[600px] md:h-[900px] bg-slate-200 dark:bg-slate-900">
            <!-- Menggunakan object sebagai alternatif iframe yang lebih stabil di beberapa browser -->
            <object 
                data="{{ asset('pdf/sk.pdf') }}" 
                type="application/pdf" 
                width="100%" 
                height="100%"
                class="w-full h-full"
            >
                <!-- Fallback jika browser benar-benar tidak bisa render PDF -->
                <div class="flex flex-col items-center justify-center h-full p-8 text-center">
                    <svg class="w-16 h-16 text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <h3 class="text-xl font-bold mb-2">Browser Tidak Mendukung Preview PDF</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">Jangan khawatir, Anda tetap bisa melihat dokumen dengan mendownloadnya secara langsung.</p>
                    <a href="{{ asset('pdf/sk.pdf') }}" class="btn-primary">
                        Download SK BEM
                    </a>
                </div>
            </object>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up">
        <div class="glass dark:glass-dark p-6 rounded-xl border border-white/5">
            <div class="w-10 h-10 bg-cyan-500/20 rounded-lg flex items-center justify-center text-cyan-500 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <h3 class="font-bold text-lg mb-2">Dokumen Resmi</h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm">Salinan sah dari Surat Keputusan Dekan Fasilkom UMRI.</p>
        </div>
        <div class="glass dark:glass-dark p-6 rounded-xl border border-white/5">
            <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center text-blue-500 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h3 class="font-bold text-lg mb-2">Masa Berlaku</h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm">Berlaku selama satu periode kepengurusan BEM Fasilkom UMRI.</p>
        </div>
        <div class="glass dark:glass-dark p-6 rounded-xl border border-white/5">
            <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center text-purple-500 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
            </div>
            <h3 class="font-bold text-lg mb-2">Transparansi</h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm">Komitmen transparansi organisasi kepada seluruh mahasiswa.</p>
        </div>
    </div>
</div>

@endsection
