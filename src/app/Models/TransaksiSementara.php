<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSementara extends Model
{
    use HasFactory;

    protected $table = 'transaksi_sementara';
    protected $primaryKey = 'id_transaksi_sementara';

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }

    public function produkJasaFotografer()
    {
        return $this->belongsTo(ProdukJasaFotografer::class, 'id_produk_jasa_fotografer', 'id_produk_jasa_fotografer');
    }

    public function produkJasaCatering()
    {
        return $this->belongsTo(ProdukJasaCatering::class, 'id_jasa_catering', 'id_jasa_catering');
    }

    public function produkJasaDekorasi()
    {
        return $this->belongsTo(ProdukJasaDekorasi::class, 'id_jasa_dekorasi', 'id_jasa_dekorasi');
    }

    public function produkTempatAkadNikah()
    {
        return $this->belongsTo(ProdukTempatAkadNikah::class, 'id_produk_tempat_akad', 'id_produk_tempat_akad');
    }
}
