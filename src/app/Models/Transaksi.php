<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function transaksiSementara()
    {
        return $this->hasMany(TransaksiSementara::class, 'id_transaksi');
    }
}
