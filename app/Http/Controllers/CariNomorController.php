<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class CariNomorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        
        // Laporan yang di-search (cek nomor telepon ATAU nomor rekening)
        $laporans = Laporan::where('status', 'approved')
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('nomor_telepon', 'like', '%' . $search . '%')
                    ->orWhere('nomor_rekening', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10);
        
        // Laporan terbaru (untuk tampilan awal)
        $recentLaporans = Laporan::where('status', 'approved')
            ->latest()
            ->take(5)
            ->get();
        
        // Statistik
        $totalLaporan = Laporan::count();
        $terverifikasi = Laporan::where('status', 'approved')->count();
        $nomorUnik = Laporan::where('status', 'approved')
            ->distinct('nomor_telepon')
            ->count('nomor_telepon');
        
        return view('cari.index', compact(
            'laporans', 
            'recentLaporans', 
            'totalLaporan', 
            'terverifikasi', 
            'nomorUnik'
        ));
    }
}