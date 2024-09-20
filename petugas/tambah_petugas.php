<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];

    // Buat prepared statement
    $stmt = $koneksi->prepare("INSERT INTO tb_petugas (username, password, nama, telepon) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $nama, $telepon);

    // Eksekusi prepared statement
    if ($stmt->execute()) {
        echo "<script>
                alert('Data Berhasil Ditambahkan');
                window.location.href='sign.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();

    // Tutup koneksi
    mysqli_close($koneksi);
}
?>
