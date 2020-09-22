<?php 
if(empty($_SESSION['idinv']) AND empty($_SESSION['inv'])){
	header('location: login.php');
}
 ?>