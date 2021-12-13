<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukFotograferController extends Controller
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

    public function adminList()
    {
        $allProdukFotografer = DB::table('produk_jasa_fotografer')
                            ->join('penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan',
                            'produk_jasa_fotografer.id_penyedia_layanan') 
                            ->select(
                                'produk_jasa_fotografer.*',
                                'penyedia_layanan.nama_toko_jasa as vendor'
                            )
                    ->get();
        $no = 1;
        return view('admin.produk-fotografer.list', compact('allProdukFotografer', 'no'));
    }

    public function insert(Request $request)
    {
        try {

            $id = DB::table('produk_jasa_fotografer')->insertGetId([
                'id_penyedia_layanan'=>$request->id_penyedia_layanan,
                'nama'=>$request->nama,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($diskon)) ? 0 : (1-(($request->diskon)/100))*$request->harga
            ]);

            DB::table('foto_produk_jasa_fotografer')->insert([
                'id_produk_jasa_fotografer'=>$id,
                'file'=>$request->foto
            ]);

            Alert::success('Sukses', 'Data berhasil ditambahkan');
            return redirect('list/photography/product');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function showCreate()
    {
        $penyediaLayanan = DB::table('penyedia_layanan')
                            ->where('id_jenis_penyedia', 4)
                            // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                            ->get();

        return view('admin.produk-fotografer.create', compact('penyediaLayanan'));
    }

    public function showUpdate($id)
    {
        $data = DB::table('produk_jasa_fotografer')
                        ->join('penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan',
                            'produk_jasa_fotografer.id_penyedia_layanan') 
                        ->select(
                                'produk_jasa_fotografer.*',
                                'penyedia_layanan.nama_toko_jasa as vendor'
                            )
                ->where('produk_jasa_fotografer.id_produk_jasa_fotografer', $id)
                ->first();

        $penyediaLayanan = DB::table('penyedia_layanan')
                ->where('id_jenis_penyedia', 4)
                // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                ->get();

        return view('admin.produk-fotografer.edit', compact('data', 'id', 'penyediaLayanan'));
    }

    public function update(Request $request)
    {
        // try {

            DB::table('produk_jasa_fotografer')->where('id_produk_jasa_fotografer', $request->id_produk_jasa_fotografer)
            ->update([
                'id_penyedia_layanan'=>$request->id_penyedia_layanan,
                'nama'=>$request->nama,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($request->diskon)) ? 0 : (1-(($request->diskon)/100))*$request->harga
            ]);

            Alert::success('Sukses', 'Data berhasil diupdate');
            return redirect('list/photography/product');
        // }
        // catch(\Exception $e)
        // {
        //     Log::error($e->getMessage());
        // }
    }

    public function delete($id)
    {
        try {

            DB::table('produk_jasa_fotografer')->where('id_produk_jasa_fotografer', $id)
            ->delete();

            
            Alert::success('Sukses', 'Data berhasil dihapus');
            return redirect('list/photography/product');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
