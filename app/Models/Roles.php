<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ini adalah model untuk berita
class Roles extends Model
{
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan tabel berita
    use HasFactory;
    // line baris dibawah ini adalah untuk menentukan nama tabelnyaq
    protected $table ='roles';
    // line baris dibawah ini adalah untuk menentukan kolom yang bisa diisi atau di edit
    protected $fillable = [
        'name',
    ];
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model operator
    public function permissions()
    {
        // line baris dibawah ini adalah tujuan dari relasi one to many menggunakan belongsto yang dimana menghubungkan model ini dengan model operator
        return $this->belongsToMany(Permissions::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model operator
    public function user()
    {   
        // line baris dibawah ini adalah relasi one to many menggunakan hasMany yang dimana menghubungkan model ini dengan model operator
        return $this->hasMany(User::class);
    }

}
