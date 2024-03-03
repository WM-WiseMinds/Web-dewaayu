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
        Schema::create('surat', function (Blueprint $table) {
            // Ini adalah kolom 'id' yang akan menjadi primary key tabel.
            $table->id();
            //ini adalah kolom untuk menghubungkan tabel surat dengan tabel user melalui foreign key pengirim_id
            $table->foreignId('pengirim_id')->nullable()->constrained('users')->onDelete('cascade');
            // ini adalah kolom untuk menghubungkan tabel surat dengan tabel user melalui foreign key penerima_id
            $table->foreignId('penerima_id')->nullable()->constrained('users')->onDelete('cascade');
            // ini adalah kolom untuk menyimpan rekomendasi anggota tapm
            $table->foreignId('rekomendasi_id')->nullable()->constrained('users')->onDelete('cascade');
            // ini adalah kolom untuk menghubungkan tabel surat dengan tabel desa
            $table->foreignId('desa_id')->nullable()->constrained('desa')->onDelete('cascade');
            // ini adalah kolom untuk menyimpan atribut jenis surat
            $table->enum('jenis_surat', ['Surat Masuk', 'Surat Keluar']);
            // ini adalah kolom untuk menyimpan atribut pengirim eksternal
            $table->string('pengirim_eksternal')->nullable();
            //ini adalah kolom tabel untuk menyimpan atribut perihal
            $table->string('perihal');
            //ini adalah kolom tabel untuk menyimpan atribut tanggal_kegiatan
            $table->date('tanggal_kegiatan')->nullable();
            //ini adalah kolom tabel untuk menyimpan atribut hari
            $table->string('hari')->nullable();
            //ini adalah kolom tabel untuk menyimpan atribut waktu
            $table->string('waktu')->nullable();
            //ini adalah kolom tabel untuk menyimpan atribut tempat_kegiatan
            $table->string('lokasi_kegiatan')->nullable();
            //ini adalah kolom tabel untuk menyimpan atribut status surat
            $table->enum('status', ['Dikirim', 'Dikonfirmasi'])->default('Dikirim');
            //ini adalah kolom tabel untuk menyimpan atribut file surat
            $table->string('file_surat');
            //ini adalah kolom untuk otomatis mencatat waktu pembuatan dan pembaruan record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
