<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPKK extends Model
{
    use HasFactory;
    protected $table = "Anggota_PKK";
    protected $primaryKey = "ID_Anggota";

    protected $fillable = ['ID_Pengurus','nama','jabatan','nomor_Telepon'];

    public function PKK(){
        return $this->belongsTo(PKK::class,'ID_Pengurus','ID_Pengurus');
    }
}
