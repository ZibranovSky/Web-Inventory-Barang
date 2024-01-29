<head>
	 
</head>
<?php 
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_barang_in");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_brg_in = mysqli_query($koneksi, "SELECT * FROM tb_barang_in LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal+1;




while ($row=mysqli_fetch_array($data_brg_in)) {
	



 ?>

  <tr>
                                         
                                                <td><?php echo $row['id_brg_in']; ?></td>
                                                <td><?php echo $row['tanggal']; ?></td>
                                                 <td><?php echo $row['noinv']; ?></td>
                                                <td><?php echo $row['supplier']; ?></td>
                                                 <td><?php echo $row['kode_brg']; ?></td>
                                                <td><?php echo $row['nama_brg']; ?></td>
                                                <td><?php echo $row['jml_masuk']; ?></td>
                                                 <td><?php echo $row['jam']; ?></td>
                                                <td><?php echo $row['petugas']; ?></td>
                                              



                                                <td><a href="index.php?m=barangMasuk&s=hapus&id_brg_in=<?php echo $row['id_brg_in'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a></td>


                                                
                                            </tr>
                                        <?php } ?>

