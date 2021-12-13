@extends('layout.admin')

@section('content')

	<div class="right_col booking" role="main">
		<div class="col-md-12 col-sm-12">
			<h2 class="table-title">Daftar Venue</h2>
			<!-- Action button templates -->
			<div id="viewBtnTemplate" style="display: none;">
				<button style="padding: 3px 8px" type="button" class="btn btn-custom-primary" title="Detail Webinar">
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div id="editBtnTemplate" style="display: none;">
				<button id="editBtn" style="padding: 3px 8px" type="button" class="btn btn-custom-warning" title="Edit Webinar">
					<i class="fa fa-pencil"></i>
				</button>
			</div>
			<div id="delBtnTemplate" style="display: none;">
				<form action="" method="post" class="d-inline">
					@csrf
					<button style="padding: 3px 8px;" type="submit" class="btn btn-custom-danger" onclick="return confirm('Apakah anda yakin untuk menghapus Webinar?')" title="Hapus Webinar">
						<i class="fa fa-trash-o"></i>
					</button>
				</form>
			</div>
			<table
				id="tableElm"
				class="table table-bordered table-striped table-bordered table-hover"
				data-ajaxurl="{{ route('venue.data') }}"
			>
				<thead class="thead-custom-blue">
					<tr>
					<th class="text-center" scope="col">Id</th>
                    <th class="text-center" scope="col">Jenis</th>
					<th class="text-center" scope="col">Nama</th>
					<th class="text-center" scope="col">Alamat</th>
					<th class="text-center" scope="col">Nomor Telepon</th>
					<th class="text-center" scope="col">Deskripsi</th>
                    <th class="text-center" scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
				<tfoot class="thead-custom-blue">
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
                        <th></th>
                        <th></th>
						<!-- <th></th> -->
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
<!-- </div> -->
@endsection

@section('scripts')
<!-- <script src="{{asset('js/jquery-3.5.1.min.js') }}" type="text/javascript" defer></script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css" defer/>
<script src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js" defer></script>
<script src="{{asset('js/util/datatablesPlugin.js') }}" defer></script>
<script src="{{asset('js/venue/table/view.js') }}" defer></script>
@endsection
