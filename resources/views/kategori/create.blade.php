@extends('layouts.app')

@section('title', 'Tambah Kategori')

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
                            <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                        </svg>
                        Tambah Kategori Baru
                    </h1>
                    <p class="text-white/90 text-sm lg:text-base leading-relaxed">
                        Buat kategori surat baru untuk mengorganisir dokumen dengan lebih baik.
                        <span class="font-medium">Pastikan nama kategori unik dan deskriptif.</span>
                    </p>
                </div>
                <div class="hidden lg:block">
                    <div class="w-20 h-20 bg-white/20 rounded-xl backdrop-blur-sm flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Alert -->
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

    @if ($errors->any())
        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-4 lg:p-6 rounded-xl shadow-lg mb-6">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-lg mb-2">Terjadi Kesalahan:</h3>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Form Section -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl border border-white/50 overflow-hidden">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-army-green-500/10 to-sage-green-500/10 p-4 lg:p-6 border-b border-army-green-200/30">
            <h2 class="text-xl font-bold text-army-green-800 flex items-center">
                <div class="w-8 h-8 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center mr-3 shadow-lg">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2v8h12V6H4zm2 2a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm0 3a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                Form Tambah Kategori Baru - ID: {{ $nextId }}
            </h2>
            <p class="text-army-green-600 text-sm mt-2">
                ID kategori selanjutnya akan otomatis: <span class="font-semibold">{{ $nextId }}</span>
            </p>
        </div>

        <!-- Form Content -->
        <div class="p-6 lg:p-8">
            <form action="{{ route('kategori.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- ID Field (Read-only) -->
                <div class="space-y-2">
                    <label for="id" class="flex items-center text-army-green-800 font-semibold text-sm lg:text-base">
                        <div class="w-6 h-6 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center mr-2 shadow-sm">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zM8 6a2 2 0 114 0v1H8V6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        ID Kategori
                        <span class="text-army-green-500 text-xs ml-2">(otomatis)</span>
                    </label>
                    <input type="text" 
                           id="id" 
                           class="w-full px-4 py-3 bg-gray-100/80 border-2 border-gray-300 rounded-xl text-gray-600 font-medium cursor-not-allowed" 
                           value="{{ $nextId }}" 
                           readonly>
                    <p class="text-xs text-army-green-500 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        ID akan otomatis dibuat oleh sistem
                    </p>
                </div>

                <!-- Nama Kategori Field -->
                <div class="space-y-2">
                    <label for="nama_kategori" class="flex items-center text-army-green-800 font-semibold text-sm lg:text-base">
                        <div class="w-6 h-6 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center mr-2 shadow-sm">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Nama Kategori
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input type="text" 
                           name="nama_kategori" 
                           id="nama_kategori" 
                           class="w-full px-4 py-3 bg-white/80 border-2 border-army-green-200 rounded-xl focus:ring-2 focus:ring-army-green-300 focus:border-army-green-400 transition-all duration-200 placeholder-army-green-400 text-army-green-800 font-medium @error('nama_kategori') border-red-400 focus:border-red-400 focus:ring-red-300 @enderror" 
                           value="{{ old('nama_kategori') }}" 
                           placeholder="Masukkan nama kategori (misal: Surat Resmi, Surat Undangan, dll)"
                           required>
                    @error('nama_kategori')
                        <p class="text-red-600 text-sm flex items-center mt-1">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Keterangan Field -->
                <div class="space-y-2">
                    <label for="keterangan" class="flex items-center text-army-green-800 font-semibold text-sm lg:text-base">
                        <div class="w-6 h-6 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center mr-2 shadow-sm">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Keterangan
                        <span class="text-army-green-500 text-xs ml-2">(opsional)</span>
                    </label>
                    <textarea name="keterangan" 
                              id="keterangan" 
                              rows="4" 
                              class="w-full px-4 py-3 bg-white/80 border-2 border-army-green-200 rounded-xl focus:ring-2 focus:ring-army-green-300 focus:border-army-green-400 transition-all duration-200 placeholder-army-green-400 text-army-green-800 resize-none @error('keterangan') border-red-400 focus:border-red-400 focus:ring-red-300 @enderror" 
                              placeholder="Berikan keterangan atau deskripsi singkat tentang kategori ini..."
                              maxlength="500">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <p class="text-red-600 text-sm flex items-center mt-1">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="flex justify-end">
                        <span class="text-xs text-army-green-500" id="charCount">0/500 karakter</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-army-green-200/30">
                    <button type="submit" 
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 lg:px-8 py-3 lg:py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold text-base lg:text-lg rounded-xl shadow-lg hover:shadow-xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 transform hover:scale-105 focus:ring-2 focus:ring-emerald-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Simpan Kategori</span>
                    </button>
                    
                    <a href="{{ route('kategori.index') }}" 
                       class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 lg:px-8 py-3 lg:py-4 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold text-base lg:text-lg rounded-xl shadow-lg hover:shadow-xl hover:from-gray-600 hover:to-gray-700 transition-all duration-200 transform hover:scale-105 focus:ring-2 focus:ring-gray-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Kembali</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Enhanced form styling */
