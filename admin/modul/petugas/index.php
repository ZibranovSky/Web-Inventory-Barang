<?php

include_once "sesi_admin.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/petugas/title.php"; break;
	case 'simpan': include "modul/petugas/simpan.php"; break;
	case 'hapus': include "modul/petugas/hapus.php"; break;
	case 'ubah': include "modul/petugas/ubah.php"; break;
	case 'update': include "modul/petugas/update.php"; break;
	
}
?>
