@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="py-16 md:py-24 bg-zinc-950">
        <div class="max-w-5xl mx-auto px-4 text-center">
            
            <!-- Icon -->
            <div class="inline-flex items-center justify-center w-20 h-20 bg-zinc-900 rounded-2xl mb-6 border border-zinc-800">
                <svg class="w-10 h-10 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            
            <!-- Heading -->
            <h1 class="text-4xl md:text-6xl font-bold mb-4 text-zinc-100 leading-tight">
                Lindungi Diri dari <br>
                <span class="text-zinc-400">Penipuan Telepon</span>
            </h1>
            
            <!-- Description -->
            <p class="text-lg md:text-xl text-zinc-400 mb-8 max-w-3xl mx-auto">
                Platform terpercaya untuk melaporkan dan mengecek nomor telepon penipu. 
                Bersama-sama kita ciptakan komunitas yang lebih aman.
            </p>
            
            <!-- Buttons -->
            <div class="flex flex-wrap gap-4 justify-center mb-10">
                <a href="/laporan" class="px-6 py-3 bg-red-900/50 text-red-100 rounded-lg hover:bg-red-900/70 transition font-medium border border-red-800/50 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    Laporkan Nomor Penipu
                </a>
                <a href="/cari-nomor" class="px-6 py-3 bg-zinc-800 text-zinc-100 rounded-lg hover:bg-zinc-700 transition font-medium border border-zinc-700 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Cek Nomor Penipu
                </a>
            </div>

            <!-- Trust Badges -->
            <div class="flex flex-wrap justify-center gap-6 text-sm">
                <div class="flex items-center gap-2 bg-zinc-900 px-4 py-2 rounded-lg border border-zinc-800">
                    <div class="w-8 h-8 bg-zinc-800 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <span class="font-medium text-zinc-300">Terverifikasi Admin</span>
                </div>
                <div class="flex items-center gap-2 bg-zinc-900 px-4 py-2 rounded-lg border border-zinc-800">
                    <div class="w-8 h-8 bg-zinc-800 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <span class="font-medium text-zinc-300">100% Transparan</span>
                </div>
                <div class="flex items-center gap-2 bg-zinc-900 px-4 py-2 rounded-lg border border-zinc-800">
                    <div class="w-8 h-8 bg-zinc-800 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                    </div>
                    <span class="font-medium text-zinc-300">Gratis Selamanya</span>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="cara-kerja" class="bg-zinc-900/50 py-16">
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="inline-block bg-zinc-800 text-zinc-300 px-4 py-2 rounded-full text-sm font-medium mb-3 border border-zinc-700">
                    Cara Kerja
                </span>
                <h2 class="text-3xl font-bold mb-2 text-zinc-100">Tiga Langkah Mudah</h2>
                <p class="text-zinc-400">Proses sederhana untuk melindungi diri dari penipuan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Step 1 -->
                <div class="bg-zinc-900 rounded-lg p-6 border border-zinc-800 hover:border-zinc-700 transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center text-zinc-300 font-bold text-lg border border-zinc-700">
                            1
                        </div>
                        <h3 class="text-lg font-bold text-zinc-100">Laporkan</h3>
                    </div>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Kirim laporan nomor telepon yang mencurigakan dengan bukti pendukung
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="bg-zinc-900 rounded-lg p-6 border border-zinc-800 hover:border-zinc-700 transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center text-zinc-300 font-bold text-lg border border-zinc-700">
                            2
                        </div>
                        <h3 class="text-lg font-bold text-zinc-100">Verifikasi</h3>
                    </div>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Tim admin memeriksa dan memverifikasi laporan untuk keakuratan data
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="bg-zinc-900 rounded-lg p-6 border border-zinc-800 hover:border-zinc-700 transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center text-zinc-300 font-bold text-lg border border-zinc-700">
                            3
                        </div>
                        <h3 class="text-lg font-bold text-zinc-100">Publikasi</h3>
                    </div>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Data terverifikasi masuk database dan bisa dicek oleh siapa saja
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection