<?php 
	
	include '../koneksi.php';

	if (isset($_POST['simpan'])) {
	$id_sup = $_POST['id_sup'];
	$nama_sup = $_POST['nama_sup'];
	$kontak_sup = $_POST['kontak_sup'];
	$alamat_sup = $_POST['alamat_sup'];
	$telepon_sup = $_POST['telepon_sup'];

	}

	$sql = "UPDATE tb_sup SET nama_sup='$nama_sup', kontak_sup='$kontak_sup', alamat_sup='$alamat_sup', telepon_sup='$telepon_sup' WHERE id_sup='$id_sup'";
	$update = mysqli_query($koneksi, $sql);

	if ($update) {
		header("location: ?m=supplier&s=awal");
	}else{
		echo "gagal";
	}




 ?>