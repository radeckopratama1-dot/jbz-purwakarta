<!-- Editorial Loading Screen (Preloader) & Motion System JBZ Purwakarta -->
<div id="jbz-preloader" class="fixed inset-0 z-[9999] bg-[#FAF9F6] flex flex-col items-center justify-center px-6 transition-all duration-700 ease-[cubic-bezier(0.76,0,0.24,1)]">
    <!-- Top Progress Bar (3 Warna Khas Logo JBZ: Cyan, Yellow, Green) -->
    <div class="absolute top-0 left-0 right-0 h-1 overflow-hidden bg-stone-200/50">
        <div id="jbz-preloader-bar" class="h-full w-0 flex transition-all duration-300 ease-out">
            <div class="w-1/3 h-full bg-[#20B0E8]"></div>
            <div class="w-1/3 h-full bg-[#F8D018]"></div>
            <div class="w-1/3 h-full bg-[#78B030]"></div>
        </div>
    </div>

    <!-- Center Content: Logo, Tagline, Subtitle -->
    <div class="flex flex-col items-center text-center space-y-4 max-w-md animate-fade-in">
        <!-- Logo Wadah Proporsional (Vertical Crop Rapi Menghilangkan Ruang Kosong Atas-Bawah) -->
        <div class="h-20 sm:h-24 overflow-hidden flex items-center justify-center">
            <img src="{{ asset('images/logo/logo-jbz-purwakarta.png') }}"
                 alt="Jabar Bergerak Zillenial Kabupaten Purwakarta"
                 class="h-48 sm:h-56 w-auto object-contain transform hover:scale-105 transition-transform duration-500">
        </div>

        <!-- Aksen Garis Amber JBZ -->
        <div class="w-12 h-0.5 bg-[#F0A840] rounded-full"></div>

        <!-- Semboyan Tegas Editorial -->
        <div class="space-y-1">
            <p class="font-serif italic text-xl sm:text-2xl text-[#1C1C1A] tracking-wide">
                &ldquo;Kami Muda, Siap Aksi.&rdquo;
            </p>
            <p class="text-[10px] sm:text-xs font-bold uppercase tracking-[0.22em] text-[#585850]">
                Jabar Bergerak Zillenial Kabupaten Purwakarta
            </p>
        </div>
    </div>
</div>

