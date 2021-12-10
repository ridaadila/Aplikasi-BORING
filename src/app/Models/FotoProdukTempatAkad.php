<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProdukTempatAkad extends Model
{
    use HasFactory;

    protected $table = 'foto_produk_tempat_akad';
    protected $primaryKey = 'id_foto_produk_tempat_akad_nikah';

    public function produkTempatAkadNikah()
    {
        return $this->belongsTo(ProdukTempatAkadNikah::class, 'id_produk_tempat_akad', 'id_produk_tempat_akad');
    }
}
