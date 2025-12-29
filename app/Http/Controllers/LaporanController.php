<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'email_pelapor' => 'nullable|email|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'nama_penipu' => 'nullable|string|max:100',
            'jenis_rekening' => 'nullable|string|max:50',
            'nomor_rekening' => 'nullable|string|max:100',
            'deskripsi' => 'required|string|min:20',
            'bukti' => 'nullable|array|max:10',
            'bukti.*' => 'image|mimes:jpg,jpeg,png|max:5120', // Max 5MB per file
        ], [
            'nama_pelapor.required' => 'Nama pelapor harus diisi',
            'nomor_telepon.required' => 'Nomor telepon harus diisi',
            'deskripsi.required' => 'Kronologi penipuan harus diisi',
            'deskripsi.min' => 'Kronologi minimal 20 karakter',
            'bukti.max' => 'Maksimal 3 gambar bukti',
            'bukti.*.image' => 'File harus berupa gambar',
            'bukti.*.max' => 'Ukuran file maksimal 5MB',
        ]);

        // Handle upload bukti (multiple images)
        $buktiImages = [];
        if ($request->hasFile('bukti')) {
            foreach ($request->file('bukti') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('bukti', $filename, 'public');
                $buktiImages[] = $path;
            }
        }

        // Simpan laporan
        $laporan = Laporan::create([
            'nama_pelapor' => $validated['nama_pelapor'],
            'email_pelapor' => $validated['email_pelapor'] ?? null,
            'nomor_telepon' => $validated['nomor_telepon'],
            'nama_penipu' => $validated['nama_penipu'] ?? null,
            'jenis_rekening' => $validated['jenis_rekening'] ?? null,
            'nomor_rekening' => $validated['nomor_rekening'] ?? null,
            'deskripsi' => $validated['deskripsi'],
            'bukti_images' => !empty($buktiImages) ? json_encode($buktiImages) : null,
            'status' => 'pending',
        ]);

        // Redirect ke form feedback
        return redirect()->route('feedback.create', ['laporan_id' => $laporan->id])
            ->with('success', 'Laporan berhasil dikirim!');
    }
}