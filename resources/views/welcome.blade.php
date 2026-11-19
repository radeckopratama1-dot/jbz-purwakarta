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
    <header class="sticky top-0 z-50 bg-paper/95 backdrop-blur border-b border-stone-200">
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
                <a href="#oprec" class="hover:text-ink transition">Open Recruitment</a>
            </nav>

            <div class="hidden lg:flex items-center">
                <a href="#oprec" class="px-6 py-2.5 bg-ink text-white text-xs font-bold tracking-wider uppercase hover:bg-jbz-charcoal transition">
                    Bergabung
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button type="button" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')" class="lg:hidden p-2 border border-stone-300 text-ink" aria-label="Menu Navigasi">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-nav" class="hidden lg:hidden bg-paper border-t border-stone-200 px-6 py-5 space-y-3 text-sm font-semibold text-jbz-charcoal">
            <a href="#misi" class="block py-1 hover:text-ink">Misi & Bidang</a>
            <a href="#program" class="block py-1 hover:text-ink">Program Aksi</a>
            <a href="#publikasi" class="block py-1 hover:text-ink">Ruang Media PDD</a>
            <a href="#kabinet" class="block py-1 hover:text-ink">Struktur Kabinet</a>
            <a href="#oprec" class="block py-1 hover:text-ink">Open Recruitment</a>
            <div class="pt-3 border-t border-stone-200">
                <a href="#oprec" class="block w-full text-center py-2.5 bg-ink text-white text-xs font-bold uppercase tracking-wider">Bergabung</a>
            </div>
        </div>
    </header>

    @php
        $primaryBanner = $banners->first();
    @endphp

    <!-- ================================================================== -->
    <!-- 01. SPLIT HERO SECTION (Kiri: Tipografi Tegas, Kanan: CRUD Banner) -->
    <!-- ================================================================== -->
    <section id="beranda" class="border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 py-14 lg:py-20">
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">

                <!-- Left Editorial Typography & CTA -->
                <div class="lg:col-span-6 space-y-7">
                    <div class="flex items-center gap-3">
                        <span class="h-px w-10 bg-jbz-amber"></span>
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-charcoal">
                            Kabupaten Purwakarta &mdash; Jawa Barat
                        </span>
                    </div>

                    <h1 class="font-serif text-4xl sm:text-5xl lg:text-[3.4rem] leading-[1.08] tracking-tight text-ink">
                        {{ $primaryBanner->title ?? 'Bergerak Bersama Pemuda Purwakarta untuk Kemanusiaan dan Pendidikan.' }}
                    </h1>

                    <p class="text-base sm:text-lg text-jbz-charcoal leading-relaxed max-w-xl">
                        {{ $primaryBanner->subtitle ?? 'Jabar Bergerak Zillenial (JBZ) Kabupaten Purwakarta mewadahi generasi muda yang Aktif, Adaptif, dan Kolaboratif dalam menghadirkan aksi sosial, pendidikan, serta pelestarian lingkungan yang berdampak nyata.' }}
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="{{ $primaryBanner->button_url ?? '#program' }}" class="px-7 py-3.5 bg-ink text-white text-xs font-bold uppercase tracking-[0.14em] hover:bg-jbz-charcoal transition">
                            {{ $primaryBanner->button_text ?? 'Lihat Program Aksi' }}
                        </a>
                        <a href="#oprec" class="px-7 py-3.5 border border-ink text-ink text-xs font-bold uppercase tracking-[0.14em] hover:bg-ink hover:text-white transition">
                            Daftar Relawan
                        </a>
                    </div>

                    <!-- Minimalist Institutional Proof Bar -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-stone-200">
                        <div>
                            <p class="font-serif text-2xl sm:text-3xl font-semibold text-ink">2020</p>
                            <p class="text-[11px] uppercase tracking-wider text-jbz-charcoal mt-1">Berdiri di Jabar</p>
                        </div>
                        <div>
                            <p class="font-serif text-2xl sm:text-3xl font-semibold text-ink">{{ $divisions->count() }}</p>
                            <p class="text-[11px] uppercase tracking-wider text-jbz-charcoal mt-1">Bidang Aktif</p>
                        </div>
                        <div>
                            <p class="font-serif text-2xl sm:text-3xl font-semibold text-ink">{{ $programs->count() }}+</p>
                            <p class="text-[11px] uppercase tracking-wider text-jbz-charcoal mt-1">Program Terdata</p>
                        </div>
                    </div>
                </div>

                <!-- Right Editorial Banner Frame (Dynamic from CRUD Banners) -->
                <div class="lg:col-span-6">
                    <div class="relative border border-stone-300 bg-white p-2.5">
                        @if($primaryBanner && $primaryBanner->image_path)
                            <div class="aspect-[4/3] w-full overflow-hidden bg-stone-100">
                                <img src="{{ asset('storage/' . $primaryBanner->image_path) }}"
                                     alt="{{ $primaryBanner->title }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="aspect-[4/3] w-full bg-stone-100 flex flex-col items-center justify-center p-8 text-center border border-dashed border-stone-300">
                                <p class="font-serif text-xl text-ink">Dokumentasi Aksi Lapangan</p>
                                <p class="text-xs text-jbz-charcoal mt-2 max-w-xs leading-relaxed">
                                    Potret kebersamaan dan aksi kepemudaan Jabar Bergerak Zillenial Kabupaten Purwakarta.
                                </p>
                            </div>
                        @endif

                        <!-- Caption Strip ala Editorial -->
                        <div class="pt-3 px-1 flex items-center justify-between text-[11px] text-jbz-charcoal">
                            <span class="font-semibold uppercase tracking-wider">Semboyan: Kami Muda Siap Aksi</span>
                            <span class="font-medium text-stone-400">Dokumentasi Bidang Media / PDD</span>
                        </div>
                    </div>

                    <!-- Mini Thumbnail Strip jika ada lebih dari 1 Banner di CRUD -->
                    @if($banners->count() > 1)
                        <div class="grid grid-cols-3 gap-3 mt-3">
                            @foreach($banners->skip(1)->take(3) as $subBanner)
                                <div class="border border-stone-200 bg-white p-1.5">
                                    <div class="aspect-[16/10] overflow-hidden bg-stone-100">
                                        <img src="{{ asset('storage/' . $subBanner->image_path) }}"
                                             alt="{{ $subBanner->title }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                    <p class="text-[10px] font-semibold text-jbz-charcoal truncate mt-1.5 px-0.5">{{ $subBanner->title }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
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
                                <span class="text-[11px] font-bold uppercase tracking-wider px-2 py-0.5 border border-stone-200 text-jbz-charcoal group-hover:border-jbz-amber group-hover:text-ink transition">
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
                        <a href="#kabinet" class="text-[11px] font-bold uppercase tracking-wider text-ink underline underline-offset-4 decoration-jbz-amber hover:text-jbz-charcoal">
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
    <section id="program" class="py-20 bg-paper border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 space-y-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200 pb-8">
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
                <button type="button" onclick="filterPrograms('semua')" class="program-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-ink text-white border border-ink transition" data-filter="semua">Semua</button>
                <button type="button" onclick="filterPrograms('Lingkungan')" class="program-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300 hover:border-ink transition" data-filter="Lingkungan">Lingkungan</button>
                <button type="button" onclick="filterPrograms('Kemanusiaan')" class="program-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300 hover:border-ink transition" data-filter="Kemanusiaan">Kemanusiaan</button>
                <button type="button" onclick="filterPrograms('Pendidikan')" class="program-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300 hover:border-ink transition" data-filter="Pendidikan">Pendidikan</button>
                <button type="button" onclick="filterPrograms('Media & Kreatif')" class="program-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300 hover:border-ink transition" data-filter="Media & Kreatif">Media & Kreatif</button>
            </div>

            <div id="programs-grid" class="grid md:grid-cols-2 gap-10">
                @foreach($programs as $program)
                    <article class="program-card group border border-stone-200 bg-white flex flex-col justify-between" data-pillar="{{ $program->pillar }}">
                        <div>
                            <a href="{{ route('program.show', $program->slug) }}" class="block aspect-[16/10] w-full overflow-hidden bg-stone-100 border-b border-stone-200">
                                @if($program->cover_image)
                                    <img src="{{ asset('storage/' . $program->cover_image) }}"
                                         alt="{{ $program->title }}"
                                         class="w-full h-full object-cover group-hover:scale-[1.02] transition duration-500">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-stone-100">
                                        <span class="text-[11px] uppercase tracking-widest text-stone-400 font-bold">{{ $program->pillar }}</span>
                                        <p class="font-serif text-lg text-jbz-charcoal mt-1">{{ $program->title }}</p>
                                    </div>
                                @endif
                            </a>

                            <div class="p-7 space-y-3">
                                <div class="flex flex-wrap items-center justify-between gap-2 text-[11px] font-bold uppercase tracking-wider">
                                    <span class="text-jbz-green">{{ $program->pillar }}</span>
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
                            <span class="px-2.5 py-1 bg-stone-100 text-ink font-bold text-[10px] uppercase tracking-wider">{{ $program->status }}</span>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================================================================== -->
    <!-- 04. RUANG MEDIA & GALERI DOKUMENTASI PDD                           -->
    <!-- ================================================================== -->
    <section id="publikasi" class="py-20 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 space-y-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200 pb-8">
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
                    <article class="flex flex-col justify-between border-b md:border-b-0 border-stone-200 pb-8 md:pb-0">
                        <div class="space-y-4">
                            <a href="{{ route('post.show', $post->slug) }}" class="block aspect-[4/3] w-full overflow-hidden bg-stone-100 border border-stone-200">
                                @if($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}"
                                         alt="{{ $post->title }}"
                                         class="w-full h-full object-cover hover:scale-[1.03] transition duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center p-6 text-center bg-stone-50">
                                        <span class="text-xs font-bold uppercase tracking-widest text-stone-400">{{ $post->type }}</span>
                                    </div>
                                @endif
                            </a>

                            <div class="flex items-center justify-between text-[11px] font-bold uppercase tracking-wider">
                                <span class="text-jbz-cyan">{{ $post->type }}</span>
                                <span class="text-stone-400">{{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : 'Terbaru' }}</span>
                            </div>

                            <h3 class="font-serif text-xl font-semibold text-ink leading-snug">
                                <a href="{{ route('post.show', $post->slug) }}" class="hover:text-jbz-charcoal transition">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <p class="text-sm text-jbz-charcoal leading-relaxed">
                                {{ $post->excerpt }}
                            </p>

                            <div class="pt-1">
                                <a href="{{ route('post.show', $post->slug) }}" class="inline-block text-xs font-bold uppercase tracking-wider text-ink underline underline-offset-4 decoration-jbz-cyan hover:text-jbz-charcoal transition">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>

                        <p class="text-[11px] font-semibold text-stone-500 mt-5 pt-3 border-t border-stone-100">
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
    <section id="kabinet" class="py-20 bg-paper border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 space-y-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200 pb-8">
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
                <button type="button" onclick="filterMembers('semua')" class="member-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-ink text-white border border-ink transition" data-filter="semua">Semua Bidang</button>
                @foreach($divisions as $div)
                    <button type="button" onclick="filterMembers('{{ $div->id }}')" class="member-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300 hover:border-ink transition" data-filter="{{ $div->id }}">
                        {{ $div->short_code ?? $div->name }}
                    </button>
                @endforeach
            </div>

            <div id="members-grid" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($boardMembers as $member)
                    <div class="member-card bg-white border border-stone-200 overflow-hidden flex flex-col justify-between" data-division-id="{{ $member->division_id }}">
                        <div>
                            <div class="aspect-[4/4] w-full bg-stone-100 overflow-hidden border-b border-stone-200">
                                @if($member->photo_path)
                                    <img src="{{ asset('storage/' . $member->photo_path) }}"
                                         alt="{{ $member->full_name }}"
                                         class="w-full h-full object-cover">
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

    <!-- ================================================================== -->
    <!-- 06. OPEN RECRUITMENT & CEK STATUS PENDAFTAR                        -->
    <!-- ================================================================== -->
    <section id="oprec" class="py-20 bg-ink text-white">
        <div class="max-w-7xl mx-auto px-5 sm:px-8">
            <div class="grid lg:grid-cols-12 gap-12 items-start">

                <!-- Left Info + Status Checker -->
                <div class="lg:col-span-5 space-y-8">
                    <div class="space-y-4">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-amber">05 / Open Recruitment</p>
                        <h2 class="font-serif text-3xl sm:text-4xl leading-tight text-white">
                            Turun Tangan Bersama Pemuda Purwakarta.
                        </h2>
                        <p class="text-sm text-stone-300 leading-relaxed">
                            Terbuka bagi pelajar, mahasiswa, dan pemuda Kabupaten Purwakarta yang ingin berkontribusi nyata dalam aksi sosial, pendidikan, lingkungan, dan produksi kreatif media.
                        </p>
                    </div>

                    <!-- Form Cek Status Oprec -->
                    <div class="p-6 border border-stone-700 bg-stone-900/60 space-y-4">
                        <p class="text-xs font-bold uppercase tracking-wider text-jbz-yellow">Cek Status Seleksi Oprec</p>
                        <form action="{{ route('home') }}#oprec" method="GET" class="flex gap-2">
                            <input type="text" name="cek_kode" value="{{ request('cek_kode') }}" placeholder="Masukkan Kode Registrasi (JBZ-PWK-...)" class="flex-1 px-3.5 py-2.5 bg-ink border border-stone-700 text-xs text-white focus:outline-none focus:border-jbz-amber">
                            <button type="submit" class="px-4 py-2.5 bg-jbz-amber text-ink text-xs font-bold uppercase tracking-wider hover:bg-jbz-yellow transition">
                                Cek
                            </button>
                        </form>

                        @if(request()->filled('cek_kode'))
                            @if($checkedApplicant)
                                <div class="p-4 border border-stone-700 bg-ink text-xs space-y-1.5">
                                    <div class="flex items-center justify-between">
                                        <span class="font-mono font-bold text-jbz-amber">{{ $checkedApplicant->registration_code }}</span>
                                        <span class="px-2 py-0.5 bg-jbz-green/20 text-jbz-green font-bold uppercase text-[10px] tracking-wider">{{ $checkedApplicant->status }}</span>
                                    </div>
                                    <p class="font-bold text-sm text-white">{{ $checkedApplicant->full_name }}</p>
                                    <p class="text-stone-400">{{ $checkedApplicant->institution }} &mdash; {{ $checkedApplicant->firstChoiceDivision->name ?? '-' }}</p>
                                </div>
                            @else
                                <p class="text-xs text-rose-400">Kode registrasi atau nama tidak ditemukan di database.</p>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Right Registration Form -->
                <div class="lg:col-span-7 bg-paper text-ink p-7 sm:p-10 border border-stone-700">
                    @if(session('oprec_success'))
                        <div class="mb-6 p-4 border-l-4 border-jbz-green bg-white text-ink text-xs font-bold">
                            {{ session('oprec_success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 p-4 border-l-4 border-rose-600 bg-white text-rose-700 text-xs space-y-1">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('oprec.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 text-xs">
                        @csrf
                        <div class="border-b border-stone-200 pb-4">
                            <h3 class="font-serif text-2xl font-semibold text-ink">Formulir Pendaftaran Anggota & Relawan</h3>
                            <p class="text-jbz-charcoal mt-1">Isi data dengan benar. Berkas akan diverifikasi oleh panitia dan pengurus JBZ Purwakarta.</p>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Nama Lengkap *</label>
                                <input type="text" name="full_name" required class="w-full px-3.5 py-2.5 bg-white border border-stone-300 focus:outline-none focus:border-ink">
                            </div>
                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Kampus / Sekolah / Instansi *</label>
                                <input type="text" name="institution" required class="w-full px-3.5 py-2.5 bg-white border border-stone-300 focus:outline-none focus:border-ink">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Email Aktif *</label>
                                <input type="email" name="email" required class="w-full px-3.5 py-2.5 bg-white border border-stone-300 focus:outline-none focus:border-ink">
                            </div>
                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Nomor WhatsApp *</label>
                                <input type="text" name="whatsapp" required placeholder="08xxxxxxxxxx" class="w-full px-3.5 py-2.5 bg-white border border-stone-300 focus:outline-none focus:border-ink">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Pilihan Bidang 1 *</label>
                                <select name="first_choice_division_id" required class="w-full px-3.5 py-2.5 bg-white border border-stone-300 focus:outline-none focus:border-ink">
                                    @foreach($divisions as $div)
                                        <option value="{{ $div->id }}">{{ $div->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Pilihan Bidang 2</label>
                                <select name="second_choice_division_id" class="w-full px-3.5 py-2.5 bg-white border border-stone-300 focus:outline-none focus:border-ink">
                                    <option value="">-- Opsional --</option>
                                    @foreach($divisions as $div)
                                        <option value="{{ $div->id }}">{{ $div->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Tautan Portofolio / IG</label>
                                <input type="text" name="portfolio_url" placeholder="https://... atau @username" class="w-full px-3.5 py-2.5 bg-white border border-stone-300 focus:outline-none focus:border-ink">
                            </div>
                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Unggah CV / Portofolio (PDF/JPG)</label>
                                <input type="file" name="cv_file" accept=".pdf,.jpg,.jpeg,.png" class="w-full p-2 bg-white border border-stone-300">
                            </div>
                        </div>

                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Motivasi & Gagasan Kontribusi *</label>
                            <textarea name="motivation" rows="3" required class="w-full px-3.5 py-2.5 bg-white border border-stone-300 focus:outline-none focus:border-ink"></textarea>
                        </div>

                        <div class="pt-2 flex items-center justify-between">
                            <span class="text-[11px] font-semibold text-stone-500">Kami Muda Siap Aksi</span>
                            <button type="submit" class="px-7 py-3 bg-ink text-white font-bold uppercase tracking-[0.14em] hover:bg-jbz-charcoal transition">
                                Kirim Pendaftaran
                            </button>
                        </div>
                    </form>
                </div>
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

    <!-- Script Filter Interaktif Client-Side Program & Kabinet -->
    <script>
        function filterPrograms(pillar) {
            document.querySelectorAll('.program-filter-btn').forEach(btn => {
                if (btn.getAttribute('data-filter') === pillar) {
                    btn.className = 'program-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-ink text-white border border-ink transition';
                } else {
                    btn.className = 'program-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300 hover:border-ink transition';
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
                    btn.className = 'member-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-ink text-white border border-ink transition';
                } else {
                    btn.className = 'member-filter-btn px-4 py-2 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300 hover:border-ink transition';
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