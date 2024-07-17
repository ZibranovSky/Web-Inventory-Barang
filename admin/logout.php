<?php
session_start();
unset($_SESSION['idinv2']);
unset($_SESSION['userinv2']);
unset($_SESSION['passinv2']);
unset($_SESSION['namainv2']);
unset($_SESSION['teleponinv2']);


echo "<script>window.location='../landing_page/index.php'</script>";
//session_destroy();

?>
