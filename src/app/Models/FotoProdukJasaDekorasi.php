<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProdukJasaDekorasi extends Model
{
    use HasFactory;

    protected $table = 'foto_produk_jasa_dekorasi';
    protected $primaryKey = 'id_foto_produk_jasa_dekorasi';

    public function produkJasaDekorasi()
    {
        return $this->belongsTo(ProdukJasaDekorasi::class, 'id_jasa_Dekorasi', 'id_jasa_Dekorasi');
    }
}
