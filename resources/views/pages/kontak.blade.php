@extends('layouts.app')
@section('title', 'Kontak - BEM Fasilkom')
@section('content')

<div class="bg-gradient-to-r from-slate-900 to-slate-800 py-12 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-bold">Hubungi Kami</h1>
        <p class="text-slate-300 mt-2">Kami siap mendengarkan saran dan pertanyaan Anda</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid md:grid-cols-2 gap-12">
        <!-- Contact Info -->
        <div data-aos="fade-right">
            <h2 class="text-2xl font-bold mb-8">Informasi Kontak</h2>
            
            <div class="space-y-6">
                <div class="glass dark:glass-dark rounded-lg p-6 flex gap-4">
                    <div class="text-3xl">📍</div>
                    <div>
                        <h3 class="font-bold mb-2">Alamat</h3>
                        <p class="text-slate-600 dark:text-slate-400">
                            Fakultas Sains dan Teknologi<br>
                            Universitas Muhammadiyah Riau<br>
                            Jl. KH. Ahmad Dahlan No. 256, Pekanbaru
                        </p>
                    </div>
                </div>

                <div class="glass dark:glass-dark rounded-lg p-6 flex gap-4">
                    <div class="text-3xl">📧</div>
                    <div>
                        <h3 class="font-bold mb-2">Email</h3>
                        <a href="mailto:bem.fasilkom@umri.ac.id" class="text-cyan-600 hover:underline">
                            bem.fasilkom@umri.ac.id
                        </a>
                    </div>
                </div>

                <div class="glass dark:glass-dark rounded-lg p-6 flex gap-4">
                    <div class="text-3xl">📱</div>
                    <div>
                        <h3 class="font-bold mb-2">Telepon</h3>
                        <a href="tel:+6281234567890" class="text-cyan-600 hover:underline">
                            +62 812 3456 7890
                        </a>
                    </div>
                </div>

                <div class="glass dark:glass-dark rounded-lg p-6">
                    <h3 class="font-bold mb-4">Ikuti Media Sosial Kami</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-12 h-12 flex items-center justify-center rounded-lg bg-gradient-to-br from-blue-400 to-blue-600 text-white hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 flex items-center justify-center rounded-lg bg-gradient-to-br from-pink-400 to-red-600 text-white hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465.639.248 1.181.64 1.666 1.125.486.486.877 1.028 1.125 1.666.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427-.248.639-.64 1.181-1.125 1.666-.486.486-1.028.877-1.666 1.125-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465-.639-.248-1.181-.64-1.666-1.125-.486-.486-.877-1.028-1.125-1.666-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427.248-.639.64-1.181 1.125-1.666.486-.486 1.028-.877 1.666-1.125.636-.247 1.363-.416 2.427-.465 1.024-.048 1.379-.06 3.808-.06z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 flex items-center justify-center rounded-lg bg-gradient-to-br from-blue-300 to-blue-500 text-white hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20v-7.21H5.33v-2.77h2.96V9.6c0-2.92 1.78-4.51 4.39-4.51 1.48 0 2.75.11 3.12.16v3.62h-2.14c-1.68 0-2.01.8-2.01 1.97v2.57h4.02l-.52 2.77h-3.5V20z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div data-aos="fade-left">
            <h2 class="text-2xl font-bold mb-8">Kirim Pesan</h2>
            
            <form method="POST" class="glass dark:glass-dark rounded-xl p-8 space-y-4" @submit.prevent="handleContactForm">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold mb-2">Nama *</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        placeholder="Nama Anda">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Email *</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        placeholder="email@example.com">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Subjek *</label>
                    <input type="text" name="subject" required
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        placeholder="Subjek pesan">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Pesan *</label>
                    <textarea name="message" required rows="5"
                        class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>

                <button type="submit" class="w-full btn-primary text-center">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if(!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        showToast('✅ Terima kasih! Pesan Anda telah kami terima.', 'success');
        this.reset();
    });
});
</script>

@endsection
