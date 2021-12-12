<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VenueController extends Controller
{
   
    public function index()
    {
        $jenisPenyedia = DB::table('penyedia_layanan')
                        ->where('id_jenis_penyedia', 1)
                        ->select('jenis_kategori')
                        ->distinct()->get();

        $allVenue = DB::table('penyedia_layanan')
                        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                        ->where('id_jenis_penyedia', 1)
                                ->get();
        $array = [];
        foreach($jenisPenyedia as $jenis)
        {
            $array[$jenis->jenis_kategori] = [];
        }

        foreach($allVenue as $venue) {
            $data = [
                "id_penyedia_layanan"=>$venue->ID_PENYEDIA_LAYANAN,
                "nama_toko_jasa"=>$venue->NAMA_TOKO_JASA,
                "alamat"=>$venue->ALAMAT,
                "nomor_telepon"=>$venue->NOMOR_TELEPON,
                "deskripsi"=>$venue->DESKRIPSI_TOKO_JASA,
                "foto"=>$venue->FILE
            ];

            array_push($array[$venue->JENIS_KATEGORI], $data);
        }

        // dd($array);

        return view('boring.vendor.venue', compact('array', 'jenisPenyedia'));
    }

    public function create(Request $request)
    {
        try {

            DB::table('produk_tempat_akad_nikah')->insert([
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

            DB::table('produk_tempat_akad_nikah')->where('id_produk_tempat_akad', $request->id_produk_tempat_akad)
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

            DB::table('produk_tempat_akad_nikah')->where('id_produk_tempat_akad', $id)
            ->delete();

            return redirect()->with('flashKey', 'flashValue');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
