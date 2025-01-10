<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pasien',
        'nama',
        'umur',
        'jenis_kelamin',
        'alamat',
        'foto',
    ];

    public function daftar()
    {
        return $this->hasMany(Daftar::class);
    }
}
