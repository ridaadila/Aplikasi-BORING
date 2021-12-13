<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\PenyediaLayanan;

use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class VenueController extends Controller
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
        $allVenue = DB::table('penyedia_layanan')
                    ->where('id_jenis_penyedia', 1)
                    // ->join('foto_toko', 'foto_toko.id_penyedia_layanan', 'penyedia_layanan.id_penyedia_layanan')
                    ->get();
        $no = 1;
        return view('admin.venue.list', compact('allVenue', 'no'));
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
        return view('admin.venue.create');
    }

    public function insert(Request $request)
    {
        try {

            $id = DB::table('penyedia_layanan')->insertGetId([
                'nama_toko_jasa'=>$request->nama_toko_jasa,
                'id_user'=>1,
                'id_jenis_penyedia'=>1,
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
            return redirect('list/venue');
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

        return view('admin.venue.edit', compact('data', 'id'));
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
            return redirect('list/venue');
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
            return redirect('list/venue');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
