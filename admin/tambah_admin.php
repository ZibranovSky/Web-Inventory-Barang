<?php
 include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $foto = $_POST['foto'];

    $query = "INSERT INTO tb_admin (username,password,nama,telepon, foto) VALUES ('$username', '$password', '$nama', '$telepon','$foto')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data Berhasil Ditambahkan');
                window.location.href='login.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>