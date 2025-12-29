@extends('layouts.app')

@section('title', 'Cari Nomor Penipu')

@section('content')
<div class="min-h-screen bg-zinc-950 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-zinc-900 rounded-xl mb-3 border border-zinc-800">
                <svg class="w-7 h-7 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-zinc-100 mb-2">
                Sistem Verifikasi Nomor
            </h1>
            <p class="text-sm text-zinc-400 max-w-2xl mx-auto">
                Database terpercaya untuk mengidentifikasi nomor telepon mencurigakan
            </p>
        </div>

        <!-- Search Box -->
        <div class="bg-zinc-900 rounded-lg p-4 mb-5 border border-zinc-800">
            <form action="{{ route('cari.index') }}" method="GET" class="flex flex-col sm:flex-row gap-2">
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Masukkan nomor telepon"
                        class="w-full pl-10 pr-3 py-2 bg-zinc-950 border border-zinc-800 rounded-lg focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 text-sm transition-all text-zinc-100 placeholder-zinc-600"
                        required
                    >
                </div>
                <button 
                    type="submit"
                    class="bg-zinc-800 text-zinc-100 px-6 py-2 rounded-lg font-semibold hover:bg-zinc-700 focus:ring-1 focus:ring-zinc-700 transition-all border border-zinc-700 flex items-center justify-center text-sm"
                >
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Verifikasi
                </button>
            </form>
        </div>

        <!-- Search Results -->
        @if(request('search'))
            @if($laporans->count() > 0)
                <!-- Danger Alert - Simple Version -->
                <div class="bg-zinc-800/50 border-l-4 border-red-700 px-6 py-5 mb-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"/>
                            </svg>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="font-semibold text-red-400 text-sm mb-1">Nomor Terindikasi Penipuan</p>
                            <p class="text-sm text-zinc-300 mb-2">
                                Nomor <span class="font-mono font-semibold text-red-300">{{ request('search') }}</span> telah dilaporkan sebanyak <span class="font-semibold">{{ $laporans->count() }} kali</span> dalam database kami.
                            </p>
                            <p class="text-sm text-zinc-400 leading-relaxed">
                                Kami menyarankan untuk tidak melakukan transaksi dengan nomor ini. Jangan berikan data pribadi atau melakukan transfer uang.
                            </p>
                        </div>
                    </div>
                </div>

            @else
                <!-- Safe Alert - Simple Version -->
                <div class="bg-zinc-800/50 border-l-4 border-green-700 px-6 py-5 mb-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                            </svg>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="font-semibold text-green-400 text-sm mb-1">Nomor Tidak Terdaftar</p>
                            <p class="text-sm text-zinc-300 mb-3">
                                Nomor <span class="font-mono font-semibold text-green-300">{{ request('search') }}</span> tidak ditemukan dalam database penipuan kami.
                            </p>
                            <p class="text-sm text-zinc-400 leading-relaxed mb-3">
                                Meskipun nomor ini belum terdaftar, tetap berhati-hati dengan nomor tidak dikenal. Jika menemukan aktivitas mencurigakan, segera laporkan kepada kami.
                            </p>
                            <a 
                                href="{{ route('laporan.create') }}" 
                                class="inline-flex items-center space-x-2 bg-zinc-700 text-zinc-100 px-4 py-2 rounded-lg text-sm font-medium hover:bg-zinc-600 transition-all border border-zinc-600"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <span>Laporkan Nomor</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <!-- Info Cards Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <!-- Tips Card -->
            <div class="bg-zinc-900 rounded-lg p-5 border border-zinc-800">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center mr-3 border border-zinc-700">
                        <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-zinc-100">Panduan Keamanan</h3>
                </div>
                <ul class="space-y-2.5">
                    <li class="flex items-start group">
                        <div class="flex-shrink-0 w-5 h-5 bg-zinc-800 rounded-full flex items-center justify-center mr-2 mt-0.5 group-hover:bg-zinc-700 transition border border-zinc-700">
                            <svg class="w-3 h-3 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm text-zinc-300 leading-relaxed">Verifikasi nomor sebelum melakukan transaksi finansial</span>
                    </li>
                    <li class="flex items-start group">
                        <div class="flex-shrink-0 w-5 h-5 bg-zinc-800 rounded-full flex items-center justify-center mr-2 mt-0.5 group-hover:bg-zinc-700 transition border border-zinc-700">
                            <svg class="w-3 h-3 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm text-zinc-300 leading-relaxed">Jangan pernah membagikan PIN, OTP, atau password</span>
                    </li>
                    <li class="flex items-start group">
                        <div class="flex-shrink-0 w-5 h-5 bg-zinc-800 rounded-full flex items-center justify-center mr-2 mt-0.5 group-hover:bg-zinc-700 transition border border-zinc-700">
                            <svg class="w-3 h-3 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm text-zinc-300 leading-relaxed">Institusi resmi tidak pernah meminta data sensitif via telepon</span>
                    </li>
                    <li class="flex items-start group">
                        <div class="flex-shrink-0 w-5 h-5 bg-zinc-800 rounded-full flex items-center justify-center mr-2 mt-0.5 group-hover:bg-zinc-700 transition border border-zinc-700">
                            <svg class="w-3 h-3 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm text-zinc-300 leading-relaxed">Waspadai undian berhadiah dan skema investasi tidak jelas</span>
                    </li>
                    <li class="flex items-start group">
                        <div class="flex-shrink-0 w-5 h-5 bg-zinc-800 rounded-full flex items-center justify-center mr-2 mt-0.5 group-hover:bg-zinc-700 transition border border-zinc-700">
                            <svg class="w-3 h-3 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm text-zinc-300 leading-relaxed">Konfirmasi langsung melalui kanal resmi perusahaan</span>
                    </li>
                </ul>
            </div>

            <!-- Statistics Card -->
            <div class="bg-zinc-900 rounded-lg p-5 text-zinc-100 border border-zinc-800">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center mr-3 border border-zinc-700">
                        <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Data Statistik</h3>
                </div>
                <div class="space-y-3">
                    <div class="bg-zinc-950 rounded-lg p-3.5 hover:bg-zinc-800/50 transition border border-zinc-800">
                        <p class="text-zinc-400 text-xs mb-1 flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"/>
                            </svg>
                            Total Laporan
                        </p>
                        <p class="text-2xl font-bold">{{ number_format($totalLaporan) }}</p>
                    </div>
                    <div class="bg-zinc-950 rounded-lg p-3.5 hover:bg-zinc-800/50 transition border border-zinc-800">
                        <p class="text-zinc-400 text-xs mb-1 flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                            </svg>
                            Terverifikasi
                        </p>
                        <p class="text-2xl font-bold">{{ number_format($terverifikasi) }}</p>
                    </div>
                    <div class="bg-zinc-950 rounded-lg p-3.5 hover:bg-zinc-800/50 transition border border-zinc-800">
                        <p class="text-zinc-400 text-xs mb-1 flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z"/>
                            </svg>
                            Nomor Unik
                        </p>
                        <p class="text-2xl font-bold">{{ number_format($nomorUnik) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection