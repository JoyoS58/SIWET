<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RT extends Model
{
    use HasFactory;

    protected $table = "RT";
    protected $primaryKey = "ID_RT";

    protected $fillable = ['ID_RW','ketua_RT','sekretaris_RT','bendahara_RT','nomor_RT'];

    public function RW(){
        return $this->belongsTo(RW::class,'ID_RW','ID_RW');
    }
    public function Warga(){
        return $this->hasMany(Warga::class);
    }
    public function Mahasiswa_Kos(){
        return $this->hasMany(MahasiswaKos::class);
    }
}
