<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukJasaFotografer extends Model
{
    use HasFactory;

    protected $table = 'produk_jasa_fotografer';
    protected $primaryKey = 'id_produk_jasa_fotografer';

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_produk_jasa_fotografer');
    }

    public function transaksiSementara()
    {
        return $this->hasMany(TransaksiSementara::class, 'id_produk_jasa_fotografer');
    }

    public function fotoProdukJasaFotografer()
    {
        return $this->hasMany(FotoProdukJasaFotografer::class, 'id_produk_jasa_fotografer');
    }

    public function penyediaLayanan()
    {
        return $this->belongsTo(PenyediaLayanan::class, 'id_penyedia_layanan', 'id_penyedia_layanan');
    }
}
