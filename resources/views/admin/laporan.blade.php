@extends('layouts.admin')

@section('title', 'Kelola Laporan')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-medium text-zinc-100 mb-2">Kelola Laporan</h1>
        <p class="text-zinc-400">Verifikasi dan kelola semua laporan penipuan</p>
    </div>

    <!-- Filter Tabs -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 mb-8">
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.laporan') }}" class="px-6 py-3 rounded-lg font-normal transition-colors {{ !request('status') ? 'bg-zinc-800 text-zinc-100 border border-zinc-700' : 'bg-zinc-900 text-zinc-400 border border-zinc-800 hover:bg-zinc-800/50' }}">
                Semua ({{ $totalLaporan ?? 0 }})
            </a>
            <a href="{{ route('admin.laporan', ['status' => 'pending']) }}" class="px-6 py-3 rounded-lg font-normal transition-colors {{ request('status') == 'pending' ? 'bg-zinc-800 text-zinc-100 border border-zinc-700' : 'bg-zinc-900 text-zinc-400 border border-zinc-800 hover:bg-zinc-800/50' }}">
                Pending ({{ $pending ?? 0 }})
            </a>
            <a href="{{ route('admin.laporan', ['status' => 'approved']) }}" class="px-6 py-3 rounded-lg font-normal transition-colors {{ request('status') == 'approved' ? 'bg-zinc-800 text-zinc-100 border border-zinc-700' : 'bg-zinc-900 text-zinc-400 border border-zinc-800 hover:bg-zinc-800/50' }}">
                Approved ({{ $approved ?? 0 }})
            </a>
            <a href="{{ route('admin.laporan', ['status' => 'rejected']) }}" class="px-6 py-3 rounded-lg font-normal transition-colors {{ request('status') == 'rejected' ? 'bg-zinc-800 text-zinc-100 border border-zinc-700' : 'bg-zinc-900 text-zinc-400 border border-zinc-800 hover:bg-zinc-800/50' }}">
                Rejected ({{ $rejected ?? 0 }})
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg overflow-hidden">
        @if($laporans->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-zinc-900 border-b border-zinc-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Nomor Telepon</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Pelapor</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Nama Penipu</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Rekening</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @foreach($laporans as $laporan)
                    <tr class="hover:bg-zinc-800/50 transition-colors">
                        <td class="px-6 py-4 text-sm font-normal text-zinc-300">#{{ $laporan->id }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-normal text-zinc-100">{{ $laporan->nomor_telepon }}</div>
                            @if($laporan->bukti_images)
                            <span class="inline-flex items-center gap-1 text-xs text-zinc-400 mt-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                                </svg>
                                {{ count(json_decode($laporan->bukti_images)) }} bukti
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-300">{{ $laporan->nama_pelapor }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-300">{{ $laporan->nama_penipu ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @if($laporan->jenis_rekening && $laporan->nomor_rekening)
                            <div class="text-xs font-normal text-zinc-100">{{ strtoupper($laporan->jenis_rekening) }}</div>
                            <div class="text-xs text-zinc-500">{{ $laporan->nomor_rekening }}</div>
                            @else
                            <span class="text-sm text-zinc-600">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($laporan->status == 'pending')
                                <span class="inline-flex items-center gap-1 bg-zinc-800 text-zinc-400 px-3 py-1 rounded-full text-xs font-normal border border-zinc-700">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                                    </svg>
                                    Pending
                                </span>
                            @elseif($laporan->status == 'approved')
                                <span class="inline-flex items-center gap-1 bg-zinc-800 text-zinc-300 px-3 py-1 rounded-full text-xs font-normal border border-zinc-700">
                                    <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                    </svg>
                                    Approved
                                </span>
                            @elseif($laporan->status == 'rejected')
                                <span class="inline-flex items-center gap-1 bg-zinc-800 text-zinc-400 px-3 py-1 rounded-full text-xs font-normal border border-zinc-700">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                                    </svg>
                                    Rejected
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-400">{{ $laporan->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <!-- View Detail -->
                                    <button 
                                        onclick="showDetailModal({{ json_encode($laporan) }})"
                                        class="inline-flex items-center justify-center w-8 h-8 bg-zinc-800 hover:bg-zinc-700 text-zinc-400 rounded-lg transition-colors border border-zinc-700"
                                        title="Lihat Detail"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>

                                    @if($laporan->status == 'pending')
                                        <!-- Approve -->
                                        <form action="{{ route('admin.laporan.approve', $laporan->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button 
                                                type="submit"
                                                onclick="return confirm('Approve laporan ini?')"
                                                class="inline-flex items-center justify-center w-8 h-8 bg-green-900/50 hover:bg-green-800/50 text-green-400 rounded-lg transition-colors border border-green-900/30"
                                                title="Approve"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </button>
                                        </form>
                                        <!-- Reject -->
                                        <button 
                                            onclick="showRejectModal({{ $laporan->id }})"
                                            class="inline-flex items-center justify-center w-8 h-8 bg-red-900/50 hover:bg-red-800/50 text-red-400 rounded-lg transition-colors border border-red-900/30"
                                            title="Reject"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    @endif

                                    <!-- Delete (Spam) -->
                                    <form action="{{ route('admin.laporan.delete', $laporan->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit"
                                            onclick="return confirm('Tandai sebagai SPAM?')"
                                            class="inline-flex items-center justify-center w-8 h-8 bg-zinc-800 hover:bg-zinc-700 text-zinc-400 rounded-lg transition-colors border border-zinc-700"
                                            title="Tandai Spam"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($laporans->hasPages())
        <div class="px-6 py-4 border-t border-zinc-800">
            {{ $laporans->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-16">
            <svg class="w-20 h-20 text-zinc-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p class="text-zinc-400 text-lg font-normal">Tidak ada laporan</p>
        </div>
        @endif
    </div>
</div>

<!-- Detail Modal -->
<div id="detailModal" class="hidden fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4">
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-zinc-900 border-b border-zinc-800 px-6 py-4 flex justify-between items-center">
            <h3 class="text-2xl font-medium text-zinc-100">Detail Laporan</h3>
            <button onclick="closeDetailModal()" class="text-zinc-500 hover:text-zinc-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div id="detailContent" class="p-6"></div>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="hidden fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4">
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8 max-w-md w-full">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-red-900/50 border border-red-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-medium text-zinc-100">Reject Laporan</h3>
        </div>
        <form id="rejectForm" method="POST">
            @csrf
            <div class="mb-6">
                <label for="admin_notes" class="block text-zinc-300 font-normal mb-2">
                    Alasan Penolakan <span class="text-red-500">*</span>
                </label>
                <textarea 
                    name="admin_notes" 
                    id="admin_notes"
                    rows="4"
                    placeholder="Jelaskan mengapa laporan ini ditolak (minimal 10 karakter)..."
                    class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 text-zinc-100 placeholder-zinc-500 rounded-lg focus:outline-none focus:border-zinc-600"
                    required
                ></textarea>
            </div>
            <div class="flex gap-3">
                <button 
                    type="submit"
                    class="flex-1 bg-red-900/50 hover:bg-red-800/50 text-zinc-300 px-6 py-3 rounded-lg font-normal transition-colors border border-red-900/30"
                >
                    Reject Laporan
                </button>
                <button 
                    type="button"
                    onclick="closeRejectModal()"
                    class="flex-1 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 px-6 py-3 rounded-lg font-normal transition-colors border border-zinc-700"
                >
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function showDetailModal(laporan) {
    const modal = document.getElementById('detailModal');
    const content = document.getElementById('detailContent');
    
    let buktiHtml = '';
    if (laporan.bukti_images) {
        const images = JSON.parse(laporan.bukti_images);
        buktiHtml = `
            <div class="mt-6">
                <h4 class="font-normal text-zinc-100 mb-3">Bukti Pendukung</h4>
                <div class="grid grid-cols-3 gap-4">
                    ${images.map(img => `
                        <img src="/storage/${img}" class="w-full h-32 object-cover rounded-lg border border-zinc-800 cursor-pointer hover:border-zinc-700 transition-colors" onclick="window.open(this.src, '_blank')">
                    `).join('')}
                </div>
            </div>
        `;
    }
    
    content.innerHTML = `
        <div class="space-y-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-normal text-zinc-500">Nomor Telepon</label>
                    <p class="text-lg font-normal text-zinc-100">${laporan.nomor_telepon}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Status</label>
                    <p class="text-lg font-normal text-zinc-100">${laporan.status}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Pelapor</label>
                    <p class="text-lg font-normal text-zinc-100">${laporan.nama_pelapor}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Nama Penipu</label>
                    <p class="text-lg font-normal text-zinc-100">${laporan.nama_penipu || '-'}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Jenis Rekening</label>
                    <p class="text-lg font-normal text-zinc-100">${laporan.jenis_rekening ? laporan.jenis_rekening.toUpperCase() : '-'}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Nomor Rekening</label>
                    <p class="text-lg font-normal text-zinc-100">${laporan.nomor_rekening || '-'}</p>
                </div>
            </div>
            
            <div>
                <label class="text-sm font-normal text-zinc-500 mb-2 block">Kronologi Penipuan</label>
                <div class="bg-zinc-800 rounded-lg p-4 border-l-2 border-zinc-600">
                    <p class="text-zinc-300 leading-relaxed whitespace-pre-line">${laporan.deskripsi}</p>
                </div>
            </div>
            
            ${laporan.admin_notes ? `
                <div>
                    <label class="text-sm font-normal text-zinc-500 mb-2 block">Catatan Admin</label>
                    <div class="bg-red-900/20 rounded-lg p-4 border-l-2 border-red-900/50">
                        <p class="text-zinc-300 leading-relaxed">${laporan.admin_notes}</p>
                    </div>
                </div>
            ` : ''}
            
            ${buktiHtml}
        </div>
    `;
    
    modal.classList.remove('hidden');
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

function showRejectModal(laporanId) {
    const modal = document.getElementById('rejectModal');
    const form = document.getElementById('rejectForm');
    form.action = `/admin/laporan/${laporanId}/reject`;
    modal.classList.remove('hidden');
}

function closeRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
    document.getElementById('admin_notes').value = '';
}

// Close modals on outside click
document.getElementById('detailModal').addEventListener('click', function(e) {
    if (e.target === this) closeDetailModal();
});

document.getElementById('rejectModal').addEventListener('click', function(e) {
    if (e.target === this) closeRejectModal();
});
</script>
@endpush
@endsection