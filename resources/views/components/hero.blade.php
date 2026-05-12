<!-- Hero Carousel Component dengan Swiper -->
<section class="relative h-[600px] md:h-[700px] overflow-hidden bg-gradient-to-b from-slate-900 to-slate-800">
    <!-- Swiper Container -->
    <div class="swiper-container h-full" id="heroSwiper">
        <div class="swiper-wrapper">
            @forelse($heroCarousels as $carousel)
                <div class="swiper-slide">
                    <div class="relative w-full h-full group">
                        <!-- Background Image -->
                        <img src="{{ asset('uploads/' . $carousel->image) }}" alt="{{ $carousel->title }}" 
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>

                        <!-- Content -->
                        <div class="absolute inset-0 flex items-center">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                                <div class="max-w-2xl space-y-4" data-aos="fade-up" data-aos-delay="100">
                                    <!-- Title -->
                                    <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight">
                                        {{ $carousel->title }}
                                    </h1>

                                    <!-- Subtitle -->
                                    @if($carousel->subtitle)
                                        <p class="text-lg md:text-xl text-slate-200 leading-relaxed max-w-xl">
                                            {{ $carousel->subtitle }}
                                        </p>
                                    @endif

                                    <!-- CTA Button -->
                                    @if($carousel->button_text && $carousel->button_link)
                                        <div class="pt-4">
                                            <a href="{{ $carousel->button_link }}" 
                                                class="inline-block px-8 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg font-semibold hover:from-cyan-600 hover:to-blue-700 shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                                                {{ $carousel->button_text }}
                                                <svg class="inline-block w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Floating Elements -->
                        <div class="absolute top-10 right-10 w-32 h-32 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
                        <div class="absolute bottom-20 left-10 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            @empty
                <div class="swiper-slide">
                    <div class="w-full h-full bg-gradient-to-r from-cyan-500 to-blue-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h1 class="text-5xl font-bold mb-4">Selamat Datang</h1>
                            <p class="text-2xl">di BEM Fasilkom UMRI</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Navigation Buttons -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 flex gap-4">
            <button class="swiper-button-prev !w-12 !h-12 bg-white/20 hover:bg-white/40 rounded-full backdrop-blur flex items-center justify-center transition">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="swiper-button-next !w-12 !h-12 bg-white/20 hover:bg-white/40 rounded-full backdrop-blur flex items-center justify-center transition">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

        <!-- Pagination Dots -->
        <div class="swiper-pagination !bottom-4"></div>
    </div>
</section>

<style>
    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-button-prev, .swiper-button-next {
        position: relative !important;
        width: auto !important;
        height: auto !important;
        color: white !important;
    }

    .swiper-pagination-bullet {
        @apply bg-white/50 transition-all;
    }

    .swiper-pagination-bullet-active {
        @apply bg-cyan-400 w-8;
    }
</style>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('#heroSwiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                }
            });
        });
    </script>
@endpush