.form-group {
    transition: all 0.3s ease-in-out;
}

/* Input focus animations */
input:focus, textarea:focus {
    transform: translateY(-1px);
    box-shadow: 0 10px 25px -5px rgba(34, 197, 94, 0.1);
}

/* Button loading state */
button:disabled {
    cursor: not-allowed;
    opacity: 0.7;
    transform: none !important;
}

/* Character counter */
#charCount {
    transition: color 0.3s ease;
}

.char-warning {
    color: #f59e0b !important;
}

.char-danger {
    color: #ef4444 !important;
}

/* Smooth transitions */
* {
    transition: all 0.2s ease-in-out;
}

/* Form validation styles */
.is-invalid {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

.is-valid {
    border-color: #22c55e !important;
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1) !important;
}

/* Mobile improvements */
@media (max-width: 640px) {
    .min-h-screen {
        min-height: calc(100vh - 2rem);
    }
    
    form {
        padding: 1rem;
    }
    
    .form-buttons {
        flex-direction: column;
        gap: 0.75rem;
    }
}

/* Loading spinner */
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

/* Success animation */
@keyframes bounce-in {
    0% {
        transform: scale(0.3);
        opacity: 0;
    }
    50% {
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.bounce-in {
    animation: bounce-in 0.6s ease-out;
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('button[type="submit"]');
    const keteranganInput = document.getElementById('keterangan');
    const charCount = document.getElementById('charCount');
    const namaKategoriInput = document.getElementById('nama_kategori');

    // Character counter for keterangan
    function updateCharCount() {
        const length = keteranganInput.value.length;
        const maxLength = 500;
        charCount.textContent = `${length}/${maxLength} karakter`;
        
        // Color coding
        if (length > maxLength * 0.9) {
            charCount.classList.add('char-danger');
            charCount.classList.remove('char-warning');
        } else if (length > maxLength * 0.7) {
            charCount.classList.add('char-warning');
            charCount.classList.remove('char-danger');
        } else {
            charCount.classList.remove('char-warning', 'char-danger');
        }
    }

    keteranganInput.addEventListener('input', updateCharCount);
    updateCharCount(); // Initial count

    // Form validation
    function validateForm() {
        let isValid = true;
        
        // Validate nama_kategori
        if (namaKategoriInput.value.trim().length < 3) {
            namaKategoriInput.classList.add('is-invalid');
            namaKategoriInput.classList.remove('is-valid');
            isValid = false;
        } else {
            namaKategoriInput.classList.add('is-valid');
            namaKategoriInput.classList.remove('is-invalid');
        }

        return isValid;
    }

    // Real-time validation
    namaKategoriInput.addEventListener('input', function() {
        if (this.value.trim().length >= 3) {
            this.classList.add('is-valid');
            this.classList.remove('is-invalid');
        } else {
            this.classList.remove('is-valid');
        }
    });

    // Form submission with loading state
    form.addEventListener('submit', function(e) {
        if (!validateForm()) {
            e.preventDefault();
            
            // Show validation error
            Swal.fire({
                title: 'Data Tidak Valid',
                text: 'Mohon periksa kembali data yang dimasukkan',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
            return;
        }

        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Menyimpan...</span>
        `;
    });

    // Auto-save draft (optional enhancement)
    let autoSaveTimer;
    function autoSave() {
        clearTimeout(autoSaveTimer);
        autoSaveTimer = setTimeout(() => {
            const formData = {
                nama_kategori: namaKategoriInput.value,
                keterangan: keteranganInput.value
            };
            localStorage.setItem('create_kategori_draft', JSON.stringify(formData));
        }, 1000);
    }

    namaKategoriInput.addEventListener('input', autoSave);
    keteranganInput.addEventListener('input', autoSave);

    // Load draft on page load
    const savedDraft = localStorage.getItem('create_kategori_draft');
    if (savedDraft) {
        const draftData = JSON.parse(savedDraft);
        // Only load draft if form is empty or user confirms
        if (namaKategoriInput.value === '' && keteranganInput.value === '') {
            if (confirm('Ada draft yang tersimpan. Apakah Anda ingin memuat kembali?')) {
                namaKategoriInput.value = draftData.nama_kategori || '';
                keteranganInput.value = draftData.keterangan || '';
                updateCharCount();
            }
        }
    }

    // Clear draft on successful submission
    form.addEventListener('submit', function() {
        setTimeout(() => {
            localStorage.removeItem('create_kategori_draft');
        }, 1000);
    });

    // Focus enhancement
    namaKategoriInput.focus();
});
</script>

<!-- SweetAlert2 for notifications -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@endsection