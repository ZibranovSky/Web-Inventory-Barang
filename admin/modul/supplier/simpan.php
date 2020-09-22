<?php
include "sesi_admin.php";
if(isset($_POST['simpan'])){
	include "../koneksi.php";
	$nama_sup = $_POST['nama_sup'];
	$kontak_sup = $_POST['kontak_sup'];
	$alamat_sup = $_POST['alamat_sup'];
	$telepon_sup = $_POST['telepon_sup'];
	
	
		$sql = "INSERT INTO tb_sup SET nama_sup='$nama_sup', kontak_sup='$kontak_sup', alamat_sup='$alamat_sup', telepon_sup='$telepon_sup'";
			mysqli_query($koneksi,$sql);
	if($sql){
		 echo '<script>window.history.back()</script>';
		//echo "berhasil";
	}else{
		var_dump($sql);
		echo "gagal";
	}
}else{
	echo "gagal";
}
?>
