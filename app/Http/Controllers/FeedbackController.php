<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {
        $laporanId = $request->laporan_id;
        return view('feedback.create', compact('laporanId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'laporan_id' => 'nullable|exists:laporan,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ], [
            'rating.required' => 'Rating harus dipilih',
            'rating.min' => 'Rating minimal 1',
            'rating.max' => 'Rating maksimal 5',
        ]);

        Feedback::create($validated);

        return redirect()->route('home')
            ->with('success', 'Terima kasih atas laporan dan feedback Anda!');
    }
}