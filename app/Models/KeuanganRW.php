<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KeuanganRW extends Model
{
    protected $table = 'kas_rw';
    protected $primaryKey = 'ID_Transaksi';
    public $incrementing = true;

    protected $fillable = [
        'ID_RW',
        'nominal',
        'jenis_Transaksi',
        'tanggal_Transaksi',
        'saldo',
        'deskripsi',
    ];
    public function rw(): BelongsTo{
        return $this->belongsTo(RW::class, 'ID_RW', 'ID_RW');
    }
}
