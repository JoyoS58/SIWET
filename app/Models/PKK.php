<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKK extends Model
{
    use HasFactory;

    protected $table = "PKK";
    protected $primaryKey ="ID_Pengurus";

    protected $fillable = ['ID_RW','nama_Pengurus','jabatan'];

    public function AnggotaPKK(){
        return $this->hasMany(AnggotaPKK::class);
    }
    public function KegiatanPKK(){
        return $this->hasMany(KegiatanPKK::class);
    }
    public function KeuanganPKK(){
        return $this->hasMany(KeuanganPKK::class);
    }
}
