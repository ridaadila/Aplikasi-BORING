@extends('layout.admin')

@section('content')
<div class="right_col booking" role="main">
		<div class="col-md-12 col-sm-12">

<div class="container">
        <div class="section-heading" >
            <div class="line-dec"></div>
        </div>
        <div class="card">
        <div class="card-header" style="font-size:25px; background-color: #ea9999; color: white;" >Tambah Dekorasi</div>
            <div class="card-body" style="color:black">
                    <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                <form method="post" action=">" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="">
                    </div>

                    <div class="form-group">
                        <label for="nama">Deskripsi</label>
                        <textarea style="resize: none;" class="form-control" name="deskripsi" id="deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="" />
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Diskon</label>
                        <input type="text" class="form-control" id="diskon" name="diskon" value="" />
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Harga Setelah Diskon</label>
                        <input type="text" class="form-control" id="harga_setelah_diskon" name="harga_setelah_diskon" value="" />
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-block" style="color:white; background-color: #ea9999;" />
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
