<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $fillable = [
        'kode_mitra',
        'nama_depan',
        'nama_belakang',
        'nama_sponsor',
        'kode_sponsor',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'foto',
        'sponsor_id', // pastikan ini ada kalau kamu pakai foreign key ke mitra lain
    ];    

    // Akses nama lengkap
    public function getNamaLengkapAttribute()
    {
        return "{$this->nama_depan} {$this->nama_belakang}";
    }

    // Relasi ke jamaah langsung
    public function jamaah()
    {
        return $this->hasMany(\App\Models\Jamaah::class);
    }

    // Relasi ke sponsor (atasannya)
    public function sponsor()
    {
        return $this->belongsTo(Mitra::class, 'sponsor_id');
    }

    // Relasi ke mitra bawahan (anak mitra)
    public function mitraBawahan()
    {
        return $this->hasMany(Mitra::class, 'sponsor_id');
    }
}
