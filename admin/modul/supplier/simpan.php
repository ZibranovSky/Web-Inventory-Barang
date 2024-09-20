<?php
include "sesi_admin.php";

if(isset($_POST['simpan'])){
	include "../koneksi.php";
	
	$nama_sup = trim($_POST['nama_sup']);
	$kontak_sup = trim($_POST['kontak_sup']);
	$alamat_sup = trim($_POST['alamat_sup']);
	$telepon_sup = trim($_POST['telepon_sup']);

	// Fungsi untuk validasi input
	function is_valid_input($input) {
		return !empty($input);
	}

	// Pengecekan validasi input
	if (is_valid_input($nama_sup) && is_valid_input($kontak_sup) && is_valid_input($alamat_sup) && is_valid_input($telepon_sup)) {
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
	} else {
		echo "Gagal menyimpan data. Pastikan semua input tidak kosong atau hanya berisi spasi.";
	}

	$koneksi->close();
} else {
	echo "Gagal";
}
?>
