<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $query = Surat::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $surats = $query->orderBy('waktu_pengarsipan', 'desc')->get();

        // Calculate statistics
        $total_surats = $surats->count();
        $bulan_ini = Surat::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();
        $minggu_ini = Surat::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $hari_ini = Surat::whereDate('created_at', today())->count();

        return view('surats.index', compact('surats', 'total_surats', 'bulan_ini', 'minggu_ini', 'hari_ini'));
    }

    public function create()
    {
        return view('surats.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_surat' => 'required|string|max:50|unique:surats,nomor_surat',
            'kategori' => 'required|string|in:Pengumuman,Undangan,Nota Dinas,Pemberitahuan',
            'judul' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:10240', // 10MB max
        ], [
            'nomor_surat.required' => 'Nomor surat harus diisi',
            'nomor_surat.unique' => 'Nomor surat sudah ada dalam database',
            'kategori.required' => 'Kategori harus dipilih',
            'kategori.in' => 'Kategori tidak valid',
            'judul.required' => 'Judul surat harus diisi',
            'file.required' => 'File PDF harus dipilih',
            'file.mimes' => 'File harus berformat PDF',
            'file.max' => 'Ukuran file maksimal 10MB',
        ]);

        try {
            // Ambil file yang diupload
            $file = $request->file('file');
            
            // Generate nama file unik
            $timestamp = Carbon::now()->format('YmdHis');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $timestamp . '_' . str_replace(' ', '_', $originalName) . '.' . $extension;
            
            // Simpan file ke storage/app/public/surats
            $filePath = $file->storeAs('surats', $filename, 'public');
            
            // Buat record di database
            $surat = Surat::create([
                'nomor_surat' => $request->nomor_surat,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'waktu_pengarsipan' => Carbon::now(),
                'file_path' => $filePath,
                'original_filename' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
            ]);

            // Redirect kembali ke form create dengan pesan sukses dan data surat
            return redirect()->route('surats.create')->with([
                'success' => 'Surat berhasil diarsipkan!',
                'surat_data' => [
                    'nomor_surat' => $surat->nomor_surat,
                    'kategori' => $surat->kategori,
                    'judul' => $surat->judul,
                    'file_name' => $surat->original_filename,
                    'file_size' => $this->formatFileSize($surat->file_size),
                    'waktu_pengarsipan' => $surat->formatted_waktu_pengarsipan,
                ]
            ]);

        } catch (\Exception $e) {
            // Jika ada error, hapus file jika sudah terupload
            if (isset($filePath) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Gagal menyimpan surat: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surats.show', compact('surat'));
    }

    public function destroy($id)
    {
        try {
            $surat = Surat::findOrFail($id);
            
            // Hapus file dari storage
            if ($surat->file_path && Storage::disk('public')->exists($surat->file_path)) {
                Storage::disk('public')->delete($surat->file_path);
            }
            
            $surat->delete();
            
            return response()->json([
                'success' => true, 
                'message' => 'Surat berhasil dihapus!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Gagal menghapus surat: ' . $e->getMessage()
            ], 500);
        }
    }

    public function download($id)
    {
        $surat = Surat::findOrFail($id);
        
        if (!$surat->file_path || !Storage::disk('public')->exists($surat->file_path)) {
            abort(404, 'File tidak ditemukan');
        }
        
        $filePath = storage_path('app/public/' . $surat->file_path);
        
        return Response::download($filePath, $surat->original_filename);
    }

    public function about()
    {
        return view('surats.about');
    }

    /**
     * Format file size untuk display
     */
    private function formatFileSize($bytes)
    {
        if (!$bytes) return 'Unknown';
        
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }
}