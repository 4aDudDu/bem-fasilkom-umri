<!-- Header/Navbar Modern dengan Blur Effect & Dark Mode Toggle -->
<header class="navbar-header sticky top-0 z-50 transition-all duration-300" id="navbar">
    <nav class="backdrop-blur-md bg-white/80 dark:bg-slate-900/80 border-b border-white/20 dark:border-slate-700/50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Logo -->
                <div class="flex-shrink-0 group">
                    <a href="/" class="flex items-center gap-2 font-bold text-xl hover:scale-105 transition-transform">
                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-lg flex items-center justify-center">
                            <img src="{{ asset('img/bem.png') }}" alt="Logo BEM Fasilkom">
                        </div>
                        <span class="bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent hidden sm:inline">
                            BEM Fasilkom
                        </span>
                    </a>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden lg:flex items-center gap-1">
                    <a href="/" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->routeIs('home') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l4-4m0 0l4 4m-4-4V5"/></svg>
                            Home
                        </span>
                    </a>
                    <a href="/berita" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->routeIs('berita*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2z"/></svg>
                            Berita
                        </span>
                    </a>
                    <a href="/gallery" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->routeIs('gallery*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Galeri
                        </span>
                    </a>
                    <a href="/struktur" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->routeIs('struktur*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.048M12 4.354L9 7.354M12 4.354l3 3m-6 8.646l3 3m0 0l3-3m-3 3v4m0 0H7m5 0h5"/></svg>
                            Struktur
                        </span>
                    </a>
                    <a href="/agenda" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->routeIs('agenda*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Agenda
                        </span>
                    </a>
                    <a href="/lapor" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition bg-gradient-to-r from-orange-500 to-red-600 text-white">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 4v2M8 5h8a2 2 0 012 2v12a2 2 0 01-2 2H8a2 2 0 01-2-2V7a2 2 0 012-2z"/></svg>
                            Lapor!
                        </span>
                    </a>
                </div>

                <!-- Right Side: Dark Mode + Mobile Menu Button -->
                <div class="flex items-center gap-3">
                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode" 
                        class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                        x-data="{ darkMode: false }"
                        @click="$dispatch('toggle-dark-mode')">
                        <svg class="w-5 h-5 text-yellow-500 dark:hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3v1m0 16v1m9-9h-1m-16 0H1m15.364 1.636l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <svg class="w-5 h-5 text-slate-400 hidden dark:block" fill="currentColor" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="lg:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                        x-data="{ mobileMenuOpen: false }"
                        @click="mobileMenuOpen = !mobileMenuOpen">
                        <svg class="w-6 h-6" :class="{ 'hidden': mobileMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg class="w-6 h-6" :class="{ 'hidden': !mobileMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-data="{ mobileMenuOpen: false }" 
            :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }"
            class="lg:hidden bg-white dark:bg-slate-900 border-t border-white/20 hidden px-4 py-3 space-y-2">
            <a href="/" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Home</a>
            <a href="/berita" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Berita</a>
            <a href="/gallery" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Galeri</a>
            <a href="/struktur" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Struktur</a>
            <a href="/agenda" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Agenda</a>
            <a href="/lapor" class="block px-3 py-2 rounded-lg bg-gradient-to-r from-orange-500 to-red-600 text-white hover:opacity-90 transition">Lapor!</a>
        </div>
    </nav>
</header>

<style>
    .navbar-header {
        transition: all 0.3s ease;
    }

    .navbar-header.scrolled {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
</script>
