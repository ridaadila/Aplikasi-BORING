<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProdukDekorasiController extends Controller
{
    public function index()
    {
        $allDekorasi = DB::table('penyedia_layanan')
        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
        ->where('id_jenis_penyedia', 3)
                ->get();

        return view('boring.vendor.decoration', compact('allDekorasi'));
    }

    function adminList()
    {
        $allDekorasi = DB::table('penyedia_layanan')
                    ->where('id_jenis_penyedia', 3)
                    // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                    ->get();
        $no = 1;
        return view('admin.dekorasi.list', compact('allDekorasi', 'no'));
    }

    public function create(Request $request)
    {
        try {

            DB::table('produk_jasa_dekorasi')->insert([
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

            DB::table('produk_jasa_dekorasi')->where('id_jasa_dekorasi', $request->id_jasa_dekorasi)
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

            DB::table('produk_jasa_dekorasi')->where('id_jasa_dekorasi', $id)
            ->delete();

            return redirect()->with('flashKey', 'flashValue');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
