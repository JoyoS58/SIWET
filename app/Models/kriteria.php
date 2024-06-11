<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table ="Kriteria";
    protected $primaryKey = "ID_Kriteria";
    protected $fillable = ['nama_Kriteria','kode_Kriteria','bobot_Kriteria'];
    public $incrementing = true;
    protected $keyType = 'int';
    public function alternatif(){
        return $this -> hasMany(Alternatif::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'ID_Kriteria', 'ID_Kriteria');
    }
    // public function dataKriteria(){
    //     return $this -> hasMany(DataKriteria::class);
    // }

}
