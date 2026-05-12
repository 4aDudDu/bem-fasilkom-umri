<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Website Resmi BEM FASILKOM Universitas Muhammadiyah Riau. Pusat informasi, aspirasi, dan kegiatan mahasiswa.')">
    <meta name="keywords" content="BEM, Fasilkom, UMRI, Universitas Muhammadiyah Riau, Mahasiswa, Riau, Pekanbaru">
    <meta name="author" content="BEM Fasilkom UMRI">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'BEM Fasilkom UMRI') - Badan Eksekutif Mahasiswa">
    <meta property="og:description" content="@yield('meta_description', 'Website Resmi BEM FASILKOM Universitas Muhammadiyah Riau.')">
    <meta property="og:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

    <meta name="theme-color" content="#3b82f6">
    <title>@yield('title', 'BEM Fasilkom UMRI') - Badan Eksekutif Mahasiswa</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/bem.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 font-sans antialiased overflow-x-hidden">
    
    <!-- Header -->
    @include('layouts.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ 
            duration: 1000, 
            once: true,
            offset: 100
        });
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Global Scripts -->
    <script>
        window.showToast = function(message, type = 'success') {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        };

        // Navbar Scroll Effect
        window.onscroll = function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('py-2');
                navbar.querySelector('nav').classList.add('shadow-2xl', 'bg-white/95');
            } else {
                navbar.classList.remove('py-2');
                navbar.querySelector('nav').classList.remove('shadow-2xl', 'bg-white/95');
            }
        };

        // Dark Mode Toggle
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon?.classList.remove('hidden');
        } else {
            themeToggleDarkIcon?.classList.remove('hidden');
        }

        themeToggleBtn?.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>