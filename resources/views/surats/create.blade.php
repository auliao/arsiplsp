@extends('layouts.app')

@section('title', 'Arsipkan Surat')

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
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                        </svg>
                        Arsipkan Surat Digital
                    </h1>
                    <p class="text-white/90 text-sm lg:text-base leading-relaxed">
                        Upload dokumen surat resmi untuk diarsipkan dalam sistem digital. 
                        Pastikan file dalam format PDF dengan ukuran maksimal 10MB.
                    </p>
                </div>
                <div class="hidden lg:block">
                    <div class="w-20 h-20 bg-white/20 rounded-xl backdrop-blur-sm flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.413V13H5.5z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white p-4 lg:p-6 rounded-xl shadow-lg mb-6 transform hover:scale-[1.02] transition-transform duration-200">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-semibold mb-2">{{ session('success') }}</h3>
                    @if(session('surat_data'))
                        @php $data = session('surat_data') @endphp
                        <div class="bg-white/20 rounded-lg p-3 mt-3 backdrop-blur-sm">
                            <p class="font-medium mb-2 text-sm">Detail Surat:</p>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 text-xs lg:text-sm">
                                <div class="flex items-center space-x-2">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                                    <span class="truncate">Nomor: {{ $data['nomor_surat'] }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                                    <span class="truncate">Kategori: {{ $data['kategori'] }}</span>
                                </div>
                                <div class="flex items-center space-x-2 lg:col-span-2">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                                    <span class="truncate">Judul: {{ $data['judul'] }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                                    <span class="truncate">File: {{ $data['file_name'] }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                                    <span class="truncate">Waktu: {{ $data['waktu_pengarsipan'] }}</span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('surats.index') }}" class="inline-flex items-center px-3 py-2 bg-white/30 hover:bg-white/40 rounded-lg text-white text-sm font-medium transition-all duration-200 backdrop-blur-sm">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Lihat Arsip
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-gradient-to-r from-red-500 to-pink-600 text-white p-4 lg:p-6 rounded-xl shadow-lg mb-6">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-semibold mb-2">Terjadi Kesalahan</h3>
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center space-x-2 text-sm">
                                <span class="w-1.5 h-1.5 bg-white rounded-full flex-shrink-0"></span>
                                <span>{{ $error }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Form Card -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl border border-white/50 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-army-green-500/10 to-sage-green-500/10 p-4 lg:p-6 border-b border-army-green-200/30">
                <h2 class="text-xl lg:text-2xl font-bold text-army-green-800 flex items-center">
                    <div class="w-8 h-8 lg:w-10 h-10 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center mr-3 shadow-lg">
                        <svg class="w-4 h-4 lg:w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 0a1 1 0 100 2h.01a1 1 0 100-2H9zm2 0a1 1 0 100 2h.01a1 1 0 100-2H11z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    Form Upload Surat
                </h2>
                <p class="text-army-green-600 mt-1 text-sm lg:text-base">Isi informasi berikut dengan lengkap dan benar</p>
            </div>

            <!-- Form Content -->
            <form action="{{ route('surats.store') }}" method="POST" enctype="multipart/form-data" id="suratForm" class="p-4 lg:p-6 space-y-6">
                @csrf
                
                <!-- Nomor Surat -->
                <div class="space-y-2">
                    <label for="nomor_surat" class="block text-sm font-semibold text-army-green-800 flex items-center">
                        <div class="w-5 h-5 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-md flex items-center justify-center mr-2 shadow-sm">
                            <span class="text-white text-xs font-bold">1</span>
                        </div>
                        Nomor Surat
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="nomor_surat" 
                               id="nomor_surat" 
                               class="w-full px-4 py-3 bg-white/80 border-2 border-army-green-200 rounded-xl focus:ring-2 focus:ring-army-green-200 focus:border-army-green-400 transition-all duration-200 text-army-green-900 placeholder-army-green-400 shadow-sm text-sm lg:text-base" 
                               value="{{ session('success') ? '' : old('nomor_surat') }}" 
                               required
                               placeholder="Contoh: 2024/PD3/TU/001">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-4 h-4 text-army-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Kategori -->
                <div class="space-y-2">
                    <label for="kategori" class="block text-sm font-semibold text-army-green-800 flex items-center">
                        <div class="w-5 h-5 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-md flex items-center justify-center mr-2 shadow-sm">
                            <span class="text-white text-xs font-bold">2</span>
                        </div>
                        Kategori Surat
                    </label>
                    <div class="relative">
                        <select name="kategori" id="kategori" class="w-full px-4 py-3 bg-white/80 border-2 border-army-green-200 rounded-xl focus:ring-2 focus:ring-army-green-200 focus:border-army-green-400 transition-all duration-200 text-army-green-900 shadow-sm appearance-none cursor-pointer text-sm lg:text-base" required>
                            <option value="">Pilih kategori surat...</option>
                            <option value="Pengumuman" {{ (session('success') ? false : old('kategori')) == 'Pengumuman' ? 'selected' : '' }}>📢 Pengumuman</option>
                            <option value="Undangan" {{ (session('success') ? false : old('kategori')) == 'Undangan' ? 'selected' : '' }}>💌 Undangan</option>
                            <option value="Nota Dinas" {{ (session('success') ? false : old('kategori')) == 'Nota Dinas' ? 'selected' : '' }}>📋 Nota Dinas</option>
                            <option value="Pemberitahuan" {{ (session('success') ? false : old('kategori')) == 'Pemberitahuan' ? 'selected' : '' }}>📄 Pemberitahuan</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-army-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Judul -->
                <div class="space-y-2">
                    <label for="judul" class="block text-sm font-semibold text-army-green-800 flex items-center">
                        <div class="w-5 h-5 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-md flex items-center justify-center mr-2 shadow-sm">
                            <span class="text-white text-xs font-bold">3</span>
                        </div>
                        Judul Surat
                    </label>
                    <div class="relative">
                        <input type="text" 
                               name="judul" 
                               id="judul" 
                               class="w-full px-4 py-3 bg-white/80 border-2 border-army-green-200 rounded-xl focus:ring-2 focus:ring-army-green-200 focus:border-army-green-400 transition-all duration-200 text-army-green-900 placeholder-army-green-400 shadow-sm text-sm lg:text-base" 
                               value="{{ session('success') ? '' : old('judul') }}" 
                               required
                               placeholder="Masukkan judul lengkap surat...">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-4 h-4 text-army-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.894A1 1 0 0018 16V3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- File Upload -->
                <div class="space-y-2">
                    <label for="file" class="block text-sm font-semibold text-army-green-800 flex items-center">
                        <div class="w-5 h-5 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-md flex items-center justify-center mr-2 shadow-sm">
                            <span class="text-white text-xs font-bold">4</span>
                        </div>
                        Upload File PDF
                    </label>
                    <div class="relative">
                        <div class="border-2 border-dashed border-army-green-300 rounded-xl p-6 bg-gradient-to-br from-army-green-50 to-sage-green-50 hover:border-army-green-400 transition-all duration-200" id="dropZone">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h3 class="text-base font-semibold text-army-green-800 mb-1">Drag & Drop File PDF</h3>
                                <p class="text-sm text-army-green-600 mb-3">atau klik untuk memilih file dari perangkat</p>
                                <input type="file" 
                                       name="file" 
                                       id="file" 
                                       class="hidden" 
                                       accept=".pdf" 
                                       required>
                                <button type="button" onclick="document.getElementById('file').click()" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white text-sm font-semibold rounded-lg hover:from-army-green-600 hover:to-sage-green-600 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path>
                                    </svg>
                                    Pilih File PDF
                                </button>
                                <p class="text-xs text-army-green-500 mt-2">Maksimal ukuran file: 10MB</p>
                            </div>
                            <div id="fileInfo" class="hidden mt-4 p-3 bg-white/80 rounded-lg border border-army-green-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p id="fileName" class="font-semibold text-army-green-800 text-sm truncate"></p>
                                        <p id="fileSize" class="text-xs text-army-green-600"></p>
                                    </div>
                                    <button type="button" onclick="removeFile()" class="text-red-500 hover:text-red-700 transition-colors flex-shrink-0">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-army-green-200">
                    <a href="{{ route('surats.index') }}" class="flex items-center justify-center px-6 py-3 bg-white border-2 border-army-green-300 text-army-green-700 font-semibold rounded-xl hover:bg-army-green-50 transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-[1.02] text-sm lg:text-base">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0L2.586 11H10a1 1 0 110 2H2.586l3.707 3.707a1 1 0 01-1.414 1.414l-5.414-5.414a1 1 0 010-1.414l5.414-5.414a1 1 0 011.414 1.414L2.586 9H10a1 1 0 010-2H2.586l3.707-3.707a1 1 0 00-1.414-1.414L-.707 6.293a1 1 0 000 1.414l5.414 5.414z" clip-rule="evenodd"></path>
                        </svg>
                        Kembali
                    </a>
                    <button type="submit" id="submitBtn" class="flex-1 flex items-center justify-center px-6 py-3 bg-gradient-to-r from-army-green-500 to-sage-green-500 text-white font-bold rounded-xl hover:from-army-green-600 hover:to-sage-green-600 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none text-sm lg:text-base">
                        <span class="btn-text flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Arsipkan Surat
                        </span>
                        <span class="btn-loading hidden flex items-center">
                            <svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Menyimpan...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('file');
    const fileInfo = document.getElementById('fileInfo');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const submitBtn = document.getElementById('submitBtn');
    const form = document.getElementById('suratForm');

    // Drag and drop functionality
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    dropZone.addEventListener('drop', handleDrop, false);

    function highlight(e) {
        dropZone.classList.add('border-army-green-500', 'bg-army-green-100');
    }

    function unhighlight(e) {
        dropZone.classList.remove('border-army-green-500', 'bg-army-green-100');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length > 0) {
            fileInput.files = files;
            handleFileSelect({ target: fileInput });
        }
    }

    // File input change handler
    fileInput.addEventListener('change', handleFileSelect);

    function handleFileSelect(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.type !== 'application/pdf') {
                alert('Hanya file PDF yang diizinkan!');
                fileInput.value = '';
                return;
            }

            if (file.size > 10 * 1024 * 1024) { // 10MB
                alert('Ukuran file tidak boleh lebih dari 10MB!');
                fileInput.value = '';
                return;
            }

            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            fileInfo.classList.remove('hidden');
        }
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Remove file function
    window.removeFile = function() {
        fileInput.value = '';
        fileInfo.classList.add('hidden');
        fileName.textContent = '';
        fileSize.textContent = '';
    }

    // Form submission handler
    form.addEventListener('submit', function(e) {
        submitBtn.disabled = true;
        submitBtn.querySelector('.btn-text').classList.add('hidden');
        submitBtn.querySelector('.btn-loading').classList.remove('hidden');
    });

    // Auto-resize textarea if needed
    document.querySelectorAll('textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
});
</script>

