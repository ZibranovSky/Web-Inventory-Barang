<head>
	 
</head>
<?php 
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_admin");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_karyawan = mysqli_query($koneksi, "SELECT * FROM tb_admin LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;




while ($row=mysqli_fetch_array($data_karyawan)) {
	



 ?>

  <tr>
                                         
                                                <td><?php echo $row['id_admin']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['telepon']; ?></td>
                                              
                                                
                                                    <td><img src="../images/admin/<?php echo $row['foto'];?> " height=150/></td>



                                                <td><a href="index.php?m=admin&s=hapus&id_admin=<?php echo $row['id_admin'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a> | <a href="index.php?m=admin&s=ubah&id_admin=<?php echo $row['id_admin'];?>" onclick="return confirm(\'Yakin Akan dihapus?\')"><button class="btn btn-primary">Ubah</button></a></td>


                                                
                                            </tr>
                                        <?php } ?>

