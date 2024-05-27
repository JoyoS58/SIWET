<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Warga extends Model
{
    use HasFactory;

    protected $table = "Warga";
    protected $primaryKey = "NIK";

    protected $fillable = ['NIK','ID_RT','nomor_KK','nama','tempat_Tanggal_Lahir','agama','alamat','pekerjaan','jenis_Kelamin','jenis_Penduduk'];

    public function RT(){
        return $this->belongsTo(RT::class,'ID_RT','ID_RT');
    }
}
