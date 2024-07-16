<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = md5($_POST['pass']);

    // Prepared statement untuk mencegah SQL Injection
    $stmt = $koneksi->prepare("SELECT * FROM tb_petugas WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $b = $result->fetch_array();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['idinv2'] = $b['id_petugas'];
        $_SESSION['userinv2'] = $b['username'];
        $_SESSION['passinv2'] = $b['password'];
        $_SESSION['namainv2'] = $b['nama'];
        $_SESSION['teleponinv2'] = $b['telepon'];
        header("location: index.php?m=awal");
    } else {
		echo "<script>
		alert('Username atau Password salah');
		window.location.href='sign.php';
	  </script>";
    }

    $stmt->close();
    $koneksi->close();
}
?>
