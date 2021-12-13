var tableElm = $('#tableElm');
// Setup - add a text input to each footer cell
// var types = tableElm.data('types');
// $.each(types, function() {
// 	$('#searchTypeSelect')
// 		.append($("<option></option>")
// 		.val(this.id)
// 		.text(this.nama));
// });

// function pz(str) {
// 	return ("0"+str).slice(-2);
// }

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
			"name": "penyedia_layanan.id_penyedia_layanan",
			"searchable": false,
			"visible": true,
		},
        {
			"targets": 1,
			"title": "Jenis",
			"data": "jenis_penyedia_layanan",
			"name": "jenis_penyedia_layanan.nama",
			"searchable": true,
			"visible": true,
		},
		{
			"targets": 2,
			"title": "Nama",
			"data": "nama_toko_jasa",
			"name": "penyedia_layanan.nama_toko_jasa",
			"searchable": true,
			"visible": true,
		},
		{
			"targets": 3,
			"title": "Alamat",
			"data": "alamat",
			"name": "penyedia_layanan.alamat",
			"searchable": false,
			"visible": true,
		},
		{
			"targets": 4,
			"title": "Nomor Telepon",
			"data": "nomor_telepon",
			"name": "penyedia_layanan.nomor_telepon",
			"searchable": false,
			"visible": true,
		},
		{
			"targets": 5,
			"title": "Deskripsi",
			"data": "deskripsi_toko_jasa",
			"name": "penyedia_layanan.deskripsi_toko_jasa",
			"searchable": true,
			"visible": true,
		},
		{
			"targets": 6,
			"title": "Kategori",
			"data": "jenis_kategori",
			"name": "penyedia_layanan.jenis_kategori",
			"searchable": false,
			"visible": true,
		},
		{
			"targets": 7,
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

