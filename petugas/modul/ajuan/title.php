<?php
date_default_timezone_set("Asia/Jakarta");
$tanggalSekarang = date("Y-m-d");
$jamSekarang = date("h:i a");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $judul; ?></title>

    <!-- boootstrap -->
    <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="../css/tampilanadmin.css" rel="stylesheet">
    <link href="../css/sidebar.css" rel="stylesheet">
    <style>
    .btn-primary {
            margin-bottom: 20px; /* Tambahkan margin di bagian bawah tombol tambah data */ 
            background-color: #32CD32;
            color: #fff;
            border: none;
            border-bottom: 4px solid #006400; /* Garis bawah sebagai efek 3D */
            box-shadow: 0 4px #006400; /* Efek shadow di bawah tombol */
            transition: all 0.3s ease;
        }

        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:focus {
            background-color: #7FFF00; /* Warna background saat tombol dihover */
            border-bottom-color: #3d9a35; /* Warna garis bawah saat dihover */
            box-shadow: 0 6px #166d19; /* Menambahkan efek shadow lebih besar saat dihover */
            transform: translateY(-2px); /* Menggeser tombol ke atas sedikit saat dihover */
        }
</style>

</style>

    </style> 
</head>
<body>
<!-- Menu -->
<div id="wrapper">


        <!-- menu samping -->
  <?php
    include("sidebar.php");
     ?>
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Ajuan</h1>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Tambah data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Ajuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="?m=ajuan&s=simpan" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Ajuan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="no_ajuan" aria-describedby="emailHelp" placeholder="Masukkan Nomor Ajuan">
                                <small id="emailHelp" class="form-text text-muted">Masukkan Tanggal</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal</label>
                                <input type="text" readonly="" class="form-control" value="<?php echo $tanggalSekarang; ?>" id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="Masukkan Tanggal">
                                <small id="emailHelp" class="form-text text-muted">Masukkan Tanggal</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Barang</label>

                                <?php
                                include ("../koneksi.php");
                                $supp = ("SELECT * FROM tb_barang");
                                $result = mysqli_query($koneksi, $supp);

                                $jsArray = "var prdName = new Array();";

                                echo '<select name="kode_brg" onchange="changeValue(this.value)">';
                                echo '<option>--- PILIH ---</option>';

                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'. $row['kode_brg'] .'">KDB'.$row['kode_brg'].'</option>';
                                    $jsArray .= "prdName['". $row['kode_brg'] ."']
                                    = {nama_brg:'". addslashes($row['nama_brg']) ."',
                                    stok:'". addslashes($row['stok']) ."', supplier:'". addslashes($row['supplier']) ."'
                                };";
                                }


                                echo '</select>';
                                ?>
                                <script type="text/javascript">
                                    <?php echo $jsArray; ?>
                                    function changeValue(id){

                                        document.getElementById('prd_nmbrg').value = prdName[id].nama_brg;
                                        document.getElementById('prd_stk').value = prdName[id].stok;
                                        document.getElementById('prd_sup').value = prdName[id].supplier;
                                    }
                                </script>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Barang</label>
                                <input type="text" name="nama_brg" readonly="" id="prd_nmbrg" size="67">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stok</label>
                                <input type="text" class="form-control" id="prd_stk" name="stok" readonly="" aria-describedby="emailHelp" placeholder="Masukkan Stok Barang">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Ajuan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="jml_ajuan" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Masuk">
                                <small id="emailHelp" class="form-text text-muted">Masukkan Jumlah Ajuan</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Petugas</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $r['nama']; ?>" readonly="" name="petugas" aria-describedby="emailHelp" placeholder="Masukkan Nama Admin">

                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>

                        <th>No Ajuan</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Ajuan</th>
                        <th>petugas</th>
                        <th>Validasi</th>
                        <th>Aksi</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    include 'paging.php';

                    ?>
                    </tbody>
                </table>
                <center><ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php if($halaman > 1){ echo "href='?m=ajuan&s=awal&halaman=$previous'"; } ?>>Previous</a>
                        </li>
                        <?php
                        for($x=1;$x<=$total_halaman;$x++){
                            ?>
                            <li class="page-item"><a class="page-link" href="?m=ajuan&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                        }
                        ?>
                        <li class="page-item">
                            <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=ajuan&s=awal&halaman=$next'"; } ?>>Next</a>
                        </li>
                    </ul>
                </center>
            </div>
        </div>

    </div>
</div>
<!-- Footer -->
<?php
include('footer.php');
?>
<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>
<!--include-->
<script src="../vendor/css/js/bootstrap.min.js"></script>
</body>
</html>
