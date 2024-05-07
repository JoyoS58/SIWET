<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RT extends Model
{
    use HasFactory;

    protected $table = "RT";
    protected $primaryKey = "ID_RT";

    protected $fillable = ['ID_RW','ketua_RT','sekretaris_RT','bendahara_RT','nomor_RT'];

    public function RW(){
        return $this->belongsTo(RW::class,'ID_RW','ID_RW');
    }
}
