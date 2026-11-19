<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Open Recruitment — Jabar Bergerak Zillenial Kabupaten Purwakarta</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-jbz-purwakarta.png') }}">
    <meta name="description" content="Pendaftaran Resmi Open Recruitment Jabar Bergerak Zillenial (JBZ) Kabupaten Purwakarta 2026. Bergabunglah bersama pemuda Purwakarta yang aktif, adaptif, dan kolaboratif.">
    <meta property="og:title" content="Pendaftaran Open Recruitment — JBZ Kabupaten Purwakarta">
    <meta property="og:description" content="Pendaftaran Resmi Open Recruitment Jabar Bergerak Zillenial (JBZ) Kabupaten Purwakarta 2026. Kami Muda Siap Aksi!">
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
<body class="bg-paper text-ink antialiased selection:bg-jbz-amber/30 selection:text-ink min-h-screen flex flex-col justify-between">

    <!-- Hairline Brand Signature Bar (3 Warna Resmi Logo JBZ) -->
    <div class="h-1 w-full flex">
        <div class="w-1/3 bg-jbz-cyan"></div>
        <div class="w-1/3 bg-jbz-yellow"></div>
        <div class="w-1/3 bg-jbz-green"></div>
    </div>

    <!-- Navigation Bar (Clean Editorial, Tanpa Tombol CMS) -->
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
                <a href="{{ route('home') }}#publikasi" class="hover:text-ink transition">Ruang Media PDD</a>
                <a href="{{ route('home') }}#kabinet" class="hover:text-ink transition">Struktur Kabinet</a>
            </nav>

            <div class="hidden lg:flex items-center">
                <a href="{{ route('home') }}" class="px-5 py-2.5 border border-stone-300 text-ink text-xs font-bold tracking-wider uppercase rounded-full hover:bg-stone-100 hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                    &larr; Beranda
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button type="button" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')" class="lg:hidden p-2 border border-stone-300 rounded-xl text-ink hover:bg-stone-100 transition" aria-label="Menu Navigasi">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Menu Container -->
        <div id="mobile-nav" class="hidden lg:hidden border-b border-stone-200/80 bg-white px-5 py-4 space-y-3 text-sm font-semibold">
            <a href="{{ route('home') }}#misi" class="block py-1 hover:text-jbz-charcoal">Misi & Bidang</a>
            <a href="{{ route('home') }}#program" class="block py-1 hover:text-jbz-charcoal">Program Aksi</a>
            <a href="{{ route('home') }}#publikasi" class="block py-1 hover:text-jbz-charcoal">Ruang Media PDD</a>
            <a href="{{ route('home') }}#kabinet" class="block py-1 hover:text-jbz-charcoal">Struktur Kabinet</a>
            <div class="pt-3 border-t border-stone-200/80">
                <a href="{{ route('home') }}" class="block w-full text-center py-2.5 border border-stone-300 text-ink text-xs font-bold uppercase tracking-wider rounded-full hover:bg-stone-100 transition-all duration-200">Ke Beranda Utama</a>
            </div>
        </div>
    </header>

    <main class="flex-1 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 space-y-12">

            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs font-semibold tracking-wider text-jbz-charcoal uppercase">
                <a href="{{ route('home') }}" class="hover:text-ink transition">Beranda</a>
                <span class="text-stone-300">/</span>
                <span class="text-stone-500">Open Recruitment</span>
            </nav>

            <!-- Hero Header Section -->
            <div class="border-b border-stone-200/80 pb-10 space-y-4">
                <div class="flex flex-wrap items-center gap-3 text-xs font-bold uppercase tracking-wider">
                    <span class="px-3.5 py-1 bg-ink text-white font-mono rounded-full text-[11px]">{{ $setting->batch_name }}</span>
                    @if($isOprecOpen)
                        <span class="px-3.5 py-1 bg-jbz-green/15 text-jbz-green border border-jbz-green/30 rounded-full font-bold text-[11px]">Pendaftaran Dibuka</span>
                    @else
                        <span class="px-3.5 py-1 bg-rose-50 text-rose-700 border border-rose-200 rounded-full font-bold text-[11px]">Pendaftaran Ditutup</span>
                    @endif
                    @if($setting->start_date || $setting->end_date)
                        <span class="text-stone-500 font-semibold">
                            Jadwal: {{ $setting->start_date ? $setting->start_date->translatedFormat('d F Y') : '' }}
                            @if($setting->start_date && $setting->end_date) &mdash; @endif
                            {{ $setting->end_date ? $setting->end_date->translatedFormat('d F Y') : '' }}
                        </span>
                    @endif
                </div>

                <h1 class="font-serif text-3xl sm:text-5xl font-semibold text-ink leading-tight max-w-4xl">
                    Turun Tangan dan Siap Aksi Bersama Pemuda Purwakarta.
                </h1>

                <p class="text-sm sm:text-base text-jbz-charcoal max-w-3xl leading-relaxed">
                    Wadah kepemimpinan, kepedulian sosial, dan aksi nyata generasi zillenial Kabupaten Purwakarta. Bergabunglah bersama kami di bidang kemanusiaan, pendidikan, pelestarian lingkungan, hubungan kemitraan, dan produksi visual media.
                </p>
            </div>

            <!-- Timeline Tahapan Seleksi Oprec -->
            @php
                $timeline = $setting->parsedTimeline();
            @endphp
            @if(count($timeline) > 0)
                <section class="p-6 sm:p-8 bg-white border border-stone-200/80 rounded-2xl shadow-[0_2px_12px_rgba(28,28,26,0.04)] space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 border-b border-stone-100 pb-4">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-jbz-amber">Tahapan Seleksi</p>
                            <h2 class="font-serif text-2xl font-semibold text-ink mt-1">Timeline Pendaftaran & Verifikasi</h2>
                        </div>
                        <p class="text-xs text-stone-500">Jadwal resmi dapat berubah sesuai arahan panitia seleksi JBZ Purwakarta.</p>
                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($timeline as $index => $item)
                            <div class="p-5 bg-paper border border-stone-200/80 rounded-xl flex flex-col justify-between space-y-3 shadow-[0_1px_4px_rgba(28,28,26,0.02)] hover:shadow-[0_4px_12px_rgba(28,28,26,0.05)] hover:-translate-y-0.5 transition-all duration-200">
                                <div class="space-y-1">
                                    <span class="inline-block px-2.5 py-0.5 bg-ink text-white font-mono text-[10px] font-bold rounded-full">Tahap 0{{ $index + 1 }}</span>
                                    <p class="text-xs font-bold text-jbz-charcoal uppercase tracking-wider pt-1">{{ $item['date'] }}</p>
                                </div>
                                <p class="font-serif text-base font-semibold text-ink leading-snug">
                                    {{ $item['title'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Kondisi Buka vs Tutup Pendaftaran -->
            @if($isOprecOpen)
                <!-- ============================================================== -->
                <!-- FORMULIR PENDAFTARAN & KOTAK CEK STATUS (SAAT DIBUKA)          -->
                <!-- ============================================================== -->
                <div class="grid lg:grid-cols-12 gap-10 items-start">

                    <!-- Kolom Kiri: Panduan & Cek Status Registrasi -->
                    <div class="lg:col-span-5 space-y-8">

                        <!-- Kotak Cek Status Seleksi Oprec -->
                        <div class="p-6 bg-ink text-white border border-stone-800 rounded-2xl shadow-[0_2px_12px_rgba(28,28,26,0.06)] space-y-4">
                            <div class="space-y-1">
                                <p class="text-xs font-bold uppercase tracking-wider text-jbz-yellow">Cek Status Seleksi Oprec</p>
                                <p class="text-xs text-stone-300">Masukkan kode registrasi unik kamu untuk mengecek hasil seleksi berkala.</p>
                            </div>

                            <form action="{{ route('oprec.index') }}" method="GET" class="flex gap-2">
                                <input type="text"
                                       name="cek_kode"
                                       value="{{ request('cek_kode') }}"
                                       placeholder="Kode Registrasi (JBZ-PWK-...)"
                                       required
                                       class="flex-1 px-4 py-2.5 bg-stone-900 border border-stone-700 rounded-xl text-xs text-white placeholder-stone-500 focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber transition">
                                <button type="submit" class="px-5 py-2.5 bg-jbz-amber text-ink text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-jbz-yellow hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                                    Cek
                                </button>
                            </form>

                            @if(request()->filled('cek_kode'))
                                @if($checkedApplicant)
                                    <div class="p-4 border border-stone-700 bg-stone-900/90 rounded-xl text-xs space-y-2">
                                        <div class="flex items-center justify-between">
                                            <span class="font-mono font-bold text-jbz-amber text-sm">{{ $checkedApplicant->registration_code }}</span>
                                            <span class="px-2.5 py-0.5 bg-jbz-green/20 text-jbz-green border border-jbz-green/30 rounded-full font-bold uppercase text-[10px] tracking-wider">{{ $checkedApplicant->status }}</span>
                                        </div>
                                        <p class="font-bold text-sm text-white">{{ $checkedApplicant->full_name }}</p>
                                        <p class="text-stone-300">{{ $checkedApplicant->institution }} &mdash; {{ $checkedApplicant->firstChoiceDivision->name ?? '-' }}</p>
                                        <p class="text-[11px] text-stone-400 pt-1 border-t border-stone-800">
                                            Perkembangan tahap seleksi dan tautan grup WhatsApp juga kami kirimkan ke email: <strong>{{ $checkedApplicant->email }}</strong>
                                        </p>
                                    </div>
                                @else
                                    <div class="p-3 bg-rose-950/60 border border-rose-800 rounded-xl text-xs text-rose-300">
                                        Kode registrasi atau nama tidak ditemukan di sistem pendaftaran kami. Mohon pastikan kembali kode yang kamu masukkan.
                                    </div>
                                @endif
                                <script>
                                    if (window.history.replaceState) {
                                        window.history.replaceState(null, '', window.location.pathname);
                                    }
                                </script>
                            @endif
                        </div>

                        <!-- Info Bidang JBZ Purwakarta -->
                        <div class="p-6 bg-white border border-stone-200/80 rounded-2xl shadow-[0_2px_12px_rgba(28,28,26,0.04)] space-y-4">
                            <h3 class="font-serif text-lg font-semibold text-ink border-b border-stone-100 pb-2">5 Bidang Pengabdian JBZ Purwakarta</h3>
                            <ul class="space-y-3 text-xs text-jbz-charcoal">
                                <li>
                                    <strong class="text-ink block">1. Badan Pengurus Harian (BPH)</strong>
                                    Tata kelola internal organisasi, kesekretariatan resmi, dan manajemen kebendaharaan.
                                </li>
                                <li>
                                    <strong class="text-ink block">2. Bidang Media & Produksi Visual (PDD)</strong>
                                    Desain grafis, produksi video aksi, liputan kegiatan lapangan, dan arsip digital.
                                </li>
                                <li>
                                    <strong class="text-ink block">3. Bidang Pendidikan</strong>
                                    Pemberantasan buta aksara, aksi mengajar di pelosok Purwakarta, dan seminar pemuda.
                                </li>
                                <li>
                                    <strong class="text-ink block">4. Bidang Kemanusiaan & Lingkungan</strong>
                                    Gerakan kepedulian lansia, tanggap darurat sosial, dan aksi konservasi alam Jatiluhur.
                                </li>
                                <li>
                                    <strong class="text-ink block">5. Bidang Hubungan Eksternal & Kemitraan</strong>
                                    Sinergi strategis bersama instansi pemerintah daerah, komunitas, dan civitas akademika.
                                </li>
                            </ul>
                        </div>

                    </div>

                    <!-- Kolom Kanan: Formulir Registrasi Oprec Lengkap -->
                    <div class="lg:col-span-7 bg-white p-7 sm:p-10 border border-stone-200/80 rounded-2xl shadow-[0_2px_12px_rgba(28,28,26,0.04)] hover:shadow-[0_12px_30px_rgba(28,28,26,0.08)] transition-all duration-300 space-y-6">

                        <!-- Notifikasi Sukses Pendaftaran -->
                        @if(session('oprec_success'))
                            <div class="p-4 border-l-4 border-jbz-green bg-paper border border-stone-200/80 rounded-xl text-ink text-xs font-bold leading-relaxed">
                                {{ session('oprec_success') }}
                            </div>
                        @endif

                        @if(session('oprec_closed'))
                            <div class="p-4 border-l-4 border-rose-600 bg-paper border border-stone-200/80 rounded-xl text-rose-700 text-xs font-bold">
                                {{ session('oprec_closed') }}
                            </div>
                        @endif

                        <!-- Notifikasi Error Validasi -->
                        @if(isset($errors) && $errors->any())
                            <div class="p-4 border-l-4 border-rose-600 bg-paper border border-stone-200/80 rounded-xl text-rose-700 text-xs space-y-1">
                                <p class="font-bold uppercase tracking-wider">Mohon perbaiki data inputan berikut:</p>
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="border-b border-stone-200/80 pb-4">
                            <h2 class="font-serif text-2xl font-semibold text-ink">Formulir Pendaftaran Calon Pengurus</h2>
                            <p class="text-xs text-jbz-charcoal mt-1">Lengkapi data diri dengan benar. Bukti pendaftaran dan kode registrasi akan otomatis dikirimkan ke alamat email kamu.</p>
                        </div>

                        <form action="{{ route('oprec.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 text-xs">
                            @csrf

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Nama Lengkap *</label>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}" required class="w-full px-4 py-2.5 bg-paper border border-stone-300 rounded-xl text-ink focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber focus:bg-white transition" placeholder="Sesuai kartu identitas">
                                </div>
                                <div>
                                    <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Kampus / Sekolah / Instansi *</label>
                                    <input type="text" name="institution" value="{{ old('institution') }}" required class="w-full px-4 py-2.5 bg-paper border border-stone-300 rounded-xl text-ink focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber focus:bg-white transition" placeholder="Nama sekolah / universitas">
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Alamat Email Aktif *</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2.5 bg-paper border border-stone-300 rounded-xl text-ink focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber focus:bg-white transition" placeholder="nama@email.com">
                                </div>
                                <div>
                                    <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Nomor WhatsApp *</label>
                                    <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" required placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 bg-paper border border-stone-300 rounded-xl text-ink focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber focus:bg-white transition">
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Pilihan Bidang Utama (1) *</label>
                                    <select name="first_choice_division_id" required class="w-full px-4 py-2.5 bg-paper border border-stone-300 rounded-xl text-ink focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber focus:bg-white transition">
                                        <option value="">-- Pilih Bidang Pilihan 1 --</option>
                                        @foreach($divisions as $div)
                                            <option value="{{ $div->id }}" @selected(old('first_choice_division_id') == $div->id)>{{ $div->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Pilihan Bidang Kedua (2)</label>
                                    <select name="second_choice_division_id" class="w-full px-4 py-2.5 bg-paper border border-stone-300 rounded-xl text-ink focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber focus:bg-white transition">
                                        <option value="">-- Opsional (Pilihan Alternatif) --</option>
                                        @foreach($divisions as $div)
                                            <option value="{{ $div->id }}" @selected(old('second_choice_division_id') == $div->id)>{{ $div->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Tautan Portofolio / Media Sosial</label>
                                    <input type="text" name="portfolio_url" value="{{ old('portfolio_url') }}" placeholder="https://... atau @username IG" class="w-full px-4 py-2.5 bg-paper border border-stone-300 rounded-xl text-ink focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber focus:bg-white transition">
                                </div>
                                <div>
                                    <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Unggah Berkas CV / Portofolio (PDF/JPG)</label>
                                    <input type="file" name="cv_file" accept=".pdf,.jpg,.jpeg,.png" class="w-full p-2 bg-paper border border-stone-300 rounded-xl text-xs file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-stone-200 file:text-ink hover:file:bg-stone-300 transition">
                                </div>
                            </div>

                            <div>
                                <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Motivasi & Gagasan Kontribusi untuk Purwakarta *</label>
                                <textarea name="motivation" rows="4" required class="w-full px-4 py-2.5 bg-paper border border-stone-300 rounded-xl text-ink focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber focus:bg-white transition" placeholder="Ceritakan motivasi dan gagasan yang ingin kamu wujudkan bersama JBZ Purwakarta...">{{ old('motivation') }}</textarea>
                            </div>

                            <div class="pt-3 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-t border-stone-100">
                                <span class="text-[11px] font-semibold text-stone-500">Semboyan: Kami Muda Siap Aksi</span>
                                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-ink text-white font-bold uppercase tracking-[0.16em] rounded-full hover:bg-jbz-charcoal hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 text-center">
                                    Kirim Pendaftaran Resmi
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            @else
                <!-- ============================================================== -->
                <!-- PENGUMUMAN SAAT PENDAFTARAN DITUTUP                            -->
                <!-- ============================================================== -->
                <div class="max-w-4xl mx-auto space-y-10">

                    <!-- Kartu Penutupan Editorial -->
                    <div class="p-8 sm:p-12 bg-white border border-stone-200/80 rounded-2xl shadow-[0_2px_12px_rgba(28,28,26,0.04)] text-center space-y-6">
                        <div class="inline-block px-3.5 py-1 bg-rose-50 text-rose-700 border border-rose-200 text-xs font-bold uppercase tracking-wider rounded-full">
                            Pemberitahuan Resmi
                        </div>

                        <h2 class="font-serif text-3xl sm:text-4xl font-semibold text-ink leading-snug">
                            Pendaftaran Open Recruitment Periode Ini Telah Ditutup
                        </h2>

                        <p class="text-sm sm:text-base text-jbz-charcoal max-w-2xl mx-auto leading-relaxed">
                            {{ $setting->closed_message ?? 'Pendaftaran Open Recruitment JBZ Kabupaten Purwakarta saat ini telah ditutup. Terima kasih atas antusiasme kamu, sampai bertemu di kegiatan kolaborasi dan open recruitment JBZ selanjutnya!' }}
                        </p>

                        <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                            <a href="{{ route('home') }}" class="px-7 py-3 bg-ink text-white text-xs font-bold uppercase tracking-wider rounded-full hover:bg-jbz-charcoal hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                                Kembali ke Beranda
                            </a>
                            <a href="{{ route('home') }}#program" class="px-7 py-3 border border-stone-300 text-ink text-xs font-bold uppercase tracking-wider rounded-full hover:bg-stone-100 hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                                Lihat Program Kerja & Aksi
                            </a>
                        </div>
                    </div>

                    <!-- Kotak Cek Status Seleksi Pendaftar Berjalan -->
                    <div class="p-8 bg-ink text-white border border-stone-800 rounded-2xl shadow-[0_2px_12px_rgba(28,28,26,0.06)] space-y-4 max-w-2xl mx-auto">
                        <div class="space-y-1">
                            <p class="text-xs font-bold uppercase tracking-wider text-jbz-yellow">Cek Status Hasil Seleksi Oprec</p>
                            <p class="text-xs text-stone-300">Bagi calon anggota yang telah mendaftar pada periode ini, kamu tetap dapat mengecek perkembangan status kelulusan di bawah ini.</p>
                        </div>

                        <form action="{{ route('oprec.index') }}" method="GET" class="flex gap-2">
                            <input type="text"
                                   name="cek_kode"
                                   value="{{ request('cek_kode') }}"
                                   placeholder="Masukkan Kode Registrasi (JBZ-PWK-...)"
                                   required
                                   class="flex-1 px-4 py-2.5 bg-stone-900 border border-stone-700 rounded-xl text-xs text-white placeholder-stone-500 focus:outline-none focus:ring-2 focus:ring-jbz-amber/30 focus:border-jbz-amber transition">
                            <button type="submit" class="px-5 py-2.5 bg-jbz-amber text-ink text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-jbz-yellow hover:-translate-y-0.5 hover:shadow-md transition-all duration-200">
                                Cek Status
                            </button>
                        </form>

                        @if(request()->filled('cek_kode'))
                            @if($checkedApplicant)
                                <div class="p-4 border border-stone-700 bg-stone-900/90 rounded-xl text-xs space-y-2 mt-4">
                                    <div class="flex items-center justify-between">
                                        <span class="font-mono font-bold text-jbz-amber text-sm">{{ $checkedApplicant->registration_code }}</span>
                                        <span class="px-2.5 py-0.5 bg-jbz-green/20 text-jbz-green border border-jbz-green/30 rounded-full font-bold uppercase text-[10px] tracking-wider">{{ $checkedApplicant->status }}</span>
                                    </div>
                                    <p class="font-bold text-sm text-white">{{ $checkedApplicant->full_name }}</p>
                                    <p class="text-stone-300">{{ $checkedApplicant->institution }} &mdash; {{ $checkedApplicant->firstChoiceDivision->name ?? '-' }}</p>
                                    <p class="text-[11px] text-stone-400 pt-1 border-t border-stone-800">
                                        Detail instruksi dan pengumuman tahapan seleksi juga telah dikirimkan ke email: <strong>{{ $checkedApplicant->email }}</strong>
                                    </p>
                                </div>
                            @else
                                <div class="p-3 bg-rose-950/60 border border-rose-800 rounded-xl text-xs text-rose-300 mt-4">
                                    Kode registrasi tidak ditemukan di database kami. Silakan periksa kembali kode kamu.
                                </div>
                            @endif
                            <script>
                                if (window.history.replaceState) {
                                    window.history.replaceState(null, '', window.location.pathname);
                                }
                            </script>
                        @endif
                    </div>

                </div>
            @endif

        </div>
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
