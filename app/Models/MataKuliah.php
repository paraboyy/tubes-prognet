<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'matakuliahs';

    public function scopeSemesterTotal($query)
    {
        return $query->selectRaw('semester, COUNT(*) as total_matakuliah')
            ->groupBy('semester')
            ->orderBy('semester');
    }
}
