<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $program->title }} — Jabar Bergerak Zillenial Kabupaten Purwakarta</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-jbz-purwakarta.png') }}">
    <meta name="description" content="{{ Str::limit(strip_tags($program->summary ?? $program->content), 160) }}">
    <meta property="og:title" content="{{ $program->title }} — JBZ Kabupaten Purwakarta">
    <meta property="og:description" content="{{ Str::limit(strip_tags($program->summary ?? $program->content), 160) }}">
    <meta property="og:image" content="{{ $program->cover_image ? asset('storage/' . $program->cover_image) : asset('images/logo/logo-jbz-purwakarta.png') }}">
    <meta property="og:type" content="article">
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
<body class="bg-paper text-ink antialiased selection:bg-jbz-amber/30 selection:text-ink min-h-screen flex flex-col justify-between">

    <!-- Hairline Brand Signature Bar (3 Warna Resmi Logo JBZ) -->
    <div class="h-1 w-full flex">
        <div class="w-1/3 bg-jbz-cyan"></div>
        <div class="w-1/3 bg-jbz-yellow"></div>
        <div class="w-1/3 bg-jbz-green"></div>
    </div>

    <!-- Navigation Bar (Clean Editorial) -->
    <header class="sticky top-0 z-50 bg-paper/95 backdrop-blur border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 h-20 flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="h-14 overflow-hidden flex items-center shrink-0">
                <img src="{{ asset('images/logo/logo-jbz-purwakarta.png') }}"
                     alt="Jabar Bergerak Zillenial Kabupaten Purwakarta"
                     class="h-36 sm:h-40 w-auto object-contain">
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-[13px] font-semibold tracking-wide text-jbz-charcoal">
                <a href="{{ route('home') }}#misi" class="hover:text-ink transition">Misi & Bidang</a>
                <a href="{{ route('home') }}#program" class="text-ink font-bold transition">Program Aksi</a>
                <a href="{{ route('home') }}#publikasi" class="hover:text-ink transition">Ruang Media PDD</a>
                <a href="{{ route('home') }}#kabinet" class="hover:text-ink transition">Struktur Kabinet</a>
                <a href="{{ route('home') }}#oprec" class="hover:text-ink transition">Open Recruitment</a>
            </nav>

            <div class="hidden lg:flex items-center">
                <a href="{{ route('home') }}#oprec" class="px-6 py-2.5 bg-ink text-white text-xs font-bold tracking-wider uppercase hover:bg-jbz-charcoal transition">
                    Bergabung
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button type="button" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')" class="lg:hidden p-2 border border-stone-300 text-ink" aria-label="Menu Navigasi">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Menu Container -->
        <div id="mobile-nav" class="hidden lg:hidden border-b border-stone-200 bg-white px-5 py-4 space-y-3 text-sm font-semibold">
            <a href="{{ route('home') }}#misi" class="block py-1 hover:text-jbz-charcoal">Misi & Bidang</a>
            <a href="{{ route('home') }}#program" class="block py-1 text-ink font-bold">Program Aksi</a>
            <a href="{{ route('home') }}#publikasi" class="block py-1 hover:text-jbz-charcoal">Ruang Media PDD</a>
            <a href="{{ route('home') }}#kabinet" class="block py-1 hover:text-jbz-charcoal">Struktur Kabinet</a>
            <a href="{{ route('home') }}#oprec" class="block py-1 text-jbz-amber font-bold">Open Recruitment</a>
        </div>
    </header>

    <!-- Main Detail Content -->
    <main class="flex-1 py-12 sm:py-16">
        <article class="max-w-4xl mx-auto px-5 sm:px-8 space-y-8">

            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs font-semibold tracking-wider text-jbz-charcoal uppercase">
                <a href="{{ route('home') }}" class="hover:text-ink transition">Beranda</a>
                <span class="text-stone-300">/</span>
                <a href="{{ route('home') }}#program" class="hover:text-ink transition">Program Aksi</a>
                <span class="text-stone-300">/</span>
                <span class="text-stone-500 truncate max-w-xs">{{ $program->title }}</span>
            </nav>

            <!-- Metadata Header -->
            <div class="space-y-4 border-b border-stone-200 pb-8">
                <div class="flex flex-wrap items-center gap-3 text-xs font-bold uppercase tracking-wider">
                    <span class="px-3 py-1 bg-jbz-green text-white">{{ $program->pillar }}</span>
                    <span class="px-3 py-1 bg-stone-100 text-ink border border-stone-200">{{ $program->status }}</span>
                    <span class="text-stone-500 font-semibold">{{ $program->division->name ?? 'JBZ Kabupaten Purwakarta' }}</span>
                </div>

                <h1 class="font-serif text-3xl sm:text-5xl font-semibold text-ink leading-tight">
                    {{ $program->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-y-2 gap-x-6 text-xs text-jbz-charcoal pt-2">
                    <div class="flex items-center gap-1.5">
                        <span class="font-bold text-ink uppercase tracking-wider">Lokasi:</span>
                        <span>{{ $program->location }}</span>
                    </div>
                    @if($program->event_date)
                        <div class="flex items-center gap-1.5">
                            <span class="font-bold text-ink uppercase tracking-wider">Tanggal:</span>
                            <span>{{ $program->event_date->translatedFormat('d F Y') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Cover Image (Jika Ada) -->
            @if($program->cover_image)
                <div class="aspect-[16/9] w-full overflow-hidden border border-stone-200 bg-stone-100">
                    <img src="{{ asset('storage/' . $program->cover_image) }}"
                         alt="{{ $program->title }}"
                         class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Summary Highlight -->
            @if($program->summary)
                <div class="border-l-4 border-jbz-green pl-5 py-2 bg-white border border-stone-200">
                    <p class="font-serif text-lg sm:text-xl text-ink italic leading-relaxed">
                        {{ $program->summary }}
                    </p>
                </div>
            @endif

            <!-- Full Body Content -->
            <div class="prose prose-stone max-w-none text-ink text-base leading-relaxed space-y-4 pt-4">
                {!! nl2br(e($program->content ?? $program->summary)) !!}
            </div>

            <!-- Back & Share Section -->
            <div class="pt-8 border-t border-stone-200 flex flex-wrap items-center justify-between gap-4">
                <a href="{{ route('home') }}#program" class="px-5 py-2.5 border border-stone-300 text-ink text-xs font-bold uppercase tracking-wider hover:bg-stone-100 transition">
                    &larr; Kembali ke Daftar Program
                </a>
                <a href="{{ route('home') }}#oprec" class="px-6 py-2.5 bg-ink text-white text-xs font-bold uppercase tracking-wider hover:bg-jbz-charcoal transition">
                    Gabung Jadi Relawan Aksi
                </a>
            </div>

        </article>

        <!-- Bagian Program Lainnya -->
        @if($otherPrograms->count() > 0)
            <section class="max-w-7xl mx-auto px-5 sm:px-8 mt-20 pt-16 border-t border-stone-200 space-y-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-green">Jelajahi Aksi</p>
                    <h2 class="font-serif text-2xl sm:text-3xl text-ink mt-1">Program Aksi Lainnya</h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($otherPrograms as $other)
                        <article class="border border-stone-200 bg-white flex flex-col justify-between">
                            <div>
                                <a href="{{ route('program.show', $other->slug) }}" class="block aspect-[16/10] w-full overflow-hidden bg-stone-100 border-b border-stone-200">
                                    @if($other->cover_image)
                                        <img src="{{ asset('storage/' . $other->cover_image) }}"
                                             alt="{{ $other->title }}"
                                             class="w-full h-full object-cover hover:scale-[1.02] transition duration-500">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-stone-50">
                                            <span class="text-[10px] uppercase tracking-widest text-stone-400 font-bold">{{ $other->pillar }}</span>
                                            <p class="font-serif text-sm text-jbz-charcoal mt-1">{{ $other->title }}</p>
                                        </div>
                                    @endif
                                </a>

                                <div class="p-6 space-y-2">
                                    <div class="flex items-center justify-between text-[10px] font-bold uppercase tracking-wider">
                                        <span class="text-jbz-green">{{ $other->pillar }}</span>
                                        <span class="text-stone-400">{{ $other->event_date ? $other->event_date->translatedFormat('d M Y') : $other->status }}</span>
                                    </div>
                                    <h3 class="font-serif text-lg font-semibold text-ink leading-snug">
                                        <a href="{{ route('program.show', $other->slug) }}" class="hover:text-jbz-charcoal transition">
                                            {{ $other->title }}
                                        </a>
                                    </h3>
                                    <p class="text-xs text-jbz-charcoal leading-relaxed line-clamp-2">
                                        {{ $other->summary }}
                                    </p>
                                </div>
                            </div>

                            <div class="px-6 py-3 border-t border-stone-100 flex items-center justify-between text-xs">
                                <a href="{{ route('program.show', $other->slug) }}" class="text-ink font-bold uppercase tracking-wider text-[11px] underline underline-offset-4 decoration-jbz-green hover:text-jbz-charcoal transition">
                                    Lihat Detail &rarr;
                                </a>
                                <span class="px-2 py-0.5 bg-stone-100 text-ink text-[10px] font-bold uppercase">{{ $other->status }}</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif
    </main>

    <!-- Editorial Footer -->
    <footer class="bg-stone-950 text-stone-400 border-t border-stone-800 py-12 mt-20">
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

</body>
</html>
