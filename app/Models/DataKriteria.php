<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;
    protected $table ="Data_Kriteria";
    protected $primaryKey ="ID_DataKriteria";
    protected $fillable =['ID_Kriteria','kategori','nilai'];
    public function kriteria(){
        return $this -> belongsTo(Kriteria::class);
    }
}
