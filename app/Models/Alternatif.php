<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatif';
    protected $primaryKey = 'ID_alternatif';
    protected $fillable = ['nama_alternatif'];
    public $incrementing = true;
    protected $keyType = 'int';

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'ID_alternatif', 'ID_alternatif');
    }
}
