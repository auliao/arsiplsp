@extends('layouts.app')

@section('title', 'Detail Surat')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-army-green-50 via-white to-sage-green-50 -m-8 p-6 lg:p-10">
    <!-- Header -->
    <h1 class="text-2xl font-bold text-army-green-700 mb-2">Arsip Surat &raquo; Lihat</h1>
    <p class="text-sage-green-700 mb-6">
        Berikut adalah detail lengkap dari surat yang dipilih.
    </p>

    <!-- Detail Surat -->
    <div class="overflow-hidden bg-white/90 backdrop-blur-sm shadow-lg rounded-2xl mb-8 border border-sage-green-200">
        <table class="min-w-full text-sm text-gray-700">
            <tbody>
                <tr class="border-b border-sage-green-100">
                    <th class="w-48 bg-sage-green-50 px-6 py-4 text-left font-semibold text-gray-800">Nomor Surat</th>
                    <td class="px-6 py-4">{{ $surat->nomor_surat }}</td>
                </tr>
                <tr class="border-b border-sage-green-100">
                    <th class="bg-sage-green-50 px-6 py-4 text-left font-semibold text-gray-800">Kategori</th>
                    <td class="px-6 py-4">{{ $surat->kategori }}</td>
                </tr>
                <tr class="border-b border-sage-green-100">
                    <th class="bg-sage-green-50 px-6 py-4 text-left font-semibold text-gray-800">Judul</th>
                    <td class="px-6 py-4">{{ $surat->judul }}</td>
                </tr>
                <tr>
                    <th class="bg-sage-green-50 px-6 py-4 text-left font-semibold text-gray-800">Waktu Unggah</th>
                    <td class="px-6 py-4">{{ $surat->formatted_waktu_pengarsipan }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Preview PDF -->
    @if($surat->file_path && Storage::disk('public')->exists($surat->file_path))
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-army-green-800 mb-4">Preview PDF</h3>
            <div class="border border-sage-green-200 rounded-xl overflow-hidden shadow-md bg-white/80">
                <iframe 
                    src="{{ asset('storage/' . $surat->file_path) }}" 
                    class="w-full h-[600px] border-none rounded-b-xl">
                </iframe>
            </div>
        </div>
    @else
        <div class="mb-8 rounded-lg bg-red-100 text-red-700 px-4 py-3 shadow-md border border-red-300">
            File PDF tidak ditemukan di server.
        </div>
    @endif

    <!-- Action Buttons -->
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('surats.download', $surat->id) }}" 
           class="px-5 py-2 rounded-lg bg-amber-500 hover:bg-amber-600 text-white font-medium shadow">
            📥 Unduh PDF
        </a>
        <a href="{{ route('surats.edit', $surat->id) }}" 
           class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-medium shadow">
            ✏️ Edit Surat
        </a>
        <button onclick="confirmDelete({{ $surat->id }})" 
                class="px-5 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white font-medium shadow">
            🗑️ Hapus Surat
        </button>
        <a href="{{ route('surats.index') }}" 
           class="px-5 py-2 rounded-lg bg-army-green-600 hover:bg-army-green-700 text-white font-medium shadow">
            ← Kembali ke Arsip
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Konfirmasi Penghapusan',
        text: 'Apakah Anda yakin ingin menghapus surat ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/surats/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: data.message,
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = '/surats';
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan saat menghapus surat.',
                        'error'
                    );
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire(
                    'Error!',
                    'Terjadi kesalahan saat menghapus surat.',
                    'error'
                );
            });
        }
    });
}
</script>
@endpush