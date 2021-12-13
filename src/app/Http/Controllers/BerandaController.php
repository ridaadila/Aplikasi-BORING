<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenyediaLayanan;

class BerandaController extends Controller
{
    
    public function index()
    {
        $allPenyediaLayanan = DB::table('penyedia_layanan')
                                ->join('jenis_penyedia_layanan', 'jenis_penyedia_layanan.id_jenis_penyedia', 
                                        'penyedia_layanan.id_jenis_penyedia')
                                ->select(
                                    'penyedia_layanan.*',
                                    'jenis_penyedia_layanan.nama as nama_jenis'
                                )
                                ->get();
        // dd($allPenyediaLayanan);
        $jenisPenyedia = DB::table('jenis_penyedia_layanan')->get();

        $array = [];

        foreach ($jenisPenyedia as $jenis) {
            $array[$jenis->NAMA] = [];
        }

        foreach($allPenyediaLayanan as $data)
        {
            $item_array = [
                "id_penyedia_layanan"=>$data->ID_PENYEDIA_LAYANAN,
                "nama_toko_jasa"=>$data->NAMA_TOKO_JASA,
                "alamat"=>$data->ALAMAT,
                "nomor_telepon"=>$data->NOMOR_TELEPON,
                "deskripsi"=>$data->DESKRIPSI_TOKO_JASA,
                "nama_jenis"=>(empty($data->nama_jenis)) ? "" : $data->nama_jenis
            ];

            if(!empty($data->JENIS_KATEGORI))
            {
                if(!isset($array[$data->nama_jenis][$data->JENIS_KATEGORI])) {
                    $array[$data->nama_jenis][$data->JENIS_KATEGORI] = [];
                }
    
                array_push($array[$data->nama_jenis][$data->JENIS_KATEGORI], $item_array);
            }
            else {
                array_push($array[$data->nama_jenis], $item_array);
            }
        }

        $dataVenue = DB::table('penyedia_layanan')
                        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                        ->where('id_jenis_penyedia', 1)->get();

        $dataFotografer = DB::table('penyedia_layanan')
                        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                        ->where('id_jenis_penyedia', 4)->get();

        $dataCatering = DB::table('penyedia_layanan')
                        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                        ->where('id_jenis_penyedia', 2)->get();
        
        $dataDekorasi = DB::table('penyedia_layanan')
                        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                        ->where('id_jenis_penyedia', 3)->get();
        // dd($array);

        return view('boring.home', compact('array', 'dataVenue', 'dataDekorasi', 'dataFotografer', 'dataCatering'));
    }

    public function detail($id)
    {
        $toko = DB::table('penyedia_layanan')
                    ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                    ->where('penyedia_layanan.id_penyedia_layanan', $id)
                    ->select(
                        'penyedia_layanan.*',
                        'foto_toko.file as file'
                    )
                    ->first();
        $produk = "";

        if($toko->ID_JENIS_PENYEDIA==1)
        {
            $produk = DB::table('produk_tempat_akad_nikah')->where('id_penyedia_layanan', $id)
                        ->join('foto_produk_tempat_akad_nikah', 
                                'foto_produk_tempat_akad_nikah.id_produk_tempat_akad', 
                                'produk_tempat_akad_nikah.id_produk_tempat_akad')
                        ->select(
                            'produk_tempat_akad_nikah.id_produk_tempat_akad as id_produk',
                            'produk_tempat_akad_nikah.id_penyedia_layanan as id_penyedia_layanan',
                            'produk_tempat_akad_nikah.nama as nama_paket',
                            'produk_tempat_akad_nikah.deskripsi as deskripsi',
                            'produk_tempat_akad_nikah.harga as harga',
                            'produk_tempat_akad_nikah.diskon as diskon',
                            'produk_tempat_akad_nikah.harga_setelah_diskon as harga_setelah_diskon',
                            'foto_produk_tempat_akad_nikah.file as foto'
                        )
                        ->get();
        }
        else if($toko->ID_JENIS_PENYEDIA==2)
        {
            $produk = DB::table('produk_jasa_catering')->where('id_penyedia_layanan', $id)
                        ->join('foto_produk_jasa_catering', 
                                'foto_produk_jasa_catering.id_jasa_catering', 
                                'produk_jasa_catering.id_jasa_catering')
                        ->select(
                            'produk_jasa_catering.id_jasa_catering as id_produk',
                            'produk_jasa_catering.id_penyedia_layanan as id_penyedia_layanan',
                            'produk_jasa_catering.nama_paket as nama_paket',
                            'produk_jasa_catering.deskripsi as deskripsi',
                            'produk_jasa_catering.harga as harga',
                            'produk_jasa_catering.diskon as diskon',
                            'produk_jasa_catering.harga_setelah_diskon as harga_setelah_diskon',
                            'foto_produk_jasa_catering.file as foto'
                        )
                        ->get();
        }

        else if($toko->ID_JENIS_PENYEDIA==3)
        {
            $produk = DB::table('produk_jasa_dekorasi')->where('id_penyedia_layanan', $id)
                        ->join('foto_produk_jasa_dekorasi', 
                                'foto_produk_jasa_dekorasi.id_jasa_dekorasi', 
                                'produk_jasa_dekorasi.id_jasa_dekorasi')
                        ->select(
                            'produk_jasa_dekorasi.id_jasa_dekorasi as id_produk',
                            'produk_jasa_dekorasi.id_penyedia_layanan as id_penyedia_layanan',
                            'produk_jasa_dekorasi.nama_paket as nama_paket',
                            'produk_jasa_dekorasi.deskripsi as deskripsi',
                            'produk_jasa_dekorasi.harga as harga',
                            'produk_jasa_dekorasi.diskon as diskon',
                            'produk_jasa_dekorasi.harga_setelah_diskon as harga_setelah_diskon',
                            'foto_produk_jasa_dekorasi.file as foto'
                        )
                        ->get();
        }

        else if($toko->ID_JENIS_PENYEDIA==4)
        {
            $produk = DB::table('produk_jasa_fotografer')->where('id_penyedia_layanan', $id)
                        ->join('foto_produk_jasa_fotografer', 
                                'foto_produk_jasa_fotografer.id_produk_jasa_fotografer', 
                                'produk_jasa_fotografer.id_produk_jasa_fotografer')
                        ->select(
                            'produk_jasa_fotografer.id_produk_jasa_fotografer as id_produk',
                            'produk_jasa_fotografer.id_penyedia_layanan as id_penyedia_layanan',
                            'produk_jasa_fotografer.nama_paket as nama_paket',
                            'produk_jasa_fotografer.deskripsi as deskripsi',
                            'produk_jasa_fotografer.harga as harga',
                            'produk_jasa_fotografer.diskon as diskon',
                            'produk_jasa_fotografer.harga_setelah_diskon as harga_setelah_diskon',
                            'foto_produk_jasa_fotografer.file as foto'
                        )
                        ->get();
        }

        return view('boring.detail', compact('produk', 'toko'));
        
    }
}
