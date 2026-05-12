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

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'BEM Fasilkom UMRI')">
    <meta property="twitter:description" content="@yield('meta_description', 'Website Resmi BEM FASILKOM Universitas Muhammadiyah Riau.')">
    <meta property="twitter:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

    <meta name="theme-color" content="#0ea5e9">
    <title>@yield('title', 'BEM Fasilkom UMRI') - Badan Eksekutif Mahasiswa</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/bem.png') }}" type="image/png">

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Custom Styles -->
    <style>
        * {
            @apply transition-colors duration-300;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        /* Glassmorphism Effect */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Gradient Text */
        .gradient-text {
            @apply bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent;
        }

        /* Modern Button */
        .btn-primary {
            @apply px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg font-semibold hover:from-cyan-600 hover:to-blue-700 shadow-lg hover:shadow-xl hover:scale-105 transition-all;
        }

        .btn-secondary {
            @apply px-6 py-3 bg-white text-slate-900 rounded-lg font-semibold hover:bg-slate-100 shadow-lg transition-all;
        }

        /* Card Hover Effect */
        .card-hover {
            @apply hover:shadow-2xl hover:-translate-y-2 transition-all duration-300;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            @apply bg-slate-200 dark:bg-slate-800;
        }

        ::-webkit-scrollbar-thumb {
            @apply bg-gradient-to-b from-cyan-500 to-blue-600 rounded-full;
        }

        ::-webkit-scrollbar-thumb:hover {
            @apply from-cyan-600 to-blue-700;
        }

        /* Loading Skeleton */
        .skeleton {
            @apply bg-gradient-to-r from-slate-200 to-slate-300 dark:from-slate-700 dark:to-slate-800 rounded animate-pulse;
        }

        /* Dark Mode Support */
        @media (prefers-color-scheme: dark) {
            .glass {
                background: rgba(15, 23, 42, 0.7);
                border-color: rgba(255, 255, 255, 0.1);
            }
        }
    </style>

    @stack('styles')
</head>

<body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans overflow-x-hidden">
    
    <!-- Alpine.js Data Container -->
    <div x-data="{ 
        darkMode: localStorage.getItem('darkMode') === 'true',
        mobileMenuOpen: false,
        init() {
            this.$watch('darkMode', val => {
                localStorage.setItem('darkMode', val);
                if (val) document.documentElement.classList.add('dark');
                else document.documentElement.classList.remove('dark');
            });
            // Initial state
            if (this.darkMode) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
        }
    }">

        <!-- Header -->
        @include('layouts.header')

        <!-- Main Content -->
        <main class="min-h-screen">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.footer')
    </div>

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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <!-- FSLightbox for Image Zooming -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.3.1/index.min.js"></script>

    <!-- Scripts Stack -->
    @stack('scripts')

    <!-- Global Script untuk Toast -->
    <script>
        window.showToast = function(message, type = 'success') {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        };

        window.showConfirm = function(title, message, callback) {
            Swal.fire({
                title: title,
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0ea5e9',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Lanjutkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed && callback) {
                    callback();
                }
            });
        };
    </script>
</body>
</html>