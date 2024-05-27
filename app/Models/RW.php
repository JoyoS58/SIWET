<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RW extends Model
{
    use HasFactory;
    protected $table = "RW";
    protected $primaryKey = "ID_RW";

    protected $fillable = ['nama_Pengurus','jabatan_Pengurus','nomor_RW'];

    public function RT(){
        return $this->hasMany(RT::class);
    }
}
