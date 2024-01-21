<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ini adalah model untuk berita
class Tenagaahli extends Model
{
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan tabel berita
    use HasFactory;
    // line baris dibawah ini adalah untuk menentukan nama tabelnya
    protected $table = 'tenagaahli';
    // line baris dibawah ini adalah untuk menentukan kolom yang bisa diisi atau di edit
    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'jabatan',
        'no_hp',
        'alamat',
    ];
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user
    public function user()
    {
        // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user
        return $this->belongsTo(User::class);
    }

    public function penjadwalan()
    {
        // line baris dibawah ini adalah untuk menghubungkan model ini dengan model penjadwalan
        return $this->hasMany(Penjadwalan::class);
    }
}
