<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $judul; ?></title>

  <!-- Bootstrap -->
  <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Icons dan Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Tema CSS -->
  <link href="../css/tampilanadmin.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }
    .navbar-custom {
      background-color: #2c3e50;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 70px; /* Menambahkan tinggi untuk memastikan elemen berpusat */
    }
    .navbar-custom .navbar-brand {
      font-weight: bold;
      font-size: 30px; /* Increase font size */
      color: white;
    }
    .horizontal-menu {
      background-color: #ecf0f1;
      border-bottom: 1px solid #bdc3c7;
      padding: 10px 0;
    }
    .horizontal-menu .nav > li {
      display: inline-block;
    }
    .horizontal-menu .nav > li > a {
      display: inline-block;
      padding: 10px 15px;
      color: #2c3e50;
    }
    .horizontal-menu .nav > li > a:hover {
      background-color: #1abc9c;
      color: white;
    }
    .panel-custom {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .panel-custom .panel-heading {
      border-radius: 10px 10px 0 0;
    }
    .panel-custom .panel-footer {
      border-radius: 0 0 10px 10px;
    }
    .navbar-horizontal {
      display: flex;
      justify-content: space-around;
      background-color: #ecf0f1;
      padding: 10px 0;
      margin-bottom: 20px;
    }
    .navbar-horizontal a {
      color: #2c3e50;
      padding: 10px 15px;
      text-decoration: none;
    }
    .navbar-horizontal a:hover {
      background-color: #1abc9c;
      color: white;
    }
    .container-fluid {
      width: 100%;
      padding: 20px;
    }
    .content {
      height: 100%;
    }
    .content .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: flex-start;
    }
    .panel {
      flex: 1;
      margin: 10px;
      max-width: 300px;
    }
    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 10px 0;
    }
    .page-header {
      margin-top: 10px; /* Mengurangi margin top */
      padding-top: 0; /* Mengurangi padding top */
    }
  </style>
</head>
<body>
  <!-- Menu -->
  <div id="wrapper">
    <nav class="navbar navbar-custom navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#">Poltek Inventory Management System</a>
      </div>
      <?php 
        $id = $_SESSION['idinv'];
        include '../koneksi.php';
        $sql = "SELECT * FROM tb_admin WHERE id_admin = '$id'";
        $query = mysqli_query($koneksi, $sql);
        $r = mysqli_fetch_array($query);
      ?>
    </nav>

    <!-- Menu Horizontal -->
    <div class="navbar-horizontal">
      <a href="?m=awal.php"><i class="fa fa-dashboard"></i> Beranda</a>
      <a href="?m=admin&s=awal"><i class="fa fa-user"></i> Data Admin</a>
      <a href="?m=petugas&s=awal"><i class="fa fa-users"></i> Data Petugas</a>
      <a href="?m=supplier&s=awal"><i class="fa fa-building"></i> Data Supplier</a>
      <a href="?m=rak&s=awal"><i class="fa fa-cubes"></i> Data Rak</a>
      <a href="?m=barang&s=awal"><i class="fa fa-archive"></i> Data Barang</a>
      <a href="?m=barangKeluar&s=awal"><i class="fa fa-cart-arrow-down"></i> Data Barang Keluar</a>
      <a href="logout.php" onclick="return confirm('Yakin ingin logout?')"><i class="fa fa-warning"></i> Logout</a>
    </div>

    <div class="container-fluid">
      <div class="content">
        <div class="row">
          <div class="col-lg-12 text-center" style="margin-bottom: 20px;">
            <h1 class="page-header">Selamat Datang, <?php echo $r['nama']; ?></h1>
          </div>
        </div>
        <div class="row">
          <div class="panel panel-custom panel-yellow">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <?php
                    include_once "../koneksi.php";
                    $sql = "SELECT count(id_admin) as jadmin FROM tb_admin";
                    $query = mysqli_query($koneksi, $sql);
                    $r = mysqli_fetch_assoc($query);
                    echo "<h3>".$r['jadmin']."</h3>";
                  ?>
                  <div>Jumlah Admin</div>
                </div>
              </div>
            </div>
            <a href="?m=admin&s=awal">
              <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>

          <div class="panel panel-red">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-cubes fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <?php
                    $sql = "SELECT count(id_rak) as jrak FROM tb_rak";
                    $query = mysqli_query($koneksi, $sql);
                    $r = mysqli_fetch_assoc($query);
                    echo "<h3>".$r['jrak']."</h3>";
                  ?>
                  <div>Jumlah Rak</div>
                </div>
              </div>
            </div>
            <a href="?m=rak&s=awal">
              <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>

          <div class="panel panel-red">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-archive fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <?php
                    $sql = "SELECT count(kode_brg) as jbrg FROM tb_barang";
                    $query = mysqli_query($koneksi, $sql);
                    $r = mysqli_fetch_array($query);
                    echo "<h3>".$r['jbrg']."</h3>";
                  ?>
                  <div>Jumlah Barang</div>
                </div>
              </div>
            </div>
            <a href="?m=barang&s=awal">
              <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>

          <div class="panel panel-red">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-cart-plus fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <?php
                    $sql = "SELECT count(id_brg_in) as jbrg_in FROM tb_barang_in";
                    $query = mysqli_query($koneksi, $sql);
                    $r = mysqli_fetch_array($query);
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

          <div class="panel panel-red">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-gift fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <?php
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

          <div class="panel panel-red">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-cart-arrow-down fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <?php
                    $sql = "SELECT count(no_brg_out) as jbrg_out FROM tb_barang_out";
                    $query = mysqli_query($koneksi, $sql);
                    $r = mysqli_fetch_assoc($query);
                    echo "<h3>".$r['jbrg_out']."</h3>";
                  ?>
                  <div>Jumlah Barang Keluar</div>
                </div>
              </div>
            </div>
            <a href="?m=barangKeluar&s=awal">
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
  <footer class="text-center">
    <div class="footer-below">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p class="text-muted" style="font-size: 16px;">Copyright &copy; <script>document.write(new Date().getFullYear());</script> PIMS. All rights reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="../vendor/css/js/bootstrap.min.js"></script>
</body>
</html>
