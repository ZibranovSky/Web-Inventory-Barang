<?php 
include '../koneksi.php';
if (!isset($_SESSION["idinv2"])) {
    header("Location: login_petugas.php");
    exit();
}
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

    <!-- icon dan fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="../css/tampilanadmin.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        #wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        #page-wrapper {
            flex: 1;
        }

        .panel-3d {
            border-radius: 10px;
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
        }

        .panel-3d:hover {
            transform: translateY(-10px);
        }

        .panel-heading {
            background: linear-gradient(45deg, #1e90ff, #00bfff);
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .panel-footer {
            background: #f8f8f8;
            color: #333;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .panel-footer a {
            text-decoration: none;
            color: #333;
        }

        .panel-footer a:hover {
            color: #007bff;
        }

        .fa-5x {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .huge {
            font-size: 40px;
            color: white;
        }

        .footer-below {
            background-color: #F8F8FF;
            color: white;
            padding: 10px 0;
        }

        footer {
            background-color: #f1f1f1;
            padding: 10px 0;
            text-align: center;
            width: 100%;
            position: relative;
            bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Menu -->
    <div id="wrapper">
        <!-- menu samping -->
        <?php include("sidebar.php"); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Selamat Datang, <?php echo $r['nama']; ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary panel-3d">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cart-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    include_once "../koneksi.php";
                                    $sql = "SELECT count(id_brg_in) as jbrg_in FROM tb_barang_in";
                                    $query = mysqli_query($koneksi, $sql);
                                    $r = mysqli_fetch_assoc($query);
                                    echo "<h3>".$r['jbrg_in']."</h3>";
                                    ?>
                                    <div>Jumlah Barang Masuk</div>
                                </div>
                            </div>
                        </div>
                        <a href="?m=barangMasuk&s=awal">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success panel-3d">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gift fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    include_once "../koneksi.php";
                                    $sql = "SELECT count(no_ajuan) as jajuan FROM tb_ajuan";
                                    $query = mysqli_query($koneksi, $sql);
                                    $r = mysqli_fetch_assoc($query);
                                    echo "<h3>".$r['jajuan']."</h3>";
                                    ?>
                                    <div>Jumlah Ajuan</div>
                                </div>
                            </div>
                        </div>
                        <a href="?m=ajuan&s=awal">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning panel-3d">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    include_once "../koneksi.php";
                                    $sql = "SELECT count(val) as jval FROM tb_ajuan WHERE val='0'";
                                    $query = mysqli_query($koneksi, $sql);
                                    $r = mysqli_fetch_assoc($query);
                                    echo "<h3>".$r['jval']."</h3>";
                                    ?>
                                    <div>Jumlah Ajuan Yang Disetujui</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
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
