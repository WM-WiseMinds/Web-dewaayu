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
        Schema::create('penjadwalan', function (Blueprint $table) {
            // Ini adalah kolom 'id' yang akan menjadi primary key tabel.
            $table->id();
            //ini adalah kolom untuk menghubungkan tabel penjadwalan dengan tabel user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //ini adalah kolom tabel untuk menyimpan atribut tanggal kegiatan
            $table->date('tanggal_kegiatan');
            //ini adalah kolom tabel untuk menyimpan atribut waktu kegiatan
            $table->time('waktu_kegiatan');
            //ini adalah kolom tabel untuk menyimpan atribut detail kegiatan
            $table->string('detail_kegiatan');
            //ini adalah kolom tabel untuk menyimpan atribut lokasi kegiatan
            $table->string('lokasi_kegiatan');
            //ini adalah kolom tabel untuk melakukan otomatisasi pencatatan waktu pembuatan dan pembaruan record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjadwalans');
    }
};
