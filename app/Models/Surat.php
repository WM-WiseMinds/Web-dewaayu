<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ini adalah model untuk surat
class Surat extends Model
{
    // Trait ini memungkinkan model untuk menghasilkan instance model baru
    use HasFactory;

    // ini adalah nama tabel yang akan digunakan oleh model
    protected $table = 'surat';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'desa_id',
        'pengirim',
        'perihal',
        'tanggal_kegiatan',
        'hari',
        'waktu',
        'lokasi_kegiatan',
        'status',
        'file_surat'
    ];

    /**
     * Relasi antara model Surat dan model User.
     *
     * @return void
     */
    public function user()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi antara model Surat dan model Desa.
     *
     * @return void
     */
    public function desa()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model desa
        return $this->belongsTo(Desa::class);
    }
}
