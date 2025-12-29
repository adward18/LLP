@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
        <h1 class="text-4xl font-bold text-zinc-100 mb-4">Tentang Kami</h1>
        <p class="text-lg text-zinc-300">Platform verifikasi nomor telepon dan rekening untuk melindungi komunitas dari penipuan online</p>
    </section>

    <!-- Main Content -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <!-- Latar Belakang -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8 mb-6">
            <h2 class="text-2xl font-semibold text-zinc-100 mb-4">Latar Belakang</h2>
            <p class="text-zinc-400 leading-relaxed mb-4">
                Berawal dari meningkatnya kasus penipuan jual-beli online di komunitas Facebook kami, banyak anggota yang mengalami kerugian akibat bertransaksi dengan nomor telepon dan rekening bank yang tidak terverifikasi.
            </p>
            <p class="text-zinc-400 leading-relaxed">
                Kami menciptakan platform ini sebagai solusi digitalisasi dari pencatatan manual di Excel dan gambar. Database terstruktur ini memudahkan siapa saja untuk mencari dan memverifikasi nomor sebelum melakukan transaksi.
            </p>
        </div>

        <!-- Tujuan -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8 mb-6">
            <h2 class="text-2xl font-semibold text-zinc-100 mb-4">Tujuan Platform</h2>
            <ul class="space-y-3">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-zinc-400">Membantu masyarakat terhindar dari penipuan dengan database nomor terverifikasi</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-zinc-400">Menyediakan akses mudah dan cepat untuk pengecekan nomor</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-zinc-400">Membangun komunitas yang saling membantu dalam keamanan transaksi online</span>
                </li>
            </ul>
        </div>

        <!-- Cara Kerja -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8 mb-6">
            <h2 class="text-2xl font-semibold text-zinc-100 mb-6">Cara Kerja</h2>
            <div class="space-y-6">
                <div class="flex">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-300 font-semibold">1</div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-zinc-300 mb-1">Pencarian Nomor</h3>
                        <p class="text-zinc-500">Pengguna memasukkan nomor telepon atau rekening yang ingin diverifikasi di halaman utama</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-300 font-semibold">2</div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-zinc-300 mb-1">Pengecekan Database</h3>
                        <p class="text-zinc-500">Sistem melakukan pengecekan terhadap database laporan yang telah terverifikasi</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-300 font-semibold">3</div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-zinc-300 mb-1">Hasil Verifikasi</h3>
                        <p class="text-zinc-500">Sistem menampilkan status: nomor aman (tidak terdaftar) atau waspada (terdaftar dalam laporan)</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-300 font-semibold">4</div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-zinc-300 mb-1">Verifikasi Admin</h3>
                        <p class="text-zinc-500">Setiap laporan yang masuk akan diverifikasi oleh admin secara manual untuk memastikan keakuratan data</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-zinc-100 mb-2">{{ number_format($verifiedReports) }}</div>
                <div class="text-zinc-500">Laporan Terverifikasi</div>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-zinc-100 mb-2">102</div>
                <div class="text-zinc-500">Pencarian Dilakukan</div>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6 text-center">
                <div class="text-3xl font-bold text-zinc-100 mb-2">4,904</div>
                <div class="text-zinc-500">Member Komunitas</div>
            </div>
        </div>

        <!-- Disclaimer -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8 mb-6">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h2 class="text-xl font-semibold text-zinc-100 mb-3">Disclaimer & Keterbatasan</h2>
                    <ul class="space-y-2 text-zinc-400">
                        <li>• Database ini berdasarkan laporan dari komunitas dan telah melalui verifikasi admin</li>
                        <li>• Nomor yang belum terdaftar dalam database tidak menjamin keamanan 100%</li>
                        <li>• Kami menyarankan untuk tetap melakukan due diligence sendiri sebelum bertransaksi</li>
                        <li>• Platform ini tidak bertanggung jawab atas kerugian yang terjadi di luar informasi yang kami sediakan</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Komunitas -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-zinc-100 mb-4">Bergabung dengan Komunitas</h2>
            <p class="text-zinc-400 mb-6">
                Platform ini dikelola oleh komunitas Facebook dengan 890+ member aktif yang saling membantu dalam keamanan transaksi online. Bergabunglah untuk mendapatkan update terbaru tentang modus penipuan dan tips transaksi aman.
            </p>
            <a href="https://www.facebook.com/share/g/1NhgcCuzzd/" target="_blank" class="inline-block bg-zinc-800 hover:bg-zinc-700 text-zinc-100 px-6 py-3 rounded-lg border border-zinc-700 transition-colors">
                Gabung Grup Facebook
            </a>
        </div>
    </section>
@endsection