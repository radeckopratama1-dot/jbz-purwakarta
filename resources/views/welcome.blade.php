<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabar Bergerak Zillenial Kabupaten Purwakarta — Kami Muda Siap Aksi</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-jbz-purwakarta.png') }}">
    <meta name="description" content="Website Resmi Jabar Bergerak Zillenial (JBZ) Kabupaten Purwakarta. Wadah aksi kepemudaan, sosial, pendidikan, kemanusiaan, dan lingkungan di Purwakarta.">
    <meta property="og:title" content="Jabar Bergerak Zillenial Kabupaten Purwakarta — Kami Muda Siap Aksi">
    <meta property="og:description" content="Website Resmi Jabar Bergerak Zillenial (JBZ) Kabupaten Purwakarta. Wadah aksi kepemudaan, sosial, pendidikan, kemanusiaan, dan lingkungan di Purwakarta.">
    <meta property="og:image" content="{{ asset('images/logo/logo-jbz-purwakarta.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,500;0,6..72,600;1,6..72,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Newsreader', 'Georgia', 'serif'],
                    },
                    colors: {
                        paper: '#FAF9F6',
                        ink: '#1C1C1A',
                        jbz: {
                            charcoal: '#585850',
                            amber: '#F0A840',
                            yellow: '#F8D018',
                            cyan: '#20B0E8',
                            green: '#78B030',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-paper text-ink antialiased selection:bg-jbz-amber/30 selection:text-ink">

    <!-- Hairline Brand Signature Bar (3 Warna Resmi Logo JBZ) -->
    <div class="h-1 w-full flex">
        <div class="w-1/3 bg-jbz-cyan"></div>
        <div class="w-1/3 bg-jbz-yellow"></div>
        <div class="w-1/3 bg-jbz-green"></div>
    </div>

    <!-- Navigation Bar (Clean Editorial, Tanpa Teks Ganda di Samping Wordmark) -->
    <header class="sticky top-0 z-50 bg-paper/95 backdrop-blur border-b border-stone-200/80">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 h-20 flex items-center justify-between gap-6">
            <a href="#beranda" class="h-14 overflow-hidden flex items-center shrink-0">
                <img src="{{ asset('images/logo/logo-jbz-purwakarta.png') }}"
                     alt="Jabar Bergerak Zillenial Kabupaten Purwakarta"
                     class="h-36 sm:h-40 w-auto object-contain">
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-[13px] font-semibold tracking-wide text-jbz-charcoal">
                <a href="#misi" class="hover:text-ink transition">Misi & Bidang</a>
                <a href="#program" class="hover:text-ink transition">Program Aksi</a>
                <a href="#publikasi" class="hover:text-ink transition">Ruang Media PDD</a>
                <a href="#kabinet" class="hover:text-ink transition">Struktur Kabinet</a>
            </nav>

            <div class="hidden lg:flex items-center">
                <a href="{{ route('oprec.index') }}" class="px-6 py-2.5 bg-ink text-white text-xs font-bold tracking-wider uppercase rounded-full hover:bg-jbz-charcoal hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                    Bergabung
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button type="button" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')" class="lg:hidden p-2 border border-stone-300 rounded-xl text-ink hover:bg-stone-100 transition" aria-label="Menu Navigasi">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-nav" class="hidden lg:hidden bg-paper border-t border-stone-200/80 px-6 py-5 space-y-3 text-sm font-semibold text-jbz-charcoal">
            <a href="#misi" class="block py-1 hover:text-ink transition">Misi & Bidang</a>
            <a href="#program" class="block py-1 hover:text-ink transition">Program Aksi</a>
            <a href="#publikasi" class="block py-1 hover:text-ink transition">Ruang Media PDD</a>
            <a href="#kabinet" class="block py-1 hover:text-ink transition">Struktur Kabinet</a>
            <div class="pt-3 border-t border-stone-200/80">
                <a href="{{ route('oprec.index') }}" class="block w-full text-center py-2.5 bg-ink text-white text-xs font-bold uppercase tracking-wider rounded-full hover:bg-jbz-charcoal transition-all duration-200">Bergabung</a>
            </div>
        </div>
    </header>

    @php
        $bannerList = $banners->where('is_active', true);
        if ($bannerList->isEmpty()) {
            $bannerList = $banners;
        }
        $bannerCount = $bannerList->count();
    @endphp

    <!-- ================================================================== -->
    <!-- 01. FULL-BLEED HERO SLIDER (Gaya Editorial Djarum Foundation)       -->
    <!-- ================================================================== -->
    <section id="beranda" class="relative w-full min-h-[540px] lg:min-h-[620px] h-[580px] lg:h-[640px] overflow-hidden border-b border-stone-200/80 bg-paper">
        @if($bannerCount > 0)
            @foreach($bannerList as $banner)
                <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out {{ $loop->first ? 'opacity-100 z-20 pointer-events-auto' : 'opacity-0 z-0 pointer-events-none' }}" data-slide-index="{{ $loop->index }}">
                    <!-- Layer 1 (z-0): Foto Banner Layar Penuh -->
                    @if($banner->image_path)
                        <img src="{{ asset('storage/' . $banner->image_path) }}"
                             alt="{{ $banner->title }}"
                             class="absolute inset-0 w-full h-full object-cover object-center z-0"
                             loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                    @else
                        <div class="absolute inset-0 w-full h-full bg-stone-200 flex items-center justify-center z-0">
                            <span class="font-serif text-2xl text-stone-400">Jabar Bergerak Zillenial Kabupaten Purwakarta</span>
                        </div>
                    @endif

                    <!-- Layer 2 (z-10): Overlay Gradasi Lembut dari Kiri -->
                    <div class="absolute inset-0 pointer-events-none z-10 bg-gradient-to-r from-[#FAF9F6] via-[#FAF9F6]/90 to-transparent"></div>
                    <div class="absolute inset-0 pointer-events-none z-10 bg-gradient-to-t from-[#FAF9F6]/80 via-transparent to-transparent md:hidden"></div>

                    <!-- Layer 3 (relative z-20): Wadah Konten Teks -->
                    <div class="relative z-20 max-w-7xl mx-auto h-full flex items-center px-5 sm:px-8">
                        <div class="max-w-xl py-14 sm:py-20 lg:py-24 space-y-6">
                            <div class="flex items-center gap-3">
                                <span class="h-px w-10 bg-jbz-amber"></span>
                                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#585850]">
                                    Kabupaten Purwakarta &mdash; Jawa Barat
                                </span>
                            </div>

                            <h1 class="font-serif text-3xl sm:text-5xl lg:text-[3.3rem] leading-[1.1] tracking-tight text-[#1C1C1A]">
                                {{ $banner->title }}
                            </h1>

                            @if($banner->subtitle)
                                <p class="text-sm sm:text-base lg:text-lg text-[#585850] leading-relaxed max-w-lg">
                                    {{ $banner->subtitle }}
                                </p>
                            @endif

                            <div class="flex flex-wrap items-center gap-4 pt-1">
                                <a href="{{ $banner->button_url ?? '#program' }}" class="px-7 py-3.5 bg-[#1C1C1A] text-white text-xs font-bold uppercase tracking-[0.14em] rounded-full hover:bg-jbz-charcoal hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                                    {{ $banner->button_text ?? 'Lihat Program Aksi' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <!-- Fallback 1 Slide Default jika belum ada banner aktif -->
            <div class="hero-slide absolute inset-0 opacity-100 z-20 pointer-events-auto" data-slide-index="0">
                <!-- Layer 1 (z-0): Background Fallback -->
                <div class="absolute inset-0 w-full h-full bg-stone-100 flex items-center justify-center z-0">
                    <img src="{{ asset('images/logo/logo-jbz-purwakarta.png') }}" alt="JBZ Purwakarta" class="h-40 w-auto opacity-10 object-contain" loading="eager">
                </div>

                <!-- Layer 2 (z-10): Overlay Gradasi Lembut dari Kiri -->
                <div class="absolute inset-0 pointer-events-none z-10 bg-gradient-to-r from-[#FAF9F6] via-[#FAF9F6]/90 to-transparent"></div>
                <div class="absolute inset-0 pointer-events-none z-10 bg-gradient-to-t from-[#FAF9F6]/80 via-transparent to-transparent md:hidden"></div>

                <!-- Layer 3 (relative z-20): Wadah Konten Teks -->
                <div class="relative z-20 max-w-7xl mx-auto h-full flex items-center px-5 sm:px-8">
                    <div class="max-w-xl py-14 sm:py-20 lg:py-24 space-y-6">
                        <div class="flex items-center gap-3">
                            <span class="h-px w-10 bg-jbz-amber"></span>
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#585850]">
                                Kabupaten Purwakarta &mdash; Jawa Barat
                            </span>
                        </div>
                        <h1 class="font-serif text-3xl sm:text-5xl lg:text-[3.3rem] leading-[1.1] tracking-tight text-[#1C1C1A]">
                            Bergerak Bersama Pemuda Purwakarta untuk Kemanusiaan dan Pendidikan.
                        </h1>
                        <p class="text-sm sm:text-base lg:text-lg text-[#585850] leading-relaxed max-w-lg">
                            Jabar Bergerak Zillenial (JBZ) Kabupaten Purwakarta mewadahi generasi muda yang Aktif, Adaptif, dan Kolaboratif dalam menghadirkan aksi sosial, pendidikan, serta pelestarian lingkungan yang berdampak nyata.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-1">
                            <a href="#program" class="px-7 py-3.5 bg-[#1C1C1A] text-white text-xs font-bold uppercase tracking-[0.14em] rounded-full hover:bg-jbz-charcoal hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                                Lihat Program Aksi
                            </a>
                            <a href="{{ route('oprec.index') }}" class="px-7 py-3.5 border border-[#1C1C1A] text-[#1C1C1A] text-xs font-bold uppercase tracking-[0.14em] rounded-full hover:bg-[#1C1C1A] hover:text-white hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                                Daftar Relawan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Indikator Garis Horizontal di Bawah Tengah (Gaya Djarum Foundation) -->
        @if($bannerCount > 1)
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex items-center gap-2.5">
                @for($i = 0; $i < $bannerCount; $i++)
                    <button type="button"
                            onclick="goToHeroSlide({{ $i }})"
                            class="hero-indicator h-1.5 transition-all duration-300 rounded-full {{ $i === 0 ? 'w-10 bg-jbz-amber' : 'w-6 bg-stone-400/50 hover:bg-stone-500' }}"
                            aria-label="Menuju Slide {{ $i + 1 }}"
                            data-indicator-index="{{ $i }}">
                    </button>
                @endfor
            </div>

            <!-- Tombol Panah Halus Kiri & Kanan (Navigasi Slider Tambahan) -->
            <button type="button"
                    onclick="prevHeroSlide()"
                    class="hidden md:flex absolute left-5 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-paper/80 hover:bg-paper backdrop-blur border border-stone-200/80 items-center justify-center text-[#1C1C1A] hover:text-jbz-amber transition-all shadow-sm hover:shadow-md"
                    aria-label="Slide Sebelumnya">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button"
                    onclick="nextHeroSlide()"
                    class="hidden md:flex absolute right-5 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-paper/80 hover:bg-paper backdrop-blur border border-stone-200/80 items-center justify-center text-[#1C1C1A] hover:text-jbz-amber transition-all shadow-sm hover:shadow-md"
                    aria-label="Slide Berikutnya">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        @endif

        <!-- Scroll-Down Indicator di Pojok Kanan Bawah (Gaya Djarum Foundation) -->
        <a href="#misi"
           class="hidden sm:flex absolute bottom-6 right-6 lg:right-10 z-30 items-center gap-2.5 text-xs font-semibold uppercase tracking-wider text-[#585850] hover:text-[#1C1C1A] transition group"
           aria-label="Gulir ke Misi & Bidang">
            <span class="text-[11px] font-bold tracking-widest group-hover:text-[#1C1C1A]">Jelajahi</span>
            <div class="w-8 h-8 rounded-full border border-stone-300 group-hover:border-[#1C1C1A] flex items-center justify-center transition">
                <svg class="w-3.5 h-3.5 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </div>
        </a>
    </section>

    <!-- Strip Statistik Ringkas Lembaga (Tepat di Bawah Hero Slider) -->
    <section class="border-b border-stone-200/80 bg-white py-6">
        <div class="max-w-7xl mx-auto px-5 sm:px-8">
            <div class="grid grid-cols-3 divide-x divide-stone-200/80 text-center">
                <div class="px-3 sm:px-6">
                    <p class="font-serif text-2xl sm:text-3xl font-semibold text-ink">2020</p>
                    <p class="text-[11px] sm:text-xs uppercase tracking-wider text-jbz-charcoal mt-1">Berdiri di Jabar</p>
                </div>
                <div class="px-3 sm:px-6">
                    <p class="font-serif text-2xl sm:text-3xl font-semibold text-ink">{{ $divisions->count() }}</p>
                    <p class="text-[11px] sm:text-xs uppercase tracking-wider text-jbz-charcoal mt-1">Bidang Aktif</p>
                </div>
                <div class="px-3 sm:px-6">
                    <p class="font-serif text-2xl sm:text-3xl font-semibold text-ink">{{ $programs->count() }}+</p>
                    <p class="text-[11px] sm:text-xs uppercase tracking-wider text-jbz-charcoal mt-1">Program Terdata</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- 02. MISI & PILAR BIDANG GERAK (Adaptasi Misi Bakti)                -->
    <!-- ================================================================== -->
    <section id="misi" class="py-20 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-5 sm:px-8">
            <div class="grid lg:grid-cols-12 gap-8 pb-12 border-b border-stone-200 items-end">
                <div class="lg:col-span-7">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-amber">01 / Misi & Pilar Gerak</p>
                    <h2 class="font-serif text-3xl sm:text-4xl text-ink mt-2">
                        Struktur Bidang Kerja JBZ Kabupaten Purwakarta
                    </h2>
                </div>
                <div class="lg:col-span-5">
                    <p class="text-sm text-jbz-charcoal leading-relaxed">
                        Berlandaskan nilai <strong>3K (Kepedulian, Kejuangan, Keikhlasan)</strong>, setiap bidang bergerak terukur untuk menjawab kebutuhan sosial, pendidikan, dan pemberdayaan pemuda di Purwakarta.
                    </p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-5 divide-y md:divide-y-0 md:divide-x divide-stone-200 border-b border-stone-200">
                @foreach($divisions as $index => $division)
                    <div class="py-8 md:px-6 first:md:pl-0 last:md:pr-0 flex flex-col justify-between gap-6 group">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold tracking-widest text-stone-400">0{{ $index + 1 }}</span>
                                <span class="text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full border border-stone-200/80 bg-stone-50 text-jbz-charcoal group-hover:border-jbz-amber group-hover:text-ink transition">
                                    {{ $division->short_code ?? 'DIV' }}
                                </span>
                            </div>
                            <h3 class="font-serif text-xl font-semibold text-ink leading-snug">
                                {{ $division->name }}
                            </h3>
                            <p class="text-xs text-jbz-charcoal leading-relaxed">
                                {{ $division->description }}
                            </p>
                        </div>
                        <a href="#kabinet" class="text-[11px] font-bold uppercase tracking-wider text-ink underline underline-offset-4 decoration-jbz-amber hover:text-jbz-charcoal transition">
                            Lihat Pengurus
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- 03. ETALASE PROGRAM & JEJAK AKSI (Adaptasi Aktivitas Bakti)        -->
    <!-- ================================================================== -->
    <section id="program" class="py-20 bg-paper border-b border-stone-200/80">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 space-y-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200/80 pb-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-green">02 / Aktivitas & Jejak Aksi</p>
                    <h2 class="font-serif text-3xl sm:text-4xl text-ink mt-2">
                        Program Kerja Unggulan Purwakarta
                    </h2>
                </div>
                <p class="text-sm text-jbz-charcoal max-w-md">
                    Dokumentasi program kerja kepemudaan, sosial, pendidikan, kemanusiaan, dan lingkungan di Kabupaten Purwakarta.
                </p>
            </div>

            <!-- Tombol Filter Interaktif Kategori Program -->
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="filterPrograms('semua')" class="program-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-ink text-white border border-ink transition-all duration-200" data-filter="semua">Semua</button>
                <button type="button" onclick="filterPrograms('Lingkungan')" class="program-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-white text-jbz-charcoal border border-stone-300 hover:border-ink hover:text-ink transition-all duration-200" data-filter="Lingkungan">Lingkungan</button>
                <button type="button" onclick="filterPrograms('Kemanusiaan')" class="program-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-white text-jbz-charcoal border border-stone-300 hover:border-ink hover:text-ink transition-all duration-200" data-filter="Kemanusiaan">Kemanusiaan</button>
                <button type="button" onclick="filterPrograms('Pendidikan')" class="program-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-white text-jbz-charcoal border border-stone-300 hover:border-ink hover:text-ink transition-all duration-200" data-filter="Pendidikan">Pendidikan</button>
                <button type="button" onclick="filterPrograms('Media & Kreatif')" class="program-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-white text-jbz-charcoal border border-stone-300 hover:border-ink hover:text-ink transition-all duration-200" data-filter="Media & Kreatif">Media & Kreatif</button>
            </div>

            <div id="programs-grid" class="grid md:grid-cols-2 gap-10">
                @foreach($programs as $program)
                    <article class="program-card group border border-stone-200/80 bg-white rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(28,28,26,0.04)] hover:shadow-[0_12px_30px_rgba(28,28,26,0.08)] hover:-translate-y-0.5 transition-all duration-300 flex flex-col justify-between" data-pillar="{{ $program->pillar }}">
                        <div>
                            <a href="{{ route('program.show', $program->slug) }}" class="block aspect-[16/10] w-full overflow-hidden bg-stone-100 border-b border-stone-200/80">
                                @if($program->cover_image)
                                    <img src="{{ asset('storage/' . $program->cover_image) }}"
                                         alt="{{ $program->title }}"
                                         loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-stone-100">
                                        <span class="text-[11px] uppercase tracking-widest text-stone-400 font-bold">{{ $program->pillar }}</span>
                                        <p class="font-serif text-lg text-jbz-charcoal mt-1">{{ $program->title }}</p>
                                    </div>
                                @endif
                            </a>

                            <div class="p-7 space-y-3">
                                <div class="flex flex-wrap items-center justify-between gap-2 text-[11px] font-bold uppercase tracking-wider">
                                    <span class="px-2.5 py-0.5 rounded-full bg-jbz-green/15 text-jbz-green border border-jbz-green/30">{{ $program->pillar }}</span>
                                    <span class="text-stone-400">{{ $program->event_date ? $program->event_date->translatedFormat('d F Y') : $program->status }}</span>
                                </div>

                                <h3 class="font-serif text-2xl font-semibold text-ink leading-snug group-hover:text-jbz-charcoal transition">
                                    <a href="{{ route('program.show', $program->slug) }}">
                                        {{ $program->title }}
                                    </a>
                                </h3>

                                <p class="text-xs font-semibold text-stone-500">
                                    Lokasi: {{ $program->location }}
                                </p>

                                <p class="text-sm text-jbz-charcoal leading-relaxed pt-1">
                                    {{ $program->summary }}
                                </p>

                                <div class="pt-2">
                                    <a href="{{ route('program.show', $program->slug) }}" class="inline-block text-xs font-bold uppercase tracking-wider text-ink underline underline-offset-4 decoration-jbz-green hover:text-jbz-charcoal transition">
                                        Lihat Detail Program &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="px-7 py-4 border-t border-stone-100 flex items-center justify-between text-xs">
                            <span class="font-semibold text-stone-500">{{ $program->division->name ?? 'JBZ Kabupaten Purwakarta' }}</span>
                            <span class="px-2.5 py-0.5 rounded-full bg-stone-100 text-stone-700 font-bold text-[10px] uppercase tracking-wider border border-stone-200/80">{{ $program->status }}</span>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- 04. RUANG MEDIA & GALERI DOKUMENTASI PDD                           -->
    <!-- ================================================================== -->
    <section id="publikasi" class="py-20 bg-white border-b border-stone-200/80">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 space-y-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200/80 pb-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-cyan">03 / Ruang Media & Galeri PDD</p>
                    <h2 class="font-serif text-3xl sm:text-4xl text-ink mt-2">
                        Berita Kegiatan & Arsip Dokumentasi Visual
                    </h2>
                </div>
                <p class="text-sm text-jbz-charcoal max-w-md">
                    Rilis pers resmi, liputan kegiatan langsung, dan galeri arsip dokumentasi visual JBZ Kabupaten Purwakarta.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="group bg-white border border-stone-200/80 rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(28,28,26,0.04)] hover:shadow-[0_12px_30px_rgba(28,28,26,0.08)] hover:-translate-y-0.5 transition-all duration-300 flex flex-col justify-between">
                        <div class="space-y-4">
                            <a href="{{ route('post.show', $post->slug) }}" class="block aspect-[4/3] w-full overflow-hidden bg-stone-100 border-b border-stone-200/80">
                                @if($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}"
                                         alt="{{ $post->title }}"
                                         loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center p-6 text-center bg-stone-50">
                                        <span class="text-xs font-bold uppercase tracking-widest text-stone-400">{{ $post->type }}</span>
                                    </div>
                                @endif
                            </a>

                            <div class="px-6 space-y-3">
                                <div class="flex items-center justify-between text-[11px] font-bold uppercase tracking-wider">
                                    <span class="px-2.5 py-0.5 rounded-full bg-jbz-cyan/15 text-jbz-cyan border border-jbz-cyan/30">{{ $post->type }}</span>
                                    <span class="text-stone-400">{{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : 'Terbaru' }}</span>
                                </div>

                                <h3 class="font-serif text-xl font-semibold text-ink leading-snug group-hover:text-jbz-charcoal transition">
                                    <a href="{{ route('post.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <p class="text-sm text-jbz-charcoal leading-relaxed line-clamp-3">
                                    {{ $post->excerpt }}
                                </p>

                                <div class="pt-1">
                                    <a href="{{ route('post.show', $post->slug) }}" class="inline-block text-xs font-bold uppercase tracking-wider text-ink underline underline-offset-4 decoration-jbz-cyan hover:text-jbz-charcoal transition">
                                        Baca Selengkapnya &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>

                        <p class="text-[11px] font-semibold text-stone-500 mx-6 mb-5 mt-5 pt-3 border-t border-stone-100">
                            Oleh {{ $post->author_name }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- 05. STRUKTUR PENGURUS KABINET                                      -->
    <!-- ================================================================== -->
    <section id="kabinet" class="py-20 bg-paper border-b border-stone-200/80">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 space-y-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200/80 pb-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-amber">04 / Pengurus Kabinet</p>
                    <h2 class="font-serif text-3xl sm:text-4xl text-ink mt-2">
                        Orang-Orang di Balik Pergerakan
                    </h2>
                </div>
                <p class="text-sm text-jbz-charcoal max-w-md">
                    Direktori pengurus aktif Jabar Bergerak Zillenial Kabupaten Purwakarta periode 2025/2026.
                </p>
            </div>

            <!-- Tombol Filter Interaktif Struktur Pengurus -->
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="filterMembers('semua')" class="member-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-ink text-white border border-ink transition-all duration-200" data-filter="semua">Semua Bidang</button>
                @foreach($divisions as $div)
                    <button type="button" onclick="filterMembers('{{ $div->id }}')" class="member-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-white text-jbz-charcoal border border-stone-300 hover:border-ink hover:text-ink transition-all duration-200" data-filter="{{ $div->id }}">
                        {{ $div->short_code ?? $div->name }}
                    </button>
                @endforeach
            </div>

            <div id="members-grid" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($boardMembers as $member)
                    <div class="member-card group bg-white border border-stone-200/80 rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(28,28,26,0.04)] hover:shadow-[0_12px_30px_rgba(28,28,26,0.08)] hover:-translate-y-0.5 transition-all duration-300 flex flex-col justify-between" data-division-id="{{ $member->division_id }}">
                        <div>
                            <div class="aspect-[4/4] w-full bg-stone-100 overflow-hidden border-b border-stone-200/80">
                                @if($member->photo_path)
                                    <img src="{{ asset('storage/' . $member->photo_path) }}"
                                         alt="{{ $member->full_name }}"
                                         loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-stone-100 text-jbz-charcoal font-serif text-3xl">
                                        {{ strtoupper(substr($member->full_name, 0, 2)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="p-5 space-y-1">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-jbz-amber">
                                    {{ $member->division->name ?? 'Pengurus' }}
                                </p>
                                <h3 class="font-serif text-lg font-semibold text-ink">
                                    {{ $member->full_name }}
                                </h3>
                                <p class="text-xs font-semibold text-jbz-charcoal">
                                    {{ $member->role_title }}
                                </p>
                                @if($member->institution)
                                    <p class="text-[11px] text-stone-500 pt-1">{{ $member->institution }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="px-5 py-3 border-t border-stone-100 flex items-center justify-between text-[11px] text-stone-500">
                            <span>Periode {{ $member->period }}</span>
                            <span class="font-semibold text-ink">{{ $member->instagram_handle ?? '@jaberzillenial' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Editorial Footer -->
    <footer class="bg-stone-950 text-stone-400 border-t border-stone-800 py-12">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 text-xs">
            <div class="space-y-1.5">
                <p class="font-bold text-white uppercase tracking-wider">Jabar Bergerak Zillenial Kabupaten Purwakarta</p>
                <p>Aktif, Adaptif, dan Kolaboratif &mdash; Kepedulian, Kejuangan, Keikhlasan.</p>
            </div>
            <div class="sm:text-right space-y-1">
                <p class="text-stone-300">Bidang Media & Produksi Visual (PDD)</p>
                <p class="text-stone-500">&copy; {{ date('Y') }} JBZ Kabupaten Purwakarta.</p>
            </div>
        </div>
    </footer>

    <!-- Script Filter Interaktif Client-Side Program & Kabinet & Hero Slider -->
    <script>
        // ==========================================
        // HERO SLIDER FULL-BLEED (GAYA DJARUM FOUNDATION)
        // ==========================================
        let currentHeroSlide = 0;
        const heroSlides = document.querySelectorAll('.hero-slide');
        const heroIndicators = document.querySelectorAll('.hero-indicator');
        const totalHeroSlides = heroSlides.length;
        let heroSlideTimer = null;
        const HERO_INTERVAL = 5000;

        function showHeroSlide(index) {
            if (totalHeroSlides <= 1) return;

            if (index >= totalHeroSlides) {
                currentHeroSlide = 0;
            } else if (index < 0) {
                currentHeroSlide = totalHeroSlides - 1;
            } else {
                currentHeroSlide = index;
            }

            heroSlides.forEach((slide, i) => {
                if (i === currentHeroSlide) {
                    slide.classList.remove('opacity-0', 'pointer-events-none', 'z-0');
                    slide.classList.add('opacity-100', 'pointer-events-auto', 'z-20');
                } else {
                    slide.classList.remove('opacity-100', 'pointer-events-auto', 'z-20', 'z-10');
                    slide.classList.add('opacity-0', 'pointer-events-none', 'z-0');
                }
            });

            heroIndicators.forEach((indicator, i) => {
                if (i === currentHeroSlide) {
                    indicator.className = 'hero-indicator h-1.5 transition-all duration-300 rounded-full w-10 bg-jbz-amber';
                } else {
                    indicator.className = 'hero-indicator h-1.5 transition-all duration-300 rounded-full w-6 bg-stone-400/50 hover:bg-stone-500';
                }
            });
        }

        function nextHeroSlide() {
            showHeroSlide(currentHeroSlide + 1);
            resetHeroTimer();
        }

        function prevHeroSlide() {
            showHeroSlide(currentHeroSlide - 1);
            resetHeroTimer();
        }

        function goToHeroSlide(index) {
            showHeroSlide(index);
            resetHeroTimer();
        }

        function startHeroTimer() {
            if (totalHeroSlides > 1 && !heroSlideTimer) {
                heroSlideTimer = setInterval(() => {
                    showHeroSlide(currentHeroSlide + 1);
                }, HERO_INTERVAL);
            }
        }

        function stopHeroTimer() {
            if (heroSlideTimer) {
                clearInterval(heroSlideTimer);
                heroSlideTimer = null;
            }
        }

        function resetHeroTimer() {
            stopHeroTimer();
            startHeroTimer();
        }

        const heroContainer = document.getElementById('beranda');
        if (heroContainer && totalHeroSlides > 1) {
            heroContainer.addEventListener('mouseenter', stopHeroTimer);
            heroContainer.addEventListener('mouseleave', startHeroTimer);
            startHeroTimer();
        }

        // ==========================================
        // FILTER PROGRAM & ANGGOTA KABINET
        // ==========================================
        function filterPrograms(pillar) {
            document.querySelectorAll('.program-filter-btn').forEach(btn => {
                if (btn.getAttribute('data-filter') === pillar) {
                    btn.className = 'program-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-ink text-white border border-ink transition-all duration-200';
                } else {
                    btn.className = 'program-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-white text-jbz-charcoal border border-stone-300 hover:border-ink hover:text-ink transition-all duration-200';
                }
            });

            document.querySelectorAll('.program-card').forEach(card => {
                if (pillar === 'semua' || card.getAttribute('data-pillar') === pillar) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        function filterMembers(divisionId) {
            document.querySelectorAll('.member-filter-btn').forEach(btn => {
                if (btn.getAttribute('data-filter') === String(divisionId)) {
                    btn.className = 'member-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-ink text-white border border-ink transition-all duration-200';
                } else {
                    btn.className = 'member-filter-btn px-5 py-2 text-xs font-bold uppercase tracking-wider rounded-full bg-white text-jbz-charcoal border border-stone-300 hover:border-ink hover:text-ink transition-all duration-200';
                }
            });

            document.querySelectorAll('.member-card').forEach(card => {
                if (divisionId === 'semua' || card.getAttribute('data-division-id') === String(divisionId)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }
    </script>

</body>
</html>