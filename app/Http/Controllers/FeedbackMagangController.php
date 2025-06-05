<?php

namespace App\Http\Controllers;

use App\Models\FeedbackMagang;
use App\Models\MagangApplication;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class FeedbackMagangController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();
        $magang = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)->first();
        $today = Carbon::today();
        $endDate = Carbon::parse($magang->lowongans->period->end_date);

        if ($today->greaterThan($endDate)) {
            $feedback = FeedbackMagang::where('mahasiswa_id', $mahasiswa->mahasiswa_id)->first();
            if (!$feedback) {
                $breadcrumb = (object) [
                    'title' => 'Feedback Magang',
                    'subtitle' => 'Berikan feedback terhadap pengalaman anda selama proses magang'
                ];
                return view('mahasiswa.feedbackMagang.create', compact('breadcrumb'));
            } else {
                $breadcrumb = (object) [
                    'title' => 'Feedback Magang',
                    'subtitle' => 'Feedback anda terhadap pengalaman anda selama proses magang'
                ];
                return view('mahasiswa.feedbackMagang.index', compact('breadcrumb', 'feedback'));
            }
        } else {
            $breadcrumb = (object) [
                'title' => 'Feedback Magang',
                'subtitle' => 'Feedback anda terhadap pengalaman anda selama proses magang'
            ];

            return view('mahasiswa.feedbackMagang.belumSaatnya', [
                'breadcrumb' => $breadcrumb,
                'error' => 'Anda dapat mengakses menu ini setelah periode magang anda selesai'
            ]);
        }
    }

    public function store(Request $request)
    {
        $mahasiswa_id = Mahasiswa::where('user_id', Auth::user()->user_id)->value('mahasiswa_id');
        $magang_id = MagangApplication::where('mahasiswa_id', $mahasiswa_id)
            ->where('status', 'Disetujui')
            ->value('magang_id');
        FeedbackMagang::create([
            'mahasiswa_id' => $mahasiswa_id,
            'magang_id' => $magang_id,
            'rating' => $request->rating,
            'judul_feedback' => $request->judul,
            'feedback' => $request->feedback,
        ]);

        return redirect('/mahasiswa/feedback');
    }

    public function edit($id)
    {
        $mahasiswa_id = Mahasiswa::where('user_id', Auth::user()->user_id)->value('mahasiswa_id');
        $feedback = FeedbackMagang::where('mahasiswa_id', $mahasiswa_id)->first();

        $breadcrumb = (object) [
            'title' => 'Edit Feedback Magang',
            'subtitle' => 'Perbarui feedback magang anda'
        ];
        return view('mahasiswa.feedbackMagang.edit', compact('breadcrumb', 'feedback'));
    }
    public function update(Request $request)
    {
        $mahasiswa_id = Mahasiswa::where('user_id', Auth::user()->user_id)->value('mahasiswa_id');
        $feedback = FeedbackMagang::where('mahasiswa_id', $mahasiswa_id)->first();

        $feedback->update([
            'rating' => $request->rating,
            'judul_feedback' => $request->judul,
            'feedback' => $request->feedback,

        ]);

        return redirect('/mahasiswa/feedback');
    }
}
