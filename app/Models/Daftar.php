<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Daftar extends Model
{
    use SearchableTrait;
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'poli_id',
        'keluhan',
        'tanggal_daftar',
    ];

    protected $searchable = [
        'columns' => [
            'pasiens.nama' => 1,
            'pasiens.no_pasien' => 10,
            'polis.nama' => 3,
        ],
        'joins' => [
            'pasiens' => ['pasiens.id', 'daftars.pasien_id'],
            'polis' => ['poli_id', 'daftars.poli_id'],
        ],
    ];
    protected $casts = [
        'tanggal_daftar' => 'datetime', // Konversi tanggal_daftar ke tipe datetime
    ];

    // Model Daftar
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }
}
