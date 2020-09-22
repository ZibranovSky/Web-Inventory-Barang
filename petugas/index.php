<?php
session_start();
include_once "sesi_petugas.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Petugas || INV Petugas";
switch($modul){
    case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
    case 'barangMasuk': $aktif="Barang Masuk"; $judul="Modul Barang Masuk "; include "modul/barangMasuk/index.php"; break;
    case 'ajuan': $aktif="Ajuan"; $judul="Modul Ajuan"; include "modul/ajuan/index.php"; break;
    
    
   
}

?>
