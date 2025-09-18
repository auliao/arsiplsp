<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 50)->unique()->comment('Nomor surat unik');
            $table->enum('kategori', [
                'Pengumuman', 
                'Undangan', 
                'Nota Dinas', 
                'Pemberitahuan'
            ])->comment('Kategori surat');
            $table->string('judul')->comment('Judul/perihal surat');
            $table->timestamp('waktu_pengarsipan')->comment('Waktu surat diarsipkan');
            $table->string('file_path')->nullable()->comment('Path file PDF di storage');
            $table->string('original_filename')->nullable()->comment('Nama file asli yang diupload');
            $table->unsignedBigInteger('file_size')->nullable()->comment('Ukuran file dalam bytes');
            $table->string('mime_type')->default('application/pdf')->comment('Tipe MIME file');
            $table->text('keterangan')->nullable()->comment('Keterangan tambahan');
            $table->boolean('is_active')->default(true)->comment('Status aktif surat');
            $table->timestamps();

            // Index untuk optimasi query
            $table->index(['kategori']);
            $table->index(['waktu_pengarsipan']);
            $table->index(['is_active']);
            $table->fullText(['judul', 'keterangan'], 'search_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};