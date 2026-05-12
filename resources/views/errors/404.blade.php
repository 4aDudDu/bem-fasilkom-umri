@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center relative overflow-hidden">
    <!-- Background Accents -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-600/20 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute top-1/4 right-1/4 w-64 h-64 bg-blue-600/20 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="container mx-auto px-4 text-center relative z-10" data-aos="fade-up">
        <!-- Error Number -->
        <h1 class="text-9xl md:text-[12rem] font-black tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-br from-cyan-400 via-blue-500 to-indigo-600 drop-shadow-2xl">
            404
        </h1>
        
        <!-- Error Message -->
        <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white">Oops! Halaman Hilang</h2>
        <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed">
            Sepertinya halaman yang Anda cari telah dipindahkan, dihapus, atau mungkin tidak pernah ada. Mari kembali ke jalan yang benar.
        </p>

        <!-- Action Button -->
        <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-xl font-semibold hover:from-cyan-400 hover:to-blue-500 transition-all duration-300 shadow-[0_0_20px_rgba(14,165,233,0.4)] hover:shadow-[0_0_30px_rgba(14,165,233,0.6)] hover:-translate-y-1 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
