<?php

include_once "sesi_admin.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/barangKeluar/title.php"; break;
	case 'simpan': include "modul/barangKeluar/simpan.php"; break;
	case 'hapus': include "modul/barangKeluar/hapus.php"; break;
	case 'ubah': include "modul/barangKeluar/ubah.php"; break;
	case 'update': include "modul/barangKeluar/update.php"; break;
	
}
?>
