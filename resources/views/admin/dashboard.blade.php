@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-medium text-zinc-100 mb-2">Dashboard Admin</h1>
        <p class="text-zinc-400">Selamat datang, <span class="font-normal text-zinc-300">{{ auth('admin')->user()->name }}</span></p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Laporan -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Total Laporan</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $totalLaporan }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pending -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Menunggu Verifikasi</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $pending }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Approved -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Disetujui</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $approved }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Rejected -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 transition-colors hover:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-500 text-sm font-normal mb-1">Ditolak</p>
                    <p class="text-3xl font-medium text-zinc-100">{{ $rejected }}</p>
                </div>
                <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Laporan Trend Chart -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6">
            <div class="mb-4">
                <h3 class="text-xl font-medium text-zinc-100 mb-1">Tren Laporan (7 Hari)</h3>
                <p class="text-sm text-zinc-500">Monitoring laporan berdasarkan status</p>
            </div>
            <div class="relative" style="height: 300px;">
                <canvas id="reportChart"></canvas>
                <div id="noDataMessage" class="absolute inset-0 flex flex-col items-center justify-center text-center" style="display: none;">
                    <svg class="w-16 h-16 text-zinc-700 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <p class="text-zinc-400 font-normal">Belum ada data laporan</p>
                    <p class="text-zinc-600 text-sm mt-1">Data akan muncul setelah ada laporan masuk</p>
                </div>
            </div>
        </div>

        <!-- Feedback Summary -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6">
            <h3 class="text-xl font-medium text-zinc-100 mb-4">Feedback Pengguna</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center p-4 bg-zinc-800 rounded-lg border border-zinc-700">
                    <span class="text-zinc-400 font-normal">Total Feedback</span>
                    <span class="font-medium text-zinc-100 text-2xl">{{ $totalFeedback ?? 0 }}</span>
                </div>
                <div class="flex justify-between items-center p-4 bg-zinc-800 rounded-lg border border-zinc-700">
                    <span class="text-zinc-400 font-normal">Rating Rata-rata</span>
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-zinc-100 text-2xl">{{ number_format($avgRating ?? 0, 1) }}</span>
                        <svg class="w-6 h-6 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <div class="pt-4 border-t border-zinc-800">
                    <p class="text-zinc-300 font-normal text-sm mb-3">Distribusi Rating</p>
                    @for($i = 5; $i >= 1; $i--)
                    <div class="flex items-center mb-2">
                        <span class="text-sm text-zinc-400 w-12 font-normal">{{ $i }}</span>
                        <svg class="w-4 h-4 text-zinc-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <div class="flex-1 bg-zinc-800 rounded-full h-2 mx-2">
                            <div class="bg-zinc-600 h-2 rounded-full transition-all" style="width: {{ ($ratingDistribution[$i] ?? 0) }}%"></div>
                        </div>
                        <span class="text-sm text-zinc-400 w-12 text-right font-normal">{{ $ratingDistribution[$i] ?? 0 }}%</span>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    window.chartData = {!! json_encode($chartData ?? ['labels' => [], 'pending' => [], 'approved' => [], 'rejected' => []]) !!};
</script>
<script src="{{ asset('js/chart.js') }}"></script>

@endsection