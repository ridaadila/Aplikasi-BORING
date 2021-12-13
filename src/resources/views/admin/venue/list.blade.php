@extends('layout.admin')

@section('content')
@include('sweetalert::alert')
<div class="right_col booking" role="main">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" style="font-size:25px; background-color: #ea9999; color: white;" >Daftar Venue</div>

                <div class="card-body">
                    <a href="{{url('list/venue/create')}}" class="btn btn-success">Tambah</a>
                    <br/>
                    <br/>
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">Alamat</th>
                                <th class="text-center" scope="col">Nomor Telepon</th>
                                <th class="text-center" scope="col">Jenis Tempat</th>
                                <th class="text-center" scope="col">Deskripsi</th>
                                {{-- <th class="text-center" scope="col">Foto</th> --}}
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                                @foreach ($allVenue as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->NAMA_TOKO_JASA }}</td>
                                        <td>{{ $data->ALAMAT }}</td>
                                        <td>{{ $data->NOMOR_TELEPON }}</td>
                                        <td>{{ str_replace("_", " ", $data->JENIS_KATEGORI) }}</td>
                                        <td>{{ $data->DESKRIPSI_TOKO_JASA }}</td>
                                        {{-- <td>
                                            <img src='data:image/jpeg;base64, {{$imgData}}' width="100px" height="100px" alt="product images">
                                        </td> --}}
                                        <td>
                                            <a title="Edit" href="{{url('list/venue/edit/' . $data->ID_PENYEDIA_LAYANAN)}}" class="btn btn-info"><i style="font-size: 11pt;" class="fa fa-pencil"></i></a>
                                            <a title="Delete" href="{{url('list/venue/delete/' . $data->ID_PENYEDIA_LAYANAN)}}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i style="font-size: 11pt;" class="fa fa-trash"></i></a>
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

