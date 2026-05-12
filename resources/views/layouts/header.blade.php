<!-- Header/Navbar Modern dengan Blur Effect & Dark Mode Toggle -->
<header class="navbar-header sticky top-0 z-50 transition-all duration-300" id="navbar">
    <nav class="backdrop-blur-md bg-white/80 dark:bg-slate-900/80 border-b border-white/20 dark:border-slate-700/50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Logo -->
                <div class="flex-shrink-0 group">
                    <a href="/" class="flex items-center gap-2 font-bold text-xl hover:scale-105 transition-transform">
                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-lg flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('img/bem.png') }}" alt="Logo BEM Fasilkom" class="w-full h-full object-cover">
                        </div>
                        <span class="bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent hidden sm:inline">
                            BEM Fasilkom
                        </span>
                    </a>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden lg:flex items-center gap-1">
                    <a href="/" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->is('/') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        Home
                    </a>
                    <a href="/berita" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->is('berita*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        Berita
                    </a>
                    <a href="/gallery" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->is('gallery*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        Galeri
                    </a>
                    <a href="/struktur" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->is('struktur*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        Struktur
                    </a>
                    <a href="/agenda" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->is('agenda*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        Agenda
                    </a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3">
                    <a href="/lapor" class="hidden md:flex btn-primary !px-5 !py-2 !text-sm">
                        Lapor!
                    </a>
                    
                    <button id="theme-toggle" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:ring-2 hover:ring-cyan-500 transition-all">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden p-2 text-slate-700 dark:text-slate-300" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white dark:bg-slate-900 border-t dark:border-slate-800 p-4 space-y-2 shadow-xl">
            <a href="/" class="block px-4 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">Home</a>
            <a href="/berita" class="block px-4 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">Berita</a>
            <a href="/gallery" class="block px-4 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">Galeri Kegiatan</a>
            <a href="/lapor" class="block px-4 py-2 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-center">Lapor!</a>
        </div>
    </nav>
</header>
