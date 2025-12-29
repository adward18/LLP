<!-- LOGIN PAGE (login.blade.php) -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Sinori</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 min-h-screen">
    <!-- Main Content -->
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto">
            
            <!-- Header Section -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-zinc-900 rounded-3xl mb-6 border border-zinc-800">
                    <svg class="w-10 h-10 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-zinc-100 mb-3 tracking-tight">Admin Login</h1>
                <p class="text-lg text-zinc-400">Masuk untuk mengelola laporan penipuan</p>
            </div>

            <!-- Login Card -->
            <div class="bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-800">
                
                <!-- Flash Messages -->
                @if(session('error'))
                <div class="bg-zinc-800/50 border-l-4 border-red-700 px-6 py-5">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-semibold text-red-400 text-sm mb-1">Login Gagal</p>
                            <p class="text-sm text-zinc-400">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if(session('success'))
                <div class="bg-zinc-800/50 border-l-4 border-green-700 px-6 py-5">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-semibold text-green-400 text-sm mb-1">Berhasil</p>
                            <p class="text-sm text-zinc-400">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Form Section -->
                <form action="{{ route('admin.login.post') }}" method="POST" class="p-8 space-y-6">
                    @csrf

                    <!-- Email/Username -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Email atau Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="email" 
                                id="email"
                                value="{{ old('email') }}"
                                placeholder="admin@laporpenipu.com"
                                class="w-full pl-12 pr-4 py-3.5 bg-zinc-950 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition text-zinc-100 placeholder-zinc-600 @error('email') border-red-700 bg-red-950/20 @enderror"
                                required
                                autofocus
                            >
                        </div>
                        @error('email')
                            <p class="text-red-400 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                placeholder="Masukkan password Anda"
                                class="w-full pl-12 pr-12 py-3.5 bg-zinc-950 border border-zinc-800 rounded-xl focus:ring-1 focus:ring-zinc-700 focus:border-zinc-700 transition text-zinc-100 placeholder-zinc-600 @error('password') border-red-700 bg-red-950/20 @enderror"
                                required
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-zinc-500 hover:text-zinc-400 transition"
                            >
                                <svg id="eye-icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg id="eye-icon-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-400 text-sm mt-2 flex items-center font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-zinc-800 text-zinc-100 px-6 py-4 rounded-xl font-bold text-base hover:bg-zinc-700 focus:ring-1 focus:ring-zinc-700 transition-all border border-zinc-700 transform hover:-translate-y-0.5 flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Masuk ke Dashboard
                    </button>
                </form>
            </div>

            <!-- Security Info -->
            <div class="mt-8 bg-zinc-900 rounded-xl p-6 border border-zinc-800">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-zinc-800 rounded-xl flex items-center justify-center flex-shrink-0 border border-zinc-700">
                        <svg class="w-6 h-6 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-zinc-100 mb-1">Area Khusus Administrator</h3>
                        <p class="text-sm text-zinc-400 leading-relaxed">Halaman ini hanya untuk <span class="font-semibold text-zinc-200">administrator terverifikasi</span>. Akses tidak sah akan dicatat dan dilaporkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIconOpen = document.getElementById('eye-icon-open');
            const eyeIconClosed = document.getElementById('eye-icon-closed');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIconOpen.classList.add('hidden');
                eyeIconClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIconOpen.classList.remove('hidden');
                eyeIconClosed.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });
    </script>
</body>
</html>