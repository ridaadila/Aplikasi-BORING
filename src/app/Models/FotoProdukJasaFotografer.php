<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProdukJasaFotografer extends Model
{
    use HasFactory;

    protected $table = 'foto_produk_jasa_fotografer';
    protected $primaryKey = 'id_foto_produk_jasa_fotografer';

    public function produkJasaFotografer()
    {
        return $this->belongsTo(ProdukJasaFotografer::class, 'id_produk_jasa_fotografer', 'id_produk_jasa_fotografer');
    }
}
