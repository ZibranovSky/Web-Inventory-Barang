<?php
include "sesi_admin.php";
if(isset($_GET['id_brg_in'])){
	include "../koneksi.php";
	$id=$_GET['id_brg_in'];
	
		$sql1   = "DELETE FROM tb_barang_in WHERE id_brg_in= '$id'";
	
		
	$hapus1 = mysqli_query($koneksi,$sql1);
	if($hapus1){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=barangMasuk&s=awal");
	}else{
		echo 'Data Kelas GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
