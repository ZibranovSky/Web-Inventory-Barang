<?php 
include "../sesi_petugas.php";
if(isset($_POST['simpan'])) {
    include('../koneksi.php');
    
    // Generate unique no_ajuan
    $no_ajuan = generateUniqueNoAjuan($koneksi);

    $tanggal  = $_POST['tanggal'];
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $stok     = $_POST['stok'];
    $jml_ajuan= $_POST['jml_ajuan'];
    $petugas  = $_POST['petugas'];

    // Prepare statement untuk memasukkan data
    $sql = "INSERT INTO tb_ajuan (no_ajuan, tanggal, kode_brg, nama_brg, stok, jml_ajuan, petugas, val) VALUES (?, ?, ?, ?, ?, ?, ?, 1)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssisdis", $no_ajuan, $tanggal, $kode_brg, $nama_brg, $stok, $jml_ajuan, $petugas);

    // Eksekusi statement
    if ($stmt->execute()) {
        header("location: ?m=ajuan&s=awal");
        exit();
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
    $koneksi->close();
}

// Fungsi untuk menghasilkan nomor ajuan unik
function generateUniqueNoAjuan($koneksi) {
    $no_ajuan = ''; // Inisialisasi variabel

    // Implementasi logika untuk menghasilkan nomor ajuan unik, misalnya:
    // Contoh: Ambil nomor ajuan terakhir dari database dan tambahkan 1
    $query = "SELECT MAX(CAST(SUBSTRING(no_ajuan, 4) AS UNSIGNED)) AS max_no FROM tb_ajuan";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $max_no = $row['max_no'] ?? 0; // Ambil nilai maksimal, jika tidak ada hasil set default ke 0
    $no_ajuan = 'KDB' . ($max_no + 1); // Contoh format nomor ajuan: KDB1, KDB2, dst.

    return $no_ajuan;
}
?>
