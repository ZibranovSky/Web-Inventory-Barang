<?php
error_reporting(0);
include "sesi_admin.php";

if (isset($_POST['simpan'])) {
    include "../koneksi.php";
    include "../fungsi/upload.php";
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $namafile = $_FILES['foto']['name'];
    $fotobaru = date('dmYHis') . $namafile;
    $tipefile = $_FILES['foto']['type'];

    // Cek username
    $sql_cek = $koneksi->prepare("SELECT * FROM tb_admin WHERE username = ?");
    $sql_cek->bind_param("s", $username);
    $sql_cek->execute();
    $result = $sql_cek->get_result();
    $row = $result->fetch_row();

    if ($row) {
        echo "username sudah ada";
    } else if (empty($lokasi)) {
        $sql_insert = $koneksi->prepare("INSERT INTO tb_admin (username, password, nama, telepon) VALUES (?, ?, ?, ?)");
        $sql_insert->bind_param("ssss", $username, $password, $nama, $telepon);
        $sql_insert->execute();
        header("location: ?m=admin&s=awal");
    } else {
        $folder = "../images/admin/";
        $ukuran = 100;
        UploadFoto($fotobaru, $folder, $ukuran);

        $sql_insert = $koneksi->prepare("INSERT INTO tb_admin (username, password, nama, telepon, foto) VALUES (?, ?, ?, ?, ?)");
        $sql_insert->bind_param("sssss", $username, $password, $nama, $telepon, $fotobaru);
        $sql_insert->execute();
        header("location: ?m=admin&s=awal");
    }

    $sql_cek->close();
    $sql_insert->close();
    $koneksi->close();
} else {
    echo "gagal";
}
?>
