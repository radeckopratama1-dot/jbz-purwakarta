<?php

namespace App\Http\Controllers;

use App\Mail\OprecRegisteredMail;
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
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::where('is_active', true)->orderBy('sort_order')->latest()->get();
        $divisions = Division::with('boardMembers')->orderBy('sort_order')->get();
        $boardMembers = BoardMember::with('division')->orderBy('sort_order')->get();
        $programs = Program::with('division')->latest()->get();
        $posts = Post::with('division')->latest('published_at')->get();

        return view('welcome', compact(
            'banners',
            'divisions',
            'boardMembers',
            'programs',
            'posts'
        ));
    }

    public function showOprec(Request $request)
    {
        $setting = OprecSetting::firstOrCreate([], [
            'batch_name' => 'Open Recruitment JBZ Kabupaten Purwakarta 2026',
            'is_open' => true,
            'timeline_text' => "1 - 14 Desember 2026 | Pendaftaran Online dan Pengumpulan Berkas\n15 - 18 Desember 2026 | Kurasi dan Seleksi Administrasi Berkas\n19 - 22 Desember 2026 | Sesi Seleksi Wawancara Online dan Offline\n25 Desember 2026 | Pengumuman Resmi Kelulusan Anggota Baru",
            'closed_message' => 'Pendaftaran Open Recruitment JBZ Kabupaten Purwakarta saat ini telah ditutup. Terima kasih atas antusiasme kamu, sampai bertemu di kegiatan kolaborasi dan open recruitment JBZ selanjutnya!',
        ]);

        $isOprecOpen = $setting->isCurrentlyOpen();
        $divisions = Division::orderBy('sort_order')->get();

        // Fitur Cek Status Oprec berdasarkan Kode Registrasi atau Nama
        $checkedApplicant = null;
        if ($request->filled('cek_kode')) {
            $keyword = trim($request->cek_kode);
            $checkedApplicant = Applicant::with(['firstChoiceDivision', 'secondChoiceDivision'])
                ->where('registration_code', $keyword)
                ->orWhere('full_name', 'like', '%' . $keyword . '%')
                ->first();
        }

        return view('oprec', compact('setting', 'isOprecOpen', 'divisions', 'checkedApplicant'));
    }

    public function showProgram(string $slug)
    {
        $program = Program::with('division')->where('slug', $slug)->firstOrFail();
        $otherPrograms = Program::with('division')
            ->where('id', '!=', $program->id)
            ->latest('event_date')
            ->take(3)
            ->get();

        return view('program-detail', compact('program', 'otherPrograms'));
    }

    public function showPost(string $slug)
    {
        $post = Post::with('division')->where('slug', $slug)->firstOrFail();
        $otherPosts = Post::with('division')
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('post-detail', compact('post', 'otherPosts'));
    }

    public function storeApplicant(Request $request)
    {
        $setting = OprecSetting::firstOrCreate([], [
            'batch_name' => 'Open Recruitment JBZ Kabupaten Purwakarta 2026',
            'is_open' => true,
            'closed_message' => 'Pendaftaran Open Recruitment JBZ Kabupaten Purwakarta saat ini telah ditutup. Terima kasih atas antusiasme kamu, sampai bertemu di kegiatan kolaborasi dan open recruitment JBZ selanjutnya!',
        ]);

        if (! $setting->isCurrentlyOpen()) {
            return redirect()->route('oprec.index')->with(
                'oprec_closed',
                $setting->closed_message ?? 'Pendaftaran Open Recruitment JBZ Kabupaten Purwakarta saat ini telah ditutup.'
            );
        }

        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:120'],
            'whatsapp' => ['required', 'string', 'max:30'],
            'institution' => ['required', 'string', 'max:150'],
            'first_choice_division_id' => ['required', 'exists:divisions,id'],
            'second_choice_division_id' => ['nullable', 'exists:divisions,id'],
            'portfolio_url' => ['nullable', 'string', 'max:255'],
            'cv_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],
            'motivation' => ['required', 'string'],
        ]);

        if ($request->hasFile('cv_file')) {
            $data['cv_file_path'] = $request->file('cv_file')->store('oprec-cv', 'public');
        }

        $data['registration_code'] = 'JBZ-PWK-' . strtoupper(Str::random(5));
        $data['status'] = 'Menunggu Verifikasi';

        $applicant = Applicant::create($data);
        $applicant->load(['firstChoiceDivision', 'secondChoiceDivision']);

        try {
            Mail::to($applicant->email)->send(new OprecRegisteredMail($applicant));
        } catch (\Throwable $e) {
            Log::error('Gagal kirim email Oprec: ' . $e->getMessage());
        }

        return redirect()->route('oprec.index')->with(
            'oprec_success',
            'Pendaftaran berhasil dikirim! Simpan Kode Registrasi kamu: ' . $applicant->registration_code
        );
    }
}
