<?php
include "sesi_admin.php";
if(isset($_GET['kode_brg'])){
	include "../koneksi.php";
	$id=$_GET['kode_brg'];
	
		$sql1   = "DELETE FROM tb_barang WHERE kode_brg= '$id'";
	
		
	$hapus1 = mysqli_query($koneksi,$sql1);
	if($hapus1){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=barang&s=awal");
	}else{
		echo 'Data Kelas GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
