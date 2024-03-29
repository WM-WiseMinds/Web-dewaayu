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
        'pengirim_id',
        'penerima_id',
        'rekomendasi_id',
        'desa_id',
        'jenis_surat',
        'pengirim_eksternal',
        'penerima_eksternal',
        'perihal',
        'tanggal_kegiatan',
        'hari',
        'waktu',
        'lokasi_kegiatan',
        'status',
        'file_surat'
    ];

    /**
     * Atribut yang akan di-casting.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Relasi antara model Surat dan model User melalui FK pengirim_id.
     *
     * @return void
     */
    public function pengirim()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model user
        return $this->belongsTo(User::class, 'pengirim_id');
    }

    /**
     * Relasi antara model Surat dan model User melalui FK penerima_id.
     *
     * @return void
     */
    public function penerima()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model user
        return $this->belongsTo(User::class, 'penerima_id');
    }

    /**
     * Relasi antara model Surat dan model User melalui FK rekomendasi_id.
     *
     * @return void
     */
    public function rekomendasi()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model user
        return $this->belongsTo(User::class, 'rekomendasi_id');
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

    /**
     * Relasi antara model Surat dan model Penugasan.
     *
     * @return void
     */
    public function penugasan()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan hasmany yang dimana menghubungkan model ini dengan model penugasan
        return $this->hasOne(Penugasan::class);
    }
}
