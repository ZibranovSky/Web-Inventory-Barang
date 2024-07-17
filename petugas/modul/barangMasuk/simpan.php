<?php 
include "sesi_admin.php";
if(isset($_POST['simpan'])) {
	include('../koneksi.php');
	$tanggal 	= $_POST['tanggal'];
	$noinv 		= $_POST['noinv'];
	$supplier	= $_POST['supplier'];
	$kode_brg	= $_POST['kode_brg'];
	$nama_brg	= $_POST['nama_brg'];
	$stok		= $_POST['stok'];
	$jml_masuk	= $_POST['jml_masuk'];
	$jam		= $_POST['jam'];
	$petugas	= $_POST['petugas'];

	// Menggunakan prepared statement untuk menghindari SQL Injection
	$sql_cek = $koneksi->prepare("SELECT * FROM tb_barang_in WHERE noinv=?");
	$sql_cek->bind_param("s", $noinv);
	$sql_cek->execute();
	$cek = $sql_cek->get_result()->fetch_row();

	if ($cek) {
		echo "<script>alert('No Invoice sudah ada')</script>";
		echo '<script>window.history.back()</script>';
	} else {
		$tambahStok = $stok + $jml_masuk;

		// Update stok barang
		$update = $koneksi->prepare("UPDATE tb_barang SET stok=? WHERE kode_brg=?");
		$update->bind_param("is", $tambahStok, $kode_brg);
		$update->execute();

		// Insert data barang masuk
		$sql = $koneksi->prepare("INSERT INTO tb_barang_in (tanggal, noinv, supplier, kode_brg, nama_brg, stok, jml_masuk, jam, petugas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$sql->bind_param("ssssssiss", $tanggal, $noinv, $supplier, $kode_brg, $nama_brg, $stok, $jml_masuk, $jam, $petugas);
		$sql->execute();

		if($sql){
			header("location: ?m=barangMasuk&s=awal");
		} else {
			echo "Gagal memasukkan data.";
		}
	}

	$sql_cek->close();
	$update->close();
	$sql->close();
	$koneksi->close();
}
?>
