<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Panel CMS — JBZ Kabupaten Purwakarta</title>
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
<body class="bg-paper text-ink min-h-screen antialiased flex flex-col justify-between selection:bg-jbz-amber/30 selection:text-ink">

    <!-- Hairline Brand Signature Bar -->
    <div class="h-1 w-full flex">
        <div class="w-1/3 bg-jbz-cyan"></div>
        <div class="w-1/3 bg-jbz-yellow"></div>
        <div class="w-1/3 bg-jbz-green"></div>
    </div>

    <!-- Header Sederhana -->
    <header class="py-6 px-5 sm:px-8 border-b border-stone-200 bg-white/70 backdrop-blur">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}" class="inline-block">
                <img src="{{ asset('images/logo/logo-jbz-purwakarta.png') }}"
                     alt="JBZ Kabupaten Purwakarta"
                     class="h-9 sm:h-10 w-auto object-contain">
            </a>
            <a href="{{ route('home') }}" class="text-xs font-bold uppercase tracking-wider text-jbz-charcoal hover:text-ink transition">
                Kembali ke Website Publik &rarr;
            </a>
        </div>
    </header>

    <!-- Area Konten Login -->
    <main class="flex-1 flex items-center justify-center px-5 py-12">
        <div class="w-full max-w-md">

            <!-- Pesan Sukses / Flash -->
            @if(session('success'))
                <div class="mb-6 p-4 border-l-4 border-jbz-green bg-white border border-stone-200 text-xs font-semibold text-ink">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Pesan Error Validasi Global -->
            @if(isset($errors) && $errors->any())
                <div class="mb-6 p-4 border-l-4 border-rose-600 bg-white border border-stone-200 text-xs text-rose-700 space-y-1">
                    <p class="font-bold uppercase tracking-wider">Gagal Masuk:</p>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Kartu Login Presisi -->
            <div class="bg-white border border-stone-300 p-8 sm:p-10 shadow-sm">
                <div class="mb-8">
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-jbz-charcoal mb-2">Panel Administrasi</p>
                    <h1 class="font-serif text-3xl font-semibold text-ink leading-tight">Masuk ke Panel CMS</h1>
                    <p class="text-xs text-stone-500 mt-2 leading-relaxed">
                        Silakan masukkan kredensial akun pengurus untuk mengelola konten dan pendaftar JBZ Kabupaten Purwakarta.
                    </p>
                </div>

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-jbz-charcoal mb-2">
                            Alamat Email
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="email"
                               class="w-full px-3.5 py-2.5 bg-paper border border-stone-300 text-sm text-ink focus:outline-none focus:border-ink focus:bg-white transition"
                               placeholder="admin@jbzpurwakarta.org">
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-jbz-charcoal">
                                Kata Sandi
                            </label>
                        </div>
                        <input type="password"
                               id="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               class="w-full px-3.5 py-2.5 bg-paper border border-stone-300 text-sm text-ink focus:outline-none focus:border-ink focus:bg-white transition"
                               placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input type="checkbox"
                                   name="remember"
                                   id="remember"
                                   class="h-4 w-4 rounded-none border-stone-300 text-ink focus:ring-0 focus:ring-offset-0">
                            <span class="text-xs text-jbz-charcoal font-medium">Ingat saya</span>
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                                class="w-full py-3 bg-ink text-white text-xs font-bold uppercase tracking-[0.16em] hover:bg-jbz-charcoal transition text-center">
                            Masuk ke Panel CMS
                        </button>
                    </div>
                </form>
            </div>

            <!-- Catatan Pengamanan -->
            <div class="mt-6 text-center">
                <p class="text-[11px] text-stone-500">
                    Akses terbatas hanya untuk Badan Pengurus Harian & Bidang Media JBZ Purwakarta.
                </p>
            </div>

        </div>
    </main>

    <!-- Footer Editorial -->
    <footer class="py-6 border-t border-stone-200 bg-white text-center text-xs text-stone-500">
        <p>&copy; {{ date('Y') }} Jabar Bergerak Zillenial Kabupaten Purwakarta &mdash; Bidang Media & Produksi Visual.</p>
    </footer>

</body>
</html>
