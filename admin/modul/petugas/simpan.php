<?php
include "sesi_admin.php";

if(isset($_POST['simpan'])){
  include "../koneksi.php";

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $nama = trim($_POST['nama']);
  $telepon = trim($_POST['telepon']);

  // Validasi agar input tidak kosong atau hanya berisi spasi
  if (empty($username) || empty($password) || empty($nama) || empty($telepon)) {
    echo "<script>alert('Semua kolom harus diisi.'); window.history.back();</script>";
    exit();
  }

  // Enkripsi password
  $password = md5($password);

  // Cek username menggunakan prepared statement
  $sql = "SELECT * FROM tb_petugas WHERE username = ?";
  $stmt = $koneksi->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_row();

  if ($row) {
    echo "<script>alert('Username sudah ada.'); window.history.back();</script>";
  } else {
    // Menambahkan data menggunakan prepared statement
    $sql = "INSERT INTO tb_petugas (username, password, nama, telepon) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $username, $password, $nama, $telepon);
    $stmt->execute();

    header("Location: ?m=petugas&s=awal");
  }

  // Menutup statement dan koneksi
  $stmt->close();
  $koneksi->close();
} else {
  echo "<script>alert('Gagal menyimpan data.'); window.history.back();</script>";
}
?>
