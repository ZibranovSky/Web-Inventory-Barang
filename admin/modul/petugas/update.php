<?php 
	
	include '../koneksi.php';

	if (isset($_POST['simpan'])) {
	$id_petugas = $_POST['id_petugas'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];

	if (empty($password)) {
		$sql = "UPDATE tb_petugas SET username='$username', nama='$nama', telepon='$telepon' WHERE id_petugas='$id_petugas'";
		mysqli_query($koneksi, $sql);

	}else{
			$sql = "UPDATE tb_petugas SET username='$username', password='$password', nama='$nama', telepon='$telepon' WHERE id_petugas='$id_petugas'";
		mysqli_query($koneksi, $sql);

	}

	if ($sql) {
		header("location: ?m=petugas&s=awal");
	}else{
		echo "gagal";
	}

	}





 ?>