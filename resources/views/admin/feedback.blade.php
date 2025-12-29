@extends('layouts.admin')

@section('title', 'Feedback Pengguna')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-medium text-zinc-100 mb-2">Feedback Pengguna</h1>
        <p class="text-zinc-400">Kelola feedback dari pengguna terkait laporan</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Total Feedback</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $totalFeedback ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Rating Rata-rata</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ number_format($avgRating ?? 0, 1) }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Feedback Hari Ini</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $todayFeedback ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter by Rating -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 mb-8">
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.feedback') }}" class="px-6 py-3 rounded-lg font-normal transition-colors {{ !request('rating') ? 'bg-zinc-800 text-zinc-100 border border-zinc-700' : 'bg-zinc-900 text-zinc-400 border border-zinc-800 hover:bg-zinc-800/50' }}">
                Semua Rating
            </a>
            @for($i = 5; $i >= 1; $i--)
            <a href="{{ route('admin.feedback', ['rating' => $i]) }}" class="px-6 py-3 rounded-lg font-normal transition-colors flex items-center gap-2 {{ request('rating') == $i ? 'bg-zinc-800 text-zinc-100 border border-zinc-700' : 'bg-zinc-900 text-zinc-400 border border-zinc-800 hover:bg-zinc-800/50' }}">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                {{ $i }} Bintang
            </a>
            @endfor
        </div>
    </div>

    <!-- Feedback Table -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg overflow-hidden">
        @if($feedbacks->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-zinc-900 border-b border-zinc-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Nomor Laporan</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Pelapor</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-normal text-zinc-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @foreach($feedbacks as $feedback)
                    <tr class="hover:bg-zinc-800/50 transition-colors">
                        <td class="px-6 py-4 text-sm font-normal text-zinc-300">#{{ $feedback->id }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-normal text-zinc-100">{{ $feedback->laporan->nomor_telepon }}</div>
                            <div class="text-xs text-zinc-500">Laporan #{{ $feedback->laporan_id }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-normal text-zinc-100">{{ $feedback->laporan->nama_pelapor }}</div>
                            <div class="text-xs text-zinc-500">{{ $feedback->email ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $feedback->rating ? 'text-zinc-400' : 'text-zinc-700' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                                <span class="ml-2 text-sm font-normal text-zinc-300">{{ $feedback->rating }}/5</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-zinc-400">
                            <div>{{ $feedback->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-zinc-600">{{ $feedback->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <button 
                                onclick="showFeedbackModal({{ json_encode($feedback) }})"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 rounded-lg font-normal transition-colors border border-zinc-700"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat Feedback
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($feedbacks->hasPages())
        <div class="px-6 py-4 border-t border-zinc-800">
            {{ $feedbacks->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-16">
            <svg class="w-20 h-20 text-zinc-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
            </svg>
            <p class="text-zinc-400 text-lg font-normal">Belum ada feedback</p>
        </div>
        @endif
    </div>
</div>

<!-- Feedback Detail Modal -->
<div id="feedbackModal" class="hidden fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4">
    <div class="bg-zinc-900 border border-zinc-800 rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-zinc-900 border-b border-zinc-800 px-6 py-4 flex justify-between items-center">
            <h3 class="text-2xl font-medium text-zinc-100">Detail Feedback</h3>
            <button onclick="closeFeedbackModal()" class="text-zinc-500 hover:text-zinc-400 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div id="feedbackContent" class="p-6"></div>
    </div>
</div>

@push('scripts')
<script>
function showFeedbackModal(feedback) {
    const modal = document.getElementById('feedbackModal');
    const content = document.getElementById('feedbackContent');
    
    const stars = Array.from({length: 5}, (_, i) => {
        const filled = i < feedback.rating;
        return `<svg class="w-6 h-6 ${filled ? 'text-zinc-400' : 'text-zinc-700'}" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
        </svg>`;
    }).join('');
    
    content.innerHTML = `
        <div class="space-y-6">
            <!-- Rating -->
            <div class="bg-zinc-800 rounded-lg p-6 border border-zinc-700">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="font-normal text-zinc-100">Rating Pengguna</h4>
                    <span class="text-2xl font-medium text-zinc-100">${feedback.rating}/5</span>
                </div>
                <div class="flex gap-1">
                    ${stars}
                </div>
            </div>
            
            <!-- Laporan Info -->
            <div class="bg-zinc-800 rounded-lg p-6 border border-zinc-700">
                <h4 class="font-normal text-zinc-100 mb-4">Informasi Laporan</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-normal text-zinc-500">Nomor Terlapor</label>
                        <p class="text-lg font-normal text-zinc-100">${feedback.laporan.nomor_telepon}</p>
                    </div>
                    <div>
                        <label class="text-sm font-normal text-zinc-500">ID Laporan</label>
                        <p class="text-lg font-normal text-zinc-100">#${feedback.laporan_id}</p>
                    </div>
                    <div>
                        <label class="text-sm font-normal text-zinc-500">Nama Pelapor</label>
                        <p class="text-lg font-normal text-zinc-100">${feedback.laporan.nama_pelapor}</p>
                    </div>
                    <div>
                        <label class="text-sm font-normal text-zinc-500">Status Laporan</label>
                        <p class="text-lg font-normal text-zinc-100">${feedback.laporan.status}</p>
                    </div>
                </div>
            </div>
            
            <!-- Feedback Comments -->
            ${feedback.comments ? `
                <div>
                    <h4 class="font-normal text-zinc-100 mb-3">Komentar Feedback</h4>
                    <div class="bg-zinc-800 rounded-lg p-6 border-l-2 border-zinc-600">
                        <p class="text-zinc-300 leading-relaxed whitespace-pre-line">${feedback.comments}</p>
                    </div>
                </div>
            ` : `
                <div class="bg-zinc-800 rounded-lg p-6 text-center border border-zinc-700">
                    <svg class="w-12 h-12 text-zinc-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <p class="text-zinc-500 font-normal">Tidak ada komentar</p>
                </div>
            `}
            
            <!-- Timestamp -->
            <div class="text-center pt-4 border-t border-zinc-800">
                <p class="text-sm text-zinc-500">
                    Feedback diberikan pada <span class="font-normal text-zinc-400">${new Date(feedback.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' })}</span>
                </p>
            </div>
        </div>
    `;
    
    modal.classList.remove('hidden');
}

function closeFeedbackModal() {
    document.getElementById('feedbackModal').classList.add('hidden');
}

// Close modal on outside click
document.getElementById('feedbackModal').addEventListener('click', function(e) {
    if (e.target === this) closeFeedbackModal();
});
</script>
@endpush
@endsection