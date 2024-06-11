<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table ="nilai";
    protected $primaryKey ="ID_Nilai";
    protected $fillable = [
        'ID_alternatif',
        'ID_Kriteria',
        'nilai',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'ID_alternatif', 'ID_alternatif');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'ID_Kriteria', 'ID_Kriteria');
    }
}
