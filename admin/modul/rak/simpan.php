<?php
include "sesi_admin.php";
if(isset($_POST['simpan'])){
	include "../koneksi.php";
	$nama_rak = $_POST['nama_rak'];
	
	
		$sql = "INSERT INTO tb_rak SET nama_rak='$nama_rak'";
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
