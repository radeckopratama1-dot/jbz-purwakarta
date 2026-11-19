<?php

namespace App\Http\Controllers;

use App\Mail\OprecStatusUpdatedMail;
use App\Models\Applicant;
use App\Models\Banner;
use App\Models\BoardMember;
use App\Models\Division;
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
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'button_text' => ['nullable', 'string', 'max:60'],
            'button_url' => ['nullable', 'string', 'max:255'],
        ]);

        $data['image_path'] = $request->file('image')->store('banners', 'public');
        $data['is_active'] = true;

        Banner::create($data);
        return back()->with('success', 'Banner baru berhasil di-upload dan ditayangkan!');
    }

    public function updateBanner(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'button_text' => ['nullable', 'string', 'max:60'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image_path) {
                Storage::disk('public')->delete($banner->image_path);
            }
            $data['image_path'] = $request->file('image')->store('banners', 'public');
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
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('pengurus', 'public');
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
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
        ]);

        if ($request->hasFile('photo')) {
            if ($boardMember->photo_path) {
                Storage::disk('public')->delete($boardMember->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('pengurus', 'public');
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
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('cover')) {
            $data['cover_image'] = $request->file('cover')->store('program', 'public');
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
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('cover')) {
            if ($program->cover_image) {
                Storage::disk('public')->delete($program->cover_image);
            }
            $data['cover_image'] = $request->file('cover')->store('program', 'public');
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
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('galeri', 'public');
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
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            $data['image_path'] = $request->file('image')->store('galeri', 'public');
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
}