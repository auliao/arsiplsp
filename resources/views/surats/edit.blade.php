@extends('layouts.app')

@section('title', 'Edit Surat')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-army-green-50 via-white to-sage-green-50 -m-8 p-6 lg:p-10">
    <!-- Header -->
    <h1 class="text-2xl font-bold text-army-green-700 mb-2">Edit Surat</h1>
    <p class="text-sage-green-700 mb-6">
        Edit informasi dan ganti file PDF surat jika diperlukan.
    </p>

    <!-- Form Edit Surat -->
    <form action="{{ route('surats.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="max-w-4xl">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Form Fields -->
            <div class="bg-white/90 backdrop-blur-sm shadow-lg rounded-2xl p-6 border border-sage-green-200">
                <h3 class="text-lg font-semibold text-army-green-800 mb-6">Informasi Surat</h3>

                <!-- Nomor Surat -->
                <div class="mb-6">
                    <label for="nomor_surat" class="block text-sm font-semibold text-gray-800 mb-2">Nomor Surat <span class="text-red-500">*</span></label>
                    <input type="text" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" 
                           class="w-full px-4 py-3 border border-sage-green-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-army-green-500 focus:border-transparent bg-white/80 @error('nomor_surat') border-red-500 @enderror" 
                           placeholder="Contoh: 001/DIR/2024" required>
                    @error('nomor_surat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="mb-6">
                    <label for="kategori" class="block text-sm font-semibold text-gray-800 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select id="kategori" name="kategori" 
                            class="w-full px-4 py-3 border border-sage-green-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-army-green-500 focus:border-transparent bg-white/80 @error('kategori') border-red-500 @enderror" 
                            required>
                        <option value="">Pilih Kategori</option>
                        <option value="Surat Masuk" {{ old('kategori', $surat->kategori) == 'Surat Masuk' ? 'selected' : '' }}>Surat Masuk</option>
                        <option value="Surat Keluar" {{ old('kategori', $surat->kategori) == 'Surat Keluar' ? 'selected' : '' }}>Surat Keluar</option>
                        <option value="Surat Keputusan" {{ old('kategori', $surat->kategori) == 'Surat Keputusan' ? 'selected' : '' }}>Surat Keputusan</option>
                        <option value="Surat Edaran" {{ old('kategori', $surat->kategori) == 'Surat Edaran' ? 'selected' : '' }}>Surat Edaran</option>
                        <option value="Surat Undangan" {{ old('kategori', $surat->kategori) == 'Surat Undangan' ? 'selected' : '' }}>Surat Undangan</option>
                        <option value="Surat Perintah" {{ old('kategori', $surat->kategori) == 'Surat Perintah' ? 'selected' : '' }}>Surat Perintah</option>
                        <option value="Surat Perjanjian" {{ old('kategori', $surat->kategori) == 'Surat Perjanjian' ? 'selected' : '' }}>Surat Perjanjian</option>
                        <option value="Surat Tugas" {{ old('kategori', $surat->kategori) == 'Surat Tugas' ? 'selected' : '' }}>Surat Tugas</option>
                        <option value="Lainnya" {{ old('kategori', $surat->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('kategori')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Judul -->
                <div class="mb-6">
                    <label for="judul" class="block text-sm font-semibold text-gray-800 mb-2">Judul Surat <span class="text-red-500">*</span></label>
                    <textarea id="judul" name="judul" rows="3" 
                              class="w-full px-4 py-3 border border-sage-green-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-army-green-500 focus:border-transparent bg-white/80 resize-none @error('judul') border-red-500 @enderror" 
                              placeholder="Masukkan judul atau perihal surat" required>{{ old('judul', $surat->judul) }}</textarea>
                    @error('judul')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- File PDF -->
                <div class="mb-6">
                    <label for="file" class="block text-sm font-semibold text-gray-800 mb-2">Ganti File PDF (Opsional)</label>
                    <div class="relative">
                        <input type="file" id="file" name="file" accept=".pdf" 
                               class="w-full px-4 py-3 border border-sage-green-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-army-green-500 focus:border-transparent bg-white/80 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-army-green-50 file:text-army-green-700 hover:file:bg-army-green-100 @error('file') border-red-500 @enderror">
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Kosongkan jika tidak ingin mengubah file. Format: PDF, Maksimal: 10MB</p>
                    @error('file')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    
                    <!-- Current File Info -->
                    @if($surat->file_path && Storage::disk('public')->exists($surat->file_path))
                        <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                            <p class="text-sm text-green-700">
                                📄 File saat ini: <span class="font-medium">{{ basename($surat->file_path) }}</span>
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Current PDF Preview -->
            <div class="bg-white/90 backdrop-blur-sm shadow-lg rounded-2xl p-6 border border-sage-green-200">
                <h3 class="text-lg font-semibold text-army-green-800 mb-4">File Saat Ini</h3>
                
                @if($surat->file_path && Storage::disk('public')->exists($surat->file_path))
                    <div class="border border-sage-green-200 rounded-xl overflow-hidden shadow-md bg-white/80">
                        <iframe 
                            src="{{ asset('storage/' . $surat->file_path) }}" 
                            class="w-full h-[400px] border-none rounded-b-xl">
                        </iframe>
                    </div>
                @else
                    <div class="rounded-lg bg-red-100 text-red-700 px-4 py-3 shadow-md border border-red-300 text-center">
                        <p>📄 File PDF tidak ditemukan</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3 mt-8">
            <button type="submit" 
                    class="px-6 py-3 rounded-lg bg-army-green-600 hover:bg-army-green-700 text-white font-medium shadow-md transition-colors duration-200">
                💾 Simpan Perubahan
            </button>
            <a href="{{ route('surats.show', $surat->id) }}" 
               class="px-6 py-3 rounded-lg bg-gray-600 hover:bg-gray-700 text-white font-medium shadow-md transition-colors duration-200">
                ❌ Batal
            </a>
            <a href="{{ route('surats.index') }}" 
               class="px-6 py-3 rounded-lg bg-sage-green-600 hover:bg-sage-green-700 text-white font-medium shadow-md transition-colors duration-200">
                ← Kembali ke Arsip
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// Preview file yang akan diupload
document.getElementById('file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
        if (fileSize > 10) {
            Swal.fire({
                title: 'File Terlalu Besar!',
                text: `Ukuran file ${fileSize}MB melebihi batas maksimal 10MB.`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            this.value = ''; // Clear the file input
            return;
        }
        
        // Show file info
        Swal.fire({
            title: 'File Dipilih',
            text: `File "${file.name}" (${fileSize}MB) siap untuk diupload.`,
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const nomorSurat = document.getElementById('nomor_surat').value.trim();
    const kategori = document.getElementById('kategori').value;
    const judul = document.getElementById('judul').value.trim();
    
    if (!nomorSurat || !kategori || !judul) {
        e.preventDefault();
        Swal.fire({
            title: 'Form Belum Lengkap!',
            text: 'Mohon lengkapi semua field yang wajib diisi.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    // Show loading
    Swal.fire({
        title: 'Menyimpan...',
        text: 'Mohon tunggu sebentar',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
});
</script>
@endpush