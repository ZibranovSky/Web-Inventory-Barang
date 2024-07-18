<?php 
include '../koneksi.php';

// Ambil data dari form login
$user = $_POST['user'];
$pass = md5($_POST['pass']);

// Buat prepared statement
$stmt = $koneksi->prepare("SELECT * FROM tb_admin WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);

// Jalankan statement
$stmt->execute();

// Ambil hasil query
$result = $stmt->get_result();
$ketemu = $result->num_rows;
$b = $result->fetch_array(MYSQLI_ASSOC);

if ($ketemu > 0) {
    session_start();
    $_SESSION['idinv'] = $b['id_admin'];
    $_SESSION['userinv'] = $b['username'];
    $_SESSION['passinv'] = $b['password'];
    $_SESSION['namainv'] = $b['nama'];
    $_SESSION['teleponinv'] = $b['telepon'];
    $_SESSION['fotoinv'] = $b['foto'];
    header("Location: index.php?m=awal");
    exit();
} else {
	echo "<script>
	alert('Username atau Password salah');
	window.location.href='login.php';
  </script>";
    exit();
}
?>
