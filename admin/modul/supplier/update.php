<?php 
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $id_sup = $_POST['id_sup'];
    $nama_sup = trim($_POST['nama_sup']);
    $kontak_sup = trim($_POST['kontak_sup']);
    $alamat_sup = trim($_POST['alamat_sup']);
    $telepon_sup = trim($_POST['telepon_sup']);

    // Fungsi untuk validasi input
    function is_valid_input($input) {
        return !empty($input);
    }

    // Pengecekan validasi input
    if (is_valid_input($nama_sup) && is_valid_input($kontak_sup) && is_valid_input($alamat_sup) && is_valid_input($telepon_sup)) {
        $sql = "UPDATE tb_sup SET nama_sup='$nama_sup', kontak_sup='$kontak_sup', alamat_sup='$alamat_sup', telepon_sup='$telepon_sup' WHERE id_sup='$id_sup'";
        $update = mysqli_query($koneksi, $sql);

        if ($update) {
            header("location: ?m=supplier&s=awal");
        } else {
            echo "Gagal menyimpan data";
        }
    } else {
		echo "<script>alert('Semua kolom harus diisi.Tidak boleh diisi spasi'); window.history.back();</script>";
    }
}
?>
