<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="bg-white/95 border border-slate-100 rounded-2xl shadow-sm px-6 py-3 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center gap-3">
                    <img src="{{ asset('img/bem.png') }}" alt="Logo" class="h-10 w-auto">
                    <span class="font-black text-xl tracking-tighter text-slate-900 hidden sm:block uppercase">
                        BEM <span class="text-blue-600">Fasilkom</span>
                    </span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="/" class="text-sm font-bold hover:text-blue-600 transition {{ request()->is('/') ? 'text-blue-600' : 'text-slate-500' }}">HOME</a>
                <a href="/berita" class="text-sm font-bold hover:text-blue-600 transition {{ request()->is('berita*') ? 'text-blue-600' : 'text-slate-500' }}">BERITA</a>
                <a href="/gallery" class="text-sm font-bold hover:text-blue-600 transition {{ request()->is('gallery*') ? 'text-blue-600' : 'text-slate-500' }}">GALERI</a>
                <a href="/struktur" class="text-sm font-bold hover:text-blue-600 transition {{ request()->is('struktur*') ? 'text-blue-600' : 'text-slate-500' }}">STRUKTUR</a>
                <a href="/agenda" class="text-sm font-bold hover:text-blue-600 transition {{ request()->is('agenda*') ? 'text-blue-600' : 'text-slate-500' }}">AGENDA</a>
            </div>

            <!-- CTA -->
            <div class="flex items-center gap-4">
                <a href="/lapor" class="hidden md:flex btn-primary !px-6 !py-2 !text-xs">
                    LAPOR!
                </a>
                
                <!-- Mobile Menu Button -->
                <button class="lg:hidden p-2 text-slate-500" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </nav>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-b border-slate-100 p-4 space-y-2 shadow-xl mx-4 rounded-2xl">
        <a href="/" class="block px-4 py-3 font-bold text-slate-700 hover:bg-slate-50 rounded-xl">HOME</a>
        <a href="/berita" class="block px-4 py-3 font-bold text-slate-700 hover:bg-slate-50 rounded-xl">BERITA</a>
        <a href="/gallery" class="block px-4 py-3 font-bold text-slate-700 hover:bg-slate-50 rounded-xl">GALERI</a>
        <a href="/lapor" class="block px-4 py-3 font-bold bg-blue-600 text-white rounded-xl text-center">LAPOR!</a>
    </div>
</header>
