<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MahasiswaKos extends Model
{
    use HasFactory;
    protected $table = 'Mahasiswa_Kos';
    protected $primaryKey = 'NIK';
    protected $fillable = ['NIK','ID_RT','nama','tempat_Tanggal_Lahir','alamat_Kos','jenis_Kelamin','agama','universitas','jurusan'];

    public function RT()
    {
        return $this->belongsTo(RT::class, 'ID_RT', 'ID_RT');
    }
}
