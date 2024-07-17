<?php
include "sesi_admin.php";

if(isset($_POST['simpan'])){
	include "../koneksi.php";
	
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	
	// Cek username menggunakan prepared statement
	$sql = "SELECT * FROM tb_petugas WHERE username = ?";
	$stmt = $koneksi->prepare($sql);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_row();

	if ($row) {
		echo "Username sudah ada";
	} else {
		// Menambahkan data menggunakan prepared statement
		$sql = "INSERT INTO tb_petugas (username, password, nama, telepon) VALUES (?, ?, ?, ?)";
		$stmt = $koneksi->prepare($sql);
		$stmt->bind_param("ssss", $username, $password, $nama, $telepon);
		$stmt->execute();
		
		header("Location: ?m=petugas&s=awal");
	}

	// Menutup statement dan koneksi
	$stmt->close();
	$koneksi->close();
} else {
	echo "Gagal";
}
?>
