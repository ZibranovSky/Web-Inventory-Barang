<?php


include '../koneksi.php';

//proses input
if (isset($_POST['simpan'])) {
  $id_admin=$_POST['id_admin'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];

  if(isset($_POST['ubahfoto'])){ // Cek apakah user ingin mengubah fotonya atau tidak
    $foto     = $_FILES['inpfoto']['name'];
    $tmp      = $_FILES['inpfoto']['tmp_name'];
    $fotobaru = date('dmYHis').$foto;
    $path     = "../images/admin/".$fotobaru;

    if(move_uploaded_file($tmp, $path)){ //awal move upload file
      $sql    = "SELECT * FROM tb_admin WHERE id_admin = '".$id_admin."' ";
      $query  = mysqli_query($koneksi, $sql);
      $hapus_f = mysqli_fetch_array($query);

//proses hapus gambar
      $file = "../images/admin/".$hapus_f['foto'];
      unlink($file);//nama variabel yang ada di server

      // Proses ubah data ke Database
            $sql_f="UPDATE tb_admin SET username='$username',  password='$password', nama='$nama', telepon='$telepon', foto='$fotobaru' WHERE id_admin='$id_admin'";

      $ubah  = mysqli_query($koneksi, $sql_f);
      if($ubah){
        echo "<script>alert('Ubah Data Dengan ID Admin  ".$id_admin." Berhasil') </script>";
        header('Location:index.php?m=awal');
       
      } else {
        $sql    = "SELECT * FROM tb_admin WHERE id_admin = '".$id_admin."' ";
        $query  = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_array($query)) {
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
         
        }
      }
    } //akhir move upload file
    else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
     echo '<script>window.history.back()</script>';
    }
 } //akhir ubah foto
 else { //hanya untuk mengubah data
  $sql_d="UPDATE tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon' WHERE id_admin='$id_admin'";
   $data    = mysqli_query($koneksi, $sql_d);
   if ($data) {
     echo "<script>alert('Ubah Data Dengan ID Admin = ".$id_admin." Berhasil') </script>";
     header('Location:index.php?m=awal');
   
   } else {
     $sql   = "SELECT * FROM tb_admin WHERE id_admin = '".$id_admin."' ";
     $query = mysqli_query($koneksi, $sql);
     while ($row = mysqli_fetch_array($query)) {
       echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
     
     }
   }
 } //akhir untuk mengubah data
}

?>
