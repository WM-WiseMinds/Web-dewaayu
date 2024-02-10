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
            //ini adalah kolom untuk menghubungkan tabel surat dengan tabel user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //ini adalah kolom tabel untuk menyimpan atribut perihal
            $table->string('perihal');
            //ini adalah kolom tabel untuk menyimpan atribut tanggal_kegiatan
            $table->date('tanggal_kegiatan');
            //ini adalah kolom tabel untuk menyimpan atribut hari
            $table->string('hari');
            //ini adalah kolom tabel untuk menyimpan atribut jam_kegiatan
            $table->string('jam_kegiatan');
            //ini adalah kolom tabel untuk menyimpan atribut tempat_kegiatan
            $table->string('lokasi_kegiatan');
            //ini adalah kolom untuk otomatis mencatat waktu pembuatan dan pembaruan record
            $table->timestamps();
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
