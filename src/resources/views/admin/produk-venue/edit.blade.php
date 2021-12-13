@extends('layout.admin')

@section('content')
<div class="right_col booking" role="main">
		<div class="col-md-12 col-sm-12">

<div class="container">
        <div class="section-heading" >
            <div class="line-dec"></div>
        </div>
        <div class="card">
        <div class="card-header" style="font-size:25px; background-color: #ea9999; color: white;" >Edit Venue</div>
            <div class="card-body" style="color:black">
                    <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                <form method="POST" action="{{url('list/venue/product/update')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_produk_tempat_akad" value="{{$id}}">

                    <div class="form-group">
                        <label for="penyedia_layanan">Pilih Vendor</label>
                        <select name="id_penyedia_layanan" id="id_penyedia_layanan" class="form-control">
                            @foreach ($penyediaLayanan as $item)
                                <option value="{{$item->ID_PENYEDIA_LAYANAN}}" @if($data->ID_PENYEDIA_LAYANAN == $item->ID_PENYEDIA_LAYANAN) selected @endif>{{$item->NAMA_TOKO_JASA}}</option>
                            @endforeach
                        </select>
                    </div>
    
                        <div class="form-group">
                            <label for="nama">Nama Paket atau Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->NAMA}}">
                        </div>
    
                        <div class="form-group">
                            <label for="harga">Deskripsi</label>
                            <textarea style="resize: none;" class="form-control" name="deskripsi" id="deskripsi">{{$data->DESKRIPSI}}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="jumlah">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="{{$data->HARGA}}" />
                        </div>
    
                        <div class="form-group">
                            <label for="jumlah">Diskon</label>
                            <input type="number" class="form-control" id="diskon" name="diskon" value="{{$data->DISKON}}" />
                        </div>
    
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
