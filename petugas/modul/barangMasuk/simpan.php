<?php 
include "sesi_admin.php";
if(isset($_POST['simpan'])) {
	include('../koneksi.php');
	$tanggal 	= $_POST['tanggal'];
	$noinv 		= $_POST['noinv'];
	$supplier		= $_POST['supplier'];
	$kode_brg	= $_POST['kode_brg'];
	$nama_brg		= $_POST['nama_brg'];
	$stok	= $_POST['stok'];
	$jml_masuk	= $_POST['jml_masuk'];
	$jam		= $_POST['jam'];
	$petugas		= $_POST['petugas'];

	$sql_cek = mysqli_query($koneksi, "SELECT * FROM tb_barang_in WHERE noinv='$noinv'");
	$cek = mysqli_fetch_row($sql_cek);

	if ($cek) {
		echo "<script>alert('No Invoice sudah ada')</script>";
		echo '<script>window.history.back()</script>';
	}else {
		$tambahStok 	= $stok + $jml_masuk;

		$update = ("UPDATE tb_barang SET stok = '". $tambahStok ."' WHERE kode_brg = '". $kode_brg ."' ");
		$result = mysqli_query($koneksi, $update) or die(mysql_error());
	
		$sql = "INSERT INTO tb_barang_in SET tanggal='$tanggal', noinv='$noinv', supplier='$supplier', kode_brg='$kode_brg', nama_brg='$nama_brg', stok='$stok', jml_masuk='$jml_masuk', jam='$jam', petugas='$petugas'";
		mysqli_query($koneksi, $sql);
		if($sql){
			 //echo '<script>window.history.back()</script>';
			header("location: ?m=barangMasuk&s=awal");
		}else{
			var_dump($sql);
			echo "gagal";
		}
	}

	
}



 ?>