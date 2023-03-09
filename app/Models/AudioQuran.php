<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioQuran extends Model
{
    use HasFactory;

    protected $table = 'audio_quran';

    protected $fillable = [
        'audio',
        'quran_id',
    ];

    public function quran()
    {
        return $this->belongsTo(Quran::class, 'quran_id');
    }
}
