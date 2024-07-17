<?php 

if (isset($_POST['simpan'])) {
	include('../koneksi.php');
	
	$no_brg_out = $_POST['no_brg_out'];
	$no_ajuan = $_POST['no_ajuan'];
	$tanggal_ajuan = $_POST['tanggal_ajuan'];
	$tanggal_out = $_POST['tanggal_out'];
	$petugas = $_POST['petugas'];
	$kode_brg = $_POST['kode_brg'];
	$nama_brg = $_POST['nama_brg'];
	$stok = $_POST['stok'];
	$jml_ajuan = $_POST['jml_ajuan'];
	$jml_keluar = $_POST['jml_keluar'];
	$admin = $_POST['admin'];
	
	// Cek apakah no_brg_out sudah ada
	$sql_cek = "SELECT * FROM tb_barang_out WHERE no_brg_out = ?";
	$stmt_cek = $koneksi->prepare($sql_cek);
	$stmt_cek->bind_param("s", $no_brg_out);
	$stmt_cek->execute();
	$result_cek = $stmt_cek->get_result();
	$cek = $result_cek->fetch_row();

	if ($cek) {
		echo "<script>alert('No barang Keluar sudah ada')</script>";
		echo '<script>window.history.back()</script>';
	} else {
		$kurangStok = $stok - $jml_keluar;

		// Update stok barang
		$update_sql = "UPDATE tb_barang SET stok = ? WHERE kode_brg = ?";
		$stmt_update = $koneksi->prepare($update_sql);
		$stmt_update->bind_param("is", $kurangStok, $kode_brg);
		$stmt_update->execute();

		// Simpan data barang keluar
		$simpan_sql = "INSERT INTO tb_barang_out (no_brg_out, no_ajuan, tanggal_ajuan, tanggal_out, petugas, kode_brg, nama_brg, stok, jml_ajuan, jml_keluar, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt_simpan = $koneksi->prepare($simpan_sql);
		$stmt_simpan->bind_param("sssssssiiss", $no_brg_out, $no_ajuan, $tanggal_ajuan, $tanggal_out, $petugas, $kode_brg, $nama_brg, $stok, $jml_ajuan, $jml_keluar, $admin);
		$stmt_simpan->execute();

		// Update tb_ajuan
		$sqlval = "UPDATE tb_ajuan SET val = '0', stok = ? WHERE no_ajuan = ?";
		$stmt_val = $koneksi->prepare($sqlval);
		$stmt_val->bind_param("is", $kurangStok, $no_ajuan);
		$stmt_val->execute();

		if ($stmt_val->affected_rows > 0) {
			header("Location: ?m=barangKeluar&s=awal");
		} else {
			echo "Penyimpanan data Gagal";
		}

		// Menutup statement
		$stmt_update->close();
		$stmt_simpan->close();
		$stmt_val->close();
	}

	// Menutup statement cek
	$stmt_cek->close();
	$koneksi->close();
}
?>
