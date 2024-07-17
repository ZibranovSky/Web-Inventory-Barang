<?php
error_reporting(0);
include "sesi_admin.php";

if(isset($_POST['simpan'])){
	include "../koneksi.php";
	include "../fungsi/upload.php";

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$namafile = $_FILES['foto']['name'];
	$fotobaru = date('dmYHis').$namafile;
	$tipefile = $_FILES['foto']['type'];
	
	// Cek username
	$sql = "SELECT * FROM tb_admin WHERE username = ?";
	$stmt = $koneksi->prepare($sql);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_row();

	if ($row) {
		echo "Username sudah ada";
	} else if (empty($lokasi)) {
		// Insert data tanpa foto
		$sql = "INSERT INTO tb_admin (username, password, nama, telepon) VALUES (?, ?, ?, ?)";
		$stmt = $koneksi->prepare($sql);
		$stmt->bind_param("ssss", $username, $password, $nama, $telepon);
		$stmt->execute();
		header("Location: ?m=admin&s=awal");
	} else {
		// Upload foto dan insert data dengan foto
		$folder = "../images/admin/";
		$ukuran = 100;
		UploadFoto($fotobaru, $folder, $ukuran);
		
		$sql = "INSERT INTO tb_admin (username, password, nama, telepon, foto) VALUES (?, ?, ?, ?, ?)";
		$stmt = $koneksi->prepare($sql);
		$stmt->bind_param("sssss", $username, $password, $nama, $telepon, $fotobaru);
		$stmt->execute();
		header("Location: ?m=admin&s=awal");
	}

	$stmt->close();
	$koneksi->close();
} else {
	echo "Gagal";

}
?>
