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
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$fotobaru = date('dmYHis').$namafile;
	$tipefile=$_FILES['foto']['type'];
	
	//cek username

	$sql    = "SELECT * FROM tb_admin WHERE username = '".$username."'";
    $tambah = mysqli_query($koneksi, $sql);
    $row    = mysqli_fetch_row($tambah);

    if ($row) {
    	echo "username sudah ada";
    }else if(empty($lokasi)){
		$sql = "INSERT INTO tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon'";
		mysqli_query($koneksi,$sql);
		header("location: ?m=admin&s=awal");
	}else{
		$folder="../images/admin/";
		$ukuran=100;
		UploadFoto($fotobaru,$folder,$ukuran);
		
		$sql = "INSERT INTO tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon', foto='$fotobaru'";
			mysqli_query($koneksi,$sql);
			header("location: ?m=admin&s=awal");
	}
 
	


}else{
	echo "gagal";
}
?>
