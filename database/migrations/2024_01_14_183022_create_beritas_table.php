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
        Schema::create('berita', function (Blueprint $table) {
            // Ini adalah kolom 'id' yang akan menjadi primary key tabel.
            $table->id();
            // Ini adalah kolom 'user_id' yang akan menjadi foreign key, terhubung dengan tabel 'users'.
            // Juga, jika user terkait dihapus, record berita yang terkait juga akan dihapus ('onDelete' cascade).
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Ini adalah kolom 'judul_berita' yang akan digunakan untuk menyimpan judul berita.
            $table->string('judul_berita');
            // Ini adalah kolom 'deskripsi_berita' yang akan digunakan untuk menyimpan deskripsi atau isi berita.
            $table->string('deskripsi_berita');
            // Ini adalah kolom 'foto' yang akan digunakan untuk menyimpan path atau nama file foto berita.
            $table->string('foto')->nullable();
            // Ini adalah kolom 'timestamps' yang otomatis akan mencatat waktu pembuatan dan pembaruan record.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
