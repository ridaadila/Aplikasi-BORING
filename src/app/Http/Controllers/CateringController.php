<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CateringController extends Controller
{

    public function index()
    {
        $allCatering = DB::table('penyedia_layanan')
        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
        ->where('id_jenis_penyedia', 2)
                ->get();

        return view('boring.vendor.catering', compact('allCatering'));
    }

    public function create(Request $request)
    {
        try {

            DB::table('produk_jasa_catering')->insert([
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

            DB::table('produk_jasa_catering')->where('id_jasa_catering', $request->id_jasa_catering)
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

            DB::table('produk_jasa_catering')->where('id_jasa_catering', $id)
            ->delete();

            return redirect()->with('flashKey', 'flashValue');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
