<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoToko extends Model
{
    use HasFactory;

    protected $table = 'foto_toko';
    protected $primaryKey = 'id_foto_toko';

    public function penyediaLayanan()
    {
        return $this->belongsTo(PenyediaLayanan::class, 'id_penyedia_layanan', 'id_penyedia_layanan');
    }
}
