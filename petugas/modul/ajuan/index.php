<?php 
include 'sesi_petugas.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/ajuan/title.php"; break;
	case 'simpan': include "modul/ajuan/simpan.php"; break;
	case 'hapus': include "modul/ajuan/hapus.php"; break;
	case 'ubah': include "modul/ajuan/ubah.php"; break;
	case 'update': include "modul/ajuan/update.php"; break;
	
}
 ?>