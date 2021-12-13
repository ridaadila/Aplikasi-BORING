<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukCateringController extends Controller
{

    public function index()
    {
        $allCatering = DB::table('penyedia_layanan')
        ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
        ->where('id_jenis_penyedia', 2)
                ->get();

        return view('boring.vendor.catering', compact('allCatering'));
    }

    function adminList()
    {
        $allProdukCatering = DB::table('produk_jasa_catering')
                            ->join('penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan',
                            'produk_jasa_catering.id_penyedia_layanan') 
                            ->select(
                                'produk_jasa_catering.*',
                                'penyedia_layanan.nama_toko_jasa as vendor'
                            )
                    ->get();
        $no = 1;
        return view('admin.produk-catering.list', compact('allProdukCatering', 'no'));
    }

    public function insert(Request $request)
    {
        try {

            $id = DB::table('produk_jasa_catering')->insertGetId([
                'id_penyedia_layanan'=>$request->id_penyedia_layanan,
                'nama_paket'=>$request->nama_paket,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($diskon)) ? 0 : (1-(($request->diskon)/100))*$request->harga
            ]);

            DB::table('foto_produk_jasa_catering')->insert([
                'id_jasa_catering'=>$id,
                'file'=>$request->foto
            ]);

            Alert::success('Sukses', 'Data berhasil ditambahkan');
            return redirect('list/catering/product');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
            Alert::error('Error', 'Terjadi kesalahan saat menambahkan data');
        }
    }

    public function showCreate()
    {
        $penyediaLayanan = DB::table('penyedia_layanan')
                            ->where('id_jenis_penyedia', 2)
                            // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                            ->get();

        return view('admin.produk-catering.create', compact('penyediaLayanan'));
    }

    public function showUpdate($id)
    {
        $data = DB::table('produk_jasa_catering')
                        ->join('penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan',
                            'produk_jasa_catering.id_penyedia_layanan') 
                        ->select(
                                'produk_jasa_catering.*',
                                'penyedia_layanan.nama_toko_jasa as vendor'
                            )
                ->where('produk_jasa_catering.id_jasa_catering', $id)
                ->first();

        $penyediaLayanan = DB::table('penyedia_layanan')
                ->where('id_jenis_penyedia', 2)
                // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                ->get();

        return view('admin.produk-catering.edit', compact('data', 'id', 'penyediaLayanan'));
    }

    public function update(Request $request)
    {
        try {

            DB::table('produk_jasa_catering')->where('id_jasa_catering', $request->id_jasa_catering)
            ->update([
                'id_penyedia_layanan'=>$request->id_penyedia_layanan,
                'nama_paket'=>$request->nama_paket,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($diskon)) ? 0 : (1-(($request->diskon)/100))*$request->harga
            ]);

            Alert::success('Sukses', 'Data berhasil diupdate');
            return redirect('list/catering/product');
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

            Alert::success('Sukses', 'Data berhasil dihapus');
            return redirect('list/catering/product');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
