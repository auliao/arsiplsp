@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-army-green-50 via-white to-sage-green-50 -m-8 p-4 lg:p-8">
    <!-- Header Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-army-green-600 via-army-green-500 to-sage-green-600 rounded-2xl shadow-xl mb-6">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full transform -translate-x-32 -translate-y-32 animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-48 h-48 bg-white rounded-full transform translate-x-24 translate-y-24 animate-pulse delay-1000"></div>
        </div>
        
        <div class="relative z-10 p-6 lg:p-8">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4">
                <div class="flex-1">
                    <h1 class="text-2xl lg:text-4xl font-bold text-white mb-2 flex items-center">
                        <svg class="w-8 h-8 lg:w-10 h-10 mr-3 text-white/90" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"></path>
                        </svg>
                        Arsip Surat Digital
                    </h1>
                    <p class="text-white/90 text-sm lg:text-base leading-relaxed">
                        Kelola dan pantau arsip surat resmi yang telah diupload ke sistem.
                        <span class="font-medium">Klik "Lihat" untuk menampilkan detail surat.</span>
                    </p>
                </div>
                <div class="hidden lg:block">
                    <div class="w-20 h-20 bg-white/20 rounded-xl backdrop-blur-sm flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 8 8"><path fill="#ffff" d="M4 0C1.79 0 0 1.79 0 4s1.79 4 4 4s4-1.79 4-4s-1.79-4-4-4zm0 1l3 3H5v3H3V4H1l3-3z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white p-4 lg:p-6 rounded-xl shadow-lg mb-6">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <span class="font-semibold text-lg">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- Search Section -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-lg border border-white/50 p-4 lg:p-6 mb-6">
        <form method="GET" action="{{ route('surats.index') }}" class="flex flex-col lg:flex-row items-start lg:items-center gap-4">
            <div class="flex items-center gap-3 text-army-green-800 font-semibold">
                <div class="w-8 h-8 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="hidden lg:block">Pencarian Surat:</span>
                <span class="lg:hidden">Cari:</span>
            </div>
            
            <div class="relative flex-1 w-full">
                <input type="text" 
                       name="search" 
                       id="search" 
                       class="w-full px-4 py-3 bg-white/80 border-2 border-army-green-200 rounded-xl focus:ring-2 focus:ring-army-green-200 focus:border-army-green-400 transition-all duration-200 placeholder-army-green-400 text-sm lg:text-base" 
                       placeholder="Masukkan nomor surat, judul, atau kategori..." 
                       value="{{ request('search') }}">
                
                @if(request('search'))
                    <a href="{{ route('surats.index') }}" 
                       class="absolute right-3 top-1/2 transform -translate-y-1/2 text-army-green-400 hover:text-army-green-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @endif
            </div>
            
            <button type="submit" 
                    class="w-full lg:w-auto px-6 py-3 bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-army-green-600 hover:to-sage-green-600 transition-all duration-200 transform hover:scale-105">
                <span class="flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="hidden lg:block">Cari Surat</span>
                    <span class="lg:hidden">Cari</span>
                </span>
            </button>
        </form>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-gradient-to-br from-white/80 to-white/60 backdrop-blur-xl rounded-xl p-4 border border-white/50 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-army-green-600">Total Surat</h3>
                    <p class="text-2xl font-bold text-army-green-800">{{ $total_surats }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-white/80 to-white/60 backdrop-blur-xl rounded-xl p-4 border border-white/50 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-army-green-600">Bulan Ini</h3>
                    <p class="text-2xl font-bold text-army-green-800">{{ $bulan_ini }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-white/80 to-white/60 backdrop-blur-xl rounded-xl p-4 border border-white/50 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-army-green-600">Minggu Ini</h3>
                    <p class="text-2xl font-bold text-army-green-800">{{ $minggu_ini }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-white/80 to-white/60 backdrop-blur-xl rounded-xl p-4 border border-white/50 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-army-green-600">Hari Ini</h3>
                    <p class="text-2xl font-bold text-army-green-800">{{ $hari_ini }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl border border-white/50 overflow-hidden mb-6">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-army-green-500/10 to-sage-green-500/10 p-4 lg:p-6 border-b border-army-green-200/30">
            <h2 class="text-xl font-bold text-army-green-800 flex items-center">
                <div class="w-8 h-8 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center mr-3 shadow-lg">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                Daftar Arsip Surat
                @if(request('search'))
                    <span class="ml-3 px-3 py-1 bg-army-green-100 text-army-green-700 text-sm rounded-full">
                        Hasil: "{{ request('search') }}"
                    </span>
                @endif
            </h2>
        </div>

        <!-- Responsive Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-army-green-100/50 to-sage-green-100/50 border-b border-army-green-200/30">
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left font-semibold text-army-green-800 text-sm lg:text-base">
                            <div class="flex items-center gap-2">
                                <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 0a1 1 0 100 2h.01a1 1 0 100-2H9zm2 0a1 1 0 100 2h.01a1 1 0 100-2H11z" clip-rule="evenodd"></path>
                                </svg>
                                Nomor Surat
                            </div>
                        </th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left font-semibold text-army-green-800 text-sm lg:text-base">
                            <div class="flex items-center gap-2">
                                <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                </svg>
                                Kategori
                            </div>
                        </th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left font-semibold text-army-green-800 text-sm lg:text-base">
                            <div class="flex items-center gap-2">
                                <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"></path>
                                </svg>
                                Judul
                            </div>
                        </th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left font-semibold text-army-green-800 text-sm lg:text-base hidden lg:table-cell">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                Waktu Pengarsipan
                            </div>
                        </th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-center font-semibold text-army-green-800 text-sm lg:text-base">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                </svg>
                                Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-army-green-100/50">
                    @forelse($surats as $surat)
                        <tr class="hover:bg-army-green-50/30 transition-colors duration-200">
                            <td class="px-4 lg:px-6 py-3 lg:py-4">
                                <div class="font-mono text-army-green-800 bg-army-green-100/50 px-2 lg:px-3 py-1 rounded-lg text-xs lg:text-sm font-semibold">
                                    {{ $surat->nomor_surat }}
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-3 lg:py-4">
                                <span class="inline-flex items-center px-2 lg:px-3 py-1 rounded-full text-xs lg:text-sm font-medium bg-gradient-to-r from-sage-green-200 to-army-green-200 text-army-green-800 border border-army-green-300">
                                    <svg class="w-2 h-2 lg:w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $surat->kategori }}
                                </span>
                            </td>
                            <td class="px-4 lg:px-6 py-3 lg:py-4">
                                <div class="font-semibold text-army-green-800 text-sm lg:text-base max-w-xs truncate" title="{{ $surat->judul }}">
                                    {{ $surat->judul }}
                                </div>
                                <div class="text-xs text-army-green-600 lg:hidden mt-1">
                                    {{ $surat->formatted_waktu_pengarsipan }}
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-3 lg:py-4 hidden lg:table-cell">
                                <div class="text-army-green-700 text-sm">
                                    {{ $surat->formatted_waktu_pengarsipan }}
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-3 lg:py-4">
                                <div class="flex items-center justify-center gap-1 lg:gap-2 flex-wrap">
                                    <button onclick="confirmDelete({{ $surat->id }})" 
                                            class="inline-flex items-center gap-1 px-2 lg:px-3 py-1 lg:py-1.5 bg-gradient-to-r from-red-400 to-red-500 text-white text-xs lg:text-sm font-medium rounded-lg shadow-md hover:shadow-lg hover:from-red-500 hover:to-red-600 transition-all duration-200 transform hover:scale-105">
                                        <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="hidden lg:inline">Hapus</span>
                                    </button>
                                    
                                    <a href="{{ route('surats.download', $surat->id) }}" 
                                       class="inline-flex items-center gap-1 px-2 lg:px-3 py-1 lg:py-1.5 bg-gradient-to-r from-amber-400 to-amber-500 text-white text-xs lg:text-sm font-medium rounded-lg shadow-md hover:shadow-lg hover:from-amber-500 hover:to-amber-600 transition-all duration-200 transform hover:scale-105">
                                        <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="hidden lg:inline">Unduh</span>
                                    </a>
                                    
                                    <a href="{{ route('surats.show', $surat->id) }}" 
                                       class="inline-flex items-center gap-1 px-2 lg:px-3 py-1 lg:py-1.5 bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white text-xs lg:text-sm font-medium rounded-lg shadow-md hover:shadow-lg hover:from-army-green-600 hover:to-sage-green-600 transition-all duration-200 transform hover:scale-105">
                                        <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="hidden lg:inline">Lihat</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 lg:w-20 h-16 lg:h-20 bg-gradient-to-br from-army-green-300 to-sage-green-300 rounded-full flex items-center justify-center mb-4">
                                        @if(request('search'))
                                            <svg class="w-8 lg:w-10 h-8 lg:h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                            </svg>
                                        @else
                                            <svg class="w-8 lg:w-10 h-8 lg:h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    
                                    @if(request('search'))
                                        <h3 class="text-lg lg:text-xl font-semibold text-army-green-800 mb-2">Tidak ada hasil pencarian</h3>
                                        <p class="text-army-green-600 mb-4 text-sm lg:text-base text-center">
                                            Tidak ada surat yang ditemukan dengan kata kunci "<span class="font-semibold">{{ request('search') }}</span>"
                                        </p>
                                        <div class="flex flex-col sm:flex-row gap-3">
                                            <a href="{{ route('surats.index') }}" 
                                               class="inline-flex items-center gap-2 px-4 lg:px-6 py-2 lg:py-3 bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-army-green-600 hover:to-sage-green-600 transition-all duration-200 transform hover:scale-105 text-sm lg:text-base">
                                                <svg class="w-4 h-4 lg:w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                Lihat Semua Surat
                                            </a>
                                            <a href="{{ route('surats.create') }}" 
                                               class="inline-flex items-center gap-2 px-4 lg:px-6 py-2 lg:py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 transform hover:scale-105 text-sm lg:text-base">
                                                <svg class="w-4 h-4 lg:w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Arsipkan Surat
                                            </a>
                                        </div>
                                    @else
                                        <h3 class="text-lg lg:text-xl font-semibold text-army-green-800 mb-2">Belum ada surat diarsipkan</h3>
                                        <p class="text-army-green-600 mb-4 text-sm lg:text-base">Mulai dengan mengarsipkan surat pertama Anda</p>
                                        <a href="{{ route('surats.create') }}" 
                                           class="inline-flex items-center gap-2 px-6 lg:px-8 py-3 lg:py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold text-base lg:text-lg rounded-2xl shadow-xl hover:shadow-2xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 transform hover:scale-105">
                                            <svg class="w-5 h-5 lg:w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Arsipkan Surat Pertama
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Button -->
    @if($surats->isNotEmpty())
        <div class="flex justify-center lg:justify-start">
            <a href="{{ route('surats.create') }}" 
               class="inline-flex items-center gap-3 px-6 lg:px-8 py-3 lg:py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold text-base lg:text-lg rounded-2xl shadow-xl hover:shadow-2xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 transform hover:scale-105">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 lg:w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span>Arsipkan Surat Baru</span>
            </a>
        </div>
    @endif
</div>

<style>
/* Custom styles for mobile responsiveness */
@media (max-width: 640px) {
    .min-h-screen {
        min-height: calc(100vh - 2rem);
    }
}

/* Smooth animations */
.transform {
    transition: transform 0.2s ease-in-out;
}

.hover\:scale-105:hover {
    transform: scale(1.05);
}

.hover\:scale-\[1\.02\]:hover {
    transform: scale(1.02);
}

/* Focus states */
input:focus, select:focus, button:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

/* Table hover effects */
tbody tr:hover {
    background-color: rgba(34, 197, 94, 0.05);
}

/* Button states */
button:disabled, a[disabled] {
    cursor: not-allowed;
    opacity: 0.5;
    transform: none !important;
}

/* Loading animation */
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Statistics cards animation */
.statistics-card {
    transition: all 0.3s ease-in-out;
}

.statistics-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
}

/* Table responsive improvements */
@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .action-buttons {
        gap: 0.25rem;
    }
    
    .action-buttons button,
    .action-buttons a {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
}

/* Enhanced gradient backgrounds */
.bg-gradient-modern {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0.6) 100%);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}

/* Card hover effects */
.card-hover {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-hover:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Search input enhancements */
.search-input:focus {
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
    border-color: #22c55e;
}

/* Success message animations */
.success-alert {
    animation: slideIn 0.5s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Button ripple effect */
.btn-ripple {
    position: relative;
    overflow: hidden;
}

.btn-ripple::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transition: width 0.6s, height 0.6s, top 0.6s, left 0.6s;
    transform: translate(-50%, -50%);
}

.btn-ripple:active::before {
    width: 300px;
    height: 300px;
}

/* Table alternating row colors */
tbody tr:nth-child(even) {
    background-color: rgba(34, 197, 94, 0.02);
}

/* Improved mobile table layout */
@media (max-width: 640px) {
    .mobile-stack {
        display: block !important;
    }
    
    .mobile-stack td {
        display: block;
        text-align: left;
        border: none;
        padding: 0.5rem 1rem;
    }
    
    .mobile-stack td:first-child {
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
    }
    
    .mobile-stack td:last-child {
        padding-bottom: 1rem;
    }
}
</style>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Konfirmasi Penghapusan',
        text: 'Apakah Anda yakin ingin menghapus surat ini? Tindakan ini tidak dapat dibatalkan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        customClass: {
            confirmButton: 'bg-gradient-to-r from-red-400 to-red-500 hover:from-red-500 hover:to-red-600 font-semibold px-6 py-2 rounded-lg',
            cancelButton: 'bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 font-semibold px-6 py-2 rounded-lg mr-3'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Menghapus Surat...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Kirim request DELETE menggunakan fetch
            fetch(`/surats/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Berhasil Dihapus!',
                        text: data.message || 'Surat berhasil dihapus dari sistem.',
                        icon: 'success',
                        timer: 2500,
                        showConfirmButton: false,
                        customClass: {
                            popup: 'border border-emerald-200 rounded-2xl',
                            title: 'text-emerald-800 font-bold',
                            content: 'text-emerald-700'
                        }
                    }).then(() => {
                        // Reload page with smooth transition
                        window.location.reload();
                    });
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan saat menghapus surat');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Gagal Menghapus!',
                    text: error.message || 'Terjadi kesalahan saat menghapus surat. Silakan coba lagi.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444',
                    customClass: {
                        popup: 'border border-red-200 rounded-2xl',
                        title: 'text-red-800 font-bold',
                        content: 'text-red-700',
                        confirmButton: 'bg-gradient-to-r from-red-400 to-red-500 hover:from-red-500 hover:to-red-600 font-semibold px-6 py-2 rounded-lg'
                    },
                    buttonsStyling: false
                });
            });
        }
    });
}

// Enhanced search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const searchForm = searchInput.closest('form');
    
    // Auto-submit on Enter
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchForm.submit();
        }
    });
    
    // Clear search functionality
    const clearButton = document.querySelector('a[href*="surats.index"]:not([href*="search"])');
    if (clearButton && searchInput.value) {
        clearButton.addEventListener('click', function(e) {
            e.preventDefault();
            searchInput.value = '';
            searchForm.submit();
        });
    }
    
    // Add loading state to search button
    const searchButton = searchForm.querySelector('button[type="submit"]');
    searchForm.addEventListener('submit', function() {
        searchButton.disabled = true;
        searchButton.innerHTML = `
            <span class="flex items-center justify-center gap-2">
                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="hidden lg:block">Mencari...</span>
                <span class="lg:hidden">...</span>
            </span>
        `;
    });
});

// Add smooth scroll to top functionality
window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset;
    const scrollButton = document.getElementById('scrollTop');
    
    if (scrollTop > 300) {
        if (!scrollButton) {
            const button = document.createElement('button');
            button.id = 'scrollTop';
            button.className = 'fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white rounded-full shadow-xl hover:shadow-2xl hover:from-army-green-600 hover:to-sage-green-600 transition-all duration-200 transform hover:scale-110 z-50';
            button.innerHTML = `
                <svg class="w-6 h-6 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            `;
            button.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
            document.body.appendChild(button);
        }
    } else {
        const existingButton = document.getElementById('scrollTop');
        if (existingButton) {
            existingButton.remove();
        }
    }
});
</script>
@endpush
@endsection