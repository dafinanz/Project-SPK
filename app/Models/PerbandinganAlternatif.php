<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganAlternatif extends Model
{
    use HasFactory;

    protected $table = 'perbandingan_alternatifs';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'alternatif_id', 'kriteria_id', 'bobot'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id', 'kode');
    }
}
