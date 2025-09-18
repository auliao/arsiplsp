@extends('layouts.app')

@section('title', 'Kategori Surat')

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
                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                        </svg>
                        Kategori Surat
                    </h1>
                    <p class="text-white/90 text-sm lg:text-base leading-relaxed">
                        Kelola kategori untuk melabeli dan mengorganisir surat secara sistematis.
                        <span class="font-medium">Klik "Tambah" untuk menambahkan kategori baru.</span>
                    </p>
                </div>
                <div class="hidden lg:block">
                    <div class="w-20 h-20 bg-white/20 rounded-xl backdrop-blur-sm flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                        </svg>
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
        <form method="GET" action="{{ route('kategori.index') }}" class="flex flex-col lg:flex-row items-start lg:items-center gap-4">
            <div class="flex items-center gap-3 text-army-green-800 font-semibold">
                <div class="w-8 h-8 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="hidden lg:block">Pencarian Kategori:</span>
                <span class="lg:hidden">Cari:</span>
            </div>
            
            <div class="relative flex-1 w-full">
                <input type="text" 
                       name="search" 
                       id="search" 
                       class="w-full px-4 py-3 bg-white/80 border-2 border-army-green-200 rounded-xl focus:ring-2 focus:ring-army-green-200 focus:border-army-green-400 transition-all duration-200 placeholder-army-green-400 text-sm lg:text-base" 
                       placeholder="Cari nama kategori atau keterangan..." 
                       value="{{ request('search') }}">
                
                @if(request('search'))
                    <a href="{{ route('kategori.index') }}" 
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
                    <span class="hidden lg:block">Cari Kategori</span>
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
                    <h3 class="text-sm font-medium text-army-green-600">Total Kategori</h3>
                    <p class="text-2xl font-bold text-army-green-800">{{ $kategori->count() }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-white/80 to-white/60 backdrop-blur-xl rounded-xl p-4 border border-white/50 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-army-green-600">Status Sistem</h3>
                    <p class="text-lg font-semibold text-army-green-800">Aktif</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-white/80 to-white/60 backdrop-blur-xl rounded-xl p-4 border border-white/50 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-army-green-600">Pencarian</h3>
                    <p class="text-lg font-semibold text-army-green-800">{{ request('search') ? 'Aktif' : 'Tidak Aktif' }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-white/80 to-white/60 backdrop-blur-xl rounded-xl p-4 border border-white/50 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-army-green-600">Filter Aktif</h3>
                    <p class="text-lg font-semibold text-army-green-800">{{ request('search') ? '1' : '0' }}</p>
                </div>
                <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-400 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path>
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
                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                Daftar Kategori Surat
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
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left font-semibold text-army-green-800 text-sm lg:text-base w-20">
                            <div class="flex items-center gap-2">
                                <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                ID
                            </div>
                        </th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left font-semibold text-army-green-800 text-sm lg:text-base">
                            <div class="flex items-center gap-2">
                                <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                </svg>
                                Nama Kategori
                            </div>
                        </th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-left font-semibold text-army-green-800 text-sm lg:text-base hidden lg:table-cell">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                Keterangan
                            </div>
                        </th>
                        <th class="px-4 lg:px-6 py-3 lg:py-4 text-center font-semibold text-army-green-800 text-sm lg:text-base w-48">
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
                    @forelse($kategori as $k)
                        <tr class="hover:bg-army-green-50/30 transition-colors duration-200">
                            <td class="px-4 lg:px-6 py-3 lg:py-4">
                                <div class="w-8 h-8 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                    {{ $k->id }}
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-3 lg:py-4">
                                <div class="font-semibold text-army-green-800 text-sm lg:text-base">{{ $k->nama_kategori }}</div>
                                <div class="text-xs text-army-green-600 lg:hidden mt-1 max-w-xs truncate">
                                    {{ $k->keterangan }}
                                </div>
                            </td>
                            <td class="px-4 lg:px-6 py-3 lg:py-4 hidden lg:table-cell">
                                <div class="text-army-green-700 text-sm max-w-xs">{{ $k->keterangan }}</div>
                            </td>
                            <td class="px-4 lg:px-6 py-3 lg:py-4">
                                <div class="flex items-center justify-center gap-2 flex-nowrap">
                                    <a href="{{ route('kategori.edit', $k->id) }}" 
                                       class="inline-flex items-center gap-1 px-2 lg:px-3 py-1 lg:py-1.5 bg-gradient-to-r from-blue-400 to-blue-500 text-white text-xs lg:text-sm font-medium rounded-lg shadow-md hover:shadow-lg hover:from-blue-500 hover:to-blue-600 transition-all duration-200 transform hover:scale-105">
                                        <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                        <span class="hidden lg:inline">Edit</span>
                                    </a>
                                    
                                    <button type="button" 
                                            class="inline-flex items-center gap-1 px-2 lg:px-3 py-1 lg:py-1.5 bg-gradient-to-r from-red-400 to-red-500 text-white text-xs lg:text-sm font-medium rounded-lg shadow-md hover:shadow-lg hover:from-red-500 hover:to-red-600 transition-all duration-200 transform hover:scale-105" 
                                            onclick="confirmDeleteKategori({{ $k->id }})">
                                        <svg class="w-3 h-3 lg:w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="hidden lg:inline">Hapus</span>
                                    </button>
                                </div>

                                <!-- Hidden form for deletion -->
                                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:none;" id="delete-form-{{ $k->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 lg:w-20 h-16 lg:h-20 bg-gradient-to-br from-army-green-300 to-sage-green-300 rounded-full flex items-center justify-center mb-4">
                                        @if(request('search'))
                                            <svg class="w-8 lg:w-10 h-8 lg:h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                            </svg>
                                        @else
                                            <svg class="w-8 lg:w-10 h-8 lg:h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    
                                    @if(request('search'))
                                        <h3 class="text-lg lg:text-xl font-semibold text-army-green-800 mb-2">Tidak ada hasil pencarian</h3>
                                        <p class="text-army-green-600 mb-4 text-sm lg:text-base text-center">
                                            Tidak ada kategori yang ditemukan dengan kata kunci "<span class="font-semibold">{{ request('search') }}</span>"
                                        </p>
                                        <div class="flex flex-col sm:flex-row gap-3">
                                            <a href="{{ route('kategori.index') }}" 
                                               class="inline-flex items-center gap-2 px-4 lg:px-6 py-2 lg:py-3 bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-army-green-600 hover:to-sage-green-600 transition-all duration-200 transform hover:scale-105 text-sm lg:text-base">
                                                <svg class="w-4 h-4 lg:w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                Lihat Semua Kategori
                                            </a>
                                            <a href="{{ route('kategori.create') }}" 
                                               class="inline-flex items-center gap-2 px-4 lg:px-6 py-2 lg:py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 transform hover:scale-105 text-sm lg:text-base">
                                                <svg class="w-4 h-4 lg:w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Tambah Kategori
                                            </a>
                                        </div>
                                    @else
                                        <h3 class="text-lg lg:text-xl font-semibold text-army-green-800 mb-2">Belum ada kategori</h3>
                                        <p class="text-army-green-600 mb-4 text-sm lg:text-base">Mulai dengan menambahkan kategori surat pertama Anda</p>
                                        <a href="{{ route('kategori.create') }}" 
                                           class="inline-flex items-center gap-2 px-6 lg:px-8 py-3 lg:py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold text-base lg:text-lg rounded-2xl shadow-xl hover:shadow-2xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 transform hover:scale-105">
                                            <svg class="w-5 h-5 lg:w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Tambah Kategori Pertama
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
    @if($kategori->isNotEmpty())
        <div class="flex justify-center lg:justify-start">
            <a href="{{ route('kategori.create') }}" 
               class="inline-flex items-center gap-3 px-6 lg:px-8 py-3 lg:py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold text-base lg:text-lg rounded-2xl shadow-xl hover:shadow-2xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 transform hover:scale-105">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 lg:w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span>Tambah Kategori Baru</span>
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
function confirmDeleteKategori(id) {
    Swal.fire({
        title: 'Konfirmasi Penghapusan',
        text: 'Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.',
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
                title: 'Menghapus Kategori...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Submit the form
            document.getElementById('delete-form-' + id).submit();
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
    const clearButton = document.querySelector('a[href*="kategori.index"]:not([href*="search"])');
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