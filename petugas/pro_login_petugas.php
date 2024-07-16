<?php 
include '../koneksi.php';

// Ambil data dari form
$user = $_POST['user'];
$pass = md5($_POST['pass']);

// Buat prepared statement
$stmt = $koneksi->prepare("SELECT * FROM tb_petugas WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);

// Eksekusi prepared statement
$stmt->execute();

// Ambil hasil eksekusi
$result = $stmt->get_result();
$ketemu = $result->num_rows;
$b = $result->fetch_array(MYSQLI_ASSOC);

if ($ketemu > 0) {
    session_start();
    $_SESSION['idinv2'] = $b['id_petugas'];
    $_SESSION['userinv2'] = $b['username'];
    $_SESSION['passinv2'] = $b['password'];
    $_SESSION['namainv2'] = $b['nama'];
    $_SESSION['teleponinv2'] = $b['telepon'];
    header("location: index.php?m=awal");
} else {
    echo '<script language="javascript">';
    echo 'alert("Username/Password ada yang salah, atau akun anda belum Aktif");';
    echo '</script>';
    header("location: login_petugas.php");
}

// Tutup statement
$stmt->close();

// Tutup koneksi
$koneksi->close();
?>
