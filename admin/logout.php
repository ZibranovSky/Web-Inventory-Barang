<?php
session_start();
unset($_SESSION['idinv']);
unset($_SESSION['userinv']);
unset($_SESSION['passinv']);
unset($_SESSION['namainv']);
unset($_SESSION['teleponinv']);

echo "<script>window.location='../landing_page/index.php'</script>";


?>
