<?php
include "sesi_admin.php";

if(isset($_POST['simpan'])){
	include "../koneksi.php";
	
	$kode_brg = trim($_POST['kode_brg']);
	$nama_brg = trim($_POST['nama_brg']);
	$stok = trim($_POST['stok']);
	$rak = trim($_POST['rak']);
	$supplier = trim($_POST['supplier']);

	// Fungsi untuk validasi input
	function is_valid_input($input) {
		return !empty($input);
	}

	// Pengecekan validasi input
	if (
		is_valid_input($kode_brg) && 
		is_valid_input($nama_brg) && 
		is_valid_input($stok) && 
		is_valid_input($rak) && 
		is_valid_input($supplier)
	) {
		// Cek kode barang menggunakan prepared statement
		$sql_cek = "SELECT * FROM tb_barang WHERE kode_brg = ?";
		$stmt_cek = $koneksi->prepare($sql_cek);
		$stmt_cek->bind_param("s", $kode_brg);
		$stmt_cek->execute();
		$result_cek = $stmt_cek->get_result();
		$cek = $result_cek->fetch_row();

		if ($cek) {
			echo "<script>alert('Kode barang sudah ada')</script>";
			echo '<script>window.history.back()</script>';
		} else {
			// Menambahkan data barang menggunakan prepared statement
			$sql = "INSERT INTO tb_barang (kode_brg, nama_brg, stok, rak, supplier) VALUES (?, ?, ?, ?, ?)";
			$stmt = $koneksi->prepare($sql);
			$stmt->bind_param("ssiss", $kode_brg, $nama_brg, $stok, $rak, $supplier);
			$stmt->execute();
			
			if($stmt->affected_rows > 0){
				echo '<script>window.history.back()</script>';
			} else {
				echo "Gagal menyimpan data";
			}

			$stmt->close();
		}

		$stmt_cek->close();
	} else {
		echo "<script>alert('Pastikan semua input tidak kosong atau hanya berisi spasi.')</script>";
		echo '<script>window.history.back()</script>';
	}

	$koneksi->close();
} else {
	echo "Gagal";
}
?>
