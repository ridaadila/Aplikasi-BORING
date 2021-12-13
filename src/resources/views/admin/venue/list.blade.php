@extends('layout.admin')

@section('content')
<div class="right_col booking" role="main">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" style="font-size:25px; background-color: #ea9999; color: white;" >Daftar Venue</div>

                <div class="card-body">
                    <a href="" class="btn btn-success">Tambah</a>
                    <br/>
                    <br/>
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" scope="col">Id</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">Alamat</th>
                                <th class="text-center" scope="col">Nomor Telepon</th>
                                <th class="text-center" scope="col">Deskripsi</th>
                                <th class="text-center" scope="col">Foto</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                                @foreach ($array["masjid"] as $data)
                                    <tr>
                                        <td>{{ $data['id_penyedia_layanan'] }}</td>
                                        <td>{{ $data['nama_toko_jasa'] }}</td>
                                        <td>{{ $data['alamat'] }}</td>
                                        <td>{{ $data['nomor_telepon'] }}</td>
                                        <td>{{ $data['deskripsi'] }}</td>
                                        <td>{{ $data['foto'] }}</td>
                                        <td>
                                            <a title="Edit" href="" class="btn btn-info"><i style="font-size: 11pt;" class="fa fa-pencil"></i></a>
                                            <a title="Delete" href="" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i style="font-size: 11pt;" class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

