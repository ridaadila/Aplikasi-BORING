<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function adminList()
    {
        $allProdukDekorasi = DB::table('produk_jasa_dekorasi')
                            ->join('penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan',
                            'produk_jasa_dekorasi.id_penyedia_layanan') 
                            ->select(
                                'produk_jasa_dekorasi.*',
                                'penyedia_layanan.nama_toko_jasa as vendor'
                            )
                    ->get();
        $no = 1;
        return view('admin.produk-dekorasi.list', compact('allProdukDekorasi', 'no'));
    }

    public function insert(Request $request)
    {
        // try {

            $id = DB::table('produk_jasa_dekorasi')->insertGetId([
                'id_penyedia_layanan'=>$request->id_penyedia_layanan,
                'nama_paket'=>$request->nama_paket,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($request->diskon)) ? 0 : (1-(($request->diskon)/100))*$request->harga
            ]);

            DB::table('foto_produk_jasa_dekorasi')->insert([
                'id_jasa_dekorasi'=>$id,
                'file'=>$request->foto
            ]);

            Alert::success('Sukses', 'Data berhasil ditambahkan');
            return redirect('list/decoration/product');
        // }
        // catch(\Exception $e)
        // {
        //     Log::error($e->getMessage());
        // }
    }

    public function showCreate()
    {
        $penyediaLayanan = DB::table('penyedia_layanan')
                            ->where('id_jenis_penyedia', 3)
                            // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                            ->get();

        return view('admin.produk-dekorasi.create', compact('penyediaLayanan'));
    }

    public function showUpdate($id)
    {
        $data = DB::table('produk_jasa_dekorasi')
                        ->join('penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan',
                            'produk_jasa_dekorasi.id_penyedia_layanan') 
                        ->select(
                                'produk_jasa_dekorasi.*',
                                'penyedia_layanan.nama_toko_jasa as vendor'
                            )
                ->where('produk_jasa_dekorasi.id_jasa_dekorasi', $id)
                ->first();

        $penyediaLayanan = DB::table('penyedia_layanan')
                ->where('id_jenis_penyedia', 3)
                // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                ->get();

        return view('admin.produk-dekorasi.edit', compact('data', 'id', 'penyediaLayanan'));
    }

    public function update(Request $request)
    {
        try {

            DB::table('produk_jasa_dekorasi')->where('id_jasa_dekorasi', $request->id_jasa_dekorasi)
            ->update([
                'id_penyedia_layanan'=>$request->id_penyedia_layanan,
                'nama_paket'=>$request->nama_paket,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($request->diskon)) ? 0 : (1-(($request->diskon)/100))*$request->harga
            ]);

            Alert::success('Sukses', 'Data berhasil diupdate');
            return redirect('list/decoration/product');
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

            Alert::success('Sukses', 'Data berhasil dihapus');
            return redirect('list/decoration/product');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