<style>
/* Custom styles for better mobile responsiveness */
@media (max-width: 640px) {
    .min-h-screen {
        min-height: calc(100vh - 2rem);
    }
    
    .shadow-2xl {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
}

/* Smooth animations */
.transform {
    transition: transform 0.2s ease-in-out;
}

.hover\:scale-\[1\.02\]:hover {
    transform: scale(1.02);
}

/* Focus states */
input:focus, select:focus, textarea:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

/* Loading animation */
@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

/* Custom scrollbar for better UX */
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

/* Better button states */
button:disabled {
    cursor: not-allowed;
    opacity: 0.5;
}

button:disabled:hover {
    transform: none !important;
}

/* Improved file drop zone */
#dropZone.border-army-green-500 {
    border-color: #22c55e !important;
    background-color: #dcfce7 !important;
}

/* Better responsive text */
@media (max-width: 768px) {
    .text-4xl {
        font-size: 1.875rem;
        line-height: 2.25rem;
    }
    
    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem;
    }
}

/* Enhanced form styling */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #1f2937;
}

.form-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #d1d5db;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    transition: all 0.2s ease-in-out;
}

.form-input:focus {
    border-color: #22c55e;
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

/* Success and error message styling */
.alert {
    padding: 1rem 1.5rem;
    border-radius: 0.75rem;
    margin-bottom: 1.5rem;
}

.alert-success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.alert-error {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

/* Card hover effects */
.card {
    transition: all 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Loading states */
.loading {
    opacity: 0.7;
    pointer-events: none;
}

.spinner {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top-color: #fff;
    animation: spin 1s ease-in-out infinite;
}
</style>
@endsection