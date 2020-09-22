<?php 
include '../koneksi.php';
include 'sesi_petugas';
if (isset($_GET['no_ajuan'])) {
	$id = $_GET['no_ajuan'];

	$sql = "DELETE FROM tb_ajuan WHERE no_ajuan='$id'";
	mysqli_query($koneksi, $sql);

	if ($sql) {
		header("location: ?m=ajuan&s=awal");
	}else{
		echo "gagal";
	}
}


 ?>