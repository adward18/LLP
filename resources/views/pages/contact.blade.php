@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
        <h1 class="text-4xl font-bold text-zinc-100 mb-4">Hubungi Kami</h1>
        <p class="text-lg text-zinc-300">Butuh bantuan verifikasi atau ingin menggunakan layanan rekber terpercaya? Kami siap membantu</p>
    </section>

    <!-- Main Content -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Contact Admin -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8">
                <div class="flex items-center mb-6">
                    <svg class="w-6 h-6 text-blue-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    <h2 class="text-2xl font-semibold text-zinc-100">Hubungi Admin</h2>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-zinc-300 font-medium mb-2">WhatsApp Admin</h3>
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-zinc-400 hover:text-zinc-100 transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            +62 812-3456-7890
                        </a>
                    </div>

                    <div>
                        <h3 class="text-zinc-300 font-medium mb-2">Email</h3>
                        <a href="mailto:admin@scamwatch.com" class="text-zinc-400 hover:text-zinc-100 transition-colors">
                            admin@scamwatch.com
                        </a>
                    </div>

                    <div>
                        <h3 class="text-zinc-300 font-medium mb-2">Jam Operasional</h3>
                        <p class="text-zinc-400">Senin - Jumat: 09.00 - 17.00 WIB</p>
                        <p class="text-zinc-500 text-sm mt-1">Respon maksimal 1x24 jam</p>
                    </div>

                    <div class="pt-4 border-t border-zinc-800">
                        <h3 class="text-zinc-300 font-medium mb-2">Keperluan yang Bisa Dibantu:</h3>
                        <ul class="text-zinc-400 space-y-1 text-sm">
                            <li>• Verifikasi laporan penipuan</li> 
                            <li>• Rekber melalui admin kami</li>
                            <li>• Pertanyaan umum seputar platform</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Laporkan Nomor -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8">
                <div class="flex items-center mb-6">
                    <svg class="w-6 h-6 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <h2 class="text-2xl font-semibold text-zinc-100">Laporkan Nomor Penipu</h2>
                </div>

                <p class="text-zinc-400 mb-6">
                    Jika Anda menjadi korban penipuan, segera laporkan kepada kami. Setiap laporan akan diverifikasi oleh admin sebelum masuk ke database.
                </p>

                <div class="space-y-4">
                    <div class="bg-zinc-950 border border-zinc-800 rounded-lg p-4">
                        <h3 class="text-zinc-300 font-medium mb-2">Yang Perlu Disiapkan:</h3>
                        <ul class="text-zinc-400 space-y-1 text-sm">
                            <li>• Nomor telepon/rekening penipu</li>
                            <li>• Nama pelaku (jika ada)</li>
                            <li>• Bukti screenshot percakapan</li>
                            <li>• Kronologi kejadian</li>
                        </ul>
                    </div>

                    <a href="/submit-report" class="block w-full bg-red-900/50 hover:bg-red-800/50 text-zinc-100 text-center px-6 py-3 rounded-lg border border-red-800/50 transition-colors">
                        Submit Laporan
                    </a>

                    <p class="text-zinc-500 text-sm text-center">
                        Laporan Anda akan diproses dalam 1-2 hari kerja
                    </p>
                </div>
            </div>
        </div>

        <!-- Tips & Panduan -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8 mt-6">
            <div class="flex items-center mb-6">
                <svg class="w-6 h-6 text-blue-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-2xl font-semibold text-zinc-100">Tips Transaksi Aman</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-zinc-950 border border-zinc-800 rounded-lg p-4">
                    <h3 class="text-zinc-300 font-medium mb-2 flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Lakukan:
                    </h3>
                    <ul class="text-zinc-400 text-sm space-y-1">
                        <li>• Cek nomor di platform ini sebelum transaksi</li>
                        <li>• Gunakan rekber untuk transaksi besar</li>
                        <li>• Minta bukti identitas dan foto barang</li>
                        <li>• Simpan semua bukti percakapan</li>
                    </ul>
                </div>

                <div class="bg-zinc-950 border border-zinc-800 rounded-lg p-4">
                    <h3 class="text-zinc-300 font-medium mb-2 flex items-center">
                        <svg class="w-4 h-4 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        Hindari:
                    </h3>
                    <ul class="text-zinc-400 text-sm space-y-1">
                        <li>• Transfer langsung tanpa jaminan</li>
                        <li>• Percaya janji "trusted" tanpa bukti</li>
                        <li>• Memberikan OTP atau PIN</li>
                        <li>• Terburu-buru dalam transaksi</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection