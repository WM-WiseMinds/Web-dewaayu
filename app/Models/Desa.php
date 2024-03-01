<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    // Trait ini memungkinkan model untuk menghasilkan instance model baru
    use HasFactory;

    // ini adalah nama tabel yang akan digunakan oleh model
    protected $table = 'desa';

    /**
     * Atribut yang dapat diisi.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'nama_desa',
    ];

    /**
     * Relasi antara model Desa dan model User.
     *
     * @return void
     */
    public function user()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }
}
