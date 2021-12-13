@extends('layout.admin')

@section('content')
<div class="right_col booking" role="main">
		<div class="col-md-12 col-sm-12">

<div class="container">
        <div class="section-heading" >
            <div class="line-dec"></div>
        </div>
        <div class="card">
        <div class="card-header" style="font-size:25px; background-color: #ea9999; color: white;" >Edit Catering</div>
            <div class="card-body" style="color:black">
                    <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                    <form method="POST" action="{{url('list/catering/update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_penyedia_layanan" value="{{$id}}">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama_toko_jasa" name="nama_toko_jasa" value="{{$data->NAMA_TOKO_JASA}}">
                        </div>
    
                        <div class="form-group">
                            <label for="nama">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->ALAMAT}}">
                        </div>
    
                        <div class="form-group">
                            <label for="jumlah">Nomer Telepon</label>
                            <input type="number" class="form-control" id="nomer_telepon" name="nomer_telepon" value="{{$data->NOMOR_TELEPON}}" />
                        </div>
    
                        <div class="form-group">
                            <label for="harga">Deskripsi</label>
                            <textarea style="resize: none;" class="form-control" name="deskripsi" id="deskripsi">{{$data->DESKRIPSI_TOKO_JASA}}</textarea>
                        </div>
    
                        {{-- <div class="form-group">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" value="{{$imgData}}">
                        </div> --}}
    
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-block" style="color:white; background-color: #ea9999;" />
                        </div>
    
                    </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
