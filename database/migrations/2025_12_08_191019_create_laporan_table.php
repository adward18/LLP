<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            
            // Data Pelapor
            $table->string('nama_pelapor', 100);
            $table->string('email_pelapor', 100)->nullable();
            
            // Data Terlapor/Penipu
            $table->string('nomor_telepon', 20);
            $table->string('nama_penipu', 100)->nullable();
            
            // Info Rekening/E-Wallet Penipu
            $table->string('jenis_rekening', 50)->nullable();
            $table->string('nomor_rekening', 100)->nullable();
            
            // Kronologi & Bukti
            $table->text('deskripsi');
            $table->json('bukti_images')->nullable();
            
            // Status & Admin
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable(); // Catatan admin (untuk reject)
            $table->unsignedBigInteger('admin_id')->nullable(); // Admin yang verifikasi
            
            // Soft Delete
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
};