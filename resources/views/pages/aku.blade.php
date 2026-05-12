<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Profile - Adryan Maha Putra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0f172a;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .profile-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        }
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .img-placeholder {
            background-color: #1e293b;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
        }
        .social-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .social-link:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="text-white flex items-center justify-center min-h-screen p-4 overflow-hidden">

    <!-- Latar Belakang Cahaya -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-blue-600/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-purple-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="max-w-md w-full glass-card rounded-[2.5rem] p-10 fade-in shadow-2xl relative">
        <div class="flex flex-col items-center">
            
            <!-- Frame Foto -->
            <div class="relative group">
                <div class="absolute -inset-1 profile-gradient rounded-full blur opacity-30 group-hover:opacity-60 transition duration-1000"></div>
                <div class="relative w-32 h-32 rounded-full overflow-hidden border-4 border-slate-900 shadow-xl">
                    <img src="img/adryan.jpg" 
                         alt="Adryan Maha Putra" 
                         class="w-full h-full object-cover"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="img-placeholder w-full h-full hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Identitas Utama -->
            <div class="text-center mt-6">
                <h1 class="text-2xl font-extrabold tracking-tight">Adryan Maha Putra</h1>
                <p class="text-blue-400 font-semibold text-sm mt-1 uppercase tracking-widest">Fullstack Developer</p>
                <div class="flex items-center justify-center gap-2 mt-2 text-xs text-slate-400">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                    Pekanbaru, Riau
                </div>
            </div>

            <!-- Info Pendidikan -->
            <div class="mt-8 w-full">
                <div class="p-5 rounded-3xl bg-white/5 border border-white/5 hover:border-white/10 transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">Teknik Informatika</p>
                            <p class="text-sm font-semibold text-slate-200">Univ. Muhammadiyah Riau</p>
                            <p class="text-[11px] text-slate-400">Mahasiswa Angkatan 2022</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Grid -->
            <div class="mt-8 w-full">
                <p class="text-[10px] text-center text-slate-500 uppercase tracking-[0.2em] font-bold mb-4">Connect With Me</p>
                <div class="grid grid-cols-4 gap-3">
                    <!-- LinkedIn -->
                    <a href="https://id.linkedin.com/in/adryan-maha-putra-9a0625222" target="_blank" class="social-link p-3 rounded-2xl bg-white/5 flex items-center justify-center text-slate-300 hover:text-blue-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/adrynmhptra__?igsh=dzV2NGdiYzZybjUw&utm_source=qr" target="_blank" class="social-link p-3 rounded-2xl bg-white/5 flex items-center justify-center text-slate-300 hover:text-pink-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <!-- GitHub -->
                    <a href="https://github.com/4aDudDu" target="_blank" class="social-link p-3 rounded-2xl bg-white/5 flex items-center justify-center text-slate-300 hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <!-- Email -->
                    <a href="mailto:adriyanmahaputra009@gmail.com" class="social-link p-3 rounded-2xl bg-white/5 flex items-center justify-center text-slate-300 hover:text-red-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Tombol Navigasi -->
            <div class="mt-10 flex gap-3 w-full">
                <a href="/dashboard" class="flex-1 px-6 py-3 bg-white text-slate-950 rounded-2xl text-xs font-bold hover:bg-slate-200 transition-all text-center">
                    Dashboard
                </a>
                <button onclick="window.history.back()" class="px-6 py-3 glass-card rounded-2xl text-xs font-bold hover:bg-white/10 transition-all">
                    Kembali
                </button>
            </div>
        </div>
    </div>

</body>
</html>