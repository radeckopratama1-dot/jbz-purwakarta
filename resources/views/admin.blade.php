<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CMS — JBZ Kabupaten Purwakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
<body class="bg-paper text-ink min-h-screen antialiased">

    <!-- Hairline Brand Signature Bar -->
    <div class="h-1 w-full flex">
        <div class="w-1/3 bg-jbz-cyan"></div>
        <div class="w-1/3 bg-jbz-yellow"></div>
        <div class="w-1/3 bg-jbz-green"></div>
    </div>

    <!-- Top Admin Header -->
    <header class="bg-white border-b border-stone-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 h-20 flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo/logo-jbz-purwakarta.png') }}"
                     alt="JBZ Kabupaten Purwakarta"
                     class="h-10 w-auto object-contain">
                <span class="hidden sm:inline-block h-6 w-px bg-stone-300"></span>
                <div class="hidden sm:block">
                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-ink">Content Management System</p>
                    <p class="text-[11px] text-jbz-charcoal">Panel Manajemen Media, Kabinet, Program & Oprec</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                @auth
                    <div class="hidden md:flex flex-col text-right">
                        <span class="text-xs font-bold text-ink">{{ auth()->user()->name }}</span>
                        <span class="text-[10px] text-stone-500 font-mono">{{ auth()->user()->email }}</span>
                    </div>
                    <span class="hidden md:inline-block h-6 w-px bg-stone-300"></span>
                @endauth
                <a href="{{ route('home') }}" class="px-4 py-2 border border-stone-300 text-ink text-xs font-bold uppercase tracking-wider hover:bg-stone-100 transition">
                    Lihat Website Publik
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-ink text-white text-xs font-bold uppercase tracking-wider hover:bg-rose-700 transition">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-5 sm:px-8 py-10 space-y-8">

        <!-- Notifikasi Sukses / Validasi -->
        @if(session('success'))
            <div class="p-4 border-l-4 border-jbz-green bg-white border border-stone-200 text-xs font-bold text-ink">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 border-l-4 border-rose-600 bg-white border border-stone-200 text-xs text-rose-700 space-y-1">
                <p class="font-bold uppercase tracking-wider">Mohon periksa kembali inputan:</p>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Ringkasan Statistik Database -->
        <div class="grid grid-cols-2 md:grid-cols-5 border border-stone-200 bg-white divide-y md:divide-y-0 md:divide-x divide-stone-200">
            <div class="p-5">
                <p class="text-[10px] font-bold uppercase tracking-widest text-stone-400">Banner Beranda</p>
                <p class="font-serif text-3xl font-semibold text-ink mt-1">{{ $banners->count() }}</p>
            </div>
            <div class="p-5">
                <p class="text-[10px] font-bold uppercase tracking-widest text-stone-400">Pengurus Kabinet</p>
                <p class="font-serif text-3xl font-semibold text-ink mt-1">{{ $boardMembers->count() }}</p>
            </div>
            <div class="p-5">
                <p class="text-[10px] font-bold uppercase tracking-widest text-stone-400">Program Kerja</p>
                <p class="font-serif text-3xl font-semibold text-ink mt-1">{{ $programs->count() }}</p>
            </div>
            <div class="p-5">
                <p class="text-[10px] font-bold uppercase tracking-widest text-stone-400">Berita & Galeri</p>
                <p class="font-serif text-3xl font-semibold text-ink mt-1">{{ $posts->count() }}</p>
            </div>
            <div class="p-5">
                <p class="text-[10px] font-bold uppercase tracking-widest text-stone-400">Pendaftar Oprec</p>
                <p class="font-serif text-3xl font-semibold text-jbz-amber mt-1">{{ $applicants->count() }}</p>
            </div>
        </div>

        <!-- Navigasi Tab CRUD -->
        <div class="flex flex-wrap gap-2 border-b border-stone-200 pb-4">
            <button type="button" onclick="openTab('tab-banner')" id="btn-tab-banner" class="tab-btn px-4 py-2.5 text-xs font-bold uppercase tracking-wider bg-ink text-white">
                01 / Banner Beranda
            </button>
            <button type="button" onclick="openTab('tab-pengurus')" id="btn-tab-pengurus" class="tab-btn px-4 py-2.5 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300">
                02 / Pengurus Kabinet
            </button>
            <button type="button" onclick="openTab('tab-program')" id="btn-tab-program" class="tab-btn px-4 py-2.5 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300">
                03 / Program Kerja
            </button>
            <button type="button" onclick="openTab('tab-galeri')" id="btn-tab-galeri" class="tab-btn px-4 py-2.5 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300">
                04 / Berita & Galeri PDD
            </button>
            <button type="button" onclick="openTab('tab-oprec')" id="btn-tab-oprec" class="tab-btn px-4 py-2.5 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300">
                05 / Pendaftar Oprec ({{ $applicants->count() }})
            </button>
        </div>

        <!-- ========================================================= -->
        <!-- TAB 1: CRUD BANNER BERANDA                                -->
        <!-- ========================================================= -->
        <section id="tab-banner" class="tab-panel grid lg:grid-cols-12 gap-8">
            <div class="lg:col-span-5 bg-white p-6 border border-stone-200 space-y-5 h-fit">
                <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Unggah Banner Beranda</h2>
                <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                    @csrf
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Judul Utama *</label>
                        <input type="text" name="title" required placeholder="Contoh: Bergerak Bersama Pemuda Purwakarta" class="w-full px-3.5 py-2.5 border border-stone-300 focus:outline-none focus:border-ink">
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Subjudul / Narasi Singkat</label>
                        <textarea name="subtitle" rows="2" placeholder="Narasi singkat di bawah judul..." class="w-full px-3.5 py-2.5 border border-stone-300 focus:outline-none focus:border-ink"></textarea>
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">File Foto Banner * (JPG/PNG/WEBP)</label>
                        <input type="file" name="image" accept="image/*" required class="w-full p-2 border border-stone-300 bg-paper">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Teks Tombol</label>
                            <input type="text" name="button_text" placeholder="Lihat Program" class="w-full px-3 py-2 border border-stone-300">
                        </div>
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Link Tombol</label>
                            <input type="text" name="button_url" placeholder="#program" class="w-full px-3 py-2 border border-stone-300">
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3 bg-ink text-white font-bold uppercase tracking-wider hover:bg-jbz-charcoal transition">
                        Simpan & Tayangkan Banner
                    </button>
                </form>
            </div>

            <div class="lg:col-span-7 bg-white p-6 border border-stone-200 space-y-4">
                <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Daftar Banner Terpasang</h2>
                @forelse($banners as $banner)
                    <div class="p-4 bg-paper border border-stone-200 space-y-3">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}" class="w-24 h-16 object-cover border border-stone-300 shrink-0">
                                <div>
                                    <p class="font-serif text-base font-semibold text-ink">{{ $banner->title }}</p>
                                    <p class="text-xs text-jbz-charcoal mt-0.5">{{ $banner->subtitle }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <button type="button" onclick="toggleEdit('edit-banner-{{ $banner->id }}')" class="px-3 py-1.5 border border-stone-300 bg-white text-ink text-[11px] font-bold uppercase">Edit</button>
                                <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" onsubmit="return confirm('Hapus banner ini beserta fotonya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-rose-600 text-white text-[11px] font-bold uppercase">Hapus</button>
                                </form>
                            </div>
                        </div>

                        <form id="edit-banner-{{ $banner->id }}" action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data" class="hidden pt-4 border-t border-stone-200 grid sm:grid-cols-2 gap-3 text-xs">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block font-bold mb-1">Judul</label>
                                <input type="text" name="title" value="{{ $banner->title }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Subjudul</label>
                                <input type="text" name="subtitle" value="{{ $banner->subtitle }}" class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Ganti Foto (Opsional)</label>
                                <input type="file" name="image" accept="image/*" class="w-full p-1.5 border border-stone-300 bg-white">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="w-full py-2.5 bg-ink text-white font-bold uppercase tracking-wider">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                @empty
                    <p class="text-xs text-jbz-charcoal">Belum ada foto banner yang diunggah.</p>
                @endforelse
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- TAB 2: CRUD PENGURUS KABINET                              -->
        <!-- ========================================================= -->
        <section id="tab-pengurus" class="tab-panel hidden grid lg:grid-cols-12 gap-8">
            <div class="lg:col-span-5 bg-white p-6 border border-stone-200 space-y-5 h-fit">
                <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Tambah Pengurus Kabinet</h2>
                <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                    @csrf
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Bidang *</label>
                        <select name="division_id" required class="w-full px-3.5 py-2.5 border border-stone-300 bg-white">
                            @foreach($divisions as $div)
                                <option value="{{ $div->id }}">{{ $div->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Nama Lengkap *</label>
                        <input type="text" name="full_name" required class="w-full px-3.5 py-2.5 border border-stone-300">
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Jabatan *</label>
                        <input type="text" name="role_title" required class="w-full px-3.5 py-2.5 border border-stone-300">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Kampus / Sekolah</label>
                            <input type="text" name="institution" class="w-full px-3 py-2 border border-stone-300">
                        </div>
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Instagram</label>
                            <input type="text" name="instagram_handle" placeholder="@username" class="w-full px-3 py-2 border border-stone-300">
                        </div>
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Foto Pengurus</label>
                        <input type="file" name="photo" accept="image/*" class="w-full p-2 border border-stone-300 bg-paper">
                    </div>
                    <button type="submit" class="w-full py-3 bg-ink text-white font-bold uppercase tracking-wider hover:bg-jbz-charcoal transition">
                        Simpan Pengurus
                    </button>
                </form>
            </div>

            <div class="lg:col-span-7 bg-white p-6 border border-stone-200 space-y-4">
                <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Daftar Pengurus Kabinet</h2>
                @foreach($boardMembers as $member)
                    <div class="p-4 bg-paper border border-stone-200 space-y-3">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                @if($member->photo_path)
                                    <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->full_name }}" class="w-14 h-14 object-cover border border-stone-300 shrink-0">
                                @else
                                    <div class="w-14 h-14 bg-stone-200 text-ink font-serif text-lg flex items-center justify-center shrink-0">
                                        {{ strtoupper(substr($member->full_name, 0, 2)) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-jbz-amber">{{ $member->division->name ?? 'Bidang' }}</p>
                                    <p class="font-serif text-base font-semibold text-ink">{{ $member->full_name }}</p>
                                    <p class="text-xs text-jbz-charcoal">{{ $member->role_title }} &mdash; {{ $member->institution }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <button type="button" onclick="toggleEdit('edit-member-{{ $member->id }}')" class="px-3 py-1.5 border border-stone-300 bg-white text-ink text-[11px] font-bold uppercase">Edit / Foto</button>
                                <form action="{{ route('admin.members.destroy', $member) }}" method="POST" onsubmit="return confirm('Hapus pengurus ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-rose-600 text-white text-[11px] font-bold uppercase">Hapus</button>
                                </form>
                            </div>
                        </div>

                        <form id="edit-member-{{ $member->id }}" action="{{ route('admin.members.update', $member) }}" method="POST" enctype="multipart/form-data" class="hidden pt-4 border-t border-stone-200 grid sm:grid-cols-2 gap-3 text-xs">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block font-bold mb-1">Bidang</label>
                                <select name="division_id" class="w-full px-3 py-2 border border-stone-300 bg-white">
                                    @foreach($divisions as $div)
                                        <option value="{{ $div->id }}" @selected($member->division_id == $div->id)>{{ $div->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Nama Lengkap</label>
                                <input type="text" name="full_name" value="{{ $member->full_name }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Jabatan</label>
                                <input type="text" name="role_title" value="{{ $member->role_title }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Upload / Ganti Foto</label>
                                <input type="file" name="photo" accept="image/*" class="w-full p-1.5 border border-stone-300 bg-white">
                            </div>
                            <div class="sm:col-span-2">
                                <button type="submit" class="w-full py-2.5 bg-ink text-white font-bold uppercase tracking-wider">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- TAB 3: CRUD PROGRAM KERJA                                 -->
        <!-- ========================================================= -->
        <section id="tab-program" class="tab-panel hidden grid lg:grid-cols-12 gap-8">
            <div class="lg:col-span-5 bg-white p-6 border border-stone-200 space-y-5 h-fit">
                <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Tambah Program Kerja</h2>
                <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                    @csrf
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Nama Program *</label>
                        <input type="text" name="title" required class="w-full px-3.5 py-2.5 border border-stone-300">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Bidang</label>
                            <select name="division_id" class="w-full px-3 py-2 border border-stone-300 bg-white">
                                @foreach($divisions as $div)
                                    <option value="{{ $div->id }}">{{ $div->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Pilar *</label>
                            <select name="pillar" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                                <option value="Lingkungan">Lingkungan</option>
                                <option value="Kemanusiaan">Kemanusiaan</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Media & Kreatif">Media & Kreatif</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Lokasi *</label>
                            <input type="text" name="location" required class="w-full px-3 py-2 border border-stone-300">
                        </div>
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Tanggal</label>
                            <input type="date" name="event_date" class="w-full px-3 py-2 border border-stone-300">
                        </div>
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Status *</label>
                        <select name="status" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            <option value="Terlaksana">Terlaksana</option>
                            <option value="Rutin Berjalan">Rutin Berjalan</option>
                            <option value="Segera Hadir">Segera Hadir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Ringkasan *</label>
                        <textarea name="summary" rows="3" required class="w-full px-3.5 py-2.5 border border-stone-300"></textarea>
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Foto Sampul Program</label>
                        <input type="file" name="cover" accept="image/*" class="w-full p-2 border border-stone-300 bg-paper">
                    </div>
                    <button type="submit" class="w-full py-3 bg-ink text-white font-bold uppercase tracking-wider hover:bg-jbz-charcoal transition">
                        Publikasikan Program
                    </button>
                </form>
            </div>

            <div class="lg:col-span-7 bg-white p-6 border border-stone-200 space-y-4">
                <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Daftar Program Kerja</h2>
                @foreach($programs as $program)
                    <div class="p-4 bg-paper border border-stone-200 space-y-3">
                        <div class="flex flex-col sm:flex-row items-start justify-between gap-4">
                            <div class="flex items-start gap-4">
                                @if($program->cover_image)
                                    <img src="{{ asset('storage/' . $program->cover_image) }}" alt="{{ $program->title }}" class="w-24 h-16 object-cover border border-stone-300 shrink-0">
                                @else
                                    <div class="w-24 h-16 bg-stone-200 text-jbz-charcoal text-[10px] font-bold uppercase flex items-center justify-center text-center p-2 shrink-0">
                                        Tanpa Foto
                                    </div>
                                @endif
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-jbz-green">{{ $program->pillar }} &mdash; {{ $program->status }}</p>
                                    <p class="font-serif text-base font-semibold text-ink">{{ $program->title }}</p>
                                    <p class="text-[11px] text-stone-500">{{ $program->location }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <button type="button" onclick="toggleEdit('edit-program-{{ $program->id }}')" class="px-3 py-1.5 border border-stone-300 bg-white text-ink text-[11px] font-bold uppercase">Edit / Foto</button>
                                <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Hapus program ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-rose-600 text-white text-[11px] font-bold uppercase">Hapus</button>
                                </form>
                            </div>
                        </div>

                        <form id="edit-program-{{ $program->id }}" action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data" class="hidden pt-4 border-t border-stone-200 grid sm:grid-cols-2 gap-3 text-xs">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block font-bold mb-1">Nama Program</label>
                                <input type="text" name="title" value="{{ $program->title }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Lokasi</label>
                                <input type="text" name="location" value="{{ $program->location }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Pilar</label>
                                <input type="text" name="pillar" value="{{ $program->pillar }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Status</label>
                                <input type="text" name="status" value="{{ $program->status }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-bold mb-1">Ringkasan</label>
                                <textarea name="summary" rows="2" required class="w-full px-3 py-2 border border-stone-300 bg-white">{{ $program->summary }}</textarea>
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Upload / Ganti Foto Sampul</label>
                                <input type="file" name="cover" accept="image/*" class="w-full p-1.5 border border-stone-300 bg-white">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="w-full py-2.5 bg-ink text-white font-bold uppercase tracking-wider">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- TAB 4: CRUD BERITA & GALERI PDD                           -->
        <!-- ========================================================= -->
        <section id="tab-galeri" class="tab-panel hidden grid lg:grid-cols-12 gap-8">
            <div class="lg:col-span-5 bg-white p-6 border border-stone-200 space-y-5 h-fit">
                <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Terbitkan Berita / Galeri PDD</h2>
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
                    @csrf
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Judul *</label>
                        <input type="text" name="title" required class="w-full px-3.5 py-2.5 border border-stone-300">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Kategori *</label>
                            <select name="type" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                                <option value="Galeri PDD">Galeri PDD</option>
                                <option value="Berita">Berita</option>
                                <option value="Siaran Pers">Siaran Pers</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Bidang</label>
                            <select name="division_id" class="w-full px-3 py-2 border border-stone-300 bg-white">
                                @foreach($divisions as $div)
                                    <option value="{{ $div->id }}">{{ $div->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Penulis / Tim PDD *</label>
                        <input type="text" name="author_name" value="Radecko Pratama (Bidang Media)" required class="w-full px-3.5 py-2.5 border border-stone-300">
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Ringkasan / Caption *</label>
                        <textarea name="excerpt" rows="3" required class="w-full px-3.5 py-2.5 border border-stone-300"></textarea>
                    </div>
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-jbz-charcoal mb-1.5">Foto Dokumentasi</label>
                        <input type="file" name="image" accept="image/*" class="w-full p-2 border border-stone-300 bg-paper">
                    </div>
                    <button type="submit" class="w-full py-3 bg-ink text-white font-bold uppercase tracking-wider hover:bg-jbz-charcoal transition">
                        Terbitkan Publikasi
                    </button>
                </form>
            </div>

            <div class="lg:col-span-7 bg-white p-6 border border-stone-200 space-y-4">
                <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Arsip Berita & Galeri PDD</h2>
                @foreach($posts as $post)
                    <div class="p-4 bg-paper border border-stone-200 space-y-3">
                        <div class="flex flex-col sm:flex-row items-start justify-between gap-4">
                            <div class="flex items-start gap-4">
                                @if($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-24 h-16 object-cover border border-stone-300 shrink-0">
                                @else
                                    <div class="w-24 h-16 bg-stone-200 text-jbz-charcoal text-[10px] font-bold uppercase flex items-center justify-center text-center p-2 shrink-0">
                                        Tanpa Foto
                                    </div>
                                @endif
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-jbz-cyan">{{ $post->type }}</p>
                                    <p class="font-serif text-base font-semibold text-ink">{{ $post->title }}</p>
                                    <p class="text-[11px] text-stone-500">Oleh {{ $post->author_name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <button type="button" onclick="toggleEdit('edit-post-{{ $post->id }}')" class="px-3 py-1.5 border border-stone-300 bg-white text-ink text-[11px] font-bold uppercase">Edit / Foto</button>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Hapus publikasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-rose-600 text-white text-[11px] font-bold uppercase">Hapus</button>
                                </form>
                            </div>
                        </div>

                        <form id="edit-post-{{ $post->id }}" action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="hidden pt-4 border-t border-stone-200 grid sm:grid-cols-2 gap-3 text-xs">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block font-bold mb-1">Judul</label>
                                <input type="text" name="title" value="{{ $post->title }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Kategori</label>
                                <input type="text" name="type" value="{{ $post->type }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Penulis</label>
                                <input type="text" name="author_name" value="{{ $post->author_name }}" required class="w-full px-3 py-2 border border-stone-300 bg-white">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Upload / Ganti Foto</label>
                                <input type="file" name="image" accept="image/*" class="w-full p-1.5 border border-stone-300 bg-white">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-bold mb-1">Ringkasan</label>
                                <textarea name="excerpt" rows="2" required class="w-full px-3 py-2 border border-stone-300 bg-white">{{ $post->excerpt }}</textarea>
                            </div>
                            <div class="sm:col-span-2">
                                <button type="submit" class="w-full py-2.5 bg-ink text-white font-bold uppercase tracking-wider">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- TAB 5: VERIFIKASI PENDAFTAR OPREC                         -->
        <!-- ========================================================= -->
        <section id="tab-oprec" class="tab-panel hidden bg-white p-6 border border-stone-200 space-y-4">
            <h2 class="font-serif text-xl font-semibold text-ink border-b border-stone-200 pb-3">Daftar Pendaftar Open Recruitment</h2>
            @forelse($applicants as $app)
                <div class="p-4 bg-paper border border-stone-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="space-y-1 text-xs">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="px-2 py-0.5 bg-ink text-jbz-amber font-mono font-bold">{{ $app->registration_code }}</span>
                            <span class="font-serif text-base font-semibold text-ink">{{ $app->full_name }}</span>
                            <span class="text-stone-500">({{ $app->institution }})</span>
                        </div>
                        <p class="text-jbz-charcoal">
                            WA: <strong>{{ $app->whatsapp }}</strong> | Email: {{ $app->email }} | Pilihan 1: <strong>{{ $app->firstChoiceDivision->name ?? '-' }}</strong>
                        </p>
                        <p class="text-stone-500 italic">"{{ $app->motivation }}"</p>
                        @if($app->cv_file_path)
                            <a href="{{ asset('storage/' . $app->cv_file_path) }}" target="_blank" class="inline-block text-ink font-bold underline decoration-jbz-amber mt-1">Lihat Berkas CV / Portofolio</a>
                        @endif
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <form action="{{ route('admin.applicants.status', $app) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="px-3 py-2 border border-stone-300 text-xs font-bold bg-white">
                                @foreach(['Menunggu Verifikasi', 'Seleksi Wawancara', 'Diterima', 'Belum Lolos'] as $st)
                                    <option value="{{ $st }}" @selected($app->status === $st)>{{ $st }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="px-3.5 py-2 bg-ink text-white text-xs font-bold uppercase tracking-wider">Update</button>
                        </form>
                        <form action="{{ route('admin.applicants.destroy', $app) }}" method="POST" onsubmit="return confirm('Hapus data pendaftar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3.5 py-2 bg-rose-600 text-white text-xs font-bold uppercase tracking-wider">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-xs text-jbz-charcoal">Belum ada pendaftar Oprec yang masuk.</p>
            @endforelse
        </section>

    </main>

    <script>
        function openTab(tabId) {
            document.querySelectorAll('.tab-panel').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.className = 'tab-btn px-4 py-2.5 text-xs font-bold uppercase tracking-wider bg-white text-jbz-charcoal border border-stone-300';
            });
            document.getElementById(tabId).classList.remove('hidden');
            const activeBtn = document.getElementById('btn-' + tabId);
            if (activeBtn) {
                activeBtn.className = 'tab-btn px-4 py-2.5 text-xs font-bold uppercase tracking-wider bg-ink text-white';
            }
        }

        function toggleEdit(id) {
            const el = document.getElementById(id);
            if (el) el.classList.toggle('hidden');
        }
    </script>
</body>
</html>