<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukJasaDekorasi extends Model
{
    use HasFactory;

    protected $table = 'produk_jasa_dekorasi';
    protected $primaryKey = 'id_jasa_dekorasi';

    public function transaksiSementara()
    {
        return $this->hasMany(TransaksiSementara::class, 'id_jasa_dekorasi');
    }

    public function fotoProdukJasaDekorasi()
    {
        return $this->hasMany(FotoProdukJasaDekorasi::class, 'id_jasa_dekorasu');
    }

    public function penyediaLayanan()
    {
        return $this->belongsTo(PenyediaLayanan::class, 'id_penyedia_layanan', 'id_penyedia_layanan');
    }
}
