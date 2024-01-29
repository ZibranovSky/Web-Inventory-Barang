<head>
	 
</head>
<?php 
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_ajuan");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_brg_in = mysqli_query($koneksi, "SELECT * FROM tb_ajuan LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;




while ($row=mysqli_fetch_array($data_brg_in)) {
	



 ?>

  <tr>
                                         
                                                <td><?php echo $row['no_ajuan']; ?></td>
                                                <td><?php echo $row['tanggal']; ?></td>
                                                 <td><?php echo $row['kode_brg']; ?></td>
                                                <td><?php echo $row['nama_brg']; ?></td>
                                                <td><?php echo $row['jml_ajuan']; ?></td>
                                                <td><?php echo $row['petugas']; ?></td>
                                                <td>

                                                <?php
                                                    if ($row['val']==1) {
                                                        
                                                ?>
                                                <span class="badge badge-pill badge-primary">Proses</span>
                                            <?php 
                                                }else{
                                             ?>
                                                    <span class="badge badge-pill badge-success">Stok Berhasil Dikeluarkan</span>

                                                <?php } ?>

                                                
                                            </td>
                                              
                                              



                                                <td><a href="index.php?m=ajuan&s=hapus&no_ajuan=<?php echo $row['no_ajuan'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a></td>


                                                
                                            </tr>
                                        <?php } ?>

