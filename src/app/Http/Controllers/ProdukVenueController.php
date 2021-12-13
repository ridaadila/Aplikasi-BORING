<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\PenyediaLayanan;

use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukVenueController extends Controller
{

    public function test()
    {
        return view('admin.venue.edit');
    }

    public function listVenue()
    {
        $data = PenyediaLayanan::listVenue()->newQuery();
        // $test = DataTables::eloquent($data)->toJson();
        // dd($test);
        return DataTables::eloquent($data)->toJson();
    }

    function viewListVenue()
    {
        return view('venue.table');
    }

    function adminList()
    {
        $allProdukVenue = DB::table('produk_tempat_akad_nikah')
                            ->join('penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan',
                            'produk_tempat_akad_nikah.id_penyedia_layanan') 
                            ->select(
                                'produk_tempat_akad_nikah.*',
                                'penyedia_layanan.nama_toko_jasa as vendor'
                            )
                    ->get();
        $no = 1;
        return view('admin.produk-venue.list', compact('allProdukVenue', 'no'));
    }

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

    public function showCreate()
    {
        $penyediaLayanan = DB::table('penyedia_layanan')
                            ->where('id_jenis_penyedia', 1)
                            // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                            ->get();

        return view('admin.produk-venue.create', compact('penyediaLayanan'));
    }

    public function insert(Request $request)
    {
        try {

            $id = DB::table('produk_tempat_akad_nikah')->insertGetId([
                'id_penyedia_layanan'=>$request->id_penyedia_layanan,
                'nama'=>$request->nama,
                'lokasi'=>"",
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($request->diskon)) ? 0 : (1-(($request->diskon)/100))*$request->harga,
                'status_ketersediaan'=>1
            ]);

            DB::table('foto_produk_tempat_akad_nikah')->insert([
                'id_produk_tempat_akad'=>$id,
                'file'=>$request->foto
            ]);

            Alert::success('Sukses', 'Data berhasil ditambahkan');
            return redirect('list/venue/product');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function showUpdate($id)
    {
        $data = DB::table('produk_tempat_akad_nikah')
                        ->join('penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan',
                            'produk_tempat_akad_nikah.id_penyedia_layanan') 
                        ->select(
                                'produk_tempat_akad_nikah.*',
                                'penyedia_layanan.nama_toko_jasa as vendor'
                            )
                ->where('produk_tempat_akad_nikah.id_produk_tempat_akad', $id)
                ->first();

        $penyediaLayanan = DB::table('penyedia_layanan')
                ->where('id_jenis_penyedia', 1)
                // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                ->get();

        return view('admin.produk-venue.edit', compact('data', 'id', 'penyediaLayanan'));
    }

    public function update(Request $request)
    {
        // try {

            DB::table('produk_tempat_akad_nikah')->where('id_produk_tempat_akad', $request->id_produk_tempat_akad)
            ->update([
                'nama'=>$request->nama,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga,
                'diskon'=>$request->diskon,
                'harga_setelah_diskon'=> (empty($request->diskon)) ? 0 : (1-(($request->diskon)/100))*$request->harga
            ]);

            Alert::success('Sukses', 'Data berhasil diupdate');
            return redirect('list/venue/product');
        // }
        // catch(\Exception $e)
        // {
        //     Log::error($e->getMessage());
        // }
    }

    public function delete($id)
    {
        try {

            DB::table('produk_tempat_akad_nikah')->where('id_produk_tempat_akad', $id)
            ->delete();

            Alert::success('Sukses', 'Data berhasil dihapus');
            return redirect('list/venue/product');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
