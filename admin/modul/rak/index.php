<?php 
include 'sesi_admin.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/rak/title.php"; break;
	case 'simpan': include "modul/rak/simpan.php"; break;
	case 'hapus': include "modul/rak/hapus.php"; break;
	case 'ubah': include "modul/rak/ubah.php"; break;
	case 'update': include "modul/rak/update.php"; break;
	
}
 ?>