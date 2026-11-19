<?php

namespace App\Http\Controllers;

use App\Mail\OprecStatusUpdatedMail;
use App\Models\Applicant;
use App\Models\Banner;
use App\Models\BoardMember;
use App\Models\Division;
use App\Models\OprecSetting;
use App\Models\Post;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin', [
            'banners' => Banner::orderBy('sort_order')->latest()->get(),
            'divisions' => Division::orderBy('sort_order')->get(),
            'boardMembers' => BoardMember::with('division')->orderBy('sort_order')->latest()->get(),
            'programs' => Program::with('division')->latest()->get(),
            'posts' => Post::with('division')->latest()->get(),
            'applicants' => Applicant::with(['firstChoiceDivision', 'secondChoiceDivision'])->latest()->get(),
            'oprecSetting' => OprecSetting::firstOrCreate([], [
                'batch_name' => 'Open Recruitment JBZ Kabupaten Purwakarta 2026',
                'is_open' => true,
                'timeline_text' => "1 - 14 Desember 2026 | Pendaftaran Online dan Pengumpulan Berkas\n15 - 18 Desember 2026 | Kurasi dan Seleksi Administrasi Berkas\n19 - 22 Desember 2026 | Sesi Seleksi Wawancara Online dan Offline\n25 Desember 2026 | Pengumuman Resmi Kelulusan Anggota Baru",
                'closed_message' => 'Pendaftaran Open Recruitment JBZ Kabupaten Purwakarta saat ini telah ditutup. Terima kasih atas antusiasme kamu, sampai bertemu di kegiatan kolaborasi dan open recruitment JBZ selanjutnya!',
            ]),
        ]);
    }

    // ==========================================
    // 1. CRUD BANNER BERANDA (+ UPLOAD FOTO)
    // ==========================================
    public function storeBanner(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
            'button_text' => ['nullable', 'string', 'max:60'],
            'button_url' => ['nullable', 'string', 'max:255'],
        ]);

        $data['image_path'] = $this->storeOptimizedImage($request->file('image'), 'banners', 1920);
        $data['is_active'] = true;

        Banner::create($data);
        return back()->with('success', 'Banner baru berhasil di-upload dan ditayangkan!');
    }

    public function updateBanner(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
            'button_text' => ['nullable', 'string', 'max:60'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image_path) {
                Storage::disk('public')->delete($banner->image_path);
            }
            $data['image_path'] = $this->storeOptimizedImage($request->file('image'), 'banners', 1920);
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $banner->update($data);

        return back()->with('success', 'Data Banner berhasil diperbarui!');
    }

    public function destroyBanner(Banner $banner)
    {
        if ($banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();

        return back()->with('success', 'Banner beserta file fotonya berhasil dihapus!');
    }

    // ==========================================
    // 2. CRUD PENGURUS KABINET (+ UPLOAD FOTO)
    // ==========================================
    public function storeMember(Request $request)
    {
        $data = $request->validate([
            'division_id' => ['required', 'exists:divisions,id'],
            'full_name' => ['required', 'string', 'max:120'],
            'role_title' => ['required', 'string', 'max:120'],
            'institution' => ['nullable', 'string', 'max:150'],
            'period' => ['nullable', 'string', 'max:30'],
            'instagram_handle' => ['nullable', 'string', 'max:60'],
            'linkedin_url' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $this->storeOptimizedImage($request->file('photo'), 'pengurus', 800);
        }
        $data['period'] = $data['period'] ?? '2025/2026';

        BoardMember::create($data);
        return back()->with('success', 'Data pengurus berhasil ditambahkan!');
    }

    public function updateMember(Request $request, BoardMember $boardMember)
    {
        $data = $request->validate([
            'division_id' => ['required', 'exists:divisions,id'],
            'full_name' => ['required', 'string', 'max:120'],
            'role_title' => ['required', 'string', 'max:120'],
            'institution' => ['nullable', 'string', 'max:150'],
            'period' => ['nullable', 'string', 'max:30'],
            'instagram_handle' => ['nullable', 'string', 'max:60'],
            'linkedin_url' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
        ]);

        if ($request->hasFile('photo')) {
            if ($boardMember->photo_path) {
                Storage::disk('public')->delete($boardMember->photo_path);
            }
            $data['photo_path'] = $this->storeOptimizedImage($request->file('photo'), 'pengurus', 800);
        }

        $boardMember->update($data);
        return back()->with('success', 'Data pengurus berhasil diperbarui!');
    }

    public function destroyMember(BoardMember $boardMember)
    {
        if ($boardMember->photo_path) {
            Storage::disk('public')->delete($boardMember->photo_path);
        }
        $boardMember->delete();

        return back()->with('success', 'Data pengurus berhasil dihapus!');
    }

    // ==========================================
    // 3. CRUD PROGRAM KERJA (+ UPLOAD SAMPUL)
    // ==========================================
    public function storeProgram(Request $request)
    {
        $data = $request->validate([
            'division_id' => ['nullable', 'exists:divisions,id'],
            'title' => ['required', 'string', 'max:180'],
            'pillar' => ['required', 'string', 'max:60'],
            'location' => ['required', 'string', 'max:180'],
            'event_date' => ['nullable', 'date'],
            'status' => ['required', 'string', 'max:50'],
            'summary' => ['required', 'string'],
            'content' => ['nullable', 'string'],
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
        ]);

        if ($request->hasFile('cover')) {
            $data['cover_image'] = $this->storeOptimizedImage($request->file('cover'), 'program', 1200);
        }
        $data['slug'] = Str::slug($data['title']) . '-' . Str::lower(Str::random(4));

        Program::create($data);
        return back()->with('success', 'Program kerja baru berhasil ditambahkan!');
    }

    public function updateProgram(Request $request, Program $program)
    {
        $data = $request->validate([
            'division_id' => ['nullable', 'exists:divisions,id'],
            'title' => ['required', 'string', 'max:180'],
            'pillar' => ['required', 'string', 'max:60'],
            'location' => ['required', 'string', 'max:180'],
            'event_date' => ['nullable', 'date'],
            'status' => ['required', 'string', 'max:50'],
            'summary' => ['required', 'string'],
            'content' => ['nullable', 'string'],
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
        ]);

        if ($request->hasFile('cover')) {
            if ($program->cover_image) {
                Storage::disk('public')->delete($program->cover_image);
            }
            $data['cover_image'] = $this->storeOptimizedImage($request->file('cover'), 'program', 1200);
        }

        $program->update($data);
        return back()->with('success', 'Program kerja berhasil diperbarui!');
    }

    public function destroyProgram(Program $program)
    {
        if ($program->cover_image) {
            Storage::disk('public')->delete($program->cover_image);
        }
        $program->delete();

        return back()->with('success', 'Program kerja berhasil dihapus!');
    }

    // ==========================================
    // 4. CRUD BERITA & GALERI PDD (+ UPLOAD FOTO)
    // ==========================================
    public function storePost(Request $request)
    {
        $data = $request->validate([
            'division_id' => ['nullable', 'exists:divisions,id'],
            'title' => ['required', 'string', 'max:180'],
            'type' => ['required', 'string', 'max:50'],
            'author_name' => ['required', 'string', 'max:100'],
            'excerpt' => ['required', 'string'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeOptimizedImage($request->file('image'), 'galeri', 1200);
        }
        $data['slug'] = Str::slug($data['title']) . '-' . Str::lower(Str::random(4));
        $data['published_at'] = now();

        Post::create($data);
        return back()->with('success', 'Berita / Dokumentasi Galeri PDD berhasil diterbitkan!');
    }

    public function updatePost(Request $request, Post $post)
    {
        $data = $request->validate([
            'division_id' => ['nullable', 'exists:divisions,id'],
            'title' => ['required', 'string', 'max:180'],
            'type' => ['required', 'string', 'max:50'],
            'author_name' => ['required', 'string', 'max:100'],
            'excerpt' => ['required', 'string'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
        ]);

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            $data['image_path'] = $this->storeOptimizedImage($request->file('image'), 'galeri', 1200);
        }

        $post->update($data);
        return back()->with('success', 'Publikasi Berita / Galeri PDD berhasil diperbarui!');
    }

    public function destroyPost(Post $post)
    {
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }
        $post->delete();

        return back()->with('success', 'Publikasi Berita / Galeri PDD berhasil dihapus!');
    }

    // ==========================================
    // 5. VERIFIKASI & HAPUS PENDAFTAR OPREC
    // ==========================================
    public function updateApplicantStatus(Request $request, Applicant $applicant)
    {
        $data = $request->validate([
            'status' => ['required', 'string', 'max:50'],
        ]);

        $applicant->update($data);
        $applicant->loadMissing(['firstChoiceDivision', 'secondChoiceDivision']);

        $emailSent = false;
        if (in_array($applicant->status, ['Seleksi Wawancara', 'Diterima', 'Belum Lolos'])) {
            try {
                Mail::to($applicant->email)->send(new OprecStatusUpdatedMail($applicant));
                $emailSent = true;
            } catch (\Throwable $e) {
                Log::error('Gagal kirim email Oprec: ' . $e->getMessage());
            }
        }

        $message = 'Status seleksi pendaftar ' . $applicant->full_name . ' berhasil diperbarui';
        if ($emailSent) {
            $message .= ' dan email notifikasi resmi telah dikirim ke ' . $applicant->email . '!';
        } else {
            $message .= '!';
        }

        return back()->with('success', $message);
    }

    public function destroyApplicant(Applicant $applicant)
    {
        if ($applicant->cv_file_path) {
            Storage::disk('public')->delete($applicant->cv_file_path);
        }
        $applicant->delete();

        return back()->with('success', 'Data pendaftar Oprec berhasil dihapus!');
    }

    // ==========================================
    // 6. PENGATURAN STATUS & JADWAL OPREC (/OprecJBZ)
    // ==========================================
    public function updateOprecSettings(Request $request)
    {
        $data = $request->validate([
            'batch_name' => ['required', 'string', 'max:180'],
            'is_open' => ['required', 'boolean'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'timeline_text' => ['nullable', 'string'],
            'closed_message' => ['nullable', 'string'],
        ]);

        $setting = OprecSetting::firstOrCreate([], [
            'batch_name' => 'Open Recruitment JBZ Kabupaten Purwakarta 2026',
        ]);

        $setting->update($data);

        return back()->with('success', 'Pengaturan jadwal dan status pendaftaran Oprec (/OprecJBZ) berhasil diperbarui!');
    }

    /**
     * Helper optimasi dan kompresi gambar otomatis menggunakan ekstensi PHP GD bawaan.
     * Mengurangi resolusi foto yang melebihi $maxWidth dan menyimpannya dalam format WebP/JPEG ringan (~150-400 KB).
     * Memiliki fallback aman ke $file->store($folder, 'public') jika format tidak didukung atau GD gagal.
     */
    private function storeOptimizedImage(\Illuminate\Http\UploadedFile $file, string $folder, int $maxWidth = 1600, int $quality = 82): string
    {
        if (!extension_loaded('gd')) {
            return $file->store($folder, 'public');
        }

        $realPath = $file->getRealPath();
        if (!$realPath || !file_exists($realPath)) {
            return $file->store($folder, 'public');
        }

        $imageInfo = @getimagesize($realPath);
        if (!$imageInfo) {
            return $file->store($folder, 'public');
        }

        $origWidth = $imageInfo[0];
        $origHeight = $imageInfo[1];
        $mime = $imageInfo['mime'] ?? '';

        $src = null;
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                if (function_exists('imagecreatefromjpeg')) {
                    $src = @imagecreatefromjpeg($realPath);
                }
                break;
            case 'image/png':
                if (function_exists('imagecreatefrompng')) {
                    $src = @imagecreatefrompng($realPath);
                }
                break;
            case 'image/webp':
                if (function_exists('imagecreatefromwebp')) {
                    $src = @imagecreatefromwebp($realPath);
                }
                break;
        }

        if (!$src) {
            return $file->store($folder, 'public');
        }

        // Koreksi orientasi EXIF untuk foto kamera HP
        if (function_exists('exif_read_data') && ($mime === 'image/jpeg' || $mime === 'image/jpg')) {
            try {
                $exif = @exif_read_data($realPath);
                if (!empty($exif['Orientation'])) {
                    switch ($exif['Orientation']) {
                        case 3:
                            $rotated = @imagerotate($src, 180, 0);
                            if ($rotated) {
                                imagedestroy($src);
                                $src = $rotated;
                            }
                            break;
                        case 6:
                            $rotated = @imagerotate($src, -90, 0);
                            if ($rotated) {
                                imagedestroy($src);
                                $src = $rotated;
                                $temp = $origWidth;
                                $origWidth = $origHeight;
                                $origHeight = $temp;
                            }
                            break;
                        case 8:
                            $rotated = @imagerotate($src, 90, 0);
                            if ($rotated) {
                                imagedestroy($src);
                                $src = $rotated;
                                $temp = $origWidth;
                                $origWidth = $origHeight;
                                $origHeight = $temp;
                            }
                            break;
                    }
                }
            } catch (\Throwable $e) {
                // Abaikan kesalahan metadata EXIF
            }
        }

        // Hitung skala resize proporsional
        if ($origWidth > $maxWidth && $maxWidth > 0) {
            $targetWidth = $maxWidth;
            $targetHeight = (int) round(($origHeight / $origWidth) * $maxWidth);
        } else {
            $targetWidth = $origWidth;
            $targetHeight = $origHeight;
        }

        $dst = imagecreatetruecolor($targetWidth, $targetHeight);

        $canWebp = function_exists('imagewebp');
        if ($canWebp) {
            // Transparansi penuh untuk format WebP
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
            imagefilledrectangle($dst, 0, 0, $targetWidth, $targetHeight, $transparent);
        } else {
            // Background putih bersih jika fallback JPEG
            $white = imagecolorallocate($dst, 255, 255, 255);
            imagefilledrectangle($dst, 0, 0, $targetWidth, $targetHeight, $white);
        }

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $targetWidth, $targetHeight, $origWidth, $origHeight);

        $extension = $canWebp ? 'webp' : 'jpg';
        $filename = Str::random(40) . '.' . $extension;
        $relativeStoragePath = trim($folder, '/') . '/' . $filename;

        ob_start();
        if ($canWebp) {
            imagewebp($dst, null, $quality);
        } else {
            imagejpeg($dst, null, $quality);
        }
        $imageStream = ob_get_clean();

        imagedestroy($src);
        imagedestroy($dst);

        if (!empty($imageStream)) {
            Storage::disk('public')->put($relativeStoragePath, $imageStream);
            return $relativeStoragePath;
        }

        return $file->store($folder, 'public');
    }
}