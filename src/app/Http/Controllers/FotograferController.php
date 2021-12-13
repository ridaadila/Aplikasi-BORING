<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function adminList()
    {
        $allFotografer = DB::table('penyedia_layanan')
                    ->where('id_jenis_penyedia', 4)
                    // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                    ->get();
        $no = 1;
        return view('admin.fotografer.list', compact('allFotografer', 'no'));
    }

    public function showCreate()
    {
        return view('admin.fotografer.create');
    }

    public function insert(Request $request)
    {
        try {

            $id = DB::table('penyedia_layanan')->insertGetId([
                'nama_toko_jasa'=>$request->nama_toko_jasa,
                'id_user'=>1,
                'id_jenis_penyedia'=>4,
                'alamat'=>$request->alamat,
                'deskripsi_toko_jasa'=>$request->deskripsi,
                'jenis_kategori'=>$request->jenis_kategori,
                'nomor_telepon'=>$request->nomer_telepon
            ]);

            DB::table('foto_toko')->insert([
                'id_penyedia_layanan'=>$id,
                'file'=>$request->foto
            ]);

            Alert::success('Sukses', 'Data berhasil ditambahkan');
            return redirect('list/photography');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function showUpdate($id)
    {
        $data = DB::table('penyedia_layanan')
                ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                ->where('penyedia_layanan.id_penyedia_layanan', $id)
                ->first();

        return view('admin.fotografer.edit', compact('data', 'id'));
    }


    public function update(Request $request)
    {
        // try {

            DB::table('penyedia_layanan')->where('id_penyedia_layanan', 
                                            $request->id_penyedia_layanan)
            ->update([
                'nama_toko_jasa'=>$request->nama_toko_jasa,
                'alamat'=>$request->alamat,
                'deskripsi_toko_jasa'=>$request->deskripsi,
                'jenis_kategori'=>$request->jenis_kategori,
                'nomor_telepon'=>$request->nomer_telepon
            ]);

            //  DB::table('foto_toko')->where('id_penyedia_layanan', $request->id_penyedia_layanan)->
            //  update([
            //     'file'=>$request->foto
            // ]);

            Alert::success('Sukses', 'Data berhasil diupdate');
            return redirect('list/photography');
        // }
        // catch(\Exception $e)
        // {
        //     Log::error($e->getMessage());
        // }
    }

    public function delete($id)
    {
        try {

            DB::table('penyedia_layanan')->where('id_penyedia_layanan', $id)
            ->delete();

            Alert::success('Sukses', 'Data berhasil dihapus');
            return redirect('list/photography');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
