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
    <title><?php echo $judul ?></title>

    <!-- Bootstrap -->
    <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/css/bootstrap/bootstrap.css" rel="stylesheet">

    <!-- Icons and Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../css/tampilanadmin.css" rel="stylesheet">
    <link href="../css/sidebar.css" rel="stylesheet">

    <style>
        .btn-primary {
            margin-bottom: 10px; /* Tambahkan margin di bagian bawah tombol tambah data */ 
            background-color: #228B22;   
        }
        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:focus {
        background-color: #FFD700; /* Yellow color */
        border-color: #708090; /* Match border color to background color */
        color: #212529; /* Text color */
        }
        .pagination .page-item .page-link {
            color: #007bff;
        }
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Menu -->
    <div id="wrapper">  
            <!-- Horizontal sidebar -->
            <?php
                 include("sidebar.php")
            ?>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Barang Masuk</h1>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah barang masuk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="?m=barangMasuk&s=simpan" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <input type="text" class="form-control" value="<?php echo $tanggalSekarang; ?>" id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="Masukkan Tanggal">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan Tanggal</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No. Invoice</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="noinv" aria-describedby="emailHelp" placeholder="Masukkan Nomor Invoice">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan Nomor Invoice</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Barang</label>
                                    <?php 
                                    include ("../koneksi.php");
                                    $supp = ("SELECT * FROM tb_barang");
                                    $result = mysqli_query($koneksi, $supp);
                                    $jsArray = "var prdName = new Array();";
                                    echo '<select class="form-control" name="kode_brg" onchange="changeValue(this.value)">';
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
                                    <input type="text" name="nama_brg" readonly="" id="prd_nmbrg" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier</label>
                                    <input type="text" class="form-control" id="prd_sup" name="supplier" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Stok</label>
                                    <input type="text" class="form-control" id="prd_stk" name="stok" aria-describedby="emailHelp" placeholder="Masukkan Stok Barang">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Masuk</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="jml_masuk" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Masuk">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan Jumlah Masuk</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jam</label>
                                    <input type="text" class="form-control" value="<?php echo $jamSekarang; ?>" id="exampleInputEmail1" name="jam" aria-describedby="emailHelp" placeholder="Masukkan Jam">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan Jam</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Petugas</label>
                                    <input type="text" class="form-control" value="<?php echo $r['nama']; ?>" readonly="" name="petugas" aria-describedby="emailHelp" placeholder="Masukkan Nama Admin">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan Nama Admin</small>
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
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id Barang Masuk</th>
                                <th>Tanggal</th>
                                <th>No Invoice</th>
                                <th>Supplier</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Jam</th>
                                <th>Petugas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'paging.php'; ?>
                        </tbody>
                    </table>
                    <center>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if($halaman > 1){ echo "href='?m=barangMasuk&s=awal&halaman=$previous'"; } ?>>Previous</a>
                            </li>
                            <?php 
                            for($x=1;$x<=$total_halaman;$x++){
                                ?> 
                                <li class="page-item"><a class="page-link" href="?m=barangMasuk&s=awal&halaman=<?php echo $x; ?>"><?php echo $x; ?></a></li>
                                <?php
                            }
                            ?>              
                            <li class="page-item">
                                <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=barangMasuk&s=awal&halaman=$next'"; } ?>>Next</a>
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
    <!-- Bootstrap JS -->
    <script src="../vendor/css/js/bootstrap.min.js"></script>
</body>
</html>
