var tableElm = $('#tableElm');
// Setup - add a text input to each footer cell
// var types = tableElm.data('types');
// $.each(types, function() {
// 	$('#searchTypeSelect')
// 		.append($("<option></option>")
// 		.val(this.id)
// 		.text(this.nama));
// });

function pz(str) {
	return ("0"+str).slice(-2);
}

// DataTable
var viewBtn = $('#viewBtnTemplate');
var editBtn = $('#editBtnTemplate');
var delBtn = $('#delBtnTemplate');

var datatableRes = tableElm.DataTable({
	processing: true,
	serverSide: true,
	ajax: tableElm.data('ajaxurl'),
	columnDefs:[
		{
			"targets": 0,
			"data": "id_penyedia_layanan",
			"name": 'penyedia_layanan.id_penyedia_layanan',
			"searchable": false,
			"visible": true,
		},
		{
			"targets": 1,
			"title": "Nama",
			"data": "nama_toko_jasa",
			"name": "penyedia_layanan.nama_toko_jasa",
			"searchable": true,
			"visible": true,
		},
		{
			"targets": 2,
			"title": "Alamat",
			"data": "alamat",
			"name": "penyedia_layanan.alamat",
			"searchable": false,
			"visible": true,
		},
		{
			"targets": 3,
			"title": "Nomor Telepon",
			"data": "nomor_telepon",
			"name": "penyedia_layanan.nomor_telepon",
			"searchable": false,
			"visible": true,
		},
		{
			"targets": 4,
			"title": "Deskripsi",
			"data": "deskripsi",
			"name": "penyedia_layanan.deskripsi",
			"searchable": true,
			"visible": true,
		},
		{
			"targets": 5,
			"title": "Foto",
			"data": "foto",
			"name": "penyedia_layanan.foto",
			"searchable": false,
			"visible": true,
		},
		{
			"targets": 6,
			"title": "Aksi",
			"data": null,
			"name": null,
			"searchable": false,
			"visible": true,
			"render": function (data, type, full, meta) {
				let resultHTML = '<div style="white-space: nowrap;">'
                resultHTML += viewBtn.createButton(full.id).html();
                resultHTML += editBtn.createButton(full.id).html();
                resultHTML += delBtn.createButton(full.id).html();
				resultHTML += '</div>'
				return resultHTML;
			}
		},
	],
});

