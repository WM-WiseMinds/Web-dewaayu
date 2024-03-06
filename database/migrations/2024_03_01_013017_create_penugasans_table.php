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
        Schema::create('penugasan', function (Blueprint $table) {
            // Ini adalah kolom 'id' yang akan menjadi primary key tabel.
            $table->id();
            //ini adalah kolom untuk menghubungkan tabel penugasan dengan tabel user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //ini adalah kolom untuk menghubungkan tabel penugasan dengan tabel surat
            $table->foreignId('surat_id')->constrained('surat')->onDelete('cascade');
            //ini adalah kolom untuk menghubungkan tabel penugasan dengan tabel status
            $table->enum('status', ['Ditugaskan', 'Disetujui', 'Ditolak'])->default('Ditugaskan');
            //ini adalah kolom untuk otomatis mencatat waktu pembuatan dan pembaruan record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan');
    }
};
