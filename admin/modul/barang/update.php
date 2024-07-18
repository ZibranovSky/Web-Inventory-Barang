<?php 
include '../koneksi.php';

if (isset($_POST['simpan'])) {
  $kode_brg = trim($_POST['kode_brg']);
  $nama_brg = trim($_POST['nama_brg']);
  $stok = trim($_POST['stok']);
  $rak = trim($_POST['rak']);
  $supplier = trim($_POST['supplier']);

  // Fungsi untuk validasi input
  function is_valid_input($input) {
    return !empty($input);
  }

  // Pengecekan validasi input
  if (
    is_valid_input($kode_brg) && 
    is_valid_input($nama_brg) && 
    is_valid_input($stok) && 
    is_valid_input($rak) && 
    is_valid_input($supplier)
  ) {
    $sql = "UPDATE tb_barang SET nama_brg='$nama_brg', stok='$stok', rak='$rak', supplier='$supplier' WHERE kode_brg='$kode_brg'";
    $update = mysqli_query($koneksi, $sql);

    if ($update) {
      header("location: ?m=barang&s=awal");
    } else {
      echo "Gagal menyimpan perubahan data";
    }
  } else {
    echo "<script>alert('Pastikan semua input tidak kosong atau hanya berisi spasi.')</script>";
    echo '<script>window.history.back()</script>';
  }
} else {
  echo "Gagal";
}
?>
