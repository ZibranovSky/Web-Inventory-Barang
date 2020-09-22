<?php 
if(empty($_SESSION['idinv2']) AND empty($_SESSION['inv2'])){
	header('location: login_petugas.php');
}
 ?>