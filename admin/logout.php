<?php
session_start();
unset($_SESSION['idinv']);
unset($_SESSION['userinv']);
unset($_SESSION['passinv']);
unset($_SESSION['namainv']);
unset($_SESSION['teleponinv']);
unset($_SESSION['fotoinv']);

echo "<script>window.location='../'</script>";
//session_destroy();

?>
