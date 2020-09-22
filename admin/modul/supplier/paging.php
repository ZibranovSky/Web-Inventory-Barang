<head>
	 
</head>
<?php 
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_sup");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_supplier = mysqli_query($koneksi, "SELECT * FROM tb_sup LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;




while ($row=mysqli_fetch_array($data_supplier)) {
	



 ?>

  <tr>
                                         
                                                <td><?php echo $row['id_sup']; ?></td>
                                                <td><?php echo $row['nama_sup']; ?></td>
                                                <td><?php echo $row['kontak_sup']; ?></td>
                                                <td><?php echo $row['alamat_sup']; ?></td>
                                                <td><?php echo $row['telepon_sup']; ?></td>
                                              
                                               



                                                <td><a href="index.php?m=supplier&s=hapus&id_sup=<?php echo $row['id_sup'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a> | <a href="index.php?m=supplier&s=ubah&id_sup=<?php echo $row['id_sup'];?>" ><button class="btn btn-primary">Ubah</button></a></td>


                                                
                                            </tr>
                                        <?php } ?>

