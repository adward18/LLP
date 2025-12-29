<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Stats
        $totalLaporan = Laporan::count();
        $pending = Laporan::where('status', 'pending')->count();
        $approved = Laporan::where('status', 'approved')->count();
        $rejected = Laporan::where('status', 'rejected')->count();
        
        // Recent Laporans
        $recentLaporans = Laporan::latest()->take(10)->get();
        
        // Feedback Stats
        $totalFeedback = Feedback::count();
        $avgRating = Feedback::avg('rating') ?? 0;
        
        // Rating Distribution
        $ratingDistribution = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = Feedback::where('rating', $i)->count();
            $ratingDistribution[$i] = $totalFeedback > 0 ? round(($count / $totalFeedback) * 100, 1) : 0;
        }
        
        // Chart Data - 7 hari terakhir
        $chartData = [
            'labels' => [],
            'pending' => [],
            'approved' => [],
            'rejected' => []
        ];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $chartData['labels'][] = $date->format('d M');
            
            $chartData['pending'][] = Laporan::whereDate('created_at', $date)
                ->where('status', 'pending')->count();
            $chartData['approved'][] = Laporan::whereDate('created_at', $date)
                ->where('status', 'approved')->count();
            $chartData['rejected'][] = Laporan::whereDate('created_at', $date)
                ->where('status', 'rejected')->count();
        }
        
        return view('admin.dashboard', compact(
            'totalLaporan',
            'pending',
            'approved',
            'rejected',
            'recentLaporans',
            'totalFeedback',
            'avgRating',
            'ratingDistribution',
            'chartData'
        ));
    }

    public function laporan(Request $request)
    {
        $status = $request->status;
        $search = $request->search;
        
        // Query dasar
        $query = Laporan::query();
        
        // Filter by status
        if ($status === 'deleted') {
            $query->onlyTrashed();
        } elseif ($status) {
            $query->where('status', $status);
        }
        
        // Search
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nomor_telepon', 'like', "%{$search}%")
                  ->orWhere('nama_pelapor', 'like', "%{$search}%");
            });
        }
        
        $laporans = $query->latest()->paginate(10);
        
        // Counts untuk tabs
        $totalLaporan = Laporan::count();
        $pending = Laporan::where('status', 'pending')->count();
        $approved = Laporan::where('status', 'approved')->count();
        $rejected = Laporan::where('status', 'rejected')->count();
        $deleted = Laporan::onlyTrashed()->count();
        
        return view('admin.laporan', compact('laporans', 'totalLaporan', 'pending', 'approved', 'rejected', 'deleted'));
    }

    public function feedback(Request $request)
    {
      
        $query = Feedback::with('laporan')->whereHas('laporan');
        
        if ($request->rating) {
            $query->where('rating', $request->rating);
        }
        
        $feedbacks = $query->latest()->paginate(20);
        $totalFeedback = Feedback::count();
        $avgRating = Feedback::avg('rating') ?? 0;
        $todayFeedback = Feedback::whereDate('created_at', today())->count();
        
        return view('admin.feedback', compact('feedbacks', 'totalFeedback', 'avgRating', 'todayFeedback'));
    }

    public function approve($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'status' => 'approved',
            'admin_id' => auth('admin')->id(),
            'admin_notes' => null,
        ]);

        return back()->with('success', 'Laporan berhasil disetujui!');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'admin_notes' => 'required|string|min:10',
        ], [
            'admin_notes.required' => 'Alasan penolakan harus diisi',
            'admin_notes.min' => 'Alasan minimal 10 karakter',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'status' => 'rejected',
            'admin_id' => auth('admin')->id(),
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', 'Laporan berhasil ditolak!');
    }

    public function unapprove($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'status' => 'pending',
            'admin_notes' => null,
        ]);

        return back()->with('success', 'Approval berhasil dibatalkan!');
    }

    public function delete($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete(); // Soft delete

        return back()->with('success', 'Laporan ditandai sebagai spam!');
    }

    public function show($id)
    {
        $laporan = Laporan::withTrashed()->findOrFail($id);
        return view('admin.laporan', compact('laporan'));
    }

    // Method untuk halaman Spam (Laporan yang dihapus)
    public function spam()
    {
        $spams = Laporan::onlyTrashed()->paginate(20);
        $totalSpam = Laporan::onlyTrashed()->count();
        $todaySpam = Laporan::onlyTrashed()->whereDate('deleted_at', today())->count();
        $weekSpam = Laporan::onlyTrashed()->whereBetween('deleted_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        
        return view('admin.spam', compact('spams', 'totalSpam', 'todaySpam', 'weekSpam'));
    }

    // Method untuk restore laporan dari spam
    public function restoreSpam($id)
    {
        $laporan = Laporan::onlyTrashed()->findOrFail($id);
        $laporan->restore();
        
        return redirect()->route('admin.spam')->with('success', 'Laporan berhasil dipulihkan dari spam!');
    }

    // Method untuk hapus permanen dari spam
    public function forceDeleteSpam($id)
    {
        $laporan = Laporan::onlyTrashed()->findOrFail($id);
        $laporan->forceDelete();
        
        return redirect()->route('admin.spam')->with('success', 'Laporan berhasil dihapus permanen!');
    }
}