<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenyediaLayanan extends Model
{
    use HasFactory;

    protected $table = 'jenis_penyedia_layanan';
    protected $primaryKey = 'id_jenis_penyedia';

    public function penyediaLayanan()
    {
        return $this->hasMany(PenyediaLayanan::class, 'id_jenis_penyedia');
    }
}
