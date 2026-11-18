<?php

namespace Database\Seeders;

use App\Models\BoardMember;
use App\Models\Division;
use App\Models\Post;
use App\Models\Program;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed 5 Bidang Utama JBZ Kabupaten Purwakarta
        $bph = Division::create([
            'name' => 'Badan Pengurus Harian (BPH)',
            'slug' => 'bph',
            'short_code' => 'BPH',
            'description' => 'Koordinasi strategis daerah, tata kelola kesekretariatan, dan kebendaharaan JBZ Kabupaten Purwakarta.',
            'sort_order' => 1,
        ]);

        $pdd = Division::create([
            'name' => 'Bidang Media',
            'slug' => 'media-pdd',
            'short_code' => 'PDD',
            'description' => 'Manajemen identitas visual, desain grafis, produksi video & live report kegiatan, serta pengarsipan dokumentasi digital.',
            'sort_order' => 2,
        ]);

        $pendidikan = Division::create([
            'name' => 'Bidang Pendidikan',
            'slug' => 'pendidikan',
            'short_code' => 'EDU',
            'description' => 'Pengembangan literasi, pengajaran sukarela di sekolah daerah, dan forum diskusi kepemudaan Z-Talks.',
            'sort_order' => 3,
        ]);

        $kemanusiaan = Division::create([
            'name' => 'Bidang Kemanusiaan & Lingkungan',
            'slug' => 'kemanusiaan-lingkungan',
            'short_code' => 'HUM',
            'description' => 'Aksi tanggap sosial, Zillenial Peduli Lansia, Gerakan Nasi Bungkus (GASIBU), dan pelestarian lingkungan hidup.',
            'sort_order' => 4,
        ]);

        $eksternal = Division::create([
            'name' => 'Bidang Hubungan Eksternal & Kemitraan',
            'slug' => 'hubungan-eksternal',
            'short_code' => 'EXT',
            'description' => 'Sinergi kemitraan strategis bersama instansi pemerintah daerah, sekolah, BEM perguruan tinggi, dan komunitas di Purwakarta.',
            'sort_order' => 5,
        ]);

        // 2. Seed Pengurus Awal (Nanti foto & pengurus lain bisa di-upload/ditambah lewat CRUD Admin)
        BoardMember::create([
            'division_id' => $pdd->id,
            'full_name' => 'Radecko Pratama',
            'role_title' => 'Head of Visual Production (Koordinator PDD)',
            'institution' => 'STT Wastukancana Purwakarta',
            'period' => '2025/2026',
            'instagram_handle' => '@radecopratama',
            'linkedin_url' => 'https://www.linkedin.com/in/radecko-pratama/',
            'sort_order' => 1,
        ]);

        // 3. Seed Program Kerja Awal
        Program::create([
            'division_id' => $kemanusiaan->id,
            'title' => 'Eco-Creation Day 2026 di Tanggul Ubrug Jatiluhur',
            'slug' => 'eco-creation-day-tanggul-ubrug-2026',
            'pillar' => 'Lingkungan',
            'location' => 'Tanggul Ubrug, Jatiluhur, Kabupaten Purwakarta',
            'event_date' => '2026-02-01',
            'status' => 'Terlaksana',
            'summary' => 'Aksi bersih lingkungan, edukasi pengelolaan sampah, serta workshop kreasi daur ulang sampah (trash craft) bersama pemateri Widiasaranty Hidayat, S.Pd., Gr.',
            'content' => 'Eco-Creation Day merupakan program kolaboratif JBZ Kabupaten Purwakarta di kawasan Tanggul Ubrug, Jatiluhur yang memadukan aksi bersih-bersih dengan lokakarya pengolahan sampah menjadi karya bernilai guna.',
        ]);

        Program::create([
            'division_id' => $kemanusiaan->id,
            'title' => 'Zillenial Peduli Lansia Kabupaten Purwakarta',
            'slug' => 'zillenial-peduli-lansia-purwakarta',
            'pillar' => 'Kemanusiaan',
            'location' => 'Kabupaten Purwakarta',
            'status' => 'Terlaksana',
            'summary' => 'Kolaborasi JBZ Cabang Purwakarta bersama BEM STIKES untuk mendampingi dan berbagi kebahagiaan bersama para lansia di masa tua.',
        ]);

        // 4. Seed Berita & Galeri PDD Awal
        Post::create([
            'division_id' => $pdd->id,
            'title' => 'Recap Visual Eco-Creation Day 2026 di Tanggul Ubrug Jatiluhur',
            'slug' => 'recap-visual-eco-creation-day-2026',
            'type' => 'Galeri PDD',
            'author_name' => 'Radecko Pratama (Head of Visual Production)',
            'excerpt' => 'Dokumentasi produksi visual dan live report kegiatan Eco-Creation Day di Tanggul Ubrug, Jatiluhur bersama Widiasaranty Hidayat, S.Pd., Gr.',
            'body' => 'Tim Produksi Visual (PDD) JBZ Kabupaten Purwakarta merangkum rangkaian kegiatan Eco-Creation Day mulai pukul 07:35 WIB di Tanggul Ubrug, Jatiluhur.',
            'published_at' => now(),
        ]);
    }
}