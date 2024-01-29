<?php 

if(isset($_POST['simpan'])) {
	include('../koneksi.php');
	$no_ajuan 	= $_POST['no_ajuan'];
	$tanggal 		= $_POST['tanggal'];
	$kode_brg		= $_POST['kode_brg'];
	$nama_brg		= $_POST['nama_brg'];
	$stok	= $_POST['stok'];
	$jml_ajuan	= $_POST['jml_ajuan'];
	$petugas		= $_POST['petugas'];


	$sql_cek = mysqli_query($koneksi, "SELECT * FROM tb_ajuan WHERE no_ajuan='$no_ajuan'");
	$cek = mysqli_fetch_row($sql_cek);

	if ($cek) {
		echo "<script>alert('No Ajuan sudah ada')</script>";
		echo '<script>window.history.back()</script>';
	}else {
		$sql = "INSERT INTO tb_ajuan SET no_ajuan='$no_ajuan', tanggal='$tanggal', kode_brg='$kode_brg', nama_brg='$nama_brg', stok='$stok', jml_ajuan='$jml_ajuan', petugas='$petugas', val=1";
		mysqli_query($koneksi, $sql);
		if($sql){
			 //echo '<script>window.history.back()</script>';
			header("location: ?m=ajuan&s=awal");
		}else{
			var_dump($sql);
			echo "gagal";
		}
	}

	
}



 ?>