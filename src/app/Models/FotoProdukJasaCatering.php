<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProdukJasaCatering extends Model
{
    use HasFactory;

    protected $table = 'foto_produk_jasa_catering';
    protected $primaryKey = 'id_foto_produk_jasa_catering';

    public function produkJasaCatering()
    {
        return $this->belongsTo(ProdukJasaCatering::class, 'id_jasa_catering', 'id_jasa_catering');
    }
}
