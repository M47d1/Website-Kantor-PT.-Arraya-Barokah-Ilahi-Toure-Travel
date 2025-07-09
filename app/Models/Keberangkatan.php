<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keberangkatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_berangkat',
        'nama_paket',
        'gelombang',
        'status',
    ];

    protected $dates = ['tanggal_berangkat'];

    public function jamaah()
    {
        return $this->belongsToMany(Jamaah::class, 'jamaah_keberangkatan');
    }

    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class);
    }

}
