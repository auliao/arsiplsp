<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Arsip Surat')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'army-green': {
                            50: '#f6f8f6',
                            100: '#e3e8e3',
                            200: '#c7d2c7',
                            300: '#9fb49f',
                            400: '#7a9a7a',
                            500: '#5d7f5d',
                            600: '#4a6b4a',
                            700: '#3d583d',
                            800: '#344834',
                            900: '#2d3c2d',
                        },
                        'sage-green': {
                            50: '#f7f9f7',
                            100: '#ebf0eb',
                            200: '#d4ddd4',
                            300: '#b3c5b3',
                            400: '#8ea98e',
                            500: '#6f8d6f',
                            600: '#597359',
                            700: '#4a5f4a',
                            800: '#3e4f3e',
                            900: '#354235',
                        }
                    },
                    fontFamily: {
                        'inter': ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-army-green-50 to-sage-green-100 font-inter min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white/80 backdrop-blur-sm shadow-xl border-r border-army-green-200">
            <div class="p-6 border-b border-army-green-200/50">
                <h1 class="text-3xl font-bold text-army-green-800 tracking-tight">Arsip LSP</h1>
            </div>
            
            <nav class="mt-6 px-3">
                <a href="{{ route('surats.index') }}" 
                   class="flex items-center px-4 py-3 mb-2 text-army-green-700 rounded-xl hover:bg-army-green-100 transition-all duration-200 {{ request()->routeIs('surats.index') ? 'bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 001 1h6a1 1 0 001-1V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45.5a2.5 2.5 0 11-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    Arsip
                </a>
                
                <a href="{{ route('kategori.index') }}" 
                   class="flex items-center px-4 py-3 mb-2 text-army-green-700 rounded-xl hover:bg-army-green-100 transition-all duration-200 {{ request()->routeIs('kategori.index') ? 'bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                    </svg>
                    Kategori Surat
                </a>
                
                <a href="{{ route('about') }}" 
                   class="flex items-center px-4 py-3 mb-2 text-army-green-700 rounded-xl hover:bg-army-green-100 transition-all duration-200 {{ request()->routeIs('about') ? 'bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    About
                </a>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-army-green-200/50 min-h-full">
                <div class="p-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    {{-- <div class="fixed bottom-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg border border-army-green-200">
        <span class="text-sm text-army-green-600 font-medium">Paid & Mic</span>
    </div> --}}

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Setup CSRF token untuk AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
    
    <style>
        /* Custom styles untuk komponen yang akan digunakan di halaman */
        .btn-green {
            @apply bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white px-4 py-2 rounded-lg font-medium shadow-md hover:shadow-lg hover:from-army-green-600 hover:to-sage-green-600 transition-all duration-200;
        }
        
        .btn-green-outline {
            @apply border-2 border-army-green-400 text-army-green-700 px-4 py-2 rounded-lg font-medium hover:bg-army-green-100 transition-all duration-200;
        }
        
        .btn-success {
            @apply bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-4 py-2 rounded-lg font-medium shadow-md hover:shadow-lg hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200;
        }
        
        .btn-danger {
            @apply bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg font-medium shadow-md hover:shadow-lg hover:from-red-600 hover:to-red-700 transition-all duration-200;
        }
        
        .btn-info {
            @apply bg-gradient-to-r from-sky-500 to-sky-600 text-white px-4 py-2 rounded-lg font-medium shadow-md hover:shadow-lg hover:from-sky-600 hover:to-sky-700 transition-all duration-200;
        }
        
        .btn-warning {
            @apply bg-gradient-to-r from-amber-500 to-amber-600 text-white px-4 py-2 rounded-lg font-medium shadow-md hover:shadow-lg hover:from-amber-600 hover:to-amber-700 transition-all duration-200;
        }
        
        .btn-sm {
            @apply px-3 py-1 text-sm;
        }
        
        .table-green {
            @apply w-full border-collapse bg-white rounded-xl overflow-hidden shadow-lg;
        }
        
        .table-green th {
            @apply bg-gradient-to-r from-army-green-100 to-sage-green-100 px-6 py-4 text-left font-semibold text-army-green-800 border-b border-army-green-200;
        }
        
        .table-green td {
            @apply px-6 py-4 border-b border-army-green-100;
        }
        
        .table-green tr:hover {
            @apply bg-army-green-50;
        }
        
        .form-input {
            @apply w-full px-4 py-3 border border-army-green-300 rounded-lg focus:ring-2 focus:ring-army-green-400 focus:border-transparent transition-all duration-200 bg-white/80;
        }
        
        .form-label {
            @apply block text-sm font-semibold text-army-green-800 mb-2;
        }
        
        .alert-success {
            @apply bg-gradient-to-r from-emerald-100 to-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg;
        }
        
        .alert-danger {
            @apply bg-gradient-to-r from-red-100 to-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg;
        }
        
        .page-title {
            @apply text-5xl font-bold bg-gradient-to-r from-army-green-600 to-sage-green-600 bg-clip-text text-transparent mb-4;
        }
        
        .page-subtitle {
            @apply text-army-green-600 mb-6 text-lg leading-relaxed;
        }
        
        .search-input {
            @apply flex-1 px-4 py-3 border border-army-green-300 rounded-lg focus:ring-2 focus:ring-army-green-400 focus:border-transparent max-w-md bg-white/80;
        }
    </style>
</body>
</html>