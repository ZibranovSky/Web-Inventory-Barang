<head>
   
</head>
<?php 
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_petugas");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_rak = mysqli_query($koneksi, "SELECT * FROM tb_petugas LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;




while ($row=mysqli_fetch_array($data_rak)) {
  



 ?>

  <tr>
                                         
                                                <td><?php echo $row['id_petugas']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['telepon']; ?></td>
                                              



                                                <td><a href="index.php?m=petugas&s=hapus&id_petugas=<?php echo $row['id_petugas'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a>|<a href="index.php?m=petugas&s=ubah&id_petugas=<?php echo $row['id_petugas'];?>"><button class="btn btn-primary">Ubah</button></a></td>


                                                
                                            </tr>
                                        <?php } ?>

