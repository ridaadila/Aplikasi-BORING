<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukJasaCatering extends Model
{
    use HasFactory;

    protected $table = 'produk_jasa_catering';
    protected $primaryKey = 'id_jasa_catering';

    public function transaksiSementara()
    {
        return $this->hasMany(TransaksiSementara::class, 'id_jasa_catering');
    }

    public function fotoProdukJasaCatering()
    {
        return $this->hasMany(FotoProdukJasaCatering::class, 'id_produk_jasa_catering');
    }

    public function penyediaLayanan()
    {
        return $this->belongsTo(PenyediaLayanan::class, 'id_penyedia_layanan', 'id_penyedia_layanan');
    }
}
