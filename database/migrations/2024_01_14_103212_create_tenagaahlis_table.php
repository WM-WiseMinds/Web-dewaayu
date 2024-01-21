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
        Schema::create('tenagaahlis', function (Blueprint $table) {
            // Ini adalah kolom 'id' yang akan menjadi primary key tabel.
            $table->id();
            //ini adalah kolom foreign key untuk menghubungkan tabel tenaga_ahli dengan tabel users
            $table->foreignId('user_id')->constrained('users');
            // Ini adalah kolom 'nama_lengkap' yang akan digunakan untuk menyimpan nama lengkap tenaga ahli.
            $table->string('nama_lengkap');
            // Ini adalah kolom 'jabatan' yang akan digunakan untuk menyimpan jabatan tenaga ahli.
            $table->string('jabatan');
            // Ini adalah kolom 'no_hp' yang akan digunakan untuk menyimpan nomor HP tenaga ahli.
            $table->string('no_hp');
            // Ini adalah kolom 'alamat' yang akan digunakan untuk menyimpan alamat tenaga ahli.
            $table->string('alamat');
            // Ini adalah kolom 'timestamps' yang otomatis akan mencatat waktu pembuatan dan pembaruan record.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenagaahlis');
    }
};