<!-- Pure CSS untuk Motion & Scroll-Reveal Engine -->
<style>
    /* Global Anti-Horizontal-Overflow */
    html, body {
        overflow-x: hidden;
        max-width: 100%;
    }

    /* Scroll Reveal Classes */
    .reveal-up {
        opacity: 0;
        transform: translateY(22px);
        transition: opacity 0.65s cubic-bezier(0.22, 1, 0.36, 1), transform 0.65s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: opacity, transform;
    }

    .reveal-up.is-visible {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }

    .reveal-fade {
        opacity: 0;
        transition: opacity 0.65s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: opacity;
    }

    .reveal-fade.is-visible {
        opacity: 1 !important;
    }

    /* Stagger Delays */
    .reveal-delay-1 { transition-delay: 100ms; }
    .reveal-delay-2 { transition-delay: 200ms; }
    .reveal-delay-3 { transition-delay: 300ms; }
    .reveal-delay-4 { transition-delay: 400ms; }

    /* Micro-interactions: Underline Hover */
    .editorial-link {
        position: relative;
        text-decoration: none;
    }
    .editorial-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1.5px;
        background-color: currentColor;
        transition: width 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .editorial-link:hover::after {
        width: 100%;
    }

    /* Preloader Animation Keyframes */
    @keyframes preloaderFadeIn {
        from {
            opacity: 0;
            transform: scale(0.96) translateY(6px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-fade-in {
        animation: preloaderFadeIn 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    /* Hormati Preferensi Pengguna Mengurangi Gerakan (prefers-reduced-motion) */
    @media (prefers-reduced-motion: reduce) {
        #jbz-preloader {
            display: none !important;
        }
        .reveal-up, .reveal-fade {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }
</style>

<!-- Vanilla JS: Preloader, Scroll-Reveal, Counter, Mobile Drawer Handler -->
<script>
    (function () {
        'use strict';

        function startMotionSystem() {
            // 1. PRELOADER CONTROLLER
            const preloader = document.getElementById('jbz-preloader');
            const preloaderBar = document.getElementById('jbz-preloader-bar');
            let progress = 20;
            let preloaderDismissed = false;

            let progressInterval = null;
            if (preloaderBar) {
                preloaderBar.style.width = '25%';
                progressInterval = setInterval(function () {
                    if (progress < 85) {
                        progress += Math.floor(Math.random() * 15) + 10;
                        preloaderBar.style.width = Math.min(progress, 88) + '%';
                    }
                }, 100);
            }

            function dismissPreloader() {
                if (preloaderDismissed) return;
                preloaderDismissed = true;
                if (progressInterval) clearInterval(progressInterval);

                if (!preloader) {
                    showVisibleElements();
                    return;
                }

                if (preloaderBar) preloaderBar.style.width = '100%';

                setTimeout(function () {
                    preloader.style.transform = 'translateY(-100%)';
                    preloader.style.opacity = '0';
                    preloader.style.pointerEvents = 'none';

                    // Setelah tirai terangkat, pastikan elemen di viewport tampil
                    showVisibleElements();

                    setTimeout(function () {
                        preloader.style.display = 'none';
                        if (preloader.parentNode) {
                            preloader.parentNode.removeChild(preloader);
                        }
                    }, 700);
                }, 350);
            }

            // Pemicu penutupan preloader: saat DOM siap atau window loaded
            if (document.readyState === 'complete') {
                setTimeout(dismissPreloader, 600);
            } else {
                window.addEventListener('load', function () {
                    setTimeout(dismissPreloader, 400);
                });
            }

            // Safety Fallback Timeout untuk Preloader (maksimal 2000ms agar pengunjung tidak terhambat)
            setTimeout(dismissPreloader, 2000);

            // 2. HELPER VIEWPORT DETECTION
            function isInViewport(el) {
                const rect = el.getBoundingClientRect();
                const windowHeight = window.innerHeight || document.documentElement.clientHeight;
                return (rect.top <= windowHeight + 60 && rect.bottom >= -60);
            }

            function showVisibleElements() {
                document.querySelectorAll('.reveal-up, .reveal-fade').forEach(function (el) {
                    if (isInViewport(el)) {
                        el.classList.add('is-visible');
                    }
                });
            }

            // 3. SCROLL-REVEAL ENGINE DENGAN INTERSECTION OBSERVER
            const revealElements = document.querySelectorAll('.reveal-up, .reveal-fade');

            if ('IntersectionObserver' in window) {
                const revealObserver = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    root: null,
                    rootMargin: '0px 0px -20px 0px',
                    threshold: 0.05
                });

                revealElements.forEach(function (el) {
                    // Progressive enhancement: jika sudah berada di viewport awal, langsung beri class is-visible
                    if (isInViewport(el)) {
                        el.classList.add('is-visible');
                    } else {
                        revealObserver.observe(el);
                    }
                });

                // Safety Fallback 1: 1500ms setelah DOM siap, cek ulang elemen yang di viewport
                setTimeout(function () {
                    showVisibleElements();
                }, 1500);

                // Safety Fallback 2: 2600ms sebagai jaminan mutlak, jika ada yang belum terlihat, munculkan semua
                setTimeout(function () {
                    document.querySelectorAll('.reveal-up:not(.is-visible), .reveal-fade:not(.is-visible)').forEach(function (el) {
                        el.classList.add('is-visible');
                    });
                }, 2600);

            } else {
                // Fallback untuk browser lawas tanpa IntersectionObserver
                revealElements.forEach(function (el) {
                    el.classList.add('is-visible');
                });
            }

            // 4. ANIMATED COUNTER ENGINE (data-count-target)
            const countElements = document.querySelectorAll('[data-count-target]');

            function animateNumber(element, start, end, duration, prefix, suffix) {
                if (element.hasAttribute('data-counted')) return;
                element.setAttribute('data-counted', 'true');

                const startTime = performance.now();
                function update(currentTime) {
                    const elapsed = currentTime - startTime;
                    const p = Math.min(elapsed / duration, 1);
                    const easeProgress = 1 - Math.pow(1 - p, 3);
                    const currentVal = Math.floor(start + (end - start) * easeProgress);
                    element.textContent = prefix + currentVal.toLocaleString('id-ID') + suffix;
                    if (p < 1) {
                        requestAnimationFrame(update);
                    } else {
                        element.textContent = prefix + end.toLocaleString('id-ID') + suffix;
                    }
                }
                requestAnimationFrame(update);
            }

            function triggerCounter(targetEl) {
                const targetVal = parseInt(targetEl.getAttribute('data-count-target'), 10);
                const suffix = targetEl.getAttribute('data-count-suffix') || '';
                const prefix = targetEl.getAttribute('data-count-prefix') || '';
                if (!isNaN(targetVal)) {
                    animateNumber(targetEl, 0, targetVal, 1200, prefix, suffix);
                }
            }

            if ('IntersectionObserver' in window && countElements.length > 0) {
                const countObserver = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            triggerCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    root: null,
                    threshold: 0.1
                });

                countElements.forEach(function (el) {
                    if (isInViewport(el)) {
                        triggerCounter(el);
                    } else {
                        countObserver.observe(el);
                    }
                });
            } else {
                countElements.forEach(triggerCounter);
            }

            // 5. MOBILE DRAWER AUTO-CLOSE SAAT KLIK ANCHOR LINK
            const mobileNav = document.getElementById('mobile-nav');
            if (mobileNav) {
                mobileNav.querySelectorAll('a').forEach(function (anchor) {
                    anchor.addEventListener('click', function () {
                        mobileNav.classList.add('hidden');
                    });
                });
            }
        }

        // Jalankan saat DOM selesai dimuat (atau langsung jika sudah ready)
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', startMotionSystem);
        } else {
            startMotionSystem();
        }
    })();
</script>
