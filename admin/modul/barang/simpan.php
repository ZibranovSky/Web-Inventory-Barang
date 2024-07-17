<?php
include "sesi_admin.php";

if(isset($_POST['simpan'])){
	include "../koneksi.php";
	
	$kode_brg = $_POST['kode_brg'];
	$nama_brg = $_POST['nama_brg'];
	$stok = $_POST['stok'];
	$rak = $_POST['rak'];
	$supplier = $_POST['supplier'];

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
	$koneksi->close();
} else {
	echo "Gagal";
}
?>
