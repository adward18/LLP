<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $verifiedReports = \App\Models\Laporan::where('status', 'approved')->count();
    
        return view('pages.about', compact('verifiedReports'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Di sini kamu bisa simpan ke database atau kirim email
        // Contoh: kirim notifikasi, simpan ke DB, dll

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}