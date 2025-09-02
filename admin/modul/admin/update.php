<?php
include '../koneksi.php';

//proses input
if (isset($_POST['simpan'])) {
  $id_admin = $_POST['id_admin'];
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $nama = trim($_POST['nama']);
  $telepon = trim($_POST['telepon']);

  // Validasi agar input tidak kosong
  if (empty($username) || empty($password) || empty($nama) || empty($telepon)) {
    echo "<script>alert('Semua kolom harus diisi.'); window.history.back();</script>";
    exit();
  }

  // Enkripsi password
  $password = md5($password);

  if (isset($_POST['ubahfoto'])) { // Cek apakah user ingin mengubah fotonya atau tidak
    $foto = $_FILES['inpfoto']['name'];
    $tmp = $_FILES['inpfoto']['tmp_name'];
    $fotobaru = date('dmYHis').$foto;
    $path = "../images/admin/".$fotobaru;

    if (move_uploaded_file($tmp, $path)) { //awal move upload file
      $sql = "SELECT * FROM tb_admin WHERE id_admin = '$id_admin'";
      $query = mysqli_query($koneksi, $sql);
      $hapus_f = mysqli_fetch_array($query);

      //proses hapus gambar
      $file = "../images/admin/".$hapus_f['foto'];
      unlink($file); //nama variabel yang ada di server

      // Proses ubah data ke Database
      $sql_f = "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon', foto='$fotobaru' WHERE id_admin='$id_admin'";
      $ubah = mysqli_query($koneksi, $sql_f);
      if ($ubah) {
        echo "<script>alert('Ubah Data Dengan ID Admin ".$id_admin." Berhasil'); window.location.href='index.php?m=awal';</script>";
      } else {
        echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.history.back();</script>";
      }
    } else {
      // Jika gambar gagal diupload, Lakukan :
      echo "<script>alert('Maaf, Gambar gagal untuk diupload.'); window.history.back();</script>";
    }
  } else { //hanya untuk mengubah data
    $sql_d = "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon' WHERE id_admin='$id_admin'";
    $data = mysqli_query($koneksi, $sql_d);
    if ($data) {
      echo "<script>alert('Ubah Data Dengan ID Admin ".$id_admin." Berhasil'); window.location.href='index.php?m=awal';</script>";
    } else {
      echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.history.back();</script>";
    }
  }
}
?>
