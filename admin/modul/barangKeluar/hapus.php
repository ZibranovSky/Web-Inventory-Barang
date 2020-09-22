<?php 
include '../koneksi.php';

if (isset($_GET['no_brg_out'])) {
	$id = $_GET['no_brg_out'];


	$sql = "DELETE FROM tb_barang_out WHERE no_brg_out='$id'";
	mysqli_query($koneksi, $sql);

	if ($sql) {
	 	header("location: ?m=barangKeluar&s=awal");
	 }else{
	 	echo "gagal dihapus";
	 }
}


 ?>