<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LaporPenipu')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom Animations -->
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeInUp 0.8s ease-out forwards; }
    </style>
    
    @stack('styles')
</head>
<body class="bg-zinc-950 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-zinc-900/80 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-zinc-800">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14 sm:h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2 group">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-zinc-800 rounded-lg sm:rounded-xl flex items-center justify-center border border-zinc-700 group-hover:border-zinc-600 transition-all">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <span class="text-base sm:text-xl font-bold text-zinc-100">
                            Sinori
                        </span>
                    </a>
                </div>

                <!-- Navigation Links - Mobile Optimized -->
                <div class="flex items-center gap-1 sm:gap-2">
                    <!-- Cari Nomor -->
                    <a href="{{ route('cari.index') }}" class="flex items-center gap-1 sm:gap-2 px-2 sm:px-4 py-2 text-zinc-300 hover:text-zinc-100 hover:bg-zinc-800 rounded-lg font-medium transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="hidden sm:inline text-sm sm:text-base">Cari Nomor</span>
                        <span class="sm:hidden text-xs">Cari</span>
                    </a>
                    
                    <!-- Lapor -->
                    <a href="{{ route('laporan.create') }}" class="flex items-center gap-1 sm:gap-2 px-2 sm:px-4 py-2 text-zinc-300 hover:text-zinc-100 hover:bg-zinc-800 rounded-lg font-medium transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="text-xs sm:text-base">Lapor</span>
                    </a>

                    <!-- About -->
                    <a href="{{ route('about') }}" class="flex items-center gap-1 sm:gap-2 px-2 sm:px-4 py-2 text-zinc-300 hover:text-zinc-100 hover:bg-zinc-800 rounded-lg font-medium transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="hidden sm:inline text-sm sm:text-base">About</span>
                        <span class="sm:hidden text-xs">Info</span>
                    </a>

                    <!-- Contact -->
                    <a href="{{ route('contact') }}" class="flex items-center gap-1 sm:gap-2 px-2 sm:px-4 py-2 text-zinc-300 hover:text-zinc-100 hover:bg-zinc-800 rounded-lg font-medium transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-xs sm:text-base">Kontak</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-zinc-950 text-zinc-400 py-8 sm:py-12 mt-12 sm:mt-20 border-t border-zinc-900">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center text-center space-y-3 sm:space-y-4">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-zinc-900 rounded-lg sm:rounded-xl flex items-center justify-center border border-zinc-800">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <span class="text-lg sm:text-xl font-bold text-zinc-100">Sinori</span>
                </div>
                <p class="text-zinc-500 max-w-md text-xs sm:text-base px-4">
                    Platform untuk mencegah pembeli dari penipuan dengan berbagi informasi nomor telepon yang mencurigakan
                </p>
                <div class="flex items-center space-x-3 sm:space-x-6 text-xs sm:text-sm text-zinc-600 pt-3 sm:pt-4 border-t border-zinc-900 w-full justify-center">
                    <span>© 2024 Sinori</span>
                    <span>•</span>
                    <span>Dibuat untuk Komunitas</span>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    </script>

    @stack('scripts')

</body>
</html>