<!-- Header/Navbar Modern dengan Blur Effect & Dark Mode Toggle -->
<header class="navbar-header sticky top-0 z-50 transition-all duration-300" id="navbar">
    <nav class="backdrop-blur-md bg-gradient-to-r from-blue-600 to-white dark:from-blue-900 dark:to-slate-900 border-b border-white/20 dark:border-slate-700/50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Logo -->
                <div class="flex-shrink-0 group">
                    <a href="/" class="flex items-center gap-2 font-bold text-xl hover:scale-105 transition-transform">
                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                            <img src="{{ asset('img/bem.png') }}" alt="Logo BEM Fasilkom" class="w-8 h-8 object-contain">
                        </div>
                        <span class="text-white font-bold hidden sm:inline tracking-tight">
                            BEM FASILKOM UMRI
                        </span>
                    </a>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden lg:flex items-center gap-1">
                    <a href="/" class="nav-link px-3 py-2 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('home') ? 'bg-white/20 text-white shadow-inner' : 'text-white/80' }}">
                        <span class="flex items-center gap-1.5 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            Home
                        </span>
                    </a>
                    <a href="/berita" class="nav-link px-3 py-2 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('berita*') ? 'bg-white/20 text-white shadow-inner' : 'text-white/80' }}">
                        <span class="flex items-center gap-1.5 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2zM9 7h6m-6 4h6m-6 4h4"/></svg>
                            Berita
                        </span>
                    </a>
                    <a href="/gallery" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->routeIs('gallery*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1.5 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Galeri
                        </span>
                    </a>
                    <a href="/struktur" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->routeIs('struktur*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1.5 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            Struktur
                        </span>
                    </a>
                    <a href="/agenda" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->routeIs('agenda*') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1.5 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Agenda
                        </span>
                    </a>
                    <a href="/sk-bem" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition {{ request()->is('sk-bem') ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white' : 'text-slate-700 dark:text-slate-300' }}">
                        <span class="flex items-center gap-1.5 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            SK BEM
                        </span>
                    </a>
                    <a href="/lapor" class="nav-link px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition bg-gradient-to-r from-orange-500 to-red-600 text-white shadow-md">
                        <span class="flex items-center gap-1.5 text-sm font-bold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                            Lapor!
                        </span>
                    </a>

                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode" class="p-2 rounded-lg bg-white/10 hover:bg-white/20 text-white transition-all ml-2" title="Toggle Dark Mode">
                        <template x-if="!darkMode">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                        </template>
                        <template x-if="darkMode">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 18v1m9-11h1m-18 0H2m15.364 6.364l.707.707M6.343 6.343l.707.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </template>
                    </button>
                </div>

         
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="lg:hidden bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 px-4 py-3 space-y-2">
            <a href="/" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Home</a>
            <a href="/berita" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Berita</a>
            <a href="/gallery" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Galeri</a>
            <a href="/struktur" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Struktur</a>
            <a href="/agenda" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Agenda</a>
            <a href="/sk-bem" class="block px-3 py-2 rounded-lg {{ request()->is('sk-bem') ? 'bg-cyan-500 text-white' : 'text-slate-700 dark:text-slate-300' }} hover:bg-slate-100 dark:hover:bg-slate-800 transition">SK BEM</a>
            <a href="/lapor" class="block px-3 py-2 rounded-lg bg-gradient-to-r from-orange-500 to-red-600 text-white hover:opacity-90 transition font-bold text-center">Lapor!</a>
            
            <!-- Dark Mode Mobile -->
            <button @click="darkMode = !darkMode" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 transition mt-2">
                <template x-if="!darkMode">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                        <span>Dark Mode</span>
                    </div>
                </template>
                <template x-if="darkMode">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 18v1m9-11h1m-18 0H2m15.364 6.364l.707.707M6.343 6.343l.707.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span>Light Mode</span>
                    </div>
                </template>
            </button>
        </div>
    </nav>
</header>

<style>
    .navbar-header {
        transition: all 0.3s ease;
    }

    .navbar-header.scrolled {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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
