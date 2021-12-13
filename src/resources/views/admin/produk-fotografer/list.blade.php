@extends('layout.admin')

@section('content')
@include('sweetalert::alert')
<div class="right_col booking" role="main">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" style="font-size:25px; background-color: #ea9999; color: white;" >Daftar Paket atau Produk Fotografer</div>

                <div class="card-body">
                    <a href="{{url('list/photography/product/create')}}" class="btn btn-success">Tambah</a>
                    <br/>
                    <br/>
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Vendor</th>
                                <th class="text-center" scope="col">Nama Produk atau Paket</th>
                                <th class="text-center" scope="col">Deskripsi</th>
                                <th class="text-center" scope="col">Harga</th>
                                <th class="text-center" scope="col">Diskon</th>
                                <th class="text-center" scope="col">Harga setelah diskon</th>
                                {{-- <th class="text-center" scope="col">Foto</th> --}}
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                                @foreach ($allProdukFotografer as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->vendor }}</td>
                                        <td>{{ $data->NAMA }}</td>
                                        <td>{{ $data->DESKRIPSI }}</td>
                                        <td>{{ $data->HARGA }}</td>
                                        <td>{{ $data->DISKON }}</td>
                                        <td>{{ $data->HARGA_SETELAH_DISKON }}</td>
                                        {{-- <td>
                                            <img src='data:image/jpeg;base64, {{$imgData}}' width="100px" height="100px" alt="product images">
                                        </td> --}}
                                        <td>
                                            <a title="Edit" href="{{url('list/photography/product/edit/' . $data->ID_PRODUK_JASA_FOTOGRAFER)}}" class="btn btn-info"><i style="font-size: 11pt;" class="fa fa-pencil"></i></a>
                                            <a title="Delete" href="{{url('list/photography/product/delete/' . $data->ID_PRODUK_JASA_FOTOGRAFER)}}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i style="font-size: 11pt;" class="fa fa-trash"></i></a>
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

