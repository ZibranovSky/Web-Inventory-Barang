<?php
include "sesi_admin.php";
if(isset($_POST['simpan'])){
	include "../koneksi.php";
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	
	$sql    = "SELECT * FROM tb_petugas WHERE username = '".$username."'";
    $tambah = mysqli_query($koneksi, $sql);
    $row    = mysqli_fetch_row($tambah);

    if ($row) {
    	echo "username sudah ada";
    }else{
		$sql = "INSERT INTO tb_petugas SET username='$username', password='$password', nama='$nama', telepon='$telepon'";
		mysqli_query($koneksi,$sql);
		header("location: ?m=petugas&s=awal");
    }
	
}else{
	echo "gagal";
}
?>
