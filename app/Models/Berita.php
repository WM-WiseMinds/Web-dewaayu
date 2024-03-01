<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ini adalah model untuk berita
class Berita extends Model
{
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan tabel berita
    use HasFactory;
    protected $table = 'berita';
    // line baris dibawah ini adalah untuk menentukan nama tabelnya
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'foto',
    ];

    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model user
    public function user()
    {
        // line baris dibawah ini adalah relasi one to many dengan model user
        return $this->belongsTo(User::class);
    }
}
