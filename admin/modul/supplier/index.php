<?php 
include 'sesi_admin.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/supplier/title.php"; break;
	case 'simpan': include "modul/supplier/simpan.php"; break;
	case 'hapus': include "modul/supplier/hapus.php"; break;
	case 'ubah': include "modul/supplier/ubah.php"; break;
	case 'update': include "modul/supplier/update.php"; break;
	
}
 ?>