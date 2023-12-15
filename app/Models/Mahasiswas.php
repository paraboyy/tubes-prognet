<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswas extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'nim'; // Sesuaikan dengan primary key pada tabel mahasiswas

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id', 'id');
    }

    public function scopeAlamatTotal($query)
    {
        return $query->selectRaw('alamat, COUNT(*) as total_mahasiswa')
            ->groupBy('alamat')
            ->orderBy('alamat');
    }
}
