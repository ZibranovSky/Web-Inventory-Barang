<?php 

if (isset($_POST['simpan'])) {
	include('../koneksi.php');
	
	$no_brg_out = trim($_POST['no_brg_out']);
	$no_ajuan = trim($_POST['no_ajuan']);
	$tanggal_ajuan = trim($_POST['tanggal_ajuan']);
	$tanggal_out = trim($_POST['tanggal_out']);
	$petugas = trim($_POST['petugas']);
	$kode_brg = trim($_POST['kode_brg']);
	$nama_brg = trim($_POST['nama_brg']);
	$stok = trim($_POST['stok']);
	$jml_ajuan = trim($_POST['jml_ajuan']);
	$jml_keluar = trim($_POST['jml_keluar']);
	$admin = trim($_POST['admin']);

	// Fungsi untuk validasi input
	function is_valid_input($input) {
		return !empty($input);
	}

	// Pengecekan validasi input
	if (
		is_valid_input($no_brg_out) && 
		is_valid_input($no_ajuan) && 
		is_valid_input($tanggal_ajuan) && 
		is_valid_input($tanggal_out) && 
		is_valid_input($petugas) && 
		is_valid_input($kode_brg) && 
		is_valid_input($nama_brg) && 
		is_valid_input($stok) && 
		is_valid_input($jml_ajuan) && 
		is_valid_input($jml_keluar) && 
		is_valid_input($admin)
	) {
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
	} else {
		echo "<script>alert('Pastikan semua input tidak kosong atau hanya berisi spasi.')</script>";
		echo '<script>window.history.back()</script>';
	}

	$koneksi->close();
}
?>
