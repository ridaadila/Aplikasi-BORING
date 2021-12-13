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
}
