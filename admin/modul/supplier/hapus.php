<?php
include "sesi_admin.php";
if(isset($_GET['id_sup'])){
	include "../koneksi.php";
	$id=$_GET['id_sup'];
	
		$sql1   = "DELETE FROM tb_sup WHERE id_sup='$id'";
	
		
	$hapus1 = mysqli_query($koneksi,$sql1);
	if($hapus1){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=supplier&s=awal");
	}else{
		echo 'Data Kelas GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
