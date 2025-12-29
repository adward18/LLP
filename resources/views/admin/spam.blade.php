@extends('layouts.admin')

@section('title', 'Kelola Spam')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-medium text-zinc-100 mb-2">Kelola Spam</h1>
        <p class="text-zinc-400">Kelola laporan yang ditandai sebagai spam</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Total Spam</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $totalSpam ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Hari Ini</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $todaySpam ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Minggu Ini</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $weekSpam ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg overflow-hidden">
        @if($spams->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-zinc-900 border-b border-zinc-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Nomor Telepon</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Pelapor</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Nama Penipu</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Status Sebelumnya</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Dihapus</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @foreach($spams as $spam)
                    <tr class="hover:bg-zinc-800/50 transition-colors">
                        <td class="px-6 py-4 text-sm font-normal text-zinc-300">#{{ $spam->id }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-normal text-zinc-100">{{ $spam->nomor_telepon }}</div>
                            @if($spam->bukti_images)
                            <span class="inline-flex items-center gap-1 text-xs text-zinc-400 mt-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                                </svg>
                                {{ count(json_decode($spam->bukti_images)) }} bukti
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-300">{{ $spam->nama_pelapor }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-300">{{ $spam->nama_penipu ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @if($spam->status == 'pending')
                                <span class="inline-flex items-center gap-1 bg-zinc-800 text-zinc-400 px-3 py-1 rounded-full text-xs font-normal border border-zinc-700">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                                    </svg>
                                    Pending
                                </span>
                            @elseif($spam->status == 'approved')
                                <span class="inline-flex items-center gap-1 bg-zinc-800 text-zinc-300 px-3 py-1 rounded-full text-xs font-normal border border-zinc-700">
                                    <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                    </svg>
                                    Approved
                                </span>
                            @elseif($spam->status == 'rejected')
                                <span class="inline-flex items-center gap-1 bg-zinc-800 text-zinc-400 px-3 py-1 rounded-full text-xs font-normal border border-zinc-700">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                                    </svg>
                                    Rejected
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-400">
                            <div>{{ $spam->deleted_at->format('d M Y') }}</div>
                            <div class="text-xs text-zinc-600">{{ $spam->deleted_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <!-- View Detail -->
                                <button 
                                    onclick="showDetailModal({{ json_encode($spam) }})"
                                    class="inline-flex items-center justify-center w-8 h-8 bg-zinc-800 hover:bg-zinc-700 text-zinc-400 rounded-lg transition-colors border border-zinc-700"
                                    title="Lihat Detail"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>

                                <!-- Restore -->
                                <form action="{{ route('admin.spam.restore', $spam->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button 
                                        type="submit"
                                        onclick="return confirm('Restore laporan ini?')"
                                        class="inline-flex items-center justify-center w-8 h-8 bg-zinc-800 hover:bg-zinc-700 text-zinc-400 rounded-lg transition-colors border border-zinc-700"
                                        title="Restore"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                    </button>
                                </form>

                                <!-- Force Delete -->
                                <form action="{{ route('admin.spam.forceDelete', $spam->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit"
                                        onclick="return confirm('HAPUS PERMANEN? Tidak bisa dikembalikan!')"
                                        class="inline-flex items-center justify-center w-8 h-8 bg-red-900/50 hover:bg-red-800/50 text-zinc-300 rounded-lg transition-colors border border-red-900/30"
                                        title="Hapus Permanen"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
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
        @if($spams->hasPages())
        <div class="px-6 py-4 border-t border-zinc-800">
            {{ $spams->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-16">
            <svg class="w-20 h-20 text-zinc-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            <p class="text-zinc-400 text-lg font-normal">Tidak ada spam</p>
        </div>
        @endif
    </div>
</div>

<!-- Detail Modal -->
<div id="detailModal" class="hidden fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4">
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-zinc-900 border-b border-zinc-800 px-6 py-4 flex justify-between items-center">
            <h3 class="text-2xl font-medium text-zinc-100">Detail Laporan Spam</h3>
            <button onclick="closeDetailModal()" class="text-zinc-500 hover:text-zinc-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div id="detailContent" class="p-6"></div>
    </div>
</div>

@push('scripts')
<script>
function showDetailModal(spam) {
    const modal = document.getElementById('detailModal');
    const content = document.getElementById('detailContent');
    
    let buktiHtml = '';
    if (spam.bukti_images) {
        const images = JSON.parse(spam.bukti_images);
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
            <!-- Warning Banner -->
            <div class="bg-red-900/20 rounded-lg p-4 border-l-2 border-red-900/50">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p class="text-sm text-zinc-300">Laporan ini telah ditandai sebagai SPAM</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-normal text-zinc-500">Nomor Telepon</label>
                    <p class="text-lg font-normal text-zinc-100">${spam.nomor_telepon}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Status Sebelumnya</label>
                    <p class="text-lg font-normal text-zinc-100">${spam.status}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Pelapor</label>
                    <p class="text-lg font-normal text-zinc-100">${spam.nama_pelapor}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Nama Penipu</label>
                    <p class="text-lg font-normal text-zinc-100">${spam.nama_penipu || '-'}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Jenis Rekening</label>
                    <p class="text-lg font-normal text-zinc-100">${spam.jenis_rekening ? spam.jenis_rekening.toUpperCase() : '-'}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Nomor Rekening</label>
                    <p class="text-lg font-normal text-zinc-100">${spam.nomor_rekening || '-'}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Dilaporkan</label>
                    <p class="text-lg font-normal text-zinc-100">${new Date(spam.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</p>
                </div>
                <div>
                    <label class="text-sm font-normal text-zinc-500">Dihapus</label>
                    <p class="text-lg font-normal text-zinc-100">${new Date(spam.deleted_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</p>
                </div>
            </div>
            
            <div>
                <label class="text-sm font-normal text-zinc-500 mb-2 block">Kronologi Penipuan</label>
                <div class="bg-zinc-800 rounded-lg p-4 border-l-2 border-zinc-600">
                    <p class="text-zinc-300 leading-relaxed whitespace-pre-line">${spam.deskripsi}</p>
                </div>
            </div>
            
            ${spam.admin_notes ? `
                <div>
                    <label class="text-sm font-normal text-zinc-500 mb-2 block">Catatan Admin</label>
                    <div class="bg-red-900/20 rounded-lg p-4 border-l-2 border-red-900/50">
                        <p class="text-zinc-300 leading-relaxed">${spam.admin_notes}</p>
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

// Close modal on outside click
document.getElementById('detailModal').addEventListener('click', function(e) {
    if (e.target === this) closeDetailModal();
});
</script>
@endpush
@endsection