<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanPKK extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_pkk';
    protected $primaryKey = 'ID_Kegiatan';

    protected $fillable = [
        'ID_Pengurus',
        'nama_Kegiatan',
        'waktu',
        'tanggal',
        'tempat',
        'penanggung_Jawab',
        'deskripsi',
    ];
    public function rw(){
        return $this->belongsTo(PKK::class, 'ID_Pengurus', 'ID_Pengurus');
    }
}
