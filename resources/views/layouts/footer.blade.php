<footer class="bg-slate-900 text-slate-300 pt-20 pb-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Branding -->
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <a href="/" class="flex items-center gap-2 font-bold text-2xl text-white mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-lg flex items-center justify-center">
                        <img src="{{ asset('img/bem.png') }}" alt="Logo" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <span>BEM Fasilkom</span>
                </a>
                <p class="text-slate-400 leading-relaxed mb-8">
                    Badan Eksekutif Mahasiswa Fakultas Ilmu Komputer Universitas Muhammadiyah Riau. Wadah aspirasi dan kontribusi nyata mahasiswa.
                </p>
                <div class="flex items-center gap-4">
                    <!-- Social Links -->
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-cyan-500 hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Links -->
            <div>
                <h4 class="font-bold text-white mb-6">Navigasi</h4>
                <ul class="space-y-4">
                    <li><a href="/berita" class="hover:text-cyan-500 transition">Berita</a></li>
                    <li><a href="/gallery" class="hover:text-cyan-500 transition">Galeri</a></li>
                    <li><a href="/struktur" class="hover:text-cyan-500 transition">Struktur</a></li>
                    <li><a href="/agenda" class="hover:text-cyan-500 transition">Agenda</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="font-bold text-white mb-6">Dukungan</h4>
                <ul class="space-y-4">
                    <li><a href="/lapor" class="hover:text-cyan-500 transition">Lapor Aspirasi</a></li>
                    <li><a href="/tentang" class="hover:text-cyan-500 transition">Tentang Kami</a></li>
                    <li><a href="/kontak" class="hover:text-cyan-500 transition">Kontak</a></li>
                </ul>
            </div>

            <!-- Location -->
            <div>
                <h4 class="font-bold text-white mb-6">Lokasi</h4>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">
                    Kampus Utama UMRI, Gedung Ahmad Dahlan<br>
                    Jl. Tuanku Tambusai, Pekanbaru, Riau
                </p>
                <div class="rounded-xl overflow-hidden h-32 grayscale opacity-50">
                    <!-- Map Placeholder -->
                    <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-slate-500 text-sm">
                &copy; {{ date('Y') }} BEM Fasilkom UMRI. All rights reserved.
            </p>
            <p class="text-slate-500 text-sm">
                Developed by BEM Fasilkom Team
            </p>
        </div>
    </div>
</footer>
