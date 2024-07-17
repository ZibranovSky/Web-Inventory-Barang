<?php
include "sesi_admin.php";
if(isset($_POST['simpan'])){
	include "../koneksi.php";
	
	$nama_sup = $_POST['nama_sup'];
	$kontak_sup = $_POST['kontak_sup'];
	$alamat_sup = $_POST['alamat_sup'];
	$telepon_sup = $_POST['telepon_sup'];
	
	// Menambahkan data supplier menggunakan prepared statement
	$sql = "INSERT INTO tb_sup (nama_sup, kontak_sup, alamat_sup, telepon_sup) VALUES (?, ?, ?, ?)";
	$stmt = $koneksi->prepare($sql);
	$stmt->bind_param("ssss", $nama_sup, $kontak_sup, $alamat_sup, $telepon_sup);
	$stmt->execute();
	
	if($stmt->affected_rows > 0){
		echo '<script>window.history.back()</script>';
	} else {
		echo "Gagal menyimpan data";
	}

	// Menutup statement dan koneksi
	$stmt->close();
	$koneksi->close();
} else {
	echo "Gagal";
}
?>
