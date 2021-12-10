<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTempatAkadNikah extends Model
{
    use HasFactory;

    protected $table = 'produk_tempat_akad_nikah';
    protected $primaryKey = 'id_produk_tempat_akad';

    public function transaksiSementara()
    {
        return $this->hasMany(TransaksiSementara::class, 'id_produk_tempat_akad');
    }

    public function fotoProdukTempatAkad()
    {
        return $this->hasMany(FotoProdukTempatAkad::class, 'id_produk_tempat_akad');
    }

    public function penyediaLayanan()
    {
        return $this->belongsTo(PenyediaLayanan::class, 'id_penyedia_layanan', 'id_penyedia_layanan');
    }
}
