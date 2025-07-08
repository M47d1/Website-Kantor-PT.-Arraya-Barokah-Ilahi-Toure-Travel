<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jamaah extends Model
{
    use HasFactory;

    protected $table = 'jamaah';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'foto_ktp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_paspor',
        'foto_paspor',
        'alamat',
        'no_hp',
        'foto',
        'foto_kk',
        'foto_akta_lahir',
        'mitra_id',
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function keberangkatan()
    {
        return $this->belongsToMany(Keberangkatan::class, 'jamaah_keberangkatan');
    }

}
