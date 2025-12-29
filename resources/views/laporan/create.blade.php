@extends('layouts.app')

@section('title', 'Laporkan Nomor Penipu')

@section('content')
<div class="min-h-screen bg-zinc-950 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-zinc-900 rounded-3xl mb-6 border border-zinc-800">
                <svg class="w-10 h-10 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-zinc-100 mb-3 tracking-tight">Laporkan Nomor Penipu</h1>
            <p class="text-lg text-zinc-400 max-w-2xl mx-auto">Sistem pelaporan terpercaya untuk melindungi komunitas dari penipuan</p>
        </div>

        <!-- Main Card -->
        <div class="bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-800">
            <!-- Security Banner -->
            <div class="bg-zinc-800/50 border-l-4 border-orange-700 px-6 py-5">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-orange-400 text-sm mb-1">Perhatian Penting</p>
                        <p class="text-sm text-zinc-400 leading-relaxed">Pastikan informasi yang Anda berikan akurat. Laporan palsu dapat merugikan pihak lain dan melanggar hukum.</p>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-7">
                @csrf

                <!-- Reporter Info Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 pb-3 border-b border-zinc-800">
                        <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center border border-zinc-700">
                            <svg class="w-5 h-5 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-zinc-100">Informasi Pelapor</h2>
                    </div>

                    <div>
                        <label for="nama_pelapor" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Nama Lengkap
                        </label>
                        <input 
                            type="text" 
                            name="nama_pelapor" 
                            id="nama_pelapor"
                            value="{{ old('nama_pelapor') }}"
                            placeholder="Masukkan nama lengkap Anda"
                            class="w-full px-4 py-3.5 bg-zinc-950 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition text-zinc-100 placeholder-zinc-600 @error('nama_pelapor') border-red-700 bg-red-950/20 @enderror"
                            required
                        >
                        @error('nama_pelapor')
                            <p class="text-red-400 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Suspect Info Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 pb-3 border-b border-zinc-800">
                        <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center border border-zinc-700">
                            <svg class="w-5 h-5 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-zinc-100">Informasi Terlapor</h2>
                    </div>

                    <div>
                        <label for="nomor_telepon" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Nomor Telepon Penipu
                        </label>
                        <input 
                            type="text" 
                            name="nomor_telepon" 
                            id="nomor_telepon"
                            value="{{ old('nomor_telepon') }}"
                            placeholder="Contoh: 0812345678 atau +628123456789"
                            class="w-full px-4 py-3.5 bg-zinc-950 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition text-zinc-100 placeholder-zinc-600 @error('nomor_telepon') border-red-700 bg-red-950/20 @enderror"
                            required
                        >
                        @error('nomor_telepon')
                            <p class="text-red-400 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_penipu" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Nama Pelaku <span class="text-zinc-500 font-normal text-xs">(Jika diketahui)</span>
                        </label>
                        <input 
                            type="text" 
                            name="nama_penipu" 
                            id="nama_penipu"
                            value="{{ old('nama_penipu') }}"
                            placeholder="Nama atau identitas pelaku"
                            class="w-full px-4 py-3.5 bg-zinc-950 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition text-zinc-100 placeholder-zinc-600"
                        >
                    </div>
                </div>

                <!-- Banking Info Section -->
                <div class="bg-zinc-950 rounded-xl p-6 border border-zinc-800 space-y-5">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                        </svg>
                        <h3 class="text-sm font-bold text-zinc-200">Informasi Rekening/E-Wallet <span class="text-zinc-500 font-normal text-xs">(Opsional)</span></h3>
                    </div>
                    
                    <div>
                        <label for="jenis_rekening" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Jenis Akun
                        </label>
                        <select 
                            name="jenis_rekening" 
                            id="jenis_rekening"
                            class="w-full px-4 py-3.5 bg-zinc-900 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition text-zinc-100"
                        >
                            <option value="">Pilih jenis rekening atau e-wallet</option>
                            <option value="bca" {{ old('jenis_rekening') == 'bca' ? 'selected' : '' }}>🏦 BCA</option>
                            <option value="mandiri" {{ old('jenis_rekening') == 'mandiri' ? 'selected' : '' }}>🏦 Mandiri</option>
                            <option value="bri" {{ old('jenis_rekening') == 'bri' ? 'selected' : '' }}>🏦 BRI</option>
                            <option value="seabank" {{ old('jenis_rekening') == 'seabank' ? 'selected' : '' }}>🏦 SEABANK</option>
                            <option value="gopay" {{ old('jenis_rekening') == 'gopay' ? 'selected' : '' }}>💳 GoPay</option>
                            <option value="ovo" {{ old('jenis_rekening') == 'ovo' ? 'selected' : '' }}>💳 OVO</option>
                            <option value="dana" {{ old('jenis_rekening') == 'dana' ? 'selected' : '' }}>💳 DANA</option>
                            <option value="shopeepay" {{ old('jenis_rekening') == 'shopeepay' ? 'selected' : '' }}>💳 ShopeePay</option>
                            <option value="lainnya" {{ old('jenis_rekening') == 'lainnya' ? 'selected' : '' }}>🔹 Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label for="nomor_rekening" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Nomor Rekening/E-Wallet
                        </label>
                        <input 
                            type="text" 
                            name="nomor_rekening" 
                            id="nomor_rekening"
                            value="{{ old('nomor_rekening') }}"
                            placeholder="Nomor rekening atau ID e-wallet"
                            class="w-full px-4 py-3.5 bg-zinc-900 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition text-zinc-100 placeholder-zinc-600"
                        >
                    </div>
                </div>

                <!-- Incident Report Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 pb-3 border-b border-zinc-800">
                        <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center border border-zinc-700">
                            <svg class="w-5 h-5 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-zinc-100">Kronologi Kejadian</h2>
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Detail Kronologi
                        </label>
                        <textarea 
                            name="deskripsi" 
                            id="deskripsi"
                            rows="7"
                            placeholder="Jelaskan secara detail kronologi kejadian penipuan yang Anda alami. Semakin lengkap informasinya, semakin membantu proses verifikasi..."
                            class="w-full px-4 py-3.5 bg-zinc-950 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition resize-none text-zinc-100 placeholder-zinc-600 @error('deskripsi') border-red-700 bg-red-950/20 @enderror"
                            required
                        >{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-400 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Evidence Upload Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                        </svg>
                        <label class="block text-sm font-bold text-zinc-200">
                            Bukti Pendukung <span class="text-zinc-500 font-normal text-xs">(Opsional - Maks 10 gambar)</span>
                        </label>
                    </div>
                    
                    <div class="border-2 border-dashed border-zinc-800 rounded-xl p-10 text-center hover:border-zinc-700 hover:bg-zinc-900/50 transition-all cursor-pointer bg-zinc-950">
                        <input 
                            type="file" 
                            name="bukti[]" 
                            id="bukti"
                            accept="image/jpeg,image/jpg,image/png"
                            multiple
                            class="hidden"
                            onchange="previewImages(event)"
                        >
                        <label for="bukti" class="cursor-pointer block">
                            <div class="w-16 h-16 bg-zinc-800 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-zinc-700">
                                <svg class="w-8 h-8 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                            </div>
                            <p class="text-zinc-200 font-semibold mb-1 text-base">Upload Screenshot atau Foto Bukti</p>
                            <p class="text-sm text-zinc-500">JPG, JPEG, PNG • Maksimal 5MB per file</p>
                        </label>
                    </div>
                    <div id="preview" class="grid grid-cols-3 gap-4 mt-4"></div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 pt-6 border-t border-zinc-800">
                    <button 
                        type="submit"
                        class="flex-1 bg-red-900/50 text-red-100 px-6 py-4 rounded-xl font-bold text-base hover:bg-red-900/70 focus:ring-1 focus:ring-red-800 transition-all border border-red-800/50 transform hover:-translate-y-0.5"
                    >
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Kirim Laporan
                        </span>
                    </button>
                    <a 
                        href="{{ url('/') }}"
                        class="flex-1 bg-zinc-800 text-zinc-100 px-6 py-4 rounded-xl font-bold text-base hover:bg-zinc-700 focus:ring-1 focus:ring-zinc-700 text-center transition-all flex items-center justify-center gap-2 border border-zinc-700"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function previewImages(event) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';
    const files = event.target.files;
    
    if (files.length > 10) {
        alert('Maksimal 10 gambar!');
        event.target.value = '';
        return;
    }
    
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        if (file.size > 5242880) {
            alert('Ukuran file maksimal 5MB!');
            event.target.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative group';
            div.innerHTML = `
                <img src="${e.target.result}" class="w-full h-32 object-cover rounded-xl border border-zinc-800">
                <div class="absolute inset-0 bg-zinc-700/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span class="absolute top-2 right-2 bg-green-600 text-white text-xs font-bold px-2.5 py-1 rounded-lg flex items-center gap-1 border border-green-500">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                    </svg>
                    Siap
                </span>
            `;
            preview.appendChild(div);
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush
@endsection