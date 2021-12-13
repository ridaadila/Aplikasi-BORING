<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class DekorasiController extends Controller
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

    public function showCreate()
    {
        return view('admin.dekorasi.create');
    }

    public function insert(Request $request)
    {
        try {

            $id = DB::table('penyedia_layanan')->insertGetId([
                'nama_toko_jasa'=>$request->nama_toko_jasa,
                'id_user'=>1,
                'id_jenis_penyedia'=>3,
                'alamat'=>$request->alamat,
                'deskripsi_toko_jasa'=>$request->deskripsi,
                'nomor_telepon'=>$request->nomer_telepon
            ]);

            DB::table('foto_toko')->insert([
                'id_penyedia_layanan'=>$id,
                'file'=>$request->foto
            ]);

            Alert::success('Sukses', 'Data berhasil ditambahkan');
            return redirect('list/decoration');
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

        return view('admin.dekorasi.edit', compact('data', 'id'));
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
                'nomor_telepon'=>$request->nomer_telepon
            ]);

            //  DB::table('foto_toko')->where('id_penyedia_layanan', $request->id_penyedia_layanan)->
            //  update([
            //     'file'=>$request->foto
            // ]);

            Alert::success('Sukses', 'Data berhasil diupdate');
            return redirect('list/decoration');
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
            return redirect('list/decoration');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
