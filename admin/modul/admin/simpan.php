<?php
error_reporting(0);
include "sesi_admin.php";

if(isset($_POST['simpan'])){
	include "../koneksi.php";

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$nama = trim($_POST['nama']);
	$telepon = trim($_POST['telepon']);
	$lokasi = $_FILES['foto']['tmp_name'];
	$namafile = $_FILES['foto']['name'];
	$fotobaru = date('dmYHis').$namafile;
	$tipefile = $_FILES['foto']['type'];

	// Check if any field is empty or only contains spaces
	if (empty($username) || empty($password) || empty($nama) || empty($telepon)) {
		echo '<script>alert("All fields must be filled and cannot contain only spaces.")</script>';
		return false;
	}

	// Validasi foto jika ada
	if ($namafile != "") {
		$allowed_ext = array('png', 'jpg', 'jpeg');
		$x = explode(".", $namafile);
		$ekstensi = strtolower(end($x));
		$angka_acak = rand(1, 999);
		$nama_file_baru = $angka_acak . '-' . $namafile;

		if (!in_array($ekstensi, $allowed_ext)) {
			echo '<script>alert("Ekstensi file tidak diizinkan")</script>';
			return false;
		}
	}

	// Cek username
	$sql = "SELECT * FROM tb_admin WHERE username = ?";
	$stmt = $koneksi->prepare($sql);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_row();

	if ($row) {
		echo '<script>alert("Username sudah ada")</script>';
	} else if (empty($lokasi)) {
		// Insert data tanpa foto
		$sql = "INSERT INTO tb_admin (username, password, nama, telepon) VALUES (?, ?, ?, ?)";
		$stmt = $koneksi->prepare($sql);
		$stmt->bind_param("ssss", $username, md5($password), $nama, $telepon);
		$stmt->execute();
		header("Location: ?m=admin&s=awal");
	} else {
		// Upload foto dan insert data dengan foto
		$folder = "../images/admin/";
		move_uploaded_file($lokasi, $folder . $nama_file_baru);

		$sql = "INSERT INTO tb_admin (username, password, nama, telepon, foto) VALUES (?, ?, ?, ?, ?)";
		$stmt = $koneksi->prepare($sql);
		$stmt->bind_param("sssss", $username, md5($password), $nama, $telepon, $nama_file_baru);
		$stmt->execute();
		header("Location: ?m=admin&s=awal");
	}

	$stmt->close();
	$koneksi->close();
} else {
	echo '<script>alert("Gagal menyimpan data")</script>';
}
?>
