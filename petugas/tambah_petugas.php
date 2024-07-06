<?php
 include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];

    $query = "INSERT INTO tb_petugas (username,password,nama,telepon) VALUES ('$username', '$password', '$nama', '$telepon')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data Berhasil Ditambahkan');
                window.location.href='login_petugas.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>