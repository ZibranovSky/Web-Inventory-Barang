<?php
include "sesi_admin.php";
if(isset($_POST['simpan'])){
	include "../koneksi.php";
	$nama_rak =trim($_POST['nama_rak']);
	
	
	function is_valid_input($input) {
		return !empty($input);
	}

	// Pengecekan validasi input
	if (is_valid_input($nama_rak) ) {
		// Menambahkan data supplier menggunakan prepared statement
		$sql = "INSERT INTO tb_rak (nama_rak) VALUES (?)";
		$stmt = $koneksi->prepare($sql);
		$stmt->bind_param("s", $nama_rak);
		$stmt->execute();
		
		if($stmt->affected_rows > 0){
			echo '<script>window.history.back()</script>';
		} else {
			echo "Gagal menyimpan data";
		}
		$stmt->close();
	} else {
		echo "<script>alert('Semua kolom harus diisi.Tidak boleh diisi spasi'); window.history.back();</script>";
	}

	$koneksi->close();
} else {
	echo "Gagal";
}
?>
