<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ini adalah model untuk penjadwalan
class Penjadwalan extends Model
{
    // Trait ini memungkinkan model untuk menghasilkan instance model baru
    use HasFactory;

    // ini adalah nama tabel yang akan digunakan oleh model
    protected $table = 'penjadwalan';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'penugasan_id',

    ];

    /**
     * Relasi antara model Penjadwalan dan model User.
     *
     * @return void
     */
    public function user()
    {
        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi antara model Penjadwalan dan model Penugasan.
     *
     * @return void
     */
    public function penugasan()
    {
        // line ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana  menghubungkan model ini dengan model penugasan
        return $this->belongsTo(Penugasan::class);
    }
}
