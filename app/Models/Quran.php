<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
    use HasFactory;

    protected $table = 'quran';

    protected $fillable = [
        'nomor',
        'nama',
        'nama_latin',
        'jumlah_ayat',
        'tempat_turun',
        'arti',
        'deskripsi',
        'audio_full',
    ];

    public function audio()
    {
        return $this->hasMany(AudioQuran::class, 'quran_id');
    }
}
