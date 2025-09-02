<?php 
  include '../koneksi.php';

  if (isset($_POST['simpan'])) {
    $id_petugas = $_POST['id_petugas'];
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $nama = trim($_POST['nama']);
    $telepon = trim($_POST['telepon']);

    function is_valid_input($input) {
      return !empty(trim($input));
    }

    if (is_valid_input($username) && is_valid_input($nama) && is_valid_input($telepon)) {
      if ($password === "") {
        $sql = "UPDATE tb_petugas SET username='$username', nama='$nama', telepon='$telepon' WHERE id_petugas='$id_petugas'";
      } else {
        $hashed_password = md5($password);
        $sql = "UPDATE tb_petugas SET username='$username', password='$hashed_password', nama='$nama', telepon='$telepon' WHERE id_petugas='$id_petugas'";
      }

      if (mysqli_query($koneksi, $sql)) {
        header("location: ?m=petugas&s=awal");
      } else {
        echo "Gagal mengupdate data.";
      }
    } else {
		echo "<script>alert('Semua kolom harus diisi.Tidak boleh diisi spasi'); window.history.back();</script>";
  }
}
?>
