@extends('layouts.app')

@section('title', 'Berikan Feedback')

@section('content')
<div class="min-h-screen bg-zinc-950 py-6 sm:py-12 px-3 sm:px-4 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Info Card -->
        <div class="bg-zinc-900 rounded-xl sm:rounded-2xl overflow-hidden border border-zinc-800 mb-4 sm:mb-6">
            <div class="p-4 sm:p-8">
                <div class="bg-zinc-800/50 border-l-4 border-blue-700 rounded-lg p-3 sm:p-5 mb-4 sm:mb-6">
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-zinc-800 rounded-lg flex items-center justify-center flex-shrink-0 border border-zinc-700">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-zinc-100 mb-1 text-sm sm:text-base">Laporan Anda Sedang Diproses</p>
                            <p class="text-zinc-400 text-xs sm:text-sm leading-relaxed">Tim verifikasi kami akan meninjau laporan dalam 1-2 hari kerja. Jika disetujui, nomor akan tampil di database pencarian.</p>
                        </div>
                    </div>
                </div>

                <!-- Process Steps - Mobile: Vertical, Tablet+: Horizontal -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-6 sm:mb-8">
                    <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-zinc-800 rounded-xl flex items-center justify-center flex-shrink-0 sm:mx-auto sm:mb-2 border border-zinc-700">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-zinc-300">Laporan Diterima</p>
                    </div>
                    <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-zinc-800 rounded-xl flex items-center justify-center flex-shrink-0 sm:mx-auto sm:mb-2 border border-zinc-700">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-zinc-300">Verifikasi (1-2 Hari)</p>
                    </div>
                    <div class="flex sm:flex-col items-center sm:text-center gap-3 sm:gap-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-zinc-800 rounded-xl flex items-center justify-center flex-shrink-0 sm:mx-auto sm:mb-2 border border-zinc-700">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-zinc-300">Publikasi Database</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feedback Form Card -->
        <div class="bg-zinc-900 rounded-xl sm:rounded-2xl overflow-hidden border border-zinc-800">
            <div class="p-4 sm:p-8">
                <!-- Feedback Header -->
                <div class="flex items-center gap-2 sm:gap-3 mb-4 sm:mb-6 pb-4 sm:pb-6 border-b border-zinc-800">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-zinc-800 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 border border-zinc-700">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-zinc-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2 class="text-lg sm:text-2xl font-bold text-zinc-100">Berikan Feedback</h2>
                        <p class="text-zinc-400 text-xs sm:text-sm">Bantu kami meningkatkan layanan (Opsional)</p>
                    </div>
                </div>

                <form action="{{ route('feedback.store') }}" method="POST" class="space-y-5 sm:space-y-7">
                    @csrf
                    <input type="hidden" name="laporan_id" value="{{ $laporanId ?? '' }}">

                    <!-- Rating Section -->
                    <div>
                        <label class="block text-zinc-200 font-bold mb-3 sm:mb-4 text-sm sm:text-base">
                            Seberapa mudah proses pelaporan?
                        </label>
                        <div class="bg-zinc-950 rounded-xl p-4 sm:p-6 border border-zinc-800">
                            <div class="flex justify-center items-center space-x-3 sm:space-x-6">
                                <input type="radio" name="rating" value="1" id="rating1" class="hidden peer/1" required>
                                <label for="rating1" class="text-3xl sm:text-5xl cursor-pointer hover:scale-110 sm:hover:scale-125 transition-all peer-checked/1:scale-125 sm:peer-checked/1:scale-150 peer-checked/1:drop-shadow-lg filter grayscale peer-checked/1:grayscale-0" title="Sangat Sulit">😞</label>

                                <input type="radio" name="rating" value="2" id="rating2" class="hidden peer/2">
                                <label for="rating2" class="text-3xl sm:text-5xl cursor-pointer hover:scale-110 sm:hover:scale-125 transition-all peer-checked/2:scale-125 sm:peer-checked/2:scale-150 peer-checked/2:drop-shadow-lg filter grayscale peer-checked/2:grayscale-0" title="Sulit">😕</label>

                                <input type="radio" name="rating" value="3" id="rating3" class="hidden peer/3">
                                <label for="rating3" class="text-3xl sm:text-5xl cursor-pointer hover:scale-110 sm:hover:scale-125 transition-all peer-checked/3:scale-125 sm:peer-checked/3:scale-150 peer-checked/3:drop-shadow-lg filter grayscale peer-checked/3:grayscale-0" title="Cukup">🙂</label>

                                <input type="radio" name="rating" value="4" id="rating4" class="hidden peer/4">
                                <label for="rating4" class="text-3xl sm:text-5xl cursor-pointer hover:scale-110 sm:hover:scale-125 transition-all peer-checked/4:scale-125 sm:peer-checked/4:scale-150 peer-checked/4:drop-shadow-lg filter grayscale peer-checked/4:grayscale-0" title="Mudah">😊</label>

                                <input type="radio" name="rating" value="5" id="rating5" class="hidden peer/5">
                                <label for="rating5" class="text-3xl sm:text-5xl cursor-pointer hover:scale-110 sm:hover:scale-125 transition-all peer-checked/5:scale-125 sm:peer-checked/5:scale-150 peer-checked/5:drop-shadow-lg filter grayscale peer-checked/5:grayscale-0" title="Sangat Mudah">😄</label>
                            </div>
                        </div>
                        @error('rating')
                            <p class="text-red-400 text-xs sm:text-sm mt-2 text-center font-medium flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Comment Section -->
                    <div>
                        <label for="komentar" class="block text-zinc-200 font-bold mb-2 sm:mb-3 text-sm sm:text-base">
                            Komentar atau Saran
                        </label>
                        <textarea 
                            name="komentar" 
                            id="komentar"
                            rows="4"
                            placeholder="Bagikan pengalaman atau saran Anda untuk membantu kami meningkatkan layanan..."
                            class="w-full px-3 sm:px-4 py-3 sm:py-3.5 bg-zinc-950 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition resize-none text-zinc-100 placeholder-zinc-600 text-sm sm:text-base"
                        >{{ old('komentar') }}</textarea>
                        <p class="text-zinc-500 text-xs mt-2 flex items-center gap-1">
                            <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                            </svg>
                            Feedback Anda sangat berharga untuk pengembangan sistem
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col space-y-2 sm:space-y-3 pt-3 sm:pt-4 border-t border-zinc-800">
                        <button 
                            type="submit"
                            class="w-full bg-zinc-800 text-zinc-100 px-4 sm:px-6 py-3 sm:py-4 rounded-xl font-bold text-sm sm:text-base hover:bg-zinc-700 focus:ring-1 focus:ring-zinc-700 transition-all border border-zinc-700 transform hover:-translate-y-0.5 flex items-center justify-center gap-2"
                        >
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Kirim Feedback
                        </button>
                        <a 
                            href="{{ url('/') }}"
                            class="w-full bg-zinc-900 text-zinc-300 px-4 sm:px-6 py-3 sm:py-4 rounded-xl font-bold text-sm sm:text-base hover:bg-zinc-800 focus:ring-1 focus:ring-zinc-700 text-center transition-all flex items-center justify-center gap-2 border border-zinc-800"
                        >
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Lewati & Kembali ke Beranda
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Security Footer -->
        <div class="mt-4 sm:mt-6 text-center">
            <div class="inline-flex items-center gap-2 bg-zinc-900 rounded-xl px-4 sm:px-6 py-2.5 sm:py-3 border border-zinc-800">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
                <span class="text-xs sm:text-sm font-semibold text-zinc-300">Data Anda Terlindungi & Terenkripsi</span>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="resources/js/toast.js"></script>
<script src="resources/js/form-validation.js"></script>
@endpush
@endsection