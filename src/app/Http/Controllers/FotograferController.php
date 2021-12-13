<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FotograferController extends Controller
{
    public function index()
    {
        $jenisPenyedia = DB::table('penyedia_layanan')
                        ->where('id_jenis_penyedia', 4)
                        ->select('jenis_kategori')
                        ->distinct()->get();

        $allFotografer = DB::table('penyedia_layanan')
                        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                        ->where('id_jenis_penyedia', 4)
                                ->get();
        $array = [];
        foreach($jenisPenyedia as $jenis)
        {
            $array[$jenis->jenis_kategori] = [];
        }

        foreach($allFotografer as $fotografer) {
            $data = [
                "id_penyedia_layanan"=>$fotografer->ID_PENYEDIA_LAYANAN,
                "nama_toko_jasa"=>$fotografer->NAMA_TOKO_JASA,
                "alamat"=>$fotografer->ALAMAT,
                "nomor_telepon"=>$fotografer->NOMOR_TELEPON,
                "deskripsi"=>$fotografer->DESKRIPSI_TOKO_JASA,
                "foto"=>$fotografer->FILE
            ];

            array_push($array[$fotografer->JENIS_KATEGORI], $data);
        }

        // dd($array);

        return view('boring.vendor.photography', compact('array', 'jenisPenyedia'));
    }

    public function create(Request $request)
    {
        try {

            DB::table('produk_jasa_fotografer')->insert([
                'id_penyedia_layanan'=>$request->id_penyedia_layanan,
                'nama_paket'=>$request->nama_paket,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($request->harga_setelah_diskon)) ? NULL : (1-(($request->diskon)/100))*$request->harga
            ]);

            return redirect()->with('flashKey', 'flashValue');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {

            DB::table('produk_jasa_fotografer')->where('id_produk_jasa_fotografer', $request->id_produk_jasa_fotografer)
            ->update([
                'nama_paket'=>$request->nama_paket,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($request->harga_setelah_diskon)) ? NULL : (1-(($request->diskon)/100))*$request->harga
            ]);

            return redirect()->with('flashKey', 'flashValue');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {

            DB::table('produk_jasa_fotografer')->where('id_produk_jasa_fotografer', $id)
            ->delete();

            return redirect()->with('flashKey', 'flashValue');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
