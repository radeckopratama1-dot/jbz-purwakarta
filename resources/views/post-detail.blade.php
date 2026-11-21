<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} — Ruang Media JBZ Kabupaten Purwakarta</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-jbz-purwakarta.png') }}">
    <meta name="description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->body), 160) }}">
    <meta property="og:title" content="{{ $post->title }} — JBZ Kabupaten Purwakarta">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->body), 160) }}">
    <meta property="og:image" content="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('images/logo/logo-jbz-purwakarta.png') }}">
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
<body class="bg-paper text-ink antialiased selection:bg-jbz-amber/30 selection:text-ink min-h-screen flex flex-col justify-between overflow-x-hidden">

    @include('partials.motion')

    <!-- Hairline Brand Signature Bar (3 Warna Resmi Logo JBZ) -->
    <div class="h-1 w-full flex">
        <div class="w-1/3 bg-jbz-cyan"></div>
        <div class="w-1/3 bg-jbz-yellow"></div>
        <div class="w-1/3 bg-jbz-green"></div>
    </div>

    <!-- Navigation Bar (Clean Editorial) -->
    <header class="sticky top-0 z-50 bg-paper/95 backdrop-blur border-b border-stone-200/80">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 h-20 flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="h-14 overflow-hidden flex items-center shrink-0">
                <img src="{{ asset('images/logo/logo-jbz-purwakarta.png') }}"
                     alt="Jabar Bergerak Zillenial Kabupaten Purwakarta"
                     class="h-36 sm:h-40 w-auto object-contain">
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-[13px] font-semibold tracking-wide text-jbz-charcoal">
                <a href="{{ route('home') }}#misi" class="hover:text-ink transition">Misi & Bidang</a>
                <a href="{{ route('home') }}#program" class="hover:text-ink transition">Program Aksi</a>
                <a href="{{ route('home') }}#publikasi" class="text-ink font-bold transition">Ruang Media PDD</a>
                <a href="{{ route('home') }}#kabinet" class="hover:text-ink transition">Struktur Kabinet</a>
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

        <!-- Mobile Menu Container -->
        <div id="mobile-nav" class="hidden lg:hidden border-b border-stone-200/80 bg-paper px-6 py-5 space-y-2 text-sm font-semibold text-jbz-charcoal transition-all duration-300">
            <a href="{{ route('home') }}#misi" class="block py-2.5 px-3 rounded-xl hover:bg-stone-100 hover:text-ink transition">Misi & Bidang</a>
            <a href="{{ route('home') }}#program" class="block py-2.5 px-3 rounded-xl hover:bg-stone-100 hover:text-ink transition">Program Aksi</a>
            <a href="{{ route('home') }}#publikasi" class="block py-2.5 px-3 rounded-xl hover:bg-stone-100 text-ink font-bold transition">Ruang Media PDD</a>
            <a href="{{ route('home') }}#kabinet" class="block py-2.5 px-3 rounded-xl hover:bg-stone-100 hover:text-ink transition">Struktur Kabinet</a>
            <div class="pt-3 border-t border-stone-200/80">
                <a href="{{ route('oprec.index') }}" class="block w-full text-center py-2.5 bg-ink text-white text-xs font-bold uppercase tracking-wider rounded-full hover:bg-jbz-charcoal transition-all duration-200">Bergabung</a>
            </div>
        </div>
    </header>

    <!-- Main Detail Content -->
    <main class="flex-1 py-12 sm:py-16">
        <article class="max-w-4xl mx-auto px-5 sm:px-8 space-y-8">

            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs font-semibold tracking-wider text-jbz-charcoal uppercase reveal-fade">
                <a href="{{ route('home') }}" class="hover:text-ink transition">Beranda</a>
                <span class="text-stone-300">/</span>
                <a href="{{ route('home') }}#publikasi" class="hover:text-ink transition">Ruang Media PDD</a>
                <span class="text-stone-300">/</span>
                <span class="text-stone-500 truncate max-w-xs">{{ $post->title }}</span>
            </nav>

            <!-- Metadata Header -->
            <div class="space-y-4 border-b border-stone-200/80 pb-8 reveal-up">
                <div class="flex flex-wrap items-center gap-3 text-xs font-bold uppercase tracking-wider">
                    <span class="px-3.5 py-1 bg-jbz-cyan/15 text-jbz-cyan border border-jbz-cyan/30 rounded-full font-bold text-xs">{{ $post->type }}</span>
                    <span class="text-stone-500 font-semibold">{{ $post->division->name ?? 'Bidang Media & Produksi Visual (PDD)' }}</span>
                </div>

                <h1 class="font-serif text-3xl sm:text-5xl font-semibold text-ink leading-tight">
                    {{ $post->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-y-2 gap-x-6 text-xs text-jbz-charcoal pt-2">
                    <div class="flex items-center gap-1.5">
                        <span class="font-bold text-ink uppercase tracking-wider">Penulis:</span>
                        <span>{{ $post->author_name }}</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="font-bold text-ink uppercase tracking-wider">Terbit:</span>
                        <span>{{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : 'Terbaru' }}</span>
                    </div>
                </div>
            </div>

            <!-- Full Cover / Photo -->
            @if($post->image_path)
                <div class="aspect-[16/9] w-full overflow-hidden rounded-2xl border border-stone-200/80 bg-stone-100 shadow-[0_2px_12px_rgba(28,28,26,0.04)] reveal-up reveal-delay-1">
                    <img src="{{ asset('storage/' . $post->image_path) }}"
                         alt="{{ $post->title }}"
                         class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Excerpt Lead -->
            @if($post->excerpt)
                <div class="border-l-4 border-jbz-cyan pl-5 py-3 bg-white border border-stone-200/80 rounded-r-xl shadow-[0_2px_8px_rgba(28,28,26,0.02)] reveal-up reveal-delay-2">
                    <p class="font-serif text-lg sm:text-xl text-ink italic leading-relaxed">
                        {{ $post->excerpt }}
                    </p>
                </div>
            @endif

            <!-- Full Body Content -->
            <div class="prose prose-stone max-w-none text-ink text-base leading-relaxed space-y-4 pt-4 reveal-up">
                {!! nl2br(e($post->body)) !!}
            </div>

            <!-- Back & Share Section -->
            <div class="pt-8 border-t border-stone-200/80 flex flex-wrap items-center justify-between gap-4 reveal-up">
                <a href="{{ route('home') }}#publikasi" class="w-full sm:w-auto px-6 py-2.5 border border-stone-300 text-ink text-xs font-bold uppercase tracking-wider rounded-full hover:bg-stone-100 hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 text-center">
                    &larr; Kembali ke Ruang Media
                </a>
                <a href="{{ route('home') }}#program" class="w-full sm:w-auto px-6 py-2.5 bg-ink text-white text-xs font-bold uppercase tracking-wider rounded-full hover:bg-jbz-charcoal hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 text-center">
                    Lihat Program Kerja JBZ
                </a>
            </div>

        </article>

        <!-- Bagian Publikasi Lainnya -->
        @if($otherPosts->count() > 0)
            <section class="max-w-7xl mx-auto px-5 sm:px-8 mt-20 pt-16 border-t border-stone-200/80 space-y-8">
                <div class="reveal-up">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-cyan">Arsip Dokumentasi</p>
                    <h2 class="font-serif text-2xl sm:text-3xl text-ink mt-1">Publikasi & Liputan Lainnya</h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($otherPosts as $other)
                        <article class="group border border-stone-200/80 bg-white rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(28,28,26,0.04)] hover:shadow-[0_12px_30px_rgba(28,28,26,0.08)] hover:-translate-y-0.5 transition-all duration-300 flex flex-col justify-between reveal-up reveal-delay-{{ ($loop->index % 3) + 1 }}">
                            <div>
                                <a href="{{ route('post.show', $other->slug) }}" class="block aspect-[4/3] w-full overflow-hidden bg-stone-100 border-b border-stone-200/80">
                                    @if($other->image_path)
                                        <img src="{{ asset('storage/' . $other->image_path) }}"
                                             alt="{{ $other->title }}"
                                             class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-stone-50">
                                            <span class="text-[10px] uppercase tracking-widest text-stone-400 font-bold">{{ $other->type }}</span>
                                        </div>
                                    @endif
                                </a>

                                <div class="p-6 space-y-2">
                                    <div class="flex items-center justify-between text-[10px] font-bold uppercase tracking-wider">
                                        <span class="px-2.5 py-0.5 rounded-full bg-jbz-cyan/15 text-jbz-cyan border border-jbz-cyan/30">{{ $other->type }}</span>
                                        <span class="text-stone-400">{{ $other->published_at ? $other->published_at->translatedFormat('d M Y') : 'Terbaru' }}</span>
                                    </div>
                                    <h3 class="font-serif text-lg font-semibold text-ink leading-snug group-hover:text-jbz-charcoal transition">
                                        <a href="{{ route('post.show', $other->slug) }}">
                                            {{ $other->title }}
                                        </a>
                                    </h3>
                                    <p class="text-xs text-jbz-charcoal leading-relaxed line-clamp-2">
                                        {{ $other->excerpt }}
                                    </p>
                                </div>
                            </div>

                            <div class="px-6 py-3 border-t border-stone-100 flex items-center justify-between text-xs">
                                <a href="{{ route('post.show', $other->slug) }}" class="editorial-link text-ink font-bold uppercase tracking-wider text-[11px] hover:text-jbz-charcoal transition">
                                    Baca Selengkapnya &rarr;
                                </a>
                                <span class="text-stone-400 text-[10px]">Oleh {{ $other->author_name }}</span>
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
