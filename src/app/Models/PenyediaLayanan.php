<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyediaLayanan extends Model
{
    use HasFactory;

    protected $table = 'penyedia_layanan';
    protected $primaryKey = 'id_penyedia_layanan';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function produkJasaCatering()
    {
        return $this->hasMany(ProdukJasaCatering::class, 'id_penyedia_layanan');
    }

    public function produkJasaDekorasi()
    {
        return $this->hasMany(ProdukJasaDekorasi::class, 'id_penyedia_layanan');
    }

    public function produkJasaFotografer()
    {
        return $this->hasMany(ProdukJasaFotografer::class, 'id_penyedia_layanan');
    }

    public function produkTempatAkadNikah()
    {
        return $this->hasMany(ProdukTempatAkadNikah::class, 'id_penyedia_layanan');
    }

    public function jenisPenyediaLayanan()
    {
        return $this->belongsTo(JenisPenyediaLayanan::class, 'id_jenis_penyedia', 'id_jenis_penyedia');
    }

    public function fotoToko()
    {
        return $this->hasMany(FotoToko::class, 'id_penyedia_layanan');
    }
}
