<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tugas Membuat Form CR</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/DataTables/datatables.min.css">
	<style>
	.back {
		background-image: url(assets/images/html5.png);
		background-size: 20%;
		background-repeat: no-repeat;
		background-position: center; 
		z-index: -1;
		width: 100%;
		height: 100%;
		position: fixed;
	}
	footer {
		background-color: rgba(10,10,10,0.2);
		text-align: center;
		font-size: 14px;
		margin-top: 100px;
		padding: 10px;
		padding-top: 50px;
		padding-bottom: 50px;
		color: #5B5B5B
	}
</style>
</head>
<body>
	<div class="back">
		
	</div>
	<div class="container">
		<h2 class="text-center">DATA MOBIL</h2>
		<div class="alert alert-success d-none">

		</div>
		<div id="template-progress" class="d-none">
			<div class="progress" style="height: 3px;">
				<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">
			Tambah Mobil
		</button>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Tahun</th>
					<th>Warna</th>
					<th>Merk</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form-tambah" action="api/mobil.php?action=tambah" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
						</div>
						<div class="form-group">
							<label for="tahun">Tahun</label>
							<input type="text" class="form-control" id="tahun" name="tahun" value="2018" placeholder="Tahun">
						</div>
						<div class="form-group">
							<label for="warna">Warna</label>
							<input type="text" class="form-control" id="warna" name="warna" placeholder="Warna">
						</div>
						<div class="form-group">
							<label for="merk">Merk</label>
							<input type="text" class="form-control" id="merk" name="merk" placeholder="Merk">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="reset" class="btn btn-danger">Reset</button>
						<button id="simpan-btn" type="button" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer>
		Copyright by ♣ <a href="https://www.instagram.com/hr.anm/" target="_blank">Hairul Anam (162410101128)</a> ♣ Mahasiswa Sistem Informasi | <a href="https://unej.ac.id/" target="_blank">Universitas Jember</a>
		<br>
		Dibuat dalam rangka memenuhi tugas pemrograman web kelas c 
	</footer>
	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/DataTables/datatables.min.js"></script>
	<script>
		$(document).ready(function(){

			var dt = null;

			function loadData(){
				$.get({
					url : 'api/mobil.php',
					success : function(result){
						if(dt){
							$("table").dataTable().fnDestroy();
						}
						result = $.parseJSON(result);
						var tbody = '';
						for(var i of result){
							tbody+='<tr>'
							+'<td>'+i.id+'</td>'
							+'<td>'+i.nama+'</td>'
							+'<td>'+i.tahun+'</td>'
							+'<td>'+i.warna+'</td>'
							+'<td>'+i.merk+'</td>'
							+'</tr>';
						}
						$('table tbody').html(tbody);
						dt = $('table').DataTable({
							"order": [[ 0, "desc" ]]
						});
					}
				});
			}
			
			loadData();

			function resetError(){
				$('.form-control').removeClass('is-invalid');
				$('.invalid-feedback').remove();
			}

			$('#simpan-btn').on('click', function(e){
				e.preventDefault();
				simpanForm();
			});

			$('.form-control').on('keyup', function(e){
				if(e.key == 'Enter'){
					simpanForm();
				}
			});

			function simpanForm(){
				resetError();
				var nama	= $('#nama').val();
				var tahun	= $('#tahun').val();
				var warna	= $('#warna').val();
				var merk	= $('#merk').val();
				var errors = [];
				if(nama.trim() == ''){
					errors.push({
						message : "Nama wajib diisi",
						id : "nama",
					});
				}
				if(tahun.trim() == ''){
					errors.push({
						message : "Tahun wajib diisi",
						id : "tahun",
					});
				}else{
					if(!(/^\d+$/.test(tahun.trim()))){
						errors.push({
							message : "Tahun hanya angka diperbolehkan",
							id : "tahun",
						});
					}else{
						var tahunSkrg = (new Date()).getFullYear();
						if(tahun.trim() > tahunSkrg){
							errors.push({
								message : "Tahun maksimal "+tahunSkrg,
								id : "tahun",
							});
						}else if(tahun.trim() < 1900){
							errors.push({
								message : "Tahun minimal "+1900,
								id : "tahun",
							});
						}
					}
				}
				if(warna.trim() == ''){
					errors.push({
						message : "Warna wajib diisi",
						id : "warna",
					});
				}
				if(merk.trim() == ''){
					errors.push({
						message : "Merk wajib diisi",
						id : "merk",
					});
				}
				if(errors.length > 0){
					for(var err of errors){
						$('#'+err.id).addClass('is-invalid');
						if($('#'+err.id).parent().find('.invalid-feedback').length > 0){
							$('#'+err.id).parent().find('.invalid-feedback').html(err.message);
						}else{
							$('#'+err.id).parent().append('<div class="invalid-feedback">'+err.message+'</div>');
						}
					}
				}else {
					var simpanBtn = $('#simpan-btn');
					simpanBtn.attr('disabled', true);
					simpanBtn.text('Menyimpan');
					var formData = $('#form-tambah').serialize();
					setTimeout(function(){
						$.post({
							url : 'api/mobil.php?action=tambah',
							data : formData,
							success : function(result){
								result = $.parseJSON(result);
								simpanBtn.attr('disabled', false);
								simpanBtn.text('Simpan');
								loadData();
								$('[data-dismiss="modal"]').trigger('click');
								var templateProgress = $('#template-progress').html();
								$('.alert-success').removeClass('d-none').html(result.message+templateProgress);
								var panjang = 100;
								var interval = setInterval(function(){
									$('.progress-bar').css({
										width : (panjang-=10) + '%'
									});
									if(panjang == 0){
										clearInterval(interval);
										$('.alert-success').fadeOut();
									}
								}, 1000);
							}
						});
					}, 1000);
				}
			}

		});
	</script>
</body>
</html>