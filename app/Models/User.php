<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

// ini adalah model untuk user
class User extends Authenticatable
{
    // Trait ini memungkinkan model untuk menghasilkan token API untuk otentikasi
    use HasApiTokens;
    // Trait ini menyediakan metode factory() untuk membuat instance model baru
    use HasFactory;
    // Trait ini memungkinkan model untuk memiliki foto profil yang dapat diunggah dan diubah
    use HasProfilePhoto;
    // Trait ini memungkinkan model untuk menerima notifikasi melalui berbagai saluran
    use Notifiable;
    // Trait ini memungkinkan model untuk menggunakan otentikasi dua faktor
    use TwoFactorAuthenticatable;
    // Trait ini memungkinkan model untuk memiliki peran
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // line baris dibawah ini adalah untuk menentukan kolom yang bisa diisi atau di edit
    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'no_hp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    // line baris dibawah ini adalah untuk menentukan kolom yang tidak bisa diisi atau di edit
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    // line baris dibawah ini adalah untuk menentukan kolom yang harus di cast
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */

    // line baris dibawah ini adalah untuk menentukan kolom yang harus di append
    protected $appends = [
        'profile_photo_url',
    ];


    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model berita
    public function berita()
    {
        // line baris dibawah ini adalah relasi one to many menggunakan hasMany yang dimana menghubungkan model ini dengan model berita
        return $this->hasMany(Berita::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model surat
    public function surat()
    {
        // line baris dibawah ini adalah relasi one to many menggunakan hasMany yang dimana menghubungkan model ini dengan model surat
        return $this->hasMany(Surat::class);
    }
    // line baris dibawah ini adalah untuk menghubungkan model ini dengan model penjadwalan
    public function penjadwalan()
    {
        // line baris dibawah ini adalah relasi one to many menggunakan hasMany yang dimana menghubungkan model ini dengan model penjadwalan
        return $this->hasMany(Penjadwalan::class);
    }

    protected function getDefaultGuardName(): string
    {
        return 'web';
    }
}
