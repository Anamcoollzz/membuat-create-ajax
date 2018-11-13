<?php 

require_once('../koneksi.php');

if(isset($_GET['action'])){

	$action = $_GET['action'];

	if($action == 'tambah'){
		$nama	= $_POST['nama'];
		$tahun	= $_POST['tahun'];
		$warna	= $_POST['warna'];
		$merk	= $_POST['merk'];

		$prepare = $con->prepare("INSERT INTO mobil (nama, tahun, warna, merk) VALUES (?, ?, ?, ?)");

		$prepare->execute([
			$nama,
			$tahun,
			$warna,
			$merk,
		]);

		echo json_encode([
			'status'=>'success',
			'code'=>200,
			'message'=>'Mobil berhasil ditambahkan',
		]);
	}

}else{
	$results = $con->query('SELECT * FROM mobil ORDER BY id DESC');

	$data = [];

	while ($r = $results->fetch(PDO::FETCH_OBJ)) {
		$data[] = $r;
	}

	echo json_encode($data);
}