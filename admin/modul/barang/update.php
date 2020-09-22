<?php 
	
	include '../koneksi.php';

	if (isset($_POST['simpan'])) {
	$kode_brg = $_POST['kode_brg'];
	$nama_brg = $_POST['nama_brg'];
	$stok = $_POST['stok'];
	$rak = $_POST['rak'];
	$supplier = $_POST['supplier'];

	}

	$sql = "UPDATE tb_barang SET nama_brg='$nama_brg', stok='$stok', rak='$rak', supplier='$supplier' WHERE kode_brg='$kode_brg'";
	$update = mysqli_query($koneksi, $sql);

	if ($update) {
		header("location: ?m=barang&s=awal");
	}else{
		echo "gagal";
	}




 ?>